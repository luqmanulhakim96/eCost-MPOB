<?php

  // include('../xml/estate_size.php?year='.$_COOKIE['tahun_report']);
    if($_COOKIE['tahun_report'] == date('Y')){
      $table = 'esub';
    }
    else{
      $table="esub_".$_COOKIE['tahun_report'];
    }
    $q="select * from company";
    $r=mysqli_query($con, $q);

    $qmax ="SELECT max( aa.xx ) as maksimum FROM (SELECT count( * ) AS xx FROM estate_info GROUP BY syarikat)aa";

    $rmax = mysqli_query($con, $qmax);
    $rowmax=mysqli_fetch_array($rmax);
?>

<table width="100%">
  <tr>
    <td><h2 align="center">Type of Estates Ownership
    </h2></td>
  </tr>
  <tr>
    <td><div align="center">
      <div id="piechart" style="width: 1000px; height: 500px;"></div>
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
           ['comp_name', 'maksimum'],

           <?php
           $i=0;
           while($row=mysqli_fetch_array($r)){
             //$qo ="select lesen from estate_info where syarikat = '".$row['comp_name']."' ";
             $i++;
             $qo = "SELECT info.lesen
                 FROM estate_info info
                 INNER JOIN $table a on info.lesen = a.No_Lesen_Baru
                 LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
                 LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year'
                 LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
                 LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year'
                 WHERE
                 a.No_Lesen_Baru <> ''
                 and a.No_Lesen_Baru not like '%123456%'
                 and (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)
                 and info.syarikat = '".$row['comp_name']."' ";
             $ro=mysqli_query($con, $qo);
             $jumlahro = mysqli_num_rows($ro);
             if($jumlahro)
             {
               echo "['".$row['comp_name_english']."', ".$jumlahro."],";

             }
             else {

             }
             if($jumlahro==$rowmax['maksimum']){
               $max = $i;
             }
           }
         ?>
       ]);

       var options = {
         title: '',
         pieSliceText: 'label',
         <?php if($max){ ?>
         slices: {
             <?php $max ?>: {offset: 0.3},
         },
         <?php } ?>
       };

       var chart = new google.visualization.PieChart(document.getElementById('piechart'));

       chart.draw(data, options);
     }
   </script>
