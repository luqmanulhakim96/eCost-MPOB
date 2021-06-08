<?php include('baju_merah.php');
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

?>
<script>
    function setDeleteMill() {
        var a = confirm('Are you sure to proceed?\nThis function will delete all data mill for last year : <?php echo date('Y') - 1; ?>');
        if (a) {
            var yeardelete = '<?php echo date('Y') - 1; ?>';
            location.href = "home.php?id=config&sub=upload_excel_mill&deletemill=yes&yeardelete=" + yeardelete;
        }
    }
</script>
<form name="import" method="post" enctype="multipart/form-data"><br />
    <h2>Upload Excel File eKilang</h2>
    <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> <span class="ui-icon ui-icon-info" style="float: left; margin-right: 1em;"></span>
        <strong>Note : </strong> Follow this step below to upload your excel file to database. <br>
        <br />  1. Use this template <a href="template/datakilang.csv"><strong>here</strong></a>, and fill all data according to column name. Refer <a href="template/datakilang-sample.csv"><strong>here</strong></a> if you need sample data.<br />
        2. Select <strong>year</strong> to be upload and click <strong>submit</strong>.</div>
    <br />
    <table width="80%" align="center" >


        <tr>
            <td><strong>Select Year</strong></td>
            <td><strong>:</strong></td>
            <td><select name="tahun_ekilang" id="tahun_ekilang">
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
                <input type="button" name="delete" id="delete" value="Empty data for last year?" onclick="setDeleteMill()" />
                <input type="reset" name="reset" id="reset" value="Reset" onclick="location.href = 'home.php?id=config&sub=upload_excel_mill'" />
            </td>
        </tr>
    </table>
</form>
<?php
if ($deletemill === "yes") {
    $qa_delete = "delete FROM ekilang "
            . " WHERE tahun ='$yeardelete' or tahun =''; ";
    //echo $qa_delete;
    $rqa_delete = mysqli_query($con, $qa_delete);
    if ($rqa_delete) {
        echo "Your data has successfully deleted.";
    } else {
        echo "Sorry! There is some problem.";
    }
    echo "<br>";
}

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
    $tahun_ekilang = $tahun_ekilang - 1;

    $qa = "INSERT INTO ekilang_history "
            . " SELECT * FROM ekilang "
            . " WHERE tahun ='$tahun_ekilang'; ";
    //echo $qa . "<br><br>";
    $rqa = mysqli_query($con, $qa);


    // $qa_delete = "delete FROM ekilang "
    //         . " WHERE tahun ='$tahun_ekilang'";
    // $rqa_delete = mysqli_query($con, $qa_delete); //echo $qa_delete;

    while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
        $nolesen = mysqli_real_escape_string($filesop[0]);
        $namakilang = mysqli_real_escape_string($filesop[1]);
        $negeri = mysqli_real_escape_string($filesop[2]);
		$bulan = mysqli_real_escape_string($filesop[3]);
		$bulan = ltrim($bulan, '0');
        $tahun = mysqli_real_escape_string($filesop[4]);
        $ffb_process = mysqli_real_escape_string($filesop[5]);
        $estatesendiri = mysqli_real_escape_string($filesop[6]);
        $lain = mysqli_real_escape_string($filesop[7]);
        $cpo = mysqli_real_escape_string($filesop[8]);
        $pk = mysqli_real_escape_string($filesop[9]);

        $sql = "INSERT INTO ekilang "
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
                . "'$nolesen',"
                . " '$namakilang',"
                . " '$negeri',"
                . " '$bulan',"
                . " '$tahun',"
                . " '$ffb_process',"
                . " '$estatesendiri',"
                . " '$lain',"
                . " '$cpo',"
                . " '$pk'"
                . ");";
        //echo $sql . "<br><br>";
        //echo $sql . "<br>";

        $rsql = mysqli_query($con, $sql);

		$defaultpassword = 'kilang';
		 $sql2 = "INSERT INTO login_mill "
                . "(lesen, "
                . "`password`, "
				. "firsttime) "
                . "VALUES "
                . "('$nolesen', "
                . "'$defaultpassword', "
                . "'1'"
                . ")";
        //echo $sql . "<br><br>";
        $rsql2 = mysqli_query($con, $sql2);


        $c = $c + 1;
        if ($sql) {
            echo "Your database has imported successfully. You have inserted " . $c . " records";
        } else {
            echo "Sorry! There is some problem.";
        } echo "<br>";
    }// while reading excel

	    /* clean header after migrate */
    // $sqldelete = "delete from ekilang where NO_LESEN='NO_LESEN';  ";
    // $rsqldelete = mysqli_query($con, $sqldelete);
    /* end of clean header after migrate */




}
?>
