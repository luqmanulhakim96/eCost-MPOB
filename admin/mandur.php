<?php 
	include '../class/labour.class.php';
	$year = $_COOKIE['tahun_report'];
	echo "<"."?xml version=\"1.0\" encoding=\"UTF-8\"?".">\n";

	$total = new labour; 
	$mandur_penuai_tempatan 			= $total->manpower('pm', $year, 'mandur_penuai_tempatan');
	$mandur_penuai_asing 				= $total->manpower('pm', $year, 'mandur_penuai_asing');
	$mandur_am_tempatan 				= $total->manpower('pm', $year, 'mandur_am_tempatan');
	$mandur_am_asing 					= $total->manpower('pm', $year, 'mandur_am_asing');

echo "<pie>";
  echo "<slice title=\"Local Harvesting Mandore\">$mandur_penuai_tempatan</slice>";
  echo "<slice title=\"Foreign Harvesting Mandore\">$mandur_penuai_asing</slice>";
  echo "<slice title=\"Local General Mandore\">$mandur_am_tempatan</slice>";
  echo "<slice title=\"Foreign General Mandore\">$mandur_am_asing</slice>";
echo "</pie>";
?>