<?php session_start();
include('../Connections/connection.class.php');
$url = $_SERVER['HTTP_REFERER'];

$con = connect();
$q="select * from alamat_ekilang where lesen = '".$_SESSION['lesen']."'";
$r=mysqli_query($con, $q);
$row=mysqli_fetch_array($r);


//include ('../setstring.inc');
set_time_limit(0);
// The message

// In case any of our lines are larger than 70 characters, we should use wordwrap()


$header.="from: ";
$header.="admin@ecost.mpob.gov.my";

$messages= "Maklumat borang soal selidik kajian kos pengeluaran minyak sawit telah berjaya dihantar ke MPOB";
$messages.="\r\r Terima kasih di atas kerjasama anda";
$messages.="\r\r Sila hubungi pihak MPOB untuk maklumat lanjut";

$title="[E-COST] - ";
$title.=$row['No_Lesen_Baru'].' '.$row['Nama_Estet'];


				//$q="select * from login_admin";
				//$r=mysqli_query($q,$con);
				//while($row=mysqli_fetch_array($r)){
						$to = $row['email'];
					$sentmail = mail($to,$title,$messages,$header);

				//}

if($sentmail){

				$qaddemail="INSERT INTO ringkasan_kos_hantar (
											NO_LESEN ,
											TAHUN ,
											TARIKH_HANTAR
											)
											VALUES (
											'".$_SESSION['lesen']."', '".date('Y')."',
											NOW()
											);
						";
				$raddemail=mysqli_query($con, $qaddemail);

				$q_belanja="update mill_buruh set status='1' where tahun='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_belanja=mysqli_query($con, $q_belanja);

				$q_buruh="update mill_kos_lain set status ='1' where tahun='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_buruh=mysqli_query($con, $q_buruh);

				$q_immature="update mill_pemprosesan set status ='1' where tahun='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_immature=mysqli_query($con, $q_immature);

				$q_angkut="update kos_matang_pengangkutan set status ='1' where pb_thiyear='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_angkut=mysqli_query($con, $q_angkut);

				$q_jaga="update kos_matang_penjagaan set status ='1' where pb_thisyear='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_jaga=mysqli_query($con, $q_jaga);

				$q_tuai="update kos_matang_penuaian set status ='1' where pb_thisyear='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_tuai=mysqli_query($con, $q_tuai);

echo "<script>alert('Maklumat anda telah berjaya dihantar ke pihak MPOB.');</script>";
echo "<script>window.location.href='home.php?id=home&finished=true&ringkasan=true'</script>";
}
else {
echo "<script>alert('Maklumat anda telah berjaya dihantar ke pihak MPOB. Perhatian : Sila isikan@kemaskini maklumat email anda');</script>";
echo "<script>window.location.href='home.php?id=home&finished=true&ringkasan=true'</script>";
}
?>
