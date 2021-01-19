<?php 
session_start();
include ('../Connections/connection.class.php');
include ('../class/user.class.php');
include ('../setstring.inc');
extract($_POST);
extract($_GET);

$con = connect();
$qw = "select * from belanja_am_var where thisyear='".date('Y')."' and lesen = '".$_SESSION['lesen']."' and type = '$type'";
$rw = mysql_query($qw,$con);
$total_rw = mysql_num_rows($rw);
?>
<link rel="shortcut icon" href="../images/icon.ico" />
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>
<script type="text/javascript"> 
function keypress(e)
{
	if ([e.keyCode||e.which]==8 || [e.keyCode||e.which]==46 || [e.keyCode||e.which]==44) //alow backspace and dot and comma
	return true;
	if ([e.keyCode||e.which] < 48 || [e.keyCode||e.which] > 57)
	e.preventDefault? e.preventDefault() : e.returnValue = false;
}
</script>

<script language="javascript">

	var emolumen = 0.00; 	
	//var kos_ibupejabat = 0.00; 	
	//var kos_agensi = 0.00; 	
	//var kebajikan = 0.00; 	
	//var sewa_tol = 0.00; 	
	//var penyelidikan = 0.00; 	
	//var perubatan = 0.00; 	 			
	//var penyelenggaraan = 0.00; 	
	//var cukai_keuntungan = 0.00; 	
	//var penjagaan = 0.00; 				
	//var kawalan = 0.00; 			
	//var air_tenaga = 0.00; 	
	//var perbelanjaan_pejabat = 0.00; 	 	
	//var susut_nilai = 0.00; 
	//var perbelanjaan_lain  = 0.00;


function field_click(obj) 
{
		$(obj).format({format:"#,###.00", locale:"us"});
		$(obj).removeClass("field_edited");
		$(obj).addClass("field_active");
		

}
function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

</script>
<script language="javascript">
function field_blur(obj,nilai,total,nilai_asal)
{
	/*alert(obj);
	alert(nilai);
	alert(nilai_asal);
	alert(total);
	
	total_all=document.getElementById(total_nilai).value;
	alert(total_all);

	if(nilai_asal ==null){ nilai_asal=0;}
	nilai_bersih = 	nilai_asal-nilai;
	alert(nilai_bersih);	*/	

	/*total_emolumen = document.getElementById(total).value;
	total_emolumen = total_emolumen.replace(",","");
	nilai_asal = nilai_asal.replace(",","");
	emolumen =Number(total_emolumen)+Number(nilai)-Number(nilai_asal);
	
	document.getElementById(total).value = emolumen; 
	$("#"+total).format({format:"#,###.00", locale:"us"}); 
		*/
	jumlah =0;
	for(j=1; j<=11; j++ )
	{
		jumlahj= document.getElementById("emolumen["+j+"]").value;
		jumlahj = jumlahj.replace(/,/g,"");
		//alert(jumlahj);
		jumlah = Number(jumlah)+Number(jumlahj);
		//alert(jumlah);
		document.getElementById("totalemolumen").value=jumlah;
		//$(obj).format({format:"#,###.00", locale:"us"});
	}
		//alert(jumlah);
		//document.getElementById("totalemolumen").value=jumlah;
		
		//$("#total").format({format:"#,###.00", locale:"us"}); 
		//$(obj).format({format:"#,###.00", locale:"us"});
	
}
	
