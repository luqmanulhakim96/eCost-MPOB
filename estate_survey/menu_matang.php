<?php
$var[0]=$session_lesen;
$var[1]=$_COOKIE['tahun_report'];

$var[2]="kos_matang_penjagaan";
$kos_matang_penjagaan =  new user('survey',$var);
$var[2]="kos_matang_penuaian";
$kos_matang_penuaian =  new user('survey',$var);
$var[2]="kos_matang_pengangkutan";
$kos_matang_pengangkutan =  new user('survey',$var);

$value[0]=$session_lesen;
$value[1]= $_COOKIE['tahun_report'];
$jaga = new user('matang_penjagaan',$value);
$tuai = new user('matang_penuaian', $value);
$angkut = new user('matang_pengangkutan', $value);

?>

	<link rel="stylesheet" href="../css/jquery.treeview.css" />
	<link rel="stylesheet" href="../css/screen.css" />
	
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/jquery.cookie.js" type="text/javascript"></script>
	<script src="../js/jquery.treeview.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function() {
			$("#browser").treeview({
				animated: "slow",
				collapsed: false
			});
		});
	</script>

	<div id="main">
    <strong><img src="../images/Bcase.png" width="16" height="16" />&nbsp;&nbsp;<?=setstring ( 'mal', 'Kos Matang', 'en', 'Mature Cost'); ?></strong>
    <ul id="browser" class="filetree">
<li><img src="../nav/file.gif" />
	  <a href="home.php?id=matang&amp;penjagaan"><?=setstring ( 'mal', 'Penjagaan', 'en', 'Upkeep'); ?></a>
	  <?php if ($kos_matang_penjagaan->total==0){?>
	   <img src="../images/warning_16.png" alt="dah" width="16" height="16" /> 
	   <?php }  
	   if ($kos_matang_penjagaan->total!=0) { ?>
	   <img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
	   <?php } ?>
	   </li>
<li><img src="../nav/file.gif" alt="" /> <a href="home.php?id=matang&penuaian"><?=setstring ( 'mal', 'Penuaian BTS', 'en', 'FFB Harvesting'); ?></a> 
	
	<?php if ($kos_matang_penuaian->total==0){?>
	<img src="../images/warning_16.png" alt="dah" width="16" height="16" /> 
	<?php }
	if ($kos_matang_penuaian->total!=0)
	{?>
	<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
	<?php } ?>
	
	</li>
    <li><img src="../nav/file.gif" alt="" /> <a href="home.php?id=matang&pengangkutan"><?=setstring ( 'mal', 'Pengangkutan BTS', 'en', 'FFB Transportation'); ?></a> 
	<?php if ($kos_matang_pengangkutan->total==0){?>
	<img src="../images/warning_16.png" alt="dah" width="16" height="16" /> 
	<?php } 
	if ($kos_matang_pengangkutan->total!=0) 
	{?>
	<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
	<?php } ?>
	
	</li>
    </ul>
    </div>
	