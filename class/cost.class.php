<?php
class cost
{
	function __construct()
	{
		// $host = "localhost";
		// $user = "root";
		// $pass = "root";
		// $db_n = "ecost_db";

		$host = "localhost";
		$user = "ecost";
		$pass = "ecost2021";
		$db_n = "ecost2021";

		mysqli_connect($host,$user,$pass) or die(mysqli_error());
		mysqli_select_db($db_n) or die(mysqli_error());
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

		$result = mysqli_query($query) or die(mysqli_error());
		$row 	= mysqli_fetch_object($result) or die(mysqli_error());
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

		$result = mysqli_query($query) or die(mysqli_error());
		$row 	= mysqli_fetch_object($result) or die(mysqli_error());
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

		$result = mysqli_query($query) or die(mysqli_error());
		$row 	= mysqli_fetch_object($result) or die(mysqli_error());
		$total	= number_format($row->tanam_tukar/$row->luas,3);
		return $total;
	}

	// mature cost
	function mature_cost()
	{
		$query = "SELECT SUM($database.tanaman_tukar) AS tanam_tukar, SUM(esub.Berhasil) AS luas FROM $database JOIN login_estate ON $database.lesen = login_estate.lesen JOIN esub ON $database.lesen = esub.no_lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND esub.Negeri LIKE 'SARAWAK'";
		$result = mysqli_query($query) or die(mysqli_error());
		$row 	= mysqli_fetch_object($result) or die(mysqli_error());
		$total	= number_format($row->tanam_tukar/$row->luas,3);
		return $total;
	}
}
?>
