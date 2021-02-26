<?php

  include('amcolumn_data.php');
  $q = "select * from negeri";
  $r = mysqli_query($con, $q);
?>
<table width="100%">
  <tr>
    <td><h2 align="center">Total CPO Output Distribution of Mills
    </h2></td>
  </tr>
  <tr>
    <td><div align="center">
      <div id="piechart" style="width: 1200px; height: 1200px;"></div>
    </div></td>
  </tr>
</table>

<!-- initialize Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.arrayToDataTable([
           ['Negeri', 'Pengeluaran CPO'],
           <?php
               while($row=mysqli_fetch_assoc($r)){
                   $tahun_lepas = $_COOKIE['tahun_report']-1;
                   $queryw = "select sum(PENGELUARAN_CPO) as PENGELUARAN_CPO from ekilang ek , login_mill lm where lm.lesen = ek.no_lesen
                     and lm.success !='0000-00-00 00:00:00' and firsttime !='1' and ek.negeri='".$row['nama']."'
                     and ek.tahun = '".$tahun_lepas."'
                     ";
                   $resw = mysqli_query($con, $queryw);
                   $roww = mysqli_fetch_array($resw);

                   echo "['".$row['nama']."', ".round($roww['PENGELUARAN_CPO'],2)."],";
                 }
           ?>
       ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
