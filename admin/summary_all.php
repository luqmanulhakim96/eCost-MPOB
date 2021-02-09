<?php include('baju_merah.php');?>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<div>
  <div align="center"><strong style="font-size:16px"><br />
    Inter-Year FFB and CPO Cost of Production </strong><br />
    <br />
  </div>
</div>

<script>
function tutup (x){
	if($("."+x).css('display') == 'none')
		$("."+x).show();
	else
		$("."+x).hide();

}
</script>
<?php
function ffb_average($location, $tahun)
	{
	$table = 'fbb_production'.$tahun;
		if($location == 'malaysia')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM $table";
		}
		else if($location=='peninsular')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM $table WHERE $table.negeri NOT LIKE '%SABAH%' AND $table.negeri NOT LIKE '%SARAWAK%'";
		}
		else if($location=='sabah')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM $table WHERE $table.negeri LIKE '%SABAH%'";
		}
		else if($location=='sarawak')
		{
			$query ="SELECT AVG(purata_hasil_buah) as purata FROM $table WHERE $table.negeri LIKE '%SARAWAK%'";
		}

		$result = mysqli_query($query) or die(mysqli_error());
		$row 	= mysqli_fetch_array($result);
		$total = mysqli_num_rows($result);
		$var[0] = round($row['purata'],2);
		return $var;
	}


//-----------------------------------------------------------------------------
function summary($table ,$tahun, $negeri ){
	$con=connect();
	 $q="select AVG(y) as nilai from $table where
	tahun= '$tahun' and status='0'
	";
	if($negeri=='peninsular'){
	$q.="and (negeri not like 'SABAH' and negeri not like 'SARAWAK')";
	}

	if($negeri=='sabah'){
	$q.="and negeri like 'SABAH' ";
	}

	if($negeri=='sarawak'){
	$q.="and negeri like 'SARAWAK' ";
	}

	//echo $q;
	$r=mysqli_query($con, $q);
	$row= mysqli_fetch_array($r);

	$variable[0] = $row['nilai'];


	return $variable;

}//-------------------------------------------------
function oer($tahun , $negeri ){
	$con=connect();
	 $q="select sum(ffb_proses) as ffb, sum(pengeluaran_cpo) as cpo from ekilang where
	tahun= '$tahun'
	";
	if($negeri=='peninsular'){
	$q.="and (negeri not like 'SABAH' and negeri not like 'SARAWAK')";
	}

	if($negeri=='sabah'){
	$q.="and negeri like 'SABAH' ";
	}

	if($negeri=='sarawak'){
	$q.="and negeri like 'SARAWAK' ";
	}

	//echo $q;
	$r=mysqli_query($con, $q);
	$row= mysqli_fetch_array($r);

	$variable[0] = $row['cpo']/$row['ffb']*100;


	return $variable;

}

