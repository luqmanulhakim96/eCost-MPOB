<?php //inclclude('../Connections/connection.class.php');
	function viewglobal($var)
	{
		$con = connect();
		$q ="select * from global_variables where value ='".$var."'";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$row=mysql_fetch_array($r); 
		
		$data[0] = $row['value'];
		$data[1] = $row['description'];
		return $data;	
			
	}
?>