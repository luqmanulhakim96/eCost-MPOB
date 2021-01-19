<?php
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
ini_set('memory_limit', '100M');

$con =connect();

//=============== for video upload ========================
if($jenis=='video'){
function findexts ($filename) 
{ 
$filename = strtolower($filename) ; 
$exts = split("[/\\.]", $filename) ; 
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
$r = mysql_query($q,$con);
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
$r = mysql_query($q,$con);
}

//============== for cost component ================
if($jenis =='delete')
{
$q ="delete from var_costcomponent where title = '$id'";
$r = mysql_query($q,$con);
}

//============== for cost component ================

	if ($jenis=='description')
	{
	$var = str_replace("zxz","&",$var);
	$q ="update var_costcomponent set description = '$var' where title = '".$id."'";
	$r = mysql_query($q,$con);
	}
	if ($jenis=='title')
	{
	$q ="update var_costcomponent set title = '$var' where title = '$id'";
	$r = mysql_query($q,$con);
	}


echo "<script>window.location.href='home.php?id=config&sub=help'</script>";



?>