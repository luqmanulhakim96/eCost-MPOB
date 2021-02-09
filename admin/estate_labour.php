<?php
include('baju_merah.php');
function pekerjaladang ($tahun, $medan, $flag, $negeri){

		$field = $medan."_".$flag;
		$con = connect();
		//echo $negeri;

		$query = "select sum(b.$field) as jumlah from buruh b, esub es where b.tahun = '$tahun'
		and b.lesen=es.No_Lesen_Baru ";
		if($negeri!="" & $negeri!="pm")
		{
			$query.=" and es.Negeri = '$negeri'";
		}
		if($negeri!="" && $daerah!="")
		{
			$query.=" and daerah = '$daerah'";
		}
		if($negeri=="pm")
		{
			$query.=" and (es.Negeri not like 'SARAWAK' and es.Negeri not like 'SABAH')";
		}
		//echo $query;
		$res = mysqli_query($con, $query);
		$rows = mysqli_fetch_array($res);
		$res_total = mysqli_num_rows($res);

		$nilai[0]=$rows['jumlah'];
		return $nilai;
}

?>
<style type="text/css">
<!--
.style2 {color: #FFFFFF; font-weight: bold; }
.style3 {
	font-size: 14px;
	color: #000000;
	font-weight: bold;
}
-->
</style>
<br /><div align="center" class="style3">Estate Labour Situation, <?php echo $_COOKIE['tahun_report']-1; ?> in
	    <br />
	    <br />
  <?php if($state=="" || $state=="pm"){?>
    <img name="" src="../images/state/bendera_malaysia.jpg" width="91" height="45" alt="" class="thinborderfloat" />
    <?php } ?>
	<?php
	if($state!=""){

	$qstate ="select * from negeri where id like '$state'";
	$rstate = mysqli_query($con, $qstate);
	$rowstate = mysqli_fetch_array($rstate);
	$totalstate = mysqli_num_rows($rstate);
	if($state=="pm"){$negeri="pm";}
	else{$negeri = $rowstate['nama'];
	}
	?>
	<?php if($totalstate>0){?>
	<img src="../images/<?= $rowstate['negeri_path']; ?>" alt="" name="state" width="91" height="45" class="thinborderfloat" id="state" title="<?= $rowstate['nama'];?>" />
	<?php }}?>

    <br />

        <br />
    </div>
<table width="90%" class="baju" align="center" >

  <tr>
    <td height="19" colspan="2" bgcolor="#480000">&nbsp;</td>
    <td colspan="3" bgcolor="#480000" style="border-bottom:solid 1px #fff"><div align="center"></div></td>
    <td colspan="2" bgcolor="#480000" style="border-bottom:solid 1px #fff"><div align="center" class="style2">Percent</div></td>
    <td bgcolor="#480000" style="border-bottom:solid 1px #fff"><div align="center" class="style2">Land Labour  Ratio </div></td>
  </tr>
  <tr>
    <td height="18" colspan="2" bgcolor="#480000" class="style2">&nbsp;Category</td>
    <td width="11%" bgcolor="#480000" class="style2"><div align="right">Local</div></td>
    <td width="9%" bgcolor="#480000" class="style2"><div align="right">Foreign</div></td>
    <td width="10%" bgcolor="#480000" class="style2"><div align="right">Total</div></td>
    <td width="8%" bgcolor="#480000" class="style2"><div align="right">Local</div></td>
    <td width="10%" bgcolor="#480000" class="style2"><div align="right">Foreign</div></td>
    <td width="20%" bgcolor="#480000" class="style2"><div align="center">Hectare : Worker</div></td>
  </tr>
  <?php

  		$con = connect();
		$query = "select * from q_buruh";
		$res = mysqli_query($con, $query);
		$res_total = mysqli_num_rows($res);

		$query_esub = "select sum(Jumlah) as jumlah_luas from esub";
		$res_esub = mysqli_query($con, $query_esub);
		$rowluas = mysqli_fetch_array($res_esub);


		$totala = 0;
		$totalb = 0;
		$totalc = 0;
		$totald = 0;
		$totale = 0;
		$totalf = 0;

		while($rows = mysqli_fetch_array($res)){
		 ?>
  <tr <?php if(++$cl%2!=0){?>class="alt"<?php } ?>>
    <td height="29" colspan="2"><div align="left"><?php echo $rows['name'];?></div>
    <div align="left"></div></td>
    <td><div align="right"><?php $a = pekerjaladang($_COOKIE['tahun_report'],$rows['type'], 'tempatan',$negeri ); echo number_format($a[0]); $totala = $totala + $a[0]; ?></div></td>
    <td><div align="right"><?php $b = pekerjaladang($_COOKIE['tahun_report'],$rows['type'], 'asing',$negeri ); echo number_format($b[0]); $totalb = $totalb + $b[0]; ?></div></td>
    <td><div align="right"><?php $jumlahp = $a[0]+$b[0]; echo number_format($jumlahp); $totalc = $totalc + $jumlahp; ?></div></td>
    <td><div align="right"><?php $percent_local = round($a[0]/$jumlahp*100,2); echo number_format($percent_local,2); //$totald = $totald + $percent_local;?></div></td>
    <td><div align="right"><?php $percent_foreign = round($b[0]/$jumlahp*100,2); echo number_format($percent_foreign,2); //$totale = $totale + $percent_foreign;?></div></td>
    <td><div align="center"><strong>1 :
      <?php $e=$jumlahp/$rowluas['jumlah_luas'];echo round($e,4);$totalf=$totalf+$e; ?>
    </strong> </div></td>
  </tr>
  <?php } ?>

  <tr bgcolor="#480000" class="style2">
    <td height="28" colspan="2" bgcolor="#480000" style="border-bottom:solid 1px #000"><strong>Total</strong></td>
    <td bgcolor="#480000" style="border-bottom:solid 1px #000"><div align="right"><?php echo number_format($totala);?></div></td>
    <td bgcolor="#480000" style="border-bottom:solid 1px #000"><div align="right"><?php echo number_format($totalb);?></div></td>
    <td bgcolor="#480000" style="border-bottom:solid 1px #000"><div align="right"><?php echo number_format($totalc);?></div></td>
    <td bgcolor="#480000" style="border-bottom:solid 1px #000"><div align="right"><?php echo number_format($totala/$totalc*100,2);?></div></td>
    <td bgcolor="#480000" style="border-bottom:solid 1px #000"><div align="right"><?php echo number_format($totalb/$totalc*100,2);?></div></td>
    <td bgcolor="#480000" style="border-bottom:solid 1px #000"><div align="center">1 : <?php echo round($totalf,4);?></div></td>
  </tr>
</table>
<br />
<br />