//-----------------------------------------------------------------------------
function summary_mill($table ,$tahun, $negeri, $oil ){
	$con=connect();
	 $q="select AVG(y) as nilai from $table where
	tahun= '$tahun' and status='0'
	";
	if($negeri=='peninsular'){
	$q.="and (negeri not like 'SABAH' and negeri not like 'SARAWAK')";
	}

	if($negeri=='sabah'){
	$q.="and negeri like 'SABAH' ";
	}

	if($negeri=='sarawak'){
	$q.="and negeri like 'SARAWAK' ";
	}

	//echo $q;
	$r=mysqli_query($con, $q);
	$row= mysqli_fetch_array($r);

	$variable[0] = $row['nilai'];
	$variable[1] = $row['nilai']*100/$oil;
	$variable[2] = $variable[0]+$variable[1];


	return $variable;

}
?>
<table width="90%" class="baju" align="center" >
  <tr valign="top" bgcolor="#8A1602">
    <td width="5%"><div align="left"><span class="style1">Year</span></div></td>
    <td width="22%"><div align="center"><span class="style1">Cost Measure </span></div></td>
    <td width="10%"><div align="right"><span class="style1">Immature (1) </span></div></td>
    <td width="9%"><div align="right"><span class="style1">Mature</span></div></td>
    <td width="10%"><div align="right"><span class="style1">Processing</span></div></td>
    <td width="10%"><div align="right"><span class="style1">Total Cost (2) </span></div></td>
    <td width="13%"><div align="right"><span class="style1">Kernel Credit </span></div></td>
    <td width="1%">&nbsp;</td>
    <td width="19%"><div align="right"><span class="style1">Net Cost </span></div></td>
  </tr>

    <?php $con=connect();
			  $qt="select pb_thisyear from kos_belum_matang group by pb_thisyear limit 1  ";
			  $rt=mysqli_query($con, $qt);
			  while($rowt=mysqli_fetch_array($rt)){

			  $malaysia = ffb_average("malaysia",$rowt['pb_thisyear']);
			  $sabah = ffb_average("sabah",$rowt['pb_thisyear']);
			  $sarawak = ffb_average("sarawak",$rowt['pb_thisyear']);
			  $peninsular = ffb_average("peninsular",$rowt['pb_thisyear']);

		$tahunl = $rowt['pb_thisyear']-1;
	 	$oer_peninsular = oer($tahunl, 'peninsular'); //echo number_format($oer_peninsular[0],2);
    	$oer_sabah = oer($tahunl, 'sabah');// echo number_format($oer_sabah[0],2);
       	$oer_sarawak = oer($tahunl, 'sarawak'); //echo number_format($oer_sarawak[0],2);
      	$oer_malaysia = oer($tahunl, 'malaysia'); //echo number_format($oer_malaysia[0],2);


			  ?>

  <tr class="alt">
   <td valign="top"><strong><?php echo $rowt['pb_thisyear'];?></strong></td>
    <td valign="top"><a href="#" onclick="tutup('malaysia<?php echo $rowt['pb_thisyear'];?>');">Malaysia</a></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A">&nbsp;</td>
  </tr>
  <tr class="malaysia<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top"> &nbsp;&nbsp;RM Per Hectare </td>
    <td valign="top"><div align="right"><?php $malaysia_ha= summary('graf_kbm',$rowt['pb_thisyear'],''); echo number_format($malaysia_ha[0],2);?></div></td>
    <td valign="top"><div align="right"><?php $malaysia_ffb= summary('graf_km',$rowt['pb_thisyear'],''); echo number_format($malaysia_ffb[0],2);?></div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">-</div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"></div></td>
  </tr>
  <tr class="malaysia<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;&nbsp;RM Per Tonne FFB </td>
    <td valign="top"><div align="right"><?php $ffb_malaysia = $malaysia_ha[0]/$malaysia[0]/22*3; echo number_format($ffb_malaysia,2);?></div></td>
    <td valign="top"><div align="right"><?php $tffb_malaysia = $malaysia_ffb[0]/$malaysia[0]/22*3; echo number_format($tffb_malaysia,2);?></div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>-</strong></div></td>
    <td valign="top"><div align="right">0.00</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>0.00</strong></div></td>
  </tr>
  <tr class="malaysia<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(-)</div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(0.00)</div></td>
  </tr>
  <tr class="malaysia<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">RM Per Tonne CPO </td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top"><div align="right">
	<?php $malaysia_cpo= summary_mill('graf_mill',$rowt['pb_thisyear'],'',$oer_malaysia[0]);
	echo number_format($malaysia_cpo[1],2);
	//echo number_format($malaysia_cpo[0],2);?></div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>-</strong></div></td>
    <td valign="top"><div align="right">0.00</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>0.00</strong></div></td>
  </tr>
  <tr class="malaysia<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(-)</div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(0.00)</div></td>
  </tr>
  <tr class="alt">
   <td valign="top">&nbsp;</td>
    <td valign="top"><a href="#" onclick="tutup('peninsular<?php echo $rowt['pb_thisyear'];?>');">Peninsular Malaysia</a></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A">&nbsp;</td>
  </tr>
  <tr class="peninsular<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top"> &nbsp;&nbsp;RM Per Hectare </td>
    <td valign="top"><div align="right"><?php $peninsular_ha= summary('graf_kbm',$rowt['pb_thisyear'],'peninsular'); echo number_format($peninsular_ha[0],2);?></div></td>
    <td valign="top"><div align="right">
      <?php $peninsular_ffb= summary('graf_km',$rowt['pb_thisyear'],'peninsular'); echo number_format($peninsular_ffb[0],2);?>
    </div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">-</div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"></div></td>
  </tr>
  <tr class="peninsular<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;&nbsp;RM Per Tonne FFB </td>
    <td valign="top"><div align="right"><?php $ffb_peninsular = $peninsular_ha[0]/$peninsular[0]/22*3; echo number_format($ffb_peninsular,2);?></div></td>
    <td valign="top"><div align="right">
      <?php $tffb_peninsular = $peninsular_ffb[0]/$peninsular[0]/22*3; echo number_format($tffb_peninsular,2);?>
    </div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>-</strong></div></td>
    <td valign="top"><div align="right">0.00</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>0.00</strong></div></td>
  </tr>
  <tr class="peninsular<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(-)</div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(0.00)</div></td>
  </tr>
  <tr class="peninsular<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">RM Per Tonne CPO </td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top"><div align="right">
      <?php $peninsular_cpo= summary_mill('graf_mill',$rowt['pb_thisyear'],'',$oer_peninsular[0]);
	echo number_format($peninsular_cpo[1],2);
	//echo number_format($peninsular_cpo[0],2);?>
    </div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>-</strong></div></td>
    <td valign="top"><div align="right">0.00</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>0.00</strong></div></td>
  </tr>
  <tr class="peninsular<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(-)</div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(0.00)</div></td>
  </tr>

    <tr class="alt">
   <td valign="top">&nbsp;</td>
    <td valign="top"><a href="#" onclick="tutup('sabah<?php echo $rowt['pb_thisyear'];?>');">Sabah</a></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A">&nbsp;</td>
  </tr>
  <tr class="sabah<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top"> &nbsp;&nbsp;RM Per Hectare </td>
    <td valign="top"><div align="right"><?php $sabah_ha= summary('graf_kbm',$rowt['pb_thisyear'],'sabah'); echo number_format($sabah_ha[0],2);?></div></td>
    <td valign="top"><div align="right">
      <?php $sabah_ffb= summary('graf_km',$rowt['pb_thisyear'],'sabah'); echo number_format($sabah_ffb[0],2);?>
    </div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">-</div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"></div></td>
  </tr>
  <tr class="sabah<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;&nbsp;RM Per Tonne FFB </td>
    <td valign="top"><div align="right"><?php $ffb_sabah = $sabah_ha[0]/$sabah[0]/22*3; echo number_format($ffb_sabah,2);?></div></td>
    <td valign="top"><div align="right">
      <?php $tffb_sabah = $sabah_ffb[0]/$sabah[0]/22*3; echo number_format($tffb_sabah,2);?>
    </div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>-</strong></div></td>
    <td valign="top"><div align="right">0.00</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>0.00</strong></div></td>
  </tr>
  <tr class="sabah<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(-)</div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(0.00)</div></td>
  </tr>
  <tr class="sabah<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">RM Per Tonne CPO </td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top"><div align="right">
      <?php $sabah_cpo= summary_mill('graf_mill',$rowt['pb_thisyear'],'',$oer_sabah[0]);
	echo number_format($sabah_cpo[1],2);
	//echo number_format($sabah_cpo[0],2);?>
    </div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>-</strong></div></td>
    <td valign="top"><div align="right">0.00</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>0.00</strong></div></td>
  </tr>
  <tr class="sabah<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(-)</div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(0.00)</div></td>
  </tr>

  <tr class="alt">
   <td valign="top">&nbsp;</td>
    <td valign="top"><a href="#" onclick="tutup('sarawak<?php echo $rowt['pb_thisyear'];?>');">Sarawak</a></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A">&nbsp;</td>
  </tr>
  <tr class="sarawak<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top"> &nbsp;&nbsp;RM Per Hectare </td>
    <td valign="top"><div align="right"><?php $sarawak_ha= summary('graf_kbm',$rowt['pb_thisyear'],'sarawak'); echo number_format($sarawak_ha[0],2);?></div></td>
    <td valign="top"><div align="right">
      <?php $sarawak_ffb= summary('graf_km',$rowt['pb_thisyear'],'sarawak'); echo number_format($sarawak_ffb[0],2);?>
    </div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">-</div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"></div></td>
  </tr>
  <tr class="sarawak<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;&nbsp;RM Per Tonne FFB </td>
    <td valign="top"><div align="right"><?php $ffb_sarawak = $sarawak_ha[0]/$sarawak[0]/22*3; echo number_format($ffb_sarawak,2);?></div></td>
    <td valign="top"><div align="right">
      <?php $tffb_sarawak = $sarawak_ffb[0]/$sarawak[0]/22*3; echo number_format($tffb_sarawak,2);?>
    </div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>-</strong></div></td>
    <td valign="top"><div align="right">0.00</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>0.00</strong></div></td>
  </tr>
  <tr class="sarawak<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(-</div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(0.00)</div></td>
  </tr>
  <tr class="sarawak<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">RM Per Tonne CPO </td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top"><div align="right">-</div></td>
    <td valign="top"><div align="right">
      <?php $sarawak_cpo= summary_mill('graf_mill',$rowt['pb_thisyear'],'',$oer_sarawak[0]);
	echo number_format($sarawak_cpo[1],2);
	//echo number_format($sarawak_cpo[0],2);?>
    </div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>-</strong></div></td>
    <td valign="top"><div align="right">0.00</div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right"><strong>0.00</strong></div></td>
  </tr>
  <tr class="sarawak<?php echo $rowt['pb_thisyear'];?>">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(-)</div></td>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
    <td valign="top" bgcolor="#FD9B8A"><div align="right">(0.00)</div></td>
  </tr>
  <?php } ?>


  <tr>
    <td colspan="9">(1) Immature Cost is an annual average. Cost computation is for three years of the immature phase. </td>
  </tr>
  <tr>
    <td colspan="9">(2) Total cost excludes depreciation. However, figures in the parenthesis demote costs inclusive if depreciation. </td>
  </tr>
</table>
<br />
<br />
