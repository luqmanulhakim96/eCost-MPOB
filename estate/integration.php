<?php
$con = connect();
$License = $_SESSION['lesen'];
$Year = $_SESSION['tahun'];
$Lang = $_SESSION['lang'] == "mal" ? "My" : "En";
$odd = "cacaff";
$even = "ccff99";
$color = "";
$bullet = "abcdefghijklmnopqrstuvwxyz";

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

if (date('Y') == $_SESSION['tahun']) {
    $table = "esub";
} else {
    $table = "esub_" . $_SESSION['tahun'];
}

$aQuery = "SELECT SUM(es.Keluasan_Yang_Dituai) AS Keluasan_Yang_Dituai " .
        "FROM $table es " .
        "WHERE es.no_lesen_baru = '" . $_SESSION['lesen'] . "'";
$aRows = mysqli_query($con, $aQuery);
if ($aRow = mysqli_fetch_object($aRows)) {
    $Luastuai = $aRow->Keluasan_Yang_Dituai;
}

$ps1 = luas_data("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 1);
$ps2 = luas_data("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 2);
$ps3 = luas_data("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 3);

$pb1 = luas_data("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 1);
$pb2 = luas_data("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 2);
$pb3 = luas_data("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 3);

$pt1 = luas_data("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 1);
$pt2 = luas_data("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 2);
$pt3 = luas_data("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 3);

$jumlah_semua = $Luastuai + $pb1 + $pb2 + $pb3 + $ps1 + $ps2 + $ps3 + $pt1 + $pt2 + $pt3;

if (isset($_POST['Integration'])) {
    $FromEdit = $_POST['FromEdit'];
    $Integration = $_POST['Integration'];
    $AreaEstimation = $_POST['AreaEstimation'];
    $CropItem = $_POST['CropItem'];
    $CropItemTxt = $_POST['CropItemTxt'];
    $CropTotal = $_POST['CropTotal'];
    $CropPercentage = $_POST['CropPercentage'];
    $LivestockItem = $_POST['LivestockItem'];
    $LivestockItemTxt = $_POST['LivestockItemTxt'];
    $LivestockTotal = $_POST['LivestockTotal'];
    $Item1 = $_POST['Item1'];
    $Item2 = $_POST['Item2'];
    $Delete1 = $_POST['Delete1'];
    $Delete2 = $_POST['Delete2'];
    $indicator = $_POST['indicator'];
    if ($indicator == 1 || $indicator == 3) {
        $Proceed = true;
        $TotalCropsArea = 0;
        if ($Integration == 2 || $Integration == 4) {
            $isArea = false;
            for ($i = 1; $i <= 4; $i++) {
                if ($CropTotal[$i - 1] != "") {
                    $isArea = true;
                    $TotalCropsArea += $CropTotal[$i - 1];
                }
            }
            for ($i = 5; $i <= $Item1; $i++) {
                if ($CropItemTxt[$i - 1] == "" && $CropTotal[$i - 1] != "") {
                    $message = $_SESSION['lang'] == "mal" ? "Sila masukkan nama tanaman untuk tanaman 5(" . substr($bullet, $i - 5, 1) . ")" : "please insert crop name for crop 5(" . substr($bullet, $i - 5, 1) . ")";
                    $Proceed = false;
                    break;
                } else if ($CropItemTxt[$i - 1] != "" && $CropTotal[$i - 1] == "") {
                    $message = $_SESSION['lang'] == "mal" ? "Sila masukkan anggaran keluasan untuk tanaman 5(" . substr($bullet, $i - 5, 1) . ")" : "please insert estimated area for crop 5(" . substr($bullet, $i - 5, 1) . ")";
                    $Proceed = false;
                    break;
                } else if ($CropItemTxt[$i - 1] != "" && $CropTotal[$i - 1] != "") {
                    $TotalCropsArea += $CropTotal[$i - 1];
                }
            }
            if ($Proceed && !$isArea) {
                $message = $_SESSION['lang'] == "mal" ? "Sila masukkan anggaran keluasan untuk salah satu tanaman" : "Please insert estimated area at least for one crop";
                $Proceed = false;
            }
            if ($Proceed && $TotalCropsArea > $jumlah_semua) {
                $message = $_SESSION['lang'] == "mal" ? "Jumlah keseluruhan anggaran keluasan integrasi tanaman mestilah kurang daripada $jumlah_semua" : "Total os estimated area for crops integration must be less than $jumlah_semua";
                $Proceed = false;
            }
        }

        if ($Proceed && ($Integration == 3 || $Integration == 4)) {
            $isTotal = false;
            for ($i = 1; $i <= 4; $i++) {
                if ($LivestockTotal[$i - 1] != "") {
                    $isTotal = true;
                    break;
                }
            }
            for ($i = 5; $i <= $Item1; $i++) {
                if (($LivestockItemTxt[$i - 1] == "" && $LivestockTotal[$i - 1] == "") || ($LivestockItemTxt[$i - 1] == "" && $LivestockTotal[$i - 1] != "0")) {
                    $message = $_SESSION['lang'] == "mal" ? "Sila masukkan nama ternakan untuk ternakan 5(" . substr($bullet, $i - 5, 1) . ")" : "please insert livestock name for livestock 5(" . substr($bullet, $i - 5, 1) . ")";
                    $Proceed = false;
                    break;
                } else if ($LivestockItemTxt[$i - 1] != "" && $LivestockTotal[$i - 1] == "") {
                    $message = $_SESSION['lang'] == "mal" ? "Sila masukkan bilangan untuk ternakan 5(" . substr($bullet, $i - 5, 1) . ")" : "please insert number for livestock 5(" . substr($bullet, $i - 5, 1) . ")";
                    $Proceed = false;
                    break;
                }
            }
            if ($Proceed && !$isTotal) {
                $message = $_SESSION['lang'] == "mal" ? "Sila masukkan bilangan untuk salah satu ternakan" : "Please insert number at least for one livestock";
                $Proceed = false;
            }
        }

        if ($Proceed && ($Integration == 3 || $Integration == 4) && $AreaEstimation == "") {
            $message = $_SESSION['lang'] == "mal" ? "Sila masukkan anggaran keluasan untuk ternakan" : "Please insert estimated area for livestock";
            $Proceed = false;
        }

        if ($Proceed && ($Integration == 3 || $Integration == 4) && $AreaEstimation > $jumlah_semua) {
            $message = $_SESSION['lang'] == "mal" ? "Jumlah keseluruhan anggaran keluasan integrasi ternakan mestilah kurang daripada $jumlah_semua" : "Total os estimated area for livestock integration must be less than $jumlah_semua";
            $Proceed = false;
        }

        /** if ($Proceed && ($Integration == 3 || $Integration == 4) && ($AreaEstimation + $TotalCropsArea) > $jumlah_semua) {
         * $message = $_SESSION['lang'] == "mal" ? "Jumlah keseluruhan anggaran keluasan integrasi tanaman dan ternakan mestilah kurang daripada $jumlah_semua" : "Total os estimated area for crops and livestock integration must be less than $jumlah_semua";
         * $Proceed = false;
         * } */
        if ($Proceed) {
            if ($Integration == 1) {
                $AreaEstimation = "";
            }
            $aQuery = "SELECT Integration, AreaEstimation " .
                    "FROM tblasmintegrationestate " .
                    "WHERE License = '$License' AND `Year` = '$Year'";
            $aRows = mysqli_query($con, $aQuery);
            if (mysqli_num_rows($aRows) == 0) {
                $aQuery = "INSERT INTO tblasmintegrationestate (License, `Year`, Integration, AreaEstimation) " .
                        "VALUES ('$License', '$Year', $Integration, " . (strcmp($AreaEstimation, "") == 0 ? "NULL" : $AreaEstimation) . ")";
                mysqli_query($con, $aQuery);
                $FromEdit = 1;
            } else {
                $aQuery = "UPDATE tblasmintegrationestate " .
                        "SET Integration = $Integration, AreaEstimation = " . (strcmp($AreaEstimation, "") == 0 ? "NULL" : $AreaEstimation) . " " .
                        "WHERE License = '$License' AND `Year` = '$Year'";
                mysqli_query($con, $aQuery);
            }
            if ($Integration == 2 || $Integration == 4) {
                for ($i = 1; $i <= $Item1; $i++) {
                    $aQuery = "SELECT Ordering " .
                            "FROM tblasmintegrationdetail " .
                            "WHERE License = '$License' AND `Year` = '$Year' AND Category = 1 AND Ordering = $i";
                    $aRows = mysqli_query($con, $aQuery);
                    if (mysqli_num_rows($aRows) == 0) {
                        $aQuery = "INSERT INTO tblasmintegrationdetail (License, `Year`, Item, Category, ItemManual, Total, Percentage, Ordering) " .
                                "VALUES ('$License', '$Year', " . (strcmp($CropItem[$i - 1], "") == 0 ? "NULL" : $CropItem[$i - 1]) . ", 1, " . (strcmp($CropItem[$i - 1], "") == 0 ? "'" .
                                mysqli_real_escape_string($con, $CropItemTxt[$i - 1]) . "'" : "NULL") . ", " .
                                (strcmp($CropTotal[$i - 1], "") == 0 ? "NULL" : $CropTotal[$i - 1]) . ", " . (strcmp($CropPercentage[$i - 1], "") == 0 ? "NULL" : $CropPercentage[$i - 1]) . ", $i)";
                        mysqli_query($con, $aQuery);
                    } else {
                        $aQuery = "UPDATE tblasmintegrationdetail " .
                                "SET Item = " . (strcmp($CropItem[$i - 1], "") == 0 ? "NULL" : $CropItem[$i - 1]) . ", " .
                                "ItemManual = " . (strcmp($CropItem[$i - 1], "") == 0 ? "'" . mysqli_real_escape_string($con, $CropItemTxt[$i - 1]) . "'" : "NULL") . ", " .
                                "Total = " . (strcmp($CropTotal[$i - 1], "") == 0 ? "NULL" : $CropTotal[$i - 1]) . ", " .
                                "Percentage = " . (strcmp($CropPercentage[$i - 1], "") == 0 ? "NULL" : $CropPercentage[$i - 1]) . " " .
                                "WHERE License = '$License' AND `Year` = '$Year' AND Category = 1 AND Ordering = $i";
                        mysqli_query($con, $aQuery);
                    }
                }
                $aQuery = "DELETE FROM tblasmintegrationdetail WHERE License = '$License' AND `Year` = '$Year' AND Category = 1 AND Ordering > $Item1";
                mysqli_query($con, $aQuery);
            }
            if ($Integration == 3 || $Integration == 4) {
                for ($i = 1; $i <= $Item2; $i++) {
                    $aQuery = "SELECT Ordering " .
                            "FROM tblasmintegrationdetail " .
                            "WHERE License = '$License' AND `Year` = '$Year' AND Category = 2 AND Ordering = $i";
                    $aRows = mysqli_query($con, $aQuery);
                    if (mysqli_num_rows($aRows) == 0) {
                        $aQuery = "INSERT INTO tblasmintegrationdetail (License, `Year`, Item, Category, ItemManual, Total, Percentage, Ordering) " .
                                "VALUES ('$License', '$Year', " . (strcmp($LivestockItem[$i - 1], "") == 0 ? "NULL" : $LivestockItem[$i - 1]) . ", 2, " . (strcmp($LivestockItem[$i - 1], "") == 0 ? "'" .
                                mysqli_real_escape_string($con, $LivestockItemTxt[$i - 1]) . "'" : "NULL") . ", " .
                                (strcmp($LivestockTotal[$i - 1], "") == 0 ? "NULL" : $LivestockTotal[$i - 1]) . ", NULL, $i)";
                        mysqli_query($con, $aQuery);
                    } else {
                        $aQuery = "UPDATE tblasmintegrationdetail " .
                                "SET Item = " . (strcmp($LivestockItem[$i - 1], "") == 0 ? "NULL" : $LivestockItem[$i - 1]) . ", " .
                                "ItemManual = " . (strcmp($LivestockItem[$i - 1], "") == 0 ? "'" . mysqli_real_escape_string($con, $LivestockItemTxt[$i - 1]) . "'" : "NULL") . ", " .
                                "Total = " . (strcmp($LivestockTotal[$i - 1], "") == 0 ? "NULL" : $LivestockTotal[$i - 1]) . ", " .
                                "Percentage = NULL " .
                                "WHERE License = '$License' AND `Year` = '$Year' AND Category = 2 AND Ordering = $i";
                        mysqli_query($con, $aQuery);
                    }
                }
                $aQuery = "DELETE FROM tblasmintegrationdetail WHERE License = '$License' AND `Year` = '$Year' AND Category = 2 AND Ordering > $Item2";
                mysqli_query($con, $aQuery);
            }
            if ($Integration == 1) {
                $aQuery = "DELETE FROM tblasmintegrationdetail WHERE License = '$License' AND `Year` = '$Year'";
                mysqli_query($con, $aQuery);

                $Item1 = 6;
                $Item2 = 6;
                $AreaEstimation = "";

                for ($i = 1; $i <= $Item1; $i++) {
                    if ($i > 4) {
                        $CropItem[$i - 1] = "";
                        $CropItemTxt[$i - 1] = "";
                    }
                    $CropTotal[$i - 1] = "";
                    $CropPercentage[$i - 1] = "";
                }

                for ($i = 1; $i <= $Item2; $i++) {
                    if ($i > 4) {
                        $LivestockItem[$i - 1] = "";
                        $LivestockItemTxt[$i - 1] = "";
                    }
                    $LivestockTotal[$i - 1] = "";
                }
            }
            $isSaved = true;

            if ($indicator == 3) {
                $Table = array(array('GET' => "Penanaman Semula", 'Table' => array("tanam_semula" . (substr(($Year - 3), 2, 2)), "tanam_semula" . (substr(($Year - 2), 2, 2)), "tanam_semula" . (substr(($Year - 1), 2, 2)))),
                    array('GET' => "Penanaman Baru", 'Table' => array("tanam_baru" . (substr(($Year - 3), 2, 2)), "tanam_baru" . (substr(($Year - 2), 2, 2)), "tanam_baru" . (substr(($Year - 1), 2, 2)))),
                    array('GET' => "Penukaran", 'Table' => array("tanam_tukar" . (substr(($Year - 3), 2, 2)), "tanam_semula" . (substr(($Year - 2), 2, 2)), "tanam_tukar" . (substr(($Year - 1), 2, 2)))));
                $isExists = false;
                foreach ($Table as $t) {
                    for ($i = 0; $i < 3; $i++) {
                        $aQuery = "SELECT * FROM " . $t['Table'][$i] . " WHERE lesen = '$License'";
                        $aRows = mysqli_query($con, $aQuery);
                        if (mysqli_num_rows($aRows) != 0) {
                            echo "<script language=\"javascript\">window.location.href=\"?id=belum_matang&year=" . ($i + 1) . "&t=" . $t['GET'] . "\";</script>\n";
                            $isExists = true;
                            break;
                        }
                    }
                    if ($isExists) {
                        break;
                    }
                }
                if (!$isExists) {
                    echo "<script language=\"javascript\">window.location.href=\"?id=matang&penjagaan\";</script>\n";
                }
            }
        }
    } else if (!empty($Delete1)) {
        for ($i = $Delete1; $i <= $Item1; $i++) {
            $CropItem[$i - 1] = $CropItem[$i];
            $CropItemTxt[$i - 1] = $CropItemTxt[$i];
            $CropTotal[$i - 1] = $CropTotal[$i];
            $CropPercentage[$i - 1] = $CropPercentage[$i];
        }
        array_pop($CropItem);
        array_pop($CropItemTxt);
        array_pop($CropTotal);
        array_pop($CropPercentage);
    } else if (!empty($Delete2)) {
        for ($i = $Delete2; $i <= $Item2; $i++) {
            $LivestockItem[$i - 1] = $LivestockItem[$i];
            $LivestockItemTxt[$i - 1] = $LivestockItemTxt[$i];
            $LivestockTotal[$i - 1] = $LivestockTotal[$i];
        }
        array_pop($LivestockItem);
        array_pop($LivestockItemTxt);
        array_pop($LivestockTotal);
    }
} else {
    $aQuery = "SELECT Integration, AreaEstimation " .
            "FROM tblasmintegrationestate " .
            "WHERE License = '$License' AND `Year` = '$Year'";
    $aRows = mysqli_query($con, $aQuery);
    if (mysqli_num_rows($aRows) == 0) {
        $Integration = 1;
        $aQuery = "SELECT ID, Item$Lang AS ItemTxt FROM tblasmintegrationitems WHERE Category = 1 ORDER BY ID ASC";
        $aRows = mysqli_query($con, $aQuery);
        $Item1 = 1;
        $CropItem = array();
        $CropItemTxt = array();
        $CropTotal = array();
        $CropPercentage = array();
        while ($aRow = mysqli_fetch_object($aRows)) {
            array_push($CropItem, $aRow->ID);
            array_push($CropItemTxt, $aRow->ItemTxt);
            array_push($CropTotal, "");
            array_push($CropPercentage, "");
            $Item1++;
        }

        $aQuery = "SELECT ID, Item$Lang AS ItemTxt FROM tblasmintegrationitems WHERE Category = 2 ORDER BY ID ASC";
        $aRows = mysqli_query($con, $aQuery);
        $Item2 = 1;
        $LivestockItem = array();
        $LivestockItemTxt = array();
        $LivestockTotal = array();
        while ($aRow = mysqli_fetch_object($aRows)) {
            array_push($LivestockItem, $aRow->ID);
            array_push($LivestockItemTxt, $aRow->ItemTxt);
            array_push($LivestockTotal, "");
            $Item2++;
        }
    } else {
        $aRow = mysqli_fetch_object($aRows);
        $Integration = $aRow->Integration;
        $AreaEstimation = $aRow->AreaEstimation;

        $aQuery = "SELECT t1.Item, t1.Total, t1.Percentage, t1.Ordering, IFNULL(t2.Item$Lang, t1.ItemManual) AS ItemTxt " .
                "FROM tblasmintegrationdetail AS t1 " .
                "LEFT JOIN tblasmintegrationitems AS t2 ON t2.ID = t1.Item " .
                "WHERE t1.License = '$License' AND t1.`Year` = '$Year' AND t1.Category = 1 " .
                "ORDER BY t1.Ordering ASC";
        $aRows = mysqli_query($con, $aQuery);
        $Item1 = 0;
        $CropItem = array();
        $CropItemTxt = array();
        $CropTotal = array();
        $CropPercentage = array();
        while ($aRow = mysqli_fetch_object($aRows)) {
            array_push($CropItem, $aRow->Item);
            array_push($CropItemTxt, $aRow->ItemTxt);
            array_push($CropTotal, $aRow->Total);
            array_push($CropPercentage, $aRow->Percentage);
            $Item1++;
        }
        if ($Item1 == 0) {
            $aQuery = "SELECT ID, Item$Lang AS ItemTxt FROM tblasmintegrationitems WHERE Category = 1 ORDER BY ID ASC";
            $aRows = mysqli_query($con, $aQuery);
            while ($aRow = mysqli_fetch_object($aRows)) {
                array_push($CropItem, $aRow->ID);
                array_push($CropItemTxt, $aRow->ItemTxt);
                array_push($CropTotal, "");
                array_push($CropPercentage, "");
                $Item1++;
            }
        }
        if ($Item1 < 5) {
            $Item1 = 5;
        }


        $aQuery = "SELECT t1.Item, t1.Total, t1.Ordering, IFNULL(t2.Item$Lang, t1.ItemManual) AS ItemTxt " .
                "FROM tblasmintegrationdetail AS t1 " .
                "LEFT JOIN tblasmintegrationitems AS t2 ON t2.ID = t1.Item " .
                "WHERE t1.License = '$License' AND t1.`Year` = '$Year' AND t1.Category = 2 " .
                "ORDER BY t1.Ordering ASC";
        $aRows = mysqli_query($con, $aQuery);
        $Item2 = 0;
        $LivestockItem = array();
        $LivestockItemTxt = array();
        $LivestockTotal = array();
        while ($aRow = mysqli_fetch_object($aRows)) {
            array_push($LivestockItem, $aRow->Item);
            array_push($LivestockItemTxt, $aRow->ItemTxt);
            array_push($LivestockTotal, $aRow->Total);
            $Item2++;
        }
        if ($Item2 == 0) {
            $aQuery = "SELECT ID, Item$Lang AS ItemTxt FROM tblasmintegrationitems WHERE Category = 2 ORDER BY ID ASC";
            $aRows = mysqli_query($con, $aQuery);
            while ($aRow = mysqli_fetch_object($aRows)) {
                array_push($LivestockItem, $aRow->ID);
                array_push($LivestockItemTxt, $aRow->ItemTxt);
                array_push($LivestockTotal, "");
                $Item2++;
            }
        }
        if ($Item2 < 5) {
            $Item2 = 5;
        }
        $FromEdit = 0;
    }
}
?>
<form name="frm-integration" id="frm-integration" method="post" action="">
    <input type="hidden" name="FromEdit" id="FromEdit" value="<?php echo $FromEdit; ?>" />
    <table width="100%" border="0" aria-describedby="integration">
        <tr><td style="padding:10px;font-weight:bold"><?php echo $_SESSION['lang'] == "mal" ? "AKTIVITI INTEGRASI TANAMAN DAN TERNAKAN" : "CROPS AND LIVESTOCK INTEGRATION ACTIVITIES"; ?></td></tr>
        <?php if (!empty($message)) { ?><tr><td style="padding:10px 10px 0px 10px;color:#f00"><?php echo $message; ?></td></tr><?php } ?>
        <tr><td style="padding:20px 10px 10px 10px;font-weight:bold"><?php echo $_SESSION['lang'] == "mal" ? "Status integrasi tanaman dan ternakan di estet" : "Status of crops and livestock integration in estate"; ?></td></tr>
        <tr>
            <td>
                <table width="100%" border="0" aria-describedby="integration2">
                    <?php
                    $aQuery = "SELECT ID, Type$Lang AS Type FROM tblasmintegrationtype ORDER BY ID ASC";
                    $aRows = mysqli_query($con, $aQuery);
                    while ($aRow = mysqli_fetch_object($aRows)) {
                        echo "<tr>\n" .
                        "<td width=\"20\"><input type=\"radio\" name=\"Integration\" id=\"Integration$aRow->ID\" class=\"Integration\" value=\"$aRow->ID\"" . (((empty($Integration) && $aRow->ID == 1) || $Integration == $aRow->ID) ? " checked=\"checked\"" : "") . " /></td>\n" .
                        "<td style=\"padding:3px\">$aRow->Type</td>\n" .
                        "</tr>\n";
                    }
                    ?>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div id="container-crops" style="width:100%<?php
                if ($Integration == 1 || $Integration == 3) {
                    echo ";display:none";
                }
                ?>">
                    <table width="600" aria-describedby="integration3">
                        <tr>
                            <td style="padding:20px 10px 10px 10px;font-weight:bold">
                                <div id="lbl-crops" style="float:left;width:100%;padding-bottom:5px<?php
                                if ($Integration != 4) {
                                    echo ";display:none";
                                }
                                ?>"><?php echo $_SESSION['lang'] == "mal" ? "Tanaman" : "Crops"; ?></div>
                                     <?php echo $_SESSION['lang'] == "mal" ? "Jenis dan keluasan tanaman yang diintegrasikan." : "Type and area of the integrated crops."; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px 10px 0px 10px">
                                <div style="float:left;width:100%;padding:5px;background:#99ff99;border:1px solid #000;font-weight:bold">
                                    <div style="float:left;width:70%"><?php echo $_SESSION['lang'] == "mal" ? "Jumlah Keluasan Tanaman Estet" : "Total oil palm planted area"; ?></div>
                                    <div style="float:left;width:30%"><?php echo number_format($jumlah_semua, 2, ".", ","); ?><?php echo $_SESSION['lang'] == "mal" ? " Hektar" : " Hectares"; ?></div>
                                </div>
                            </td>
                        </tr>
                        <?php for ($i = 1; $i <= $Item1; $i++) { ?>
                            <?php
                            $color = $color != $odd ? $odd : $even;
                            ?>
                            <input type="hidden" name="CropItem[]" id="CropItem<?php echo $i; ?>" value="<?php echo $CropItem[$i - 1]; ?>" />
                            <input type="hidden" name="CropPercentage[]" id="CropPercentage<?php echo $i; ?>" value="<?php echo $CropPercentage[$i - 1]; ?>" />
                            <tr>
                                <td style="padding:1px 8px 0px 10px">
                                    <?php if ($i == 5) { ?>
                                        <div style="float:left;padding:5px;width:100%;background:#ffcccc;margin-bottom:1px">
                                            <div style="float:left;width:100%">
                                                <div style="float:left;width:20px"><?php echo $i; ?>.</div>
                                                <div style="float:left"><?php echo $_SESSION['lang'] == "mal" ? "Tanaman lain sekiranya ada. (cth: Jagung, Tebu dan lain-lain). TIDAK Termasuk Tanaman Sawit" : "Other crops (e.g.: Corn, Sugarcane etc). NOT Oil Palm"; ?></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div style="float:left;padding:5px;width:100%;background:#<?php echo $color; ?>">
                                        <div style="float:left;width:100%">
                                            <?php if ($i > 4) { ?>
                                                <div style="float:left;width:20px;padding-left:10px"><?php echo substr($bullet, $i - 5, 1); ?>.</div>
                                            <?php } else { ?>
                                                <div style="float:left;width:20px"><?php echo $i; ?>.</div>
                                            <?php } ?>
                                            <div style="float:left">
                                                <?php
                                                if (empty($CropItem[$i - 1])) {
                                                    echo "<input type=\"text\" name=\"CropItemTxt[]\" id=\"CropItemTxt$i\" value=\"" . $CropItemTxt[$i - 1] . "\" size=\"30\" />\n";
                                                } else {
                                                    echo $CropItemTxt[$i - 1];
                                                    echo "<input type=\"hidden\" name=\"CropItemTxt[]\" id=\"CropItemTxt$i\" value=\"" . $CropItemTxt[$i - 1] . "\" />\n";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div style="float:left;width:100%;padding-top:3px">
                                            <div style="float:left;width:<?php echo $i > 4 ? "30" : "20"; ?>px">&nbsp;</div>
                                            <div style="float:left;width:470px">
                                                <div style="float:left;width:130px;padding-top:3px"><?php echo $_SESSION['lang'] == "mal" ? "Anggaran keluasan" : "Estimated area"; ?></div>
                                                <div style="float:left;width:10px;padding-top:3px">:</div>
                                                <div style="float:left;padding-right:3px"><input type="text" name="CropTotal[]" id="CropTotal<?php echo $i; ?>" class="DecimalOnly CropTotal" style="text-align:right" value="<?php
                                                    if ($CropTotal[$i - 1] == "") {
                                                        echo 0;
                                                    } else {
                                                        echo $CropTotal[$i - 1];
                                                    }
                                                    ?>" size="10" /></div>
                                                <div style="float:left;padding:3px 10px 0px 0px"><?php echo $_SESSION['lang'] == "mal" ? "(Hektar)" : "(Hectares)"; ?></div>
                                                <div id="percentage<?php echo $i; ?>" style="float:left;padding-top:3px"><?php echo strcmp($CropPercentage[$i - 1], "") == 0 ? "" : $CropPercentage[$i - 1] . "%"; ?></div>
                                            </div>
                                            <div style="float:left">
    <?php if ($i > 5) { ?><span id="btnDelCrop<?php echo $i; ?>" class="btnDelCrop" style="color:#00f;cursor:pointer">[ <?php echo $_SESSION['lang'] == "mal" ? "Padam" : "Delete"; ?> ]</span><?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
<?php } ?>
                        <tr>
                            <td style="padding:1px 8px 0px 10px">
                                <input type="button" name="btnAddCrop" id="btnAddCrop" class="btnAddCrop" value="<?php echo $_SESSION['lang'] == "mal" ? "Tambah" : "Add"; ?>" />
                            </td>
                        </tr>
                    </table>
                </div>
                <?php $color = ""; ?>
                <div id="container-livestock" style="width:100%<?php
                if ($Integration == 1 || $Integration == 2) {
                    echo ";display:none";
                }
                ?>">
                    <table width="600" aria-describedby="integration4">
                        <tr>
                            <td style="padding:20px 10px 10px 10px;font-weight:bold">
                                <div id="lbl-livestock" style="float:left;width:100%;padding:15px 0px 5px 0px<?php
                                if ($Integration != 4) {
                                    echo ";display:none";
                                }
                                ?>"><?php echo $_SESSION['lang'] == "mal" ? "Ternakan" : "Livestock"; ?></div>
                        <?php echo $_SESSION['lang'] == "mal" ? "Jenis dan bilangan ternakan yang diintegrasikan." : "Type and number of integrated livestock"; ?>
                            </td>
                        </tr>
                        <?php for ($i = 1; $i <= $Item2; $i++) { ?>
                            <?php
                            $color = $color != $odd ? $odd : $even;
                            ?>
                            <input type="hidden" name="LivestockItem[]" id="LivestockItem<?php echo $i; ?>" value="<?php echo $LivestockItem[$i - 1]; ?>" />
                            <tr>
                                <td style="padding:1px 8px 0px 10px">
    <?php if ($i == 5) { ?>
                                        <div style="float:left;padding:5px;width:100%;background:#ffcccc;margin-bottom:1px">
                                            <div style="float:left;width:100%">
                                                <div style="float:left;width:20px"><?php echo $i; ?>.</div>
                                                <div style="float:left"><?php echo $_SESSION['lang'] == "mal" ? "Ternakan lain sekiranya ada. (cth: Rusa, Ayam dan lain-lain)" : "Other livestock (e.g.: deer, chicken etc)"; ?></div>
                                            </div>
                                        </div>
                                            <?php } ?>
                                    <div style="float:left;width:100%;padding:5px;background:#<?php echo $color; ?>">
                                        <div style="float:left;width:100%">
                                            <?php if ($i > 4) { ?>
                                                <div style="float:left;width:20px;padding-left:10px"><?php echo substr($bullet, $i - 5, 1); ?>.</div>
                                            <?php } else { ?>
                                                <div style="float:left;width:20px"><?php echo $i; ?>.</div>
                                                <?php } ?>
                                            <div style="float:left">
                                                <?php
                                                if (empty($LivestockItem[$i - 1])) {
                                                    echo "<input type=\"text\" name=\"LivestockItemTxt[]\" id=\"LivestockItemTxt$i\" value=\"" . $LivestockItemTxt[$i - 1] . "\" size=\"30\" />\n";
                                                } else {
                                                    echo $LivestockItemTxt[$i - 1];
                                                    echo "<input type=\"hidden\" name=\"LivestockItemTxt[]\" id=\"LivestockItemTxt$i\" value=\"" . $LivestockItemTxt[$i - 1] . "\" />\n";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div style="float:left;width:100%;padding-top:3px">
                                            <div style="float:left;width:<?php echo $i > 4 ? "30" : "20"; ?>px">&nbsp;</div>
                                            <div style="float:left;width:470px">
                                                <div style="float:left;width:80px;padding-top:3px"><?php echo $_SESSION['lang'] == "mal" ? "Bilangan" : "Number"; ?></div>
                                                <div style="float:left;width:10px;padding-top:3px">:</div>
                                                <div style="float:left;padding-right:3px"><input type="text" name="LivestockTotal[]" id="LivestockTotal<?php echo $i; ?>" class="NumberOnly" style="text-align:right" value="<?php
                                                    if ($LivestockTotal[$i - 1] == "") {
                                                        echo 0;
                                                    } else {
                                                        echo $LivestockTotal[$i - 1];
                                                    }
                                                    ?>" size="10" /></div>
                                                <div style="float:left;padding:3px 10px 0px 0px"><?php echo $_SESSION['lang'] == "mal" ? "(Ekor)" : "(Heads)"; ?></div>
                                            </div>
                                            <div style="float:left">
    <?php if ($i > 5) { ?><span id="btnDelLiveStock<?php echo $i; ?>" class="btnDelLiveStock" style="color:#00f;cursor:pointer">[ <?php echo $_SESSION['lang'] == "mal" ? "Padam" : "Delete"; ?> ]</span><?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
<?php } ?>
                        <tr>
                            <td style="padding:1px 8px 0px 10px">
                                <input type="button" name="btnAddLiveStock" id="btnAddLiveStock" class="btnAddLiveStock" value="<?php echo $_SESSION['lang'] == "mal" ? "Tambah" : "Add"; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:1px 10px 5px 10px">
                                <div style="float:left;padding:5px;width:100%;background:#ffffcc">
                                    <div style="float:left;width:100%"><?php echo $_SESSION['lang'] == "mal" ? "<strong>Anggaran jumlah keluasan kawasan ragutan untuk semua ternakan.</strong> (Sila abaikan sekiranya tiada)" : "<strong>Estimated total grazed area.</strong> (Please ignore if it is not relevant)"; ?></div>

                                    <div style="float:left;padding-right:3px"><input type="text" name="AreaEstimation" id="AreaEstimation" class="DecimalOnly AreaEstimation" style="text-align:right" value="<?php echo $AreaEstimation; ?>" size="10" /></div>
                                    <div style="float:left;padding:3px 10px 0px 0px"><?php echo $_SESSION['lang'] == "mal" ? "(Hektar)" : "(Hectares)"; ?></div>
                                    <div id="percentageLivestock" style="float:left;padding-top:3px"><?php echo strcmp($AreaEstimation, "") == 0 ? "0.0%" : round($AreaEstimation / $jumlah_semua * 100, 2) . "%"; ?></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="container-crops" style="width:600px;padding:20px 10px 10px 10px;text-align:center">
                    <input type="hidden" name="Item1" id="Item1" value="<?php echo $Item1; ?>" />
                    <input type="hidden" name="Item2" id="Item2" value="<?php echo $Item2; ?>" />
                    <input type="hidden" name="Delete1" id="Delete1" />
                    <input type="hidden" name="Delete2" id="Delete2" />
                    <input type="hidden" name="indicator" id="indicator" value="1" />
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="<?php echo $_SESSION['lang'] == "mal" ? "Simpan" : "Save"; ?>"<?php
                           if ($Integration == 1) {
                               echo " style=\"display:none\"";
                           }
?> />
                    <input type="button" name="btnsubmit2" id="btnsubmit2" value="<?php echo $_SESSION['lang'] == "mal" ? "Simpan & Seterusnya" : "Save & Next"; ?>" />
                    <input type="button" name="btnback" id="btnback" value="<?php echo $_SESSION['lang'] == "mal" ? "Kembali" : "Back"; ?>" onclick="window.history.go(-1)" />
                </div>
            </td>
        </tr>
    </table>
</div>
</form>
<script language="javascript">
    $(function () {
        $(".Integration").click(function () {
            if ($(this).is(':checked')) {
                var id = $(this).attr("id").substr(11);
                $(".Integration").each(function (i, e) {
                    var cid = $(this).attr("id").substr(11);
                    if (cid != id)
                        $(this).removeAttr("checked");
                });
                if (parseInt(id) == 1) {
                    $("#btnsubmit").hide();
                    $("#container-crops").hide();
                    $("#container-livestock").hide();
                    $("#lbl-crops").hide();
                    $("#lbl-livestock").hide();
                } else if (parseInt(id) == 2) {
                    $("#btnsubmit").show();
                    $("#container-crops").show();
                    $("#container-livestock").hide();
                    $("#lbl-crops").hide();
                    $("#lbl-livestock").hide();
                } else if (parseInt(id) == 3) {
                    $("#btnsubmit").show();
                    $("#container-crops").hide();
                    $("#container-livestock").show();
                    $("#lbl-crops").hide();
                    $("#lbl-livestock").hide();
                } else {
                    $("#btnsubmit").show();
                    $("#container-crops").show();
                    $("#container-livestock").show();
                    $("#lbl-crops").show();
                    $("#lbl-livestock").show();
                }
            } else {
                $("#Integration1").attr("checked", true);
                $("#container-crops").hide();
                $("#container-livestock").hide();
            }
        });

        $(".CropTotal").keyup(function (e) {
<?php if ($jumlah_semua > 0) { ?>
                var id = $(this).attr("id").substring(9);
                if ($(this).val() == "") {
                    $("#percentage" + id).html("");
                    $("#CropPercentage" + id).val("");
                } else {
                    if (parseFloat($(this).val()) > <?php echo $jumlah_semua; ?>) {
                        alert("<?php echo $_SESSION['lang'] == "mal" ? "Jumlah anggaran keluasan integrasi mestilah tidak melebihi jumlah keluasan tanaman sawit (" . number_format($jumlah_semua, 2, ".", ",") . " hektar)" : "Total estimation for integration area can't more than palm crops (" . number_format($jumlah_semua, 2, ".", ",") . " Hectares)"; ?>");
                        $(this).val("0.0");
                        $("#percentage" + id).html("0.0%");
                        $("#CropPercentage" + id).val("0.0");
                    } else {
                        var subtotal = 0;
                        $(".CropTotal").each(function (i, e) {
                            if ($(this).val() != "") {
                                try {
                                    subtotal += parseFloat($(this).val());
                                } catch (err) {
                                }
                            }
                        });

                        if (subtotal > <?php echo $jumlah_semua; ?>) {
                            alert("<?php echo $_SESSION['lang'] == "mal" ? "Jumlah anggaran keluasan integrasi mestilah tidak melebihi jumlah keluasan tanaman sawit (" . number_format($jumlah_semua, 2, ".", ",") . " hektar)" : "Total estimation for integration area can't more than palm crops (" . number_format($jumlah_semua, 2, ".", ",") . " Hectares)"; ?>");
                            $(this).val("0.0");
                            $("#percentage" + id).html("0.0%");
                            $("#CropPercentage" + id).val("0.0");
                        } else {
                            try {
                                $("#percentage" + id).html((parseFloat($(this).val()) / <?php echo $jumlah_semua; ?> * 100).toFixed(2) + "%");
                                $("#CropPercentage" + id).val((parseFloat($(this).val()) / <?php echo $jumlah_semua; ?> * 100).toFixed(2));
                            } catch (err) {
                                $("#percentage" + id).html("");
                                $("#CropPercentage" + id).val("");
                            }
                        }
                    }
                }
<?php } ?>
        });

        $("#AreaEstimation").keyup(function (e) {
<?php if ($jumlah_semua > 0) { ?>
                if ($(this).val() == "") {
                    $("#percentageLivestock").html("0.0%");
                } else {
                    if (parseFloat($(this).val()) > <?php echo $jumlah_semua; ?>) {
                        alert("<?php echo $_SESSION['lang'] == "mal" ? "Jumlah anggaran keluasan integrasi mestilah tidak melebihi jumlah keluasan tanaman sawit (" . number_format($jumlah_semua, 2, ".", ",") . " hektar)" : "Total estimation for integration area can't more than palm crops (" . number_format($jumlah_semua, 2, ".", ",") . " Hectares)"; ?>");
                        $(this).val("0.0")
                        $("#percentageLivestock").html("0.0%");
                    } else {
                        try {
                            $("#percentageLivestock").html((parseFloat($(this).val()) / <?php echo $jumlah_semua; ?> * 100).toFixed(2) + "%");
                        } catch (err) {
                            $("#percentageLivestock").html("0.0%");
                        }
                    }
                }
<?php } ?>
        });

        $(".btnAddCrop").click(function (e) {
            $("#indicator").val(2);
            $("#Item1").val(parseInt($("#Item1").val()) + 1);
            $("#frm-integration").submit();
        });

        $(".btnDelCrop").click(function (e) {
            var id = $(this).attr("id").substring(10);
            $("#indicator").val(2);
            $("#Item1").val(parseInt($("#Item1").val()) - 1);
            $("#Delete1").val(id);
            $("#frm-integration").submit();
        });

        $(".btnAddLiveStock").click(function (e) {
            $("#indicator").val(2);
            $("#Item2").val(parseInt($("#Item2").val()) + 1);
            $("#frm-integration").submit();
        });

        $(".btnDelLiveStock").click(function (e) {
            var id = $(this).attr("id").substring(15);
            $("#indicator").val(2);
            $("#Item2").val(parseInt($("#Item2").val()) - 1);
            $("#Delete2").val(id);
            $("#frm-integration").submit();
        });

        $("#btnsubmit2").click(function (e) {
            $("#indicator").val(3);
            $("#frm-integration").submit();
        });

        $(".NumberOnly").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            //if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });

        $(".DecimalOnly").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    //if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                            // Allow: Ctrl+A, Command+A
                                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                                    // Allow: home, end, left, right, down, up
                                            (e.keyCode >= 35 && e.keyCode <= 40)) {
                                // let it happen, don't do anything
                                return;
                            }
                            // Ensure that it is a number and stop the keypress
                            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                e.preventDefault();
                            }
                        });
            });
</script>
