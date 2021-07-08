<?php
$variable = $_SESSION['lesen'];
$keluasan = new user('keluasan', $variable);
//echo $keluasan
$umur = new user('age_profile', $_SESSION['lesen']);
$umur2 = new user('esub', $session_lesen);
$jumlah_luas_2 = $pengguna->jumlahluas;
//$jumlah_luas_2 = $pengguna->luastuai

include('query_luas_data.php');

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

//echo $jumlah_luas= $keluasan->jumlah
$jumlah_luas = $jumlah_semua;
//$luas = $pengguna->jumlahluas
//$jumlah_luas = $luas

$jumlah_belum_hasil = $keluasan->jumlah_belum_berhasil;

$bts_sum = new user('bts', $variable);
$jumlah_bts = $bts_sum->purata_hasil_buah;

$var[0] = $_SESSION['lesen'];
$var[1] = $_SESSION['tahun'];
//$_SESSION['tahun']

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


include ('query_tahun_tanam.php');

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
    mysqli_num_rows($re);
    $rowe = mysqli_fetch_array($re);

    $t[0] = $rowe['lesen'];
    $t[1] = $rowe['jumlah_a'] / $pu[4];
    $t[2] = $rowe['jumlah_b'];
    $t[3] = $rowe['jumlah_a'] + $rowe['jumlah_b'];
    $t[4] = $t[3] / $pu[4];
    return $t;
}
?>
<script>
    $(function () {
        $("#jumlah").mouseover(function () {
            $("#total").css("font-size", "15px");
        });
        $("#jumlah").mouseout(function () {
            $("#total").css("font-size", "12px");
        });
    });

    function print(tahun)
    {
        document.form1.action = "home.php?id=print_estate&tahun=" + tahun;
        document.form1.target = "_parent";
        document.form1.submit();
    }
</script>

