<p><em>** this section only used to compare cost of Production in 2008 before using e-Cost</em></p>
<p>

<link href="../css/buttongrey.css" rel="stylesheet" type="text/css" />
<div class="buttonwrapper">
  <table width="100%" cellpadding="8">
    <tr>
      <td><div class="buttonwrapper"><table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td width="14%"><a class="ovalbutton" href="home.php?id=config&amp;sub=variable"><span> Immature Cost   </span></a></td>
    <td width="9%"><a class="ovalbutton" href="home.php?id=config&amp;sub=variable"><span>Second Year</span></a></td>
    <td width="77%"><a class="ovalbutton" href="home.php?id=config&amp;sub=variable"><span>Third Year</span></a></td>
  </tr>
</table>

</div></td>
    </tr>
  </table>
</div>

  <?php include('baju_merah.php');
$con=connect();




function median($numbers=array())
{
	if (!is_array($numbers))
		$numbers = func_get_args();

	rsort($numbers);
	$mid = (count($numbers) / 2);
	return ($mid % 2 != 0) ? $numbers{$mid-1} : (($numbers{$mid-1}) + $numbers{$mid}) / 2;
}

function pertama($tahun, $nama, $status,$negeri,$daerah, $type){
$con=connect();
		$sql = "SELECT * FROM graf_kbm where sessionid='$nama' and tahun ='$tahun' and status='$status' and pb_type = '$type'";
		if($negeri!="" & $negeri!="pm")
		{
			$sql.=" and negeri = '$negeri'";
		}
		if($negeri!="" && $daerah!="")
		{
			$sql.=" and daerah = '$daerah'";
		}
		if($negeri=="pm")
		{
			$sql.=" and (negeri not like 'SARAWAK' and negeri not like 'SABAH')";
		}

		//echo $sql."<br>";
		$sql_result = mysqli_query($con, $sql);
		$i=0;
				while ($row = mysqli_fetch_array($sql_result))
				{
				$test_data[] = $row["y"];
				$i = $i + 1;
				}

		$qavg = "SELECT AVG(y) as purata FROM graf_kbm where sessionid='$nama' and tahun ='$tahun' and status='$status' and pb_type='$type'";
		if($negeri!="" & $negeri!="pm")
		{
			$qavg.=" and negeri = '$negeri'";
		}
		if($negeri!="" && $daerah!="")
		{
			$qavg.=" and daerah = '$daerah'";
		}
		if($negeri=="pm")
		{
			$qavg.=" and (negeri not like 'SARAWAK' and negeri not like 'SABAH')";
		}


		$ravg = mysqli_query($con, $qavg);
		$rrow = mysqli_fetch_array($ravg);


			$var[0] = median($test_data);
			$var[1] = $rrow['purata'];
				return $var;

		}
?>
</p>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-weight: bold; }
-->
</style>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>



<script type="text/javascript">
			$(document).ready(function(){
				$(".cop").colorbox({width:"60%", height:"80%", iframe:true});
			});
		</script>
<table width="85%" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><!--<div align="right"><a href="#"><img src="../images/Print.png" width="24" height="24" border="0" title="Print this page" /></a></div>--></td>
  </tr>
  <tr>
    <td width="10%">Select Year :</td>
    <td width="45%"><form name="form" id="form">
      <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
        <option value="home.php?id=estate&amp;sub=new_replanting&amp;year=1&state=<?php echo $state; ?>" <?php if($year=='1'){?>selected="selected" <?php } ?>>Year 1</option>
        <option value="home.php?id=estate&amp;sub=new_replanting&amp;year=2&state=<?php echo $state; ?>" <?php if($year=='2'){?>selected="selected" <?php } ?>>Year 2</option>
        <option value="home.php?id=estate&amp;sub=new_replanting&amp;year=3&state=<?php echo $state; ?>" <?php if($year=='3'){?>selected="selected" <?php } ?>>Year 3</option>
        </select>
    </form>
	</td>
    <td width="45%">
    <?php if($state=="" || $state=="pm"){?>
    <img name="" src="../images/state/bendera_malaysia.jpg" width="91" height="45" alt="" class="thinborderfloat" />
    <?php } ?>
	<?php
	if($state!=""){

	$qstate ="select * from negeri where id like '$state'";
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

    </td>
  </tr>
  <tr>
    <td colspan="3" valign="top">&nbsp;</td>
  </tr>
</table>

<table width="85%" align="center" class="baju">
<tr>
<td colspan="3"><strong>Cost in the First Year of Oil Palm New Replanting (RM per hectare)</strong></td>
</tr>
<tr >
    <th width="34%" rowspan="2"><span class="style5">Cost Items</span></th>
    <th colspan="2" ><div align="center" class="style5">
      <div align="center">2008</div>
    </div></th>
  </tr>

  <tr bgcolor="#8A1602">
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Median</span></div></td>
  </tr>


  <?php
  $satu = $_COOKIE['tahun_report']-0;
  $dua = $_COOKIE['tahun_report']-1;


  ?>
  <tr class="alt">
    <td colspan="3"><strong>Non-Recurrent Costs</strong></td>
  </tr>

  <?php
  $qs="select * from q_kbm";
  if($year=="" || $year=='1'){
  $qs.=" where tahun ='0'";
  }
  $rs = mysqli_query($con, $qs);

  $jl=0;
  $js=0;
  $ms=0;

   while($rows=mysqli_fetch_array($rs)){
  ?>

  <tr <?php if(++$gg%2==0){?>class="alt"<?php } ?>>
    <td><a href="add_cop.php?name=<?php echo $rows['name'];?>" class="cop"><?php echo $rows['name'];?></a></td>

    <td><div align="right"><?php $a= pertama ($satu,  $rows['name'], '0',$state, $district, "Penanaman Semula"); echo number_format($a[1],2); $js = $js+$a[1]; ?></div></td>
    <td><div align="right"><?php echo number_format($a[0],2); $ms = $ms+$a[0]; ?></div></td>
  </tr>
<?php } ?>
  <tr bgcolor="#FF9966">
    <td><strong>Total</strong></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($js,2);?></div></td>
    <td bgcolor="#FF9966"><div align="right"><?php echo number_format($ms,2);?></div></td>
  </tr>
</table>
<br />
<br />
<br />
