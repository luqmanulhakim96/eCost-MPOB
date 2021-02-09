<?php include '../class/admin.estate.class.php';

$con =connect();
$qa ="truncate estate_complete ";
$ra = mysqli_query($con, $qa);

$year = $_COOKIE['tahun_report'];

	$all_complete_survey = "SELECT esub.no_lesen_baru lesen,  esub.nama_estet nama,esub.syarikat_induk syarikat_induk, login_estate.success access, esub.emel email FROM esub";
	$all_complete_survey .= " LEFT JOIN buruh ON esub.no_lesen_baru = buruh.lesen";
	$all_complete_survey .= " LEFT JOIN kos_belum_matang ON esub.no_lesen_baru = kos_belum_matang.lesen";
	$all_complete_survey .= " LEFT JOIN kos_matang_pengangkutan ON esub.no_lesen_baru = kos_matang_pengangkutan.lesen";
	$all_complete_survey .= " LEFT JOIN kos_matang_penjagaan ON esub.no_lesen_baru = kos_matang_penjagaan.lesen";
	$all_complete_survey .= " LEFT JOIN kos_matang_penuaian ON esub.no_lesen_baru = kos_matang_penuaian.lesen";
	$all_complete_survey .= " LEFT JOIN warga_estate ON esub.no_lesen_baru = warga_estate.lesen";
	$all_complete_survey .= " LEFT JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen";
	$all_complete_survey .= " LEFT JOIN estate_info ON esub.no_lesen_baru = estate_info.lesen";
	$all_complete_survey .= " WHERE buruh.tahun = $year";
	$all_complete_survey .= " AND kos_belum_matang.pb_thisyear = $year";
	$all_complete_survey .= " AND kos_matang_pengangkutan.pb_thisyear = $year";
	$all_complete_survey .= " AND kos_matang_penjagaan.pb_thisyear = $year";
	$all_complete_survey .= " AND kos_matang_penuaian.pb_thisyear = $year";
	$all_complete_survey .= " AND warga_estate.tahun = $year";
	$all_complete_survey .= " AND buruh.tahun = $year";
	$all_complete_survey .= " AND kos_belum_matang.status = 1";
	$all_complete_survey .= " AND kos_matang_pengangkutan.status = 1";
	$all_complete_survey .= " AND kos_matang_penjagaan.status = 1";
	$all_complete_survey .= " AND kos_matang_penuaian.status = 1 ";
	$all_complete_survey .= " GROUP BY esub.no_lesen_baru";
	$all_complete_survey .= " ORDER BY login_estate.success DESC";

	//echo $all_complete_survey;
	$racs = mysqli_query($con, $all_complete_survey);
	while($rowracs = mysqli_fetch_array($racs)){
		$qadd="insert into estate_complete (lesen,tahun) values ('".$rowracs['lesen']."','".$year."')";
		$radd = mysqli_query($con, $qadd);
	}

include("baju.php");
include("pages.php");
?>





<style>
.filtering { background-color:light-gray}
#jqtf_filters {
	list-style:none;
	}
#jqtf_filters li {
	display:inline-block;
	position:relative;
	float:left;
	margin-bottom:20px
}
.style1 {color: #FFFFFF}
</style>
<div align="center">
  <h2>List of Incompleted Response Survey in Peninsular Malaysia</h2>
</div>
<table width="100%"  border="0" align="left" cellpadding="4" cellspacing="0" class="baju" id="example2">
<thead>
		<tr  height="30" >
			<th width="4%" filter='false'>No.</th>
		  <th>Estate Name</th>
		  <th>Company Name</th>
		  <th>New License No.</th>
		  <th>E-mail</th>
		  <th>Last access</th>
	      <th>Action</th>
    </tr>
	</thead>
	<tbody>
	<?php
	$con = connect();
	$qr = "SELECT count(le.lesen) as kira,es.no_lesen_baru, es.nama_estet , le.success , es.negeri, es.syarikat_induk, es.emel FROM login_estate le, esub  es WHERE
le.lesen = es.no_lesen_baru  ";
	if($year=="2010"){
		$qr .= " and le.success != '0000-00-00 00:00:00'";
	}
	if($year!="2010"){
		$qr .= " and le.success like '%$year%'";
	}
	if($negeri==''){
	$qr.=" AND es.negeri NOT LIKE '%SARAWAK%' AND es.negeri NOT LIKE '%SABAH%' group by le.lesen";
	}

	if($negeri!=''){
	$qr.=" AND es.negeri LIKE '%$negeri%' group by le.lesen";
	}


	//echo $qr;
	$rr = mysqli_query($con, $qr);
	while($rowrr=mysqli_fetch_array($rr)) {

			  $con =connect();
		 	  $qt="select lesen,tahun from estate_complete where lesen = '".$rowrr['lesen']."'";
			  $rt=mysqli_query($con, $qt);
			  $totalrt = mysqli_num_rows($rt);
			  $rowrt = mysqli_fetch_array($rt);

			  $q="select * from esub where no_lesen_baru ='".$rowrr['lesen']."' ";
			  $r=mysqli_query($con, $q);
			  $row= mysqli_fetch_array($r);

	if($totalrt==0){
	?>
		<tr valign="top" <?php if($list%2==0){?>class="alt"<?php } ?>>
			<td><?php echo $list++; ?>            </td>
			<td><a href="estate_details.php?id=<?php echo $rowrr['lesen'];?>&year=<?php echo $_COOKIE['tahun_report'];?>" class="boxcolor"><?php echo $row['Nama_Estet'];?>
            <?php echo $total_racs;
			//echo $all_complete_survey;
			?>
            </a></td>
			<td><?php echo $row['Syarikat_Induk'];?></td>
			<td><?php echo $rowrr['lesen'];?></td>
			<td><a href="emailnonresponde.php?emel=<?php echo $row['email'];?>&lesen=<?php echo $rowrr['lesen'];?>"  class="boxcolor"><?php echo $row['Emel'];?></a><div align="center"></div></td>
			<td><?php echo $rowrr['success'];?></td>
		    <td><div align="center">
            <?php
             $qa ="select success,password,lesen from login_estate where lesen ='".$row['lesen']."'";
	$ra = mysqli_query($con, $qa);
	$rowa = mysqli_fetch_array($ra);
			?>

          <a href="auto_login.php?username=<?php echo $rowrr['lesen'];?>&amp;password=<?php echo $rowrr['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a>

        <a href="auto_login.php?username=<?php echo $rowrr['lesen'];?>&amp;password=<?php echo $rowrr['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&view=true" target="_blank" > <img src="../images/001_36.png" width="20" height="20" border="0" title="View Only" /></a></div></td>
		</tr>
	<?php
		}
	} mysqli_close($con);?>
	</tbody>
</table>


<br />


&nbsp;&nbsp;&nbsp;
<a href="estate_total_complete_excel.php" target="_blank"><img src="../images/Excel-icon.png" width="48" height="48" border="0" title="Pindah ke Excel" /></a><br/>
<br />
<br />
