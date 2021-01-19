<?php include('baju_merah.php');

$_SESSION['ru']='';
$ru = explode('/',$_SERVER['REQUEST_URI']);
$_SESSION['ru']= end($ru);

function median($numbers=array())
{
	if (!is_array($numbers))
		$numbers = func_get_args();
	
	rsort($numbers);
	$mid = (count($numbers) / 2);
	return ($mid % 2 != 0) ? $numbers{$mid-1} : (($numbers{$mid-1}) + $numbers{$mid}) / 2;
}

function pertama($tahun, $nama, $status,$negeri,$daerah ){
$con=connect();
		
		$Company = array('publicagencies' => array("Agensi", "Public agencies"),
						 'cooperatives' => array("Koperasi", "Co-operatives"),
						 'publiclimitedcompany' => array("Syarikat Berhad", "Public limited company"),
						 'partnership' => array("Syarikat Perkongsian", "Partnership"),
						 'solepropriertorship' => array("Syarikat Perseorangan", "Sole propriertorship"),
						 'privatelimitedcompany' => array("Syarikat Sendirian Berhad", "Private limited company"));

		$qavg = "SELECT avg(y) as purata FROM graf_km where sessionid='$nama' and tahun ='$tahun' and status='$status' ";
		if ($negeri == "publicagencies" || $negeri == "cooperatives" || $negeri == "publiclimitedcompany" ||
			$negeri == "partnership" || $negeri == "solepropriertorship" || $negeri == "privatelimitedcompany") {
			$qavg .= " and lesen IN (SELECT lesen FROM estate_info WHERE syarikat IN ('".$Company[$negeri][0]."', '".$Company[$negeri][1]."'))";
		} else {
			if($negeri!="" & $negeri!="pm")
			{
				$qavg.=" and negeri = '$negeri'";
			} 
			if($negeri!="" && $daerah!="")
			{
				$qavg.=" and daerah = '$daerah'";
			} 
			if($negeri=="pm")
			{
				$qavg.=" and negeri not like 'SARAWAK' and negeri not like 'SABAH'";
			}
		}
		//echo $qavg; 
		
		$ravg = mysql_query($qavg,$con);
		$rrow = mysql_fetch_array($ravg);
		
		
	
			
		$qavg2 = "SELECT avg(y) as purata FROM graf_km_tan where sessionid='$nama' and tahun ='$tahun' and status='$status' ";
		if ($negeri == "publicagencies" || $negeri == "cooperatives" || $negeri == "publiclimitedcompany" ||
			$negeri == "partnership" || $negeri == "solepropriertorship" || $negeri == "privatelimitedcompany") {
			$qavg2 .= " and lesen IN (SELECT lesen FROM estate_info WHERE syarikat IN ('".$Company[$negeri][0]."', '".$Company[$negeri][1]."'))";
		} else {
			if($negeri!="" & $negeri!="pm")
			{
				$qavg2.=" and negeri = '$negeri'";
			} 
			if($negeri!="" && $daerah!="")
			{
				$qavg2.=" and daerah = '$daerah'";
			} 
			if($negeri=="pm")
			{
				$qavg2.=" and negeri not like 'SARAWAK' and negeri not like 'SABAH'";
			}
		}
	//echo $qavg2;
		
		$ravg2 = mysql_query($qavg2,$con);
		$rrow2= mysql_fetch_array($ravg2);
		
		
			$var[0] = $rrow['purata'];	
			$var[1] = $rrow2['purata'];	
				
				return $var; 
				
		}	


	//-------------------cop --------------
		function cop ($name, $type, $year, $state, $district, $tahun_r){
				$con =connect();
				$q_cop = "select  * from cop where
				NAME ='$name' and TYPE= '$type' and YEAR= '$year' and STATE= '$state' and DISTRICT= '$district' and YEAR_REPORT='$tahun_r'";
				$r_cop = mysql_query($q_cop, $con);
				$row_cop = mysql_fetch_array($r_cop);
				
				$var[1] = $row_cop['VALUE_MEDIAN'];
				$var[0] = $row_cop['VALUE_MEAN'];
				return $var;
		}
		




