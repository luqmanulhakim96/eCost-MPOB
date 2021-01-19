<?php include('baju_merah.php');?>
<style type="text/css">
<!--
.style2 {color: #FFFFFF; font-weight: bold; }
.style3 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
<?php
	$con = connect();
	$q1="SELECT SUM(kapasiti) AS kapasiti01 FROM mill_info WHERE kapasiti < 19";
	$r1=mysql_query($q1,$con);
	
	while($row=mysql_fetch_array($r1)){
		$kapasiti01 = $row['kapasiti01'];
	}
	
	$q2="SELECT SUM(kapasiti) AS kapasiti02 FROM mill_info WHERE kapasiti BETWEEN 20 AND 30";
	$r2=mysql_query($q2,$con);
	
	while($row=mysql_fetch_array($r2)){
		$kapasiti02 = $row['kapasiti02'];
	}
	
	$q3="SELECT SUM(kapasiti) AS kapasiti03 FROM mill_info WHERE kapasiti BETWEEN 30 AND 40";
	$r3=mysql_query($q3,$con);
	
	while($row=mysql_fetch_array($r3)){
		$kapasiti03 = $row['kapasiti03'];
	}

	$q4="SELECT SUM(kapasiti) AS kapasiti04 FROM mill_info WHERE kapasiti BETWEEN 40 AND 50";
	$r4=mysql_query($q4,$con);
	
	while($row=mysql_fetch_array($r2)){
		$kapasiti04 = $row['kapasiti02'];
	}

	$q5="SELECT SUM(kapasiti) AS kapasiti05 FROM mill_info WHERE kapasiti > 50";
	$r5=mysql_query($q5,$con);
	
	while($row=mysql_fetch_array($r5)){
		$kapasiti05 = $row['kapasiti05'];
	}
	
	$qtotal="SELECT SUM(kapasiti) AS total FROM mill_info";
	$rtotal=mysql_query($qtotal,$con);
	
	while($row=mysql_fetch_array($rtotal)){
		$total = $row['total'];
	}
?>	
<br />
<table width="80%" class="baju" align="center">
  <tr>
    <td height="37" colspan="2"><div align="center" class="style3">Distribution of Palm Oil MIll Processing Capacity </div></td>
  </tr>
  <tr>
    <th width="45%" height="37"><div align="center" class="style2">
      <div align="left">Mill Capacity Classes (Tonnes FFB Per Hour)</div>
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
    <td height="34"><div align="center" class="style2">
      <div align="left">Total</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="right"><?php $total_new = $kapasiti05+$kapasiti04+$kapasiti03+$kapasiti02+$kapasiti01; echo number_format(($total_new/$total)*100,2); ?></div>
    </div></td>
  </tr>
</table>
<br />
<br />
