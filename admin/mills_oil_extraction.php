<?php include('baju_merah.php');



//-------------------------- kernel price ------------------------
function kernel_price($negeri, $tahun){

$tahun_lepas = $tahun-1;

		$con = connect();
		$query = "select avg(isirung) as isirung, avg(PENGELUARAN_CPO) as PENGELUARAN_CPO, avg(FFB_PROSES) as FFB_PROSES  from mill_isirung mi, ekilang es where mi.tahun ='$tahun' and mi.lesen not like '%123456%' and es.tahun = '$tahun_lepas'
		and mi.lesen = es.no_lesen
		";

		if($negeri!="" & $negeri!="pm")
		{
			$query.=" and es.negeri = '$negeri'";
		}
		if($negeri=="pm")
		{
			$query.=" and (es.negeri not like 'SARAWAK' and es.negeri not like 'SABAH')";
		}

		//echo $query;

		$res = mysqli_query($con, $query);
		$row = mysqli_fetch_array($res);




		$oer = round($row['PENGELUARAN_CPO']/$row['FFB_PROSES'] *100,4);
		$tan_ffb = round($row['isirung']/$row['FFB_PROSES'],4);
		$tan_oer = $tan_ffb / $oer;

		$var[0] = $row['isirung'];
		$var[1] = $row['PENGELUARAN_CPO'];
		return $var;
}




		///--------------------cop----------------

		function cop ($name, $type, $year, $state, $district, $tahun_r){
				$con =connect();
				$q_cop = "select  * from cop where
				NAME ='$name' and TYPE= '$type' and YEAR= '$year' and STATE= '$state' and DISTRICT= '$district' and YEAR_REPORT='$tahun_r'";
				$r_cop = mysqli_query($con, $q_cop);
				$row_cop = mysqli_fetch_array($r_cop);

				$var[0] = $row_cop['VALUE_MEDIAN'];
				$var[1] = $row_cop['VALUE_MEAN'];
				return $var;
		}

?>
<style type="text/css">
<!--
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
.style3 {
	font-size: 14px;
	color: #000000;
	font-weight: bold;
}
-->
</style>
<?php
	$satu = $_COOKIE['tahun_report']-0;
  	$dua = $_COOKIE['tahun_report']-1;

?>
<script type="text/javascript">

