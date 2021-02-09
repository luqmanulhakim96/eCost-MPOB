<?php
/* include('../Connections/connection.class.php');
  $tahun="2010";
  header("Content-type: application");
  header("Content-Disposition: attachment; filename=excel_data_estate_$tahun.xls"); */

error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');

extract($_REQUEST);
include("baju.php");
$con = connect();
//print_r($con);
set_time_limit(0);

$type = explode("_", $sub);
$qt1 = "select "
        . "* "
        . "from "
        . "analysis "
        . "where "
        . "type='" . $type[1] . "' "
        . "and year = '$tahun'";
$rt1 = mysqli_query($con, $qt1);
$total = mysqli_num_rows($rt1);

if ($total == 0) {
    $qa = "INSERT INTO `analysis` "
            . "(`type` ,"
            . "`year` ,"
            . "`modifiedby` ,"
            . "`modified`) "
            . "VALUES "
            . "("
            . "'" . $type[1] . "', "
            . "'$tahun', "
            . "'" . $_SESSION['email'] . "', "
            . "NOW()"
            . ") ";
    $ra = mysqli_query($con, $qa);
}
if ($total > 0) {
    $qa = "update  analysis "
            . "set modifiedby = '" . $_SESSION['email'] . "', "
            . "modified=NOW() "
            . "where "
            . "type='" . $type[1] . "' "
            . "and year = '$tahun'";
    $ra = mysqli_query($con, $qa);
}

$qdeletedata = "delete from analysis_kos_belum_matang where pb_thisyear = '$tahun' ";
$rdeletedata = mysqli_query($con, $qdeletedata);

$qdeletedata = "delete from analysis_kos_matang_penjagaan where pb_thisyear = '$tahun' ";
$rdeletedata = mysqli_query($con, $qdeletedata);

$qdeletedata = "delete from analysis_kos_matang_penuaian where pb_thisyear = '$tahun' ";
$rdeletedata = mysqli_query($con, $qdeletedata);

$qdeletedata = "delete from analysis_kos_matang_pengangkutan where pb_thisyear = '$tahun' ";
$rdeletedata = mysqli_query($con, $qdeletedata);

$qdeletedata = "delete from analysis_belanja_am_kos where pb_thisyear = '$tahun' ";
$rdeletedata = mysqli_query($con, $qdeletedata);
?>
<h2>Analysis Data Survey Estate for <?php echo $tahun; ?></h2>

<style>
    body {
        font-family:Tahoma ;
        font-size: 12px;

    }td,th {
        font-size: 12px;
    }

</style>
<style type="text/css">
    <!--
    div.scroll {
        height: 200px;
        width: 300px;
        overflow: auto;
        border: 1px solid #666;
        background-color: #ccc;
        padding: 8px;
    }
    -->
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

