<?php
class luas 
{
	function __construct()
	{
		$host = "localhost";
		$user = "root";
		//$pass = "";
		$pass = "root";
		$db_n = "ecost_db";
		
		mysql_connect($host,$user,$pass) or die(mysql_error());
		mysql_select_db($db_n) or die(mysql_error());
	}
	
	function kiraluas($var)
	{
		$q="select * from estate_info where lesen ='$var'";
		$row=mysql_fetch_array($q);
		
		$jumlahall=$this->lanar=$row['lanar']+$this->pedalaman=$row['pedalaman']+$this->gambutcetek=$row['gambutcetek']+$this->gambutdalam=$row['gambutdalam']+$this->laterit=$row['laterit']+$this->asidsulfat=$row['asidsulfat']+$this->tanahpasir=$row['tanahpasir'];
		return $jumlahall;
	}
	
	function totalluas($location)
	{
		if($location == 'malaysia')
		{
			$q = "SELECT SUM(keluasan_yang_dituai) as luas FROM esub JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen WHERE login_estate.success != '%0000-00-00 00:00:00%'";
		}
		else if($location=='peninsular')
		{
			$q = "SELECT SUM(keluasan_yang_dituai) as luas FROM esub JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen WHERE login_estate.success != '%0000-00-00 00:00:00%' AND esub.Negeri NOT LIKE '%SABAH%' AND esub.Negeri NOT LIKE '%SARAWAK%'";
		}
		else if($location=='sabah')
		{
			$q = "SELECT SUM(keluasan_yang_dituai) as luas FROM esub JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen WHERE login_estate.success != '%0000-00-00 00:00:00%' AND esub.Negeri LIKE '%SABAH%'";
		}
		else if($location=='sarawak')
		{
			$q = "SELECT SUM(keluasan_yang_dituai) as luas FROM esub JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen WHERE login_estate.success != '%0000-00-00 00:00:00%' AND esub.Negeri LIKE '%SARAWAK%'";
		}
		$result = mysql_query($q);
		$row=mysql_fetch_array($result);
		
		$jumlahall=$row['luas'];
		return $jumlahall;
	}
	
	function purata_hasil()
	{
		$q="SELECT AVG(purata_hasil_buah) AS purata FROM fbb_production2009";
		$result = mysql_query($q);
		$row=mysql_fetch_array($result);
		
		$purata	= $row['purata'];
		return $purata;
	}
}
?>