<?php 
/**
 * done 13/10/2010
 * Average size of estate
 **/

include('baju_merah.php');




function mean_estate($state){
		$con = connect();
		$query = "select AVG(ei.lanar) as kira from esub es, estate_info ei where ";
		
		if($state=="SABAH" || $state =="SARAWAK"){
		$query.=" es.negeri_premis='$state' and ";
		}
		
		else if($state=="PENINSULAR"){
		$query.=" es.negeri_premis NOT LIKE '%SABAH%' or es.negeri NOT LIKE '%SARAWAK%' and ";
		}
		
		
		$query.="  es.no_lesen_baru = ei.lesen ";
		// echo $query;
		$res = mysql_query($query,$con);
		$row = mysql_fetch_array($res); 
		
		$var = $row['kira'];
		return $var; 
}






	function kiraluas($var)
	{$con=connect();
		$q="select * from estate_info where lesen ='$var'";
		$r = mysql_query($q,$con);
		$row=mysql_fetch_array($r);
		
/*		 $jumlahall=$row['lanar']+$row['pedalaman']+$row['gambutcetek']+$row['gambutdalam']+$row['laterit']+$row['asidsulfat']+$row['tanahpasir'];
*/	
		 $jumlahall=$row['lanar'];

	return $jumlahall;
	}
	


?>
<table width="51%" align="center" class="baju">
  <tr>
    <td colspan="2">
      <div align="center"><b style="font-size:16px">&nbsp;&nbsp;Average Size of Estates According To Ownership Types</b> </div></td>
  </tr>
  <tr>
    <th width="62%"><strong>Ownership Types</strong></th>
    <th width="34%" align="center"><div align="right"><strong>Hectares</strong></div></th>
  </tr>
  <?php
  
  $con = connect();
  $q="select * from company order by comp_name";
  $r=mysql_query($q,$con);
  
  $totalsemua=0; 
  while($row=mysql_fetch_array($r)){
  ?>
  <tr <?php if(++$t%2==0){?>class="alt"<?php } ?>>
    <td><a href="home.php?id=estate&sub=size_estate_detail&comp_name=<?php echo  $row['comp_name'];?>"><?php echo  $row['comp_name_english'];?></a></td>
    <td align="center"><div align="right">
      <?php 
	 	$qo ="select lesen from estate_info where syarikat = '".$row['comp_name']."' ";
  		$ro=mysql_query($qo,$con);
		$totalro = mysql_num_rows($ro);
		
		$totalluas = 0;
		while($rowro=mysql_fetch_array($ro)){
		 $L=kiraluas($rowro['lesen']);
		$totalluas = $totalluas+$L; 
		//echo "<br>";
		}
		$mean_luas = round($totalluas/$totalro,2);
echo number_format($mean_luas,2);
	?>
    </div></td>
  </tr>
  <?php
  $totalsemua = $totalsemua+$mean_luas; 
   } ?>
  <tr>
    <th><strong>All Categories</strong></th>
    <th align="center"><div align="right"><strong><?php echo number_format($totalsemua,2);?></strong></div></th>
  </tr>
</table>

<br>
<br>









<table width="51%" align="center" class="baju">
  <tr>
    <th>
      <div align="left">Malaysia </div></th>
    <th><div align="right"><?php $m = mean_estate('MALAYSIA'); echo number_format($m,2);?></div></th>
  </tr>
  <tr>
    <td width="62%"><div align="left">Peninsular Malaysia</div></td>
    <td width="34%" align="center"><div align="right">
      <?php $m = mean_estate('PENINSULAR'); echo number_format($m,2);?>
    </div></td>
  </tr>
  <tr>
    <td><div align="left">Sabah</div></td>
    <td align="center"><div align="right">
      <?php $m = mean_estate('SABAH'); echo number_format($m,2);?>
    </div></td>
  </tr>
  <tr>
    <td><div align="left">Sarawak</div></td>
    <td align="center"><div align="right">
      <?php $m = mean_estate('SARAWAK'); echo number_format($m,2);?>
    </div></td>
  </tr>
</table>

<br />
<br />
<br />

