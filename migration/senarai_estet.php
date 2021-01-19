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
  $r=mysql_query($q,$con);
  $i=1;
  
    
  
  while($row=mysql_fetch_array($r)){
  ?>
  <tr>
    <td height="35"><?php echo $i++; ?></td>
    <td><?php echo $row['Nama_Estet'];?></td>
    <td><div align="center"><?php echo $no_lesen = $row['No_Lesen_Baru'];?></div></td>
    <td><div align="center"><?php 
		$con = connect(); 
		$q1a ="select * from tanam_baru$pertama where lesen = '$no_lesen'";
		$r1a = mysql_query($q1a,$con);
		$res_totala = mysql_num_rows($r1a);
		
		if($res_totala>0)
		{?>
			<div align="center"><img src="tick.gif" width="16" height="16" /></div>
		<?php  }
	
	?></div></td>
    <td><div align="center">
    <?php 
		$con = connect(); 
		$q1b ="select * from tanam_baru$kedua where lesen = '$no_lesen' ";
		$r1b = mysql_query($q1b,$con);
		$res_totalb = mysql_num_rows($r1b);
		
		if($res_totalb>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}
	
	?></div></td>
    <td><div align="center"><?php 
		$con = connect(); 
		$q1c ="select * from tanam_baru$ketiga where lesen = '$no_lesen' ";
		$r1c = mysql_query($q1c,$con);
		$res_totalc = mysql_num_rows($r1c);
		
		if($res_totalc>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}
	
	?></div></td>
    <td><div align="center"><?php 
		$con = connect(); 
		$q1d ="select * from tanam_semula$pertama where lesen = '$no_lesen'";
		$r1d = mysql_query($q1d,$con);
		$res_totald = mysql_num_rows($r1d);
		
		if($res_totald>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}
	
	?></div></td>
    <td><div align="center"><?php 
		$con = connect(); 
		$q1e ="select * from tanam_semula$kedua where lesen = '$no_lesen'";
		$r1e = mysql_query($q1e,$con);
		$res_totale = mysql_num_rows($r1e);
		
		if($res_totale>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}
	
	?></div></td>
    <td><div align="center">
    <?php 
		$con = connect(); 
		$q1f ="select * from tanam_semula$ketiga where lesen = '$no_lesen'";
		$r1f = mysql_query($q1f,$con);
		$res_totalf = mysql_num_rows($r1f);
		
		if($res_totalf>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}
	
	?></div></td>
    <td><div align="center"><?php 
		$con = connect(); 
		$q1g ="select * from tanam_tukar$pertama where lesen = '$no_lesen'";
		$r1g = mysql_query($q1g,$con);
		$res_totalg = mysql_num_rows($r1g);
		
		if($res_totalg>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}
	
	?></div></td>
    <td><div align="center">
    <?php 
		$con = connect(); 
		$q1h="select * from tanam_tukar$kedua where lesen = '$no_lesen'";
		$r1h = mysql_query($q1h,$con);
		$res_totalh = mysql_num_rows($r1h);
		
		if($res_totalh>0)
		{
			echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
		}
	
	?></div></td>
    <td><div align="center">
    <?php 
		$con = connect(); 
		$q1k ="select * from tanam_tukar$ketiga where lesen = '$no_lesen' ";
		$r1k = mysql_query($q1k,$con);
		$res_totalk = mysql_num_rows($r1k);
		
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
