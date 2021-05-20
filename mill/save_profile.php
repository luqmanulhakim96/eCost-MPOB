<?php

session_start();
include('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con = connect();

$qInsertSelect = "SELECT lesen FROM alamat_ekilang WHERE  lesen ='" . $_SESSION['lesen'] . "'";
$rInsertSelect = mysqli_query($con, $qInsertSelect);
$res_total = mysqli_num_rows($rInsertSelect);
/* if no data in alamat_ekilang, insert first */
// print_r($res_total);


if ($res_total == 0) {
    $qInsert = "INSERT INTO alamat_ekilang (lesen, nama) VALUES ('" . $_SESSION['lesen'] . "', '$namakilang')";
    $rInsert = mysqli_query($con, $qInsert);
}


if ($katalaluan1 != $katalaluan2) {
    echo "<script>alert('Sila masukkan katalaluan yang sah');history.go(-1);</script>";
} else {

    $password = $katalaluan2;
    $password = password_hash($password,PASSWORD_BCRYPT);
    $q = "update login_mill set password = '$password' where lesen = '" . $_SESSION['lesen'] . "'";
    $r = mysqli_query($con, $q);
}

$test = "INSERT INTO mill_info (lesen) VALUES ('" . $_SESSION['lesen'] . "')";
$test1 = mysqli_query($con, $test);

$q = "UPDATE mill_info SET
syarikat='$syarikat', integrasi ='$integrasi', teknologi = '$teknologi', tahun_operasi ='$tahun_operasi',
lesenlama = '$lesenlama',
syarikatinduk = upper('$syarikatinduk'),
daerahpremis = upper('$daerahpremis'),
negeripremis = upper('$negeripremis'),
kapasiti = '$kapasiti' WHERE lesen = '" . $_SESSION['lesen'] . "'";
$r = mysqli_query($con, $q);

$q = "UPDATE alamat_ekilang SET
alamatsurat1 = upper('$alamat1'),
alamatsurat2 = upper('$alamat2'),
alamatsurat3 = upper('$alamat3'),
notel = '$notel',
nofax = '$nofax',
email = '$email',

pegawai = upper('$pegawai') WHERE lesen = '" . $_SESSION['lesen'] . "'";
$r = mysqli_query($con, $q);

echo "<script>window.location.href='home.php?id=profile'</script>";
?>
