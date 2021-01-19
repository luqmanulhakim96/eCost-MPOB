<?php 
class responsemill
{
	function totalresponse($var)
	{
		//total semua response mill survey yang complete (submitted to mpob) 0=not complete, 1=sah, 2=sementara
		$con = connect();
		$q = "SELECT count(ekilang.no_lesen) AS jumlah FROM ekilang";
		$q .= " FULL JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
		$q .= " FULL JOIN mill_buruh ON ekilang.no_lesen = mill_buruh.lesen";
		$q .= " FULL JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen";
		$q .= " FULL JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen";
		$q .= " WHERE mill_buruh.tahun = $var";
		$q .= " AND mill_kos_lain.tahun = $var";
		$q .= " AND mill_pemprosesan.tahun = $var";
		$r=mysql_query($q,$con);
		$row = mysql_fetch_array($r);
		$jumlah = $row['jumlah'];
		return $jumlah;	
	}
	
	function totalresponse_sementara($var)
	{
		//total semua response mill survey yang imcomplete (submitted to mpob) 0=not complete, 1=sah, 2=sementara
		$con = connect();
		$q="SELECT count(lesen) AS jumlah FROM mill_buruh WHERE status = '2' AND tahun = $var";
		$r=mysql_query($q,$con);
		$row = mysql_fetch_array($r);
		$jumlah = $row['jumlah'];
		return $jumlah;	
	}
	
	function totalall($var, $year)
	{
		//total all response mill
		$con = connect();
		if($var == 'all' && $year = date('Y'))
		{
			$q = "SELECT COUNT(mill_info.lesen) AS jumlah, ekilang.negeri AS negeri FROM ekilang";
$q .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
$q .= " LEFT JOIN mill_buruh ON ekilang.no_lesen = mill_buruh.lesen";
$q .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen";
$q .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen";
$q .= " WHERE mill_buruh.tahun = $year";
$q .= " AND mill_kos_lain.tahun = $year";
$q .= " AND mill_pemprosesan.tahun = $year";
$q .= " GROUP BY mill_info.lesen";
		}
		else if($var == 'peninsular' && $year = date('Y'))
		{
			$q = "SELECT COUNT(mill_info.lesen) AS jumlah, ekilang.negeri AS negeri FROM ekilang";
			$q .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
			$q .= " LEFT JOIN mill_buruh ON ekilang.no_lesen = mill_buruh.lesen";
			$q .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen";
			$q .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen";
			$q .= " WHERE mill_buruh.tahun = $year";
			$q .= " AND mill_kos_lain.tahun = $year";
			$q .= " AND mill_pemprosesan.tahun = $year";
			$q .= " AND ekilang.negeri NOT LIKE '%SARAWAK%'";
			$q .= " AND ekilang.negeri NOT LIKE '%SABAH%'";
			$q .= " GROUP BY mill_info.lesen";

			/*
			SELECT COUNT(mill_info.lesen) AS jumlah, ekilang.negeri AS negeri FROM ekilang
			LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen
			LEFT JOIN mill_buruh ON ekilang.no_lesen = mill_buruh.lesen
			LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen
			LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen
			WHERE mill_buruh.tahun = 2010
			AND mill_kos_lain.tahun = 2010
			AND mill_pemprosesan.tahun = 2010
			AND ekilang.negeri NOT LIKE '%SARAWAK%'
			AND ekilang.negeri NOT LIKE '%SABAH%'
			GROUP BY mill_info.lesen
			*/

		}
		else if($var == 'sabah' && $year = date('Y'))
		{
			$q="SELECT COUNT(mill_info.lesen) AS jumlah, ekilang.negeri AS negeri FROM ekilang";
$q .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
$q .= " LEFT JOIN mill_buruh ON ekilang.no_lesen = mill_buruh.lesen";
$q .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen";
$q .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen";
$q .= " WHERE mill_buruh.tahun = $year";
$q .= " AND mill_kos_lain.tahun = $year";
$q .= " AND mill_pemprosesan.tahun = $year";
$q .= " AND ekilang.negeri LIKE '%SABAH%'";
$q .= " GROUP BY mill_info.lesen";
		}
		else if($var == 'sarawak' && $year = date('Y'))
		{
			$q="SELECT COUNT(mill_info.lesen) AS jumlah, ekilang.negeri AS negeri FROM ekilang";
$q .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
$q .= " LEFT JOIN mill_buruh ON ekilang.no_lesen = mill_buruh.lesen";
$q .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen";
$q .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen";
$q .= " WHERE mill_buruh.tahun = $year";
$q .= " AND mill_kos_lain.tahun = $year";
$q .= " AND mill_pemprosesan.tahun = $year";
$q .= " AND ekilang.negeri LIKE '%SARAWAK%'";
$q .= " GROUP BY mill_info.lesen";
		}
		$r=mysql_query($q,$con);
		$row = mysql_fetch_array($r);
		$jumlah = $row['jumlah'];
		return $jumlah;
		
	}
	function totalresponsekawasan($var,$tahun)
	{//total all response kawasan estate
		$con = connect();
		if($var=='peninsular')
		{
			$sqladd = "(ekilang.negeri not like '%SABAH%' and ekilang.negeri not like '%SARAWAK%')";
		}
		else if($var=='sabah')
		{
			$sqladd = "(ekilang.negeri like '%SABAH%')";
		}
		else if($var=='sarawak')
		{
			$sqladd = "(ekilang.negeri like '%SARAWAK%')";
		}
			$q = "SELECT count(mill_info.lesen) AS jumlah FROM mill_info";
			$q .= " INNER JOIN ekilang ON mill_info.lesen = ekilang.no_lesen";
			$q .= " INNER JOIN mill_buruh ON mill_info.lesen = mill_buruh.lesen";
			$q .= " INNER JOIN mill_kos_lain ON mill_info.lesen = mill_kos_lain.lesen";
			$q .= " INNER JOIN mill_pemprosesan ON mill_info.lesen = mill_pemprosesan.lesen";
			$q .= " WHERE mill_buruh.tahun = $var";
			$q .= " AND mill_kos_lain.tahun = $var";
			$q .= " AND mill_pemprosesan.tahun = $var";
			$q .= " AND $sqladd";
			$r=mysql_query($q,$con); 
			$row = mysql_fetch_array($r);
			$jumlah = mysql_num_rows($r);
			return $jumlah;
	}
	
	
	function outliers($var,$tahun)
	{
	$jumlah=0;
	return jumlah;
	}

}
?>
