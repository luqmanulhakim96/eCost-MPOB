<?php

/*
 *  Filename: estate/index.php
 *  Copyright 2010 Malaysia Palm Oil Board <azman@mpob.gov.my>
 *	Last update: 15.10.2010 11:46:16 am
 * 	- added check to progress bar
 */

$var[0]					= $session_lesen;
$var[1]					= date('Y');

$var[2]					= "kos_belum_matang";
$kos_belum_matang 		= new user('survey',$var);
$var[2]					= "kos_matang_penjagaan";
$kos_matang_penjagaan 	= new user('survey',$var);
$var[2]					= "kos_matang_penuaian";
$kos_matang_penuaian 	= new user('survey',$var);
$var[2]					= "kos_matang_pengangkutan";
$kos_matang_pengangkutan = new user('survey',$var);

$kbm				= $kos_belum_matang->status;
$kmjaga				= $kos_matang_penjagaan->status;
$kmtuai				= $kos_matang_penuaian->status;
$kmangkut			= $kos_matang_pengangkutan->status;
if(!$totalblm) {
	$bil_total_kos 	= 4;
	$percent_kos 	= (($kbm+$kmjaga+$kmtuai+$kmangkut)/$bil_total_kos)*100; 
	}
else {
	$bil_total_kos 	= 3;
	$percent_kos 	= (($kmjaga+$kmtuai+$kmangkut)/$bil_total_kos)*100; 
	}

	if(isset($_GET['firsttime'])) {
?>
<link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../ui/ui.core.js"></script>
<script type="text/javascript" src="../ui/ui.draggable.js"></script>
<script type="text/javascript" src="../ui/ui.resizable.js"></script>
<script type="text/javascript" src="../ui/ui.dialog.js"></script>
<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>

<script type="text/javascript">
	$(function() {
		$("#dialog_1").dialog( {
			autoOpen:true,
			modal:true
		});
	});
</script>

<div id="dialog_1">
	<p>
	 <?=setstring ( 'mal', 'Selamat Datang Ke Sistem E-COST Estet', 'en', 'Welcome to E-COST System for Estate'); ?>
	</p>
	<p><?=setstring ( 'mal', 'Sila Kemaskini Profil Anda Terlebih Dahulu', 'en', 'Please Update Your Profile'); ?></p>
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
			value:<?= number_format($percent_kos,2);?>
		});
	});
</script>
<p><strong><?=setstring ( 'mal', 'Selamat Datang', 'en', 'Welcome'); ?> <?= strtoupper($pengguna->namaestet);?></strong></p>

<table width="100%" border="0">
  <tr>
    <td width="49%" rowspan="4"><div style=" background-color: #ccc;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border: 1px solid #000;
