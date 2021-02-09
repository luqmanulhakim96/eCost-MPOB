<?php
/*include('../Connections/connection.class.php');
$tahun='2010';*/
/*header("Content-type: application");
header("Content-Disposition: attachment; filename=excel_data_mill_$tahun.xls");*/


include("baju.php");
$con = connect();
extract($_REQUEST);
?>
<h2>Analysis Data Survey Mill for <?php echo $tahun;?></h2>

<style>
body {
	font-family:Tahoma ;
	font-size: 12px;

}td,th {
	font-size: 12px;
}

</style>


<?php

			$type = explode("_", $sub);
			$qt1="select * from analysis where type='".$type[1]."' and year = '$tahun'";
			$rt1=mysqli_query($con, $qt1);
			$total = mysqli_num_rows($rt1);

			if($total ==0)
			{
					$qa="INSERT INTO `analysis` (`type` ,`year` ,`modifiedby` ,`modified`)VALUES ('".$type[1]."', '$tahun', '".$_SESSION['email']."',NOW()) ";
					$ra=mysqli_query($con, $qa);
			}
			if($total>0)
			{
					 $qa="update  analysis
						set modifiedby = '". $_SESSION['email']."',
						modified=NOW()
						where type='".$type[1]."' and year = '$tahun'";
					$ra=mysqli_query($con, $qa);
			}


			$qdeletedata ="delete from analysis_mill_kos_lain where pb_thisyear = '$tahun' ";
			$rdeletedata = mysqli_query($con, $qdeletedata);

			$qdeletedata ="delete from analysis_mill_pemprosesan where pb_thisyear = '$tahun' ";
			$rdeletedata = mysqli_query($con, $qdeletedata);

function ekilang($lesen, $tahun){
		$con=connect();
 		$q="select NAMA_KILANG, NEGERI, SYARIKAT_INDUK, SUM(FFB_PROSES) as FFB_PROSES from ekilang where NO_LESEN = '$lesen' AND tahun='$tahun' group by NO_LESEN limit 1 ";
		//echo $q;
  		$r=mysqli_query($con, $q);
		$row=mysqli_fetch_array($r);

		$sub[0]=$row['NAMA_KILANG'];
		$sub[1]=$row['NEGERI'];
		$sub[2]=$row['SYARIKAT_INDUK'];
		$sub[3]=$row['FFB_PROSES'];

		return $sub;
	}

//--------------------------
function mill_pemprosesan($lesen,$tahun,$ffb, $negeri, $daerah){
		$con=connect();
 		$q="select * from mill_pemprosesan where lesen ='$lesen' and tahun='$tahun' ";
  		$r=mysqli_query($con, $q);
		$row=mysqli_fetch_array($r);
		//echo $row['kp_1'].'<br/>'.$ffb;
		$sub[0]=round($row['kp_1']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[0], "Water, chemical and power");
		$sub[1]=round($row['kp_2']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[1], "Fuel and Lubricant");
		$sub[2]=round($row['kp_3']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[2], "Mill Worker");
		$sub[3]=round($row['kp_4']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[3], "Effluent Control");
		$sub[4]=round($row['kp_5']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[4], "Management and Administration");
		$sub[5]=round($row['kp_6']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[5], "Office Expenses");
		$sub[6]=round($row['kp_7']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[6], "Sampling and laboratory testing");
		$sub[7]=round($row['kp_8']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[7], "Labour welfare not paid directly to workers");
		$sub[8]=round($row['kp_9']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[8], "Mill upgrading");
		$sub[9]=round($row['kp_10']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[9], "Maintenance and repair of palm oil mill");
		$sub[10]=round($row['kp_11']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[10], "Rents, land quit rent, fees");
		$sub[11]=round($row['kp_12']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[11], "Palm oil mill security");
		$sub[12]=round($row['kp_13']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[12], "Palm oil mill research and development ");
		$sub[13]=round($row['kp_14']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[13], "Depreciation of palm oil mill");
		$sub[14]=round($row['kp_15']/$ffb,2);add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[14], "Headquaters management charges");
		$sub[15]=round($row['total_kp']/$ffb,2);//add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[15], "Total Pemprosesan");

		return $sub;
	}

//-----------------------------------------------------
function add_mill_pemprosesan ($lesen,$tahun, $negeri,$daerah, $nilai, $km_nama){
							$con=connect();


							$q="INSERT INTO analysis_mill_pemprosesan (pb_thisyear ,lesen ,bkm_nama ,nilai ,negeri ,daerah)
							VALUES ('$tahun', '$lesen', '$km_nama', '$nilai', '$negeri', '$daerah');";
							$r = mysqli_query($con, $q);

							$qdelete ="delete from analysis_mill_pemprosesan where nilai=0";
							$rdelete = mysqli_query($con, $qdelete);
}


