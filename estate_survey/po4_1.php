<?php 
$con = connect();
$q="select * from belanja_am_kos where lesen = '".$_SESSION['lesen']."' and thisyear = '".$_COOKIE['tahun_report']."'";
$r = mysql_query($q,$con);
$totalr = mysql_num_rows($r);
if($totalr==0)
	{
		$q = "INSERT INTO belanja_am_kos (
thisyear ,
lesen ,
emolumen ,
kos_ibupejabat ,
kos_agensi ,
kebajikan ,
sewa_tol ,
penyelidikan ,
perubatan ,
penyelenggaraan ,
cukai_keuntungan ,
penjagaan ,
kawalan ,
air_tenaga ,
perbelanjaan_pejabat ,
susut_nilai ,
perbelanjaan_lain ,
total_perbelanjaan,status
)
VALUES (
'".$_COOKIE['tahun_report']."', '".$_SESSION['lesen']."', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0','0'
);
";
		$r = mysql_query($q,$con);
	}

$var_nilai[0]=$_SESSION['lesen'];
$var_nilai[1]=$_COOKIE['tahun_report'];
$belanja = new user('belanja_am', $var_nilai);
?>

<?php 
$hektar = $pengguna->jumlahluas;
$fbb = new user('bts',$_SESSION['lesen']);
$bts =$fbb->purata_hasil_buah; 
?>

<script type="text/javascript">
	$(function() {
		$("#helper").hide();
	});
	
	function tunjuk_bantu(str) {
		$("#penerangan").html(str);
		$().mousemove(function(e) {
			$("#helper").css("top",e.pageY+3);
			$("#helper").css("left",e.pageX+3);
		});
		$("#helper").show();
	}
	
	function sembunyi_bantu() {
		$("#helper").hide();
	}
</script>
<script type="text/javascript">
function hantar(x)
{
	document.form1.action = "save_perbelanjaan_am_kos.php?status="+x;
	document.form1.target = "_parent";
	document.form1.submit();
}

</script>

<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="facebox/facebox.js" type="text/javascript"></script> 
<script>
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
}) 
</script>

<style type="text/css">
<!--
.active_field {
	border: 1px #CC3300 solid;
	text-align: center;
	font-size: 13px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.field_active {
	border-color: #FFCC99;
	border-width: 1px;
	border-style: solid;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #CCCCCC;
}
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
#bantuan {
	position:absolute;
	left:522px;
	top:36px;
	width:500px;
	height:218px;
	z-index:1;
	background-image: url(../themes/base/images/ui-bg_flat_0_aaaaaa_40x100.png);
	opacity: 0.99;
}
-->
</style>
<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=home&finished=true&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=false';		
			}
	}

}

</script>

<script type="text/javascript">