function esub($lesen, $tahun) {
    $table = "";
    if ($tahun == date('Y')) {
        $table = "esub";
    } else {
        $table = "esub_" . $tahun;
    }
    //$con=connect();
    global $con;
    $q = "select * from $table where NO_LESEN_BARU = '$lesen' limit 1 ";
    $r = mysqli_query($con, $q);
    if ($r) {
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
}

//----------------------------------------------------
function luas($lesen, $table, $field) {
    //$con=connect();
    global $con;
    $q = "select sum($field) as jumlah from $table where lesen = '$lesen' group by lesen limit 1 ";
    $r = mysqli_query($con, $q);

    if (mysqli_num_rows($r) > 0) {
        $row = mysqli_fetch_array($r);

        $sub[0] = round($row['jumlah'], 2);
    } else {
        $sub[0] = 0;
    }

    return $sub;
}

//---------------------------------------------------
function kos_belum_matang($lesen, $tahun, $type, $tahun_tanam, $keluasan, $negeri, $daerah) {
    //$con=connect();
    global $con;

    $q = "select * "
            . "from kos_belum_matang "
            . "where "
            . "lesen = '$lesen' "
            . "and pb_thisyear='$tahun' "
            . "and pb_tahun='$tahun_tanam' "
            . "and pb_type='$type' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    if ($keluasan > 0) {
        $sub[0] = round($row['a_1'] / $keluasan, 2); //Felling and land clearing
        $sub[1] = round($row['a_2'] / $keluasan, 2); //Terracing and platform
        $sub[2] = round($row['a_3'] / $keluasan, 2); //Road construction
        $sub[3] = round($row['a_4'] / $keluasan, 2); //Drain construction
        $sub[4] = round($row['a_5'] / $keluasan, 2); //Bund and watergate construction
        $sub[5] = round($row['a_6'] / $keluasan, 2); //Lining
        $sub[6] = round($row['a_7'] / $keluasan, 2); //Holing and planting
        $sub[7] = round($row['a_8'] / $keluasan, 2); //Basal fertiliser
        $sub[8] = round($row['a_9'] / $keluasan, 2); //Planting material
        $sub[9] = round($row['a_10'] / $keluasan, 2); //Cover crops
        $sub[10] = round($row['a_11'] / $keluasan, 2); //Other expenditures
        $sub[11] = round($row['total_a'] / $keluasan, 2);
        $sub[12] = round($row['b_1a'] / $keluasan, 2); //Purchase of weedicide
        $sub[13] = round($row['b_1b'] / $keluasan, 2); // Labour cost for weeding
        $sub[14] = round($row['b_1c'] / $keluasan, 2); //Machinery use and maintenance

        if ($row['total_b_1'] == 0) {
            $total_b_1 = $row['b_1a'] + $row['b_1b'] + $row['b_1c'];
        } else {
            $total_b_1 = $row['total_b_1'];
        }

        $sub[15] = round($total_b_1 / $keluasan, 2); //
        $sub[16] = round($row['total_b_2'] / $keluasan, 2); //Lalang control
        $sub[17] = round($row['b_3a'] / $keluasan, 2); //Purchase of fertilizer
        $sub[18] = round($row['b_3b'] / $keluasan, 2); //Labour cost to apply fertilizers
        $sub[19] = round($row['b_3c'] / $keluasan, 2); //Machinery use and maintenance
        $sub[20] = round($row['b_3d'] / $keluasan, 2); //Soil and foliar analysis

        if ($row['total_b_3'] == 0) {
            $total_b_3 = $row['b_3a'] + $row['b_3b'] + $row['b_3c'] + $row['b_3d'];
        } else {
            $total_b_3 = $row['total_b_3'];
        }

        $sub[21] = round($total_b_3 / $keluasan, 2); //
        $sub[22] = round($row['total_b_4'] / $keluasan, 2); //Soil and water conservation
        $sub[23] = round($row['total_b_5'] / $keluasan, 2); //Upkeep of roads, bridges, paths and etc.
        $sub[24] = round($row['total_b_6'] / $keluasan, 2); //Upkeep of drain
        $sub[25] = round($row['total_b_7'] / $keluasan, 2); //Upkeep of bunds and watergate
        $sub[26] = round($row['total_b_8'] / $keluasan, 2); //Boundaries and survey
        $sub[27] = round($row['total_b_9'] / $keluasan, 2); //Cover crops
        $sub[28] = round($row['total_b_10'] / $keluasan, 2); //Pest and diseases control
        $sub[29] = round($row['total_b_11'] / $keluasan, 2); //Pruning and palm sanitation
        $sub[30] = round($row['total_b_12'] / $keluasan, 2); //Census / supplies
        $sub[31] = round($row['total_b_13'] / $keluasan, 2); //Castration
        $sub[32] = round($row['total_b_14'] / $keluasan, 2); //Other Expenditures
        $sub[33] = round($row['total_b'] / $keluasan, 2);
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
        ;
        $sub[33] = 0;
    }

    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Felling and land clearing", $sub[0]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Terracing and platform", $sub[1]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Road construction", $sub[2]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Drain construction", $sub[3]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Bund and watergate construction", $sub[4]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Lining", $sub[5]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Holing and planting", $sub[6]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Basal fertiliser", $sub[7]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Planting material", $sub[8]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Cover crops", $sub[9]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Other expenditures", $sub[10]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Total Non-Recurrent Expenditures", $sub[11]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Purchase of weedicides", $sub[12]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Labour cost for weeding", $sub[13]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Machinery use and maintenance", $sub[14]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Weeding", $sub[15]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Lalang control", $sub[16]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Purchase of fertilizer", $sub[17]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Labour cost to apply fertilizers", $sub[18]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Machinery use and maintenances", $sub[19]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Soil and foliar analysis", $sub[20]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Fertilizing", $sub[21]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Soil and water conservation", $sub[22]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Upkeep of roads, bridges, paths and etc", $sub[23]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Upkeep of drain", $sub[24]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Upkeep of bunds and watergate", $sub[25]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Boundaries and survey", $sub[26]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Cover crop", $sub[27]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Pest and diseases control", $sub[28]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Pruning and palm sanitation", $sub[29]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Census / supplies", $sub[30]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Castration", $sub[31]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Others Expenditure", $sub[32]);
    add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Total Upkeep", $sub[33]);

    $qdelete = "delete from analysis_kos_belum_matang where nilai=0";
    $rdelete = mysqli_query($con, $qdelete);
    return $sub;
}