//------------------------------------
function mill_koslain($lesen,$tahun,$ffb,$negeri,$daerah){
		$con=connect();
 		$q="select * from mill_kos_lain where lesen ='$lesen' and tahun='$tahun' ";
  		$r=mysqli_query($con, $q);
		$row=mysqli_fetch_array($r);

		$sub[0]=round($row['kl_1']/$ffb,2);add_mill_kos_lain($lesen,$tahun, $negeri, $daerah, $sub[0], "Forwarding Expenses");
		$sub[1]=round($row['kl_2']/$ffb,2);add_mill_kos_lain($lesen,$tahun, $negeri, $daerah, $sub[1], "Sales tax (for mills in Sabah and Sarawak)");
		$sub[2]=round($row['kl_3']/$ffb,2);add_mill_kos_lain($lesen,$tahun, $negeri, $daerah, $sub[2], "Selling expenses (including commission)");
		$sub[3]=round($row['kl_4']/$ffb,2);add_mill_kos_lain($lesen,$tahun, $negeri, $daerah, $sub[3], "Cess MPOB");
		$sub[4]=round($row['kl_5']/$ffb,2);add_mill_kos_lain($lesen,$tahun, $negeri, $daerah, $sub[4], "Other Expenditure");
		$sub[5]=round($row['total_kl']/$ffb,2);//add_mill_kos_lain($lesen,$tahun, $negeri, $daerah, $sub[5], "Total Kos Lain");

		return $sub;
	}
//-------------------------------------------------
function add_mill_kos_lain ($lesen,$tahun, $negeri,$daerah, $nilai, $km_nama){
							$con=connect();


							$q="INSERT INTO analysis_mill_kos_lain (pb_thisyear ,lesen ,bkm_nama ,nilai ,negeri ,daerah)
							VALUES ('$tahun', '$lesen', '$km_nama', '$nilai', '$negeri', '$daerah');";
							$r = mysqli_query($con, $q);

							$qdelete ="delete from analysis_mill_kos_lain where nilai=0";
							$rdelete = mysqli_query($con, $qdelete);
}
//--------------------------------------------------


function mill_buruh($lesen,$tahun){
		$con=connect();
 		$q="select * from mill_buruh where lesen ='$lesen' and tahun='$tahun' ";
  		$r=mysqli_query($con, $q);
		$row=mysqli_fetch_array($r);

		$sub[0]=$row['mb_1'];
		$sub[1]=$row['mb_2'];
		$sub[2]=$row['mb_3'];
		$sub[3]=$row['mb_4'];
		$sub[4]=$row['mb_5'];
		$sub[5]=$row['total_mb'];
		$sub[6]=$row['mb_1b'];
		$sub[7]=$row['mb_2b'];
		$sub[8]=$row['mb_3b'];
		$sub[9]=$row['mb_4b'];
		$sub[10]=$row['mb_5b'];
		$sub[11]=$row['total_mb_b'];
		$sub[12]=$row['mb_1c'];
		$sub[13]=$row['mb_2c'];
		$sub[14]=$row['mb_3c'];
		$sub[15]=$row['mb_4c'];
		$sub[16]=$row['mb_5c'];
		$sub[17]=$row['total_mb_c'];

		return $sub;
	}
//-------------------------------------------------

?>


<div align="left">
<?php
include("class.progress_bar.php");

$pbar = new progress_bar('pbar',1,500,FALSE); //Creates a 500 pixle width progress bar starting at 1 percent with the name pbar auto create = false

$pbar->create(); // Visually creates the progress bar.


?></div>

