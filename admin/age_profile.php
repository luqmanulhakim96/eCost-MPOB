<?php include('pages.php');
include('baju2.php');


  $con=connect();
  $qb="truncate age_profile_analysis";
  $rb=mysqli_query($con, $qb);

  $con=connect();


  $tahunsemasa = $_COOKIE['tahun_report'];
   $ts = ($tahunsemasa[2].$tahunsemasa[3])-1;
  if(strlen($ts)==1){ $pertama ="0".$ts;}else{$pertama=$ts;}
   $ts1= $ts-1;
  if(strlen($ts1)==1){ $kedua ="0".$ts1;}else{$kedua=$ts1;}
  $ts2= $ts-2;
  if(strlen($ts2)==1){ $ketiga ="0".$ts2;}else{$ketiga=$ts2;}

  if($state=="" and $district==""){
  $qs="select No_Lesen_Baru, Negeri_Premis, Daerah_Premis from esub ";
  }

  if($state!="" and $district==""){
  $qs="select No_Lesen_Baru, Negeri_Premis, Daerah_Premis from esub where negeri_premis = '$state' ";
  }
  if($state!="" and $district!=""){
  $qs="select No_Lesen_Baru, Negeri_Premis, Daerah_Premis from esub where negeri_premis = '$state' and daerah_premis = '$district' ";
  }
  $rs=mysqli_query($con, $qs);

 // echo $qs;
  while($rows=mysqli_fetch_array($rs)){
  		 $qa ="INSERT INTO age_profile_analysis
    SELECT *
    FROM age_profile where age_profile.lesen = '".$rows['No_Lesen_Baru']."'";
		$ra = mysqli_query($con, $qa);

  tambahan($pertama,$rows['No_Lesen_Baru']);

  tambahan($kedua,$rows['No_Lesen_Baru']);

  tambahan($ketiga,$rows['No_Lesen_Baru']);

  }

  function tambahan ($year_semasa, $lesen){
  		$con=connect();
		$qs="select sum(tanaman_semula) as jumlah from tanam_semula$year_semasa where lesen = '$lesen'";
		$rs=mysqli_query($con, $qs);
		$rows=mysqli_fetch_array($rs);

		$qt ="select sum(tanaman_tukar) as jumlah from tanam_tukar$year_semasa where lesen = '$lesen'";
		$rt=mysqli_query($con, $qt);
		$rowt=mysqli_fetch_array($rt);

		$qb ="select sum(tanaman_baru) as jumlah from tanam_baru$year_semasa where lesen = '$lesen'";
		$rb=mysqli_query($con, $qb);
		$rowb=mysqli_fetch_array($rb);

		$jj = $rows['jumlah']+$rowt['jumlah']+$rowb['jumlah'];
		$ys = 2000+$year_semasa;
		$ss = $_COOKIE['tahun_report']-$ys;

		$qa ="INSERT INTO age_profile_analysis (lesen ,umur_pokok ,tahun_tanam ,keluasan)VALUES ('$lesen', '$ss','$ys','$jj') ";
		$ra = mysqli_query($con, $qa);

	}



  	 $qd ="delete from age_profile_analysis where keluasan =0 or lesen ='' ";
		$rd= mysqli_query($con, $qd);



?>

<style type="text/css">
.popupHide{ /CSS for enlarged image/

opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: -308px;
	top: 375px;
	width: 297px;
}

.popupShow{
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 600px;
	top: 181px;
	width: 256px;
}
.style1 {
	font-size: 11px;
	font-style: italic;
}
.style6 {
	font-size: 14px;
	font-weight: bold;
}
</style>
<link rel="stylesheet" href="../js/colorbox/colorbox.css" type="text/css" />
<script type="text/javascript" src="../js/colorbox/colorbox/jquery.colorbox.js"></script>

<script type="text/javascript">
			$(document).ready(function(){
								$(".boxcolor").colorbox({width:"40%", height:"100%"});

			});
		</script>



<span class="style6"> <br />&nbsp;&nbsp;
Age Profile<br />
<br />
</span>
<div align="center"><img src="images/peta.png" width="648" height="288" border="0" usemap="#Map" />

<map name="Map" id="Map">
  <area shape="poly" coords="159,197,171,212" href="#" />
<area shape="poly" coords="161,196,183,211,203,216,210,208,221,233,229,249,233,263,225,266,209,266,203,271,193,263,172,248,156,234,153,221,158,204" href="negeri.php?id=JOHOR" class="boxcolor"  />


<area shape="poly" coords="132,220,143,215,153,219,153,232" href="negeri.php?id=MELAKA" class="boxcolor"/>

<area shape="poly" coords="117,208,123,193,128,184,158,197,152,218,129,217" href="negeri.php?id=NEGERI SEMBILAN" class="boxcolor"/>

<area shape="poly" coords="80,152,98,162,115,160,127,185,114,206,107,203" href="negeri.php?id=SELANGOR" class="boxcolor" />

<area shape="poly" coords="60,94,72,93,80,75,88,62,113,59,114,81,101,117,105,144,111,159,79,151,71,152" href="negeri.php?id=PERAK"  class="boxcolor">

<area shape="poly" coords="101,119,162,116,177,144,196,154,202,211,162,196,128,179,112,158" href="negeri.php?id=PAHANG"  class="boxcolor"/>

<area shape="poly" coords="118,61,140,43,152,63,155,112,105,117" href="negeri.php?id=KELANTAN" class="boxcolor"/>

<area shape="poly" coords="154,60,196,107,194,151,175,139,158,110" href="negeri.php?id=TERENGGANU" class="boxcolor" />

