<?php
session_start();
include('../main/open_link.php');
//include ('../Connections/connection.class.php');
extract($_GET);
extract($_POST); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if($_REQUEST['title'] != "")
	$_SESSION['title'] = $_REQUEST['title'];
?>

<script type="text/javascript" src="../jquery-1.3.2.js"></script>
 <link rel="stylesheet" href="../jquery/jquery-ui.css">


<?php if($frame=="on"){?>
<script type="text/javascript">
			$(document).ready(function(){
			$('.tajuk').hide();
			});
</script>
<?php } ?>

<script src="../js/live/livevalidation_standalone.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../js/live/consolidated_common.css">



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/icon.ico" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-COST</title>
<?php if($frame!="on"){?>
<link href="../css/body.css" rel="stylesheet" type="text/css" />
<?php } ?>
</head>

<body onload="MM_preloadImages('../nav/hm1.png')">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="tajuk">
    <td width="15%" height="71">  <?php include('../main/logo.php'); ?> </td>
    <td width="85%" height="71" align="right"><?php include('session.php'); ?> </td>
  </tr>
  <tr class="tajuk">
    <td height="15" colspan="2" class="nav"><?php include('menu_admin.php'); ?></td>
  </tr>

  <tr>
    <td height="100%" colspan="2" valign="top"><table width="99%" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="table" style="margin-top:5px">
      <tr>
        <td height="100" valign="top" <?php if($frame!="on"){?>bgcolor="#F4FFF4"<?php } ?>><?php include($open);?></td>
      </tr>
    </table></td>
  </tr>
</table>
<!--<script src='http://cdn.wibiya.com/Loaders/Loader_44361.js' type='text/javascript'></script>
-->
</body>
</html>
<?php mysqli_close($con);?>