function openScript(url, width, height) {
        var Win = window.open(url,"openScript",'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}

</script>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>

<script language="javascript">
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

function field_click(obj) {
		$(obj).format({format:"#,###,###.00", locale:"us"});
		document.getElementById("emolumen").className= "field_edited";
		$(obj).removeClass("field_edited");
		$(obj).addClass("field_active");
	}
	
	
		var hektar = <?= $luas = $pengguna->jumlahluas; ?>;
		var bts = <?= $bts; ?>; 
		var total_perbelanjaan = 0.00;
		
		function field_blur_1(obj,obj_id) {
	
		kos = obj*1; 
		total_perbelanjaan +=kos; 
		
		kos_hektar = kos/hektar; 
		kos_tan = kos/bts;
		
		kos_hektar=bulatkan(kos_hektar);
		kos_tan =bulatkan(kos_tan);
		total_perbelanjaan = bulatkan(kos);
		
			$("#"+ obj_id +"_per_ha").html(kos_hektar);
			$("#"+ obj_id +"_per_ha").format({format:"#,###.00", locale:"us"});
			$("#"+ obj_id +"_per_bts").html(kos_tan);
			$("#"+ obj_id +"_per_bts").format({format:"#,###.00", locale:"us"});
			
						
			document.form1.total_perbelanjaan.value = total_perbelanjaan; 
			$("#total_perbelanjaan").format({format:"#,###.00", locale:"us"});

	$(obj_id).format({format:"#,###.00", locale:"us"}); 
}
</script>

 <style type="text/css">
<!--
.style3 {color: #0000FF}
-->
 </style>
 <form id="form1" name="form1" method="post" action="">
<table class="tableCss" align="center">
  
  <tr>
    <td colspan="3"><b><?=setstring ( 'mal', 'MAKLUMAT  PERBELANJAAN AM', 'en', 'GENERAL EXPENSES INFORMATION'); ?></b></td>
  </tr>
  <tr>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
  <tr>
    <td width="198"><strong><?=setstring ( 'mal', 'Jumlah Keluasan Tanaman', 'en', 'Total Crop Area'); ?></strong></td>
    <td width="422"><strong><span class="style3"><?php $luas = $pengguna->jumlahluas; echo number_format($luas,2); ?></span> <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></strong></td>
    <td> </td>
  </tr>
  <tr>
    <td colspan="2"> </td>
    <td> </td>
  </tr>
  <tr>
    <td colspan="3"><h1><strong><?=setstring ( 'mal', 'Nota : Klik pada butiran kos untuk isi maklumat berkaitan', 'en', 'Notes: Click on cost details to fill the related information'); ?> </strong></h1></td>
    </tr>
  <tr>
    <td colspan="2"> </td>
    <td width="290"> </td>
  </tr>
  <tr>
    <td colspan="3"><table width="106%" cellspacing="0"  frame="box" class="subTable">
      <tr>
        <td height="41" align="center" background="../images/tb_BG.gif"> </td>
        <td background="../images/tb_BG.gif"><b><u><?=setstring ( 'mal', 'Butiran-butiran kos', 'en', 'Cost details'); ?> </u></b></td>
        <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Kos', 'en', 'Cost'); ?></strong></div>          <div align="center"><strong>(RM)</strong></div></td>
        <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></strong></div>
          <div align="center"><strong>(RM)</strong></div></td>
        <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?></strong></div>
          <div align="center"><strong>(RM)</strong></div></td>
        <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Perubahan Kos Per Hektar dengan Tahun Lepas', 'en', 'Cost Different with Last year'); ?></strong></div>          
          <div align="center"><strong> (%)</strong></div></td>
      </tr>
      
      <tr>
        <td width="24" height="37" align="center" bgcolor="#AEFFAE">1.</td>
        <td width="296" bgcolor="#AEFFAE"><a href="javascript:openScript('belanja_am.php?type=emolumen','700','400')"> <?=setstring ( 'mal', 'Emolumen untuk eksekutif dan bukan eksekutif', 'en', 'Executive and non-executive emoluments '); ?></a></td>
        <td width="158" bgcolor="#AEFFAE"><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="emolumen" type="text" readonly="true" autocomplete="off" class="active_field" onclick="field_click(this)"  id="emolumen" value="<?= number_format($belanja->emolumen,2); ?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->emolumen,2); ?>
<?php } ?>
        </div></td>
        <td width="100" bgcolor="#AEFFAE"><div align="center">
         <span id="emolumen_per_ha"><?php $per_ha1 = $belanja->emolumen/$hektar; echo number_format($per_ha1,2); ?></span>
        </div></td>
        <td width="109" bgcolor="#AEFFAE"><div align="center" id="emolumen_per_bts">
          <?php $per_bts1 = $per_ha1/$bts; echo number_format($per_bts1,2); ?>
        </div></td>
        <td width="260" bgcolor="#AEFFAE">
          <div align="center" id="emolumen_per_kos">
           0.00
            </div></td>
      </tr>
      <tr>
        <td height="33" align="center">2.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=kos_ibupejabat','700','400')"><?=setstring ( 'mal', 'Kos ibu pejabat', 'en', 'Headquarters Cost'); ?></a></td>
        <td><div align="center">
         <?php if($_SESSION['view']!="true"){ ?> <input onKeypress="keypress(event)" name="kos_ibupejabat" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="kos_ibupejabat" value="<?= number_format($belanja->kos_ibupejabat,2); ?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->kos_ibupejabat,2); ?>
<?php } ?>
        </div></td>
        <td><div align="center" id="kos_ibupejabat_per_ha"><?php $per_ha2 = $belanja->kos_ibupejabat/$hektar; echo number_format($per_ha2,2); ?></div></td>
        <td><div align="center" id="kos_ibupejabat_per_bts">
 <?php $per_bts2 = $per_ha2/$bts; echo number_format($per_bts2,2); ?>        </div></td>
        <td>
          <div align="center">
            0.00
            </div></td>
      </tr>
      <tr>
        <td height="32" align="center" bgcolor="#AEFFAE">3.</td>
        <td bgcolor="#AEFFAE"  ><a href="javascript:openScript('belanja_am.php?type=kos_agensi','700','400')"><?=setstring ( 'mal', 'Kos agensi dan yuran professional', 'en', 'Agency cost and professional fees'); ?></a></td>
        <td bgcolor="#AEFFAE"><div align="center">
        <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="kos_agensi" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="kos_agensi" value="<?= number_format($belanja->kos_agensi,2); ?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->kos_agensi,2); ?>
<?php } ?>  
        </div></td>
        <td bgcolor="#AEFFAE"><div align="center" id="kos_agensi_per_ha"><?php $per_ha3 = $belanja->kos_agensi/$hektar; echo number_format($per_ha3,2); ?></div></td>
        <td bgcolor="#AEFFAE"><div align="center" id="kos_agensi_per_bts"> <?php $per_bts3 = $per_ha3/$bts; echo number_format($per_bts3,2); ?></div></td>
        <td bgcolor="#AEFFAE">
          <div align="center">
            <?= number_format(($d/$luas),2) ?>
            </div></td>
      </tr>
      <tr>
        <td height="36" align="center">4.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=kebajikan','700','400')"><?=setstring ( 'mal', 'Kebajikan yang tidak dibayar kepada buruh', 'en', 'Unpaid welfare to labour'); ?> </a></td>
        <td><div align="center">
        <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="kebajikan" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="kebajikan" value="<?= number_format($belanja->kebajikan,2); ?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->kebajikan,2); ?>
<?php } ?>    
        </div></td>
        <td><div align="center" id="kebajikan_per_ha"><?php $per_ha4 = $belanja->kebajikan/$hektar; echo number_format($per_ha4,2); ?></div></td>
        <td><div align="center" id="kebajikan_per_bts"> <?php $per_bts4 = $per_ha4/$bts; echo number_format($per_bts4,2); ?>
        </div></td>
        <td><div align="center">
            <?= number_format(($d/$luas),2) ?>
        </div></td>
      </tr>
      <tr bgcolor="#AEFFAE">
        <td height="36" align="center">5.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=sewa_tol','700','400')"><?=setstring ( 'mal', 'Sewa, TOL dan insuran', 'en', 'Rent, TOL and insurance'); ?></a></td>
        <td><div align="center">
      <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="sewa_tol" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="sewa_tol" value="<?= number_format($belanja->sewa_tol,2); ?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->sewa_tol,2); ?>
