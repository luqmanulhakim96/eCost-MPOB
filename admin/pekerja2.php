<?php 
	include '../class/labour.class.php';
	$year = $_COOKIE['tahun_report'];
	echo "<"."?xml version=\"1.0\" encoding=\"UTF-8\"?".">\n";

	$total = new labour; 
	$penuai_kumpulan_tempatan 			= $total->manpower('pm', $year, 'penuai_kumpulan_tempatan');
	$penuai_kumpulan_asing 				= $total->manpower('pm', $year, 'penuai_kumpulan_asing');
	$pekerja_estate_tempatan			= $total->manpower('pm', $year, 'pekerja_estet_tempatan');
	$pekerja_estate_asing				= $total->manpower('pm', $year, 'pekerja_estet_asing');
	$pekerja_am_tempatan 				= $total->manpower('pm', $year, 'pekerja_am_tempatan');
	$pekerja_am_asing 					= $total->manpower('pm', $year, 'pekerja_am_asing');

echo "<pie>";
  echo "<slice title=\"Local Group Collector\">$penuai_kumpulan_tempatan</slice>";
  echo "<slice title=\"Foreign Group Collector\">$penuai_kumpulan_asing</slice>";
  echo "<slice title=\"Local Estate Worker\">$pekerja_estate_tempatan</slice>";
  echo "<slice title=\"Foreign Estate Worker\">$pekerja_estate_asing</slice>";
  echo "<slice title=\"Local General Worker\">$pekerja_am_tempatan</slice>";
  echo "<slice title=\"Foreign General Worker\">$pekerja_am_asing</slice>";
echo "</pie>";
?>