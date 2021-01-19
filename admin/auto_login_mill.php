<?php session_start();


if ($_SESSION['type']<>"admin")
       header("location:../logout.php");
	   
include ('../Connections/connection.class.php');
extract($_REQUEST);

$con=connect();
$q ="select * from login_mill where lesen = '$username' and password = '$password'";
$r=mysql_query($q,$con);
$row=mysql_fetch_array($r);
$total = mysql_num_rows($r);

if($total>0){
	$_SESSION['lesen'] = $row['lesen'];
	$_SESSION['password']=$row['password'];
	$_SESSION['view']=$view;
	$_SESSION['tahun']=$tahun;
	
	echo "<script>window.location.href='../mill/home.php?id=profile&logging=true&mill=true&tahun=$tahun';</script>";
}
else {
echo "<script>alert('Cannot view the survey. Please check username and password.');</script>";
echo "<script>window.location.href='../index1.php';</script>";
}

?>