<?php include ('../Connections/connection.class.php');
include('baju_merah.php');
$con=connect();
error_reporting(0);


extract($_REQUEST);

$_SESSION['ru']='';
$ru = explode('/',$_SERVER['REQUEST_URI']);
$_SESSION['ru']= end($ru);

function median($numbers=array())
{
	if (!is_array($numbers))
		$numbers = func_get_args();

	rsort($numbers);
	$mid = (count($numbers) / 2);
	return ($mid % 2 != 0) ? $numbers[$mid-1] : (($numbers[$mid-1]) + $numbers[$mid]) / 2;
}

function pertama($tahun, $nama, $status,$negeri,$daerah ){
$con=connect();

		$Company = array('publicagencies' => array("Agensi", "Public agencies"),
						 'cooperatives' => array("Koperasi", "Co-operatives"),
						 'publiclimitedcompany' => array("Syarikat Berhad", "Public limited company"),
						 'partnership' => array("Syarikat Perkongsian", "Partnership"),
						 'solepropriertorship' => array("Syarikat Perseorangan", "Sole propriertorship"),
						 'privatelimitedcompany' => array("Syarikat Sendirian Berhad", "Private limited company"));

		$qavg = "SELECT AVG(y) as purata FROM graf_km where sessionid='$nama' and tahun ='$tahun' and (status='$status' or status='9')  ";
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
	//	echo $qavg;

		$ravg = mysqli_query($con, $qavg);
		$rrow = mysqli_fetch_array($ravg);




		$qavg2 = "SELECT AVG(y) as purata FROM graf_km_tan where sessionid='$nama' and tahun ='$tahun' and (status='$status' or status='9')  ";
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

		$ravg2 = mysqli_query($con, $qavg2);
		$rrow2= mysqli_fetch_array($ravg2);


			$var[0] = $rrow['purata'];
			$var[1] = $rrow2['purata'];

				return $var;

		}

	//-------------------cop --------------
		function cop ($name, $type, $year, $state, $district, $tahun_r){
				$con =connect();
				$q_cop = "select  * from cop where
				NAME ='$name' and TYPE= '$type' and YEAR= '$year' and STATE= '$state' and DISTRICT= '$district' and YEAR_REPORT='$tahun_r'";
				$r_cop = mysqli_query($con, $q_cop);
				$row_cop = mysqli_fetch_array($r_cop);

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
} body,td,th {
        font-size: 12px;
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
<?php
if ($state != "" && $state != "publicagencies" && $state != "cooperatives" && $state != "publiclimitedcompany" && $state != "partnership" && $state != "solepropriertorship" && $state != "privatelimitedcompany") {
	$qstate ="select * from negeri where id like '$state'";
	$rstate = mysqli_query($con, $qstate);
	$rowstate = mysqli_fetch_array($rstate);
	$totalstate = mysqli_num_rows($rstate);
	if($state=="pm"){$state="pm";}
	else{$state = $rowstate['nama'];
	}
	}
?>
  </div>




</div>
<table width="80%" align="center" class="baju">
  <?php if ($state == "publicagencies") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Cost of Estate Harvesting and Collection of FBBs for Public Agencies</div></td>
  </tr>
  <?php } else if ($state == "cooperatives") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Cost of Estate Harvesting and Collection of FBBs for Cooperatives</div></td>
  </tr>
  <?php } else if ($state == "publiclimitedcompany") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Cost of Estate Harvesting and Collection of FBBs for Public Limited Company</div></td>
  </tr>
  <?php } else if ($state == "partnership") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Cost of Estate Harvesting and Collection of FBBs for Partnership</div></td>
  </tr>
  <?php } else if ($state == "solepropriertorship") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Cost of Estate Harvesting and Collection of FBBs for Sole Propriertorship</div></td>
  </tr>
  <?php } else if ($state == "privatelimitedcompany") { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Cost of Estate Harvesting and Collection of FBBs for Private Limited Company</div></td>
  </tr>
  <?php } else { ?>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">Cost of Estate Harvesting and Collection of FBBs in Malaysia </div></td>
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
 $tahun = $_COOKIE['tahun_report'];			// new question and old question

 if ($tahun <= '2020') {
 $qs="select * from q_km where type='$sub' ";

 }

 else {
 		$qs = " select * from q_kmv2 where type='$sub' ORDER BY arrangement ";
 }
  $rs = mysqli_query($con, $qs);

  $jl=0;
  $js=0;
  $ml=0;
  $ms=0;

  $perubahan =0;
  $perubahan_baru=0;

   while($rows=mysqli_fetch_array($rs)){

  ?>
  <tr height="17" <?php if(++$gg%2==0){?>class="alt"<?php } ?>>
      <td <?php if($_COOKIE['tahun_report']==2010){?> ondblclick="javascript:openScript('add_cop_upk.php?name=<?php echo $rows['name'];?>&type=<?php echo "Harvesting"; ?>&tahun=<?php echo $_COOKIE['tahun_report'];?>&year=<?php echo $year;?>&state=<?php echo $state; ?>','700','200')"<?php } ?>><?php echo $rows['name'];?></td>


          <td width="68"><div align="center"><?php

	if($year==""){$year=1;}
	if($_COOKIE['tahun_report']==2010){

	$a1 = cop ( $rows['name'],  "Harvesting", $year, $state, $district, $_COOKIE['tahun_report']);
	}

	if($_COOKIE['tahun_report']!=2010){
	$a1 = pertama ($dua, $rows['name'], '0',$state, $district);
	}
	$b1 = pertama ($satu, $rows['name'], '0',$state, $district);

	$a01 = number_format($a1[0],2); echo number_format($a01,2);$jl = $jl+$a1[0]; ?></div></td>
    <td width="104"><div align="center"><?php $a02 = number_format($b1[0],2); echo number_format($a02,2); $js =  $js+$b1[0];?></div></td>
    <td width="68"><div align="center"><?php $ch = (($a02-$a01)/$a01)*100; echo number_format($ch,2);$jch = (($js-$jl)/$jl)*100; ?></div></td>
    <td align="right"><div align="center"><?php $a03 = number_format($a1[1],2); echo number_format($a03,2);$ml = number_format($ml+$a1[1],2); ?></div></td>
    <td align="right"><div align="center"><?php $a04 = number_format($b1[1],2); echo number_format($a04,2); $ms= number_format($ms+$b1[1],2); ?></div></td>
    <td align="right"><div align="center"><?php $ch2 = (($a04-$a03)/$a1[1])*100; echo number_format($ch2,2); $jch2 = (($ms-$ml)/$ml)*100; ?></div></td>
  </tr>
  <?php } ?>

  <tr height="17" class="kaki">
    <td width="258" height="17" ><strong>Total</strong></td>
    <td align="right" ><div align="center"><?php echo number_format($jl,2);?></div></td>
    <td align="right" ><div align="center"><?php echo number_format($js,2);?></div></td>
    <td align="right" ><div align="center"><?php echo number_format($jch,2);?></div></td>
    <td align="right" ><div align="center"><?php echo number_format($ml,2);?></div></td>
    <td align="right" ><div align="center"><?php echo number_format($ms,2);?></div></td>
    <td align="right" ><div align="center"><?php echo number_format($jch2,2);?></div></td>
  </tr>
</table>
<br />
<br />
<table width="80%" border="0" align="center">
  <tr>
    <td>

   <!-- <span id="mi_all"></span>-->

  <!--  <span id="normal"></span>--></td>
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
