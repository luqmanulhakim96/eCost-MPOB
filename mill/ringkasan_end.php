<?php session_start();
include ('../Connections/connection.class.php');
extract($_GET);
extract($_POST);
$con =connect();
$q ="update mill_pemprosesan set status='1' where lesen = '".$_SESSION['lesen']."'";
$r =mysqli_query($con, $q);

$q ="update mill_kos_lain set status='1' where lesen = '".$_SESSION['lesen']."'";
$r =mysqli_query($con, $q);

$q ="update mill_buruh set status='1' where lesen = '".$_SESSION['lesen']."'";
$r =mysqli_query($con, $q);
?>
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

<div align="center">
  <p>-Maklumat Telah Dihantar ke MPOB-<span class="style1"></span></p>
  <p><strong>&quot;Terima Kasih Atas Kerjasama Anda&quot;</strong></p>
</div>
<p align="center"><img src="../images/bigrotation2.gif" width="32" height="32" /></p>
<p align="center"><span id="txt"></span><br />
</p>
<script>
waiting();
</script>
