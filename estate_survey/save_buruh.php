<?php
session_start(); 
include('../Connections/connection.class.php');
include('../class/user.class.php');
extract($_GET);
extract($_POST);


function semakburuh ($nl, $th,$stat){
		$con = connect();
		$q="select * from buruh_status where lesen ='$nl' and tahun = '$th' limit 1";
		$r=mysql_query($q,$con);
		$totalr = mysql_num_rows($r);
					if($totalr==0)
					{
								$q="insert into buruh_status values('$nl', '$th','$stat')";
								$r=mysql_query($q,$con);
					}
					if($totalr>0)
					{
								$q="update buruh_status set status='$stat' where lesen ='$nl' and tahun ='$th'";
								$r=mysql_query($q,$con);
					}
				
}
semakburuh($_SESSION['lesen'], date('Y'), $status);


$jentera = new user('','');

	$mandur_penuai_tempatan  =str_replace(",",'',$mpe_t); 
	$mandur_am_tempatan =str_replace(",",'',$mae_t); 	
	$jumlah_mandur_tempatan 	=str_replace(",",'',$total_mt); 
	$mandur_penuai_asing=str_replace(",",'',$mpe_a);  	
	$mandur_am_asing 	=str_replace(",",'',$mea_a); 
	$jumlah_mandur_asing 	=str_replace(",",'',$total_ma); 
	$kekurangan_mandur_estet 	=str_replace(",",'',$kekurangan_mandur); 
	$mandur_penuai_k_tempatan 	=str_replace(",",'',$mpk_t); 
	$mandur_am_k_tempatan 	=str_replace(",",'',$mak_t); 
	$jumlah_mandur_k_tempatan 	=str_replace(",",'',$total_mtk); 
	$mandur_penuai_k_asing 	=str_replace(",",'',$mpk_a); 
	$mandur_am_k_asing 	=str_replace(",",'',$mak_a); 
	$jumlah_mandur_k_asing 	=str_replace(",",'',$total_mak); 
	$kekurangan_mandur_kontraktor 	=str_replace(",",'',$kekurangan_mandur_k); 
	
	$pekerja_estet_tempatan 	=str_replace(",",'',$pestet_t); 
	$pekerja_am_tempatan 	=str_replace(",",'',$pam_t); 
	$jumlah_pekerja_tempatan 	=str_replace(",",'',$total_pekerja_t); 
	$pekerja_estet_asing 	=str_replace(",",'',$pestet_a); 
	$pekerja_am_asing 	=str_replace(",",'',$pam_a); 
	$jumlah_pekerja_asing 	=str_replace(",",'',$total_pekerja_a); 
	$kekurangan_pekerja_estet 	=str_replace(",",'',$kekurangan_pekerja); 
	$pekerja_estet_k_tempatan =str_replace(",",'',$pestet_tk); 	
	$pekerja_am_k_tempatan 	=str_replace(",",'',$pam_tk); 
	$jumlah_pekerja_k_tempatan 	=str_replace(",",'',$total_pekerja_tk); 
	$pekerja_estet_k_asing 	=str_replace(",",'',$pestet_ak); 
	$pekerja_am_k_asing =str_replace(",",'',$pam_ak); 
	$jumlah_pekerja_k_asing =str_replace(",",'',$total_pekerja_ak); 
	$kekurangan_pekerja_kontraktor 	=str_replace(",",'',$kekurangan_pekerja_kontraktor); 
	$eksekutif_tempatan =str_replace(",",'',$eksekutif_t); 
	$kakitangan_tempatan =str_replace(",",'',$kakitangan_t); 
	$jumlah_kakitangan_tempatan =str_replace(",",'',$total_kakitangan_t); 
	$eksekutif_asing =str_replace(",",'',$eksekutif_a); 
	$kakitangan_asing 	=str_replace(",",'',$kakitangan_a); 
	$jumlah_kakitangan_asing =str_replace(",",'',$total_kakitangan_a); 
	$kekurangan_eksekutif =str_replace(",",'',$kekurangan_kakitangan); 
	$eksekutif_k_tempatan 	=str_replace(",",'',$eksekutif_tk); 
	$kakitangan_k_tempatan 	=str_replace(",",'',$kakitangan_tk); 
	$jumlah_kakitangan_k_tempatan 	=str_replace(",",'',$total_kakitangan_tk); 
	$eksekutif_k_asing 	=str_replace(",",'',$eksekutif_ak); 
	$kakitangan_k_asing 	=str_replace(",",'',$kakitangan_ak); 
	$jumlah_kakitangan_k_asing 	=str_replace(",",'',$total_kakitangan_ak); 
	$kekurangan_kakitangan_kontraktor 	=str_replace(",",'',$kekurangan_pekerja_k); 
	$penuai_tempatan 	=str_replace(",",'',$penuai_t); 
	$penuai_asing 	=str_replace(",",'',$penuai_a); 
	$penuai_tempatan_kontraktor 	=str_replace(",",'',$penuai_tk); 
	$penuai_asing_kontraktor 	=str_replace(",",'',$penuai_ak); 
	$penuai_kumpulan_tempatan 	=str_replace(",",'',$penuai_t_kumpulan); 
	$penuai_kumpulan_asing 	=str_replace(",",'',$penuai_a_kumpulan); 
	$penuai_kumpulan_tempatan_kontraktor 	=str_replace(",",'',$penuai_tk_kumpulan); 
	$penuai_kumpulan_asing_kontraktor 	=str_replace(",",'',$penuai_ak_kumpulan); 
	$pemungut_bts_tempatan 	=str_replace(",",'',$pbts_t); 
	$pemungut_bts_asing =str_replace(",",'',$pbts_a); 	
	$pemungut_bts_tempatan_kontraktor =str_replace(",",'',$pbts_tk); 	
	$pemungut_bts_asing_kontraktor 	=str_replace(",",'',$pbts_ak); 
	$pemungut_buahrelai_tempatan =str_replace(",",'',$pbr_t); 	
	$pemungut_buahrelai_asing =str_replace(",",'',$pbr_a); 	
	$pemungut_buahrelai_tempatan_kontraktor =str_replace(",",'',$pbr_t); 	
	$pemungut_buahrelai_asing_kontraktor 	=str_replace(",",'',$pbr_ak); 
	$jumlah_tempatan 	=str_replace(",",'',$total_pt); 
	$jumlah_asing 	=str_replace(",",'',$total_pa); 
	$jumlah_tempatan_kontraktor 	=str_replace(",",'',$total_ptk); 
	$jumlah_asing_kontraktor =str_replace(",",'',$total_pak); 	
	$jumlahkumpulan_tempatan =str_replace(",",'',$total_pt_kumpulan); 	
	$jumlahkumpulan_asing =str_replace(",",'',$total_pa_kumpulan); 	
	$jumlahkumpulan_tempatan_kontraktor 	=str_replace(",",'',$total_ptk_kumpulan); 
	$jumlahkumpulan_asing_kontraktor =str_replace(",",'',$total_pak_kumpulan); 	
	$kekurangan_penuai_estet 	=str_replace(",",'',$kekurangan_pemungut); 
	$kekurangan_penuai_kontraktor=str_replace(",",'',$kekurangan_pemungut_k); 


