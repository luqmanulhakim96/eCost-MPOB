<?php include '../class/admin.estate.class.php'; ?>
<link rel="stylesheet" type="text/css" href="../text_style.css" />
<style type="text/css">
<!--
.style1 {
	font-size: 11px;
	font-style: italic;
}
-->
</style>
<link rel="stylesheet" href="../js/colorbox/colorbox.css" type="text/css" />
<script type="text/javascript" src="../js/colorbox/colorbox/jquery.colorbox.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$(".boxcolor").colorbox({width:"40%", height:"100%"});
});
</script>

<p align="center"><img src="images/region.png" width="404" height="179" border="0" usemap="#Map" />
	  <map name="Map" id="Map">
        <area shape="poly" coords="147,164,146,161" href="#" />
        <area shape="poly" coords="32,11" href="#" />
	    <area shape="poly" coords="28,12" href="#" />
        <area id="pm" shape="poly" title="Region 1 (Semenanjung Malaysia)" coords="28,13,56,28,84,27,114,49,124,81,123,106,135,130,139,147,144,164,125,165,105,153,84,140,72,127,62,118,49,100,42,84,34,59,31,52" href="home.php?id=estate&amp;sub=response_rate&amp;region=pm" />
        <area id="sabah" shape="poly" title="Region 3 (Sabah)" coords="299,63,314,51,328,30,341,32,349,43,358,52,372,60,388,69,377,76,364,80,369,87,354,92,335,92,315,92,306,93" href="home.php?id=estate&amp;sub=response_rate&amp;region=pm&amp;view=off&amp;state_id=&amp;state=SABAH" />
        <area id="sarawak" shape="poly" title="Region 2 (Sarawak)" coords="300,77,286,79,275,86,256,97,242,116,217,122,203,138,196,155,186,159,171,151,168,146,175,165,184,171,209,170,227,157,248,160,265,160,281,145,286,133,299,116,302,100,308,95,304,107,305,99" href="home.php?id=estate&amp;sub=response_rate&amp;region=pm&amp;view=off&amp;state_id=&amp;state=SARAWAK" />
      </map>
</p>

