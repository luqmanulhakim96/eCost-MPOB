<link rel="stylesheet" type="text/css" href="../text_style.css" />
<style type="text/css">
<!--
.style1 {
	font-size: 11px;
	font-style: italic;
}
-->
</style>
<table width="100%">
  <tr valign="top">
    <td width="41%"><div align="center"><img src="images/region.png" width="404" height="179" border="0" usemap="#Map" /><br />
        <span class="style1">Select on Region to view Data by Region </span><br />
        <br />
    </div></td>
  </tr>
  <tr>
    <td>
	<?php if ($sub==''){ ?>
	<table width="100%" border="0" cellspacing="0" style="padding:3px;">
      <tr>
        <td width="19%" height="31">&nbsp;</td>
        <td width="19%" background="../images/tb_BG.gif"><div align="center"><strong>Total Respondent</strong></div></td>
        <td width="21%" background="../images/tb_BG.gif"><div align="center"><strong>No of Response</strong></div></td>
        <td width="22%" background="../images/tb_BG.gif"><div align="center"><strong>Response Rate (%)</strong></div></td>
        <td width="19%" background="../images/tb_BG.gif"><div align="center"><strong>No of Non Response</strong></div></td>
        </tr>
      <tr>
        <td height="35" bgcolor="#FFCC66"><strong>Malaysia</strong></td>
        <td bgcolor="#FFCC66"><div align="center"><?= number_format($responsemill->totalall(''));?></div></td>
        <td bgcolor="#FFCC66"><div align="center"><?php $var = date('Y');$jumlahresponse = $responsemill->totalresponse($var); echo number_format($jumlahresponse);?></div></td>
        <td bgcolor="#FFCC66"><div align="center"><?php $rta=$responsemill->totalall(''); $jumlahallresponse = ($jumlahresponse/$rta)*100; echo number_format($jumlahallresponse,2);?></div></td>
        <td bgcolor="#FFCC66"><div align="center"><a href="home.php?id=estate&amp;sub=nonresponde&amp;total=1300&amp;region=Malaysia"><strong><?php $non_all = $rta-$jumlahresponse; echo number_format($non_all);?></strong></a></div></td>
        </tr>
      <tr>
        <td height="29" bgcolor="#99FF99"><strong>Peninsular</strong></td>
        <td bgcolor="#99FF99"><div align="center"><?= number_format($responsemill->totalall('peninsular'));?></div></td>
        <td bgcolor="#99FF99"><div align="center"><?php $ta=$responsemill->totalresponsekawasan('peninsular',date('Y')); echo number_format($ta);?>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <?php 
		$tb = $responsemill->totalall('peninsular');
		$tr = ($ta/$tb)*100; 
		echo number_format($tr,2);?>
        </div></td>
        <td bgcolor="#99FF99"><div align="center"><a href="home.php?id=estate&amp;sub=nonresponde&amp;total=830&amp;region=Malaysia"><strong><?php echo number_format($tb-$ta);?></strong></a></div></td>
        </tr>
      <tr>
        <td height="28"><strong>Sabah</strong></td>
        <td><div align="center">
          <?= number_format($responsemill->totalall('sabah'));?>
        </div></td>
        <td><div align="center">
          <?php $tsbh = $responsemill->totalresponsekawasan('sabah',date('Y')); echo number_format($tsbh);?>
        </div></td>
        <td><div align="center">
          <?php 
			$tbsbh = $responsemill->totalall('sabah');		  
		$trsbh = ($tsbh/$tbsbh)*100; 
		echo number_format($trsbh,2);?>
        </div></td>
        <td><div align="center"><a href="home.php?id=estate&amp;sub=nonresponde&amp;total=1300&amp;region=Malaysia"><strong>
          <?php echo number_format($tbsbh-$tsbh);?>
        </strong></a></div></td>
        </tr>
      <tr>
        <td height="36" bgcolor="#99FF99"><strong>Sarawak</strong></td>
        <td bgcolor="#99FF99"><div align="center">
          <?= number_format($responsemill->totalall('sarawak'));?>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <?php $tsbh = $responsemill->totalresponsekawasan('sarawak',date('Y')); echo number_format($tsbh);?>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <?php 
			$tbsbh = $responsemill->totalall('sarawak');		  
		$trsbh = ($tsbh/$tbsbh)*100; 
		echo number_format($trsbh,2);?>
        </div></td>
        <td bgcolor="#99FF99"><div align="center"><a href="home.php?id=estate&amp;sub=nonresponde&amp;total=1300&amp;region=Malaysia"><strong>
          <?php echo number_format($tbsbh-$tsbh);?>
        </strong></a></div></td>
        </tr>
    </table>
	<?php } ?>
	<?php if ($region=='pm'){?>
    <table width="100%" border="0" cellspacing="0" style="padding:3px;">
      <tr>
        <td width="19%" height="31">&nbsp;</td>
        <td width="19%" background="../images/tb_BG.gif"><div align="center"><strong>Total Respondent</strong></div></td>
        <td width="21%" background="../images/tb_BG.gif"><div align="center"><strong>No of Response</strong></div></td>
        <td width="22%" background="../images/tb_BG.gif"><div align="center"><strong>Response Rate (%)</strong></div></td>
        <td width="19%" background="../images/tb_BG.gif"><div align="center"><strong>No of Non Response</strong></div></td>
      </tr>

      <tr>
        <td height="29" bgcolor="#99FF99"><strong>Peninsular</strong></td>
        <td bgcolor="#99FF99"><div align="center">3,300</div></td>
        <td bgcolor="#99FF99"><div align="center">2,200</div></td>
        <td bgcolor="#99FF99"><div align="center">95</div></td>
        <td bgcolor="#99FF99"><div align="center">830</div></td>
      </tr>
    </table>
	<p>&nbsp; </p>
	<?php } ?>
	<?php if ($region=='sabah'){?>
    <table width="100%" border="0" cellspacing="0" style="padding:3px;">
      <tr>
        <td width="19%" height="31">&nbsp;</td>
        <td width="19%" background="../images/tb_BG.gif"><div align="center"><strong>Total Respondent</strong></div></td>
        <td width="21%" background="../images/tb_BG.gif"><div align="center"><strong>No of Response</strong></div></td>
        <td width="22%" background="../images/tb_BG.gif"><div align="center"><strong>Response Rate (%)</strong></div></td>
        <td width="19%" background="../images/tb_BG.gif"><div align="center"><strong>No of Non Response</strong></div></td>
      </tr>

      <tr bgcolor="#FFCC66">
        <td height="28"><strong>Sabah</strong></td>
        <td><div align="center">1,530</div></td>
        <td><div align="center">1,400</div></td>
        <td><div align="center">97</div></td>
        <td><div align="center">130</div></td>
      </tr>
    </table>
	<p>&nbsp; </p>
	<?php } ?>
	<?php if($region=='swk'){?>
    <table width="100%" border="0" cellspacing="0" style="padding:3px;">
      <tr>
        <td width="19%" height="31">&nbsp;</td>
        <td width="19%" background="../images/tb_BG.gif"><div align="center"><strong>Total Respondent</strong></div></td>
        <td width="21%" background="../images/tb_BG.gif"><div align="center"><strong>No of Response</strong></div></td>
        <td width="22%" background="../images/tb_BG.gif"><div align="center"><strong>Response Rate (%)</strong></div></td>
        <td width="19%" background="../images/tb_BG.gif"><div align="center"><strong>No of Non Response</strong></div></td>
      </tr>
      


      <tr>
        <td height="36" bgcolor="#99FF99"><strong>Sarawak</strong></td>
        <td bgcolor="#99FF99"><div align="center">993</div></td>
        <td bgcolor="#99FF99"><div align="center">900</div></td>
        <td bgcolor="#99FF99"><div align="center">99</div></td>
        <td bgcolor="#99FF99"><div align="center">93</div></td>
      </tr>
    </table>
<p>&nbsp; </p>	  <?php } ?>
	
	<p>&nbsp; </p></td>
  </tr>
