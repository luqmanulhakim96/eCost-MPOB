<?php set_time_limit(0);
include('../Connections/connection.class.php');
extract($_REQUEST);
if($type=="excel"){
header("Content-Disposition: attachment; filename=age_profile.xls");
}
include('baju.php');
$con = connect();
$sql = "select * from age_profile_analysis where  lesen not like '123456%'  group by lesen order by lesen ";
	$result = mysqli_query($con, $sql);


  $jumlah_semua =0;
  $tamat= $_COOKIE['tahun_report']-44;
?><style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<link rel="shortcut icon" href="../images/icon.ico" />

<title>Age Profile</title><table width="100%" class="baju">
  <thead>
    <tr height="30">
      <th>No.</th>



      <th>License No.</th>
       <th>Estate Name</th>
       <th>District</th>
       <th>State</th>
       <?php
       			for($i=($_COOKIE['tahun_report']-1); $i>=$tamat; $i=$i-1){
 			 	$tahun_tanam = $_COOKIE['tahun_report']-$i;
	  ?><th><?php echo $i; ?></th>
      <?php } ?>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
  <?php

   function age_profile($tn,$lesen){
  $con= connect();
  $q="select sum(keluasan) as keluasan from age_profile_analysis where tahun_tanam = '$tn' and lesen = '$lesen' and lesen not like '123456%' ";
  $r=mysqli_query($con, $q);
  $row=mysqli_fetch_array($r);
  $total = mysqli_num_rows($r);

  $variable[0] = $total;
  $variable[1] = $row['keluasan'];

  return $variable;
  }?>
    <?php
	$jumlah_besar=0;

	while($row = mysqli_fetch_array($result)) {

	 ?>
    <tr valign="top" <?php if(++$e%2==0){?>class="alt"<?php } ?>>
      <td><?php


	  echo $e; ?>. </td>
      <td><?php echo $row['lesen'];?></td>

        <td><?php
		   $con = connect();
		$query_state = "select Daerah_Premis, Negeri_Premis, Nama_Estet from esub where No_Lesen_Baru = '".$row['lesen']."'";
		$res_state = mysqli_query($con, $query_state);
		$row_state = mysqli_fetch_array($res_state);
		echo $row_state['Nama_Estet'];?></td>
        <td>
        <?php

		?>
        <?php echo $row_state['Daerah_Premis'];?>        </td>
        <td><?php echo $row_state['Negeri_Premis'];?></td>
        <?php


		$jumlah_luas=0;
       			for($i=($_COOKIE['tahun_report']-1); $i>=$tamat; $i=$i-1){
 			 	$tahun_tanam = $_COOKIE['tahun_report']-$i;
	  ?><td><div align="right">
          <?php $tanam = age_profile($i, $row['lesen']);
		  if($tanam[1]>0){
		  echo number_format($tanam[1],2);
		  }
		  $jumlah_luas = $jumlah_luas+$tanam[1];
		  ?>
        </div></td>
      <?php }

	  $jumlah_kecik[$i]=$jumlah_kecik[$i]+$tanam[1];
	   ?>
    <td><div align="right"><b><?php echo number_format($jumlah_luas,2);?></b></div>
      <div align="justify"></div></td>
    </tr>

    <?php
	$jumlah_besar=$jumlah_besar+$jumlah_luas;
	} ?> <tr valign="top" bgcolor="#FFCC99">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <?php

  function sum_age_profile($tn){
  $con=connect();
   $q="select sum(keluasan) as keluasan from age_profile_analysis where tahun_tanam = '$tn'  ";
  $r=mysqli_query($con, $q);
  $row=mysqli_fetch_array($r);
  $total = mysqli_num_rows($r);

  $variable[0] = $total;
  $variable[1] = $row['keluasan'];

  return $variable;
  }

      for($i=($_COOKIE['tahun_report']-1); $i>=$tamat; $i=$i-1){
 			 	$tahun_tanam = $_COOKIE['tahun_report']-$i;
	  ?>
      <td bgcolor="#FFCC99"><div align="right"><?php $jumlah_kecik= sum_age_profile($i); echo number_format($jumlah_kecik[1],2);?></div></td>
      <?php } ?>
      <td><div align="right"><strong><?php echo number_format($jumlah_besar,2);?></strong></div></td>
    </tr>
  </tbody>
</table>
<?php if($type=='print'){?>
<script>window.print();</script>
<?php } ?>
