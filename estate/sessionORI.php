<?php
include ('../class/user.class.php');
$pengguna = new user('estate',$_SESSION['lesen']);
$session_lesen = $_SESSION['lesen'];
if(($_SESSION['lesen']==NULL))

{
	echo "<script>window.location.href='../index1.php?session=false';</script>";

//echo "xda session";
}
else
{
	if(!isset($_GET['welcome'])) {
?>


<?php if($_SESSION['view']=='true'){?>
<script type="text/javascript">
		$(function() {
		   $('input').attr('disabled', true);
		   $('.viewsahaja').hide();
		   });
</script>
<?php } ?>

<div id="no-print">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="99%"><div align="right" style="margin-right:20px"> 
      <table width="61%" border="0" cellpadding="0" cellspacing="0">
        <tr style="border-bottom:#333333 solid 1px;">
          <td width="28%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><a href="#" onclick="tukarbahasa('mal');"><img src="../images/ms.gif" width="73" height="19" border="0" /></a> <a href="#" onclick="tukarbahasa('en');"><img src="../images/en.gif" width="73" height="19" border="0" /></a>&nbsp;</td>
          <td width="19%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="#" onclick="window.print()"><img src="../images/Print.png" alt="Cetak" width="16" height="16" border="0" /></a> <a href="#" onclick="window.print()"><?=setstring ( 'mal', 'Cetak', 'en', 'Print'); ?></a></div></td>
         <!-- <td width="19%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="home.php?id=forum"><img src="../images/001_36.png" alt="Tanya" width="16" height="16" border="0" /></a> <a href="home.php?id=forum"><?=setstring ( 'mal', 'Pertanyaan', 'en', 'Enquiries'); ?></a></div></td>-->
          <td width="17%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="home.php?id=bantuan"><img src="../images/001_37.png" alt="aa" width="16" height="16" border="0" /></a> <a href="home.php?id=bantuan"><?=setstring ( 'mal', 'Bantuan', 'en', 'Help'); ?></a></div></td>
          <td width="17%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="../"><img src="../images/Log.png" alt="Keluar" width="16" height="19" border="0" /></a> <a href="../logout.php"><?=setstring ( 'mal', 'Keluar', 'en', 'Exit'); ?></a></div></td>
        </tr>
        <tr>
          <td colspan="5" align="center" valign="middle"><div align="right"><strong>

          <?php echo $_SESSION['tahun'];?>
          <img src="../images/Client.png" alt="Orang" width="16" height="16" /> <?= $pengguna->namaestet; ?> 
		  
                    <?php
/*         if(($pengguna->namaestet==""))
{
	echo "<script>window.location.href='../index1.php?session=false';</script>";
}
*/		  ?>
		  </strong></div></td>
          </tr>
      </table>
    </div></td>
  </tr>
</table>
</div>
<?php
	}
}
?>

