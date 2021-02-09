<?php
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);

$con =connect();
$url = $_SERVER['HTTP_REFERER'];

$malay = ucwords($malay);
$english = ucwords($english);



	//------------------- penuaian -----------------
 	if($type=="addpenuaian")
	{
		$q ="insert into penuaian_var values ('','$malay','$english')";
		$r = mysqli_query($con, $q);
	}
	else if($type=="editpenuaian")
	{
		$q ="update penuaian_var set nama_malay='$malay', nama_english='$english' where id_penuaian ='$id'";
		$r = mysqli_query($con, $q);
	}
	else if($type=="deletepenuaian")
	{
		$q ="delete from penuaian_var where  id_penuaian ='$id'";
		$r = mysqli_query($con, $q);
	}

	//-------------------- penjagaan --------------------
	else if($type=="addpenjagaan")
	{
		$q ="insert into penjagaan_mature_var values ('','$malay','$english')";
		$r = mysqli_query($con, $q);
	}
	else if($type=="deletepenjagaan")
	{
		$q ="delete from penjagaan_mature_var where  id_penjagaan ='$id'";
		$r = mysqli_query($con, $q);
	}
	else if($type=="editpenjagaan")
	{
		$q ="update penjagaan_mature_var set nama_malay='$malay', nama_english='$english' where id_penjagaan ='$id'";
		$r = mysqli_query($con, $q);
	}


		//-------------------- pengangkutan --------------------
	else if($type=="addpengangkutan")
	{
		$q ="insert into pengangkutan_var values ('','$malay','$english')";
		$r = mysqli_query($con, $q);
	}
	else if($type=="deletepengangkutan")
	{
		$q ="delete from pengangkutan_var where  id_pengangkutan ='$id'";
		$r = mysqli_query($con, $q);
	}
	else if($type=="editpengangkutan")
	{
		$q ="update pengangkutan_var set nama_malay='$malay', nama_english='$english' where id_pengangkutan ='$id'";
		$r = mysqli_query($con, $q);
	}

			//-------------------- perbelanjaan --------------------
	else if($type=="addperbelanjaan")
	{
		$q ="insert into perbelanjaan_am_var values ('','$malay','$english')";
		$r = mysqli_query($con, $q);
	}
	else if($type=="deleteperbelanjaan")
	{
		$q ="delete from perbelanjaan_am_var where  id_perbelanjaan ='$id'";
		$r = mysqli_query($con, $q);
	}
	else if($type=="editperbelanjaan")
	{
		$q ="update perbelanjaan_am_var set nama_malay='$malay', nama_english='$english' where id_perbelanjaan ='$id'";
		$r = mysqli_query($con, $q);
	}



echo "<script>window.location.href='$url';</script>";

?>
