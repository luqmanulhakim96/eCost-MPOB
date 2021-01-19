<?php


function connect($alternate=1, $custom=false) 
	{
		$host = "localhost";
		$user = "root";
		$pass = "mpob2010ecop";
		$db_n = "ecost_db";
		
		$con=mysql_connect($host,$user,$pass);
		mysql_select_db($db_n,$con);
		
		return $con;
		
		}


include("baju.php");
//include('pages.php');
$con = connect();
?><style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>

<link rel="stylesheet" href="style.css" />
<script type="text/javascript" src="script.js"></script>

<h2>Pembetulan Estate Tanda Hijau<br />
</h2>
<br />

<table width="100%" class="baju" id="example2" align="left">
 <thead>
  <tr>
    <th width="2%">No.</th>
    <th width="40%">No Lesen</th>
    <th width="28%">Kata Laluan</th>
    <th width="30%">Penjagaan</th>
    <th width="30%">Penuaian</th>
    <th width="30%">Pengangkutan</th>
    </tr>
  </thead>
  
  <tbody>
  <?php 
  $q="select * from login_estate where firsttime ='1'";
  $r=mysql_query($q,$con);
  while($row=mysql_fetch_array($r)){
  
  	$con=connect();
		
		$qall="select count(lesen) as jumlah from kos_matang_penjagaan where lesen ='".$row['lesen']."' ";
		$rall=mysql_query($qall,$con);
		$totalall = mysql_num_rows($rall);
		$rowall=mysql_fetch_array($rall);
		
		$qall_a="select count(lesen) as jumlah from kos_matang_penuaian where lesen ='".$row['lesen']."' ";
		$rall_a=mysql_query($qall_a,$con);
		$totalall_a = mysql_num_rows($rall_a);
		$rowall_a=mysql_fetch_array($rall_a);
		
		$qall_b="select count(lesen) as jumlah from kos_matang_pengangkutan where lesen ='".$row['lesen']."' ";
		$rall_b=mysql_query($qall_b,$con);
		$totalall_b = mysql_num_rows($rall_b);
		$rowall_b=mysql_fetch_array($rall_b);
		
		$semua =  $rowall['jumlah']+ $rowall_a['jumlah']+ $rowall_b['jumlah']; 
  		if($semua>0){
  ?>
  <tr <?php if($i%2==0){?>class="alt"<?php } ?>>
    <td><?php echo ++$i;?>.</td>
    <td><?php echo $row['lesen'];?></td>
    <td><?php echo $row['password'];?></td>
    <td>
      <div align="center">
        <?php
   
	
		echo $rowall['jumlah']; 
	
	?>   
      </div></td>
    <td><div align="center"><?php echo $rowall_a['jumlah'];  ?></div></td>
    <td><div align="center"><?php  echo $rowall_b['jumlah'];  ?></div></td>
    </tr>
  <?php }} ?>
  </tbody>
</table>
