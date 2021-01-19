<?php include('../Connections/connection.class.php');?>
<?php extract($_REQUEST);?>


<script src="../js/live/livevalidation_standalone.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../js/live/consolidated_common.css">

<script type="text/javascript" src="../jquery-1.3.2.js"></script>
<script type="text/javascript" src="../js/jquery.maskedinput-1.2.2.js"></script>

<style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><title>Add New Mill</title>
<form id="form1" name="form1" method="post" action="">
  <table width="1000">
    <tr>
      <td colspan="3"><em><strong>
      <?php if($jenis==""){?>
      For new registration mill, please insert license no (new number).
      <?php } ?>
      
      
      <?php if($jenis=="edit"){?>
      For update new license no please add the no into the box below.
      <?php } ?>
      
      
      </strong></em></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Mill Name</td>
      <td>:</td>
      <td><input name="nama_kilang" type="text" id="nama_kilang" size="40" style="text-transform:uppercase" />
        <script language="javascript">
      		var nama_kilang = new LiveValidation('nama_kilang');
			nama_kilang.add( Validate.Presence );
      </script>  
      </td>
    </tr>
    <tr>
      <td width="158">New License No. </td>
      <td width="10">:</td>
      <td width="816"><input name="nolesen" type="text" id="nolesen" size="40" />
      
        <script language="javascript">
      		var no_lesen = new LiveValidation('nolesen');
			no_lesen.add( Validate.Presence );
      </script>      <input name="lesen_lama" type="hidden" id="lesen_lama" value="<?php  echo $lesen_lama; ?>" />
      <input name="tahun" type="hidden" id="tahun" value="<?php  echo $tahun; ?>" />
      
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
      <?php if($jenis==""){?>
      <input type="submit" name="simpan" id="simpan" value="Save Data" onclick="return confirm('Add this new data?');" />
      <?php } ?>
      
      <?php if($jenis=="edit"){?>
      <input type="submit" name="kemaskini" id="kemaskini" value="Update Data" />
      <?php } ?>
      
      <input type="button" name="button2" id="button2" value="Close"  onclick="window.close();top.opener.window.location.reload()"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<?php

$con = connect();

if(isset($_COOKIE['tahun_report'])){
	if(date('Y') == $_COOKIE['tahun_report']){
		$table = "ekilang";
	}else{
		$table = "ekilang".$_COOKIE['tahun_report'];
	}
	
	$tahunEkilang = $_COOKIE['tahun_report'];
}

if(isset($simpan)){
		
		
		$qselect ="select * from $table where no_lesen ='$nolesen'";
		$rselect = mysql_query($qselect,$con);
		$totalselect = mysql_num_rows($rselect);
		
		if($totalselect == 0){
		$tahun = $tahun-1; 
		for($y=1; $y<=12; $y++){
		
			 $qadd ="insert into $table (no_lesen, nama_kilang, bulan, tahun) values('$nolesen', ucase('$nama_kilang'), '$y', $tahun)";
			 		 //echo $qadd."<br>";

			$radd = mysql_query($qadd, $con);
			}//loop 12month
			// "<br>";
		 	$qadd1 ="insert into login_mill (lesen, password, firsttime) values('$nolesen','ecost$tahunEkilang', '1')";
			$radd1 = mysql_query($qadd1, $con);
			// "<br>";
				$tahun = $tahun+1; 
			echo "<script>window.location.href='view_mill_all.php?nolesen=$nolesen&tahun=$tahun';</script>";
		}
		
		if($totalselect>0){
		 echo "<script>alert('Data already exist!! Please add other license no.');window.close();</script>";
		}	
}


if(isset($kemaskini)){
		$con = connect();
		$nl = substr($nolesen,0,-1);
		$nlama = substr($lesen_lama,0,-1);
		//******
		$qupdate ="update  fbb_production set lesen = '$nl' where lesen ='$nlama' ";
		$rupdate = mysql_query($qupdate, $con);
		
		 $qupdate ="update  age_profile set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		  $qupdate ="update  belanja_am_kos set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		  $qupdate ="update  belanja_am_var set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		  $qupdate ="update  buruh set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		  $qupdate ="update  buruh_status set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		  $qupdate ="update  age_profile where lesen ='$nolesen' and tahun = '$tahun' ";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		 $qupdate ="update  estate_info set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";
		
		  $qupdate ="update  estate_jentera set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";
		
		  $qupdate ="update  esub  set no_lesen_baru = '$nolesen' where no_lesen_baru ='$lesen_lama' ";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";
		
		 $qupdate ="update  kos_belum_matang set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		  $qupdate ="update  kos_matang_pengangkutan set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		  $qupdate ="update  kos_matang_penjagaan set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		  $qupdate ="update  kos_matang_penuaian set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		  $qupdate ="update  login_estate set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";
		
		 $qupdate ="update  ringkasan_kos_am set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";

		  $qupdate ="update  warga_estate set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysql_query($qupdate, $con);
// "<br>";		
		
		function kemaskini($table,$nolesen,$lesen_lama){
		$con = connect();
		// $table; 
		$qupdate3 ="update $table set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate3 = mysql_query($qupdate3, $con);
		
		echo "<br>";
		}
		
			$tahun = $_SESSION['tahun'];
			
			$pertama = $tahun-3;
			$kedua = $tahun-2;
			$ketiga = $tahun-1; 
			
			$pertama = substr($pertama,-2);
			$kedua = substr($kedua,-2);
			$ketiga = substr($ketiga,-2);
		//echo "tanam_tukar$pertama";
		
		kemaskini("tanam_tukar$pertama",$nolesen,$lesen_lama);
		kemaskini("tanam_tukar$kedua",$nolesen,$lesen_lama);
		kemaskini("tanam_tukar$kedua",$nolesen,$lesen_lama);
		
		kemaskini("tanam_baru$pertama",$nolesen,$lesen_lama);
		kemaskini("tanam_baru$kedua",$nolesen,$lesen_lama);
		kemaskini("tanam_baru$kedua",$nolesen,$lesen_lama);
		
		kemaskini("tanam_semula$pertama",$nolesen,$lesen_lama);
		kemaskini("tanam_semula$kedua",$nolesen,$lesen_lama);
		kemaskini("tanam_semula$kedua",$nolesen,$lesen_lama);
		
		echo "<script>window.location.href='view_mill_all.php?nolesen=$nolesen&tahun=$tahun';</script>";
}
 ?>
