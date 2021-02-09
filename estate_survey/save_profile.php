<?php session_start();
extract($_POST);
include('../Connections/connection.class.php');
$con = connect();
$q ="update  estate_info set pegawai='$pegawai', syarikat ='$syarikat',integrasi = '$integrasi', keahlian='$keahlian', lanar ='$lanar', pedalaman = '$pedalaman', gambutcetek = '$gambutcetek', gambutdalam = '$gambutdalam', laterit='$laterit', asidsulfat='$asidsulfat', tanahpasir ='$tanahpasir', percentrata ='$percentrata', percentalun ='$percentalun', percentbukit = '$percentbukit', percentcerun = '$percentcerun' where lesen = '$nolesen'";
$r = mysqli_query($con, $q);

echo "<script>window.location.href='home.php?id=profile'</script>";

?>
