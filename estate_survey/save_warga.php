<?php
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);

$con =connect();


foreach($warga as $key =>$value)
{
	$value = str_replace(",","",$value);
	$q ="insert into warga_estate values('$jenis','".$_SESSION['lesen']."','$tahun','$value','$key')";
	$r =mysqli_query($con, $q);
}
$total = str_replace(",","",$total);
$q1="update buruh set $jenis = '$total' where lesen = '".$_SESSION['lesen']."' and tahun ='$tahun'";
$r1=mysqli_query($con, $q1);


/*$qa = "select * from buruh where lesen = '".$_SESSION['lesen']."' and tahun ='tahun' limit 0,1";
$ra = mysqli_query($qa,$con);
$rowra = mysqli_fetch_array($ra);

if ($fieldtotal =='jumlah_mandur_tempatan')*/

echo "<script>window.location.href='home.php?id=buruh'</script>";

?>