<table width="100%" class="baju">
  <tr>
    <th width="3%">Bil.</th>
    <th width="19%">No.Lesen</th>
    <th width="17%">Nama Estet</th>
    <th width="22%">Negeri</th>
    <th width="10%">Syarikat Induk</th>
    <th width="2%"><strong>BTS </strong></th>
    <th width="2%"><strong>a_1</strong></th>
    <th width="2%"><strong>a_2</strong></th>
    <th width="2%"><strong>a_3</strong></th>
    <th width="2%"><strong>a_4</strong></th>
    <th width="2%"><strong>a_5</strong></th>
    <th width="3%"><strong>a_6</strong></th>
    <th width="3%"><strong>a_7</strong></th>
    <th width="3%"><strong>a_8</strong></th>
    <th width="3%"><strong>a_9</strong></th>
    <th width="3%"><strong>a_10</strong></th>
    <th width="3%"><strong>a_11</strong></th>
    <th width="3%"><strong>a_12</strong></th>
    <th width="3%"><strong>a_13</strong></th>
    <th width="3%"><strong>a_14</strong></th>
    <th width="3%"><strong>a_15</strong></th>
    <th width="3%"><strong>total_a</strong></th>
    <th width="3%">kl_1</th>
    <th width="3%">kl_2</th>
    <th width="3%">kl_3</th>
    <th width="3%">kl_4</th>
    <th width="3%">kl_5</th>
    <th width="3%">total_kl</th>
    <th width="3%">mb_1</th>
    <th width="3%">mb_2</th>
    <th width="3%">mb_3</th>
    <th width="3%">mb_4</th>
    <th width="3%">mb_5</th>
    <th width="3%">total_mb</th>
    <th width="3%">mb_1b</th>
    <th width="3%">mb_2b</th>
    <th width="3%">mb_3b</th>
    <th width="3%">mb_4b</th>
    <th width="3%">mb_5b</th>
    <th width="3%">total_mb_b</th>
    <th width="3%">mb_1c</th>
    <th width="3%">mb_2c</th>
    <th width="3%">mb_3c</th>
    <th width="3%">mb_4c</th>
    <th width="3%">mb_5c</th>
    <th width="3%">total_mb_c</th>

  </tr>
  <?php
  //echo $tahun;
  $con=connect();
  $q="select * from login_mill where success!='0000-00-00 00:00:00' and lesen like '500%' and lesen not like '123456%'  group by lesen order by lesen  ";
  $r=mysqli_query($con, $q);
  $total_data_proses = mysqli_num_rows($r);
  $bil=0;
  while($row=mysqli_fetch_array($r)){

 	 usleep(10000); // delays exicution 10000 microseconds to show effect of progression.
	flush();
	$pbar->set_percent_adv($bil,$total_data_proses);

  ?>
  <tr <?php if($bil%2==0){?>class="alt"<?php } ?>>
    <td><?php echo ++$bil; ?>. </td>
    <td><?php echo $row['lesen'];?></td>
    <td><?php $nl = ekilang($row['lesen'],$tahun-1); echo $nl[0];?></td>
    <td><?php echo $nl[1];?></td>
    <td><?php echo $nl[2];?></td>
    <td><?php echo $ffb=round($nl[3],2);?></td>
    <td><?php $ml = mill_pemprosesan($row['lesen'],$tahun, $ffb, $nl[1], $nl[4]); echo $ml[0];?></td>
    <td><?php echo $ml[1];?></td>
    <td><?php echo $ml[2];?></td>
    <td><?php echo $ml[3];?></td>
    <td><?php echo $ml[4];?></td>
    <td><?php echo $ml[5];?></td>
    <td><?php echo $ml[6];?></td>
    <td><?php echo $ml[7];?></td>
    <td><?php echo $ml[8];?></td>
    <td><?php echo $ml[9];?></td>
    <td><?php echo $ml[10];?></td>
    <td><?php echo $ml[11];?></td>
    <td><?php echo $ml[12];?></td>
    <td><?php echo $ml[13];?></td>
    <td><?php echo $ml[14];?></td>
    <td><?php echo $ml[15];?></td>
    <td><?php $mk = mill_koslain($row['lesen'],$tahun, $ffb, $nl[1], $nl[4]); echo $mk[0];?></td>
    <td><?php echo $mk[1];?></td>
    <td><?php echo $mk[2];?></td>
    <td><?php echo $mk[3];?></td>
    <td><?php echo $mk[4];?></td>
    <td><?php echo $mk[5];?></td>
    <td><?php $mb = mill_buruh($row['lesen'],$tahun); echo $mb[0];?></td>
    <td><?php echo $mb[1];?></td>
    <td><?php echo $mb[2];?></td>
    <td><?php echo $mb[3];?></td>
    <td><?php echo $mb[4];?></td>
    <td><?php echo $mb[5];?></td>
    <td><?php echo $mb[6];?></td>
    <td><?php echo $mb[7];?></td>
    <td><?php echo $mb[8];?></td>
    <td><?php echo $mb[9];?></td>
    <td><?php echo $mb[10];?></td>
    <td><?php echo $mb[11];?></td>
    <td><?php echo $mb[12];?></td>
    <td><?php echo $mb[13];?></td>
    <td><?php echo $mb[14];?></td>
    <td><?php echo $mb[15];?></td>
    <td><?php echo $mb[16];?></td>
    <td><?php echo $mb[17];?></td>

  </tr>
  <?php } ?>
</table>
<p>&nbsp;</p>
<table width="60%">
  <tr>
    <td width="3%">A</td>
    <td width="97%">KOS PEMPROSESAN (kos_per_ha)</td>
  </tr>
  <tr>
    <td>KL</td>
    <td>KOS LAIN (kos_per_ha)</td>
  </tr>
  <tr>
    <td>MB</td>
    <td>MILL BURUH </td>
  </tr>

</table>
<script>
alert('All data has been finish analysis');
</script>
