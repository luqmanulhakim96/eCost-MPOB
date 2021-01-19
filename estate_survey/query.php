<?php
	$lesen = $_SESSION['lesen'];

	$qblm1="SELECT * FROM tanam_baru09 tb1 WHERE tb1.lesen = '$lesen' LIMIT 1";
	$rblm1=mysql_query($qblm1,$con);
	$totalblm1 = mysql_num_rows($rblm1);
	
	$qblm11="SELECT * FROM tanam_baru08 tb2 WHERE tb2.lesen = '$lesen' LIMIT 1";
	$rblm11=mysql_query($qblm11,$con);
	$totalblm11 = mysql_num_rows($rblm11);
	
	$qblm111="SELECT * FROM tanam_baru07 tb3 WHERE tb3.lesen = '$lesen' LIMIT 1";
	$rblm111=mysql_query($qblm111,$con);
	$totalblm111 = mysql_num_rows($rblm111);

	$qblm2="SELECT * FROM tanam_semula09 ts1 WHERE ts1.lesen = '$lesen' LIMIT 1";
	$rblm2=mysql_query($qblm2,$con);
	$totalblm2 = mysql_num_rows($rblm2);

	$qblm22="SELECT * FROM tanam_semula08 ts2 WHERE ts2.lesen = '$lesen' LIMIT 1";
	$rblm22=mysql_query($qblm22,$con);
	$totalblm22 = mysql_num_rows($rblm22);

	$qblm222="SELECT * FROM tanam_semula07 ts3 WHERE ts3.lesen = '$lesen' LIMIT 1";
	$rblm222=mysql_query($qblm222,$con);
	$totalblm222 = mysql_num_rows($rblm222);

	$qblm3="SELECT * FROM tanam_tukar09 tt1 WHERE tt1.lesen = '$lesen' LIMIT 1";
	$rblm3=mysql_query($qblm3,$con);
	$totalblm3 = mysql_num_rows($rblm3);

	$qblm33="SELECT * FROM tanam_tukar08 tt2 WHERE tt2.lesen = '$lesen' LIMIT 1";
	$rblm33=mysql_query($qblm33,$con);
	$totalblm33 = mysql_num_rows($rblm33);

	$qblm333="SELECT * FROM tanam_tukar07 tt3 WHERE tt3.lesen = '$lesen' LIMIT 1";
	$rblm333=mysql_query($qblm333,$con);
	$totalblm333 = mysql_num_rows($rblm333);
	
	$baru = $totalblm1+$totalblm11+$totalblm111;
	$semula = $totalblm2+$totalblm22+$totalblm222;
	$tukar = $totalblm3+$totalblm33+$totalblm333;
?>