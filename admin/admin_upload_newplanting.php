<?php
include('baju_merah.php');
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

function updateesub($nolesen, $table, $column, $value) {
    $con = connect();
    $set = 0;
    $qupdate = "UPDATE $table SET $column='$value' "
            . "WHERE "
            . " No_Lesen_Baru='$nolesen'  "
            . " LIMIT 1";
    //echo "<br>".$qupdate; 
    mysql_query($qupdate, $con);
    if (mysql_affected_rows()) {
        $set = 1;
    }
    return $set;
}

function getKiraan($type, $tahun_esub, $nolesen) {
    $total = 0;
    $con = connect();
    $tahun = $tahun_esub + 1;
    $pertama = $tahun - 3;
    $kedua = $tahun - 2;
    $ketiga = $tahun - 1;
    $pertama = substr($pertama, -2);
    $kedua = substr($kedua, -2);
    $ketiga = substr($ketiga, -2);

    $q = "select sum(jumlah) as total from "
            . "(select sum(tanaman_$type) as jumlah FROM tanam_$type$pertama where lesen ='$nolesen' "
            . "union select sum(tanaman_$type) as jumlah FROM tanam_$type$kedua   where lesen ='$nolesen' "
            . "union select sum(tanaman_$type) as jumlah FROM tanam_$type$ketiga where lesen ='$nolesen' ) as aa ; ";
    //echo $q . "<br>";
    $r = mysql_query($q, $con);
    $row = mysql_fetch_array($r);
    $total = $row['total'];
    return $total;
}
?> 
<form name="import" method="post" enctype="multipart/form-data"><br />
    <h2>Upload Excel File New Planting (Tanam Baru)</h2>
    <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> <span class="ui-icon ui-icon-info" style="float: left; margin-right: 1em;"></span>
        <strong>Note : </strong> Follow this step below to upload your excel file to database. <br>
        <br />  1. Use this template <a href="template/tanam_baru.csv"><strong>here</strong></a>, and fill all data according to column name. Refer <a href="template/tanam_baru-sample.csv"><strong>here</strong></a> if you need sample data.<br />
        2. Select <strong>year</strong> to be upload and click <strong>submit</strong>.</div>
    <br />
    <table width="80%" align="center" >


        <tr>
            <td><strong>Select Year</strong></td>
            <td><strong>:</strong></td>
            <td><select name="tahun_estate" id="tahun_estate">
                    <option value="<?= date('Y') ?>"><?= date('Y') ?></option>

                </select>&nbsp;</td>
        </tr>
        <tr>
            <td width="13%"><strong>Excel File</strong></td>
            <td width="1%"><strong>:</strong></td>
            <td width="86%"><input type="file" name="file" /></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><img src="<?php echo $_SESSION['captcha']['image_src']; ?>" alt="CAPTCHA code">
                <input name="captchasession" type="hidden" id="captchasession" size="20" value="<?php echo $_SESSION['captcha']['code']; ?>" />
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><b>Please enter CAPTCHA code below.</b>
                <i>(case sensitive)</i><br><input name="captcha" type="text" id="captcha" size="20" />
                <script language="javascript">
                    var f2 = new LiveValidation('captcha');
                    f2.add(Validate.Presence);
                </script>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure to proceed?');" />
                <input type="reset" name="reset" id="reset" value="Reset" onclick="location.href = 'home.php?id=config&sub=admin_upload_newplanting'" />

            </td>
        </tr>
    </table>
