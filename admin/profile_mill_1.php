<?php include ('../Connections/connection.class.php');
	// done 12/10/2010 by apad
	$id = $_GET['lesen'];
	$con = connect();
	$q ="SELECT * FROM alamat_ekilang LEFT JOIN mill_info ON alamat_ekilang.lesen = mill_info.lesen WHERE alamat_ekilang.lesen = $id";
	$r = mysql_query($q,$con);
	$row=mysql_fetch_array($r);
	//print_r($row);
?>
<link rel="stylesheet" type="text/css" href="../text_style.css" />
<strong>MILL PROFILE</strong><br>
<br>
<table width="82%" border="0" align="center" cellpadding="1" cellspacing="1" id="box-table-a">
	<tr>
		<td height="27" colspan="4"><h2><strong>General Information</strong></h2></td>
	</tr>
	<tr>
		<td width="28%"><strong>Mill / Factory Name</strong></td>
		<td width="2%"><strong>:</strong></td>
		<td width="70%" colspan="2"><?php echo $row['nama']; ?></td>
	</tr>
	<tr>
		<td><strong>License No (New)</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['lesen']; ?></td>
	</tr>
	<tr>
		<td height="31" colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td height="31" colspan="4"><h2><strong>Contact Address</strong></h2></td>
	</tr>
	<tr>
		<td><strong>Mailing Address</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['alamatsurat1']; ?></td>
	</tr>
	<tr>
		<td><strong>Postcode</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['alamatsurat2']; ?></td>
	</tr>
	<tr>
		<td><strong>State</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['alamatsurat3']; ?></td>
	</tr>
	<tr>
		<td><strong>Telephone No</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['notel']; ?></td>
	</tr>
	<tr>
		<td><strong>Fax No</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['nofax']; ?></td>
	</tr>
	<tr>
		<td><strong>Email</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['email']; ?></td>
	</tr>
	<tr>
		<td><strong>Manager</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['pegawai']; ?></td>
	</tr>
	<tr valign="top">
		<td><strong>Headquarters</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['syarikatinduk']; ?></td>
	</tr>
	<tr>
		<td><strong>Premist District</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['daerahpremis']; ?></td>
	</tr>
	<tr>
		<td><strong>Premist State</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['negeripremis']; ?></td>
	</tr>
	<tr>
		<td><strong>Mill Capacity</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['kapasiti']; ?> Tonne FFB Per Hour</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td><strong>Company Type</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['syarikat']; ?></td>
	</tr>
	<tr>
		<td><strong>Sterilization Technology</strong><br /></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['teknologi']; ?></td>
	</tr>
	<tr>
		<td><strong>Integration with Estate</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php if($row['integrasi']=='Y') { echo "YA"; } else { echo "TIDAK"; } ?></td>
	</tr>
	<tr>
		<td><strong>Years of Mill Starts Operate</strong></td>
		<td><strong>:</strong></td>
		<td colspan="2"><?php echo $row['tahun_operasi']; ?> (<?php $ts = date('Y'); $to = $ts-$row['tahun_operasi']; echo $to; ?> Tahun)</td>
	</tr>
</table>
