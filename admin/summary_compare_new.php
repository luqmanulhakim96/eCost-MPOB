<?php 
	include('baju_merah.php');

//------------- check if table exist --------------------------------
 $table = 'fbb_production'.$_COOKIE['tahun_report'];
function table_exists($tablename, $database = false) {

    if(!$database) {
        $res = mysql_query("SELECT DATABASE()");
        $database = mysql_result($res, 0);
    }

    $res = mysql_query("
        SELECT COUNT(*) AS count 
        FROM information_schema.tables 
        WHERE table_schema = '$database' 
        AND table_name = '$tablename'
    ");

    return mysql_result($res, 0) == 1;

}
if(table_exists($table)) {
/*	 echo "<script>alert('Table doesnt exist. Please select other year of ffb production');window.location.href='home.php?id=home_admin';</script>";
*/
}
else {
    // do something else
	 echo "<script>alert('Table doesnt exist. Please select other year of ffb production');window.location.href='home.php?id=home_admin';</script>";
}

//-------------------------------------------------------------------


function ffb_average($location)
	{
	$table = 'fbb_production'.$_COOKIE['tahun_report'];
		if($location == 'malaysia')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM $table";
		}
		else if($location=='peninsular')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM $table WHERE $table.negeri NOT LIKE '%SABAH%' AND $table.negeri NOT LIKE '%SARAWAK%'";
		}
		else if($location=='sabah')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM $table WHERE $table.negeri LIKE '%SABAH%'";
		}
		else if($location=='sarawak')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM $table WHERE $table.negeri LIKE '%SARAWAK%'";
		}
		
		$result = mysql_query($query) or die(mysql_error());
		$row 	= mysql_fetch_array($result);
		$total = mysql_num_rows($result);
		$var[0] = round($row['purata'],2);
		return $var; 
	}
//-----------------------------------------------------------------------------
function summary($table ,$tahun, $negeri ){
	$con=connect();
	 $q="select AVG(y) as nilai from $table where 
	tahun= '$tahun' and status='0'	
	";
	if($negeri=='peninsular'){
	$q.="and (negeri not like 'SABAH' and negeri not like 'SARAWAK')";
	}
	
	if($negeri=='sabah'){
	$q.="and negeri like 'SABAH' ";
	}
	
	if($negeri=='sarawak'){
	$q.="and negeri like 'SARAWAK' ";
	}
	
	//echo $q; 
	$r=mysql_query($q,$con);
	$row= mysql_fetch_array($r);
	
	$variable[0] = $row['nilai'];
	
	
	return $variable;
	
}
//-----------------------------------------------------------------------------
function oer($tahun , $negeri ){
	$con=connect();
	 $q="select sum(ffb_proses) as ffb, sum(pengeluaran_cpo) as cpo from ekilang where 
	tahun= '$tahun' 
	";
	if($negeri=='peninsular'){
	$q.="and (negeri not like 'SABAH' and negeri not like 'SARAWAK')";
	}
	
	if($negeri=='sabah'){
	$q.="and negeri like 'SABAH' ";
	}
	
	if($negeri=='sarawak'){
	$q.="and negeri like 'SARAWAK' ";
	}
	
	//echo $q; 
	$r=mysql_query($q,$con);
	$row= mysql_fetch_array($r);
	
	$variable[0] = $row['cpo']/$row['ffb']*100;
	
	
	return $variable;
	
}
//-----------------------------------------------------------------------------
function summary_mill($table ,$tahun, $negeri, $oil ){
	$con=connect();
	 $q="select AVG(y) as nilai from $table where 
	tahun= '$tahun' and status='0'	
	";
	if($negeri=='peninsular'){
	$q.="and (negeri not like 'SABAH' and negeri not like 'SARAWAK')";
	}
	
	if($negeri=='sabah'){
	$q.="and negeri like 'SABAH' ";
	}
	
	if($negeri=='sarawak'){
	$q.="and negeri like 'SARAWAK' ";
	}
	
	//echo $q; 
	$r=mysql_query($q,$con);
	$row= mysql_fetch_array($r);
	
	$variable[0] = $row['nilai'];
	$variable[1] = $row['nilai']*100/$oil;
	$variable[2] = $variable[0]+$variable[1];
	
	
	return $variable;
	
}
$tahun = $_COOKIE['tahun_report']-1;
?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {
	color: #006699;
	font-weight: bold;
}
.style3 {
	color: #993300;
	font-weight: bold;
}
.style4 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style><br />
<br />

