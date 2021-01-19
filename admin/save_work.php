<?php
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);

$con =connect();
$url = $_SERVER['HTTP_REFERER'];


	if($type=="add")
	{
		$var = explode(" ",$malay);
		$vari = ucfirst($var[0]);
		$q ="insert into jentera_var values ('$vari','$english','$malay')";
		$r = mysql_query($q,$con);
	}
	
	else if($type=="remove")
	{
		$q ="delete from jentera_var where nama_jentera = '$id'";
		$r = mysql_query($q,$con);
		
		$q1 ="delete from jentera where kategori_jentera = '$id'";
		$r1 = mysql_query($q1,$con);
	}
	
	
	
	else if($type=="removemachine")
	{
		$q ="delete from jentera where id_jentera = '$id'";
		$r = mysql_query($q,$con);
	}
	
	
	else if($type=="addmachine")
	{
		$q="INSERT INTO jentera (id_jentera ,kategori_jentera ,nama_jentera)VALUES ('' , '$id', '$nama_jentera'); ";
		$r = mysql_query($q,$con);
	}
	
	else if($type=="updatemachine")
	{
		$q="update jentera set nama_jentera = '$value' where id_jentera ='$id'  ";
		$r = mysql_query($q,$con);
	}
	
	else if($type=="addpekerja")
	{
		$q="INSERT INTO pekerja values('','$malay','$english'); ";
		$r = mysql_query($q,$con);
	}
	
	else if($type=="removepekerja")
	{
		$q ="delete from pekerja where id_pekerja = '$id'";
		$r = mysql_query($q,$con);
		
		$q1 ="delete from pekerja_var where nama_pekerja = '$id'";
		$r1 = mysql_query($q1,$con);
	}
	
	else if($type=="addpekerjaestet")
	{
		$q="INSERT INTO pekerja_var values('$id','$malay','$english',''); ";
		$r = mysql_query($q,$con);
	}
	
	else if($type=="removepekerjavar")
	{
		$q ="delete from pekerja_var where id_pekerja_var = '$id'";
		$r = mysql_query($q,$con);
	}
	
echo "<script>window.location.href='$url';</script>";

?>