<?php
// done
session_start();
header("Content-type:application/xml");
include('../Connections/connection.class.php');
?>
<pie>
  <?php
  $con = connect();
  $q="select * from company";
  $r=mysqli_query($con, $q);

  $qmax ="SELECT max( aa.xx ) as maksimum FROM (SELECT count( * ) AS xx FROM estate_info GROUP BY syarikat)aa";
  $rmax = mysqli_query($con, $qmax);
  $rowmax=mysqli_fetch_array($rmax);

  while($row=mysqli_fetch_array($r)){
  $qo ="SELECT lesen FROM mill_info WHERE syarikat = '".$row['comp_name']."' ";
  $ro=mysqli_query($con, $qo);
  $jumlahro = mysqli_num_rows($ro);
  ?>
  <slice title="<?= $row['comp_name_english'];?>" <?php  if($jumlahro==$rowmax['maksimum']){?>pull_out="true"<?php } ?>><?php echo $jumlahro;?></slice>
 <?php } ?>
</pie>
