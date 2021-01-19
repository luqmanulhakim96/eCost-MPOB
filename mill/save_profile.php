<?php

session_start();
include('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con = connect();

$qInsertSelect = "SELECT lesen FROM alamat_ekilang WHERE  lesen ='" . $_SESSION['lesen'] . "'";
$rInsertSelect = mysql_query($qInsertSelect, $con);
$res_total = mysql_num_rows($rInsertSelect);
/* if no data in alamat_ekilang, insert first */


if ($res_total == 0) {
    $qInsert = "INSERT INTO alamat_ekilang (lesen, nama) VALUES ('" . $_SESSION['lesen'] . "', '$namakilang')";
    $rInsert = mysql_query($qInsert, $con);
}


if ($katalaluan1 != $katalaluan2) {
    echo "<script>alert('Sila masukkan katalaluan yang sah');history.go(-1);</script>";
} else {
    $q = "update login_mill set password = '$katalaluan2' where lesen = '" . $_SESSION['lesen'] . "'";
    $r = mysql_query($q, $con);
}

$q = "UPDATE mill_info SET 
syarikat='$syarikat', integrasi ='$integrasi', teknologi = '$teknologi', tahun_operasi ='$tahun_operasi',
lesenlama = '$lesenlama',
syarikatinduk = upper('$syarikatinduk'),
daerahpremis = upper('$daerahpremis'),
negeripremis = upper('$negeripremis'),
kapasiti = '$kapasiti' WHERE lesen = '" . $_SESSION['lesen'] . "'";
$r = mysql_query($q, $con);

$q = "UPDATE alamat_ekilang SET 
alamatsurat1 = upper('$alamat1'),
alamatsurat2 = upper('$alamat2'),
alamatsurat3 = upper('$alamat3'),
notel = '$notel',
nofax = '$nofax',
email = '$email',

pegawai = upper('$pegawai') WHERE lesen = '" . $_SESSION['lesen'] . "'";
$r = mysql_query($q, $con);

echo "<script>window.location.href='home.php?id=profile'</script>";
?>