</form>
<?php
if (isset($_POST["submit"])) {


    /* start of captcha validation */
//echo $_SESSION['captcha']['code']; 
    if ($captcha != $captchasession) {
        echo "<html><script language='javascript'>alert('Invalid CAPTCHA Code! You have entered :" . $captcha . " instead of " . $captchasession . " '); location.href='home.php?id=config&sub=admin_upload_newplanting';</script></html>";
    }
    /* end of captcha validation */

    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;

    $tahun_short = substr($tahun_estate - 1, -2);
    $tahun_short_semasa = substr($tahun_estate - 2, -2);

    $this_table = "tanam_baru" . $tahun_short;
    $this_current_table = "tanam_baru" . $tahun_short_semasa;

    $tahun_esub = $tahun_estate - 1;
    $tableesub = "esub_" . $tahun_esub;

    $checktable = mysql_query("SHOW TABLES LIKE '$this_table'");
    $table_exists = mysql_num_rows($checktable) > 0;

    //echo "table_exists:" . $table_exists;
    if ($table_exists == 0) {
        $qadd = "CREATE TABLE $this_table (`bil` varchar(255) DEFAULT NULL,  "
                . "`nama_estet` varchar(255) DEFAULT NULL,  "
                . "`lesen` varchar(255) DEFAULT NULL,  "
                . "`negeri` varchar(255) DEFAULT NULL,  "
                . "`daerah` varchar(255) DEFAULT NULL,  "
                . "`bulan` varchar(255) DEFAULT NULL,  "
                . "`tanaman_baru` varchar(255) DEFAULT NULL,  "
                . "KEY `lesen` (`lesen`) , KEY `bulan` (`bulan`) USING BTREE) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
        $r_add = mysql_query($qadd, $con);
        if ($r_add) {
            $qa = "INSERT INTO $this_table "
                    . " SELECT * FROM $this_current_table ";
            //echo $qa."<br><br>";
            mysql_query($qa, $con);
        }//add data to new table 
    }//if table no exist 
    else {
//        mysql_query("DROP TABLE IF EXISTS $this_current_table", $con);
//        $qadd = "CREATE TABLE $this_current_table (`bil` varchar(255) DEFAULT NULL,  "
//                . "`nama_estet` varchar(255) DEFAULT NULL,  "
//                . "`lesen` varchar(255) DEFAULT NULL,  "
//                . "`negeri` varchar(255) DEFAULT NULL,  "
//                . "`daerah` varchar(255) DEFAULT NULL,  "
//                . "`bulan` varchar(255) DEFAULT NULL,  "
//                . "`tanam_baru` varchar(255) DEFAULT NULL,  "
//                . "KEY `lesen` (`lesen`) USING BTREE) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
//        $r_add = mysql_query($qadd, $con);
        /* delete data from this table */
        $qa = "delete from $this_table ";
        mysql_query($qa, $con);
        /* delete data from this table */
    }

    /* add data into table */
    while (($filesop = fgetcsv($handle, 10000, ",")) !== false) {
        $bil = mysql_real_escape_string($filesop[0]);
        $namaestate = mysql_real_escape_string($filesop[1]);
        $lesen = mysql_real_escape_string($filesop[2]);
        $negeri = mysql_real_escape_string($filesop[3]);
        $daerah = mysql_real_escape_string($filesop[4]);
        $bulan = mysql_real_escape_string($filesop[5]);
        $tanam_baru = str_replace(",", "", mysql_real_escape_string($filesop[6])); //$filesop[6];

        $sql = "INSERT INTO $this_table "
                . "(`bil`, "
                . "`nama_estet`, "
                . "`lesen`, "
                . "`negeri`, "
                . "`daerah`, "
                . "`bulan`, "
                . "`tanaman_baru`) "
                . "VALUES "
                . "("
                . "'" . $bil . "', "
                . "'" . $namaestate . "', "
                . "'" . $lesen . "', "
                . "'" . $negeri . "', "
                . "'" . $daerah . "', "
                . "'" . $bulan . "', "
                . "'" . $tanam_baru . "'"
                . ")";
        //echo $sql . "<br><br>";
        $rsql = mysql_query($sql, $con);
        $c = $c + 1;
        if ($sql) {
            echo "Your database has imported successfully. You have inserted " . $c . " records";
        } else {
            echo "Sorry! There is some problem.";
        }
        echo "<br>";

        /* start of belum_berhasil */
        $totalsemula = getKiraan("semula", $tahun_estate, $lesen);
        $totalbaru = getKiraan("baru", $tahun_estate, $lesen);
        $totaltukar = getKiraan("tukar", $tahun_estate, $lesen);

        $totalbelumberhasil = $totalsemula + $totalbaru + $totaltukar;
        $yesupdate = updateesub($nolesen, $tableesub, 'Belum_Berhasil', $totalbelumberhasil);
        $yesjumlah = updateesub($nolesen, $tableesub, 'Jumlah', $totaljumlah);
        /* end start of belum_berhasil */
    }//while add 
    $qa = "delete from $this_table where tanaman_baru='0'; ";
    mysql_query($qa, $con);


    $qa_deletelast = "delete FROM $this_table "
            . " WHERE bil ='bil' or bil ='1'";
    mysql_query($qa_deletelast, $con);
    $qa_deletelast = "delete FROM $this_current_table "
            . " WHERE bil ='bil' or bil ='1'";
    mysql_query($qa_deletelast, $con);
}
?>
    
