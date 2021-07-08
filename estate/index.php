<?php
/*

 *  Filename: estate/index.php

 *  Copyright 2010 Malaysia Palm Oil Board <azman@mpob.gov.my>

 * 	Last update: 15.10.2010 11:46:16 am

 * 	- added check to progress bar

 */

// Report all PHP errors
// error_reporting(-1)
$con = connect();


include ('../class/user_last_year.class.php');
$penggunaLastYear = new user_last_year('estateTahun', $_SESSION['lesen'], ($_SESSION['tahun'] - 1));

$tahun_lepas = date('Y') - 1;
$query = "select * from graf_km where lesen ='" . $_SESSION['lesen'] . "' and tahun = '$tahun_lepas' and status='0' ";
//echo $query
$res = mysqli_query($con, $query);
$row = mysqli_fetch_array($res);
$res_total = mysqli_num_rows($res);

function median($numbers = array()) {
    if (!is_array($numbers)) {
        $numbers = func_get_args();
    }

    rsort($numbers);
    $mid = (count($numbers) / 2);
    return ($mid % 2 != 0) ? $numbers[$mid - 1] : (($numbers[$mid - 1]) + $numbers[$mid]) / 2;
}

function pertama($tahun, $status, $negeri, $daerah, $type, $table) {
    $con = connect();
    $sql = "SELECT * FROM $table where tahun ='$tahun' and status='$status' ";
    if ($negeri != "" & $negeri != "pm") {
        $sql .= " and negeri = '$negeri'";
    }
    if ($negeri != "" && $daerah != "") {
        $sql .= " and daerah = '$daerah'";
    }
    if ($negeri == "pm") {
        $sql .= " and (negeri not like 'SARAWAK' and negeri not like 'SABAH')";
    }
    if ($type != "") {
        $sql .= " and lesen = '$type' ";
    }

    //echo $sql . "<br>"
    $sql_result = mysqli_query($con, $sql);
    $i = 0;
    while ($row = mysqli_fetch_array($sql_result)) {
        $test_data[] = $row["y"];
        $i = $i + 1;
    }

    $qavg = "SELECT AVG(y) as purata FROM $table where  tahun ='$tahun' and status='$status'";
    if ($negeri != "" & $negeri != "pm") {
        $qavg .= " and negeri = '$negeri'";
    }
    if ($negeri != "" && $daerah != "") {
        $qavg .= " and daerah = '$daerah'";
    }
    if ($negeri == "pm") {
        $qavg .= " and (negeri not like 'SARAWAK' and negeri not like 'SABAH')";
    }
    if ($type != "") {
        $qavg .= " and lesen = '$type' ";
    }


//echo $qavg."<br>"
    $ravg = mysqli_query($con, $qavg);
    $rrow = mysqli_fetch_array($ravg);


    $var[0] = median($test_data);
    $var[1] = $rrow['purata'];
    return $var;
}

if (isset($_GET['firsttime'])) {
    ?>

    <link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />

    <script type="text/javascript" src="../ui/ui.core.js"></script>

    <script type="text/javascript" src="../ui/ui.draggable.js"></script>

    <script type="text/javascript" src="../ui/ui.resizable.js"></script>

    <script type="text/javascript" src="../ui/ui.dialog.js"></script>

    <script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>



    <script type="text/javascript">

        $(function () {

            $("#dialog_1").dialog({

                autoOpen: true,

                modal: true

            });

        });

    </script>



    <div id="dialog_1">

        <p>

            <?= setstring('mal', 'Selamat Datang Ke Sistem E-COST Estet', 'en', 'Welcome to E-COST System for Estate'); ?>

        </p>

        <p><?= setstring('mal', 'Sila Kemaskini Profil Anda Terlebih Dahulu', 'en', 'Please Update Your Profile'); ?></p>

    </div>

    <?php
}
?>

<link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />

<script type="text/javascript" src="../ui/ui.core.js"></script>

<script type="text/javascript" src="../ui/ui.draggable.js"></script>

