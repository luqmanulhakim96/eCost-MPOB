<?php
require_once('../Connections/connection.class.php');
extract($_REQUEST);
$con = connect();

		$q="delete  from login_mill where lesen ='$no_lesen'";
		$r=mysqli_query($con, $q);

		$q="delete  from ekilang where no_lesen ='$no_lesen'";
		$r=mysqli_query($con, $q);

		$q="delete  from alamat_ekilang where no_lesen ='$no_lesen'";
		$r=mysqli_query($con, $q);

		echo "<script>window.location.href=\"home.php?id=config&sub=esub_mill\"</script>";

?>
