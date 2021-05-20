<?php

// by Luke Artanis Cloud - 15/4/2021
include('baju_merah.php');
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

set_time_limit(0);
extract($_REQUEST);
$tahunsub2 = date('Y') - 1;
$tableesub2 = "esub_" . $tahunsub2;

// by Luke Artanis Cloud - 25/4/2021
function truncateTable(String $table)
{
    $con = connect();

    $query = "TRUNCATE TABLE $table";

    if (!mysqli_query($con, $query)) {
        throw new Exception("truncateTable : Error description: " . $con->error . "<br>");
    }
}

function deleteEsub()
{
    $con = connect();

    $lastYear = date('Y') - 1;
    $esubLastYear = "esub_" . $lastYear;

    $queryEsubLastYear = "SELECT count(*) as total
                FROM information_schema.TABLES
                WHERE  (TABLE_NAME = '$esubLastYear');";

    $queryEsubLastYear = mysqli_query($con, $queryEsubLastYear);
    $row = mysqli_fetch_array($queryEsubLastYear);

    if ($row['total'] === 0) {
        $warning = "No data duplicate yet for last year. Please run <b>Duplicate e-SUB for New Year</b> before continue upload new data e-SUB";
        throw new Exception("deleteEsub : Error description: " . $warning . "<br>");
    }

    truncateTable('esub');
}

function deleteEstateLogin(String $nolesen)
{
    $con = connect();
    $nolesen = implode("-", str_split($nolesen, 6));

    $query = "DELETE FROM login_estate WHERE lesen = '$nolesen'";
    if (!mysqli_query($con, $query)) {
        throw new Exception("deleteEstateLogin : Error description: " . $con->error . "<br>");
    }
}

function deleteMillLogin(String $nolesen)
{
    $con = connect();
    // $nolesen = implode("-", str_split($nolesen, 6));

    $query = "DELETE FROM login_mill WHERE lesen = '$nolesen'";
    if (!mysqli_query($con, $query)) {
        throw new Exception("deleteMillLogin : Error description: " . $con->error . "<br>");
    }
}

function insertDataProfileLicensee(Object $estate)
{
    $con = connect();

    $nolesen = implode("-", str_split($estate->nolesen, 6));
    $namapelesen = $con->real_escape_string($estate->namapelesen);
    $alamatsurat1 = $con->real_escape_string($estate->alamatsurat1);
    $alamatsurat2 = $con->real_escape_string($estate->alamatsurat2);
    $poskod = $con->real_escape_string($estate->poskod);
    $bandar = $con->real_escape_string($estate->bandar);
    $negeri = $con->real_escape_string($estate->negeri);
    $negeripremis = $con->real_escape_string($estate->negeripremis);
    $daerahpremis = $con->real_escape_string($estate->daerahpremis);

    $query = "INSERT INTO esub "
        . "(Nama_Estet, "
        . "No_Lesen, "
        . "No_Lesen_Baru, "
        . "Alamat1, "
        . "Alamat2, "
        . "Poskod, "
        . "Bandar, "
        . "Negeri, "
        . "Negeri_Premis, "
        . "Daerah_Premis) "
        . "VALUES "
        . "('$namapelesen', "
        . "'$nolesen', "
        . "'$nolesen', "
        . "'$alamatsurat1', "
        . "'$alamatsurat2', "
        . "'$poskod', "
        . "'$bandar', "
        . "'$negeri', "
        . "'$negeripremis', "
        . "'$daerahpremis' "
        . ")";

    if (!mysqli_query($con, $query)) {
        throw new Exception("insertDataProfileLicensee : Error description: " . $con->error . "<br>");
    }
}

