<?php
class Period
{
	function  __construct($var)
	{
		$con = connect();

		$q ="select * from period_survey where st_id ='$var'";
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$this->total = $res_total;
		$row=mysqli_fetch_array($r);
			$this->st_id=$row['st_id'];
			$this->st_status=$row['st_status'];
			$this->st_date=$row['st_date'];
	}
}

?>
