<?php
session_start();
extract($_POST);
include ('../Connections/connection.class.php');
$con = connect();
$q="update login_mill set firsttime ='2' where lesen = '".$_SESSION['lesen']."'";
$r = mysqli_query($con, $q);

$qinfo="INSERT INTO mill_info (
lesen ,
syarikat ,
integrasi ,
teknologi ,
tahun_operasi, lesenlama, syarikatinduk, daerahpremis, negeripremis, kapasiti
)
VALUES (
'".$_SESSION['lesen']."', '$syarikat', '$integrasi', '$teknologi', '$tahun_operasi','','','','',''
)
";
$rinfo = mysqli_query($con, $qinfo);



echo "<script>window.location.href='home.php?id=profile'</script>";

?>
