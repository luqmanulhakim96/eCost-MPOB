<?php
class Period 
{
	function Period($var)
	{
		$con = connect();
		
		$q ="select * from period_survey where st_id ='$var'";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$this->total = $res_total; 
		$row=mysql_fetch_array($r);
			$this->st_id=$row['st_id'];
			$this->st_status=$row['st_status'];
			$this->st_date=$row['st_date'];
	}
}

?>