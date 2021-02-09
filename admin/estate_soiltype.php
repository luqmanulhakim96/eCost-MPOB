<?php if (isset($_GET['type']) && isset($_GET['field'])) { ?>
<?php include("baju.php"); ?>
<?php include('pages.php'); ?>
<?php
if($_COOKIE['tahun_report'] == date('Y')) $table = 'esub';
else $table = "esub_".$_COOKIE['tahun_report'];
$con = connect();
?>
<link rel="stylesheet" href="../js/colorbox/colorbox.css" type="text/css" />
<script type="text/javascript" src="../js/colorbox/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".boxcolor").colorbox({width:"60%", height:"100%", iframe:true});
});
</script>
<style>
.filtering { background-color:light-gray}
#jqtf_filters {
	list-style:none;
	}
#jqtf_filters li {
	display:inline-block;
	position:relative;
	float:left;
	margin-bottom:20px
}
.style1 {color: #FFFFFF}
</style>
<div align="center">
<?php
$aQuery = "SELECT lesen FROM estate_info WHERE ".$_GET['field']." > 0";
$aRows = mysqli_query($con, $aQueryn);
if ($_GET['field'] == "lanar") echo "<h2>List of Estate with Alluvail Soil</h2>";
else if ($_GET['field'] == "pedalaman") echo "<h2>List of Estate with Rural Land</h2>";
else if ($_GET['field'] == "gambutcetek") echo "<h2>List of Estate with Shallow Peat Soil</h2>";
else if ($_GET['field'] == "gambutdalam") echo "<h2>List of Estate with Deep Peat Soil</h2>";
else if ($_GET['field'] == "laterit") echo "<h2>List of Estate with Laterite Soil</h2>";
else if ($_GET['field'] == "asidsulfat") echo "<h2>List of Estate with Sulphate Acid Soil</h2>";
else if ($_GET['field'] == "tanahpasir") echo "<h2>List of Estate with Sandy Soil</h2>";
else if ($_GET['field'] == "percentrata") echo "<h2>List of Estate with Flat Area</h2>";
else if ($_GET['field'] == "percentalun") echo "<h2>List of Estate with Undulating Area</h2>";
else if ($_GET['field'] == "percentbukit") echo "<h2>List of Estate with Hilly Area</h2>";
else if ($_GET['field'] == "percentcerun") echo "<h2>List of Estate with Steep</h2>";
?>
</div>
<table width="100%" border="0" cellpadding="0" align="left" cellspacing="0" class="baju" id="example2">
  <thead>
	<tr bgcolor="#8A1602" height="30">
	  <th width="4%"><span class="style1">No.</span></th>
	  <th width="15%"><span class="style1">Estate Name</span></th>
	  <th width="19%"><span class="style1">Company Name</span></th>
	  <th width="24%"><span class="style1"> License No.</span></th>
	  <th width="14%" bgcolor="#8A1602"><span class="style1">E-mail</span></th>
	  <th width="24%"><span class="style1">Last access</span></th>
	  <th width="24%" class="style1">Action</th>
	</tr>
</thead>
<tbody>
	<?php while($aRow = mysqli_fetch_array($aRows)) { ?>
		<tr valign="top" <?php if(++$er % 2 == 0){?>class="alt"<?php } ?>>
			<td><?php //echo $list++; ?></td>
			<td><a href="estate_details_incomplete.php?id=<?php echo $aRow['lesen'];?>" class="boxcolor">
			<?php
			$bQuery ="select * from $table where no_lesen_baru ='".$aRow['lesen']."'";
			$bRows = mysqli_query($con, $bQueryn);
			$bRow = mysqli_fetch_array($bRows);
			?>
			<?php echo $bRow['Nama_Estet']; ?></a></td>
			<td><?php echo $bRow['Syarikat_Induk']; ?></td>
			<td><?php echo $bRow['No_Lesen_Baru']; ?></td>
			<td><a href="emailnonresponde.php?bil=" class="boxcolor"><?php echo $bRow['Emel']; ?></a></td>
			<td>
			<?php
			$cQuery ="select success,password from login_estate where lesen ='".$aRow['lesen']."'";
			$cRows = mysqli_query($con, $cQuery);
			$cRow = mysqli_fetch_array($cRows);
			echo $cRow['success'];
			?>
			</td>
		    <td><div align="center"><a href="auto_login.php?username=<?php echo $bRow['No_Lesen_Baru'];?>&amp;password=<?php echo $cRow['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&view=false" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a>
            <a href="auto_login.php?username=<?php echo $bRow['No_Lesen_Baru'];?>&amp;password=<?php echo $cRow['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&view=true" target="_blank" > <img src="../images/001_36.png" width="20" height="20" border="0" title="View Only" /></a>
            </div></td>
		</tr>
	<?php } mysqli_close($con); ?>
	</tbody>
</table>
<br />


&nbsp;&nbsp;&nbsp;<br />

<a href="estate_soiltype_excel.php?field=<?php echo $_GET['field']; ?>&table=<?php echo $table; ?>" target="_blank" title="Pindah ke excel"><img src="../images/Excel-icon.png" width="48" height="48" border="0" title="Pindah ke Excel" /></a><br/>
<br />
<br />
<?php } else { ?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style4 {font-size: 16px; font-weight: bold; color: #FFFFFF; }
.style5 {
	color: #FFFFFF;
	font-weight: bold;
}
.style6 {
	font-size: 14px;
	font-weight: bold;
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
<script type="text/javascript">
function openScript(url, width, height) {
	var Win = window.open(url,"openScript",'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}
</script>
<?php
$con = connect();

$aQuery = "SELECT SUM(lanar) AS Alluvail FROM estate_info WHERE lanar IS NOT NULL";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Alluvail = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Alluvail == "") $Alluvail = 0;
	else $Alluvail = $aRow->Alluvail;
}

$aQuery = "SELECT SUM(pedalaman) AS Rural FROM estate_info WHERE pedalaman IS NOT NULL";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Rural = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Rural == "") $Rural = 0;
	else $Rural = $aRow->Rural;
}

$aQuery = "SELECT SUM(gambutcetek) AS Shallow FROM estate_info WHERE gambutcetek IS NOT NULL";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Shallow = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Shallow == "") $Shallow = 0;
	else $Shallow = $aRow->Shallow;
}

