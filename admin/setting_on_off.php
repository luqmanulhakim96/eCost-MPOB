<?php 
//include('Connections/connection.class.php');
session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");
	

include('baju_merah.php');
?>
<script language="JavaScript" src="../js/datepick/ts_picker.js"></script>
<h2><strong>Set Period Time for Survey</strong>&nbsp;</h2>
<form id="form1" name="form1" method="post" action="save_setting_onoff.php">
  <table width="80%" align="center" class="baju">
    <tr>
      <th width="34%" height="25"><div align="left"><strong>Type of survey</strong></div></th>
      <th width="19%"><div align="left"><strong>Status</strong></div></th>
    </tr>
  
    
    <?php
    	$con=connect();
		$q="select * from setting ";
  		$r=mysql_query($q,$con);
		while($row=mysql_fetch_array($r)){
	?>
    <tr <?php if($p++%2==0){?>class="alt"<?php } ?>>
      <td height="34"><strong><?php echo $row['ST_NAME'];?>
        <input name="st_name[<?php echo $p;?>]" type="hidden" id="st_name[<?php echo $p;?>]" value="<?php echo $row['ST_NAME'];?>" />
      </strong></td>
      <td><input name="st_value[<?php echo $p;?>]" type="radio" id="radio" value="1" <?php if($row['ST_VALUE']=="1"){?>checked="checked"<?php } ?> />
      Open
        <input type="radio" name="st_value[<?php echo $p;?>]" id="radio2" value="0" <?php if($row['ST_VALUE']=="0"){?>checked="checked"<?php } ?> />
        Closed</td>
    </tr>
    <?php } ?>
    
  </table>
  <div align="center"><br />
  &nbsp;&nbsp;
    <input type="submit" name="save" id="save" value="Submit" onclick="return confirm('Update this settings?');" />
    <input type="reset" name="button2" id="button2" value="Reset" />
  </div>
</form>


<br />
<br />
