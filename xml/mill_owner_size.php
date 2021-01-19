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
  $r=mysql_query($q,$con);
  
  $qmax ="SELECT max( aa.xx ) as maksimum FROM (SELECT count( * ) AS xx FROM estate_info GROUP BY syarikat)aa";
  $rmax = mysql_query($qmax,$con);
  $rowmax=mysql_fetch_array($rmax);
 
  while($row=mysql_fetch_array($r)){
  $qo ="SELECT lesen FROM mill_info WHERE syarikat = '".$row['comp_name']."' ";
  $ro=mysql_query($qo,$con);
  $jumlahro = mysql_num_rows($ro);
  ?>
  <slice title="<?= $row['comp_name_english'];?>" <?php  if($jumlahro==$rowmax['maksimum']){?>pull_out="true"<?php } ?>><?php echo $jumlahro;?></slice>
 <?php } ?>
</pie>