function insertMillData(Object $mill)
{
    $con = connect();

    $no_lesen = $con->real_escape_string($mill->no_lesen);
    $nama_kilang = $con->real_escape_string($mill->nama_kilang);
    $nama_negeri = $con->real_escape_string($mill->nama_negeri);
    $bulan = $con->real_escape_string($mill->bulan);
    $bulan = ltrim($bulan, '0');
    $tahun = $con->real_escape_string($mill->tahun);
    $ffb_proses = $con->real_escape_string($mill->ffb_proses);
    $estet_sendiri = $con->real_escape_string($mill->estet_sendiri);
    $lain_lain = $con->real_escape_string($mill->lain_lain);
    $pengeluaran_CPO = $con->real_escape_string($mill->pengeluaran_CPO);
    $pengeluaran_PK = $con->real_escape_string($mill->pengeluaran_PK);

    $query = "INSERT INTO ekilang "
        . "(NO_LESEN, "
        . "NAMA_KILANG,"
        . " NEGERI,"
        . " BULAN,"
        . " TAHUN,"
        . " FFB_PROSES,"
        . " ESTET_SENDIRI,"
        . " LAIN,"
        . " PENGELUARAN_CPO,"
        . " PENGELUARAN_PK"
        . ") VALUES ("
        . " '$no_lesen',"
        . " '$nama_kilang',"
        . " '$nama_negeri',"
        . " '$bulan',"
        . " '$tahun',"
        . " '$ffb_proses',"
        . " '$estet_sendiri',"
        . " '$lain_lain',"
        . " '$pengeluaran_CPO',"
        . " '$pengeluaran_PK'"
        . ");";

    if (!mysqli_query($con, $query)) {
        throw new Exception("insertMillData : Error description: " . $con->error . "<br>");
    }
}

function insertLoginEstate(String $nolesen)
{
    $con = connect();

    $defaultpassword = substr($nolesen, 0, 6);
    $defaultpassword = password_hash($defaultpassword, PASSWORD_BCRYPT);

    $nolesen = implode("-", str_split($nolesen, 6));

    $query_login = "INSERT INTO login_estate "
        . "(lesen, "
        . "`password`, "
        . "firsttime) "
        . "VALUES "
        . "('$nolesen', "
        . "'$defaultpassword', "
        . "'1'"
        . ")";

    if (!mysqli_query($con, $query_login)) {
        throw new Exception("insertLoginEstate : Error description: " . $con->error . "<br>");
    }
}

function insertLoginMill(String $nolesen)
{
    $con = connect();

    // $defaultpassword = substr($nolesen, 0, 6);
    $defaultpassword = 'kilang';
    $defaultpassword = password_hash($defaultpassword, PASSWORD_BCRYPT);

    $query_login = "INSERT INTO login_mill "
        . "(lesen, "
        . "`password`, "
        . "firsttime) "
        . "VALUES "
        . "('$nolesen', "
        . "'$defaultpassword', "
        . "'1'"
        . ")";

    if (!mysqli_query($con, $query_login)) {
        throw new Exception("insertLoginMill : Error description: " . $con->error . "<br>");
    }
}

function checkIfTableExistFFB()
{
    $con = connect();

    $lastYear = date('Y') - 1;
    $ffbLastYear = "fbb_production" . $lastYear;
    $ffbCurrentYear = "fbb_production";

    $queryFFBLastYear = "SHOW TABLES LIKE '$ffbLastYear'";

    $queryFFBLastYear = mysqli_query($con, $queryFFBLastYear);

    $table_exists = mysqli_num_rows($queryFFBLastYear) > 0;
    if ($table_exists == 0) { //if table last year not exist

        $query = "CREATE TABLE $ffbLastYear ("
            . "`bil` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  "
            . "`nama` varchar(255) DEFAULT NULL,  "
            . "`lesen` varchar(255) DEFAULT NULL,  "
            . "`negeri` varchar(255) DEFAULT NULL,  "
            . "`daerah` varchar(255) DEFAULT NULL,  "
            . "`jumlah_pengeluaran` varchar(255) DEFAULT NULL,  "
            . "`purata_hasil_buah` varchar(255) DEFAULT NULL,  KEY `lesen` (`lesen`)) "
            . "ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        if (!mysqli_query($con, $query)) {
            throw new Exception("checkIfTableExistFFB CreateTable : Error description: " . $con->error . "<br>");
        } else {
            //migrate data to last year table
            $query = "INSERT INTO $ffbLastYear "
                . " SELECT * FROM $ffbCurrentYear ; ";

            if (!mysqli_query($con, $query)) {
                throw new Exception("checkIfTableExistFFB InsertInto : Error description: " . $con->error . "<br>");
            }
        }
    } else {
        truncateTable($ffbCurrentYear);
    }
}

