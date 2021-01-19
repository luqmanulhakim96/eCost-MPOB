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
  <p><?=setstring ( 'mal', 'Soalan Tamat', 'en', 'End of Survey'); ?><span class="style1"></span></p>
  <p><strong><?=setstring ( 'mal', '&quot;Terima Kasih Atas Kerjasama Anda&quot;', 'en', '&quot;Thanks for your cooperation&quot;'); ?></strong></p>
</div>
<p align="center"><img src="../images/bigrotation2.gif" width="32" height="32" /></p>
<p align="center"><span id="txt"></span><br />
</p>
<script>
waiting();
</script>