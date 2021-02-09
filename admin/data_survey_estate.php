<?php
session_start();
include('../Connections/connection.class.php');
if ($_SESSION['type'] <> "admin")
    header("location:../logout.php");

extract($_REQUEST);
$tarikh_report = date("d-m-y");
header("Content-type: application");
header("Content-Disposition: attachment; filename=excel_data_estate_$tahun($tarikh_report).xls");
include("baju.php");
$con = connect();
?>
<style>
    body {
        font-family:Tahoma ;
        font-size: 12px;

    }td,th {
        font-size: 12px;
    }

</style>


<?php

function estate_info($lesen) {
    $con = connect();
    $q = "select * from estate_info where lesen = '$lesen' ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);
    $syarikat = $row['syarikat'];
    if ($syarikat == '-Pilih-' || $syarikat == '- Pilih -') {
        $syarikat = '';
    }
    $keahlian = $row['keahlian'];
    if ($keahlian == '- Pilih -' || $keahlian == '-Pilih-') {
        $keahlian = '';
    }

    $sub[0] = $row['pegawai'];
    $sub[1] = $syarikat;
    $sub[2] = $row['integrasi'];
    $sub[3] = $keahlian;
    $sub[4] = $row['lanar'];
    $sub[5] = $row['pedalaman'];
    $sub[6] = $row['gambutcetek'];
    $sub[7] = $row['gambutdalam'];

    $sub[8] = $row['laterit'];
    $sub[9] = $row['asidsulfat'];
    $sub[10] = $row['tanahpasir'];
    $sub[11] = $row['percentrata'];
    $sub[12] = $row['percentalun'];
    $sub[13] = $row['percentbukit'];
    $sub[14] = $row['percentcerun'];


    return $sub;
}

function esub($lesen) {
    $con =connect();
    $q = "select * from esub where NO_LESEN_BARU = '$lesen' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    $sub[0] = $row['Nama_Estet'];
    $sub[1] = $row['Negeri_Premis'];
    $sub[2] = $row['Daerah_Premis'];
    $sub[3] = $row['Syarikat_Induk'];
    $sub[4] = $row['Berhasil'];
    $sub[5] = $row['Belum_Berhasil'];
    $sub[6] = $row['Jumlah'];
    $sub[7] = $row['Keluasan_Yang_Dituai'];

    return $sub;
}

//----------------------------------------------------
function luas($lesen, $table, $field) {
    $con = connect();
    $q = "select sum($field) as jumlah from $table where lesen = '$lesen' group by lesen limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    $sub[0] = round($row['jumlah'], 2);
    return $sub;
}

//---------------------------------------------------
function kos_belum_matang($lesen, $tahun, $type, $tahun_tanam, $keluasan) {
    $con = connect();
    $q = "select * from kos_belum_matang where lesen = '$lesen' and pb_thisyear='$tahun' and pb_tahun='$tahun_tanam' and pb_type='$type' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);
    $a_1 = 0;
    $a_2 = 0;
    $a_3 = 0;
    $a_4 = 0;
    $a_5 = 0;
    $a_6 = 0;
    $a_7 = 0;
    $a_8 = 0;
    $a_9 = 0;
    $a_10 = 0;
    $a_11 = 0;
    $total_a = 0;
    $b_1a = 0;
    $b_1b = 0;
    $b_1c = 0;
    $total_b_1 = 0;
    $total_b_2 = 0;
    $b_3a = 0;
    $b_3b = 0;
    $b_3c = 0;
    $b_3d = 0;
    $total_b_3 = 0;
    $total_b_4 = 0;
    $total_b_5 = 0;
    $total_b_6 = 0;
    $total_b_7 = 0;
    $total_b_8 = 0;
    $total_b_9 = 0;
    $total_b_10 = 0;
    $total_b_11 = 0;
    $total_b_12 = 0;
    $total_b_13 = 0;
    $total_b_14 = 0;
    $total_b = 0;
    if ($keluasan > 0) {
        $a_1 = round($row['a_1'] / $keluasan, 2);
        $a_2 = round($row['a_2'] / $keluasan, 2);
        $a_3 = round($row['a_3'] / $keluasan, 2);
        $a_4 = round($row['a_4'] / $keluasan, 2);
        $a_5 = round($row['a_5'] / $keluasan, 2);
        $a_6 = round($row['a_6'] / $keluasan, 2);
        $a_7 = round($row['a_7'] / $keluasan, 2);
        $a_8 = round($row['a_8'] / $keluasan, 2);
        $a_9 = round($row['a_9'] / $keluasan, 2);
        $a_10 = round($row['a_10'] / $keluasan, 2);
        $a_11 = round($row['a_11'] / $keluasan, 2);
        $total_a = round($row['total_a'] / $keluasan, 2);
        $b_1a = round($row['b_1a'] / $keluasan, 2);
        $b_1b = round($row['b_1b'] / $keluasan, 2);
        $b_1c = round($row['b_1c'] / $keluasan, 2);
        $total_b_1 = round($row['total_b_1'] / $keluasan, 2);
        $total_b_2 = round($row['total_b_2'] / $keluasan, 2);
        $b_3a = round($row['b_3a'] / $keluasan, 2);
        $b_3b = round($row['b_3b'] / $keluasan, 2);
        $b_3c = round($row['b_3c'] / $keluasan, 2);
        $b_3d = round($row['b_3d'] / $keluasan, 2);
        $total_b_3 = round($row['total_b_3'] / $keluasan, 2);
        $total_b_4 = round($row['total_b_4'] / $keluasan, 2);
        $total_b_5 = round($row['total_b_5'] / $keluasan, 2);
        $total_b_6 = round($row['total_b_6'] / $keluasan, 2);
        $total_b_7 = round($row['total_b_7'] / $keluasan, 2);
        $total_b_8 = round($row['total_b_8'] / $keluasan, 2);
        $total_b_9 = round($row['total_b_9'] / $keluasan, 2);
        $total_b_10 = round($row['total_b_10'] / $keluasan, 2);
        $total_b_11 = round($row['total_b_11'] / $keluasan, 2);
        $total_b_12 = round($row['total_b_12'] / $keluasan, 2);
        $total_b_13 = round($row['total_b_13'] / $keluasan, 2);
        $total_b_14 = round($row['total_b_14'] / $keluasan, 2);
        $total_b = round($row['total_b'] / $keluasan, 2);
    }

    $sub[0] = $a_1;
    $sub[1] = $a_2;
    $sub[2] = $a_3;
    $sub[3] = $a_4;
    $sub[4] = $a_5;
    $sub[5] = $a_6;
    $sub[6] = $a_7;
    $sub[7] = $a_8;
    $sub[8] = $a_9;
    $sub[9] = $a_10;
    $sub[10] = $a_11;
    $sub[11] = $total_a;
    $sub[12] = $b_1a;
    $sub[13] = $b_1b;
    $sub[14] = $b_1c;
    $sub[15] = $total_b_1;
    $sub[16] = $total_b_2;
    $sub[17] = $b_3a;
    $sub[18] = $b_3b;
    $sub[19] = $b_3c;
    $sub[20] = $b_3d;
    $sub[21] = $total_b_3;
    $sub[22] = $total_b_4;
    $sub[23] = $total_b_5;
    $sub[24] = $total_b_6;
    $sub[25] = $total_b_7;
    $sub[26] = $total_b_8;
    $sub[27] = $total_b_9;
    $sub[28] = $total_b_10;
    $sub[29] = $total_b_11;
    $sub[30] = $total_b_12;
    $sub[31] = $total_b_13;
    $sub[32] = $total_b_14;
    $sub[33] = $total_b;
    return $sub;
}

//-----------------------------------------
function bts($var) {
    $con = connect();
    //$vari = substr($var, 0, -1);
    $vari = $var;
    $q = "select * from fbb_production where lesen ='" . $vari . "'";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);
    //$sub[0]=$row['jumlah_pengeluaran'];
    $sub[0] = round($row['purata_hasil_buah'], 2);
    return $sub;
}