<script type="text/javascript" src="../ui/ui.resizable.js"></script>

<script type="text/javascript" src="../ui/ui.dialog.js"></script>

<script type="text/javascript" src="../ui/ui.progressbar.js"></script>

<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>

<script type="text/javascript">

        $(function () {

            $("#progress").progressbar({

                value:<?php
$unpercent_kos = (100 - $percent_kos);
echo number_format($unpercent_kos, 2);
?>

            });

        });

</script>

<p><strong><?= setstring('mal', 'Selamat Datang', 'en', 'Welcome'); ?> <?= strtoupper($pengguna->namaestet); ?></strong></p>



<table width="100%" border="0" aria-describedby="indexEstate">

    <tr>

        <td width="49%" rowspan="4"><div style=" background-color: #ccc;

                                         -moz-border-radius: 5px;

                                         -webkit-border-radius: 5px;

                                         border: 1px solid #000;

                                         padding: 10px;">

                <table aria-describedby="indexEstate2">

                    <tr>

                        <td><strong><img src="../folder.png" alt="aaa" width="100" height="100" /></strong></td>

                        <td><ul>

                                <li> <?= setstring('mal', 'Login berjaya terakhir anda pada', 'en', 'Last success login on'); ?>

                                    <?= date('d-F-Y', strtotime($pengguna->success)) ?>

                                </li>
                                <?php
                                if ($pengguna->fail != "0000-00-00 00:00:00") {
                                    ?>
                                    <br />

                                    <li> <?= setstring('mal', 'Login gagal terakhir anda pada', 'en', 'Last failed login on'); ?>

                                        <?= date('d-F-Y', strtotime($pengguna->fail)) ?>

                                    </li>
                                    <?php
                                }
                                ?>
                                <br />
                                <li><?= setstring('mal', 'Status terima borang oleh MPOB :', 'en', 'Survey form status by MPOB :'); ?>

                                    <?php
                                    $sql = "SELECT * FROM ringkasan_kos_hantar WHERE no_lesen = '" . $_SESSION['lesen'] . "' AND TAHUN = '" . $_SESSION['tahun'] . "' ORDER BY TARIKH_HANTAR DESC LIMIT 1";
                                    $result_hantar = mysqli_query($con, $sql);
                                    $hantar = mysqli_fetch_array($result_hantar);

                                    if (!$hantar) {
                                        ?>
                                        <strong style="color:#FF0000"><?= setstring('mal', 'Belum diterima', 'en', 'Not yet received'); ?></strong>

                                    </li>
                                <?php } else {
                                    ?>

                                    <strong><?= setstring('mal', 'Telah diterima', 'en', 'Received'); ?></strong>

                                    </li>

                                    <br />
                                    <li><?= setstring('mal', 'Tarikh terakhir terima borang pada ', 'en', 'Last form submit on '); ?>

                                        <strong><?php echo(date('d-F-Y', strtotime($hantar['TARIKH_HANTAR']))); ?></strong>

                                    </li>
                                <?php } ?>

                                <br />

                                <li><?= setstring('mal', 'Sila klik pada menu di atas untuk navigasi.', 'en', 'Please click on the menu to navigate.'); ?></li>

                            </ul></td>

                    </tr>

                </table>

            </div></td>

    </tr>

</table>
<?php
$aQuery = "SELECT MalaysiaAmount, "
        . " PMalaysiaAmount, "
        . " SabahAmount, "
        . " SarawakAmount, "
        . " MalaysiaAmount2, "
        . " PMalaysiaAmount2, "
        . " SabahAmount2, "
        . " SarawakAmount2 "
        . "FROM tblasmcostsummarydetail "
        . "WHERE `Year` = '" . ($_SESSION['tahun'] - 1) . "' "
        . "AND isShow = 2";

//echo $aQuery."<br>"
$aRows = mysqli_query($con, $aQuery);
$Show = true;
$Display = false;
if (mysqli_num_rows($aRows) != 0) {
    $Show = false;
}

