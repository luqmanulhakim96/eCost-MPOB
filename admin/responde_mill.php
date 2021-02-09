<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="facebox/facebox.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
})
</script>
<?php include('paging.php');
include('baju_merah.php');
?><div align="center"><strong>List of Response Survey in <?php echo $region; ?></strong></div>
<table width="100%" class="baju" id="example" align="left">
<thead>

  <tr bgcolor="#8A1602">
    <th width="4%" class="style1">No.</th>
    <th width="37%" height="33" class="style1">Mill Name</th>
    <th width="28%" class="style1">E-mail</th>
	<th class="style1">No.Telefon</th>
  </tr>
</thead>
<tbody>
<?php
//echo $negeri;
	$con = connect();
	$year = $_COOKIE['tahun_report'];
	$peninsular = "SELECT ekilang.no_lesen lesen, ekilang.nama_kilang nama, ekilang.syarikat_induk syarikat_induk,login_mill.success access, alamat_ekilang.email email FROM ekilang";
	$peninsular .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
	$peninsular .= " LEFT JOIN mill_buruh ON ekilang.no_lesen = mill_buruh.lesen";
	$peninsular .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen";
	$peninsular .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen";
	$peninsular .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
	$peninsular .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$peninsular .= " WHERE mill_buruh.tahun = $year";
	$peninsular .= " AND mill_kos_lain.tahun = $year";
	$peninsular .= " AND mill_pemprosesan.tahun = $year";
	if($region=='pm'){
		if($negeri==''){
		$peninsular .= " AND ekilang.negeri NOT LIKE '%SABAH%' AND ekilang.negeri NOT LIKE '%SARAWAK%' ";
		}
		else {
		$peninsular .= " AND ekilang.negeri LIKE '%$negeri%' ";
		}

	}
	$peninsular .= " GROUP BY ekilang.no_lesen";
	$peninsular .= " ORDER BY login_mill.success DESC";


		//echo $peninsular;
		$r=mysqli_query($con, $peninsular);
		$j =0;
		//	echo $q;
	while($row=mysqli_fetch_array($r)){
?>
  <tr valign="top">
    <td><?php echo ++$j; ?></td>
    <td><a href="profile_mill.php?lesen=<?php echo $row['lesen'];?>" rel="facebox"><?php echo $row['nama'];?></a></td>
    <td><?php echo $row['email'];?></td>
	<td><?php echo $row['notel'];?></td>
  </tr>
  <?php } mysqli_close($con);?>
</tbody>
</table>
<br />
