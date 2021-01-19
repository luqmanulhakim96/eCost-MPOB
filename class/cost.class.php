<?php 
class cost
{
	function __construct()
	{
		$host = "localhost";
		$user = "root";
		$pass = "root";
		$db_n = "ecost_db";
		
		mysql_connect($host,$user,$pass) or die(mysql_error());
		mysql_select_db($db_n) or die(mysql_error());
	}
	
	// Function for tanam baru (new planting)
	function tanambaru($database, $location)
	{
		if($location == 'malaysia')
		{
			$query ="SELECT SUM($database.tanaman_baru) AS tanam_baru, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00'";
		}
		else if($location=='peninsular')
		{
			$query ="SELECT SUM($database.tanaman_baru) AS tanam_baru, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK'";
		}
		else if($location=='sabah')
		{
			$query ="SELECT SUM($database.tanaman_baru) AS tanam_baru, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri LIKE 'SABAH'";
		}
		else if($location=='sarawak')
		{
			$query ="SELECT SUM($database.tanaman_baru) AS tanam_baru, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri LIKE 'SARAWAK'";
		}
		
		$result = mysql_query($query) or die(mysql_error());
		$row 	= mysql_fetch_object($result) or die(mysql_error());
		$total	= number_format($row->tanam_baru/$row->luas,3);
		return $total;
	}
	
	// Function for tanam semula (replanting)
	function tanamsemula($database, $location)
	{			
		if($location == 'malaysia')
		{
			$query ="SELECT SUM($database.tanaman_semula) AS tanam_semula, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00'";
		}
		else if($location=='peninsular')
		{
			$query ="SELECT SUM($database.tanaman_semula) AS tanam_semula, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK'";
		}
		else if($location=='sabah')
		{
			$query ="SELECT SUM($database.tanaman_semula) AS tanam_semula, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri LIKE 'SABAH'";
		}
		else if($location=='sarawak')
		{
			$query ="SELECT SUM($database.tanaman_semula) AS tanam_semula, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri LIKE 'SARAWAK'";
		}
		
		$result = mysql_query($query) or die(mysql_error());
		$row 	= mysql_fetch_object($result) or die(mysql_error());
		$total	= number_format($row->tanam_semula/$row->luas,3);
		return $total;
	}
	
	// Function for tanam tukar (conversion)
	function tanamtukar($database, $location)
	{
		if($location == 'malaysia')
		{
			$query ="SELECT SUM($database.tanaman_tukar) AS tanam_tukar, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00'";
		}
		else if($location=='peninsular')
		{
			$query ="SELECT SUM($database.tanaman_tukar) AS tanam_tukar, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK'";
		}
		else if($location=='sabah')
		{
			$query ="SELECT SUM($database.tanaman_tukar) AS tanam_tukar, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri LIKE 'SABAH'";
		}
		else if($location=='sarawak')
		{
			$query ="SELECT SUM($database.tanaman_tukar) AS tanam_tukar, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri LIKE 'SARAWAK'";
		}
		
		$result = mysql_query($query) or die(mysql_error());
		$row 	= mysql_fetch_object($result) or die(mysql_error());
		$total	= number_format($row->tanam_tukar/$row->luas,3);
		return $total;
	}
	
	// mature cost
	function mature_cost()
	{
		$query = "SELECT SUM($database.tanaman_tukar) AS tanam_tukar, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri LIKE 'SARAWAK'";
		$result = mysql_query($query) or die(mysql_error());
		$row 	= mysql_fetch_object($result) or die(mysql_error());
		$total	= number_format($row->tanam_tukar/$row->luas,3);
		return $total;
	}
}
?>