</script>
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
body {
	background-color: #D3E2F8;
}
.style2 {font-weight: bold}
-->
</style>
<title>Perbelanjaan Am</title><h3><?php 
if($type=='emolumen'){ $title = setstring ( 'mal', 'Emolumen untuk eksekutif dan bukan eksekutif', 'en', 'Executive and non-executive emoluments'); }
else if($type=='kos_ibupejabat'){ $title =setstring ( 'mal', 'Kos ibu pejabat', 'en', 'Headquarters Cost'); }
else if($type=='kos_agensi'){ $title =setstring ( 'mal', 'Kos agensi dan yuran professional', 'en', 'Agency cost and professional fee'); }
else if($type=='kebajikan'){ $title =setstring ( 'mal', 'Kebajikan yang dibayar kepada buruh', 'en', 'Unpaid welfare to labour'); }
else if($type=='sewa_tol'){ $title =setstring ( 'mal', 'Sewa, TOL dan insuran', 'en', 'Rent, TOL and Insurance'); }
else if($type=='penyelidikan'){ $title =setstring ( 'mal', 'Penyelidikan dan pembangunan', 'en', 'Research and Development'); }
else if($type=='perubatan'){ $title =setstring ( 'mal', 'Perubatan dan kebajikan', 'en', 'Medical'); }
else if($type=='penyelenggaraan'){ $title =setstring ( 'mal', 'Penyelenggaraan bangunan', 'en', 'Building maintenance'); }
else if($type=='cukai_keuntungan'){ $title =setstring ( 'mal', 'Cukai keuntungan luar biasa', 'en', 'Extraordinary profit tax'); }
else if($type=='penjagaan'){ $title =setstring ( 'mal', 'Penjagaan dan pemuliharaan', 'en', 'Upkeep dan conservation'); }
else if($type=='kawalan'){ $title =setstring ( 'mal', 'Kawalan keselamatan', 'en', 'Security Control'); }
else if($type=='air_tenaga'){ $title =setstring ( 'mal', 'Air dan tenaga', 'en', 'Water and Power'); }
else if($type=='perbelanjaan_pejabat'){ $title =setstring ( 'mal', 'Perbelanjaan pejabat', 'en', 'Office expenses'); }
else if($type=='susut_nilai'){ $title =setstring ( 'mal', 'Susutnilai', 'en', 'Value Depreciation'); }
else if($type=='perbelanjaan_lain'){ $title =setstring ( 'mal', 'Perbelanjaan lain', 'en', 'Others expenses'); }
echo "<u>".$title."</u>"; 
$var[0]=$_SESSION['lesen'];
$var[1]=date('Y');
$var[2]=$type;
?></h3>


