<?php
/*
 *      Filename: mill/save_warga.php
 *      Copyright 2010 Malaysia Palm Oil Board <azman@mpob.gov.my>
 *		Last update: 115.10.2010 14:27:31 am
 */
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);

$con =connect();

foreach($warga as $key =>$value)
{
	$value = str_replace(",","",$value);
	
	$qdelete ="delete from warga_mill  where jenis ='$jenis' and lesen ='".$_SESSION['lesen']."' and tahun='$tahun' and warga ='$key' ";
	$rdelete = mysql_query($qdelete,$con);
	
	$q ="insert into warga_mill values('$jenis','".$_SESSION['lesen']."','$tahun','$value','$key')";
	$r =mysql_query($q,$con);
}
$total = str_replace(",","",$total);
$q1="update mill_buruh set $jenis = '$total' where lesen = '".$_SESSION['lesen']."' and tahun ='$tahun'";
$r1=mysql_query($q1,$con);

echo "<script>window.location.href='home.php?id=buruh_mill'</script>"; 
?>
