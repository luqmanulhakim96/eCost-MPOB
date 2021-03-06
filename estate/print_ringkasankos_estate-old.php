<?php
$var[0] = $_SESSION['lesen'];
$var[1] = $_SESSION['tahun'];
$belanja = new user('belanja_am', $var);
$tuai = new user('matang_penuaian', $var);
$jaga = new user('matang_penjagaan', $var);
$angkut = new user('matang_pengangkutan', $var);
$kos_belum_matang = new user('kos_belum_matang', $var);
$tahunsemasa = $_SESSION['tahun'];
?>
<?php

function luas_data($table, $data, $tahunsebelum) {

    if (strlen($tahunsebelum) == 1) {
        $table = $table . "0" . substr($tahunsebelum, -2);
    } else {
        $table = $table . substr($tahunsebelum, -2);
    }

    $con = connect();
    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
    $rblm = mysqli_query($con, $qblm);
    $rowblm = mysqli_fetch_array($rblm);
    return $rowblm[$data];
}

$ps1 = luas_data("tanam_semula", "tanaman_semula", date('y') - 1);
$ps2 = luas_data("tanam_semula", "tanaman_semula", date('y') - 2);
$ps3 = luas_data("tanam_semula", "tanaman_semula", date('y') - 3);

$pb1 = luas_data("tanam_baru", "tanaman_baru", date('y') - 1);
$pb2 = luas_data("tanam_baru", "tanaman_baru", date('y') - 2);
$pb3 = luas_data("tanam_baru", "tanaman_baru", date('y') - 3);

$pt1 = luas_data("tanam_tukar", "tanaman_tukar", date('y') - 1);
$pt2 = luas_data("tanam_tukar", "tanaman_tukar", date('y') - 2);
$pt3 = luas_data("tanam_tukar", "tanaman_tukar", date('y') - 3);

$jumlah_semua = $pengguna->luastuai + $pb1 + $pb2 + $pb3 + $ps1 + $ps2 + $ps3 + $pt1 + $pt2 + $pt3;


$hektar = $jumlah_semua;
$fbb = new user('bts', $_SESSION['lesen']);
$bts = $fbb->purata_hasil_buah;

$umur = new user('age_profile', $session_lesen);
$nilai_bts = new user('bts', $session_lesen);
$luas_ha = $pengguna->luastuai;

