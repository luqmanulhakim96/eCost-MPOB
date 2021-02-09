<?php
class response
{
	//total semua response estate survey yang complete (submitted to mpob) 0=not complete, 1=sah
	function  __construct($var)
	{
		$con = connect();
		$q = "SELECT COUNT(estate_info.lesen) AS jumlah FROM estate_info";
		$q .= " INNER JOIN kos_belum_matang ON estate_info.lesen = kos_belum_matang.lesen";
		$q .= " INNER JOIN kos_matang_pengangkutan ON estate_info.lesen = kos_matang_pengangkutan.lesen";
		$q .= " INNER JOIN kos_matang_penjagaan ON estate_info.lesen = kos_matang_penjagaan.lesen";
		$q .= " INNER JOIN kos_matang_penuaian ON estate_info.lesen = kos_matang_penuaian.lesen";
		$q .= " WHERE kos_belum_matang.status = 1";
		$q .= " AND kos_matang_pengangkutan.status = 1";
		$q .= " AND kos_matang_penjagaan.status = 1";
		$q .= " AND kos_matang_penuaian.status = 1";
		$r=mysqli_query($con,$q);
		$row = mysqli_fetch_assoc($r);
		$jumlah = $row['jumlah'];
		return $jumlah;
	}

	//total non response estate survey
	function totalnonresponse($var)
	{
		$con = connect();
		if($var=='peninsular')
		{
			$sqladd = "(estate_info.negeri NOT LIKE '%SABAH%' AND e.negeri NOT LIKE '%SARAWAK%')";
		}
		else if($var=='sabah')
		{
			$sqladd = "(e.negeri LIKE '%SABAH%')";
		}
		else if($var=='sarawak')
		{
			$sqladd = "(e.negeri LIKE '%SARAWAK%')";
		}
		$q="SELECT b.lesen FROM buruh b, esub e WHERE b.lesen = e.no_lesen_baru AND b.tahun = '$var' AND $sqladd GROUP BY b.lesen";
		$r=mysqli_query($con, $q);
		$row = mysqli_fetch_assoc($r);
		$jumlah = $row['jumlah'];
		return $jumlah;
	}