function insertTotalYieldFFB(Object $estate)
{
    $con = connect();

    $nolesen = implode("-", str_split($estate->nolesen, 6));
    $namapelesen = $con->real_escape_string($estate->namapelesen);
    $purata_hasil_buah = $estate->jumlah_hasil / 12;

    $select = "SELECT Negeri_Premis, Daerah_Premis FROM esub WHERE No_Lesen_Baru = '$nolesen'";
    if (!$rows = mysqli_query($con, $select)) {
        throw new Exception("select esub for FFb : Error description: " . $con->error . "<br>");
    }
    while ($row = $rows->fetch_assoc()) {
        $negeri = $row['Negeri_Premis'];
        $daerah = $row['Daerah_Premis'];

        $query = "INSERT INTO fbb_production "
            . "("
            . "`nama`, "
            . "`lesen`, "
            . "`negeri`, "
            . "`daerah`, "
            . "`jumlah_pengeluaran`, "
            . "`purata_hasil_buah`)"
            . " VALUES ("
            . "'$namapelesen', "
            . "'$nolesen', "
            . "'$negeri', "
            . "'$daerah', "
            . "'$estate->jumlah_hasil', "
            . "'$purata_hasil_buah'"
            . ")";

        if (!mysqli_query($con, $query)) {
            throw new Exception("insertDataProfileLicensee : Error description: " . $con->error . "<br>");
            break;
        }
    }
}

function checkIfTableExistTanamBaru()
{
    $con = connect();

    $lastYear = substr(date('Y') - 1, -2);

    $table = "tanam_baru" . $lastYear;

    $queryTable = "SHOW TABLES LIKE '$table'";

    $queryTable = mysqli_query($con, $queryTable);

    $table_exists = mysqli_num_rows($queryTable) > 0;

    if ($table_exists == 0) { //if table last year not exist

        $query = "CREATE TABLE $table ("
            . "`bil` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  "
            . "`nama_estet` varchar(255) DEFAULT NULL,  "
            . "`lesen` varchar(255) DEFAULT NULL,  "
            . "`negeri` varchar(255) DEFAULT NULL,  "
            . "`daerah` varchar(255) DEFAULT NULL,  "
            . "`bulan` varchar(255) DEFAULT NULL,  "
            . "`tanaman_baru` varchar(255) DEFAULT NULL,  "
            . "KEY `lesen` (`lesen`) , KEY `bulan` (`bulan`) USING BTREE) "
            . "ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        if (!mysqli_query($con, $query)) {
            throw new Exception("checkIfTableExistTanamBaru CreateTable : Error description: " . $con->error . "<br>");
        }
    } else {
        truncateTable($table);
    }
}

function checkIfTableExistTanamSemula()
{
    $con = connect();

    $lastYear = substr(date('Y') - 1, -2);

    $table = "tanam_semula" . $lastYear;

    $queryTable = "SHOW TABLES LIKE '$table'";

    $queryTable = mysqli_query($con, $queryTable);

    $table_exists = mysqli_num_rows($queryTable) > 0;

    if ($table_exists == 0) { //if table last year not exist

        $query = "CREATE TABLE $table ("
            . "`bil` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  "
            . "`nama_estet` varchar(255) DEFAULT NULL,  "
            . "`lesen` varchar(255) DEFAULT NULL,  "
            . "`negeri` varchar(255) DEFAULT NULL,  "
            . "`daerah` varchar(255) DEFAULT NULL,  "
            . "`bulan` varchar(255) DEFAULT NULL,  "
            . "`tanaman_semula` varchar(255) DEFAULT NULL,  "
            . "KEY `lesen` (`lesen`) , KEY `bulan` (`bulan`) USING BTREE) "
            . "ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        if (!mysqli_query($con, $query)) {
            throw new Exception("checkIfTableExistTanamSemula CreateTable : Error description: " . $con->error . "<br>");
        }
    } else {
        truncateTable($table);
    }
}

