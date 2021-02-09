<?php
/*include '../class/labour.class.php';
include ('../class/luas.class.php');
$year = date('Y'); */
include('baju_merah.php');
function mesin($tahun, $type){

		$con = connect();
		$query = "select sum(value) as jumlah from estate_jentera where value>0 and  tahun='$tahun' and type='$type' and id_jentera not like '-Choose-'";
		$res = mysqli_query($con, $query);
		$rows = mysqli_fetch_array($res);
		$res_total = mysqli_num_rows($res);

		$querya = "select sum(percent) as peratus,count(percent) as bilangan from estate_jentera where percent>0 and  tahun='$tahun' and type='$type' and id_jentera not like '-Choose-'";
		$resa = mysqli_query($con, $querya);
		$rowsa = mysqli_fetch_array($resa);
	 	$res_totala = mysqli_num_rows($resa);

		$nilai[0]=$res_total;
		$nilai[1]=$rows['jumlah'];
		//$nilai[2]=round($rowsa['peratus']/$rowsa['bilangan']*100,2);

		$queryb = "select id_jentera from estate_jentera where tahun='$tahun' and type='$type' and (percent>0 and value>0 ) and id_jentera not like '-Choose-' group by  id_jentera";
		$resb = mysqli_query($con, $queryb);
		while($rowsb = mysqli_fetch_array($resb)){
		$nil.="<li>".$rowsb['id_jentera']."</li>";
		}

		$nilai[2]=$rowsa['peratus'];
		$nilai[3]=$nil;


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
<br /><div align="center" class="style3">Mechanizations , <?php echo $_COOKIE['tahun_report']-1; ?> in
	    <br />
	    <br />
  <?php if($state==""){?>
    <img name="" src="../images/state/bendera_malaysia.jpg" width="91" height="45" alt="" class="thinborderfloat" />
    <?php } ?>
    <?php
	if($state!=""){
	$con = connect();
	$qstate ="select * from negeri where id like '$state'";
	$rstate = mysqli_query($con, $qstate);
	$rowstate = mysqli_fetch_array($rstate);
	?>

    <img src="../images/<?= $rowstate['negeri_path']; ?>" alt="" name="state" width="91" height="45" class="thinborderfloat" id="state" title="<?= $rowstate['nama'];?>" />
    <?php }?>
    <br />

        <br />
    </div>
<table width="90%" class="baju" align="center" >

  <tr>
    <td height="19" bgcolor="#480000" class="style2"><strong>Work Categories</strong></td>
    <td bgcolor="#480000" style="border-bottom:solid 1px #fff"><div align="center" class="style2"><strong>Percent of field</strong></div></td>
    <td bgcolor="#480000" style="border-bottom:solid 1px #fff"><div align="center" class="style2">
      <div align="center"><strong>Type of Machine</strong></div>
    </div></td>
    <td bgcolor="#480000" style="border-bottom:solid 1px #fff"><div align="center" class="style2"><strong>No of Machine</strong></div></td>
  </tr>

  <?php //$luas = new luas; $total_b = $luas->totalluas(); ?>
  <tr valign="top" class="alt">
    <td height="29"><div align="left">Fertilizer Application
    </div>
      <div align="left"></div></td>
    <td><div align="right"><?php  $a1 = mesin($_COOKIE['tahun_report'],"pembajaan"); echo number_format($a1[2]); ?></div></td>
    <td><div align="center"><?php echo $a1[3];?></div></td>
    <td><div align="right"><?php echo number_format($a1[1]);?></div></td>
  </tr>
  <tr valign="top">
    <td height="29"><div align="left">Weeding

    </div>
    <div align="left"></div></td>
      <td><div align="right"><?php  $b1 = mesin($_COOKIE['tahun_report'],"penyemburan"); echo number_format($b1[2]); ?></div></td>
    <td><div align="center"><?php echo $b1[3];?></div></td>
    <td><div align="right"><?php echo number_format($b1[1]);?></div></td>
  </tr>
   <tr valign="top"  class="alt">
    <td height="29"><div align="left">Pests and diseases control

    </div>
      <div align="left"></div></td>
      <td><div align="right"><?php  $c1 = mesin($_COOKIE['tahun_report'],"peracunan"); echo number_format($c1[2]); ?></div></td>
    <td><div align="center"><?php echo $c1[3];?></div></td>
    <td><div align="right"><?php echo number_format($c1[1]);?></div></td>
  </tr>
  <tr valign="top">
    <td height="29">Cutting of FFB    </td>
       <td><div align="right"><?php  $d1 = mesin($_COOKIE['tahun_report'],"penuaian"); echo number_format($d1[2]); ?></div></td>
    <td><div align="center"><?php echo $d1[3];?></div></td>
    <td><div align="right"><?php echo number_format($d1[1]);?></div></td>
  </tr>
  <tr valign="top"  class="alt">
    <td height="29"> Loose fruit collection    </td>
       <td><div align="right"><?php  $e1 = mesin($_COOKIE['tahun_report'],"pengutipan"); echo number_format($e1[2]); ?></div></td>
    <td><div align="center"><?php echo $e1[3];?></div></td>
    <td><div align="right"><?php echo number_format($e1[1]);?></div></td>
  </tr>
  <tr valign="top">
    <td height="21"><div align="left"> Infield collection of FFBs to platform or collection centre

    </div>
      <div align="left"></div></td>
    <td><div align="right"><?php  $f1 = mesin($_COOKIE['tahun_report'],"pemunggahan"); echo number_format($f1[2]); ?></div></td>
    <td><div align="center"><?php echo $f1[3];?></div></td>
    <td><div align="right"><?php echo number_format($f1[1]);?></div></td>
  </tr>

  <tr valign="top"  class="alt">
    <td height="28"><div align="left">Mainline Transportation of FFBs from platform or collection centres to mill

    </div>
      <div align="left"></div></td>
       <td><div align="right"><?php  $g1 = mesin($_COOKIE['tahun_report'],"pengangkutan"); echo number_format($g1[2]); ?></div></td>
    <td><div align="center"><?php echo $g1[3];?></div></td>
    <td><div align="right"><?php echo number_format($g1[1]);?></div></td>
  </tr>
  <tr bgcolor="#480000" class="style2">
    <td height="28" bgcolor="#480000" style="border-bottom:solid 1px #000"><strong>Total</strong></td>
    <td style="border-bottom:solid 1px #000"><div align="right"><?php echo number_format($a1[2]+$b1[2]+$c1[2]+$d1[2]+$e1[2]+$f1[2]+$g1[2],2);?></div></td>
    <td style="border-bottom:solid 1px #000"><div align="right"></div></td>
    <td style="border-bottom:solid 1px #000"><div align="right"><?php echo number_format($a1[1]+$b1[1]+$c1[1]+$d1[1]+$e1[1]+$f1[1]+$g1[1]);?></div></td>
  </tr>
</table>
<br />
<br />
