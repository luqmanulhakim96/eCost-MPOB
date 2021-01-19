<?php
include ('../Connections/connection.class.php');
extract($_REQUEST);
	$con 	= connect();
	$all_complete = "SELECT esub.no_lesen_baru lesen, esub.nama_estet nama, esub.alamat1 alamat1, esub.alamat2 alamat2, esub.negeri negeri, esub.no_telepon notel, esub.no_fax nofax, esub.emel email, kos_belum_matang.status status1, kos_matang_pengangkutan.status status2, kos_matang_penjagaan.status status3,  kos_matang_penuaian.status status4 FROM esub";
	$all_complete .= " JOIN estate_info ON esub.no_lesen_baru = estate_info.lesen";
	$all_complete .= " JOIN buruh ON esub.no_lesen_baru = buruh.lesen";
	$all_complete .= " JOIN kos_belum_matang ON esub.no_lesen_baru = kos_belum_matang.lesen";
	$all_complete .= " JOIN kos_matang_pengangkutan ON esub.no_lesen_baru = kos_matang_pengangkutan.lesen";
	$all_complete .= " JOIN kos_matang_penjagaan ON esub.no_lesen_baru = kos_matang_penjagaan.lesen";
	$all_complete .= " JOIN kos_matang_penuaian ON esub.no_lesen_baru = kos_matang_penuaian.lesen";
	$all_complete .= " JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen";
	$all_complete .= " WHERE buruh.tahun = '$year'";
	$all_complete .= " AND kos_belum_matang.pb_thisyear = '$year'";
	$all_complete .= " AND kos_matang_pengangkutan.pb_thisyear = '$year'";
	$all_complete .= " AND kos_matang_penjagaan.pb_thisyear = '$year'";
	$all_complete .= " AND kos_matang_penuaian.pb_thisyear = '$year'";
	$all_complete .= " AND kos_belum_matang.status = 1";
	$all_complete .= " AND kos_matang_pengangkutan.status = 1";
	$all_complete .= " AND kos_matang_penjagaan.status = 1";
	$all_complete .= " AND kos_matang_penuaian.status = 1";
	$all_complete .= " AND esub.no_lesen_baru = '$id' LIMIT 1";
	
//	echo $all_complete; 
	
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
<h2>Submission Details</h2>
<hr>
<table>
	<tr>
		<td width="30%">Immature Cost</td>
		<td width="1%">:</td>
		<td width="69%"><?php if ($row['status1'] == 0 || $row['status1'] == 2) { echo "<img src='images/no.png' />"; } else { echo "<img src='images/yes.png' />"; } ?></td>
	</tr>
	<tr>
		<td>Mature Cost: UPKEEP</td>
		<td>:</td>
		<td><?php if ($row['status2'] == 0 || $row['status2'] == 2) { echo "<img src='images/no.png' />"; } else { echo "<img src='images/yes.png' />"; } ?></td>
	</tr>
	<tr>
		<td>Mature Cost: HARVESTING</td>
		<td>:</td>
		<td><?php if ($row['status3'] == 0 || $row['status3'] == 2) { echo "<img src='images/no.png' />"; } else { echo "<img src='images/yes.png' />"; } ?></td>
	</tr>
	<tr>
		<td>Mature Cost: TRANSPORTATION</td>
		<td>:</td>
		<td><?php if ($row['status4'] == 0 || $row['status4'] == 2) { echo "<img src='images/no.png' />"; } else { echo "<img src='images/yes.png' />"; } ?></td>
	</tr>
</table>
<?php mysql_close($con);?>
