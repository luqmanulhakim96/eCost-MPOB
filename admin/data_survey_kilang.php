<?php
session_start();

include('../Connections/connection.class.php');
if ($_SESSION['type'] <> "admin")
    header("location:../logout.php");

extract($_REQUEST);
$tarikh_report = date("d-m-y");
header("Content-type: application");
header("Content-Disposition: attachment; filename=excel_data_kilang_$tahun($tarikh_report).xls");
include("baju.php");
$con = connect();
error_reporting(1);
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

function ekilang($lesen) {
    $con = connect();
    $q = "select NAMA_KILANG, NEGERI, SYARIKAT_INDUK, SUM(FFB_PROSES) as FFB_PROSES from ekilang where NO_LESEN = '$lesen' group by NO_LESEN limit 1 ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    $sub[0] = $row['NAMA_KILANG'];
    $sub[1] = $row['NEGERI'];
    $sub[2] = $row['SYARIKAT_INDUK'];
    $sub[3] = $row['FFB_PROSES'];

    return $sub;
}

//--------------------------
function mill_pemprosesan($lesen, $tahun, $ffb) {
    $con = connect();
    $q = "select * from mill_pemprosesan where lesen ='$lesen' and tahun='$tahun' ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    /* $sub[0] = round($row['kp_1'] / $ffb, 2);
      $sub[1] = round($row['kp_2'] / $ffb, 2);
      $sub[2] = round($row['kp_3'] / $ffb, 2);
      $sub[3] = round($row['kp_4'] / $ffb, 2);
      $sub[4] = round($row['kp_5'] / $ffb, 2);
      $sub[5] = round($row['kp_6'] / $ffb, 2);
      $sub[6] = round($row['kp_7'] / $ffb, 2);
      $sub[7] = round($row['kp_8'] / $ffb, 2);
      $sub[8] = round($row['kp_9'] / $ffb, 2);
      $sub[9] = round($row['kp_10'] / $ffb, 2);
      $sub[10] = round($row['kp_11'] / $ffb, 2);
      $sub[11] = round($row['kp_12'] / $ffb, 2);
      $sub[12] = round($row['kp_13'] / $ffb, 2);
      $sub[13] = round($row['kp_14'] / $ffb, 2);
      $sub[14] = round($row['kp_15'] / $ffb, 2);
      $sub[15] = round($row['total_kp'] / $ffb, 2); */

    $sub[0] = $row['kp_1'];
    $sub[1] = $row['kp_2'];
    $sub[2] = $row['kp_3'];
    $sub[3] = $row['kp_4'];
    $sub[4] = $row['kp_5'];
    $sub[5] = $row['kp_6'];
    $sub[6] = $row['kp_7'];
    $sub[7] = $row['kp_8'];
    $sub[8] = $row['kp_9'];
    $sub[9] = $row['kp_10'];
    $sub[10] = $row['kp_11'];
    $sub[11] = $row['kp_12'];
    $sub[12] = $row['kp_13'];
    $sub[13] = $row['kp_14'];
    $sub[14] = $row['kp_15'];
    $sub[15] = $row['total_kp'];


    return $sub;
}

//--------------------------
function mill_info($lesen) {
    $con = connect();
    $q = "select * from mill_info where lesen ='$lesen'  ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    $sub[0] = $row['syarikat'];
    $sub[1] = $row['integrasi'];
    $sub[2] = $row['teknologi'];
    $sub[3] = $row['tahun_operasi'];

    $sub[4] = $row['lesenlama'];
    $sub[5] = $row['syarikatinduk'];
    $sub[6] = $row['daerahpremis'];
    $sub[7] = $row['kapasiti'];



    return $sub;
}

//------------------------------------
function mill_koslain($lesen, $tahun, $ffb) {
    $con = connect();
    $q = "select * from mill_kos_lain where lesen ='$lesen' and tahun='$tahun' ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    $sub[0] = $row['kl_1'];
    $sub[1] = $row['kl_2'];
    $sub[2] = $row['kl_3'];
    $sub[3] = $row['kl_4'];
    $sub[4] = $row['kl_5'];
    $sub[5] = $row['total_kl'];

    /*
      $sub[0] = round($row['kl_1'] / $ffb, 2);
      $sub[1] = round($row['kl_2'] / $ffb, 2);
      $sub[2] = round($row['kl_3'] / $ffb, 2);
      $sub[3] = round($row['kl_4'] / $ffb, 2);
      $sub[4] = round($row['kl_5'] / $ffb, 2);
      $sub[5] = round($row['total_kl'] / $ffb, 2);
     */

    return $sub;
}

