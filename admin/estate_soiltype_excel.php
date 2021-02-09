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

$field = $_GET['field'];
$table = $_GET['table'];

$keywords = array('eCost');

$writer->setTitle('List of Estate with Soil Type');
$writer->setSubject('List of Estate with Soil Type');
$writer->setAuthor('Dr Ahmad Shahrizal b Muhamad');
$writer->setCompany('ASM');
$writer->setKeywords($keywords);
$writer->setDescription('List of Estate with Soil Type');
$writer->setTempDir(sys_get_temp_dir());

$colStyle = array('string', 'string', 'string', 'string', 'string', 'string',
				  'string', 'string', 'string', 'string', 'string', 'string',
				  'string', 'string', 'string', 'string', 'string', 'string',
				  'string', 'string', 'string', 'string');
$colWidths = array(5.86,35.86,35.86,15.14,35.86,35.86,15.14,35.86,35.86,15.14,15.14,
				   15.14,15.14,15.14,15.14,15.14,15.14,15.14,15.14,15.14,15.14,15.14);
$colOptions = array('widths' => $colWidths, 'suppress_row' => true, 'freeze_rows' => 1);
$formatHeaderCenter = array('font' => 'Arial', 'font-size' => 8, 'color' => '#ffffff', 'fill' => '#8a1602', 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'halign' => 'center');
$formatDataCenter = array('font' => 'Arial', 'font-size' => 8, 'color' => '#000000', 'border' => 'left,right,top,bottom', 'border-style' => 'thin');
$formatDataLeft = array('font' => 'Arial', 'font-size' => 8, 'color' => '#000000', 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'halign' => 'left');
$formatDataRight = array('font' => 'Arial', 'font-size' => 8, 'color' => '#000000', 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'halign' => 'right', 'format' => '#,##0.00');
$formatHeader = array('row' => null,
					  'col' => array($formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter,
									 $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter,
									 $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter,
									 $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter, $formatHeaderCenter));
$formatData = array('row' => null,
					'col' => array($formatDataCenter, $formatDataLeft, $formatDataLeft, $formatDataCenter, $formatDataLeft, $formatDataLeft,
								   $formatDataCenter, $formatDataLeft, $formatDataLeft, $formatDataLeft, $formatDataLeft, $formatDataRight,
								   $formatDataRight, $formatDataRight, $formatDataRight, $formatDataRight, $formatDataRight, $formatDataRight,
								   $formatDataRight, $formatDataRight, $formatDataRight, $formatDataRight));
$sheet = "List of Estate";
$writer->writeSheetHeader($sheet, $colStyle, $colOptions);
$Header = array("No", "Estate Name", "Company Name", "New License No.", "E-mail", "Address",
				"Postcode", "City", "State", "Phone No.", "Fax No.", "Alluvail Soil",
				"Rural Land", "Shallow Peat Soil", "Deep Peat Soil", "Laterite", "Sulphate Acid", "Sandy Soil",
				"Flat Area (%)", "Undulating Area (%)", "Hilly Area (%)", "Steep (%)");
$writer->writeSheetRow($sheet, $Header, $formatHeader);

$aQuery = "SELECT * FROM estate_info WHERE $field > 0";
$aRows = mysqli_query($con, $aQuery);

$sNo = 1;
while ($aRow = mysqli_fetch_array($aRows)) {
	$bQuery = "SELECT * FROM $table WHERE no_lesen_baru ='".$aRow['lesen']."'";
	$bRows = mysqli_query($con, $bQuery);
	$bRow = mysqli_fetch_array($bRows);
	$Data = array($sNo, $bRow['Nama_Estet'], $bRow['Syarikat_Induk'], $bRow['No_Lesen_Baru'], $bRow['Emel'], $bRow['Alamat1'],
				  $bRow['Poskod'], $bRow['Bandar'], $bRow['Negeri'], $bRow['No_Telepon'], $bRow['No_Fax'], $aRow['lanar'],
				  $aRow['pedalaman'], $aRow['gambutcetek'], $aRow['gambutdalam'], $aRow['laterit'], $aRow['asidsulfat'], $aRow['tanahpasir'],
				  $aRow['percentrata'], $aRow['percentalun'], $aRow['percentbukit'], $aRow['percentcerun']);
	$writer->writeSheetRow($sheet, $Data, $formatData);
	$sNo++;
}
mysqli_close($con);
$Filename = XLSXWriter::sanitize_filename("List of Estate with Soil Type.xlsx");
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
