<?php include('baju_merah.php');
$con=connect();
extract($_REQUEST);
$bilTahun = array('First','Second','Third');
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

function pertama($tahun, $nama, $status,$negeri,$daerah, $type, $tahuntanam){
	global $con;
		$sql = "SELECT * FROM graf_kbm where sessionid='$nama' and tahun ='$tahun' and status='$status' and pb_type = '$type' and pb_tahun = '$tahuntanam'";
		if($negeri!="" & $negeri!="pm")
		{
			$sql.=" and negeri = '$negeri'";
		}
		if($negeri!="" && $daerah!="")
		{
			$sql.=" and daerah = '$daerah'";
		}
		if($negeri=="pm")
		{
			$sql.=" and (negeri not like 'SARAWAK' and negeri not like 'SABAH')";
		}

		//echo $sql."<br>";
		$sql_result = mysqli_query($con, $sql);
		$i=0;
				while ($row = mysqli_fetch_array($sql_result))
				{
				$test_data[] = $row["y"];
				$i = $i + 1;
				}

		$qavg = "SELECT AVG(y) as purata FROM graf_kbm where sessionid='$nama' and tahun ='$tahun' and status='$status' and pb_type='$type' and pb_tahun = '$tahuntanam'";
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
			$qavg.=" and (negeri not like 'SARAWAK' and negeri not like 'SABAH')";
		}


		$ravg = mysqli_query($con, $qavg);
		$rrow = mysqli_fetch_array($ravg);


			$var[0] = median($test_data);
			$var[1] = $rrow['purata'];
				return $var;

		}

		//-------------------cop --------------
		function cop ($name, $type, $year, $state, $district, $tahun_r){
				$con =connect();
				$q_cop = "select  * from cop where
				NAME ='$name' and TYPE= '$type' and YEAR= '$year' and STATE= '$state' and DISTRICT= '$district' and YEAR_REPORT='$tahun_r'";
				$r_cop = mysqli_query($con, $q_cop);
				$row_cop = mysqli_fetch_array($r_cop);

				//echo $q_cop;

				$var[0] = $row_cop['VALUE_MEDIAN'];
				$var[1] = $row_cop['VALUE_MEAN'];
				return $var;
		}

?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-weight: bold; }
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
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

<script type="text/javascript">