function add_kbm($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, $bkm_nama, $nilai) {
    //$con=connect();
    global $con;
    $q = "INSERT INTO analysis_kos_belum_matang "
            . "(pb_tahun ,"
            . "pb_thisyear ,"
            . "lesen ,"
            . "pb_type ,"
            . "bkm_nama ,"
            . "nilai ,"
            . "negeri ,"
            . "daerah"
            . ") "
            . "VALUES "
            . "("
            . "'$tahun_tanam' ,"
            . "'$tahun' ,"
            . "'$lesen' ,"
            . "'$type' ,"
            . "'$bkm_nama' ,"
            . "'$nilai' ,"
            . "'$negeri' ,"
            . "'$daerah'"
            . ");";
    $r = mysqli_query($con, $q);
    //$qdelete ="delete from analysis_kos_belum_matang where nilai=0";
    //$rdelete = mysql_query($qdelete,$con);
}

//-----------------------------------------
function bts($var, $tahun) {
    if ($tahun == date('Y')) {
        $table = "fbb_production";
        $vari = $var;
    } else {
        $table = "fbb_production" . $tahun;
        $vari = substr($var, 0, -1);
    }

    //$con = connect();
    global $con;

    $q = "select * from $table where lesen ='" . $vari . "'";
    $r = mysqli_query($con, $q);
    if (mysqli_num_rows($r) > 0) {
        $row = mysqli_fetch_array($r);
        $sub[0] = round($row['purata_hasil_buah'], 2);
        return $sub;
    } else {
        return 0;
    }
}

