<?php session_start();
include ('../Connections/connection.class.php');

extract($_POST);
extract($_GET);

if($tahun =='#')
{
	echo "<script>alert('Sila pilih tahun yang betul'); </script>";
}


$tahunini = date('Y');
$umurtahun = $tahunini-$tahun;

$sebelumtahun = $tahun - 44;

$con = connect();

if($type=='add')
{
	 $q="INSERT INTO age_profile (lesen ,umur_pokok ,tahun_tanam ,keluasan)VALUES ('".$_SESSION['lesen']."', '$umurtahun', '$tahun', '$jumlah');";
	$r = mysqli_query($con, $q) or die("<script>alert('Sila pilih tahun yang betul'); history.go(-1);</script>");
}

if($type=='edit')
{
	 $q="update age_profile set keluasan = '$jumlah' where lesen = '".$_SESSION['lesen']."' and tahun_tanam='$tahun'";
	$r = mysqli_query($con, $q) or die("<script>alert('Sila pilih tahun yang betul'); history.go(-1);</script>");
}

if($type=='delete')
{
	$q="delete from age_profile  where lesen = '".$_SESSION['lesen']."' and tahun_tanam='$tahun'";
	$r = mysqli_query($con, $q) or die("<script>alert('Sila pilih tahun yang betul'); history.go(-1);</script>");
}

echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";

?>