function kos_matang_penjagaan($lesen, $tahun, $jum_tanam, $jum_bts) {
    $con = connect();

    //  echo $jum_bts;

    $q = "select * from kos_matang_penjagaan where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);
    $b_1a = 0;
    $b_1b = 0;
    $b_1c = 0;
    $total_b_1 = 0;
    $total_b_2 = 0;
    $b_3a = 0;
    $b_3b = 0;
    $b_3c = 0;
    $b_3d = 0;
    $total_b_3 = 0;
    $total_b_4 = 0;
    $total_b_5 = 0;
    $total_b_6 = 0;
    $total_b_7 = 0;
    $total_b_8 = 0;
    $total_b_9 = 0;
    $total_b_10 = 0;
    $total_b_11 = 0;
    $total_b_12 = 0;
    $total_b = 0;
    if ($jum_tanam > 0) {
        $b_1a = round($row['b_1a'], 2);
        $b_1b = round($row['b_1b'], 2);
        $b_1c = round($row['b_1c'], 2);
        $total_b_1 = round($row['total_b_1'], 2);
        $total_b_2 = round($row['total_b_2'], 2);
        $b_3a = round($row['b_3a'], 2);
        $b_3b = round($row['b_3b'], 2);
        $b_3c = round($row['b_3c'], 2);
        $b_3d = round($row['b_3d'], 2);
        $total_b_3 = round($row['total_b_3'], 2);
        $total_b_4 = round($row['total_b_4'], 2);
        $total_b_5 = round($row['total_b_5'], 2);
        $total_b_6 = round($row['total_b_6'], 2);
        $total_b_7 = round($row['total_b_7'], 2);
        $total_b_8 = round($row['total_b_8'], 2);
        $total_b_9 = round($row['total_b_9'], 2);
        $total_b_10 = round($row['total_b_10'], 2);
        $total_b_11 = round($row['total_b_11'], 2);
        $total_b_12 = round($row['total_b_12'], 2);
        $total_b = round($row['total_b'], 2);
    }

    /* if ($jum_tanam > 0) {
      $b_1a = round($row['b_1a'] / $jum_tanam, 2);
      $b_1b = round($row['b_1b'] / $jum_tanam, 2);
      $b_1c = round($row['b_1c'] / $jum_tanam, 2);
      $total_b_1 = round($row['total_b_1'] / $jum_tanam, 2);
      $total_b_2 = round($row['total_b_2'] / $jum_tanam, 2);
      $b_3a = round($row['b_3a'] / $jum_tanam, 2);
      $b_3b = round($row['b_3b'] / $jum_tanam, 2);
      $b_3c = round($row['b_3c'] / $jum_tanam, 2);
      $b_3d = round($row['b_3d'] / $jum_tanam, 2);
      $total_b_3 = round($row['total_b_3'] / $jum_tanam, 2);
      $total_b_4 = round($row['total_b_4'] / $jum_tanam, 2);
      $total_b_5 = round($row['total_b_5'] / $jum_tanam, 2);
      $total_b_6 = round($row['total_b_6'] / $jum_tanam, 2);
      $total_b_7 = round($row['total_b_7'] / $jum_tanam, 2);
      $total_b_8 = round($row['total_b_8'] / $jum_tanam, 2);
      $total_b_9 = round($row['total_b_9'] / $jum_tanam, 2);
      $total_b_10 = round($row['total_b_10'] / $jum_tanam, 2);
      $total_b_11 = round($row['total_b_11'] / $jum_tanam, 2);
      $total_b_12 = round($row['total_b_12'] / $jum_tanam, 2);
      $total_b = round($row['total_b'] / $jum_tanam, 2);
      } */

    $sub[0] = $b_1a;
    $sub[1] = $b_1b;
    $sub[2] = $b_1c;
    $sub[3] = $total_b_1;
    $sub[4] = $total_b_2;
    $sub[5] = $b_3a;
    $sub[6] = $b_3b;
    $sub[7] = $b_3c;
    $sub[8] = $b_3d;
    $sub[9] = $total_b_3;
    $sub[10] = $total_b_4;
    $sub[11] = $total_b_5;
    $sub[12] = $total_b_6;
    $sub[13] = $total_b_7;
    $sub[14] = $total_b_8;
    $sub[15] = $total_b_9;
    $sub[16] = $total_b_10;
    $sub[17] = $total_b_11;
    $sub[18] = $total_b_12;
    $sub[19] = $total_b;

    /* if ($jum_bts > 0) {
      $sub[20] = round($sub[0] / $jum_bts, 2);
      $sub[21] = round($sub[1] / $jum_bts, 2);
      $sub[22] = round($sub[2] / $jum_bts, 2);
      $sub[23] = round($sub[3] / $jum_bts, 2);
      $sub[24] = round($sub[4] / $jum_bts, 2);
      $sub[25] = round($sub[5] / $jum_bts, 2);
      $sub[26] = round($sub[6] / $jum_bts, 2);
      $sub[27] = round($sub[7] / $jum_bts, 2);
      $sub[28] = round($sub[8] / $jum_bts, 2);
      $sub[29] = round($sub[9] / $jum_bts, 2);
      $sub[30] = round($sub[10] / $jum_bts, 2);
      $sub[31] = round($sub[11] / $jum_bts, 2);
      $sub[32] = round($sub[12] / $jum_bts, 2);
      $sub[33] = round($sub[13] / $jum_bts, 2);
      $sub[34] = round($sub[14] / $jum_bts, 2);
      $sub[35] = round($sub[15] / $jum_bts, 2);
      $sub[36] = round($sub[16] / $jum_bts, 2);
      $sub[37] = round($sub[17] / $jum_bts, 2);
      $sub[38] = round($sub[18] / $jum_bts, 2);
      $sub[39] = round($sub[19] / $jum_bts, 2);
      } */

    if ($jum_bts > 0) {
        $sub[20] = round($sub[0], 2);
        $sub[21] = round($sub[1], 2);
        $sub[22] = round($sub[2], 2);
        $sub[23] = round($sub[3], 2);
        $sub[24] = round($sub[4], 2);
        $sub[25] = round($sub[5], 2);
        $sub[26] = round($sub[6], 2);
        $sub[27] = round($sub[7], 2);
        $sub[28] = round($sub[8], 2);
        $sub[29] = round($sub[9], 2);
        $sub[30] = round($sub[10], 2);
        $sub[31] = round($sub[11], 2);
        $sub[32] = round($sub[12], 2);
        $sub[33] = round($sub[13], 2);
        $sub[34] = round($sub[14], 2);
        $sub[35] = round($sub[15], 2);
        $sub[36] = round($sub[16], 2);
        $sub[37] = round($sub[17], 2);
        $sub[38] = round($sub[18], 2);
        $sub[39] = round($sub[19], 2);
    } else {
        $sub[20] = 0;
        $sub[21] = 0;
        $sub[22] = 0;
        $sub[23] = 0;
        $sub[24] = 0;
        $sub[25] = 0;
        $sub[26] = 0;
        $sub[27] = 0;
        $sub[28] = 0;
        $sub[29] = 0;
        $sub[30] = 0;
        $sub[31] = 0;
        $sub[32] = 0;
        $sub[33] = 0;
        $sub[34] = 0;
        $sub[35] = 0;
        $sub[36] = 0;
        $sub[37] = 0;
        $sub[38] = 0;
        $sub[39] = 0;
    }
    return $sub;
}

//----------------------------------------------------------------
function kos_matang_penuaian($lesen, $tahun, $jum_tanam, $jum_bts) {
    $con = connect();
    $q = "select * from kos_matang_penuaian where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    /* if ($jum_tanam > 0) {
      $sub[0] = round($row['a_1'] / $jum_tanam, 2);
      $sub[1] = round($row['a_2'] / $jum_tanam, 2);
      $sub[2] = round($row['a_3'] / $jum_tanam, 2);
      $sub[3] = round($row['a_4'] / $jum_tanam, 2);
      $sub[4] = round($row['total_b'] / $jum_tanam, 2);
      } */

    if ($jum_tanam > 0) {
        $sub[0] = round($row['a_1'], 2);
        $sub[1] = round($row['a_2'], 2);
        $sub[2] = round($row['a_3'], 2);
        $sub[3] = round($row['a_4'], 2);
        $sub[4] = round($row['total_b'], 2);
    } else {
        $sub[0] = 0;
        $sub[1] = 0;
        $sub[2] = 0;
        $sub[3] = 0;
        $sub[4] = 0;
    }

    if ($jum_bts > 0) {
        $sub[5] = round($sub[0] / $jum_bts, 2);
        $sub[6] = round($sub[1] / $jum_bts, 2);
        $sub[7] = round($sub[2] / $jum_bts, 2);
        $sub[8] = round($sub[3] / $jum_bts, 2);
        $sub[9] = round($sub[4] / $jum_bts, 2);
    } else {
        $sub[5] = 0;
        $sub[6] = 0;
        $sub[7] = 0;
        $sub[8] = 0;
        $sub[9] = 0;
    }

    return $sub;
}

