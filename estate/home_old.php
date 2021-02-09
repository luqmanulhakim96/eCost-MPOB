<?php session_start();

include('../setstring.inc');
/**
if($_GET['id'] == "belum_matang") {
	if(!isset($_GET['year'])) {
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']."home.php?id=belum_matang&y=1&t=Penanaman+Baru");
		exit();
	}
}
*/
include('../main/open_link.php');
extract($_POST);
extract($_GET);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<link rel="shortcut icon" href="../images/icon.ico" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-COST</title>
<!-- Include Print CSS -->
<link rel="stylesheet" href="../print.css" type="text/css" media="print" />
<script type="text/javascript" src="../jquery-1.3.2.js"></script>

<script src="../js/live/livevalidation_standalone.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../js/live/consolidated_common.css">

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
	<link type="text/css" href="../css/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="../ui/ui.core.js"></script>
	<script type="text/javascript" src="../ui/ui.draggable.js"></script>
	<script type="text/javascript" src="../ui/ui.resizable.js"></script>
	<script type="text/javascript" src="../ui/ui.dialog.js"></script>
	<script type="text/javascript" src="../ui/effects.core.js"></script>
	<script type="text/javascript" src="../ui/effects.highlight.js"></script>
	<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>

    <script type="text/javascript" src="../js/jquery.maskedinput-1.2.2.js"></script>


	<script type="text/javascript">
		$(document).ready(function() {

			<?php if($mill!="true"){?>
			$("#username").mask("999999-999999");
		<?php } ?>
			$("#loginDialog").dialog({
				autoOpen:true,
				modal:true,
				title:"<?=setstring ( 'mal', 'Login ke E-COST', 'en', 'Login to ECOST'); ?> <?php if(isset($_GET['mill'])) { echo setstring ( 'mal', 'Kilang', 'en', 'Mill'); } else { ?><?=setstring ( 'mal', 'Estet', 'en', 'Estate'); ?> <?php } ?>",
				close:function() {
					$("#errorDialog").dialog('open');
				},
				width:"50%",
				draggable:false,
				resizable:false
			});
			$("#errorDialog").dialog({
				buttons:{
					"<?=setstring ( 'mal', 'Teruskan', 'en', 'Proceed'); ?>":function() {
						history.go(-1);
					}
				},
				autoOpen:false,
				modal:true,
				title:"<?=setstring ( 'mal', 'Ralat', 'en', 'Error'); ?>",
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
?><?php	if(isset($_GET['ringkasan'])) {
?>
<link rel="stylesheet" href="colorbox.css" type="text/css" />
<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
<?php }?>

	<?php if ($_SESSION['lesen']!=""){?>
		<link type="text/css" media="screen" rel="stylesheet" href="../js/colorbox/colorbox.css" />
		<script type="text/javascript" src="../js/colorbox/colorbox/jquery.colorbox.js"></script>
		<?php } ?>

<link href="css/body.css" rel="stylesheet" type="text/css" />
<link href="../css/body.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/icon.ico" />

</head>

<body>
<?php
	if(isset($_GET['welcome'])) {
?>
<div id="errorDialog">
	<p>
    	<img src="../images/001_30.gif" width="24" height="24" alt="Ralat" />&nbsp;
        <?=setstring ( 'mal', 'Anda perlu log masuk terlebih dahulu sebelum menggunakan sistem', 'en', 'You must login before use the system'); ?>
        !    </p>
</div>
<div id="loginDialog">

<form action="body.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="69%" border="0" cellpadding="1" cellspacing="0"  aria-describedby="Welcome Page">
    <tr>
      <td width="19%" rowspan="7" valign="top"><img src="../images/Monitor.png" alt="aaa" width="127" height="145" /></td>
      <td width="43%" valign="middle"><strong>
	  <?=setstring ( 'mal', 'ID Login', 'en', 'Login ID'); ?>
	  </strong></td>
      <td width="2%" valign="bottom"><strong>:</strong></td>
      <td width="36%" valign="bottom"><input name="username" type="text" id="username" autocomplete="off" />

      <?php if($mill){?>
      <script>
      var f17 = new LiveValidation('username');
f17.add( Validate.Exclusion, { within: [ '-' ], partialMatch: true } );
      </script>
      <?php } ?>

      </td>
      </tr>
    <tr>
      <td valign="top"><strong><?=setstring ( 'mal', 'Kata Laluan', 'en', 'Password'); ?></strong></td>
      <td valign="top"><strong>:</strong></td>
      <td valign="top"><input name="katalaluan" type="password" id="katalaluan" autocomplete="off"  /></td>
      </tr>



    <tr>
      <td colspan="3"><label>
        <input type="submit" name="button" id="button" value="Login" />
        <input name="mill" type="hidden" id="mill" value="<?= $mill; ?>" />
      </label></td>
    </tr>
    <tr>
    	<td colspan="4">
		<?php
		/**echo $welcome;
		echo $id; */
		if($welcome=='true')
{
	$_SESSION['lesen']="123456";

}
		?>

		</td>
    </tr>
    <tr>
    	<td colspan="4" style="font-size:13px;"><strong>
        <?=setstring ( 'mal', 'Untuk sebarang pertanyaan, sila hubungi:', 'en', 'For any enquiries, please contact:'); ?>

        </strong></td>
    </tr>
    <tr>
      <td colspan="3"><p><strong><?=setstring ( 'mal', 'En.', 'en', 'Mr.'); ?> Azman Ismail - 03  78022880</strong><br />
        <?=setstring ( 'mal', 'Emel', 'en', 'Email'); ?> : azman@mpob.gov.my</p>
          <p><strong><?=setstring ( 'mal', 'En.', 'en', 'Mr.'); ?> Jusoh Latif - 03 78022934</strong><br />
            <?=setstring ( 'mal', 'Emel', 'en', 'Email'); ?> : jusoh@mpob.gov.my</p>
        <p><strong><?=setstring ( 'mal', 'Cik', 'en', 'Miss'); ?> Norhazifah Suhani - 03  78022866</strong><br />
          <?=setstring ( 'mal', 'Emel', 'en', 'Email'); ?> : zifah@mpob.gov.my</p>
        <p><strong>Fax No: 03 78061013</strong></p></td>
    </tr>
  </table>
</form>
</div>
<?php
	}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" aria-describedby="main logo">
  <tr>
    <td width="15%" height="71">&nbsp;&nbsp;<?php include('../main/logo.php'); ?>&nbsp;</td>
    <td height="71" colspan="2" align="right">
	<?php include('session.php'); ?>

	&nbsp;</td>
  </tr>
  <tr>
    <td height="15" colspan="3" class="nav"><?php include('menu_user.php'); ?></td>
  </tr>
  <tr>
    <td height="100%" colspan="3" valign="top">
	<table width="99%" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="table" style="margin-top:5px" aria-describedby="menu user">
      <tr>
        <td height="100" valign="top" bgcolor="#F4FFF4">
		<?php include($open);?>


		</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>

</html>
<?php mysqli_close($con);?>
