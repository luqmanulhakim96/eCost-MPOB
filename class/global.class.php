<?php //inclclude('../Connections/connection.class.php');
	function viewglobal($var)
	{
		$con = connect();
		$q ="select * from global_variables where value ='".$var."'";
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$row=mysqli_fetch_array($r);

		$data[0] = $row['value'];
		$data[1] = $row['description'];
		return $data;

	}
?>
