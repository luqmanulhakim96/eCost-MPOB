<?php

/*
 *  Filename: mill/index.php
 *  Copyright 2010 Malaysia Palm Oil Board
 *	Last update: 15.10.2010 11:46:16 am
 * 	2010-10-15 Fadli Saad  <fadlisaad@gmail.com> modified code to check progress
 */

$variable[0]	= $_SESSION['lesen'];
$variable[1]	= $_SESSION['tahun'];
$buruh 			= new user('buruh',$variable);
$koslain 		= new user ('koslain',$variable);
$pemprosesan 	= new user('pemprosesan', $variable);

$totalkosmill 	= 3; 
$totalmill 		= (($buruh->status + $koslain->status + $pemprosesan->status)/$totalkosmill)*100; 

if(isset($_GET['firsttime'])) {
?>
<link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../ui/ui.core.js"></script>
<script type="text/javascript" src="../ui/ui.draggable.js"></script>
<script type="text/javascript" src="../ui/ui.resizable.js"></script>
<script type="text/javascript" src="../ui/ui.dialog.js"></script>
<script type="text/javascript" src="../ui/ui.progressbar.js"></script>
<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>
<script type="text/javascript">
	$(function() {
		$("#dialog_1").dialog( {
			autoOpen:true,
			modal:true
		});
	});
</script>
<style type="text/css">
<!--
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<div id="dialog_1">
	<p><?=setstring ( 'mal', 'Selamat Datang Ke Sistem E-COST Kilang', 'en', 'Welcome to E-COST System for Mill'); ?>
 </p>
	<p><?=setstring ( 'mal', 'Sila Kemaskini Profil Anda Terlebih Dahulu', 'en', 'Please Update Your Profile First'); ?>
</p>
</div>
<?php
	}
?>
<link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../ui/ui.core.js"></script>
<script type="text/javascript" src="../ui/ui.draggable.js"></script>
<script type="text/javascript" src="../ui/ui.resizable.js"></script>
<script type="text/javascript" src="../ui/ui.dialog.js"></script>
<script type="text/javascript" src="../ui/ui.progressbar.js"></script>
<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>
<script type="text/javascript">
	$(function() {
		$("#progress").progressbar({ 
			value:<?php echo number_format($totalmill,2);?>
		});
	});
</script>
<p><strong><?=setstring ( 'mal', 'Selamat Datang ', 'en', 'Welcome'); ?> <?= strtoupper($pengguna->nama);?></strong></p>

<table width="100%" border="0">
  <tr>
    <td width="53%" rowspan="4">
      <div style=" background-color: #ccc;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border: 1px solid #000;
padding: 10px;">
<table><tr><td><strong><img src="../folder.png" alt="aaa" width="100" height="100" /></strong></td>
<td>
        <ul>
          <li><?=setstring ( 'mal', 'Login berjaya terakhir anda pada', 'en', 'Last success login on'); ?> 
            <?= $pengguna->success; ?>
          </li>
        <br />
          <li><?=setstring ( 'mal', 'Login gagal terakhir anda pada', 'en', 'Last failed login on'); ?>
<?= $pengguna->success; ?>          </li>
        <br />
          <li><?=setstring ( 'mal', 'Sila klik pada menu di atas untuk navigasi.', 'en', 'Please click on the menu to navigate.'); ?></li>
      </ul></td>
      </tr>
      </table>
      </div></td>
    <td height="24" colspan="2"><div id="progress"></div></td>
  </tr>
  <tr>
    <td width="3%" height="24" bgcolor="#53BC7A">&nbsp;</td>
    <td width="44%"><strong><?=setstring ( 'mal', 'Peratusan siap', 'en', 'Percentage complete'); ?>
:&nbsp;<?php echo number_format($totalmill,2);?> %</strong></td>
  </tr>
  <tr>
    <td height="24" bgcolor="#C2496C">&nbsp;</td>
    <td><strong><?=setstring ( 'mal', 'Peratusan belum siap', 'en', 'Percentage Incomplete '); ?>
