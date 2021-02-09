<?php
include ('../Connections/connection.class.php');
include('baju_merah.php');
$con = connect();
extract($_REQUEST);
?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-weight: bold; }
.style6 {
	font-size: 14px;
	font-weight: bold;
}body,td,th {
        font-size: 12px;
    }

-->
</style>
<script type="text/javascript">
function openScript(url, width, height) {
        var Win = window.open(url,"openScript",'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}
</script>


<?php include('baju_merah.php');
$con=connect();


function median($numbers=array())
{
	if (!is_array($numbers))
		$numbers = func_get_args();

	rsort($numbers);
	$mid = (count($numbers) / 2);
	return ($mid % 2 != 0) ? $numbers{$mid-1} : (($numbers{$mid-1}) + $numbers{$mid}) / 2;
}

function pertama($tahun, $nama, $status,$negeri,$daerah){
	global $con;
		$sql = "SELECT * FROM graf_mill where sessionid='$nama' and tahun ='$tahun' and (status='$status' or status='9') ";
		if($negeri!="" && $negeri!="pm")
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
	//-----------------------------------------------------------------------------------------
	$tahun_lepas = $tahun-1;
	$qoer = "SELECT SUM(FFB_PROSES) as FFB_PROSES, SUM(PENGELUARAN_CPO) as PENGELUARAN_CPO FROM graf_mill gm, ekilang ek where gm.sessionid='$nama' and gm.tahun ='$tahun' and (gm.status='$status' or gm.status='9') ";
		if($negeri!="" & $negeri!="pm")
		{
			$qoer.=" and gm.negeri = '$negeri'";
		}
		if($negeri!="" && $daerah!="")
		{
			$qoer.=" and gm.daerah = '$daerah'";
		}
		if($negeri=="pm")
		{
			$qoer.=" and (gm.negeri not like 'SARAWAK' and gm.negeri not like 'SABAH')";
		}
		$qoer .= " and gm.lesen = ek.no_lesen and ek.tahun='".$tahun_lepas."'";

	//echo $qoer;

	$roer = mysqli_query($con, $qoer);
	$rowoer = mysqli_fetch_array($roer);

	$oer = round($rowoer['PENGELUARAN_CPO']/$rowoer['FFB_PROSES'] *100,2);

	//-----------------------------------------------------------------------------------------
		$qavg = "SELECT AVG(y) as purata FROM graf_mill where sessionid='$nama' and tahun ='$tahun' and (status='$status' or status='9') ";
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

	//echo $qavg."<br>";
		$ravg = mysqli_query($con, $qavg);
		$rrow = mysqli_fetch_array($ravg);


			$var[0] = median($test_data);
			$var[1] = $rrow['purata'];

			$tan_cpo = round($rrow['purata']/$oer*100,2);
			$var[2]= $tan_cpo;

			$tan_cpo_median = round($var[0]/$oer*100,2);
			$var[3]= $tan_cpo_median;

			return $var;

		}


		//-------------------cop --------------
		function cop ($name, $type, $year, $state, $district, $tahun_r){
				global $con;
				if($state!="pm")
				{
				$q_cop = "select  * from cop where
				NAME ='$name' and TYPE= '$type' and YEAR= '$year' and STATE= '$state' and DISTRICT= '$district' and YEAR_REPORT='$tahun_r'";
				}
				else{
				$q_cop = "select  * from cop where
				NAME ='$name' and TYPE= '$type' and YEAR= '$year' and STATE!='sbh' and STATE!='swk' and DISTRICT= '$district' and YEAR_REPORT='$tahun_r'";
				}
				//echo $q_cop;
				$r_cop = mysqli_query($con, $q_cop);
				$row_cop = mysqli_fetch_array($r_cop);

				$var[1] = $row_cop['VALUE_MEDIAN'];
				$var[0] = $row_cop['VALUE_MEAN'];
				return $var;
		}

?>
<?php
	$con = connect();
	$qstate ="select * from negeri where id like '$state'";
	$rstate = mysqli_query($con, $qstate);
	$rowstate = mysqli_fetch_array($rstate);

?>


<div align="center" class="style6">Cost of FFB Processing and Sales in
   <?php echo $rowstate['nama'];?>
   <?php

   if($area==""){echo "MALAYSIA";}
   if($area=="Peninsular Malaysia"){

   echo "PENINSULAR MALAYSIA";}
   ?>
    <br />
</div>

<table width="95%" align="center" class="baju" id="baju">

  <tr bgcolor="#8A1602">
    <td width="35%" rowspan="3"><span class="style5">Cost Items </span></td>
    <td colspan="4" bgcolor="#8A1602" style="border-bottom:solid 1px #fff"><div align="center"  class="style5">RM per tonne FFB </div></td>
    <td colspan="4" bgcolor="#8A1602" style="border-bottom:solid 1px #fff"><div align="center"  class="style5">RM per tonne CPO</div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td bgcolor="#8A1602" style="border-bottom:solid 1px #fff"><div align="center" class="style5">
      <div align="right"><?php echo $_COOKIE['tahun_report']-2;?></div>
    </div></td>
    <td bgcolor="#8A1602" style="border-bottom:solid 1px #fff"><div align="center" class="style5">
      <div align="right"><?php echo $_COOKIE['tahun_report']-1;?></div>
    </div></td>
    <td bgcolor="#8A1602" style="border-bottom:solid 1px #fff"><div align="right" class="style5"><?php echo $_COOKIE['tahun_report']-1;?></div></td>
    <td bgcolor="#8A1602" ><div align="right" class="style5">%</div></td>
    <td bgcolor="#8A1602" ><div align="center" class="style5">
      <div align="right"><?php echo $_COOKIE['tahun_report']-2;?></div>
    </div></td>
    <td bgcolor="#8A1602" ><div align="center" class="style5">
      <div align="right"><?php echo $_COOKIE['tahun_report']-1;?></div>
    </div></td>
    <td bgcolor="#8A1602" ><div align="right" class="style5"><?php echo $_COOKIE['tahun_report']-1;?></div></td>
    <td bgcolor="#8A1602" ><div align="right" class="style5">%</div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Median</span></div></td>
    <td bgcolor="#8A1602" class="style5"><div align="right">Change</div></td>
    <td bgcolor="#8A1602" class="style5"><div align="right">Mean</div></td>
    <td bgcolor="#8A1602" class="style5"><div align="right">Mean</div></td>
    <td bgcolor="#8A1602" class="style5"><div align="right">Median</div></td>
<td bgcolor="#8A1602" class="style5"><div align="right">Change</div></td>  </tr>
    <?php
  $satu = $_COOKIE['tahun_report']-0;
  $dua = $_COOKIE['tahun_report']-1;
  //echo 'Satu : '.$satu.'<br/>';
  //echo 'Dua : '.$dua;

  $qs="select * from q_mill where type='other_cost'";
  $rs = mysqli_query($con, $qs);



  $jl=0;
  $js=0;
  $ms=0;

   while($rows=mysqli_fetch_array($rs)){
  ?>

  <tr <?php if(++$gg%2==0){?>class="alt"<?php } ?>>
       <td <?php if($_COOKIE['tahun_report']==2010){?> ondblclick="javascript:openScript('add_cop_mill.php?name=<?php echo $rows['name'];?>&type=<?php echo "Processing"; ?>&tahun=<?php echo $_COOKIE['tahun_report'];?>&year=<?php echo $year;?>&state=<?php echo $state; ?>','700','200')"<?php } ?>><?php echo $rows['name'];?></td>

    <td><div align="right"><?php

	if($year==""){$year=1;}
	if($area == "Peninsular Malaysia"){$state="pm";}else{$state=$rowstate['nama'];}
	if($_COOKIE['tahun_report']==2010){
		if($area == "Peninsular Malaysia"){$state="pm";}else{$state=$rowstate['id'];}
		$a1 = cop ( $rows['name'],  "Processing", $year, $state, $district, $_COOKIE['tahun_report']);
	}
	if($_COOKIE['tahun_report']!=2010){
		$a1 = pertama ($dua, $rows['name'], '0',$state, $district);
	}
	 echo number_format($a1[1],2);$jl = $jl+$a1[1]; ?></div></td>
    <td><div align="right"><?php $a= pertama ($satu,  $rows['name'], '0',$state, $district); echo number_format($a[1],2); $js = $js+$a[1]; ?></div></td>
    <td><div align="right"><?php echo number_format($a[0],2); $ms = $ms+$a[0]; ?></div></td>
    <td><div align="right"><?php $ch = (($a[1]-$a1[1])/$a1[1])*100; echo number_format($ch,2);$jch+=$ch; ?></div></td>
    <td><div align="right"><?php  echo number_format($a1[2],2);$jla = $jla+$a1[2];?></div></td>
    <td><div align="right"><?php echo number_format($a[2],2); $jsa = $jsa+$a[2];?></div></td>
    <td><div align="right"><?php echo number_format($a[3],2); $msa = $msa+$a[3];?></div></td>
    <td><div align="right"><?php $cha = (($a[2]-$a1[1])/$a1[1])*100; echo number_format($cha,2);$jcha+=$cha; ?></div></td>
  </tr>
<?php } ?>

  <tr bgcolor="#FF9966">
    <td><strong>Total</strong></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($jl,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($js,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($ms,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format((($js-$jl)/$jl)*100,2);//echo number_format($jch,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($jla,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($jsa,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($msa,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format((($jsa-$jla)/$jla)*100,2);//echo number_format($jcha,2);?></div></td>
  </tr>
  <!--
  <tr bgcolor="#FF9966">
    <td><strong>Total depreciation *</strong></td>
    <td bgcolor="#FF9966">&nbsp;</td>
    <td bgcolor="#FF9966">&nbsp;</td>
    <td bgcolor="#FF9966">&nbsp;</td>
    <td bgcolor="#FF9966">&nbsp;</td>
    <td bgcolor="#FF9966">&nbsp;</td>
    <td bgcolor="#FF9966">&nbsp;</td>
    <td bgcolor="#FF9966">&nbsp;</td>
    <td bgcolor="#FF9966">&nbsp;</td>
  </tr>
  -->
</table>
<br />
<br />
<br />
