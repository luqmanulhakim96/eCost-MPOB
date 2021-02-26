<?php


$con = connect();

extract($_REQUEST);
include('..xml/estate_topography.php');
$year =  $_COOKIE['tahun_report'];
if($year == date('Y')){
	$table = 'esub';
}
else{
	$table="esub_".$year;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);

$q = "SELECT sum(info.percentrata) as rata, sum(info.percentbukit) as bukit25, sum(info.percentcerun) as bukit, sum(info.percentalun) as beralun
			FROM estate_info info
			INNER JOIN $table a on info.lesen = a.No_Lesen_Baru
			LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year'
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year'
			WHERE
			a.No_Lesen_Baru <> ''
			and a.No_Lesen_Baru not like '%123456%'
			and (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)";

$r= mysqli_query($con, $q);
$row = mysqli_fetch_array($r);


$rata = $row['rata'];
$bukit25 = $row['bukit25'];
$bukit = $row['bukit'];
$beralun = $row['beralun'];
 ?>

<table width="100%" id="baju">
  <tr>
    <td><div align="center">
      <h2><b>&nbsp;&nbsp;Estate Topography</b></h2>
    </div></td>
  </tr>
  <tr>
  </tr>
  </table>

      <div id="piechart" style="width: 1500px; height: 600px;"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
       google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable([
           ['Area', ''],
           ['Flat Area', <?php echo $rata; ?> ],
           ['Area more than 25', <?php echo $bukit25; ?>],
           ['Hilly Area', <?php echo $bukit; ?> ],
           ['Undulating Terrain', <?php echo $beralun; ?>],


         ]);

         var options = {
           title: '',
           legend: 'none',
           pieSliceText: 'label',
           slices: {  0: {offset: 0.2},
                     1: {offset: 0.2},
                     2: {offset: 0.2},
                     3: {offset: 0.2},
                     4: {offset: 0.2},

           },
         };

         var chart = new google.visualization.PieChart(document.getElementById('piechart'));
         chart.draw(data, options);
       }
     </script>