function checkIfTableExistTanamTukar()
{
    $con = connect();

    $lastYear = substr(date('Y') - 1, -2);

    $table = "tanam_tukar" . $lastYear;

    $queryTable = "SHOW TABLES LIKE '$table'";

    $queryTable = mysqli_query($con, $queryTable);

    $table_exists = mysqli_num_rows($queryTable) > 0;

    if ($table_exists == 0) { //if table last year not exist

        $query = "CREATE TABLE $table ("
            . "`bil` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  "
            . "`nama_estet` varchar(255) DEFAULT NULL,  "
            . "`lesen` varchar(255) DEFAULT NULL,  "
            . "`negeri` varchar(255) DEFAULT NULL,  "
            . "`daerah` varchar(255) DEFAULT NULL,  "
            . "`bulan` varchar(255) DEFAULT NULL,  "
            . "`tanaman_tukar` varchar(255) DEFAULT NULL,  "
            . "KEY `lesen` (`lesen`) , KEY `bulan` (`bulan`) USING BTREE) "
            . "ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        if (!mysqli_query($con, $query)) {
            throw new Exception("checkIfTableExistTanamSemula CreateTable : Error description: " . $con->error . "<br>");
        }
    } else {
        truncateTable($table);
    }
}

function insertTanamanBaru(Object $estate)
{
    $con = connect();

    $lastYear = substr(date('Y') - 1, -2);
    $table = "tanam_baru" . $lastYear;

    $nolesen = implode("-", str_split($estate->nolesen, 6));
    $namapelesen = $con->real_escape_string($estate->namapelesen);

    $select = "SELECT Negeri_Premis, Daerah_Premis FROM esub WHERE No_Lesen_Baru = '$nolesen'";
    if (!$rows = mysqli_query($con, $select)) {
        throw new Exception("select esub for insertTanamanBaru : Error description: " . $con->error . "<br>");
    }
    while ($row = $rows->fetch_assoc()) {
        $negeri = $row['Negeri_Premis'];
        $daerah = $row['Daerah_Premis'];
        $bulan = substr($estate->bulantahun, -2);

        $query = "INSERT INTO $table "
            . "("
            . "`nama_estet`, "
            . "`lesen`, "
            . "`negeri`, "
            . "`daerah`, "
            . "`bulan`, "
            . "`tanaman_baru`) "
            . " VALUES ("
            . "'$namapelesen', "
            . "'$nolesen', "
            . "'$negeri', "
            . "'$daerah', "
            . "'$bulan', "
            . "'$estate->tanamanbaru'"
            . ")";

        if (!mysqli_query($con, $query)) {
            throw new Exception("insertTanamanBaru : Error description: " . $con->error . "<br>");
            break;
        }
    }
}

function insertTanamanSemula(Object $estate)
{
    $con = connect();

    $lastYear = substr(date('Y') - 1, -2);
    $table = "tanam_semula" . $lastYear;

    $nolesen = implode("-", str_split($estate->nolesen, 6));
    $namapelesen = $con->real_escape_string($estate->namapelesen);

    $select = "SELECT Negeri_Premis, Daerah_Premis FROM esub WHERE No_Lesen_Baru = '$nolesen'";
    if (!$rows = mysqli_query($con, $select)) {
        throw new Exception("select esub for insertTanamanSemula : Error description: " . $con->error . "<br>");
    }
    while ($row = $rows->fetch_assoc()) {
        $negeri = $row['Negeri_Premis'];
        $daerah = $row['Daerah_Premis'];
        $bulan = substr($estate->bulantahun, -2);

        $query = "INSERT INTO $table "
            . "("
            . "`nama_estet`, "
            . "`lesen`, "
            . "`negeri`, "
            . "`daerah`, "
            . "`bulan`, "
            . "`tanaman_semula`) "
            . " VALUES ("
            . "'$namapelesen', "
            . "'$nolesen', "
            . "'$negeri', "
            . "'$daerah', "
            . "'$bulan', "
            . "'$estate->tanamansemula'"
            . ")";

        if (!mysqli_query($con, $query)) {
            throw new Exception("insertTanamanSemula : Error description: " . $con->error . "<br>");
            break;
        }
    }
}

