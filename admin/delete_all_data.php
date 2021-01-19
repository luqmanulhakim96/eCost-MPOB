<?php include('../Connections/connection.class.php');?>
<?php extract($_REQUEST);

$con = connect();

if(isset($_COOKIE['tahun_report'])){
	if(date('Y') == $_COOKIE['tahun_report']){
		$table_esub = "esub";
	}else{
		$table_esub = "esub_".$_COOKIE['tahun_report'];
	}
	
	$tahunEsub = $_COOKIE['tahun_report'];
}

		$qdelete ="delete from age_profile where lesen ='$nolesen' and tahun = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from belanja_am_kos where lesen ='$nolesen' and thisyear = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from belanja_am_var where lesen ='$nolesen' and thisyear = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from buruh where lesen ='$nolesen' and tahun = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from buruh_status where lesen ='$nolesen' and tahun = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from age_profile where lesen ='$nolesen' and tahun = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from estate_info where lesen ='$nolesen'";
		$rdelete = mysql_query($qdelete, $con);
		
		$qdelete ="delete from estate_jentera where lesen ='$nolesen' and tahun = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);
		
		$qdelete ="delete from $table_esub where no_lesen_baru ='$nolesen' ";
		$rdelete = mysql_query($qdelete, $con);
		
		$qdelete ="delete from kos_belum_matang where lesen ='$nolesen' and pb_thisyear = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from kos_matang_pengangkutan where lesen ='$nolesen' and pb_thisyear = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from kos_matang_penjagaan where lesen ='$nolesen' and pb_thisyear = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from kos_matang_penuaian where lesen ='$nolesen' and pb_thisyear = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from login_estate where lesen ='$nolesen' ";
		$rdelete = mysql_query($qdelete, $con);
		
		$qdelete ="delete from ringkasan_kos_am where no_lesen ='$nolesen' and tahun = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);

		$qdelete ="delete from warga_estate where lesen ='$nolesen' and tahun = '$tahun'";
		$rdelete = mysql_query($qdelete, $con);




$url = $_SERVER['HTTP_REFERER'];
echo "<script>window.location.href='$url'</script>";


?>
