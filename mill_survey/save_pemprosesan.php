<?php session_start();

include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con = connect();

$kp_1 = str_replace(",",'',$kp_1);
$kp_2 = str_replace(",",'',$kp_2);
$kp_3 = str_replace(",",'',$kp_3);
$kp_4 = str_replace(",",'',$kp_4);
$kp_5 = str_replace(",",'',$kp_5);
$kp_6 = str_replace(",",'',$kp_6);
$kp_7 = str_replace(",",'',$kp_7);
$kp_8 = str_replace(",",'',$kp_8);
$kp_9 = str_replace(",",'',$kp_9);
$kp_10 = str_replace(",",'',$kp_10);
$kp_11 = str_replace(",",'',$kp_11);
$kp_12 = str_replace(",",'',$kp_12);
$kp_13 = str_replace(",",'',$kp_13);
$kp_14 = str_replace(",",'',$kp_14);
$kp_15 = str_replace(",",'',$kp_15);
$total_kp = str_replace(",",'',$total_kp);

$q ="UPDATE mill_pemprosesan SET kp_1 = '$kp_1',
kp_2 = '$kp_2',
kp_3 = '$kp_3',
kp_4 = '$kp_4',
kp_5 = '$kp_5',
kp_6 = '$kp_6',
kp_7 = '$kp_7',
kp_8 = '$kp_8',
kp_9 = '$kp_9',
kp_10 = '$kp_10',
kp_11 = '$kp_11',
kp_12 = '$kp_12',
kp_13 = '$kp_13',
kp_14 = '$kp_14',
kp_15 = '$kp_15',
total_kp = '$total_kp' ,
status='$status'
WHERE lesen = '$lesen' AND tahun =$tahun
";
$r = mysqli_query($con, $q);

if ($status==2){
	$id = "kos_proses";
	echo "<script>window.location.href='home.php?id=$id'</script>";
	}
else{
	$id = "kos_lain";
	echo "<script>window.location.href='home.php?id=$id'</script>";
	}
?>