$con = connect();
$q ="update buruh set 
mandur_penuai_tempatan  ='$mandur_penuai_tempatan',
	mandur_am_tempatan 	='$mandur_am_tempatan',
	jumlah_mandur_tempatan 	='$jumlah_mandur_tempatan',
	mandur_penuai_asing ='$mandur_penuai_asing',	
	mandur_am_asing ='$mandur_am_asing',	
	jumlah_mandur_asing ='$jumlah_mandur_asing',	
	kekurangan_mandur_estet ='$kekurangan_mandur_estet',	
	mandur_penuai_k_tempatan ='$mandur_penuai_k_tempatan',	
	mandur_am_k_tempatan ='$mandur_am_k_tempatan',	
	jumlah_mandur_k_tempatan ='$jumlah_mandur_k_tempatan',	
	mandur_penuai_k_asing 	='$mandur_penuai_k_asing',
	mandur_am_k_asing 	='$mandur_am_k_asing',
	jumlah_mandur_k_asing 	='$jumlah_mandur_k_asing',
	kekurangan_mandur_kontraktor ='$kekurangan_mandur_kontraktor',	
	pekerja_estet_tempatan 	='$pekerja_estet_tempatan',
	pekerja_am_tempatan 	='$pekerja_am_tempatan',
	jumlah_pekerja_tempatan 	='$jumlah_pekerja_tempatan',
	pekerja_estet_asing 	='$pekerja_estet_asing',
	pekerja_am_asing 	='$pekerja_am_asing',
	jumlah_pekerja_asing 	='$jumlah_pekerja_asing',
	kekurangan_pekerja_estet 	='$kekurangan_pekerja_estet',
	pekerja_estet_k_tempatan 	='$pekerja_estet_k_tempatan',
	pekerja_am_k_tempatan 	='$pekerja_am_k_tempatan',
	jumlah_pekerja_k_tempatan 	='$jumlah_pekerja_k_tempatan',
	pekerja_estet_k_asing 	='$pekerja_estet_k_asing',
	pekerja_am_k_asing 	='$pekerja_am_k_asing',
	jumlah_pekerja_k_asing 	='$jumlah_pekerja_k_asing',
	kekurangan_pekerja_kontraktor='$kekurangan_pekerja_kontraktor', 	
	eksekutif_tempatan 	='$eksekutif_tempatan',
	kakitangan_tempatan 	='$kakitangan_tempatan',
	jumlah_kakitangan_tempatan 	='$jumlah_kakitangan_tempatan',
	eksekutif_asing 	='$eksekutif_asing',
	kakitangan_asing 	='$kakitangan_asing',
	jumlah_kakitangan_asing ='$jumlah_kakitangan_asing',	
	kekurangan_eksekutif 	='$kekurangan_eksekutif',
	eksekutif_k_tempatan 	='$eksekutif_k_tempatan',
	kakitangan_k_tempatan 	='$kakitangan_k_tempatan',
	jumlah_kakitangan_k_tempatan ='$jumlah_kakitangan_k_tempatan',	
	eksekutif_k_asing 	='$eksekutif_k_asing',
	kakitangan_k_asing 	='$kakitangan_k_asing',
	jumlah_kakitangan_k_asing='$jumlah_kakitangan_k_asing', 	
	kekurangan_kakitangan_kontraktor ='$kekurangan_kakitangan_kontraktor',	
	penuai_tempatan 	='$penuai_tempatan',
	penuai_asing 	='$penuai_asing',
	penuai_tempatan_kontraktor='$penuai_tempatan_kontraktor', 	
	penuai_asing_kontraktor 	='$penuai_asing_kontraktor',
	penuai_kumpulan_tempatan 	='$penuai_kumpulan_tempatan',
	penuai_kumpulan_asing 	='$penuai_kumpulan_asing',
	penuai_kumpulan_tempatan_kontraktor='$penuai_kumpulan_tempatan_kontraktor', 	
	penuai_kumpulan_asing_kontraktor 	='$penuai_kumpulan_asing_kontraktor',
	pemungut_bts_tempatan 	='$pemungut_bts_tempatan',
	pemungut_bts_asing 	='$pemungut_bts_asing',
	pemungut_bts_tempatan_kontraktor='$pemungut_bts_tempatan_kontraktor', 	
	pemungut_bts_asing_kontraktor 	='$pemungut_bts_asing_kontraktor',
	pemungut_buahrelai_tempatan 	='$pemungut_buahrelai_tempatan',
	pemungut_buahrelai_asing 	='$pemungut_buahrelai_asing',
	pemungut_buahrelai_tempatan_kontraktor='$pemungut_buahrelai_tempatan_kontraktor', 	
	pemungut_buahrelai_asing_kontraktor 	='$pemungut_buahrelai_asing_kontraktor',
	jumlah_tempatan 	='$jumlah_tempatan',
	jumlah_asing 	='$jumlah_asing',
	jumlah_tempatan_kontraktor='$jumlah_tempatan_kontraktor', 	
	jumlah_asing_kontraktor 	='$jumlah_asing_kontraktor',
	jumlahkumpulan_tempatan 	='$jumlahkumpulan_tempatan',
	jumlahkumpulan_asing 	='$jumlahkumpulan_asing',
	jumlahkumpulan_tempatan_kontraktor='$jumlahkumpulan_tempatan_kontraktor', 	
	jumlahkumpulan_asing_kontraktor 	='$jumlahkumpulan_asing_kontraktor',
	kekurangan_penuai_estet 	='$kekurangan_penuai_estet',
	kekurangan_penuai_kontraktor='$kekurangan_penuai_kontraktor'

 where lesen ='".$_SESSION['lesen']."'  and tahun ='".date('Y')."'";
