<?php 
include ('../Connections/connection.class.php');
include('baju_merah.php');
$con = connect();
extract($_REQUEST);
?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {font-weight: bold}
.style3 {font-weight: bold}
.style4 {font-weight: bold}
 body,td,th {
        font-size: 12px;
    }
-->
</style>

<?php
$con=connect();
  
function pertama($tahun, $nama, $status,$negeri,$daerah, $type, $tahuntanam){
	global $con;
	$sql = "SELECT * FROM graf_kbm where sessionid='$nama' 
	and tahun ='$tahun' 
	and (status='$status' or status='9')  
	and pb_type = '$type' 
	and pb_tahun = '$tahuntanam'";
	if($negeri!="" & $negeri!="peninsular")
	{
		$sql.=" and negeri = '$negeri'";
	} 
	if($negeri!="" && $daerah!="")
	{
		$sql.=" and daerah = '$daerah'";
	} 
	if($negeri=="peninsular")
	{
		$sql.=" and negeri not like 'SARAWAK' and negeri not like 'SABAH'";
	} 

	$sql_result = mysql_query($sql,$con); 
	$i=0; 
	while ($row = mysql_fetch_array($sql_result)) 
	{ 
		$test_data[] = $row["y"];
		$i = $i + 1; 
	} 
			
	$qavg = "SELECT AVG(y) as purata FROM graf_kbm where sessionid='$nama' and tahun ='$tahun' and (status='$status' or status='9')  and pb_type='$type' and  pb_tahun = '$tahuntanam'";
	if($negeri!="" & $negeri!="peninsular")
	{
		$qavg.=" and negeri = '$negeri'";
	} 
	if($negeri!="" && $daerah!="")
	{
		$qavg.=" and daerah = '$daerah'";
	} 
	if($negeri=="peninsular")
	{
		$qavg.=" and (negeri not like 'SARAWAK' and negeri not like 'SABAH')";
	} 
		
	//echo $qavg."<br>";
	$ravg = mysql_query($qavg,$con);
	$rrow = mysql_fetch_array($ravg);
		
		
	$var[0] = median($test_data);
	$var[1] = $rrow['purata'];		
	return $var; 
}

function cop ($name, $type, $year, $state, $district, $tahun_r){
	global $con;
	$q_cop = "select  * from cop where
	NAME ='$name' and TYPE= '$type' and YEAR= '$year' and STATE= '$state' and DISTRICT= '$district' and YEAR_REPORT='$tahun_r'";
	$r_cop = mysql_query($q_cop, $con);
	$row_cop = mysql_fetch_array($r_cop);
	//echo $q_cop;
	$var[0] = $row_cop['VALUE_MEDIAN'];
	$var[1] = $row_cop['VALUE_MEAN'];
	return $var;
}
		
function summary($tahun_tanam ,$tahun, $jenis, $negeri, $daerah ){
	global $con;
	
	if($tahun_tanam=="" || $tahun_tanam=='1'){
		$qs =" select * from q_kbm"; 
	} 
	else {
		$qs = " select * from q_kbm where tahun!='0'";
	}

	$r = mysql_query($qs, $con);
	
	while($rows = mysql_fetch_array($r)){
		if($rows['isChild'] == 'N' && strlen($rows['sub_type']) > 0){
			if($rows['sub_type'] == "weeding"){
				if($tahun==2010){
					$total = cop ( $rows['name'],  $jenis, $tahun_tanam, $negeri, $daerah, $tahun);
					$sum+=$total[1];
				}else{
					$total1 = pertama($tahun, "Purchase of weedicides", '0', $negeri, $daerah, $jenis, $tahun_tanam);
					$total2 = pertama($tahun, "Labour cost for weeding", '0', $negeri, $daerah, $jenis, $tahun_tanam);
					$total3 = pertama($tahun, "Machinery use and maintenance", '0', $negeri, $daerah, $jenis, $tahun_tanam);
					$sum+=($total1[1]+$total2[1]+$total3[1]);
				}
			}elseif($rows['sub_type'] == "fertilizing"){
				if($tahun==2010){
					$total = cop ( $rows['name'],  $jenis, $tahun_tanam, $negeri, $daerah, $tahun);
					$sum+=$total[1];
				}else{
					$total7 = pertama($tahun, "Purchase of fertilizer", '0', $negeri, $daerah, $jenis, $tahun_tanam);
					$total8 = pertama($tahun, "Labour cost to apply fertilizers", '0', $negeri, $daerah, $jenis, $tahun_tanam);
					$total9 = pertama($tahun, "Machinery use and maintenances", '0', $negeri, $daerah, $jenis, $tahun_tanam);
					$total10 = pertama($tahun, "Soil and foliar analysis", '0', $negeri, $daerah, $jenis, $tahun_tanam);
					$sum+=($total7[1]+$total8[1]+$total9[1]+$total10[1]);
				}
			}
		}else{
			if($rows['isChild'] == "Y"){
				continue;
			}

			if($tahun==2010){
				$total = cop ( $rows['name'],  $jenis, $tahun_tanam, $negeri, $daerah, $tahun);
			}else{
				$a= pertama ($tahun,  $rows['name'], '0',$negeri, $daerah, $jenis, $tahun_tanam);
				$sum+=$a[1];
			}
		}
	}
	
	$variable[0] = $sum;	
	return $variable;
}

