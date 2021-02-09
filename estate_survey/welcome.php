<?php extract($_GET);
extract($_POST);
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
  <p>SELAMAT DATANG KE SISTEM <strong>E-COST</strong> <?php if(isset($_GET['mill'])) { echo "Kilang"; } else { echo "Estet"; } ?>
  </p>
  <p><strong>&quot;Menjana Perubahan Industri Sawit&quot;</strong></p>
</div>
<p align="center"><img src="../images/bigrotation2.gif" width="32" height="32" /></p>
<p align="center"><span id="txt"></span><br />
</p>
<script>
waiting();
</script>
