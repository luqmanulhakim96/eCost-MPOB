<?php
include ('../class/admin.class.php');
//include ('../class/response.class.php')
//include ('../class/response_mill.class.php')
//include ('../class/user.class.php')
$user = new admin('user', $_SESSION['email']);
// print_r($user);
/** to clear data for esub is name null & estate no null 20 Feb 2017* */
$con = connect();
$qa_delete_esub = "delete FROM esub where ifnull(nama_estet,'')='' or no_lesen_baru='' or nama_estet='Nama_Estet' ;";
$rqa_delete_esub = mysqli_query($con, $qa_delete_esub);
/** end of to clear data for esub is name null & estate no null * */
//$response = new response('','')
//$responsemill = new responsemill('','')


/** if($_COOKIE['tahun_report']=='')
  *{
  *$value =date('Y');
  *setcookie("tahun_report", $value, time()+3600);
  *echo "<script>alert($value);</script>";
  *	echo "<script>window.location.href='home.php?id=home_admin'</script>";
  *}
  */
?>
<?php if ($_COOKIE['tahun_report'] == '') { ?>
    <script type="text/javascript">
        $(function () {

            document.cookie = "tahun_report" + "=" +<?php echo date('Y'); ?>;
            document.form_report.action = "<?php echo $_SERVER['REQUEST_URI']; ?>";
            document.form_report.submit();

        });
    </script>
<?php } ?>

<script language="javascript">
    function tukarbahasa(x) {
        //alert(x);
        document.cookie = "tahun_report" + "=" + x;
        document.form_report.action = "<?php echo $_SERVER['REQUEST_URI']; ?>";
        document.form_report.submit();
    }
</script>


<div align="right" style="margin-right:10px"><form id="form_report" name="form_report" method="post" action="">
        <strong><img src="../images/Client.png" width="16" height="16" alt="client" />
            <?php
            if ($user->name == "") {
                echo "<script>alert('Please enter to activate your session');window.location='../logout.php';</script>";
            }
            ?>

        <?php echo strtoupper($user->name); ?></strong> is online.<br>

        <?php
        $con = connect();
        $qt = "select pb_thisyear from ("
                . "select pb_thisyear from kos_belum_matang "
                . "where pb_thisyear>0 "
                . "AND pb_thisyear <> '" . date('Y') . "' "
                . "group  by pb_thisyear "
                . "order by pb_thisyear desc) a "
                . "union all "
                . "select '2009' as pb_thisyear from dual ";
        ?>
        Please Choose Year:
        <select name="tahun_pilih" id="tahun_pilih" onchange="tukarbahasa(this.value)">
            <option value="<?= date('Y') ?>"><?= date('Y') ?></option>
            <?php
            $rt = mysqli_query($con, $qt);
            while ($rowt = mysqli_fetch_array($rt)) {
                ?>
                <option value="<?php echo $rowt['pb_thisyear']; ?>" <?php if ($_COOKIE['tahun_report'] == $rowt['pb_thisyear']) { ?>selected="selected"<?php } ?>><?php echo $rowt['pb_thisyear']; ?></option>
<?php } ?>
        </select>  <img src="../images/Log.png" width="16" height="16" alt="logout" /> <a href="../logout.php">Logout</a>

    </form>
</div>
