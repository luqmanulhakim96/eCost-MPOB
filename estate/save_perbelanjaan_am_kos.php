<?php

session_start();
extract($_POST);
extract($_GET);
$tahun = $_SESSION['tahun'];
include ('../Connections/connection.class.php');


$emolumen = str_replace(",", '', $emolumen);
$kos_ibupejabat = str_replace(",", '', $kos_ibupejabat);
$kos_agensi = str_replace(",", '', $kos_agensi);
$kebajikan = str_replace(",", '', $kebajikan);
$sewa_tol = str_replace(",", '', $sewa_tol);
$penyelidikan = str_replace(",", '', $penyelidikan);
$perubatan = str_replace(",", '', $perubatan);
$penyelenggaraan = str_replace(",", '', $penyelenggaraan);
$cukai_keuntungan = str_replace(",", '', $cukai_keuntungan);
$penjagaan = str_replace(",", '', $penjagaan);
$kawalan = str_replace(",", '', $kawalan);
$air_tenaga = str_replace(",", '', $air_tenaga);
$perbelanjaan_pejabat = str_replace(",", '', $perbelanjaan_pejabat);
$susut_nilai = str_replace(",", '', $susut_nilai);
$perbelanjaan_lain = str_replace(",", '', $perbelanjaan_lain);
$total_perbelanjaan = str_replace(",", '', $total_perbelanjaan);


$con = connect();
$q = "update belanja_am_kos set
emolumen ='$emolumen',
kos_ibupejabat ='$kos_ibupejabat',
kos_agensi ='$kos_agensi',
kebajikan ='$kebajikan',
sewa_tol ='$sewa_tol',
penyelidikan ='$penyelidikan',
perubatan ='$perubatan',
penyelenggaraan ='$penyelenggaraan',
cukai_keuntungan ='$cukai_keuntungan',
penjagaan ='$penjagaan',
kawalan ='$kawalan',
air_tenaga ='$air_tenaga',
perbelanjaan_pejabat ='$perbelanjaan_pejabat',
susut_nilai ='$susut_nilai',
perbelanjaan_lain ='$perbelanjaan_lain',
total_perbelanjaan='$total_perbelanjaan',
status = '$status'
where lesen = '" . $_SESSION['lesen'] . "' and thisyear = '$tahun'
";
$r = mysqli_query($con, $q);
//echo $q;
if ($status == '1') {
    echo "<script>window.location.href='home.php?id=ringkasan'</script>";
} else {
    echo "<script>window.location.href='home.php?id=umum'</script>";
}
?>
