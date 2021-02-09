<?php

session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");

extract($_REQUEST);
include('../Connections/connection.class.php');

	if($type=='delete'){
	$con=connect();
			$qall="delete from ekilang where no_lesen ='$no_lesen' and tahun='$tahun' and bulan ='$bulan' ";
			$rall=mysqli_query($con, $qall);
			$tahun=$tahun+1;
			echo "<script>location.href='data_login_mill_edit.php?no_lesen=$no_lesen&tahun=$tahun';</script>";
	}

$tahun = $tahun-1;
include('baju.php');


		$con=connect();
		$qall="select * from ekilang where no_lesen ='$no_lesen' and tahun='$tahun' ";
		$rall=mysqli_query($con, $qall);
		$totalall = mysqli_num_rows($rall);
		$rowall=mysqli_fetch_array($rall);

		if($totalall==0){
				$qa="select * from ekilang where no_lesen ='$no_lesen' ";
				$ra=mysqli_query($con, $qa);
				$rowa=mysqli_fetch_array($ra);

				$qadd="insert into ekilang (no_lesen, nama_kilang, negeri, syarikat_induk, bulan, tahun, ffb_proses, estet_sendiri, lain, pengeluaran_cpo, pengeluaran_pk) values ('".$rowa['NO_LESEN']."', '".$rowa['NAMA_KILANG']."', '".$rowa['NEGERI']."', '".$rowa['SYARIKAT_INDUK']."', '1', '$tahun', '0', '0', '0', '0', '0')";
				$radd=mysqli_query($con, $qadd);
				$rc = mysqli_affected_rows();
				if($rc>0){
				$tahun=$tahun+1;
				echo "<script>location.href='data_login_mill_edit.php?no_lesen=$no_lesen&tahun=$tahun';</script>";
				}
		}



?><style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<title>Edit Maklumat Kilang</title><form id="form1" name="form1" method="post" action="">
  <h2>Edit Maklumat Kilang  </h2>
  <table width="60%" border="1" align="center" cellpadding="2" cellspacing="2" class="baju" style="border-collapse:collapse">
    <tr>
      <th width="21%"><div align="left">Nama Kilang</div></th>
      <td width="2%">:</td>
      <td width="77%"><?php echo $rowall['NAMA_KILANG'];?></td>
    </tr>
    <tr class="alt">
      <th><div align="left">No Lesen</div></th>
      <td>:</td>
      <td><?php echo $rowall['NO_LESEN'];?>
      <input type="hidden" name="no_lesen" id="no_lesen" value="<?php echo $rowall['NO_LESEN'];?>" /></td>
    </tr>
    <tr>
      <th><div align="left">Tahun</div></th>
      <td>:</td>
      <td><?php echo $rowall['TAHUN'];?>
      <input type="hidden" name="tahun" id="tahun" value="<?php echo $tahun+1;?>" /></td>
    </tr>

  </table>

 <h2>Maklumat pada tahun <?php echo $tahun; ?></h2>
  <table width="60%" border="0" align="center" class="baju">

    <tr>
      <th>Tahun</th>
      <th>Bulan</th>
      <th><div align="right">Jumlah</div></th>
      <th><div align="center">Tindakan</div></th>
    </tr>

    <?php
    $qa="select * from ekilang where no_lesen ='$no_lesen' and tahun='$tahun' order by cast(bulan as signed) ";
		$ra=mysqli_query($con, $qa);
		$totala = mysqli_num_rows($ra);
		$all = 0;
		while($row=mysqli_fetch_array($ra)){
	?>
    <tr>
      <td><?php echo $row['TAHUN'];?></td>
      <td>
      <input name="bulan[<?php echo $row['NO_LESEN'];?>:<?php echo $row['TAHUN'];?>:<?php echo $row['BULAN'];?>]" type="text" id="bulan[<?php echo $row['NO_LESEN'];?>:<?php echo $row['TAHUN'];?>:<?php echo $row['BULAN'];?>]" size="3" maxlength="2" value="<?php echo $row['BULAN'];?>" /></td>



      <td><div align="right"><?php $all = $all + $row['FFB_PROSES']; ?>
        <input type="text" name="jumlah[<?php echo $row['NO_LESEN'];?>:<?php echo $row['TAHUN'];?>:<?php echo $row['BULAN'];?>]" id="jumlah[<?php echo $row['NO_LESEN'];?>:<?php echo $row['TAHUN'];?>:<?php echo $row['BULAN'];?>]" value="<?php echo number_format($row['FFB_PROSES'],2);?>" />
      </div></td>
      <td><div align="center">[<a href="data_login_mill_edit.php?no_lesen=<?php echo $row['NO_LESEN'];?>&amp;tahun=<?php echo $row['TAHUN'];?>&amp;bulan=<?php echo $row['BULAN'];?>&amp;type=delete" onclick="return alert('Buang data ini?');">Buang</a>]</div></td>
    </tr>
    <?php } ?>
    <tr>
      <th colspan="2">Total</th>
      <th><div align="right" id="total_all"><?php echo number_format($all,2);?></div></th>
      <th>&nbsp;</th>
    </tr>
  </table>
  <br />
  <input type="submit" name="kemaskini" id="kemaskini" value="Kemaskini" />
  <label>
  <input type="button" name="button" id="button" value="Tutup" onclick="window.close();top.opener.window.location.reload();" />
  </label>
  <input type="submit" name="ffb" id="ffb" value="Tambah FFB" />
</form>

<?php
if(isset($kemaskini)){
	$con =connect();

	foreach($jumlah as $id=>$value){
		$var = explode(":",$id);
		$value = str_replace(",","",$value);
		$q="update ekilang set ffb_proses='$value' where tahun = '$var[1]' and bulan ='$var[2]' and no_lesen='$var[0]'";
		$a=mysqli_query($con, $q);
	}

	foreach($bulan as $id=>$value){
		$var = explode(":",$id);
		$value = str_replace(",","",$value);
		$q="update ekilang set bulan='$value' where tahun = '$var[1]' and bulan ='$var[2]' and no_lesen='$var[0]'";
		$a=mysqli_query($con, $q);
	}

	$tahun = $tahun+1;
	echo "<script>alert('Kemaskini berjaya dilakukan');</script>";
	echo "<script>location.href='data_login_mill_edit.php?no_lesen=$no_lesen&tahun=$tahun';</script>";
}

if(isset($ffb)){
	$con =connect();
		$qall="select * from ekilang where no_lesen ='$no_lesen' and tahun='$tahun' ";
		$rall=mysqli_query($con, $qall);
		$rowall=mysqli_fetch_array($rall);


		$q="INSERT INTO `ekilang` (`NO_LESEN`, `NAMA_KILANG`, `NEGERI`, `SYARIKAT_INDUK`, `BULAN`, `TAHUN`, `FFB_PROSES`, `ESTET_SENDIRI`, `LAIN`, `PENGELUARAN_CPO`, `PENGELUARAN_PK`) VALUES ('".$rowall['NO_LESEN']."', '".$rowall['NAMA_KILANG']."', '".$rowall['NEGERI']."', '".$rowall['SYARIKAT_INDUK']."', '', '$tahun', '0', '0', '0', '0', '0');";
		$a=mysqli_query($con, $q);
		$tahun = $tahun+1;
/*		echo "<script>location.href='data_login_mill_edit.php?no_lesen=$no_lesen&tahun=$tahun';</script>";
*/
}

?>
