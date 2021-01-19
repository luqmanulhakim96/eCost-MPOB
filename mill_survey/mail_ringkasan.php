<?php session_start();
include('../Connections/connection.class.php');
$url = $_SERVER['HTTP_REFERER'];

$con = connect();
$q="select * from alamat_ekilang where lesen = '".$_SESSION['lesen']."'";
$r=mysql_query($q,$con);
$row=mysql_fetch_array($r);


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
				//$r=mysql_query($q,$con);
				//while($row=mysql_fetch_array($r)){
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
				$raddemail=mysql_query($qaddemail,$con);
				
				$q_belanja="update mill_buruh set status='1' where tahun='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_belanja=mysql_query($q_belanja,$con);
				
				$q_buruh="update mill_kos_lain set status ='1' where tahun='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_buruh=mysql_query($q_buruh,$con);
				
				$q_immature="update mill_pemprosesan set status ='1' where tahun='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_immature=mysql_query($q_immature,$con);
				
				$q_angkut="update kos_matang_pengangkutan set status ='1' where pb_thiyear='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_angkut=mysql_query($q_angkut,$con);

				$q_jaga="update kos_matang_penjagaan set status ='1' where pb_thisyear='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_jaga=mysql_query($q_jaga,$con);
				
				$q_tuai="update kos_matang_penuaian set status ='1' where pb_thisyear='".date('Y')."' and lesen ='".$_SESSION['lesen']."'";
				$r_tuai=mysql_query($q_tuai,$con);

echo "<script>alert('Maklumat anda telah berjaya dihantar ke pihak MPOB.');</script>";
echo "<script>window.location.href='home.php?id=home&finished=true&ringkasan=true'</script>";
}
else {
echo "<script>alert('Maklumat anda telah berjaya dihantar ke pihak MPOB. Perhatian : Sila isikan@kemaskini maklumat email anda');</script>";
echo "<script>window.location.href='home.php?id=home&finished=true&ringkasan=true'</script>";
}
?>
