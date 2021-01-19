<?php extract($_GET);
extract($_POST);
include('../setstring.inc');
?>
<link rel="stylesheet" type="text/css" href="../text_style.css" />

<script>
var t=3;

function waiting()
{
	t--;
	if(t==0)
	{
		<?php
		if(isset($_GET['mill'])) {
		?>
		window.location.href='../mill/home.php?id=home';
		<?php
		}
		else {
		?>
		window.location.href='home.php?id=home';
		<?php
		}
		?>
	}
	//document.getElementById("time").innerHTML=t; 
	var a=setTimeout("waiting()",1000);
}
</script>

<div align="center">
  <p><img src="../logo.png" width="179" height="61" /></p>
  <p>
  <?=setstring ( 'mal', 'SELAMAT DATANG KE SISTEM', 'en', 'WELCOME TO '); ?>
   <strong>E-COST</strong> <?php if(isset($_GET['mill'])) { echo setstring ( 'mal', 'KILANG', 'en', 'MILL '); } else { echo setstring ( 'mal', 'Estet', 'en', 'Estate '); } ?>
  </p>
  <p><strong>&quot;
  <?=setstring ( 'mal', 'Menjana Perubahan Industri Sawit', 'en', 'Transformation Palm Oil Industries ');?>
  &quot;</strong></p>
</div>
<p align="center"><img src="../images/bigrotation2.gif" width="32" height="32" /></p>
<p align="center"><span id="txt"></span><br />
</p>
<script>
waiting();
</script>