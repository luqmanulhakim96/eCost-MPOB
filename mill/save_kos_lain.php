<?php session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con = connect();

$isirung = str_replace(",",'',$isirung);
$qisirung="update mill_isirung set isirung ='$isirung' where lesen ='$lesen' and tahun = '$tahun'";
$risirunng=mysqli_query($con, $qisirung);



	$kl_1 = str_replace(",",'',$kl_1);
	$kl_2 = str_replace(",",'',$kl_2);
	$kl_3 = str_replace(",",'',$kl_3);
	$kl_4 = str_replace(",",'',$kl_4);
	$kl_5 = str_replace(",",'',$kl_5);
	$total_kl = str_replace(",",'',$total_kl);


$q ="UPDATE mill_kos_lain SET kl_1 = '$kl_1',
kl_2 = '$kl_2',
kl_3 = '$kl_3',
kl_4 = '$kl_4',
kl_5 = '$kl_5',
total_kl = '$total_kl' ,
status='$status'
WHERE lesen = '$lesen' AND tahun =$tahun
";
$r = mysqli_query($con, $q);

if ($status==2){
	$id = "kos_lain";
	echo "<script>window.location.href='home.php?id=$id'</script>";
	}
else{
	//$id = "buruh_mill";
	$id = "ringkasan_mill";
	echo "<script>window.location.href='home.php?id=$id'</script>";
	}
?>
