<?php 
include('../Connections/connection.class.php');
include '../class/admin.estate.class.php';
header("Content-Disposition: attachment; filename=Estate_Response_Incomplete_Survey_in_Malaysia.xls");
?>
<?php
$con=connect();
$qp="select * from login_estate where success like '0000-00-00 00:00:00' and lesen not like '123456789012'";
$rp =mysql_query($qp,$con);
?>
        
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="example">
	<thead>
		<tr bgcolor="#8A1602" height="30">
			<th width="4%" class="style1" filter='false'>No.</th>
			<th class="style1">Estate Name</th>
			<th><span class="style1">Company Name</span></th>
			<th><span class="style1">New License No.</span></th>
			<th class="style1">E-mail</th>
			<th class="style1">No Telephone</th>
		    <th class="style1">State</th>
		</tr>
	</thead>
	<tbody>
	<?php while($row=mysql_fetch_array($rp)) {
	
	$con =connect();
	$qs ="select * from esub where no_lesen_baru = '".$row['lesen']."'";
	$rs = mysql_query($qs,$con);
	$rowrs = mysql_fetch_array($rs);
	 ?>
		<tr valign="top">
			<td><?php echo $list++; ?></td>
			<td><?php echo $rowrs['Nama_Estet'];?></td>
		  <td><?php echo $rowrs['Syarikat_Induk'];?></td>
			<td><?php echo $row['lesen'];?></td>
			<td><?php echo $rowrs['Emel'];?>
		  <div align="center"></div></td>
		  <td><?php echo $rowrs['No_Telepon'];?></td>
		  <td><?php echo $rowrs['Negeri'];?></td>
		</tr>
	<?php } mysql_close($con);?>
	</tbody>
</table>