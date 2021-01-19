<?php
include('../Connections/connection.class.php');
extract($_REQUEST);
header("Content-type: application");
header("Content-Disposition: attachment; filename=excel_data_estate_$tahun.xls");

//include("baju.php");
set_time_limit(0);
$con = connect();
$type = explode("_", $sub);
$qt1="select * from analysis where type='".$type[1]."' and year = '$tahun'";
$rt1=mysql_query($qt1,$con);
$total = mysql_num_rows($rt1);
			
if($total ==0){
	$qa="INSERT INTO `analysis` (`type` ,`year` ,`modifiedby` ,`modified`)VALUES ('".$type[1]."', '$tahun', '".$_SESSION['email']."',NOW() ";
	$ra=mysql_query($qa,$con);
}
if($total>0){
	$qa="update  analysis
		set modifiedby = '". $_SESSION['email']."',
		modified=NOW()
		where type='".$type[1]."' and year = '$tahun'";
	$ra=mysql_query($qa,$con);
}
			
$qdeletedata ="delete from analysis_kos_belum_matang where pb_thisyear = '$tahun' ";
$rdeletedata = mysql_query($qdeletedata,$con);
			
$qdeletedata ="delete from analysis_kos_matang_penjagaan where pb_thisyear = '$tahun' ";
$rdeletedata = mysql_query($qdeletedata,$con);
			
$qdeletedata ="delete from analysis_kos_matang_penuaian where pb_thisyear = '$tahun' ";
$rdeletedata = mysql_query($qdeletedata,$con);
		
$qdeletedata ="delete from analysis_kos_matang_pengangkutan where pb_thisyear = '$tahun' ";
$rdeletedata = mysql_query($qdeletedata,$con);

$qdeletedata ="delete from analysis_belanja_am_kos where pb_thisyear = '$tahun' ";
$rdeletedata = mysql_query($qdeletedata,$con);
?>
<h2>Analysis Data Survey Estate for <?php echo $tahun;?></h2>

<style>
body {
	font-family:Tahoma ;
	font-size: 12px; 

}td,th {
	font-size: 12px;
}

</style>
 

<?php
function esub($lesen, $tahun){
	if($tahun == date('Y')){
		$table = "esub";
	}else{
		$table = "esub_".$tahun;
	}
	
	$con=connect();
 	$q="select * from $table where NO_LESEN_BARU = '$lesen' limit 1 ";
  	$r=mysql_query($q,$con);
	$row=mysql_fetch_array($r);
		
	$sub[0]=$row['Nama_Estet'];
	$sub[1]=$row['Negeri_Premis'];
	$sub[2]=$row['Daerah_Premis'];
	$sub[3]=$row['Syarikat_Induk'];
	$sub[4]=$row['Berhasil'];
	$sub[5]=$row['Belum_Berhasil'];
	$sub[6]=$row['Jumlah'];
	$sub[7]=$row['Keluasan_Yang_Dituai'];
		
	return $sub;	
}