function kos_matang_penjagaan($lesen, $tahun, $jum_tanam, $jum_bts, $negeri, $daerah) {
    //$con=connect();
    global $con;

    $q = "select * from kos_matang_penjagaan where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    if ($jum_tanam > 0) {
        $sub[0] = round($row['b_1a'] / $jum_tanam, 2); // purchase of weedicide
        $sub[1] = round($row['b_1b'] / $jum_tanam, 2); //labour cost for weeding
        $sub[2] = round($row['b_1c'] / $jum_tanam, 2); //machinery use and maintenance
        $sub[3] = round($row['total_b_1'] / $jum_tanam, 2); //weeding
        $sub[4] = round($row['total_b_2'] / $jum_tanam, 2); //lalang control
        $sub[5] = round($row['b_3a'] / $jum_tanam, 2); //purchase of fertilizer
        $sub[6] = round($row['b_3b'] / $jum_tanam, 2); //labour cost to apply fertilizer
        $sub[7] = round($row['b_3c'] / $jum_tanam, 2); //machiney use and maintenance
        $sub[8] = round($row['b_3d'] / $jum_tanam, 2); //soil and foliar analysis
        $sub[9] = round($row['total_b_3'] / $jum_tanam, 2); //fertilizing
        $sub[10] = round($row['total_b_4'] / $jum_tanam, 2); //soil and water conservation
        $sub[11] = round($row['total_b_5'] / $jum_tanam, 2); //upkeep of roads, bridges and path etc
        $sub[12] = round($row['total_b_6'] / $jum_tanam, 2); //upkeep of drains
        $sub[13] = round($row['total_b_7'] / $jum_tanam, 2); //upkeep of bunds, boundaries
        $sub[14] = round($row['total_b_8'] / $jum_tanam, 2); //pest and disease control
        $sub[15] = round($row['total_b_9'] / $jum_tanam, 2); //prunning and palm sanitation
        $sub[16] = round($row['total_b_10'] / $jum_tanam, 2); //census / supplies
        $sub[17] = round($row['total_b_11'] / $jum_tanam, 2); //mandore wages
        $sub[18] = round($row['total_b_12'] / $jum_tanam, 2); //other expenditures
        $sub[19] = round($row['total_b'] / $jum_tanam, 2);
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

    if ($jum_bts > 0) {
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


    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[0], $sub[20], "i. Purchase of weedicide");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[1], $sub[21], "ii. Labour cost for weeding");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[2], $sub[22], "iii. Machinery use and maintenances");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[3], $sub[23], "Weeding");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[4], $sub[24], "Lalang control");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[5], $sub[25], "i. Purchase of fertilizer");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[6], $sub[26], "ii.Labour cost to apply fertilizers");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[7], $sub[27], "iii. Machinery use and maintenance");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[8], $sub[28], "iv. Soil and foliar analysis");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[9], $sub[29], "Fertilizing");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[10], $sub[30], "Soil / water conservation ");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[11], $sub[31], "Upkeep of roads, bridges, paths etc.");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[12], $sub[32], "Upkeep drains");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[13], $sub[33], "Upkeeps of bunds, boundaries and Watergates");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[14], $sub[34], "Pests and diseases control");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[15], $sub[35], "Pruning and palm sanitation");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[16], $sub[36], "Census / supplies ");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[17], $sub[37], "Mandore wages/ direct field supervision costs ");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[18], $sub[38], "Other expenditure");
    add_kmp($lesen, $tahun, $negeri, $daerah, $sub[19], $sub[39], "Total Upkeep");

    $qdelete = "delete from "
            . "analysis_kos_matang_penjagaan  "
            . "where "
            . "kos_per_hektar=0 "
            . "and kos_per_tan=0";
    $rdelete = mysqli_query($con, $qdelete);
    return $sub;
}

//------------------------------------- add kos matang penjagaan ---------------------------
function add_kmp($lesen, $tahun, $negeri, $daerah, $nilai_hektar, $nilai_tan, $km_nama) {
    //$con=connect();
    global $con;


    $q = "INSERT INTO analysis_kos_matang_penjagaan "
            . "(pb_thisyear ,lesen ,km_nama ,kos_per_hektar ,kos_per_tan ,negeri ,daerah) "
            . "VALUES ('$tahun', '$lesen', '$km_nama', '$nilai_hektar', '$nilai_tan', '$negeri', '$daerah');";
    $r = mysqli_query($con, $q);

    //$qdelete ="delete from analysis_kos_matang_penjagaan  where kos_per_hektar=0 and kos_per_tan=0";
    //$rdelete = mysql_query($qdelete,$con);
}

