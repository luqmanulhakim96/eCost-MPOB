<?php //include('../Connections/connection.class.php');
include('baju.php');
include('pages.php');
$con = connect();
if(date('Y') == $_COOKIE['tahun_report']){
	$table = "esub";
}else{
	$table = "esub_".$_COOKIE['tahun_report'];
}

//$q="select No_Lesen_Baru, Nama_Estet, sum(Keluasan_Yang_Dituai) as luas from $table group by esub.No_Lesen";
$q = "SELECT b.No_Lesen_Baru, b.Nama_Estet, SUM(b.Keluasan_Yang_Dituai) as luas FROM login_estate a
				 INNER JOIN $table b
				 ON a.lesen=b.No_Lesen_Baru
				 WHERE b.No_Lesen_Baru NOT LIKE '%123456%'
				 GROUP BY b.No_Lesen_Baru";
$r = mysqli_query($con, $q);

?>

<h2>Data FFB Production from e-Sub</h2>
<table width="100%" class="baju" id="example2" align="left">
  <thead>
  <tr>
    <th><strong>No.</strong></th>
    <th><strong>No Lesen</strong></th>
    <th><strong>Nama Estet</strong></th>
    <th><strong>Keluasan Yang Dituai</strong></th>
    <th>Jumlah Pengeluaran</th>
    <th><strong>Purata Hasil Buah</strong></th>
  </tr>
  </thead>

  <tbody>
  <?php
  $i=0;
  $con = connect();
   while($row= mysqli_fetch_array($r)){?>
  <tr <?php if($i%2==0){?>class="alt"<?php } ?>>
    <td><?php echo ++$i; ?></td>
    <td><?php echo $row['No_Lesen_Baru'];?></td>
    <td><?php echo $row['Nama_Estet'];?></td>
    <td><div align="right"><?php echo $row['luas'];?></div></td>
    <td><div align="right">
   <?php
   if(date('Y') == $_COOKIE['tahun_report']){
		$tableffb = "fbb_production";
		$nl = $row['No_Lesen_Baru'];
	}else{
		$tableffb = "fbb_production".$_COOKIE['tahun_report'];
		if($_COOKIE['tahun_report'] >= 2012){
			$nl = $row['No_Lesen_Baru'];
		}else{
			$nl = substr($row['No_Lesen_Baru'], 0, -1);
		}
	}
   //
		$qf="select * from $tableffb where lesen like '$nl'";
		$rf=mysqli_query($con, $qf);
		$rowf = mysqli_fetch_array($rf);
   		echo number_format($rowf['jumlah_pengeluaran'],2);
   ?>
    </div></td>
    <td><div align="right"><?php echo number_format($rowf['purata_hasil_buah'], 4);?></div></td>
  </tr>
  <?php } ?>
  </tbody>
</table>
<p></p><p></p><p></p>
