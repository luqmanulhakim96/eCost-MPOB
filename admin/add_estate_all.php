<?php include('../Connections/connection.class.php');?>
<?php extract($_REQUEST);?>


<script src="../js/live/livevalidation_standalone.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../js/live/consolidated_common.css">

<script type="text/javascript" src="../jquery-1.3.2.js"></script>
<script type="text/javascript" src="../js/jquery.maskedinput-1.2.2.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
					$("#nolesen").mask("999999-999999");
		});</script>


<style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><title>Add New Estate</title>
<form id="form1" name="form1" method="post" action="">
  <table width="1000">
    <tr>
      <td colspan="3"><em><strong>
      <?php if($jenis==""){?>
      For new registration estate, please insert license no (new number).
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
      <td>Estate Name</td>
      <td>:</td>
      <td><input name="nama_estate" type="text" id="nama_estate" size="40" style="text-transform:uppercase" />
        <script language="javascript">
      		var nama_estate = new LiveValidation('nama_estate');
			nama_estate.add( Validate.Presence );
      </script>
      </td>
    </tr>
    <tr>
      <td width="158">New License No. </td>
      <td width="10">:</td>
      <td width="816"><input name="nolesen" type="text" id="nolesen" size="40" />

        <script language="javascript">
      		var no_lesen_baru = new LiveValidation('nolesen');
			no_lesen_baru.add( Validate.Presence );
      </script>      <input name="lesen_lama" type="hidden" id="lesen_lama" value="<?php  echo $lesen_lama; ?>" /></td>
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
		$table = "esub";
	}else{
		$table = "esub_".$_COOKIE['tahun_report'];
	}

	$tahunEsub = $_COOKIE['tahun_report'];
}

if(isset($simpan)){


		$qselect ="select * from $table where no_lesen_baru ='$nolesen'";
		$rselect = mysqli_query($con, $qselect);
		$totalselect = mysqli_num_rows($rselect);

		if($totalselect == 0){

			$qadd ="insert into $table (no_lesen_baru, nama_estet, no_lesen) values('$nolesen', ucase('$nama_estate'), '0')";
			$radd = mysqli_query($con, $qadd);
			// "<br>";
		 	$qadd1 ="insert into login_estate (lesen, password, firsttime) values('$nolesen','ecost$tahunEsub', '1')";
			$radd1 = mysqli_query($con, $qadd1);
			// "<br>";
			echo "<script>window.location.href='view_estate_all.php?nolesen=$nolesen';</script>";
		}

		if($totalselect>0){
		 echo "<script>alert('Data already exist!! Please add other license no.');window.close();</script>";
		}
}


if(isset($kemaskini)){
		$con = connect();
		$nl = substr($nolesen,0,-1);
		$nlama = substr($lesen_lama,0,-1);

		$qupdate ="update  fbb_production set lesen = '$nl' where lesen ='$nlama' ";
		$rupdate = mysqli_query($con, $qupdate);

		 $qupdate ="update  age_profile set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  belanja_am_kos set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  belanja_am_var set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  buruh set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  buruh_status set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  age_profile where lesen ='$nolesen' and tahun = '$tahun' ";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		 $qupdate ="update  estate_info set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  estate_jentera set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  esub  set no_lesen_baru = '$nolesen' where no_lesen_baru ='$lesen_lama' ";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		 $qupdate ="update  kos_belum_matang set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  kos_matang_pengangkutan set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  kos_matang_penjagaan set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  kos_matang_penuaian set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  login_estate set lesen = '$nolesen' where lesen ='$lesen_lama' ";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		 $qupdate ="update  ringkasan_kos_am set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		  $qupdate ="update  warga_estate set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate = mysqli_query($con, $qupdate);
// "<br>";

		function kemaskini($table,$nolesen,$lesen_lama){
		$con =connect();
		// $table;
		echo $qupdate3 ="update $table set lesen = '$nolesen' where lesen ='$lesen_lama'";
		$rupdate3 = mysqli_query($con, $qupdate3);

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

		echo "<script>window.location.href='view_estate_all.php?nolesen=$nolesen';</script>";
}
 ?>
