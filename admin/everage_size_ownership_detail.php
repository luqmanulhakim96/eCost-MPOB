<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<?php include ('paging.php');
include ('baju_merah.php'); ?>

<div align="center"><strong>Search Result in
	<?php if ($sub == 'view_estate')
{ ?>Estate<?php } ?>
	<?php if ($sub == 'view_mill')
{ ?>Mill<?php } ?>

</strong></div>


<table width="100%" class="baju" id="example" align="left">
<thead>
  <tr bgcolor="#8A1602">
    <th width="2%" class="style1">No.</th>
    <th width="34%" height="33" class="style1">Estate Name </th>
    <th width="34%" class="style1"><div align="right">Size of Estate</div></th>
    <th width="14%" bgcolor="#8A1602" class="style1">Company Name</th>
    <th width="10%" class="style1"> License No.</th>
    <th width="13%" class="style1">Email</th>
    <th width="13%" class="style1">District</th>
    <th width="13%" class="style1">State</th>
    <th width="13%" class="style1">Phone No.</th>
    <th width="10%" class="style1">Last Access</th>
    <th width="17%" class="style1">Action</th>
  </tr>
 </thead>
  <tbody>
  <?php $con = connect();
   $q_lesen = "select lesen, lanar as size from estate_info where syarikat = '$comp_name'";
	$r_lesen = mysqli_query($q_lesen);
	while ($row_lesen = mysqli_fetch_array($r_lesen)){


$nlb = $row_lesen['lesen'];
$q = "select * from esub  where No_Lesen_Baru = '$nlb'";
$q .= "group by No_Lesen_Baru";
$r = mysqli_query($con, $q);
$j = 0;

$row = mysqli_fetch_array($r); ?>
  <tr valign="top">
    <td><?php echo ++$j; ?></td>
    <td>
	<?php if ($sub == 'view_estate')
{ ?><a href="home.php?id=estate&sub=profile_estate&bil=<?= $row['Bil']; ?>&lesen=<?= $row['No_Lesen_Baru']; ?>"><?= $row['Nama_Estet']; ?></a><?php } ?>


    <?php if ($sub == 'size_estate_detail')
{ ?><a href="home.php?id=estate&sub=profile_estate&bil=<?= $row['Bil']; ?>&lesen=<?= $row['No_Lesen_Baru']; ?>"><?= $row['Nama_Estet']; ?></a><?php } ?>

	<?php if ($sub == 'view_mill')
{ ?><a href="home.php?id=estate&sub=profile_mill&bil=<?= $row['Bil']; ?>&lesen=<?= $row['No_Lesen_Baru']; ?>"><?= $row['Nama_Estet']; ?></a><?php } ?>	</td>
    <td><div align="right"><?php echo number_format($row_lesen['size'],2);?></div></td>
    <td><?= $row['Syarikat_Induk']; ?></td>
    <td><div align="center">
      <?= $row['No_Lesen_Baru']; ?>
    </div></td>
    <td>&nbsp;</td>
    <td><?= $row['Daerah_Premis']; ?></td>
    <td><?= $row['Negeri_Premis']; ?></td>
    <td><?= $row['No_Telepon']; ?></td>
    <td><?php $qm = "select * from login_estate where lesen ='" . $row['No_Lesen_Baru'] .
  "'";
$rm = mysqli_query($con, $qm);
$rowm = mysqli_fetch_array($rm);

$rc = explode(" ", $rowm['success']);
echo $rc[0]; ?></td>
    <td><div align="center"><a href="auto_login.php?username=<?php echo $row['No_Lesen_Baru']; ?>&password=<?php echo
$rowm['password']; ?>&tahun=<?php echo
$_COOKIE['tahun_report']; ?>" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a></div></td>
  </tr>
  <?php }
 ?>
  </tbody>
</table>
