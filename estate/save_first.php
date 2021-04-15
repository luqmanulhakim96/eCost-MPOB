<?php
session_start();
extract($_POST);
include ('../Connections/connection.class.php');
$con = connect();
$q="update login_estate set firsttime ='2' where lesen = '".$_SESSION['lesen']."'";
$r = mysqli_query($con, $q);

 $qinfo="INSERT INTO estate_info (lesen ,gambut, percentrata ,percentalun ,percentbukit ,percentcerun)
VALUES (
'".$_SESSION['lesen']."',  '0', '0', '0', '0', '0')";
$rinfo = mysqli_query($con, $qinfo);

// print_r($qinfo);

$URL = "home.php?id=profile";
header("Location:".$URL);

?>
