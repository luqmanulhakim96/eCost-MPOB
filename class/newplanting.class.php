<?php
/*
 * name: Newplanting Class
 * @param
 * @return
 */
class newplanting
{

	function __construct()
	{
		$host = "localhost";
		$user = "ecost";
		$pass = "ecost2021";
		$db_n = "ecost2021";

		mysqli_connect($host,$user,$pass) or die(mysqli_error());
		mysqli_select_db($db_n) or die(mysqli_error());
	}

	// Function for tanam baru (new planting)
	function totalcost($year, $type, $location)
	{

		$thisyear = date('Y');

		if($location = 'malaysia')
		{
			$query = "SELECT SUM(kos_belum_matang.total_a) AS a, SUM(kos_belum_matang.total_b) AS b, COUNT(kos_belum_matang.lesen) AS estate, SUM(a_1) AS a_1, SUM(a_2) AS a_2, SUM(a_3) AS a_3, SUM(a_4) AS a_4, SUM(a_5) AS a_5, SUM(a_6) AS a_6, SUM(a_7) AS a_7, SUM(a_8) AS a_8, SUM(a_9) AS a_9, SUM(a_10) AS a_10, SUM(a_11) AS a_11, SUM(a_12) AS a_12, SUM(a_13) AS a_13 FROM `kos_belum_matang` JOIN login_estate ON kos_belum_matang.lesen = login_estate.lesen WHERE login_estate.success != '0000-00-00 00:00:00' AND `pb_tahun` = '$year' AND `pb_thisyear` = '$thisyear' AND `pb_type` = '$type'";
		}

		$result 	= mysqli_query($query) or die(mysqli_error());

		$row 		= mysqli_fetch_object($result);

		$average 	= ($row->a+$row->b)/$row->estate;
		$row->average = number_format($average,2);
		return $row;
	}
}
?>