//----------------------------------------------------------------
function kos_matang_penuaian($lesen, $tahun, $jum_tanam, $jum_bts, $negeri, $daerah) {
    //$con=connect();
    global $con;
    $q = "select * from kos_matang_penuaian where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    if ($jum_tanam > 0) {
        $sub[0] = round($row['a_1'] / $jum_tanam, 2); //Harveting tools
        $sub[1] = round($row['a_2'] / $jum_tanam, 2); //Harveting and collection of FFB and loose fruit
        $sub[2] = round($row['a_3'] / $jum_tanam, 2); //Mandore wages / direct fields supervision cost
        $sub[3] = round($row['a_4'] / $jum_tanam, 2); //machinery use and maintenance
        $sub[4] = round($row['total_b'] / $jum_tanam, 2);
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

    add_kmptuai($lesen, $tahun, $negeri, $daerah, $sub[0], $sub[5], "Harvesting tools ");
    add_kmptuai($lesen, $tahun, $negeri, $daerah, $sub[1], $sub[6], "Harvesting and collection of FFB and loose fruit");
    add_kmptuai($lesen, $tahun, $negeri, $daerah, $sub[2], $sub[7], "Mandore wages/ direct field supervision costs");
    add_kmptuai($lesen, $tahun, $negeri, $daerah, $sub[3], $sub[8], "Machinery use and maintenance ");
    add_kmptuai($lesen, $tahun, $negeri, $daerah, $sub[4], $sub[9], "Total Harvesting");

    $qdelete = "delete from analysis_kos_matang_penuaian  where kos_per_hektar=0 and kos_per_tan=0";
    $rdelete = mysqli_query($con, $qdelete);
    return $sub;
}

//------------------------------------- add kos matang penjagaan ---------------------------
function add_kmptuai($lesen, $tahun, $negeri, $daerah, $nilai_hektar, $nilai_tan, $km_nama) {
    //$con=connect();
    global $con;


    $q = "INSERT INTO analysis_kos_matang_penuaian "
            . "(pb_thisyear ,lesen ,km_nama ,kos_per_hektar ,kos_per_tan ,negeri ,daerah) "
            . "VALUES ('$tahun', '$lesen', '$km_nama', '$nilai_hektar', '$nilai_tan', '$negeri', '$daerah');";
    $r = mysqli_query($con, $q);

    //$qdelete ="delete from analysis_kos_matang_penuaian  where kos_per_hektar=0 and kos_per_tan=0";
    //$rdelete = mysql_query($qdelete,$con);
}

//----------------------------------------------------------------
//----------------------------------------------------------------
function kos_matang_pengangkutan($lesen, $tahun, $jum_tanam, $jum_bts, $negeri, $daerah) {
    //$con=connect();
    global $con;
    $q = "select * from kos_matang_pengangkutan where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    if ($jum_tanam > 0) {
        $sub[0] = round($row['a_1'] / $jum_tanam, 2); //Platform
        $sub[1] = round($row['a_2'] / $jum_tanam, 2); //Ramp
        $sub[2] = round($row['a_3'] / $jum_tanam, 2); //Ramp Upkeep
        $sub[3] = round($row['total_a'] / $jum_tanam, 2); //Internal
        $sub[4] = round($row['b_1a'] / $jum_tanam, 2); //Mainline transportation cost from platform to loading centre or mill
        $sub[5] = round($row['b_1b'] / $jum_tanam, 2); //Upkeep of tractor & trailer, lorry, etc
        $sub[6] = round($row['b_1c'] / $jum_tanam, 2); //River transport
        $sub[7] = round($row['total_b_1'] / $jum_tanam, 2); //External
        $sub[8] = round($row['total_b_2'] / $jum_tanam, 2); //Other Expenditure
        $sub[9] = round($row['total_b'] / $jum_tanam, 2);
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


    add_kmpangkut($lesen, $tahun, $negeri, $daerah, $sub[0], $sub[10], "a) Platform");
    add_kmpangkut($lesen, $tahun, $negeri, $daerah, $sub[1], $sub[11], "b) Ramp");
    add_kmpangkut($lesen, $tahun, $negeri, $daerah, $sub[2], $sub[12], "ii. Ramp upkeep");
    add_kmpangkut($lesen, $tahun, $negeri, $daerah, $sub[3], $sub[13], "Internal");
    add_kmpangkut($lesen, $tahun, $negeri, $daerah, $sub[4], $sub[14], "i. Meanline transportation cost from platform to loading centre or mill");
    add_kmpangkut($lesen, $tahun, $negeri, $daerah, $sub[5], $sub[15], "ii. Upkeep of tractor and trailer, lorry, etc");
    add_kmpangkut($lesen, $tahun, $negeri, $daerah, $sub[6], $sub[16], "iii. River transport");
    add_kmpangkut($lesen, $tahun, $negeri, $daerah, $sub[7], $sub[17], "External");
    add_kmpangkut($lesen, $tahun, $negeri, $daerah, $sub[8], $sub[18], "Other expenditures");
    add_kmpangkut($lesen, $tahun, $negeri, $daerah, $sub[9], $sub[19], "Total Transportation");

    $qdelete = "delete from analysis_kos_matang_pengangkutan where kos_per_hektar=0 and kos_per_tan=0";
    $rdelete = mysqli_query($con, $qdelete);
    return $sub;
}

