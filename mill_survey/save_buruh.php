<?php
/*
 *      Filename: mill/save_buruh.php
 *      Copyright 2010 Malaysia Palm Oil Board <azman@mpob.gov.my>	
 *		Last update: 15.10.2010 11:46:16 am
 */
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con = connect();

	$mb_1 = str_replace(",",'',$mb_1);
	$mb_2 = str_replace(",",'',$mb_2);
	$mb_3 = str_replace(",",'',$mb_3);
	$mb_4 = str_replace(",",'',$mb_4);
	$mb_5 = str_replace(",",'',$mb_5);
	$total_mb = str_replace(",",'',$total_mb);
	
	$mb_1b = str_replace(",",'',$mb_1b);
	$mb_2b = str_replace(",",'',$mb_2b);
	$mb_3b = str_replace(",",'',$mb_3b);
	$mb_4b = str_replace(",",'',$mb_4b);
	$mb_5b = str_replace(",",'',$mb_5b);
	$total_mb_b = str_replace(",",'',$total_mb_b);
	
	$mb_1c = str_replace(",",'',$mb_1c);
	$mb_2c = str_replace(",",'',$mb_2c);
	$mb_3c = str_replace(",",'',$mb_3c);
	$mb_4c = str_replace(",",'',$mb_4c);
	$mb_5c = str_replace(",",'',$mb_5c);
	$total_mb_c = str_replace(",",'',$total_mb_c);

$q ="UPDATE mill_buruh SET mb_1 = '$mb_1',
mb_2 = '$mb_2',
mb_3 = '$mb_3',
mb_4 = '$mb_4',
mb_5 = '$mb_5',
total_mb = '$total_mb' ,

mb_1b = '$mb_1b',
mb_2b = '$mb_2b',
mb_3b = '$mb_3b',
mb_4b = '$mb_4b',
mb_5b = '$mb_5b',
total_mb_b = '$total_mb_b' ,

mb_1c = '$mb_1c',
mb_2c = '$mb_2c',
mb_3c = '$mb_3c',
mb_4c = '$mb_4c',
mb_5c = '$mb_5c',
total_mb_c = '$total_mb_c' ,

status='$status'
WHERE lesen = '$lesen' AND tahun =$tahun
";
$r = mysql_query($q,$con);

if ($status==2){
	$id = "buruh_mill";
	echo "<script>window.location.href='home.php?id=$id'</script>";
	}
else{
	$id = "ringkasan_mill";
	echo "<script>window.location.href='home.php?id=$id'</script>";
	}?>
