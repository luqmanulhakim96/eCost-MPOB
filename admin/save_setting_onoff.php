<?php 
include('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con= connect();
 $jumlah = count($st_name);
$i=1;
while($i<=$jumlah)
  {
 $query = "update setting set st_value = '".$st_value[$i]."' where st_name = '".$st_name[$i]."'";
		$res = mysql_query($query,$con);
  $i++;
  }

echo "<script>window.location.href='home.php?id=config&sub=settingonoff';</script>";

?>