<form id="form1" name="form1" method="post" action="save_belanja_am.php">
  <table width="100%" cellpadding="2" cellspacing="2">
    
	<?php if ($type=='emolumen'){?>
	<tr valign="top">
      <td width="2%"><div align="left">1. </div></td>
      <td width="18%" height="26"><?=setstring ( 'mal', 'Gaji dan elaun', 'en', 'Emoluments and allowances'); ?></td>
      <td width="1%">:</td>
      <td width="79%">
	  <?php $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" type="text" class="field_active" id="emolumen[1]" onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"  value="<?php echo number_format($emolumen1,2);
	  ?>" size="15" autocomplete="off" onKeypress="keypress(event)" />
  	  </td>
    </tr>
    <tr valign="top">
      <td><div align="left">2. </div></td>
      <td height="26"><?=setstring ( 'mal', 'Kerja lebih masa', 'en', 'Overtime'); ?> </td>
      <td>:</td>
      <td><?php $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[2]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')" value="<?php 
	  
	  echo number_format($emolumen2,2);
	  ?>" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">3. </div></td>
      <td height="26"><?=setstring ( 'mal', 'Perubatan', 'en', 'Medical'); ?></td>
      <td>:</td>
      <td><?php   $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 
	
	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[3]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">4. </div></td>
      <td height="26"><?=setstring ( 'mal', 'Perjalanan', 'en', 'Travelling'); ?></td>
      <td>:</td>
      <td><?php   $var[3]=4; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen4 = $belanja->kos;?>
      <input name="emolumen[4]" value="<?php 
	
	  echo number_format($emolumen4,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[4]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen4; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">5. </div></td>
      <td height="26"><?=setstring ( 'mal', 'Bonus', 'en', 'Bonuses'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=5; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen5 = $belanja->kos;?>
      <input name="emolumen[5]" value="<?php 
	
	  echo number_format($emolumen5,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[5]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen5; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">6.  </div></td>
      <td height="26"><?=setstring ( 'mal', 'Insuran peribadi', 'en', 'Personal Insurance'); ?> </td>
      <td>:</td>
      <td><?php  $var[3]=6; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen6 = $belanja->kos;?>
      <input name="emolumen[6]" value="<?php 
	 
	  echo number_format($emolumen6,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[6]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen6; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">7. </div></td>
      <td height="26"><?=setstring ( 'mal', 'Insentif', 'en', 'Incentive'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=7; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen7 = $belanja->kos;?>
      <input name="emolumen[7]" value="<?php 

	  echo number_format($emolumen7,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[7]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen7; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">8. </div></td>
      <td height="26"><?=setstring ( 'mal', 'KWSP', 'en', 'EPF'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=8; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen8 = $belanja->kos;?>
      <input name="emolumen[8]" value="<?php 

	  echo number_format($emolumen8,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[8]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen8; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">9. </div></td>
      <td height="26"><?=setstring ( 'mal', 'PERKESO', 'en', 'SOCSO'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=9; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen9 = $belanja->kos;?>
      <input name="emolumen[9]" value="<?php 

	  echo number_format($emolumen9,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[9]"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen9; ?>')" size="15" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">10.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=10; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen10 = $belanja->kos;?>
      <input name="emolumen[10]" value="<?php 

	  echo number_format($emolumen10,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[10]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen10; ?>')" /></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?> </strong></div></td>
	  <td><strong>: </strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3+$emolumen4+$emolumen5+$emolumen6+$emolumen7+$emolumen8+$emolumen9+$emolumen10; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //emolumen?>
    <?php if ($type=='kos_ibupejabat'){?>
	<tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran pentadbiran', 'en', 'Administration fees'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[1]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">2.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran lesen', 'en', 'Licensing fees'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 

	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[2]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">3.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 

	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" autocomplete="off" id="emolumen[3]" size="15"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')" /></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?></strong></div></td>
	  <td><span class="style2">:</span></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php }//kosibupejabat?>
	<?php if($type=='sewa_tol'){?>
    <tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Cukai tanah', 'en', 'Quit rent'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">2.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran TOL', 'en', 'TOL fees'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 
	
	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">3.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Insurans kebakaran/kecurian', 'en', 'Fire Insurance'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 

	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[3]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">4.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Insuran', 'en', 'Insurances'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=4; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen4 = $belanja->kos;?>
      <input name="emolumen[4]" value="<?php 

	  echo number_format($emolumen4,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[4]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen4; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">5.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Penghantaran', 'en', 'Delivery'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=5; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen5 = $belanja->kos;?>
      <input name="emolumen[5]" value="<?php 

	  echo number_format($emolumen5,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[5]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen5; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">6.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=6; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen6 = $belanja->kos;?>
      <input name="emolumen[6]" value="<?php 

	  echo number_format($emolumen6,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[6]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen6; ?>')" /></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?> </strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3+$emolumen4+$emolumen5+$emolumen6; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //sewa_tol?>
	<?php if ($type=='kos_agensi'){?>
    <tr valign="top">
      <td>1.</td>
      <td height="26"><?=setstring ( 'mal', 'Perbelanjaan lawatan agen', 'en', 'Visiting agent fees'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td>2.</td>
      <td height="26"><?=setstring ( 'mal', 'Perbelanjaan perundangan dan lain-lain profesional', 'en', 'Legal and others professional fees'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 

	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">3.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran khidmat nasihat lawatan/penanaman', 'en', 'Visiting/planting consultation fees'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 

	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[3]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">4.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran ahli agromoni', 'en', 'Agronomist fees'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=4; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen4 = $belanja->kos;?>
      <input name="emolumen[4]" value="<?php 

	  echo number_format($emolumen4,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[4]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen4; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">5.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran audit', 'en', 'Audit fees'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=5; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen5 = $belanja->kos;?>
      <input name="emolumen[5]" value="<?php 
	
	  echo number_format($emolumen5,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[5]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen5; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">6.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran sokongan sistem komputer estet', 'en', 'Estate\'s computer system support'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=6; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen6 = $belanja->kos;?>
      <input name="emolumen[6]" value="<?php 
	
	  echo number_format($emolumen6,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[6]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen6; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">7.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td><?php   $var[3]=7; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen7 = $belanja->kos;?>
      <input name="emolumen[7]" value="<?php 
	
	  echo number_format($emolumen7,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[7]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen7; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?> </strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3+$emolumen4+$emolumen5+$emolumen6+$emolumen7; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } // kos agensi ?>
	<?php if ($type=='perubatan'){?>
    <tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Bayaran lawatan pegawai perubatan (VMO)', 'en', 'Visiting Medical Officer fees'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">2.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Pelbagai ubat dan peralatan', 'en', 'Medicine and Instrument'); ?> </td>
      <td>:</td>
      <td><?php  $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 
	 
	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')"/></td>
    </tr>
    
    <tr valign="top">
      <td><div align="left">3.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Peralatan sukan/permainan', 'en', 'Sports/recreations equipment'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 
	
	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[3]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">4.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=4; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen4 = $belanja->kos;?>
      <input name="emolumen[4]" value="<?php 

	  echo number_format($emolumen4,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[4]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen4; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?> </strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3+$emolumen4; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //penyelenggaraan?>
    <?php if($type=='penyelenggaraan'){?>
	<tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Pembaikan dan pengecatan', 'en', 'Painting and repair'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">2.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Perabut dan <em>fitting</em> untuk banglow/kuaters/rumah kedai/bengkel', 'en', 'Fitting for bungalow/quarters/shophouse/workshop'); ?></td>
      <td>:</td>
      <td><?php   $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 
	
	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">3.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td>
      <input name="emolumen[3]" value="<?php 
	  $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;
	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[3]" size="15" autocomplete="off"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')" /></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Others'); ?> </strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //penyelenggaraan?>
    <?php if($type=='penjagaan'){?>
	<tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Anti-vektor', 'en', 'Anti-vector'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">2.</div></td>
      <td height="35"><?=setstring ( 'mal', 'Pembersihan part-parit monsun', 'en', 'Drain repair and cleaning'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 

	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">3.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Pengorekan lubang sampah', 'en', 'Pits and upkeep'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 

	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[3]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">4.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Parit dan bentung', 'en', 'Drainage and culvert'); ?></td>
      <td>:</td>
      <td><?php   $var[3]=4; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen4 = $belanja->kos;?>
      <input name="emolumen[4]" value="<?php 
	
	  echo number_format($emolumen4,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[4]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen4; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">5.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Pemotongan rumput', 'en', 'Grass cutting expenses'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=5; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen5 = $belanja->kos;?>
      <input name="emolumen[5]" value="<?php 

	  echo number_format($emolumen5,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[5]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen5; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">6.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Penjagaan pejabat/banglow/kuaters/taman', 'en', 'Upkeep of office/buanglow/quarters/park'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=6; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen6 = $belanja->kos;?>
      <input name="emolumen[6]" value="<?php 
	
	  echo number_format($emolumen6,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[6]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen6; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">7.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=7; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen7 = $belanja->kos;?>
      <input name="emolumen[7]" value="<?php 

	  echo number_format($emolumen7,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[7]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen7; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?> </strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3+$emolumen4+$emolumen5+$emolumen6+$emolumen7; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //penjagaan ?>
	<?php if($type=='kawalan'){?>
    <tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Gaji pegawai keselamatan', 'en', 'Auxillary police/watchman salary'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"  onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')" /></td>
    </tr>
    <tr valign="top">
      <td><div align="left">2.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Penjagaan pos keselamatan dan pagar ', 'en', 'Routine upkeep of security post and fences'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 

	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">3.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran lesen senjata', 'en', 'Guns license fees'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 

	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[3]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">4.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Pembaikan senjata dan peluru', 'en', 'Guns and repair'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=4; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen4 = $belanja->kos;?>
      <input name="emolumen[4]" value="<?php 
	
	  echo number_format($emolumen4,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[4]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen4; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">5.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran penghantaran wang gaji', 'en', 'Securicor/payroll collect fees'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=5; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen5 = $belanja->kos;?>
      <input name="emolumen[5]" value="<?php 

	  echo number_format($emolumen5,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[5]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen5; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">6.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Tiket jambatan timbang dan <em>seals</em>', 'en', 'Seals and Weighbrigde Ticket'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=6; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen6 = $belanja->kos;?>
      <input name="emolumen[6]" value="<?php 

	  echo number_format($emolumen6,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[6]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen6; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?> </strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3+$emolumen4+$emolumen5+$emolumen6; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //keselamatan ?>
	<?php if($type=='air_tenaga'){?>
    <tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Perbelanjaan elektrik/air', 'en', 'Water and power bills'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">2.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Wayar kabel', 'en', 'Cabling'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 

	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">3.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Mentol lampu', 'en', 'Replace bulbs'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 

	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[3]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">4.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Bahan kimia', 'en', 'Chemicals'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=4; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen4 = $belanja->kos;?>
      <input name="emolumen[4]" value="<?php 
	
	  echo number_format($emolumen4,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[4]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen4; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">5.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Penyelenggaraan dan servis pam air ', 'en', 'Maintenance and services of water pump'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=5; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen5 = $belanja->kos;?>
      <input name="emolumen[5]" value="<?php 

	  echo number_format($emolumen5,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[5]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen5; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">6.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Penyelenggaraan kawasan tadahan', 'en', 'Maintenance of water reservoir'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=6; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen6 = $belanja->kos;?>
      <input name="emolumen[6]" value="<?php 

	  echo number_format($emolumen6,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[6]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen6; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">7.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=7; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen7 = $belanja->kos;?>
      <input name="emolumen[7]" value="<?php 

	  echo number_format($emolumen7,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[7]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen7; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?> </strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3+$emolumen4+$emolumen5+$emolumen6+$emolumen7; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //air ?>
	<?php if($type=='perbelanjaan_pejabat'){?>
    <tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Telefon/fax/telegram', 'en', 'Telephone/fax/telegram fees'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 
	
	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">2.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran post/kurier', 'en', 'Postage and parcel freight fees'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 

	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">3.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Alatan pelbagai', 'en', 'Miscellanous'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 

	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[3]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">4.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Alatan komputer', 'en', 'Computer stationaries and supplies'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=4; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen4 = $belanja->kos;?>
      <input name="emolumen[4]" value="<?php 

	  echo number_format($emolumen4,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[4]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen4; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">5.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Majalah dan suratkhabar', 'en', 'Magazine and newspaper'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=5; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen5 = $belanja->kos;?>
      <input name="emolumen[5]" value="<?php 

	  echo number_format($emolumen5,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[5]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen5; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">6.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Buku cek', 'en', 'Cheque book'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=6; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen6 = $belanja->kos;?>
      <input name="emolumen[6]" value="<?php 

	  echo number_format($emolumen6,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[6]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen6; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">7.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Caj bank', 'en', 'Bank charges'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=7; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen7 = $belanja->kos;?>
      <input name="emolumen[7]" value="<?php 
	
	  echo number_format($emolumen7,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[7]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen7; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">8.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Servis komputer/peralatan pejabat', 'en', 'Computer/office equipment services'); ?> </td>
      <td>:</td>
      <td><?php $var[3]=8; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen8 = $belanja->kos;?>
      <input name="emolumen[8]" value="<?php 
	  
	  echo number_format($emolumen8,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[8]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen8; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">9.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Pembersih pejabat ', 'en', 'Office cleaners'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=9; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen9 = $belanja->kos;?>
      <input name="emolumen[9]" value="<?php 

	  echo number_format($emolumen9,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[9]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen9; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">10.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Pelbagai barang pejabat', 'en', 'Misc. office equipments'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=10; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen10 = $belanja->kos;?>
      <input name="emolumen[10]" value="<?php 

	  echo number_format($emolumen10,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[10]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen10; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">11.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=11; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen11 = $belanja->kos;?>
      <input name="emolumen[11]" value="<?php 

	  echo number_format($emolumen11,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[11]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen11; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?> </strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3+$emolumen4+$emolumen5+$emolumen6+$emolumen7+$emolumen8+$emolumen9+$emolumen10+emolumen11; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //perbelanjaan pejabat ?>
	<?php if($type=='susut_nilai'){?>
    <tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Pelunasan tanah pajakan', 'en', 'Statutory Payment cess'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">2.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Susutnilai bangunan/mesin/kenderaan/ peralatan pejabat', 'en', 'Depreciation of building/machine/transport/office equipment'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 

	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?> </strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //susutnilai?>
    <?php if($type=='perbelanjaan_lain'){?>
	<tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Keraian pelawat', 'en', 'Entertain visitors'); ?> </td>
      <td>&nbsp;</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">2.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Penerbitan pertanian', 'en', 'Agricultural publication'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 

	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">3.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Yuran/bayaran seminar/persidangan', 'en', 'Seminar/conference fees'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 

	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[3]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">4.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Pembaikan notis/papan tanda', 'en', 'Repairs to Notices/signboard'); ?></td>
      <td>:</td>
      <td><?php   $var[3]=4; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen4 = $belanja->kos;?>
      <input name="emolumen[4]" value="<?php 
	
	  echo number_format($emolumen4,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[4]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen4; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">5.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Derma/sumbangan', 'en', 'Sundry charitable donation'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=5; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen5 = $belanja->kos;?>
      <input name="emolumen[5]" value="<?php 
	
	  echo number_format($emolumen5,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[5]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen5; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td><div align="left">6.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=6; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen6 = $belanja->kos;?>
      <input name="emolumen[6]" value="<?php 

	  echo number_format($emolumen6,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[6]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen6; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?> </strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3+$emolumen4+$emolumen5+$emolumen6; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //perbelanjaan lain ?>
	<?php if($type=='kebajikan'){?>
    <tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Kebajikan pekerja', 'en', 'Welfare'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td>2.</td>
      <td height="26"><?=setstring ( 'mal', 'Ganjaran persaraan', 'en', 'Retirement rewards'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=2; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen2 = $belanja->kos;?>
      <input name="emolumen[2]" value="<?php 

	  echo number_format($emolumen2,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[2]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen2; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td>3.</td>
      <td height="26"><?=setstring ( 'mal', 'Pampasan kepada pekerja', 'en', 'Compensation'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=3; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen3 = $belanja->kos;?>
      <input name="emolumen[3]" value="<?php 

	  echo number_format($emolumen3,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[3]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen3; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td>4.</td>
      <td height="26"><?=setstring ( 'mal', 'Subsidi', 'en', 'Subsidies'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=4; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen4 = $belanja->kos;?>
      <input name="emolumen[4]" value="<?php 

	  echo number_format($emolumen4,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[4]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen4; ?>')"/></td>
    </tr>
    <tr valign="top">
      <td>5.</td>
      <td height="26"><?=setstring ( 'mal', 'Lain-lain', 'en', 'Others'); ?></td>
      <td>:</td>
      <td><?php 	  $var[3]=5; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen5 = $belanja->kos;?>
      <input name="emolumen[5]" value="<?php 

	  echo number_format($emolumen5,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[5]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen5; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?></strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1+$emolumen2+$emolumen3+$emolumen4+$emolumen5; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //kebajikan?>
	<?php if($type=='penyelidikan'){?>
    <tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Penyelidikan dan pembangunan', 'en', 'Research and development'); ?> </td>
      <td>:</td>
      <td><?php   $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?>
      <input name="emolumen[1]" value="<?php 
	
	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off"   onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?></strong></div></td>
	  <td><strong>:</strong></td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
	<?php } //penyelidikan?>
	<?php if($type=='cukai_keuntungan'){?>
    <tr valign="top">
      <td><div align="left">1.</div></td>
      <td height="26"><?=setstring ( 'mal', 'Cukai keuntungan', 'en', 'Profit tax'); ?> </td>
      <td>:</td>
      <td><?php 	  $var[3]=1; 
	  $belanja =new user ('belanja_am_var',$var);
	  $emolumen1 = $belanja->kos;?><input name="emolumen[1]" value="<?php 

	  echo number_format($emolumen1,2);
	  ?>" type="text" class="field_active" onKeypress="keypress(event)" id="emolumen[1]" size="15" autocomplete="off" onkeyup="field_blur(this,this.value,'totalemolumen','<?= $emolumen1; ?>')"/></td>
    </tr>
    <tr valign="middle">
	  <td>&nbsp;</td>
	  <td height="26"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?></strong></div></td>
	  <td>:</td>
	  <td><strong>
	    <input name="totalemolumen" type="text" class="field_active" id="totalemolumen" value="<?php $totalemolumen = $emolumen1; echo number_format($totalemolumen,2);?>" size="15" readonly="true" autocomplete="off" />
	  </strong></td>
    </tr>
    
    <?php } //cukai keuntungan luar biasa ?><tr valign="middle">
      <td>&nbsp;</td>
      <td height="26">&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <div align="left">
          <input name="lesen" type="hidden" id="lesen" value="<?= $_SESSION['lesen'];?>" />
          <input name="thisyear" type="hidden" id="thisyear" value="<?= date('Y');?>" />
          <input name="type" type="hidden" id="type" value="<?= $type; ?>" />
          <input type="submit" name="Submit" value="<?=setstring ( 'mal', 'Simpan', 'en', 'Save'); ?>" onclick="return confirm('<?=setstring ( 'mal', 'Simpan data ini?', 'en', 'Save this data?'); ?>');" />
          <input type="button" name="Submit2" value="<?=setstring ( 'mal', 'batal', 'en', 'Cancel'); ?>" onclick="window.close();" />
          <strong>
          <input name="wujud" type="hidden" id="wujud" value="<?= $total_rw; ?>" />
          </strong></div></td></tr>
    <tr valign="middle">
      <td height="26" colspan="4">&nbsp;</td>
    </tr>
  </table>
</form>

<?php 
	if (isset($simpan)){
	echo "<script>top.opener.window.location.reload();</script>";
	} 
?>