function openScript(url, width, height) {
        var Win = window.open(url,"openScript",'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}

</script>


<table width="85%" border="0" align="center">
  <tr>
    <td> </td>
    <td colspan="2"><!--<div align="right"><a href="#"><img src="../images/Print.png" width="24" height="24" border="0" title="Print this page" /></a></div>--></td>
  </tr>
  <tr>
    <td width="10%">Select Year :</td>
    <td width="45%"><form name="form" id="form">
      <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
        <option value="home.php?id=estate&amp;sub=new_conversion&amp;year=1&amp;state=<?php echo $state; ?>" <?php if($year=='1'){?>selected="selected" <?php } ?>>Year 1</option>
        <option value="home.php?id=estate&amp;sub=new_conversion&amp;year=2&amp;state=<?php echo $state; ?>" <?php if($year=='2'){?>selected="selected" <?php } ?>>Year 2</option>
        <option value="home.php?id=estate&amp;sub=new_conversion&amp;year=3&amp;state=<?php echo $state; ?>" <?php if($year=='3'){?>selected="selected" <?php } ?>>Year 3</option>
        </select>
    </form>	</td>
    <td width="45%">
    <?php if($state=="" || $state=="pm"){?>
    <img name="" src="../images/state/bendera_malaysia.jpg" width="91" height="45" alt="" class="thinborderfloat" />
    <?php } ?>
	<?php
	if($state!=""){

	$qstate ="select * from negeri where id like '$state'";
	$rstate = mysqli_query($con, $qstate);
	$rowstate = mysqli_fetch_array($rstate);
	$totalstate = mysqli_num_rows($rstate);
	if($state=="pm"){$state="pm";}
	else{$state = $rowstate['nama'];
	}
	?>
	<?php if($totalstate>0){?>
	<img src="../images/<?= $rowstate['negeri_path']; ?>" alt="" name="state" width="91" height="45" class="thinborderfloat" id="state" title="<?= $rowstate['nama'];?>" />
    <br />
<h2><?php echo $district; ?></h2>

	<?php }}?>    </td>
  </tr>
  <tr class="tajuk">
    <td colspan="3" valign="top"> <?php if($rowstate['nama']!=""){?>
    <a href="negeri_select.php?id=<?php echo  $rowstate['nama'];?>" class="boxcolor">View By District</a>
    <?php } ?></td>
  </tr>
  <tr class="tajuk">
      <td colspan="3" valign="top"> <a href="javascript:openScript('mi_new_conversion_draft.php?year=<?php echo $year; ?>&state=<?php echo $state; ?>','800','600')" >View Draft</a></td>
    </tr>
</table>

<table width="85%" align="center" class="baju">
<tr>
<td colspan="5"><h2><strong>Cost in the <?=$bilTahun[$year-1]?> Year of Oil Palm New Conversion (RM per hectare)</strong></h2></td>
</tr>
<tr >
    <th width="34%" rowspan="2"><span class="style5">Cost Items</span></th>
    <th ><div align="center" class="style5">
      <div align="right"><?php echo $_COOKIE['tahun_report']-2;?></div>
    </div></th>
    <th colspan="2" ><div align="center" class="style5">
      <div align="right"><?php echo $_COOKIE['tahun_report']-1;?></div>

    </div></th>
    <th rowspan="2" ><div align="right"><span class="style5">% Change </span></div></th>
  </tr>

  <tr bgcolor="#8A1602">
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Median</span></div></td>
  </tr>


  <?php
  $satu = $_COOKIE['tahun_report']-0;
  $dua = $_COOKIE['tahun_report']-1;
  ?>
  <?php
  if($year=="" || $year=='1'){
  ?>
  <tr class="alt">
    <td colspan="5"><strong>Non-Recurrent Costs</strong></td>
  </tr>

  <?php
  }
  /*
  $qs="select * from q_kbm";
  if($year=="" || $year=='1'){
  $qs.=" where tahun ='0'";
  }
  */
  if($year=="" || $year=='1'){
  $qs =" select * from q_kbm ORDER BY arrangement ASC";
  }
  else {
  $qs = " select * from q_kbm where tahun!='0'";
  }
  $rs = mysqli_query($con, $qs);

  $jl=0;
  $js=0;
  $ms=0;

   while($rows=mysqli_fetch_array($rs)){
  ?>
  <tr <?php if(++$gg%2==0){?>class="alt"<?php } ?>>
  	<td <?php if($_COOKIE['tahun_report']==2010){?> ondblclick="javascript:openScript('add_cop.php?name=<?php echo $rows['name'];?>&type=<?php echo "Penukaran"; ?>&tahun=<?php echo $_COOKIE['tahun_report'];?>&year=<?php echo $year;?>&state=<?php echo $state; ?>','700','200')"<?php } ?>><?php echo $rows['name'];?></td>
    <?php
	if($year==""){
		$year=1;
	}

	if($rows['isChild'] == 'N' && strlen($rows['sub_type']) > 0){
		if($rows['sub_type'] == "weeding"){
			if($_COOKIE['tahun_report']==2010){
				$total1 = cop ( $rows['name'],  "Penukaran", $year, $state, $district, $_COOKIE['tahun_report']);
			}else{
				$total1 = pertama($dua, "Purchase of weedicides", '0', $state, $district, "Penukaran", $year);
				$total2 = pertama($dua, "Labour cost for weeding", '0', $state, $district, "Penukaran", $year);
				$total3 = pertama($dua, "Machinery use and maintenance", '0', $state, $district, "Penukaran", $year);
			}

			$total4 = pertama($satu, "Purchase of weedicides", '0', $state, $district, "Penukaran", $year);
			$total5 = pertama($satu, "Labour cost for weeding", '0', $state, $district, "Penukaran", $year);
			$total6 = pertama($satu, "Machinery use and maintenance", '0', $state, $district, "Penukaran", $year);
	?>
    <td width="68"><div align="right"><?php $totalAll1 = $total1[1]+$total2[1]+$total3[1]; echo number_format($totalAll1,2);?></div></td>
    <td width="68"><div align="right"><?php $totalAll2 = $total4[1]+$total5[1]+$total6[1]; echo number_format($totalAll2,2);?></div></td>
    <td width="68"><div align="right"><?php $totalAll3 = $total4[0]+$total5[0]+$total6[0]; echo number_format($totalAll3,2);?></div></td>
    <td width="68"><div align="right"><?php echo number_format((($totalAll2-$totalAll1)/$totalAll1)*100,2);?></div></td>
    <?php
		}elseif($rows['sub_type'] == "fertilizing"){
			if($_COOKIE['tahun_report']==2010){
				$total7 = cop ( $rows['name'],  "Penukaran", $year, $state, $district, $_COOKIE['tahun_report']);
			}else{
				$total7 = pertama($dua, "Purchase of fertilizer", '0', $state, $district, "Penukaran", $year);
				$total8 = pertama($dua, "Labour cost to apply fertilizers", '0', $state, $district, "Penukaran", $year);
				$total9 = pertama($dua, "Machinery use and maintenances", '0', $state, $district, "Penukaran", $year);
				$total10 = pertama($dua, "Soil and foliar analysis", '0', $state, $district, "Penukaran", $year);
			}

			$total11 = pertama($satu, "Purchase of fertilizer", '0', $state, $district, "Penukaran", $year);
			$total12 = pertama($satu, "Labour cost to apply fertilizers", '0', $state, $district, "Penukaran", $year);
			$total13 = pertama($satu, "Machinery use and maintenances", '0', $state, $district, "Penukaran", $year);
			$total14 = pertama($satu, "Soil and foliar analysis", '0', $state, $district, "Penukaran", $year);
	?>
    <td width="68"><div align="right"><?php $totalAll4 = $total7[1]+$total8[1]+$total9[1]+$total10[1]; echo number_format($totalAll4,2);?></div></td>
    <td width="68"><div align="right"><?php $totalAll5 = $total11[1]+$total12[1]+$total13[1]+$total14[1]; echo number_format($totalAll5,2);?></div></td>
    <td width="68"><div align="right"><?php $totalAll6 = $total11[0]+$total12[0]+$total13[0]+$total14[0]; echo number_format($totalAll6,2);?></div></td>
    <td width="68"><div align="right"><?php echo number_format((($totalAll5-$totalAll4)/$totalAll4)*100,2);?></div></td>
    <?php
		}
	}else{
		if(strlen($rows['sub_type']) > 0){
			continue;
		}

		if($_COOKIE['tahun_report']==2010){
			$a1 = cop ( $rows['name'],  "Penukaran", $year, $state, $district, $_COOKIE['tahun_report']);
		}else{
			$a1 = pertama ($dua, $rows['name'], '0',$state, $district, "Penukaran", $year);
		}

		$a= pertama ($satu,  $rows['name'], '0',$state, $district, "Penukaran", $year);
	?>
    <td width="68"><div align="right">
    <?php
	$jl = $jl+$a1[1];
	echo number_format($a1[1],2);
	?>
    </div></td>
    <td width="68"><div align="right">
    <?php
	$js = $js+$a[1];
	echo number_format($a[1],2);
	?>
    </div></td>
    <td width="68"><div align="right">
    <?php
	$ms = $ms+$a[0];
	echo number_format($a[0],2);
	?>
    </div></td>
    <td width="68"><div align="right">
    <?php
	$ch = (($a[1]-$a1[1])/$a1[1])*100; echo number_format($ch,2);if(strlen($rows['sub_type']) == 0){$jch+=$ch;}
	?>
    </div></td>
    <?php
	}
	?>
  </tr>
<?php } ?>
  <tr bgcolor="#FF9966">
    <td><strong>Total</strong></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($jl,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($js,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($ms,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format((($js-$jl)/$jl)*100,2);?></div></td>
  </tr>
</table>
<br />
<br />
<br />
