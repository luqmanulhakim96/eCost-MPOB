<?php include ('baju_merah.php');

	///$con = connect();




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
		$var[1] = $tan_ffb;
		$var[2]= $tan_oer;
		$var[3]=$oer;
		return $var;
}


?>
<table width="100%">
  <tr>
    <td><div align="center">
      <h2>&nbsp;&nbsp;Kernel Credit per Tonne FBB and CPO, <?php echo $_COOKIE['tahun_report'];?></h2>
    </div></td>
  </tr>

</table>


<table width="90%" border="0" align="center" cellspacing="0" class="baju">
  <tr>
    <th width="34%" rowspan="2" ><span class="style1"></span></th>
    <th width="25%" height="21" ><div align="center" class="style1"><strong>Kernel Price</strong></div></th>
    <th width="23%" ><div align="center" class="style1"><strong>Kernel Credit</strong></div></th>
    <th width="18%" ><div align="center" class="style1"><strong>Kernel Credit</strong></div></th>
  </tr>
  <tr>
    <th height="21" ><div align="center" class="style1"><strong>(RM/T)</strong></div></th>
    <th width="23%" ><div align="center" class="style1"><strong>(RM/T FFB)</strong></div></th>
    <th width="18%" ><div align="center" class="style1"><strong>(RM/T CPO)</strong></div></th>
  </tr>
  <tr class="alt">
    <td height="29"><strong>Malaysia</strong></td>
    <td><div align="center"><strong><?php $a = kernel_price('', $_COOKIE['tahun_report']); echo number_format($a[0],2);?></strong></div></td>
    <td><div align="center"><strong><?php echo number_format($a[1],4);?></strong></div></td>
    <td><div align="center"><strong><?php echo number_format($a[2],4);?></strong></div></td>
  </tr>
  <tr>
    <td height="29">Peninsular Malaysia</td>
    <td><div align="center"><?php $b = kernel_price('pm', $_COOKIE['tahun_report']); echo number_format($b[0],2);?></div></td>
    <td><div align="center"><?php echo number_format($b[1],4);?></div></td>
    <td><div align="center"><?php echo number_format($a[2],4);?></div></td>
  </tr>
  <tr class="alt">
    <td height="28">Sabah</td>
    <td><div align="center"><?php $c = kernel_price('sabah', $_COOKIE['tahun_report']); echo number_format($c[0],2);?></div></td>
    <td><div align="center"><?php echo number_format($c[1],4);?></div></td>
    <td><div align="center"><?php echo number_format($a[2],4);?></div></td>
  </tr>
  <tr>
    <td height="38">Sarawak</td>
    <td><div align="center"><?php $d = kernel_price('sarawak', $_COOKIE['tahun_report']); echo number_format($d[0],2);?></div></td>
    <td><div align="center"><?php echo number_format($d[1],4);?></div></td>
    <td><div align="center"><?php echo number_format($a[2],4);?></div></td>
  </tr>

</table>

<br />
<br />

<?php
$_SESSION['kernel_malaysia']=$b[0]/$a[0]*100;
$_SESSION['kernel_sabah']=$c[0]/$a[0]*100;
$_SESSION['kernel_sarawak']=$d[0]/$a[0]*100;
print_r($_SESSION['kernel_malaysia']=$b[0],2);
print_r($_SESSION['kernel_sabah']=$c[0],2);
print_r($_SESSION['kernel_sarawak']=$d[0],2);

?>
<div align="center">
      <div id="piechart" style="height:450px;"><strong>Please upgrade you flash</strong></div>
    </div>
		<!-- initialize Google Chart -->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

		<script type="text/javascript">
		      google.charts.load('current', {'packages':['corechart']});
		      google.charts.setOnLoadCallback(drawChart);

		      function drawChart() {

						var data = google.visualization.arrayToDataTable([
		          ['Negeri', 'KERNEL'],
		          ['Peninsular Malaysia',     <?php echo $_SESSION['kernel_malaysia']; ?>],
		          ['Sabah',      <?php echo $_SESSION['kernel_sabah']; ?>],
		          ['Sarawak',  <?php echo $_SESSION['kernel_sarawak']; ?>],
		        ]);

		        var options = {
		          title: '',
				
							slices: {
									 0 : {offset: 0.3},
							},
		        };

		        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		        chart.draw(data, options);
		      }
		</script>
		<br />
		<br />
