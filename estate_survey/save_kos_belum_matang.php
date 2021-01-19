<?php 
session_start();
extract($_POST);
extract($_GET);
include ('../Connections/connection.class.php');
$con = connect();
$q="SELECT * FROM kos_belum_matang WHERE pb_tahun = '$year' AND pb_thisyear='$thisyear' AND lesen ='".$_SESSION['lesen']."' AND pb_type =  '$type'";
$r = mysql_query($q,$con);
$total = mysql_num_rows($r);

	$a_1=str_replace(",",'',$a_1); 
	$a_2=str_replace(",",'',$a_2); 
	$a_3=str_replace(",",'',$a_3); 
	$a_4=str_replace(",",'',$a_4); 
	$a_5=str_replace(",",'',$a_5); 
	$a_6=str_replace(",",'',$a_6); 
	$a_7=str_replace(",",'',$a_7); 
	$a_8=str_replace(",",'',$a_8); 
	$a_9=str_replace(",",'',$a_9); 
	$a_10=str_replace(",",'',$a_10); 
	$a_11=str_replace(",",'',$a_11); 
	$total_kos_a =str_replace(",",'',$total_kos_a);
	$b_1a =str_replace(",",'',$b_1a);
	$b_1b =str_replace(",",'',$b_1b);
	$b_1c=str_replace(",",'',$b_1c); 
	$total_racun =str_replace(",",'',$total_b_1);
	$total_b_2 =str_replace(",",'',$total_b_2);
	$b_3a =str_replace(",",'',$b_3a);
	$b_3b =str_replace(",",'',$b_3b);
	$b_3c = str_replace(",",'',$b_3c);
	$b_3d =str_replace(",",'',$b_3d);
	$total_baja =str_replace(",",'',$total_b_3);
	$total_b_4 =str_replace(",",'',$total_b_4);
	$total_b_5 =str_replace(",",'',$total_b_5);
	$total_b_6 =str_replace(",",'',$total_b_6);
	$total_b_7 =str_replace(",",'',$total_b_7);
	$total_b_8 =str_replace(",",'',$total_b_8);
	$total_b_9 =str_replace(",",'',$total_b_9);
	$total_b_10 =str_replace(",",'',$total_b_10);
	$total_b_11 =str_replace(",",'',$total_b_11);
	$total_b_12 =str_replace(",",'',$total_b_12);
	$total_b_13 =str_replace(",",'',$total_b_13);
	$total_b_14 =str_replace(",",'',$total_b_14);
	$total_kos_b=str_replace(",",'',$total_kos_b);
	
	
	