padding: 10px;">
      <table>
        <tr>
          <td><strong><img src="../folder.png" alt="aaa" width="100" height="100" /></strong></td>
          <td><ul>
              <li> <?=setstring ( 'mal', 'Login berjaya terakhir anda pada', 'en', 'Last success login on'); ?> 
                <?= $pengguna->success; ?>
              </li>
            <br />
              <li> <?=setstring ( 'mal', 'Login gagal terakhir anda pada', 'en', 'Last failed login on'); ?>
                <?= $pengguna->fail;  ?>
              </li>
            <br />
              <li><?=setstring ( 'mal', 'Sila klik pada menu di atas untuk navigasi.', 'en', 'Please click on the menu to navigate.'); ?></li>
          </ul></td>
        </tr>
      </table>
    </div></td>
    <td height="17" colspan="2"><div id="progress"></div></td>
  </tr>
  <tr>
    <td width="3%" bgcolor="#53BC7A">&nbsp;</td>
    <td width="48%" height="19"><strong><?=setstring ( 'mal', 'Peratusan siap', 'en', 'Percentage Complete '); ?>:&nbsp;<?= number_format($percent_kos,2);?> %</strong></td>
  </tr>
  <tr>
    <td bgcolor="#C2496C">&nbsp;</td>
    <td height="20"><strong><?=setstring ( 'mal', 'Peratusan belum siap:', 'en', 'Percentage Incomplete'); ?>&nbsp;<?php $unpercent_kos = 100 - $percent_kos; echo number_format($unpercent_kos,2);?> %</strong></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="border-bottom:#000000 solid 1px;">&nbsp;</td>
  </tr>
  <?php if(!$totalblm) { ?>
  <tr>
    <td><?=setstring ( 'mal', 'Kos Belum Matang', 'en', 'Immature Cost'); ?></td>
	<td>:</td>
	<td><?php if($kos_belum_matang->status == '1') {
			echo "<img src='images/001_06.gif' title='Lengkap'>"; }
		else {
			echo "<img src='images/001_05.gif' title='Belum Lengkap'>";
			} 
		?>
	</td>
  </tr>
  <?php } ?>
  <tr>
    <td><?=setstring ( 'mal', 'Kos Matang - Penjagaan', 'en', 'Mature Cost - Upkeep'); ?></td>
	<td>:</td>
	<td><?php if($kos_matang_penjagaan->status == '1') {
			echo "<img src='images/001_06.gif' title='Lengkap'>"; }
		else {
			echo "<img src='images/001_05.gif' title='Belum Lengkap'>";
			} 
		?></td>
  </tr>
  <tr>
    <td><?=setstring ( 'mal', 'Kos Matang - Penuaian', 'en', 'Mature Cost - FBB Harvesting'); ?></td>
	<td>:</td>
	<td><?php if($kos_matang_penuaian->status == '1') {
			echo "<img src='images/001_06.gif' title='Lengkap'>"; }
		else {
			echo "<img src='images/001_05.gif' title='Belum Lengkap'>";
			} 
		?></td>
  </tr>
  <tr>
    <td><?=setstring ( 'mal', 'Kos Matang', 'en', 'Mature Cost - FBB Transportation'); ?></td>
	<td>:</td>
	<td><?php if($kos_matang_pengangkutan->status == '1') {
			echo "<img src='images/001_06.gif' title='Lengkap'>"; }
		else {
			echo "<img src='images/001_05.gif' title='Belum Lengkap'>";
			} 
		?></td>
  </tr>
  <tr>
    <td><?=setstring ( 'mal', 'Belanja Am', 'en', 'General Charges'); ?></td>
	<td>:</td>
	<td><?php if($kos_agensi->status == '1') {
			echo "<img src='images/001_06.gif' title='Lengkap'>"; }
		else {
			echo "<img src='images/001_05.gif' title='Belum Lengkap'>";
			} 
		?></td>
  </tr>
    <tr>
    <td><?=setstring ( 'mal', 'Buruh dan Mekanisasi', 'en', 'Labour and Mechanization'); ?></td>
	<td>:</td>
	<td><?php if($kos_ibupejabat->status == '1') {
			echo "<img src='images/001_06.gif' title='Lengkap'>"; }
		else {
			echo "<img src='images/001_05.gif' title='Belum Lengkap'>";
			} 
		?></td>
  </tr>
  <tr>
  	<td colspan="3">&nbsp;</td>
  </tr>
  
  
  
  <?php 
  $var[0] = $session_lesen; 
  $var[1] = (date('Y')-1);
  $kosbelummatang = new user('kos_belum_matang',$var);