<form id="form1" name="form1" method="post" action="mail_ringkasan.php">
    <table width="100%" align="center" class="tableCss" aria-describedby="estateRingkasan">
        <?php
        $con = connect();
        $aQuery = "SELECT Integration " .
                "FROM tblasmintegrationestate " .
                "WHERE License = '" . $_SESSION['lesen'] . "' AND `Year` = '" . $_SESSION['tahun'] . "'";
        $aRows = mysqli_query($con, $aQuery);
        if (mysqli_num_rows($aRows) == 0){
            $IntegrationStatus = "<span style=\"color:#f00\">" . ($_SESSION['lang'] == "mal" ? "Belum Kemaskini" : "Not Update") . "</span>";
        }
        else {
            $aRow = mysqli_fetch_object($aRows);
            switch ($aRow->Integration) {
                case 2: $IntegrationStatus = "<span style=\"color:#00f\">" . ($_SESSION['lang'] == "mal" ? "Integrasi Tanaman" : "Crops Integration") . "</span>";
                    break;
                case 3: $IntegrationStatus = "<span style=\"color:#00f\">" . ($_SESSION['lang'] == "mal" ? "Integrasi Ternakan" : "Livestock Integration") . "</span>";
                    break;
                case 4: $IntegrationStatus = "<span style=\"color:#00f\">" . ($_SESSION['lang'] == "mal" ? "Integrasi Tanaman dan Ternakan" : "Crops and Livestock Integration") . "</span>";
                    break;
                default: $IntegrationStatus = "<span style=\"color:#00f\">" . ($_SESSION['lang'] == "mal" ? "Tiada Integrasi" : "No Integration") . "</span>";
                    break;
            }
        }
        ?>
        <tr>
            <td width="51"> </td>
            <td width="824" colspan="2"><span class="style1"><?= setstring('mal', 'Status Integrasi', 'en', 'Integration Status'); ?>
                    : <a href="home.php?id=integration"><?php echo $IntegrationStatus; ?></a></span></td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
            <td width="51"> </td>
            <td width="824" colspan="2"><span class="style1"><?= setstring('mal', 'Kos di estet tuan', 'en', 'Costs at your estate'); ?>
                    :</span></td>
        </tr>
        <tr>
            <td height="10px"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">

                <?php if ($totalkos123 != 0) { ?>
                    <table width="80%" align="center" cellspacing="0" frame="box" style="border:#999999 solid 1px;" aria-describedby="totalKos">
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
                                        $a = ($nilai->jumlah_all / $tiga[0]);
                                        echo number_format($a, 2);
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
                                        <?php
                                        $a1 = ($nilai->jumlah_tak_berulang / $tiga[0]);
                                        echo number_format($a1, 2);
                                        ?>
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
                                        <?php //echo $dua_all[1]  ?>
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
                                        //echo $dua[0]."<br>"


                                        $var[2] = 2;
                                        $nilai = new user('kos', $var);
                                        $b = ($nilai->jumlah_penjagaan / $dua[0]);
                                        echo number_format($b, 2);
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
                                        $c = ($nilai->jumlah_penjagaan / $satu[0]);
                                        echo number_format($c, 2);
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
                                        <?php
                                        $jabc = $a + $b + $c;
                                        echo number_format($jabc, 2);
                                        ?>
                                    </div>
                                </div></td>
                            <td bgcolor="#FFCC66" id="jumlah2"></td>
                        </tr>
                    </table>

                <?php } //do not dipslay if nothing luas 1, 2, 3   ?>

                <p><?php //echo $jumlah_luas   ?> </p>
                <table width="80%" align="center" cellspacing="0" frame="box" style="border:#999999 solid 1px;" aria-describedby="jumlahluas1">
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
                    <?php //echo $jumlah_luas   ?>
                    <tr>
                        <td width="19" bgcolor="#99FF99"><div align="center">1.</div></td>
                        <td width="166" height="33" bgcolor="#99FF99">

                            <?php if ($mtg_jaga[0] > 0) { ?>

                            <?php } ?>

                            <a href="home.php?id=matang&penjagaan"><?= setstring('mal', 'Kos Penjagaan', 'en', 'Cost for Upkeep'); ?>
                            </a></td>
                        <td width="253" bgcolor="#99FF99"><div align="right">
                                <?php
                                //echo $jumlah_luas_2."&nbsp"
                                $jaga = new user('matang_penjagaan', $matang);
                                $d = ($jaga->total_b / $jumlah_luas_2);
                                $d = round($d, 2, PHP_ROUND_HALF_UP);

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
                                $f = round($f, 2, PHP_ROUND_HALF_UP);

                                echo number_format($f, 2);
                                ?></div></td>
                        <td bgcolor="#CCFFCC"> </td>

                        <?php
                        //  $f= number_format($f,2)
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
                                  $h = round($h, 2, PHP_ROUND_HALF_UP);
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
                                 $j = round($j, 2, PHP_ROUND_HALF_UP);
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
                                //echo $belanja->total_perbelanjaan . '<br/>' . $jumlah_luas . '<br/>'
                                $l = ($belanja->total_perbelanjaan / $jumlah_luas);
                                $l = round($l, 2, PHP_ROUND_HALF_UP);

                                echo number_format($l, 2);
                                ?>
                                </td>
                        <td> </td>

                        <?php
                        $m = $l / $jumlah_bts;
                        $rk[0] = $m;
                        $rk[1] = "perbelanjaan am";
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
                                        <?php
                                        //echo $d ."+". $h ."+". $j ."+". $l."<br>"
                                        $jh = $d + $h + $j + $l;
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
                </table></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"> </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                <div align="center">
                    <input type="submit" name="button" id="button" value=<?= setstring('mal', '"Hantar ke MPOB"', 'en', '"Send to MPOB"'); ?> onclick="pitmid = true; return confirm(<?= setstring('mal', '\'Anda pasti untuk simpan dan sahkan?\'', 'en', '\'Ready for save and approval?\'') ?>)" />
                           <input name="cetak" type="button" value=<?= setstring('mal', '"Cetak"', 'en', '"Print"'); ?> onclick="print('<?php echo $_SESSION['tahun']; ?>');" />
                </div>
                <br /></td>
        </tr></form>
<?php mysqli_close($con); ?>
