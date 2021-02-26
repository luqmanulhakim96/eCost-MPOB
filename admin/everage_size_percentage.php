<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('baju_merah.php');

// include('..xml/amline_data.php');
function luas($nilai,$nilai2){
$con=connect();
$q ="SELECT count(Jumlah) as Jumlah FROM esub WHERE Jumlah between '$nilai' and '$nilai2'";
$r = mysqli_query($con, $q);
$row = mysqli_fetch_array($r);
$size[0] = $row['Jumlah'];
return $size;
}
?>

<br>
<table width="100%">
  <tr>
    <td><div align="center">
      <h2><b>&nbsp;&nbsp;Percentage of Oil Palm Estates According to Various Size Group</b>
        </h2>
    </div></td>
  </tr>

  <tr>

  </tr>
  </table>

  <div id="columnchart_values" style="width: 1500px; height: 300px;"></div>
  <!-- initialize Google Chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

   <script type="text/javascript">
     google.charts.load("current", {packages:['corechart']});
     google.charts.setOnLoadCallback(drawChart);
     function drawChart() {
       var data = google.visualization.arrayToDataTable([
         ["", "", { role: "style" } ],
         ["Under 100", <?php $luas = luas(0,99); echo $luas[0]; ?>, "#FFC300"],
         ["100-499", <?php $luas = luas(100,499); echo $luas[0]; ?>, "#FFC300"],
         ["500-999", <?php $luas = luas(500,999); echo $luas[0]; ?>, "#FFC300"],
         ["1,000-1,499", <?php $luas = luas(1000,1499); echo $luas[0]; ?>, "#FFC300"],
         ["1,500-1,999", <?php $luas = luas(1500,1999); echo $luas[0]; ?>, "#FFC300"],
         ["2,000 and Larger", <?php $luas = luas(2000,99999999); echo $luas[0]; ?>, "#FFC300"],
       ]);

       var view = new google.visualization.DataView(data);
       view.setColumns([0, 1,
                        { calc: "stringify",
                          sourceColumn: 1,
                          type: "string",
                          role: "annotation" },
                        2]);

       var options = {
         title: "",
         bar: {groupWidth: "85%"},
         legend: { position: "none" },
       };
       var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
       chart.draw(view, options);
   }
   </script>



  <tr>
    <td><div align="center">
      <h2><b>&nbsp;&nbsp;Table Percentage of Oil Palm Estates According to Various Size Group</b>
        <!-- amline script-->

        </h2>
    </div></td>
  </tr>


  <tr>
    <td>

    <?php

	$con =connect();
	$query = "SELECT count(Jumlah) as Jumlah FROM esub ";
		$res_jumlah = mysqli_query($con, $query);
		$row_jumlah = mysqli_fetch_array($res_jumlah);
		$jumlah = $row_jumlah['Jumlah'];

    function luas2($nilai,$nilai2,$jumlah){
  			$con=connect();
  			$q ="SELECT count(Jumlah) as Jumlah FROM esub WHERE Jumlah between '$nilai' and '$nilai2'";
  			$r = mysqli_query($con, $q);
  			$row = mysqli_fetch_array($r);
  			$total = mysqli_num_rows($r);
  			$size[0] = $row['Jumlah'];

  			$size[1] = round($size[0]/$jumlah*100,2);

  			return $size;
			}
?>
    <table width="60%" align="center" class="baju">
      <tr>
        <th>Size group</th>
        <th><div align="right">Number</div></th>
        <th><div align="right">%</div></th>
      </tr>
      <tr class="alt">
        <td>&lt;100</td>
        <td><div align="right">
          <?php $luas1 = luas2(0,99,$jumlah); echo number_format($luas1[0]);?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas1[1],2);?>&nbsp;</div></td>
      </tr>
      <tr>
        <td>100-499</td>
        <td><div align="right">
          <?php $luas2 = luas2(100,499,$jumlah); echo number_format($luas2[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas2[1],2);?>&nbsp;</div></td>
      </tr>
      <tr class="alt">
        <td>500-999</td>
        <td><div align="right">
          <?php $luas3 = luas2(500,999,$jumlah); echo number_format($luas3[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas3[1],2);?>&nbsp;</div></td>
      </tr>
      <tr>
        <td>1000-1499</td>
        <td><div align="right">
          <?php $luas4 = luas2(1000,1499,$jumlah); echo number_format($luas4[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas4[1],2);?>&nbsp;</div></td>
      </tr>
      <tr class="alt">
        <td>1500-1999</td>
        <td><div align="right">
          <?php $luas5 = luas2(1500,1999,$jumlah); echo number_format($luas5[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas5[1],2);?>&nbsp;</div></td>
      </tr>
      <tr class="alt">
        <td>2000&gt;</td>
        <td><div align="right">
          <?php $luas6 = luas2(2000,99999999,$jumlah); echo number_format($luas6[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas6[1],2);?>&nbsp;</div></td>
      </tr>
      <tr>
        <td><strong>Total</strong></td>
        <td><div align="right"><strong>
          <?php  $jumlah = $luas1[0]+$luas2[0]+$luas3[0]+$luas4[0]+$luas5[0]+$luas6[0]; echo number_format($jumlah,2);?>
        &nbsp;</strong></div></td>
        <td><div align="right"> <span class="style2">
          <?php  $jumlah_percent = $luas1[1]+$luas2[1]+$luas3[1]+$luas4[1]+$luas5[1]+$luas6[1]; echo number_format($jumlah_percent,2);?>
        </span>&nbsp;</div></td>
      </tr>
    </table></td>
  </tr>
