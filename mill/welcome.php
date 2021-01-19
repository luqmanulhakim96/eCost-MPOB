<?php include('../setstring.inc');?>
<style type="text/css">
<!--
.style1 {
	color: #000033;
	font-weight: bold;
}
.style21 {color: #FF0000}
-->
</style>

<script>
var t=3;

function waiting()
{

	t--;
	if(t==0)
	{
		window.location.href='home.php?id=home';
	}
	
	//document.getElementById("time").innerHTML=t; 
	var a=setTimeout("waiting()",1000);
	
}
</script>

<div align="center">  <p><img src="../logo.png" width="179" height="61" /></p>

  <p> <?=setstring ( 'mal', 'SELAMAT DATANG KE SISTEM', 'en', 'WELCOME TO '); ?> <span class="style1">E-COST</span></p>
  <p><strong>&quot;<?=setstring ( 'mal', 'Menjana Perubahan Industri Sawit', 'en', 'Empowering Change for the Oil Palm Industry'); ?>&quot;</strong></p>
</div>
<p align="center"><img src="../images/bigrotation2.gif" width="32" height="32" /></p>
<p align="center"><br />
</p>
<script>
waiting();
</script>