?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style4 {font-size: 16px; font-weight: bold; color: #FFFFFF; }
.style5 {
	color: #FFFFFF;
	font-weight: bold;
}
.style6 {
	font-size: 14px;
	font-weight: bold;
}
-->
</style>
<link rel="stylesheet" href="../js/colorbox/colorbox.css" type="text/css" />
<script type="text/javascript" src="../js/colorbox/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
			$(document).ready(function(){
								$(".boxcolor").colorbox({width:"40%", height:"100%"});
			});
		</script>

<script type="text/javascript">
function openScript(url, width, height) {
        var Win = window.open(url,"openScript",'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}
</script>


<div>
  <div align="center">
<?php if($state=="" || $state=="pm"){?>
    <img name="" src="../images/state/bendera_malaysia.jpg" width="91" height="45" alt="" class="thinborderfloat" />
    <?php } ?>
	<?php 
	if ($state != "" && $state != "publicagencies" && $state != "cooperatives" && $state != "publiclimitedcompany" && $state != "partnership" && $state != "solepropriertorship" && $state != "privatelimitedcompany") {
	$qstate ="select * from negeri where id like '$state'";
	$rstate = mysql_query($qstate,$con);
	$rowstate = mysql_fetch_array($rstate);
	$totalstate = mysql_num_rows($rstate);
	if($state=="pm"){$state="pm";}
	else{$state = $rowstate['nama'];
	}
	?>
	<?php if($totalstate>0){?>
	<img src="../images/<?= $rowstate['negeri_path']; ?>" alt="" name="state" width="91" height="45" class="thinborderfloat" id="state" title="<?= $rowstate['nama'];?>" />
         <br />
<h2><?php echo $district; ?></h2>
    
	<?php }}?>
    
    
  
    <br />
    <br />
  </div>
  
  <div align="center" class="tajuk"><?php if($rowstate['nama']!=""){?>
  <a href="negeri_select.php?id=<?php echo  $rowstate['nama'];?>" class="boxcolor">View By District</a>
     <br />
   <?php } ?>
</div>
  <div align="center" class="tajuk">
<a href="javascript:openScript('transportation_all_draft.php?year=<?php echo $year; ?>&state=<?php echo $state; ?>&sub=<?php echo $sub; ?>','800','600')" >View Draft</a>
</div> 
</div>
<table width="80%" align="center" class="baju">
  <?php if ($state == "publicagencies") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Transport of FBBs for Public Agencies</div></td>
  </tr>
  <?php } else if ($state == "cooperatives") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Transport of FBBs for Cooperatives</div></td>
  </tr>
  <?php } else if ($state == "publiclimitedcompany") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Transport of FBBs for Public Limited Company</div></td>
  </tr>
  <?php } else if ($state == "partnership") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Transport of FBBs for Partnership</div></td>
  </tr>
  <?php } else if ($state == "solepropriertorship") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Transport of FBBs for Sole Propriertorship</div></td>
  </tr>
  <?php } else if ($state == "privatelimitedcompany") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Transport of FBBs for Private Limited Company</div></td>
  </tr>
  <?php } else { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Transport of FBBs to Mill in Malaysia</div></td>
  </tr>
  <?php } ?>
  <tr height="17">
    <td width="258" height="17" bgcolor="#8A1602"><div align="center"></div></td>
    <td colspan="3" bgcolor="#8A1602"><div align="center" class="style4">
      <div align="center">RM per hectare</div>
    </div></td>
    <td colspan="3" bgcolor="#8A1602"><div align="center" class="style4">
      <div align="center">RM per tonne FFB</div>
    </div>      </td>
  </tr>
  <tr height="18">
    <td width="258" height="18" bgcolor="#8A1602">&nbsp;</td>
    <td width="68" bgcolor="#8A1602"><div align="center"><span class="style5"><?php echo $_COOKIE['tahun_report']-2;?></span></div></td>
    <td width="104" bgcolor="#8A1602"><div align="center"><span class="style5"><?php echo $_COOKIE['tahun_report']-1;?></span></div></td>
    <td width="68" bgcolor="#8A1602"><div align="center"><span class="style5">% Change</span></div></td>
    <td width="68" bgcolor="#8A1602"><div align="center"><span class="style5"><?php echo $_COOKIE['tahun_report']-2;?></span></div></td>
    <td width="84" bgcolor="#8A1602"><div align="center"><span class="style5"><?php echo $_COOKIE['tahun_report']-1;?></span></div></td>
    <td width="69" bgcolor="#8A1602"><div align="center"><span class="style5">% Change</span></div></td>
  </tr>
   <?php 
  $satu = $_COOKIE['tahun_report']-0;
  $dua = $_COOKIE['tahun_report']-1;
  
  
  ?>
 <?php
  $qs="select * from q_km where type='$sub'";
  $rs = mysql_query($qs,$con);
  
  $jl=0;
  $js=0;
  $ml=0;
  $ms=0;
  
  $perubahan =0; 
  $perubahan_baru=0;
  
   while($rows=mysql_fetch_array($rs)){
  ?> 
  <tr height="17" <?php if(++$gg%2==0){?>class="alt"<?php } ?>>
  	<td <?php if($_COOKIE['tahun_report']==2010){?> ondblclick="javascript:openScript('add_cop_upk.php?name=<?php echo $rows['name'];?>&type=<?php echo "Transportation"; ?>&tahun=<?php echo $_COOKIE['tahun_report'];?>&year=<?php echo $year;?>&state=<?php echo $state; ?>','700','200')"<?php } ?>><?php echo $rows['name'];?></td>
    <?php
	if($year==""){
		$year=1;
	}
	
	if($rows['isChild'] == 'N' && strlen($rows['sub_type']) > 0){
		if($rows['sub_type'] == "internal"){
			$total1 = pertama($satu, "i. Loading of FFB (Platform)", '0', $state, $district);
			$total2 = pertama($satu, "i. Loading of FFB (Ramp)", '0', $state, $district);
			$total3 = pertama($satu, "ii. Ramp upkeep", '0', $state, $district);
			
			$total4 = pertama($dua, "a) Platform", '0', $state, $district);
			$total5 = pertama($dua, "b) Ramp", '0', $state, $district);
			$total6 = pertama($dua, "ii. Ramp upkeep", '0', $state, $district);
		}elseif($rows['sub_type'] == "external"){
			$total1 = pertama($satu, "i. Meanline transportation cost from platform to loading centre or mill", '0', $state, $district);
			$total2 = pertama($satu, "ii. Upkeep of tractor and trailer, lorry, etc", '0', $state, $district);
			$total3 = pertama($satu, "iii. River transport", '0', $state, $district);
			
			$total4 = pertama($dua, "i. Meanline transportation cost from platform to loading centre or mill", '0', $state, $district);
			$total5 = pertama($dua, "ii. Upkeep of tractor and trailer, lorry, etc", '0', $state, $district);
			$total6 = pertama($dua, "iii. River transport", '0', $state, $district);
		}
	?>
    <td width="68"><div align="right"><?php $totalAll1 = $total4[0]+$total5[0]+$total6[0]; echo number_format($totalAll1,2);?></div></td>
    <td width="68"><div align="right"><?php $totalAll2 = $total1[0]+$total2[0]+$total3[0]; echo number_format($totalAll2,2);?></div></td>
    <td width="68"><div align="right"><?=number_format((($totalAll2 - $totalAll1)/$totalAll1)*100,2)?></div></td>
    <td width="68"><div align="right"><?php $totalAll3 = $total4[1]+$total5[1]+$total6[1]; echo number_format($totalAll3,2);?></div></td>
    <td width="68"><div align="right"><?php $totalAll4 = $total1[1]+$total2[1]+$total3[1]; echo number_format($totalAll4,2);?></div></td>
    <td width="68"><div align="right"><?=number_format((($totalAll4 - $totalAll3)/$totalAll3)*100,2)?></div></td>
    <?php
	}else{
		if(strlen($rows['sub_type']) > 0){
			continue;
		}
		if($_COOKIE['tahun_report']==2010){
			$a1 = cop ( $rows['name'],  "Transportation", $year, $state, $district, $_COOKIE['tahun_report']);
		}else{
			$a1 = pertama ($dua, $rows['name'], '0',$state, $district); 
		}
	
		$b1 = pertama ($satu, $rows['name'], '0',$state, $district);
	?>
    <td width="68"><div align="right">
    <?php
	$jl = $jl+$a1[0]; 
	echo number_format($a1[0],2);
	?>
    </div></td>
    <td width="68"><div align="right">
    <?php
	$js =  $js+$b1[0];
	echo number_format($b1[0],2);
	?>
    </div></td>
    <td width="68"><div align="right">
    <?php
	echo number_format((($b1[0]-$a1[0])/$a1[0])*100,2);
	?>
    </div></td>
    <td width="68"><div align="right">
    <?php
	$ml = $ml+$a1[1];
	echo number_format($a1[1],2);
	?>
    </div></td>
    <td width="68"><div align="right">
    <?php
	$ms= $ms+$b1[1];
	echo number_format($b1[1],2);
	?>
    </div></td>
    <td width="68"><div align="right">
    <?php
	echo number_format((($b1[1]-$a1[1])/$a1[1])*100,2);
	?>
    </div></td>
    <?php
	}
	?>
  </tr>
  <?php } ?>
  
  <tr height="17" class="kaki">
    <td width="258" height="17" ><strong>Total</strong></td>
    <td align="right" ><div align="right"><?php echo number_format($jl,2);?></div></td>
    <td align="right" ><div align="right"><?php echo number_format($js,2);?></div></td>
    <td align="right" ><div align="right"><?php echo number_format((($js-$jl)/$jl)*100,2);?></div></td>
    <td align="right" ><div align="right"><?php echo number_format($ml,2);?></div></td>
    <td align="right" ><div align="right"><?php echo number_format($ms,2);?></div></td>
    <td align="right" ><div align="right"><?php echo number_format((($ms-$ml)/$ml)*100,2);?></div></td>
  </tr>
</table>
<br />
<br />
<table width="80%" border="0" align="center">
  <tr>
    <td>
    
   <!-- <span id="mi_all"></span>-->
    
   <!-- <span id="normal"></span>--></td>
  </tr>
</table>
<script type="text/javascript" src="amcolumn/swfobject.js"></script>
<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "520", "380", "8", "#FFFFFF");
		so.addVariable("path", "amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("mc_all_setting.xml"));
		so.addVariable("data_file", encodeURIComponent("mc_all.xml"));
		so.addVariable("preloader_color", "#999999");
		so.write("mi_all");
		// ]]>
	</script>
<script type="text/javascript" src="../amline/swfobject.js"></script>
<script type="text/javascript">
// <![CDATA[		
		var so1 = new SWFObject("../amline/amline.swf", "amline", "520", "380", "8", "#FFFFFF");
		so1.addVariable("path", "../amline/");
		so1.addVariable("settings_file", encodeURIComponent("amline_settings.xml"));
		so1.addVariable("data_file", encodeURIComponent("amline_data.xml"));
		so1.addVariable("preloader_color", "#999999");
		so1.write("normal");
		// ]]>
</script>
    <br />
<br />
