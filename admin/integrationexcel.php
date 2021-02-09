<?php
error_reporting(0);
set_time_limit(0);
ini_set('memory_limit', '2048M');
date_default_timezone_set('Asia/Kuala_Lumpur');
require_once ("xlsxwriter.class.php");
require_once ("../Connections/connection.class.php");
$con = connect();

$writer = new XLSXWriter();

if (get_magic_quotes_gpc()) {
	$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	while (list($key, $val) = each($process)) {
		foreach ($val as $k => $v) {
			unset($process[$key][$k]);
			if (is_array($v)) {
				$process[$key][stripslashes($k)] = $v;
				$process[] = &$process[$key][stripslashes($k)];
			} else {
				$process[$key][stripslashes($k)] = stripslashes($v);
			}
		}
	}
	unset($process);
}

$Year = $_POST['Year'];
$Title = $_POST['Title'];
$Type = $_POST['Type'];
$Name = $_POST['Name'];
$Crops = $_POST['Crops'];
$Livestock = $_POST['Livestock'];
$CropsLivestock = $_POST['CropsLivestock'];
$TotalCropsLivestock = $_POST['TotalCropsLivestock'];
$NoIntegration = $_POST['NoIntegration'];
$License = $_POST['License'];
$Immature = $_POST['Immature'];
$Mature = $_POST['Mature'];
$ImmatureMature = $_POST['ImmatureMature'];
$Watermelon = $_POST['Watermelon'];
$Pineapple = $_POST['Pineapple'];
$SweetPotatoes = $_POST['SweetPotatoes'];
$Banana = $_POST['Banana'];
$EstimatedArea = $_POST['EstimatedArea'];
$Cattle = $_POST['Cattle'];
$Buffalo = $_POST['Buffalo'];
$Goat = $_POST['Goat'];
$Sheep = $_POST['Sheep'];
$Others = $_POST['Others'];

$keywords = array('eCost');

$writer->setTitle($Type == 0 ? 'No of Integration' : ($Type == 1 ? 'Crops' : 'Livestock'));
$writer->setSubject($Type == 0 ? 'No of Integration' : ($Type == 1 ? 'Crops' : 'Livestock'));
$writer->setAuthor('Dr Ahmad Shahrizal b Muhamad');
$writer->setCompany('ASM');
$writer->setKeywords($keywords);
$writer->setDescription($Type == 0 ? 'No of Integration' : ($Type == 1 ? 'Crops' : 'Livestock'));
$writer->setTempDir(sys_get_temp_dir());

if ($Type == 0) {
	$colStyle = array('string', 'string', 'string', 'string', 'string', 'string');
	$colWidths = array(35.86,15.14,15.14,15.14,15.14,15.14);
} else {
	$colStyle = array('string', 'string', 'string', 'string', 'string', 'string',
					  'string', 'string', 'string', 'string', 'string');
	$colWidths = array(5.86,35.86,15.14,15.14,15.14,15.14,15.14,15.14,15.14,15.14,15.14);
	if ($Type == 2) {
		array_push($colStyle, 'string');
		array_push($colWidths, 15.14);
	}
}
$colOptions = array('widths' => $colWidths, 'suppress_row' => true, 'freeze_rows' => 3);
$formatHeaderCenter = array('font' => 'Arial', 'font-size' => 8, 'font-style' => 'bold', 'color' => '#000000', 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'halign' => 'center', 'valign' => 'center');
$formatHeaderNoLine = array('font' => 'Arial', 'font-size' => 8, 'font-style' => 'bold', 'color' => '#000000', 'halign' => 'center');
$formatDataCenter = array('font' => 'Arial', 'font-size' => 8, 'color' => '#000000', 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'halign' => 'center');
$formatDataLeft = array('font' => 'Arial', 'font-size' => 8, 'color' => '#000000', 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'halign' => 'left');
if ($Type == 0) {
	$formatHeader1 = array('row' => null,
						   'col' => array($formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine));
	$formatHeader2 = array('row' => null,
						   'col' => array($formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter));
	$formatData = array('row' => null,
						'col' => array($formatDataLeft, $formatDataCenter, $formatDataCenter, $formatDataCenter, $formatDataCenter, $formatDataCenter));
} else {
	$formatHeader1 = array('row' => null,
						   'col' => array($formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine,
										  $formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine, $formatHeaderNoLine));
	$formatHeader2 = array('row' => null,
						   'col' => array($formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter,
										  $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter));
	$formatData = array('row' => null,
						'col' => array($formatDataCenter, $formatDataLeft, $formatDataCenter, $formatDataCenter, $formatDataCenter, $formatDataCenter,
									   $formatDataCenter, $formatDataCenter, $formatDataCenter, $formatDataCenter, $formatDataCenter));
	if ($Type == 2) {
		array_push($formatHeader1['col'], $formatHeaderNoLine);
		array_push($formatHeader2['col'], $formatHeaderCenter);
		array_push($formatData['col'], $formatDataCenter);
	}
}

