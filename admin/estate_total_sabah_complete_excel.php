<?php 
include('../Connections/connection.class.php');
include '../class/admin.estate.class.php';
header("Content-Disposition: attachment; filename=Completed_Response_Survey_in_Sabah.xls");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


<table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="example">
	<thead>
		<tr bgcolor="#8A1602" height="30">
			<th width="4%" filter='false'><span class="style1">No.</span></th>
			<th><span class="style1">Estate Name</span></th>
			<th><span class="style1">License</span></th>
			<th><span class="style1">Company Name</span></th>
			<th><span class="style1">E-mail</span></th>
			<th><span class="style1">Last access</span></th>
		</tr>
	</thead>
	<tbody>
	<?php while($row=mysql_fetch_array($result_sabah_complete)) { ?>
		<tr valign="top">
			<td><?php echo $list++; ?></td>
			<td><?php echo $row['nama'];?></td>
			<td><?php echo $row['lesen'];?></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['email'];?>
		  <div align="center"></div></td>
			<td><?php echo $row['access'];?></td>
		</tr>
	<?php } mysql_close($con);?>
	</tbody>
</table>
