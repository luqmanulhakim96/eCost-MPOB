<?php 
include('../Connections/connection.class.php');
include '../class/test.class.php';
header("Content-Disposition: attachment; filename=List_of_Completed_Response_Survey_in_Sabah.xls");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="example">
	<thead>
	
	  <tr bgcolor="#8A1602" height="30">
		  <th width="5%" class="style1 style1">No.</th>
			<th width="26%" class="style1">Mill Name</th>
			<th width="18%" class="style1">Company Name</th>
			<th width="11%" class="style1">License No.</th>
			<th width="12%" class="style1">E-mail</th>
			<th width="28%" class="style1">Last access</th>
	  </tr>
	</thead>
	<tbody>
	<?php while($row = mysql_fetch_array($result_sabah_complete)) { ?>
		<tr valign="top">
			<td><?php echo $list++; ?></td>
			<td><?php echo $row['nama'];?></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['lesen'];?></td>
			<td><?php echo $row['email'];?>
		  <div align="center"></div></td>
			<td><?php echo $row['access'];?></td>
		</tr>
	<?php } mysql_close($con);?>
	</tbody>
</table>