//-----------------------------------------------------------------
//------------------------------------- add kos matang penjagaan ---------------------------
function add_kmpangkut($lesen, $tahun, $negeri, $daerah, $nilai_hektar, $nilai_tan, $km_nama) {
    //$con=connect();
    global $con;


    $q = "INSERT INTO analysis_kos_matang_pengangkutan "
            . "(pb_thisyear ,lesen ,km_nama ,kos_per_hektar ,kos_per_tan ,negeri ,daerah) "
            . "VALUES ('$tahun', '$lesen', '$km_nama', '$nilai_hektar', '$nilai_tan', '$negeri', '$daerah');";
    $r = mysqli_query($con, $q);

    //$qdelete ="delete from analysis_kos_matang_pengangkutan where kos_per_hektar=0 and kos_per_tan=0";
    //$rdelete = mysql_query($qdelete,$con);
}

//----------------------------------------------------------------

function kos_belanja_am($lesen, $tahun, $hektar, $bts, $negeri, $daerah) {
    //$con=connect();
    global $con;
    $q = "select * from belanja_am_kos where lesen = '$lesen' and thisyear='$tahun' limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    if ($hektar > 0) {
        $sub[0] = round($row['emolumen'] / $hektar, 2);
        $sub[1] = round($row['kos_ibupejabat'] / $hektar, 2);
        $sub[2] = round($row['kos_agensi'] / $hektar, 2);
        $sub[3] = round($row['kebajikan'] / $hektar, 2);
        $sub[4] = round($row['sewa_tol'] / $hektar, 2);
        $sub[5] = round($row['penyelidikan'] / $hektar, 2);
        $sub[6] = round($row['perubatan'] / $hektar, 2);
        $sub[7] = round($row['penyelenggaraan'] / $hektar, 2);
        $sub[8] = round($row['cukai_keuntungan'] / $hektar, 2);
        $sub[9] = round($row['penjagaan'] / $hektar, 2);
        $sub[10] = round($row['kawalan'] / $hektar, 2);
        $sub[11] = round($row['air_tenaga'] / $hektar, 2);
        $sub[12] = round($row['perbelanjaan_pejabat'] / $hektar, 2);
        $sub[13] = round($row['susut_nilai'] / $hektar, 2);
        $sub[14] = round($row['perbelanjaan_lain'] / $hektar, 2);
        $sub[15] = round($row['total_perbelanjaan'] / $hektar, 2);
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
        $sub[10] = 0;
        $sub[11] = 0;
        $sub[12] = 0;
        $sub[13] = 0;
        $sub[14] = 0;
        $sub[15] = 0;
    }

    if ($bts > 0) {
        $sub[16] = round($sub[0] / $bts, 2);
        $sub[17] = round($sub[1] / $bts, 2);
        $sub[18] = round($sub[2] / $bts, 2);
        $sub[19] = round($sub[3] / $bts, 2);
        $sub[20] = round($sub[4] / $bts, 2);
        $sub[21] = round($sub[5] / $bts, 2);
        $sub[22] = round($sub[6] / $bts, 2);
        $sub[23] = round($sub[7] / $bts, 2);
        $sub[24] = round($sub[8] / $bts, 2);
        $sub[25] = round($sub[9] / $bts, 2);
        $sub[26] = round($sub[10] / $bts, 2);
        $sub[27] = round($sub[11] / $bts, 2);
        $sub[28] = round($sub[12] / $bts, 2);
        $sub[29] = round($sub[13] / $bts, 2);
        $sub[30] = round($sub[14] / $bts, 2);
        $sub[31] = round($sub[15] / $bts, 2);
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

    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[0], $sub[16], "Executive and non-executive emoluments");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[1], $sub[17], "Headquarters Cost");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[2], $sub[18], "Agency cost and professional fees");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[3], $sub[19], "Unpaid welfare to labour");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[4], $sub[20], "Rent, TOL and insurance");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[5], $sub[21], "Research and development");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[6], $sub[22], "Medical");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[7], $sub[23], "Building maintenance");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[8], $sub[24], "Extraordinary profit tax");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[9], $sub[25], "Upkeep and conservation");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[10], $sub[26], "Security Control");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[11], $sub[27], "Water and power");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[12], $sub[28], "Office expenses");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[13], $sub[29], "Value depreciation");
    add_belanja_am($lesen, $tahun, $negeri, $daerah, $sub[14], $sub[30], "Other expenses");
    //add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[15], $sub[31], "Total General Chargers");

    $qdelete = "delete from analysis_belanja_am_kos where kos_per_hektar=0 and kos_per_tan=0";
    $rdelete = mysqli_query($con, $qdelete);
    return $sub;
}