$aQuery = "SELECT SUM(gambutdalam) AS Deep FROM estate_info WHERE gambutdalam IS NOT NULL";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Deep = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Deep == "") $Deep = 0;
	else $Deep = $aRow->Deep;
}

$aQuery = "SELECT SUM(laterit) AS Lateritel FROM estate_info WHERE laterit IS NOT NULL";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Lateritel = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Lateritel == "") $Lateritel = 0;
	else $Lateritel = $aRow->Lateritel;
}

$aQuery = "SELECT SUM(asidsulfat) AS Sulphate FROM estate_info WHERE asidsulfat IS NOT NULL";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Sulphate = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Sulphate == "") $Sulphate = 0;
	else $Sulphate = $aRow->Sulphate;
}

$aQuery = "SELECT SUM(tanahpasir) AS Sandy FROM estate_info WHERE tanahpasir IS NOT NULL";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Sandy = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Sandy == "") $Sandy = 0;
	else $Sandy = $aRow->Sandy;
}

$Total = $Alluvail + $Rural + $Shallow + $Deep + $Lateritel + $Sulphate + $Sandy;

$aQuery = "SELECT SUM((IFNULL(lanar, 0) + IFNULL(pedalaman, 0) + IFNULL(gambutcetek, 0) + ".
		  "IFNULL(gambutdalam, 0) + IFNULL(laterit, 0) + IFNULL(asidsulfat, 0) + ".
		  "IFNULL(tanahpasir, 0)) * (ROUND(IFNULL(percentrata, 0) / 100, 4))) AS Flat ".
		  "FROM estate_info";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Flat = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Flat == "") $Flat = 0;
	else $Flat = $aRow->Flat;
}