$tan_ha = $nilai_bts->purata_hasil_buah;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <link rel="stylesheet" href="../text_style.css" type="text/css" />
        <style media="print">
            .noPrint{
                display:none;
            }
            table.subTable{
                border-collapse:collapse;
            }
            table.subTable tr{
                border:1px solid #CCC;
            }
        </style>
    </head>

    <body>
        <table align="center" aria-describedby="ringkasan" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;">
            <tr>
                <td colspan="4" bgcolor="#999999"><span class="style1">
                        <?= setstring('mal', 'PROFIL ESTET', 'en', 'ESTATE PROFILE'); ?>
                    </span></td>
            </tr>
            <tr>
                <td width="23%"><strong>
                        <?= setstring('mal', 'Estet', 'en', 'Estate'); ?>
                    </strong></td>
                <td width="1%"><strong>:</strong></td>
                <td width="38%"><?= $pengguna->namaestet; ?></td>
                <td width="38%" rowspan="3"></td>
            </tr>
            <tr>
                <td><strong>
                        <?= setstring('mal', 'No Lesen (Lama)', 'en', 'License No (Old)'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td><?= $pengguna->nolesenlama; ?></td>
            </tr>
            <tr>
                <td><strong>
                        <?= setstring('mal', 'No Lesen (Baru)', 'en', 'License No (New)'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td><?= $pengguna->nolesen; ?></td>
            </tr>
            <tr>
                <td><strong>
                        <?= setstring('mal', 'Alamat Surat Menyurat', 'en', 'Mailing Address'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?= $pengguna->alamat1; ?>
                    <?= $pengguna->alamat2; ?>
                    <?= $pengguna->poskod; ?>
                    <?= $pengguna->bandar; ?>
                    <?= $pengguna->negeri; ?></td>
            </tr>
            <tr>
                <td><strong>
                        <?= setstring('mal', 'Poskod', 'en', 'Postcode'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?= $pengguna->poskod; ?></td>
            </tr>
            <tr>
                <td><strong>
                        <?= setstring('mal', 'Daerah', 'en', 'District'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?php $pb = $pengguna->bandar;
                        echo str_replace(",", "", $pb);
                        ?></td>
            </tr>
            <tr>
                <td><strong>
<?= setstring('mal', 'Negeri', 'en', 'State'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?= $pengguna->negeri; ?></td>
            </tr>
            <tr>
                <td><strong>
<?= setstring('mal', 'No. Telefon', 'en', 'Contact No'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?= $pengguna->notelefon; ?></td>
            </tr>
            <tr>
                <td><strong>
<?= setstring('mal', 'No. Faks', 'en', 'Fax No'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?= $pengguna->nofax; ?></td>
            </tr>
            <tr>
                <td><strong>
<?= setstring('mal', 'Emel', 'en', 'Email'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?= $pengguna->email; ?></td>
            </tr>
            <tr>
                <td><strong>
<?= setstring('mal', 'Pegawai Melapor', 'en', 'Reporting Officer'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?= $pengguna->pegawai; ?></td>
            </tr>
            <tr>
                <td><strong>
<?= setstring('mal', 'Syarikat Induk', 'en', 'Headquarters'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?= $pengguna->syarikatinduk; ?></td>
            </tr>
            <tr>
                <td><strong>
<?= setstring('mal', 'Daerah Premis', 'en', 'Premis District'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?= $pengguna->daerahpremis; ?></td>
            </tr>
            <tr>
                <td><strong>
<?= setstring('mal', 'Negeri Premis', 'en', 'Premis State'); ?>
                    </strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><?= $pengguna->negeripremis; ?></td>
            </tr>
        </table>
        <!--Kawasan Belum Matang-->
        <?php
        $lesen = $_SESSION['lesen'];

        function tahun_survey_length($x) {
            $panjangx = strlen($x);
            if ($panjangx == 1) {
                $th_data = "0" . $x;
            } else {
                $th_data = $x;
            }
            return substr($th_data, 2, 2);
        }

        $satu = tahun_survey_length($_SESSION['tahun'] - 1);
        $dua = tahun_survey_length($_SESSION['tahun'] - 2);
        $tiga = tahun_survey_length($_SESSION['tahun'] - 3);
        /**
         * $satu = tahun_survey_length(date('Y')-1);
         * $dua = tahun_survey_length(date('Y')-2);
         * $tiga = tahun_survey_length(date('Y')-3);
         */

        $con = connect();
        $qblm1 = "SELECT * FROM tanam_baru$satu tb1 WHERE tb1.lesen = '$lesen' LIMIT 1";
        $rblm1 = mysqli_query($con, $qblm1);
        $totalblm1 = mysqli_num_rows($rblm1);

        $qblm11 = "SELECT * FROM tanam_baru$dua tb2 WHERE tb2.lesen = '$lesen' LIMIT 1";
        $rblm11 = mysqli_query($con, $qblm11);
        $totalblm11 = mysqli_num_rows($rblm11);

        $qblm111 = "SELECT * FROM tanam_baru$tiga tb3 WHERE tb3.lesen = '$lesen' LIMIT 1";
        $rblm111 = mysqli_query($con, $qblm111);
        $totalblm111 = mysqli_num_rows($rblm111);

        $qblm2 = "SELECT * FROM tanam_semula$satu ts1 WHERE ts1.lesen = '$lesen' LIMIT 1";
        $rblm2 = mysqli_query($con, $qblm2);
        $totalblm2 = mysqli_num_rows($rblm2);

        $qblm22 = "SELECT * FROM tanam_semula$dua ts2 WHERE ts2.lesen = '$lesen' LIMIT 1";
        $rblm22 = mysqli_query($con, $qblm22);
        $totalblm22 = mysqli_num_rows($rblm22);

        $qblm222 = "SELECT * FROM tanam_semula$tiga ts3 WHERE ts3.lesen = '$lesen' LIMIT 1";
        $rblm222 = mysqli_query($con, $qblm222);
        $totalblm222 = mysqli_num_rows($rblm222);

        $qblm3 = "SELECT * FROM tanam_tukar$satu tt1 WHERE tt1.lesen = '$lesen' LIMIT 1";
        $rblm3 = mysqli_query($con, $qblm3);
        $totalblm3 = mysqli_num_rows($rblm3);

        $qblm33 = "SELECT * FROM tanam_tukar$dua tt2 WHERE tt2.lesen = '$lesen' LIMIT 1";
        $rblm33 = mysqli_query($con, $qblm33);
        $totalblm33 = mysqli_num_rows($rblm33);

        $qblm333 = "SELECT * FROM tanam_tukar$tiga tt3 WHERE tt3.lesen = '$lesen' LIMIT 1";
        $rblm333 = mysqli_query($con, $qblm333);
        $totalblm333 = mysqli_num_rows($rblm333);

        $baru = $totalblm1 + $totalblm11 + $totalblm111;
        $semula = $totalblm2 + $totalblm22 + $totalblm222;
        $tukar = $totalblm3 + $totalblm33 + $totalblm333;
        ?>
        <?php
        if ($baru > 0 || $semula > 0 || $tukar > 0) {
            ?>
            <table align="center" aria-describedby="ringkasan2" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;">
                <tr>
                    <td><strong><h2><?= setstring('mal', 'MAKLUMAT KAWASAN BELUM MATANG', 'en', 'IMMATURED AREA INFORMATION'); ?></h2></strong></td>
                </tr>
            </table>
            <?php
        }
        ?>
        <?php if ($totalblm1 > 0) { ?>
            <?php
            $table = "tanam_baru";
            $data = "tanaman_baru";
            $ft = $_SESSION['tahun'];
            $st = $ft[2] . $ft[3];
            $year = 1;

            $value[0] = $_SESSION['lesen'];
            $value[1] = $_SESSION['tahun'];
            $value[2] = $year;
            $value[3] = "Penanaman Baru";

            $nilai = new user('penanaman_baru', $value);

            $tahunsebelum = $st - $year;
            if (strlen($tahunsebelum == 1)) {
                $table = $table . '0' . $tahunsebelum;
            } else {
                $table = $table . $tahunsebelum;
            }

            $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
            $rblm = mysqli_query($con, $qblm);
            $rowblm = mysqli_fetch_array($rblm);

            $totalblm = mysqli_num_rows($rblm);
            $data = $rowblm[$data];
            ?>
            <table align="center" aria-describedby="ringkasan3" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><span class="style7">
    <?= setstring('mal', 'MAKLUMAT KAWASAN BELUM MATANG BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
                            <span style="text-transform:uppercase; color:#FF3300;">

    <?php echo setstring('mal', 'Penanaman Baru', 'en', 'New Planting'); ?>
                            </span>

    <?php
    echo setstring('mal', 'TAHUN PERTAMA', 'en', 'FIRST YEAR');
    $x = 1;
    ?>
                        </span></td>
                </tr>

                <tr>
                    <td><span class="style7">(<?= setstring('mal', 'DITANAM PADA', 'en', 'PLANTED IN YEAR'); ?> <?php echo $ts = $tahunsemasa - $x; ?>)</span></td>
                    <td colspan="3"><span class="style8"></span></td>
                </tr>
                <tr>
                    <td width="456">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>

                <tr>
                    <td height="31" colspan="4"><strong><?= setstring('mal', 'Keluasan ', 'en', 'Area'); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($data, 2); ?></span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><strong><?= setstring('mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?></strong></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td width="128">&nbsp;</td>
                    <td width="214">&nbsp;</td>
                    <td width="181">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="4">
                        <table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan4">
                            <tr>
                                <td height="40" align="right" background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="right" class="style1 style2 style11">a.  </div></td>
                                <td height="34" align="right" background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="left" class="style12"><?= setstring('mal', 'Perbelanjaan Tidak Berulang', 'en', 'Non-Recurrent Expenditures'); ?></div></td>
                                <td background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="center" class="style12"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style12">(RM)</div></td>
                                <td background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="center" class="style12"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per hectare'); ?></div>
                                    <div align="center" class="style12"> (RM)</div></td>
                            </tr>

                            <tr bgcolor="#99FF99">
                                <td width="18" height="35" align="right">1.</td>
                                <td width="429" bgcolor="#99FF99"><?= setstring('mal', 'Menebaaaang dan membersih kawasan', 'en', 'Felling and land clearing'); ?></td>
                                <td width="163"><div align="center"><?= number_format($nilai->a_1, 2); ?></div></td>
                                <td width="138"><div align="center"><span id="kosha1"><?php $x1 = ($nilai->a_1 / $data);
                                echo number_format($x1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">2.</td>
                                <td><?= setstring('mal', 'Membuat teres dan landasan', 'en', 'Terracing and platform') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_2, 2); ?></div></td>
                                <td><div align="center"><span id="kosha2"><?php $x2 = ($nilai->a_2 / $data);
                                echo number_format($x2, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="43" align="right">3.</td>
                                <td><?= setstring('mal', 'Pembinaan jalan', 'en', 'Road construction') ?></td>
                                <td><div align="center"><?= number_format($nilai->a_3, 2); ?></div></td>
                                <td><div align="center"><span id="kosha3"><?php $x3 = ($nilai->a_3 / $data);
                                echo number_format($x3, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right">4.</td>
                                <td><?= setstring('mal', 'Pembinaan parit', 'en', 'Drain construction') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_4, 2); ?></div></td>
                                <td><div align="center"><span id="kosha4"><?php $x4 = ($nilai->a_4 / $data);
                                echo number_format($x4, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="38" align="right">5.</td>
                                <td><?= setstring('mal', 'Pembinaan ban dan pintu air', 'en', 'Bund and watergate construction') ?> </td>
                                <td><div align="center"><?= number_format($nilai->a_5, 2); ?></div></td>
                                <td><div align="center"><span id="kosha5"><?php $x5 = ($nilai->a_5 / $data);
                                echo number_format($x5, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="31" align="right">6.</td>
                                <td><?= setstring('mal', 'Membaris', 'en', 'Lining') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_6, 2); ?></div></td>
                                <td><div align="center"><span id="kosha6"><?php $x6 = ($nilai->a_6 / $data);
                                echo number_format($x6, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="31" align="right">7.</td>
                                <td><?= setstring('mal', 'Melubang dan menanam', 'en', 'Holing and planting') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_7, 2); ?></div></td>
                                <td><div align="center"><span id="kosha7"><?php $x7 = ($nilai->a_7 / $data);
                                echo number_format($x7, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right">8.</td>
                                <td><?= setstring('mal', 'Pembajaan awal', 'en', 'Basal fertiliser') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_8, 2); ?></div></td>
                                <td><div align="center"><span id="kosha8"><?php $x8 = ($nilai->a_8 / $data);
                                echo number_format($x8, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="32" align="right">9.</td>
                                <td><?= setstring('mal', 'Bahan tanaman', 'en', 'Planting material') ?>&nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_9, 2); ?></div></td>
                                <td><div align="center"><span id="kosha9"><?php $x9 = ($nilai->a_9 / $data);
                                echo number_format($x9, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="32" align="right">10.</td>
                                <td><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops') ?>&nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_10, 2); ?></div></td>
                                <td><div align="center"><span id="kosha10"><?php $x10 = ($nilai->a_10 / $data);
                                echo number_format($x10, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="32" align="right">11.</td>
                                <td><?= setstring('mal', 'Perbelanjaan-perbelanjaan lain', 'en', 'Other expenditures'); ?>&nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_11, 2); ?></div></td>
                                <td><div align="center"><span id="kosha11"><?php $x11 = ($nilai->a_11 / $data);
                                echo number_format($x11, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td align="right">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>
                            <tr>
                                <td height="45" align="right"><div align="right"></div></td>
                                <td><div align="right"><strong><?= setstring('mal', 'Jumlah kecil', 'en', 'Subtotal'); ?> (a) :</strong><strong> </strong></div></td>
                                <td bgcolor="#FFCC66"><div align="center"><?= number_format($nilai->total_a, 2); ?></div></td>
                                <td bgcolor="#FFCC66"><div align="center"><strong>
                                            <span id="total_kos_per_ha_a"><?php $total_x = $x1 + $x2 + $x3 + $x4 + $x5 + $x6 + $x7 + $x8 + $x9 + $x10 + $x11;
                                            echo number_format($total_x, 2); ?></span>
                                        </strong>

                                    </div></td>
                            </tr>
                            <tr>
                                <td align="right">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan5">
                            <tr>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3">b. </div></td>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep'); ?></div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
                                    <div align="center" class="style3"> (RM)</div></td>
                            </tr>

                            <tr>
                                <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
                                <td width="428" bgcolor="#99FF99"><?= setstring('mal', 'Meracun', 'en', 'Weeding'); ?> &nbsp;</td>
                                <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
    <?php
    if ($nilai->total_b_1 == 0) {
        $nilai->total_b_1 = $nilai->b_1a + $nilai->b_1b + $nilai->b_1c;
        echo number_format($nilai->total_b_1, 2);
    } else {
        echo number_format($nilai->total_b_1, 2);
    }
    ?></div></td>
                                <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 = ($nilai->total_b_1 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1a, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $sy1 = ($nilai->b_1a / $data);
    echo number_format($sy1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1b, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $sy2 = ($nilai->b_1b / $data);
    echo number_format($sy2, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></span>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span>
                                </td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1c, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $sy3 = ($nilai->b_1c / $data);
    echo number_format($sy3, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">2.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_2, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center">
                                        <span id="jaga2"><?php $y3 = ($nilai->total_b_2 / $data);
                                        echo number_format($y3, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right">3.</td>
                                <td><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                                <td><div align="center" class="style10"><span class="style6">
    <?php
    if ($nilai->total_b_3 == 0) {
        $nilai->total_b_3 = $nilai->b_3a + $nilai->b_3b + $nilai->b_3c + $nilai->b_3d;
        echo number_format($nilai->total_b_3, 2);
    } else {
        echo number_format($nilai->total_b_3, 2);
    }
    ?></span></div></td>
                                <td><div align="center" class="style10">
                                        <span id="jaga3"><?php $y2 = ($nilai->total_b_3 / $data);
    echo number_format($y2, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3a, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $sy1a = ($nilai->b_3a / $data);
    echo number_format($sy1a, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">ii. <?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3b, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $sy1b = ($nilai->b_3b / $data);
    echo number_format($sy1b, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span>
                                </td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3c, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $sy1c = ($nilai->b_3c / $data);
    echo number_format($sy1c, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3d, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $sy1d = ($nilai->b_3d / $data);
    echo number_format($sy1d, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right" bgcolor="#99FF99">4.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_4, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga4"><?php $y4 = ($nilai->total_b_4 / $data);
    echo number_format($y4, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?> </td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_5, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $y5 = ($nilai->total_b_5 / $data);
    echo number_format($y5, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="40" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_6, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga6"><?php $y6 = ($nilai->total_b_6 / $data);
    echo number_format($y6, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">7.</td>
                                <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
                                <td><div align="center"><?= number_format($nilai->total_b_7, 2); ?> </div></td>
                                <td><div align="center"><span id="jaga7"><?php $y7 = ($nilai->total_b_7 / $data);
    echo number_format($y7, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_8, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga8"><?php $y8 = ($nilai->total_b_8 / $data);
    echo number_format($y8, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_9, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga9"><?php $y9 = ($nilai->total_b_9 / $data);
    echo number_format($y9, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">10.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_10, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga10"><?php $y10 = ($nilai->total_b_10 / $data);
    echo number_format($y10, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">11.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_11, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga11"><?php $y11 = ($nilai->total_b_11 / $data);
    echo number_format($y11, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#99FF99">12.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_12, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga12"><?php $y12 = ($nilai->total_b_12 / $data);
    echo number_format($y12, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">13.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_13, 2); ?></div></td>
                                <td><div align="center"><span id="jaga13"><?php $y13 = ($nilai->total_b_13 / $data);
    echo number_format($y13, 2); ?></span></div></td>
                            </tr>

                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">14.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_14, 2); ?></div></td>
                                <td><div align="center"><span id="jaga14"><?php $y14 = ($nilai->total_b_14 / $data);
    echo number_format($y14, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>
                            <tr>
                                <td height="35" colspan="2" align="right"><strong><?= setstring('mal', 'Jumlah kecil', 'en', 'Subtotal'); ?> (b) :</strong></td>
                                <td bgcolor="#FFCC66"><div align="center"><strong><span class="style6"><?= number_format($nilai->total_b, 2); ?></span></strong></div></td>
                                <td bgcolor="#FFCC66"><div align="center"><strong><span id="total_kos_per_ha_b"><?php $z = ($nilai->total_b / $data);
                                echo number_format($z, 2); ?></span></strong></div></td>
                            </tr>
                            <tr>
                                <td height="17" colspan="2" align="right">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="44" colspan="2"><div align="right"><strong><?= setstring('mal', 'Jumlah kos', 'en', 'Total cost'); ?>
                                <span style="text-transform:lowercase;">
            <?php echo setstring('mal', 'Penanaman Baru', 'en', 'New Planting'); ?></span>

            <?php echo setstring('mal', 'pada tahun pertama', 'en', 'on first year'); ?>
                                : </strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_a + $nilai->total_b;
        echo number_format($total_all, 2); ?></span></strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha"><?php $kph = (($total_all) / ($data));
        echo number_format($kph, 2); ?></span></strong></div></td>
                </tr>
                <tr>
                    <td colspan="4"><br /></td>
                </tr>
            </table>
<?php } ?>
<?php if ($totalblm11 > 0) { ?>
    <?php
    $table = "tanam_baru";
    $data = "tanaman_baru";
    $year = 2;

    $value[0] = $_SESSION['lesen'];
    $value[1] = $_SESSION['tahun'];
    $value[2] = $year;
    $value[3] = "Penanaman Baru";

    $nilai = new user('penanaman_baru', $value);

    $ft = $_SESSION['tahun'];
    $st = $ft[2] . $ft[3];

    $tahunsebelum = $st - $year;

    if (strlen($tahunsebelum) == 1) {
        $tahunsebelum = '0' . $tahunsebelum;
    }

    $table = $table . $tahunsebelum;

    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
    $rblm = mysqli_query($con, $qblm);
    $rowblm = mysqli_fetch_array($rblm);
    $totalblm = mysqli_num_rows($rblm);

    $data = $rowblm[$data];
    ?>
            <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="ringkasan6">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><span class="style7"><?= setstring('mal', 'MAKLUMAT KAWASAN BELUM MATANG BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
                            <span style="text-transform:uppercase; color:#FF3300;">
    <?php echo setstring('mal', 'penanaman baru', 'en', 'new planting'); ?>
                            </span>
    <?= setstring('mal', 'TAHUN', 'en', 'YEAR'); ?>
    <?php echo setstring('mal', 'KEDUA', 'en', '2');
    $x = 2; ?>
                        </span></td>
                </tr>

                <tr>
                    <td><span class="style7">(<?= setstring('mal', 'DITANAM PADA TAHUN ', 'en', 'PLANTED IN YEAR'); ?> <?php echo $ts = $tahunsemasa - $x; ?>)</span></td>
                    <td colspan="3"><span class="style8"></span></td>
                </tr>
                <tr>
                    <td width="456">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>

                <tr>
                    <td height="31" colspan="4"><strong><?= setstring('mal', 'Keluasan', 'en', 'Area'); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($data, 2); ?></span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares') ?></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><strong><?= setstring('mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?> </strong></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td width="128">&nbsp;</td>
                    <td width="214">&nbsp;</td>
                    <td width="181">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan7">
                            <tr>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3"></div></td>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep'); ?></div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
                                    <div align="center" class="style3"> (RM)</div></td>
                            </tr>

                            <tr>
                                <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
                                <td width="428" bgcolor="#99FF99"><?= setstring('mal', 'Meracun', 'en', 'Weeding'); ?> &nbsp;</td>
                                <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
    <?php
    if ($nilai->total_b_1 == 0) {
        $nilai->total_b_1 = $nilai->b_1a + $nilai->b_1b + $nilai->b_1c;
        echo number_format($nilai->total_b_1, 2);
    } else {
        echo number_format($nilai->total_b_1, 2);
    }
    ?></div></td>
                                <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 = ($nilai->total_b_1 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1a, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $y1 = ($nilai->b_1a / $data);
                                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1b, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $y1 = ($nilai->b_1b / $data);
                                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></span>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span>
                                </td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1c, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $y1 = ($nilai->b_1c / $data);
                                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">2.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_2, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga2"><?php $y1 = ($nilai->total_b_2 / $data);
                                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right">3.</td>
                                <td><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                                <td><div align="center" class="style10"><span class="style6">
    <?php
    if ($nilai->total_b_3 == 0) {
        $nilai->total_b_3 = $nilai->b_3a + $nilai->b_3b + $nilai->b_3c + $nilai->b_3d;
        echo number_format($nilai->total_b_3, 2);
    } else {
        echo number_format($nilai->total_b_3, 2);
    }
    ?></span></div></td>
                                <td><div align="center" class="style10">
                                        <span id="jaga3"><?php $y1 = ($nilai->total_b_3 / $data);
    echo number_format($y1, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3a, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $y1 = ($nilai->b_3a / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">ii. <?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3b, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $y1 = ($nilai->b_3b / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span>
                                </td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3c, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $y1 = ($nilai->b_3c / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3d, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $y1 = ($nilai->b_3d / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right" bgcolor="#99FF99">4.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_4, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga4"><?php $y1 = ($nilai->total_b_4 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_5, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $y1 = ($nilai->total_b_5 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="40" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_6, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga6"><?php $y1 = ($nilai->total_b_6 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">7.</td>
                                <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
                                <td><div align="center"><?= number_format($nilai->total_b_7, 2); ?></div></td>
                                <td><div align="center"><span id="jaga7"><?php $y1 = ($nilai->total_b_7 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_8, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga8"><?php $y1 = ($nilai->total_b_8 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_9, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga9"><?php $y1 = ($nilai->total_b_9 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">10.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_10, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga10"><?php $y1 = ($nilai->total_b_10 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">11.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_11, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga11"><?php $y1 = ($nilai->total_b_11 / $data);
                                echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#99FF99">12.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_12, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga12"><?php $y1 = ($nilai->total_b_12 / $data);
                            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">13.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_13, 2); ?></div></td>
                                <td><div align="center"><span id="jaga13"><?php $y1 = ($nilai->total_b_13 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>

                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">14.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_14, 2); ?></div></td>
                                <td><div align="center"><span id="jaga14"><?php $y1 = ($nilai->total_b_14 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>


                        </table></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="44" colspan="2"><div align="right"><strong><?= setstring('mal', 'Jumlah kos', 'en', 'Total cost'); ?>
                                <span style="text-transform:lowercase;">
    <?php
    echo setstring('mal', 'penanaman baru', 'en', 'new planting');
    ?>
                                </span> <?= setstring('mal', 'tahun', 'en', 'year') ?>
                                <?php
                                echo setstring('mal', 'kedua', 'en', '2')
                                ?> : </strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_b; ?></span></strong><strong><span class="style6">
                            <?= number_format($nilai->total_b, 2); ?></span></strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha"><?php $kph = (($total_all) / ($data));
                            echo number_format($kph, 2); ?></span></strong></div></td>
                </tr>
                <tr>
                    <td colspan="4"><br /></td>
                </tr>
            </table>
                        <?php } ?>
                        <?php if ($totalblm111 > 0) { ?>
    <?php
    $table = "tanam_baru";
    $data = "tanaman_baru";
    $year = 3;

    $value[0] = $_SESSION['lesen'];
    $value[1] = $_SESSION['tahun'];
    $value[2] = $year;
    $value[3] = "Penanaman Baru";

    $nilai = new user('penanaman_baru', $value);

    $ft = $_SESSION['tahun'];
    $st = $ft[2] . $ft[3];

    $tahunsebelum = $st - $year;
    if (strlen($tahunsebelum) == 1) {
        $tahunsebelum = '0' . $tahunsebelum;
    }

    $table = $table . $tahunsebelum;

    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
    $rblm = mysqli_query($con, $qblm);
    $rowblm = mysqli_fetch_array($rblm);
    $totalblm = mysqli_num_rows($rblm);

    $data = $rowblm[$data];
    ?>
            <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="ringkasan8">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><span class="style7"><?= setstring('mal', 'MAKLUMAT KAWASAN BELUM MATANG  BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
                            <span style="text-transform:uppercase; color:#FF3300;">
    <?php
    echo setstring('mal', 'Penanaman Baru', 'en', 'New Planting');
    ?>
                            </span>
    <?= setstring('mal', 'TAHUN ', 'en', 'YEAR'); ?>
    <?php echo setstring('mal', 'KETIGA', 'en', '3');
    $x = 3; ?>
                        </span></td>
                </tr>

                <tr>
                    <td><span class="style7">(
    <?= setstring('mal', 'DITANAM PADA TAHUN', 'en', 'PLANTED IN YEAR'); ?>
    <?php echo $ts = $tahunsemasa - $x; ?>)</span></td>
                    <td colspan="3"><span class="style8"></span></td>
                </tr>
                <tr>
                    <td width="456">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>

                <tr>
                    <td height="31" colspan="4"><strong><?= setstring('mal', 'Keluasan', 'en', 'Area'); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($data, 2); ?></span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><strong><?= setstring('mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?> </strong></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td width="128">&nbsp;</td>
                    <td width="214">&nbsp;</td>
                    <td width="181">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan9">
                            <tr>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3"></div></td>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep') ?></div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
                                    <div align="center" class="style3"> (RM)</div></td>
                            </tr>

                            <tr>
                                <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
                                <td width="428" bgcolor="#99FF99"><?= setstring('mal', 'Meracun', 'en', 'Weeding') ?> &nbsp;</td>
                                <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
                                            <?php
                                            if ($nilai->total_b_1 == 0) {
                                                $nilai->total_b_1 = $nilai->b_1a + $nilai->b_1b + $nilai->b_1c;
                                                echo number_format($nilai->total_b_1, 2);
                                            } else {
                                                echo number_format($nilai->total_b_1, 2);
                                            }
                                            ?>
                                    </div></td>
                                <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 = ($nilai->total_b_1 / $data);
                                            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1a, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $y1 = ($nilai->b_1a / $data);
                                            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1b, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $y1 = ($nilai->b_1b / $data);
                                            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></span>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1c, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $y1 = ($nilai->b_1c / $data);
                                            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">2.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_2, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center">
                                        <span id="jaga2"><?php $y1 = ($nilai->total_b_2 / $data);
                                            echo number_format($y1, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right">3.</td>
                                <td><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                                <td><div align="center" class="style10"><span class="style6">
    <?php
    if ($nilai->total_b_3 == 0) {
        $nilai->total_b_3 = $nilai->b_3a + $nilai->b_3b + $nilai->b_3c;
        echo number_format($nilai->total_b_3, 2);
    } else {
        echo number_format($nilai->total_b_3, 2);
    }
    ?></div></td>
                                <td><div align="center" class="style10">
                                        <span id="jaga3"><?php $y1 = ($nilai->total_b_3 / $data);
    echo number_format($y1, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3a, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $y1 = ($nilai->b_3a / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">ii. <?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3b, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $y1 = ($nilai->b_3b / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3c, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $y1 = ($nilai->b_3c / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3d, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $y1 = ($nilai->b_3d / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right" bgcolor="#99FF99">4.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_4, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga4"><?php $y1 = ($nilai->total_b_4 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_5, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $y1 = ($nilai->total_b_5 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="40" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_6, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga6"><?php $y1 = ($nilai->total_b_6 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">7.</td>
                                <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
                                <td><div align="center"><?= number_format($nilai->total_b_7, 2); ?></div></td>
                                <td><div align="center"><span id="jaga7"><?php $y1 = ($nilai->total_b_7 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_8, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga8"><?php $y1 = ($nilai->total_b_8 / $data);
                                echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_9, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga9"><?php $y1 = ($nilai->total_b_9 / $data);
                                echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">10.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_10, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga10"><?php $y1 = ($nilai->total_b_10 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">11.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_11, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga11"><?php $y1 = ($nilai->total_b_11 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#99FF99">12.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_12, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga12"><?php $y1 = ($nilai->total_b_12 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">13.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_13, 2); ?></div></td>
                                <td><div align="center"><span id="jaga13"><?php $y1 = ($nilai->total_b_13 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>

                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">14.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_14, 2); ?></div></td>
                                <td><div align="center"><span id="jaga14"><?php $y1 = ($nilai->total_b_14 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>
                        </table></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="44" colspan="2"><div align="right"><strong><?= setstring('mal', 'Jumlah kos', 'en', 'Total cost'); ?>
                                <span style="text-transform:lowercase;">
    <?php
    echo setstring('mal', 'penanaman baru', 'en', 'new planting');
    ?>
                                </span> <?= setstring('mal', 'tahun', 'en', 'year'); ?>
    <?php echo setstring('mal', 'ketiga', 'en', '3'); ?> : </strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_b; ?></span></strong><strong><span class="style6">
                <?= number_format($nilai->total_b, 2); ?></span></strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha"><?php $kph = (($total_all) / ($data));
            echo number_format($kph, 2); ?></span></strong></div></td>
                </tr>
                <tr>
                    <td colspan="4"><br /></td>
                </tr>
            </table>
<?php } ?>

<?php if ($totalblm2 > 0) { ?>
    <?php
    $table = "tanam_semula";
    $data = "tanaman_semula";
    $ft = $_SESSION['tahun'];
    $st = $ft[2] . $ft[3];
    $year = 1;

    $value[0] = $_SESSION['lesen'];
    $value[1] = $_SESSION['tahun'];
    $value[2] = $year;
    $value[3] = "Penanaman Semula";

    $nilai = new user('penanaman_baru', $value);

    $tahunsebelum = $st - $year;
    if (strlen($tahunsebelum == 1)) {
        $table = $table . '0' . $tahunsebelum;
    } else {
        $table = $table . $tahunsebelum;
    }

    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
    $rblm = mysqli_query($con, $qblm);
    $rowblm = mysqli_fetch_array($rblm);

    $totalblm = mysqli_num_rows($rblm);
    $data = $rowblm[$data];
    ?>
            <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="ringkasan10">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><span class="style7">
    <?= setstring('mal', 'MAKLUMAT KAWASAN BELUM MATANG BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
                            <span style="text-transform:uppercase; color:#FF3300;">

    <?php echo setstring('mal', 'Penanaman Semula', 'en', 'Replanting'); ?>
                            </span>

    <?php
    echo setstring('mal', 'TAHUN PERTAMA', 'en', 'FIRST YEAR');
    $x = 1;
    ?>
                        </span></td>
                </tr>

                <tr>
                    <td><span class="style7">(<?= setstring('mal', 'DITANAM PADA', 'en', 'PLANTED IN YEAR'); ?> <?php echo $ts = $tahunsemasa - $x; ?>)</span></td>
                    <td colspan="3"><span class="style8"></span></td>
                </tr>
                <tr>
                    <td width="456">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>

                <tr>
                    <td height="31" colspan="4"><strong><?= setstring('mal', 'Keluasan ', 'en', 'Area'); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($data, 2); ?></span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><strong><?= setstring('mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?></strong></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td width="128">&nbsp;</td>
                    <td width="214">&nbsp;</td>
                    <td width="181">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="4">
                        <table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan12">
                            <tr>
                                <td height="40" align="right" background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="right" class="style1 style2 style11">a.  </div></td>
                                <td height="34" align="right" background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="left" class="style12"><?= setstring('mal', 'Perbelanjaan Tidak Berulang', 'en', 'Non-Recurrent Expenditures'); ?></div></td>
                                <td background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="center" class="style12"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style12">(RM)</div></td>
                                <td background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="center" class="style12"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per hectare'); ?></div>
                                    <div align="center" class="style12"> (RM)</div></td>
                            </tr>

                            <tr bgcolor="#99FF99">
                                <td width="18" height="35" align="right">1.</td>
                                <td width="429" bgcolor="#99FF99"><?= setstring('mal', 'Menebang dan membersih kawasan', 'en', 'Felling and land clearing'); ?></td>
                                <td width="163"><div align="center"><?= number_format($nilai->a_1, 2); ?></div></td>
                                <td width="138"><div align="center"><span id="kosha1"><?php $x1 = ($nilai->a_1 / $data);
                                echo number_format($x1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">2.</td>
                                <td><?= setstring('mal', 'Membuat teres dan landasan', 'en', 'Terracing and platform') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_2, 2); ?></div></td>
                                <td><div align="center"><span id="kosha2"><?php $x2 = ($nilai->a_2 / $data);
                                echo number_format($x2, 2); ?></span></div></td>
                            </tr>
  <?php /*
                            <tr bgcolor="#99FF99">
                                <td height="43" align="right">3.</td>
                                <td><?= setstring('mal', 'Pembinaan jalan', 'en', 'Road construction') ?></td>
                                <td><div align="center"><?= number_format($nilai->a_3, 2); ?></div></td>
                                <td><div align="center"><span id="kosha3"><?php $x3 = ($nilai->a_3 / $data);
    echo number_format($x3, 2); ?></span></div></td>
                            </tr>

                            <tr>
                                <td height="34" align="right">4.</td>
                                <td><?= setstring('mal', 'Pembinaan parit', 'en', 'Drain construction') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_4, 2); ?></div></td>
                                <td><div align="center"><span id="kosha4"><?php $x4 = ($nilai->a_4 / $data);
    echo number_format($x4, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="38" align="right">5.</td>
                                <td><?= setstring('mal', 'Pembinaan ban dan pintu air', 'en', 'Bund and watergate construction') ?> </td>
                                <td><div align="center"><?= number_format($nilai->a_5, 2); ?></div></td>
                                <td><div align="center"><span id="kosha5"><?php $x5 = ($nilai->a_5 / $data);
    echo number_format($x5, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="31" align="right">6.</td>
                                <td><?= setstring('mal', 'Membaris', 'en', 'Lining') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_6, 2); ?></div></td>
                                <td><div align="center"><span id="kosha6"><?php $x6 = ($nilai->a_6 / $data);
                                    echo number_format($x6, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="31" align="right">7.</td>
                                <td><?= setstring('mal', 'Melubang dan menanam', 'en', 'Holing and planting') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_7, 2); ?></div></td>
                                <td><div align="center"><span id="kosha7"><?php $x7 = ($nilai->a_7 / $data);
                                    echo number_format($x7, 2); ?></span></div></td>
                            </tr>
                              */?>

                              <tr bgcolor="#99FF99">
                                  <td height="32" align="right">3.</td>
                                  <td><?= setstring('mal', 'Membaris, melubang dan menanam', 'en', 'Lining, holing and planting '); ?>&nbsp;</td>

                                  <td><div align="center"><?= number_format($nilai->a_13, 2); ?></div></td>
                                  <td><div align="center"><span id="kosha11"><?php $x13 = ($nilai->a_13 / $data);
                                      echo number_format($x13, 2); ?></span></div></td>
                              </tr>

                              <tr bgcolor="#FFFFFF">
                                  <td height="32" align="right">4.</td>
                                  <td><?= setstring('mal', 'Pembinaan jalan, parit, ban & pintu air dan sebagainya ', 'en', '	Construction of road, drain, bund watergate and etc '); ?>&nbsp;</td>

                                  <td><div align="center"><?= number_format($nilai->a_12, 2); ?></div></td>
                                  <td><div align="center"><span id="kosha11"><?php $x12 = ($nilai->a_12 / $data);
                                      echo number_format($x12, 2); ?></span></div></td>
                              </tr>

                            <tr bgcolor="#99FF99">
                                <td height="34" align="right">5.</td>
                                <td><?= setstring('mal', 'Pembajaan awal', 'en', 'Basal fertiliser') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_8, 2); ?></div></td>
                                <td><div align="center"><span id="kosha8"><?php $x8 = ($nilai->a_8 / $data);
                                    echo number_format($x8, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td height="32" align="right">6.</td>
                                <td><?= setstring('mal', 'Anak Pokok Sawit', 'en', 'Seedlings') ?>&nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_9, 2); ?></div></td>
                                <td><div align="center"><span id="kosha9"><?php $x9 = ($nilai->a_9 / $data);
                                    echo number_format($x9, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="32" align="right">7.</td>
                                <td><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops') ?>&nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_10, 2); ?></div></td>
                                <td><div align="center"><span id="kosha10"><?php $x10 = ($nilai->a_10 / $data);
                                    echo number_format($x10, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td height="32" align="right">8.</td>
                                <td><?= setstring('mal', 'Perbelanjaan-perbelanjaan lain', 'en', 'Other expenditures'); ?>&nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_11, 2); ?></div></td>
                                <td><div align="center"><span id="kosha11"><?php $x11 = ($nilai->a_11 / $data);
                                    echo number_format($x11, 2); ?></span></div></td>
                            </tr>

                            <tr>
                                <td align="right">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>
                            <tr>
                                <td height="45" align="right"><div align="right"></div></td>
                                <td><div align="right"><strong><?= setstring('mal', 'Jumlah kecil', 'en', 'Subtotal'); ?> (a) :</strong><strong> </strong></div></td>
                                <td bgcolor="#FFCC66"><div align="center"><?= number_format($nilai->total_a, 2); ?></div></td>
                                <td bgcolor="#FFCC66"><div align="center"><strong>
                                            <span id="total_kos_per_ha_a"><?php $total_x = $x1 + $x2 + $x3 + $x4 + $x5 + $x6 + $x7 + $x8 + $x9 + $x10 + $x11;
                                        echo number_format($total_x, 2); ?></span>
                                        </strong>

                                    </div></td>
                            </tr>



                            <tr>
                                <td align="right">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan13">
                            <tr>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3">b. </div></td>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep'); ?></div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
                                    <div align="center" class="style3"> (RM)</div></td>
                            </tr>

                            <tr>
                                <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
                                <td width="428" bgcolor="#99FF99"><?= setstring('mal', 'Meracun', 'en', 'Weeding'); ?> &nbsp;</td>
                                <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
    <?php
    if ($nilai->total_b_1 == 0) {
        $nilai->total_b_1 = $nilai->b_1a + $nilai->b_1b + $nilai->b_1c;
        echo number_format($nilai->total_b_1, 2);
    } else {
        echo number_format($nilai->total_b_1, 2);
    }
    ?></div></td>
                                <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 = ($nilai->total_b_1 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1a, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $sy1 = ($nilai->b_1a / $data);
    echo number_format($sy1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1b, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $sy2 = ($nilai->b_1b / $data);
    echo number_format($sy2, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></span>
                                  <br>
                          				<span class="kecil">(
                          					<?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                          						)        </span>
                                </td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1c, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $sy3 = ($nilai->b_1c / $data);
    echo number_format($sy3, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">2.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_2, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center">
                                        <span id="jaga2"><?php $y3 = ($nilai->total_b_2 / $data);
    echo number_format($y3, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right">3.</td>
                                <td><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                                <td><div align="center" class="style10"><span class="style6">
    <?php
    if ($nilai->total_b_3 == 0) {
        $nilai->total_b_3 = $nilai->b_3a + $nilai->b_3b + $nilai->b_3c + $nilai->b_3d;
        echo number_format($nilai->total_b_3, 2);
    } else {
        echo number_format($nilai->total_b_3, 2);
    }
    ?></span></div></td>
                                <td><div align="center" class="style10">
                                        <span id="jaga3"><?php $y2 = ($nilai->total_b_3 / $data);
    echo number_format($y2, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3a, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $sy1a = ($nilai->b_3a / $data);
    echo number_format($sy1a, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">ii. <?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3b, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $sy1b = ($nilai->b_3b / $data);
    echo number_format($sy1b, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                    <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span>
                                </td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3c, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $sy1c = ($nilai->b_3c / $data);
    echo number_format($sy1c, 2); ?></span></div></td>
                            </tr>
<?php /*
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3d, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $sy1d = ($nilai->b_3d / $data);
    echo number_format($sy1d, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right" bgcolor="#99FF99">4.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_4, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga4"><?php $y4 = ($nilai->total_b_4 / $data);
    echo number_format($y4, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?> </td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_5, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $y5 = ($nilai->total_b_5 / $data);
    echo number_format($y5, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="40" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_6, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga6"><?php $y6 = ($nilai->total_b_6 / $data);
        echo number_format($y6, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">7.</td>
                                <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
                                <td><div align="center"><?= number_format($nilai->total_b_7, 2); ?> </div></td>
                                <td><div align="center"><span id="jaga7"><?php $y7 = ($nilai->total_b_7 / $data);
        echo number_format($y7, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_8, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga8"><?php $y8 = ($nilai->total_b_8 / $data);
        echo number_format($y8, 2); ?></span></div></td>
                            </tr> */?>
                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">4.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></div></td>
                               <td><div align="center"><?= number_format($nilai->total_b_16, 2); ?></div></td>
                                <td><div align="center"><span id="jaga16"><?php $y16 = ($nilai->total_b_16 / $data);
                        echo number_format($y16, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td height="36" align="right">5.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Penjagaan jalan, parit, ban & pintu air dan sebagainya', 'en', 'Maintenance of road, drain, bund watergate and etc'); ?></div></td>
                                 <td><div align="center"><?= number_format($nilai->total_b_15, 2); ?></div></td>
                                <td><div align="center"><span id="jaga15"><?php $y15 = ($nilai->total_b_15 / $data);
                        echo number_format($y15, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_9, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga9"><?php $y9 = ($nilai->total_b_9 / $data);
        echo number_format($y9, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#FFFFFF">7.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_10, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga10"><?php $y10 = ($nilai->total_b_10 / $data);
        echo number_format($y10, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_11, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga11"><?php $y11 = ($nilai->total_b_11 / $data);
        echo number_format($y11, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_12, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga12"><?php $y12 = ($nilai->total_b_12 / $data);
                        echo number_format($y12, 2); ?></span></div></td>
                            </tr>
<?php /*
                            <tr>
                                <td height="38" align="right">13.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_13, 2); ?></div></td>
                                <td><div align="center"><span id="jaga13"><?php $y13 = ($nilai->total_b_13 / $data);
                        echo number_format($y13, 2); ?></span></div></td>
                            </tr> */?>

                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">10.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_14, 2); ?></div></td>
                                <td><div align="center"><span id="jaga14"><?php $y14 = ($nilai->total_b_14 / $data);
                        echo number_format($y14, 2); ?></span></div></td>
                            </tr>

                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>
                            <tr>
                                <td height="35" colspan="2" align="right"><strong><?= setstring('mal', 'Jumlah kecil', 'en', 'Subtotal'); ?> (b) :</strong></td>
                                <td bgcolor="#FFCC66"><div align="center"><strong><span class="style6"><?= number_format($nilai->total_b, 2); ?></span></strong></div></td>
                                <td bgcolor="#FFCC66"><div align="center"><strong><span id="total_kos_per_ha_b"><?php $z = ($nilai->total_b / $data);
                        echo number_format($z, 2); ?></span></strong></div></td>
                            </tr>
                            <tr>
                                <td height="17" colspan="2" align="right">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="44" colspan="2"><div align="right"><strong><?= setstring('mal', 'Jumlah kos', 'en', 'Total cost'); ?>
                                <span style="text-transform:lowercase;">
    <?php echo setstring('mal', 'Penanaman Semula', 'en', 'Replanting'); ?></span>

    <?php echo setstring('mal', 'pada tahun pertama', 'en', 'on first year'); ?>
                                : </strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_a + $nilai->total_b;
    echo number_format($total_all, 2); ?></span></strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha"><?php $kph = (($total_all) / ($data));
    echo number_format($kph, 2); ?></span></strong></div></td>
                </tr>
                <tr>
                    <td colspan="4"><br /></td>
                </tr>
            </table>
                                    <?php } ?>
                                    <?php if ($totalblm22 > 0) { ?>
                                        <?php
                                        $table = "tanam_semula";
                                        $data = "tanaman_semula";
                                        $year = 2;

                                        $value[0] = $_SESSION['lesen'];
                                        $value[1] = $_SESSION['tahun'];
                                        $value[2] = $year;
                                        $value[3] = "Penanaman Semula";

                                        $nilai = new user('penanaman_baru', $value);

                                        $ft = $_SESSION['tahun'];
                                        $st = $ft[2] . $ft[3];

                                        $tahunsebelum = $st - $year;

                                        if (strlen($tahunsebelum) == 1) {
                                            $tahunsebelum = '0' . $tahunsebelum;
                                        }

                                        $table = $table . $tahunsebelum;

                                        $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
                                        $rblm = mysqli_query($con, $qblm);
                                        $rowblm = mysqli_fetch_array($rblm);
                                        $totalblm = mysqli_num_rows($rblm);

                                        $data = $rowblm[$data];
                                        ?>
            <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="ringkasan14">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><span class="style7"><?= setstring('mal', 'MAKLUMAT KAWASAN BELUM MATANG BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
                            <span style="text-transform:uppercase; color:#FF3300;">
                                            <?php echo setstring('mal', 'penanaman semula', 'en', 'replanting'); ?>
                            </span>
                                            <?= setstring('mal', 'TAHUN', 'en', 'YEAR'); ?>
                                            <?php echo setstring('mal', 'KEDUA', 'en', '2');
                                            $x = 2; ?>
                        </span></td>
                </tr>

                <tr>
                    <td><span class="style7">(<?= setstring('mal', 'DITANAM PADA TAHUN ', 'en', 'PLANTED IN YEAR'); ?> <?php echo $ts = $tahunsemasa - $x; ?>)</span></td>
                    <td colspan="3"><span class="style8"></span></td>
                </tr>
                <tr>
                    <td width="456">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>

                <tr>
                    <td height="31" colspan="4"><strong><?= setstring('mal', 'Keluasan', 'en', 'Area'); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($data, 2); ?></span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares') ?></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><strong><?= setstring('mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?> </strong></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td width="128">&nbsp;</td>
                    <td width="214">&nbsp;</td>
                    <td width="181">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan16">
                            <tr>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3"></div></td>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep'); ?></div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
                                    <div align="center" class="style3"> (RM)</div></td>
                            </tr>

                            <tr>
                                <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
                                <td width="428" bgcolor="#99FF99"><?= setstring('mal', 'Meracun', 'en', 'Weeding'); ?> &nbsp;</td>
                                <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
    <?php
    if ($nilai->total_b_1 == 0) {
        $nilai->total_b_1 = $nilai->b_1a + $nilai->b_1b + $nilai->b_1c;
        echo number_format($nilai->total_b_1, 2);
    } else {
        echo number_format($nilai->total_b_1, 2);
    }
    ?></div></td>
                                <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 = ($nilai->total_b_1 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1a, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $y1 = ($nilai->b_1a / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1b, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $y1 = ($nilai->b_1b / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></span></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1c, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $y1 = ($nilai->b_1c / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">2.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_2, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga2"><?php $y1 = ($nilai->total_b_2 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right">3.</td>
                                <td><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                                <td><div align="center" class="style10"><span class="style6">
    <?php
    if ($nilai->total_b_3 == 0) {
        $nilai->total_b_3 = $nilai->b_3a + $nilai->b_3b + $nilai->b_3c + $nilai->b_3d;
        echo number_format($nilai->total_b_3, 2);
    } else {
        echo number_format($nilai->total_b_3, 2);
    }
    ?></span></div></td>
                                <td><div align="center" class="style10">
                                        <span id="jaga3"><?php $y1 = ($nilai->total_b_3 / $data);
    echo number_format($y1, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3a, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $y1 = ($nilai->b_3a / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">ii. <?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3b, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $y1 = ($nilai->b_3b / $data);
                                echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3c, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $y1 = ($nilai->b_3c / $data);
                            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
<?php /*
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3d, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $y1 = ($nilai->b_3d / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right" bgcolor="#99FF99">4.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_4, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga4"><?php $y1 = ($nilai->total_b_4 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_5, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $y1 = ($nilai->total_b_5 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="40" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_6, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga6"><?php $y1 = ($nilai->total_b_6 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">7.</td>
                                <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
                                <td><div align="center"><?= number_format($nilai->total_b_7, 2); ?></div></td>
                                <td><div align="center"><span id="jaga7"><?php $y1 = ($nilai->total_b_7 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_8, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga8"><?php $y1 = ($nilai->total_b_8 / $data);
        echo number_format($y1, 2); ?></span></div></td> */?>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">4.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></div></td>
                              <td><div align="center"><?= number_format($nilai->total_b_16, 2); ?></div></td>
                                <td><div align="center"><span id="jaga16"><?php $y1 = ($nilai->total_b_16 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>

                            <tr bgcolor="#FFFFFF">
                                <td height="36" align="right">5.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Penjagaan jalan, parit, ban & pintu air dan sebagainya', 'en', 'Maintenance of road, drain, bund watergate and etc'); ?></div></td>
                            <td><div align="center"><?= number_format($nilai->total_b_15, 2); ?></div></td>
                                <td><div align="center"><span id="jaga15"><?php $y1 = ($nilai->total_b_15 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>

                            <tr>
                                <td height="35" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_9, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga9"><?php $y1 = ($nilai->total_b_9 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#FFFFFF">7.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_10, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga10"><?php $y1 = ($nilai->total_b_10 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_11, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga11"><?php $y1 = ($nilai->total_b_11 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_12, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga12"><?php $y1 = ($nilai->total_b_12 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
<?php /*
                            <tr>
                                <td height="38" align="right">13.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_13, 2); ?></div></td>
                                <td><div align="center"><span id="jaga13"><?php $y1 = ($nilai->total_b_13 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr> */?>

                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">10.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_14, 2); ?></div></td>
                                <td><div align="center"><span id="jaga14"><?php $y1 = ($nilai->total_b_14 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>





                              <td bgcolor="#99FF99"><div align="center"> </td>
                                  <td bgcolor="#99FF99"><div align="center"> </td>

                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>


                        </table></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="44" colspan="2"><div align="right"><strong><?= setstring('mal', 'Jumlah kos', 'en', 'Total cost'); ?>
                                <span style="text-transform:lowercase;">
                                        <?php
                                        echo setstring('mal', 'penanaman semula', 'en', 'replanting');
                                        ?>
                                </span> <?= setstring('mal', 'tahun', 'en', 'year') ?>
                                        <?php
                                        echo setstring('mal', 'kedua', 'en', '2')
                                        ?> : </strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_b; ?></span></strong><strong><span class="style6">
                                        <?= number_format($nilai->total_b, 2); ?></span></strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha"><?php $kph = (($total_all) / ($data));
                                    echo number_format($kph, 2); ?></span></strong></div></td>
                </tr>
                <tr>
                    <td colspan="4"><br /></td>
                </tr>
            </table>
<?php } ?>
<?php if ($totalblm222 > 0) { ?>
    <?php
    $table = "tanam_semula";
    $data = "tanaman_semula";
    $year = 3;

    $value[0] = $_SESSION['lesen'];
    $value[1] = $_SESSION['tahun'];
    $value[2] = $year;
    $value[3] = "Penanaman Semula";

    $nilai = new user('penanaman_baru', $value);

    $ft = $_SESSION['tahun'];
    $st = $ft[2] . $ft[3];

    $tahunsebelum = $st - $year;
    if (strlen($tahunsebelum) == 1) {
        $tahunsebelum = '0' . $tahunsebelum;
    }

    $table = $table . $tahunsebelum;

    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
    $rblm = mysqli_query($con, $qblm);
    $rowblm = mysqli_fetch_array($rblm);
    $totalblm = mysqli_num_rows($rblm);

    $data = $rowblm[$data];
    ?>
            <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="ringkasan15">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><span class="style7"><?= setstring('mal', 'MAKLUMAT KAWASAN BELUM MATANG  BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
                            <span style="text-transform:uppercase; color:#FF3300;">
    <?php
    echo setstring('mal', 'Penanaman Semula', 'en', 'Replanting');
    ?>
                            </span>
    <?= setstring('mal', 'TAHUN ', 'en', 'YEAR'); ?>
    <?php echo setstring('mal', 'KETIGA', 'en', '3');
    $x = 3; ?>
                        </span></td>
                </tr>

                <tr>
                    <td><span class="style7">(
    <?= setstring('mal', 'DITANAM PADA TAHUN', 'en', 'PLANTED IN YEAR'); ?>
    <?php echo $ts = $tahunsemasa - $x; ?>)</span></td>
                    <td colspan="3"><span class="style8"></span></td>
                </tr>
                <tr>
                    <td width="456">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>

                <tr>
                    <td height="31" colspan="4"><strong><?= setstring('mal', 'Keluasan', 'en', 'Area'); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($data, 2); ?></span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><strong><?= setstring('mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?> </strong></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td width="128">&nbsp;</td>
                    <td width="214">&nbsp;</td>
                    <td width="181">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan17">
                            <tr>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3"></div></td>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep') ?></div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
                                    <div align="center" class="style3"> (RM)</div></td>
                            </tr>

                            <tr>
                                <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
                                <td width="428" bgcolor="#99FF99"><?= setstring('mal', 'Meracun', 'en', 'Weeding') ?> &nbsp;</td>
                                <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
    <?php
    if ($nilai->total_b_1 == 0) {
        $nilai->total_b_1 = $nilai->b_1a + $nilai->b_1b + $nilai->b_1c;
        echo number_format($nilai->total_b_1, 2);
    } else {
        echo number_format($nilai->total_b_1, 2);
    }
    ?>
                                    </div></td>
                                <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 = ($nilai->total_b_1 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1a, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $y1 = ($nilai->b_1a / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1b, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $y1 = ($nilai->b_1b / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></span>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span>
                                </td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1c, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $y1 = ($nilai->b_1c / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">2.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_2, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center">
                                        <span id="jaga2"><?php $y1 = ($nilai->total_b_2 / $data);
    echo number_format($y1, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right">3.</td>
                                <td><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                                <td><div align="center" class="style10"><span class="style6">
                                    <?php
                                    if ($nilai->total_b_3 == 0) {
                                        $nilai->total_b_3 = $nilai->b_3a + $nilai->b_3b + $nilai->b_3c;
                                        echo number_format($nilai->total_b_3, 2);
                                    } else {
                                        echo number_format($nilai->total_b_3, 2);
                                    }
                                    ?></div></td>
                                <td><div align="center" class="style10">
                                        <span id="jaga3"><?php $y1 = ($nilai->total_b_3 / $data);
                                    echo number_format($y1, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3a, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $y1 = ($nilai->b_3a / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">ii. <?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3b, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $y1 = ($nilai->b_3b / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3c, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $y1 = ($nilai->b_3c / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
<?php /*
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3d, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $y1 = ($nilai->b_3d / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right" bgcolor="#99FF99">4.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_4, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga4"><?php $y1 = ($nilai->total_b_4 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_5, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $y1 = ($nilai->total_b_5 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="40" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_6, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga6"><?php $y1 = ($nilai->total_b_6 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">7.</td>
                                <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
                                <td><div align="center"><?= number_format($nilai->total_b_7, 2); ?></div></td>
                                <td><div align="center"><span id="jaga7"><?php $y1 = ($nilai->total_b_7 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_8, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga8"><?php $y1 = ($nilai->total_b_8 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>  */?>
                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">4.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_16, 2); ?></div></td>
                                <td><div align="center"><span id="jaga16"><?php $y1 = ($nilai->total_b_16 / $data);
            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td height="36" align="right">5.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Penjagaan jalan, parit, ban & pintu air dan sebagainya', 'en', 'Maintenance of road, drain, bund watergate and etc'); ?></div></td>
<td><div align="center"><?= number_format($nilai->total_b_15, 2); ?></div></td>
                                <td><div align="center"><span id="jaga15"><?php $y1 = ($nilai->total_b_15 / $data);
            echo number_format($y1, 2); ?></span></div></td>
                            </tr>

                            <tr>
                                <td height="35" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_9, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga9"><?php $y1 = ($nilai->total_b_9 / $data);
            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#FFFFFF">7.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_10, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga10"><?php $y1 = ($nilai->total_b_10 / $data);
            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_11, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga11"><?php $y1 = ($nilai->total_b_11 / $data);
            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_12, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga12"><?php $y1 = ($nilai->total_b_12 / $data);
            echo number_format($y1, 2); ?></span></div></td>
                            </tr>
<?php /*
                            <tr>
                                <td height="38" align="right">13.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_13, 2); ?></div></td>
                                <td><div align="center"><span id="jaga13"><?php $y1 = ($nilai->total_b_13 / $data);
            echo number_format($y1, 2); ?></span></div></td>
                            </tr> */?>

                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">10.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_14, 2); ?></div></td>
                                <td><div align="center"><span id="jaga14"><?php $y1 = ($nilai->total_b_14 / $data);
            echo number_format($y1, 2); ?></span></div></td>
                            </tr>


                                <td bgcolor="#99FF99"><div align="center"> </td>
                                    <td bgcolor="#99FF99"><div align="center"> </td>

                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>
                        </table></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="44" colspan="2"><div align="right"><strong><?= setstring('mal', 'Jumlah kos', 'en', 'Total cost'); ?>
                                <span style="text-transform:lowercase;">
    <?php
    echo setstring('mal', 'penanaman semula', 'en', 'replanting');
    ?>
                                </span> <?= setstring('mal', 'tahun', 'en', 'year'); ?>
    <?php echo setstring('mal', 'ketiga', 'en', '3'); ?> : </strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_b; ?></span></strong><strong><span class="style6">
    <?= number_format($nilai->total_b, 2); ?></span></strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha"><?php $kph = (($total_all) / ($data));
    echo number_format($kph, 2); ?></span></strong></div></td>
                </tr>
                <tr>
                    <td colspan="4"><br /></td>
                </tr>
            </table>
<?php } ?>

<?php if ($totalblm3 > 0) { ?>
    <?php
    $table = "tanam_tukar";
    $data = "tanaman_tukar";
    $ft = $_SESSION['tahun'];
    $st = $ft[2] . $ft[3];
    $year = 1;

    $value[0] = $_SESSION['lesen'];
    $value[1] = $_SESSION['tahun'];
    $value[2] = $year;
    $value[3] = "Penukaran";

    $nilai = new user('penanaman_baru', $value);

    $tahunsebelum = $st - $year;
    if (strlen($tahunsebelum == 1)) {
        $table = $table . '0' . $tahunsebelum;
    } else {
        $table = $table . $tahunsebelum;
    }

    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
    $rblm = mysqli_query($con, $qblm);
    $rowblm = mysqli_fetch_array($rblm);

    $totalblm = mysqli_num_rows($rblm);
    $data = $rowblm[$data];
    ?>
            <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="ringkasan18">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><span class="style7">
    <?= setstring('mal', 'MAKLUMAT KAWASAN BELUM MATANG BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
                            <span style="text-transform:uppercase; color:#FF3300;">

    <?php echo setstring('mal', 'Penukaran', 'en', 'Conversion'); ?>
                            </span>

    <?php
    echo setstring('mal', 'TAHUN PERTAMA', 'en', 'FIRST YEAR');
    $x = 1;
    ?>
                        </span></td>
                </tr>

                <tr>
                    <td><span class="style7">(<?= setstring('mal', 'DITANAM PADA', 'en', 'PLANTED IN YEAR'); ?> <?php echo $ts = $tahunsemasa - $x; ?>)</span></td>
                    <td colspan="3"><span class="style8"></span></td>
                </tr>
                <tr>
                    <td width="456">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>

                <tr>
                    <td height="31" colspan="4"><strong><?= setstring('mal', 'Keluasan ', 'en', 'Area'); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($keluasan_sub, 2); ?></span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><strong><?= setstring('mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?></strong></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td width="128">&nbsp;</td>
                    <td width="214">&nbsp;</td>
                    <td width="181">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="4">
                        <table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan19">
                            <tr>
                                <td height="40" align="right" background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="right" class="style1 style2 style11">a.  </div></td>
                                <td height="34" align="right" background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="left" class="style12"><?= setstring('mal', 'Perbelanjaan Tidak Berulang', 'en', 'Non-Recurrent Expenditures'); ?></div></td>
                                <td background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="center" class="style12"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style12">(RM)</div></td>
                                <td background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="center" class="style12"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per hectare'); ?></div>
                                    <div align="center" class="style12"> (RM)</div></td>
                            </tr>

                            <tr bgcolor="#99FF99">
                                <td width="18" height="35" align="right">1.</td>
                                <td width="429" bgcolor="#99FF99"><?= setstring('mal', 'Menebang dan membersih kawasan', 'en', 'Felling and land clearing'); ?></td>
                                <td width="163"><div align="center"><?= number_format($nilai->a_1, 2); ?></div></td>
                                <td width="138"><div align="center"><span id="kosha1"><?php $x1 = ($nilai->a_1 / $data);
                                    echo number_format($x1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">2.</td>
                                <td><?= setstring('mal', 'Membuat teres dan landasan', 'en', 'Terracing and platform') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_2, 2); ?></div></td>
                                <td><div align="center"><span id="kosha2"><?php $x2 = ($nilai->a_2 / $data);
                                        echo number_format($x2, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="43" align="right">3.</td>
                                <td><?= setstring('mal', 'Pembinaan jalan', 'en', 'Road construction') ?></td>
                                <td><div align="center"><?= number_format($nilai->a_3, 2); ?></div></td>
                                <td><div align="center"><span id="kosha3"><?php $x3 = ($nilai->a_3 / $data);
                                        echo number_format($x3, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right">4.</td>
                                <td><?= setstring('mal', 'Pembinaan parit', 'en', 'Drain construction') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_4, 2); ?></div></td>
                                <td><div align="center"><span id="kosha4"><?php $x4 = ($nilai->a_4 / $data);
                                        echo number_format($x4, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="38" align="right">5.</td>
                                <td><?= setstring('mal', 'Pembinaan ban dan pintu air', 'en', 'Bund and watergate construction') ?> </td>
                                <td><div align="center"><?= number_format($nilai->a_5, 2); ?></div></td>
                                <td><div align="center"><span id="kosha5"><?php $x5 = ($nilai->a_5 / $data);
                                        echo number_format($x5, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="31" align="right">6.</td>
                                <td><?= setstring('mal', 'Membaris', 'en', 'Lining') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_6, 2); ?></div></td>
                                <td><div align="center"><span id="kosha6"><?php $x6 = ($nilai->a_6 / $data);
                                        echo number_format($x6, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="31" align="right">7.</td>
                                <td><?= setstring('mal', 'Melubang dan menanam', 'en', 'Holing and planting') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_7, 2); ?></div></td>
                                <td><div align="center"><span id="kosha7"><?php $x7 = ($nilai->a_7 / $data);
                                        echo number_format($x7, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right">8.</td>
                                <td><?= setstring('mal', 'Pembajaan awal', 'en', 'Basal fertiliser') ?> &nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_8, 2); ?></div></td>
                                <td><div align="center"><span id="kosha8"><?php $x8 = ($nilai->a_8 / $data);
                                        echo number_format($x8, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="32" align="right">9.</td>
                                <td><?= setstring('mal', 'Bahan tanaman', 'en', 'Planting material') ?>&nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_9, 2); ?></div></td>
                                <td><div align="center"><span id="kosha9"><?php $x9 = ($nilai->a_9 / $data);
                                        echo number_format($x9, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="32" align="right">10.</td>
                                <td><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops') ?>&nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_10, 2); ?></div></td>
                                <td><div align="center"><span id="kosha10"><?php $x10 = ($nilai->a_10 / $data);
                                        echo number_format($x10, 2); ?></span></div></td>
                            </tr>
                            <tr bgcolor="#99FF99">
                                <td height="32" align="right">11.</td>
                                <td><?= setstring('mal', 'Perbelanjaan-perbelanjaan lain', 'en', 'Other expenditures'); ?>&nbsp;</td>
                                <td><div align="center"><?= number_format($nilai->a_11, 2); ?></div></td>
                                <td><div align="center"><span id="kosha11"><?php $x11 = ($nilai->a_11 / $data);
                                        echo number_format($x11, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td align="right">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>
                            <tr>
                                <td height="45" align="right"><div align="right"></div></td>
                                <td><div align="right"><strong><?= setstring('mal', 'Jumlah kecil', 'en', 'Subtotal'); ?> (a) :</strong><strong> </strong></div></td>
                                <td bgcolor="#FFCC66"><div align="center"><?= number_format($nilai->total_a, 2); ?></div></td>
                                <td bgcolor="#FFCC66"><div align="center"><strong>
                                            <span id="total_kos_per_ha_a"><?php $total_x = $x1 + $x2 + $x3 + $x4 + $x5 + $x6 + $x7 + $x8 + $x9 + $x10 + $x11;
                                        echo number_format($total_x, 2); ?></span>
                                        </strong>

                                    </div></td>
                            </tr>
                            <tr>
                                <td align="right">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan20">
                            <tr>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3">b. </div></td>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep'); ?></div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
                                    <div align="center" class="style3"> (RM)</div></td>
                            </tr>

                            <tr>
                                <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
                                <td width="428" bgcolor="#99FF99"><?= setstring('mal', 'Meracun', 'en', 'Weeding'); ?> &nbsp;</td>
                                <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
    <?php
    if ($nilai->total_b_1 == 0) {
        $nilai->total_b_1 = $nilai->b_1a + $nilai->b_1b + $nilai->b_1c;
        echo number_format($nilai->total_b_1, 2);
    } else {
        echo number_format($nilai->total_b_1, 2);
    }
    ?></div></td>
                                <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 = ($nilai->total_b_1 / $data);
    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1a, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $sy1 = ($nilai->b_1a / $data);
    echo number_format($sy1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1b, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $sy2 = ($nilai->b_1b / $data);
    echo number_format($sy2, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></span>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1c, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $sy3 = ($nilai->b_1c / $data);
    echo number_format($sy3, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">2.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_2, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center">
                                        <span id="jaga2"><?php $y3 = ($nilai->total_b_2 / $data);
        echo number_format($y3, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right">3.</td>
                                <td><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                                <td><div align="center" class="style10"><span class="style6">
            <?php
            if ($nilai->total_b_3 == 0) {
                $nilai->total_b_3 = $nilai->b_3a + $nilai->b_3b + $nilai->b_3c + $nilai->b_3d;
                echo number_format($nilai->total_b_3, 2);
            } else {
                echo number_format($nilai->total_b_3, 2);
            }
            ?></span></div></td>
                                <td><div align="center" class="style10">
                                        <span id="jaga3"><?php $y2 = ($nilai->total_b_3 / $data);
        echo number_format($y2, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3a, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $sy1a = ($nilai->b_3a / $data);
        echo number_format($sy1a, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">ii. <?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3b, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $sy1b = ($nilai->b_3b / $data);
        echo number_format($sy1b, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3c, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $sy1c = ($nilai->b_3c / $data);
                        echo number_format($sy1c, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3d, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $sy1d = ($nilai->b_3d / $data);
                        echo number_format($sy1d, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right" bgcolor="#99FF99">4.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_4, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga4"><?php $y4 = ($nilai->total_b_4 / $data);
                        echo number_format($y4, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?> </td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_5, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $y5 = ($nilai->total_b_5 / $data);
                        echo number_format($y5, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="40" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_6, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga6"><?php $y6 = ($nilai->total_b_6 / $data);
                        echo number_format($y6, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">7.</td>
                                <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
                                <td><div align="center"><?= number_format($nilai->total_b_7, 2); ?> </div></td>
                                <td><div align="center"><span id="jaga7"><?php $y7 = ($nilai->total_b_7 / $data);
                        echo number_format($y7, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_8, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga8"><?php $y8 = ($nilai->total_b_8 / $data);
                        echo number_format($y8, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_9, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga9"><?php $y9 = ($nilai->total_b_9 / $data);
                        echo number_format($y9, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">10.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_10, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga10"><?php $y10 = ($nilai->total_b_10 / $data);
                        echo number_format($y10, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">11.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_11, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga11"><?php $y11 = ($nilai->total_b_11 / $data);
                                    echo number_format($y11, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#99FF99">12.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_12, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga12"><?php $y12 = ($nilai->total_b_12 / $data);
                                    echo number_format($y12, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">13.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_13, 2); ?></div></td>
                                <td><div align="center"><span id="jaga13"><?php $y13 = ($nilai->total_b_13 / $data);
                                    echo number_format($y13, 2); ?></span></div></td>
                            </tr>

                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">14.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_14, 2); ?></div></td>
                                <td><div align="center"><span id="jaga14"><?php $y14 = ($nilai->total_b_14 / $data);
                                    echo number_format($y14, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>
                            <tr>
                                <td height="35" colspan="2" align="right"><strong><?= setstring('mal', 'Jumlah kecil', 'en', 'Subtotal'); ?> (b) :</strong></td>
                                <td bgcolor="#FFCC66"><div align="center"><strong><span class="style6"><?= number_format($nilai->total_b, 2); ?></span></strong></div></td>
                                <td bgcolor="#FFCC66"><div align="center"><strong><span id="total_kos_per_ha_b"><?php $z = ($nilai->total_b / $data);
                                    echo number_format($z, 2); ?></span></strong></div></td>
                            </tr>
                            <tr>
                                <td height="17" colspan="2" align="right">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="44" colspan="2"><div align="right"><strong><?= setstring('mal', 'Jumlah kos', 'en', 'Total cost'); ?>
                                <span style="text-transform:lowercase;">
    <?php echo setstring('mal', 'Penukaran', 'en', 'Conversion'); ?></span>

    <?php echo setstring('mal', 'pada tahun pertama', 'en', 'on first year'); ?>
                                : </strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_a + $nilai->total_b;
    echo number_format($total_all, 2); ?></span></strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha"><?php $kph = (($total_all) / ($data));
    echo number_format($kph, 2); ?></span></strong></div></td>
                </tr>
                <tr>
                    <td colspan="4"><br /></td>
                </tr>
            </table>
<?php } ?>
<?php if ($totalblm33 > 0) { ?>
    <?php
    $table = "tanam_tukar";
    $data = "tanaman_tukar";
    $year = 2;

    $value[0] = $_SESSION['lesen'];
    $value[1] = $_SESSION['tahun'];
    $value[2] = $year;
    $value[3] = "Penukaran";

    $nilai = new user('penanaman_baru', $value);

    $ft = $_SESSION['tahun'];
    $st = $ft[2] . $ft[3];

    $tahunsebelum = $st - $year;

    if (strlen($tahunsebelum) == 1) {
        $tahunsebelum = '0' . $tahunsebelum;
    }

    $table = $table . $tahunsebelum;

    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
    $rblm = mysqli_query($con, $qblm);
    $rowblm = mysqli_fetch_array($rblm);
    $totalblm = mysqli_num_rows($rblm);

    $data = $rowblm[$data];
    ?>
            <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="ringkasan21">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><span class="style7"><?= setstring('mal', 'MAKLUMAT KAWASAN BELUM MATANG BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
                            <span style="text-transform:uppercase; color:#FF3300;">
    <?php echo setstring('mal', 'penukaran', 'en', 'conversion'); ?>
                            </span>
    <?= setstring('mal', 'TAHUN', 'en', 'YEAR'); ?>
    <?php echo setstring('mal', 'KEDUA', 'en', '2');
    $x = 2; ?>
                        </span></td>
                </tr>

                <tr>
                    <td><span class="style7">(<?= setstring('mal', 'DITANAM PADA TAHUN ', 'en', 'PLANTED IN YEAR'); ?> <?php echo $ts = $tahunsemasa - $x; ?>)</span></td>
                    <td colspan="3"><span class="style8"></span></td>
                </tr>
                <tr>
                    <td width="456">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>

                <tr>
                    <td height="31" colspan="4"><strong><?= setstring('mal', 'Keluasan', 'en', 'Area'); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($data, 2); ?></span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares') ?></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><strong><?= setstring('mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?> </strong></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td width="128">&nbsp;</td>
                    <td width="214">&nbsp;</td>
                    <td width="181">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan23">
                            <tr>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3"></div></td>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep'); ?></div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
                                    <div align="center" class="style3"> (RM)</div></td>
                            </tr>

                            <tr>
                                <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
                                <td width="428" bgcolor="#99FF99"><?= setstring('mal', 'Meracun', 'en', 'Weeding'); ?> &nbsp;</td>
                                <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
                                    <?php
                                    if ($nilai->total_b_1 == 0) {
                                        $nilai->total_b_1 = $nilai->b_1a + $nilai->b_1b + $nilai->b_1c;
                                        echo number_format($nilai->total_b_1, 2);
                                    } else {
                                        echo number_format($nilai->total_b_1, 2);
                                    }
                                    ?></div></td>
                                <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 = ($nilai->total_b_1 / $data);
                                    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1a, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $y1 = ($nilai->b_1a / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1b, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $y1 = ($nilai->b_1b / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></span>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1c, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $y1 = ($nilai->b_1c / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">2.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_2, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga2"><?php $y1 = ($nilai->total_b_2 / $data);
        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right">3.</td>
                                <td><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                                <td><div align="center" class="style10"><span class="style6">
    <?php
    if ($nilai->total_b_3 == 0) {
        $nilai->total_b_3 = $nilai->b_3a + $nilai->b_3b + $nilai->b_3c + $nilai->b_3d;
        echo number_format($nilai->total_b_3, 2);
    } else {
        echo number_format($nilai->total_b_3, 2);
    }
    ?></span></div></td>
                                <td><div align="center" class="style10">
                                        <span id="jaga3"><?php $y1 = ($nilai->total_b_3 / $data);
    echo number_format($y1, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3a, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $y1 = ($nilai->b_3a / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">ii. <?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3b, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $y1 = ($nilai->b_3b / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3c, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $y1 = ($nilai->b_3c / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3d, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $y1 = ($nilai->b_3d / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right" bgcolor="#99FF99">4.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_4, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga4"><?php $y1 = ($nilai->total_b_4 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_5, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $y1 = ($nilai->total_b_5 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="40" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_6, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga6"><?php $y1 = ($nilai->total_b_6 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">7.</td>
                                <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
                                <td><div align="center"><?= number_format($nilai->total_b_7, 2); ?></div></td>
                                <td><div align="center"><span id="jaga7"><?php $y1 = ($nilai->total_b_7 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_8, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga8"><?php $y1 = ($nilai->total_b_8 / $data);
                                    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_9, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga9"><?php $y1 = ($nilai->total_b_9 / $data);
                                    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">10.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_10, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga10"><?php $y1 = ($nilai->total_b_10 / $data);
                                    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">11.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_11, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga11"><?php $y1 = ($nilai->total_b_11 / $data);
                                    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#99FF99">12.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_12, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga12"><?php $y1 = ($nilai->total_b_12 / $data);
                                    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">13.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_13, 2); ?></div></td>
                                <td><div align="center"><span id="jaga13"><?php $y1 = ($nilai->total_b_13 / $data);
                                    echo number_format($y1, 2); ?></span></div></td>
                            </tr>

                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">14.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_14, 2); ?></div></td>
                                <td><div align="center"><span id="jaga14"><?php $y1 = ($nilai->total_b_14 / $data);
                                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>


                        </table></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="44" colspan="2"><div align="right"><strong><?= setstring('mal', 'Jumlah kos', 'en', 'Total cost'); ?>
                                <span style="text-transform:lowercase;">
    <?php
    echo setstring('mal', 'penukaran', 'en', 'conversion');
    ?>
                                </span> <?= setstring('mal', 'tahun', 'en', 'year') ?>
    <?php
    echo setstring('mal', 'kedua', 'en', '2')
    ?> : </strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_b; ?></span></strong><strong><span class="style6">
    <?= number_format($nilai->total_b, 2); ?></span></strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha"><?php $kph = (($total_all) / ($data));
    echo number_format($kph, 2); ?></span></strong></div></td>
                </tr>
                <tr>
                    <td colspan="4"><br /></td>
                </tr>
            </table>
<?php } ?>
<?php if ($totalblm333 > 0) { ?>
    <?php
    $table = "tanam_tukar";
    $data = "tanaman_tukar";
    $year = 3;

    $value[0] = $_SESSION['lesen'];
    $value[1] = $_SESSION['tahun'];
    $value[2] = $year;
    $value[3] = "Penukaran";

    $nilai = new user('penanaman_baru', $value);

    $ft = $_SESSION['tahun'];
    $st = $ft[2] . $ft[3];

    $tahunsebelum = $st - $year;
    if (strlen($tahunsebelum) == 1) {
        $tahunsebelum = '0' . $tahunsebelum;
    }

    $table = $table . $tahunsebelum;

    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
    $rblm = mysqli_query($con, $qblm);
    $rowblm = mysqli_fetch_array($rblm);
    $totalblm = mysqli_num_rows($rblm);

    $data = $rowblm[$data];
    ?>
            <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="ringkasan24">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><span class="style7"><?= setstring('mal', 'MAKLUMAT KAWASAN BELUM MATANG  BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
                            <span style="text-transform:uppercase; color:#FF3300;">
    <?php
    echo setstring('mal', 'Penukaran', 'en', 'conversion');
    ?>
                            </span>
    <?= setstring('mal', 'TAHUN ', 'en', 'YEAR'); ?>
    <?php echo setstring('mal', 'KETIGA', 'en', '3');
    $x = 3; ?>
                        </span></td>
                </tr>

                <tr>
                    <td><span class="style7">(
    <?= setstring('mal', 'DITANAM PADA TAHUN', 'en', 'PLANTED IN YEAR'); ?>
    <?php echo $ts = $tahunsemasa - $x; ?>)</span></td>
                    <td colspan="3"><span class="style8"></span></td>
                </tr>
                <tr>
                    <td width="456">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>

                <tr>
                    <td height="31" colspan="4"><strong><?= setstring('mal', 'Keluasan', 'en', 'Area'); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($data, 2); ?></span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><strong><?= setstring('mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?> </strong></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td width="128">&nbsp;</td>
                    <td width="214">&nbsp;</td>
                    <td width="181">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;" aria-describedby="ringkasan25">
                            <tr>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3"></div></td>
                                <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep') ?></div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
                                <td background="../images/tb_BG.gif"><div align="center" class="style3"><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
                                    <div align="center" class="style3"> (RM)</div></td>
                            </tr>

                            <tr>
                                <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
                                <td width="428" bgcolor="#99FF99"><?= setstring('mal', 'Meracun', 'en', 'Weeding') ?> &nbsp;</td>
                                <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
                                <?php
                                if ($nilai->total_b_1 == 0) {
                                    $nilai->total_b_1 = $nilai->b_1a + $nilai->b_1b + $nilai->b_1c;
                                    echo number_format($nilai->total_b_1, 2);
                                } else {
                                    echo number_format($nilai->total_b_1, 2);
                                }
                                ?>
                                    </div></td>
                                <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 = ($nilai->total_b_1 / $data);
                                echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1a, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $y1 = ($nilai->b_1a / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1b, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $y1 = ($nilai->b_1b / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">&nbsp;</td>
                                <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></span></td>
                                <td bgcolor="#CCCCFF"><div align="center"><?= number_format($nilai->b_1c, 2); ?></div></td>
                                <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $y1 = ($nilai->b_1c / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">2.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_2, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center">
                                        <span id="jaga2"><?php $y1 = ($nilai->total_b_2 / $data);
                        echo number_format($y1, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right">3.</td>
                                <td><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                                <td><div align="center" class="style10"><span class="style6">
                                    <?php
                                    if ($nilai->total_b_3 == 0) {
                                        $nilai->total_b_3 = $nilai->b_3a + $nilai->b_3b + $nilai->b_3c;
                                        echo number_format($nilai->total_b_3, 2);
                                    } else {
                                        echo number_format($nilai->total_b_3, 2);
                                    }
                                    ?></div></td>
                                <td><div align="center" class="style10">
                                        <span id="jaga3"><?php $y1 = ($nilai->total_b_3 / $data);
                                echo number_format($y1, 2); ?></span>
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3a, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $y1 = ($nilai->b_3a / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">ii. <?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3b, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $y1 = ($nilai->b_3b / $data);
                                echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                                  <br>
                                  <span class="kecil">(
                                      <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                      )        </span></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3c, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $y1 = ($nilai->b_3c / $data);
                                echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right">&nbsp;</td>
                                <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                                <td bgcolor="#FFFFCC"><div align="center"><?= number_format($nilai->b_3d, 2); ?></div></td>
                                <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $y1 = ($nilai->b_3d / $data);
                                echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="39" align="right" bgcolor="#99FF99">4.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_4, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga4"><?php $y1 = ($nilai->total_b_4 / $data);
                                echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_5, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $y1 = ($nilai->total_b_5 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="40" align="right" bgcolor="#99FF99">6.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_6, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga6"><?php $y1 = ($nilai->total_b_6 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">7.</td>
                                <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
                                <td><div align="center"><?= number_format($nilai->total_b_7, 2); ?></div></td>
                                <td><div align="center"><span id="jaga7"><?php $y1 = ($nilai->total_b_7 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="37" align="right" bgcolor="#99FF99">8.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_8, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga8"><?php $y1 = ($nilai->total_b_8 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_9, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga9"><?php $y1 = ($nilai->total_b_9 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right" bgcolor="#99FF99">10.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_10, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga10"><?php $y1 = ($nilai->total_b_10 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="34" align="right" bgcolor="#FFFFFF">11.</td>
                                <td bgcolor="#FFFFFF"><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?= number_format($nilai->total_b_11, 2); ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga11"><?php $y1 = ($nilai->total_b_11 / $data);
                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="35" align="right" bgcolor="#99FF99">12.</td>
                                <td bgcolor="#99FF99"><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
                                <td bgcolor="#99FF99"><div align="center"><?= number_format($nilai->total_b_12, 2); ?></div></td>
                                <td bgcolor="#99FF99"><div align="center"><span id="jaga12"><?php $y1 = ($nilai->total_b_12 / $data);
                                    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td height="38" align="right">13.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_13, 2); ?></div></td>
                                <td><div align="center"><span id="jaga13"><?php $y1 = ($nilai->total_b_13 / $data);
                                        echo number_format($y1, 2); ?></span></div></td>
                            </tr>

                            <tr bgcolor="#99FF99">
                                <td height="36" align="right">14.</td>
                                <td align="right"><div align="left"><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
                                <td><div align="center"><?= number_format($nilai->total_b_14, 2); ?></div></td>
                                <td><div align="center"><span id="jaga14"><?php $y1 = ($nilai->total_b_14 / $data);
                                    echo number_format($y1, 2); ?></span></div></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td><div align="center"></div></td>
                                <td><div align="center"></div></td>
                            </tr>
                        </table></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="44" colspan="2"><div align="right"><strong><?= setstring('mal', 'Jumlah kos', 'en', 'Total cost'); ?>
                                <span style="text-transform:lowercase;">
    <?php
    echo setstring('mal', 'penukaran', 'en', 'conversion');
    ?>
                                </span> <?= setstring('mal', 'tahun', 'en', 'year'); ?>
    <?php echo setstring('mal', 'ketiga', 'en', '3'); ?> : </strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_b; ?></span></strong><strong><span class="style6">
                                            <?= number_format($nilai->total_b, 2); ?></span></strong></div></td>
                    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha"><?php $kph = (($total_all) / ($data));
                                        echo number_format($kph, 2); ?></span></strong></div></td>
                </tr>
                <tr>
                    <td colspan="4"><br /></td>
                </tr>
            </table>
                                    <?php } ?>

        <!--Kawasan Matang-->
        <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="ringkasan22">
            <tr>
                <td colspan="5" class="style1">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5" class="style55"><strong><h2><?= setstring('mal', 'MAKLUMAT KAWASAN MATANG', 'en', 'MATURED AREA INFORMATION'); ?></h2></strong></td>
            </tr>
            <tr>
                <td colspan="5" class="style55"><strong><?= setstring('mal', '(DITANAM PADA TAHUN', 'en', '(PLANTED ON'); ?> <span class="style2"><?php
                                    $tahun = $_SESSION['tahun'];
                                    echo $tahun_sebelum = $tahun - 4;
                                    ?></span> <?= setstring('mal', 'ATAU SEBELUMNYA)', 'en', 'OR BEFORE)'); ?></strong></td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="5"><span class="style56">
                                            <?php /* setstring('mal', 'Keluasan kawasan matang pada tahun lepas (terakhir dari e-sub)', 'en', 'Matured area on last year (Final from e-sub)'); */?>
                                            <?= setstring('mal', 'Keluasan kawasan matang pada tahun', 'en', 'Matured area on year '); ?>

                                            <span class="style2">
                                            <?php
                                            $tahun = $_SESSION['tahun'];
                                            echo $tahun_sebelum = $tahun - 1;
                                            ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td width="358" height="31"><span style="color:#0000CC; font-weight:bold;">
<?php
$a = $pengguna->luastuai;
echo number_format($a, 2);
?>
                    </span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></td>
                <td colspan="4">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="5"><?= setstring('mal', 'Tanaman sawit mengikut tahun ditanam', 'en', 'Palm crop according to planted year'); ?> </td>
            </tr>

            <tr>
                <td>
                    <table width="100%" aria-describedby="ringkasan26">
                        <tr>
                            <td width="18%"><strong><?= setstring('mal', 'Tahun ditanam ', 'en', 'Planted Year'); ?></strong></td>
                            <td width="82%"><strong><?= setstring('mal', 'Keluasan (Hektar)', 'en', 'Area (Hectares)'); ?> </strong></td>
                        </tr>

                                        <?php
                                        $a = $_SESSION['tahun'];
                                        $sebelumtahun = $a - 44;

                                        if ($umur->total != 0) {
                                            $total_umur = 0;
                                            for ($j = 0; $j < $umur->total; $j++) {
                                                ?>
                                <tr valign="top">
                                    <td>

                                                <?php
                                                $up = $umur->keluasan[$j];
                                                $total_umur = $total_umur + $up;
                                                ?>
        <?php
        $tahun_y = $_SESSION['tahun'];
        $tahun_3 = $tahun_y - 4;
        echo $umur->tahun_tanam[$j]
        ?>

                                        </select></td>
                                    <td><?= $up; ?>
                                </tr>
    <?php } ?>
<?php } ?>
                        <tr valign="top">
                            <td><div align="right"><strong><?= setstring('mal', 'Jumlah', 'en', 'Total'); ?></strong></div></td>
                            <td><?= $total_umur; ?>
                                    <?php
                                    $total_umur = (int) $total_umur;
                                    $a_semua = (int) $pengguna->luastuai;

                                    $pjl = (int) $pengguna->jumlahluas;

                                    if ($a_semua != $total_umur) {
                                        echo "<br>";
                                        echo setstring('mal', '<strong>Tanaman sawit mengikut tahun <span class=\"style3\">TIDAK SAMA</span> dengan keluasan kawasan matang</strong>', 'en', 'Total plantation by year is <span class=\"style3\">NOT EQUAL</span> to mature area');
                                    }
                                    if ($total_umur > $a_semua) {
                                        echo "<br>";
                                        echo setstring('mal', '<strong>Tanaman sawit mengikut tahun <span class=\"style3\">MELEBIHI</span> keluasan kawasan matang</strong>', 'en', 'Total plantation by year <span class=\"style3\">EXCEED</span> to mature area');
                                    }
                                    ?></td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5"><span class="style57">
                                    <?= setstring('mal', 'Purata keluasan kawasan matang pada tahun lepas', 'en', 'Mean of matured area on last year'); ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td height="27"><span style="color:#0000CC; font-weight:bold;">
<?php
$b = $pengguna->jumlahluas;
echo number_format($b, 2);
?>
                    </span><?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></td>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td height="27" colspan="5"><span class="style58">
                                        <?= setstring('mal', 'Purata hasil pada tahun lepas', 'en', 'Mean of yield on last year'); ?>
                    </span></td>
            </tr>
            <tr>
                <td height="27"><span style="color:#0000CC; font-weight:bold;">
<?php
$c = $tan_ha;
if ($c == 0) {
    echo setstring('mal', 'Tiada Hasil', 'en', 'No yield');
} else {
    echo number_format($c, 2);
}
?>
                    </span> &nbsp;<?= setstring('mal', 'Tan/Ha/Tahun', 'en', 'Tonne/Hectares/Year'); ?></td>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5">
                    <table width="100%" cellpadding="0" cellspacing="0"  frame="box" class="subTable" aria-describedby="ringkasan27">
                        <tr>
                            <td height="52" background="../images/tb_BG.gif"><div align="center"><strong>a.</strong></div></td>
                            <td background="../images/tb_BG.gif"><strong><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep'); ?></strong></td>
                            <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></strong></div>          <div align="center"><strong>(RM)</strong></div></td>
                            <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></strong></div>
                                <div align="center"><strong>(RM)</strong></div></td>
                            <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?></strong> <strong></strong></div>
                                <div align="center"><strong>(RM)</strong></div></td>
                            <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Perubahan Kos Per Hektar dengan Tahun Lepas', 'en', 'Cost Different with Last year'); ?></strong></div>
                                <div align="center"><strong>(%)</strong></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td width="23" height="37" align="center">1.</td>
                            <td width="310"><?= setstring('mal', 'Meracun', 'en', 'Weeding'); ?> &nbsp;</td>
                            <td width="133"><div align="center">
                                        <?php
                                        if ($jaga->total_b_1 == 0) {
                                            $jaga->total_b_1 = $jaga->b_1a + $jaga->b_1b + $jaga->b_1c;
                                        }
                                        ?>
<?= number_format($jaga->total_b_1, 2); ?>
                                </div></td>
                            <td width="120"><div align="center"><span id="jaga1"><?php $x1 = ($jaga->total_b_1 / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td width="139"><div align="center"><span id="s1_tan"><?php $y1 = ($x1 / $tan_ha);
                                    echo number_format($y1, 2);
?></span></div></td>
                            <td width="149"><div align="center"><span id="total_racun_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="32" align="center">&nbsp;</td>
                            <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                            <td bgcolor="#CCCCFF"><div align="center">
                                    <?= number_format($jaga->b_1a, 2); ?>
                                </div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s1"><?php $x1 = ($jaga->b_1a / $b);
                                    echo number_format($x1, 2);
                                    ?></span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s1a_tan"><?php $y1 = ($x1 / $tan_ha);
                                    echo number_format($y1, 2);
                                    ?></span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s1_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="32" align="center">&nbsp;</td>
                            <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                            <td bgcolor="#CCCCFF"><div align="center">
<?= number_format($jaga->b_1b, 2); ?>
                                </div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s2"><?php $x1 = ($jaga->b_1b / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s2a_tan">
<?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?>
                                    </span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s2_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="32" align="center">&nbsp;</td>
                            <td bgcolor="#CCCCFF">iii.  <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>  <br>
                              <span class="kecil">(
                                <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                  )        </span></td>
                            <td bgcolor="#CCCCFF"><div align="center">
                                            <?= number_format($jaga->b_1c, 2); ?>
                                </div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s3"><?php $x1 = ($jaga->b_1c / $b);
                                            echo number_format($x1, 2);
                                            ?></span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s3a_tan"><?php $y1 = ($x1 / $tan_ha);
                                            echo number_format($y1, 2);
                                            ?></span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s3_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="32" align="center" bgcolor="#AEFFAE">2.</td>
                            <td bgcolor="#AEFFAE"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang Control'); ?> </td>
                            <td bgcolor="#AEFFAE"><div align="center">
<?= number_format($jaga->total_b_2, 2); ?>
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga2"><?php $x1 = ($jaga->total_b_2 / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s2_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s4_beza">0</span></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td height="39" align="center" bgcolor="#FFFFFF">3.</td>
                            <td bgcolor="#FFFFFF"><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                            <td bgcolor="#FFFFFF"><div align="center">

<?php
if ($jaga->total_b_3 == 0) {
    $jaga->total_b_3 = $jaga->b_3a + $jaga->b_3b + $jaga->b_3c + $jaga->b_3d;
}
?>

                                        <?= number_format($jaga->total_b_3, 2); ?></div>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="jaga3"><?php $x1 = ($jaga->total_b_3 / $b);
                                        echo number_format($x1, 2);
                                        ?></span></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="s3_tan"><?php $y1 = ($x1 / $tan_ha);
                                        echo number_format($y1, 2);
                                        ?></span></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><span id="total_baja_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="39" align="center">&nbsp;</td>
                            <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                            <td bgcolor="#FFFFCC"><div align="center">
                                        <?= number_format($jaga->b_3a, 2); ?>
                                </div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s6"><?php $x1 = ($jaga->b_3a / $b);
                                        echo number_format($x1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s6a_tan"><?php $y1 = ($x1 / $tan_ha);
                                        echo number_format($y1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s6_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="39" align="center">&nbsp;</td>
                            <td bgcolor="#FFFFCC">ii.<?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers'); ?> </td>
                            <td bgcolor="#FFFFCC"><div align="center">
<?= number_format($jaga->b_3b, 2); ?>
                                </div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s7"><?php $x1 = ($jaga->b_3b / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s7a_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s7_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="39" align="center">&nbsp;</td>
                            <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                              <br>
                              <span class="kecil">(
                                  <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                  )        </span></td>
                            <td bgcolor="#FFFFCC"><div align="center">
<?= number_format($jaga->b_3c, 2); ?>
                                </div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s8"><?php $x1 = ($jaga->b_3c / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s8a_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s8_beza">0</span></div></td>
                        </tr>
                        <?php /*
                        <tr>
                            <td height="39" align="center">&nbsp;</td>
                            <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                            <td bgcolor="#FFFFCC"><div align="center">
<?= number_format($jaga->b_3d, 2); ?>
                                </div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s9"><?php $x1 = ($jaga->b_3d / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s9a_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s9_beza">0</span></div></td>
                        </tr>

                        <tr bgcolor="#AEFFAE">
                            <td height="39" align="center">4.</td>
                            <td><?= setstring('mal', 'Pemuliharan tanah dan air', 'en', 'Soil and water conservation'); ?>&nbsp;</td>
                            <td bgcolor="#AEFFAE"><div align="center">
<?= number_format($jaga->total_b_4, 2); ?>
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga4"><?php $x1 = ($jaga->total_b_4 / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s4_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s10_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="38" align="center">5.</td>
                            <td><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dsb', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?></td>
                            <td bgcolor="#FFFFFF"><div align="center">
<?= number_format($jaga->total_b_5, 2); ?>
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $x1 = ($jaga->total_b_5 / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s5_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s11_beza">0</span></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td height="36" align="center">6.</td>
                            <td><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drains'); ?> </td>
                            <td bgcolor="#AEFFAE"><div align="center">
                                        <?= number_format($jaga->total_b_6, 2); ?>
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga6"><?php $x1 = ($jaga->total_b_6 / $b);
                                        echo number_format($x1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s6_tan"><?php $y1 = ($x1 / $tan_ha);
                                        echo number_format($y1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s12_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="36" align="center">7.</td>
                            <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeeps of bunds, boundaries and Watergates'); ?></td>
                            <td bgcolor="#FFFFFF"><div align="center">
<?= number_format($jaga->total_b_7, 2); ?>
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="jaga7"><?php $x1 = ($jaga->total_b_7 / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s7_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s13_beza">0</span></div></td>
                        </tr>

                        */?>

                        <tr bgcolor="#AEFFAE">
                            <td height="37" align="center">4.</td>
                            <td><?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?> </td>
                                <td bgcolor="#AEFFAE"><div align="center">
                                <?= number_format($jaga->total_b_13, 2); ?>
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga8"><?php $x1 = ($jaga->total_b_13 / $b);
                                        echo number_format($x1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s3_tan"><?php $y1 = ($x1 / $tan_ha);
                                        echo number_format($y1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s19_beza">0</span></div></td>


                        <tr bgcolor="#FFFFFF">
                            <td height="37" align="center">5.</td>
                            <td><?= setstring('mal',  'Penjagaan jalan, parit, ban & pintu air dan sebagainya', 'en', 'Maintenance of road, drain, bund watergate and etc'); ?> </td>
                            <td bgcolor="#FFFFFF"><div align="center">
                                    <?= number_format($jaga->total_b_14, 2); ?>
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="jaga8"><?php $x1 = ($jaga->total_b_14 / $b);
                                        echo number_format($x1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s14_tan"><?php $y1 = ($x1 / $tan_ha);
                                        echo number_format($y1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s20_beza">0</span></div></td>
                        </tr>

                        <tr bgcolor="#AEFFAE">
                            <td height="37" align="center">6.</td>
                            <td><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pests and diseases control'); ?> </td>
                            <td bgcolor="#AEFFAE"><div align="center">
                                        <?= number_format($jaga->total_b_8, 2); ?>
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga8"><?php $x1 = ($jaga->total_b_8 / $b);
                                        echo number_format($x1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s8_tan"><?php $y1 = ($x1 / $tan_ha);
                                        echo number_format($y1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s14_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="35" align="center">7.</td>
                            <td><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation') ?> </td>
                            <td bgcolor="#FFFFFF"><div align="center">
                                        <?= number_format($jaga->total_b_9, 2); ?>
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="jaga9"><?php $x1 = ($jaga->total_b_9 / $b);
                                        echo number_format($x1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s9_tan"><?php $y1 = ($x1 / $tan_ha);
                                        echo number_format($y1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s15_beza">0</span></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td height="36" align="center">8.</td>
                            <td><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies') ?> </td>
                            <td bgcolor="#AEFFAE"><div align="center">
                                        <?= number_format($jaga->total_b_10, 2); ?>
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga10"><?php $x1 = ($jaga->total_b_10 / $b);
                                        echo number_format($x1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s10_tan"><?php $y1 = ($x1 / $tan_ha);
                                    echo number_format($y1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s16_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="34" align="center">9.</td>
                            <td><?= setstring('mal', 'Upah mandur am', 'en', 'Mandore wages/ direct field supervision costs') ?> </td>
                            <td bgcolor="#FFFFFF"><div align="center">
                                        <?= number_format($jaga->total_b_11, 2); ?>
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="jaga11"><?php $x1 = ($jaga->total_b_11 / $b);
                                        echo number_format($x1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s11_tan"><?php $y1 = ($x1 / $tan_ha);
                                        echo number_format($y1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s17_beza">0</span></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td height="36" align="center">10.</td>
                            <td><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other expenditure') ?> &nbsp;</td>
                            <td bgcolor="#AEFFAE"><div align="center">
                                        <?= number_format($jaga->total_b_12, 2); ?>
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga12"><?php $x1 = ($jaga->total_b_12 / $b);
                                        echo number_format($x1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s12_tan"><?php $y1 = ($x1 / $tan_ha);
                                        echo number_format($y1, 2);
                                        ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s18_beza">0</span></div></td>
                        </tr>
                        <tr>
                            <td height="15" align="center">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="32" align="center">&nbsp;</td>
                            <td><div align="right"><strong> <?= setstring('mal', 'Jumlah kos penjagaan', 'en', 'Total of upkeep cost') ?>&nbsp (a)</strong></div></td>
                            <td bgcolor="#FFCC66"><div align="center"><strong>

<?= number_format($jaga->total_b, 2); ?>
                                    </strong></div></td>
                            <td bgcolor="#FFCC66"><div align="center"><strong>
                                        <span id="total_a_perha"><?php $x1a = ($jaga->total_b / $b);
echo number_format($x1a, 2);
?></span>
                                    </strong></div></td>
                            <td bgcolor="#FFCC66"><div align="center"><strong>
                                        <span id="total_a_pertan"><?php $y1a = ($x1a / $tan_ha);
                                        echo number_format($y1a, 2);
?></span>
                                    </strong></div></td>
                            <td bgcolor="#FFCC66"><div align="center"><strong>
                                        <span id="total_a_beza">0</span>
                                    </strong></div></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5">
                    <table width="100%" cellpadding="0" cellspacing="0"  frame="box" class="subTable" aria-describedby="ringkasan28">


                        <tr>
                            <td height="52" align="center" background="../images/tb_BG.gif"><div align="center"><strong>b.</strong></div></td>
                            <td height="52" align="center" background="../images/tb_BG.gif"><div align="left"><strong><?= setstring('mal', 'Penuaian dan Pemunggahan BTS', 'en', 'Harvesting'); ?>
                                    </strong></div></td>
                            <td background="../images/tb_BG.gif" class="tableCss"><div align="center"><strong><?= setstring('mal', 'Kos', 'en', 'Cost'); ?>
                                    </strong></div><div align="center"><strong>&nbsp;(RM)</strong></div></td>
                            <td background="../images/tb_BG.gif" class="tableCss"><div align="center"><strong><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?>
                                    </strong></div><div align="center"><strong>(RM)</strong></div></td>
                            <td background="../images/tb_BG.gif" class="tableCss"><div align="center"><strong><?= setstring('mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?>
                                    </strong></div><div align="center"><strong>(RM)</strong></div></td>
                            <td background="../images/tb_BG.gif" class="tableCss"><div align="center"><strong><?= setstring('mal', 'Perubahan Kos Per Hektar dengan Tahun Lepas', 'en', 'Cost Different with Last year'); ?>
                                    </strong></div><div align="center"><strong>(%)</strong></div></td>
                        </tr>

                        <tr>
                            <td height="43" align="center" bgcolor="#AEFFAE">1.</td>
                            <td bgcolor="#AEFFAE"><?= setstring('mal', 'Upah Menuai, memunggah BTS dan memungut buah relai', 'en', 'Wages for harvesters, FFB and loose fruit collecters'); ?>
                              <br>
                              <span class="kecil">(
                                  <?= setstring('mal', 'Pemunggahan BTS dari pokok ke platform/pusat pengumpulan / ramp', 'en', 'Loading/evacuation of FFB to platform, FFB collection center or ramp');?>
                                  )
                                          </span></td>
                            <td bgcolor="#AEFFAE"><div align="center">
<?= number_format($tuai->a_2, 2); ?>
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="t2"><?php $x1 = ($tuai->a_2 / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="t2_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><strong><span id="t2_beza">0</span> </strong></div></td>
                        </tr>

                        <tr>
                            <td height="38" align="center" bgcolor="#FFFFFF">2.</td>
                            <td><?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance') ?>
                              <br>
                              <span class="kecil">(
                                  <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and other maintenance cost '); ?>

                                  )        </span></td>
                            <td><div align="center">
<?= number_format($tuai->a_4, 2); ?>
                                </div></td>
                            <td><div align="center"><span id="t4"><?php $x1 = ($tuai->a_4 / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td><div align="center"><span id="t4_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td><div align="center"><strong><span id="t4_beza">0</span> </strong></div></td>
                        </tr>

                        <tr>
                            <td width="16" height="44" align="center" bgcolor="#AEFFAE">3.</td>
                            <td width="284" bgcolor="#AEFFAE"><?= setstring('mal', 'Pembelian peralatan menuai', 'en', 'Purchases of harvesting tools'); ?>
                              <br>
                              <span class="kecil">(
                                <?= setstring('mal', 'Sabit, galah, kereta sorong dan lain-lain tidak termasuk peralatan bermotor', 'en', 'Sickle, pole, wheelbarrow, etc, not inclusive motorized tools'); ?>
                                  )        </span></td>
                            <td width="141" bgcolor="#AEFFAE"><div align="center">
                                    <?= number_format($tuai->a_1, 2); ?>
                                </div></td>
                            <td width="119" bgcolor="#AEFFAE"><div align="center"><span id="t1"><?php $x1 = ($tuai->a_1 / $b);
                                    echo number_format($x1, 2);
                                    ?></span></div></td>
                            <td width="116" bgcolor="#AEFFAE"><div align="center"><span id="t1_tan"><?php $y1 = ($x1 / $tan_ha);
                                            echo number_format($y1, 2);
                                    ?></span></div></td>
                            <td width="186" bgcolor="#AEFFAE"><div align="center"><strong><span id="t1_beza">0</span> </strong></div></td>
                        </tr>

                        <tr>
                            <td height="43" align="center" bgcolor="#FFFFFF">4.</td>
                            <td bgcolor="#FFFFFF"><?= setstring('mal', 'Upah mandur penuai', 'en', 'Wages for harvesting mandore'); ?></td>
                            <td bgcolor="#FFFFFF"><div align="center">
<?= number_format($tuai->a_3, 2); ?>
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="t3"><?php $x1 = ($tuai->a_3 / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="t3_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><strong><span id="t3_beza">0</span> </strong></div></td>
                        </tr>

                        <tr>
                            <td height="15" align="center">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="38" align="center">&nbsp;</td>
                            <td><div align="right"><strong><?= setstring('mal', 'Jumlah kos penuaian', 'en', 'Total of harvesting cost'); ?>
                                        (b) :</strong></div></td>
                <td bgcolor="#FFCC66"><div align="center"><strong>
                                <?= number_format($tuai->total_b, 2); ?>
                                    </strong></div></td>
                            <td bgcolor="#FFCC66"><div align="center"><strong> <span id="total_b_perha"><?php $x1b = ($tuai->total_b / $b);
                                echo number_format($x1b, 2);
                                ?></span> </strong></div></td>
                            <td bgcolor="#FFCC66"><div align="center"><strong> <span id="total_b_pertan"><?php $y1b = ($x1b / $tan_ha);
                                echo number_format($y1b, 2);
                                ?></span> </strong></div></td>
                            <td bgcolor="#FFCC66"><div align="center"><strong> <span id="total_b_beza">0</span> </strong></div></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5">
                    <table width="100%" cellspacing="0"  frame="box" class="subTable" aria-describedby="ringkasan29">
                        <tr>
                            <td height="47" align="center" valign="middle" background="../images/tb_BG.gif"><strong>c.</strong></td>
                            <td colspan="2" valign="middle" background="../images/tb_BG.gif"><strong><?= setstring('mal', 'Pengangkutan BTS', 'en', 'Transportation of FFB'); ?>
                                </strong></td>
                            <td width="164" valign="middle" background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos', 'en', 'Cost'); ?>
                                    </strong></div><div align="center"><strong>(RM)</strong></div></td>
                            <td width="142" valign="middle" background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?>
                                    </strong></div><div align="center"><strong>(RM)</strong></div></td>
                            <td width="124" valign="middle" background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?>
                                    </strong></div><div align="center"><strong> (RM)</strong></div></td>
                            <td width="154" valign="middle" background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Perubahan Kos Per Hektar dengan Tahun Lepas', 'en', 'Cost Different with Last year'); ?>
                                    </strong></div><div align="center"><strong> (%)</strong></div></td>
                        </tr>
<?php /*
                        <tr>
                            <td height="37" align="center" valign="middle" bgcolor="#AEFFAE">1.</td>
                            <td colspan="2" valign="middle" bgcolor="#AEFFAE"><?= setstring('mal', 'Dalaman', 'en', 'Internal'); ?></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center"><strong>
<?php
if ($angkut->total_a == 0) {
    $angkut->total_a = $angkut->a_1 + $angkut->a_2 + $angkut->a_3;
}
echo number_format($angkut->total_a, 2);
?>
                                    </strong></div></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="jaga1"><?php $x1 = ($angkut->total_a / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="s1_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="total_racun_beza">0</span></div></td>
                        </tr>


                        <tr>
                            <td width="15" height="37" align="center" valign="middle">&nbsp;</td>
                            <td colspan="6" valign="middle" bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pemunggahan BTS ke', 'en', 'Loading of FFB to'); ?>:</td>
                        </tr>
                        <tr>
                            <td height="39" align="center" valign="top">&nbsp;</td>
                            <td width="34" valign="middle" bgcolor="#CCCCFF">&nbsp;</td>
                            <td width="215" valign="middle" bgcolor="#CCCCFF">a) <?= setstring('mal', 'Platform', 'en', 'Platform'); ?></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center">
<?= number_format($angkut->a_1, 2); ?>
                                </div></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a1"><?php $x1 = ($angkut->a_1 / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a1_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center"><strong><span id="a1_beza">0</span> </strong></div></td>
                        </tr>
                        <tr>
                            <td height="39" align="center" valign="top">&nbsp;</td>
                            <td valign="middle" bgcolor="#CCCCFF">&nbsp;</td>
                            <td valign="middle" bgcolor="#CCCCFF">b) <?= setstring('mal', 'Ramp', 'en', 'Ramp'); ?></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center">
                                <?= number_format($angkut->a_2, 2); ?>
                                </div></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a2"><?php $x1 = ($angkut->a_2 / $b);
                                echo number_format($x1, 2);
                                ?></span></div></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a2_tan"><?php $y1 = ($x1 / $tan_ha);
                                echo number_format($y1, 2);
                                ?></span></div></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center"><strong><span id="a2_beza">0</span> </strong></div></td>
                        </tr>
                        <tr>
                            <td height="39" align="center" valign="top">&nbsp;</td>
                            <td colspan="2" valign="middle" bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Penjagaan ramp', 'en', 'Ramp upkeep'); ?></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center">
                                <?= number_format($angkut->a_3, 2); ?>
                                </div></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a3"><?php $x1 = ($angkut->a_3 / $b);
                                echo number_format($x1, 2);
                                ?></span></div></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a3_tan"><?php $y1 = ($x1 / $tan_ha);
                                echo number_format($y1, 2);
                                ?></span></div></td>
                            <td valign="middle" bgcolor="#CCCCFF"><div align="center"><strong><span id="a3_beza">0</span> </strong></div></td>
                        </tr>
                        <tr>
                            <td height="39" align="center" valign="middle">2.</td>
                            <td colspan="2" valign="middle"><?= setstring('mal', 'Luaran', 'en', 'External'); ?></td>
                            <td valign="middle"><div align="center"><strong>
                                <?php
                                if ($angkut->total_b_1 == 0) {
                                    $angkut->total_b_1 = $angkut->b_1a + $angkut->b_1b + $angkut->b_1c;
                                }

                                echo number_format($angkut->total_b_1, 2);
                                ?>
                                    </strong></div></td>
                            <td valign="middle"><div align="center" id="jaga2"><?php $x1 = ($angkut->total_b_1 / $b);
                                echo number_format($x1, 2);
                                ?></div></td>
                            <td valign="middle"><div align="center" id="s2_tan"><?php $y1 = ($x1 / $tan_ha);
                                echo number_format($y1, 2);
                                ?></div></td>
                            <td valign="middle"><div align="center" id="total_baja_beza">0</div></td>
                        </tr>
                        */?>
                        <tr>
                            <td height="42" align="center" valign="center" bgcolor="#AEFFAE">1.</td>
                            <td colspan="2" valign="middle" bgcolor="#AEFFAE"><?= setstring('mal', 'Pengangkutan BTS dari platform/pusat pengumpulan/ramp ke kilang', 'en', '	Mainline transportation cost from platform/FFB collection centre/ramp to mill'); ?></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center">
<?= number_format($angkut->b_1a, 2); ?>
                                </div></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="a4">
                                <?php $x1 = ($angkut->b_1a / $b);
                                echo number_format($x1, 2);
                                ?>
                                    </span></div></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="a4_tan"><?php $y1 = ($x1 / $tan_ha);
                                echo number_format($y1, 2);
                                ?></span></div></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center"><strong><span id="a4_beza">0</span> </strong></div></td>
                        </tr>
                        <tr>
                            <td height="43" align="center" valign="center">2.</td>
                            <td colspan="2" valign="middle" bgcolor="#FFFFFF"><?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
                              <br>
                              <span class="kecil">(
                                  <?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Fuel, tires, battery, lubricant and repair the machinery'); ?>

                                  )        </span></td>
                            <td valign="middle" bgcolor="#FFFFFF"><div align="center">
                                <?= number_format($angkut->b_1b, 2); ?>
                                </div></td>
                            <td valign="middle" bgcolor="#FFFFFF"><div align="center"><span id="a5"><?php $x1 = ($angkut->b_1b / $b);
                                echo number_format($x1, 2);
                                ?></span></div></td>
                            <td valign="middle" bgcolor="#FFFFFF"><div align="center"><span id="a5_tan"><?php $y1 = ($x1 / $tan_ha);
                                echo number_format($y1, 2);
                                ?></span></div></td>
                            <td valign="middle" bgcolor="#FFFFFF"><div align="center"><strong><span id="a5_beza">0</span> </strong></div></td>
                        </tr>
<?php /*
                        <tr>
                            <td height="43" align="center" valign="middle">&nbsp;</td>
                            <td colspan="2" valign="middle" bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Pengangkutan sungai', 'en', 'River transport'); ?></td>
                            <td valign="middle" bgcolor="#FFFFCC"><div align="center">
<?= number_format($angkut->b_1c, 2); ?>
                                </div></td>
                            <td valign="middle" bgcolor="#FFFFCC"><div align="center"><span id="a6"><?php $x1 = ($angkut->b_1c / $b);
echo number_format($x1, 2);
?></span></div></td>
                            <td valign="middle" bgcolor="#FFFFCC"><div align="center"><span id="a6_tan"><?php $y1 = ($x1 / $tan_ha);
echo number_format($y1, 2);
?></span></div></td>
                            <td valign="middle" bgcolor="#FFFFCC"><div align="center"><strong><span id="a6_beza">0</span> </strong></div></td>
                        </tr>
                        <tr>
                            <td height="43" align="center" valign="middle" bgcolor="#AEFFAE">3.</td>
                            <td colspan="2" valign="middle" bgcolor="#AEFFAE"><?= setstring('mal', 'Perbelanjaan lain', 'en', 'Other Expenditure'); ?></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center">
                                <?= number_format($angkut->total_b_2, 2); ?>
                                </div></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="jaga3"><?php $x1 = ($angkut->total_b_2 / $b);
                                echo number_format($x1, 2);
                                ?></span></div></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="s3_tan"><?php $y1 = ($x1 / $tan_ha);
                                echo number_format($y1, 2);
                                ?></span></div></td>
                            <td valign="middle" bgcolor="#AEFFAE"><div align="center"><strong><span id="a7_beza">0</span> </strong></div></td>
                        </tr>
                        */?>
                        <tr>
                            <td height="17" align="center" valign="middle">&nbsp;</td>
                            <td colspan="2" valign="middle">&nbsp;</td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle">&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="35" align="center" valign="middle">&nbsp;</td>
                            <td colspan="2" valign="middle"><div align="right"><strong><?= setstring('mal', 'Jumlah kos pengangkutan ', 'en', 'Total of transportation cost'); ?>(c) : </strong></div></td>
                            <td valign="middle" bgcolor="#FFCC66"><div align="center"><strong>
                                <?= number_format($angkut->total_b, 2); ?>
                                    </strong></div></td>
                            <td valign="middle" bgcolor="#FFCC66"><div align="center"><strong> <span id="total_a_perha"><?php $x1c = ($angkut->total_b / $b);
                                echo number_format($x1c, 2);
                                ?></span> </strong></div></td>
                            <td valign="middle" bgcolor="#FFCC66"><div align="center"><strong> <span id="total_a_pertan"><?php $y1c = ($x1c / $tan_ha);
                                echo number_format($y1c, 2);
                                ?></span> </strong></div></td>
                            <td valign="middle" bgcolor="#FFCC66"><div align="center"><strong> <span id="total_a_beza">0</span> </strong></div></td>
                        </tr>
                        <tr>
                            <td height="17" align="center" valign="middle">&nbsp;</td>
                            <td colspan="2" valign="middle">&nbsp;</td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle">&nbsp;</td>
                            <td valign="middle"><div align="center"></div></td>
                        </tr>
                        <tr>
                            <td height="35" align="center" valign="middle">&nbsp;</td>
                            <td colspan="2" valign="middle"><div align="right"><strong><?= setstring('mal', 'Jumlah kos kawasan matang', 'en', 'Total cost of matured area'); ?>(a + b + c) : </strong></div></td>
                            <td valign="middle" bgcolor="#FFCCFF"><div align="center"><strong>
                                        <span id="jumlah_all">
                                <?php $total_all = $angkut->total_b + $tuai->total_b + $jaga->total_b;
                                echo number_format($total_all, 2);
                                ?></span></strong>
                                <?php  $allb = $jaga->total_b + $tuai->total_b; ?></div></td>
                            <td valign="middle" bgcolor="#FFCCFF"><div align="center"><strong><span id="jumlah_all_kos"><?php
                                $total_all_hektar = ($jaga->total_b / $b) + ($tuai->total_b / $b) + ($angkut->total_b / $b);
                                echo number_format($total_all_hektar, 2);
                                ?></span></strong>
                                <?php $all_kosa = ($jaga->total_b / $b) + ($tuai->total_b / $b) ?></div></td>
                            <td valign="middle" bgcolor="#FFCCFF"><div align="center"><strong><span id="jumlah_all_tan"><?php
                                $total_all_bts = ($angkut->total_b / $b / $tan_ha) + ($jaga->total_b / $b / $tan_ha) + ($tuai->total_b / $b / $tan_ha);
                                echo number_format($total_all_bts, 2);
                                ?></span></strong><?php $all_tana = ($tuai->total_b / $b / $tan_ha) + ($jaga->total_b / $b / $tan_ha); ?></div></td>
                            <td valign="middle" bgcolor="#FFCCFF"><div align="center"><strong>0</strong></div></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!--Perbelanjaan AM-->
        <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="ringkasan30">
            <tr>
                <td colspan="3"><strong><h2><?= setstring('mal', 'MAKLUMAT  PERBELANJAAN AM', 'en', 'GENERAL EXPENSES INFORMATION'); ?></h2></strong></td>
            </tr>
            <tr>
                <td>??</td>
                <td>??</td>
                <td>??</td>
            </tr>
            <tr>
                <td width="198"><strong><?= setstring('mal', 'Jumlah Keluasan Tanaman', 'en', 'Total Crop Area'); ?></strong></td>
                <td width="422"><strong><span class="style3"><?php echo number_format($jumlah_semua, 2); ?></span>??<?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></strong></td>
                <td>??</td>
            </tr>
            <tr>
                <td colspan="2">??</td>
                <td>??</td>
            </tr>

            <td colspan="3"><table width="100%" cellspacing="0"  frame="box" class="subTable" aria-describedby="ringkasan31">
                    <tr>
                        <td height="41" align="center" background="../images/tb_BG.gif">??</td>
                        <td background="../images/tb_BG.gif"><strong><u><?= setstring('mal', 'Butiran-butiran kos', 'en', 'Cost details'); ?>??</u></strong></td>
                        <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></strong></div>          <div align="center"><strong>(RM)</strong></div></td>
                        <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></strong></div>
                            <div align="center"><strong>(RM)</strong></div></td>
                        <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?></strong></div>
                            <div align="center"><strong>(RM)</strong></div></td>
                        <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Perubahan Kos Per Hektar dengan Tahun Lepas', 'en', 'Cost Different with Last year'); ?></strong></div>
                            <div align="center"><strong> (%)</strong></div></td>
                    </tr>

                    <tr valign="top">
                        <td width="24" height="37" align="center" bgcolor="#AEFFAE">1.</td>
                        <td width="296" bgcolor="#AEFFAE"> <span class="style4">
                                <?= setstring('mal', 'Pembayaran gaji dan elaun untuk eksekutif dan bukan eksekutif serta kebajikan kepada buruh', 'en', 'Payment of salaries and allowances for executive and non-executive as well as welfare to labour '); ?>
                            </span>          <br />
                            <span class="kecil">(

                                <?= setstring('mal', 'Merujuk kepada pembayaran gaji, KWSP, PERKESO, elaun, elaun lebih masa, bonus, insuran hayat, caj perubatan dan ubat-ubatan,insentif dan Lain-lain', 'en', 'Refer to salaries, EPF, SOCSO, allowances, overtime charges, life insurance, medical charges, bonus, incentive and etc'); ?>

                                )        </span></td>
                        <td width="158" bgcolor="#AEFFAE"><div align="center">
                                <?= number_format($belanja->emolumen, 2); ?>
                            </div></td>
                        <td width="100" bgcolor="#AEFFAE"><div align="center">
                                <span id="emolumen_per_ha"><?php $per_ha1 = $belanja->emolumen / $hektar;
                                echo number_format($per_ha1, 2);
                                ?></span>
                            </div></td>
                        <td width="109" bgcolor="#AEFFAE"><div align="center" id="emolumen_per_bts">
                                <?php $per_bts1 = $per_ha1 / $bts;
                                echo number_format($per_bts1, 2);
                                ?>
                            </div></td>
                        <td width="260" bgcolor="#AEFFAE">
                            <div align="center" id="emolumen_per_kos">
                                0.00
                            </div></td>
                    </tr>

<?php /*
                    <tr valign="top">
                        <td height="33" align="center">2.</td>
                        <td><span class="style4">
<?= setstring('mal', 'Kos ibu pejabat', 'en', 'Headquarters Cost'); ?>
                            </span>
                            <br />
                            <span class="kecil">(
                                <?= setstring('mal', 'Yuran/bayaran pentadbiran', 'en', 'Administration fees'); ?>
                                ,
                                <?= setstring('mal', 'Yuran/bayaran lesen', 'en', 'Licensing fees'); ?>
                                ,
                                <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                                )        </span></td>
                        <td><div align="center">
                                <?= number_format($belanja->kos_ibupejabat, 2); ?>
                            </div></td>
                        <td><div align="center" id="kos_ibupejabat_per_ha"><?php $per_ha2 = $belanja->kos_ibupejabat / $hektar;
                                echo number_format($per_ha2, 2);
                                ?></div></td>
                        <td><div align="center" id="kos_ibupejabat_per_bts">
                                <?php $per_bts2 = $per_ha2 / $bts;
                                echo number_format($per_bts2, 2);
                                ?>        </div></td>
                        <td>
                            <div align="center">
                                0.00
                            </div></td>
                    </tr>

                    */?>
                    <tr valign="top">
                        <td height="32" align="center" bgcolor="#FFFFFF">2.</td>
                        <td bgcolor="#FFFFFF"  ><span class="style4">
<?= setstring('mal', 'Yuran professional dan khidmat nasihat', 'en', 'Professional fee and advisory services'); ?>
                            </span>
                            <br />
                            <span class="kecil">(
                                <?= setstring('mal', 'Yuran yang dibayar kepada agensi atau ahli agronomi, juru audit dan lain-lain bagi tujuan perundangan, khidmat nasihat, audit dan sebagainnya', 'en', 'Fee paid to agencies, agronomist, auditors and others for advisory services and etc'); ?>

                                )        </span></td>
                        <td bgcolor="#FFFFFF"><div align="center">
                                <?= number_format($belanja->kos_agensi, 2); ?>
                            </div></td>
                        <td bgcolor="#FFFFFF"><div align="center" id="kos_agensi_per_ha"><?php $per_ha3 = $belanja->kos_agensi / $hektar;
                                echo number_format($per_ha3, 2);
                                ?></div></td>
                        <td bgcolor="#FFFFFF"><div align="center" id="kos_agensi_per_bts"> <?php $per_bts3 = $per_ha3 / $bts;
                                echo number_format($per_bts3, 2);
                                ?></div></td>
                        <td bgcolor="#FFFFFF">
                            <div align="center">
<?= number_format(($d / $luas), 2) ?>
                            </div></td>
                    </tr>

<?php /*
                    <tr valign="top">
                        <td height="36" align="center">4.</td>
                        <td><span class="style4">
<?= setstring('mal', 'Kebajikan yang tidak dibayar kepada buruh', 'en', 'Welfare not directly paid to labour'); ?>
                            </span> <br />
                            <span class="kecil">(
<?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                                ,
                                <?= setstring('mal', 'Ganjaran persaraan', 'en', 'Retirement rewards'); ?>
                                ,
                                <?= setstring('mal', 'Pampasan kepada pekerja', 'en', 'Compensation'); ?>
                                ,
                                <?= setstring('mal', 'Subsidi', 'en', 'Subsidies'); ?>
                                ,
<?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                                )</span></td>
                        <td><div align="center">
<?= number_format($belanja->kebajikan, 2); ?>
                            </div></td>
                        <td><div align="center" id="kebajikan_per_ha"><?php $per_ha4 = $belanja->kebajikan / $hektar;
echo number_format($per_ha4, 2);
?></div></td>
                        <td><div align="center" id="kebajikan_per_bts"> <?php $per_bts4 = $per_ha4 / $bts;
echo number_format($per_bts4, 2);
?>
                            </div></td>
                        <td><div align="center">
<?= number_format(($d / $luas), 2) ?>
                            </div></td>
                    </tr>
                    */?>
                    <tr valign="top" bgcolor="#AEFFAE">
                        <td height="36" align="center">3.</td>
                        <td><span class="style4">
                                <?= setstring('mal', 'Cukai, pemilikan tanah sementara (TOL) dan insuran', 'en', 'Taxes, Temporary Ownership Land (TOL) and insurance'); ?>
                            </span>
                            <br />
                            <span class="kecil">(
                                <?= setstring('mal', 'Cukai tanah, cukai ke atas tanah berstatus TOL, insuran untuk bangunan & kenderaan dan Lain-lain', 'en', 'Quit rent, quit rent for TOL status land, fire insurance, motor insurance, etc'); ?>

                                )        </span></td>
                        <td><div align="center">
                                <?= number_format($belanja->sewa_tol, 2); ?>
                            </div></td>
                        <td><div align="center" id="sewa_tol_per_ha"><?php $per_ha5 = $belanja->sewa_tol / $hektar;
                                echo number_format($per_ha5, 2);
                                ?></div></td>
                        <td><div align="center" id="sewa_tol_per_bts"> <?php $per_bts5 = $per_ha5 / $bts;
                                echo number_format($per_bts5, 2);
                                ?>
                            </div></td>
                        <td>
                            <div align="center">
<?= number_format(($d / $luas), 2) ?>
                            </div></td>
                    </tr>
<?php /*
                    <tr valign="top">
                        <td height="35" align="center">6.</td>
                        <td><span class="style4">
                                <?= setstring('mal', 'Penyelidikan dan pembangunan', 'en', 'Research and development'); ?>
                            </span>
                            <br />
                            <span class="kecil">(
                                <?= setstring('mal', 'Penyelidikan dan pembangunan', 'en', 'Research and development'); ?>
                                )        </span></td>
                        <td><div align="center">
<?= number_format($belanja->penyelidikan, 2); ?>
                            </div></td>
                        <td><div align="center" id="penyelidikan_per_ha"><?php $per_ha6 = $belanja->penyelidikan / $hektar;
echo number_format($per_ha6, 2);
?></div></td>
                        <td><div align="center" id="penyelidikan_per_bts"> <?php $per_bts6 = $per_ha6 / $bts;
                                echo number_format($per_bts6, 2);
?>
                            </div></td>
                        <td>
                            <div align="center">
<?= number_format(($d / $luas), 2) ?>
                            </div></td>
                    </tr>
                    <tr valign="top" bgcolor="#AEFFAE">
                        <td height="36" align="center">7.</td>
                        <td><span class="style4">
<?= setstring('mal', 'Perubatan', 'en', 'Medical'); ?>
                            </span>
                            <br />
                            <span class="kecil">(
<?= setstring('mal', 'Bayaran lawatan pegawai perubatan (VMO)', 'en', 'Visiting Medical Officer fees'); ?>
                                ,
<?= setstring('mal', 'Pelbagai ubat dan peralatan', 'en', 'Medicine and Instrument'); ?>
                                ,
<?= setstring('mal', 'Peralatan sukan/permainan', 'en', 'Sports/recreations equipment'); ?>
                                ,
<?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                                )        </span></td>
                        <td><div align="center">
        <?= number_format($belanja->perubatan, 2); ?>
                            </div></td>
                        <td><div align="center" id="perubatan_per_ha"><?php $per_ha7 = $belanja->perubatan / $hektar;
        echo number_format($per_ha7, 2);
        ?></div></td>
                        <td><div align="center" id="perubatan_per_bts" > <?php $per_bts7 = $per_ha7 / $bts;
        echo number_format($per_bts7, 2);
        ?>
                            </div></td>
                        <td>
                            <div align="center">
        <?= number_format(($d / $luas), 2) ?>
                            </div></td>
                    </tr>
                    */?>
                    <tr valign="top">
                        <td height="33" align="center">4.</td>
                        <td><span class="style4">
        <?= setstring('mal', 'Penjagaan, pemuliharaan dan penyelenggaraan bangunan', 'en', 'Upkeep, conversation and maintenance of building'); ?>
                            </span><br />
                            <span class="kecil">(
        <?= setstring('mal', 'Pembersihan kawasan, baik pulih kerosakan dan penyelenggaraan pejabat, banglow, kuarters, rumah ibadah, klinik, rumah kedai, bengkel dan lain-lain ', 'en', 'Cleaning, repair of vehicle, maintenance of office, home amenities, mosque, temple, church, clinics, shop and etc'); ?>

                                )        </span></td>
                        <td><div align="center">
        <?= number_format($belanja->penyelenggaraan, 2); ?>
                            </div></td>
                        <td><div align="center" id="penyelenggaraan_per_ha"><?php $per_ha8 = $belanja->penyelenggaraan / $hektar;
        echo number_format($per_ha8, 2);
        ?></div></td>
                        <td><div align="center" id="penyelenggaraan_per_bts">
        <?php $per_bts8 = $per_ha8 / $bts;
        echo number_format($per_bts8, 2);
        ?>
                            </div></td>
                        <td>
                            <div align="center">
        <?= number_format(($d / $luas), 2) ?>
                            </div></td>
                    </tr>
<?php /*
                    <tr valign="top" bgcolor="#AEFFAE">
                        <td height="34" align="center">9.</td>
                        <td><span class="style4">
        <?= setstring('mal', 'Cukai keuntungan luar biasa', 'en', 'Extraordinary profit tax'); ?>
                            </span><br />
                            <span class="kecil">(
        <?= setstring('mal', 'Cukai keuntungan', 'en', 'Profit tax'); ?>
                                )</span></td>
                        <td><div align="center">
        <?= number_format($belanja->cukai_keuntungan, 2); ?>
                            </div></td>
                        <td><div align="center" id="cukai_keuntungan_per_ha"><?php $per_ha9 = $belanja->cukai_keuntungan / $hektar;
        echo number_format($per_ha9, 2);
        ?></div></td>
                        <td><div align="center" id="cukai_keuntungan_per_bts">
        <?php $per_bts9 = $per_ha9 / $bts;
        echo number_format($per_bts9, 2);
        ?>        </div></td>
                        <td>
                            <div align="center">
        <?= number_format(($d / $luas), 2) ?>
                            </div></td>
                    </tr>
                    <tr valign="top">
                        <td height="36" align="center">10.</td>
                        <td><span class="style4">
        <?= setstring('mal', 'Penjagaan dan pemuliharaan', 'en', 'Upkeep and conservation'); ?>
                            </span><br />
                            <span class="kecil">(
        <?= setstring('mal', 'Anti-vektor', 'en', 'Anti-vector'); ?>
                                ,
        <?= setstring('mal', 'Pembersihan part-parit monsun', 'en', 'Drain repair and cleaning'); ?>
                                ,
        <?= setstring('mal', 'Pengorekan lubang sampah', 'en', 'Pits and upkeep'); ?>
                                ,
        <?= setstring('mal', 'Parit dan bentung', 'en', 'Drainage and culvert'); ?>
                                ,
        <?= setstring('mal', 'Pemotongan rumput', 'en', 'Grass cutting expenses'); ?>
                                ,
        <?= setstring('mal', 'Penjagaan pejabat/banglow/kuaters/taman', 'en', 'Upkeep of office/buanglow/quarters/park'); ?>
                                ,
        <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                                )</span></td>
                        <td><div align="center">
        <?= number_format($belanja->penjagaan, 2); ?>
                            </div></td>
                        <td><div align="center" id="penjagaan_per_ha"><?php $per_ha10 = $belanja->penjagaan / $hektar;
        echo number_format($per_ha10, 2);
        ?></div></td>
                        <td><div align="center" id="penjagaan_per_bts"> <?php $per_bts10 = $per_ha10 / $bts;
        echo number_format($per_bts10, 2);
        ?>

                            </div></td>
                        <td>
                            <div align="center">
        <?= number_format(($d / $luas), 2) ?>
                            </div></td>
                    </tr>
                    */?>
                    <tr valign="top" bgcolor="#AEFFAE">
                        <td height="33" align="center">5.</td>
                        <td><span class="style4">
        <?= setstring('mal', 'Kawalan keselamatan', 'en', 'Security Control'); ?>
                            </span><br />
                            <span class="kecil">(
        <?= setstring('mal', 'Bayaran kepada pegawai keselamatan, penjagaan pos keselamatan dan lain-lain', 'en', 'Payments to guard, maintenance of guard house, and etc'); ?>

                                )</span></td>
                        <td><div align="center">
        <?= number_format($belanja->kawalan, 2); ?>
                            </div></td>
                        <td><div align="center" id="kawalan_per_ha"><?php $per_ha11 = $belanja->kawalan / $hektar;
        echo number_format($per_ha11, 2);
        ?></div></td>
                        <td><div align="center" id="kawalan_per_bts">
        <?php $per_bts11 = $per_ha11 / $bts;
        echo number_format($per_bts11, 2);
        ?>        </div></td>
                        <td>
                            <div align="center">
        <?= number_format(($d / $luas), 2) ?>
                            </div></td>
                    </tr>
<?php /*
                    <tr valign="top">
                        <td height="30" align="center">12.</td>
                        <td><span class="style4">
        <?= setstring('mal', 'Air dan tenaga', 'en', 'Water and power'); ?>
                            </span><br />

                            <span class="kecil">(
        <?= setstring('mal', 'Perbelanjaan elektrik/air', 'en', 'Water and power bills'); ?>
                                ,
        <?= setstring('mal', 'Wayar kabel', 'en', 'Cabling'); ?>
                                ,
        <?= setstring('mal', 'Mentol lampu', 'en', 'Replace bulbs'); ?>
                                ,
        <?= setstring('mal', 'Bahan kimia', 'en', 'Chemicals'); ?>
                                ,
        <?= setstring('mal', 'Penyelenggaraan dan servis pam air ', 'en', 'Maintenance and services of water pump'); ?>
                                ,
<?= setstring('mal', 'Penyelenggaraan kawasan tadahan', 'en', 'Maintenance of water reservoir'); ?>
                                ,
<?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                                )</span></td>
                        <td><div align="center">
<?= number_format($belanja->air_tenaga, 2); ?>
                            </div></td>
                        <td><div align="center" id="air_tenaga_per_ha"><?php $per_ha12 = $belanja->air_tenaga / $hektar;
echo number_format($per_ha12, 2);
?></div></td>
                        <td><div align="center" id="air_tenaga_per_bts">
        <?php $per_bts12 = $per_ha12 / $bts;
        echo number_format($per_bts12, 2);
        ?>        </div></td>
                        <td><div align="center">0.00</div></td>
                    </tr>
                    */?>
                    <tr valign="top" bgcolor="#FFFFFF">
                        <td height="31" align="center">6.</td>
                        <td><span class="style4">
<?= setstring('mal', 'Perbelanjaan pejabat dan utiliti', 'en', 'Office expenses and utilities'); ?>
                            </span> <br />
                            <span class="kecil">(
<?= setstring('mal', 'Pembelian alat tulis, sewa mesin fotostat, bayaran bil elektrik, bil air, bil telefon, servis peralatan pejabat dan pembelian barangan yang tidak dikategorikan sebagai aset', 'en', 'Purchase of stationery, rental of photostat machine, utilities & telephone bill, service of office equipment and purchase of goods not categorized as an asset'); ?>

                                )</span></td>
                        <td><div align="center">
                            <?= number_format($belanja->perbelanjaan_pejabat, 2); ?>
                            </div></td>
                        <td><div align="center" id="perbelanjaan_pejabat_per_ha"><?php $per_ha13 = $belanja->perbelanjaan_pejabat / $hektar;
                            echo number_format($per_ha13, 2);
                            ?></div></td>
                        <td><div align="center" id="perbelanjaan_pejabat_per_bts">
                        <?php $per_bts13 = $per_ha13 / $bts;
                        echo number_format($per_bts13, 2);
                        ?>        </div></td>
                        <td><div align="center">0.00</div></td>
                    </tr>
                    <tr valign="top" bgcolor="#AEFFAE">
                        <td height="31" align="center">7.</td>
                        <td><span class="style4">
                        <?= setstring('mal', 'Susutnilai', 'en', 'Depreciation'); ?>
                            </span><br />
                            <span class="kecil">(
                        <?= setstring('mal', 'Susutnilai bagunan, mesin, kenderaan dan peralatan pejabat', 'en', 'Depreciation of building, machineries, vehicle and office equipment'); ?>
                                )</span></td>
                        <td><div align="center">
                        <?= number_format($belanja->susut_nilai, 2); ?>
                            </div></td>
                        <td><div align="center" id="susut_nilai_per_ha"><?php $per_ha14 = $belanja->susut_nilai / $hektar;
                        echo number_format($per_ha14, 2);
                        ?></div></td>
                        <td><div align="center" id="susut_nilai_per_bts">
                        <?php $per_bts14 = $per_ha14 / $bts;
                        echo number_format($per_bts14, 2);
                        ?>
                            </div></td>
                        <td><div align="center">0.00</div></td>
                    </tr>

                    <tr valign="top" bgcolor="#FFFFFF">
                        <td height="31" align="center">8.</td>
                        <td><span class="style4">
                        <?= setstring('mal', 'Perbelanjaan lain', 'en', 'Other expenses'); ?>
                            </span><br />
                            <span class="kecil">(
                        <?= setstring('mal', ' Lain-lain perbelanjaan yang tidak termasuk dalam perbelanjaan 1-7 di atas', 'en', 'Other expenses not included in 1-7'); ?>
                                )        </span></td>
                        <td><div align="center">
                        <?= number_format($belanja->perbelanjaan_lain, 2); ?>
                            </div></td>
                        <td><div align="center" id="perbelanjaan_lain_per_ha"><?php $per_ha15 = $belanja->perbelanjaan_lain / $hektar;
                        echo number_format($per_ha15, 2);
                        ?></div></td>
                        <td><div align="center" id="perbelanjaan_lain_per_bts">
                        <?php $per_bts15 = $per_ha15 / $bts;
                        echo number_format($per_bts15, 2);
                        ?>        </div></td>
                        <td><div align="center">0.00</div></td>
                    </tr>


                    <tr>
                        <td height="31" align="center">??</td>
                        <td><div align="right"><strong><?= setstring('mal', 'Jumlah :', 'en', 'Total'); ?> </strong></div></td>
                        <td bgcolor="#FFCC66"><div align="center">
            <?php $total_belanja_all = $belanja->emolumen + $belanja->kos_ibupejabat + $belanja->kos_agensi + $belanja->kebajikan + $belanja->sewa_tol + $belanja->penyelidikan + $belanja->perubatan + $belanja->penyelenggaraan + $belanja->cukai_keuntungan + $belanja->penjagaan + $belanja->kawalan + $belanja->air_tenaga + $belanja->perbelanjaan_pejabat + $belanja->susut_nilai + $belanja->perbelanjaan_lain + $belanja->pembelian_mesin + $belanja->pembelian_aset; ?>
<?php echo number_format($total_belanja_all, 2);    ?>
                            </div></td>
                        <td bgcolor="#FFCC66"><div align="center" id="total_kos_hektar">
                            <?php
                            $total_kos_hektar = $per_ha1 + $per_ha2 + $per_ha3 + $per_ha4 + $per_ha5 + $per_ha6 + $per_ha7 + $per_ha8 + $per_ha9 + $per_ha10 + $per_ha11 + $per_ha12 + $per_ha13 + $per_ha14 + $per_ha15 + $per_ha16 + $per_ha17 ;
                            echo number_format($total_kos_hektar, 2);
                            ?>
                            </div></td>
                        <td bgcolor="#FFCC66"><div align="center" id="total_bts_all">
                            <?php $total_bts_all = $per_bts1 + $per_bts2 + $per_bts3 + $per_bts4 + $per_bts5 + $per_bts6 + $per_bts7 + $per_bts8 + $per_bts9 + $per_bts10 + $per_bts11 + $per_bts12 + $per_bts13 + $per_bts14 + $per_bts15 + $per_bts16 + $per_bts17;
                            echo number_format($total_bts_all, 2);
                            ?>        </div></td>
                        <td bgcolor="#FFCC66">
                            <div align="center"><strong>
                                    0.00
                                </strong></div></td>
                    </tr>


                    <tr>
                        <td height="17" align="center">??</td>
                        <td>??</td>
                        <td>??</td>
                        <td>??</td>
                        <td>??</td>
                        <td>??</td>
                    </tr>

                    <tr valign="top" bgcolor="#AEFFAE">
                        <td height="20" align="center" bgcolor="#AEFFAE">??</td>
                        <td bgcolor="#AEFFAE"><b><u><?= setstring('mal', 'Lain-lain Kos', 'en', 'Other Cost'); ?>??</u></b></td>
                        <td bgcolor="#AEFFAE"><div align="center">
                        <td bgcolor="#AEFFAE"><div align="center">
                        <td bgcolor="#AEFFAE"><div align="center">
                        <td bgcolor="#AEFFAE"><div align="center">
                    </tr>

                    <tr valign="top" bgcolor="#FFFFFF">
                        <td height="31" align="center">1.</td>
                        <td><span class="style4">
                        <?= setstring('mal', 'Pembelian mesin/jentera dan juga bin untuk kegunaan di ladang', 'en', 'Purchase of machineries and bin for estates??? use'); ?>
                            </span><br />
                            <span class="kecil">(
                        <?= setstring('mal', 'Pembelian mesin/jentara untuk aktiviti meracun, membaja, menuai, memunggah dan mengangkut BTS', 'en', 'Purchase of machineries for weeding, fertilizing, harvesting and FFB collection'); ?>
                                )        </span></td>
                                <td><div align="center">
                                <?= number_format($belanja->pembelian_mesin, 2); ?>
                                    </div></td>
                                <td><div align="center" id="pembelian_mesin_per_ha"><?php $per_ha16 = $belanja->pembelian_mesin / $hektar;
                                echo number_format($per_ha16, 2);
                                ?></div></td>
                                <td><div align="center" id="pembelian_mesin_per_bts">
                            <?php $per_bts16 = $per_ha16 / $bts;
                            echo number_format($per_bts16, 2);
                            ?>        </div></td>
                                <td><div align="center">0.00</div></td>
                    </tr>


                    <tr valign="top" bgcolor="#AEFFAE">
                        <td height="31" align="center">10.</td>
                        <td><span class="style4">
                        <?= setstring('mal', 'Pembelian aset untuk kegunaan pejabat dan bangunan lain di ladang', 'en', 'Purchase of asset for office use and other buildings in estate'); ?>
                            </span><br />
                            <span class="kecil">(
                        <?= setstring('mal', 'Pembelian kenderaan, perabot, komputer, generator dan lain-lain peralatan pejabat yang dikategorikan sebagai aset', 'en', 'Purchase of furniture, vehicles, computers, generators and other office equipment categorized as an asset'); ?>
                                )        </span></td>

                        <td><div align="center">
                        <?= number_format($belanja->pembelian_aset, 2); ?>
                            </div></td>
                        <td><div align="center" id="pembelian_aset_per_ha"><?php $per_ha17 = $belanja->pembelian_aset / $hektar;
                        echo number_format($per_ha17, 2);
                        ?></div></td>
                        <td><div align="center" id="pembelian_aset_per_bts">
                    <?php $per_bts17 = $per_ha17 / $bts;
                    echo number_format($per_bts17, 2);
                    ?>        </div></td>
                        <td><div align="center">0.00</div></td>
                    </tr>

                    <tr>
                        <td height="17" align="center">??</td>
                        <td>??</td>
                        <td>??</td>
                        <td>??</td>
                        <td>??</td>
                        <td>??</td>
                    </tr>



                </table></td>
            </tr>
            <tr>
                <td colspan="3">??</td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
        </table>

                        <?php
                        $variable = $_SESSION['lesen'];
                        $keluasan = new user('keluasan', $variable);
                        $umur = new user('age_profile', $_SESSION['lesen']);
                        $umur2 = new user('esub', $session_lesen);
                        $jumlah_luas_2 = $pengguna->jumlahluas;

                        /**
                          * function luas_data($table,$data, $tahunsebelum){
                          * if(strlen($tahunsebelum)==1)
                          * {
                          * $table = $table."0".substr($tahunsebelum,-2);
                          * }
                          * else{
                          * $table = $table.substr($tahunsebelum,-2);
                          * }
                          * $con = connect();
                          * $qblm="SELECT sum($data) as $data FROM $table WHERE lesen = '".$_SESSION['lesen']."' group by lesen";
                          * $rblm=mysqli_query($qblm,$con);
                          * $rowblm= mysqli_fetch_array($rblm);
                          * //echo "<br>";
                          * $data1 = $rowblm[$data];
                          * $jum_data = $data1;

                          * return $jum_data;
                          * }
                         */


                        $ps1 = luas_data("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 1);
                        $ps2 = luas_data("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 2);
                        $ps3 = luas_data("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 3);

                        $pb1 = luas_data("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 1);
                        $pb2 = luas_data("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 2);
                        $pb3 = luas_data("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 3);

                        $pt1 = luas_data("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 1);
                        $pt2 = luas_data("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 2);
                        $pt3 = luas_data("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 3);

                        $jumlah_semua = $umur2->jumlahluasterakhir + $pb1 + $pb2 + $pb3 + $ps1 + $ps2 + $ps3 + $pt1 + $pt2 + $pt3;

                        $jumlah_luas = $jumlah_semua;
/** $luas = $pengguna->jumlahluas;
* $jumlah_luas = $luas;
*/
                        $jumlah_belum_hasil = $keluasan->jumlah_belum_berhasil;

                        $bts_sum = new user('bts', $variable);
                        $jumlah_bts = $bts_sum->purata_hasil_buah;

                        $var[0] = $_SESSION['lesen'];
                        $var[1] = $_SESSION['tahun'];

                        $matang[0] = $var[0];
                        $matang[1] = $var[1];

                        function kbm($pembolehubah) {
                            $con = connect();
                            $q = "select * from kos_belum_matang where lesen ='" . $_SESSION['lesen'] . "' and pb_thisyear ='" . $_SESSION['tahun'] . "'  and status=1 and pb_tahun='$pembolehubah' ";
                            $r = mysqli_query($con, $q);
                            $res_total = mysqli_num_rows($r);
                            $survey [0] = $res_total;
                            return $survey;
                        }

                        function mtg($pembolehubah) {
                            $con = connect();
                            $qbaja = "select * from $pembolehubah where lesen ='" . $_SESSION['lesen'] . "' and pb_thisyear ='" . $_SESSION['tahun'] . "'  and status!=1 ";
                            $rbaja = mysqli_query($con, $qbaja);
                            $res_total_baja = mysqli_num_rows($rbaja);
                            $matured[0] = $res_total_baja;
                            return $matured;
                        }

                        $satu_all = kbm(1);
                        $dua_all = kbm(2);
                        $tiga_all = kbm(3);

                        $mtg_jaga = mtg("kos_matang_penjagaan");
                        $mtg_tuai = mtg("kos_matang_penuaian");
                        $mtg_angkut = mtg("kos_matang_pengangkutan");

//-----------------------------------------------


                        function tanaman_tahun($tahuntanaman) {
                            $con = connect();
                            $q1 = "select sum(tanaman_baru) as jumlah from tanam_baru$tahuntanaman where lesen ='" . $_SESSION['lesen'] . "' ";
                            $r1 = mysqli_query($con, $q1);
                            $row1 = mysqli_fetch_array($r1);

                            $q2 = "select sum(tanaman_semula) as jumlah from tanam_semula$tahuntanaman where lesen ='" . $_SESSION['lesen'] . "' ";
                            $r2 = mysqli_query($con, $q2);
                            $row2 = mysqli_fetch_array($r2);

                            $q3 = "select sum(tanaman_tukar) as jumlah from tanam_tukar$tahuntanaman  where lesen ='" . $_SESSION['lesen'] . "' ";
                            $r3 = mysqli_query($con, $q3);
                            $row3 = mysqli_fetch_array($r3);


                            $js[0] = $row1['jumlah'] + $row2['jumlah'] + $row3['jumlah'];
                            $js[1] = $row1['jumlah'];
                            $js[2] = $row2['jumlah'];
                            $js[3] = $row3['jumlah'];
                            return $js;
                        }

                        $tahun = $_SESSION['tahun'];
                        $pertama = $tahun - 3;
                        $kedua = $tahun - 2;
                        $ketiga = $tahun - 1;

                        $pertama = substr($pertama, -2);
                        $kedua = substr($kedua, -2);
                        $ketiga = substr($ketiga, -2);

                        $satu = tanaman_tahun($pertama);
                        $dua = tanaman_tahun($kedua);
                        $tiga = tanaman_tahun($ketiga);

                        $totalkos123 = $satu[0] + $dua[0] + $tiga[0];

                        function viewkos_semasa($pu) {
                            $con = connect();

                            if ($pu[5] <= 0) {
                                $con = connect();
                                $q = "delete from kos_belum_matang where lesen ='" . $pu[0] . "' and pb_thisyear = '" . $pu[1] . "' and pb_tahun='" . $pu[2] . "' and pb_type='" . $pu[3] . "'";
                                 mysqli_query($con, $q);
                            }

                            $qe = "select sum(total_a) as jumlah_a, sum(total_b) as jumlah_b from kos_belum_matang where lesen ='" . $pu[0] . "' and pb_thisyear = '" . $pu[1] . "' and pb_tahun='" . $pu[2] . "' and pb_type='" . $pu[3] . "'";
                            $re = mysqli_query($con, $qe);
                            $rowe = mysqli_fetch_array($re);

                            $t[0] = $rowe['lesen'];
                            $t[1] = $rowe['jumlah_a'] / $pu[4];
                            $t[2] = $rowe['jumlah_b'];
                            $t[3] = $rowe['jumlah_a'] + $rowe['jumlah_b'];
                            $t[4] = $t[3] / $pu[4];
                            return $t;
                        }
                        ?>
        <!-- Summary-->
        <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="mydesc">
            <tr>
                <td colspan="3"><strong><h2><?= setstring('mal', 'Kos di estet tuan', 'en', 'Costs at your estate'); ?></h2></strong></td>
            </tr>
        </table>


                        <?php
                        if ($totalkos123 != 0) {
                            ?>


            <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="mydesc1">
                <tr>
                    <td width="30" rowspan="2" background="../images/tb_BG.gif"><div align="center"></div></td>
                    <td width="436" height="40" rowspan="2" background="../images/tb_BG.gif"><strong>
                            <?= setstring('mal', 'Kos Belum Matang', 'en', 'Cost for Immature Crop'); ?>
                        </strong></td>
                    <td height="28" colspan="3" background="../images/tb_BG.gif"><div align="center"><strong>
                            <?= setstring('mal', '(Kos Per Hektar)', 'en', '(Cost Per Hectare)'); ?>
                                (RM) </strong><strong>
                            </strong></div></td>
                    <td rowspan="2" background="../images/tb_BG.gif"><div align="right"><strong>
                            <?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?>
                                <br />
                                (RM) </strong></div></td>
                    <td rowspan="2" background="../images/tb_BG.gif"></td>
                </tr>
                <tr>
                    <td background="../images/tb_BG.gif"><div align="right"><strong>
                    <?= setstring('mal', 'Penanaman Baru ', 'en', 'New Planting '); ?>
                            </strong></div></td>
                    <td background="../images/tb_BG.gif"><div align="right"><strong>
                    <?= setstring('mal', 'Penanaman Semula', 'en', 'Replanting'); ?>
                            </strong></div></td>
                    <td background="../images/tb_BG.gif"><div align="right"><strong>
                    <?= setstring('mal', 'Penukaran', 'en', 'Conversion'); ?>
                            </strong></div></td>
                </tr>
    <?php if ($tiga[0] != 0) { ?>
                    <tr>
                        <td height="33" colspan="2" bgcolor="#99FF99"><div align="left"><a href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Baru">
        <?php
        if (($satu_all[0] == 0) || ( $satu_all[1] == 0)) {
            ?>

                            <?php } ?>
                            <?= setstring('mal', 'Tahun Pertama', 'en', 'First Year'); ?>
                                </a>
                            </div></td>
                        <td width="178" bgcolor="#99FF99"><div align="right">
        <?php
        $pembolehubah[0] = $_SESSION['lesen'];
        $pembolehubah[1] = $tahun;
        $pembolehubah[2] = 1;
        $pembolehubah[3] = "Penanaman Baru";
        $pembolehubah[4] = $tiga[0];

        $pembolehubah[5] = $tiga[1];

        $pb1 = viewkos_semasa($pembolehubah);
        echo number_format($pb1[4], 2);
        ?>
                            </div></td>
                        <td width="178" bgcolor="#99FF99"><div align="right">
                                <?php
                                $pembolehubah[3] = "Penanaman Semula";
                                $pembolehubah[4] = $tiga[0];

                                $pembolehubah[5] = $tiga[2];
                                $pb2 = viewkos_semasa($pembolehubah);
                                echo number_format($pb2[4], 2);
                                ?>
                            </div></td>
                        <td width="178" bgcolor="#99FF99"><div align="right">
                            <?php
                            $pembolehubah[3] = "Penukaran";
                            $pembolehubah[4] = $tiga[0];
                            $pembolehubah[5] = $tiga[3];
                            $pb3 = viewkos_semasa($pembolehubah);
                            echo number_format($pb3[4], 2);
                            ?>
                            </div></td>
                        <td width="178" bgcolor="#99FF99"><div align="right">
                                <?php
                                $var[2] = 1;
                                $nilai = new user('kos', $var);


                                //	echo $tiga[0]."<br>"
                                //	echo $jumlah_luas."<br>".$nilai->jumlah_all."<br>"
                                //echo $nilai->total
                                $aa = ($nilai->jumlah_all / $tiga[0]);
                                echo number_format($aa, 2);
                                ?>
                            </div></td>
                        <td width="93" bgcolor="#99FF99"></td>
                    </tr>
                    <tr>
                        <td height="31"></td>
                        <td height="31" bgcolor="#CCFFCC"><a href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Baru">-
                            <?= setstring('mal', 'Perbelanjaan tidak berulang', 'en', 'Non-recurrent expenses'); ?>
                            </a></td>
                        <td bgcolor="#CCFFCC"><div align="right"><?php echo number_format($pb1[1], 2); ?></div></td>
                        <td bgcolor="#CCFFCC"><div align="right"><?php echo number_format($pb2[1], 2); ?></div></td>
                        <td bgcolor="#CCFFCC"><div align="right"><?php echo number_format($pb3[1], 2); ?></div></td>
                        <td bgcolor="#CCFFCC"><div align="right">
        <?php $aa1 = ($nilai->jumlah_tak_berulang / $tiga[0]);
        echo number_format($aa1, 2); ?>
                            </div></td>
                        <td bgcolor="#CCFFCC"></td>
                    </tr>
                            <?php }
                            ?>
                            <?php if ($dua[0] != 0) { ?>
                    <tr>
                        <td height="31" colspan="2"><div align="left"><a href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Baru">
                                <?php
                                if (($dua_all[0] == 0) || ( $dua_all[1] == 0)) {
                                    ?>

                        <?php } ?>
                        <?= setstring('mal', 'Tahun Kedua', 'en', 'Second Year'); ?>
                                </a>
                            </div></td>
                        <td><div align="right">
        <?php
        $pembolehubah[0] = $_SESSION['lesen'];
        $pembolehubah[1] = $tahun;
        $pembolehubah[2] = 2;
        $pembolehubah[3] = "Penanaman Baru";
        $pembolehubah[4] = $dua[0];
        $pembolehubah[5] = $dua[1];
        $ps1 = viewkos_semasa($pembolehubah);
        echo number_format($ps1[4], 2);
        ?>
                            </div></td>
                        <td><div align="right">
        <?php
        $pembolehubah[3] = "Penanaman Semula";
        $pembolehubah[4] = $dua[0];
        $pembolehubah[5] = $dua[2];
        $ps2 = viewkos_semasa($pembolehubah);
        echo number_format($ps2[4], 2);
        ?>
                            </div></td>
                        <td><div align="right">
                                        <?php
                                        $pembolehubah[3] = "Penukaran";
                                        $pembolehubah[4] = $dua[0];
                                        $pembolehubah[5] = $dua[3];
                                        $ps3 = viewkos_semasa($pembolehubah);
                                        echo number_format($ps3[4], 2);
                                        ?>
                            </div></td>
                        <td><div align="right">
        <?php

        $var[2] = 2;
        $nilai = new user('kos', $var);
        $bb = ($nilai->jumlah_penjagaan / $dua[0]);
        echo number_format($bb, 2);
        ?>
                            </div></td>
                        <td></td>
                    </tr>
    <?php }
    ?>
    <?php if ($satu[0] != 0) { ?>
                    <tr>
                        <td height="33" colspan="2" bgcolor="#99FF99"><div align="left"><a href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Baru">
        <?php if (($tiga_all[0] == 0) || ( $tiga_all[1] == 0)) {
            ?>

            <?php
        }
        ?>
        <?= setstring('mal', 'Tahun Ketiga', 'en', 'Third Year'); ?>
                                </a></div></td>
                        <td bgcolor="#99FF99"><div align="right">
        <?php
        $pembolehubah[0] = $_SESSION['lesen'];
        $pembolehubah[1] = $tahun;
        $pembolehubah[2] = 3;
        $pembolehubah[3] = "Penanaman Baru";
        $pembolehubah[4] = $satu[0];
        $pembolehubah[5] = $satu[1];
        $pt1 = viewkos_semasa($pembolehubah);
        echo number_format($pt1[4], 2);
        ?>
                            </div></td>
                        <td bgcolor="#99FF99"><div align="right">
        <?php
        $pembolehubah[3] = "Penanaman Semula";
        $pembolehubah[4] = $satu[0];
        $pembolehubah[5] = $satu[2];
        $pt2 = viewkos_semasa($pembolehubah);
        echo number_format($pt2[4], 2);
        ?>
                            </div></td>
                        <td bgcolor="#99FF99"><div align="right">
        <?php
        $pembolehubah[3] = "Penukaran";
        $pembolehubah[4] = $satu[0];
        $pembolehubah[5] = $satu[3];
        $pt3 = viewkos_semasa($pembolehubah);
        echo number_format($pt3[4], 2);
        ?>
                            </div></td>
                        <td bgcolor="#99FF99"><div align="right">
        <?php
        $var[2] = 3;
        $nilai = new user('kos', $var);
        $cc = ($nilai->jumlah_penjagaan / $satu[0]);
        echo number_format($cc, 2);
        ?>
                            </div></td>
                        <td bgcolor="#99FF99"></td>
                    </tr>
    <?php } ?>
                <tr>
                    <td><div align="center"></div></td>
                    <td height="33"><div align="right"><strong>
    <?= setstring('mal', 'Jumlah', 'en', 'Total'); ?>
                            </strong></div></td>
                    <td bgcolor="#FFCC66" id="jumlah2">&nbsp;</td>
                    <td bgcolor="#FFCC66" id="jumlah2">&nbsp;</td>
                    <td bgcolor="#FFCC66" id="jumlah2">&nbsp;</td>
                    <td bgcolor="#FFCC66" id="jumlah2"><div align="center" id="total2">
                            <div align="right">
    <?php $jabc = $aa + $bb + $cc;
    echo number_format($jabc, 2); ?>
                            </div>
                        </div></td>
                    <td bgcolor="#FFCC66" id="jumlah2"></td>
                </tr>
            </table>
<?php } //do not dipslay if nothing luas 1, 2, 3  ?>

        <br/>
        <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;" aria-describedby="mydesc2">
            <tr>
                <td background="../images/tb_BG.gif"><div align="center"></div></td>
                <td height="40" background="../images/tb_BG.gif"><strong><?= setstring('mal', 'Kos Matang', 'en', 'Cost for Mature Crop'); ?>
                    </strong></td>
                <td background="../images/tb_BG.gif"><div align="right"><strong><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?>
                            <br />
                            (RM)</strong></div></td>
                <td background="../images/tb_BG.gif"> </td>
                <td background="../images/tb_BG.gif"><div align="right"><strong><?= setstring('mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?>
                            <br />
                            (RM)</strong></div></td>
                <td background="../images/tb_BG.gif"> </td>
            </tr>
            <tr>
                <td width="19" bgcolor="#99FF99"><div align="center">1.</div></td>
                <td width="166" height="33" bgcolor="#99FF99">

<?php if ($mtg_jaga[0] > 0) { ?>

<?php } ?>

                    <a href="home.php?id=matang&penjagaan"><?= setstring('mal', 'Kos Penjagaan', 'en', 'Cost for Upkeep'); ?>
                    </a></td>
                <td width="253" bgcolor="#99FF99"><div align="right"><?php
$jaga = new user('matang_penjagaan', $matang);
$d = ($jaga->total_b / $jumlah_luas_2);





echo number_format($d, 2);
?></div></td>
                <td width="14" bgcolor="#99FF99"> </td>
<?php
$e = $d / $jumlah_bts;
$rk[0] = $e;
$rk[1] = "penjagaan";
$ringkasan = new user('range_kos', $rk);
?>
                <td width="188" bgcolor="#99FF99" class="ringkasan" <?php if ($ringkasan->status == 'X') { ?>style="border:3px #FF3300 solid;"<?php } ?>><div align="right" <?php if ($ringkasan->status == 'X') { ?>style="text-decoration:blink; font-weight:bold"<?php } ?>><?php echo $ee = number_format($e, 2); ?></div></td>



                <td width="93" bgcolor="#99FF99"> </td>
            </tr>
            <tr>
                <td><div align="center"></div></td>
                <td height="31" bgcolor="#CCFFCC">
<?php if ($totaljaga > 0) { ?>

<?php } ?>
                    <a href="home.php?id=matang&penjagaan"><?= setstring('mal', '-Kos Pembajaan', 'en', '-Fertilizing Cost'); ?>
                    </a></td>
                <td bgcolor="#CCFFCC" ><div align="right"><?php
$con = connect();
$qjaga = "select total_b_3, b_3a, b_3b, b_3c, b_3d from kos_matang_penjagaan where pb_thisyear ='" . $_SESSION['tahun'] . "' and lesen ='" . $_SESSION['lesen'] . "' ";
$rjaga = mysqli_query($con, $qjaga);
$rowjaga = mysqli_fetch_array($rjaga);
$totaljaga = mysqli_num_rows($rjaga);

if ($rowjaga['total_b_3'] == 0) {
    $ftotal = $rowjaga['b_3a'] + $rowjaga['b_3b'] + $rowjaga['b_3c'] + $rowjaga['b_3d'];
}
if ($rowjaga['total_b_3'] > 0) {
    $ftotal = $rowjaga['total_b_3'];
}

$f = ($ftotal / $jumlah_luas_2);

echo number_format($f, 2);
?></div></td>
                <td bgcolor="#CCFFCC"> </td>

<?php
$f = str_replace(",", "", $f);

$g = $f / $jumlah_bts;
$rk[0] = $g;
$rk[1] = "pembajaan";
$ringkasan = new user('range_kos', $rk);
?>
                <td bgcolor="#CCFFCC" <?php if ($ringkasan->status == 'X') { ?>style="border:3px #FF3300 solid;"<?php } ?>><div align="right" <?php if ($ringkasan->status == 'X') { ?>style="text-decoration:blink; font-weight:bold"<?php } ?>><?php echo $gg = number_format($g, 2); ?></div></td>




                <td bgcolor="#CCFFCC"> </td>
            </tr>
            <tr>
                <td><div align="center">2.</div></td>
                <td height="36">
<?php if ($mtg_tuai[0] > 0) { ?>

<?php } ?>



                    <a href="home.php?id=matang&penuaian">
<?= setstring('mal', 'Kos Penuaian BTS', 'en', 'FFB Harvesting Cost'); ?>
                    </a></td>
                <td><div align="right"><?php
$tuai = new user('matang_penuaian', $matang);
$h = ($tuai->total_b / $jumlah_luas_2);
echo number_format($h, 2);
?></div></td>
                <td> </td>
<?php
$i = $h / $jumlah_bts;
$rk[0] = $i;
$rk[1] = "penuaian";
$ringkasan = new user('range_kos', $rk);
?>
                <td <?php if ($ringkasan->status == 'X') { ?>style="border:3px #FF3300 solid;"<?php } ?>><div align="right" <?php if ($ringkasan->status == 'X') { ?>style="text-decoration:blink; font-weight:bold"<?php } ?>>
<?php echo $ii = number_format($i, 2); ?>
                    </div></td>


                <td > </td>
            </tr>
            <tr>
                <td bgcolor="#99FF99"><div align="center">3.</div></td>
                <td height="33" bgcolor="#99FF99">

<?php if ($mtg_angkut[0] > 0) { ?>

<?php } ?>


                    <a href="home.php?id=matang&pengangkutan"><?= setstring('mal', 'Kos Pengangkutan BTS', 'en', 'FFB Transportation Cost'); ?>
                    </a></td>
                <td bgcolor="#99FF99"><div align="right"><?php
$angkut = new user('matang_pengangkutan', $matang);
$j = ($angkut->total_b / $jumlah_luas_2);
echo number_format($j, 2);
?></div></td>
                <td bgcolor="#99FF99"> </td>

<?php
$k = $j / $jumlah_bts;
$rk[0] = $k;
$rk[1] = "pengangkutan";
$ringkasan = new user('range_kos', $rk);
?>
                <td bgcolor="#99FF99" <?php if ($ringkasan->status == 'X') { ?>style="border:3px #FF3300 solid;"<?php } ?>><div align="right" <?php if ($ringkasan->status == 'X') { ?>style="text-decoration:blink; font-weight:bold"<?php } ?>><?php echo $kk = number_format($k, 2); ?></div></td>


                <td bgcolor="#99FF99"> </td>
            </tr>
            <tr>
                <td><div align="center">4.</div></td>
                <td height="33">
<?php if ($mtg_belanja[0] > 0) { ?>

<?php } ?>

                    <a href="home.php?id=umum"><?= setstring('mal', 'Kos Perbelanjaan Am', 'en', 'General Expenses Cost'); ?>
                    </a></td>
                <td><div align="right"><?php
$belanja = new user('belanja_am', $matang);
$l = ($belanja->total_perbelanjaan / $jumlah_luas);
echo number_format($l, 2);
?></td>
                <td> </td>

<?php
$m = $l / $jumlah_bts;
$rk[0] = $m;
$rk[1] = "pembajaan";
$ringkasan = new user('range_kos', $rk);
?>
                <td <?php if ($ringkasan->status == 'X') { ?>style="border:3px #FF3300 solid;"<?php } ?>><div align="right" <?php if ($ringkasan->status == 'X') { ?>style="text-decoration:blink; font-weight:bold"<?php } ?>><?php echo $mm = number_format($m, 2); ?> </div></td>


                <td> </td>
            </tr>
            <tr>
                <td><div align="center"></div></td>
                <td height="33"><div align="right"><strong><?= setstring('mal', 'Jumlah', 'en', 'Total'); ?>
                        </strong></div></td>
                <td bgcolor="#FFCC66" id="jumlah"><div align="center" id="total">
                        <div align="right"><span class="style2">
<?php $jh = $d + $h + $j + $l;
echo number_format($jh, 2);
?>
                            </span> </div>
                    </div
                    ></td>
                <td bgcolor="#FFCC66" id="jumlah"> </td>
                <td bgcolor="#FFCC66"><div align="center" style="text-decoration:blink;">
                        <div align="right"><strong><?php
$ee = str_replace(",", '', $ee);
$ii = str_replace(",", '', $ii);
$kk = str_replace(",", '', $kk);
$mm = str_replace(",", '', $mm);

$jb = $ee + $ii + $kk + $mm;
echo number_format($jb, 2);
?></strong></div>
                    </div></td>
                <td bgcolor="#FFCC66"> </td>
            </tr>
        </table>

        <br/>
        <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss noPrint" style="background-color:#FFFFFF;" aria-describedby="mydesc3">
            <tr>
                <td colspan="5" align="center">
                    <input name="cetak" type="button" value=<?= setstring('mal', '"Cetak"', 'en', '"Print"'); ?> onclick="window.print();" />
                </td>
            </tr>
        </table>
    </body>
</html>
