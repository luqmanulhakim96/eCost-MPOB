<?php
class Summary
{
/*	function __construct()
	{
		$host = "localhost";
		$user = "root";
		$pass = "mysqliecop";
		//$pass = "";
		$db_n = "ecost_db";

		mysqli_connect($host,$user,$pass) or die(mysqli_error());
		mysqli_select_db($db_n) or die(mysqli_error());
	}
	*/
	// Average FFB yield
	function  __construct($location)
	{
		if($location == 'malaysia')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM fbb_production";
		}
		else if($location=='peninsular')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM fbb_production WHERE fbb_production.negeri NOT LIKE '%SABAH%' AND fbb_production.negeri NOT LIKE '%SARAWAK%'";
		}
		else if($location=='sabah')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM fbb_production WHERE fbb_production.negeri LIKE '%SABAH%'";
		}
		else if($location=='sarawak')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM fbb_production WHERE fbb_production.negeri LIKE '%SARAWAK%'";
		}

		$result = mysqli_query($query) or die(mysqli_error());
		$row 	= mysqli_fetch_object($result) or die(mysqli_error());
		$total	= number_format($row->purata,2);
		return $total;
	}

	function ffb_hasil($database, $location)
	{
		if($location == 'malaysia')
		{
			$query ="SELECT AVG(jumlah_pengeluaran) as hasil FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00'";
		}
		else if($location=='peninsular')
		{
			$query ="SELECT AVG(jumlah_pengeluaran) as hasil FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK'";
		}
		else if($location=='sabah')
		{
			$query ="SELECT AVG(jumlah_pengeluaran) as hasil FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri LIKE 'SABAH'";
		}
		else if($location=='sarawak')
		{
			$query ="SELECT AVG(jumlah_pengeluaran) as hasil FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri LIKE 'SARAWAK'";
		}

		$result = mysqli_query($query) or die(mysqli_error());
		$row 	= mysqli_fetch_object($result) or die(mysqli_error());
		$hasil	= $row->hasil;
		return $hasil;
	}

	// immature cost
	function immature_cost_hectare($location)
	{
		if($location == 'malaysia')
		{
			$query_kos_belum_matang = "SELECT SUM(total_a) AS total_a, SUM(total_b_1) AS total_b_1, SUM(total_b_2) AS total_b_2, SUM(total_b_3) AS total_b_3, SUM(total_b_4) AS total_b_4, SUM(total_b) AS total_b FROM kos_belum_matang JOIN login_estate ON kos_belum_matang.lesen = login_estate.lesen JOIN esub ON kos_belum_matang.lesen = esub.no_lesen_baru WHERE login_estate.success != '%0000-00-00 00:00:00%' AND kos_belum_matang.pb_thisyear = '2010'";
		}
		else if($location=='peninsular')
		{
			$query_kos_belum_matang = "SELECT SUM(total_a) AS total_a, SUM(total_b_1) AS total_b_1, SUM(total_b_2) AS total_b_2, SUM(total_b_3) AS total_b_3, SUM(total_b_4) AS total_b_4, SUM(total_b) AS total_b FROM kos_belum_matang JOIN login_estate ON kos_belum_matang.lesen = login_estate.lesen JOIN esub ON kos_belum_matang.lesen = esub.no_lesen_baru WHERE login_estate.success != '%0000-00-00 00:00:00%' AND kos_belum_matang.pb_thisyear = '2010' AND esub.Negeri NOT LIKE '%SABAH%' AND esub.Negeri NOT LIKE '%SARAWAK%'";
		}
		else if($location=='sabah')
		{
			$query_kos_belum_matang = "SELECT SUM(total_a) AS total_a, SUM(total_b_1) AS total_b_1, SUM(total_b_2) AS total_b_2, SUM(total_b_3) AS total_b_3, SUM(total_b_4) AS total_b_4, SUM(total_b) AS total_b FROM kos_belum_matang JOIN login_estate ON kos_belum_matang.lesen = login_estate.lesen JOIN esub ON kos_belum_matang.lesen = esub.no_lesen_baru WHERE login_estate.success != '%0000-00-00 00:00:00%' AND kos_belum_matang.pb_thisyear = '2010' AND esub.Negeri LIKE '%SABAH%'";
		}
		else if($location=='sarawak')
		{
			$query_kos_belum_matang = "SELECT SUM(total_a) AS total_a, SUM(total_b_1) AS total_b_1, SUM(total_b_2) AS total_b_2, SUM(total_b_3) AS total_b_3, SUM(total_b_4) AS total_b_4, SUM(total_b) AS total_b FROM kos_belum_matang JOIN login_estate ON kos_belum_matang.lesen = login_estate.lesen JOIN esub ON kos_belum_matang.lesen = esub.no_lesen_baru WHERE login_estate.success != '%0000-00-00 00:00:00%' AND kos_belum_matang.pb_thisyear = '2010' AND esub.Negeri LIKE '%SARAWAK%'";
		}
		$result_kos_belum_matang 	= mysqli_query($query_kos_belum_matang) or die(mysqli_error());
		$row 						= mysqli_fetch_object($result_kos_belum_matang) or die(mysqli_error());
		$kos_belum_matang			= $row->total_a + $row->total_b_1 + $row->total_b_2 + $row->total_b_3 + $row->total_b_4 + $row->total_b;

		return $kos_belum_matang;
	}

	// Kos Matang Penuaian
	function matang_tuai($location)
	{
		if($location == 'malaysia')
		{
			$query_matang_tuai = "SELECT avg(total_b) AS total FROM kos_matang_penuaian JOIN login_estate ON kos_matang_penuaian.lesen = login_estate.lesen JOIN esub ON kos_matang_penuaian.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_penuaian.pb_thisyear = '2010' AND kos_matang_penuaian.status = '1'";
		}
		else if($location=='peninsular')
		{
			$query_matang_tuai = "SELECT avg(total_b) AS total FROM kos_matang_penuaian JOIN login_estate ON kos_matang_penuaian.lesen = login_estate.lesen JOIN esub ON kos_matang_penuaian.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_penuaian.pb_thisyear = '2010' AND kos_matang_penuaian.pb_thisyear = '2010' AND esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK' AND kos_matang_penuaian.status = '1'";
		}
		else if($location=='sabah')
		{
			$query_matang_tuai = "SELECT avg(total_b) AS total FROM kos_matang_penuaian JOIN login_estate ON kos_matang_penuaian.lesen = login_estate.lesen JOIN esub ON kos_matang_penuaian.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_penuaian.pb_thisyear = '2010' AND kos_matang_penuaian.pb_thisyear = '2010' AND esub.Negeri LIKE 'SABAH' AND kos_matang_penuaian.status = '1'";
		}
		else if($location=='sarawak')
		{
			$query_matang_tuai = "SELECT avg(total_b) AS total FROM kos_matang_penuaian JOIN login_estate ON kos_matang_penuaian.lesen = login_estate.lesen JOIN esub ON kos_matang_penuaian.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_penuaian.pb_thisyear = '2010' AND kos_matang_penuaian.pb_thisyear = '2010' AND esub.Negeri LIKE 'SARAWAK' AND kos_matang_penuaian.status = '1'";
		}
		$result_matang_tuai 	= mysqli_query($query_matang_tuai) or die(mysqli_error());
		$row 						= mysqli_fetch_object($result_matang_tuai) or die(mysqli_error());
		$kos_matang_tuai			= $row->total;

		return $kos_matang_tuai;
	}

	// Kos Matang Penjagaan
	function matang_jaga($location)
	{
		if($location == 'malaysia')
		{
			$query_matang_jaga = "SELECT avg(total_b) AS total FROM kos_matang_penjagaan JOIN login_estate ON kos_matang_penjagaan.lesen = login_estate.lesen JOIN esub ON kos_matang_penjagaan.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_penjagaan.pb_thisyear = '2010' AND kos_matang_penjagaan.status = '1'";
		}
		else if($location=='peninsular')
		{
			$query_matang_jaga = "SELECT avg(total_b) AS total FROM kos_matang_penjagaan JOIN login_estate ON kos_matang_penjagaan.lesen = login_estate.lesen JOIN esub ON kos_matang_penjagaan.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_penjagaan.pb_thisyear = '2010' AND kos_matang_penjagaan.pb_thisyear = '2010' AND esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK' AND kos_matang_penjagaan.status = '1'";
		}
		else if($location=='sabah')
		{
			$query_matang_jaga = "SELECT avg(total_b) AS total FROM kos_matang_penjagaan JOIN login_estate ON kos_matang_penjagaan.lesen = login_estate.lesen JOIN esub ON kos_matang_penjagaan.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_penjagaan.pb_thisyear = '2010' AND kos_matang_penjagaan.pb_thisyear = '2010' AND esub.Negeri LIKE 'SABAH' AND kos_matang_penjagaan.status = '1'";
		}
		else if($location=='sarawak')
		{
			$query_matang_jaga = "SELECT avg(total_b) AS total FROM kos_matang_penjagaan JOIN login_estate ON kos_matang_penjagaan.lesen = login_estate.lesen JOIN esub ON kos_matang_penjagaan.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_penjagaan.pb_thisyear = '2010' AND kos_matang_penjagaan.pb_thisyear = '2010' AND esub.Negeri LIKE 'SARAWAK' AND kos_matang_penjagaan.status = '1'";
		}
		$result_matang_jaga 	= mysqli_query($query_matang_jaga) or die(mysqli_error());
		$row 						= mysqli_fetch_object($result_matang_jaga) or die(mysqli_error());
		$kos_matang_jaga			= $row->total;

		return $kos_matang_jaga;
	}

	// Kos Matang Pengangkutan
	function matang_angkut($location)
	{
		if($location == 'malaysia')
		{
			$query_matang_angkut = "SELECT avg(total_b) AS total FROM kos_matang_pengangkutan JOIN login_estate ON kos_matang_pengangkutan.lesen = login_estate.lesen JOIN esub ON kos_matang_pengangkutan.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_pengangkutan.pb_thisyear = '2010' AND kos_matang_pengangkutan.status = '1'";
		}
		else if($location=='peninsular')
		{
			$query_matang_angkut = "SELECT avg(total_b) AS total FROM kos_matang_pengangkutan JOIN login_estate ON kos_matang_pengangkutan.lesen = login_estate.lesen JOIN esub ON kos_matang_pengangkutan.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_pengangkutan.pb_thisyear = '2010' AND kos_matang_pengangkutan.pb_thisyear = '2010' AND esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK' AND kos_matang_pengangkutan.status = '1'";
		}
		else if($location=='sabah')
		{
			$query_matang_angkut = "SELECT avg(total_b) AS total FROM kos_matang_pengangkutan JOIN login_estate ON kos_matang_pengangkutan.lesen = login_estate.lesen JOIN esub ON kos_matang_pengangkutan.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_pengangkutan.pb_thisyear = '2010' AND kos_matang_pengangkutan.pb_thisyear = '2010' AND esub.Negeri LIKE 'SABAH' AND kos_matang_pengangkutan.status = '1'";
		}
		else if($location=='sarawak')
		{
			$query_matang_angkut = "SELECT avg(total_b) AS total FROM kos_matang_pengangkutan JOIN login_estate ON kos_matang_pengangkutan.lesen = login_estate.lesen JOIN esub ON kos_matang_pengangkutan.lesen = esub.no_lesen_baru WHERE login_estate.success != '0000-00-00 00:00:00' AND kos_matang_pengangkutan.pb_thisyear = '2010' AND kos_matang_pengangkutan.pb_thisyear = '2010' AND esub.Negeri LIKE 'SARAWAK' AND kos_matang_pengangkutan.status = '1'";
		}
		$result_matang_angkut 	= mysqli_query($query_matang_angkut) or die(mysqli_error());
		$row 						= mysqli_fetch_object($result_matang_angkut) or die(mysqli_error());
		$kos_matang_angkut			= $row->total;

		return $kos_matang_angkut;
	}

	// Kos belum matang (tanam baru, tanam semula, tanam tukar)
	function kos_belum_matang($type, $tahun, $location)
	{
		if($location == 'malaysia')
		{
			$query	="SELECT SUM(tanam_".$type.$tahun.".tanaman_".$type.") AS tanam_".$type.", SUM(esub.Berhasil) AS luas_".$type." FROM tanam_".$type.$tahun." JOIN esub ON tanam_".$type.$tahun.".lesen = esub.No_Lesen JOIN login_estate ON tanam_".$type.$tahun.".lesen = login_estate.lesen WHERE login_estate.success != '%0000-00-00 00:00:00%'";
		}
		else if($location=='peninsular')
		{
			$query	="SELECT SUM(tanam_".$type.$tahun.".tanaman_".$type.") AS tanam_".$type.", SUM(esub.Berhasil) AS luas_".$type." FROM tanam_".$type.$tahun." JOIN esub ON tanam_".$type.$tahun.".lesen = esub.No_Lesen JOIN login_estate ON tanam_".$type.$tahun.".lesen = login_estate.lesen WHERE login_estate.success != '%0000-00-00 00:00:00%' AND esub.Negeri NOT LIKE '%SABAH%' AND esub.Negeri NOT LIKE '%SARAWAK%'";
		}
		else if($location=='sabah')
		{
			$query	="SELECT SUM(tanam_".$type.$tahun.".tanaman_".$type.") AS tanam_".$type.", SUM(esub.Berhasil) AS luas_".$type." FROM tanam_".$type.$tahun." JOIN esub ON tanam_".$type.$tahun.".lesen = esub.No_Lesen JOIN login_estate ON tanam_".$type.$tahun.".lesen = login_estate.lesen WHERE login_estate.success != '%0000-00-00 00:00:00%' AND esub.Negeri LIKE '%SABAH%'";
		}
		else if($location=='sarawak')
		{
			$query	="SELECT SUM(tanam_".$type.$tahun.".tanaman_".$type.") AS tanam_".$type.", SUM(esub.Berhasil) AS luas_".$type." FROM tanam_".$type.$tahun." JOIN esub ON tanam_".$type.$tahun.".lesen = esub.No_Lesen JOIN login_estate ON tanam_".$type.$tahun.".lesen = login_estate.lesen WHERE login_estate.success != '%0000-00-00 00:00:00%' AND esub.Negeri LIKE '%SARAWAK%'";
		}
		$result	= mysqli_query($query);
		$row	= mysqli_fetch_array($result);
		$tanam 	= $row['tanam_'.$type.''];
		return $tanam;
	}

	function kos_matang_pengangkutan($type, $tahun, $location)
	{
		if($location == 'malaysia')
		{
			$query	="SELECT SUM(tanam_".$type.$tahun.".tanaman_".$type.") AS tanam_".$type.", SUM(esub.Berhasil) AS luas_".$type." FROM tanam_".$type.$tahun.", esub WHERE tanam_".$type.$tahun.".lesen = esub.No_Lesen";
		}
		else if($location=='peninsular')
		{
			$query	="SELECT SUM(tanam_".$type.$tahun.".tanaman_".$type.") AS tanam_".$type.", SUM(esub.Berhasil) AS luas_".$type." FROM tanam_".$type.$tahun.", esub WHERE tanam_".$type.$tahun.".lesen = esub.No_Lesen AND esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK'";
		}
		else if($location=='sabah')
		{
			$query	="SELECT SUM(tanam_".$type.$tahun.".tanaman_".$type.") AS tanam_".$type.", SUM(esub.Berhasil) AS luas_".$type." FROM tanam_".$type.$tahun.", esub WHERE tanam_".$type.$tahun.".lesen = esub.No_Lesen AND esub.Negeri LIKE 'SABAH'";
		}
		else if($location=='sarawak')
		{
			$query	="SELECT SUM(tanam_".$type.$tahun.".tanaman_".$type.") AS tanam_".$type.", SUM(esub.Berhasil) AS luas_".$type." FROM tanam_".$type.$tahun.", esub WHERE tanam_".$type.$tahun.".lesen = esub.No_Lesen AND esub.Negeri LIKE 'SARAWAK'";
		}
		$result	= mysqli_query($query);
		$row	= mysqli_fetch_array($result);
		$tanam 		= $row['tanam_'.$type]/$row['luas_'.$type];
		$average	= number_format($tanam/3,3);
		return $average;
	}

	// MILL OER (mill_isirung)
	function mill_oer($location)
	{
		if($location == 'malaysia')
		{
			$query_mill_oer = "SELECT AVG(isirung) AS isirung FROM mill_isirung JOIN login_mill ON mill_isirung.lesen = login_mill.lesen JOIN ekilang ON mill_isirung.lesen = ekilang.no_lesen WHERE login_mill.success != '0000-00-00 00:00:00' AND mill_isirung.tahun = '2010'";
		}
		else if($location=='peninsular')
		{
			$query_mill_oer = "SELECT AVG(isirung) AS isirung FROM mill_isirung JOIN login_mill ON mill_isirung.lesen = login_mill.lesen JOIN ekilang ON mill_isirung.lesen = ekilang.no_lesen WHERE login_mill.success != '0000-00-00 00:00:00' AND mill_isirung.tahun = '2010' AND ekilang.negeri NOT LIKE '%SABAH%' AND ekilang.negeri NOT LIKE '%SARAWAK%'";
		}
		else if($location=='sabah')
		{
			$query_mill_oer = "SELECT AVG(isirung) AS isirung FROM mill_isirung JOIN login_mill ON mill_isirung.lesen = login_mill.lesen JOIN ekilang ON mill_isirung.lesen = ekilang.no_lesen WHERE login_mill.success != '0000-00-00 00:00:00' AND mill_isirung.tahun = '2010' AND ekilang.negeri LIKE '%SABAH%'";
		}
		else if($location=='sarawak')
		{
			$query_mill_oer = "SELECT AVG(isirung) AS isirung FROM mill_isirung JOIN login_mill ON mill_isirung.lesen = login_mill.lesen JOIN ekilang ON mill_isirung.lesen = ekilang.no_lesen WHERE login_mill.success != '0000-00-00 00:00:00' AND mill_isirung.tahun = '2010' AND ekilang.negeri LIKE '%SARAWAK%'";
		}
		$result_mill_oer 	= mysqli_query($query_mill_oer) or die(mysqli_error());
		$row 				= mysqli_fetch_object($result_mill_oer) or die(mysqli_error());
		$mill_oer			= number_format($row->isirung,2);

		return $mill_oer;
	}

	// MILL CPO (ekilang)
	function mill_cpo($location)
	{
		if($location == 'malaysia')
		{
			$query_mill_cpo = "SELECT AVG(pengeluaran_cpo) AS cpo FROM ekilang JOIN login_mill ON ekilang.no_lesen = login_mill.lesen WHERE login_mill.success != '0000-00-00 00:00:00'";
		}
		else if($location=='peninsular')
		{
			$query_mill_cpo = "SELECT AVG(pengeluaran_cpo) AS cpo FROM ekilang JOIN login_mill ON ekilang.no_lesen = login_mill.lesen WHERE login_mill.success != '0000-00-00 00:00:00' AND ekilang.negeri NOT LIKE '%SABAH%' AND ekilang.negeri NOT LIKE '%SARAWAK%'";
		}
		else if($location=='sabah')
		{
			$query_mill_cpo = "SELECT AVG(pengeluaran_cpo) AS cpo FROM ekilang JOIN login_mill ON ekilang.no_lesen = login_mill.lesen WHERE login_mill.success != '0000-00-00 00:00:00' AND ekilang.negeri LIKE '%SABAH%'";
		}
		else if($location=='sarawak')
		{
			$query_mill_cpo = "SELECT AVG(pengeluaran_cpo) AS cpo FROM ekilang JOIN login_mill ON ekilang.no_lesen = login_mill.lesen WHERE login_mill.success != '0000-00-00 00:00:00' AND ekilang.negeri LIKE '%SARAWAK%'";
		}
		$result_mill_cpo 	= mysqli_query($query_mill_cpo) or die(mysqli_error());
		$row 				= mysqli_fetch_object($result_mill_cpo) or die(mysqli_error());
		$mill_cpo			= $row->cpo;

		return $mill_cpo;
	}

	// MILL Processing Cost (ekilang)
	function mill_pk($location)
	{
		if($location == 'malaysia')
		{
			$query_mill_pk = "SELECT AVG(pengeluaran_pk) AS pk FROM ekilang JOIN login_mill ON ekilang.no_lesen = login_mill.lesen WHERE login_mill.success != '0000-00-00 00:00:00'";
		}
		else if($location=='peninsular')
		{
			$query_mill_pk = "SELECT AVG(pengeluaran_pk) AS pk FROM ekilang JOIN login_mill ON ekilang.no_lesen = login_mill.lesen WHERE login_mill.success != '0000-00-00 00:00:00' AND ekilang.negeri NOT LIKE '%SABAH%' AND ekilang.negeri NOT LIKE '%SARAWAK%'";
		}
		else if($location=='sabah')
		{
			$query_mill_pk = "SELECT AVG(pengeluaran_pk) AS pk FROM ekilang JOIN login_mill ON ekilang.no_lesen = login_mill.lesen WHERE login_mill.success != '0000-00-00 00:00:00' AND ekilang.negeri LIKE '%SABAH%'";
		}
		else if($location=='sarawak')
		{
			$query_mill_pk = "SELECT AVG(pengeluaran_pk) AS pk FROM ekilang JOIN login_mill ON ekilang.no_lesen = login_mill.lesen WHERE login_mill.success != '0000-00-00 00:00:00' AND ekilang.negeri LIKE '%SARAWAK%'";
		}
		$result_mill_pk 	= mysqli_query($query_mill_pk) or die(mysqli_error());
		$row 				= mysqli_fetch_object($result_mill_pk) or die(mysqli_error());
		$mill_pk			= $row->pk;

		return $mill_pk;
	}
}
?>
