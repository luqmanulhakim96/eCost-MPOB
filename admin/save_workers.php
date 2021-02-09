<?php
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);

$con =connect();

if($var=='add')
{
$q ="insert into warganegara values (upper('$code'),upper('$description'),'$type')";
$r =mysqli_query($con, $q);
}


if($var=='delete')
{
$q ="delete from warganegara where kod_warga ='$code'";
$r =mysqli_query($con, $q);
}

if($var=='update')
{
$q ="update warganegara set kod_warga = upper('$code'), keterangan = upper('$description'), jenis ='$type' where kod_warga='$kod_warga'";
$r =mysqli_query($con, $q);
}


echo "<script>window.location.href='home.php?id=config&sub=variable'</script>";

?>