//----------------------------------------------------------------
function kos_matang_pengangkutan($lesen, $tahun, $jum_tanam, $jum_bts) {
    $con = connect();
//  echo $jum_bts;
    $q = "select * from kos_matang_pengangkutan where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    /*
      if ($jum_tanam > 0) {
      $sub[0] = round($row['a_1'] / $jum_tanam, 2);
      $sub[1] = round($row['a_2'] / $jum_tanam, 2);
      $sub[2] = round($row['a_3'] / $jum_tanam, 2);
      $sub[3] = round($row['total_a'] / $jum_tanam, 2);
      $sub[4] = round($row['b_1a'] / $jum_tanam, 2);
      $sub[5] = round($row['b_1b'] / $jum_tanam, 2);
      $sub[6] = round($row['b_1c'] / $jum_tanam, 2);
      $sub[7] = round($row['total_b_1'] / $jum_tanam, 2);
      $sub[8] = round($row['total_b_2'] / $jum_tanam, 2);
      $sub[9] = round($row['total_b'] / $jum_tanam, 2);
      } */

    if ($jum_tanam > 0) {
        $sub[0] = round($row['a_1'], 2);
        $sub[1] = round($row['a_2'], 2);
        $sub[2] = round($row['a_3'], 2);
        $sub[3] = round($row['total_a'], 2);
        $sub[4] = round($row['b_1a'], 2);
        $sub[5] = round($row['b_1b'], 2);
        $sub[6] = round($row['b_1c'], 2);
        $sub[7] = round($row['total_b_1'], 2);
        $sub[8] = round($row['total_b_2'], 2);
        $sub[9] = round($row['total_b'], 2);
    } else {
        $sub[0] = 0;
        $sub[1] = 0;
        $sub[2] = 0;
        $sub[3] = 0;
        $sub[4] = 0;
        $sub[5] = 0;
        $sub[6] = 0;
        $sub[7] = 0;
        $sub[8] = 0;
        $sub[9] = 0;
    }

    if ($jum_bts > 0) {
        $sub[10] = round($sub[0] / $jum_bts, 2);
        $sub[11] = round($sub[1] / $jum_bts, 2);
        $sub[12] = round($sub[2] / $jum_bts, 2);
        $sub[13] = round($sub[3] / $jum_bts, 2);
        $sub[14] = round($sub[4] / $jum_bts, 2);
        $sub[15] = round($sub[5] / $jum_bts, 2);
        $sub[16] = round($sub[6] / $jum_bts, 2);
        $sub[17] = round($sub[7] / $jum_bts, 2);
        $sub[18] = round($sub[8] / $jum_bts, 2);
        $sub[19] = round($sub[9] / $jum_bts, 2);
    } else {

        $sub[10] = 0;
        $sub[11] = 0;
        $sub[12] = 0;
        $sub[13] = 0;
        $sub[14] = 0;
        $sub[15] = 0;
        $sub[16] = 0;
        $sub[17] = 0;
        $sub[18] = 0;
        $sub[19] = 0;
    }

    return $sub;
}

//----------------------------------------------------------------
function belanja_am_kos($lesen, $tahun, $jum_tanam, $jum_bts) {
    $con = connect();
    $q = "select * from belanja_am_kos where lesen = '$lesen' and thisyear='$tahun' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    $sub[0] = 0;
    $sub[1] = 0;
    $sub[2] = 0;
    $sub[3] = 0;
    $sub[4] = 0;
    $sub[5] = 0;
    $sub[6] = 0;
    $sub[7] = 0;
    $sub[8] = 0;
    $sub[9] = 0;
    $sub[10] = 0;
    $sub[11] = 0;
    $sub[12] = 0;
    $sub[13] = 0;
    $sub[14] = 0;
    $sub[15] = 0;

    /*
      if ($jum_tanam > 0) {
      $sub[0] = round($row['emolumen'] / $jum_tanam, 2);
      $sub[1] = round($row['kos_ibupejabat'] / $jum_tanam, 2);
      $sub[2] = round($row['kos_agensi'] / $jum_tanam, 2);
      $sub[3] = round($row['kebajikan'] / $jum_tanam, 2);
      $sub[4] = round($row['sewa_tol'] / $jum_tanam, 2);
      $sub[5] = round($row['penyelidikan'] / $jum_tanam, 2);
      $sub[6] = round($row['perubatan'] / $jum_tanam, 2);
      $sub[7] = round($row['penyelenggaraan'] / $jum_tanam, 2);
      $sub[8] = round($row['cukai_keuntungan'] / $jum_tanam, 2);
      $sub[9] = round($row['penjagaan'] / $jum_tanam, 2);
      $sub[10] = round($row['kawalan'] / $jum_tanam, 2);
      $sub[11] = round($row['air_tenaga'] / $jum_tanam, 2);
      $sub[12] = round($row['perbelanjaan_pejabat'] / $jum_tanam, 2);
      $sub[13] = round($row['susut_nilai'] / $jum_tanam, 2);
      $sub[14] = round($row['perbelanjaan_lain'] / $jum_tanam, 2);
      $sub[15] = round($row['total_perbelanjaan'] / $jum_tanam, 2);
      } */

    if ($jum_tanam > 0) {
        $sub[0] = round($row['emolumen'], 2);
        $sub[1] = round($row['kos_ibupejabat'], 2);
        $sub[2] = round($row['kos_agensi'], 2);
        $sub[3] = round($row['kebajikan'], 2);
        $sub[4] = round($row['sewa_tol'], 2);
        $sub[5] = round($row['penyelidikan'], 2);
        $sub[6] = round($row['perubatan'], 2);
        $sub[7] = round($row['penyelenggaraan'], 2);
        $sub[8] = round($row['cukai_keuntungan'], 2);
        $sub[9] = round($row['penjagaan'], 2);
        $sub[10] = round($row['kawalan'], 2);
        $sub[11] = round($row['air_tenaga'], 2);
        $sub[12] = round($row['perbelanjaan_pejabat'], 2);
        $sub[13] = round($row['susut_nilai'], 2);
        $sub[14] = round($row['perbelanjaan_lain'], 2);
        $sub[15] = round($row['total_perbelanjaan'], 2);
    }

    if ($jum_bts > 0) {
        $sub[16] = round($sub[0] / $jum_bts, 2);
        $sub[17] = round($sub[1] / $jum_bts, 2);
        $sub[18] = round($sub[2] / $jum_bts, 2);
        $sub[19] = round($sub[3] / $jum_bts, 2);
        $sub[20] = round($sub[4] / $jum_bts, 2);
        $sub[21] = round($sub[5] / $jum_bts, 2);
        $sub[22] = round($sub[6] / $jum_bts, 2);
        $sub[23] = round($sub[7] / $jum_bts, 2);
        $sub[24] = round($sub[8] / $jum_bts, 2);
        $sub[25] = round($sub[9] / $jum_bts, 2);
        $sub[26] = round($sub[10] / $jum_bts, 2);
        $sub[27] = round($sub[11] / $jum_bts, 2);
        $sub[28] = round($sub[12] / $jum_bts, 2);
        $sub[29] = round($sub[13] / $jum_bts, 2);
        $sub[30] = round($sub[14] / $jum_bts, 2);
        $sub[31] = round($sub[15] / $jum_bts, 2);
    } else {
        $sub[16] = 0;
        $sub[17] = 0;
        $sub[18] = 0;
        $sub[19] = 0;
        $sub[20] = 0;
        $sub[21] = 0;
        $sub[22] = 0;
        $sub[23] = 0;
        $sub[24] = 0;
        $sub[25] = 0;
        $sub[26] = 0;
        $sub[27] = 0;
        $sub[28] = 0;
        $sub[29] = 0;
        $sub[30] = 0;
        $sub[31] = 0;
    }

    return $sub;
}
?>