<?php } ?>    
        </div></td>
        <td><div align="center" id="sewa_tol_per_ha"><?php $per_ha5 = $belanja->sewa_tol/$hektar; echo number_format($per_ha5,2); ?></div></td>
        <td><div align="center" id="sewa_tol_per_bts"> <?php $per_bts5 = $per_ha5/$bts; echo number_format($per_bts5,2); ?>
        </div></td>
        <td>
          <div align="center">
            <?= number_format(($d/$luas),2) ?>
            </div></td>
      </tr>
      <tr>
        <td height="35" align="center">6.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=penyelidikan','700','400')"><?=setstring ( 'mal', 'Penyelidikan dan pembangunan', 'en', 'Research and development'); ?></a></td>
        <td><div align="center">
      <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="penyelidikan" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="penyelidikan" value="<?= number_format($belanja->penyelidikan,2); ?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->penyelidikan,2); ?>
<?php } ?>    
        </div></td>
        <td><div align="center" id="penyelidikan_per_ha"><?php $per_ha6 = $belanja->penyelidikan/$hektar; echo number_format($per_ha6,2); ?></div></td>
        <td><div align="center" id="penyelidikan_per_bts"> <?php $per_bts6= $per_ha6/$bts; echo number_format($per_bts6,2); ?>
        </div></td>
        <td>
          <div align="center">
            <?= number_format(($d/$luas),2) ?>
            </div></td>
      </tr>
      <tr bgcolor="#AEFFAE">
        <td height="36" align="center">7.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=perubatan','700','400')"><?=setstring ( 'mal', 'Perubatan', 'en', 'Medical'); ?></a></td>
        <td><div align="center">
      <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="perubatan" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="perubatan" value="<?= number_format($belanja->perubatan,2); ?>"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->perubatan,2); ?>