<table width="80%" align="center" class="baju">
  <tr>
    <td height="26" colspan="5"><div align="center" class="style4">FFB &amp; CPO by Region</div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td width="40%" height="33">&nbsp;</td>
    <td width="17%"><div align="center" class="style1">
      <div align="right">Peninsular</div>
    </div></td>
    <td width="15%"><div align="center" class="style1">
      <div align="right">Sabah</div>
    </div></td>
    <td width="13%"><div align="center" class="style1">
      <div align="right">Sarawak</div>
    </div></td>
    <td width="14%" bgcolor="#8A1602"><div align="center" class="style1">
      <div align="right">Malaysia</div>
    </div></td>
  </tr>
  <tr class="alt">
    <td><strong><em>Average FFB Yield </em></strong></td>
    <td>
    
    <div align="right"><?php $peninsular = ffb_average('peninsular');echo $peninsular[0]; ?></div></td>
    <td><div align="right"><?php $sabah = ffb_average('sabah');echo $sabah[0]; ?></div></td>
    <td><div align="right"><?php $sarawak = ffb_average('sarawak');echo $sarawak[0]; ?></div></td>
    <td><div align="right"><?php $malaysia = ffb_average('malaysia');echo $malaysia[0]; ?></div></td>
  </tr>

  <tr>
    <td><strong>Immature Cost (RM/Ha) </strong></td>
    <td><div align="right"><?php $peninsular_ha= summary('graf_kbm',$_COOKIE['tahun_report'],'peninsular'); echo number_format($peninsular_ha[0],2);?></div></td>
    <td><div align="right"><?php $sabah_ha= summary('graf_kbm',$_COOKIE['tahun_report'],'sabah'); echo number_format($sabah_ha[0],2);?></div></td>
    <td><div align="right"><?php $sarawak_ha= summary('graf_kbm',$_COOKIE['tahun_report'],'sarawak'); echo number_format($sarawak_ha[0],2);?></div></td>
    <td><div align="right"><?php $malaysia_ha= summary('graf_kbm',$_COOKIE['tahun_report'],''); echo number_format($malaysia_ha[0],2);?></div></td>
  </tr>
 
  <tr class="alt">
    <td style="border-bottom:#000000 1px solid;"><strong>Immature Cost (RM/T FFB) </strong></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php $ffb_peninsular = $peninsular_ha[0]/$peninsular[0]/22*3; echo number_format($ffb_peninsular,2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php $ffb_sabah = $sabah_ha[0]/$sabah[0]/22*3; echo number_format($ffb_sabah,2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php $ffb_sarawak = $sarawak_ha[0]/$sarawak[0]/22*3; echo number_format($ffb_sarawak,2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php $ffb_malaysia = $malaysia_ha[0]/$malaysia[0]/22*3; echo number_format($ffb_malaysia,2);?></div></td>
  </tr>

  <tr>
    <td><strong>Mature Cost (RM/Ha) </strong></td>
    <td><div align="right">
      <?php $peninsular_ffb= summary('graf_km',$_COOKIE['tahun_report'],'peninsular'); echo number_format($peninsular_ffb[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $sabah_ffb= summary('graf_km',$_COOKIE['tahun_report'],'sabah'); echo number_format($sabah_ffb[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $sarawak_ffb= summary('graf_km',$_COOKIE['tahun_report'],'sarawak'); echo number_format($sarawak_ffb[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $malaysia_ffb= summary('graf_km',$_COOKIE['tahun_report'],''); echo number_format($malaysia_ffb[0],2);?>
    </div></td>
  </tr>

  <tr class="alt">
    <td style="border-bottom:#000000 1px solid;"><strong>Mature Cost (RM/T FFB) </strong></td>
   <td style="border-bottom:#000000 1px solid;"><div align="right"><?php $tffb_peninsular = $peninsular_ffb[0]/$peninsular[0]/22*3; echo number_format($tffb_peninsular,2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php $tffb_sabah = $sabah_ffb[0]/$sabah[0]/22*3; echo number_format($tffb_sabah,2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php $tffb_sarawak = $sarawak_ffb[0]/$sarawak[0]/22*3; echo number_format($tffb_sarawak,2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php $tffb_malaysia = $malaysia_ffb[0]/$malaysia[0]/22*3; echo number_format($tffb_malaysia,2);?></div></td>
  </tr>
  <tr class="kaki">
    <td style="border-bottom:#000000 1px solid;"><span class="style2">FBB Cost of Production (RM/T) </span></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php echo number_format($ffb_peninsular+$tffb_peninsular,2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php echo number_format($ffb_sabah+ $tffb_sabah,2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php echo number_format($ffb_sarawak+$tffb_sarawak ,2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right" class="style2"><?php echo number_format($ffb_malaysia+$tffb_malaysia,2);?></div></td>
  </tr>
  <tr>
    <td><strong><em>Average Oil Extraction Rate </em></strong></td>
    <td><div align="right"><?php $oer_peninsular = oer($tahun, 'peninsular'); echo number_format($oer_peninsular[0],2);?></div></td>
    <td><div align="right">
      <?php $oer_sabah = oer($tahun, 'sabah'); echo number_format($oer_sabah[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $oer_sarawak = oer($tahun, 'sarawak'); echo number_format($oer_sarawak[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $oer_malaysia = oer($tahun, 'malaysia'); echo number_format($oer_malaysia[0],2);?>
    </div></td>
  </tr>
  <tr class="alt">
    <td><strong>CPO Cost of Production (RM/T) </strong></td>
    <td><div align="right">
      <?php $peninsular_cpo= summary_mill('graf_mill',$_COOKIE['tahun_report'],'peninsular',$oer_peninsular[0]); echo number_format($peninsular_cpo[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $sabah_cpo= summary_mill('graf_mill',$_COOKIE['tahun_report'],'sabah',$oer_sabah[0]); echo number_format($sabah_cpo[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $sarawak_cpo= summary_mill('graf_mill',$_COOKIE['tahun_report'],'sarawak',$oer_sarawak[0]); echo number_format($sarawak_cpo[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $malaysia_cpo= summary_mill('graf_mill',$_COOKIE['tahun_report'],'',$oer_malaysia[0]); echo number_format($malaysia_cpo[0],2);?>
    </div></td>
  </tr>
  <tr>
    <td style="border-bottom:#000000 1px solid;"><strong>Processing Cost of CPO (RM/T) </strong></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php echo number_format($peninsular_cpo[1],2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php echo number_format($sabah_cpo[1],2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php echo number_format($sarawak_cpo[1],2);?></div></td>
    <td style="border-bottom:#000000 1px solid;"><div align="right"><?php echo number_format($malaysia_cpo[1],2);?></div></td>
  </tr>
  <tr class="kaki">
    <td><span class="style3">Total CPO Cost of Production (RM/T) </span></td>
    <td><div align="right"><?php echo number_format($peninsular_cpo[2],2);?></div></td>
    <td><div align="right"><?php echo number_format($sabah_cpo[2],2);?></div></td>
    <td><div align="right"><?php echo number_format($sarawak_cpo[2],2);?></div></td>
    <td><div align="right" class="style3"><?php echo number_format($malaysia_cpo[2],2);?></div></td>
  </tr>
</table>
<br />
<br />
