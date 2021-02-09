<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<?php include('paging.php');?>

<div align="center"><strong>Search Result in
	<?php if($sub=='view_mill'){?>Mill<?php } ?>

</strong></div>

     <?php
  $con = connect();
  $q ="select * from ekilang  where ";
  $q.="Nama_Kilang like '%$search%' ";
  $q.="or No_Lesen like '%$search%'";
   $q.="or Syarikat_Induk like '%$search%'";

	  $q.="group by No_Lesen";



 //echo $q;
  $r = mysqli_query($con, $q);
  $j =0;

	 ?>

<table width="100%" class="display" id="example">
<thead>
  <tr bgcolor="#8A1602">
    <th width="4%" class="style1">No.</th>
    <th width="37%" height="33" class="style1">Mill  Name </th>
    <th width="31%" bgcolor="#8A1602" class="style1">Company Name</th>
    <th width="28%" class="style1">New License No.</th>
    <th width="28%" class="style1">Email</th>
    <th width="28%" class="style1">Last Access</th>
    <th width="28%" class="style1">Action</th>
  </tr>
 </thead>
  <tbody>
  <?php
  while($row=mysqli_fetch_array($r)){
  ?>
  <tr valign="top">
    <td><?php echo ++$j; ?></td>
    <td>
	<a href="home.php?id=labour&sub=profile_mill&bil=<?= $row['Bil'];?>&lesen=<?= $row['NO_LESEN'];?>"><?= $row['NAMA_KILANG'];?></a>	</td>
    <td><?= $row['SYARIKAT_INDUK'];?></td>
    <td><?= $row['NO_LESEN'];?>
    <div align="center"></div></td>
    <td><?= $row['NO_LESEN'];?></td>
    <td><?php
	$qm ="select * from login_mill where lesen ='".$row['NO_LESEN']."'";
	$rm = mysqli_query($con, $qm);
	$rowm = mysqli_fetch_array($rm);

	echo $rowm['success'];
	 ?></td>
    <td><div align="center"><a href="auto_login_mill.php?username=<?php echo $row['NO_LESEN'];?>&password=<?php echo $rowm['password'];?>&tahun=<?php echo $_COOKIE['tahun_report'];?>" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a></div></td>
  </tr>
  <?php } mysqli_close($con);?>
  </tbody>
</table>