function insertTanamanTukar(Object $estate)
{
    $con = connect();

    $lastYear = substr(date('Y') - 1, -2);
    $table = "tanam_tukar" . $lastYear;

    $nolesen = implode("-", str_split($estate->nolesen, 6));
    $namapelesen = $con->real_escape_string($estate->namapelesen);

    $select = "SELECT Negeri_Premis, Daerah_Premis FROM esub WHERE No_Lesen_Baru = '$nolesen'";
    if (!$rows = mysqli_query($con, $select)) {
        throw new Exception("select esub for insertTanamanTukar : Error description: " . $con->error . "<br>");
    }
    while ($row = $rows->fetch_assoc()) {
        $negeri = $row['Negeri_Premis'];
        $daerah = $row['Daerah_Premis'];
        $bulan = substr($estate->bulantahun, -2);

        $query = "INSERT INTO $table "
            . "("
            . "`nama_estet`, "
            . "`lesen`, "
            . "`negeri`, "
            . "`daerah`, "
            . "`bulan`, "
            . "`tanaman_tukar`) "
            . " VALUES ("
            . "'$namapelesen', "
            . "'$nolesen', "
            . "'$negeri', "
            . "'$daerah', "
            . "'$bulan', "
            . "'$estate->pertukarantanaan'"
            . ")";

        if (!mysqli_query($con, $query)) {
            throw new Exception("insertTanamanTukar : Error description: " . $con->error . "<br>");
            break;
        }
    }
}

function calculateTanaman($type, $tahun, $nolesen)
{
    $con = connect();
    // $tahun = $tahun + 1;
    $pertama = $tahun - 3;
    $kedua = $tahun - 2;
    $ketiga = $tahun - 1;

    $pertama = substr($pertama, -2);
    $kedua = substr($kedua, -2);
    $ketiga = substr($ketiga, -2);
    $nolesen = implode("-", str_split($nolesen, 6));

    $query = "select sum(jumlah) as total from "
        . "(select sum(tanaman_$type) as jumlah FROM tanam_$type$pertama where lesen ='$nolesen' "
        . "union select sum(tanaman_$type) as jumlah FROM tanam_$type$kedua   where lesen ='$nolesen' "
        . "union select sum(tanaman_$type) as jumlah FROM tanam_$type$ketiga where lesen ='$nolesen' ) as aa ; ";
    //echo $q . "<br>";
    if (!$rows = mysqli_query($con, $query)) {
        throw new Exception("calculateTanaman : Error description: " . $con->error . "<br>");
    }

    $row = mysqli_fetch_array($rows);

    return $row['total'] ?? 0;
}

function updateEsub($nolesen, $table, $value, $column)
{
    $con = connect();
    $nolesen = implode("-", str_split($nolesen, 6));
    $value = str_replace(',', '', $value);

    $query_esub_last_year = "UPDATE $table SET $column =$value "
        . "WHERE "
        . " No_Lesen_Baru='$nolesen'  "
        . " LIMIT 1";

    $query_esub = "UPDATE esub SET $column =$value "
        . "WHERE "
        . " No_Lesen_Baru='$nolesen'  "
        . " LIMIT 1";

    if (!mysqli_query($con, $query_esub_last_year)) {
        throw new Exception("updateEsub - query_esub_last_year : Error description: " . $con->error . "<br>");
    }
    if (!mysqli_query($con, $query_esub)) {
        throw new Exception("updateEsub - query_esub : Error description: " . $con->error . "<br>");
    }
}

function apiPullProfile()
{
    // Get the contents of the JSON file url
    $json = file_get_contents('http://10.0.2.160/index.php?val=26&key=t5@dr010&pass=rwe3@486');
    $estates = json_decode($json);

    // Get the contents of the JSON file 
    // $strJsonFileContents = file_get_contents("data/26.json");
    // var_dump($strJsonFileContents); // show contents
    // $estates = json_decode($strJsonFileContents);

    try {
        deleteEsub();
    } catch (Exception $e) {
        print('Caught exception: ' .  $e->getMessage() . "\n");
    }

    foreach ($estates as $estate) {
        try {
            deleteEstateLogin($estate->nolesen); //revise
            insertDataProfileLicensee($estate);
            insertLoginEstate($estate->nolesen);
        } catch (Exception $e) {
            print('Caught exception: ' .  $e->getMessage() . "\n");
            exit;
        }
    }
}

