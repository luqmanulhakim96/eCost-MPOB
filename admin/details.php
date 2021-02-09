<?php
include ('../Connections/connection.class.php');
$year = $_COOKIE['tahun_report'];
	$id 	= $_GET['id'];
	$con 	= connect();
	$q1	= "SELECT ekilang.no_lesen lesen, ekilang.nama_kilang nama, ekilang.negeri negeri, alamat_ekilang.alamatsurat1 alamat1,  alamat_ekilang.alamatsurat2 alamat2, alamat_ekilang.alamatsurat3 alamat3, alamat_ekilang.notel notel, alamat_ekilang.nofax nofax, alamat_ekilang.email email FROM ekilang";
	$q1 .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$q1 .= " WHERE ekilang.no_lesen = '$id'";
	$q1 .= " LIMIT 1";
	$r1		= mysqli_query($con, $q1);
	$row	= mysqli_fetch_assoc($r1);

	$q2	= "SELECT mill_buruh.status status3, mill_pemprosesan.status status1, mill_kos_lain.status status2 FROM ekilang";
	$q2 .= " LEFT JOIN mill_buruh ON ekilang.no_lesen = mill_buruh.lesen";
	$q2 .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen";
	$q2 .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen";
	$q2 .= " WHERE ekilang.no_lesen = '$id'";
	$q2 .= " AND mill_kos_lain.tahun = $year";
	$q2 .= " AND mill_pemprosesan.tahun = $year LIMIT 1";
	$r2		= mysqli_query($con, $q2);
	$row2	= mysqli_fetch_assoc($r2);
	//print_r($row);
?><style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
<h1>Mill Details</h1>
<table>
	<tr>
		<td width="30%">Mill Name</td>
		<td width="1%">:</td>
		<td width="69%"><?php echo $row['nama']; ?></td>
	</tr>
	<tr>
		<td>License No.</td>
		<td>:</td>
		<td><?php echo $row['lesen']; ?></td>
	</tr>
	<tr>
		<td>Mailing Address</td>
		<td>:</td>
		<td><?php echo $row['alamat1']; ?> <?php echo $row['alamat2']; ?> <?php echo $row['alamat3']; ?></td>
	</tr>
	<tr>
		<td>State</td>
		<td>:</td>
		<td><?php echo $row['negeri']; ?></td>
	</tr>
	<tr>
		<td>Contact No.</td>
		<td>:</td>
		<td><?php echo $row['notel']; ?></td>
	</tr>
	<tr>
		<td>Fax No.</td>
		<td>:</strong></td>
		<td><?php echo $row['nofax']; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $row['email']; ?></td>
	</tr>
</table>
<h2>Submission Details</h2>
<table>
	<tr>
		<td width="30%">Processing Cost</td>
		<td width="1%">:</td>
		<td width="69%"><?php if ($row2['status1'] == 0) { echo "Incomplete"; } else { echo "Complete"; } ?></td>
	</tr>
	<tr>
		<td>Other Cost</td>
		<td>:</td>
		<td><?php if ($row2['status2'] == 0) { echo "Incomplete"; } else { echo "Complete"; } ?></td>
	</tr>
	<tr>
		<td>Labour</td>
		<td>:</td>
		<td><?php if ($row2['status3'] == 0) { echo "Incomplete"; } else { echo "Complete"; } ?></td>
	</tr>
</table>
<?php mysqli_close($con);?>