	function totalall($var)
	{
		//total all estate by all, peninsular, sabah or sarawak
		$con = connect();
		if($var=='malaysia')
		{
			$q = "SELECT COUNT(esub.No_Lesen_Baru) AS jumlah FROM esub";
			$q .= " INNER JOIN kos_belum_matang ON esub.No_Lesen_Baru = kos_belum_matang.lesen";
			$q .= " INNER JOIN kos_matang_pengangkutan ON esub.No_Lesen_Baru = kos_matang_pengangkutan.lesen";
			$q .= " INNER JOIN kos_matang_penjagaan ON esub.No_Lesen_Baru = kos_matang_penjagaan.lesen";
			$q .= " INNER JOIN kos_matang_penuaian ON esub.No_Lesen_Baru = kos_matang_penuaian.lesen";
			$q .= " WHERE esub.Negeri IS NOT NULL";
			$q .= " GROUP BY esub.No_Lesen_Baru";
		}
		else if($var =='peninsular')
		{
			$q = "SELECT COUNT(esub.No_Lesen_Baru) AS jumlah FROM esub";
			$q .= " INNER JOIN kos_belum_matang ON esub.No_Lesen_Baru = kos_belum_matang.lesen";
			$q .= " INNER JOIN kos_matang_pengangkutan ON esub.No_Lesen_Baru = kos_matang_pengangkutan.lesen";
			$q .= " INNER JOIN kos_matang_penjagaan ON esub.No_Lesen_Baru = kos_matang_penjagaan.lesen";
			$q .= " INNER JOIN kos_matang_penuaian ON esub.No_Lesen_Baru = kos_matang_penuaian.lesen";
			$q .= " WHERE esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK'";
			$q .= " GROUP BY esub.No_Lesen_Baru";
		}
		else if($var =='sabah')
		{
			$q = "SELECT COUNT(esub.No_Lesen_Baru) AS jumlah FROM esub";
			$q .= " INNER JOIN kos_belum_matang ON esub.No_Lesen_Baru = kos_belum_matang.lesen";
			$q .= " INNER JOIN kos_matang_pengangkutan ON esub.No_Lesen_Baru = kos_matang_pengangkutan.lesen";
			$q .= " INNER JOIN kos_matang_penjagaan ON esub.No_Lesen_Baru = kos_matang_penjagaan.lesen";
			$q .= " INNER JOIN kos_matang_penuaian ON esub.No_Lesen_Baru = kos_matang_penuaian.lesen";
			$q .= " WHERE esub.Negeri = 'SABAH'";
			$q .= " GROUP BY esub.No_Lesen_Baru";
		}
		else if($var =='sarawak')
		{
			$q = "SELECT COUNT(esub.No_Lesen_Baru) AS jumlah FROM esub";
			$q .= " INNER JOIN kos_belum_matang ON esub.No_Lesen_Baru = kos_belum_matang.lesen";
			$q .= " INNER JOIN kos_matang_pengangkutan ON esub.No_Lesen_Baru = kos_matang_pengangkutan.lesen";
			$q .= " INNER JOIN kos_matang_penjagaan ON esub.No_Lesen_Baru = kos_matang_penjagaan.lesen";
			$q .= " INNER JOIN kos_matang_penuaian ON esub.No_Lesen_Baru = kos_matang_penuaian.lesen";
			$q .= " WHERE esub.Negeri = 'SARAWAK'";
			$q .= " GROUP BY esub.No_Lesen_Baru";
		}
		$r=mysqli_query($con,$q);
		$row = mysqli_fetch_assoc($r);
		$jumlah = $row['jumlah'];
		return $jumlah;

	}
	function totalresponsekawasan($var,$tahun)
	{
		//total all response by kawasan estate (Peninsular, Sabah and Sarawak)
		$con = connect();
		if($var=='peninsular')
		{
			$sqladd = "(esub.Negeri NOT LIKE '%SABAH%' AND esub.Negeri NOT LIKE '%SARAWAK%')";
		}
		else if($var=='sabah')
		{
			$sqladd = "(esub.Negeri LIKE '%SABAH%')";
		}
		else if($var=='sarawak')
		{
			$sqladd = "(esub.Negeri LIKE '%SARAWAK%')";
		}

		$q = "SELECT COUNT(esub.No_Lesen_Baru) AS lesen FROM esub";
		$q .= " INNER JOIN kos_belum_matang ON estate_info.lesen = kos_belum_matang.lesen";
		$q .= " INNER JOIN kos_matang_pengangkutan ON estate_info.lesen = kos_matang_pengangkutan.lesen";
		$q .= " INNER JOIN kos_matang_penjagaan ON estate_info.lesen = kos_matang_penjagaan.lesen";
		$q .= " INNER JOIN kos_matang_penuaian ON estate_info.lesen = kos_matang_penuaian.lesen";
		$q .= " WHERE kos_belum_matang.pb_thisyear = '$tahun'";
		$q .= " AND kos_matang_pengangkutan.pb_thisyear = '$tahun'";
		$q .= " AND kos_matang_penjagaan.pb_thisyear = '$tahun'";
		$q .= " AND kos_matang_penuaian.pb_thisyear = '$tahun'";
		$q .= " AND $sqladd";
		$q .= " GROUP BY esub.No_Lesen_Baru";

		$r=mysqli_query($con,$q);
		$row = mysqli_fetch_assoc($r);
		$jumlah = $row['jumlah'];
		return $jumlah;

	}

	function outliers($var)
	{
		$con = connect();
		$q="SELECT COUNT(lesen) AS jumlah FROM buruh WHERE tahun = '$var'";
		$r=mysqli_query($con,$q);
		$row = mysqli_fetch_array($r);
		$jumlah = $row['jumlah'];
		return $jumlah;
	}

	function tanambaru($tahun,$type,$jenis,$location)
	{
		$con = connect();
		if($location=='')
		{
	$q="SELECT * FROM $type t, esub e WHERE t.pb_type='$jenis' AND t.pb_thisyear='$tahun' AND e.no_lesen_baru = t.lesen GROUP BY t.lesen";
		}
		else if($location=='peninsular')
		{
		 $q="SELECT * FROM $type t, esub e WHERE t.pb_type='$jenis' AND t.pb_thisyear='$tahun' AND e.no_lesen_baru = t.lesen AND (e.negeri NOT LIKE '%SABAH%' AND e.negeri NOT LIKE '%SARAWAK%') GROUP BY t.lesen";
		}
		else if($location=='sabah')
		{
		$q="SELECT * FROM $type t, esub e WHERE t.pb_type='$jenis' AND t.pb_thisyear='$tahun' AND e.no_lesen_baru = t.lesen AND (e.negeri LIKE '%SABAH%') GROUP BY t.lesen";
		}
		else if($location=='sarawak')
		{
		$q="SELECT * FROM $type t, esub e WHERE t.pb_type='$jenis' AND t.pb_thisyear='$tahun' AND e.no_lesen_baru = t.lesen AND (e.negeri LIKE '%SARAWAK%') GROUP BY t.lesen";
		}

		$r=mysqli_query($con,$q);
		$row = mysqli_fetch_array($r);
		$total = mysqli_num_rows($r);
		return $total;
	}

}
?>
