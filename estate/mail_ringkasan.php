<?php session_start();
include('../Connections/connection.class.php');
$url = $_SERVER['HTTP_REFERER'];

$con = connect();
$q="select * from esub where no_lesen_baru = '".$_SESSION['lesen']."'";
$r=mysqli_query($con, $q);
$row=mysqli_fetch_array($r);



// In case any of our lines are larger than 70 characters, we should use wordwrap()


$header.="from: admin@ecost.mpob.gov.my";

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
					//$sentmail = true;

			//	}
// Send

$qaddemail="INSERT INTO ringkasan_kos_hantar (
											NO_LESEN ,
											TAHUN ,
											TARIKH_HANTAR
											)
											VALUES (
											'".$_SESSION['lesen']."', '".$_SESSION['tahun']."',
											NOW()
											);
						";
				$raddemail=mysqli_query($con, $qaddemail);

				$q_belanja="update belanja_am_kos set status='1' where thisyear='".$_SESSION['tahun']."' and lesen ='".$_SESSION['lesen']."'";
				$r_belanja=mysqli_query($con, $q_belanja);

				$q_buruh="update buruh_status set status ='1' where tahun='".$_SESSION['tahun']."' and lesen ='".$_SESSION['lesen']."'";
				$r_buruh=mysqli_query($con, $q_buruh);

				$q_immature="update kos_belum_matang set status ='1' where pb_thisyear='".$_SESSION['tahun']."' and lesen ='".$_SESSION['lesen']."'";
				$r_immature=mysqli_query($con, $q_immature);

				$q_angkut="update kos_matang_pengangkutan set status ='1' where pb_thiyear='".$_SESSION['tahun']."' and lesen ='".$_SESSION['lesen']."'";
				$r_angkut=mysqli_query($con, $q_angkut);

				$q_jaga="update kos_matang_penjagaan set status ='1' where pb_thisyear='".$_SESSION['tahun']."' and lesen ='".$_SESSION['lesen']."'";
				$r_jaga=mysqli_query($con, $q_jaga);

				$q_tuai="update kos_matang_penuaian set status ='1' where pb_thisyear='".$_SESSION['tahun']."' and lesen ='".$_SESSION['lesen']."'";
				$r_tuai=mysqli_query($con, $q_tuai);

if($sentmail){

echo "<script>alert('Maklumat anda telah berjaya dihantar ke pihak MPOB.');</script>";
echo "<script>window.location.href='home.php?id=home&finished=true&ringkasan=true'</script>";
}
else {
echo "<script>alert('Maklumat anda telah berjaya dihantar ke pihak MPOB. Perhatian : Sila isikan@kemaskini maklumat email anda');</script>";
echo "<script>window.location.href='home.php?id=home&finished=true&ringkasan=true'</script>";
}
?>
