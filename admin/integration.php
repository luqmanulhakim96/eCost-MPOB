<?php
$Conn = connect();
error_reporting(-1);

$Year = $_COOKIE['tahun_report'];
$Table = $Year == date('Y') ? "esub" : "esub_" . $Year;
$aQuery = "SELECT nama, id FROM negeri ORDER BY id ASC";
$aRows = mysql_query($aQuery, $Conn);
$State = array();
$Lang = "en";

/* kiraan immature area estate */

function getImmatureArea($year, $nolesen, $type) {
    $tahun = $year;
    $pertama = $tahun - 3;
    $kedua = $tahun - 2;
    $ketiga = $tahun - 1;

    $pertama = substr($pertama, -2);
    $kedua = substr($kedua, -2);
    $ketiga = substr($ketiga, -2);


    $satu = tanaman_tahun($pertama, $nolesen, $type);
    $dua = tanaman_tahun($kedua, $nolesen, $type);
    $tiga = tanaman_tahun($ketiga, $nolesen, $type);
    /** echo $tiga[0]."+".$dua[0]."+".$satu[0]."<br>"; */
    return $tiga[0] + $dua[0] + $satu[0];
    /** echo $tiga[0]."<br>"; /* get jumlah luas belum matang */
}

function tanaman_tahun($tahuntanaman, $nolesen, $type) {
    global $Conn;
    $q1 = "";
    $q2 = "";
    $q3 = "";
    $Year = $_COOKIE['tahun_report'];

    $nolesenNumber = str_replace("-", "", $nolesen);
    if (is_numeric($nolesenNumber)) {
        $q1 = "select sum(tanaman_baru) as jumlah from tanam_baru$tahuntanaman where lesen ='" . $nolesen . "' ";
        $q2 = "select sum(tanaman_semula) as jumlah from tanam_semula$tahuntanaman where lesen ='" . $nolesen . "' ";
        $q3 = "select sum(tanaman_tukar) as jumlah from tanam_tukar$tahuntanaman  where lesen ='" . $nolesen . "' ";
    } else {
        include('convert_negeri.php');
        $q1 = "select sum(a.tanaman_baru) as jumlah from tanam_baru$tahuntanaman a "
                . "JOIN tblasmintegrationestate b ON b.License = a.lesen "
                . "where a.negeri in ('" . $nolesen . "')  "
                . "AND b.Integration IN ($type) "
                . "and b.Year = '$Year' ";
        $q2 = "select sum(a.tanaman_semula) as jumlah from tanam_semula$tahuntanaman a "
                . "JOIN tblasmintegrationestate b ON b.License = a.lesen "
                . "where a.negeri in ('" . $nolesen . "')  "
                . "AND b.Integration IN ($type) "
                . "and b.Year = '$Year' ";
        $q3 = "select sum(a.tanaman_tukar) as jumlah from tanam_tukar$tahuntanaman  a "
                . "JOIN tblasmintegrationestate b ON b.License = a.lesen "
                . "where a.negeri in ('" . $nolesen . "')  "
                . "AND b.Integration IN ($type) "
                . "and b.Year = '$Year' ";
    }

    $r1 = mysql_query($q1, $Conn);
    $row1 = mysql_fetch_array($r1);

    $r2 = mysql_query($q2, $Conn);
    $row2 = mysql_fetch_array($r2);

    $r3 = mysql_query($q3, $Conn);
    $row3 = mysql_fetch_array($r3);
    /** echo $q1 . ";<br>";
      echo $q2 . ";<br>";
      echo $q3 . ";<br>"; */
    $js[0] = $row1['jumlah'] + $row2['jumlah'] + $row3['jumlah'];
    $js[1] = $row1['jumlah'];
    $js[2] = $row2['jumlah'];
    $js[3] = $row3['jumlah'];
    return $js;
}

/* end of kiraan immature area estate */

/* kiraan mature area estate */

function getMatureArea($year, $nolesen, $type) {
    $jumlahMatang = 0;
    global $Conn;

    if (date('Y') == $year) {
        $table = "esub";
    } else {
        $table = "esub_" . $year;
    }


    $nolesenNumber = str_replace("-", "", $nolesen);
    if (is_numeric($nolesenNumber)) {
        $q = "select a.Keluasan_Yang_Dituai as Jumlah from $table a where a.no_lesen_baru = '$nolesen' ";
    } else {
        include('convert_negeri.php');
        $q = "select sum(a.Keluasan_Yang_Dituai) as Jumlah from $table a "
                . " JOIN tblasmintegrationestate b ON b.License = a.no_lesen_baru "
                . "where  "
                . "a.Negeri_Premis in ('" . $nolesen . "')  "
                . "AND b.Integration IN ($type) "
                . "and b.Year = '$year' ";
    }
    /** echo $q . "<br>"; */
    $r = mysql_query($q, $Conn);
    $row = mysql_fetch_array($r);
    if ($row) {
        $jumlahMatang = $row['Jumlah'];
    }
    return $jumlahMatang;
}

/* end of kiraan mature area estate */

function luas_data($Table, $Data, $iYear, $Year, $Type, $State) {
    global $Conn;
    if (strlen($Year) == 1) {
        $Table = $Table . "0" . substr($Year, -2);
    } else {
        $Table = $Table . substr($Year, -2);
    }
    $aQuery = "SELECT SUM(a.$Data) AS $Data " .
            "FROM $Table a " .
            "JOIN tblasmintegrationestate b ON b.License = a.lesen " .
            "WHERE negeri = '$State' AND b.`Year` = '$iYear' AND b.Integration IN ($Type)" . (!empty($License) ? " AND lesen = '$License'" : "");
    $aRows = mysql_query($aQuery, $Conn);
    $aRow = mysql_fetch_array($aRows);
    return $aRow[$Data];
}

function Immature($Type, $State, $License = '') {
    global $Conn;
    global $Year;

    $pb1 = luas_data("tanam_baru", "tanaman_baru", $Year, $Year - 1, $Type, $State, $License);
    $pb2 = luas_data("tanam_baru", "tanaman_baru", $Year, $Year - 2, $Type, $State, $License);
    $pb3 = luas_data("tanam_baru", "tanaman_baru", $Year, $Year - 3, $Type, $State, $License);

    return $pb1 + $pb2 + $pb3;
}

function Mature($Type, $State, $License = '') {
    global $Conn;
    global $Year;
    global $Table;

    $aQuery = "SELECT SUM(a.Keluasan_Yang_Dituai) AS Keluasan_Yang_Dituai " .
            "FROM $Table a " .
            "JOIN tblasmintegrationestate b ON b.License = a.no_lesen_baru " .
            "WHERE a.Negeri_Premis = '$State' AND b.`Year` = '$Year' AND b.Integration IN ($Type)" . (!empty($License) ? " AND a.no_lesen_baru = '$License'" : "");
    $aRows = mysql_query($aQuery, $Conn);
    $Luastuai = 0;
    if ($aRow = mysql_fetch_object($aRows)) {
        $Luastuai = $aRow->Keluasan_Yang_Dituai == "" ? 0 : $aRow->Keluasan_Yang_Dituai;
    }

    $ps1 = luas_data("tanam_semula", "tanaman_semula", $Year, $Year - 1, $Type, $State, $License);
    $ps2 = luas_data("tanam_semula", "tanaman_semula", $Year, $Year - 2, $Type, $State, $License);
    $ps3 = luas_data("tanam_semula", "tanaman_semula", $Year, $Year - 3, $Type, $State, $License);

    $pt1 = luas_data("tanam_tukar", "tanaman_tukar", $Year, $Year - 1, $Type, $State, $License);
    $pt2 = luas_data("tanam_tukar", "tanaman_tukar", $Year, $Year - 2, $Type, $State, $License);
    $pt3 = luas_data("tanam_tukar", "tanaman_tukar", $Year, $Year - 3, $Type, $State, $License);

    return $Luastuai + $ps1 + $ps2 + $ps3 + $pt1 + $pt2 + $pt3;
}

function getTotalLiveStock($item, $category, $Year, $nolesen) {
    global $Conn;
    $total = 0;
    if($item!='IS NULL'){
    $bQuery = "SELECT c.Total as total " 
            ." FROM login_estate a " 
            ." inner JOIN tblasmintegrationestate b ON b.License = a.lesen " 
            ." inner JOIN tblasmintegrationdetail c ON a.lesen = c.License " 
            ." WHERE b.`Year` = '$Year' "
            . " AND c.License = '$nolesen' "
            . "AND c.Item = '$item'"
            . "AND c.Category = '$category' ";
    }
    else{
    $bQuery = "SELECT c.Total as total " 
            ." FROM login_estate a " 
            ." inner JOIN tblasmintegrationestate b ON b.License = a.lesen " 
            ." inner JOIN tblasmintegrationdetail c ON a.lesen = c.License " 
            ." WHERE b.`Year` = '$Year' "
            . " AND c.License = '$nolesen' "
            . "AND c.Item is null "
            . "AND c.Category = '$category' ";
    }

    /**echo $bQuery.'<br>;';*/
    $bRows = mysql_query($bQuery, $Conn);
    if ($row = mysql_fetch_array($bRows)) {
        $total = $row['total'];
    }
    return $total;
}

