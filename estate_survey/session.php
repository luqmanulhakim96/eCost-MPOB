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
<div id="no-print">
     <form id="form_report" name="form_report" method="post" action="">
       <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="99%"><div align="right" style="margin-right:20px">
      <table width="45%" border="0" cellpadding="0" cellspacing="0">
        <tr style="border-bottom:#333333 solid 1px;">
          <td width="22%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="#" onclick="window.print()"><img src="../images/Print.png" alt="Cetak" width="16" height="16" border="0" /></a> <a href="#" onclick="window.print()"><?=setstring ( 'mal', 'Cetak', 'en', 'Print'); ?></a></div></td>
          <td width="31%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="home.php?id=forum"><img src="../images/001_36.png" alt="Tanya" width="16" height="16" border="0" /></a> <a href="home.php?id=forum"><?=setstring ( 'mal', 'Pertanyaan', 'en', 'Enquiries'); ?></a></div></td>
          <td width="27%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="home.php?id=bantuan"><img src="../images/001_37.png" alt="aa" width="16" height="16" border="0" /></a> <a href="home.php?id=bantuan"><?=setstring ( 'mal', 'Bantuan', 'en', 'Help'); ?></a></div></td>
          <td width="20%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="../"><img src="../images/Log.png" alt="Keluar" width="16" height="19" border="0" /></a> <a href="../logout.php"><?=setstring ( 'mal', 'Keluar', 'en', 'Exit'); ?></a></div></td>
        </tr>
        <tr>
          <td colspan="4" align="center" valign="middle"><div align="right"><strong>

          	</strong>


              <strong>
	<?php
	echo $_COOKIE['tahun_report'];

	if($_COOKIE['tahun_report']==''){?>
	<script type="text/javascript">
		$(function() {

	document.cookie="tahun_report"+ "=" +<?php echo $tahun;?>;
	document.form_report.action="<?php echo $_SERVER['REQUEST_URI']; ?>";
  	document.form_report.submit();

		});
		</script>
       <?php } ?>

         <img src="../images/Client.png" alt="Orang" width="16" height="16" />
          <?= $pengguna->namaestet; ?>

		      </strong></div></td>
          </tr>
      </table>
    </div></td>
  </tr>
</table></form>
</div>
<?php
	}
}
?>