$aQuery = "SELECT SUM((IFNULL(lanar, 0) + IFNULL(pedalaman, 0) + IFNULL(gambutcetek, 0) + ".
		  "IFNULL(gambutdalam, 0) + IFNULL(laterit, 0) + IFNULL(asidsulfat, 0) + ".
		  "IFNULL(tanahpasir, 0)) * (ROUND(IFNULL(percentalun, 0) / 100, 4))) AS Undulating ".
		  "FROM estate_info";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Undulating = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Undulating == "") $Undulating = 0;
	else $Undulating = $aRow->Undulating;
}

$aQuery = "SELECT SUM((IFNULL(lanar, 0) + IFNULL(pedalaman, 0) + IFNULL(gambutcetek, 0) + ".
		  "IFNULL(gambutdalam, 0) + IFNULL(laterit, 0) + IFNULL(asidsulfat, 0) + ".
		  "IFNULL(tanahpasir, 0)) * (ROUND(IFNULL(percentbukit, 0) / 100, 4))) AS Hilly ".
		  "FROM estate_info";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Hilly = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Hilly == "") $Hilly = 0;
	else $Hilly = $aRow->Hilly;
}

$aQuery = "SELECT SUM((IFNULL(lanar, 0) + IFNULL(pedalaman, 0) + IFNULL(gambutcetek, 0) + ".
		  "IFNULL(gambutdalam, 0) + IFNULL(laterit, 0) + IFNULL(asidsulfat, 0) + ".
		  "IFNULL(tanahpasir, 0)) * (ROUND(IFNULL(percentcerun, 0) / 100, 4))) AS Steep ".
		  "FROM estate_info";
$aRows = mysqli_query($con, $aQueryn);
if (mysqli_num_rows($aRows) == 0) $Steep = 0;
else {
	$aRow = mysqli_fetch_object($aRows);
	if ($aRow->Steep == "") $Steep = 0;
	else $Steep = $aRow->Steep;
}

$TotalTrain = $Flat + $Undulating + $Hilly + $Steep;
?>
<table width="600" align="center" class="baju" border="1" style="border-collapse:collapse;margin-bottom:20px;border:1px solid #000">
  <tr>
    <td colspan="2" style="padding:7px;background:#ccc;text-align:center;font-weight:bold">Area Respective to Soil Type</td>
  </tr>
  <tr>
    <td width="350" style="padding:7px;text-align:center;font-weight:bold">Soil Type</td>
	<td width="250" style="padding:7px;text-align:center;font-weight:bold">Total Area (Hectares)</td>
  </tr>
  <tr>
    <td style="padding:7px"><span id="lanar" class="SoilType" style="color:#00f;text-decoration:underline;cursor:pointer">Alluvail Soil</span></td>
	<td style="padding:7px;text-align:right"><?php echo number_format($Alluvail, 2, ".", ","); ?></td>
  </tr>
  <tr>
    <td style="padding:7px"><span id="pedalaman" class="SoilType" style="color:#00f;text-decoration:underline;cursor:pointer">Rural Land</span></td>
	<td style="padding:7px;text-align:right"><?php echo number_format($Rural, 2, ".", ","); ?></td>
  </tr>
  <tr>
    <td style="padding:7px">
	  <div style="float:left;width:100%">Peat Soil</div>
	  <div style="float:left;padding:3px 0px 0px 15px"><span style="color:#00f;cursor:pointer">-</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="gambutcetek" class="SoilType" style="color:#00f;text-decoration:underline;cursor:pointer">Shallow Peat Soil</span></div>
	</td>
	<td style="padding:7px;text-align:right">
	  <div style="float:left;width:100%">&nbsp;</div>
	  <div style="float:right;padding:3px 0px 0px 15px"><?php echo number_format($Shallow, 2, ".", ","); ?></div>
	</td>
  </tr>
  <tr>
    <td style="padding:7px 7px 7px 22px"><span style="color:#00f;cursor:pointer">-</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="gambutdalam" class="SoilType" style="color:#00f;text-decoration:underline;cursor:pointer">Deep Peat Soil</span></td>
	<td style="padding:7px;text-align:right"><?php echo number_format($Deep, 2, ".", ","); ?></td>
  </tr>
  <tr>
    <td style="padding:7px"><span id="laterit" class="SoilType" style="color:#00f;text-decoration:underline;cursor:pointer">Lateritel</span></td>
	<td style="padding:7px;text-align:right"><?php echo number_format($Lateritel, 2, ".", ","); ?></td>
  </tr>
  <tr>
    <td style="padding:7px"><span id="asidsulfat" class="SoilType" style="color:#00f;text-decoration:underline;cursor:pointer">Sulphate Acid</span></td>
	<td style="padding:7px;text-align:right"><?php echo number_format($Sulphate, 2, ".", ","); ?></td>
  </tr>
  <tr>
    <td style="padding:7px"><span id="tanahpasir" class="SoilType" style="color:#00f;text-decoration:underline;cursor:pointer">Sandy Soil</span></td>
	<td style="padding:7px;text-align:right"><?php echo number_format($Sandy, 2, ".", ","); ?></td>
  </tr>
  <tr>
    <td style="padding:7px;font-weight:bold">Total all area:</td>
	<td style="padding:7px;font-weight:bold;text-align:right"><?php echo number_format($Total, 2, ".", ","); ?></td>
  </tr>
