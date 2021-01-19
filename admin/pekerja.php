<?php 
	include '../class/labour.class.php';
	$year = $_COOKIE['tahun_report'];
	echo "<"."?xml version=\"1.0\" encoding=\"UTF-8\"?".">\n";

	$total = new labour; 
	$penuai_tempatan 					= $total->manpower('pm', $year, 'penuai_tempatan');
	$penuai_asing 						= $total->manpower('pm', $year, 'penuai_asing');
	$pemungut_bts_tempatan 				= $total->manpower('pm', $year, 'pemungut_bts_tempatan');
	$pemungut_bts_asing					= $total->manpower('pm', $year, 'pemungut_bts_asing');
	$pemungut_buahrelai_tempatan 		= $total->manpower('pm', $year, 'pemungut_buahrelai_tempatan');
	$pemungut_buahrelai_asing 			= $total->manpower('pm', $year, 'pemungut_buahrelai_asing');


echo "<pie>";
  echo "<slice title=\"Local Harvester\">$penuai_tempatan</slice>";
  echo "<slice title=\"Foreign Harvester\">$penuai_asing</slice>";
  echo "<slice title=\"Local FFB Collector\">$pemungut_bts_tempatan</slice>";
  echo "<slice title=\"Foreign FFB Collector\">$pemungut_bts_asing</slice>";
  echo "<slice title=\"Local Loose Fruit Collector\">$pemungut_buahrelai_tempatan</slice>";
  echo "<slice title=\"Foreign Loose Fruit Collector\">$pemungut_buahrelai_asing</slice>";
echo "</pie>";
?>