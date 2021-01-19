<?php
/*
 * name: Labour Class
 * @param
 * @return
 */
class labour
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
	
	function percent($num_amount, $num_total) 
	{
		$count1 	= $num_amount / $num_total;
		$count2 	= $count1 * 100;
		$count 		= number_format($count2, 2);
		return $count;
	}
	
	function GCD($a, $b)
	{
		while ( $b != 0)
		{
			$remainder = $a % $b;
			$a = $b;
			$b = $remainder;
		}
	return abs($a);
	}
	
	function total($type, $year)
	{	
		if(isset($_GET['state'])) {
			$state = $_GET['state'];
			if($state == 'my')
			{
				$query = "SELECT SUM($type) AS total FROM buruh JOIN esub ON buruh.lesen = esub.no_lesen_baru WHERE buruh.tahun = '$year'";
			}
			else if($state == 'pm')
			{
				$query = "SELECT SUM($type) AS total FROM buruh JOIN esub ON buruh.lesen = esub.no_lesen_baru WHERE buruh.tahun = '$year' AND esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK'";
			}
			else
			{
				$query = "SELECT SUM($type) AS total FROM buruh JOIN esub ON buruh.lesen = esub.no_lesen_baru WHERE buruh.tahun = '$year' AND esub.Negeri LIKE '%$state%'";
			}
		}
		
		else if(isset($_GET['district'])) {
			$district = $_GET['district'];
			$query = "SELECT SUM($type) AS total FROM buruh JOIN esub ON buruh.lesen = esub.no_lesen_baru WHERE buruh.tahun = '$year' AND esub.Bandar LIKE '%$district%'";
		}
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_object($result);
		return $row->total;
	}
	
	function manpower($state, $year, $category) {
		if($state == 'pm') {
			$query = "SELECT SUM($category) AS total FROM buruh JOIN esub ON buruh.lesen = esub.no_lesen_baru WHERE esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK'";
		}
		else {
			$query = "SELECT SUM($category) AS total FROM buruh JOIN esub ON buruh.lesen = esub.no_lesen_baru WHERE buruh.tahun = '$year' AND esub.Negeri LIKE '%$state%'";
		}
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_object($result);
		return $row->total;
	}
}
?>