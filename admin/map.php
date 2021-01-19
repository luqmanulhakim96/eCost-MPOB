<?php
set_time_limit(0);

$satu = $_COOKIE['tahun_report']-0; 
 
  function soalan ($jenis,$tahun1,$state){
  		$con=connect();
		$q="select * from q_km where type='$jenis' ";
		$r = mysql_query($q,$con);
		
		$jas1=0;
		$jas2=0;
		$jb1=0;
		$jb2=0;
		
		while($row= mysql_fetch_array($r)){
			$a1 = pertama ($tahun1, $row['name'], '0',$state, "graf_km");
			$a2 = pertama ($tahun1, $row['name'], '0',$state, "graf_km_tan");
			
			$jas1=(int)$jas1+(int)$a1[0];
			$jas2=(int)$jas2+(int)$a2[0];
			
		}
		
		$vari[0] = $jas1;
		$vari[1] = $jas2; 
		  //kedua
		
		return $vari; 
			
  }

function pertama($tahun, $nama, $status,$negeri, $table){
$con=connect();
		
		$qavg = "SELECT AVG(y) as purata FROM $table where sessionid='$nama' and tahun ='$tahun' and status='$status'  and negeri = '$negeri'";
	 
	//echo $qavg; 
		
		$ravg = mysql_query($qavg,$con);
		$rrow = mysql_fetch_array($ravg);

		
		 $var[0] = $rrow['purata'];	
				
				return $var; 
				
		}	  
  
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
.popupHide2{ /CSS for enlarged image/

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
.popupHide3{ /CSS for enlarged image/

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
	left: 211px;
	top: 309px;
	width: 256px;
}
.popupShow2{
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 185px;
	top: 218px;
	width: 256px;
}
.popupShow3{
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 364px;
	top: 293px;
	width: 256px;
}
.style3 {font-size: 11px}
.style4 {font-size: 11px; font-weight: bold; }
.popupShowTrg {
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 181px;
	top: 171px;
	width: 256px;
}
.popupShowPhg {
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 154px;
	top: 229px;
	width: 256px;
}
.popupShowKtn {
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 151px;
	top: 157px;
	width: 256px;
}
.popupShowPrk {
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 97px;
	top: 176px;
	width: 256px;
}
.popupShowSgr {
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 114px;
	top: 258px;
	width: 256px;
}
.popupShow9 {
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 147px;
	top: 275px;
	width: 256px;
}
.popupShowKdh {
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 80px;
	top: 127px;
	width: 256px;
}
.popupShowSwk {
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 158px;
	top: 265px;
	width: 256px;
}
.popupShowSbh {
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 279px;
	top: 163px;
	width: 256px;
}
</style>
<div align="center"><br />
<strong style="font-size:18px">&nbsp;&nbsp;Crude Palm Oil in Year <?php echo $_COOKIE['tahun_report'];?></strong>
  <br />
  <br />
  <img src="../images/peta.png" width="648" height="288" border="0" usemap="#Map">
        <map name="Map" id="Map">
          <area shape="poly" coords="160,242,185,254,197,267,210,260,221,264,218,253,226,261,235,266,228,244,216,212,209,206,202,218,190,212,178,214,158,197,151,220,158,241" href="#" onmouseover="javascript:document.getElementById('JHR').className='popupShow';" onmouseout="javascript:document.getElementById('JHR').className='popupHide';"/>
          
          <area shape="poly" coords="98,117,106,139,108,153,117,161,120,173,160,198,181,214,200,217,204,206,197,170,195,136,188,150,173,137,160,114,133,110" href="#" onmouseover="javascript:document.getElementById('PHG').className='popupShowPhg';" onmouseout="javascript:document.getElementById('PHG').className='popupHide2';"/>
          
          
          <area shape="poly" coords="262,237,305,277,343,271,384,249,415,256,447,245,464,200,489,160,484,123,472,143,464,124,454,154,429,136,406,173,388,190,336,204,320,239,320,251,309,253" href="#" onmouseover="javascript:document.getElementById('SWK').className='popupShowSwk';" onmouseout="javascript:document.getElementById('SWK').className='popupHide3';"/>
          
          
          <area shape="poly" coords="154,62,147,70,147,80,152,93,156,110,164,119,170,131,178,140,186,149,191,144,193,136,195,130,193,126,195,123,196,114,191,102,184,93,179,87,183,86,175,84,173,77,176,77,164,68,160,64,179,82" href="#" onmouseover="javascript:document.getElementById('TRG').className='popupShowTrg';" onmouseout="javascript:document.getElementById('TRG').className='popupHide';" />
          
          
          <area shape="poly" coords="133,41,130,49,123,58,114,58,113,76,110,87,103,98,99,114,110,118,126,112,135,110,144,110,150,111,152,102,147,87,148,70,153,60,146,51,146,45" href="#" onmouseover="javascript:document.getElementById('KLN').className='popupShowKtn';" onmouseout="javascript:document.getElementById('KLN').className='popupHide';" />
          
          
          <area shape="poly" coords="85,60,79,73,73,87,62,92,55,94,60,105,66,113,69,122,65,129,70,141,71,147,77,152,87,154,99,155,105,155,103,140,100,125,96,107,104,97,109,84,111,74,111,67,110,62,111,57" href="#" onmouseover="javascript:document.getElementById('PRK').className='popupShowPrk';" onmouseout="javascript:document.getElementById('PRK').className='popupHide';" />
          
          
          <area shape="poly" coords="55,24,51,31,42,39,52,52,53,65,52,73,61,76,64,84,67,91,79,76,86,54,86,47,81,35,70,29" href="#" onmouseover="javascript:document.getElementById('KDH').className='popupShowKdh';" onmouseout="javascript:document.getElementById('KDH').className='popupHide';" />
          
          
          <area shape="poly" coords="78,154,93,159,108,160,120,169,123,180,121,196,111,206,108,211,124,188,105,201,109,206,111,200,112,195,106,202,103,211" href="#" onmouseover="javascript:document.getElementById('SGR').className='popupShowSgr';" onmouseout="javascript:document.getElementById('SGR').className='popupHide';"  />
          
          
          <area shape="poly" coords="126,181,139,186,154,197,156,210,149,217,137,215,126,218,119,206" href="#" onmouseover="javascript:document.getElementById('N9').className='popupShow9';" onmouseout="javascript:document.getElementById('N9').className='popupHide';"/>
          
          <area shape="poly" coords="528,47,521,57,506,72,497,92,485,101,477,115,489,126,497,147,491,151,512,150,541,145,553,149,568,144,584,143,593,141,594,128,605,117,620,113,621,107,589,89,564,70,553,55,542,46" href="#" onmouseover="javascript:document.getElementById('SBH').className='popupShowSbh';" onmouseout="javascript:document.getElementById('SBH').className='popupHide';"/>
          
		  
<area shape="poly" coords="46,17,50,19,52,25,49,30,43,33,40,36,42,18" href="#" onmouseover="javascript:document.getElementById('PLS').className='popupShow9';" onmouseout="javascript:document.getElementById('PLS').className='popupHide';"/>

<area shape="poly" coords="38,73,56,77,62,84,59,87,52,92,49,94,44,93" href="#" onmouseover="javascript:document.getElementById('PP').className='popupShow9';" onmouseout="javascript:document.getElementById('PP').className='popupHide';" />

<area shape="poly" coords="127,221,148,215,153,232,145,237" href="#"  onmouseover="javascript:document.getElementById('MLK').className='popupShow9';" onmouseout="javascript:document.getElementById('MLK').className='popupHide';" />


</map>
  <br />
  <br />
  <br />
 <?php
$con = connect();
$q = "select * from negeri ";
$r = mysql_query($q,$con);
while($row=mysql_fetch_array($r)){
?>          
<span id="<?php echo $row['id'];?>" class="popupHide">
<table width="100%" border="1" style="border-collapse:collapse" >
  <tr valign="top" style="background-color:#8A1602;color:#fff;text-transform:uppercase;">
    <td><strong><?php echo $row['nama'];?></strong></td>
    <td class="style4"><div align="right">RM/hectare</div></td>
    <td class="style4"><div align="right">RM/tonne FFB</div></td>
  </tr>
  <tr style="color:#000;background-color:#EAF2D3;">
    <td width="129"><span class="style3">Estate upkeep <br />
and Cultivation :</span></td>
    <td width="45"><div align="right"><span class="style3">
      <?php $s = soalan("upk",$satu,$row['nama']); echo number_format($s[0],2); ?>
    </span></div></td>
    <td width="4"><div align="right"><span class="style3"><?php echo number_format($s[1],2);?></span></div></td>
  </tr>

  <tr valign="top">
    <td><span class="style3">Harvesting <br />
and collection :</span></td>
      <td width="45"><div align="right"><span class="style3">
        <?php $h = soalan("harvest_all",$satu,$row['nama']); echo number_format($h[0],2); ?>
      </span></div></td>
    <td width="4"><div align="right"><span class="style3"><?php echo number_format($h[1],2);?></span></div></td>
  </tr>
  <tr valign="top" style="color:#000;background-color:#EAF2D3;">
    <td><span class="style3">Transportation :</span></td>
     <td width="45"><div align="right"><span class="style3">
       <?php $t = soalan("transportation_all",$satu,$row['nama']); echo number_format($t[0],2); ?>
     </span></div></td>
    <td width="4"><div align="right"><span class="style3"><?php echo number_format($t[1],2);?></span></div></td>
  </tr>
  <tr valign="top">
    <td><span class="style3">Joint estate :</span></td>
    <td width="45"><div align="right"><span class="style3">
      <?php $j = soalan("gc",$satu,$row['nama']); echo number_format($j[0],2); ?>
    </span></div></td>
    <td width="4"><div align="right"><span class="style3"><?php echo number_format($j[1],2);?></span></div></td>
  </tr>
</table>
</span>
<?php } ?>

     
<div align="center"><em>Please mouse over the region for detail information</em></div>


<br />
 <br />
      <br />