<table width="100%">
  <tr valign="top">
    <td width="41%"><div align="center"><br />
        <span class="style1">Select on Region to view Data by Region</span><br />
        <br />
    </div></td>
  </tr>
  <tr>
    <td>
	<?php if ($sub==''){ ?>
	<table width="100%" border="0" cellspacing="0" style="padding:3px;">
		<tr height="29">
			<td width="10%">&nbsp;</td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Total Respondent</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Response</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Response Rate (%)</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Non Response</strong></div></td>
		</tr>
		<tr height="29">
			<td width="10%" bgcolor="#FFCC66"><strong>Malaysia</strong></td>
			<td bgcolor="#FFCC66"><div align="center"><?php echo number_format($total);?></div></td>
			<td bgcolor="#FFCC66"><div align="center"><a href="home.php?id=estate&amp;sub=total_all"><?php echo number_format($total_all);?></a></div></td>
			<td bgcolor="#FFCC66"><div align="center"><?php echo $percent_all;?></div></td>
			<td bgcolor="#FFCC66"><div align="center"><a href="home.php?id=estate&amp;sub=nonresponse_all&type=all"><strong><?php echo $nonresponse_all; ?></strong></a></div></td>
		</tr>
		<tr height="29">
			<td width="10%" bgcolor="#99FF99"><strong>Peninsular</strong></td>
			<td bgcolor="#99FF99"><div align="center"><?php echo number_format($total_p);?></div></td>
			<td bgcolor="#99FF99"><div align="center"><a href="home.php?id=estate&amp;sub=total_peninsular"><?php echo number_format($total_peninsular);?></a></div></td>
			<td bgcolor="#99FF99"><div align="center"><?php echo $percent_peninsular;?></div></td>
			<td bgcolor="#99FF99"><div align="center"><a href="home.php?id=estate&amp;sub=nonresponse_all&type=peninsular"><strong><?php echo $nonresponse_peninsular; ?></strong></a></div></td>
		</tr>
		<tr height="29">
			<td width="10%" bgcolor="#FFCC66"><strong>Sabah</strong></td>
			<td bgcolor="#FFCC66"><div align="center"><?php echo number_format($total_sb);?></div></td>
			<td bgcolor="#FFCC66"><div align="center"><a href="home.php?id=estate&amp;sub=total_sabah"><?php echo number_format($total_sabah);?></a></div></td>
			<td bgcolor="#FFCC66"><div align="center"><?php echo $percent_sabah;?></div></td>
			<td bgcolor="#FFCC66"><div align="center"><a href="home.php?id=estate&amp;sub=nonresponse_all&type=sabah"><strong><?php echo $nonresponse_sabah; ?></strong></a></div></td>
		</tr>
		<tr height="29">
			<td width="10%" bgcolor="#99FF99"><strong>Sarawak</strong></td>
			<td bgcolor="#99FF99"><div align="center"><?php echo number_format($total_sw);?></div></td>
			<td bgcolor="#99FF99"><div align="center"><a href="home.php?id=estate&amp;sub=total_sarawak"><?php echo number_format($total_sarawak);?></a></div></td>
			<td bgcolor="#99FF99"><div align="center"><?php echo $percent_sarawak;?></div></td>
			<td bgcolor="#99FF99"><div align="center"><a href="home.php?id=estate&amp;sub=nonresponse_all&type=sarawak"><strong><?php echo $nonresponse_sarawak; ?></strong></a></div></td>
		</tr>
    </table>
	<?php } ?>
	<?php if ($region=='pm' and $view!='off'){?>
    <table width="100%" border="0" cellspacing="0" style="padding:3px;">
      <tr height="29">
			<td width="10%">&nbsp;</td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Total Respondent</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Response</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Response Rate (%)</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Non Response</strong></div></td>
		</tr>
		<tr height="29">
          <td bgcolor="#99FF99"><strong>&nbsp;PENINSULAR</strong></td>
		  <td bgcolor="#99FF99"><div align="center"><?php echo number_format($total_p);?></div></td>
		  <td bgcolor="#99FF99"><div align="center"><a href="home.php?id=estate&amp;sub=total_peninsular"><?php echo number_format($total_peninsular);?></a></div></td>
		  <td bgcolor="#99FF99"><div align="center"><?php echo $percent_peninsular;?></div></td>
		  <td bgcolor="#99FF99"><div align="center"><a href="home.php?id=estate&amp;sub=nonresponse_all&amp;type=peninsular"><strong><?php echo $nonresponse_peninsular; ?></strong></a></div></td>
	    </tr>

        <?php
		$con = connect();
		$query_negeri = "select * from negeri where nama !='SABAH' and nama !='SARAWAK'";
		$res_negeri = mysqli_query($con, $query_negeri);
		while($row_negeri = mysqli_fetch_array($res_negeri)){
		?>
        <tr <?php if(++$op%2!=0){echo "bgcolor=\"#FFCC66\""; }
		else{echo "bgcolor=\"#99FF99\"";}
		 ?>  height="29">
		  <td><strong>&nbsp;<a href="negeri_response.php?id=<?php echo $row_negeri['nama']; ?>" class="boxcolor"><?php echo $row_negeri['nama']; ?></a></strong></td>
		  <td><div align="center">
          <?php $neg = negeri($row_negeri['nama'],'', $_COOKIE['tahun_report']);
		  echo number_format($neg[0]);
		  ?>
          </div></td>
		  <td><div align="center"><a href="home.php?id=estate&amp;sub=total_peninsular&negeri=<?php echo $row_negeri['nama']; ?>"><?php echo number_format($neg[1]);?></a></div></td>
		  <td><div align="center"><?php echo $neg[4];?></div></td>
		  <td><div align="center"><a href="home.php?id=estate&amp;sub=nonresponse_all&amp;type=peninsular&amp;negeri=<?php echo $row_negeri['nama'];?>"><strong><?php echo $neg[5];?></strong></a></div></td>
	    </tr>
        <?php } ?>
    </table>
	<?php } ?>
	<?php if ($region=='sabah'){?>
    <table width="100%" border="0" cellspacing="0" style="padding:3px;">
      <tr height="29">
			<td width="10%">&nbsp;</td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Total Respondent</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Response</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Response Rate (%)</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Non Response</strong></div></td>
		</tr>
		<tr height="29">
          <td bgcolor="#FFCC66"><strong><a href="negeri_response.php?id=SABAH">Sabah</a></strong></td>
		  <td bgcolor="#FFCC66"><div align="center"><?php echo number_format($total_sb);?></div></td>
		  <td bgcolor="#FFCC66"><div align="center"><a href="home.php?id=estate&amp;sub=total_sabah"><?php echo number_format($total_sabah);?></a></div></td>
		  <td bgcolor="#FFCC66"><div align="center"><?php echo $percent_sabah;?></div></td>
		  <td bgcolor="#FFCC66"><div align="center"><a href="home.php?id=estate&amp;sub=nonresponse_all&amp;type=sabah"><strong><?php echo $nonresponse_sabah; ?></strong></a></div></td>
	    </tr>
    </table>
	<p>&nbsp; </p>
	<?php } ?>
	<?php if($region=='swk'){?>
    <table width="100%" border="0" cellspacing="0" style="padding:3px;">
      <tr height="29">
			<td width="10%">&nbsp;</td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Total Respondent</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Response</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Response Rate (%)</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Non Response</strong></div></td>
		</tr>
		<tr height="29">
          <td bgcolor="#99FF99"><strong><a href="negeri_response.php?id=SARAWAK">Sarawak</a></strong></td>
		  <td bgcolor="#99FF99"><div align="center"><?php echo number_format($total_sw);?></div></td>
		  <td bgcolor="#99FF99"><div align="center"><a href="home.php?id=estate&amp;sub=total_sarawak"><?php echo number_format($total_sarawak);?></a></div></td>
		  <td bgcolor="#99FF99"><div align="center"><?php echo $percent_sarawak;?></div></td>
		  <td bgcolor="#99FF99"><div align="center"><a href="home.php?id=estate&amp;sub=nonresponse_all&amp;type=sarawak"><strong><?php echo $nonresponse_sarawak; ?></strong></a></div></td>
	    </tr>
    </table>
<p>&nbsp; </p>
	<?php } ?>
	<?php if($region=='pm' and $state!="" and $view=="off"){?>
    <table width="100%" border="0" cellspacing="0" style="padding:3px;">
      <tr height="29">
			<td width="10%">&nbsp;</td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Total Respondent</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Response</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Response Rate (%)</strong></div></td>
			<td background="../images/tb_BG.gif"><div align="center"><strong>Non Response</strong></div></td>
		</tr>
		<tr height="29">
          <td bgcolor="#99FF99"><strong>
		  <a href="negeri_response.php?id=<?php echo $state; ?>" class="boxcolor">
		  <?php echo strtoupper($state);
		  $neg_state = negeri($state,'', $_COOKIE['tahun_report']);
		  ?>          </a></strong></td>
		  <td bgcolor="#99FF99"><div align="center"><?php  echo number_format($neg_state[0]); ?></div></td>
		  <td bgcolor="#99FF99"><div align="center">
          <?php
		  if($state == "SARAWAK" || $state == "sarawak"){
			  ?>
             <a href="home.php?id=estate&amp;sub=total_sarawak"><?php echo number_format($neg_state[1]);?></a>
            <?php
		  }else if($state == "SABAH" || $state == "sabah"){
			  ?>
             <a href="home.php?id=estate&amp;sub=total_sabah"><?php echo number_format($neg_state[1]);?></a>
            <?php
		  }else{
			?>
             <a href="home.php?id=estate&amp;sub=total_peninsular&amp;negeri=<?php echo $state; ?>"><?php echo number_format($neg_state[1]);?></a>
            <?php
		  }
		  ?>
          </div></td>
		  <td bgcolor="#99FF99"><div align="center"><?php echo $neg_state[4];?></div></td>
		  <td bgcolor="#99FF99"><div align="center">
          <?php
		  if($state == "SARAWAK" || $state == "sarawak"){
			  ?>
             <a href="home.php?id=estate&amp;sub=nonresponse_all&amp;type=sarawak"><?php echo $neg_state[5];?></a>
            <?php
		  }else if($state == "SABAH" || $state == "sabah"){
			  ?>
             <a href="home.php?id=estate&amp;sub=nonresponse_all&amp;type=sabah"><?php echo $neg_state[5];?></a>
            <?php
		  }else{
			?>
             <a href="home.php?id=estate&amp;sub=nonresponse_all&amp;type=peninsular&amp;negeri=<?php echo $state;?>"><?php echo $neg_state[5];?></a>
            <?php
		  }
		  ?>
          </div></td>
	    </tr>

        <?php
		$con = connect();
		if($district==""){
		$query_negeri_daerah = "select district_name from district where state_id='$state_id'";
		}
		else if($district!=""){
		$query_negeri_daerah = "select district_name from district where state_id='$state_id' and district_name = '$district'";
		}
		//echo $query_negeri_daerah;
		$res_negeri_daerah = mysqli_query($con, $query_negeri_daerah);
		while($row_negeri_daerah = mysqli_fetch_array($res_negeri_daerah)){
		?>
        <tr height="29" <?php if(++$op%2!=0){echo "bgcolor=\"#FFCC66\""; }
		else{echo "bgcolor=\"#99FF99\"";}
		 ?>>
          <td ><strong><?php echo strtoupper($row_negeri_daerah['district_name']);
		  $neg_state_district = negeri($state,$row_negeri_daerah['district_name'], $_COOKIE['tahun_report']);
		  ?></strong></td>
		  <td ><div align="center"><?php  echo number_format($neg_state_district[0]); ?></div></td>
		  <td ><div align="center">
           <?php
		  if($state == "SARAWAK" || $state == "sarawak"){
			  ?>
             <a href="home.php?id=estate&amp;sub=total_sarawak&amp;district=<?php echo $row_negeri_daerah['district_name'];?>"><?php echo number_format($neg_state_district[1]);?></a>
            <?php
		  }else if($state == "SABAH" || $state == "sabah"){
			  ?>
             <a href="home.php?id=estate&amp;sub=total_sabah&amp;district=<?php echo $row_negeri_daerah['district_name'];?>"><?php echo number_format($neg_state_district[1]);?></a>
            <?php
		  }else{
			?>
             <a href="home.php?id=estate&amp;sub=total_peninsular&amp;negeri=<?php echo $state; ?>&amp;district=<?php echo $row_negeri_daerah['district_name'];?>"><?php echo number_format($neg_state_district[1]);?></a>
            <?php
		  }
		  ?>

          </div></td>
		  <td><div align="center"><?php echo $neg_state_district[4];?></div></td>
		  <td><div align="center">
          <?php
		  if($state == "SARAWAK" || $state == "sarawak"){
			  ?>
             <a href="home.php?id=estate&amp;sub=nonresponse_all&amp;type=sarawak&amp;district=<?php echo $row_negeri_daerah['district_name'];?>"><?php echo $neg_state_district[5];?></a>
            <?php
		  }else if($state == "SABAH" || $state == "sabah"){
			  ?>
             <a href="home.php?id=estate&amp;sub=nonresponse_all&amp;type=sabah&amp;district=<?php echo $row_negeri_daerah['district_name'];?>"><?php echo $neg_state_district[5];?></a>
            <?php
		  }else{
			?>
             <a href="home.php?id=estate&amp;sub=nonresponse_all&amp;type=peninsular&amp;negeri=<?php echo $state;?>&amp;district=<?php echo $row_negeri_daerah['district_name'];?>"><?php echo $neg_state_district[5];?></a>
            <?php
		  }
		  ?>
          </div></td>
	    </tr>
        <?php } ?>
    </table>
<p>&nbsp; </p>
	<?php } ?>

	<p>&nbsp; </p></td>
  </tr>
</table>

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
<p style="text-align:center;">Query was done in <?php echo $time_diff; ?> seconds</p>
