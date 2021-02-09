<?php
include('../Connections/connection.class.php');
include '../class/test.class.php';
header("Content-Disposition: attachment; filename=List_of_Mill_Completed_Response_Survey_in_Sarawak.xls");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="example">
	<thead>
		<tr bgcolor="#8A1602" height="30">
			<th width="4%" class="style1 style1">No.</th>
			<th class="style1">Mill Name</th>
			<th class="style1">Company Name</th>
			<th class="style1">License No.</th>
			<th class="style1">E-mail</th>
			<th class="style1">Last access</th>
	  </tr>
	</thead>
	<tbody>
	<?php while($row = mysqli_fetch_array($result_sarawak_complete)) { ?>
		<tr valign="top">
			<td><?php echo $list++; ?></td>
			<td><?php echo $row['nama'];?></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['lesen'];?></td>
			<td><?php echo $row['email'];?>
		    <div align="center"></div></td>
			<td><?php echo $row['access'];?></td>
		</tr>
	<?php } mysqli_close($con);?>
	</tbody>
</table>
