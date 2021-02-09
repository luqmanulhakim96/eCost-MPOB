<?php
//done
session_start();
header("Content-type:application/xml");
extract($_REQUEST);
//$year = $_COOKIE['tahun_report'];
if($year == date('Y')){
	$table = 'esub';
}
else{
	$table="esub_".$year;
}
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
  //$qo ="select lesen from estate_info where syarikat = '".$row['comp_name']."' ";
  $qo = "SELECT info.lesen
			FROM estate_info info
			INNER JOIN $table a on info.lesen = a.No_Lesen_Baru
			LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year'
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year'
			WHERE
			a.No_Lesen_Baru <> ''
			and a.No_Lesen_Baru not like '%123456%'
			and (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)
			and info.syarikat = '".$row['comp_name']."' ";

  $ro=mysqli_query($con, $qo);
  $jumlahro = mysqli_num_rows($ro);
  ?>
  <slice title="<?= $row['comp_name_english'];?>" <?php  if($jumlahro==$rowmax['maksimum']){?>pull_out="true"<?php } ?>><?php echo $jumlahro;?></slice>
 <?php } ?>
</pie>