<?php } ?>    
        </div></td>
        <td><div align="center" id="perubatan_per_ha"><?php $per_ha7 = $belanja->perubatan/$hektar; echo number_format($per_ha7,2); ?></div></td>
        <td><div align="center" id="perubatan_per_bts" > <?php $per_bts7 = $per_ha7/$bts; echo number_format($per_bts7,2); ?>
        </div></td>
        <td>
          <div align="center">
            <?= number_format(($d/$luas),2) ?>
            </div></td>
      </tr>
      <tr>
        <td height="33" align="center">8.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=penyelenggaraan','700','400')"><?=setstring ( 'mal', 'Penyelenggaraan bangunan', 'en', 'Building maintenance'); ?></a></td>
        <td><div align="center">
      <?php if($_SESSION['view']!="true"){ ?> <input onKeypress="keypress(event)" name="penyelenggaraan" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="penyelenggaraan" value="<?= number_format($belanja->penyelenggaraan,2); ?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->penyelenggaraan,2); ?>
<?php } ?>   
        </div></td>
        <td><div align="center" id="penyelenggaraan_per_ha"><?php $per_ha8 = $belanja->penyelenggaraan/$hektar; echo number_format($per_ha8,2); ?></div></td>
        <td><div align="center" id="penyelenggaraan_per_bts">
         <?php $per_bts8 = $per_ha8/$bts; echo number_format($per_bts8,2); ?>
        </div></td>
        <td>
          <div align="center">
            <?= number_format(($d/$luas),2) ?>
            </div></td>
      </tr>
      <tr bgcolor="#AEFFAE">
        <td height="34" align="center">9.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=cukai_keuntungan','700','400')"><?=setstring ( 'mal', 'Cukai keuntungan luar biasa', 'en', 'Extraordinary profit tax'); ?></a></td>
        <td><div align="center">
        <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="cukai_keuntungan" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="cukai_keuntungan" value="<?= number_format($belanja->cukai_keuntungan,2); ?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->cukai_keuntungan,2); ?>
<?php } ?>  
        </div></td>
        <td><div align="center" id="cukai_keuntungan_per_ha"><?php $per_ha9 = $belanja->cukai_keuntungan/$hektar; echo number_format($per_ha9,2); ?></div></td>
        <td><div align="center" id="cukai_keuntungan_per_bts">
 <?php $per_bts9 = $per_ha9/$bts; echo number_format($per_bts9,2); ?>        </div></td>
        <td>
          <div align="center">
            <?= number_format(($d/$luas),2) ?>
            </div></td>
      </tr>
      <tr>
        <td height="36" align="center">10.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=penjagaan','700','400')"><?=setstring ( 'mal', 'Penjagaan dan pemuliharaan', 'en', 'Upkeep and conservation'); ?></a></td>
        <td><div align="center">
       <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="penjagaan" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="penjagaan" value="<?= number_format($belanja->penjagaan,2); ?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->penjagaan,2); ?>
<?php } ?>   
        </div></td>
        <td><div align="center" id="penjagaan_per_ha"><?php $per_ha10 = $belanja->penjagaan/$hektar; echo number_format($per_ha10,2); ?></div></td>
        <td><div align="center" id="penjagaan_per_bts"> <?php $per_bts10 = $per_ha10/$bts; echo number_format($per_bts10,2); ?>
          
        </div></td>
        <td>
          <div align="center">
            <?= number_format(($d/$luas),2) ?>
            </div></td>
      </tr>
      <tr bgcolor="#AEFFAE">
        <td height="33" align="center">11.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=kawalan','700','400')"><?=setstring ( 'mal', 'Kawalan keselamatan', 'en', 'Security Control'); ?></a></td>
        <td><div align="center">
      <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="kawalan" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="kawalan" value="<?= number_format($belanja->kawalan,2); ?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->kawalan,2); ?>