if ($Show) {
    $bts_sum = new user('bts', $_SESSION['lesen']);
    $jumlah_bts = $bts_sum->purata_hasil_buah;
    $matang = array($_SESSION['lesen'], $_SESSION['tahun'] - 1);
    $jumlah_luas_2 = $penggunaLastYear->jumlahluas;
    $aQuery = "SELECT ID, Item" . ($_SESSION['lang'] == "mal" ? "My" : "En") . " AS Item, Ordering FROM tblasmcostsummaryitem WHERE `Parent` IS NULL ORDER BY Ordering ASC";
    $aRows = mysqli_query($con, $aQuery);
    $EstateAmountTotal = 0;
    $EstateAmountTotal2 = 0;
    while ($aRow = mysqli_fetch_object($aRows)) {
        if ($aRow->ID == 1) {
            $jaga = new user('matang_penjagaan', $matang);
            $EstateAmount = ($jaga->total_b / $jumlah_luas_2);
            $EstateAmount2 = $EstateAmount / $jumlah_bts;
            $EstateAmountTotal += $EstateAmount;
            $EstateAmountTotal2 += $EstateAmount2;
        } else if ($aRow->ID == 3) {
            $tuai = new user('matang_penuaian', $matang);
            $EstateAmount = ($tuai->total_b / $jumlah_luas_2);
            $EstateAmount2 = $EstateAmount / $jumlah_bts;
            $EstateAmountTotal += $EstateAmount;
            $EstateAmountTotal2 += $EstateAmount2;
        } else if ($aRow->ID == 4) {
            $angkut = new user('matang_pengangkutan', $matang);
            $EstateAmount = ($angkut->total_b / $jumlah_luas_2);
            $EstateAmount2 = $EstateAmount / $jumlah_bts;
            $EstateAmountTotal += $EstateAmount;
            $EstateAmountTotal2 += $EstateAmount2;
        } else if ($aRow->ID == 5) {
            $belanja = new user('belanja_am', $matang);
            $EstateAmount = ($belanja->total_perbelanjaan / $jumlah_luas) ;
            $EstateAmount2 = $EstateAmount / $jumlah_bts;
            $EstateAmountTotal += $EstateAmount;
            $EstateAmountTotal2 += $EstateAmount2;
        }
    }

    if(is_nan($EstateAmountTotal) && ($EstateAmountTotal2)){

        echo "<br>";
        echo "<div style=\"float:left;width:100%;padding:0px 0px 5px 0px;font-weight:bold;color:#f00;text-align:center\">" . ($_SESSION['lang'] == "mal" ? "Sila Kemaskini Kos Matang bagi tahun " . ($_SESSION['tahun'] - 2) . ". Untuk mengemaskini Kos Matang, Anda perlu log masuk dengan pilihan tahun eCOST " . ($_SESSION['tahun'] - 1) : "Please Update Mature Cost for year " . ($_SESSION['tahun'] - 1) . ".
        To update the mature cost, You need to log out and select the year eCOST " . ($_SESSION['tahun'] - 1) . ".") . "</div>\n";
        echo "<br>";
        echo "<br>";
//$Show = false
        $Display = true;
        if ($_SESSION['tahun'] == 2010) {
            $Table = "esub";
        } else {
            $Table = "esub_" . ($_SESSION['tahun'] - 1);
        }

        $aQuery = "SELECT Negeri FROM $Table WHERE No_Lesen = '" . $_SESSION['lesen'] . "' OR No_Lesen_Baru = '" . $_SESSION['lesen'] . "'";
        $aRows = mysqli_query($con, $aQuery);
        if (mysqli_num_rows($aRows) == 0) {
            $isPMalaysia = 1;
        } else {
            $aRow = mysqli_fetch_object($aRows);
            if ($aRow->Negeri == "SABAH") {
                $isPMalaysia = 2;
            } else if ($aRow->Negeri == "SARAWAK") {
                $isPMalaysia = 3;
            } else {
                $isPMalaysia = 1;
            }
        }
    } else {
        if ($_SESSION['tahun'] == 2010) {
            $Table = "esub";
        } else {
            $Table = "esub_" . ($_SESSION['tahun'] - 1);
        }

        $aQuery = "SELECT Negeri FROM $Table WHERE No_Lesen = '" . $_SESSION['lesen'] . "' OR No_Lesen_Baru = '" . $_SESSION['lesen'] . "'";
        $aRows = mysqli_query($con, $aQuery);
        if (mysqli_num_rows($aRows) == 0) {
            $isPMalaysia = 1;
        } else {
            $aRow = mysqli_fetch_object($aRows);
            if ($aRow->Negeri == "SABAH") {
                $isPMalaysia = 2;
            } else if ($aRow->Negeri == "SARAWAK") {
                $isPMalaysia = 3;
            } else {
                $isPMalaysia = 1;
            }
        }
    }
}

//echo "show ".$Show
if ($Show) {

    function luas_data_new($table, $data, $tahunsebelum) {

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

    $ps1 = luas_data_new("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 1);
    $ps2 = luas_data_new("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 2);
    $ps3 = luas_data_new("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 3);

    $pb1 = luas_data_new("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 1);
    $pb2 = luas_data_new("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 2);
    $pb3 = luas_data_new("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 3);

    $pt1 = luas_data_new("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 1);
    $pt2 = luas_data_new("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 2);
    $pt3 = luas_data_new("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 3);



    $umur2 = new user('esub', $_SESSION['lesen']);

    $jumlah_semua = $umur2->jumlahluasterakhir + $pb1 + $pb2 + $pb3 + $ps1 + $ps2 + $ps3 + $pt1 + $pt2 + $pt3;

    $jumlah_luas = $jumlah_semua;
    ?>
    <br />
    <div style="font-weight:bold; text-align: center"><?php echo $_SESSION['lang'] == "mal" ? "Ringkasan Kos Pengeluaran (RM Per Hektar dan RM Per Tan) Bagi Tahun " . ($_SESSION['tahun'] - 2) : "Cost Summary (RM Per Hectare and RM Per Tonne) For Year " . ($_SESSION['tahun'] - 2); ?></div>
    <br>
    <div style="float:left;width:100%">
        <table width="70%" border="0" align="center" cellpadding="0" cellspacing="1" style="border:#333333 1px solid;" aria-describedby="indexEstate3">
            <tr style="font-weight:bold">
                <td width="200" rowspan="2" bgcolor="#D8E3FF" style="padding:3px"><?php echo $_SESSION['lang'] == "mal" ? "Kos Matang" : "Cost for Mature Crop"; ?></td>
                <td colspan="3" align="center" bgcolor="#D8E3FF" style="padding:3px"><?php echo $_SESSION['lang'] == "mal" ? "Kos Per Hektar (RM)" : "Cost Per Hectare (RM)"; ?></td>
                <td colspan="3" align="center" bgcolor="#D8E3FF" style="padding:3px"><?php echo $_SESSION['lang'] == "mal" ? "Kos Per Tan BTS (RM)" : "Cost Per Tonne FFB (RM)"; ?></td>
            </tr>
            <tr style="font-weight:bold;text-align:center">
                <td width="200" bgcolor="#D8E3FF" style="padding:3px"><?php echo strtoupper($pengguna->namaestet); ?></td>
                <td width="100" bgcolor="#D8E3FF" style="padding:3px">Malaysia</td>
    <?php if ($isPMalaysia == 1) { ?><td width="100" bgcolor="#D8E3FF" style="padding:3px">P.Malaysia</td><?php } ?>
    <?php if ($isPMalaysia == 2) { ?><td width="100" bgcolor="#D8E3FF" style="padding:3px">Sabah</td><?php } ?>
    <?php if ($isPMalaysia == 3) { ?><td width="100" bgcolor="#D8E3FF" style="padding:3px">Sarawak</td><?php } ?>
                <td width="200" bgcolor="#D8E3FF" style="padding:3px"><?php echo strtoupper($pengguna->namaestet); ?></td>
                <td width="100" bgcolor="#D8E3FF" style="padding:3px">Malaysia</td>
    <?php if ($isPMalaysia == 1) { ?><td width="100" bgcolor="#D8E3FF" style="padding:3px">P.Malaysia</td><?php } ?>
    <?php if ($isPMalaysia == 2) { ?><td width="100" bgcolor="#D8E3FF" style="padding:3px">Sabah</td><?php } ?>
    <?php if ($isPMalaysia == 3) { ?><td width="100" bgcolor="#D8E3FF" style="padding:3px">Sarawak</td><?php } ?>
            </tr>
    <?php
    $bts_sum = new user('bts', $_SESSION['lesen']);
    #query $bts_sum
    $tahunfbb = $_SESSION['tahun'] - 1;
    $query_bts = "SELECT * FROM fbb_production$tahunfbb WHERE lesen ='". $_SESSION['lesen']."'";
    $result_bts = mysqli_query($con,$query_bts);
    while($row=mysqli_fetch_array($result_bts))
		{
			// $this->lesen=$row['lesen'];
			// $this->bil=$row['bil'];
			// $this->nama=$row['nama'];
			// $this->negeri=$row['negeri'];
			// $this->daerah=$row['daerah'];
			// $this->jumlah_pengeluaran=$row['jumlah_pengeluaran'];
			$bts_sum_purata_hasil_buah=$row['purata_hasil_buah'];
		}

    // $jumlah_bts = $bts_sum->purata_hasil_buah;
    $jumlah_bts = $bts_sum_purata_hasil_buah;
    #end of query $bts_sum

    $matang = array($_SESSION['lesen'], $_SESSION['tahun'] - 1);
    $jumlah_luas_2 = $penggunaLastYear->jumlahluas;
    $aQuery = "SELECT ID, Item" . ($_SESSION['lang'] == "mal" ? "My" : "En") . " AS Item, Ordering FROM tblasmcostsummaryitem WHERE `Parent` IS NULL ORDER BY Ordering ASC";
    $aRows = mysqli_query($con, $aQuery);
    $EstateAmountTotal = 0;
    $EstateAmountTotal2 = 0;
    while ($aRow = mysqli_fetch_object($aRows)) {
        echo "<tr>\n";
        echo "<td style=\"padding:8px;font-weight:bold;background-color:#FFE8AE\">$aRow->Item</td>\n";
        if ($aRow->ID == 1) {
            $jaga = new user('matang_penjagaan', $matang);
            $EstateAmount = ($jaga->total_b / $jumlah_luas_2);
            // $EstateAmount = (null);
            $EstateAmount2 = $EstateAmount/$jumlah_bts;
            $EstateAmountTotal += $EstateAmount;
            $EstateAmountTotal2 += $EstateAmount2;
        } else if ($aRow->ID == 3) {
            $tuai = new user('matang_penuaian', $matang);
            $EstateAmount = ($tuai->total_b / $jumlah_luas_2);
            // $EstateAmount = (null);
            $EstateAmount2 = $EstateAmount / $jumlah_bts;
            $EstateAmountTotal += $EstateAmount;
            $EstateAmountTotal2 += $EstateAmount2;
        } else if ($aRow->ID == 4) {
            $angkut = new user('matang_pengangkutan', $matang);
            $EstateAmount = ($angkut->total_b / $jumlah_luas_2);
            // $EstateAmount = (null);
            $EstateAmount2 = $EstateAmount / $jumlah_bts;
            $EstateAmountTotal += $EstateAmount;
            $EstateAmountTotal2 += $EstateAmount2;
        } else if ($aRow->ID == 5) {
            $belanja = new user('belanja_am', $matang);
            $EstateAmount = ($belanja->total_perbelanjaan / $jumlah_luas_2)  ;

            // $EstateAmount = (null);
            $EstateAmount2 = $EstateAmount / $jumlah_bts;
            $EstateAmountTotal += $EstateAmount;
            $EstateAmountTotal2 += $EstateAmount2;
        } else if ($aRow->ID == 6) {
            $EstateAmount = $EstateAmountTotal;
            $EstateAmount2 = $EstateAmountTotal2;
        }


        $bQuery = "SELECT MalaysiaAmount, PMalaysiaAmount, SabahAmount, SarawakAmount, MalaysiaAmount2, PMalaysiaAmount2, "
                . "SabahAmount2, SarawakAmount2 "
                . "FROM tblasmcostsummarydetail WHERE Item = $aRow->ID AND `Year` = '" . ($_SESSION['tahun'] - 1) . "'; ";
        //echo $bQuery."<br>"
        $bRows = mysqli_query($con, $bQuery);
        if (mysqli_num_rows($bRows) == 0) {
            echo "<td style=\"padding:3px;text-align:right; background-color:#FFFF00\">" . number_format($EstateAmount, 2, ".", ",") . "</td>\n";
            echo "<td style=\"padding:3px;text-align:right; background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
            if ($isPMalaysia == 1) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
            }
            if ($isPMalaysia == 2) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
            }
            if ($isPMalaysia == 3) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
            }
            echo "<td style=\"padding:3px;text-align:right;background-color:#FFFF00\">" . number_format($EstateAmount2, 2, ".", ",") . "</td>\n";
            echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
            if ($isPMalaysia == 1) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
            }
            if ($isPMalaysia == 2) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
            }
            if ($isPMalaysia == 3) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
            }
        } else {
            $bRow = mysqli_fetch_object($bRows);
            //$bRow = mysqli_fetch_array($bRows)
            //echo "xx".$bRow->MalaysiaAmount
            echo "<td style=\"padding:3px;text-align:right;background-color:#FFFF00\">" . number_format( $Display ? 0 :$EstateAmount, 2, ".", ",") . "</td>\n";
            echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($bRow->MalaysiaAmount, 2) . "</td>\n";
            if ($isPMalaysia == 1) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($bRow->PMalaysiaAmount, 2) . "</td>\n";
            }
            if ($isPMalaysia == 2) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($bRow->SabahAmount, 2) . "</td>\n";
            }
            if ($isPMalaysia == 3) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($bRow->SarawakAmount, 2) . "</td>\n";
            }
            echo "<td style=\"padding:3px;text-align:right;background-color:#FFFF00\">" . number_format($Display ? 0 :$EstateAmount2, 2, ".", ",") . "</td>\n";
            echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($bRow->MalaysiaAmount2, 2) . "</td>\n";
            if ($isPMalaysia == 1) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($bRow->PMalaysiaAmount2, 2) . "</td>\n";
            }
            if ($isPMalaysia == 2) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($bRow->SabahAmount2, 2) . "</td>\n";
            }
            if ($isPMalaysia == 3) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($bRow->SarawakAmount2, 2) . "</td>\n";
            }
        }
        echo "</tr>\n";
        $bQuery = "SELECT ID, Item" . ($_SESSION['lang'] == "mal" ? "My" : "En") . " AS Item FROM tblasmcostsummaryitem WHERE `Parent` IS NOT NULL AND `Parent` = $aRow->ID ORDER BY Ordering ASC";
        $bRows = mysqli_query($con, $bQuery);
        while ($bRow = mysqli_fetch_object($bRows)) {
            echo "<tr>\n";
            echo "<td style=\"padding:3px 3px 3px 15px;font-weight:bold;background-color:#FFE8AE\">- $bRow->Item</td>\n"; //Fertilizing Cost
            $dQuery = "select total_b_3, b_3a, b_3b, b_3c, b_3d from kos_matang_penjagaan where pb_thisyear ='" . ($_SESSION['tahun'] - 1) . "' and lesen ='" . $_SESSION['lesen'] . "' ";
            $dRows = mysqli_query($con, $dQuery);
            $rowjaga = mysqli_fetch_array($dRows);
            $totaljaga = mysqli_num_rows($dRows);
            if ($rowjaga['total_b_3'] == 0) {
                $ftotal = $rowjaga['b_3a'] + $rowjaga['b_3b'] + $rowjaga['b_3c'] + $rowjaga['b_3d'];
            }
            if ($rowjaga['total_b_3'] > 0) {
                $ftotal = $rowjaga['total_b_3'];
            }
            $EstateAmount = ($ftotal / $jumlah_luas_2);
            // $EstateAmount = (null);
            $EstateAmount2 = $EstateAmount / $jumlah_bts;
            $cQuery = "SELECT MalaysiaAmount, PMalaysiaAmount, SabahAmount, SarawakAmount, MalaysiaAmount2, PMalaysiaAmount2, SabahAmount2, SarawakAmount2 FROM tblasmcostsummarydetail WHERE Item = $bRow->ID AND `Year` = '" . ($_SESSION['tahun'] - 1) . "'";
            $cRows = mysqli_query($con, $cQuery);
            if (mysqli_num_rows($cRows) == 0) {
                echo "<td style=\"padding:3px;text-align:right;background-color:#FFFF00\">" . number_format($EstateAmount, 2, ".", ",") . "</td>\n";
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
                if ($isPMalaysia == 1) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
                }
                if ($isPMalaysia == 2) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
                }
                if ($isPMalaysia == 3) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
                }
                echo "<td style=\"padding:3px;text-align:right;background-color:#FFFF00\">" . number_format($EstateAmount2, 2, ".", ",") . "</td>\n";
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
                if ($isPMalaysia == 1) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
                }
                if ($isPMalaysia == 2) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
                }
                if ($isPMalaysia == 3) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format(0, 2, ".", ",") . "</td>\n";
                }
            } else {
                $cRow = mysqli_fetch_object($cRows);
                echo "<td style=\"padding:3px;text-align:right;background-color:#FFFF00\">" . number_format( $Display ? 0 :$EstateAmount, 2, ".", ",") . "</td>\n";
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($Display ? 0 : $cRow->MalaysiaAmount, 2, ".", ",") . "</td>\n";
                if ($isPMalaysia == 1) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($Display ? 0 : $cRow->PMalaysiaAmount, 2, ".", ",") . "</td>\n";
                }
                if ($isPMalaysia == 2) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($Display ? 0 : $cRow->SabahAmount, 2, ".", ",") . "</td>\n";
                }
                if ($isPMalaysia == 3) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($Display ? 0 : $cRow->SarawakAmount, 2, ".", ",") . "</td>\n";
                }
                echo "<td style=\"padding:3px;text-align:right;background-color:#FFFF00\">" . number_format($Display ? 0 :$EstateAmount2, 2, ".", ",") . "</td>\n";
                echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($Display ? 0 : $cRow->MalaysiaAmount2, 2, ".", ",") . "</td>\n";
                if ($isPMalaysia == 1) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($Display ? 0 : $cRow->PMalaysiaAmount2, 2, ".", ",") . "</td>\n";
                }
                if ($isPMalaysia == 2) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($Display ? 0 : $cRow->SabahAmount2, 2, ".", ",") . "</td>\n";
                }
                if ($isPMalaysia == 3) {
                    echo "<td style=\"padding:3px;text-align:right;background-color:#D0FBC6\">" . number_format($Display ? 0 : $cRow->SarawakAmount2, 2, ".", ",") . "</td>\n";
                }
            }
            echo "</tr>\n";
        }
    }
    ?>
        </table>
    </div><br><br>
        <?php } ?>

        <?php
        if (!$Show) {
            /** Bug #11340 Jadual Ringkasan Kos */
            //echo "<div style=\"float:left;width:100%;padding:0px 0px 5px 0px;font-weight:bold;color:#f00;text-align:center\">" . ($_SESSION['lang'] == "mal" ? "Tiada Jadual Perbandingan Kos yang ditetapkan bagi tahun " . ($_SESSION['tahun'] - 1) . ". " : "No Comparison Cost table has been set for year " . ($_SESSION['tahun'] - 1) . ".") . "</div>\n";
        }//jika tiada show display
        ?>
<br>

<br>

<p>&nbsp;</p>
