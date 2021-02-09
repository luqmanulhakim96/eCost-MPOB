<?php
include('../Connections/connection.class.php');
include '../class/admin.estate.class.php';
header("Content-Disposition: attachment; filename=Completed_Response_Survey_in_Malaysia.xls");

 ?>
<table width="90%" border="0" align="center" cellpadding="4" cellspacing="0" id="example" class="display">
	<thead>
		<tr bgcolor="#8A1602" height="30">
			<th width="4%" filter='false'><span class="style1">No.</span></th>
		  <th><span class="style1">Estate Name</span></th>
		  <th class="style1">Company Name</th>
		  <th><span class="style1">New License No.</span></th>
		  <th><span class="style1">E-mail</span></th>
		  <th><span class="style1">Last access</span></th>
	  </tr>
	</thead>
	<tbody>
	<?php while($row=mysqli_fetch_array($result_complete)) { ?>
		<tr valign="top">
			<td><?php echo $list++; ?></td>
			<td><a href="estate_details.php?id=<?php echo $row['lesen'];?>" class="boxcolor"><?php echo $row['nama'];?></a></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['lesen'];?></td>
			<td><a href="emailnonresponde.php?bil=<?php echo $row['id'];?>"  class="boxcolor"><?php echo $row['email'];?></a><div align="center"></div></td>
			<td><?php echo $row['access'];?></td>
		</tr>
	<?php } mysqli_close($con);?>
	</tbody>
</table>
