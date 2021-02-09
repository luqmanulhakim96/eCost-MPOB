<?php include ('baju2.php');


?>
	<link rel="stylesheet" href="../css/buttons/css/buttons.css" type="text/css" media="screen" />

<p>&nbsp;</p>
<table width="98%" align="center" class="baju2">
  <tr>
    <th width="12%">Type of survey</th>
    <th width="13%">Year of survey</th>
    <th width="14%">Analysis by</th>
    <th width="27%">Last date of analysis</th>
    <th colspan="2"><div align="center">Action </div></th>
  </tr>
  <?php

  function analysis($type, $year){
  			$con=connect();
			$qt1="select * from analysis where type='$type' and year = '$year'";
			$rt1=mysqli_query($con, $qt1);
			    $total = mysqli_num_rows($rt1);
				$row=mysqli_fetch_array($rt1);

 			 	$variable[0] = $total;
  				$variable[1] = $row['type'];
				$variable[2] = $row['year'];
				$variable[3] = $row['modifiedby'];
				$variable[4] = $row['modified'];

  				return $variable;

  }

  $con=connect();
			  $qt="select pb_thisyear from kos_belum_matang group by pb_thisyear ";
			  $rt=mysqli_query($con, $qt);
			  while($rowt=mysqli_fetch_array($rt)){


			  $ana1 = analysis("ESTATE", $rowt['pb_thisyear']);
			  $ana2 = analysis("MILL", $rowt['pb_thisyear']);

			  ?>
  <tr class="alt">
    <td><strong>Estate </strong></td>
    <td><?php echo $rowt['pb_thisyear'];?></td>
    <td><?php echo $ana1[3];?></td>
    <td><?php echo $ana1[4];?></td>
    <td width="15%">
<div id="green-button" align="center">
		  <a href="home.php?id=analysis&sub=analysis_estate&tahun=<?php echo $rowt['pb_thisyear'];?>" class="green-button pcb">
				<span>Run analysis</span>		  </a>	</div>

    </td>
<td width="19%">
<?php if($_COOKIE['tahun_report']==$rowt['pb_thisyear']){?>
<div id="grey-button" align="center">
			<a href="home.php?id=analysis&sub=analysis_estate_view" class="grey-button pcb">
	<span>View analysis</span>			</a>		</div>
    <?php } ?>
    </td>
  </tr>
  <tr>
    <td><strong>Kilang</strong> </td>
    <td><?php echo $rowt['pb_thisyear'];?></td>
    <td><?php echo $ana2[3];?></td>
    <td><?php echo $ana2[4];?></td>
    <td><div id="red-button" align="center">
		<a href="home.php?id=analysis&sub=analysis_mill&tahun=<?php echo $rowt['pb_thisyear'];?>" class="red-button pcb">
				<span>Run analysis</span>		</a>
		</div>	</td>
    <td>

    <?php if($_COOKIE['tahun_report']==$rowt['pb_thisyear']){?>
    <div id="grey-button" align="center">
			<a href="home.php?id=analysis&sub=analysis_mill_view" class="grey-button pcb">
	<span>View analysis</span>			</a>		</div>
    <?php } ?>

    </td>
  </tr>
   <?php } ?>
</table>



<p>&nbsp;</p>