$r = mysql_query($q,$con);


class find
{
	function caridata($var)
	{
		$con =connect();
		$q="select * from estate_jentera where id_jentera ='".$var[0]."' and lesen ='".$var[1]."' and tahun='".$var[2]."' and nama_jentera='".$var[3]."' and type ='".$var[4]."'";
		$r = mysql_query($q,$con);
		$total = mysql_num_rows($r);
		return $total;
	}
				
	function adddata($var)
	{
		$con =connect();
		$q="insert into estate_jentera values ('".$var[0]."','".$var[1]."','".$$var[2]."','".$var[3]."','".$var[4]."')";
		$r = mysql_query($q,$con);
	}
}

// Pembajaan
for($baja=0; $baja<$totalpembajaan; $baja++)
{
	
	if(($jentera_pembajaan[$baja]!="-Pilih-")and ($jentera_pembajaan[$baja]!=""))
	{
		$peratus_pembajaan[$baja] = str_replace(",","",$peratus_pembajaan[$baja]);
		
		$var[0]=$baja1[$baja];
		$var[1]=$baja2[$baja];
		$var[2]=$baja3[$baja];
		$var[3]=$baja4[$baja];
		$var[4]=$baja5[$baja];
		$find = new find();	
		
		if($find->caridata($var)==0)
		{
			$con = connect();
			$q="INSERT INTO estate_jentera (id_jentera ,lesen ,tahun ,value ,percent ,nama_jentera,type) VALUES ('".$jentera_pembajaan[$baja]."' , '".$_SESSION['lesen']."', '".$tahun."', '".$bil_pembajaan[$baja]."', '".$peratus_pembajaan[$baja]."', '".$lain_pembajaan[$baja]."','pembajaan')";
			$r= mysql_query($q,$con);
			
		}
		else
		{
			$q="update estate_jentera set id_jentera= '".$jentera_pembajaan[$baja]."' , value = '".$bil_pembajaan[$baja]."',  percent='".$peratus_pembajaan[$baja]."', nama_jentera = '".$lain_pembajaan[$baja]."' where id_jentera = '".$baja1[$baja]."' and lesen ='".$baja2[$baja]."' and tahun ='".$baja3[$baja]."' and nama_jentera ='".$baja4[$baja]."' and type ='".$baja5[$baja]."'";
			$r= mysql_query($q,$con);
		}
	}
}

