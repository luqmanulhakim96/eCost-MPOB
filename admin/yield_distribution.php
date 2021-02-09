<?php include('baju_merah.php');
$t1 = $_COOKIE['tahun_report'];



function fbb ($tahun1,$negeri, $flag,$nilai1, $nilai2){
	$con =connect();
	$tahun_semasa = date('Y');

	if($tahun_semasa!=$tahun1){
		$table = "fbb_production".$tahun1;
	}
	else{
		$table ="fbb_production";
	}

	//$table = "fbb_production".$tahun1;

	if($flag=="count"){
		$sql = "SELECT count(purata_hasil_buah) as jumlah FROM $table where ";
	}
	if($flag=="sum"){
		$sql = "SELECT sum(purata_hasil_buah) as jumlah FROM $table where ";
	}
		if($negeri!="" & $negeri!="pm")
		{
			$sql.="negeri = '$negeri' and ";
		}

		if($negeri=="pm")
		{
			$sql.="(negeri not like '%SARAWAK%' and negeri not like '%SABAH%') and ";
		}
		$sql.=" purata_hasil_buah between '$nilai1' and '$nilai2' ";

		$r = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($r);


		$qa = "select count(lesen) as jumlah from $table ";
		$ra = mysqli_query($con, $qa);
		$rowa = mysqli_fetch_array($ra);
		$total = $rowa['jumlah'];

		$n[0]=$row['jumlah'];
		$n[1]=$row['jumlah']/$total*100;
		return $n;

}
?>
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
<table width="90%" class="baju" align="center">

  <tr>
    <td colspan="8"><div align="center"><strong style="font-size:16px">Yield Distribution of Oil Palm Estate in Malaysia </strong></div></td>
  </tr>

  <tr bgcolor="#8A1602" class="style2">
    <td height="28" colspan="2" bgcolor="#8A1602"><span class="style1">Yield group (tonnes/ha/yr) </span></td>
    <td width="9%"><div align="right">Below 18 </div></td>
    <td width="13%"><div align="right">18.00 - 19.99 </div></td>
    <td width="10%"><div align="right">20 - 24.99 </div></td>
    <td width="8%"><div align="right"><span class="style2"><strong>25 - 29.99</strong></span></div></td>
    <td width="13%"><div align="right"><span class="style2"><strong>30 and above </strong></span></div></td>
    <td width="10%"><div align="right"><span class="style2"><strong>Total</strong></span></div></td>
  </tr>
  <tr class="alt">
    <td width="18%" height="19">Peninsular Malaysia </td>
    <td width="13%">No. Estates </td>
    <td><div align="right"><?php $a1 = fbb($t1, 'pm','count', '0','18'); echo number_format($a1[0]);?></div></td>
    <td><div align="right"><?php $a2 = fbb($t1, 'pm','count', '18','20'); echo number_format($a2[0]);?></div></td>
    <td><div align="right"><?php $a3 = fbb($t1, 'pm','count', '20','25'); echo number_format($a3[0]);?></div></td>
    <td><div align="right"><?php $a4 = fbb($t1, 'pm','count', '25','30'); echo number_format($a4[0]);?></div></td>
    <td><div align="right"><?php $a5 = fbb($t1, 'pm','count', '30','9999999'); echo number_format($a5[0]);?></div></td>
    <td><div align="right"><strong>
      <?php $totala = $a1[0]+$a2[0]+$a3[0]+$a4[0]+$a5[0]; echo number_format($totala);?>
    </strong></div></td>
  </tr>
  <tr >
    <td height="19">&nbsp;</td>
    <td>Area (Ha) </td>
    <td><div align="right"><?php $b1 = fbb($t1, 'pm','sum', '0','18'); echo number_format($b1[0],2);?></div></td>
    <td><div align="right"><?php $b2 = fbb($t1, 'pm','sum', '18','20'); echo number_format($b2[0],2);?></div></td>
    <td><div align="right"><?php $b3 = fbb($t1, 'pm','sum', '20','25'); echo number_format($b3[0],2);?></div></td>
    <td><div align="right"><?php $b4 = fbb($t1, 'pm','sum', '25','30'); echo number_format($b4[0],2);?></div></td>
    <td><div align="right"><?php $b5 = fbb($t1, 'pm','sum', '30','9999999'); echo number_format($b5[0],2);?></div></td>
    <td><div align="right"><strong>
      <?php $totalb = $b1[0]+$b2[0]+$b3[0]+$b4[0]+$b5[0]; echo number_format($totalb,2);?>
    </strong></div></td>
  </tr>

  <tr class="alt">
    <td height="20" style="border-bottom:solid 1px #000;">&nbsp;</td>
    <td style="border-bottom:solid 1px #000;">%</td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($a1[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($a2[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($a3[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($a4[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($a5[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"> <div align="right"><strong>
      <?php $totala1 = $a1[1]+$a2[1]+$a3[1]+$a4[1]+$a5[1]; echo number_format($totala1,2);?>
    </strong></div>
    </div>  </td>
  </tr>

  <tr>
    <td width="18%" height="19">Sabah</td>
    <td width="13%">No. Estates </td>
    <td><div align="right"><?php $c1 = fbb($t1, 'sabah','count', '0','18'); echo number_format($c1[0]);?></div></td>
    <td><div align="right"><?php $c2 = fbb($t1, 'sabah','count', '18','20'); echo number_format($c2[0]);?></div></td>
    <td><div align="right"><?php $c3 = fbb($t1, 'sabah','count', '20','25'); echo number_format($c3[0]);?></div></td>
    <td><div align="right"><?php $c4 = fbb($t1, 'sabah','count', '25','30'); echo number_format($c4[0]);?></div></td>
    <td><div align="right"><?php $c5 = fbb($t1, 'sabah','count', '30','9999999'); echo number_format($c5[0]);?></div></td>
    <td><div align="right"><strong>
      <?php $totalc = $c1[0]+$c2[0]+$c3[0]+$c4[0]+$c5[0]; echo number_format($totalc);?>
    </strong></div></td>
  </tr>
  <tr class="alt">
    <td height="19">&nbsp;</td>
    <td>Area (Ha) </td>
    <td><div align="right"><?php $d1 = fbb($t1, 'sabah','sum', '0','18'); echo number_format($d1[0],2);?></div></td>
    <td><div align="right"><?php $d2 = fbb($t1, 'sabah','sum', '18','20'); echo number_format($d2[0],2);?></div></td>
    <td><div align="right"><?php $d3 = fbb($t1, 'sabah','sum', '20','25'); echo number_format($d3[0],2);?></div></td>
    <td><div align="right"><?php $d4 = fbb($t1, 'sabah','sum', '25','30'); echo number_format($d4[0],2);?></div></td>
    <td><div align="right"><?php $d5 = fbb($t1, 'sabah','sum', '30','9999999'); echo number_format($d5[0],2);?></div></td>
    <td><div align="right"><strong>
      <?php $totald = $d1[0]+$d2[0]+$d3[0]+$d4[0]+$d5[0]; echo number_format($totald,2);?>
    </strong></div></td>
  </tr>

  <tr>
    <td height="20" style="border-bottom:solid 1px #000;">&nbsp;</td>
    <td style="border-bottom:solid 1px #000;">%</td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($c1[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($c2[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($c3[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($c4[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($c5[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"> <div align="right"><strong>
      <?php $totalc1 = $c1[1]+$c2[1]+$c3[1]+$c4[1]+$c5[1]; echo number_format($totalc1,2);?>
    </strong></div>
    </div>  </td>
  </tr>


  <tr class="alt">
    <td width="18%" height="19">Sarawak </td>
    <td width="13%">No. Estates </td>
    <td><div align="right"><?php $e1 = fbb($t1, 'sarawak','count', '0','18'); echo number_format($e1[0]);?></div></td>
    <td><div align="right"><?php $e2 = fbb($t1, 'sarawak','count', '18','20'); echo number_format($e2[0]);?></div></td>
    <td><div align="right"><?php $e3 = fbb($t1, 'sarawak','count', '20','25'); echo number_format($e3[0]);?></div></td>
    <td><div align="right"><?php $e4 = fbb($t1, 'sarawak','count', '25','30'); echo number_format($e4[0]);?></div></td>
    <td><div align="right"><?php $e5 = fbb($t1, 'sarawak','count', '30','9999999'); echo number_format($e5[0]);?></div></td>
    <td><div align="right"><strong>
      <?php $totale = $e1[0]+$e2[0]+$e3[0]+$e4[0]+$e5[0]; echo number_format($totale);?>
    </strong></div></td>
  </tr>
  <tr>
    <td height="19">&nbsp;</td>
    <td>Area (Ha) </td>
    <td><div align="right"><?php $f1 = fbb($t1, 'sarawak','sum', '0','18'); echo number_format($f1[0],2);?></div></td>
    <td><div align="right"><?php $f2 = fbb($t1, 'sarawak','sum', '18','20'); echo number_format($f2[0],2);?></div></td>
    <td><div align="right"><?php $f3 = fbb($t1, 'sarawak','sum', '20','25'); echo number_format($f3[0],2);?></div></td>
    <td><div align="right"><?php $f4 = fbb($t1, 'sarawak','sum', '25','30'); echo number_format($f4[0],2);?></div></td>
    <td><div align="right"><?php $f5 = fbb($t1, 'sarawak','sum', '30','9999999'); echo number_format($f5[0],2);?></div></td>
    <td><div align="right"><strong>
      <?php $totalf = $f1[0]+$f2[0]+$f3[0]+$f4[0]+$f5[0]; echo number_format($totalf,2);?>
    </strong></div></td>
  </tr>

  <tr class="alt">
    <td height="20" style="border-bottom:solid 1px #000;">&nbsp;</td>
    <td style="border-bottom:solid 1px #000;">%</td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($e1[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($e2[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($e3[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($e4[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($e5[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"> <div align="right"><strong>
      <?php $totale1 = $e1[1]+$e2[1]+$e3[1]+$e4[1]+$e5[1]; echo number_format($totale1,2);?>
    </strong></div>
    </div>  </td>
  </tr>


  <tr>
    <td height="19"><strong>Total</strong></td>
    <td><strong>No. Estates </strong></td>
    <td><div align="right"><?php echo number_format($a1[0]+$c1[0]+$e1[0]);?></div></td>
    <td><div align="right"><?php echo number_format($a2[0]+$c2[0]+$e2[0]);?></div></td>
    <td><div align="right"><?php echo number_format($a3[0]+$c3[0]+$e3[0]);?></div></td>
    <td><div align="right"><?php echo number_format($a4[0]+$c4[0]+$e4[0]);?></div></td>
    <td><div align="right"><?php echo number_format($a5[0]+$c5[0]+$e5[0]);?></div></td>
    <td><div align="right"><strong><?php echo number_format($totala+$totalc+$totale);?></strong></div></td>
  </tr>
  <tr class="alt">
    <td height="19">&nbsp;</td>
    <td><strong>Area (Ha) </strong></td>
    <td><div align="right"><?php echo number_format($b1[0]+$d1[0]+$f1[0]);?></div></td>
    <td><div align="right"><?php echo number_format($b2[0]+$d2[0]+$f2[0]);?></div></td>
    <td><div align="right"><?php echo number_format($b3[0]+$d3[0]+$f3[0]);?></div></td>
    <td><div align="right"><?php echo number_format($b4[0]+$d4[0]+$f4[0]);?></div></td>
    <td><div align="right"><?php echo number_format($b5[0]+$d5[0]+$f5[0]);?></div></td>
    <td><div align="right"><strong><?php echo number_format($totalb+$totald+$totalf);?></strong></div></td>
  </tr>

  <tr>
    <td height="20" style="border-bottom:solid 1px #000;">&nbsp;</td>
    <td style="border-bottom:solid 1px #000;"><strong>%</strong></td>
       <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($a1[1]+$c1[1]+$e1[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($a2[1]+$c2[1]+$e2[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($a3[1]+$c3[1]+$e3[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($a4[1]+$c4[1]+$e4[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><?php echo number_format($a5[1]+$c5[1]+$e5[1],2);?></div></td>
    <td style="border-bottom:solid 1px #000;"><div align="right"><strong><?php echo number_format($totala1+$totalc1+$totale1,2);?></strong></div></td>
  </tr>
</table>
<br />
<br />