<title>Data Survey Estet <?php echo $tahun; ?>(<?php echo $tarikh_report; ?>)</title>

<table width="100%" class="baju">
    <tr>
        <th width="3%">Bil.</th>
        <th width="19%">No.Lesen</th>
        <th width="17%">Nama Estet</th>
        <th width="22%">Negeri</th>
        <th width="12%">Daerah </th>
        <th width="10%">Syarikat Induk</th>

        <th width="10%">pegawai</th>
        <th width="10%">syarikat</th>
        <th width="10%">integrasi</th>
        <th width="10%">keahlian</th>
        <th width="10%">lanar</th>
        <th width="10%">pedalaman</th>
        <th width="10%">gambutcetek</th>
        <th width="10%">gambutdalam</th>
        <th width="10%">laterit</th>
        <th width="10%">asidsulfat</th>
        <th width="10%">tanahpasir</th>
        <th width="10%">percentrata</th>
        <th width="10%">percentalun</th>
        <th width="10%">percentbukit</th>
        <th width="10%">percentcerun</th>
        <th width="2%">PB1_Luas</th>
        <th width="2%">PB1_a_1</th>
        <th width="2%">PB1_a_2</th>
        <th width="2%">PB1_a_3</th>
        <th width="2%">PB1_a_4</th>
        <th width="2%">PB1_a_5</th>
        <th width="2%">PB1_a_6</th>
        <th width="2%">PB1_a_7</th>
        <th width="3%">PB1_a_8</th>
        <th width="3%">PB1_a_9</th>
        <th width="3%">PB1_a_10</th>
        <th width="3%">PB1_a_11</th>
        <th width="3%">PB1_total_a</th>
        <th width="2%">PB1_b_1a</th>
        <th width="2%">PB1_b_1b</th>
        <th width="2%">PB1_b_1c</th>
        <th width="2%">PB1_total_b_1</th>
        <th width="2%">PB1_total_b_2</th>
        <th width="2%">PB1_b_3a</th>
        <th width="2%">PB1_b_3b</th>
        <th width="3%">PB1_b_3c</th>
        <th width="3%">PB1_b_3d</th>
        <th width="3%">PB1_total_b_3</th>
        <th width="3%">PB1_total_b_4</th>
        <th width="3%">PB1_total_b_5</th>
        <th width="3%">PB1_total_b_6</th>
        <th width="3%">PB1_total_b_7</th>
        <th width="3%">PB1_total_b_8</th>
        <th width="3%">PB1_total_b_9</th>
        <th width="3%">PB1_total_b_10</th>
        <th width="3%">PB1_total_b_11</th>
        <th width="3%">PB1_total_b_12</th>
        <th width="3%">PB1_total_b_13</th>
        <th width="3%">PB1_total_b_14</th>
        <th width="3%">PB1_total_a</th>
        <th width="2%">PB1_b_1a</th>
        <th width="2%">PB1_b_1b</th>
        <th width="2%">PB1_b_1c</th>
        <th width="2%">PB1_total_b_1</th>
        <th width="2%">PB1_total_b_2</th>
        <th width="2%">PB1_b_3a</th>
        <th width="2%">PB1_b_3b</th>
        <th width="3%">PB1_b_3c</th>
        <th width="3%">PB1_b_3d</th>
        <th width="3%">PB1_total_b_3</th>
        <th width="3%">PB1_total_b_4</th>
        <th width="3%">PB1_total_b_5</th>
        <th width="3%">PB1_total_b_6</th>
        <th width="3%">PB1_total_b_7</th>
        <th width="3%">PB1_total_b_8</th>
        <th width="3%">PB1_total_b_9</th>
        <th width="3%">PB1_total_b_10</th>
        <th width="3%">PB1_total_b_11</th>
        <th width="3%">PB1_total_b_12</th>
        <th width="3%">PB1_total_b_13</th>
        <th width="3%">PB1_total_b_14</th>
        <th width="3%">PB1_total_a</th>

        <th width="2%">PB2_Luas</th>
        <th width="2%">PB2_b_1a</th>
        <th width="2%">PB2_b_1b</th>
        <th width="2%">PB2_b_1c</th>
        <th width="2%">PB2_total_b_1</th>
        <th width="2%">PB2_total_b_2</th>
        <th width="2%">PB2_b_3a</th>
        <th width="2%">PB2_b_3b</th>
        <th width="3%">PB2_b_3c</th>
        <th width="3%">PB2_b_3d</th>
        <th width="3%">PB2_total_b_3</th>
        <th width="3%">PB2_total_b_4</th>
        <th width="3%">PB2_total_b_5</th>
        <th width="3%">PB2_total_b_6</th>
        <th width="3%">PB2_total_b_7</th>
        <th width="3%">PB2_total_b_8</th>
        <th width="3%">PB2_total_b_9</th>
        <th width="3%">PB2_total_b_10</th>
        <th width="3%">PB2_total_b_11</th>
        <th width="3%">PB2_total_b_12</th>
        <th width="3%">PB2_total_b_13</th>
        <th width="3%">PB2_total_b_14</th>
        <th width="3%">PB2_total_a</th>


        <th width="2%">PB3_Luas</th>
        <th width="2%">PB3_b_1a</th>
        <th width="2%">PB3_b_1b</th>
        <th width="2%">PB3_b_1c</th>
        <th width="2%">PB3_total_b_1</th>
        <th width="2%">PB3_total_b_2</th>
        <th width="2%">PB3_b_3a</th>
        <th width="2%">PB3_b_3b</th>
        <th width="3%">PB3_b_3c</th>
        <th width="3%">PB3_b_3d</th>
        <th width="3%">PB3_total_b_3</th>
        <th width="3%">PB3_total_b_4</th>
        <th width="3%">PB3_total_b_5</th>
        <th width="3%">PB3_total_b_6</th>
        <th width="3%">PB3_total_b_7</th>
        <th width="3%">PB3_total_b_8</th>
        <th width="3%">PB3_total_b_9</th>
        <th width="3%">PB3_total_b_10</th>
        <th width="3%">PB3_total_b_11</th>
        <th width="3%">PB3_total_b_12</th>
        <th width="3%">PB3_total_b_13</th>
        <th width="3%">PB3_total_b_14</th>
        <th width="3%">PB3_total_a</th>

        <th width="2%">PS1_Luas</th>
        <th width="2%">PS1_a_1</th>
        <th width="2%">PS1_a_2</th>
        <th width="2%">PS1_a_3</th>
        <th width="2%">PS1_a_4</th>
        <th width="2%">PS1_a_5</th>
        <th width="2%">PS1_a_6</th>
        <th width="2%">PS1_a_7</th>
        <th width="3%">PS1_a_8</th>
        <th width="3%">PS1_a_9</th>
        <th width="3%">PS1_a_10</th>
        <th width="3%">PS1_a_11</th>
        <th width="3%">PS1_total_a</th>

        <th width="2%">PS2_Luas</th>
        <th width="2%">PS2_b_1a</th>
        <th width="2%">PS2_b_1b</th>
        <th width="2%">PS2_b_1c</th>
        <th width="2%">PS2_total_b_1</th>
        <th width="2%">PS2_total_b_2</th>
        <th width="2%">PS2_b_3a</th>
        <th width="2%">PS2_b_3b</th>
        <th width="3%">PS2_b_3c</th>
        <th width="3%">PS2_b_3d</th>
        <th width="3%">PS2_total_b_3</th>
        <th width="3%">PS2_total_b_4</th>
        <th width="3%">PS2_total_b_5</th>
        <th width="3%">PS2_total_b_6</th>
        <th width="3%">PS2_total_b_7</th>
        <th width="3%">PS2_total_b_8</th>
        <th width="3%">PS2_total_b_9</th>
        <th width="3%">PS2_total_b_10</th>
        <th width="3%">PS2_total_b_11</th>
        <th width="3%">PS2_total_b_12</th>
        <th width="3%">PS2_total_b_13</th>
        <th width="3%">PS2_total_b_14</th>
        <th width="3%">PS2_total_a</th>


        <th width="2%">PS3_Luas</th>
        <th width="2%">PS3_b_1a</th>
        <th width="2%">PS3_b_1b</th>
        <th width="2%">PS3_b_1c</th>
        <th width="2%">PS3_total_b_1</th>
        <th width="2%">PS3_total_b_2</th>
        <th width="2%">PS3_b_3a</th>
        <th width="2%">PS3_b_3b</th>
        <th width="3%">PS3_b_3c</th>
        <th width="3%">PS3_b_3d</th>
        <th width="3%">PS3_total_b_3</th>
        <th width="3%">PS3_total_b_4</th>
        <th width="3%">PS3_total_b_5</th>
        <th width="3%">PS3_total_b_6</th>
        <th width="3%">PS3_total_b_7</th>
        <th width="3%">PS3_total_b_8</th>
        <th width="3%">PS3_total_b_9</th>
        <th width="3%">PS3_total_b_10</th>
        <th width="3%">PS3_total_b_11</th>
        <th width="3%">PS3_total_b_12</th>
        <th width="3%">PS3_total_b_13</th>
        <th width="3%">PS3_total_b_14</th>
        <th width="3%">PS3_total_a</th>

        <th width="2%">PT1_Luas</th>
        <th width="2%">PT1_a_1</th>
        <th width="2%">PT1_a_2</th>
        <th width="2%">PT1_a_3</th>
        <th width="2%">PT1_a_4</th>
        <th width="2%">PT1_a_5</th>
        <th width="2%">PT1_a_6</th>
        <th width="2%">PT1_a_7</th>
        <th width="3%">PT1_a_8</th>
        <th width="3%">PT1_a_9</th>
        <th width="3%">PT1_a_10</th>
        <th width="3%">PT1_a_11</th>
        <th width="3%">PT1_total_a</th>

        <th width="2%">PT2_Luas</th>
        <th width="2%">PT2_b_1a</th>
        <th width="2%">PT2_b_1b</th>
        <th width="2%">PT2_b_1c</th>
        <th width="2%">PT2_total_b_1</th>
        <th width="2%">PT2_total_b_2</th>
        <th width="2%">PT2_b_3a</th>
        <th width="2%">PT2_b_3b</th>
        <th width="3%">PT2_b_3c</th>
        <th width="3%">PT2_b_3d</th>
        <th width="3%">PT2_total_b_3</th>
        <th width="3%">PT2_total_b_4</th>
        <th width="3%">PT2_total_b_5</th>
        <th width="3%">PT2_total_b_6</th>
        <th width="3%">PT2_total_b_7</th>
        <th width="3%">PT2_total_b_8</th>
        <th width="3%">PT2_total_b_9</th>
        <th width="3%">PT2_total_b_10</th>
        <th width="3%">PT2_total_b_11</th>
        <th width="3%">PT2_total_b_12</th>
        <th width="3%">PT2_total_b_13</th>
        <th width="3%">PT2_total_b_14</th>
        <th width="3%">PT2_total_a</th>


        <th width="2%">PT3_Luas</th>
        <th width="2%">PT3_b_1a</th>
        <th width="2%">PT3_b_1b</th>
        <th width="2%">PT3_b_1c</th>
        <th width="2%">PT3_total_b_1</th>
        <th width="2%">PT3_total_b_2</th>
        <th width="2%">PT3_b_3a</th>
        <th width="2%">PT3_b_3b</th>
        <th width="3%">PT3_b_3c</th>
        <th width="3%">PT3_b_3d</th>
        <th width="3%">PT3_total_b_3</th>
        <th width="3%">PT3_total_b_4</th>
        <th width="3%">PT3_total_b_5</th>
        <th width="3%">PT3_total_b_6</th>
        <th width="3%">PT3_total_b_7</th>
        <th width="3%">PT3_total_b_8</th>
        <th width="3%">PT3_total_b_9</th>
        <th width="3%">PT3_total_b_10</th>
        <th width="3%">PT3_total_b_11</th>
        <th width="3%">PT3_total_b_12</th>
        <th width="3%">PT3_total_b_13</th>
        <th width="3%">PT3_total_b_14</th>
        <th width="3%">PT3_total_a</th>

        <th width="3%">KJ_Berhasil</th>
        <th width="3%">KJ_BTS</th>
        <th width="3%">KJ_b_1a</th>
        <th width="3%">KJ_b_1b</th>
        <th width="3%">KJ_b_1c</th>
        <th width="3%">KJ_total_b_1</th>
        <th width="3%">KJ_total_b_2</th>
        <th width="3%">KJ_b_3a</th>
        <th width="3%">KJ_b_3b</th>
        <th width="3%">KJ_b_3c</th>
        <th width="3%">KJ_b_3d</th>
        <th width="3%">KJ_total_b_3</th>
        <th width="3%">KJ_total_b_4</th>
        <th width="3%">KJ_total_b_5</th>
        <th width="3%">KJ_total_b_6</th>
        <th width="3%">KJ_total_b_7</th>
        <th width="3%">KJ_total_b_8</th>
        <th width="3%">KJ_total_b_9</th>
        <th width="3%">KJ_total_b_10</th>
        <th width="3%">KJ_total_b_11</th>
        <th width="3%">KJ_total_b_12</th>
        <th width="3%">KJ_total_b</th>

        <th width="3%">KP_a_1</th>
        <th width="3%">KP_a_2</th>
        <th width="3%">KP_a_3</th>
        <th width="3%">KP_a_4</th>
        <th width="3%">KP_total_b</th>
        <th width="3%">KA_a_1</th>
        <th width="3%">KA_a_2</th>
        <th width="3%">KA_a_3</th>
        <th width="3%">KA_total_a</th>
        <th width="3%">KA_b_1a</th>
        <th width="3%">KA_b_1b</th>
        <th width="3%">KA_b_1c</th>
        <th width="3%">KA_total_b_1</th>
        <th width="3%">KA_total_b_2</th>
        <th width="3%">KA_total_b</th>

        <th width="3%">pab_emolumen</th>
        <th width="3%">pab_kos_ibupejabat</th>
        <th width="3%">pab_kos_agensi</th>
        <th width="3%">pab_kebajikan</th>
        <th width="3%">pab_sewa_tol</th>
        <th width="3%">pab_penyelidikan</th>
        <th width="3%">pab_perubatan</th>
        <th width="3%">pab_penyelenggaraan</th>
        <th width="3%">pab_cukai_keuntungan</th>
        <th width="3%">pab_penjagaan</th>
        <th width="3%">pab_kawalan</th>
        <th width="3%">pab_air_tenaga</th>
        <th width="3%">pab_perbelanjaan_pejabat</th>
        <th width="3%">pab_susut_nilai</th>
        <th width="3%">pab_perbelanjaan_lain</th>
        <th width="3%">pab_total_perbelanjaan</th>

        <th width="3%">pabs_emolumen</th>
        <th width="3%">pabs_kos_ibupejabat</th>
        <th width="3%">pabs_kos_agensi</th>
        <th width="3%">pabs_kebajikan</th>
        <th width="3%">pabs_sewa_tol</th>
        <th width="3%">pabs_penyelidikan</th>
        <th width="3%">pabs_perubatan</th>
        <th width="3%">pabs_penyelenggaraan</th>
        <th width="3%">pabs_cukai_keuntungan</th>
        <th width="3%">pabs_penjagaan</th>
        <th width="3%">pabs_kawalan</th>
        <th width="3%">pabs_air_tenaga</th>
        <th width="3%">pabs_perbelanjaan_pejabat</th>
        <th width="3%">pabs_susut_nilai</th>
        <th width="3%">pabs_perbelanjaan_lain</th>
        <th width="3%">pabs_total_perbelanjaan</th>
    </tr>
    <?php
    $con = connect();
