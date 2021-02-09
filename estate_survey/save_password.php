<?php
session_start();
include('../Connections/connection.class.php');
extract($_POST);


if ($password==$repassword)
{
$con = connect();
$q ="update login_estate set password='$password' where lesen = '".$_SESSION['lesen']."'";
$r = mysqli_query($con, $q);
}
else
{
	echo "<script>alert('Pastikan katalaluan anda adalah betul');window.location.href='home.php?id=profile';</script>";
}
$URL = "home.php?id=profile";
header("Location:".$URL);
?>