function median($numbers=array())
{
	if (!is_array($numbers))
		$numbers = func_get_args();
	
	rsort($numbers);
	$mid = (count($numbers) / 2);
	return ($mid % 2 != 0) ? $numbers{$mid-1} : (($numbers{$mid-1}) + $numbers{$mid}) / 2;
}

function summary_parenthesis($tahun_tanam ,$tahun, $jenis, $negeri, $daerah ){
	global $con;

	$qs = " select * from q_kbm where tahun = '0'";
	$r = mysql_query($qs, $con);
	while($rows = mysql_fetch_array($r)){
		if($tahun==2010){
			$total = cop ( $rows['name'],  $jenis, $tahun_tanam, $negeri, $daerah, $tahun);
		}else{
			$a= pertama ($tahun,  $rows['name'], '0',$negeri, $daerah, $jenis, $tahun_tanam);
			$sum+=$a[1];
		}
	}
	
	
	$purata[0] = $sum;
	
	return $purata;
	
}
?>
<table width="80%" border="0" align="center" class="baju">
  <tr>
    <td height="26" colspan="5"><div align="center">
      <h2>Cost to Maturity <?php echo $_COOKIE['tahun_report']-1; ?> (RM / hectare)</h2></div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td width="16%" height="33">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="21%"><div align="center" class="style1">New Planting</div></td>
    <td width="23%"><div align="center" class="style1">Replanting</div></td>
    <td width="23%" bgcolor="#8A1602"><div align="center" class="style1">Conversion</div></td>
  </tr>
  <tr class="alt">
    <td>Malaysia</td>
    <td>Year 1</td>
    <td><div align="center"><?php $malaysia_1baru = summary('1',$_COOKIE['tahun_report'], 'Penanaman Baru','',''); echo number_format($malaysia_1baru[0],2);?></div></td>
    <td><div align="center">
      <?php $malaysia_1semula = summary('1',$_COOKIE['tahun_report'], 'Penanaman Semula','',''); echo number_format($malaysia_1semula[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $malaysia_1tukar = summary('1',$_COOKIE['tahun_report'], 'Penukaran','',''); echo number_format($malaysia_1tukar[0],2);?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Non-Recurrent Cost</td>
    <td><div align="center">
      (<?php $malaysia_1baru_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penanaman Baru','',''); echo number_format($malaysia_1baru_par[0],2);?>
    )</div></td>
    <td><div align="center">(
        <?php $malaysia_1semula_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penanaman Semula','',''); echo number_format($malaysia_1semula_par[0],2);?> )
    </div></td>
    <td><div align="center">(
        <?php $malaysia_1tukar_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penukaran','',''); echo number_format($malaysia_1tukar_par[0],2);?>
 )   </div></td>
  </tr>
  <tr class="alt">
    <td>&nbsp;</td>
    <td>Year 2</td>
    <td><div align="center"><?php $malaysia_2baru = summary('2',$_COOKIE['tahun_report'], 'Penanaman Baru','',''); echo number_format($malaysia_2baru[0],2);?></div></td>
    <td><div align="center"><?php $malaysia_2semula = summary('2',$_COOKIE['tahun_report'], 'Penanaman Semula','',''); echo number_format($malaysia_2semula[0],2);?></div></td>
    <td><div align="center"><?php $malaysia_2tukar = summary('2',$_COOKIE['tahun_report'], 'Penukaran','',''); echo number_format($malaysia_2tukar[0],2);?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Year 3</td>
    <td><div align="center">
      <?php $malaysia_3baru = summary('3',$_COOKIE['tahun_report'], 'Penanaman Baru','',''); echo number_format($malaysia_3baru[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $malaysia_3semula = summary('3',$_COOKIE['tahun_report'], 'Penanaman Semula','',''); echo number_format($malaysia_3semula[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $malaysia_3tukar = summary('3',$_COOKIE['tahun_report'], 'Penukaran','',''); echo number_format($malaysia_3tukar[0],2);?>
    </div></td>
  </tr>
  <tr class="alt">
    <td>&nbsp;</td>
    <td>Total</td>
    <td><div align="center">
      <?php $malaysia_baru= $malaysia_1baru[0]+$malaysia_2baru[0]+$malaysia_3baru[0]; echo number_format($malaysia_baru,2);?>
    </div></td>
    <td><div align="center">
      <?php $malaysia_semula = $malaysia_1semula[0]+$malaysia_2semula[0]+$malaysia_3semula[0]; echo number_format($malaysia_semula,2);?>
    </div></td>
    <td><div align="center">
      <?php $malaysia_tukar = $malaysia_1tukar[0]+$malaysia_2tukar[0]+$malaysia_3tukar[0]; echo number_format($malaysia_tukar,2);?>
    </div></td>
  </tr>
  <tr>
    <td style="border-bottom:#000000 1px solid;">&nbsp;</td>
    <td style="border-bottom:#000000 1px solid;"><strong>Average</strong></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style2">
      <?php $purata1= $malaysia_baru/3; echo number_format($purata1,2);?>
    </span></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style3">
      <?php $purata2= $malaysia_semula/3; echo number_format($purata2,2);?>
    </span></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style4">
      <?php $purata3= $malaysia_tukar/3; echo number_format($purata3,2);?>
    </span></div></td>
  </tr>
  
  
  
  <tr class="alt">
    <td>Peninsular</td>
    <td>Year 1</td>
    <td><div align="center"><?php $peninsular_1baru = summary('1',$_COOKIE['tahun_report'], 'Penanaman Baru','peninsular',''); echo number_format($peninsular_1baru[0],2);?></div></td>
    <td><div align="center">
      <?php $peninsular_1semula = summary('1',$_COOKIE['tahun_report'], 'Penanaman Semula','peninsular',''); echo number_format($peninsular_1semula[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $peninsular_1tukar = summary('1',$_COOKIE['tahun_report'], 'Penukaran','peninsular',''); echo number_format($peninsular_1tukar[0],2);?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Non-Recurrent Cost</td>
    <td><div align="center">(
      <?php $peninsular_1baru_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penanaman Baru','peninsular',''); echo number_format($peninsular_1baru_par[0],2);?>
    )</div></td>
    <td><div align="center">(
      <?php $peninsular_1semula_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penanaman Semula','peninsular',''); echo number_format($peninsular_1semula_par[0],2);?>
    )</div></td>
    <td><div align="center">(
      <?php $peninsular_1tukar_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penukaran','peninsular',''); echo number_format($peninsular_1tukar_par[0],2);?>
    )</div></td>
  </tr>
  <tr  class="alt">
    <td>&nbsp;</td>
    <td>Year 2</td>
    <td><div align="center"><?php $peninsular_2baru = summary('2',$_COOKIE['tahun_report'], 'Penanaman Baru','peninsular',''); echo number_format($peninsular_2baru[0],2);?></div></td>
    <td><div align="center"><?php $peninsular_2semula = summary('2',$_COOKIE['tahun_report'], 'Penanaman Semula','peninsular',''); echo number_format($peninsular_2semula[0],2);?></div></td>
    <td><div align="center"><?php $peninsular_2tukar = summary('2',$_COOKIE['tahun_report'], 'Penukaran','peninsular',''); echo number_format($peninsular_2tukar[0],2);?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Year 3</td>
    <td><div align="center">
      <?php $peninsular_3baru = summary('3',$_COOKIE['tahun_report'], 'Penanaman Baru','peninsular',''); echo number_format($peninsular_3baru[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $peninsular_3semula = summary('3',$_COOKIE['tahun_report'], 'Penanaman Semula','peninsular',''); echo number_format($peninsular_3semula[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $peninsular_3tukar = summary('3',$_COOKIE['tahun_report'], 'Penukaran','peninsular',''); echo number_format($peninsular_3tukar[0],2);?>
    </div></td>
  </tr>
  <tr class="alt">
    <td>&nbsp;</td>
    <td>Total</td>
    <td><div align="center">
      <?php $peninsular_baru= $peninsular_1baru[0]+$peninsular_2baru[0]+$peninsular_3baru[0]; echo number_format($peninsular_baru,2);?>
    </div></td>
    <td><div align="center">
      <?php $peninsular_semula = $peninsular_1semula[0]+$peninsular_2semula[0]+$peninsular_3semula[0]; echo number_format($peninsular_semula,2);?>
    </div></td>
    <td><div align="center">
      <?php $peninsular_tukar = $peninsular_1tukar[0]+$peninsular_2tukar[0]+$peninsular_3tukar[0]; echo number_format($peninsular_tukar,2);?>
    </div></td>
  </tr>
  <tr>
    <td style="border-bottom:#000000 1px solid;">&nbsp;</td>
    <td style="border-bottom:#000000 1px solid;"><strong>Average</strong></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style2">
      <?php $purata1_peninsular= $peninsular_baru/3; echo number_format($purata1_peninsular,2);?>
    </span></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style3">
      <?php $purata2_peninsular= $peninsular_semula/3; echo number_format($purata2_peninsular,2);?>
    </span></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style4">
      <?php $purata3_peninsular= $peninsular_tukar/3; echo number_format($purata3_peninsular,2);?>
    </span></div></td>
  </tr>
  
  <tr class="alt">
    <td>Sabah</td>
    <td>Year 1</td>
    <td><div align="center"><?php $sabah_1baru = summary('1',$_COOKIE['tahun_report'], 'Penanaman Baru','sabah',''); echo number_format($sabah_1baru[0],2);?></div></td>
    <td><div align="center">
      <?php $sabah_1semula = summary('1',$_COOKIE['tahun_report'], 'Penanaman Semula','sabah',''); echo number_format($sabah_1semula[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $sabah_1tukar = summary('1',$_COOKIE['tahun_report'], 'Penukaran','sabah',''); echo number_format($sabah_1tukar[0],2);?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Non-Recurrent Cost</td>
    <td><div align="center">(
      <?php $sabah_1baru_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penanaman Baru','sabah',''); echo number_format($sabah_1baru_par[0],2);?>
    )</div></td>
    <td><div align="center">(
      <?php $sabah_1semula_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penanaman Semula','sabah',''); echo number_format($sabah_1semula_par[0],2);?>
    )</div></td>
    <td><div align="center">(
      <?php $sabah_1tukar_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penukaran','sabah',''); echo number_format($sabah_1tukar_par[0],2);?>
    )</div></td>
  </tr>
  <tr  class="alt">
    <td>&nbsp;</td>
    <td>Year 2</td>
    <td><div align="center"><?php $sabah_2baru = summary('2',$_COOKIE['tahun_report'], 'Penanaman Baru','sabah',''); echo number_format($sabah_2baru[0],2);?></div></td>
    <td><div align="center"><?php $sabah_2semula = summary('2',$_COOKIE['tahun_report'], 'Penanaman Semula','sabah',''); echo number_format($sabah_2semula[0],2);?></div></td>
    <td><div align="center"><?php $sabah_2tukar = summary('2',$_COOKIE['tahun_report'], 'Penukaran','sabah',''); echo number_format($sabah_2tukar[0],2);?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Year 3</td>
    <td><div align="center">
      <?php $sabah_3baru = summary('3',$_COOKIE['tahun_report'], 'Penanaman Baru','sabah',''); echo number_format($sabah_3baru[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $sabah_3semula = summary('3',$_COOKIE['tahun_report'], 'Penanaman Semula','sabah',''); echo number_format($sabah_3semula[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $sabah_3tukar = summary('3',$_COOKIE['tahun_report'], 'Penukaran','sabah',''); echo number_format($sabah_3tukar[0],2);?>
    </div></td>
  </tr>
  <tr  class="alt">
    <td>&nbsp;</td>
    <td>Total</td>
    <td><div align="center">
      <?php $sabah_baru= $sabah_1baru[0]+$sabah_2baru[0]+$sabah_3baru[0]; echo number_format($sabah_baru,2);?>
    </div></td>
    <td><div align="center">
      <?php $sabah_semula = $sabah_1semula[0]+$sabah_2semula[0]+$sabah_3semula[0]; echo number_format($sabah_semula,2);?>
    </div></td>
    <td><div align="center">
      <?php $sabah_tukar = $sabah_1tukar[0]+$sabah_2tukar[0]+$sabah_3tukar[0]; echo number_format($sabah_tukar,2);?>
    </div></td>
  </tr>
  <tr>
    <td style="border-bottom:#000000 1px solid;">&nbsp;</td>
    <td style="border-bottom:#000000 1px solid;"><strong>Average</strong></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style2">
      <?php $purata1_sabah= $sabah_baru/3; echo number_format($purata1_sabah,2);?>
    </span></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style3">
      <?php $purata2_sabah= $sabah_semula/3; echo number_format($purata2_sabah,2);?>
    </span></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style4">
      <?php $purata3_sabah= $sabah_tukar/3; echo number_format($purata3_sabah,2);?>
    </span></div></td>
  </tr>
  
 
 
 
 
 
 <tr  class="alt">
    <td>Sarawak</td>
    <td>Year 1</td>
    <td><div align="center"><?php $sarawak_1baru = summary('1',$_COOKIE['tahun_report'], 'Penanaman Baru','sarawak',''); echo number_format($sarawak_1baru[0],2);?></div></td>
    <td><div align="center">
      <?php $sarawak_1semula = summary('1',$_COOKIE['tahun_report'], 'Penanaman Semula','sarawak',''); echo number_format($sarawak_1semula[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $sarawak_1tukar = summary('1',$_COOKIE['tahun_report'], 'Penukaran','sarawak',''); echo number_format($sarawak_1tukar[0],2);?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Non-Recurrent Cost</td>
    <td><div align="center">(
      <?php $sarawak_1baru_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penanaman Baru','sarawak',''); echo number_format($sarawak_1baru_par[0],2);?>
    )</div></td>
    <td><div align="center">(
      <?php $sarawak_1semula_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penanaman Semula','sarawak',''); echo number_format($sarawak_1semula_par[0],2);?>
    )</div></td>
    <td><div align="center">(
      <?php $sarawak_1tukar_par = summary_parenthesis('1',$_COOKIE['tahun_report'], 'Penukaran','sarawak',''); echo number_format($sarawak_1tukar_par[0],2);?>
    )</div></td>
  </tr>
  <tr class="alt">
    <td>&nbsp;</td>
    <td>Year 2</td>
    <td><div align="center"><?php $sarawak_2baru = summary('2',$_COOKIE['tahun_report'], 'Penanaman Baru','sarawak',''); echo number_format($sarawak_2baru[0],2);?></div></td>
    <td><div align="center"><?php $sarawak_2semula = summary('2',$_COOKIE['tahun_report'], 'Penanaman Semula','sarawak',''); echo number_format($sarawak_2semula[0],2);?></div></td>
    <td><div align="center"><?php $sarawak_2tukar = summary('2',$_COOKIE['tahun_report'], 'Penukaran','sarawak',''); echo number_format($sarawak_2tukar[0],2);?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Year 3</td>
    <td><div align="center">
      <?php $sarawak_3baru = summary('3',$_COOKIE['tahun_report'], 'Penanaman Baru','sarawak',''); echo number_format($sarawak_3baru[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $sarawak_3semula = summary('3',$_COOKIE['tahun_report'], 'Penanaman Semula','sarawak',''); echo number_format($sarawak_3semula[0],2);?>
    </div></td>
    <td><div align="center">
      <?php $sarawak_3tukar = summary('3',$_COOKIE['tahun_report'], 'Penukaran','sarawak',''); echo number_format($sarawak_3tukar[0],2);?>
    </div></td>
  </tr>
  <tr class="alt">
    <td>&nbsp;</td>
    <td>Total</td>
    <td><div align="center">
      <?php $sarawak_baru= $sarawak_1baru[0]+$sarawak_2baru[0]+$sarawak_3baru[0]; echo number_format($sarawak_baru,2);?>
    </div></td>
    <td><div align="center">
      <?php $sarawak_semula = $sarawak_1semula[0]+$sarawak_2semula[0]+$sarawak_3semula[0]; echo number_format($sarawak_semula,2);?>
    </div></td>
    <td><div align="center">
      <?php $sarawak_tukar = $sarawak_1tukar[0]+$sarawak_2tukar[0]+$sarawak_3tukar[0]; echo number_format($sarawak_tukar,2);?>
    </div></td>
  </tr>
  <tr> 
    <td style="border-bottom:#000000 1px solid;">&nbsp;</td>
    <td style="border-bottom:#000000 1px solid;"><strong>Average</strong></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style2">
      <?php $purata1_sarawak= $sarawak_baru/3; echo number_format($purata1_sarawak,2);?>
    </span></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style3">
      <?php $purata2_sarawak= $sarawak_semula/3; echo number_format($purata2_sarawak,2);?>
    </span></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="center"><span class="style4">
      <?php $purata3_sarawak= $sarawak_tukar/3; echo number_format($purata3_sarawak,2);?>
    </span></div></td>
  </tr>  <tr>
    <td colspan="5">Note: Cost in parenthesis is establishment cost.</td>
  </tr>
</table>
<p>&nbsp;</p>