</table>
<table width="600" align="center" class="baju" border="1" style="border-collapse:collapse;margin-top:50px;margin-bottom:20px;border:1px solid #000">
  <tr>
    <td colspan="2" style="padding:7px;background:#ccc;text-align:center;font-weight:bold">Area Respective to Estate Train Type</td>
  </tr>
  <tr>
    <td width="350" style="padding:7px;text-align:center;font-weight:bold">Estate Terrain Type</td>
	<td width="250" style="padding:7px;text-align:center;font-weight:bold">Total Area (Hectares)</td>
  </tr>
  <tr>
    <td style="padding:7px"><span id="percentrata" class="EstateTrain" style="color:#00f;text-decoration:underline;cursor:pointer">Flat Area</span> (0 - 6 degree)</td>
	<td style="padding:7px;text-align:right"><?php echo number_format($Flat, 2, ".", ","); ?></td>
  </tr>
  <tr>
    <td style="padding:7px"><span id="percentalun" class="EstateTrain" style="color:#00f;text-decoration:underline;cursor:pointer">Undulating Area</span> (7 - 12 degree)</td>
	<td style="padding:7px;text-align:right"><?php echo number_format($Undulating, 2, ".", ","); ?></td>
  </tr>
  <tr>
    <td style="padding:7px"><span id="percentbukit" class="EstateTrain" style="color:#00f;text-decoration:underline;cursor:pointer">Hilly Area</span> (13 - 25 degree)</td>
	<td style="padding:7px;text-align:right"><?php echo number_format($Hilly, 2, ".", ","); ?></td>
  </tr>
  <tr>
    <td style="padding:7px"><span id="percentcerun" class="EstateTrain" style="color:#00f;text-decoration:underline;cursor:pointer">Steep</span> (> 25 degree)</td>
	<td style="padding:7px;text-align:right"><?php echo number_format($Steep, 2, ".", ","); ?></td>
  </tr>
  <tr>
    <td style="padding:7px;font-weight:bold">Total all area:</td>
	<td style="padding:7px;font-weight:bold;text-align:right"><?php echo number_format($TotalTrain, 2, ".", ","); ?></td>
  </tr>
</table>
<script language="javascript">
$(document).ready(function(){
	$(".SoilType").click(function(e) {
		window.location.href = "?id=estate&sub=soiltype&type=type&field=" + $(this).attr("id");
	});

	$(".EstateTrain").click(function(e) {
		window.location.href = "?id=estate&sub=soiltype&type=type&field=" + $(this).attr("id");
	});
});
</script>
<?php } ?>
