<?php session_start();
extract($_POST);
include('../Connections/connection.class.php');
$con = connect();
/*$q ="update  estate_info set pegawai='$pegawai' where lesen = '$nolesen'";
$r = mysql_query($q,$con);*/

$q ="update  esub set alamat1 = '$alamat1', alamat2 = '$alamat2', poskod ='$poskod', bandar =upper('$daerah'), negeri='$negeri', no_telepon = '$notelefon', no_fax ='$nofax', emel = '$email' where no_lesen_baru= '$nolesen'";
$r = mysql_query($q,$con);

$URL="home.php?id=profile";
header("Location:".$URL);
?>