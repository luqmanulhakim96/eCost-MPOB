<?php
include('../Connections/connection.class.php');

/*header("Content-type: application");
header("Content-Disposition: attachment; filename=excel_data_$tahun.xls");*/
include("baju.php");
$con = connect();
?><style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<h2>Delete Data Double untuk Login Estate
</h2>
<table width="100%" class="baju">
  <tr>
    <th width="2%">No.</th>
    <th width="40%">No Lesen</th>
    <th width="28%">Bilangan</th>
    <th width="30%">Tindakan</th>
  </tr>
  <?php 
  $q="select lesen, count(lesen) as kira from login_estate group by lesen";
  $r=mysql_query($q,$con);
  while($row=mysql_fetch_array($r)){
  ?>
  <tr <?php if($i%2==0){?>class="alt"<?php } ?>>
    <td><?php echo ++$i;?>.</td>
    <td><?php echo $row['lesen'];?></td>
    <td><?php echo $kira=$row['kira'];?></td>
    <td>
    <?php
    if($row['kira']>1){
	$con=connect();
		 $q1="delete from login_estate where lesen = '".$row['lesen']."' and success='0000-00-00 00:00:00' limit 1";
		$r1=mysql_query($q1,$con);
		echo "Delete";
	}
	?>
    
    </td>
  </tr>
  <?php } ?>
</table>