function apiPullTotalYieldFFB() //need revise ? ask user is this correct
{
    // Get the contents of the JSON file url
    $json = file_get_contents('http://10.0.2.160/index.php?val=25&key=t5@dr010&pass=rwe3@486');
    $estates = json_decode($json);

    // Get the contents of the JSON file 
    // $strJsonFileContents = file_get_contents("data/25.json");
    // var_dump($strJsonFileContents); // show contents
    // $estates = json_decode($strJsonFileContents);

    try {
        checkIfTableExistFFB();
    } catch (Exception $e) {
        print('Caught exception: ' .  $e->getMessage() . "\n");
    }

    foreach ($estates as $estate) {
        try {
            echo $estate->nolesen;
            insertTotalYieldFFB($estate); // review purata_hasil_buah
        } catch (Exception $e) {
            print('Caught exception: ' .  $e->getMessage() . "\n");
            exit;
        }
    }
}

function apiPullImmaturedArea()
{
    // Get the contents of the JSON file url
    $json = file_get_contents('http://10.0.2.160/index.php?val=24&key=t5@dr010&pass=rwe3@486');
    $estates = json_decode($json);

    // Get the contents of the JSON file 
    // $strJsonFileContents = file_get_contents("data/24.json");
    // var_dump($strJsonFileContents); // show contents
    // $estates = json_decode($strJsonFileContents);

    try {
        checkIfTableExistTanamBaru();
        checkIfTableExistTanamSemula();
        checkIfTableExistTanamTukar();
    } catch (Exception $e) {
        print('Caught exception: ' .  $e->getMessage() . "\n");
    }

    foreach ($estates as $estate) {
        try {

            insertTanamanBaru($estate);
            insertTanamanSemula($estate);
            insertTanamanTukar($estate);

            $totalSemula = calculateTanaman("semula", date('Y'), $estate->nolesen);
            $totalBaru = calculateTanaman("baru", date('Y'), $estate->nolesen);
            $totalTukar = calculateTanaman("tukar", date('Y'), $estate->nolesen);

            $tahun = date('Y') - 1;
            $esub = "esub_" . $tahun;

            $totalBelumBerhasil = $totalSemula + $totalBaru + $totalTukar;
            updateEsub($estate->nolesen, $esub, $totalBelumBerhasil, 'Belum_Berhasil');
        } catch (Exception $e) {
            print('Caught exception: ' .  $e->getMessage() . "\n");
            exit;
        }
    }
}

function apiPullLastMonthMaturedArea() // masuk dalam esub - berhasil
{
    // Get the contents of the JSON file url
    $json = file_get_contents('http://10.0.2.160/index.php?val=22&key=t5@dr010&pass=rwe3@486');
    $estates = json_decode($json);

    // Get the contents of the JSON file 
    // $strJsonFileContents = file_get_contents("data/22.json");
    // var_dump($strJsonFileContents); // show contents
    // $estates = json_decode($strJsonFileContents);

    foreach ($estates as $estate) {
        try {
            $tahun = date('Y') - 1;
            $esub = "esub_" . $tahun;
            updateEsub($estate->nolesen, $esub, $estate->lastmth_keluasanberhasil, 'Berhasil');
        } catch (Exception $e) {
            print('Caught exception: ' .  $e->getMessage() . "\n");
            exit;
        }
    }
}

function apiPullAvgMatured() // masuk dalam esub - keluasan yang dituai
{
    // Get the contents of the JSON file url
    $json = file_get_contents('http://10.0.2.160/index.php?val=23&key=t5@dr010&pass=rwe3@486');
    $estates = json_decode($json);

    // Get the contents of the JSON file 
    // $strJsonFileContents = file_get_contents("data/23.json");
    // var_dump($strJsonFileContents); // show contents
    // $estates = json_decode($strJsonFileContents);

    foreach ($estates as $estate) {
        try {
            $tahun = date('Y') - 1;
            $esub = "esub_" . $tahun;
            updateEsub($estate->nolesen, $esub, $estate->purata_keluasanberhasil, 'Keluasan_Yang_Dituai');
        } catch (Exception $e) {
            print('Caught exception: ' .  $e->getMessage() . "\n");
            exit;
        }
    }
}