if ($kosbelummatang->total!=0){
  ?>
  <tr>
    <td colspan="3"><div align="center"><span style="font-weight:bold; font-size:14px;"><?=setstring ( 'mal', 'Prestasi Kos Pemprosesan pada Tahun Lepas', 'en', 'Last year Cost Processing Performance '); ?></span></div></td>
  </tr>
  <tr>
    <td height="183" colspan="3"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="1" style="border:#333333 1px solid;">
      <tr>
        <td width="32%" rowspan="2">&nbsp;</td>
        <td width="32%" height="28" bgcolor="#62DFFF"><div align="center"><strong><?=setstring ( 'mal', 'Kos Belum Matang', 'en', 'Immature Crop Cost'); ?>
</strong></div></td>
        <td colspan="2" bgcolor="#62DFFF"><div align="center"><strong><?=setstring ( 'mal', 'Kos Matang', 'en', 'Mature Crop Cost'); ?>
</strong></div>          <div align="center"></div></td>
        </tr>
      <tr>
        <td width="32%" height="24" bgcolor="#F57A2C"> <div align="center"><strong>(RM/Ha)</strong></div></td>
        <td bgcolor="#F2D32A"><div align="center"><strong>(RM/Ha</strong>)</div></td>
        <td bgcolor="ADCE0B"><div align="center"><strong>(RM/T BTS)</strong></div></td>
      </tr>
      <tr>
        <td height="33" bgcolor="#FFCCFF"><div align="left"><strong>
          <?= strtoupper($pengguna->namaestet);?>
        </strong></div></td>
        <td bgcolor="#FFCCFF"><div align="center">1,489</div></td>
        <td width="18%" bgcolor="#FFCCFF"><div align="center">
          1,952
        </div></td>
        <td width="18%" bgcolor="#FFCCFF"><div align="center">
          192.82
        </div></td>
      </tr>
      <tr bgcolor="#CCFFFF">
        <td height="36"><div align="left"><strong>ROMPIN</strong></div></td>
        <td><div align="center">
          1,382
        </div></td>
        <td><div align="center">
          1,433
        </div></td>
        <td><div align="center">
          173.70
        </div></td>
      </tr>
      <tr bgcolor="#FFFFCC">
        <td height="32"><div align="left"><strong>PAHANG</strong></div></td>
        <td><div align="center">
          1,052
        </div></td>
        <td><div align="center">
          1,998
        </div></td>
        <td><div align="center">201.90</div></td>
      </tr>
      <tr bgcolor="#88FFAE">
        <td height="32"><div align="left"><strong>SEMENANJUNG</strong></div></td>
        <td><div align="center">3,468.19</div></td>
        <td><div align="center">4,311.72</div></td>
        <td><div align="center">214.26</div></td>
      </tr>
      <tr bgcolor="#FFA88A">
        <td height="29"><div align="left"><strong>MALAYSIA</strong></div></td>
        <td><div align="center">3,469.99</div></td>
        <td><div align="center">4,317.67</div></td>
        <td><div align="center">208.27</div></td>
      </tr>
    </table>
    <div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="3">
	<table width="100%">
      <tr>
        <td><div id="amxycontent" align="center" > </div></td>
        <td><div id="amxycontent2" align="center" > </div></td>
      </tr>
      <tr>
        <td colspan="2"><div id="amxycontent3" align="center" > </div></td>
        </tr>
    </table>
	<script type="text/javascript" src="../admin/amxy/swfobject.js"></script>
      <script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("../admin/amxy/amxy.swf", "amxy", "1000", "1000", "100", "#FFFFFF");
		so.addVariable("path", "../admin/amxy/");
		so.addVariable("settings_file", encodeURIComponent("summary_all_settings.xml"));
		so.addVariable("data_file", encodeURIComponent("summary_all_data.php"));
		//so.write("amxycontent");
		
		<!--var obj = new SWFObject("../admin/amcolumn/amcolumn.swf","amcolumn","80%","400","8","#FFFFFF");
		//obj.addVariable("path","../admin/amcolumn/");
		//obj.addVariable("settings_file",encodeURIComponent("amcolumn_settings.xml"));
		//obj.addVariable("data_file",encodeURIComponent("amcolumn_data.xml"));
		//obj.write("amxycontent");-->

		var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "100%", "380", "8", "#FFFFFF");
		so.addVariable("path", "amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("mi_all_setting.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_all.php"));
		so.addVariable("preloader_color", "#999999");
		so.write("amxycontent");	
		
		var so2 = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "100%", "380", "8", "#FFFFFF");
		so2.addVariable("path", "amcolumn/");
		so2.addVariable("settings_file", encodeURIComponent("mi_all_setting2.xml"));
		so2.addVariable("data_file", encodeURIComponent("mi_all2.php"));
		so2.addVariable("preloader_color", "#999999");
		so2.write("amxycontent2");	
		
		var so3 = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "60%", "380", "8", "#FFFFFF");
		so3.addVariable("path", "amcolumn/");
		so3.addVariable("settings_file", encodeURIComponent("mi_all_setting3.xml"));
		so3.addVariable("data_file", encodeURIComponent("mi_all3.php"));
		so3.addVariable("preloader_color", "#999999");
		so3.write("amxycontent3");	
		
	</script>
	<br />
<br /></td>
  </tr>
  <?php } ?>
  
  
  <?php if ($kosbelummatang->total==0){ ?>
  <tr>
    <td colspan="3" valign="top"><div align="center">
	 <p style="font-weight:bold; font-size:14px;"><?=setstring ( 'mal', 'Tiada Laporan Kos Pengeluaran pada Tahun Lepas', 'en', 'Manufacturing Cost for Previous Years is Absent'); ?></p>
      <p style="font-weight:bold; font-size:14px;"><?php echo "Kos belum matang:".$kbm; echo "<br />Kos penjagaan:".$kmjaga; echo "<br />Kos penuaian:".$kmtuai; echo "<br />Kos pengangkutan:".$kmangkut; ?></p>
      <p style="font-weight:bold; font-size:14px;">&nbsp;</p>
      <p style="font-weight:bold; font-size:14px;">&nbsp;</p>
       <p style="font-weight:bold; font-size:14px;">&nbsp;</p>
	     <p style="font-weight:bold; font-size:14px;">&nbsp;</p>
	     <p style="font-weight:bold; font-size:14px;">&nbsp;</p>
    </div></td>
  </tr>
  <?php } ?>
</table>
