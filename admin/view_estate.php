<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<?php include('paging.php');
include('baju_merah.php');
?>

<div align="center"><strong>Search Result in 
	<?php if ($sub=='view_estate') { ?>Estate<?php } ?> 
	<?php if($sub=='view_mill'){?>Mill<?php } ?>
	
</strong></div>
     
     <?php
  $con = connect();
  $year = $_COOKIE['tahun_report'];
  
  if($year == date('Y')){
	  $table = "esub";
  }
  else{
	  $table = "esub_".$year;
  }
  
  $q ="select * from $table  where ";
  $q.="Nama_Estet like '%$search%' ";
  $q.="or No_Lesen like '%$search%'";
   $q.="or No_Lesen_Baru like '%$search%'";

	  $q.="group by No_Lesen_Baru";
	  
  
  
 // echo $q; 
  $r = mysql_query($q,$con);
  $j =0; 
	 
	 ?>

<table width="100%" class="baju" id="example" align="left">
<thead>
  <tr bgcolor="#8A1602">
    <th width="2%" class="style1">No.</th>
    <th width="34%" height="33" class="style1">Estate Name </th>
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
  <?php 
  while($row=mysql_fetch_array($r)){
  ?>
  <tr valign="top">
    <td><?php echo ++$j; ?></td>
    <td>
	<?php if ($sub=='view_estate') { ?><a href="home.php?id=estate&sub=profile_estate&bil=<?= $row['Bil'];?>&lesen=<?= $row['No_Lesen_Baru'];?>"><?= $row['Nama_Estet'];?></a><?php } ?>
	<?php if ($sub=='view_mill') { ?><a href="home.php?id=estate&sub=profile_mill&bil=<?= $row['Bil'];?>&lesen=<?= $row['No_Lesen_Baru'];?>"><?= $row['Nama_Estet'];?></a><?php } ?>	</td>
    <td><?= $row['Syarikat_Induk'];?></td>
    <td><div align="center">
      <?= $row['No_Lesen_Baru'];?>
    </div></td>
    <td>&nbsp;</td>
    <td><?= $row['Daerah_Premis'];?></td>
    <td><?= $row['Negeri_Premis'];?></td>
    <td><?= $row['No_Telepon'];?></td>
    <td><?php
	$qm ="select * from login_estate where lesen ='".$row['No_Lesen_Baru']."'";
	$rm = mysql_query($qm,$con);
	$rowm = mysql_fetch_array($rm);
	
	$rc = explode(" ",$rowm['success']);
	echo $rc[0]; 
	 ?></td>
    <td><div align="center"><a href="auto_login.php?username=<?php echo $row['No_Lesen_Baru'];?>&password=<?php echo $rowm['password'];?>&tahun=<?php echo $_COOKIE['tahun_report'];?>" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a></div></td>
  </tr>
  <?php } mysql_close($con);?>
  </tbody>
</table>
