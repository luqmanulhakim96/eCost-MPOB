<?php 
session_start();
extract($_POST);
include ('../Connections/connection.class.php');
$con = connect();
$q="update login_mill set firsttime ='2' where lesen = '".$_SESSION['lesen']."'";
$r = mysql_query($q,$con);

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
$rinfo = mysql_query($qinfo,$con);



echo "<script>window.location.href='home.php?id=profile'</script>";

?>