:&nbsp;<?php echo number_format(100-$totalmill,2);?> %</strong></td>
  </tr>
  <tr>
    <td colspan="3" style="border-bottom:#000000 solid 1px;">&nbsp;</td>
  </tr>
  <tr>
    <td><?=setstring ( 'mal', 'Kos Pemprosesan', 'en', 'Processing Cost'); ?> </td>
	<td>:</td>
	<td><?php if($pemprosesan->status == '1') {
			echo "<img src='images/001_06.gif' title='Lengkap'>"; }
		else {
			echo "<img src='images/001_05.gif' title='Belum Lengkap'>";
			} 
		?>
	</td>
  </tr>
  <tr>
    <td><?=setstring ( 'mal', 'Kos-kos Lain', 'en', 'Other Cost'); ?> </td>
	<td>:</td>
	<td><?php if($koslain->status == '1') {
			echo "<img src='images/001_06.gif' title='Lengkap'>"; }
		else {
			echo "<img src='images/001_05.gif' title='Belum Lengkap'>";
			} 
		?></td>
  </tr>
  <tr>
    <td><?=setstring ( 'mal', 'Buruh', 'en', 'Labour'); ?></td>
	<td>:</td>
	<td><?php if($buruh->status == '1') {
			echo "<img src='images/001_06.gif' title='Lengkap'>"; }
		else {
			echo "<img src='images/001_05.gif' title='Belum Lengkap'>";
			} 
		?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <?php if($on!=="off"){?>
  <tr>
    <td colspan="3" valign="top"><div align="center">
     <p style="font-weight:bold; font-size:14px;"><?=setstring ( 'mal', 'Tiada Prestasi Kos Pemprosesan pada Tahun Lepas', 'en', 'The Processing Cost Performance for Previous Years in Unavailable'); ?>
</p> 
	 <p style="font-weight:bold; font-size:14px;">&nbsp;</p>
      <p style="font-weight:bold; font-size:14px;">&nbsp;</p>
      <p style="font-weight:bold; font-size:14px;">&nbsp;</p>
      <p style="font-weight:bold; font-size:14px;">&nbsp;</p>
	  <p style="font-weight:bold; font-size:14px;">&nbsp;</p><p style="font-weight:bold; font-size:14px;">&nbsp;</p><p style="font-weight:bold; font-size:14px;">&nbsp;</p>
    </div></td>
  </tr>
  <?php } ?>
  <?php if($on=="off"){?>
  <tr>
  	<td colspan="3"><div align="center"><span style="font-weight:bold; font-size:14px;"><?=setstring ( 'mal', 'Prestasi Kos Pemprosesan pada Tahun Lepas', 'en', 'Last year Cost Processing Performance '); ?>
</span></div></td>
  </tr>
  <tr>
    <td height="183" colspan="3"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:#333333 1px solid;">
      <tr>
        <td height="49" colspan="2">&nbsp;</td>
        <td width="33%" bgcolor="#F57A2C"><div align="center"><strong><?=setstring ( 'mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?>
</strong></div> <div align="center"><strong>(RM)</strong></div></td>
        <td width="32%" bgcolor="#62DFFF"><div align="center"><strong><?=setstring ( 'mal', 'Kadar Perahan Minyak', 'en', 'Oil Extraction Rate'); ?>
</strong></div>          <div align="center"></div>          <div align="center"><strong>(%)</strong></div></td>
        </tr>
      
      <tr>
        <td width="2%" height="44" bgcolor="#FFCCFF">&nbsp;</td>
        <td width="33%" bgcolor="#FFCCFF"><div align="left"><strong><?= strtoupper($pengguna->nama);?></strong></div></td>
        <td bgcolor="#FFCCFF"><div align="center">1,450</div></td>
        <td bgcolor="#FFCCFF"><div align="center">
          22.00
        </div></td>
        </tr>
      <tr>
        <td height="38" bgcolor="#FFFFCC">&nbsp;</td>
        <td height="38" bgcolor="#FFFFCC"><div align="left"><strong>PAHANG</strong></div></td>
        <td bgcolor="#FFFFCC"><div align="center">
          1,947
        </div></td>
        <td bgcolor="#FFFFCC"><div align="center">
          20.00
        </div></td>
        </tr>
      <tr>
        <td height="42" bgcolor="#88FFAE">&nbsp;</td>
        <td height="42" bgcolor="#88FFAE"><div align="left"><strong>SEMENANJUNG</strong></div></td>
        <td bgcolor="#88FFAE"><div align="center">
          1,024
        </div></td>
        <td bgcolor="#88FFAE"><div align="center">
          18.00
        </div></td>
        </tr>
      <tr>
        <td height="37" bgcolor="#FFA88A">&nbsp;</td>
        <td height="37" bgcolor="#FFA88A"><div align="left"><strong>MALAYSIA</strong></div></td>
        <td bgcolor="#FFA88A"><div align="center">
          1,071
        </div></td>
        <td bgcolor="#FFA88A"><div align="center">
          20.00
        </div></td>
        </tr>
    </table>
    <div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="3"><script type="text/javascript" src="../admin/amxy/swfobject.js"></script>
	<div id="amxycontent" align="center">
		<strong></strong>	</div>

	<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("../admin/amxy/amxy.swf", "amxy", "80%", "400", "8", "#FFFFFF");
		so.addVariable("path", "../admin/amxy/");
		so.addVariable("settings_file", encodeURIComponent("summary_all_settings.xml"));
		so.addVariable("data_file", encodeURIComponent("summary_all_data.php"));
		
		var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "60%", "380", "8", "#FFFFFF");
		so.addVariable("path", "amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("mi_all_setting.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_all.php"));
		so.addVariable("preloader_color", "#999999");
		so.write("amxycontent");
		// ]]>
	</script><br />
<br /></td>
  </tr>
  <?php }?>
</table>