$sheet = $Type == 0 ? "No of Integration" : ($Type == 1 ? "Crops" : "Livestock");
$writer->writeSheetHeader($sheet, $colStyle, $colOptions);
if ($Type == 0) {
	$Header1 = array($Title, "", "", "", "", "");
	$Header2 = array("State", "Number of estate conducting integration", "", "", "", "Number of estate without integration");
	$Header3 = array("", "Crops Only", "Livestock Only", "Crops and Livestock", "Total", "");
} else {
	$Header1 = array($Title, "", "", "", "", "", "", "", "", "", "");
	if ($Type == 2) array_push($Header1, "");
	$Header2 = $Type == 1 ? array("No", "Estate name", "License no", "Total area", "", "", "Estimated planted area", "", "", "", "") :
							array("No", "Estate name", "License no", "Total area (Ha)", "", "", "Estimated Area (Ha)", "Number of livestoc (heads)", "", "", "", "");
	$Header3 = $Type == 1 ? array("", "", "", "Immature", "Mature", "Total", "Watermelon", "Pineapple", "Sweet Potatoes", "Banana", "Others") :
							array("", "", "", "Immature", "Mature", "Total", "", "Cattle", "Buffalo", "Goat", "Sheep", "Others");
}
$writer->writeSheetRow($sheet, $Header1, $formatHeader1);
$writer->writeSheetRow($sheet, $Header2, $formatHeader2);
$writer->writeSheetRow($sheet, $Header3, $formatHeader2);
if ($Type == 0) {
	$writer->markMergedCell($sheet, 0, 0, 0, 5);
	$writer->markMergedCell($sheet, 1, 0, 2, 0);
	$writer->markMergedCell($sheet, 1, 1, 1, 4);
	$writer->markMergedCell($sheet, 1, 5, 2, 5);
} else if ($Type == 1) {
	$writer->markMergedCell($sheet, 0, 0, 0, 10);
	$writer->markMergedCell($sheet, 1, 0, 2, 0);
	$writer->markMergedCell($sheet, 1, 1, 2, 1);
	$writer->markMergedCell($sheet, 1, 2, 2, 2);
	$writer->markMergedCell($sheet, 1, 3, 1, 5);
	$writer->markMergedCell($sheet, 1, 6, 1, 10);
} else {
	$writer->markMergedCell($sheet, 0, 0, 0, 11);
	$writer->markMergedCell($sheet, 1, 0, 2, 0);
	$writer->markMergedCell($sheet, 1, 1, 2, 1);
	$writer->markMergedCell($sheet, 1, 2, 2, 2);
	$writer->markMergedCell($sheet, 1, 3, 1, 5);
	$writer->markMergedCell($sheet, 1, 6, 2, 6);
	$writer->markMergedCell($sheet, 1, 7, 1, 11);
}

for ($i = 0; $i < count($Name); $i++) {
	if ($Type == 0) {
		$Data = array($Name[$i], $Crops[$i], $Livestock[$i], $CropsLivestock[$i], $TotalCropsLivestock[$i], $NoIntegration[$i]);
	} else {
		$Data = array($i + 1, $Name[$i], $License[$i], $Immature[$i], $Mature[$i], $ImmatureMature[$i]);
		if ($Type == 1) {
			array_push($Data, $Watermelon[$i]);
			array_push($Data, $Pineapple[$i]);
			array_push($Data, $SweetPotatoes[$i]);
			array_push($Data, $Banana[$i]);
			array_push($Data, $Others[$i]);
		} else {
			array_push($Data, $EstimatedArea[$i]);
			array_push($Data, $Cattle[$i]);
			array_push($Data, $Buffalo[$i]);
			array_push($Data, $Goat[$i]);
			array_push($Data, $Sheep[$i]);
			array_push($Data, $Others[$i]);
		}
	}
	$writer->writeSheetRow($sheet, $Data, $formatData);
}
mysqli_close($con);
$Filename = XLSXWriter::sanitize_filename($Year."_".$Title.".xlsx");
$writer->writeToFile($Filename);
header('Content-disposition: attachment; filename="'.$Filename.'"');
header("Content-type: application/vnd.ms-excel");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: '.filesize($Filename));
ob_clean();
flush();
readfile($Filename);
unlink($Filename);
exit;
?>