// Meracun
for($racun=0; $racun<$totalperacunan; $racun++)
{
	
	if(($jentera_peracunan[$racun]!="-Pilih-")and ($jentera_peracunan[$racun]!=""))
	{
		$peratus_peracunan[$racun] = str_replace(",","",$peratus_peracunan[$racun]);
		
		$var[0]=$racun1[$racun];
		$var[1]=$racun2[$racun];
		$var[2]=$racun3[$racun];
		$var[3]=$racun4[$racun];
		$var[4]=$racun5[$racun];
		$find = new find();	
		
		if($find->caridata($var)==0)
		{
			$con = connect();
			$q="INSERT INTO estate_jentera (id_jentera ,lesen ,tahun ,value ,percent ,nama_jentera,type) VALUES ('".$jentera_peracunan[$racun]."' , '".$_SESSION['lesen']."', '".$tahun."', '".$bil_peracunan[$racun]."', '".$peratus_peracunan[$racun]."', '".$lain_peracunan[$racun]."','peracunan')";
			$r= mysql_query($q,$con);
		}
		else
		{
			$q="UPDATE estate_jentera SET id_jentera= '".$jentera_peracunan[$racun]."' , value = '".$bil_peracunan[$racun]."',  percent='".$peratus_peracunan[$racun]."', nama_jentera = '".$lain_peracunan[$racun]."' WHERE id_jentera = '".$racun1[$racun]."' AND lesen ='".$racun2[$racun]."' AND tahun ='".$racun3[$racun]."' AND nama_jentera ='".$racun4[$racun]."' AND type ='".$racun5[$racun]."'";
			$r= mysql_query($q,$con);
		}
	}
}

