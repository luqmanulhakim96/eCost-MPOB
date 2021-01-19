<?php
include('baju_merah.php');
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

set_time_limit(0);
extract($_REQUEST);

$tahunsub2 = date('Y') - 1;
$tableesub2 = "esub_" . $tahunsub2;


$qacreate = "SELECT count(*) as total
FROM information_schema.TABLES
WHERE  (TABLE_NAME = '$tableesub2');";
$rqa = mysql_query($qacreate, $con);
$rowsub = mysql_fetch_array($rqa);
//echo "tbale".$rowsub['total'];
$warning = "";
if ($rowsub['total'] === 0) {
    $warning = "No data duplicate yet for last year. Please run <b>Duplicate e-SUB for New Year</b> before continue upload new data e-SUB";
}

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
    <h2>Upload Excel File eSub</h2>
    <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> <span class="ui-icon ui-icon-info" style="float: left; margin-right: 1em;"></span>
        <strong>Note : </strong> Follow this step below to upload your excel file to database. <br>
        <br />  1. Use this template <a href="template/esub.csv"><strong>here</strong></a>, and fill all data according to column name. Refer <a href="template/esub-sample.csv"><strong>here</strong></a> if you need sample data.<br />
        2. Select <strong>year</strong> to be upload and click <strong>submit</strong>.</div>
    <br />
    <table width="80%" align="center" >        
        <tr>
            <td><strong>Select Year</strong></td>
            <td><strong>:</strong></td>
            <td><select name="tahun_esub" id="tahun_esub">
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
            <td>
                <?php
                if ($warning != "") {
                    echo "<span style=\"color: red\">" . $warning . "</span>";
                }
                ?>
                <?php if ($warning === "") { ?>
                    <input type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure to proceed?');" />
                <?php } ?>
                <input type="reset" name="reset" id="reset" value="Reset" onclick="location.href = 'home.php?id=config&sub=admin_upload_esub'" />

            </td>
        </tr>
    </table>
</form>
<?php
if (isset($_POST["submit"])) {

    /* start of captcha validation */
//echo $_SESSION['captcha']['code']; 
    if ($captcha != $captchasession) {
        echo "<html><script language='javascript'>alert('Invalid CAPTCHA Code! You have entered :" . $captcha . " instead of " . $captchasession . " '); location.href='home.php?id=config&sub=admin_upload_esub';</script></html>";
    }
    /* end of captcha validation */

    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    $tahun_esub = $tahun_esub - 1;
    $tableesub = "esub_" . $tahun_esub;



    $qa_delete = "delete FROM esub ";
    $rqa_delete = mysql_query($qa_delete, $con);


    while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
        $Nama_Estet = mysql_real_escape_string($filesop[0]);
        $No_Lesen = mysql_real_escape_string($filesop[1]);
        $No_Lesen_Baru = mysql_real_escape_string($filesop[2]);
        $Berhasil = str_replace(",", "", mysql_real_escape_string($filesop[3]));
        $Keluasan_Yang_Dituai = str_replace(",", "", mysql_real_escape_string($filesop[4]));


        $sql = "INSERT INTO esub "
                . "(Nama_Estet, "
                . "No_Lesen, "
                . "No_Lesen_Baru, "
                . "Berhasil, "
                . "Keluasan_Yang_Dituai) "
                . "VALUES "
                . "('$Nama_Estet', "
                . "'$No_Lesen', "
                . "'$No_Lesen_Baru', "
                . "'$Keluasan_Yang_Dituai', "
                . "'$Berhasil'"
                . ")";
        //echo $sql . "<br><br>";
        $rsql = mysql_query($sql, $con);

        $c = $c + 1;
        if ($rsql) {
            echo "Your database has imported successfully. You have inserted " . $c . " records";
        } else {
            echo "Sorry! There is some problem.";
        }
        echo "<br>";
    }
    /* clean header after migrate */
    $sqldelete = "delete from esub where nama_estet='nama_estet';  ";
    $rsqldelete = mysql_query($sqldelete, $con);
    /* end of clean header after migrate */


    /* select & update data */
    $sqlselect = "SELECT
$tableesub.No_Lesen_Baru,
$tableesub.Bil,
$tableesub.Nama_Estet,
$tableesub.No_Lesen,
$tableesub.Alamat1,
$tableesub.Alamat2,
$tableesub.Poskod,
$tableesub.Bandar,
$tableesub.Negeri,
$tableesub.No_Telepon,
$tableesub.No_Fax,
$tableesub.Emel,
$tableesub.Negeri_Premis,
$tableesub.Daerah_Premis,
$tableesub.Syarikat_Induk,
$tableesub.Berhasil,
$tableesub.Belum_Berhasil,
$tableesub.Jumlah,
$tableesub.Keluasan_Yang_Dituai, 
    esub.No_Lesen_Baru as nlb

FROM
esub
INNER JOIN $tableesub ON esub.No_Lesen_Baru = $tableesub.No_Lesen_Baru
 ";

    // echo $sqlselect. "<br><br>";
    $rsql = mysql_query($sqlselect, $con);
    while ($row = mysql_fetch_array($rsql)) {
        $sqlupdate = "UPDATE esub SET "
                . "Alamat1='" . $row['Alamat1'] . "', "
                . "Alamat2='" . $row['Alamat2'] . "', "
                . "Poskod='" . $row['Poskod'] . "', "
                . "Bandar='" . $row['Bandar'] . "', "
                . "Negeri='" . $row['Negeri'] . "', "
                . "No_Telepon='" . $row['No_Telepon'] . "', "
                . "No_Fax='" . $row['No_Fax'] . "', "
                . "Emel='" . $row['Emel'] . "', "
                . "Negeri_Premis='" . $row['Negeri_Premis'] . "', "
                . "Daerah_Premis='" . $row['Daerah_Premis'] . "', "
                . "Syarikat_Induk='" . $row['Syarikat_Induk'] . "' "
                . "WHERE No_Lesen_Baru='" . $row['nlb'] . "' LIMIT 1";
        mysql_query($sqlupdate, $con);
        /* start of belum_berhasil */
        $totalsemula = getKiraan("semula", $tahun_esub, $row['nlb']);
        $totalbaru = getKiraan("baru", $tahun_esub, $row['nlb']);
        $totaltukar = getKiraan("tukar", $tahun_esub, $row['nlb']);

        $totalbelumberhasil = $totalsemula + $totalbaru + $totaltukar;
        $yesupdate = updateesub($nolesen, $tableesub, 'Belum_Berhasil', $totalbelumberhasil);
        $yesjumlah = updateesub($nolesen, $tableesub, 'Jumlah', $totaljumlah);
        /* end start of belum_berhasil */
        //echo $sqlupdate . "<br><br>";
    }
    /* end of select & update data */
}
?>
    
