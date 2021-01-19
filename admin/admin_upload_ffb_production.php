<?php include('baju_merah.php');
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

?>
<form name="import" method="post" enctype="multipart/form-data"><br />
    <h2>Upload Excel File FFB Production</h2>
    <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> <span class="ui-icon ui-icon-info" style="float: left; margin-right: 1em;"></span>
        <strong>Note : </strong> Follow this step below to upload your excel file to database. <br>
        <br />  1. Use this template <a href="template/fbb_production.csv"><strong>here</strong></a>, and fill all data according to column name. Refer <a href="template/fbb_production-sample.csv"><strong>here</strong></a> if you need sample data.<br />
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
            <td><img src="<?php echo $_SESSION['captcha']['image_src']; ?>" alt="CAPTCHA code"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><b>Please enter CAPTCHA code below.</b>
                <i>(case sensitive)</i><br><input name="captcha" type="text" id="captcha" size="20" />
                <input name="captchasession" type="hidden" id="captchasession" size="20" value="<?php echo  $_SESSION['captcha']['code']; ?>" />
               
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
                            <input type="reset" name="reset" id="reset" value="Reset" onclick="location.href = 'home.php?id=config&sub=admin_upload_ffb_production'" />

            </td>
        </tr>
    </table>
</form>
<?php
if (isset($_POST["submit"])) {
    
        /* start of captcha validation */
//echo $_SESSION['captcha']['code']; 
    if ($captcha != $captchasession) {
        echo "<html><script language='javascript'>alert('Invalid CAPTCHA Code! You have entered :".$captcha." instead of ".$captchasession." '); location.href='home.php?id=config&sub=upload_excel_mill';</script></html>";
    }
    /* end of captcha validation */
    
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;

    $tahun_short = $tahun_estate-1;
    $this_table = "fbb_production" . $tahun_short;
    $this_current_table = "fbb_production";

    $checktable = mysql_query("SHOW TABLES LIKE '$this_table'");
    $table_exists = mysql_num_rows($checktable) > 0;

    //echo "table_exists:" . $table_exists;
    if ($table_exists == 0) {
        $qadd = "CREATE TABLE $this_table ("
                . "  `bil` varchar(255) DEFAULT NULL,  "
                . "`nama` varchar(255) DEFAULT NULL,  "
                . "`lesen` varchar(255) DEFAULT NULL,  "
                . "`negeri` varchar(255) DEFAULT NULL,  "
                . "`daerah` varchar(255) DEFAULT NULL,  "
                . "`jumlah_pengeluaran` varchar(255) DEFAULT NULL,  "
                . "`purata_hasil_buah` varchar(255) DEFAULT NULL,  KEY `lesen` (`lesen`)) "
                . "ENGINE=MyISAM DEFAULT CHARSET=latin1;";
        $r_add = mysql_query($qadd, $con);
        if ($r_add) {
            $qa = "INSERT INTO $this_table "
                    . " SELECT * FROM $this_current_table ; ";
            //echo $qa."<br><br>";
            mysql_query($qa, $con);
        }//add data to new table 
    }//if table no exist 
    else {
        /* delete data from this table */
        $qa = "delete from $this_current_table; ";
        //echo $qa."<br>";
        mysql_query($qa, $con);
        /* delete data from this table */
    }

    /* add data into table */
    while (($filesop = fgetcsv($handle, 10000, ",")) !== false) {
        $namaestate = mysql_real_escape_string($filesop[0]);
        $lesen = mysql_real_escape_string($filesop[1]);
        $negeri = mysql_real_escape_string($filesop[2]);
        $daerah = mysql_real_escape_string($filesop[3]);
        $jumlah_pengeluaran = str_replace(",","",mysql_real_escape_string($filesop[4]));//$filesop[4];
        $purata_hasil_buah = str_replace(",","",mysql_real_escape_string($filesop[5]));//$filesop[5];

        $sql = "INSERT INTO $this_current_table "
                . "("
                . "`nama`, "
                . "`lesen`, "
                . "`negeri`, "
                . "`daerah`, "
                . "`jumlah_pengeluaran`, "
                . "`purata_hasil_buah`)"
                . " VALUES ("
                . "'$namaestate', "
                . "'$lesen', "
                . "'$negeri', "
                . "'$daerah', "
                . "'$jumlah_pengeluaran', "
                . "'$purata_hasil_buah'"
                . "); ";
        //echo $sql . "<br>";
        $rsql = mysql_query($sql, $con);
        $c = $c + 1;
        if ($rsql) {
            echo "Your database has imported successfully. You have inserted " . $c . " records";
        } else {
            echo "Sorry! There is some problem.";
        }
        echo "<br>";
    }//while add 
    $qa_deletelast = "delete FROM $this_table "
            . " WHERE bil ='bil' or bil ='1' or bil ='nama'  or  nama ='nama'";
    mysql_query($qa_deletelast, $con);
    
      $qa_deletelast = "delete FROM $this_current_table "
            . " WHERE bil ='bil' or bil ='1' or bil ='nama' or  nama ='nama'";
    mysql_query($qa_deletelast, $con);
    //echo $qa_deletelast; 
   
}
?>
    
