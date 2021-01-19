
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
  <p>-Soalan Tamat-<span class="style1"></span></p>
  <p><strong>&quot;Terima Kasih Atas Kerjasama Anda&quot;</strong></p>
</div>
<p align="center"><img src="../images/bigrotation2.gif" width="32" height="32" /></p>
<p align="center"><span id="txt"></span><br />
</p>
<script>
waiting();
</script>