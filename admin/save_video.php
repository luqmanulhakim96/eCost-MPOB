<?php
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
ini_set('memory_limit', '100M');
set_time_limit(0);
error_reporting(0);

$con =connect();

//=============== for video upload ========================
if($jenis=='video'){
function findexts ($filename)
{
$filename = strtolower($filename) ;
$exts = preg_split("[/\\.]", $filename) ;
$n = count($exts)-1;
$exts = $exts[$n];
return $exts;
}
$ext = findexts ($_FILES['ufile']['name']) ;


$target = "../video/";
$target= $target."ecost.".$ext;

if(move_uploaded_file($_FILES['ufile']['tmp_name'], $target))
{
$q ="update video set title = '$title', path='$target' where id = '$idvideo' ";
$r = mysqli_query($con, $q);
}
else
{
echo "<html><script language='javascript'>alert('Upload Video Failed!'),history.go(-1)</script></html>";
}
}
//============== for cost component ================
if($jenis =='costcomponent')
{
$title2 = trim($title2);
$description2 = trim($description2);
$q ="insert into var_costcomponent values ('$title2','$description2')";
$r = mysqli_query($con, $q);
}

//============== for cost component ================
if($jenis =='delete')
{
$q ="delete from var_costcomponent where title = '$id'";
$r = mysqli_query($con, $q);
}

//============== for cost component ================

	if ($jenis=='description')
	{
	$var = str_replace("zxz","&",$var);
	$q ="update var_costcomponent set description = '$var' where title = '".$id."'";
	$r = mysqli_query($con, $q);
	}
	if ($jenis=='title')
	{
	$q ="update var_costcomponent set title = '$var' where title = '$id'";
	$r = mysqli_query($con, $q);
	}


echo "<script>window.location.href='home.php?id=config&sub=help'</script>";



?>