<?php } ?>    
        </div></td>
        <td><div align="center" id="kawalan_per_ha"><?php $per_ha11 = $belanja->kawalan/$hektar; echo number_format($per_ha11,2); ?></div></td>
        <td><div align="center" id="kawalan_per_bts">
 <?php $per_bts11 = $per_ha11/$bts; echo number_format($per_bts11,2); ?>        </div></td>
        <td>
          <div align="center">
            <?= number_format(($d/$luas),2) ?>
            </div></td>
      </tr>
      <tr>
        <td height="30" align="center">12.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=air_tenaga','700','400')"><?=setstring ( 'mal', 'Air dan tenaga', 'en', 'Water and power'); ?></a></td>
        <td><div align="center">
        <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="air_tenaga" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="air_tenaga" value="<?= number_format($belanja->air_tenaga,2); ?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->air_tenaga,2); ?>
<?php } ?>  
        </div></td>
        <td><div align="center" id="air_tenaga_per_ha"><?php $per_ha12 = $belanja->air_tenaga/$hektar; echo number_format($per_ha12,2); ?></div></td>
        <td><div align="center" id="air_tenaga_per_bts">
 <?php $per_bts12 = $per_ha12/$bts; echo number_format($per_bts12,2); ?>        </div></td>
        <td><div align="center">0.00</div></td>
      </tr>
      <tr bgcolor="#AEFFAE">
        <td height="31" align="center">13.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=perbelanjaan_pejabat','700','400')"><?=setstring ( 'mal', 'Perbelanjaan pejabat', 'en', 'Office expenses'); ?></a></td>
        <td><div align="center">
       <?php if($_SESSION['view']!="true"){ ?> <input onKeypress="keypress(event)" name="perbelanjaan_pejabat" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="perbelanjaan_pejabat" value="<?= number_format($belanja->perbelanjaan_pejabat,2); ?>"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->perbelanjaan_pejabat,2); ?>
<?php } ?>  
        </div></td>
        <td><div align="center" id="perbelanjaan_pejabat_per_ha"><?php $per_ha13 = $belanja->perbelanjaan_pejabat/$hektar; echo number_format($per_ha13,2); ?></div></td>
        <td><div align="center" id="perbelanjaan_pejabat_per_bts">
 <?php $per_bts13 = $per_ha13/$bts; echo number_format($per_bts13,2); ?>        </div></td>
        <td><div align="center">0.00</div></td>
      </tr>
      <tr>
        <td height="31" align="center">14.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=susut_nilai','700','400')"><?=setstring ( 'mal', 'Susutnilai', 'en', 'Value depreciation'); ?></a></td>
        <td><div align="center">
       <?php if($_SESSION['view']!="true"){ ?>  <input onKeypress="keypress(event)" name="susut_nilai" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="susut_nilai" value="<?= number_format($belanja->susut_nilai,2); ?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->susut_nilai,2); ?>
<?php } ?> 
        </div></td>
        <td><div align="center" id="susut_nilai_per_ha"><?php $per_ha14 = $belanja->susut_nilai/$hektar; echo number_format($per_ha14,2); ?></div></td>
        <td><div align="center" id="susut_nilai_per_bts">
           <?php $per_bts14 = $per_ha14/$bts; echo number_format($per_bts14,2); ?>
        </div></td>
        <td><div align="center">0.00</div></td>
      </tr>
      <tr bgcolor="#AEFFAE">
        <td height="31" align="center">15.</td>
        <td><a href="javascript:openScript('belanja_am.php?type=perbelanjaan_lain','700','400')"><?=setstring ( 'mal', 'Perbelanjaan lain', 'en', 'Other expenses'); ?></a></td>
        <td><div align="center">
      <?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="perbelanjaan_lain" type="text" readonly="true" autocomplete="off" onclick="field_click(this)" class="active_field" id="perbelanjaan_lain" value="<?= number_format($belanja->perbelanjaan_lain,2); ?>"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($belanja->perbelanjaan_lain,2); ?>