if($total==0)
{
	$q ="INSERT INTO kos_belum_matang VALUES ('$year','$thisyear', '".$_SESSION['lesen']."', '$type', 
	'$a_1', 
	'$a_2', 
	'$a_3', 
	'$a_4', 
	'$a_5', 
	'$a_6', 
	'$a_7', 
	'$a_8', 
	'$a_9', 
	'$a_10', 
	'$a_11', 
	'$total_kos_a', 
	'$b_1a', 
	'$b_1b', 
	'$b_1c', 
	'$total_racun', 
	'$total_b_2', 
	'$b_3a', 
	'$b_3b', 
	'$b_3c', 
	'$b_3d', 
	'$total_baja', 
	'$total_b_4', 
	'$total_b_5', 
	'$total_b_6', 
	'$total_b_7', 
	'$total_b_8', 
	'$total_b_9', 
	'$total_b_10', 
	'$total_b_11', 
	'$total_b_12', 
	'$total_b_13', 
	'$total_b_14', 
	'$total_kos_b',
	'$status'
)";
	$r = mysql_query($q,$con);
}
if ($total!=0)
{
	$q ="UPDATE kos_belum_matang SET 
	a_1 = '$a_1', 
	a_2 = '$a_2', 
	a_3 = '$a_3', 
	a_4 = '$a_4', 
	a_5 = '$a_5', 
	a_6 = '$a_6', 
	a_7 = '$a_7', 
	a_8 = '$a_8', 
	a_9 = '$a_9', 
	a_10 = '$a_10', 
	a_11 = '$a_11', 
	total_a='$total_kos_a', 
	b_1a='$b_1a', 
	b_1b='$b_1b', 
	b_1c='$b_1c', 
	total_b_1='$total_racun', 
	total_b_2='$total_b_2', 
	b_3a='$b_3a', 
	b_3b='$b_3b', 
	b_3c='$b_3c', 
	b_3d='$b_3d', 
	total_b_3= '$total_baja', 
	total_b_4='$total_b_4', 
	total_b_5='$total_b_5', 
	total_b_6='$total_b_6', 
	total_b_7='$total_b_7', 
	total_b_8='$total_b_8', 
	total_b_9='$total_b_9', 
	total_b_10='$total_b_10', 
	total_b_11='$total_b_11', 
	total_b_12='$total_b_12', 
	total_b_13='$total_b_13', 
	total_b_14='$total_b_14', 
	total_b='$total_kos_b',
	status = '$status'
	WHERE pb_tahun = '$year' AND pb_thisyear='$thisyear' AND lesen ='".$_SESSION['lesen']."' AND pb_type =  '$type'";
	$r = mysql_query($q,$con);	
}
	$lesen = $_SESSION['lesen'];

	$qblm1="SELECT * FROM tanam_baru09 tb1 WHERE tb1.lesen = '$lesen' LIMIT 1";
	$rblm1=mysql_query($qblm1,$con);
	$baru1 = mysql_num_rows($rblm1);
	
	$qblm11="SELECT * FROM tanam_baru08 tb2 WHERE tb2.lesen = '$lesen' LIMIT 1";
	$rblm11=mysql_query($qblm11,$con);
	$baru2 = mysql_num_rows($rblm11);
	
	$qblm111="SELECT * FROM tanam_baru07 tb3 WHERE tb3.lesen = '$lesen' LIMIT 1";
	$rblm111=mysql_query($qblm111,$con);
	$baru3 = mysql_num_rows($rblm111);

	$qblm2="SELECT * FROM tanam_semula09 ts1 WHERE ts1.lesen = '$lesen' LIMIT 1";
	$rblm2=mysql_query($qblm2,$con);
	$semula1 = mysql_num_rows($rblm2);

	$qblm22="SELECT * FROM tanam_semula08 ts2 WHERE ts2.lesen = '$lesen' LIMIT 1";
	$rblm22=mysql_query($qblm22,$con);
	$semula2 = mysql_num_rows($rblm22);

	$qblm222="SELECT * FROM tanam_semula07 ts3 WHERE ts3.lesen = '$lesen' LIMIT 1";
	$rblm222=mysql_query($qblm222,$con);
	$semula3 = mysql_num_rows($rblm222);

	$qblm3="SELECT * FROM tanam_tukar09 tt1 WHERE tt1.lesen = '$lesen' LIMIT 1";
	$rblm3=mysql_query($qblm3,$con);
	$tukar1 = mysql_num_rows($rblm3);

	$qblm33="SELECT * FROM tanam_tukar08 tt2 WHERE tt2.lesen = '$lesen' LIMIT 1";
	$rblm33=mysql_query($qblm33,$con);
	$tukar2 = mysql_num_rows($rblm33);

	$qblm333="SELECT * FROM tanam_tukar07 tt3 WHERE tt3.lesen = '$lesen' LIMIT 1";
	$rblm333=mysql_query($qblm333,$con);
	$tukar3 = mysql_num_rows($rblm333);
	
	$baru = $baru1+$baru2+$baru3;
	$semula = $semula1+$semula2+$semula3;
	$tukar = $tukar1+$tukar2+$tukar3;
	
		if ($year==1 && $type=="Penanaman Baru"){
			if ($status==2){
				echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
				}
			else if($baru2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman Baru'</script>";
				}
			else if($baru3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Baru'</script>";
				}
			else if($semula1>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penanaman Semula'</script>";
				}
			else if($semula2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman Semula'</script>";
				}	
			else if($semula3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Semula'</script>";
				}
			else if($tukar1>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
				}
			else if($tukar2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
				}	
			else if($tukar3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
				}	
			else {
				echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
				}
			}
		if ($year==2 && $type=="Penanaman Baru"){
			if ($status==2){
				echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
				}
			else if($baru3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Baru'</script>";
				}
			else if($semula1>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penanaman Semula'</script>";
				}
			else if($semula2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman Semula'</script>";
				}	
			else if($semula3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Semula'</script>";
				}
			else if($tukar1>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
				}
			else if($tukar2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
				}	
			else if($tukar3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
				}	
			else {
				echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
				}
			}
		if ($year==3 && $type=="Penanaman Baru"){
			if ($status==2){
				echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
				}
			else if($semula1>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penanaman Semula'</script>";
				}
			else if($semula2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman Semula'</script>";
				}	
			else if($semula3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Semula'</script>";
				}
			else if($tukar1>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
				}
			else if($tukar2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
				}	
			else if($tukar3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
				}	
			else {
				echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
				}
			}

		if($year==1 && $type=="Penanaman Semula"){
			if ($status==2){
				echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
				}
			else if($semula2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman Semula'</script>";
				}	
			else if($semula3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Semula'</script>";
				}
			else if($tukar1>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
				}
			else if($tukar2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
				}	
			else if($tukar3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
				}	
			else {
				echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
				}
			}
		if($year==2 && $type=="Penanaman Semula"){
			if ($status==2){
				echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
				}
			else if($semula3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Semula'</script>";
				}
			else if($tukar1>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
				}
			else if($tukar2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
				}	
			else if($tukar3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
				}	
			else {
				echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
				}
			}
		if($year==3 && $type=="Penanaman Semula"){
			if ($status==2){
				echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
				}
			else if($tukar1>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
				}
			else if($tukar2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
				}	
			else if($tukar3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
				}	
			else {
				echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
				}
			}
		if($year==1 && $type=="Penukaran"){
			if ($status==2){
				echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
				}
			else if($tukar2>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
				}	
			else if($tukar3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
				}	
			else {
				echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
				}
			}
		if($year==2 && $type=="Penukaran"){
			if ($status==2){
				echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
				}
			else if($tukar3>0){
				echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
				}	
			else {
				echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
				}
			}
		if($year==3 && $type=="Penukaran"){
			if ($status==2){
				echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
				}
			else{
				echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
				}
			}
?>