<?php session_start();
include('../setstring.inc');

include('../main/open_link.php');

extract($_POST);
extract($_GET);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-COST</title>
<!-- Include Print CSS -->
<link rel="stylesheet" href="../print.css" type="text/css" media="print" />
<script type="text/javascript" src="../jquery-1.3.2.js"></script>

<script language="javascript">
function tukarbahasa(x){
	document.cookie="lang"+ "=" +x;
	window.location.reload();
}

</script>


<script type="text/javascript">
function keypress(e)
{
	if ([e.keyCode||e.which]==8 || [e.keyCode||e.which]==46 || [e.keyCode||e.which]==44) //alow backspace and dot and comma
	return true;
	if ([e.keyCode||e.which] < 48 || [e.keyCode||e.which] > 57)
	e.preventDefault? e.preventDefault() : e.returnValue = false;
}
</script>
<?php
	if(isset($_GET['logging'])) {
?>
<link rel="stylesheet" href="colorbox.css" type="text/css" />

<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
<?php
	}
	if(isset($_GET['finished'])) {
?>
<link rel="stylesheet" href="colorbox.css" type="text/css" />
<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
<?php
	}
	if(isset($_GET['welcome'])) {
?>
<link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="../ui/ui.core.js"></script>
	<script type="text/javascript" src="../ui/ui.draggable.js"></script>
	<script type="text/javascript" src="../ui/ui.resizable.js"></script>
	<script type="text/javascript" src="../ui/ui.dialog.js"></script>
	<script type="text/javascript" src="../ui/effects.core.js"></script>
	<script type="text/javascript" src="../ui/effects.highlight.js"></script>
	<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#loginDialog").dialog({
				autoOpen:true,
				modal:true,
				title:"Login ke E-Cost <?php if(isset($_GET['mill'])) { echo "Kilang"; } else { ?>Estet <?php } ?>",
				close:function() {
					$("#errorDialog").dialog('open');
				},
				width:"50%",
				draggable:false,
				resizable:false
			});
			$("#errorDialog").dialog({
				buttons:{
					"Teruskan":function() {
						history.go(-1);
					}
				},
				autoOpen:false,
				modal:true,
				title:"Ralat",
				draggable:false,
				resizable:false,
				close:function() {
					history.go(-1);
				}
			});
		});
	</script>
<?php
	}
?>
<link href="css/body.css" rel="stylesheet" type="text/css" />
<link href="../css/body.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/icon.ico" />

<!-- <style type="text/css">

.style2 {color: #CCCCCC}
.style4 {font-size: 16px; font-weight: bold; }

</style> -->
</head>

<body onload="MM_preloadImages('../nav/hm1.png')">
<?php
	if(isset($_GET['welcome'])) {
?>
<div id="errorDialog">
	<p>
    	<img src="../images/001_30.gif" width="24" height="24" alt="Ralat" />&nbsp;<?=setstring ( 'mal', 'Anda Perlu Login Sebelum Menggunakan Sistem!', 'en', 'You have to Login to use the System!'); ?>
    </p>
</div>
<div id="loginDialog">
<form id="form1" action="home.php?id=profile&logging=true<?php if(isset($_GET['mill'])) { echo "&mill=true"; } ?>" method="post">
  <table width="49%" border="0" cellpadding="1" cellspacing="0">
    <tr>
      <td width="33%" rowspan="7" valign="top"><img src="../images/Monitor.png" alt="aaa" width="127" height="145" /></td>
      <td width="29%" valign="middle"><strong>Login ID</strong></td>
      <td width="2%" valign="bottom"><strong>:</strong></td>
      <td width="36%" valign="bottom"><input name="textfield" type="text" id="textfield" value="527621-002000" /></td>
      </tr>
    <tr>
      <td valign="top"><strong>Password</strong></td>
      <td valign="top"><strong>:</strong></td>
      <td valign="top"><input name="textfield2" type="password" id="textfield2" value="1234567890" /></td>
      </tr>



    <tr>
      <td colspan="3"><label>
        <input type="submit" name="button" id="button" value="<?=setstring ( 'mal', 'Masuk', 'en', 'Enter'); ?>" />
      </label></td>
    </tr>
    <tr>
      <td colspan="3"><p><strong>En. Azman Ismail - 03-78022880</strong><br />
          <?=setstring ( 'mal', 'Emel', 'en', 'Email'); ?>
          : azman@mpob.gov.my</p>
          <p><strong>Nor Fadilah Mazlan - 03 78022851</strong><br />
            <?=setstring ( 'mal', 'Emel', 'en', 'Email'); ?>
            : norfadilah@mpob.gov.my
</p>
        <p><strong>Norhazifah Suhani - 03  78022866</strong><br />
          <?=setstring ( 'mal', 'Emel', 'en', 'Email'); ?>
          : zifah@mpob.gov.my</p>
        <p><strong>Fax No: 03 78061013</strong></p></td>
    </tr>
  </table>
</form>
</div>
<?php
	}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" height="71">&nbsp;&nbsp;<?php include('../main/logo.php'); ?>&nbsp;</td>
    <td height="71" colspan="2" align="right"><?php include('session.php'); ?>&nbsp;</td>
  </tr>
  <tr>
    <!-- <td height="15" colspan="3" class="nav"><?php //include ('menu_user.php'); ?></td> -->
    <td height="15" colspan="3" class="nav"><?php include ('menu_user.php'); ?></td>

  </tr>
  <tr>
    <td height="100%" colspan="3" valign="top"><table width="99%" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="table" style="margin-top:5px">
      <tr>
        <td height="100" valign="top" bgcolor="#F4FFF4"><?php
			include($open);
		?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