/* ------------ by hafez ------------ */

while ($aRow = mysql_fetch_object($aRows)) {
    $State[$aRow->id] = array('Name' => $aRow->nama,
        'isState' => 1,
        'CropsNumber' => 0,
        'LivestockNumber' => 0,
        'Crops' => 0,
        'Livestock' => 0,
        'CropsLivestock' => 0,
        'NoIntegration' => 0,
        'CropsData' => array('Immature' => 0,
            'Mature' => 0,
            'Watermelon' => 0,
            'Pineapple' => 0,
            'SweetPotatoes' => 0,
            'Banana' => 0,
            'Others' => 0),
        'LivestockData' => array('Immature' => 0,
            'Mature' => 0,
            'EstimatedArea' => 0,
            'Cattle' => 0,
            'Buffalo' => 0,
            'Goat' => 0,
            'Sheep' => 0,
            'Others' => 0),
        'EstateCrops' => array(),
        'EstateLivestock' => array());
}
$State['ZPMY'] = array('Name' => 'Peninsular Malaysia',
    'isState' => 0,
    'CropsNumber' => 0,
    'LivestockNumber' => 0,
    'Crops' => 0,
    'Livestock' => 0,
    'CropsLivestock' => 0,
    'NoIntegration' => 0,
    'CropsData' => array('Immature' => 0,
        'Mature' => 0,
        'Watermelon' => 0,
        'Pineapple' => 0,
        'SweetPotatoes' => 0,
        'Banana' => 0,
        'Others' => 0),
    'LivestockData' => array('Immature' => 0,
        'Mature' => 0,
        'EstimatedArea' => 0,
        'Cattle' => 0,
        'Buffalo' => 0,
        'Goat' => 0,
        'Sheep' => 0,
        'Others' => 0),
    'EstateCrops' => array(),
    'EstateLivestock' => array());
$State['ZSMY'] = array('Name' => 'Sabah/ Sarawak',
    'isState' => 0,
    'CropsNumber' => 0,
    'LivestockNumber' => 0,
    'Crops' => 0,
    'Livestock' => 0,
    'CropsLivestock' => 0,
    'NoIntegration' => 0,
    'CropsData' => array('Immature' => 0,
        'Mature' => 0,
        'Watermelon' => 0,
        'Pineapple' => 0,
        'SweetPotatoes' => 0,
        'Banana' => 0,
        'Others' => 0),
    'LivestockData' => array('Immature' => 0,
        'Mature' => 0,
        'EstimatedArea' => 0,
        'Cattle' => 0,
        'Buffalo' => 0,
        'Goat' => 0,
        'Sheep' => 0,
        'Others' => 0),
    'EstateCrops' => array(),
    'EstateLivestock' => array());
$State['ZZMY'] = array('Name' => 'Malaysia',
    'isState' => 0,
    'CropsNumber' => 0,
    'LivestockNumber' => 0,
    'Crops' => 0,
    'Livestock' => 0,
    'CropsLivestock' => 0,
    'NoIntegration' => 0,
    'CropsData' => array('Immature' => 0,
        'Mature' => 0,
        'Watermelon' => 0,
        'Pineapple' => 0,
        'SweetPotatoes' => 0,
        'Banana' => 0,
        'Others' => 0),
    'LivestockData' => array('Immature' => 0,
        'Mature' => 0,
        'EstimatedArea' => 0,
        'Cattle' => 0,
        'Buffalo' => 0,
        'Goat' => 0,
        'Sheep' => 0,
        'Others' => 0),
    'EstateCrops' => array(),
    'EstateLivestock' => array());