<area shape="poly" coords="46,77,59,76,61,92,51,92" href="negeri.php?id=PULAU PINANG" class="boxcolor" />

<area shape="poly" coords="46,21,56,25,47,38,49,39,45,37" href="negeri.php?id=PERLIS" class="boxcolor" />

<area shape="poly" coords="52,39,59,29,91,45,84,67,72,88,67,93,59,76" href="negeri.php?id=KEDAH" class="boxcolor"  />

<area shape="poly" coords="480,122,479,100,527,48,549,48,617,107,606,119,590,145,532,152,493,153" href="negeri.php?id=SABAH" class="boxcolor" />

<area shape="poly" coords="476,122,377,187,266,233,307,274,394,250,430,257,459,228,477,190,492,164" href="negeri.php?id=SARAWAK" class="boxcolor"/>
</map>


<br />
<span class="style1">Click on State To View Data </span>
</div>

<?php //if ($state!=NULL){?>
<table width="100%">
  <tr>
    <td><div align="center"><h2><u><strong>    <?php if($state=="" || $state=="pm"){?>
    <img name="" src="../images/state/bendera_malaysia.jpg" width="91" height="45" alt="" class="thinborderfloat" />
    <?php } ?>
	<?php
	if($state!=""){

	$qstate ="select * from negeri where nama like '$state'";
	$rstate = mysqli_query($con, $qstate);
	$rowstate = mysqli_fetch_array($rstate);
	$totalstate = mysqli_num_rows($rstate);
	if($state=="pm"){$state="pm";}
	else{$state = $rowstate['nama'];
	}
	?>
	<?php if($totalstate>0){?>
	<img src="../images/<?= $rowstate['negeri_path']; ?>" alt="" name="state" width="91" height="45" class="thinborderfloat" id="state" title="<?= $rowstate['nama'];?>" />
	<?php }}?>
    </strong></u></h2></div></td>
  </tr>
</table>


<table width="40%" align="center" class="baju2">
  <tr>
    <th width="10%">Year</th>
    <th width="44%">Year of Planted Age</th>
    <th width="36%"> 	Area (Hectares) </th>
    <th width="10%">Total Estate</th>
  </tr>

  <?php
  function age_profile($tn){
	  $con=connect();
	  $q="select sum(keluasan) as keluasan from age_profile_analysis where tahun_tanam = '$tn' and lesen not like '123456%' ";
	  $r=mysqli_query($con, $q);
	  $row=mysqli_fetch_array($r);
	  //$total = mysql_num_rows($r);

	  $q="select * from age_profile_analysis where tahun_tanam = '$tn' and lesen not like '123456%' ";
	  $r=mysqli_query($con, $q);
	  $total = mysqli_num_rows($r);

	  $variable[0] = $total;
	  $variable[1] = $row['keluasan'];

	  return $variable;
  }

  //echo $_COOKIE['tahun_report'];
  $jumlah_semua =0;
  $tamat= $_COOKIE['tahun_report']-44;
  for($i=($_COOKIE['tahun_report']-1); $i>=$tamat; $i=$i-1){
  	$tahun_tanam = $_COOKIE['tahun_report']-$i;
  	$tanam = age_profile($i);

  	if($tanam[1]>0){
  ?>
  <tr <?php if($i%2==0){?>class="alt"<?php } ?>>
    <td><div align="center"><?php echo $i; ?></div></td>
    <td><div align="center">
      <?php  echo $tahun_tanam; ?>
    </div></td>
    <td><div align="right"><?php echo number_format($tanam[1],2);?></div></td>
    <td><div align="right"><?php echo number_format($tanam[0],0);?></div></td>
  </tr>

  <?php
  		$jumlah_semua = $jumlah_semua+$tanam[1];
  		$jumlah_semua_estate += $tanam[0];
  	}
  } ?>

  <tr>
    <td colspan="2"><div align="right"><strong>Total Area Plant (in hectare)</strong></div></td>
    <td><div align="right"><b><?php echo number_format($jumlah_semua,2);?></b></div></td>
    <td><div align="right"><b><?php echo number_format($jumlah_semua_estate,0);?></b></div></td>
  </tr>
</table>




<p align="center"><a href="age_profile_excel.php?type=excel" target="_blank"><img src="../images/Office-excel-xls-icon.png" width="50" height="50" border="0" title="Convert to Excel" /></a><a href="age_profile_excel.php?type=print" target="_blank"><img src="../images/Printer-icon.png" width="50" height="50" border="0" title="View to print" /></a></p>
<p><br />


  <br />

  <?php //} ?>

  <?php
$con = connect();
$qnegeri ="select * from negeri order by id";
$rnegeri = mysqli_query($con, $qnegeri);
while($rownegeri=mysqli_fetch_array($rnegeri)){
?>
    <span id="<?= $rownegeri['id']; ?>" >      </span></p>
<span >
<table width="100%">
  <tr>
    <td><div>
      <div align="center">
	  <?php $daerahnegeri = new daerah('daerah',$rownegeri['id']);
	  for($j=0; $j<$daerahnegeri->total; $j++){?>
  <a href="home.php?id=estate&sub=age_profile&amp;state=<?= $rownegeri['id'];?>&amp;district=<?= $daerahnegeri->daerah[$j]; ?>"><?= $daerahnegeri->daerah[$j];?></a> &bull;
  	  <?php } ?>

	  <a href="home.php?id=estate&sub=age_profile&amp;state=<?= $rownegeri['id'];?>&amp;district=All">All</a></div>
    </div></td>
  </tr>
</table>
</span>
<?php }?>
