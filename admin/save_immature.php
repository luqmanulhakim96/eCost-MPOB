<?php
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);

$con =connect();
$url = $_SERVER['HTTP_REFERER'];

$malay = ucwords($malay);
$english = ucwords($english);

	if($type=="addtanaman")
	{
		$q ="insert into tanaman_var values ('','$malay','$english')";
		$r = mysql_query($q,$con);
	}
	
	else if($type=="edittanaman")
	{
		$q ="update tanaman_var set nama_malay='$malay', nama_english='$english' where id_tanaman ='$id'";
		$r = mysql_query($q,$con);
	}
	
	else if($type=="deletetanaman")
	{
		$q ="delete from tanaman_var where  id_tanaman ='$id'";
		$r = mysql_query($q,$con);
	}
	
	
	//------------------- belanja -----------------
	else if($type=="addbelanja")
	{
		$q ="insert into belanja_takulang_var values ('','$malay','$english')";
		$r = mysql_query($q,$con);
	}
	else if($type=="editbelanja")
	{
		$q ="update belanja_takulang_var set nama_malay='$malay', nama_english='$english' where id_belanja ='$id'";
		$r = mysql_query($q,$con);
	}
	else if($type=="deletebelanja")
	{
		$q ="delete from belanja_takulang_var where  id_belanja ='$id'";
		$r = mysql_query($q,$con);
	}
	
	//-------------------- penjagaan --------------------
	else if($type=="addpenjagaan")
	{
		$q ="insert into penjagaan_var values ('','$malay','$english')";
		$r = mysql_query($q,$con);
	}
	else if($type=="deletepenjagaan")
	{
		$q ="delete from penjagaan_var where  id_penjagaan ='$id'";
		$r = mysql_query($q,$con);
	}
	else if($type=="editpenjagaan")
	{
		$q ="update penjagaan_var set nama_malay='$malay', nama_english='$english' where id_penjagaan ='$id'";
		$r = mysql_query($q,$con);
	}
	
	//-------------------- pembajaan--------------------
	else if($type=="addpembajaan")
	{
		$q ="insert into pembajaan_var values ('','$malay','$english')";
		$r = mysql_query($q,$con);
	}
	else if($type=="deletepembajaan")
	{
		$q ="delete from pembajaan_var where  id_pembajaan ='$id'";
		$r = mysql_query($q,$con);
	}
	else if($type=="editpembajaan")
	{
		$q ="update pembajaan_var set nama_malay='$malay', nama_english='$english' where id_pembajaan ='$id'";
		$r = mysql_query($q,$con);
	}


	
echo "<script>window.location.href='$url';</script>";

?>