$aQuery = "SELECT nama, id FROM negeri ORDER BY id ASC";
$aRows = mysql_query($aQuery, $Conn);
$Key = array("NoIntegration", "Crops", "Livestock", "CropsLivestock");
$CropsKey = array("Watermelon", "Pineapple", "SweetPotatoes", "Banana", "Others");
$LivestockKey = array("Cattle", "Buffalo", "Goat", "Sheep", "Others");
$ImmatureZPMY = 0;
$ImmatureZSMY = 0;
$ImmatureZZMY = 0;
while ($aRow = mysql_fetch_object($aRows)) {
    for ($i = 1; $i <= 4; $i++) {
        $bQuery = "SELECT COUNT(DISTINCT b.License) AS cnt " .
                "FROM login_estate a " .
                "JOIN tblasmintegrationestate b ON b.License = a.lesen " .
                "JOIN $Table c ON a.lesen = c.No_Lesen_Baru " .
                "WHERE b.`Year` = '$Year' AND b.Integration = $i " .
                "AND c.No_Lesen_Baru NOT LIKE '%123456%' AND c.negeri_premis = '$aRow->nama'";
        $bRows = mysql_query($bQuery, $Conn);
        /** echo $bQuery."<br>"; */
        if ($bRow = mysql_fetch_object($bRows)) {
            $State[$aRow->id][$Key[$i - 1]] += $bRow->cnt;
            $State['ZZMY'][$Key[$i - 1]] += $bRow->cnt;
            if ($aRow->id == "SBH" || $aRow->id == "SWK") {

                $State['ZSMY'][$Key[$i - 1]] += $bRow->cnt;
            } else {
                $State['ZPMY'][$Key[$i - 1]] += $bRow->cnt;
            }
        }
    }

    $bQuery = "SELECT COUNT(DISTINCT a.lesen) AS cnt " .
            "FROM login_estate a " .
            "JOIN tblasmintegrationestate b ON b.License = a.lesen " .
            "JOIN $Table c ON a.lesen = c.No_Lesen_Baru " .
            "WHERE b.`Year` = '$Year' AND b.Integration IN (2, 4) " .
            "AND c.No_Lesen_Baru NOT LIKE '%123456%' AND c.negeri_premis = '$aRow->nama'";
    $bRows = mysql_query($bQuery, $Conn);
    if ($bRow = mysql_fetch_object($bRows)) {
        $State[$aRow->id]['CropsNumber'] += $bRow->cnt;
        $State['ZZMY']['CropsNumber'] += $bRow->cnt;
        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            $State['ZSMY']['CropsNumber'] += $bRow->cnt;
        } else {
            $State['ZPMY']['CropsNumber'] += $bRow->cnt;
        }
    }

    $bQuery = "SELECT COUNT(DISTINCT a.lesen) AS cnt " .
            "FROM login_estate a " .
            "JOIN tblasmintegrationestate b ON b.License = a.lesen " .
            "JOIN $Table c ON a.lesen = c.No_Lesen_Baru " .
            "WHERE b.`Year` = '$Year' AND b.Integration IN (3, 4) " .
            "AND c.No_Lesen_Baru NOT LIKE '%123456%' AND c.negeri_premis = '$aRow->nama'";
    $bRows = mysql_query($bQuery, $Conn);
    if ($bRow = mysql_fetch_object($bRows)) {
        $State[$aRow->id]['LivestockNumber'] += $bRow->cnt;
        $State['ZZMY']['LivestockNumber'] += $bRow->cnt;
        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            $State['ZSMY']['LivestockNumber'] += $bRow->cnt;
        } else {
            $State['ZPMY']['LivestockNumber'] += $bRow->cnt;
        }
    }

    $ImmatureVal = Immature("2, 4", $State[$aRow->id]['Name']);
    $State[$aRow->id]['CropsData']['Immature'] = $ImmatureVal;
    $State['ZZMY']['CropsData']['Immature'] += $ImmatureVal;
    if ($aRow->id == "SBH" || $aRow->id == "SWK") {
        $State['ZSMY']['CropsData']['Immature'] += $ImmatureVal;
    } else {
        $State['ZPMY']['CropsData']['Immature'] += $ImmatureVal;
    }

    $ImmatureVal = Immature("3, 4", $State[$aRow->id]['Name']);
    $State[$aRow->id]['LivestockData']['Immature'] = $ImmatureVal;
    $State['ZZMY']['LivestockData']['Immature'] += $ImmatureVal;
    if ($aRow->id == "SBH" || $aRow->id == "SWK") {
        $State['ZSMY']['LivestockData']['Immature'] += $ImmatureVal;
    } else {
        $State['ZPMY']['LivestockData']['Immature'] += $ImmatureVal;
    }

    $MatureVal = Mature("2, 4", $State[$aRow->id]['Name']);
    $State[$aRow->id]['CropsData']['Mature'] = $MatureVal;
    $State['ZZMY']['CropsData']['Mature'] += $MatureVal;
    if ($aRow->id == "SBH" || $aRow->id == "SWK") {
        $State['ZSMY']['CropsData']['Mature'] += $MatureVal;
    } else {
        $State['ZPMY']['CropsData']['Mature'] += $MatureVal;
    }

    $MatureVal = Mature("3, 4", $State[$aRow->id]['Name']);
    $State[$aRow->id]['LivestockData']['Mature'] = $MatureVal;
    $State['ZZMY']['LivestockData']['Mature'] += $MatureVal;
    if ($aRow->id == "SBH" || $aRow->id == "SWK") {
        $State['ZSMY']['LivestockData']['Mature'] += $MatureVal;
    } else {
        $State['ZPMY']['LivestockData']['Mature'] += $MatureVal;
    }

    for ($i = 1; $i <= 5; $i++) {
        $bQuery = "SELECT SUM(a.Total) AS Total " .
                "FROM (SELECT DISTINCT b.License, b.`Year`, c.Total " .
                "		 FROM login_estate a " .
                "		 JOIN tblasmintegrationestate b ON b.License = a.lesen " .
                "		 JOIN tblasmintegrationdetail c ON c.License = b.License AND c.`Year` = b.`Year` " .
                "		 JOIN $Table d ON a.lesen = d.No_Lesen_Baru " .
                "		 WHERE b.`Year` = '$Year' " .
                "		 AND " . ($i < 5 ? "c.Item = $i" : "c.Item IS NULL") . " AND c.Category = 1 AND c.Total IS NOT NULL " .
                "		 AND d.No_Lesen_Baru NOT LIKE '%123456%' AND d.negeri_premis = '$aRow->nama') AS a";
        /**echo $bQuery.";<br>";*/
        $bRows = mysql_query($bQuery, $Conn);
        if ($bRow = mysql_fetch_object($bRows)) {
            $State[$aRow->id]['CropsData'][$CropsKey[$i - 1]] += $bRow->Total;
            $State['ZZMY']['CropsData'][$CropsKey[$i - 1]] += $bRow->Total;
            if ($aRow->id == "SBH" || $aRow->id == "SWK") {
                $State['ZSMY']['CropsData'][$CropsKey[$i - 1]] += $bRow->Total;
            } else {
                $State['ZPMY']['CropsData'][$CropsKey[$i - 1]] += $bRow->Total;
            }
        }

        $bQuery = "SELECT SUM(a.Total) AS Total " .
                "FROM (SELECT DISTINCT b.License, b.`Year`, c.Total " .
                "		 FROM login_estate a " .
                "		 JOIN tblasmintegrationestate b ON b.License = a.lesen " .
                "		 JOIN tblasmintegrationdetail c ON c.License = b.License AND c.`Year` = b.`Year` " .
                "		 JOIN $Table d ON a.lesen = d.No_Lesen_Baru " .
                "		 WHERE b.`Year` = '$Year' " .
                "		 AND " . ($i < 5 ? "c.Item = " . ($i + 4) : "c.Item IS NULL") . " "
                . "              AND c.Category = 2 AND c.Total IS NOT NULL " .
                "		 AND d.No_Lesen_Baru NOT LIKE '%123456%' AND d.negeri_premis = '$aRow->nama') AS a";

        /** echo $bQuery.";<br>";*/
        $bRows = mysql_query($bQuery, $Conn);
        if ($bRow = mysql_fetch_object($bRows)) {
            /**echo $aRow->id.";<br>";*/
            $State[$aRow->id]['LivestockData'][$LivestockKey[$i - 1]] += $bRow->Total;
            $State['ZZMY']['LivestockData'][$LivestockKey[$i - 1]] += $bRow->Total;
            if ($aRow->id == "SBH" || $aRow->id == "SWK") {
                $State['ZSMY']['LivestockData'][$LivestockKey[$i - 1]] += $bRow->Total;
            } else {
                $State['ZPMY']['LivestockData'][$LivestockKey[$i - 1]] += $bRow->Total;
            }
        }
    }
    $bQuery = "SELECT SUM(a.AreaEstimation) AS AreaEstimation " .
            "FROM (SELECT DISTINCT b.License, b.AreaEstimation, b.`Year` " .
            "		 FROM login_estate a " .
            "		 JOIN tblasmintegrationestate b ON b.License = a.lesen " .
            "		 JOIN $Table c ON a.lesen = c.No_Lesen_Baru " .
            "		 WHERE b.`Year` = '$Year' AND b.AreaEstimation IS NOT NULL " .
            "		 AND c.No_Lesen_Baru NOT LIKE '%123456%' AND c.negeri_premis = '$aRow->nama') AS a";
    $bRows = mysql_query($bQuery, $Conn);
    if ($bRow = mysql_fetch_object($bRows)) {
        $State[$aRow->id]['LivestockData']['EstimatedArea'] += $bRow->AreaEstimation;
        $State['ZZMY']['LivestockData']['EstimatedArea'] += $bRow->AreaEstimation;
        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            $State['ZSMY']['LivestockData']['EstimatedArea'] += $bRow->AreaEstimation;
        } else {
            $State['ZPMY']['LivestockData']['EstimatedArea'] += $bRow->AreaEstimation;
        }
    }
    $cQuery = "SELECT DISTINCT c.No_Lesen_Baru, c.Nama_Estet " .
            "FROM login_estate a " .
            "JOIN tblasmintegrationestate b ON b.License = a.lesen " .
            "JOIN $Table c ON a.lesen = c.No_Lesen_Baru " .
            "WHERE b.`Year` = '$Year' AND b.Integration IN (2, 4) " .
            "AND c.No_Lesen_Baru NOT LIKE '%123456%' AND c.negeri_premis = '$aRow->nama'";
    $cRows = mysql_query($cQuery, $Conn);
    $index = 0;
    $indexp = 0;
    $indexs = 0;
    while ($cRow = mysql_fetch_object($cRows)) {
        array_push($State[$aRow->id]['EstateCrops'], array('Name' => $cRow->Nama_Estet,
            'License' => $cRow->No_Lesen_Baru,
            'CropsData' => array('Immature' => 0,
                'Mature' => 0,
                'Watermelon' => 0,
                'Pineapple' => 0,
                'SweetPotatoes' => 0,
                'Banana' => 0,
                'Others' => 0)));
        array_push($State['ZZMY']['EstateCrops'], array('Name' => $cRow->Nama_Estet,
            'License' => $cRow->No_Lesen_Baru,
            'CropsData' => array('Immature' => 0,
                'Mature' => 0,
                'Watermelon' => 0,
                'Pineapple' => 0,
                'SweetPotatoes' => 0,
                'Banana' => 0,
                'Others' => 0)));

        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            array_push($State['ZSMY']['EstateCrops'], array('Name' => $cRow->Nama_Estet,
                'License' => $cRow->No_Lesen_Baru,
                'CropsData' => array('Immature' => 0,
                    'Mature' => 0,
                    'Watermelon' => 0,
                    'Pineapple' => 0,
                    'SweetPotatoes' => 0,
                    'Banana' => 0,
                    'Others' => 0)));
        } else {
            array_push($State['ZPMY']['EstateCrops'], array('Name' => $cRow->Nama_Estet,
                'License' => $cRow->No_Lesen_Baru,
                'CropsData' => array('Immature' => 0,
                    'Mature' => 0,
                    'Watermelon' => 0,
                    'Pineapple' => 0,
                    'SweetPotatoes' => 0,
                    'Banana' => 0,
                    'Others' => 0)));
        }

        $ImmatureVal = Immature("2, 4", $State[$aRow->id]['Name'], $cRow->No_Lesen_Baru);
        $State[$aRow->id]['EstateCrops'][$index]['CropsData']['Immature'] = $ImmatureVal;
        $State['ZZMY']['EstateCrops'][$index]['CropsData']['Immature'] = $ImmatureVal;
        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            $State['ZSMY']['EstateCrops'][$indexs]['CropsData']['Immature'] = $ImmatureVal;
        } else {
            $State['ZPMY']['EstateCrops'][$indexp]['CropsData']['Immature'] = $ImmatureVal;
        }

        $MatureVal = Mature("2, 4", $State[$aRow->id]['Name'], $cRow->No_Lesen_Baru);
        $State[$aRow->id]['EstateCrops'][$index]['CropsData']['Mature'] = $MatureVal;
        $State['ZZMY']['EstateCrops'][$index]['CropsData']['Mature'] = $MatureVal;
        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            $State['ZSMY']['EstateCrops'][$indexs]['CropsData']['Mature'] = $MatureVal;
        } else {
            $State['ZPMY']['EstateCrops'][$indexp]['CropsData']['Mature'] = $MatureVal;
        }

        for ($i = 1; $i <= 5; $i++) {
            $bQuery = "SELECT SUM(a.Total) AS cnt " .
                    "FROM (SELECT DISTINCT b.License, b.`Year`, c.Total " .
                    "		 FROM login_estate a " .
                    "		 JOIN tblasmintegrationestate b ON b.License = a.lesen " .
                    "		 JOIN tblasmintegrationdetail c ON c.License = b.License AND c.`Year` = b.`Year` " .
                    "		 JOIN $Table d ON a.lesen = d.No_Lesen_Baru " .
                    "		 WHERE b.`Year` = '$Year' " .
                    "		 AND " . ($i < 5 ? "c.Item = $i" : "c.Item IS NULL") . " AND c.Category = 1 AND c.Total IS NOT NULL " .
                    "		 AND d.No_Lesen_Baru NOT LIKE '%123456%' AND d.negeri_premis = '$aRow->nama' AND d.No_Lesen_Baru = '$cRow->No_Lesen_Baru') AS a";
            $bRows = mysql_query($bQuery, $Conn);
            if ($bRow = mysql_fetch_object($bRows)) {
                $State[$aRow->id]['EstateCrops'][$index]['CropsData'][$CropsKey[$i - 1]] += $bRow->cnt;
                $State['ZZMY']['EstateCrops'][$index]['CropsData'][$CropsKey[$i - 1]] += $bRow->cnt;
                if ($aRow->id == "SBH" || $aRow->id == "SWK") {
                    $State['ZSMY']['EstateCrops'][$indexs]['CropsData'][$CropsKey[$i - 1]] += $bRow->cnt;
                } else {
                    $State['ZPMY']['EstateCrops'][$indexp]['CropsData'][$CropsKey[$i - 1]] += $bRow->cnt;
                }
            }
        }
        $index++;
        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            $indexs++;
        } else {
            $indexp++;
        }
    }
    $cQuery = "SELECT DISTINCT c.No_Lesen_Baru, c.Nama_Estet " .
            "FROM login_estate a " .
            "JOIN tblasmintegrationestate b ON b.License = a.lesen " .
            "JOIN $Table c ON a.lesen = c.No_Lesen_Baru " .
            "WHERE b.`Year` = '$Year' AND b.Integration IN (3, 4) " .
            "AND c.No_Lesen_Baru NOT LIKE '%123456%' AND c.negeri_premis = '$aRow->nama'";
    /**echo $bQuery.'<br>;';*/

    $cRows = mysql_query($cQuery, $Conn);
    $index = 0;
    $indexp = 0;
    $indexs = 0;
    while ($cRow = mysql_fetch_object($cRows)) {
        array_push($State[$aRow->id]['EstateLivestock'], array('Name' => $cRow->Nama_Estet,
            'License' => $cRow->No_Lesen_Baru,
            'LivestockData' => array('Immature' => 0,
                'Mature' => 0,
                'EstimatedArea' => 0,
                'Cattle' => 0,
                'Buffalo' => 0,
                'Goat' => 0,
                'Sheep' => 0,
                'Others' => 0)));
        array_push($State['ZZMY']['EstateLivestock'], array('Name' => $cRow->Nama_Estet,
            'License' => $cRow->No_Lesen_Baru,
            'LivestockData' => array('Immature' => 0,
                'Mature' => 0,
                'EstimatedArea' => 0,
                'Cattle' => 0,
                'Buffalo' => 0,
                'Goat' => 0,
                'Sheep' => 0,
                'Others' => 0)));
        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            array_push($State['ZSMY']['EstateLivestock'], array('Name' => $cRow->Nama_Estet,
                'License' => $cRow->No_Lesen_Baru,
                'LivestockData' => array('Immature' => 0,
                    'Mature' => 0,
                    'EstimatedArea' => 0,
                    'Cattle' => 0,
                    'Buffalo' => 0,
                    'Goat' => 0,
                    'Sheep' => 0,
                    'Others' => 0)));
        } else {
            array_push($State['ZPMY']['EstateLivestock'], array('Name' => $cRow->Nama_Estet,
                'License' => $cRow->No_Lesen_Baru,
                'LivestockData' => array('Immature' => 0,
                    'Mature' => 0,
                    'EstimatedArea' => 0,
                    'Cattle' => 0,
                    'Buffalo' => 0,
                    'Goat' => 0,
                    'Sheep' => 0,
                    'Others' => 0)));
        }

        $ImmatureVal = Immature("3, 4", $State[$aRow->id]['Name'], $cRow->No_Lesen_Baru);
        $State[$aRow->id]['EstateLivestock'][$index]['LivestockData']['Immature'] = $ImmatureVal;
        $State['ZZMY']['EstateLivestock'][$index]['LivestockData']['Immature'] = $ImmatureVal;
        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            $State['ZSMY']['EstateLivestock'][$indexs]['LivestockData']['Immature'] = $ImmatureVal;
        } else {
            $State['ZPMY']['EstateLivestock'][$indexp]['LivestockData']['Immature'] = $ImmatureVal;
        }

        $MatureVal = Mature("3, 4", $State[$aRow->id]['Name'], $cRow->No_Lesen_Baru);
        $State[$aRow->id]['EstateLivestock'][$index]['LivestockData']['Mature'] = $MatureVal;
        $State['ZZMY']['EstateLivestock'][$index]['LivestockData']['Mature'] = $MatureVal;
        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            $State['ZSMY']['EstateLivestock'][$indexs]['LivestockData']['Mature'] = $MatureVal;
        } else {
            $State['ZPMY']['EstateLivestock'][$indexp]['LivestockData']['Mature'] = $MatureVal;
        }

        for ($i = 1; $i <= 5; $i++) {
            $bQuery = "SELECT SUM(a.Total) AS cnt " .
                    "FROM (SELECT DISTINCT b.License, b.`Year`, c.Total " .
                    "		 FROM login_estate a " .
                    "		 JOIN tblasmintegrationestate b ON b.License = a.lesen " .
                    "		 JOIN tblasmintegrationdetail c ON c.License = b.License AND c.`Year` = b.`Year` " .
                    "		 JOIN $Table d ON a.lesen = d.No_Lesen_Baru " .
                    "		 WHERE b.`Year` = '$Year' " .
                    "		 AND " . ($i < 5 ? "c.Item = " . ($i + 4) : "c.Item IS NULL") . " "
                    . "AND c.Category = 2 AND c.Total IS NOT NULL " .
                    "		 AND d.No_Lesen_Baru NOT LIKE '%123456%' AND d.negeri_premis = '$aRow->nama' "
                    . "AND d.No_Lesen_Baru = '$cRow->No_Lesen_Baru') AS a";
             /**if ($cRow->No_Lesen_Baru == "515246-002000") {
              echo $bQuery . ';<br>';
              }*/ 

            $bRows = mysql_query($bQuery, $Conn);
            if ($bRow = mysql_fetch_object($bRows)) {

                /** if ($cRow->No_Lesen_Baru == "515246-002000") { echo $LivestockKey[$i - 1] . "-" . $bRow->cnt . '<br>'; } */
                $State[$aRow->id]['EstateLivestock'][$index]['LivestockData'][$LivestockKey[$i - 1]] += $bRow->cnt;
                $State['ZZMY']['EstateLivestock'][$index]['LivestockData'][$LivestockKey[$i - 1]] += $bRow->cnt;
                if ($aRow->id == "SBH" || $aRow->id == "SWK") {
                    $State['ZSMY']['EstateLivestock'][$indexs]['LivestockData'][$LivestockKey[$i - 1]] += $bRow->cnt;
                } else {
                    $State['ZPMY']['EstateLivestock'][$indexp]['LivestockData'][$LivestockKey[$i - 1]] += $bRow->cnt;
                }
            }
        }
        $bQuery = "SELECT SUM(DISTINCT b.AreaEstimation) AS AreaEstimation " .
                "FROM login_estate a " .
                "JOIN tblasmintegrationestate b ON b.License = a.lesen " .
                "JOIN $Table c ON a.lesen = c.No_Lesen_Baru " .
                "WHERE b.`Year` = '$Year' AND b.AreaEstimation IS NOT NULL " .
                "AND c.No_Lesen_Baru NOT LIKE '%123456%' AND c.negeri_premis = '$aRow->nama' "
                . "AND c.No_Lesen_Baru = '$cRow->No_Lesen_Baru'";

        /**echo $bQuery.'<br>;';*/
        $bRows = mysql_query($bQuery, $Conn);
        if ($bRow = mysql_fetch_object($bRows)) {
            $State[$aRow->id]['EstateLivestock'][$index]['LivestockData']['EstimatedArea'] += $bRow->AreaEstimation;
            $State['ZZMY']['EstateLivestock'][$index]['LivestockData']['EstimatedArea'] += $bRow->AreaEstimation;
            if ($aRow->id == "SBH" || $aRow->id == "SWK") {
                $State['ZSMY']['EstateLivestock'][$index]['LivestockData']['EstimatedArea'] += $bRow->AreaEstimation;
            } else {
                $State['ZPMY']['EstateLivestock'][$index]['LivestockData']['EstimatedArea'] += $bRow->AreaEstimation;
            }
        }
        $index++;
        if ($aRow->id == "SBH" || $aRow->id == "SWK") {
            $indexs++;
        } else {
            $indexp++;
        }
    }
}
?>
<style>
    /**https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_danger*/

    .info {
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
        margin-bottom: 15px;
        padding: 4px 12px;
    }

