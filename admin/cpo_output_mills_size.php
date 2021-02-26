<?php
include('baju_merah.php');

  include('..xml/amline_cpo_output.php');
  function luas_cpo($nilai,$nilai2){
    $con=connect();
    $tahun_lepas =  $_COOKIE['tahun_report']-1;

    $q ="select sum(PENGELUARAN_CPO) as JUMLAH from ekilang ek , login_mill lm where lm.lesen = ek.no_lesen
    and lm.success !='0000-00-00 00:00:00' and lm.firsttime !='1'
    and ek.tahun = '".$tahun_lepas."' and ek.PENGELUARAN_CPO between '$nilai' and '$nilai2'";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);
    $size[0] = $row['JUMLAH'];
    return $size;
  }
?>


<table width="100%">
  <tr>
    <td><h2 align="center">Distribution of Mills by CPO Output, <?php echo $_COOKIE['tahun_report'];?>
    </h2></td>
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
       ["Under 10000", <?php $luas = luas_cpo(0,10000); echo $luas[0]; ?>, "#FFC300"],
       ["10000-20000", <?php $luas1 = luas_cpo(10001,20000); echo $luas1[0]; ?>, "#FFC300"],
       ["20001-30000", <?php $luas2 = luas_cpo(20001,30000); echo $luas2[0]; ?>, "#FFC300"],
       ["30001-40000", <?php $luas3 = luas_cpo(30001,40000); echo $luas3[0]; ?>, "#FFC300"],
       ["40001-50000", <?php $luas4 = luas_cpo(40001,50000); echo $luas4[0]; ?>, "#FFC300"],
       ["50000 and Larger", <?php $luas5 = luas_cpo(50001,999999999999999); echo $luas5[0]; ?>, "#FFC300"],
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
