<?php
include('../Connections/connection.class.php');
include '../class/test.class.php';
header("Content-Disposition: attachment; filename=All_Mill_Response_Survey.xls");
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
		  <th width="23%" class="style1">Mill Name</th>
		  <th width="13%" class="style1">Company Name</th>
		  <th width="19%" class="style1">New License No.</th>
		  <th width="16%" class="style1">E-mail</th>
		  <th width="25%" class="style1">Last access</th>
	  </tr>
	</thead>
	<tbody>
	<?php while($row=mysqli_fetch_array($result_complete)) { ?>
		<tr valign="top">
			<td><?php echo $list++; ?></td>
			<td><a href="details.php?id=<?php echo $row['lesen'];?>" class="boxcolor"><?php echo $row['nama'];?></a></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['lesen'];?></td>
			<td><a href="emailnonresponde.php?bil=<?php echo $row['id'];?>" class="boxcolor"><?php echo $row['email'];?></a><div align="center"></div></td>
			<td><?php echo $row['access'];?></td>
		</tr>
	<?php } mysqli_close($con);?>
	</tbody>
</table>