function luas_data($table, $data, $tahunsebelum, $lesen) {

    if (strlen($tahunsebelum) == 1) {
        $table = $table . "0" . substr($tahunsebelum, -2);
    } else {
        $table = $table . substr($tahunsebelum, -2);
    }
    //$con = connect();
    global $con;
    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '$lesen' group by lesen";
    $rblm = mysqli_query($con, $qblm);
    if ($rblm) {
        $rowblm = mysqli_fetch_array($rblm);
        //echo "<br>";
        $data1 = $rowblm[$data];
        $jum_data = $data1;

        return $jum_data;
    } else {
        return 0;
    }
}

//------------------------------------- add kos perbelanjaan am ---------------------------
function add_belanja_am($lesen, $tahun, $negeri, $daerah, $nilai_hektar, $nilai_tan, $km_nama) {
    //$con=connect();
    global $con;


    $q = "INSERT INTO analysis_belanja_am_kos (pb_thisyear ,lesen ,km_nama ,kos_per_hektar ,kos_per_tan ,negeri ,daerah) "
            . "VALUES ('$tahun', '$lesen', '$km_nama', '$nilai_hektar', '$nilai_tan', '$negeri', '$daerah');";
    $r = mysqli_query($con, $q);

    //$qdelete ="delete from analysis_belanja_am_kos where kos_per_hektar=0 and kos_per_tan=0";
    //$rdelete = mysql_query($qdelete,$con);
}
?>


<title>Data Estet Survey</title>

<link rel="stylesheet" href="styles/progressbar.css">
<div class="progress"> <span class="blue" style="width:0%;"><span>0%</span></span> </div>
<script type='text/javascript'>
    function loading(percent) {
        $('.progress span').animate({width: percent}, 100, function () {
            $(this).children().html(percent);
            if (percent == '100%') {
                $(this).children().html('All data has been finish analysis');
            }
        })
    }
</script>

<?php
//$con=connect();
/*$q = "select * from login_estate where "
        . " success!='0000-00-00 00:00:00' "
        . " and firsttime ='2' "
        . " and lesen not like '123456%' "
        . " and lesen <> '' "
        . " group by lesen order by lesen ";*/

