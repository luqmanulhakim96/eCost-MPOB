<?php include ('../class/mill.class.php');
$pengguna = new user('mill',$_SESSION['lesen']);
$ekilang = new user('ekilang',$_SESSION['lesen']);
$session_lesen = $_SESSION['lesen'];

if(($_SESSION['lesen']==NULL))
{
	echo "<script>window.location.href='../index1.php?session=false';</script>";

//echo "xda session";
}
else
{
?>
<style type="text/css">
<!--
.links {
}
a:visited {
	text-decoration: none;
}
a:link {
	text-decoration: none;
}
-->
</style>


<div id="no-print">
<form action="" method="post" name="form_report" id="form_report">

<table width="100%" border="0" cellpadding="0" cellspacing="0" id="no-print">
  <tr>
    <td width="90%"><div align="right" style="margin-right:20px">
      <table width="39%" height="61" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="23%" height="29" style="border-bottom:#000000 1px solid;"><div align="center"><img src="../images/Print.png" width="16" height="16" onclick="window.print()" /> <a href="#" onclick="window.print()" ><?=setstring ( 'mal', 'Cetak', 'en', 'Print'); ?></a></div></td>
          <td width="29%" style="border-bottom:#000000 1px solid;"><div align="center"><img src="../images/Comment.png" alt="pertanyaan" width="16" height="16" /> <a href="home.php?id=forum"><?=setstring ( 'mal', 'Pertanyaan', 'en', 'Enquiries'); ?></a></div></td>
          <td width="26%" style="border-bottom:#000000 1px solid;"><div align="center"><img src="../images/001_37.png" alt="Help" width="16" height="16" /> <a href="home.php?id=bantuan"><?=setstring ( 'mal', 'Bantuan', 'en', 'Help'); ?></a></div></td>
          <td width="22%" style="border-bottom:#000000 1px solid;"><div align="center"><img src="../images/Log.png" alt="" width="16" height="16" /> <a href="../logout.php"><?=setstring ( 'mal', 'Keluar', 'en', 'Exit'); ?></a></div></td>
        </tr>
        <tr>
          <td colspan="4"><div align="right"><strong><img src="../images/Client.png" alt="" width="16" height="16" />&nbsp;<?= $pengguna->nama; ?>
          <?php 
	//echo $_COOKIE['tahun_report'];
	
	if($_COOKIE['tahun_report']==''){?>
	<script type="text/javascript">
		$(function() {
		
	document.cookie="tahun_report"+ "=" +<?php echo $tahun;?>;
	document.form_report.action="<?php echo $_SERVER['REQUEST_URI']; ?>";
  	document.form_report.submit();
		
		});
		</script>
       <?php } ?>
          
          <?php
 /*         if(($pengguna->nama==""))
{
	echo "<script>window.location.href='../index1.php?session=false';</script>";
}*/
		  ?>
          
          </strong></div></td>
          </tr>
      </table>
          </div></td>
  </tr>
</table></form>
</div>
<?php } ?>