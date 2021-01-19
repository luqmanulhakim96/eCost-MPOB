<?php
include ('../Connections/connection.class.php');
extract($_REQUEST);
	$con 	= connect();
	$all_complete = "SELECT esub.no_lesen_baru lesen, esub.nama_estet nama, esub.alamat1 alamat1, esub.alamat2 alamat2, esub.negeri negeri, esub.no_telepon notel, esub.no_fax nofax, esub.emel email FROM esub, login_estate";
	$all_complete .= " where esub.no_lesen_baru = login_estate.lesen";
	$all_complete .= " AND esub.no_lesen_baru = '$id' LIMIT 1";
	
	//echo $all_complete; 
	$r		= mysql_query($all_complete,$con);
	$row	= mysql_fetch_assoc($r);
?><style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
<h1>Estate Details</h1>
<hr>
<table>
	<tr height="20">
		<td width="30%">Estate Name</td>
		<td width="1%">:</td>
		<td width="69%"><?php echo $row['nama']; ?></td>
	</tr>
	<tr height="20">
		<td>License No.</td>
		<td>:</td>
		<td><?php echo $row['lesen']; ?></td>
	</tr>
	<tr height="20">
		<td>Mailing Address</td>
		<td>:</td>
		<td><?php echo $row['alamat1']; ?> <?php echo $row['alamat2']; ?></td>
	</tr>
	<tr height="20">
		<td>State</td>
		<td>:</td>
		<td><?php echo $row['negeri']; ?></td>
	</tr>
	<tr height="20">
		<td>Contact No.</td>
		<td>:</td>
		<td><?php echo $row['notel']; ?></td>
	</tr>
	<tr height="20">
		<td>Fax No.</td>
		<td>:</strong></td>
		<td><?php echo $row['nofax']; ?></td>
	</tr>
	<tr height="20">
		<td>Email</td>
		<td>:</td>
		<td><?php echo $row['email']; ?></td>
	</tr>
</table>
<?php mysql_close($con);?>