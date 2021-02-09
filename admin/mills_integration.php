<?php include('baju_merah.php');?>
<style type="text/css">
<!--
.style2 {color: #FFFFFF; font-weight: bold; }
.style3 {
	font-size: 16px;
	color: #000000;
}
.style4 {font-weight: bold}
-->
</style>
<?php
	$con = connect();
	$q1="SELECT SUM(kapasiti) AS kapasiti01 FROM mill_info WHERE kapasiti < 19 and integrasi = 'Y' ";
	$r1=mysqli_query($con, $q1);

	while($row=mysqli_fetch_array($r1)){
		$kapasiti01 = $row['kapasiti01'];
	}

	$q2="SELECT SUM(kapasiti) AS kapasiti02 FROM mill_info WHERE kapasiti BETWEEN 20 AND 30 and integrasi = 'Y'";
	$r2=mysqli_query($con, $q2);

	while($row=mysqli_fetch_array($r2)){
		$kapasiti02 = $row['kapasiti02'];
	}

	$q3="SELECT SUM(kapasiti) AS kapasiti03 FROM mill_info WHERE kapasiti BETWEEN 30 AND 40 and integrasi = 'Y'";
	$r3=mysqli_query($con, $q3);

	while($row=mysqli_fetch_array($r3)){
		$kapasiti03 = $row['kapasiti03'];
	}

	$q4="SELECT SUM(kapasiti) AS kapasiti04 FROM mill_info WHERE kapasiti BETWEEN 40 AND 50 and integrasi = 'Y'";
	$r4=mysqli_query($con, $q4);

	while($row=mysqli_fetch_array($r2)){
		$kapasiti04 = $row['kapasiti02'];
	}

	$q5="SELECT SUM(kapasiti) AS kapasiti05 FROM mill_info WHERE kapasiti > 50 and integrasi = 'Y'";
	$r5=mysqli_query($con, $q5);

	while($row=mysqli_fetch_array($r5)){
		$kapasiti05 = $row['kapasiti05'];
	}

	$qtotal="SELECT SUM(kapasiti) AS total, AVG(kapasiti) AS average FROM mill_info where integrasi = 'Y'";
	$rtotal=mysqli_query($con, $qtotal);

	while($row=mysqli_fetch_array($rtotal)){
		$total = $row['total'];
		$average = $row['average'];
	}
?>
<br />
<table width="80%" class="baju" align="center">
  <tr>
    <td height="37" colspan="2" class="style2"><div align="center" class="style3">Degree of Estate-Mill Integration </div></td>
  </tr>
  <tr>
    <th width="45%" height="37"><div align="center" class="style2">
      <div align="left">Percentage of Own FBB Processed </div>
    </div></th>
    <th width="25%"><div align="center" class="style2">
      <div align="right">Per Cent</div>
    </div></th>
  </tr>
  <tr class="alt">
    <td height="22"><div align="left">Under 20</div></td>
    <td><div align="right"><?php echo number_format(($kapasiti01/$total)*100,2); ?></div></td>
  </tr>
  <tr>
    <td height="29"><div align="left">20 - under 30</div></td>
    <td><div align="right"><?php echo number_format(($kapasiti02/$total)*100,2); ?></div></td>
  </tr>
  <tr class="alt">
    <td height="21"><div align="left">30 - under 40</div></td>
    <td><div align="right"><?php echo number_format(($kapasiti03/$total)*100,2); ?></div></td>
  </tr>
  <tr>
    <td height="28"><div align="left">40 - under 50</div></td>
    <td><div align="right"><?php echo number_format(($kapasiti04/$total)*100,2); ?></div></td>
  </tr>
  <tr class="alt">
    <td height="22"><div align="left">50 and above</div></td>
    <td><div align="right"><?php echo number_format(($kapasiti05/$total)*100,2); ?></div></td>
  </tr>
  <tr class="kaki">
    <td height="34">      <strong>Total</strong></td>
    <td>      <div align="right"><span class="style4">
      <?php $total_new = $kapasiti05+$kapasiti04+$kapasiti03+$kapasiti02+$kapasiti01; echo number_format(($total_new/$total)*100,2); ?>
    </span>  </div></td></tr>
  <tr class="kaki">
    <td height="34"><strong>Average for all mill </strong></td>
    <td><div align="right"><strong><?php echo number_format(($average),2); ?></strong></div></td>
  </tr>
</table>
<br />
<br />
