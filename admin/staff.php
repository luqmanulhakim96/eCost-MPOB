<?php 
	include '../class/labour.class.php';
	$year = $_COOKIE['tahun_report'];
	echo "<"."?xml version=\"1.0\" encoding=\"UTF-8\"?".">\n";

	$total = new labour; 
	$exec_local 	= $total->manpower('pm', $year, 'eksekutif_tempatan');
	$exec_foreign 	= $total->manpower('pm', $year, 'eksekutif_asing');
	$staff_local 	= $total->manpower('pm', $year, 'kakitangan_tempatan');
	$staff_foreign 	= $total->manpower('pm', $year, 'kakitangan_asing');

echo "<pie>";
  echo "<slice title=\"Local Executive\">$exec_local</slice>";
  echo "<slice title=\"Foreign Executive\">$exec_foreign</slice>";
  echo "<slice title=\"Local Staff\">$staff_local</slice>";
  echo "<slice title=\"Foreign Staff\">$staff_foreign</slice>";
echo "</pie>";
?>