if ($tahun == date('Y')) {
    $table = 'esub';
} else {
    $table = "esub_" . $tahun;
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

//echo $q;
$r = mysqli_query($con, $q);
$total_data_proses = mysqli_num_rows($r);


$bil = 0;

$tahun_pendek = substr($tahun, -2);
$one = $tahun_pendek - 1;
if (strlen($one) == '1') {
    $one = "0" . $one;
}
$two = $tahun_pendek - 2;
if (strlen($two) == '1') {
    $two = "0" . $two;
}
$three = $tahun_pendek - 3;
if (strlen($three) == '1') {
    $three = "0" . $three;
}
$kiraan = 1;

while ($row = mysqli_fetch_array($r)) {
    $percentage = round($kiraan / $total_data_proses, 2) * 100;

    echo "<script type=\"text/javascript\">loading('" . $percentage . "%');</script> ";

    //$pbar->set_percent_adv($bil, $total_data_proses);

    $ps1 = luas_data("tanam_semula", "tanaman_semula", $tahun - 1, $row['lesen']);
    $ps2 = luas_data("tanam_semula", "tanaman_semula", $tahun - 2, $row['lesen']);
    $ps3 = luas_data("tanam_semula", "tanaman_semula", $tahun - 3, $row['lesen']);

    $pb1 = luas_data("tanam_baru", "tanaman_baru", $tahun - 1, $row['lesen']);
    $pb2 = luas_data("tanam_baru", "tanaman_baru", $tahun - 2, $row['lesen']);
    $pb3 = luas_data("tanam_baru", "tanaman_baru", $tahun - 3, $row['lesen']);

    $pt1 = luas_data("tanam_tukar", "tanaman_tukar", $tahun - 1, $row['lesen']);
    $pt2 = luas_data("tanam_tukar", "tanaman_tukar", $tahun - 2, $row['lesen']);
    $pt3 = luas_data("tanam_tukar", "tanaman_tukar", $tahun - 3, $row['lesen']);

    $jumlah_semua = $pb1 + $pb2 + $pb3 + $ps1 + $ps2 + $ps3 + $pt1 + $pt2 + $pt3;
    $nl = esub($row['lesen'], $tahun);
    $es = estate_info($row['lesen']);

    $luas = luas($row['lesen'], "tanam_baru" . $one, 'tanaman_baru');
    $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Baru', '1', $luas[0], $nl[1], $nl[2]);
    $luas = luas($row['lesen'], "tanam_baru" . $two, 'tanaman_baru');
    $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Baru', '2', $luas[0], $nl[1], $nl[2]);
    $luas = luas($row['lesen'], "tanam_baru" . $three, 'tanaman_baru');
    $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Baru', '3', $luas[0], $nl[1], $nl[2]);
    $luas = luas($row['lesen'], "tanam_semula" . $one, 'tanaman_semula');
    $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Semula', '1', $luas[0], $nl[1], $nl[2]);
    $luas = luas($row['lesen'], "tanam_semula" . $two, 'tanaman_semula');
    $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Semula', '2', $luas[0], $nl[1], $nl[2]);
    $luas = luas($row['lesen'], "tanam_semula" . $three, 'tanaman_semula');
    $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penanaman Semula', '3', $luas[0], $nl[1], $nl[2]);
    $luas = luas($row['lesen'], "tanam_tukar" . $one, 'tanaman_tukar');
    $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penukaran', '1', $luas[0], $nl[1], $nl[2]);
    $luas = luas($row['lesen'], "tanam_tukar" . $two, 'tanaman_tukar');
    $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penukaran', '2', $luas[0], $nl[1], $nl[2]);
    $luas = luas($row['lesen'], "tanam_tukar" . $three, 'tanaman_tukar');
    $kbm = kos_belum_matang($row['lesen'], $tahun, 'Penukaran', '3', $luas[0], $nl[1], $nl[2]);
    $bts = bts($row['lesen'], $tahun);
    $jaga = kos_matang_penjagaan($row['lesen'], $tahun, $nl[4], $bts[0], $nl[1], $nl[2]);
    $kt = kos_matang_penuaian($row['lesen'], $tahun, $nl[4], $bts[0], $nl[1], $nl[2]);
    $ka = kos_matang_pengangkutan($row['lesen'], $tahun, $nl[4], $bts[0], $nl[1], $nl[2]);
    $kba = kos_belanja_am($row['lesen'], $tahun, $nl[6], $bts[0], $nl[1], $nl[2]);
    $kiraan = $kiraan + 1;
}
?>
<br />
To download raw data, go to menu <a href="admin/home.php?id=summary&amp;sub=summary_map">Summary</a>
<script>
    alert('All data has been finish analysis');
</script>
