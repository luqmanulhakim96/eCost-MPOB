<?php 

session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");
	   
//include('Connections/connection.class.php');
include ('../class/period.class.php');
include('baju_merah.php');
?>
<script language="JavaScript" src="../js/datepick/ts_picker.js"></script>
<h2><strong>Set Period Time for Survey</strong>&nbsp;</h2>
<form id="form1" name="form1" method="post" action="save_period.php">
  <table width="80%" align="center" class="baju">
    <tr>
      <th width="34%" height="25"><div align="left"><u><strong>Type of survey</strong></u></div></th>
      <th width="19%"><div align="left"><u><strong>Status</strong></u></div></th>
      <th width="47%"><div align="left"><u><strong>Duration (until)</strong></u> </div></th>
    </tr>
    <?php 
	$p_estet = new Period("estate");
	$p_mill = new Period("mill");
	
	?>
    
    
    
    <tr class="alt">
      <td height="34"><strong>ESTATE (Estet)</strong></td>
      <td><input name="stat_estate" type="radio" id="radio" value="Open" <?php if($p_estet->st_status=="Open"){?>checked="checked"<?php } ?> />
      Open
        <input type="radio" name="stat_estate" id="radio2" value="Closed" <?php if($p_estet->st_status=="Closed"){?>checked="checked"<?php } ?> />
        Closed</td>
      <td><input name="tarikh_estate" type="text" id="tarikh_estate" value="<?= $p_estet->st_date; ?>" />
      <a href="javascript:show_calendar('document.form1.tarikh_estate','');"><img src="../js/datepick/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a>
      </td>
    </tr>
    <tr>
      <td height="34"><strong>MILL (Kilang)</strong></td>
      <td><input type="radio" name="stat_mill" id="radio3" value="Open" <?php if($p_mill->st_status=="Open"){?>checked="checked"<?php } ?> />
        Open
          <input type="radio" name="stat_mill" id="radio4" value="Closed" <?php if($p_mill->st_status=="Closed"){?>checked="checked"<?php } ?> />
          Closed</td>
      <td><input name="tarikh_mill" type="text" id="tarikh_mill" value="<?= $p_mill->st_date; ?>" />
      <a href="javascript:show_calendar('document.form1.tarikh_mill','');"><img src="../js/datepick/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a>
      </td>
    </tr>
  </table>
  <div align="center"><br />
  &nbsp;&nbsp;
    <input type="submit" name="button" id="button" value="Submit" />
    <input type="reset" name="button2" id="button2" value="Reset" />
  </div>
</form>
<br />
<br />