//-------------------------------------------------
function mill_buruh($lesen, $tahun) {
    $con = connect();
    $q = "select * from mill_buruh where lesen ='$lesen' and tahun='$tahun' ";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);

    $sub[0] = $row['mb_1'];
    $sub[1] = $row['mb_2'];
    $sub[2] = $row['mb_3'];
    $sub[3] = $row['mb_4'];
    $sub[4] = $row['mb_5'];
    $sub[5] = $row['total_mb'];
    $sub[6] = $row['mb_1b'];
    $sub[7] = $row['mb_2b'];
    $sub[8] = $row['mb_3b'];
    $sub[9] = $row['mb_4b'];
    $sub[10] = $row['mb_5b'];
    $sub[11] = $row['total_mb_b'];
    $sub[12] = $row['mb_1c'];
    $sub[13] = $row['mb_2c'];
    $sub[14] = $row['mb_3c'];
    $sub[15] = $row['mb_4c'];
    $sub[16] = $row['mb_5c'];
    $sub[17] = $row['total_mb_c'];

    return $sub;
}

//-------------------------------------------------
?>


<title>Data Survey Kilang <?php echo $tahun; ?>(<?php echo $tarikh_report; ?>)</title>
<?php
//$tahun = "2010";

?>
<table width="100%" class="baju">
    <tr>
        <th width="3%">Bil.</th>
        <th width="19%">No.Lesen</th>
        <th width="17%">Nama Estet</th>
        <th width="22%">Negeri</th>
        <th width="10%">Syarikat Induk</th>
        <th width="10%">syarikat</th>
        <th width="10%">integrasi</th>
        <th width="10%">teknologi</th>
        <th width="10%">tahun_operasi</th>
        <th width="10%">lesenlama</th>
        <th width="10%">syarikatinduk</th>
        <th width="10%">daerahpremis</th>
        <th width="10%">negeripremis</th>
        <th width="10%">kapasiti</th>
        <th width="2%"><strong>BTS </strong></th>
        <th width="2%"><strong>a_1</strong></th>
        <th width="2%"><strong>a_2</strong></th>
        <th width="2%"><strong>a_3</strong></th>
        <th width="2%"><strong>a_4</strong></th>
        <th width="2%"><strong>a_5</strong></th>
        <th width="3%"><strong>a_6</strong></th>
        <th width="3%"><strong>a_7</strong></th>
        <th width="3%"><strong>a_8</strong></th>
        <th width="3%"><strong>a_9</strong></th>
        <th width="3%"><strong>a_10</strong></th>
        <th width="3%"><strong>a_11</strong></th>
        <th width="3%"><strong>a_12</strong></th>
        <th width="3%"><strong>a_13</strong></th>
        <th width="3%"><strong>a_14</strong></th>
        <th width="3%"><strong>a_15</strong></th>
        <th width="3%"><strong>total_a</strong></th>
        <th width="3%">kl_1</th>
        <th width="3%">kl_2</th>
        <th width="3%">kl_3</th>
        <th width="3%">kl_4</th>
        <th width="3%">kl_5</th>
        <th width="3%">total_kl</th>
        <th width="3%">mb_1</th>
        <th width="3%">mb_2</th>
        <th width="3%">mb_3</th>
        <th width="3%">mb_4</th>
        <th width="3%">mb_5</th>
        <th width="3%">total_mb</th>
        <th width="3%">mb_1b</th>
        <th width="3%">mb_2b</th>
        <th width="3%">mb_3b</th>
        <th width="3%">mb_4b</th>
        <th width="3%">mb_5b</th>
        <th width="3%">total_mb_b</th>
        <th width="3%">mb_1c</th>
        <th width="3%">mb_2c</th>
        <th width="3%">mb_3c</th>
        <th width="3%">mb_4c</th>
        <th width="3%">mb_5c</th>
        <th width="3%">total_mb_c</th>
    </tr>
    <?php
    $con = connect();
    /*$q = "select * from login_mill where success!='0000-00-00 00:00:00' and lesen like '500%'   group by lesen order by lesen ";*/

    $tahunsebelum = $tahun-1;

	$q ="SELECT ekilang.no_lesen as lesen FROM ekilang
      LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen
      LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = '$tahun'
	  LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun ='$tahun'
	  LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen
	  LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen
	  WHERE
	  ekilang.tahun = '$tahunsebelum'
	 AND (mill_kos_lain.total_kl > 0 or mill_pemprosesan.total_kp > 0)
	 GROUP BY ekilang.no_lesen";


    $r = mysqli_query($con, $q);
    $bil = 0;
    while ($row = mysqli_fetch_array($r)) {
        ?>
        <tr <?php if ($bil % 2 == 0) { ?>class="alt"<?php } ?>>
            <td><?php echo ++$bil; ?>. </td>
            <td><?php echo $row['lesen']; ?></td>
            <td><?php $nl = ekilang($row['lesen']);
    echo $nl[0];
        ?></td>
            <td><?php echo $nl[1]; ?></td>
            <td><?php echo $nl[2]; ?></td>
            <td><?php echo $mi = mill_info($row['lesen']); ?><?php echo $mi[0]; ?></td>
            <td><?php echo $mi[1]; ?></td>
            <td><?php echo $mi[2]; ?></td>
            <td><?php echo $mi[3]; ?></td>
            <td><?php echo $mi[4]; ?></td>
            <td><?php echo $mi[5]; ?></td>
            <td><?php echo $mi[6]; ?></td>
            <td><?php echo $mi[7]; ?></td>
            <td><?php echo $mi[8]; ?></td>
            <td><?php echo $ffb = round($nl[3], 2); ?></td>
            <td><?php $ml = mill_pemprosesan($row['lesen'], $tahun, $ffb);
            echo $ml[0];
            ?></td>
            <td><?php echo $ml[1]; ?></td>
            <td><?php echo $ml[2]; ?></td>
            <td><?php echo $ml[3]; ?></td>
            <td><?php echo $ml[4]; ?></td>
            <td><?php echo $ml[5]; ?></td>
            <td><?php echo $ml[6]; ?></td>
            <td><?php echo $ml[7]; ?></td>
            <td><?php echo $ml[8]; ?></td>
            <td><?php echo $ml[9]; ?></td>
            <td><?php echo $ml[10]; ?></td>
            <td><?php echo $ml[11]; ?></td>
            <td><?php echo $ml[12]; ?></td>
            <td><?php echo $ml[13]; ?></td>
            <td><?php echo $ml[14]; ?></td>
            <td><?php echo $ml[15]; ?></td>
            <td><?php $mk = mill_koslain($row['lesen'], $tahun, $ffb);
            echo $mk[0];
            ?></td>
            <td><?php echo $mk[1]; ?></td>
            <td><?php echo $mk[2]; ?></td>
            <td><?php echo $mk[3]; ?></td>
            <td><?php echo $mk[4]; ?></td>
            <td><?php echo $mk[5]; ?></td>
            <td><?php $mb = mill_buruh($row['lesen'], $tahun);
            echo $mb[0];
            ?></td>
            <td><?php echo $mb[1]; ?></td>
            <td><?php echo $mb[2]; ?></td>
            <td><?php echo $mb[3]; ?></td>
            <td><?php echo $mb[4]; ?></td>
            <td><?php echo $mb[5]; ?></td>
            <td><?php echo $mb[6]; ?></td>
            <td><?php echo $mb[7]; ?></td>
            <td><?php echo $mb[8]; ?></td>
            <td><?php echo $mb[9]; ?></td>
            <td><?php echo $mb[10]; ?></td>
            <td><?php echo $mb[11]; ?></td>
            <td><?php echo $mb[12]; ?></td>
            <td><?php echo $mb[13]; ?></td>
            <td><?php echo $mb[14]; ?></td>
            <td><?php echo $mb[15]; ?></td>
            <td><?php echo $mb[16]; ?></td>
            <td><?php echo $mb[17]; ?></td>
        </tr>
<?php } ?>
</table>
<p>&nbsp;</p>
<table width="100%">
    <tr>
        <td width="3%">A</td>
        <td width="97%">KOS PEMPROSESAN (kos_per_ha)</td>
    </tr>
    <tr>
        <td>KL</td>
        <td>KOS LAIN (kos_per_ha)</td>
    </tr>
    <tr>
        <td>MB</td>
        <td>MILL BURUH </td>
    </tr>

</table>
