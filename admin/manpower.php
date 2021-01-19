<?php 
	include '../class/labour.class.php';
	$year = date('Y');
	echo "<"."?xml version=\"1.0\" encoding=\"UTF-8\"?".">\n";

	$total = new labour; 
	$mandur_penuai_tempatan 			= $total->manpower('pm', $year, 'mandur_penuai_tempatan');
	$mandur_penuai_asing 				= $total->manpower('pm', $year, 'mandur_penuai_asing');
	$mandur_am_tempatan 				= $total->manpower('pm', $year, 'mandur_am_tempatan');
	$mandur_am_asing 					= $total->manpower('pm', $year, 'mandur_am_asing');
	$penuai_tempatan 					= $total->manpower('pm', $year, 'penuai_tempatan');
	$penuai_asing 						= $total->manpower('pm', $year, 'penuai_asing');
	$pemungut_bts_tempatan 				= $total->manpower('pm', $year, 'pemungut_bts_tempatan');
	$pemungut_bts_asing					= $total->manpower('pm', $year, 'pemungut_bts_asing');
	$pemungut_buahrelai_tempatan 		= $total->manpower('pm', $year, 'pemungut_buahrelai_tempatan');
	$pemungut_buahrelai_asing 			= $total->manpower('pm', $year, 'pemungut_buahrelai_asing');
	$penuai_kumpulan_tempatan 			= $total->manpower('pm', $year, 'penuai_kumpulan_tempatan');
	$penuai_kumpulan_asing 				= $total->manpower('pm', $year, 'penuai_kumpulan_asing');
	$pekerja_estate_tempatan			= $total->manpower('pm', $year, 'pekerja_estet_tempatan');
	$pekerja_estate_asing				= $total->manpower('pm', $year, 'pekerja_estet_asing');
	$pekerja_am_tempatan 				= $total->manpower('pm', $year, 'pekerja_am_tempatan');
	$pekerja_am_asing 					= $total->manpower('pm', $year, 'pekerja_am_asing');

echo "<pie>";
  echo "<slice title=\"Local Harvesting Mandore\">$mandur_penuai_tempatan</slice>";
  echo "<slice title=\"Foreign Harvesting Mandore\">$mandur_penuai_asing</slice>";
  echo "<slice title=\"Local General Mandore\">$mandur_am_tempatan</slice>";
  echo "<slice title=\"Foreign General Mandore\">$mandur_am_asing</slice>";
  echo "<slice title=\"penuai_tempatan\">$penuai_tempatan</slice>";
  echo "<slice title=\"penuai_asing\">$penuai_asing</slice>";
  echo "<slice title=\"pemungut_bts_tempatan\">$pemungut_bts_tempatan</slice>";
  echo "<slice title=\"pemungut_bts_asing\">$pemungut_bts_asing</slice>";
  echo "<slice title=\"pemungut_buahrelai_tempatan\">$pemungut_buahrelai_tempatan</slice>";
  echo "<slice title=\"pemungut_buahrelai_asing\">$pemungut_buahrelai_asing</slice>";
  echo "<slice title=\"penuai_kumpulan_tempatan\">$penuai_kumpulan_tempatan</slice>";
  echo "<slice title=\"penuai_kumpulan_asing\">$penuai_kumpulan_asing</slice>";
  echo "<slice title=\"pekerja_estate_tempatan\">$pekerja_estate_tempatan</slice>";
  echo "<slice title=\"pekerja_estate_asing\">$pekerja_estate_asing</slice>";
  echo "<slice title=\"pekerja_am_tempatan\">$pekerja_am_tempatan</slice>";
  echo "<slice title=\"pekerja_am_asing\">$pekerja_am_asing</slice>";
echo "</pie>";
?>