//$q="select * from login_estate where success!='0000-00-00 00:00:00' and lesen not like '%123456%' group by lesen order by lesen  ";

    /* not cookies year */
    //$year = $_COOKIE['tahun_report'];
    $year = $tahun;
    if ($year == date('Y')) {
        $table = 'esub';
    } else {
        $table = "esub_" . $year;
    }

	 $q = "SELECT b.lesen FROM $table a
			INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen
            LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$tahun'
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$tahun'
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$tahun'
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$tahun'
			WHERE
            b.lesen not like '%123456%'
		    and a.No_Lesen_Baru <> ''
			and a.No_Lesen_Baru not like '%123456%'
			and a.nama_estet!=''
			and (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)";
/*
    $q = "
  select * from login_estate
  INNER JOIN ringkasan_kos_hantar ON login_estate.lesen = ringkasan_kos_hantar.NO_LESEN
where
ringkasan_kos_hantar.TAHUN='" . $year . "'
and  success!='0000-00-00 00:00:00' and lesen not like '%123456%'
and lesen in (SELECT
	b.lesen
FROM
	$table a
INNER JOIN login_estate b ON a.No_Lesen_Baru = b.lesen
LEFT JOIN kos_matang_pengangkutan c ON a.No_Lesen_Baru = c.lesen
AND c.pb_thisyear = '" . $year . "'
LEFT JOIN kos_matang_penjagaan d ON a.No_Lesen_Baru = d.lesen
AND d.pb_thisyear = '" . $year . "'
LEFT JOIN kos_matang_penuaian e ON a.No_Lesen_Baru = e.lesen
AND e.pb_thisyear = '" . $year . "'
LEFT JOIN belanja_am_kos f ON a.No_Lesen_Baru = f.lesen
AND f.thisyear = '" . $year . "'
WHERE
	a.No_Lesen_Baru <> ''
AND a.No_Lesen_Baru NOT LIKE '%123456%'
AND (
	c.total_b > 0
	OR d.total_b > 0
	OR e.total_b > 0
	OR f.total_perbelanjaan > 0
)
GROUP BY
	a.No_Lesen_Baru
ORDER BY
	a.Negeri_Premis ASC)
group by lesen order by lesen ";*/
    //echo $q;

    /* backup sql
      select * from login_estate
      where
      success!='0000-00-00 00:00:00' and lesen not like '%123456%'
      and lesen in (SELECT
      b.lesen
      FROM
      $table a
      INNER JOIN login_estate b ON a.No_Lesen_Baru = b.lesen
      LEFT JOIN kos_matang_pengangkutan c ON a.No_Lesen_Baru = c.lesen
      AND c.pb_thisyear = '" . $year . "'
      LEFT JOIN kos_matang_penjagaan d ON a.No_Lesen_Baru = d.lesen
      AND d.pb_thisyear = '" . $year . "'
      LEFT JOIN kos_matang_penuaian e ON a.No_Lesen_Baru = e.lesen
      AND e.pb_thisyear = '" . $year . "'
      LEFT JOIN belanja_am_kos f ON a.No_Lesen_Baru = f.lesen
      AND f.thisyear = '" . $year . "'
      WHERE
      a.No_Lesen_Baru <> ''
      AND a.No_Lesen_Baru NOT LIKE '%123456%'
      AND (
      c.total_b > 0
      OR d.total_b > 0
      OR e.total_b > 0
      OR f.total_perbelanjaan > 0
      )
      GROUP BY
      a.No_Lesen_Baru
      ORDER BY
      a.Negeri_Premis ASC)
      group by lesen order by lesen
     */

    /* if no data in table ringkasan kos, means estate not submit their survey */
    $r = mysqli_query($con, $q);
    $bil = 0;
    while ($row = mysqli_fetch_array($r)) {
        ?>
        <tr <?php if ($bil % 2 == 0) { ?>class="alt"<?php } ?>>
            <td><?php echo ++$bil; ?>. </td>
            <td><?php echo $row['lesen']; ?></td>
            <td><?php
                $nl = esub($row['lesen']);
                echo $nl[0];
                ?></td>
            <td><?php echo $nl[1]; ?></td>
            <td><?php echo $nl[2]; ?></td>
            <td><?php echo $nl[3]; ?></td>
            <td><?php
                $es = estate_info($row['lesen']);
                echo $es[0];
                ?>&nbsp;</td>
            <td><?php echo $es[1]; ?></td>
            <td><?php echo $es[2]; ?></td>
            <td><?php echo $es[3]; ?></td>
            <td><?php echo $es[4]; ?></td>
            <td><?php echo $es[5]; ?></td>
            <td><?php echo $es[6]; ?></td>
            <td><?php echo $es[7]; ?></td>
            <td><?php echo $es[8]; ?></td>
            <td><?php echo $es[9]; ?></td>
            <td><?php echo $es[10]; ?></td>
            <td><?php echo $es[11]; ?></td>
            <td><?php echo $es[12]; ?></td>
            <td><?php echo $es[13]; ?></td>
            <td><?php echo $es[14]; ?></td>
            <td><?php
                $luas = luas($row['lesen'], 'tanam_baru09', 'tanaman_baru');
                echo $luas[0];
                ?></td>
            <td><?php
                $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Baru', '1', $luas[0]);
                echo $kbm[0];
                ?></td>
            <td><?php echo $kbm[1]; ?></td>
            <td><?php echo $kbm[2]; ?></td>
            <td><?php echo $kbm[3]; ?></td>
            <td><?php echo $kbm[4]; ?></td>
            <td><?php echo $kbm[5]; ?></td>
            <td><?php echo $kbm[6]; ?></td>
            <td><?php echo $kbm[7]; ?></td>
            <td><?php echo $kbm[8]; ?></td>
            <td><?php echo $kbm[9]; ?></td>
            <td><?php echo $kbm[10]; ?></td>
            <td><?php echo $kbm[11]; ?></td>
            <td><?php echo $kbm[12]; ?></td>
            <td><?php echo $kbm[13]; ?></td>
            <td><?php echo $kbm[14]; ?></td>
            <td><?php echo $kbm[15]; ?></td>
            <td><?php echo $kbm[16]; ?></td>
            <td><?php echo $kbm[17]; ?></td>
            <td><?php echo $kbm[18]; ?></td>
            <td><?php echo $kbm[19]; ?></td>
            <td><?php echo $kbm[20]; ?></td>
            <td><?php echo $kbm[21]; ?></td>
            <td><?php echo $kbm[22]; ?></td>
            <td><?php echo $kbm[23]; ?></td>
            <td><?php echo $kbm[24]; ?></td>
            <td><?php echo $kbm[25]; ?></td>
            <td><?php echo $kbm[26]; ?></td>
            <td><?php echo $kbm[27]; ?></td>
            <td><?php echo $kbm[28]; ?></td>
            <td><?php echo $kbm[29]; ?></td>
            <td><?php echo $kbm[30]; ?></td>
            <td><?php echo $kbm[31]; ?></td>
            <td><?php echo $kbm[32]; ?></td>
            <td><?php echo $kbm[33]; ?></td>


            <td><?php echo $kbm[12]; ?></td>
            <td><?php echo $kbm[13]; ?></td>
            <td><?php echo $kbm[14]; ?></td>
            <td><?php echo $kbm[15]; ?></td>
            <td><?php echo $kbm[16]; ?></td>
            <td><?php echo $kbm[17]; ?></td>
            <td><?php echo $kbm[18]; ?></td>
            <td><?php echo $kbm[19]; ?></td>
            <td><?php echo $kbm[20]; ?></td>
            <td><?php echo $kbm[21]; ?></td>
            <td><?php echo $kbm[22]; ?></td>
            <td><?php echo $kbm[23]; ?></td>
            <td><?php echo $kbm[24]; ?></td>
            <td><?php echo $kbm[25]; ?></td>
            <td><?php echo $kbm[26]; ?></td>
            <td><?php echo $kbm[27]; ?></td>
            <td><?php echo $kbm[28]; ?></td>
            <td><?php echo $kbm[29]; ?></td>
            <td><?php echo $kbm[30]; ?></td>
            <td><?php echo $kbm[31]; ?></td>
            <td><?php echo $kbm[32]; ?></td>
            <td><?php echo $kbm[33]; ?></td>

            <!---------------------------------------------------------------------->

            <td><?php
                $luas = luas($row['lesen'], 'tanam_baru08', 'tanaman_baru');
                echo $luas[0];
                ?></td>
            <td><?php
                $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Baru', '2', $luas[0]);
                echo $kbm[12];
                ?></td>
            <td><?php echo $kbm[13]; ?></td>
            <td><?php echo $kbm[14]; ?></td>
            <td><?php echo $kbm[15]; ?></td>
            <td><?php echo $kbm[16]; ?></td>
            <td><?php echo $kbm[17]; ?></td>
            <td><?php echo $kbm[18]; ?></td>
            <td><?php echo $kbm[19]; ?></td>
            <td><?php echo $kbm[20]; ?></td>
            <td><?php echo $kbm[21]; ?></td>
            <td><?php echo $kbm[22]; ?></td>
            <td><?php echo $kbm[23]; ?></td>
            <td><?php echo $kbm[24]; ?></td>
            <td><?php echo $kbm[25]; ?></td>
            <td><?php echo $kbm[26]; ?></td>
            <td><?php echo $kbm[27]; ?></td>
            <td><?php echo $kbm[28]; ?></td>
            <td><?php echo $kbm[29]; ?></td>
            <td><?php echo $kbm[30]; ?></td>
            <td><?php echo $kbm[31]; ?></td>
            <td><?php echo $kbm[32]; ?></td>
            <td><?php echo $kbm[33]; ?></td>


            <td><?php
                $luas = luas($row['lesen'], 'tanam_baru07', 'tanaman_baru');
                echo $luas[0];
                ?></td>
            <td><?php
                $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Baru', '3', $luas[0]);
                echo $kbm[12];
                ?></td>
            <td><?php echo $kbm[13]; ?></td>
            <td><?php echo $kbm[14]; ?></td>
            <td><?php echo $kbm[15]; ?></td>
            <td><?php echo $kbm[16]; ?></td>
            <td><?php echo $kbm[17]; ?></td>
            <td><?php echo $kbm[18]; ?></td>
            <td><?php echo $kbm[19]; ?></td>
            <td><?php echo $kbm[20]; ?></td>
            <td><?php echo $kbm[21]; ?></td>
            <td><?php echo $kbm[22]; ?></td>
            <td><?php echo $kbm[23]; ?></td>
            <td><?php echo $kbm[24]; ?></td>
            <td><?php echo $kbm[25]; ?></td>
            <td><?php echo $kbm[26]; ?></td>
            <td><?php echo $kbm[27]; ?></td>
            <td><?php echo $kbm[28]; ?></td>
            <td><?php echo $kbm[29]; ?></td>
            <td><?php echo $kbm[30]; ?></td>
            <td><?php echo $kbm[31]; ?></td>
            <td><?php echo $kbm[32]; ?></td>
            <td><?php echo $kbm[33]; ?></td>

            <td><?php
                $luas = luas($row['lesen'], 'tanam_semula09', 'tanaman_semula');
                echo $luas[0];
                ?></td>
            <td><?php
                $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Semula', '1', $luas[0]);
                echo $kbm[0];
                ?></td>
            <td><?php echo $kbm[1]; ?></td>
            <td><?php echo $kbm[2]; ?></td>
            <td><?php echo $kbm[3]; ?></td>
            <td><?php echo $kbm[4]; ?></td>
            <td><?php echo $kbm[5]; ?></td>
            <td><?php echo $kbm[6]; ?></td>
            <td><?php echo $kbm[7]; ?></td>
            <td><?php echo $kbm[8]; ?></td>
            <td><?php echo $kbm[9]; ?></td>
            <td><?php echo $kbm[10]; ?></td>
            <td><?php echo $kbm[11]; ?></td>

            <td><?php
                $luas = luas($row['lesen'], 'tanam_semula08', 'tanaman_semula');
                echo $luas[0];
                ?></td>
            <td><?php
                $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Semula', '2', $luas[0]);
                echo $kbm[12];
                ?></td>
            <td><?php echo $kbm[13]; ?></td>
            <td><?php echo $kbm[14]; ?></td>
            <td><?php echo $kbm[15]; ?></td>
            <td><?php echo $kbm[16]; ?></td>
            <td><?php echo $kbm[17]; ?></td>
            <td><?php echo $kbm[18]; ?></td>
            <td><?php echo $kbm[19]; ?></td>
            <td><?php echo $kbm[20]; ?></td>
            <td><?php echo $kbm[21]; ?></td>
            <td><?php echo $kbm[22]; ?></td>
            <td><?php echo $kbm[23]; ?></td>
            <td><?php echo $kbm[24]; ?></td>
            <td><?php echo $kbm[25]; ?></td>
            <td><?php echo $kbm[26]; ?></td>
            <td><?php echo $kbm[27]; ?></td>
            <td><?php echo $kbm[28]; ?></td>
            <td><?php echo $kbm[29]; ?></td>
            <td><?php echo $kbm[30]; ?></td>
            <td><?php echo $kbm[31]; ?></td>
            <td><?php echo $kbm[32]; ?></td>
            <td><?php echo $kbm[33]; ?></td>


            <td><?php
                $luas = luas($row['lesen'], 'tanam_semula07', 'tanaman_semula');
                echo $luas[0];
                ?></td>
            <td><?php
                $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Semula', '3', $luas[0]);
                echo $kbm[12];
                ?></td>
            <td><?php echo $kbm[13]; ?></td>
            <td><?php echo $kbm[14]; ?></td>
            <td><?php echo $kbm[15]; ?></td>
            <td><?php echo $kbm[16]; ?></td>
            <td><?php echo $kbm[17]; ?></td>
            <td><?php echo $kbm[18]; ?></td>
            <td><?php echo $kbm[19]; ?></td>
            <td><?php echo $kbm[20]; ?></td>
            <td><?php echo $kbm[21]; ?></td>
            <td><?php echo $kbm[22]; ?></td>
            <td><?php echo $kbm[23]; ?></td>
            <td><?php echo $kbm[24]; ?></td>
            <td><?php echo $kbm[25]; ?></td>
            <td><?php echo $kbm[26]; ?></td>
            <td><?php echo $kbm[27]; ?></td>
            <td><?php echo $kbm[28]; ?></td>
            <td><?php echo $kbm[29]; ?></td>
            <td><?php echo $kbm[30]; ?></td>
            <td><?php echo $kbm[31]; ?></td>
            <td><?php echo $kbm[32]; ?></td>
            <td><?php echo $kbm[33]; ?></td>

            <!-- --- ------ ------ --- - - -- - - -- - -   -- -- - --->
            <td><?php
                $luas = luas($row['lesen'], 'tanam_tukar09', 'tanaman_tukar');
                echo $luas[0];
                ?></td>
            <td><?php
                $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penukaran', '1', $luas[0]);
                echo $kbm[0];
                ?></td>
            <td><?php echo $kbm[1]; ?></td>
            <td><?php echo $kbm[2]; ?></td>
            <td><?php echo $kbm[3]; ?></td>
            <td><?php echo $kbm[4]; ?></td>
            <td><?php echo $kbm[5]; ?></td>
            <td><?php echo $kbm[6]; ?></td>
            <td><?php echo $kbm[7]; ?></td>
            <td><?php echo $kbm[8]; ?></td>
            <td><?php echo $kbm[9]; ?></td>
            <td><?php echo $kbm[10]; ?></td>
            <td><?php echo $kbm[11]; ?></td>

            <td><?php
                $luas = luas($row['lesen'], 'tanam_tukar08', 'tanaman_tukar');
                echo $luas[0];
                ?></td>
            <td><?php
                $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penukaran', '2', $luas[0]);
                echo $kbm[12];
                ?></td>
            <td><?php echo $kbm[13]; ?></td>
            <td><?php echo $kbm[14]; ?></td>
            <td><?php echo $kbm[15]; ?></td>
            <td><?php echo $kbm[16]; ?></td>
            <td><?php echo $kbm[17]; ?></td>
            <td><?php echo $kbm[18]; ?></td>
            <td><?php echo $kbm[19]; ?></td>
            <td><?php echo $kbm[20]; ?></td>
            <td><?php echo $kbm[21]; ?></td>
            <td><?php echo $kbm[22]; ?></td>
            <td><?php echo $kbm[23]; ?></td>
            <td><?php echo $kbm[24]; ?></td>
            <td><?php echo $kbm[25]; ?></td>
            <td><?php echo $kbm[26]; ?></td>
            <td><?php echo $kbm[27]; ?></td>
            <td><?php echo $kbm[28]; ?></td>
            <td><?php echo $kbm[29]; ?></td>
            <td><?php echo $kbm[30]; ?></td>
            <td><?php echo $kbm[31]; ?></td>
            <td><?php echo $kbm[32]; ?></td>
            <td><?php echo $kbm[33]; ?></td>


            <td><?php
                $luas = luas($row['lesen'], 'tanam_tukar07', 'tanaman_tukar');
                echo $luas[0];
                ?></td>
            <td><?php
                $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penukaran', '3', $luas[0]);
                echo $kbm[12];
                ?></td>
            <td><?php echo $kbm[13]; ?></td>
            <td><?php echo $kbm[14]; ?></td>
            <td><?php echo $kbm[15]; ?></td>
            <td><?php echo $kbm[16]; ?></td>
            <td><?php echo $kbm[17]; ?></td>
            <td><?php echo $kbm[18]; ?></td>
            <td><?php echo $kbm[19]; ?></td>
            <td><?php echo $kbm[20]; ?></td>
            <td><?php echo $kbm[21]; ?></td>
            <td><?php echo $kbm[22]; ?></td>
            <td><?php echo $kbm[23]; ?></td>
            <td><?php echo $kbm[24]; ?></td>
            <td><?php echo $kbm[25]; ?></td>
            <td><?php echo $kbm[26]; ?></td>
            <td><?php echo $kbm[27]; ?></td>
            <td><?php echo $kbm[28]; ?></td>
            <td><?php echo $kbm[29]; ?></td>
            <td><?php echo $kbm[30]; ?></td>
            <td><?php echo $kbm[31]; ?></td>
            <td><?php echo $kbm[32]; ?></td>
            <td><?php echo $kbm[33]; ?></td>

            <td><?php echo $nl[4]; ?></td>
            <td><?php
                $bts = bts($row['lesen']);
                echo $bts[0];
                ?></td>
            <td><?php
                $jaga = kos_matang_penjagaan($row['lesen'], $tahun, $nl[4], $bts[0]);
                echo $jaga[0];
                ?></td>
            <td><?php echo $jaga[1]; ?></td>
            <td><?php echo $jaga[2]; ?></td>
            <td><?php echo $jaga[3]; ?></td>
            <td><?php echo $jaga[4]; ?></td>
            <td><?php echo $jaga[5]; ?></td>
            <td><?php echo $jaga[6]; ?></td>
            <td><?php echo $jaga[7]; ?></td>
            <td><?php echo $jaga[8]; ?></td>
            <td><?php echo $jaga[9]; ?></td>
            <td><?php echo $jaga[10]; ?></td>
            <td><?php echo $jaga[11]; ?></td>
            <td><?php echo $jaga[12]; ?></td>
            <td><?php echo $jaga[13]; ?></td>
            <td><?php echo $jaga[14]; ?></td>
            <td><?php echo $jaga[15]; ?></td>
            <td><?php echo $jaga[16]; ?></td>
            <td><?php echo $jaga[17]; ?></td>
            <td><?php echo $jaga[18]; ?></td>
            <td><?php echo $jaga[19]; ?></td>

            <td><?php
                $kt = kos_matang_penuaian($row['lesen'], $tahun, $nl[4], $bts[0]);
                echo $kt[0];
                ?></td>
            <td><?php echo $kt[1]; ?></td>
            <td><?php echo $kt[2]; ?></td>
            <td><?php echo $kt[3]; ?></td>
            <td><?php echo $kt[4]; ?></td>
            <td><?php
                $ka = kos_matang_pengangkutan($row['lesen'], $tahun, $nl[4], $bts[0]);
                echo $ka[0];
                ?></td>
            <td><?php echo $ka[1]; ?></td>
            <td><?php echo $ka[2]; ?></td>
            <td><?php echo $ka[3]; ?></td>
            <td><?php echo $ka[4]; ?></td>
            <td><?php echo $ka[5]; ?></td>
            <td><?php echo $ka[6]; ?></td>
            <td><?php echo $ka[7]; ?></td>
            <td><?php echo $ka[8]; ?></td>
            <td><?php echo $ka[9]; ?></td>
            <td><?php
                $pab = belanja_am_kos($row['lesen'], $tahun, $nl[4], $bts[0]);
                echo $pab[0];
                ?></td>
            <td><?php echo $pab[1]; ?></td>
            <td><?php echo $pab[2]; ?></td>
            <td><?php echo $pab[3]; ?></td>
            <td><?php echo $pab[4]; ?></td>
            <td><?php echo $pab[5]; ?></td>
            <td><?php echo $pab[6]; ?></td>
            <td><?php echo $pab[7]; ?></td>
            <td><?php echo $pab[8]; ?></td>
            <td><?php echo $pab[9]; ?></td>
            <td><?php echo $pab[10]; ?></td>
            <td><?php echo $pab[11]; ?></td>
            <td><?php echo $pab[12]; ?></td>
            <td><?php echo $pab[13]; ?></td>
            <td><?php echo $pab[14]; ?></td>
            <td><?php echo $pab[15]; ?></td>
            <td><?php echo $pab[16]; ?></td>
            <td><?php echo $pab[17]; ?></td>
            <td><?php echo $pab[18]; ?></td>
            <td><?php echo $pab[19]; ?></td>
            <td><?php echo $pab[20]; ?></td>
            <td><?php echo $pab[21]; ?></td>
            <td><?php echo $pab[22]; ?></td>
            <td><?php echo $pab[23]; ?></td>
            <td><?php echo $pab[24]; ?></td>
            <td><?php echo $pab[25]; ?></td>
            <td><?php echo $pab[26]; ?></td>
            <td><?php echo $pab[27]; ?></td>
            <td><?php echo $pab[28]; ?></td>
            <td><?php echo $pab[29]; ?></td>
            <td><?php echo $pab[30]; ?></td>
            <td><?php echo $pab[31]; ?></td>
        </tr>
    <?php } ?>
