<?php

session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");

include('baju.php');
include('pages.php');
?>
<?php





		  	$tahun = $_COOKIE['tahun_report'];

			$pertama = $tahun-3;
			$kedua = $tahun-2;
			$ketiga = $tahun-1;

			$pertama = substr($pertama,-2);
			$kedua = substr($kedua,-2);
			$ketiga = substr($ketiga,-2);
/*
  $tahun = $_SESSION['tahun'];
  echo $pertama = $tahun-1;
  echo $first = $pertama[2];

  $kedua = $tahun-2;
  $second = $kedua[3].$kedua[4];

  $ketiga = $tahun-3;
  $third = $ketiga[3].$ketiga[4];*/
?>

<h2><strong>Check List for Immature Data</strong></h2>
<table width="100%" class="baju">
  <thead>
  <tr>
    <th width="2%" class="style1">No.</th>
    <th width="33%" height="36"><span class="style1">Estate Name</span></th>
    <th width="34%"><div align="center"><span class="style1">New License No.</span></div></th>
    <th width="3%" valign="top"><span class="style1">New Planting<br />
 (<?php echo $pertama; ?>)</span></th>
    <th width="3%" valign="top"><span class="style1">New Planting<br />
(<?php echo $kedua; ?>)</span></th>
    <th width="3%" valign="top"><span class="style1">New Planting<br />
 (<?php echo $ketiga; ?>)</span></th>
    <th width="3%" valign="top"><span class="style1">Replanting <br />
(<?php echo $pertama; ?>)</span></th>
    <th width="3%" valign="top"><span class="style1">Replanting <br />
(<?php echo $kedua; ?>)</span></th>
    <th width="3%" valign="top"><span class="style1">Replanting <br />
(<?php echo $ketiga; ?>)</span></th>
    <th width="3%" valign="top"><span class="style1">Conversion<br />
 (<?php echo $pertama; ?>)</span></th>
    <th width="3%" valign="top"><span class="style1">Conversion<br />
 (<?php echo $kedua; ?>)</span></th>
    <th width="3%" valign="top"><span class="style1">Conversion<br />
 (<?php echo $ketiga; ?>)</span></th>
  </tr>
  </thead>

  <tbody>

  <?php
  $con = connect();
  $q="select * from esub group by no_lesen_baru order by no_lesen";
  $r=mysqli_query($con, $q);
  $i=1;



  while($row=mysqli_fetch_array($r)){
  ?>
  <tr>
    <td height="35"><?php echo $i++; ?></td>
    <td><?php echo $row['Nama_Estet'];?></td>
    <td><div align="center"><?php echo $no_lesen = $row['No_Lesen_Baru'];?></div></td>
    <td><div align="center"><?php
		$con = connect();
		$q1a ="select * from tanam_baru$pertama where lesen = '$no_lesen'";
		$r1a = mysqli_query($con, $q1a);
		$res_totala = mysqli_num_rows($r1a);

		if($res_totala>0)
		{?>
			<div align="center"><img src="tick.gif" width="16" height="16" /></div>
		<?php  }

	?></div></td>
    <td><div align="center">
    <?php
		$con = connect();
		$q1b ="select * from tanam_baru$kedua where lesen = '$no_lesen' ";
		$r1b = mysqli_query($con, $q1b);
		$res_totalb = mysqli_num_rows($r1b);

		if($res_totalb>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}

	?></div></td>
    <td><div align="center"><?php
		$con = connect();
		$q1c ="select * from tanam_baru$ketiga where lesen = '$no_lesen' ";
		$r1c = mysqli_query($con, $q1c);
		$res_totalc = mysqli_num_rows($r1c);

		if($res_totalc>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}

	?></div></td>
    <td><div align="center"><?php
		$con = connect();
		$q1d ="select * from tanam_semula$pertama where lesen = '$no_lesen'";
		$r1d = mysqli_query($con, $q1d);
		$res_totald = mysqli_num_rows($r1d);

		if($res_totald>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}

	?></div></td>
    <td><div align="center"><?php
		$con = connect(); 
		$q1e ="select * from tanam_semula$kedua where lesen = '$no_lesen'";
		$r1e = mysqli_query($con, $q1e);
		$res_totale = mysqli_num_rows($r1e);

		if($res_totale>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}

	?></div></td>
    <td><div align="center">
    <?php
		$con = connect();
		$q1f ="select * from tanam_semula$ketiga where lesen = '$no_lesen'";
		$r1f = mysqli_query($con, $q1f);
		$res_totalf = mysqli_num_rows($r1f);

		if($res_totalf>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}

	?></div></td>
    <td><div align="center"><?php
		$con = connect();
		$q1g ="select * from tanam_tukar$pertama where lesen = '$no_lesen'";
		$r1g = mysqli_query($con, $q1g);
		$res_totalg = mysqli_num_rows($r1g);

		if($res_totalg>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}

	?></div></td>
    <td><div align="center">
    <?php
		$con = connect();
		$q1h="select * from tanam_tukar$kedua where lesen = '$no_lesen'";
		$r1h = mysqli_query($con, $q1h);
		$res_totalh = mysqli_num_rows($r1h);

		if($res_totalh>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}

	?></div></td>
    <td><div align="center">
    <?php
		$con = connect();
		$q1k ="select * from tanam_tukar$ketiga where lesen = '$no_lesen' ";
		$r1k = mysqli_query($con, $q1k);
		$res_totalk = mysqli_num_rows($r1k);

		if($res_totalk>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}

	?>
    </div></td>
  </tr>

  <?php } ?>

  </tbody>
</table>
<p>&nbsp;</p>
