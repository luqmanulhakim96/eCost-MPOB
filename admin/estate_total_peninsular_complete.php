<?php
if($negeri==''){
include '../class/admin.estate.class.php';
}
include('baju.php');
include('pages.php'); ?>

<link rel="stylesheet" href="../js/colorbox/colorbox.css" type="text/css" />
<script type="text/javascript" src="../js/colorbox/colorbox/jquery.colorbox.js"></script>

<script type="text/javascript">
			$(document).ready(function(){
				$(".boxcolor").colorbox({width:"60%", height:"100%", iframe:true});
			});
		</script>


      <style>

      .style1 {color: #FFFFFF}
      </style>
<div align="center"><h2>List of Completed Response Survey in Peninsular</h2></div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="baju" align="left" id="example2">
	<thead>
		<tr bgcolor="#8A1602" height="30">
			<th width="4%" ><span class="style1">No.</span></th>
		  <th><span class="style1">Estate Name</span></th>
		  <th><span class="style1">Company Name</span></th>
		  <th><span class="style1">License</span></th>
		  <th><span class="style1">E-mail</span></th>
		  <th><span class="style1">Last access</span></th>
	      <th class="style1">Action</th>
	  </tr>
	</thead>
	<tbody>
	<?php

	if($negeri!=''){
	$year = $_COOKIE['tahun_report'];
	$all_peninsular = "SELECT esub.no_lesen_baru lesen, esub.nama_estet nama, login_estate.success access,esub.syarikat_induk syarikat_induk, esub.emel email FROM esub";
	$all_peninsular .= " LEFT JOIN buruh ON esub.no_lesen_baru = buruh.lesen";
	$all_peninsular .= " LEFT JOIN kos_belum_matang ON esub.no_lesen_baru = kos_belum_matang.lesen";
	$all_peninsular .= " LEFT JOIN kos_matang_pengangkutan ON esub.no_lesen_baru = kos_matang_pengangkutan.lesen";
	$all_peninsular .= " LEFT JOIN kos_matang_penjagaan ON esub.no_lesen_baru = kos_matang_penjagaan.lesen";
	$all_peninsular .= " LEFT JOIN kos_matang_penuaian ON esub.no_lesen_baru = kos_matang_penuaian.lesen";
	$all_peninsular .= " LEFT JOIN warga_estate ON esub.no_lesen_baru = warga_estate.lesen";
	$all_peninsular .= " LEFT JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen";
	$all_peninsular .= " LEFT JOIN estate_info ON esub.no_lesen_baru = estate_info.lesen";
	$all_peninsular .= " WHERE buruh.tahun = $year";
	$all_peninsular .= " AND kos_belum_matang.pb_thisyear = $year";
	$all_peninsular .= " AND kos_matang_pengangkutan.pb_thisyear = $year";
	$all_peninsular .= " AND kos_matang_penjagaan.pb_thisyear = $year";
	$all_peninsular .= " AND kos_matang_penuaian.pb_thisyear = $year";
	$all_peninsular .= " AND warga_estate.tahun = $year";
	$all_peninsular .= " AND buruh.tahun = $year";
	$all_peninsular .= " AND kos_belum_matang.status = 1";
	$all_peninsular .= " AND kos_matang_pengangkutan.status = 1";
	$all_peninsular .= " AND kos_matang_penjagaan.status = 1";
	$all_peninsular .= " AND kos_matang_penuaian.status = 1";
	$all_peninsular .= " AND esub.negeri LIKE '%$negeri%'";
	$all_peninsular .= " GROUP BY esub.no_lesen_baru";
	$all_peninsular .= " ORDER BY login_estate.success DESC";

	//echo $all_peninsular;

	$result_peninsular_complete = mysqli_query($con, $all_peninsular);
	$total_peninsular_complete 	= mysqli_num_rows($result_peninsular_complete);

	}


	while($row=mysqli_fetch_array($result_peninsular_complete)) { ?>
		<tr valign="top" <?php if(++$list%2==0){?>class="alt"<?php } ?>>
			<td><?php echo $list++; ?></td>
			<td><a href="estate_details.php?id=<?php echo $row['lesen'];?>&year=<?php echo $_COOKIE['tahun_report'];?>" class="boxcolor"><?php echo $row['nama'];?></a></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['lesen'];?></td>
			<td><a href="emailnonresponde.php?lesen=<?php echo $row['lesen'];?>" class="boxcolor"><?php echo $row['email'];?></a><div align="center"></div></td>
			<td><?php echo $row['access'];?></td>
		    <td><div align="center">
              <?php  $qa ="select success,password,lesen from login_estate where lesen ='".$row['lesen']."'";
	$ra = mysqli_query($con, $qa);
	$rowa = mysqli_fetch_array($ra);?>
            <a href="auto_login.php?username=<?php echo $rowa['lesen'];?>&amp;password=<?php echo $rowa['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a>


               <a href="auto_login.php?username=<?php echo $rowa['lesen'];?>&amp;password=<?php echo $rowa['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&view=true" target="_blank" > <img src="../images/001_36.png" width="20" height="20" border="0" title="View Only" /></a>


            </div></td>
		</tr>
	<?php } mysqli_close($con);?>
	</tbody>
</table>
<br />
&nbsp;&nbsp;&nbsp;
<a href="estate_total_peninsular_complete_excel.php" target="_blank"><img src="../images/Excel-icon.png" width="48" height="48" border="0" title="Pindah ke Excel" /></a><br/>
<br />
<br />
