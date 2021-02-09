<?php
	$lesen = $_SESSION['lesen'];

	$qblm1="SELECT * FROM tanam_baru09 tb1 WHERE tb1.lesen = '$lesen' LIMIT 1";
	$rblm1=mysqli_query($con, $qblm1);
	$totalblm1 = mysqli_num_rows($rblm1);

	$qblm11="SELECT * FROM tanam_baru08 tb2 WHERE tb2.lesen = '$lesen' LIMIT 1";
	$rblm11=mysqli_query($con, $qblm11);
	$totalblm11 = mysqli_num_rows($rblm11);

	$qblm111="SELECT * FROM tanam_baru07 tb3 WHERE tb3.lesen = '$lesen' LIMIT 1";
	$rblm111=mysqli_query($con, $qblm111);
	$totalblm111 = mysqli_num_rows($rblm111);

	$qblm2="SELECT * FROM tanam_semula09 ts1 WHERE ts1.lesen = '$lesen' LIMIT 1";
	$rblm2=mysqli_query($con, $qblm2);
	$totalblm2 = mysqli_num_rows($rblm2);

	$qblm22="SELECT * FROM tanam_semula08 ts2 WHERE ts2.lesen = '$lesen' LIMIT 1";
	$rblm22=mysqli_query($con, $qblm22);
	$totalblm22 = mysqli_num_rows($rblm22);

	$qblm222="SELECT * FROM tanam_semula07 ts3 WHERE ts3.lesen = '$lesen' LIMIT 1";
	$rblm222=mysqli_query($con, $qblm222);
	$totalblm222 = mysqli_num_rows($rblm222);

	$qblm3="SELECT * FROM tanam_tukar09 tt1 WHERE tt1.lesen = '$lesen' LIMIT 1";
	$rblm3=mysqli_query($con, $qblm3);
	$totalblm3 = mysqli_num_rows($rblm3);

	$qblm33="SELECT * FROM tanam_tukar08 tt2 WHERE tt2.lesen = '$lesen' LIMIT 1";
	$rblm33=mysqli_query($con, $qblm33);
	$totalblm33 = mysqli_num_rows($rblm33);

	$qblm333="SELECT * FROM tanam_tukar07 tt3 WHERE tt3.lesen = '$lesen' LIMIT 1";
	$rblm333=mysqli_query($con, $qblm333);
	$totalblm333 = mysqli_num_rows($rblm333);

	$baru = $totalblm1+$totalblm11+$totalblm111;
	$semula = $totalblm2+$totalblm22+$totalblm222;
	$tukar = $totalblm3+$totalblm33+$totalblm333;
?>
