<?php session_start();
extract($_POST);
include('../Connections/connection.class.php');
// error_reporting(0);
$con = connect();
// $q ="update  estate_info set pegawai='$pegawai', syarikat ='$syarikat',integrasi = '$integrasi', keahlian='$keahlian', lanar ='$lanar', pedalaman = '$pedalaman', gambutcetek = '$gambutcetek', gambutdalam = '$gambutdalam', laterit='$laterit', asidsulfat='$asidsulfat', tanahpasir ='$tanahpasir', percentrata ='$percentrata', percentalun ='$percentalun', percentbukit = '$percentbukit', percentcerun = '$percentcerun' where lesen = '$nolesen'";

// $q ="update  estate_info set lanar ='$lanar', pedalaman = '$pedalaman', gambutcetek = '$gambutcetek', gambutdalam = '$gambutdalam', laterit='$laterit', asidsulfat='$asidsulfat', tanahpasir ='$tanahpasir', percentrata ='$percentrata', percentalun ='$percentalun', percentbukit = '$percentbukit', percentcerun = '$percentcerun' where lesen = '$nolesen' ";
// $q ="update  estate_info set gambutcetek = '$gambutcetek', gambutdalam = '$gambutdalam',  percentrata ='$percentrata', percentalun ='$percentalun', percentbukit = '$percentbukit', percentcerun = '$percentcerun' where lesen = '$nolesen' ";
// $q ="update  estate_info set gambut = '$gambut',  percentrata ='$percentrata', percentalun ='$percentalun', percentbukit = '$percentbukit', percentcerun = '$percentcerun' where lesen = '$nolesen' ";
$q ="update  estate_info set pegawai='$pegawai', syarikat ='$syarikat',integrasi = '$integrasi', keahlian='$keahlian', gambut = '$gambut',  percentrata ='$percentrata', percentalun ='$percentalun', percentbukit = '$percentbukit', percentcerun = '$percentcerun' where lesen = '$nolesen' ";


$r = mysqli_query($con, $q);

// echo "<script>window.location.href='home.php?id=profile'</script>";
// echo $q;
// echo $q;

if ($status == '1') {
    echo "<script>window.location.href='home.php?id=profile'</script>";
}
else if($Submit2)
{
    echo "<script>window.location.href='home.php?id=integration'</script>";
}
else {
    echo "<script>window.location.href='home.php?id=profile'</script>";
}
?>