function apiPullMillData()
{
    // Get the contents of the JSON file url
    $json = file_get_contents('http://10.0.2.160/index.php?val=21&key=t5@dr010&pass=rwe3@486');
    $mills = json_decode($json);

    // Get the contents of the JSON file 
    // $strJsonFileContents = file_get_contents("data/21.json");
    // var_dump($strJsonFileContents); // show contents
    // $mills = json_decode($strJsonFileContents);

    foreach ($mills as $mill) {
        try {
            // if($mill->no_lesen == '500008704000'){
            //     print('<br>');
            //     print($mill->no_lesen);
            //     print(' : ');
            //     print($mill->nama_kilang);
            //     print(' : ');
            //     print($mill->bulan);
            //     print('<br>');
            // }

            deleteMillLogin($mill->no_lesen); //revise
            insertMillData($mill);
            insertLoginMill($mill->no_lesen);
        } catch (Exception $e) {
            print('Caught exception: ' .  $e->getMessage() . "\n");
            exit;
        }
    }
}
//end of by Luke Artanis Cloud - 25/4/2021


$qacreate = "SELECT count(*) as total
FROM information_schema.TABLES
WHERE  (TABLE_NAME = '$tableesub2');";
$rqa = mysqli_query($con, $qacreate);
$rowsub = mysqli_fetch_array($rqa);
//echo "tbale".$rowsub['total'];
$warning = "";
if ($rowsub['total'] === 0) {
    $warning = "No data duplicate yet for last year. Please run <b>Duplicate e-SUB for New Year</b> before continue upload new data e-SUB";
}


//by Luke Artanis Cloud - 25/4/2021
if (isset($_POST["submit_esub_1"])) {

    /* start of captcha validation */
    if ($captcha != $captchasession) {
        echo "<html><script language='javascript'>alert('Invalid CAPTCHA Code! You have entered :" . $captcha . " instead of " . $captchasession . " '); location.href='home.php?id=config&sub=admin_upload_esub';</script></html>";
    }
    /* end of captcha validation */

    // run API
    apiPullProfile();

?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Estates' Info has been imported into the database.
    </div>
<?php

} elseif (isset($_POST["submit_esub_2"])) {

    /* start of captcha validation */
    if ($captcha != $captchasession) {
        echo "<html><script language='javascript'>alert('Invalid CAPTCHA Code! You have entered :" . $captcha . " instead of " . $captchasession . " '); location.href='home.php?id=config&sub=admin_upload_esub';</script></html>";
    }
    /* end of captcha validation */

    // run API
    apiPullTotalYieldFFB();

?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Yield FFB has been imported into the database.
    </div>
<?php

} elseif (isset($_POST["submit_esub_3"])) {

    /* start of captcha validation */
    if ($captcha != $captchasession) {
        echo "<html><script language='javascript'>alert('Invalid CAPTCHA Code! You have entered :" . $captcha . " instead of " . $captchasession . " '); location.href='home.php?id=config&sub=admin_upload_esub';</script></html>";
    }
    /* end of captcha validation */

    // run API
    apiPullImmaturedArea();

?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Immature Data has been imported into the database.
    </div>
<?php

} elseif (isset($_POST["submit_esub_4"])) {

    /* start of captcha validation */
    if ($captcha != $captchasession) {
        echo "<html><script language='javascript'>alert('Invalid CAPTCHA Code! You have entered :" . $captcha . " instead of " . $captchasession . " '); location.href='home.php?id=config&sub=admin_upload_esub';</script></html>";
    }
    /* end of captcha validation */

    // run API
    apiPullLastMonthMaturedArea();

?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Mature Data has been imported into the database.
    </div>
<?php

} elseif (isset($_POST["submit_esub_5"])) {

    /* start of captcha validation */
    if ($captcha != $captchasession) {
        echo "<html><script language='javascript'>alert('Invalid CAPTCHA Code! You have entered :" . $captcha . " instead of " . $captchasession . " '); location.href='home.php?id=config&sub=admin_upload_esub';</script></html>";
    }
    /* end of captcha validation */

    // run API
    apiPullAvgMatured();

?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Average Mature Data has been imported into the database.
    </div>
<?php

} elseif (isset($_POST["submit_ekilang"])) {

    /* start of captcha validation */
    if ($captcha != $captchasession) {
        echo "<html><script language='javascript'>alert('Invalid CAPTCHA Code! You have entered :" . $captcha . " instead of " . $captchasession . " '); location.href='home.php?id=config&sub=admin_upload_esub';</script></html>";
    }
    /* end of captcha validation */

    // run API
    apiPullMillData();

?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        eKilang Data has been imported into the database.
    </div>
<?php

}
//end of by Luke Artanis Cloud - 25/4/2021
?>