//----------------------------------------------------
function luas($lesen,$table,$field){
	$con=connect();
	$q="select sum($field) as jumlah from $table where lesen = '$lesen' group by lesen limit 1 ";
  	$r=mysql_query($q,$con);		
		
	if(mysql_num_rows($r) > 0){
		$row=mysql_fetch_array($r);
		$sub[0] = round($row['jumlah'],2);
		return $sub;
	}else{
		return 0;
	}
}
//---------------------------------------------------
function kos_belum_matang($lesen,$tahun,$type,$tahun_tanam,$keluasan,$negeri,$daerah){
	$con=connect();
	$q="select * from kos_belum_matang where lesen = '$lesen' and pb_thisyear='$tahun' and pb_tahun='$tahun_tanam' and pb_type='$type' limit 1 ";
  	$r=mysql_query($q,$con);
	$row=mysql_fetch_array($r);
	
	if($keluasan > 0){
		$sub[0]=round($row['a_1']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Felling and land clearing",$sub[0]);
		$sub[1]=round($row['a_2']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Terracing and platform",$sub[1]);
		$sub[2]=round($row['a_3']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Road construction",$sub[2]);
		$sub[3]=round($row['a_4']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Drain construction",$sub[3]);
		$sub[4]=round($row['a_5']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Bund and watergate construction",$sub[4]);
		$sub[5]=round($row['a_6']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Lining",$sub[5]);
		$sub[6]=round($row['a_7']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Holing and planting",$sub[6]);
		$sub[7]=round($row['a_8']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Basal fertiliser",$sub[7]);
		$sub[8]=round($row['a_9']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Planting material",$sub[8]);
		$sub[9]=round($row['a_10']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Cover crops",$sub[9]);
		$sub[10]=round($row['a_11']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Other expenditures",$sub[10]);
		$sub[11]=round($row['total_a']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Total Non-Recurrent Expenditures",$sub[11]);
		$sub[12]=round($row['b_1a']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Purchase of weedicides",$sub[12]);
		$sub[13]=round($row['b_1b']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Labour cost for weeding",$sub[13]);
		$sub[14]=round($row['b_1c']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Machinery use and maintenance",$sub[14]);
		$sub[15]=round($row['total_b_1']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Weeding",$sub[15]);
		$sub[16]=round($row['total_b_2']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Lalang control",$sub[16]);
		$sub[17]=round($row['b_3a']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Purchase of fertilizer",$sub[17]);
		$sub[18]=round($row['b_3b']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Labour cost to apply fertilizers",$sub[18]);
		$sub[19]=round($row['b_3c']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Machinery use and maintenances",$sub[19]);
		$sub[20]=round($row['b_3d']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Soil and foliar analysis",$sub[20]);
		$sub[21]=round($row['total_b_3']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Fertilizing",$sub[21]);
		$sub[22]=round($row['total_b_4']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Soil and water conservation",$sub[22]);
		$sub[23]=round($row['total_b_5']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Upkeep of roads, bridges, paths and etc",$sub[23]);
		$sub[24]=round($row['total_b_6']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Upkeep of drain",$sub[24]);
		$sub[25]=round($row['total_b_7']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Upkeep of bunds and watergate",$sub[25]);
		$sub[26]=round($row['total_b_8']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Boundaries and survey",$sub[26]);
		$sub[27]=round($row['total_b_9']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Cover crops",$sub[27]);
		$sub[28]=round($row['total_b_10']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Pest and diseases control",$sub[28]);
		$sub[29]=round($row['total_b_11']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Pruning and palm sanitation",$sub[29]);
		$sub[30]=round($row['total_b_12']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Census / supplies",$sub[30]);
		$sub[31]=round($row['total_b_13']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Castration",$sub[31]);
		$sub[32]=round($row['total_b_14']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Others Expenditure",$sub[32]);
		$sub[33]=round($row['total_b']/$keluasan,2);add_kbm ($tahun_tanam, $tahun, $lesen, $type, $negeri, $daerah, "Total Upkeep",$sub[33]);	
	}
	
	return $sub;
}
	
	
function add_kbm ($tahun_tanam ,$tahun ,$lesen ,$type ,$negeri ,$daerah , $bkm_nama ,$nilai)
{
	$con=connect();
	$q="INSERT INTO analysis_kos_belum_matang (pb_tahun ,pb_thisyear ,lesen ,pb_type ,bkm_nama ,nilai ,negeri ,daerah)
		VALUES ('$tahun_tanam' ,'$tahun' ,'$lesen' ,'$type' ,'$bkm_nama' ,'$nilai' ,'$negeri' ,'$daerah'
		);";
	$r = mysql_query($q,$con);
	$qdelete ="delete from analysis_kos_belum_matang where nilai=0";
	$rdelete = mysql_query($qdelete,$con);
}
//-----------------------------------------
function bts($var, $tahun){
	if($tahun == date('Y')){
		$table = "fbb_production";
	}else{
		$table = "fbb_production".$tahun;
	}
		
	$con = connect();
	$vari = substr($var,0,-1);
	$q ="select * from $table where lesen ='".$vari."'";
	$r = mysql_query($q,$con);
	if(mysql_num_rows($r) > 0){
		$row = mysql_fetch_array($r);
		$sub[0]=round($row['purata_hasil_buah'],2);
		return $sub;
	}else{
		return 0;
	}
}

function kos_matang_penjagaan($lesen,$tahun,$jum_tanam,$jum_bts, $negeri,$daerah){
	$con=connect();

	$q="select * from kos_matang_penjagaan where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
	$r=mysql_query($q,$con);
	$row=mysql_fetch_array($r);
		
	if($jum_tanam > 0){
		$sub[0]=round($row['b_1a']/$jum_tanam,2);
		$sub[1]=round($row['b_1b']/$jum_tanam,2);
		$sub[2]=round($row['b_1c']/$jum_tanam,2);
		$sub[3]=round($row['total_b_1']/$jum_tanam,2);
		$sub[4]=round($row['total_b_2']/$jum_tanam,2);
		$sub[5]=round($row['b_3a']/$jum_tanam,2);
		$sub[6]=round($row['b_3b']/$jum_tanam,2);
		$sub[7]=round($row['b_3c']/$jum_tanam,2);
		$sub[8]=round($row['b_3d']/$jum_tanam,2);
		$sub[9]=round($row['total_b_3']/$jum_tanam,2);
		$sub[10]=round($row['total_b_4']/$jum_tanam,2);
		$sub[11]=round($row['total_b_5']/$jum_tanam,2);
		$sub[12]=round($row['total_b_6']/$jum_tanam,2);
		$sub[13]=round($row['total_b_7']/$jum_tanam,2);
		$sub[14]=round($row['total_b_8']/$jum_tanam,2);
		$sub[15]=round($row['total_b_9']/$jum_tanam,2);
		$sub[16]=round($row['total_b_10']/$jum_tanam,2);
		$sub[17]=round($row['total_b_11']/$jum_tanam,2);
		$sub[18]=round($row['total_b_12']/$jum_tanam,2);
		$sub[19]=round($row['total_b']/$jum_tanam,2);
	}
		
	if($jum_bts > 0){
		$sub[20]=round($sub[0]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[0], $sub[20], "Weeding");
		$sub[21]=round($sub[1]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[1], $sub[21], "i. Purchase of weed poison");
		$sub[22]=round($sub[2]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[2], $sub[22], "ii. Labour cost for weeding");
		$sub[23]=round($sub[3]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[3], $sub[23], "iii. Machinery use and maintenances");
		$sub[24]=round($sub[4]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[4], $sub[24], "Lalang control");
		$sub[25]=round($sub[5]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[5], $sub[25], "Fertilizing");
		$sub[26]=round($sub[6]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[6], $sub[26], "i. Purchase of fertilizer");
		$sub[27]=round($sub[7]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[7], $sub[27], "ii.Labour cost to apply fertilizers");
		$sub[28]=round($sub[8]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[8], $sub[28], "iii. Machinery use and maintenance");
		$sub[29]=round($sub[9]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[9], $sub[29], "iv. Soil and foliar analysis");
		$sub[30]=round($sub[10]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[10], $sub[30], "Soil / water conservation ");
		$sub[31]=round($sub[11]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[11], $sub[31], "Upkeep of roads, bridges, paths etc.");
		$sub[32]=round($sub[12]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[12], $sub[32], "Upkeep drains");
		$sub[33]=round($sub[13]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[13], $sub[33], "Upkeeps of bunds, boundaries and Watergates");
		$sub[34]=round($sub[14]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[14], $sub[34], "Pests and diseases control");
		$sub[35]=round($sub[15]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[15], $sub[35], "Pruning and palm sanitation");
		$sub[36]=round($sub[16]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[16], $sub[36], "Census / supplies ");
		$sub[37]=round($sub[17]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[17], $sub[37], "Mandore wages/ direct field supervision costs ");
		$sub[38]=round($sub[18]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[18], $sub[38], "Other expenditure");
		$sub[39]=round($sub[19]/$jum_bts,2);add_kmp($lesen,$tahun, $negeri,$daerah, $sub[19], $sub[39], "Total Upkeep");
	}
	return $sub;
}
//------------------------------------- add kos matang penjagaan ---------------------------
function add_kmp ($lesen,$tahun, $negeri,$daerah, $nilai_hektar, $nilai_tan, $km_nama){
	$con=connect();
	$q="INSERT INTO analysis_kos_matang_penjagaan (pb_thisyear ,lesen ,km_nama ,kos_per_hektar ,kos_per_tan ,negeri ,daerah)
		VALUES ('$tahun', '$lesen', '$km_nama', '$nilai_hektar', '$nilai_tan', '$negeri', '$daerah');";
	$r = mysql_query($q,$con);
	$qdelete ="delete from analysis_kos_matang_penjagaan  where kos_per_hektar=0 and kos_per_tan=0";
	$rdelete = mysql_query($qdelete,$con);
}
//----------------------------------------------------------------
function kos_matang_penuaian($lesen,$tahun,$jum_tanam,$jum_bts, $negeri, $daerah){
	$con=connect();
	$q="select * from kos_matang_penuaian where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
  	$r=mysql_query($q,$con);
	$row=mysql_fetch_array($r);
		
	if($jum_tanam > 0){
		$sub[0]=round($row['a_1']/$jum_tanam,2);
		$sub[1]=round($row['a_2']/$jum_tanam,2);
		$sub[2]=round($row['a_3']/$jum_tanam,2);
		$sub[3]=round($row['a_4']/$jum_tanam,2);
		$sub[4]=round($row['total_b']/$jum_tanam,2);
	}
		
	if($jum_bts > 0){
		$sub[5]=round($sub[0]/$jum_bts,2);add_kmptuai($lesen,$tahun, $negeri,$daerah, $sub[0], $sub[5], "Harvesting tools ");
		$sub[6]=round($sub[1]/$jum_bts,2);add_kmptuai($lesen,$tahun, $negeri,$daerah, $sub[1], $sub[6], "Harvesting and collection of FFB and loose fruit");
		$sub[7]=round($sub[2]/$jum_bts,2);add_kmptuai($lesen,$tahun, $negeri,$daerah, $sub[2], $sub[7], "Mandore wages/ direct field supervision costs");
		$sub[8]=round($sub[3]/$jum_bts,2);add_kmptuai($lesen,$tahun, $negeri,$daerah, $sub[3], $sub[8], "Machinery use and maintenance ");
		$sub[9]=round($sub[4]/$jum_bts,2);add_kmptuai($lesen,$tahun, $negeri,$daerah, $sub[4], $sub[9], "Total Harvesting");
	}
	
	return $sub;
}
//------------------------------------- add kos matang penjagaan ---------------------------
function add_kmptuai ($lesen,$tahun, $negeri,$daerah, $nilai_hektar, $nilai_tan, $km_nama){
	$con=connect();
	$q="INSERT INTO analysis_kos_matang_penuaian (pb_thisyear ,lesen ,km_nama ,kos_per_hektar ,kos_per_tan ,negeri ,daerah)
		VALUES ('$tahun', '$lesen', '$km_nama', '$nilai_hektar', '$nilai_tan', '$negeri', '$daerah');";
	$r = mysql_query($q,$con);
	$qdelete ="delete from analysis_kos_matang_penuaian  where kos_per_hektar=0 and kos_per_tan=0";
	$rdelete = mysql_query($qdelete,$con);
}
//----------------------------------------------------------------
	
//----------------------------------------------------------------
function kos_matang_pengangkutan($lesen,$tahun,$jum_tanam,$jum_bts,$negeri,$daerah){
	$con=connect();
	$q="select * from kos_matang_pengangkutan where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
  	$r=mysql_query($q,$con);
	$row=mysql_fetch_array($r);
		
	if($jum_tanam > 0){
		$sub[0]=round($row['a_1']/$jum_tanam,2);
		$sub[1]=round($row['a_2']/$jum_tanam,2);
		$sub[2]=round($row['a_3']/$jum_tanam,2);
		$sub[3]=round($row['total_a']/$jum_tanam,2);
		$sub[4]=round($row['b_1a']/$jum_tanam,2);
		$sub[5]=round($row['b_1b']/$jum_tanam,2);
		$sub[6]=round($row['b_1c']/$jum_tanam,2);
		$sub[7]=round($row['total_b_1']/$jum_tanam,2);
		$sub[8]=round($row['total_b_2']/$jum_tanam,2);
		$sub[9]=round($row['total_b']/$jum_tanam,2);
	}
		
	if($jum_bts > 0){
		$sub[10]=round($sub[0]/$jum_bts,2);add_kmpangkut($lesen,$tahun, $negeri,$daerah, $sub[0], $sub[10], "Internal");
		$sub[11]=round($sub[1]/$jum_bts,2);add_kmpangkut($lesen,$tahun, $negeri,$daerah, $sub[1], $sub[11], "a) Platform");
		$sub[12]=round($sub[2]/$jum_bts,2);add_kmpangkut($lesen,$tahun, $negeri,$daerah, $sub[2], $sub[12], "b) Ramp");
		$sub[13]=round($sub[3]/$jum_bts,2);add_kmpangkut($lesen,$tahun, $negeri,$daerah, $sub[3], $sub[13], "ii. Ramp upkeep");
		$sub[14]=round($sub[4]/$jum_bts,2);add_kmpangkut($lesen,$tahun, $negeri,$daerah, $sub[4], $sub[14], "External");
		$sub[15]=round($sub[5]/$jum_bts,2);add_kmpangkut($lesen,$tahun, $negeri,$daerah, $sub[5], $sub[15], "i. Meanline transportation cost from platform to loading centre or mill");
		$sub[16]=round($sub[6]/$jum_bts,2);add_kmpangkut($lesen,$tahun, $negeri,$daerah, $sub[6], $sub[16], "ii. Upkeep of tractor & trailer, lorry, etc");
		$sub[17]=round($sub[7]/$jum_bts,2);add_kmpangkut($lesen,$tahun, $negeri,$daerah, $sub[7], $sub[17], "iii. River transport");
		$sub[18]=round($sub[8]/$jum_bts,2);add_kmpangkut($lesen,$tahun, $negeri,$daerah, $sub[8], $sub[18], "Other expenditures");
		$sub[19]=round($sub[9]/$jum_bts,2);add_kmpangkut($lesen,$tahun, $negeri,$daerah, $sub[9], $sub[19], "Total Transportation");
	}
	
	return $sub;
}
//-----------------------------------------------------------------
//------------------------------------- add kos matang penjagaan ---------------------------
function add_kmpangkut ($lesen,$tahun, $negeri,$daerah, $nilai_hektar, $nilai_tan, $km_nama){
	$con=connect();
	$q="INSERT INTO analysis_kos_matang_pengangkutan (pb_thisyear ,lesen ,km_nama ,kos_per_hektar ,kos_per_tan ,negeri ,daerah)
		VALUES ('$tahun', '$lesen', '$km_nama', '$nilai_hektar', '$nilai_tan', '$negeri', '$daerah');";
	$r = mysql_query($q,$con);
	$qdelete ="delete from analysis_kos_matang_pengangkutan where kos_per_hektar=0 and kos_per_tan=0";
	$rdelete = mysql_query($qdelete,$con);
}
//----------------------------------------------------------------

function kos_belanja_am ($lesen, $tahun, $hektar, $bts, $negeri, $daerah){
	$con=connect();
	$q="select * from belanja_am_kos where lesen = '$lesen' and thisyear='$tahun' limit 1 ";
  	$r=mysql_query($q,$con);
	$row=mysql_fetch_array($r);
		
	if($hektar > 0){
		$sub[0]=round($row['emolumen']/$hektar,2);
		$sub[1]=round($row['kos_ibupejabat']/$hektar,2);
		$sub[2]=round($row['kos_agensi']/$hektar,2);
		$sub[3]=round($row['kebajikan']/$hektar,2);
		$sub[4]=round($row['sewa_tol']/$hektar,2);
		$sub[5]=round($row['penyelidikan']/$hektar,2);
		$sub[6]=round($row['perubatan']/$hektar,2);
		$sub[7]=round($row['penyelenggaraan']/$hektar,2);
		$sub[8]=round($row['cukai_keuntungan']/$hektar,2);
		$sub[9]=round($row['penjagaan']/$hektar,2);
		$sub[10]=round($row['kawalan']/$hektar,2);
		$sub[11]=round($row['air_tenaga']/$hektar,2);
		$sub[12]=round($row['perbelanjaan_pejabat']/$hektar,2);
		$sub[13]=round($row['susut_nilai']/$hektar,2);
		$sub[14]=round($row['perbelanjaan_lain']/$hektar,2);
		$sub[15]=round($row['total_perbelanjaan']/$hektar,2);
	}
		
	if($bts > 0){
		$sub[16]=round($sub[0]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[0], $sub[16], "Executive and non-executive emoluments");
		$sub[17]=round($sub[1]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[1], $sub[17], "Headquarters Cost");
		$sub[18]=round($sub[2]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[2], $sub[18], "Agency cost and professional fees");
		$sub[19]=round($sub[3]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[3], $sub[19], "Unpaid welfare to labour");
		$sub[20]=round($sub[4]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[4], $sub[20], "Rent, TOL and insurance");
		$sub[21]=round($sub[5]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[5], $sub[21], "Research and development");
		$sub[22]=round($sub[6]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[6], $sub[22], "Medical");
		$sub[23]=round($sub[7]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[7], $sub[23], "Building maintenance");
		$sub[24]=round($sub[8]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[8], $sub[24], "Extraordinary profit tax");
		$sub[25]=round($sub[9]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[9], $sub[25], "Upkeep and conservation");
		$sub[26]=round($sub[10]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[10], $sub[26], "Security Control");
		$sub[27]=round($sub[11]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[11], $sub[27], "Water and power");
		$sub[28]=round($sub[12]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[12], $sub[28], "Office expenses");
		$sub[29]=round($sub[13]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[13], $sub[29], "Value depreciation");
		$sub[30]=round($sub[14]/$bts,2);add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[14], $sub[30], "Other expenses");
		$sub[31]=round($sub[15]/$bts,2);//add_belanja_am($lesen,$tahun, $negeri,$daerah, $sub[15], $sub[31], "Total General Chargers");
	}
	return $sub; 	
}


function luas_data($table,$data, $tahunsebelum, $lesen){
	if(strlen($tahunsebelum)==1){ 
		$table = $table."0".substr($tahunsebelum,-2);
	}
	else{
		$table = $table.substr($tahunsebelum,-2); 
	}
	$con = connect();
	$qblm="SELECT sum($data) as $data FROM $table WHERE lesen = '$lesen' group by lesen";
	$rblm=mysql_query($qblm,$con);
	if($rblm){
		$rowblm= mysql_fetch_array($rblm);
		//echo "<br>";
		$data1 = $rowblm[$data];
		$jum_data = $data1; 
		
		return $jum_data; 
	}else{
		return 0;
	}
}
		
//------------------------------------- add kos perbelanjaan am ---------------------------
function add_belanja_am ($lesen,$tahun, $negeri,$daerah, $nilai_hektar, $nilai_tan, $km_nama){
	$con=connect();
	$q="INSERT INTO analysis_belanja_am_kos (pb_thisyear ,lesen ,km_nama ,kos_per_hektar ,kos_per_tan ,negeri ,daerah)
		VALUES ('$tahun', '$lesen', '$km_nama', '$nilai_hektar', '$nilai_tan', '$negeri', '$daerah');";
	$r = mysql_query($q,$con);
	$qdelete ="delete from analysis_belanja_am_kos where kos_per_hektar=0 and kos_per_tan=0";
	$rdelete = mysql_query($qdelete,$con);
}
	
?>


<title>Data Estet Survey</title>


<table width="100%" class="baju">
  <tr>
    <th width="3%">Bil.</th>
    <th width="19%">No.Lesen</th>
    <th width="17%">Nama Estet</th>
    <th width="22%">Negeri</th>
    <th width="12%">Daerah </th>
    <th width="10%">Syarikat Induk</th>
    
    <th width="2%">PB1_Luas</th>
    <th width="2%">PB1_a_1</th>
    <th width="2%">PB1_a_2</th>
    <th width="2%">PB1_a_3</th>
    <th width="2%">PB1_a_4</th>
    <th width="2%">PB1_a_5</th>
    <th width="2%">PB1_a_6</th>
    <th width="2%">PB1_a_7</th>
    <th width="3%">PB1_a_8</th>
    <th width="3%">PB1_a_9</th>
    <th width="3%">PB1_a_10</th>
    <th width="3%">PB1_a_11</th>
    <th width="3%">PB1_total_a</th>
    <th width="2%">PB1_b_1a</th>
    <th width="2%">PB1_b_1b</th>
    <th width="2%">PB1_b_1c</th>
    <th width="2%">PB1_total_b_1</th>
    <th width="2%">PB1_total_b_2</th>
    <th width="2%">PB1_b_3a</th>
    <th width="2%">PB1_b_3b</th>
    <th width="3%">PB1_b_3c</th>
    <th width="3%">PB1_b_3d</th>
    <th width="3%">PB1_total_b_3</th>
    <th width="3%">PB1_total_b_4</th>
    <th width="3%">PB1_total_b_5</th>
    <th width="3%">PB1_total_b_6</th>
    <th width="3%">PB1_total_b_7</th>
    <th width="3%">PB1_total_b_8</th>
    <th width="3%">PB1_total_b_9</th>
    <th width="3%">PB1_total_b_10</th>
    <th width="3%">PB1_total_b_11</th>
    <th width="3%">PB1_total_b_12</th>
    <th width="3%">PB1_total_b_13</th>
    <th width="3%">PB1_total_b_14</th>
    <th width="3%">PB1_total_a</th>
    <th width="2%">PB1_b_1a</th>
    <th width="2%">PB1_b_1b</th>
    <th width="2%">PB1_b_1c</th>
    <th width="2%">PB1_total_b_1</th>
    <th width="2%">PB1_total_b_2</th>
    <th width="2%">PB1_b_3a</th>
    <th width="2%">PB1_b_3b</th>
    <th width="3%">PB1_b_3c</th>
    <th width="3%">PB1_b_3d</th>
    <th width="3%">PB1_total_b_3</th>
    <th width="3%">PB1_total_b_4</th>
    <th width="3%">PB1_total_b_5</th>
    <th width="3%">PB1_total_b_6</th>
    <th width="3%">PB1_total_b_7</th>
    <th width="3%">PB1_total_b_8</th>
    <th width="3%">PB1_total_b_9</th>
    <th width="3%">PB1_total_b_10</th>
    <th width="3%">PB1_total_b_11</th>
    <th width="3%">PB1_total_b_12</th>
    <th width="3%">PB1_total_b_13</th>
    <th width="3%">PB1_total_b_14</th>
    <th width="3%">PB1_total_a</th>
    
    <th width="2%">PB2_Luas</th>
    <th width="2%">PB2_b_1a</th>
    <th width="2%">PB2_b_1b</th>
    <th width="2%">PB2_b_1c</th>
    <th width="2%">PB2_total_b_1</th>
    <th width="2%">PB2_total_b_2</th>
    <th width="2%">PB2_b_3a</th>
    <th width="2%">PB2_b_3b</th>
    <th width="3%">PB2_b_3c</th>
    <th width="3%">PB2_b_3d</th>
    <th width="3%">PB2_total_b_3</th>
    <th width="3%">PB2_total_b_4</th>
    <th width="3%">PB2_total_b_5</th>
    <th width="3%">PB2_total_b_6</th>
    <th width="3%">PB2_total_b_7</th>
    <th width="3%">PB2_total_b_8</th>
    <th width="3%">PB2_total_b_9</th>
    <th width="3%">PB2_total_b_10</th>
    <th width="3%">PB2_total_b_11</th>
    <th width="3%">PB2_total_b_12</th>
    <th width="3%">PB2_total_b_13</th>
    <th width="3%">PB2_total_b_14</th>
    <th width="3%">PB2_total_a</th>
    
    
    <th width="2%">PB3_Luas</th>
    <th width="2%">PB3_b_1a</th>
    <th width="2%">PB3_b_1b</th>
    <th width="2%">PB3_b_1c</th>
    <th width="2%">PB3_total_b_1</th>
    <th width="2%">PB3_total_b_2</th>
    <th width="2%">PB3_b_3a</th>
    <th width="2%">PB3_b_3b</th>
    <th width="3%">PB3_b_3c</th>
    <th width="3%">PB3_b_3d</th>
    <th width="3%">PB3_total_b_3</th>
    <th width="3%">PB3_total_b_4</th>
    <th width="3%">PB3_total_b_5</th>
    <th width="3%">PB3_total_b_6</th>
    <th width="3%">PB3_total_b_7</th>
    <th width="3%">PB3_total_b_8</th>
    <th width="3%">PB3_total_b_9</th>
    <th width="3%">PB3_total_b_10</th>
    <th width="3%">PB3_total_b_11</th>
    <th width="3%">PB3_total_b_12</th>
    <th width="3%">PB3_total_b_13</th>
    <th width="3%">PB3_total_b_14</th>
    <th width="3%">PB3_total_a</th>
    
    <th width="2%">PS1_Luas</th>
    <th width="2%">PS1_a_1</th>
    <th width="2%">PS1_a_2</th>
    <th width="2%">PS1_a_3</th>
    <th width="2%">PS1_a_4</th>
    <th width="2%">PS1_a_5</th>
    <th width="2%">PS1_a_6</th>
    <th width="2%">PS1_a_7</th>
    <th width="3%">PS1_a_8</th>
    <th width="3%">PS1_a_9</th>
    <th width="3%">PS1_a_10</th>
    <th width="3%">PS1_a_11</th>
    <th width="3%">PS1_total_a</th>
    
    <th width="2%">PS2_Luas</th>
    <th width="2%">PS2_b_1a</th>
    <th width="2%">PS2_b_1b</th>
    <th width="2%">PS2_b_1c</th>
    <th width="2%">PS2_total_b_1</th>
    <th width="2%">PS2_total_b_2</th>
    <th width="2%">PS2_b_3a</th>
    <th width="2%">PS2_b_3b</th>
    <th width="3%">PS2_b_3c</th>
    <th width="3%">PS2_b_3d</th>
    <th width="3%">PS2_total_b_3</th>
    <th width="3%">PS2_total_b_4</th>
    <th width="3%">PS2_total_b_5</th>
    <th width="3%">PS2_total_b_6</th>
    <th width="3%">PS2_total_b_7</th>
    <th width="3%">PS2_total_b_8</th>
    <th width="3%">PS2_total_b_9</th>
    <th width="3%">PS2_total_b_10</th>
    <th width="3%">PS2_total_b_11</th>
    <th width="3%">PS2_total_b_12</th>
    <th width="3%">PS2_total_b_13</th>
    <th width="3%">PS2_total_b_14</th>
    <th width="3%">PS2_total_a</th>
    
    
    <th width="2%">PS3_Luas</th>
    <th width="2%">PS3_b_1a</th>
    <th width="2%">PS3_b_1b</th>
    <th width="2%">PS3_b_1c</th>
    <th width="2%">PS3_total_b_1</th>
    <th width="2%">PS3_total_b_2</th>
    <th width="2%">PS3_b_3a</th>
    <th width="2%">PS3_b_3b</th>
    <th width="3%">PS3_b_3c</th>
    <th width="3%">PS3_b_3d</th>
    <th width="3%">PS3_total_b_3</th>
    <th width="3%">PS3_total_b_4</th>
    <th width="3%">PS3_total_b_5</th>
    <th width="3%">PS3_total_b_6</th>
    <th width="3%">PS3_total_b_7</th>
    <th width="3%">PS3_total_b_8</th>
    <th width="3%">PS3_total_b_9</th>
    <th width="3%">PS3_total_b_10</th>
    <th width="3%">PS3_total_b_11</th>
    <th width="3%">PS3_total_b_12</th>
    <th width="3%">PS3_total_b_13</th>
    <th width="3%">PS3_total_b_14</th>
    <th width="3%">PS3_total_a</th>
    
    <th width="2%">PT1_Luas</th>
    <th width="2%">PT1_a_1</th>
    <th width="2%">PT1_a_2</th>
    <th width="2%">PT1_a_3</th>
    <th width="2%">PT1_a_4</th>
    <th width="2%">PT1_a_5</th>
    <th width="2%">PT1_a_6</th>
    <th width="2%">PT1_a_7</th>
    <th width="3%">PT1_a_8</th>
    <th width="3%">PT1_a_9</th>
    <th width="3%">PT1_a_10</th>
    <th width="3%">PT1_a_11</th>
    <th width="3%">PT1_total_a</th>
    
    <th width="2%">PT2_Luas</th>
    <th width="2%">PT2_b_1a</th>
    <th width="2%">PT2_b_1b</th>
    <th width="2%">PT2_b_1c</th>
    <th width="2%">PT2_total_b_1</th>
    <th width="2%">PT2_total_b_2</th>
    <th width="2%">PT2_b_3a</th>
    <th width="2%">PT2_b_3b</th>
    <th width="3%">PT2_b_3c</th>
    <th width="3%">PT2_b_3d</th>
    <th width="3%">PT2_total_b_3</th>
    <th width="3%">PT2_total_b_4</th>
    <th width="3%">PT2_total_b_5</th>
    <th width="3%">PT2_total_b_6</th>
    <th width="3%">PT2_total_b_7</th>
    <th width="3%">PT2_total_b_8</th>
    <th width="3%">PT2_total_b_9</th>
    <th width="3%">PT2_total_b_10</th>
    <th width="3%">PT2_total_b_11</th>
    <th width="3%">PT2_total_b_12</th>
    <th width="3%">PT2_total_b_13</th>
    <th width="3%">PT2_total_b_14</th>
    <th width="3%">PT2_total_a</th>
    
    
    <th width="2%">PT3_Luas</th>
    <th width="2%">PT3_b_1a</th>
    <th width="2%">PT3_b_1b</th>
    <th width="2%">PT3_b_1c</th>
    <th width="2%">PT3_total_b_1</th>
    <th width="2%">PT3_total_b_2</th>
    <th width="2%">PT3_b_3a</th>
    <th width="2%">PT3_b_3b</th>
    <th width="3%">PT3_b_3c</th>
    <th width="3%">PT3_b_3d</th>
    <th width="3%">PT3_total_b_3</th>
    <th width="3%">PT3_total_b_4</th>
    <th width="3%">PT3_total_b_5</th>
    <th width="3%">PT3_total_b_6</th>
    <th width="3%">PT3_total_b_7</th>
    <th width="3%">PT3_total_b_8</th>
    <th width="3%">PT3_total_b_9</th>
    <th width="3%">PT3_total_b_10</th>
    <th width="3%">PT3_total_b_11</th>
    <th width="3%">PT3_total_b_12</th>
    <th width="3%">PT3_total_b_13</th>
    <th width="3%">PT3_total_b_14</th>
    <th width="3%">PT3_total_a</th>
    
    <th width="3%">KJ_Berhasil</th>
    <th width="3%">KJ_BTS</th>
    <th width="3%">KJ_b_1a</th>
    <th width="3%">KJ_b_1b</th>
    <th width="3%">KJ_b_1c</th>
    <th width="3%">KJ_total_b_1</th>
    <th width="3%">KJ_total_b_2</th>
    <th width="3%">KJ_b_3a</th>
    <th width="3%">KJ_b_3b</th>
    <th width="3%">KJ_b_3c</th>
    <th width="3%">KJ_b_3d</th>
    <th width="3%">KJ_total_b_3</th>
    <th width="3%">KJ_total_b_4</th>
    <th width="3%">KJ_total_b_5</th>
    <th width="3%">KJ_total_b_6</th>
    <th width="3%">KJ_total_b_7</th>
    <th width="3%">KJ_total_b_8</th>
    <th width="3%">KJ_total_b_9</th>
    <th width="3%">KJ_total_b_10</th>
    <th width="3%">KJ_total_b_11</th>
    <th width="3%">KJ_total_b_12</th>
    <th width="3%">KJ_total_b</th>
    
    <th width="3%">KJB_b_1a</th>
    <th width="3%">KJB_b_1b</th>
    <th width="3%">KJB_b_1c</th>
    <th width="3%">KJB_total_b_1</th>
    <th width="3%">KJB_total_b_2</th>
    <th width="3%">KJB_b_3a</th>
    <th width="3%">KJB_b_3b</th>
    <th width="3%">KJB_b_3c</th>
    <th width="3%">KJB_b_3d</th>
    <th width="3%">KJB_total_b_3</th>
    <th width="3%">KJB_total_b_4</th>
    <th width="3%">KJB_total_b_5</th>
    <th width="3%">KJB_total_b_6</th>
    <th width="3%">KJB_total_b_7</th>
    <th width="3%">KJB_total_b_8</th>
    <th width="3%">KJB_total_b_9</th>
    <th width="3%">KJB_total_b_10</th>
    <th width="3%">KJB_total_b_11</th>
    <th width="3%">KJB_total_b_12</th>
    <th width="3%">KJB_total_b</th>
    <th width="3%">KP_a_1</th>
    <th width="3%">KP_a_2</th>
    <th width="3%">KP_a_3</th>
    <th width="3%">KP_a_4</th>
    <th width="3%">KP_total_b</th>
    <th width="3%">KPB_a_1</th>
    <th width="3%">KPB_a_2</th>
    <th width="3%">KPB_a_3</th>
    <th width="3%">KPB_a_4</th>
    <th width="3%">KPB_total_b</th>
    
    <th width="3%">KA_a_1</th>
    <th width="3%">KA_a_2</th>
    <th width="3%">KA_a_3</th>
    <th width="3%">KA_total_a</th>
    <th width="3%">KA_b_1a</th>
    <th width="3%">KA_b_1b</th>
    <th width="3%">KA_b_1c</th>
    <th width="3%">KA_total_b_1</th>
    <th width="3%">KA_total_b_2</th>
    <th width="3%">KA_total_b</th>
    
    <th width="3%">KAB_a_1</th>
    <th width="3%">KAB_a_2</th>
    <th width="3%">KAB_a_3</th>
    <th width="3%">KAB_total_a</th>
    <th width="3%">KAB_b_1a</th>
    <th width="3%">KAB_b_1b</th>
    <th width="3%">KAB_b_1c</th>
    <th width="3%">KAB_total_b_1</th>
    <th width="3%">KAB_total_b_2</th>
    <th width="3%">KAB_total_b</th>

    <th width="3%">KBA_emolumen</th>
    <th width="3%">KBA_kos_ibupejabat</th>
    <th width="3%">KBA_kos_agensi</th>
    <th width="3%">KBA_kebajikan</th>
    <th width="3%">KBA_sewa_tol</th>
    <th width="3%">KBA_penyelidikan</th>
    <th width="3%">KBA_perubatan</th>
    <th width="3%">KBA_penyelenggaraan</th>
    <th width="3%">KBA_cukai_keuntungan</th>
    <th width="3%">KBA_penjagaan</th>
    <th width="3%">KBA_kawalan</th>
    <th width="3%">KBA_air_tenaga</th>
    <th width="3%">KBA_perbelanjaan_pejabat</th>
    <th width="3%">KBA_susut_nilai</th>
    <th width="3%">KBA_perbelanjaan_lain</th>
    <th width="3%">KBA_total_perbelanjaan</th>
    
    <th width="3%">KBAB_emolumen</th>
    <th width="3%">KBAB_kos_ibupejabat</th>
    <th width="3%">KBAB_kos_agensi</th>
    <th width="3%">KBAB_kebajikan</th>
    <th width="3%">KBAB_sewa_tol</th>
    <th width="3%">KBAB_penyelidikan</th>
    <th width="3%">KBAB_perubatan</th>
    <th width="3%">KBAB_penyelenggaraan</th>
    <th width="3%">KBAB_cukai_keuntungan</th>
    <th width="3%">KBAB_penjagaan</th>
    <th width="3%">KBAB_kawalan</th>
    <th width="3%">KBAB_air_tenaga</th>
    <th width="3%">KBAB_perbelanjaan_pejabat</th>
    <th width="3%">KBAB_susut_nilai</th>
    <th width="3%">KBAB_perbelanjaan_lain</th>
    <th width="3%">KBAB_total_perbelanjaan</th>
    
  </tr>
  <?php
 $con=connect();
 /*$q="select * from login_estate where success!='0000-00-00 00:00:00' and firsttime ='2' and lesen not like '123456%' and lesen <> '' group by lesen order by lesen  ";*/
 
 if ($tahun == date('Y')) {
    $table = 'esub';
} else {
    $table = "esub_" . $tahun;
}
		
	$q = "SELECT b.lesen FROM $table a  
			INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen 
            LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$tahun' 
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$tahun'  
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$tahun' 
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$tahun'
			WHERE   
            b.lesen not like '%123456%'  
		    and a.No_Lesen_Baru <> '' 
			and a.No_Lesen_Baru not like '%123456%'  
			and a.nama_estet!=''  
			and (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)";
 
 
 $r=mysql_query($q,$con);
 $total_data_proses = mysql_num_rows($r);
  
 $bil=0;
  
 $tahun_pendek = substr($tahun,-2);
 $one = $tahun_pendek-1;
 if(strlen($one)=='1'){$one = "0".$one;}
 $two = $tahun_pendek-2;
 if(strlen($two)=='1'){$two = "0".$two;}
 $three = $tahun_pendek-3;
 if(strlen($three)=='1'){$three = "0".$three;}
  
 while($row=mysql_fetch_array($r)){
 	$ps1 = luas_data("tanam_semula","tanaman_semula", $tahun-1,$row['lesen']);
 	$ps2 = luas_data("tanam_semula","tanaman_semula", $tahun-2,$row['lesen']);
	$ps3 = luas_data("tanam_semula","tanaman_semula", $tahun-3,$row['lesen']);
 
 	$pb1 = luas_data("tanam_baru","tanaman_baru", $tahun-1,$row['lesen']);
 	$pb2 = luas_data("tanam_baru","tanaman_baru", $tahun-2,$row['lesen']);
 	$pb3 = luas_data("tanam_baru","tanaman_baru", $tahun-3,$row['lesen']);

 	$pt1 = luas_data("tanam_tukar","tanaman_tukar", $tahun-1,$row['lesen']);
 	$pt2 = luas_data("tanam_tukar","tanaman_tukar", $tahun-2,$row['lesen']);
 	$pt3 = luas_data("tanam_tukar","tanaman_tukar", $tahun-3,$row['lesen']);

	$jumlah_semua = $pb1+$pb2+$pb3 + $ps1+$ps2+$ps3 + $pt1+$pt2+$pt3;
  ?>
  <tr>
    <td><?php echo ++$bil; ?>. </td>
    <td><?php echo $row['lesen'];?></td>
    <td><?php $nl = esub($row['lesen'], $tahun); echo $nl[0];?></td>
    <td><?php echo $nl[1];?></td>
    <td><?php echo $nl[2];?></td>
    <td><?php echo $nl[3];?></td>
    <td><?php $luas = luas($row['lesen'],"tanam_baru".$one,'tanaman_baru'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Baru','1',$luas[0],$nl[1],$nl[2]); echo $kbm[0];?></td>
    <td><?php echo $kbm[1];?></td>
    <td><?php echo $kbm[2];?></td>
    <td><?php echo $kbm[3];?></td>
    <td><?php echo $kbm[4];?></td>
    <td><?php echo $kbm[5];?></td>
    <td><?php echo $kbm[6];?></td>
    <td><?php echo $kbm[7];?></td>
    <td><?php echo $kbm[8];?></td>
    <td><?php echo $kbm[9];?></td>
    <td><?php echo $kbm[10];?></td>
    <td><?php echo $kbm[11];?></td>
    <td><?php echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
   
    <td><?php echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    
    <td><?php $luas = luas($row['lesen'],"tanam_baru".$two,'tanaman_baru'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Baru','2',$luas[0],$nl[1],$nl[2]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?>    </td>
    
    
    <td><?php $luas = luas($row['lesen'],"tanam_baru".$three,'tanaman_baru'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Baru','3',$luas[0],$nl[1],$nl[2]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    <td><?php $luas = luas($row['lesen'],"tanam_semula".$one,'tanaman_semula'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Semula','1',$luas[0],$nl[1],$nl[2]); echo $kbm[0];?></td>
    <td><?php echo $kbm[1];?></td>
    <td><?php echo $kbm[2];?></td>
    <td><?php echo $kbm[3];?></td>
    <td><?php echo $kbm[4];?></td>
    <td><?php echo $kbm[5];?></td>
    <td><?php echo $kbm[6];?></td>
    <td><?php echo $kbm[7];?></td>
    <td><?php echo $kbm[8];?></td>
    <td><?php echo $kbm[9];?></td>
    <td><?php echo $kbm[10];?></td>
    <td><?php echo $kbm[11];?></td>
    
    <td><?php $luas = luas($row['lesen'],"tanam_semula".$two,'tanaman_semula'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Semula','2',$luas[0],$nl[1],$nl[2]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    
    <td><?php $luas = luas($row['lesen'],"tanam_semula".$three,'tanaman_semula'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Semula','3',$luas[0],$nl[1],$nl[2]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    <!-- --- ------ ------ --- - - -- - - -- - -   -- -- - --->
    <td><?php $luas = luas($row['lesen'],"tanam_tukar".$one,'tanaman_tukar'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penukaran','1',$luas[0],$nl[1],$nl[2]); echo $kbm[0];?></td>
    <td><?php echo $kbm[1];?></td>
    <td><?php echo $kbm[2];?></td>
    <td><?php echo $kbm[3];?></td>
    <td><?php echo $kbm[4];?></td>
    <td><?php echo $kbm[5];?></td>
    <td><?php echo $kbm[6];?></td>
    <td><?php echo $kbm[7];?></td>
    <td><?php echo $kbm[8];?></td>
    <td><?php echo $kbm[9];?></td>
    <td><?php echo $kbm[10];?></td>
    <td><?php echo $kbm[11];?></td>
    
    <td><?php $luas = luas($row['lesen'],"tanam_tukar".$two,'tanaman_tukar'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penukaran','2',$luas[0],$nl[1],$nl[2]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    <td><?php $luas = luas($row['lesen'],"tanam_tukar".$three,'tanaman_tukar'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penukaran','3',$luas[0],$nl[1],$nl[2]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    <td><?php echo $nl[4];?></td>
    <td><?php $bts=bts($row['lesen'], $tahun); echo $bts[0];?></td>
    <td><?php $jaga = kos_matang_penjagaan($row['lesen'],$tahun,$nl[4],$bts[0],$nl[1],$nl[2]); echo $jaga[0];?></td>
    <td><?php echo $jaga[1];?></td>
    <td><?php echo $jaga[2];?></td>
    <td><?php echo $jaga[3];?></td>
    <td><?php echo $jaga[4];?></td>
    <td><?php echo $jaga[5];?></td>
    <td><?php echo $jaga[6];?></td>
    <td><?php echo $jaga[7];?></td>
    <td><?php echo $jaga[8];?></td>
    <td><?php echo $jaga[9];?></td>
    <td><?php echo $jaga[10];?></td>
    <td><?php echo $jaga[11];?></td>
    <td><?php echo $jaga[12];?></td>
    <td><?php echo $jaga[13];?></td>
    <td><?php echo $jaga[14];?></td>
    <td><?php echo $jaga[15];?></td>
    <td><?php echo $jaga[16];?></td>
    <td><?php echo $jaga[17];?></td>
    <td><?php echo $jaga[18];?></td>
    <td><?php echo $jaga[19];?></td>
    
    <td><?php echo $jaga[20];?></td>
    <td><?php echo $jaga[21];?></td>
    <td><?php echo $jaga[22];?></td>
    <td><?php echo $jaga[23];?></td>
    <td><?php echo $jaga[24];?></td>
    <td><?php echo $jaga[25];?></td>
    <td><?php echo $jaga[26];?></td>
    <td><?php echo $jaga[27];?></td>
    <td><?php echo $jaga[28];?></td>
    <td><?php echo $jaga[29];?></td>
    <td><?php echo $jaga[30];?></td>
    <td><?php echo $jaga[31];?></td>
    <td><?php echo $jaga[32];?></td>
    <td><?php echo $jaga[33];?></td>
    <td><?php echo $jaga[34];?></td>
    <td><?php echo $jaga[35];?></td>
    <td><?php echo $jaga[36];?></td>
    <td><?php echo $jaga[37];?></td>
    <td><?php echo $jaga[38];?></td>
    <td><?php echo $jaga[39];?></td>
    
    <td><?php $kt = kos_matang_penuaian($row['lesen'],$tahun,$nl[4],$bts[0], $nl[1],$nl[2]); echo $kt[0];?></td>
    <td><?php echo $kt[1];?></td>
    <td><?php echo $kt[2];?></td>
    <td><?php echo $kt[3];?></td>
    <td><?php echo $kt[4];?></td>
    <td><?php echo $kt[5];?></td>
    <td><?php echo $kt[6];?></td>
    <td><?php echo $kt[7];?></td>
    <td><?php echo $kt[8];?></td>
    <td><?php echo $kt[9];?></td>
    
    <td><?php $ka = kos_matang_pengangkutan($row['lesen'],$tahun,$nl[4],$bts[0],$nl[1],$nl[2]); echo $ka[0];?></td>
    <td><?php echo $ka[1];?></td>
    <td><?php echo $ka[2];?></td>
    <td><?php echo $ka[3];?></td>
    <td><?php echo $ka[4];?></td>
    <td><?php echo $ka[5];?></td>
    <td><?php echo $ka[6];?></td>
    <td><?php echo $ka[7];?></td>
    <td><?php echo $ka[8];?></td>
    <td><?php echo $ka[9];?></td>
    <td><?php echo $ka[10];?></td>
    <td><?php echo $ka[11];?></td>
    <td><?php echo $ka[12];?></td>
    <td><?php echo $ka[13];?></td>
    <td><?php echo $ka[14];?></td>
    <td><?php echo $ka[15];?></td>
    <td><?php echo $ka[16];?></td>
    <td><?php echo $ka[17];?></td>
    <td><?php echo $ka[18];?></td>
    <td><?php echo $ka[19];?></td>
    
    <td><?php $kba = kos_belanja_am($row['lesen'],$tahun,$nl[4],$bts[0]+$jumlah_semua, $nl[1],$nl[2]); echo $kba[0]; ?></td>
    <td><?php echo $kba[1]; ?></td>
    <td><?php echo $kba[2]; ?></td>
    <td><?php echo $kba[3]; ?></td>
    <td><?php echo $kba[4]; ?></td>
    <td><?php echo $kba[5]; ?></td>
    <td><?php echo $kba[6]; ?></td>
    <td><?php echo $kba[7]; ?></td>
    <td><?php echo $kba[8]; ?></td>
    <td><?php echo $kba[9]; ?></td>
    <td><?php echo $kba[10]; ?></td>
    <td><?php echo $kba[11]; ?></td>
    <td><?php echo $kba[12]; ?></td>
    <td><?php echo $kba[13]; ?></td>
    <td><?php echo $kba[14]; ?></td>
    <td><?php echo $kba[15]; ?></td>
    
    <td><?php echo $kba[16]; ?></td>
    <td><?php echo $kba[17]; ?></td>
    <td><?php echo $kba[18]; ?></td>
    <td><?php echo $kba[19]; ?></td>
    <td><?php echo $kba[20]; ?></td>
    <td><?php echo $kba[21]; ?></td>
    <td><?php echo $kba[22]; ?></td>
    <td><?php echo $kba[23]; ?></td>
    <td><?php echo $kba[24]; ?></td>
    <td><?php echo $kba[25]; ?></td>
    <td><?php echo $kba[26]; ?></td>
    <td><?php echo $kba[27]; ?></td>
    <td><?php echo $kba[28]; ?></td>
    <td><?php echo $kba[29]; ?></td>
    <td><?php echo $kba[30]; ?></td>
    <td><?php echo $kba[31]; ?></td>
    
  </tr>
  <?php 
   //sleep(2);
  }
  ?>
</table>
<p>&nbsp;</p>
<table width="60%">
  <tr>
    <td>PB1</td>
    <td>PENANAMAN BARU TAHUN PERTAMA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PB2</td>
    <td>PENANAMAN BARU TAHUN KEDUA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PB3</td>
    <td>PENANAMAN BARU TAHUN KETIGA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td width="3%">PS1</td>
    <td width="97%">PENANAMAN SEMULA TAHUN PERTAMA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PS2</td>
    <td>PENANAMAN SEMULA TAHUN KEDUA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PS3</td>
    <td>PENANAMAN SEMULA TAHUN KETIGA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PT1</td>
    <td>PENUKARAN TAHUN PERTAMA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PT2</td>
    <td>PENUKARAN TAHUN KEDUA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PT3</td>
    <td>PENUKARAN TAHUN KETIGA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>KJ</td>
    <td>KOS PENJAGAAN (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>KJB</td>
    <td>KOS PENJAGAAN (Kos Per Tan BTS (RM))</td>
  </tr>
  <tr>
    <td>KT</td>
    <td>KOS PENUAIAN (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>KTB</td>
    <td>KOS PENUAIAN (Kos Per Tan BTS (RM))</td>
  </tr>
  <tr>
    <td>KBA</td>
    <td>KOS PERBELANJAAN AM (Kos Per Hektar (RM))</td>
  </tr>
  <tr>
    <td>KBAB</td>
    <td>KOS PERBELANJAAN AM (Kos Per Tan BTS (RM))</td>
  </tr>
</table>