// Kawalan penyakit
for($sembur=0; $sembur<$totalpenyemburan; $sembur++)
{
	if(($jentera_penyemburan[$sembur]!="-Pilih-")and ($jentera_penyemburan[$sembur]!=""))
	{
		$peratus_penyemburan[$sembur] = str_replace(",","",$peratus_penyemburan[$sembur]);
		
		$var[0]=$sembur1[$sembur];
		$var[1]=$sembur2[$sembur];
		$var[2]=$sembur3[$sembur];
		$var[3]=$sembur4[$sembur];
		$var[4]=$sembur5[$sembur];
		$find = new find();	
		
		$con = connect();
			
		if($find->caridata($var)==0)
		{
			$q="INSERT INTO estate_jentera (id_jentera ,lesen ,tahun ,value ,percent ,nama_jentera, type) VALUES ('".$jentera_penyemburan[$sembur]."' , '".$_SESSION['lesen']."', '".$tahun."', '".$bil_penyemburan[$sembur]."', '".$peratus_penyemburan[$sembur]."', '".$lain_penyemburan[$sembur]."','penyemburan')";
			$r= mysql_query($q,$con);
		}
		else
		{
			$q="UPDATE estate_jentera SET id_jentera= '".$jentera_penyemburan[$sembur]."' , value = '".$bil_penyemburan[$sembur]."', percent='".$peratus_penyemburan[$sembur]."', nama_jentera = '".$lain_penyemburan[$sembur]."' WHERE id_jentera = '".$sembur1[$sembur]."' AND lesen ='".$sembur2[$sembur]."' AND tahun ='".$sembur3[$sembur]."' AND nama_jentera ='".$sembur4[$sembur]."' AND type ='".$sembur5[$sembur]."'
				";
			$r= mysql_query($q,$con);
		}
	}
}

// Pemotongan BTS
for($tuai=0; $tuai<$totalpenuaian; $tuai++)
{
	if(($jentera_penuaian[$tuai]!="-Pilih-")and ($jentera_penuaian[$tuai]!=""))
	{
		$peratus_penuaian[$tuai] = str_replace(",","",$peratus_penuaian[$tuai]);
		
		$var[0]=$tuai1[$tuai];
		$var[1]=$tuai2[$tuai];
		$var[2]=$tuai3[$tuai];
		$var[3]=$tuai4[$tuai];
		$var[4]=$tuai5[$tuai];
		$find = new find();	
			
		$con = connect();
		
		if($find->caridata($var)==0)
		{
			$q="INSERT INTO estate_jentera (id_jentera ,lesen ,tahun ,value ,percent ,nama_jentera,type) VALUES ('".$jentera_penuaian[$tuai]."' , '".$_SESSION['lesen']."', '".$tahun."', '".$bil_penuaian[$tuai]."', '".$peratus_penuaian[$tuai]."', '".$lain_penuaian[$tuai]."','penuaian')";
			$r= mysql_query($q,$con);
		}
		else
		{
			$q="UPDATE estate_jentera SET id_jentera= '".$jentera_penuaian[$tuai]."' , value = '".$bil_penuaian[$tuai]."', percent='".$peratus_penuaian[$tuai]."', nama_jentera = '".$lain_penuaian[$tuai]."' WHERE id_jentera = '".$tuai1[$tuai]."' AND lesen ='".$tuai2[$tuai]."' AND tahun ='".$tuai3[$tuai]."' AND nama_jentera ='".$tuai4[$tuai]."' AND type ='".$tuai5[$tuai]."'
			";
			$r= mysql_query($q,$con);
		}
	}
}

// Pemungutan buah relai
for($kutip=0; $kutip<$totalpengutipan; $kutip++)
{
	if(($jentera_pengutipan[$kutip]!="-Pilih-")and ($jentera_pengutipan[$kutip]!=""))
	{
		$peratus_pengutipan[$kutip] = str_replace(",","",$peratus_pengutipan[$kutip]);
		
		$var[0]=$kutip1[$kutip];
		$var[1]=$kutip2[$kutip];
		$var[2]=$kutip3[$kutip];
		$var[3]=$kutip4[$kutip];
		$var[4]=$kutip5[$kutip];
		$find = new find();	
			
		$con = connect();
		
		if($find->caridata($var)==0)
		{
			$q="INSERT INTO estate_jentera (id_jentera ,lesen ,tahun ,value ,percent ,nama_jentera,type)
			VALUES ('".$jentera_pengutipan[$kutip]."' , '".$_SESSION['lesen']."', '".$tahun."', '".$bil_pengutipan[$kutip]."', 
			'".$peratus_pengutipan[$kutip]."', '".$lain_pengutipan[$kutip]."','pengutipan')";
			$r= mysql_query($q,$con);
		}
		else
		{
			$q="update estate_jentera set id_jentera= '".$jentera_pengutipan[$kutip]."' , value = '".$bil_pengutipan[$kutip]."', 
			percent='".$peratus_pengutipan[$kutip]."', nama_jentera = '".$lain_pengutipan[$kutip]."' where 
			id_jentera = '".$kutip1[$kutip]."' and lesen ='".$kutip2[$kutip]."' and tahun ='".$kutip3[$kutip]."' and nama_jentera ='".$kutip4[$kutip]."' and type ='".$kutip5[$kutip]."'
			";
			$r= mysql_query($q,$con);
		}
	}
}

