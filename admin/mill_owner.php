<?php

  include('mill_owner_size.php');
  $q = "select * from company";
  $r = mysqli_query($con, $q);
	$qmax ="SELECT max( aa.xx ) as maksimum FROM (SELECT count( * ) AS xx FROM estate_info GROUP BY syarikat)aa";
	$rmax = mysqli_query($con, $qmax);
	$rowmax=mysqli_fetch_array($rmax);
	// print_r($rowmax['maksimum']);

?>

<table width="100%">
  <tr>
    <td><h2 align="center">Types of Palm Oil Mill Ownership
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
						 while($row=mysqli_fetch_assoc($r)){
						 	$i++;
					 		$qo ="SELECT lesen FROM mill_info WHERE syarikat = '".$row['comp_name']."'";
					 		$ro = mysqli_query($con, $qo);
					 		$jumlahro = mysqli_num_rows($ro);
				 			echo "['".$row['comp_name_english']."', ".$jumlahro."],";
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