function openScript(url, width, height) {
        var Win = window.open(url,"openScript",'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}

</script>
<div align="center" class="style3">
  <h2>Oil Extraction Rate (OER) and CPO Yield, by Region, <?php echo $t2=$_COOKIE['tahun_report']-2;?>-<?php echo $t1=$_COOKIE['tahun_report']-1;?> <br />
  </h2>
</div>
<table width="64%" border="0" align="center" cellpadding="0" cellspacing="0" class="baju">
  <tr>
    <td height="37" colspan="2" rowspan="2" bgcolor="#480000">&nbsp;</td>
    <td colspan="3" bgcolor="#480000" style="border-bottom:solid 1px #fff"><div align="center"><strong class="style2">OER</strong></div></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#480000" class="style2"><div align="right"><?php echo $t2; ?></div></td>
    <td width="25%" bgcolor="#480000" class="style2"><div align="right"><?php echo $t1; ?></div></td>
    <td width="26%" bgcolor="#480000" class="style2"><div align="right">% Change </div></td>
  </tr>
  <tr>
    <td height="22" colspan="2"><div align="right"><strong>Cost of Production Survey : </strong>
    </div>
      <div align="left"></div></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr class="alt">
    <td height="29" colspan="2" <?php if($_COOKIE['tahun_report']==2010){?> ondblclick="javascript:openScript('add_cop.php?name=<?php echo "Malaysia";?>&type=<?php echo "OER CPO"; ?>&tahun=<?php echo $_COOKIE['tahun_report'];?>&year=<?php echo $year;?>&state=<?php echo $state; ?>','700','200')"<?php } ?>><div align="right"><strong>Malaysia</strong></div>
      <div align="left"></div></td>
    <td><div align="right">
      <?php

	  if($_COOKIE['tahun_report']==2010){
	if($year==""){ $year=1;}
	$a1 = cop ( "Malaysia",  "OER CPO", $year, $state, $district, $_COOKIE['tahun_report']);
	}
	if($_COOKIE['tahun_report']!=2010){
	   $a1 = kernel_price('', $_COOKIE['tahun_report']-1);
	 }
	    echo number_format($a1[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $a = kernel_price('', $_COOKIE['tahun_report']); echo number_format($a[0],2);?>
    </div></td>
    <td><div align="right"><?php $ch = (($a[0]-$a1[0])/$a1[0])*100; echo number_format($ch,2);?></div></td>
  </tr>
  <tr>
    <td height="21" colspan="2" <?php if($_COOKIE['tahun_report']==2010){?> ondblclick="javascript:openScript('add_cop.php?name=<?php echo "Peninsular";?>&type=<?php echo "OER CPO"; ?>&tahun=<?php echo $_COOKIE['tahun_report'];?>&year=<?php echo $year;?>&state=<?php echo $state; ?>','700','200')"<?php } ?>><div align="right">Peninsular Malaysia </div>
      <div align="left"></div></td>
    <td><div align="right">
      <?php

	  if($_COOKIE['tahun_report']==2010){
	if($year==""){ $year=1;}
	$b1 = cop ( "Peninsular", "OER CPO", $year, $state, $district, $_COOKIE['tahun_report']);
	}
	if($_COOKIE['tahun_report']!=2010){
	  $b1 = kernel_price('pm', $_COOKIE['tahun_report']-1);
	  }
	   echo number_format($b1[0],2);
	  ?>
    </div></td>
    <td><div align="right">
      <?php $b = kernel_price('pm', $_COOKIE['tahun_report']); echo number_format($b[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $ch = (($b[0]-$b1[0])/$b1[0])*100; echo number_format($ch,2);?>
    </div></td>
  </tr>
  <tr class="alt">
    <td height="28" colspan="2" <?php if($_COOKIE['tahun_report']==2010){?> ondblclick="javascript:openScript('add_cop.php?name=<?php echo "Sabah";?>&type=<?php echo "OER CPO"; ?>&tahun=<?php echo $_COOKIE['tahun_report'];?>&year=<?php echo $year;?>&state=<?php echo $state; ?>','700','200')"<?php } ?>><div align="right">Sabah</div></td>
    <td><div align="right">
      <?php

	  if($_COOKIE['tahun_report']==2010){
	if($year==""){ $year=1;}
	$c1 = cop ( "sabah",  "OER CPO", $year, $state, $district, $_COOKIE['tahun_report']);
	}
	if($_COOKIE['tahun_report']!=2010){
	  $c1 = kernel_price('sabah', $_COOKIE['tahun_report']-1);
	  }echo number_format($c1[0],2);
	  ?>
    </div></td>
    <td><div align="right">
      <?php $c = kernel_price('sabah', $_COOKIE['tahun_report']); echo number_format($c[0],2);?>
    </div></td>
    <td><div align="right">
      <?php $ch = (($c[0]-$c1[0])/$c1[0])*100; echo number_format($ch,2);?>
    </div></td>
  </tr>
  <tr>
    <td height="28" colspan="2" style="border-bottom:solid 1px #000" <?php if($_COOKIE['tahun_report']==2010){?> ondblclick="javascript:openScript('add_cop.php?name=<?php echo "Sarawak";?>&type=<?php echo "OER CPO"; ?>&tahun=<?php echo $_COOKIE['tahun_report'];?>&year=<?php echo $year;?>&state=<?php echo $state; ?>','700','200')"<?php } ?>><div align="right">Sarawak</div>
      <div align="left"></div></td>
    <td style="border-bottom:solid 1px #000"><div align="right">
      <?php

	  if($_COOKIE['tahun_report']==2010){
	if($year==""){ $year=1;}
	$d1 = cop ( "sarawak",  "OER CPO", $year, $state, $district, $_COOKIE['tahun_report']);
	}
	if($_COOKIE['tahun_report']!=2010){
	  $d1 = kernel_price('sarawak', $_COOKIE['tahun_report']-1);
	  }echo number_format($d1[0],2);
	  ?>
    </div></td>
    <td style="border-bottom:solid 1px #000"><div align="right">
      <?php $d = kernel_price('sarawak', $_COOKIE['tahun_report']); echo number_format($d[0],2);?>
    </div></td>
    <td style="border-bottom:solid 1px #000"><div align="right">
      <?php $ch = (($d[0]-$d1[0])/$d1[0])*100; echo number_format($ch,2);?>
    </div></td>
  </tr>
</table>
<br />
<br />
<?php
$_SESSION['kernel_malaysia']=round($b[0],2);
$_SESSION['kernel_sabah']=round($c[0],2);
$_SESSION['kernel_sarawak']=round($d[0],2);
?>
<div align="center">
      <div id="graph" style="height:450px;"><strong>Please upgrade you flash</strong></div>
    </div>
<script type="text/javascript" src="../js/bar/swfobject.js"></script>
<script type="text/javascript">
		// <![CDATA[
		var so = new SWFObject("ampie/ampie.swf", "amline", "100%", "100%", "8", "#FFFFFF");
		so.addVariable("settings_file", encodeURIComponent("../xml/settings_estate_size1.xml"));
		so.addVariable("data_file", encodeURIComponent("kernel_data_oil.php"));
		so.write("graph");
		// ]]>
	</script>
<br />
<br />