</table>
<p>&nbsp;</p>
<table width="100%">
    <tr>
        <td>PB1</td>
        <td>PENANAMAN BARU TAHUN PERTAMA (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>PB2</td>
        <td>PENANAMAN BARU TAHUN KEDUA (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>PB3</td>
        <td>PENANAMAN BARU TAHUN KETIGA (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td width="3%">PS1</td>
        <td width="97%">PENANAMAN SEMULA TAHUN PERTAMA (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>PS2</td>
        <td>PENANAMAN SEMULA TAHUN KEDUA (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>PS3</td>
        <td>PENANAMAN SEMULA TAHUN KETIGA (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>PT1</td>
        <td>PENUKARAN TAHUN PERTAMA (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>PT2</td>
        <td>PENUKARAN TAHUN KEDUA (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>PT3</td>
        <td>PENUKARAN TAHUN KETIGA (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>KJ</td>
        <td>KOS PENJAGAAN (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>KJB</td>
        <td>KOS PENJAGAAN (Kos Per Tan BTS(RM))</td>
    </tr>
    <tr>
        <td>KT</td>
        <td>KOS PENUAIAN (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>KTB</td>
        <td>KOS PENUAIAN (Kos Per Tan BTS(RM))</td>
    </tr>
    <tr>
        <td>PAB</td>
        <td>PERBELANJAAN AM (Kos Per Hektar(RM))</td>
    </tr>
    <tr>
        <td>PABS</td>
        <td>PERBELANJAAN AM (Kos Per Tan BTS(RM))</td>
    </tr>
</table>