// Pemunggahan
for($punggah=0; $punggah<$totalpemunggahan; $punggah++)
{
	if(($jentera_pemunggahan[$punggah]!="-Pilih-")and($jentera_pemunggahan[$punggah]!=""))
	{
		$peratus_pemunggahan[$punggah] = str_replace(",","",$peratus_pemunggahan[$punggah]);
		
		$var[0]=$punggah1[$punggah];
		$var[1]=$punggah2[$punggah];
		$var[2]=$punggah3[$punggah];
		$var[3]=$punggah4[$punggah];
		$var[4]=$punggah5[$punggah];
		$find = new find();	
		
		$con = connect();
			
		if($find->caridata($var)==0)
		{
			$q="INSERT INTO estate_jentera (id_jentera ,lesen ,tahun ,value ,percent ,nama_jentera, type) VALUES ('".$jentera_pemunggahan[$punggah]."' , '".$_SESSION['lesen']."', '".$tahun."', '".$bil_pemunggahan[$punggah]."', '".$peratus_pemunggahan[$punggah]."', '".$lain_pemunggahan[$punggah]."','pemunggahan')";
			$r= mysql_query($q,$con);
		}
		else
		{	
			$q="update estate_jentera set id_jentera= '".$jentera_pemunggahan[$punggah]."' , value = '".$bil_pemunggahan[$punggah]."', percent='".$peratus_pemunggahan[$punggah]."', nama_jentera = '".$lain_pemunggahan[$punggah]."' where id_jentera = '".$punggah1[$punggah]."' and lesen ='".$punggah2[$punggah]."' and tahun ='".$punggah3[$punggah]."' and nama_jentera ='".$punggah4[$punggah]."' and type ='".$punggah5[$punggah]."'";
			$r= mysql_query($q,$con);
		}	
	}
}

// Pengangkutan
for($angkut=0; $angkut<$totalpengangkutan; $angkut++)
{
	if(($jentera_pengangkutan[$angkut]!="-Pilih-")and($jentera_pengangkutan[$angkut]!=""))
	{
		$peratus_pengangkutan[$angkut] = str_replace(",","",$peratus_pengangkutan[$angkut]);
		
		$var[0]=$angkut1[$angkut];
		$var[1]=$angkut2[$angkut];
		$var[2]=$angkut3[$angkut];
		$var[3]=$angkut4[$angkut];
		$var[4]=$angkut5[$angkut];
		$find = new find();	
		
		$con = connect();
			
		if($find->caridata($var)==0)
		{
			$q="INSERT INTO estate_jentera (id_jentera ,lesen ,tahun ,value ,percent ,nama_jentera, type) VALUES ('".$jentera_pengangkutan[$angkut]."' , '".$_SESSION['lesen']."', '".$tahun."', '".$bil_pengangkutan[$angkut]."', '".$peratus_pengangkutan[$angkut]."', '".$lain_pengangkutan[$angkut]."','pengangkutan')";
			$r= mysql_query($q,$con);
		}
		else
		{	
			$q="UPDATE estate_jentera SET id_jentera= '".$jentera_pengangkutan[$angkut]."' , value = '".$bil_pengangkutan[$angkut]."', percent='".$peratus_pengangkutan[$angkut]."', nama_jentera = '".$lain_pengangkutan[$angkut]."' WHERE id_jentera = '".$angkut1[$angkut]."' AND lesen ='".$angkut2[$angkut]."' AND tahun ='".$angkut3[$angkut]."' AND nama_jentera ='".$angkut4[$angkut]."' AND type ='".$angkut5[$angkut]."'";
			$r= mysql_query($q,$con);
		}	
	}
}

$qadjust = "update estate_jentera set nama_jentera='' where id_jentera != 'Lain-lain'";
$radjust = mysql_query($qadjust,$con);

if ($status==2){
			$id = "buruh";
			echo "<script>window.location.href='home.php?id=$id'</script>";
			}
		else{
			$id = "ringkasan";
			echo "<script>window.location.href='home.php?id=$id'</script>";
			}

//echo "<script>window.location.href='home.php?id=ringkasan'</script>";
?>