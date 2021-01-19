<?php 
session_start();
header("Content-type:application/xml");

$tahun_semasa = $_COOKIE['tahun_report']-1;
$tahun_lepas = $_COOKIE['tahun_report']-2;


 
 	$upkeep_session = $_SESSION['upkeep_session'];
	$harvesting_session = $_SESSION['harvesting_session'];
	$transportation_session = $_SESSION['transportation_session'];
	$fertilizer_session = $_SESSION['fertilizer_session'];
	
	
	$upkeep_session_before = $_SESSION['upkeep_session_before'];
	$harvesting_session_before = $_SESSION['harvesting_session_before'];
	$transportation_session_before = $_SESSION['transportation_session_before'];
	$fertilizer_session_before = $_SESSION['fertilizer_session_before'];
?>
<chart>
	<series>
		<value xid="<?php echo $tahun_lepas;?>"><?php echo $tahun_lepas; ?></value>
		<value xid="<?php echo $tahun_semasa; ?>"><?php echo $tahun_semasa; ?></value>
	</series>
	<graphs>
		<graph gid="Upkeep" title="Upkeep">
			<value xid="<?php echo $tahun_lepas;?>"><?php echo $upkeep_session_before;?></value>
			<value xid="<?php echo $tahun_semasa; ?>"><?php echo $upkeep_session;?></value>			
		</graph>
		<graph gid="Fertilizere" title="Fertilizer">
			<value xid="<?php echo $tahun_lepas;?>"><?php echo $harvesting_session_before;?></value>
			<value xid="<?php echo $tahun_semasa; ?>"><?php echo $harvesting_session;?></value>			
		</graph>		
		<graph gid="Harvesting" title="Harvesting">
			<value xid="<?php echo $tahun_lepas;?>"><?php echo $transportation_session_before;?></value>
			<value xid="<?php echo $tahun_semasa; ?>"><?php echo $transportation_session;?></value>			
		</graph>		
		<graph gid="Transportation" title="Transportation">
			<value xid="<?php echo $tahun_lepas; ?>"><?php echo $fertilizer_session_before;?></value>
			<value xid="<?php echo $tahun_semasa; ?>"><?php echo $fertilizer_session;?></value>			
		</graph>		    		
						
	</graphs>
</chart>
