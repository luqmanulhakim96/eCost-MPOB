<?php
include('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con= connect();

$q="update period_survey  set st_status ='$stat_estate', st_date = '$tarikh_estate' where st_id = 'estate'";
$r = mysqli_query($con, $q);


$q1="update period_survey set st_status='$stat_mill', st_date = '$tarikh_mill' where st_id ='mill'";
$r1 = mysqli_query($con, $q1);


echo "<script>window.location.href='home.php?id=config&sub=period'; </script>";
?>