</table>

<map name="Map" id="Map">
<area shape="poly" coords="147,164,146,161" href="#" />
<area shape="poly" coords="32,11" href="#" /><area shape="poly" coords="28,12" href="#" />

<area id="pm" shape="poly" title="Region 1 (Semenanjung Malaysia)" coords="28,13,56,28,84,27,114,49,124,81,123,106,135,130,139,147,144,164,125,165,105,153,84,140,72,127,62,118,49,100,42,84,34,59,31,52" href="home.php?id=adm_mill&amp;sub=response_rate&amp;region=pm" />
<area id="sabah" shape="poly" title="Region 3 (Sabah)" coords="299,63,314,51,328,30,341,32,349,43,358,52,372,60,388,69,377,76,364,80,369,87,354,92,335,92,315,92,306,93" href="home.php?id=adm_mill&amp;sub=response_rate&amp;region=sabah" />
<area id="sarawak" shape="poly" title="Region 2 (Sarawak)" coords="300,77,286,79,275,86,256,97,242,116,217,122,203,138,196,155,186,159,171,151,168,146,175,165,184,171,209,170,227,157,248,160,265,160,281,145,286,133,299,116,302,100,308,95,304,107,305,99" href="home.php?id=adm_mill&amp;sub=response_rate&amp;region=swk" />
</map>

		<script type="text/javascript" src="amcolumn/swfobject.js"></script>
	<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("mie_region_setting.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_region.txt"));
		so.addVariable("preloader_color", "#999999");
		so.write("mi_region1");
		// ]]>
	</script>
	
		<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("mie_region_setting2.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_region2.txt"));
		so.addVariable("preloader_color", "#999999");
		so.write("mi_region2");
		// ]]>
	</script>
	
		<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("mie_region_setting3.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_region3.txt"));
		so.addVariable("preloader_color", "#999999");
		so.write("mi_region3");
		// ]]>
	</script>