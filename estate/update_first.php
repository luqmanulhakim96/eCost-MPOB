<?php 
session_start();
extract($_POST);
include ('../Connections/connection.class.php');
$con = connect();
$q="update login_estate set firsttime ='2' where lesen = '".$_SESSION['lesen']."'";
$r = mysql_query($q,$con);

$qinfo="INSERT INTO estate_info (lesen ,pegawai ,syarikat ,integrasi,keahlian ,lanar,pedalaman ,gambutcetek ,gambutdalam ,laterit ,asidsulfat ,tanahpasir ,percentrata ,percentalun ,percentbukit ,percentcerun)
VALUES (
'$no_lesen', upper('$pegawai'), '$syarikat', '$integrasi', '$keahlian','$lanar', '$pedalaman', '$gambutcetek', '$gambutdalam', '$laterit', '$asidsulfat', '$tanahpasir', '$percentrata', '$percentalun', '$percentbukit', '$percentcerun')";
$rinfo = mysql_query($qinfo,$con);




$URL = "home.php?id=profile";
header("Location:".$URL);
?>