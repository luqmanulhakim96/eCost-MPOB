<style>
    /* The alert message box */
    .alert {
        padding: 20px;
        background-color: #4CAF50;
        /* Red */
        color: white;
        margin: 15px;
    }

    /* The close button */
    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    /* When moving the mouse over the close button */
    .closebtn:hover {
        color: black;
    }
</style>

<?php
include('admin_upload_esub_api_process.php');
?>

<form name="api_process" method="post" enctype="multipart/form-data"><br />
    <h2>API - Import Data from eSub & eKilang</h2>
    <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> <span class="ui-icon ui-icon-info" style="float: left; margin-right: 1em;"></span>
        <strong>Note : </strong> Follow this step below to import data from eSub to database. <br>
        <br /> 1. Choose which data you want to import, and click the related data.<br />
        2. Please wait until the process is finished before closing the page.
        <br>
        3. For eSub API, please follow the order provided in the button to prevent system error.
    </div>
    <br />
    <table width="80%" align="center">
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
                    <!-- <input style="margin : 7px; margin-left:-1px;" type="submit" name="submit_esub_1" value="eSub API - 1. Get Estates' Info" onclick="return confirm('Are you sure to proceed?');" />
                    <input style="margin : 7px;" type="submit" name="submit_esub_2" value="eSub API - 2. Get Yield FFB Data" onclick="return confirm('Are you sure to proceed?');" />
                    <input style="margin : 7px;" type="submit" name="submit_esub_3" value="eSub API - 3. Get Immature Data" onclick="return confirm('Are you sure to proceed?');" />
                    <br>
                    <input style="margin : 7px; margin-left:-1px;" type="submit" name="submit_esub_4" value="eSub API - 4. Get Mature Data" onclick="return confirm('Are you sure to proceed?');" />
                    <input style="margin : 7px;" type="submit" name="submit_esub_5" value="eSub API - 5. Get Average Mature Data" onclick="return confirm('Are you sure to proceed?');" />
                    <br>
                    <input style="margin : 7px; margin-left:-1px;" type="submit" name="submit_ekilang" value="eKilang API" onclick="return confirm('Are you sure to proceed?');" /> -->
                <?php } ?>
            </td>
        </tr>
    </table>
</form>