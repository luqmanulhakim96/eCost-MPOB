<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 14px;
}
-->
</style>

<script type="text/javascript">
function openScript(url, width, height) {
        var Win = window.open(url,"openScript",'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}
</script>



<?php include('baju_merah.php');


function fbb ($tahun1,$negeri){
	$con =connect();
	$tahun_semasa = date('Y');

	if($tahun_semasa!=$tahun1){
		$table = "fbb_production".$tahun1;
	}
	else{
		$table ="fbb_production";
	}

	$sql = "SELECT avg(purata_hasil_buah) as jumlah FROM $table ";
		if($negeri!="" & $negeri!="pm")
		{
			$sql.="where negeri = '$negeri'";
		}

		if($negeri=="pm")
		{
			$sql.=" where (negeri not like '%SARAWAK%' and negeri not like '%SABAH%')";
		}
	//echo $sql;

		$r = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($r);

		$n[0]=$row['jumlah'];
		return $n;

}


$t2= $_COOKIE['tahun_report'];
$t1=$_COOKIE['tahun_report']-1;

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


<table width="80%" align="center" class="baju">

  <tr>
    <td colspan="4"><div align="center"><strong style="font-size:16px">Yield of FFB by Region and Sources of Data, <?php echo $_COOKIE['tahun_report']-2;?> - <?php echo $_COOKIE['tahun_report']-1;?> </strong></div></td>
  </tr>
  <tr>
    <td width="44%" bgcolor="#8A1602">&nbsp;</td>
    <td colspan="3" bgcolor="#8A1602" style="border-bottom:solid 1px #fff;"><div align="center" class="style2">Yield of FFB (T/Ha) </div></td>
  </tr>
  <tr>
    <td height="28" bgcolor="#8A1602"><span class="style1"></span></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style2"><strong><?php echo $_COOKIE['tahun_report']-2;?></strong></span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style2"><strong><?php echo $_COOKIE['tahun_report']-1;?></strong></span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style2"><strong>% Change </strong></span></div></td>
  </tr>
  <tr>
    <td height="19"><strong>Findings from this survey </strong></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr class="alt">
    <td height="19">Malaysia</td>
    <td><div align="right"><?php $a1 = fbb($t1,''); echo number_format($a1[0],2);?></div></td>
    <td><div align="right"><?php $a2 = fbb($t2,''); echo number_format($a2[0],2);?></div></td>
    <td><div align="right"><?php $a3 = (($a2[0]-$a1[0])/$a1[0])*100; echo number_format($a3,2);?></div></td>
  </tr>
  <tr>
    <td height="19">Peninsular Malaysia </td>
    <td><div align="right"><?php $b1 = fbb($t1,'pm'); echo number_format($b1[0],2);?></div></td>
    <td><div align="right"><?php $b2 = fbb($t2,'pm'); echo number_format($b2[0],2);?></div></td>
    <td><div align="right"><?php $b3 = (($b2[0]-$b1[0])/$b1[0])*100; echo number_format($b3,2);?></div></td>
  </tr>
  <tr class="alt">
    <td height="19">Sabah</td>
    <td><div align="right"><?php $c1 = fbb($t1,'sabah'); echo number_format($c1[0],2);?></div></td>
    <td><div align="right"><?php $c2 = fbb($t2,'sabah'); echo number_format($c2[0],2);?></div></td>
    <td><div align="right"><?php $c3 = (($c2[0]-$c1[0])/$c1[0])*100; echo number_format($c3,2);?></div></td>
  </tr>
  <tr>
    <td height="20" style="border-bottom:solid 1px #000;">Sarawak</td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php $d1 = fbb($t1,'sarawak'); echo number_format($d1[0],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php $d2 = fbb($t2,'sarawak'); echo number_format($d2[0],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php $d3 = (($d2[0]-$d1[0])/$d1[0])*100; echo number_format($d3,2);?></div></td>
  </tr>

</table>
<br />
<br />
<br />
<br />