</style>
<table width="100%" border="0" aria-describedby="laporan_integrasi_tanaman_ternakan">
    <tr><td style="padding:10px;font-weight:bold"><?php echo $Lang == "mal" ? "LAPORAN INTEGRASI TANAMAN DAN TERNAKAN" : "CROPS AND LIVESTOCK INTEGRATION REPORTS"; ?></td></tr>
    <tr><td style="padding:20px 10px 5px 10px">[ 1 ]&nbsp;&nbsp;<span id="rpt1" class="rptclick" style="cursor:pointer"><a href="#"><?php echo $Lang == "mal" ? "Bilangan estet terlibat dengan integrasi" : "Number of estate carried out integration"; ?></a></span></td></tr>
    <tr><td style="padding:5px 10px 5px 10px">[ 2 ]&nbsp;&nbsp;<span id="rpt2" class="rptclick" style="cursor:pointer"><a href="#"><?php echo $Lang == "mal" ? "Bilangan dan keluasan estet terlibat dengan integrasi tanaman *" : "Number and area of estates carried out crops integration *"; ?></a></span></td></tr>
    <tr><td style="padding:5px 10px 5px 10px">[ 3 ]&nbsp;&nbsp;<span id="rpt3" class="rptclick" style="cursor:pointer"><a href="#"><?php echo $Lang == "mal" ? "Bilangan dan keluasan estet terlibat dengan integrasi ternakan *" : "Number and area of estates carried out livestock integration *"; ?></a></span>
            <br>  <br> <div class="info">
                <p><strong>Info!</strong> 
                    <br>
                    1. <?php echo $Lang == "mal" ? "*Pengiraan termasuk kedua-dua integrasi jika ada " : "*Calculations include both integrations if any "; ?>
                    <br>
                    2. <?php echo $Lang == "mal" ? "Sila pastikan maklumat negeri premis telah dikemaskini" : "Please make sure the state information of the premises has been updated "; ?></p>
            </div>

        </td></tr>
    <tr>
        <td style="padding:20px 10px 15px 10px">
            <div id="containerRpt1" style="float:left;width:100%;display:none">
                <div style="float:left;width:100%;padding-bottom:10px;font-weight:bold"><?php echo $Lang == "mal" ? "Bilangan estet terlibat dengan integrasi" : "Number of estate carried out integration"; ?></div>
                <input type="hidden" name="Year" value="<?php echo $Year; ?>" />
                <input type="hidden" name="Title" value="<?php echo $Lang == "mal" ? "Bilangan estet terlibat dengan integrasi" : "Number of estate carried out integration"; ?>" />
                <input type="hidden" name="Type" value="0" />
                <?php foreach ($State as $key => $val) { ?>
                    <?php
                    if ($key == "SBH" || $key == "SWK" || $key == "ZSMY" || $key == "ZZMY") {
                        continue;
                    }
                    ?>
                    <input type="hidden" name="Name[]" value="<?php echo ucwords(strtolower($val['Name'])); ?>" />
                    <input type="hidden" name="Crops[]" value="<?php echo $val['Crops']; ?>" />
                    <input type="hidden" name="Livestock[]" value="<?php echo $val['Livestock']; ?>" />
                    <input type="hidden" name="CropsLivestock[]" value="<?php echo $val['CropsLivestock']; ?>" />
                    <input type="hidden" name="TotalCropsLivestock[]" value="<?php echo ($val['Crops'] + $val['Livestock'] + $val['CropsLivestock']); ?>" />
                    <input type="hidden" name="NoIntegration[]" value="<?php echo $val['NoIntegration']; ?>" />
                <?php } ?>
                <?php foreach ($State as $key => $val) { ?>
                    <?php
                    if ($key != "SBH" && $key != "SWK" && $key != "ZZMY") {
                        continue;
                    }
                    ?>
                    <input type="hidden" name="Name[]" value="<?php echo ucwords(strtolower($val['Name'])); ?>" />
                    <input type="hidden" name="Crops[]" value="<?php echo $val['Crops']; ?>" />
                    <input type="hidden" name="Livestock[]" value="<?php echo $val['Livestock']; ?>" />
                    <input type="hidden" name="CropsLivestock[]" value="<?php echo $val['CropsLivestock']; ?>" />
                    <input type="hidden" name="TotalCropsLivestock[]" value="<?php echo ($val['Crops'] + $val['Livestock'] + $val['CropsLivestock']); ?>" />
                    <input type="hidden" name="NoIntegration[]" value="<?php echo $val['NoIntegration']; ?>" />
<?php } ?>
                <table width="100%" border="1" style="border-collapse:collapse" id="tablecontainerRpt1" aria-describedby="integrasiEstate">
                    <tr style="text-align:center;font-weight:bold">
                        <td width="150" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "Negeri" : "State"; ?></td>
                        <td colspan="4" style="padding:2px"><?php echo $Lang == "mal" ? "Bilangan estet menjalan integrasi" : "Number of estate conducting integration"; ?></td>
                        <td rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "Bilangan estet tanpa integrasi" : "Number of estate without integration"; ?></td>
                    </tr>
                    <tr style="text-align:center;font-weight:bold">
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Tanaman Sahaja" : "Crops Only"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Ternakan Sahaja" : "Livestock Only"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Tanaman dan Ternakan" : "Crops and Livestock"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah" : "Total"; ?></td>
                    </tr>
                    <?php foreach ($State as $key => $val) { ?>
                        <?php
                        if ($key == "SBH" || $key == "SWK" || $key == "ZSMY" || $key == "ZZMY") {
                            continue;
                        }
                        ?>
                        <tr style="text-align:center">
                            <td style="text-align:left;padding:2px"><?php echo ucwords(strtolower($val['Name'])); ?></td>
                            <td style="padding:2px"><?php echo $val['Crops']; ?></td>
                            <td style="padding:2px"><?php echo $val['Livestock']; ?></td>
                            <td style="padding:2px"><?php echo $val['CropsLivestock']; ?></td>
                            <td style="padding:2px"><?php echo ($val['Crops'] + $val['Livestock'] + $val['CropsLivestock']); ?></td>
                            <td style="padding:2px"><?php echo $val['NoIntegration']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php foreach ($State as $key => $val) { ?>
                        <?php
                        if ($key != "SBH" && $key != "SWK" && $key != "ZZMY") {
                            continue;
                        }
                        ?>
                        <tr style="text-align:center">
                            <td style="text-align:left;padding:2px"><?php echo ucwords(strtolower($val['Name'])); ?></td>
                            <td style="padding:2px"><?php echo $val['Crops']; ?></td>
                            <td style="padding:2px"><?php echo $val['Livestock']; ?></td>
                            <td style="padding:2px"><?php echo $val['CropsLivestock']; ?></td>
                            <td style="padding:2px"><?php echo ($val['Crops'] + $val['Livestock'] + $val['CropsLivestock']); ?></td>
                            <td style="padding:2px"><?php echo $val['NoIntegration']; ?></td>
                        </tr>
<?php } ?>
                </table><br>
                <div align="center">  
                    <button name="create_excel<?php echo $key; ?>" id="create_excel<?php echo $key; ?>" class="btn btn-success" onclick="exportExcel('containerRpt1', '<?php echo $Lang == "mal" ? "Bilangan estet terlibat dengan integrasi" : "Number of estate carried out integration"; ?>')">Create Excel File</button>  
                </div> 
            </div>
            <div id="containerRpt2" style="float:left;width:100%;display:none">
                <div style="float:left;width:100%;font-weight:bold"><?php echo $Lang == "mal" ? "Bilangan dan keluasan estet terlibat dengan integrasi tanaman" : "Number and area of estates carried out crops integration"; ?></div>
                <table width="100%" border="1" style="border-collapse:collapse" id="tablecontainerRpt2" aria-describedby="intergrasiTanaman">
                    <tr style="text-align:center;font-weight:bold">
                        <td width="150" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "Negeri" : "State"; ?></td>
                        <td width="150" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "Bilangan estet" : "Number of estate"; ?></td>
                        <td colspan="3" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah keluasan (Ha)" : "Total area (Ha)"; ?></td>
                        <td colspan="6" style="padding:2px"><?php echo $Lang == "mal" ? "Anggaran keluasan tanaman (Ha)" : "Estimated planted area (Ha)"; ?></td>
                    </tr>
                    <tr style="text-align:center;font-weight:bold">
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Tidak Matang" : "Immature"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Matang" : "Mature"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah" : "Total"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Tembikai" : "Watermelon"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Nanas" : "Pineapple"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Keledek" : "Sweet Potatoes"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Pisang" : "Banana"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Lain-lain" : "Others"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah" : "Total"; ?></td>
                    </tr>
                    <?php foreach ($State as $key => $val) { ?>
                        <?php
                        if ($key == "SBH" || $key == "SWK" || $key == "ZSMY" || $key == "ZZMY") {
                            continue;
                        }
                        ?>
                        <tr style="text-align:center">
                            <td style="text-align:left;padding:2px"><?php echo ucwords(strtolower($val['Name'])); ?></td>
                            <td style="padding:2px"><span id="C<?php echo $key; ?>" class="CropsList" style="cursor:pointer;text-decoration:underline"><?php echo $val['CropsNumber']; ?></span></td>
                            <td style="padding:2px"><?php
                                //xx
                                $immatureAreaState = getImmatureArea($Year, $key, '2,4');
                                echo number_format($immatureAreaState, 2);
                                ?></td>
                            <td style="padding:2px"><?php
                                $matureAreaState = getMatureArea($Year, $key, '2,4');
                                echo number_format($matureAreaState, 2);
                                ?></td>
                            <td style="padding:2px"><?php
                                $totalAreaState = $immatureAreaState + $matureAreaState;
                                echo number_format($totalAreaState, 2);
                                ?></td> 
                            <td style="padding:2px"><?php echo $val['CropsData']['Watermelon']; ?></td>
                            <td style="padding:2px"><?php echo $val['CropsData']['Pineapple']; ?></td>
                            <td style="padding:2px"><?php echo $val['CropsData']['SweetPotatoes']; ?></td>
                            <td style="padding:2px"><?php echo $val['CropsData']['Banana']; ?></td>
                            <td style="padding:2px"><?php echo $val['CropsData']['Others']; ?></td>
                            <td style="padding:2px"><?php echo ($val['CropsData']['Watermelon'] + $val['CropsData']['Pineapple'] + $val['CropsData']['SweetPotatoes'] + $val['CropsData']['Banana'] + $val['CropsData']['Others']); ?></td>
                        </tr>
                    <?php } ?>
                    <?php foreach ($State as $key => $val) { ?>
                        <?php
                        if ($key != "SBH" && $key != "SWK" && $key != "ZZMY") {
                            continue;
                        }
                        ?>
                        <tr style="text-align:center">
                            <td style="text-align:left;padding:2px"><?php echo ucwords(strtolower($val['Name'])); ?></td>

                            <td style="padding:2px"><span id="C<?php echo $key; ?>" class="CropsList" style="cursor:pointer;text-decoration:underline"><?php echo $val['CropsNumber']; ?></span></td>
                            <td style="padding:2px"><?php
                                //xx
                                $immatureAreaState = getImmatureArea($Year, $key, '2,4');
                                echo number_format($immatureAreaState, 2);
                                ?></td>
                            <td style="padding:2px"><?php
                                $matureAreaState = getMatureArea($Year, $key, '2,4');
                                echo number_format($matureAreaState, 2);
                                ?></td>
                            <td style="padding:2px"><?php
                                $totalAreaState = $immatureAreaState + $matureAreaState;
                                echo number_format($totalAreaState, 2);
                                ?></td><td style="padding:2px"><?php echo $val['CropsData']['Watermelon']; ?></td>
                            <td style="padding:2px"><?php echo $val['CropsData']['Pineapple']; ?></td>
                            <td style="padding:2px"><?php echo $val['CropsData']['SweetPotatoes']; ?></td>
                            <td style="padding:2px"><?php echo $val['CropsData']['Banana']; ?></td>
                            <td style="padding:2px"><?php echo $val['CropsData']['Others']; ?></td>
                            <td style="padding:2px"><?php echo ($val['CropsData']['Watermelon'] + $val['CropsData']['Pineapple'] + $val['CropsData']['SweetPotatoes'] + $val['CropsData']['Banana'] + $val['CropsData']['Others']); ?></td>
                        </tr>
<?php } ?>
                </table>
                <br>
                <div align="center">  
                    <button name="create_excel<?php echo $key; ?>" id="create_excel<?php echo $key; ?>" class="btn btn-success" onclick="exportExcel('containerRpt2', '<?php echo $Lang == "mal" ? "Bilangan dan keluasan estet terlibat dengan integrasi tanaman" : "Number and area of estates carried out crops integration"; ?>')">Create Excel File</button>  
                </div> 
            </div>
            <div id="containerRpt3" style="float:left;width:100%;display:none">
                <div style="float:left;width:100%;font-weight:bold"><?php echo $Lang == "mal" ? "Bilangan dan keluasan estet terlibat dengan integrasi ternakan" : "Number and area of estates carried out livestock integration"; ?></div>
                <table width="100%" border="1" style="border-collapse:collapse" id="tablecontainerRpt3LiveStock" aria-describedby="integrasiLivestock">
                    <tr style="text-align:center;font-weight:bold">
                        <td width="150" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "Negeri" : "State"; ?></td>
                        <td width="150" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "Bilangan estet" : "Number of estate"; ?></td>
                        <td colspan="3" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah keluasan (Ha)" : "Total area (Ha)"; ?></td>
                        <td width="150" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "Anggaran keluasan (Ha)" : "Estimated Area (Ha)"; ?></td>
                        <td colspan="6" style="padding:2px"><?php echo $Lang == "mal" ? "Bilangan ternakan" : "Number of livestock (heads) (Ha)"; ?></td>
                    </tr>
                    <tr style="text-align:center;font-weight:bold">
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Tidak Matang" : "Immature"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Matang" : "Mature"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah" : "Total"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Lembu" : "Cattle"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Kerbau" : "Buffalo"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Kambing" : "Goat"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Biri-biri" : "Sheep"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Lain-lain" : "Others"; ?></td>
                        <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah" : "Total"; ?></td>
                    </tr>
                    <?php foreach ($State as $key => $val) { ?>
                        <?php
                        if ($key == "SBH" || $key == "SWK" || $key == "ZSMY" || $key == "ZZMY") {
                            continue;
                        }
                        ?>
                        <tr style="text-align:center">
                            <td style="text-align:left;padding:2px"><?php echo ucwords(strtolower($val['Name'])); ?></td>
                            <td style="padding:2px"><span id="L<?php echo $key; ?>" class="LivestockList" style="cursor:pointer;text-decoration:underline"><?php echo $val['LivestockNumber']; ?></span></td>
                            <td style="padding:2px">
                                <?php
                                //xx
                                $immatureAreaState = getImmatureArea($Year, $key, '3,4');
                                echo number_format($immatureAreaState, 2);
                                ?></td>
                            <td style="padding:2px"><?php
                                $matureAreaState = getMatureArea($Year, $key, '3,4');
                                echo number_format($matureAreaState, 2);
                                ?></td>
                            <td style="padding:2px"><?php
                                $totalAreaState = $immatureAreaState + $matureAreaState;
                                echo number_format($totalAreaState, 2);
                                ?></td>
                            <td style="padding:2px"><?php echo number_format($val['LivestockData']['EstimatedArea'], 2, ".", ","); ?></td>
                            <td style="padding:2px"><?php echo $val['LivestockData']['Cattle']; ?></td>
                            <td style="padding:2px"><?php echo $val['LivestockData']['Buffalo']; ?></td>
                            <td style="padding:2px"><?php echo $val['LivestockData']['Goat']; ?></td>
                            <td style="padding:2px"><?php echo $val['LivestockData']['Sheep']; ?></td>
                            <td style="padding:2px"><?php echo $val['LivestockData']['Others']; ?></td>
                            <td style="padding:2px"><?php echo ($val['LivestockData']['Cattle'] + $val['LivestockData']['Buffalo'] + $val['LivestockData']['Goat'] + $val['LivestockData']['Sheep'] + $val['LivestockData']['Others']); ?></td>
                        </tr>
                    <?php } ?>
                    <?php foreach ($State as $key => $val) { ?>
                        <?php
                        if ($key != "SBH" && $key != "SWK" && $key != "ZZMY") {
                            continue;
                        }
                        ?>
                        <tr style="text-align:center">
                            <td style="text-align:left;padding:2px"><?php echo ucwords(strtolower($val['Name'])); ?></td>
                            <td style="padding:2px"><span id="L<?php echo $key; ?>" class="LivestockList" style="cursor:pointer;text-decoration:underline"><?php echo $val['LivestockNumber']; ?></span></td>
                            <td style="padding:2px"><?php
                                //zz
                                $immatureAreaState = getImmatureArea($Year, $key, '3,4');
                                echo number_format($immatureAreaState, 2);
                                ?></td>
                            <td style="padding:2px"><?php
                                $matureAreaState = getMatureArea($Year, $key, '3,4');
                                echo number_format($matureAreaState, 2);
                                ?></td>
                            <td style="padding:2px"><?php
                                $totalAreaState = $immatureAreaState + $matureAreaState;
                                echo number_format($totalAreaState, 2);
                                ?></td>
                            <td style="padding:2px"><?php echo number_format($val['LivestockData']['EstimatedArea'], 2, ".", ","); ?></td>
                            <td style="padding:2px"><?php echo $val['LivestockData']['Cattle']; ?></td>
                            <td style="padding:2px"><?php echo $val['LivestockData']['Buffalo']; ?></td>
                            <td style="padding:2px"><?php echo $val['LivestockData']['Goat']; ?></td>
                            <td style="padding:2px"><?php echo $val['LivestockData']['Sheep']; ?></td>
                            <td style="padding:2px"><?php echo $val['LivestockData']['Others']; ?></td>
                            <td style="padding:2px"><?php echo ($val['LivestockData']['Cattle'] + $val['LivestockData']['Buffalo'] + $val['LivestockData']['Goat'] + $val['LivestockData']['Sheep'] + $val['LivestockData']['Others']); ?></td>
                        </tr>
<?php } ?>
                </table>
                <div align="center">  <br>
                    <button name="create_excel" id="create_excelLiveStock" class="btn btn-success" onclick="exportExcel('containerRpt3LiveStock', '<?php echo $Lang == "mal" ? "Bilangan dan keluasan estet terlibat dengan integrasi ternakan" : "Number and area of estates carried out livestock integration"; ?>')">Create Excel File</button>  
                </div> 
            </div>
            <div id="containerRpt4" style="float:left;width:100%;display:none">
<?php foreach ($State as $key => $val) { ?>
                    <div id="containerRpt4<?php echo $key; ?>" class="containerRpt4" style="float:left;width:100%;display:none">
                        <div style="float:left;width:100%;font-weight:bold"><?php echo $Lang == "mal" ? "Senarai estet terlibat dengan integrasi tanaman - " . ucwords(strtolower($val['Name'])) : "List of estates carried out crops integration - " . ucwords(strtolower($val['Name'])); ?></div>
                        <table width="100%" border="1" style="border-collapse:collapse" id="tablecontainerRpt4<?php echo $key; ?>" aria-describedby="integrasi tanaman">
                            <tr style="text-align:center;font-weight:bold">
                                <td width="30" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "No" : "No"; ?></td>
                                <td width="150" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "Nama estet" : "Estate name"; ?></td>
                                <td width="100" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "No lesen" : "License no"; ?></td>
                                <td colspan="3" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah keluasan" : "Total area"; ?></td>
                                <td colspan="5" style="padding:2px"><?php echo $Lang == "mal" ? "Anggaran keluasan tanaman" : "Estimated planted area"; ?></td>
                            </tr>
                            <tr style="text-align:center;font-weight:bold">
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Tidak Matang" : "Immature"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Matang" : "Mature"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah" : "Total"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Tembikai" : "Watermelon"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Nanas" : "Pineapple"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Keledek" : "Sweet Potatoes"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Pisang" : "Banana"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Lain-lain" : "Others"; ?></td>
                            </tr>
                            <?php
                            $sNo = 1;
                            foreach ($val['EstateCrops'] as $estate) {
                                ?>
                                <tr style="text-align:center">
                                    <td style="padding:2px"><?php echo $sNo; ?></td>
                                    <td style="text-align:left;padding:2px"><?php echo $estate['Name']; ?></td>
                                    <td style="padding:2px"><?php echo $estate['License']; ?></td>
                                    <td style="padding:2px"><?php
                                        //xx
                                        $immatureAreaState = getImmatureArea($Year, $estate['License'], '2,4');
                                        echo number_format($immatureAreaState, 2);
                                        ?></td>
                                    <td style="padding:2px"><?php
                                        $matureAreaState = getMatureArea($Year, $estate['License'], '2,4');
                                        echo number_format($matureAreaState, 2);
                                        ?></td>
                                    <td style="padding:2px"><?php
                                        $totalAreaState = $immatureAreaState + $matureAreaState;
                                        echo number_format($totalAreaState, 2);
                                        ?></td><td style="padding:2px"><?php echo $estate['CropsData']['Watermelon']; ?></td>
                                    <td style="padding:2px"><?php echo $estate['CropsData']['Pineapple']; ?></td>
                                    <td style="padding:2px"><?php echo $estate['CropsData']['SweetPotatoes']; ?></td>
                                    <td style="padding:2px"><?php echo $estate['CropsData']['Banana']; ?></td>
                                    <td style="padding:2px"><?php echo $estate['CropsData']['Others']; ?></td>
                                </tr>
                                <?php
                                $sNo++;
                            }
                            ?>
                        </table>
                        <input type="hidden" name="Year" value="<?php echo $Year; ?>" />
                        <input type="hidden" name="Title" value="<?php echo "List of estates carried out crops integration - " . ucwords(strtolower($val['Name'])); ?>" />
                        <input type="hidden" name="Type" value="1" />
                        <?php
                        $sNo = 1;
                        foreach ($val['EstateCrops'] as $estate) {
                            ?>
                            <input type="hidden" name="Name[]" value="<?php echo $estate['Name']; ?>" />
                            <input type="hidden" name="License[]" value="<?php echo $estate['License']; ?>" />
                            <input type="hidden" name="Immature[]" value="<?php echo number_format($estate['CropsData']['Immature'], 2, ".", ","); ?>" />
                            <input type="hidden" name="Mature[]" value="<?php echo number_format($estate['CropsData']['Mature'], 2, ".", ","); ?>" />
                            <input type="hidden" name="ImmatureMature[]" value="<?php echo number_format($estate['CropsData']['Immature'] + $estate['CropsData']['Immature'], 2, ".", ","); ?>" />
                            <input type="hidden" name="Watermelon[]" value="<?php echo $estate['CropsData']['Watermelon']; ?>" />
                            <input type="hidden" name="Pineapple[]" value="<?php echo $estate['CropsData']['Pineapple']; ?>" />
                            <input type="hidden" name="SweetPotatoes[]" value="<?php echo $estate['CropsData']['SweetPotatoes']; ?>" />
                            <input type="hidden" name="Banana[]" value="<?php echo $estate['CropsData']['Banana']; ?>" />
                            <input type="hidden" name="Others[]" value="<?php echo $estate['CropsData']['Others']; ?>" />
                            <?php
                            $sNo++;
                        }
                        ?><br>
                        <div align="center">  
                            <button name="create_excel<?php echo $key; ?>" id="create_excel<?php echo $key; ?>" class="btn btn-success" onclick="exportExcel('containerRpt4<?php echo $key; ?>', '<?php echo "List of estates carried out crops integration - " . ucwords(strtolower($val['Name'])); ?>')">Create Excel File</button>  
                        </div>                             
                        <div style="float:left;width:100%;padding-top:10px;text-align:center"><input type="button" name="btnBack" id="btnBack" class="btnBackCrops" value="<?php echo $Lang == "mal" ? "Kembali" : "Back"; ?>" /></div>
                    </div>
                <?php } ?>
            </div>
            <div id="containerRpt5" style="float:left;width:100%;display:none">
<?php foreach ($State as $key => $val) { ?>
                    <div id="containerRpt5<?php echo $key; ?>" class="containerRpt5" style="float:left;width:100%;display:none">
                        <div style="float:left;width:100%;font-weight:bold"><?php echo $Lang == "mal" ? "Senarai estet terlibat dengan integrasi ternakan - " . ucwords(strtolower($val['Name'])) : "List of estates carried out livestock integration - " . ucwords(strtolower($val['Name'])); ?></div>
                        <table width="100%" border="1" style="border-collapse:collapse"  id="tablecontainerRpt5<?php echo $key; ?>" aria-describedby="integrasiLiveStockEsate">
                            <tr style="text-align:center;font-weight:bold">
                                <td width="30" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "No" : "No"; ?></td>
                                <td width="150" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "Nama estet" : "Estate name"; ?></td>
                                <td width="100" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "No lesen" : "License no"; ?></td>
                                <td colspan="3" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah keluasan (Ha)" : "Total area (Ha)"; ?></td>
                                <td width="150" rowspan="2" style="padding:2px"><?php echo $Lang == "mal" ? "Anggaran keluasan (Ha)" : "Estimated Area (Ha)"; ?></td>
                                <td colspan="5" style="padding:2px"><?php echo $Lang == "mal" ? "Bilangan ternakan" : "Number of livestock (heads)"; ?></td>
                            </tr>
                            <tr style="text-align:center;font-weight:bold">
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Tidak Matang" : "Immature"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Matang" : "Mature"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Jumlah" : "Total"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Lembu" : "Cattle"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Kerbau" : "Buffalo"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Kambing" : "Goat"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Biri-biri" : "Sheep"; ?></td>
                                <td width="150" style="padding:2px"><?php echo $Lang == "mal" ? "Lain-lain" : "Others"; ?></td>
                            </tr>
                            <?php
                            $sNo = 1;
                            /**echo count($val['EstateLivestock']);
                            //echo "xxxx<br>";
                            //echo sizeof($val['EstateLivestock']);*/
                            foreach ($val['EstateLivestock'] as $estate) {
                                /**echo  $estate['License']."-".$estate['LivestockData']['Cattle'].'<br>';*/
                                ?>
                                <tr style="text-align:center">
                                    <td style="padding:2px"><?php echo $sNo; ?></td>
                                    <td style="text-align:left;padding:2px"><?php echo $estate['Name']; ?></td>
                                    <td style="padding:2px"><?php echo $estate['License']; ?></td>
                                    <td style="padding:2px"><?php
                                        $immatureArea = getImmatureArea($Year, $estate['License'], '3,4');
                                        echo number_format($immatureArea, 2);
                                        ?></td>
                                    <td style="padding:2px"><?php
                                        $matureArea = getMatureArea($Year, $estate['License'], '3,4');
                                        echo number_format($matureArea, 2);
                                        ?></td>
                                    <td style="padding:2px"><?php
                                        $totalArea = $immatureArea + $matureArea;
                                        echo number_format($totalArea, 2);
                                        ?></td>
                                    <td style="padding:2px"><?php echo number_format($estate['LivestockData']['EstimatedArea'], 2, ".", ","); ?></td>
                                    <td style="padding:2px">
                                        <?php
                                        $cattle = getTotalLiveStock(5, 2, $Year, $estate['License']);
                                        echo number_format($cattle);
                                        ?></td>
                                    <td style="padding:2px"><?php 
                                    $buffalo = getTotalLiveStock(6, 2, $Year, $estate['License']);
                                        echo number_format($buffalo);
                                    ?></td>
                                    <td style="padding:2px"><?php 
                                     $goat = getTotalLiveStock(7, 2, $Year, $estate['License']);
                                        echo number_format($goat); ?></td>
                                    <td style="padding:2px"><?php
                                     $sheep = getTotalLiveStock(8, 2, $Year, $estate['License']);
                                        echo number_format($sheep); ?></td>
                                    <td style="padding:2px"><?php 
                                    
                                      $others = getTotalLiveStock('IS NULL', 2, $Year, $estate['License']);
                                        echo number_format($others);
                                   ?></td>
                                </tr>
                                <?php
                                $sNo++;
                            }
                            ?>
                        </table>
                        <input type="hidden" name="Year" value="<?php echo $Year; ?>" />
                        <input type="hidden" name="Title" value="<?php echo "List of estates carried out livestock integration - " . ucwords(strtolower($val['Name'])); ?>" />
                        <input type="hidden" name="Type" value="2" />
                        <?php
                        $sNo = 1;
                        foreach ($val['EstateLivestock'] as $estate) {
                            ?>
                            <input type="hidden" name="Name[]" value="<?php echo $estate['Name']; ?>" />
                            <input type="hidden" name="License[]" value="<?php echo $estate['License']; ?>" />
                            <input type="hidden" name="Immature[]" value="<?php echo number_format($estate['LivestockData']['Immature'], 2, ".", ","); ?>" />
                            <input type="hidden" name="Mature[]" value="<?php echo number_format($estate['LivestockData']['Mature'], 2, ".", ","); ?>" />
                            <input type="hidden" name="ImmatureMature[]" value="<?php echo number_format($estate['LivestockData']['Immature'] + $estate['LivestockData']['Immature'], 2, ".", ","); ?>" />
                            <input type="hidden" name="EstimatedArea[]" value="<?php echo $estate['LivestockData']['EstimatedArea']; ?>" />
                            <input type="hidden" name="Cattle[]" value="<?php echo $estate['LivestockData']['Cattle']; ?>" />
                            <input type="hidden" name="Buffalo[]" value="<?php echo $estate['LivestockData']['Buffalo']; ?>" />
                            <input type="hidden" name="Goat[]" value="<?php echo $estate['LivestockData']['Goat']; ?>" />
                            <input type="hidden" name="Sheep[]" value="<?php echo $estate['LivestockData']['Sheep']; ?>" />
                            <input type="hidden" name="Others[]" value="<?php echo $estate['LivestockData']['Others']; ?>" />
                            <?php
                            $sNo++;
                        }
                        ?>  
                        <div align="center">  <br>
                            <button name="create_excel" id="create_excel<?php echo $key; ?>" class="btn btn-success" onclick="exportExcel('containerRpt5<?php echo $key; ?>', '<?php echo "List of estates carried out livestock integration - " . ucwords(strtolower($val['Name'])); ?>')">Create Excel File</button>  
                        </div> 
                        <div style="float:left;width:100%;padding-top:10px;text-align:center"><input type="button" name="btnBack" id="btnBack" class="btnBackLivestock" value="<?php echo $Lang == "mal" ? "Kembali" : "Back"; ?>" /></div>
                    </div>
<?php } ?>
            </div>
        </td>
        </td>
</table>
<script language="javascript">
    $(function () {
        $(".rptclick").click(function () {
            var id = $(this).attr("id").substr(3);
            $(".rptclick").each(function (i, e) {
                var cid = $(this).attr("id").substr(3);
                if (cid != id)
                    $("#containerRpt" + cid).hide();
            });
            $("#containerRpt" + id).show();
            $(".containerRpt4").each(function (i, e) {
                $(this).hide();
            });
            $(".containerRpt5").each(function (i, e) {
                $(this).hide();
            });
        });

        $(".CropsList").click(function () {
            var id = $(this).attr("id").substr(1);
            $(".containerRpt4").each(function (i, e) {
                var cid = $(this).attr("id").substr(1);
                if (cid != id)
                    $(this).hide();
            });
            $("#containerRpt4").show();
            $("#containerRpt4" + id).show();
            $("#containerRpt2").hide();
        });

        $(".LivestockList").click(function () {
            var id = $(this).attr("id").substr(1);
            $(".containerRpt5").each(function (i, e) {
                var cid = $(this).attr("id").substr(1);
                if (cid != id)
                    $(this).hide();
            });
            $("#containerRpt5").show();
            $("#containerRpt5" + id).show();
            $("#containerRpt3").hide();
        });

        $(".btnBackCrops").click(function () {
            $("#containerRpt2").show();
            $("#containerRpt4").hide();
            $(".containerRpt4").each(function (i, e) {
                $(this).hide();
            });
        });

        $(".btnBackLivestock").click(function () {
            $("#containerRpt3").show();
            $("#containerRpt5").hide();
            $(".containerRpt5").each(function (i, e) {
                $(this).hide();
            });
        });

        $(".toExcel").click(function () {
            var id = $(this).attr("id").substring(1);
            $("#" + id).submit();
        });
    });
</script>


<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="../libs/js-xlsx/xlsx.core.min.js"></script>
    <script type="text/javascript" src="../libs/FileSaver/FileSaver.min.js"></script> 
    <script type="text/javascript" src="../libs/tableExport.js"></script>
    <script type="text/javascript">   
        
      
        function exportExcel(container, title){
          
           $('#table' + container).tableExport({fileName: title,
                        type: 'xlsx'
                       });
        }
    </script>