<?php } ?>    
        </div></td>
        <td><div align="center" id="perbelanjaan_lain_per_ha"><?php $per_ha15 = $belanja->perbelanjaan_lain/$hektar; echo number_format($per_ha15,2); ?></div></td>
        <td><div align="center" id="perbelanjaan_lain_per_bts">
 <?php $per_bts15 = $per_ha15/$bts; echo number_format($per_bts15,2); ?>        </div></td>
        <td><div align="center">0.00</div></td>
      </tr>
      <tr>
        <td height="17" align="center"> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
      </tr>
      <tr>
        <td height="31" align="center"> </td>
        <td><div align="right"><strong><?=setstring ( 'mal', 'Jumlah :', 'en', 'Total'); ?> </strong></div></td>
        <td bgcolor="#FFCC66"><div align="center">
        <?php $total_belanja_all = $belanja->emolumen + $belanja->kos_ibupejabat+ $belanja->kos_agensi + $belanja->kebajikan+ $belanja->sewa_tol+ $belanja->penyelidikan+ $belanja->perubatan+ $belanja->penyelenggaraan+ $belanja->cukai_keuntungan+ $belanja->penjagaan+  $belanja->kawalan + $belanja->air_tenaga + $belanja->perbelanjaan_pejabat+ $belanja->susut_nilai + $belanja->perbelanjaan_lain; ?>
		<?php if($_SESSION['view']!="true"){ ?><input onKeypress="keypress(event)" name="total_perbelanjaan" type="text" readonly="true" autocomplete="off" id="total_perbelanjaan"  style="font-weight:bold; text-align:center" value="<?php echo number_format($total_belanja_all,2);
		   //number_format($belanja->total_perbelanjaan,2); ?>" size="15"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php echo number_format($total_belanja_all,2);
		   //number_format($belanja->total_perbelanjaan,2); ?>
<?php } ?>  
        </div></td>
        <td bgcolor="#FFCC66"><div align="center">
		<?php  $total_kos_hektar = $per_ha1+$per_ha2+$per_ha3+$per_ha4+$per_ha5+$per_ha6+$per_ha7+$per_ha8+$per_ha9+$per_ha10+$per_ha11+$per_ha12+$per_ha13+$per_ha14+$per_ha15; 
		echo number_format($total_kos_hektar,2);
		?>
		</div></td>
        <td bgcolor="#FFCC66"><div align="center">
  <?php $total_bts_all = $per_bts1+$per_bts2+$per_bts3+$per_bts4+$per_bts5+$per_bts6+$per_bts7+$per_bts8+$per_bts9+$per_bts10+$per_bts11+$per_bts12+$per_bts13+$per_bts14+$per_bts15; echo number_format($total_bts_all,2);?>        </div></td>
        <td bgcolor="#FFCC66">
          <div align="center"><strong>
		0.00
            </strong></div></td>
      </tr>
      <tr>
        <td height="17" align="center"> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
      </tr>
      
      
    </table></td>
  </tr>
    
  
  <tr>
    <td colspan="3">
      <div align="center">
        <input name="thisyear" type="hidden" id="thisyear" value="<?= $_COOKIE['tahun_report']; ?>" />
        <input name="type" type="hidden" id="type" value="pengangkutan" />
        <?php
		  	if(isset($_GET['print'])) {
		  ?>
        <input type="submit" value="Print" />
        <?php
		   }
		   else {
		  ?><div id="no-print">
      <?php if($_SESSION['view']!="true"){ ?> <input type="button" name="button2" id="button2" value="<?=setstring ( 'mal', 'Simpan Sementara', 'en', 'Save Temporarily'); ?>" onclick="hantar(2);" />
        <input type="button" name="button" id="button" value="<?=setstring ( 'mal', 'Simpan & Sahkan', 'en', 'Save and Verify'); ?>" onclick="hantar(1);" />
<?php } ?>

		<input name="cetak" type="button" value="<?=setstring ( 'mal', 'Cetak', 'en', 'Print'); ?>" onclick="window.print()" /></div>
        <?php
			}
			?>
      </div></td>
  </tr>
  <tr>
    <td colspan="3"> </td>
  </tr>
</table>
</form> 
