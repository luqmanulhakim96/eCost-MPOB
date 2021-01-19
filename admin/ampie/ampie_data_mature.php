<?php session_start();
header("Content-type:application/xml");

 
 	$upkeep_session = $_SESSION['upkeep_session'];
	$harvesting_session = $_SESSION['harvesting_session'];
	$transportation_session = $_SESSION['transportation_session'];
	$fertilizer_session = $_SESSION['fertilizer_session'];
	
	
	$upkeep_session_before = $_SESSION['upkeep_session_before'];
	$harvesting_session_before = $_SESSION['harvesting_session_before'];
	$transportation_session_before = $_SESSION['transportation_session_before'];
	$fertilizer_session_before = $_SESSION['fertilizer_session_before'];
 

?><pie>
  <slice title="Upkeep" pull_out="true"><?php echo $upkeep_session;?></slice>
  <slice title="Fertilizer" pull_out="true"><?php echo $fertilizer_session;?></slice>
  <slice title="Harvesting" pull_out="true"><?php echo $harvesting_session;?></slice>
  <slice title="Transportation" pull_out="true"><?php echo $transportation_session; ?></slice>
</pie>
