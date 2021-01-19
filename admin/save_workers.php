<?php
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);

$con =connect();

if($var=='add')
{
$q ="insert into warganegara values (upper('$code'),upper('$description'),'$type')";
$r =mysql_query($q,$con);
}


if($var=='delete')
{
$q ="delete from warganegara where kod_warga ='$code'";
$r =mysql_query($q,$con);
}

if($var=='update')
{
$q ="update warganegara set kod_warga = upper('$code'), keterangan = upper('$description'), jenis ='$type' where kod_warga='$kod_warga'";
$r =mysql_query($q,$con);
}


echo "<script>window.location.href='home.php?id=config&sub=variable'</script>"; 

?>