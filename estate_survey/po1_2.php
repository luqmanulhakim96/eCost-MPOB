<?php
/*
 *      Filename: estate/po1_2.php
 *      Copyright 2010 Malaysia Palm Oil Board <azman@mpob.gov.my>
 *		Last update: 15.10.2010 11:46:16 am
 */
	$var = "";
	if(isset($_GET['pekerja']))
		$var = "po1_2&jentera=true";
	else
		$var = "po1year";

	$pu[0]=$_SESSION['lesen'];
	$pu[1]=$_COOKIE['tahun_report'];

	$buruh = new user('buruh',$pu);
	$buruh->total;
	if($buruh->total==0)
	{
		$con = connect();
		$q ="INSERT INTO buruh (lesen,tahun) VALUES ('".$pu[0]."','".$pu[1]."')";
		$r=mysql_query($q,$con);
		
		$s = "SELECT * FROM warga_estate WHERE lesen ='".$_SESSION['lesen']."' AND tahun ='".$_COOKIE['tahun_report']."'";
		$t = mysql_query($s,$con);
	}

	$jentera = new user('','');
	$mandur_penuai_total = $t;
?>

<link rel="stylesheet" href="../text_style.css" type="text/css" />
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>
<script type="text/javascript">
	function dah_edit(val) {
		var alphaExp = /^[a-zA-Z]+$/;
		if(val.value.match(alphaExp)) {
			$(val).addClass('wrong_input');
		}
		else {
			$(val).addClass('edited_input');
			//$(val).format({format:"#,###.00", locale:"us"}); 
		}
	}
	$(function() {
	$("#single4").hide();
	$("#single6").hide();
	});
	
	function sembunyi(val) {
		if(val.value == 'kumpulan') {
			$("#single1").hide('slow');
			$("#single2").hide('slow');
			$("#single3").hide('slow');
			$("#single5").hide('slow');
			$("#single4").show('slow');
			$("#single6").show('slow');
		}
		if(val.value == 'penuai') {
			$("#single1").show('slow');
			$("#single2").show('slow');
			$("#single3").show('slow');
			$("#single5").show('slow');
			$("#single4").hide('slow');
			$("#single6").hide('slow');
		}
	}
</script>
<script type="text/javascript">
// pembajaan
no_me=0;
function add_byr()
{
	no_me++;
	document.getElementById(no_me).className="show";
}

// kawalan penyakit
no_tuait=0;
function add_tuait(x)
{
	no_tuait++;
	document.getElementById(x+no_tuait).className="show";
}

no_tuai=0;
function add_tuai(x)
{
	no_tuai++;
	document.getElementById(x+no_tuai).className="show";
}

// meracun
no_racun=0;
function add_racun(x)
{
	no_racun++;
	document.getElementById(x+no_racun).className="show";
}

// pengutipan buah relai
no_kutip=0;
function add_kutip(x)
{
	
	no_kutip++;
	//alert(no_kutip);
	document.getElementById(x+no_kutip).className="show";
}

// BTS ke
no_punggah=0;
function add_punggah(x)
{
	no_punggah++;
	document.getElementById(x+no_punggah).className="show";
}

// BTS dari
no_angkut=0;
function add_angkut(x)
{
	no_angkut++;
	document.getElementById(x+no_angkut).className="show";
}

function tukar_field(x,y)
{	
	if(x=="Lain-lain")
	{
		document.getElementById(y).className="show";
		document.getElementById(y).focus();
	}
	if(x!="Lain-lain")
	{
		document.getElementById(y).className="hide";
	}
}
</script>

<script type="text/javascript">
function openScript(url, width, height) {
    var Win = window.open(url,"openScript",'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}
</script>

<style type="text/css">
	.hide{
		display:none;
	}
	.show{
		display:normal;

	}
	.style6{
		background-color:#CCCCCC; 
		text-align:center; 
		font-weight:bold; 
		border:hidden 
	}
</style>
<script language="javascript">
function kira(obj,nilai,total_nilai,nilai_asal)
{
	if(number_only(obj)) {
	total_nilai_baru = document.getElementById(total_nilai).value;
	total_nilai_baru = total_nilai_baru.replace(",","");
	
	nilai_obj = obj.value;
	nilai_obj = nilai_obj.replace(",","");
	
	total_nilai_baru = Number(total_nilai_baru)+ Number(nilai_obj)-Number(nilai_asal);
	total_nilai_baru = bulatkan(total_nilai_baru);
	
	$(obj).format({format:"#,###", locale:"us"});
	document.getElementById(total_nilai).value=total_nilai_baru; 
	$("#"+total_nilai).format({format:"#,###", locale:"us"});
	
	$(obj).removeClass("active_input");
	$(obj).addClass("field_edited");
	}
}

function tukar_format(obj)
{
	if(number_only(obj)) {
		$(obj).format({format:"#,###.00", locale:"us"});
	} 
}

function tukar_format2(obj)
{
	if(number_only(obj)) {
		$(obj).format({format:"#,###", locale:"us"});
	} 
}
</script>
<script language="javascript">
function hantar(x,y)
{
	document.form1.action = "save_buruh.php?status="+x+"&simpanstatus="+y;
	document.form1.target = "_parent";
	document.form1.submit();
}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$(".warga").colorbox();
	});
</script>
<!--<script language="javascript">
var pitmid = false;
	window.onbeforeunload=function() {
		if(pitmid == false)
			var ok = confirm("<?=setstring ( 'mal', 'Simpan sebelum keluar?', 'en', 'Save before proceed?'); ?>");
				if(ok == true){
					document.form1.action='save_buruh.php?status=<?= $nilai->status; ?>';
					document.form1.submit();
				}
	}
</script>-->
<form id="form1" name="form1" method="post" action="home.php?id=buruh">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td colspan="2"><div style="text-align:center;"><h2><?=setstring ( 'mal', 'Bilangan Pekerja Mengikut Kategori', 'en', 'Number of workers according to work categories'); ?></h2></div></td>
  </tr>
  <tr>
    <td colspan="2"><div id="no-print" style="text-align:center; text-decoration:blink;"><h1><strong><?=setstring ( 'mal', 'Arahan : Sila klik <img src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /> untuk masukkan data', 'en', 'Instruction : Click <img src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /> to insert data'); ?>
 </strong></h1></div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="90%" align="center" cellspacing="0" frame="box"  class="tableCss">
      
      <tr align="center">
        <td width="218" rowspan="2" valign="middle" background="../images/tb_BG.gif" bgcolor="#A5BEE0"><b><?=setstring ( 'mal', 'Kategori Kerja', 'en', 'Work category'); ?>
</b></td>
        <td height="37" colspan="2" background="../images/tb_BG.gif" bgcolor="#CCD8E6" ><b><?=setstring ( 'mal', 'Bilangan Pekerja Dibayar oleh Estet', 'en', 'Paid directly by estate'); ?>
</b><br/></td>
        <td colspan="2" background="../images/tb_BG.gif" bgcolor="#CCD8E6"><b><?=setstring ( 'mal', 'Bilangan Pekerja Dibayar oleh Kontraktor', 'en', 'Paid by contractors' ) ?> </b><br/></td>
      </tr>
      <tr align="center">
        <td bgcolor="#99FF99"><b><?=setstring ( 'mal', 'Tempatan', 'en', 'Local'); ?>
</b></td>
        <td bgcolor="#FFFFCC"><b><?=setstring ( 'mal', 'Asing', 'en', 'Foreign'); ?>
</b></td>
        <td bgcolor="#99FF99"><b><?=setstring ( 'mal', 'Tempatan', 'en', 'Local'); ?>
</b></td>
        <td bgcolor="#FFFFCC"><b><?=setstring ( 'mal', 'Asing', 'en', 'Foreign'); ?>
</b></td>
      </tr>
      <tr align="center">
        <td  height="34" bgcolor="#FFCCFF"><div align="left"><?=setstring ( 'mal', 'Mandur penuai', 'en', 'Harvesting mandore'); ?>
</div></td>
        <td  bgcolor="#99FF99">
          <?php if($_SESSION['view']!="true"){ ?><input name="mpe_t" type="text" class="field_active" id="mpe_t" onchange="kira(this, this.value,'total_mt','<?= $buruh->mandur_penuai_tempatan;?>')" value="<?= number_format($buruh->mandur_penuai_tempatan);?>" onKeypress="keypress(event)" size="11" readonly="true"/>
  <a href="warga.php?type=LOCAL&amp;field=mandur_penuai_tempatan" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->mandur_penuai_tempatan);?>
<?php } ?>
        </td>
        <td  bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?> <input name="mpe_a" type="text" class="field_active" id="mpe_a" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_ma','<?= $buruh->mandur_penuai_asing;?>')" value="<?= number_format($buruh->mandur_penuai_asing);?>"  size="11" readonly="true"/>
          <a href="warga.php?type=FOREIGN&amp;field=mandur_penuai_asing" class="warga"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
		  <?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->mandur_penuai_asing);?>
<?php } ?>
       
</td>
        <td  bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?> <input name="mpk_t" type="text" class="field_active" id="mpk_t" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_mtk','<?= $buruh->mandur_penuai_k_tempatan; ?>')" value="<?= number_format($buruh->mandur_penuai_k_tempatan);?>"  size="11" readonly="true">
      <a class="warga" href="warga.php?type=LOCAL&amp;field=mandur_penuai_k_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->mandur_penuai_k_tempatan);?>
<?php } ?>
       
    </td>
        <td  bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>  <input name="mpk_a" type="text" class="field_active" id="mpk_a" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_mak','<?= $buruh->mandur_penuai_k_asing?>')" value="<?= number_format($buruh->mandur_penuai_k_asing);?>"  size="11" readonly="true"/>
          <a class="warga" href="warga.php?type=FOREIGN&amp;field=mandur_penuai_k_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->mandur_penuai_k_asing);?>
<?php } ?>
      
</td>
      </tr>
      <tr align="center">
        <td height="33" bgcolor="#FFCCFF"><div align="left"> <?=setstring ( 'mal', 'Mandur am', 'en', 'General mandore'); ?>
</div></td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?><input name="mae_t" type="text" class="field_active" id="mae_t" onchange="kira(this, this.value,'total_mt','<?= $buruh->mandur_am_tempatan;?>')" value="<?= number_format($buruh->mandur_am_tempatan);?>" onKeypress="keypress(event)" size="11" readonly="true"/>
          <a href="warga.php?type=LOCAL&amp;field=mandur_am_tempatan" class='warga'><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->mandur_am_tempatan);?>
<?php } ?>
        
</td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?><input name="mea_a" type="text" class="field_active" id="mea_a" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_ma','<?= $buruh->mandur_am_asing;?>')" value="<?= number_format($buruh->mandur_am_asing);?>"  size="11" readonly="true"/>
  <a class='warga' href="warga.php?type=FOREIGN&amp;field=mandur_am_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->mandur_am_asing);?>
<?php } ?>
        
        </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?><input name="mak_t" type="text" class="field_active" id="mak_t" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_mtk','<?= $buruh->mandur_am_k_tempatan;?>')" value="<?= number_format($buruh->mandur_am_k_tempatan);?>"  size="11" readonly="true"/>
          <a class='warga' href="warga.php?type=LOCAL&amp;field=mandur_am_k_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->mandur_am_k_tempatan);?>
<?php } ?>
        
</td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?><input name="mak_a" type="text" class="field_active" id="mak_a" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_mak','<?= $buruh->mandur_am_k_asing?>')" value="<?= number_format($buruh->mandur_am_k_asing);?>"  size="11" readonly="true"/>
          <a class='warga' href="warga.php?type=FOREIGN&amp;field=mandur_am_k_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->mandur_am_k_asing);?>
<?php } ?>
        
</td>
      </tr>
      <tr align="center">
        <td height="29" bgcolor="#FFCCFF"><div align="left"><b> <?=setstring ( 'mal', 'Jumlah kecil', 'en', 'Sub-total'); ?>
</b></div></td>
        <td bgcolor="#99FF99"><div align="center" id="sum_tempatan_e">
         
         <?php if($_SESSION['view']!="true"){ ?> <input name="total_mt" type="text" class="style6"  id="total_mt" onKeypress="keypress(event)" value="<?php $jmt= $buruh->mandur_penuai_tempatan+$buruh->mandur_am_tempatan; echo number_format($jmt);?>"  size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php $jmt= $buruh->mandur_penuai_tempatan+$buruh->mandur_am_tempatan; echo number_format($jmt);?>
<?php } ?>
         
        </div></td>
        <td bgcolor="#FFFFCC"><div align="center" id="sum_asing_e">
         
         <?php if($_SESSION['view']!="true"){ ?> <input name="total_ma" type="text" class="style6" id="total_ma" onkeypress="keypress(event)" value="<?php $jma = $buruh->mandur_penuai_asing+$buruh->mandur_am_asing;echo number_format($jma);?>" size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php $jma = $buruh->mandur_penuai_asing+$buruh->mandur_am_asing;echo number_format($jma);?>
<?php } ?>
         
        </div></td>
        <td bgcolor="#99FF99"><div align="center" id="sum_tempatan_k">
         <?php if($_SESSION['view']!="true"){ ?> <input name="total_mtk" type="text" class="style6" onKeypress="keypress(event)" id="total_mtk" value="<?php $jmkt = $buruh->mandur_penuai_k_tempatan+$buruh->mandur_am_k_tempatan; echo number_format($jmkt);?>" size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php $jmkt = $buruh->mandur_penuai_k_tempatan+$buruh->mandur_am_k_tempatan; echo number_format($jmkt);?>
<?php } ?>

        </div></td>
        <td bgcolor="#FFFFCC"><div align="center" id="sum_asing_k">
         
         <?php if($_SESSION['view']!="true"){ ?>     <input name="total_mak" type="text" class="style6"  id="total_mak" onKeypress="keypress(event)" value="<?php $jmka = $buruh->mandur_am_k_tempatan+$buruh->mandur_am_k_asing; echo number_format($jmka);?>" size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php $jmka = $buruh->mandur_am_k_tempatan+$buruh->mandur_am_k_asing; echo number_format($jmka);?>
<?php } ?>
     
        </div></td>
      </tr>
      <tr align="center" >
        <td height="29" bgcolor="#FFCCFF"><div align="left"><b><?=setstring ( 'mal', 'Kekurangan', 'en', 'Shortage'); ?>
</b></div></td>
        <td colspan="2" bgcolor="#FFCC66">
        <?php if($_SESSION['view']!="true"){ ?>  <input type="text" class="active_input" name="kekurangan_mandur" onKeypress="keypress(event)" size="11" id="kekurangan_mandur" value="<?= number_format($buruh->kekurangan_mandur_estet);?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kekurangan_mandur_estet);?>
<?php } ?>
      </td>
        <td colspan="2" bgcolor="#FFCC66">
        <?php if($_SESSION['view']!="true"){ ?><input type="text" class="active_input" name="kekurangan_mandur_k" onKeypress="keypress(event)" size="11" id="kekurangan_mandur_k" value="<?= number_format($buruh->kekurangan_mandur_kontraktor);?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kekurangan_mandur_kontraktor);?>
<?php } ?>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="90%" align="center" cellspacing="0"  frame="box"  class="tableCss">
      <tr align="center" >
        <td colspan="5">&nbsp;</td>
        </tr>
      <tr align="center" id="single5" >
        <td width="218" height="32" bgcolor="#FFCCFF"><div align="left">
		<select style="border:1px #FF6600 solid; font-size:12px; font-family:Arial, Helvetica, sans-serif;" onchange="sembunyi(this)">			         <option selected="selected" value="penuai"><?=setstring ( 'mal', 'Penuai', 'en', 'Harvester'); ?>
</option>
		<option value="kumpulan"><?=setstring ( 'mal', 'Penuai Berkumpulan', 'en', 'Group of harvesters'); ?>
</option>
        </select></div></td>
        <td  bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?><input name="penuai_t" type="text" class="field_active" id="penuai_t" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pt','<?= $buruh->penuai_tempatan;?>')" value="<?= number_format($buruh->penuai_tempatan);?>"  size="11" readonly="true"/>
        <a class='warga' href="warga.php?type=LOCAL&amp;field=penuai_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a> <?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_tempatan);?>
<?php } ?>
        
  </td>
        <td  bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?><input name="penuai_a" type="text" class="field_active" id="penuai_a" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pa','<?= $buruh->pemungut_buahrelai_tempatan?>')" value="<?= number_format($buruh->penuai_asing);?>"  size="11" readonly="true"/>
<a class='warga' href="warga.php?type=FOREIGN&amp;field=penuai_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_asing);?>
<?php } ?>
        
          </td>
        <td  bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?> <input name="penuai_tk" type="text" class="field_active" id="penuai_tk" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_ptk','<?= $buruh->penuai_tempatan_kontraktor;?>')" value="<?= number_format($buruh->penuai_tempatan_kontraktor);?>"  size="11" readonly="true"/>
  <a class='warga' href="warga.php?type=LOCAL&amp;field=penuai_tempatan_kontraktor"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_tempatan_kontraktor);?>
<?php } ?>
       
        </td>
        <td  bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>  <input name="penuai_ak" type="text" class="field_active" id="penuai_ak" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pak','<?= $buruh->penuai_asing_kontraktor;?>')" value="<?= number_format($buruh->penuai_asing_kontraktor);?>"  size="11" readonly="true"/>
     <a class='warga' href="warga.php?type=FOREIGN&amp;field=penuai_asing_kontraktor"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_asing_kontraktor);?>
<?php } ?>
      
     </td>
      </tr>
      
      <tr align="center" id="single4" >
        <td width="218" height="32" bgcolor="#FFCCFF"><div align="left">
		<select style="border:1px #FF6600 solid; font-size:12px; font-family:Arial, Helvetica, sans-serif;" onchange="sembunyi(this)">			         <option  value="penuai"><?=setstring ( 'mal', 'Penuai', 'en', 'Harvester'); ?></option>
		<option selected="selected" value="kumpulan"><?=setstring ( 'mal', 'Penuai Berkumpulan', 'en', 'Group of harvesters'); ?></option>
        </select></div></td>
        <td width="171" bgcolor="#99FF99"> 
        <?php if($_SESSION['view']!="true"){ ?>  <input name="penuai_t_kumpulan" type="text" class="field_active" id="penuai_t_kumpulan"  onchange="kira(this, this.value,'total_pt_kumpulan','<?= $buruh->penuai_kumpulan_tempatan;?>')" value="<?= number_format($buruh->penuai_kumpulan_tempatan);?>" onKeypress="keypress(event)" size="11" readonly="true"/>
       <a class='warga' href="warga.php?type=LOCAL&amp;field=penuai_kumpulan_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_kumpulan_tempatan);?>
<?php } ?>
      
    </td>
        <td width="156" bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?> <input name="penuai_a_kumpulan" type="text" class="field_active" id="penuai_a_kumpulan"  onchange="kira(this, this.value,'total_pa_kumpulan','<?= $buruh->penuai_kumpulan_asing;?>')" value="<?= number_format($buruh->penuai_kumpulan_asing);?>" onKeypress="keypress(event)" size="11" readonly="true"/>
         <a class='warga' href="warga.php?type=FOREIGN&amp;field=penuai_kumpulan_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_kumpulan_asing);?>
<?php } ?>
       
 </td>
        <td width="161" bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?> <input name="penuai_tk_kumpulan" type="text" class="field_active" id="penuai_tk_kumpulan"  onchange="kira(this, this.value,'total_ptk_kumpulan','<?= $buruh->penuai_kumpulan_tempatan_kontraktor;?>')" value="<?= number_format($buruh->penuai_kumpulan_tempatan_kontraktor);?>" onKeypress="keypress(event)" size="11" readonly="true"/>
     <a class='warga' href="warga.php?type=LOCAL&amp;field=penuai_kumpulan_tempatan_kontraktor"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_kumpulan_tempatan_kontraktor);?>
<?php } ?>
       
     </td>
        <td width="147" bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?> <input name="penuai_ak_kumpulan" type="text" class="field_active" id="penuai_ak_kumpulan"  onchange="kira(this, this.value,'total_pak_kumpulan','<?= $buruh->penuai_kumpulan_asing_kontraktor;?>')" value="<?= number_format($buruh->penuai_kumpulan_asing_kontraktor);?>" onKeypress="keypress(event)" size="11" readonly="true"/>
 <a class='warga' href="warga.php?type=FOREIGN&amp;field=penuai_kumpulan_asing_kontraktor"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_kumpulan_asing_kontraktor);?>
<?php } ?>
       
         </td>
      </tr>
      <tr align="center" id="single1">
        <td height="31" bgcolor="#FFCCFF"><div align="left"><?=setstring ( 'mal', 'Pemungut BTS', 'en', 'FFB Collector'); ?>
</div></td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?><input name="pbts_t" type="text" class="field_active" id="pbts_t" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pt','<?= $buruh->pemungut_bts_tempatan;?>')" value="<?= number_format($buruh->pemungut_bts_tempatan);?>"  size="11" readonly="true"/>
       <a class='warga' href="warga.php?type=LOCAL&amp;field=pemungut_bts_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pemungut_bts_tempatan);?>
<?php } ?>
        
   </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>     <input name="pbts_a" type="text" class="field_active" id="pbts_a" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pa','<?= $buruh->pemungut_bts_asing;?>')" value="<?= number_format($buruh->pemungut_bts_asing);?>"  size="11" readonly="true"/>
         <a class='warga' href="warga.php?type=FOREIGN&amp;field=pemungut_bts_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pemungut_bts_asing);?>
<?php } ?>
   
 </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>   <input name="pbts_tk" type="text" class="field_active" id="pbts_tk" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_ptk','<?= $buruh->pemungut_bts_tempatan_kontraktor;?>')" value="<?= number_format($buruh->pemungut_bts_tempatan_kontraktor);?>"  size="11" readonly="true"/>
<a class='warga' href="warga.php?type=LOCAL&amp;field=pemungut_bts_tempatan_kontraktor"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pemungut_bts_tempatan_kontraktor);?>
<?php } ?>
     
          </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>  <input name="pbts_ak" type="text" class="field_active" id="pbts_ak" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pak','<?= $buruh->pemungut_bts_asing_kontraktor;?>')" value="<?= number_format($buruh->pemungut_bts_asing_kontraktor);?>"  size="11" readonly="true"/>
<a class='warga' href="warga.php?type=FOREIGN&amp;field=pemungut_bts_asing_kontraktor"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pemungut_bts_asing_kontraktor);?>
<?php } ?>
      
          </td>
      </tr>
      <tr align="center" id="single2">
        <td height="31" bgcolor="#FFCCFF"><div align="left"><?=setstring ( 'mal', 'Pemungut buah relai', 'en', 'Loose fruit Collector'); ?>
</div></td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>  <input name="pbr_t" type="text" class="field_active" id="pbr_t" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pt','<?= $buruh->pemungut_buahrelai_tempatan;?>')" value="<?= number_format($buruh->pemungut_buahrelai_tempatan);?>"  size="11" readonly="true"/>
  <a class='warga' href="warga.php?type=LOCAL&amp;field=pemungut_buahrelai_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pemungut_buahrelai_tempatan);?>
<?php } ?>
      
        </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?> <input name="pbr_a" type="text" class="field_active" id="pbr_a" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pa','<?= $buruh->pemungut_buahrelai_asing;?>')" value="<?= number_format($buruh->pemungut_buahrelai_asing);?>"  size="11" readonly="true"/>
   <a class='warga' href="warga.php?type=FOREIGN&amp;field=pemungut_buahrelai_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pemungut_buahrelai_asing);?>
<?php } ?>
       
       </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>        <input name="pbr_t" type="text" class="field_active" id="pbr_t" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_ptk','<?= $buruh->pemungut_buahrelai_tempatan_kontraktor;?>')" value="<?= number_format($buruh->pemungut_buahrelai_tempatan_kontraktor);?>"  size="11" readonly="true"/>
 <a class='warga' href="warga.php?type=LOCAL&amp;field=pemungut_buahrelai_tempatan_kontraktor"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pemungut_buahrelai_tempatan_kontraktor);?>
<?php } ?>

         </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?> <input name="pbr_ak" type="text" class="field_active" id="pbr_ak" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pak','<?= $buruh->pemungut_buahrelai_asing_kontraktor;?>')" value="<?= number_format($buruh->pemungut_buahrelai_asing_kontraktor);?>"  size="11" readonly="true"/><a class='warga' href="warga.php?type=FOREIGN&amp;field=pemungut_buahrelai_asing_kontraktor"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pemungut_buahrelai_asing_kontraktor);?>
<?php } ?>
       
          </td>
      </tr>
      <tr align="center" id="single3">
        <td height="31" bgcolor="#FFCCFF"><div align="left"><b><?=setstring ( 'mal', 'Jumlah kecil', 'en', 'Sub-total'); ?></b></div></td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?> <input name="total_pt" type="text" class="style6" onKeypress="keypress(event)" id="total_pt"  value="<?= number_format($buruh->penuai_tempatan+$buruh->pemungut_bts_tempatan+$buruh->pemungut_buahrelai_tempatan);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_tempatan+$buruh->pemungut_bts_tempatan+$buruh->pemungut_buahrelai_tempatan);?>
<?php } ?>
       </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?><input name="total_pa" type="text" class="style6" onKeypress="keypress(event)" id="total_pa"  value="<?= number_format($buruh->penuai_asing+$buruh->pemungut_bts_asing+$buruh->pemungut_buahrelai_asing);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_asing+$buruh->pemungut_bts_asing+$buruh->pemungut_buahrelai_asing);?>
<?php } ?>
        </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?><input name="total_ptk" type="text" class="style6" onKeypress="keypress(event)" id="total_ptk"  value="<?= number_format($buruh->penuai_tempatan_kontraktor+$buruh->pemungut_bts_tempatan_kontraktor+ $buruh->pemungut_buahrelai_tempatan_kontraktor);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_tempatan_kontraktor+$buruh->pemungut_bts_tempatan_kontraktor+ $buruh->pemungut_buahrelai_tempatan_kontraktor);?>
<?php } ?>
        </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?><input name="total_pak" type="text" class="style6" onKeypress="keypress(event)" id="total_pak"  value="<?= number_format($buruh->penuai_asing_kontraktor+$buruh->pemungut_bts_asing_kontraktor+$buruh->pemungut_buahrelai_asing_kontraktor);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_asing_kontraktor+$buruh->pemungut_bts_asing_kontraktor+$buruh->pemungut_buahrelai_asing_kontraktor);?>
<?php } ?>
        </td>
      </tr>
	  
	  <tr align="center" id="single6">
        <td height="31" bgcolor="#FFCCFF"><div align="left"><b><?=setstring ( 'mal', 'Jumlah kecil', 'en', 'Sub-total'); ?></b></div></td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?><input name="total_pt_kumpulan" type="text" class="style6" onKeypress="keypress(event)" id="total_pt_kumpulan"  value="<?= number_format($buruh->penuai_kumpulan_tempatan);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_kumpulan_tempatan);?>
<?php } ?>
        </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>   <input name="total_pa_kumpulan" type="text" class="style6" onKeypress="keypress(event)" id="total_pa_kumpulan"  value="<?= number_format($buruh->penuai_kumpulan_asing);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_kumpulan_asing);?>
<?php } ?>
     </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>  <input name="total_ptk_kumpulan" type="text" class="style6" onKeypress="keypress(event)" id="total_ptk_kumpulan"  value="<?= number_format($buruh->penuai_kumpulan_tempatan_kontraktor);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_kumpulan_tempatan_kontraktor);?>
<?php } ?>
      </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?><input name="total_pak_kumpulan" type="text" class="style6" onKeypress="keypress(event)" id="total_pak_kumpulan"  value="<?= number_format($buruh->penuai_kumpulan_asing_kontraktor);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->penuai_kumpulan_asing_kontraktor);?>
<?php } ?>
        </td>
      </tr>
      <tr align="center">
        <td height="31" bgcolor="#FFCCFF"><div align="left"><b><?=setstring ( 'mal', 'Kekurangan', 'en', 'Shortage'); ?>
</b></div></td>
        <td colspan="2" bgcolor="#FFCC66">
        <?php if($_SESSION['view']!="true"){ ?> <input type="text" class="active_input" name="kekurangan_pemungut" onKeypress="keypress(event)" size="11" id="kekurangan_pemungut" value="<?= number_format($buruh->kekurangan_penuai_estet);?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kekurangan_penuai_estet);?>
<?php } ?>
       </td>
        <td colspan="2" bgcolor="#FFCC66">
        
        <?php if($_SESSION['view']!="true"){ ?> <input type="text" class="active_input" name="kekurangan_pemungut_k" onKeypress="keypress(event)" size="11" id="kekurangan_pemungut_k" value="<?= number_format($buruh->kekurangan_penuai_kontraktor);?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kekurangan_penuai_kontraktor);?>
<?php } ?>
        
       </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="90%" align="center" cellspacing="0"  frame="box"  class="tableCss" >
      <tr align="center">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center">
        <td width="218" height="37" bgcolor="#FFCCFF"><div align="left"><?=setstring ( 'mal', 'Pekerja estet', 'en', 'Estate Worker'); ?>
</div></td>
        <td  bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="pestet_t"  size="11" id="pestet_t" value="<?= number_format($buruh->pekerja_estet_tempatan);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pekerja_t','<?= $buruh->pekerja_estet_tempatan;?>')"/>
          <a class='warga' href="warga.php?type=LOCAL&amp;field=pekerja_estet_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pekerja_estet_tempatan);?>
<?php } ?>
        </td>
        <td  bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>    <input type="text" class="field_active" name="pestet_a"  size="11" id="pestet_a" value="<?= number_format($buruh->pekerja_estet_asing);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pekerja_a','<?= $buruh->pekerja_estet_asing;?>')"/>
          <a class='warga' href="warga.php?type=FOREIGN&amp;field=pekerja_estet_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pekerja_estet_asing);?>
<?php } ?>
    </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>       <input type="text" class="field_active" name="pestet_tk"  size="11" id="pestet_tk" value="<?= number_format($buruh->pekerja_estet_k_tempatan);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pekerja_tk','<?= $buruh->pekerja_estet_k_tempatan;?>')"/>
          <a class='warga' href="warga.php?type=LOCAL&amp;field=pekerja_estet_k_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pekerja_estet_k_tempatan);?>
<?php } ?>
 </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>     <input type="text" class="field_active" name="pestet_ak"  size="11" id="pestet_ak" value="<?= number_format($buruh->pekerja_estet_k_asing);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pekerja_ak','<?= $buruh->pekerja_estet_k_asing;?>')"/>
          <a class='warga' href="warga.php?type=FOREIGN&amp;field=pekerja_estet_k_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pekerja_estet_k_asing);?>
<?php } ?>
   </td>
      </tr>
      <tr align="center">
        <td height="32" bgcolor="#FFCCFF"><div align="left"><?=setstring ( 'mal', 'Pekerja am lain', 'en', 'Other General worker'); ?>
</div></td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>        <input type="text" class="field_active" name="pam_t"  size="11" id="pam_t" value="<?= number_format($buruh->pekerja_am_tempatan);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pekerja_t','<?= $buruh->pekerja_am_tempatan;?>')"/>
          <a class='warga' href="warga.php?type=LOCAL&amp;field=pekerja_am_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pekerja_am_tempatan);?>
<?php } ?>
</td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>      <input type="text" class="field_active" name="pam_a"  size="11" id="pam_a" value="<?= number_format($buruh->pekerja_am_asing);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pekerja_a','<?= $buruh->pekerja_am_asing;?>')"/>
          <a class='warga' href="warga.php?type=FOREIGN&amp;field=pekerja_am_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pekerja_am_asing);?>
<?php } ?>
  </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>       <input type="text" class="field_active" name="pam_tk"  size="11" id="pam_tk" value="<?= number_format($buruh->pekerja_am_k_tempatan);?>"  onchange="kira(this, this.value,'total_pekerja_tk','<?= $buruh->pekerja_am_k_tempatan;?>')"/>
          <a class='warga' href="warga.php?type=LOCAL&amp;field=pekerja_am_k_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pekerja_am_k_tempatan);?>
<?php } ?>
        
</td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>    <input type="text" class="field_active" name="pam_ak"  size="11" id="pam_ak" value="<?= number_format($buruh->pekerja_am_k_asing);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_pekerja_ak','<?= $buruh->pekerja_am_k_asing;?>')"/>
          <a class='warga' href="warga.php?type=FOREIGN&amp;field=pekerja_am_k_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->pekerja_am_k_asing);?>
<?php } ?>
    </td>
      </tr>
      <tr align="center">
        <td height="36" bgcolor="#FFCCFF"><div align="left"><b><?=setstring ( 'mal', 'Jumlah kecil', 'en', 'Sub-total'); ?></b></div></td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>  <input name="total_pekerja_t" type="text" class="style6" onKeypress="keypress(event)" id="total_pekerja_t"  value="<?php $jpt=$buruh->pekerja_estet_tempatan+$buruh->pekerja_am_tempatan; echo number_format($jpt);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php $jpt=$buruh->pekerja_estet_tempatan+$buruh->pekerja_am_tempatan; echo number_format($jpt);?>
<?php } ?>
      </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?> <input name="total_pekerja_a" type="text" class="style6" onKeypress="keypress(event)" id="total_pekerja_a"  value="<?php $jpa = $buruh->pekerja_estet_asing+ $buruh->pekerja_am_asing; echo number_format($jpa);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php $jpa = $buruh->pekerja_estet_asing+ $buruh->pekerja_am_asing; echo number_format($jpa);?>
<?php } ?>
       </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>    <input name="total_pekerja_tk" type="text" class="style6" onKeypress="keypress(event)" id="total_pekerja_tk"  value="<?php 
		$jpkt = $buruh->pekerja_estet_k_tempatan+$buruh->pekerja_am_k_tempatan;
		echo number_format($jpkt);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php 
		$jpkt = $buruh->pekerja_estet_k_tempatan+$buruh->pekerja_am_k_tempatan;
		echo number_format($jpkt);?>
<?php } ?>
    </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?><input name="total_pekerja_ak" type="text" class="style6" onKeypress="keypress(event)" id="total_pekerja_ak"  value="<?php 
		$jpka = $buruh->pekerja_estet_k_asing+$buruh->pekerja_am_k_asing;
		echo number_format($jpka);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php 
		$jpka = $buruh->pekerja_estet_k_asing+$buruh->pekerja_am_k_asing;
		echo number_format($jpka);?>
<?php } ?>
        </td>
      </tr>
      <tr align="center">
        <td height="31" bgcolor="#FFCCFF"><div align="left"><b><?=setstring ( 'mal', 'Kekurangan', 'en', 'Shortage'); ?>
</b></div></td>
        <td colspan="2" bgcolor="#FFCC66">
        <?php if($_SESSION['view']!="true"){ ?> <input type="text" class="active_input" name="kekurangan_pekerja" onKeypress="keypress(event)" size="11" id="kekurangan_pekerja" value="<?= number_format($buruh->kekurangan_pekerja_estet);?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kekurangan_pekerja_estet);?>
<?php } ?>
       </td>
        <td colspan="2" bgcolor="#FFCC66">
        <?php if($_SESSION['view']!="true"){ ?> <input type="text" class="active_input" name="kekurangan_pekerja_kontraktor" onKeypress="keypress(event)" size="11" id="kekurangan_pekerja_kontraktor" value="<?= number_format($buruh->kekurangan_pekerja_kontraktor);?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kekurangan_pekerja_kontraktor);?>
<?php } ?>
       </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="90%" align="center" cellspacing="0"   frame="box" class="tableCss" >
      <tr align="center">
        <td><div align="left"></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center">
        <td width="218" height="33" bgcolor="#FFCCFF"><div align="left"><?=setstring ( 'mal', 'Eksekutif', 'en', 'Executive'); ?>
</div></td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>   <input type="text" class="field_active" name="eksekutif_t"  size="11" id="eksekutif_t" value="<?= number_format($buruh->eksekutif_tempatan);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_kakitangan_t','<?= $buruh->eksekutif_tempatan;?>')"/>
          <a class='warga' href="warga.php?type=LOCAL&amp;field=eksekutif_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->eksekutif_tempatan);?>
<?php } ?>
     </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>    <input type="text" class="field_active" name="eksekutif_a"  size="11" id="eksekutif_a" value="<?= number_format($buruh->eksekutif_asing);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_kakitangan_a','<?= $buruh->eksekutif_asing;?>')"/>
          <a class='warga' href="warga.php?type=FOREIGN&amp;field=eksekutif_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->eksekutif_asing);?>
<?php } ?>
    </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="eksekutif_tk"  size="11" id="eksekutif_tk" value="<?= number_format($buruh->eksekutif_k_tempatan);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_kakitangan_tk','<?= $buruh->eksekutif_k_tempatan;?>')"/><a class='warga' href="warga.php?type=LOCAL&amp;field=eksekutif_k_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->eksekutif_k_tempatan);?>
<?php } ?>
          </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>     <input type="text" class="field_active" name="eksekutif_ak"  size="11" id="eksekutif_ak" value="<?= number_format($buruh->eksekutif_k_asing);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_kakitangan_ak','<?= $buruh->eksekutif_k_asing;?>')" />
          <a class='warga' href="warga.php?type=FOREIGN&amp;field=eksekutif_k_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />></a
><?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->eksekutif_k_asing);?>
<?php } ?>
   ></td>
      </tr>
      <tr align="center">
        <td height="35" bgcolor="#FFCCFF"><div align="left"><?=setstring ( 'mal', 'Kakitangan', 'en', 'Staff'); ?>
</div></td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>      <input type="text" class="field_active" name="kakitangan_t"  size="11" id="kakitangan_t" value="<?= number_format($buruh->kakitangan_tempatan);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_kakitangan_t','<?= $buruh->kakitangan_tempatan;?>')" />
          <a class='warga' href="warga.php?type=LOCAL&amp;field=kakitangan_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kakitangan_tempatan);?>
<?php } ?>
  </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>      <input type="text" class="field_active" name="kakitangan_a"  size="11" id="kakitangan_a" value="<?= number_format($buruh->kakitangan_asing);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_kakitangan_a','<?= $buruh->kakitangan_asing;?>')" />
          <a class='warga' href="warga.php?type=FOREIGN&amp;field=kakitangan_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kakitangan_asing);?>
<?php } ?>
  </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>     <input type="text" class="field_active" name="kakitangan_tk"  size="11" id="kakitangan_tk" value="<?= number_format($buruh->kakitangan_k_tempatan);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_kakitangan_tk','<?= $buruh->kakitangan_k_tempatan;?>')" />
          <a class='warga' href="warga.php?type=LOCAL&amp;field=kakitangan_k_tempatan"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kakitangan_k_tempatan);?>
<?php } ?>
   </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?>       <input type="text" class="field_active" name="kakitangan_ak"  size="11" id="kakitangan_ak" value="<?= number_format($buruh->kakitangan_k_asing);?>" onKeypress="keypress(event)" onchange="kira(this, this.value,'total_kakitangan_ak','<?= $buruh->kakitangan_k_asing;?>')" />
          <a class='warga' href="warga.php?type=FOREIGN&amp;field=kakitangan_k_asing"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kakitangan_k_asing);?>
<?php } ?>
 </td>
      </tr>
      <tr align="center">
        <td height="32" bgcolor="#FFCCFF"><div align="left"><b><?=setstring ( 'mal', 'Jumlah kecil', 'en', 'Sub-total'); ?></b></div></td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?>   <input name="total_kakitangan_t" type="text" class="style6" onKeypress="keypress(event)" id="total_kakitangan_t"  value="<?php $jkt =$buruh->eksekutif_tempatan+$buruh->kakitangan_tempatan; echo number_format($jkt);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php $jkt =$buruh->eksekutif_tempatan+$buruh->kakitangan_tempatan; echo number_format($jkt);?>
<?php } ?>
     </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?> <input name="total_kakitangan_a" type="text" class="style6" onKeypress="keypress(event)" id="total_kakitangan_a"  value="<?php $jka = $buruh->eksekutif_asing+ $buruh->kakitangan_asing; echo number_format($jka);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php $jka = $buruh->eksekutif_asing+ $buruh->kakitangan_asing; echo number_format($jka);?>
<?php } ?>
       </td>
        <td bgcolor="#99FF99">
        <?php if($_SESSION['view']!="true"){ ?><input name="total_kakitangan_tk" type="text" class="style6" onKeypress="keypress(event)" id="total_kakitangan_tk"  value="<?php  $jkkt = $buruh->eksekutif_k_tempatan+$buruh->kakitangan_k_tempatan; echo number_format($jkkt);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php  $jkkt = $buruh->eksekutif_k_tempatan+$buruh->kakitangan_k_tempatan; echo number_format($jkkt);?>
<?php } ?>
        </td>
        <td bgcolor="#FFFFCC">
        <?php if($_SESSION['view']!="true"){ ?><input name="total_kakitangan_ak" type="text" class="style6" onKeypress="keypress(event)" id="total_kakitangan_ak"  value="<?php 
		$jkka= $buruh->eksekutif_k_asing+$buruh->kakitangan_k_asing;
		echo number_format($jkka);?>"   size="11" readonly="true"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?php 
		$jkka= $buruh->eksekutif_k_asing+$buruh->kakitangan_k_asing;
		echo number_format($jkka);?>
<?php } ?>
        </td>
      </tr>
      <tr align="center">
        <td height="33" bgcolor="#FFCCFF"><div align="left"><b><?=setstring ( 'mal', 'Kekurangan', 'en', 'Shortage'); ?>
</b></div></td>
        <td colspan="2" bgcolor="#FFCC66">
        <?php if($_SESSION['view']!="true"){ ?><input type="text" class="active_input" name="kekurangan_kakitangan" onKeypress="keypress(event)" size="11" id="kekurangan_kakitangan" value="<?= number_format($buruh->kekurangan_eksekutif);?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kekurangan_eksekutif);?>
<?php } ?>
        </td>
        <td colspan="2" bgcolor="#FFCC66">
        <?php if($_SESSION['view']!="true"){ ?> <input type="text" class="active_input" name="kekurangan_pekerja_k" onKeypress="keypress(event)" size="11" id="kekurangan_pekerja_k" value="<?= number_format($buruh->kekurangan_kakitangan_kontraktor);?>"  />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($buruh->kekurangan_kakitangan_kontraktor);?>
<?php } ?>
       </td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="36" colspan="2"><span class="style2"><?=setstring ( 'mal', 'Penggunaan Jentera Di Ladang', 'en', 'Form Mechanizations'); ?>
		<input name="totalpembajaan" type="hidden" id="totalpembajaan" value="<?php echo $jentera->viewtotaljentera('Pembajaan');?>" />
		<input name="totalperacunan" type="hidden" id="totalperacunan" value="<?php echo $jentera->viewtotaljentera('Peracunan');?>" />
		<input name="totalpenyemburan" type="hidden" id="totalpenyemburan" value="<?php echo $jentera->viewtotaljentera('Penyemburan');?>"/>
		<input name="totalpenuaian" type="hidden" id="totalpenuaian" value="<?php echo $jentera->viewtotaljentera('Penuaian');?>"/>
		<input name="totalpengutipan" type="hidden" id="totalpengutipan" value="<?php echo $jentera->viewtotaljentera('Pemungutan');?>"/>
		<input name="totalpemunggahan" type="hidden" id="totalpemunggahan" value="<?php echo $jentera->viewtotaljentera('Pemunggahan');?>"/>
		<input name="totalpengangkutan" type="hidden" id="totalpengangkutan" value="<?php echo $jentera->viewtotaljentera('Pengangkutan');?>"/>
		<input name="tahun" type="hidden" id="tahun" value="<?= $_COOKIE['tahun_report'];?>" />
    
	<?php
	$varjentera[0] = $_SESSION['lesen'];
	$varjentera[1]=$_COOKIE['tahun_report'];
	
	?>
	</span></td>
  </tr>
  <tr>
    <td height="36" colspan="2"><table width="90%" align="center" cellspacing="0" frame="box" class="tableCss" >
      <tr>
        <td width="41%" height="33" background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Kategori Kerja', 'en', 'Work Categories'); ?>
</strong></div></td>
        <td width="20%" background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Peratus Kawasan', 'en', 'Percent of field'); ?>
</strong></div></td>
        <td width="24" colspan="2" background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Jenis Jentera', 'en', 'Type of Machine'); ?>
</strong></div></td>
        <td width="15%" background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Bilangan Jentera', 'en', 'No of Machine'); ?>
</strong></div></td>
      </tr>
	  <!-- pembajaan -->
      <tr>
        <td height="34"><?=setstring ( 'mal', 'Pembajaan', 'en', 'Fertilizer Application'); ?>
<?php 
		$varjentera[2]='pembajaan';
		$jbaja = new user('jentera_estate',$varjentera);
		?>
          <input name="baja1[0]" type="hidden" id="baja1[0]" value="<?= $jbaja->id_jentera[0];?>" />
          <input name="baja2[0]" type="hidden" id="baja2[0]" value="<?= $jbaja->lesen[0];?>" />
          <input name="baja3[0]" type="hidden" id="baja3[0]" value="<?= $jbaja->tahun[0];?>" />
          <input name="baja4[0]" type="hidden" id="baja4[0]" value="<?= $jbaja->nama_jentera[0]; ?>" />
          <input name="baja5[0]" type="hidden" id="baja5[0]" value="<?= $jbaja->type[0]; ?>" />		  </td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_pembajaan[0]" onKeypress="keypress(event)" size="11" id="peratus_pembajaan[0]" value="<?= number_format($jbaja->percent[0],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jbaja->percent[0],2);?>
<?php } ?>
         %</div></td>
        <td>
          <div align="left">
            <select name="jentera_pembajaan[0]" id="jentera_pembajaan[0]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value,'pembajaan_lain')">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
			  <?php 
			  $con = connect();
			  $q ="select * from jentera where kategori_jentera ='Pembajaan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  $total_jentera = mysql_num_rows($r);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jbaja->id_jentera[0]){?>selected="selected"<?php } ?>><?= $row['nama_jentera'];?></option>
			  <?php } ?>
            </select>
            <div id="pembajaan_lain" class="<?php if($jbaja->id_jentera[0]=="Lain-lain"){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_pembajaan[0]" id="lain_pembajaan[0]" size="25" value="<?= ucwords($jbaja->nama_jentera[0]);?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= ucwords($jbaja->nama_jentera[0]);?>
<?php } ?>
           </div>
            </div></td>
        <td><a href="javascript:add_byr()"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_pembajaan[0]" onKeypress="keypress(event)" size="11" id="bil_pembajaan[0]" value="<?= number_format($jbaja->value[0]);?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jbaja->value[0]);?>
<?php } ?>
        </div></td>
      </tr>
	  
	  <?php
	  $totbaja = $jbaja->total;
	  for ($j=1; $j<$total_jentera; $j++){?>
	  <tr bgcolor="##99FF99" class="<?php if($totbaja>$j){ echo "show";} else{echo "hide";}?>" id="<?php echo $j; ?>">
        <td height="34"><?=setstring ( 'mal', 'Pembajaan', 'en', 'Fertilizer Application'); ?>
		 <input name="baja1[<?= $j; ?>]" type="hidden" id="baja1[<?= $j; ?>]" value="<?= $jbaja->id_jentera[$j];?>" />
          <input name="baja2[<?= $j; ?>]" type="hidden" id="baja2[<?= $j; ?>]" value="<?= $jbaja->lesen[$j];?>" />
          <input name="baja3[<?= $j; ?>]" type="hidden" id="baja3[<?= $j; ?>]" value="<?= $jbaja->tahun[$j];?>" />
          <input name="baja4[<?= $j; ?>]" type="hidden" id="baja4[<?= $j; ?>]" value="<?= $jbaja->nama_jentera[$j]; ?>" />
          <input name="baja5[<?= $j; ?>]" type="hidden" id="baja5[<?= $j; ?>]" value="<?= $jbaja->type[$j]; ?>" /></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_pembajaan[<?= $j; ?>]" onKeypress="keypress(event)" size="11" id="peratus_pembajaan[<?= $j; ?>]" value="<?= number_format($jbaja->percent[$j],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jbaja->percent[$j],2);?>
<?php } ?>
         %</div></td>
        <td>
          <div align="left">
            <select name="jentera_pembajaan[<?= $j; ?>]" id="jentera_pembajaan[<?= $j; ?>]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pembajaan_lain<?= $j; ?>');">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
			  <?php 
			  $con = connect();
			  $q ="select * from jentera where kategori_jentera ='Pembajaan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jbaja->id_jentera[$j]){?>selected="selected"<?php } ?>><?= $row['nama_jentera'];?></option>
			  <?php } ?>
            </select>
			<div id="pembajaan_lain<?= $j; ?>" class="<?php if($jbaja->nama_jentera[$j]!=""){echo "show";} else{echo "hide";}?>" >
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_pembajaan[<?= $j; ?>]" id="lain_pembajaan[<?= $j; ?>]" size="25" value="<?= ucwords($jbaja->nama_jentera[$j]);?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= ucwords($jbaja->nama_jentera[$j]);?>
<?php } ?>
           </div>
            </div></td>
        <td><a href="javascript:add_byr()"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_pembajaan[<?= $j; ?>]" onKeypress="keypress(event)" size="11" id="bil_pembajaan[<?= $j; ?>]" value="<?= number_format($jbaja->value[$j]);?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jbaja->value[$j]);?>
<?php } ?>
        </div></td>
      </tr>
	  <?php } ?>
	  
	  <!-- meracun -->
	  <tr bgcolor="#99FF99">
        <td height="35" bgcolor="#99FF99"><?=setstring ( 'mal', 'Meracun', 'en', 'Weeding'); ?>

        <?php 
			$varjentera[2]='Peracunan';
			$jracun = new user('jentera_estate',$varjentera);
		?>
		
		 <input name="racun1[0]" type="hidden" id="racun1[0]" value="<?= $jracun->id_jentera[0];?>" />
          <input name="racun2[0]" type="hidden" id="racun2[0]" value="<?= $jracun->lesen[0];?>" />
          <input name="racun3[0]" type="hidden" id="racun3[0]" value="<?= $jracun->tahun[0];?>" />
          <input name="racun4[0]" type="hidden" id="racun4[0]" value="<?= $jracun->nama_jentera[0]; ?>" />
          <input name="racun5[0]" type="hidden" id="racun5[0]" value="<?= $jracun->type[0]; ?>" /></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_peracunan[0]"  size="11" id="peratus_peracunan[0]" value="<?= number_format($jracun->percent[0],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jracun->percent[0],2);?>
<?php } ?>
%</div></td>
        <td>
          <div align="left">
          
          <?php
          	  $con = connect();
			  $q ="SELECT * FROM jentera WHERE kategori_jentera ='Peracunan' ORDER BY id_jentera";
			  $r = mysql_query($q,$con);
			  $total_racun = mysql_num_rows($r);
		  ?>
            <select name="jentera_peracunan[0]" id="jentera_peracunan[0]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'peracunan_lain');">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
              <?php 
		
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jracun->id_jentera[0]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="peracunan_lain" class="<?php if($jracun->nama_jentera[0]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input name="lain_peracunan[0]" type="text" id="lain_peracunan[0]" value="<?= $jracun->nama_jentera[0];?>" size="25" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= $jracun->nama_jentera[0];?>
<?php } ?>
           </div>
          </div></td>
        <td><a href="javascript:add_racun('zz')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_peracunan[0]" onKeypress="keypress(event)" size="11" id="bil_peracunan[0]" value="<?= number_format($jracun->value[0]);?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jracun->value[0]);?>
<?php } ?>
        </div></td>
      </tr>
	  
	  	  <?php 
		 $totracun = $jracun->total; 
		  for ($zz=1; $zz<$total_racun; $zz++){?>

	  <tr bgcolor="#99FF99" class="<?php if($totracun>$zz){ echo "show";} else{echo "hide";}?>" id="zz<?= $zz; ?>">
        <td height="35"><?=setstring ( 'mal', 'Meracun', 'en', 'Weeding'); ?>
		
		 <input name="racun1[<?= $zz; ?>]" type="hidden" id="racun1[<?= $zz; ?>]" value="<?= $jracun->id_jentera[$zz];?>" />
          <input name="racun2[<?= $zz; ?>]" type="hidden" id="racun2[<?= $zz; ?>]" value="<?= $jracun->lesen[$zz];?>" />
          <input name="racun3[<?= $zz; ?>]" type="hidden" id="racun3[<?= $zz; ?>]" value="<?= $jracun->tahun[$zz];?>" />
          <input name="racun4[<?= $zz; ?>]" type="hidden" id="racun4[<?= $zz; ?>]" value="<?= $jracun->nama_jentera[$zz]; ?>" />
          <input name="racun5[<?= $zz; ?>]" type="hidden" id="racun5[<?= $zz; ?>]" value="<?= $jracun->type[$zz]; ?>" />		</td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_peracunan[<?= $zz; ?>]" size="11" id="peratus_peracunan[<?= $zz; ?>]" value="<?= number_format($jracun->percent[$zz],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jracun->percent[$zz],2);?>
<?php } ?>
%</div></td>
        <td>
          <div align="left">
            <select name="jentera_peracunan[<?= $zz; ?>]" id="jentera_peracunan[<?= $zz; ?>]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'peracunan_lain<?= $zz; ?>');">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
              <?php 
			  $con = connect();
			  $q ="SELECT * FROM jentera WHERE kategori_jentera ='Peracunan' ORDER BY id_jentera";
			  $r = mysql_query($q,$con);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jracun->id_jentera[$zz]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="peracunan_lain<?= $zz; ?>" class="<?php if($jracun->nama_jentera[$zz]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_peracunan[<?= $zz; ?>]" id="lain_peracunan<?= $zz; ?>" size="25" value="<?= $jracun->nama_jentera[$zz];?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= $jracun->nama_jentera[$zz];?>
<?php } ?>
           </div>
          </div></td>
        <td><a href="javascript:add_racun('zz')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_peracunan[<?= $zz; ?>]" onkeypress="keypress(event)" size="11" id="bil_peracunan[<?= $zz; ?>]" value="<?= $jracun->value[$zz];?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= $jracun->value[$zz];?>
<?php } ?>
        </div></td>
      </tr>
	  <?php } ?>
	  <!-- kawalan penyakit--> 
      <tr>
        <td height="35"><?=setstring ( 'mal', 'Kawalan penyakit dan makhluk perosak', 'en', 'Pests and diseases control'); ?>

          <?php 
		$varjentera[2]='penyemburan';
		$jsembur = new user('jentera_estate',$varjentera);
		?>
		
		 <input name="sembur1[0]" type="hidden" id="sembur1[0]" value="<?= $jsembur->id_jentera[0];?>" />
          <input name="sembur2[0]" type="hidden" id="sembur2[0]" value="<?= $jsembur->lesen[0];?>" />
          <input name="sembur3[0]" type="hidden" id="sembur3[0]" value="<?= $jsembur->tahun[0];?>" />
          <input name="sembur4[0]" type="hidden" id="sembur4[0]" value="<?= $jsembur->nama_jentera[0]; ?>" />
          <input name="sembur5[0]" type="hidden" id="sembur5[0]" value="<?= $jsembur->type[0]; ?>" />		</td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_penyemburan[0]"  size="11" id="peratus_penyemburan[0]" value="<?= number_format($jsembur->percent[0],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jsembur->percent[0],2);?>
<?php } ?>
%</div></td>
        <td>
          <div align="left">
            <select name="jentera_penyemburan[0]" id="jentera_penyemburan[0]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'penyemburan_lain');">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
              <?php 
			  $con = connect();
			  $q ="select * from jentera where kategori_jentera ='Penyemburan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  $total_sembur = mysql_num_rows($r);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jsembur->id_jentera[0]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="penyemburan_lain" class="<?php if($jsembur->nama_jentera[0]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?>
<?php } ?><input type="text" name="lain_penyemburan[0]" id="lain_penyemburan[0]" size="25" />
           </div>
          </div></td>
        <td><a href="javascript:add_tuait('s')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_penyemburan[0]" onKeypress="keypress(event)" size="11" id="bil_penyemburan[0]" value="<?= number_format($jsembur->value[0]);?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jsembur->value[0]);?>
<?php } ?>
        </div></td>
      </tr>
	  
	  	  <?php 
		 $totsembur = $jsembur->total; 
		  for ($s=1; $s<$total_sembur; $s++){?>

	  <tr class="<?php if($totsembur>$s){ echo "show";} else{echo "hide";}?>" id="s<?= $s; ?>">
        <td height="35"><?=setstring ( 'mal', 'Kawalan penyakit dan makhluk perosak', 'en', 'Pests and diseases control'); ?>
		
		 <input name="sembur1[<?= $s; ?>]" type="hidden" id="sembur1[<?= $s; ?>]" value="<?= $jsembur->id_jentera[$s];?>" />
          <input name="sembur2[<?= $s; ?>]" type="hidden" id="sembur2[<?= $s; ?>]" value="<?= $jsembur->lesen[$s];?>" />
          <input name="sembur3[<?= $s; ?>]" type="hidden" id="sembur3[<?= $s; ?>]" value="<?= $jsembur->tahun[$s];?>" />
          <input name="sembur4[<?= $s; ?>]" type="hidden" id="sembur4[<?= $s; ?>]" value="<?= $jsembur->nama_jentera[$s]; ?>" />
          <input name="sembur5[<?= $s; ?>]" type="hidden" id="sembur5[<?= $s; ?>]" value="<?= $jsembur->type[$s]; ?>" />		</td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_penyemburan[<?= $s; ?>]"  size="11" id="peratus_penyemburan[<?= $s; ?>]" value="<?= number_format($jsembur->percent[$s],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jsembur->percent[$s],2);?>
<?php } ?>
%</div></td>
        <td>
          <div align="left">
            <select name="jentera_penyemburan[<?= $s; ?>]" id="jentera_penyemburan[<?= $s; ?>]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'penyemburan_lain<?= $s; ?>');">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
              <?php 
			  $con = connect();
			  $q ="select * from jentera where kategori_jentera ='Penyemburan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jsembur->id_jentera[$s]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="penyemburan_lain<?= $s; ?>" class="<?php if($jsembur->nama_jentera[$s]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_penyemburan[<?= $s; ?>]" id="lain_penyemburan<?= $s; ?>" size="25" value="<?= $jsembur->nama_jentera[$s];?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= $jsembur->nama_jentera[$s];?>
<?php } ?>
           </div>
          </div></td>
        <td><a href="javascript:add_tuait('s')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_penyemburan[<?= $s; ?>]" onkeypress="keypress(event)" size="11" id="bil_penyemburan[<?= $s; ?>]" value="<?= number_format($jsembur->value[$s]);?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jsembur->value[$s]);?>
<?php } ?>
        </div></td>
      </tr>
	  <?php } ?>
	  
	  <!-- pemotongan BTS -->
      <tr>
        <td height="35" bgcolor="#99FF99"><?=setstring ( 'mal', 'Pemotongan BTS', 'en', 'Cutting of FFB'); ?>

        <?php 
		$varjentera[2]='penuaian';
		$jtuai = new user('jentera_estate',$varjentera);
		?>
		 <input name="tuai1[0]" type="hidden" id="tuai1[0]" value="<?= $jtuai->id_jentera[0];?>" />
          <input name="tuai2[0]" type="hidden" id="tuai2[0]" value="<?= $jtuai->lesen[0];?>" />
          <input name="tuai3[0]" type="hidden" id="tuai3[0]" value="<?= $jtuai->tahun[0];?>" />
          <input name="tuai4[0]" type="hidden" id="tuai4[0]" value="<?= $jtuai->nama_jentera[0]; ?>" />
          <input name="tuai5[0]" type="hidden" id="tuai5[0]" value="<?= $jtuai->type[0]; ?>" />		</td>
        <td bgcolor="#99FF99"><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_penuaian[0]" onKeypress="keypress(event)" size="11" id="peratus_penuaian[0]" value="<?= number_format($jtuai->percent[0],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jtuai->percent[0],2);?>
<?php } ?>
%</div></td>
        <td bgcolor="#99FF99">
          <div align="left">
            <select name="jentera_penuaian[0]" id="jentera_penuaian[0]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'penuaian_lain');">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
              <?php 
			  $con = connect();
			  $q ="SELECT * FROM jentera WHERE kategori_jentera ='Penuaian' ORDER BY id_jentera";
			  $r = mysql_query($q,$con);
			  $total_penuaian = mysql_num_rows($r);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jtuai->id_jentera[0]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="penuaian_lain" class="<?php if($jtuai->nama_jentera[0]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_penuaian[0]" id="lain_penuaian[0]" size="25" value="<?= ucwords($jtuai->nama_jentera[0]);?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= ucwords($jtuai->nama_jentera[0]);?>
<?php } ?>
           </div>
          </div></td>
        <td bgcolor="#99FF99"><a href="javascript:add_tuai('t')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td bgcolor="#99FF99"><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_penuaian[0]" onKeypress="keypress(event)" size="11" id="bil_penuaian[0]" value="<?= number_format($jtuai->value[0]);?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jtuai->value[0]);?>
<?php } ?>
        </div></td>
      </tr>
	  
	  	  <?php 
		  $tottuai = $jtuai->total; 
		  for ($t=1; $t<$total_penuaian; $t++){
		  ?>

	  <tr class="<?php if($tottuai>$t){ echo "show";} else{echo "hide";}?>" id="t<?= $t; ?>">
        <td height="35" bgcolor="#99FF99"><?=setstring ( 'mal', 'Pemotongan BTS', 'en', 'Cutting of FFB'); ?>
		
		  <input name="tuai1[<?= $t; ?>]" type="hidden" id="tuai1[<?= $t; ?>]" value="<?= $jtuai->id_jentera[$t];?>" />
          <input name="tuai2[<?= $t; ?>]" type="hidden" id="tuai2[<?= $t; ?>]" value="<?= $jtuai->lesen[$t];?>" />
          <input name="tuai3[<?= $t; ?>]" type="hidden" id="tuai3[<?= $t; ?>]" value="<?= $jtuai->tahun[$t];?>" />
          <input name="tuai4[<?= $t; ?>]" type="hidden" id="tuai4[<?= $t; ?>]" value="<?= $jtuai->nama_jentera[$t]; ?>" />
          <input name="tuai5[<?= $t; ?>]" type="hidden" id="tuai5[<?= $t; ?>]" value="<?= $jtuai->type[$t]; ?>" />		</td>
        <td bgcolor="#99FF99"><div align="center">
          <?php if($_SESSION['view']!="true"){ ?>
<?php } ?><input type="text" class="field_active" name="peratus_penuaian[<?= $t; ?>]" onKeypress="keypress(event)" size="11" id="peratus_penuaian[<?= $t; ?>]" value="<?= number_format($jtuai->percent[$t],2);?>" onchange="tukar_format(this)"; autocomplete="off" />

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jtuai->percent[$t],2);?>
<?php } ?>
%</div></td>
        <td bgcolor="#99FF99">
          <div align="left">
            <select name="jentera_penuaian[<?= $t; ?>]" id="jentera_penuaian[<?= $t; ?>]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'penuaian_lain<?= $t; ?>');" >
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
              <?php 
			  $con = connect();
			  $q ="SELECT * FROM jentera WHERE kategori_jentera ='Penuaian' ORDER BY id_jentera";
			  $r = mysql_query($q,$con);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jtuai->id_jentera[$t]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="penuaian_lain<?= $t; ?>" class="<?php if($jtuai->nama_jentera[$t]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_penuaian[<?= $t; ?>]" id="lain_penuaian[<?= $t; ?>]" size="25" value="<?= ucwords($jtuai->nama_jentera[$t]);?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= ucwords($jtuai->nama_jentera[$t]);?>
<?php } ?>
           </div>
          </div></td>
        <td bgcolor="#99FF99"><a href="javascript:add_tuai('t')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td bgcolor="#99FF99"><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_penuaian[<?= $t; ?>]" onKeypress="keypress(event)" size="11" id="bil_penuaian[<?= $t; ?>]" value="<?= $jtuai->value[$t];?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= $jtuai->value[$t];?>
<?php } ?>
        </div></td>
      </tr>
	  <?php } ?>
	  
<!-- kutip -->
      <tr>
        <td height="37">
        <?=setstring ('mal', 'Pengutipan buah relai', 'en', 'Loose fruit collection')?>
          <?php 
		$varjentera[2]='pengutipan';
		$jkutip = new user('jentera_estate',$varjentera);
		?>
		
		 <input name="kutip1[0]" type="hidden" id="kutip1[0]" value="<?= $jkutip->id_jentera[0];?>" />
          <input name="kutip2[0]" type="hidden" id="kutip2[0]" value="<?= $jkutip->lesen[0];?>" />
          <input name="kutip3[0]" type="hidden" id="kutip3[0]" value="<?= $jkutip->tahun[0];?>" />
          <input name="kutip4[0]" type="hidden" id="kutip4[0]" value="<?= $jkutip->nama_jentera[0]; ?>" />
          <input name="kutip5[0]" type="hidden" id="kutip5[0]" value="<?= $jkutip->type[0]; ?>" />		</td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_pengutipan[0]" onKeypress="keypress(event)" size="11" id="peratus_pengutipan[0]" value="<?= number_format($jkutip->percent[0],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jkutip->percent[0],2);?>
<?php } ?>
%</div></td>
        <td>
          <div align="left">
            <select name="jentera_pengutipan[0]" id="jentera_pengutipan[0]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pengutipan_lain');">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
              <?php 
			  $con = connect();
			  $q ="select * from jentera where kategori_jentera ='Pemungutan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  $total_pengutipan = mysql_num_rows($r);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jkutip->id_jentera[0]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="pengutipan_lain" class="<?php if($jkutip->nama_jentera[0]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_pengutipan[0]" id="lain_pengutipan[0]" size="25" value="<?= ucwords($jkutip->nama_jentera[0]);?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= ucwords($jkutip->nama_jentera[0]);?>
<?php } ?>
           </div>
          </div></td>
        <td><a href="javascript:add_kutip('bb')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_pengutipan[0]" onKeypress="keypress(event)" size="11" id="bil_pengutipan[0]" value="<?= number_format($jkutip->value[0]);?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jkutip->value[0]);?>
<?php } ?>
        </div></td>
      </tr>
      
	  	  <?php $totkutip= $jkutip->total; 
		//  echo $total_pengutipan; 
		  for ($b=1; $b<$total_pengutipan; $b++){?>

	  <tr bgcolor="#ffFFff" class="<?php if($totkutip>$b){ echo "show";} else{echo "hide";}?>" id="bb<?= $b; ?>">
        <td height="37">
        
        <?php //echo "bb".$b; ?>
        <?=setstring ('mal', 'Pengutipan buah relai', 'en', 'Loose fruit collection')?>
		
		 <input name="kutip1[<?= $b; ?>]" type="hidden" id="kutip1[<?= $b; ?>]" value="<?= $jkutip->id_jentera[$b];?>" />
          <input name="kutip2[<?= $b; ?>]" type="hidden" id="kutip2[<?= $b; ?>]" value="<?= $jkutip->lesen[$b];?>" />
          <input name="kutip3[<?= $b; ?>]" type="hidden" id="kutip3[<?= $b; ?>]" value="<?= $jkutip->tahun[$b];?>" />
          <input name="kutip4[<?= $b; ?>]" type="hidden" id="kutip4[<?= $b; ?>]" value="<?= $jkutip->nama_jentera[$b]; ?>" />
          <input name="kutip5[<?= $b; ?>]" type="hidden" id="kutip5[<?= $b; ?>]" value="<?= $jkutip->type[$b]; ?>" />		</td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_pengutipan[<?= $b; ?>]" onKeypress="keypress(event)" size="11" id="peratus_pengutipan[<?= $b; ?>]" value="<?= number_format($jkutip->percent[$b],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jkutip->percent[$b],2);?>
<?php } ?>
%</div></td>
        <td>
          <div align="left">
            <select name="jentera_pengutipan[<?= $b; ?>]" id="jentera_pengutipan[<?= $b; ?>]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pengutipan_lain<?= $b; ?>');">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
              <?php 
			  $con = connect();
			  $q ="select * from jentera where kategori_jentera ='Pemungutan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jkutip->id_jentera[$b]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="pengutipan_lain<?= $b; ?>" class="<?php if($jkutip->nama_jentera[$b]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_pengutipan[<?= $b; ?>]" id="lain_pengutipan[<?= $b; ?>]" size="25" value="<?= ucwords($jkutip->nama_jentera[$b]);?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= ucwords($jkutip->nama_jentera[$b]);?>
<?php } ?>
           </div>
          </div></td>
        <td><a href="javascript:add_kutip('bb')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_pengutipan[<?= $b; ?>]" onKeypress="keypress(event)" size="11" id="bil_pengutipan[<?= $b; ?>]" value="<?= number_format($jkutip->value[$b]);?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jkutip->value[$b]);?>
<?php } ?>
        </div></td>
      </tr>
	  <?php } ?>
	  
<!-- Pemunggahan BTS ke platform atau pusat pengumpulan -->
      <tr bgcolor="#99FF99">
        <td height="37">
        <?=setstring ('mal', 'Pemunggahan BTS ke platform atau pusat pengumpulan', 'en', 'Infield collection of FFBs to platform or collection centre')?>
          <?php 
		$varjentera[2]='pemunggahan';
		$jpunggah = new user('jentera_estate',$varjentera);
		?>
		
		 <input name="punggah1[0]" type="hidden" id="punggah1[0]" value="<?= $jpunggah->id_jentera[0];?>" />
          <input name="punggah2[0]" type="hidden" id="punggah2[0]" value="<?= $jpunggah->lesen[0];?>" />
          <input name="punggah3[0]" type="hidden" id="punggah3[0]" value="<?= $jpunggah->tahun[0];?>" />
          <input name="punggah4[0]" type="hidden" id="punggah4[0]" value="<?= $jpunggah->nama_jentera[0]; ?>" />
          <input name="punggah5[0]" type="hidden" id="punggah5[0]" value="<?= $jpunggah->type[0]; ?>" />		</td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_pemunggahan[0]" onKeypress="keypress(event)" size="11" id="peratus_pemunggahan[0]" value="<?= number_format($jpunggah->percent[0],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jpunggah->percent[0],2);?>
<?php } ?>
%</div></td>
        <td>
          <div align="left">
            <select name="jentera_pemunggahan[0]" id="jentera_pemunggahan[0]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pemunggahan_lain');">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
              <?php 
			  $con = connect();
			  $q ="select * from jentera where kategori_jentera ='Pemunggahan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  $total_pemunggahan = mysql_num_rows($r);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jpunggah->id_jentera[0]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="pemunggahan_lain" class="<?php if($jpunggah->nama_jentera[0]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_pemunggahan[0]" id="lain_pemunggahan[0]" size="25" value="<?= ucwords($jpunggah->nama_jentera[0]);?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= ucwords($jpunggah->nama_jentera[0]);?>
<?php } ?>
           </div>
          </div></td>
        <td><a href="javascript:add_punggah('b')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_pemunggahan[0]" onKeypress="keypress(event)" size="11" id="bil_pemunggahan[0]" value="<?= $jpunggah->value[0];?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= $jpunggah->value[0];?>
<?php } ?>
        </div></td>
      </tr>
      
	  	  <?php 
		  $totpunggah= $jpunggah->total; 
		  for ($b=1; $b<$total_pemunggahan; $b++){
		  ?>

	  <tr bgcolor="#99FF99" class="<?php if($totpunggah>$b){ echo "show";} else{echo "hide";}?>" id="b<?= $b; ?>">
        <td height="37"><label></label>
        <?=setstring ('mal', 'Pemunggahan BTS ke platform atau pusat pengumpulan', 'en', 'Infield collection of FFBs to 
       platform or collection centre')?>
		
		 <input name="punggah1[<?= $b; ?>]" type="hidden" id="punggah1[<?= $b; ?>]" value="<?= $jpunggah->id_jentera[$b];?>" />
          <input name="punggah2[<?= $b; ?>]" type="hidden" id="punggah2[<?= $b; ?>]" value="<?= $jpunggah->lesen[$b];?>" />
          <input name="punggah3[<?= $b; ?>]" type="hidden" id="punggah3[<?= $b; ?>]" value="<?= $jpunggah->tahun[$b];?>" />
          <input name="punggah4[<?= $b; ?>]" type="hidden" id="punggah4[<?= $b; ?>]" value="<?= $jpunggah->nama_jentera[$b]; ?>" />
          <input name="punggah5[<?= $b; ?>]" type="hidden" id="punggah5[<?= $b; ?>]" value="<?= $jpunggah->type[$b]; ?>" />		</td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_pemunggahan[<?= $b; ?>]" onKeypress="keypress(event)" size="11" id="peratus_pemunggahan[<?= $b; ?>]" value="<?= number_format($jpunggah->percent[$b],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jpunggah->percent[$b],2);?>
<?php } ?>
%</div></td>
        <td>
          <div align="left">
            <select name="jentera_pemunggahan[<?= $b; ?>]" id="jentera_pemunggahan[<?= $b; ?>]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pemunggahan_lain<?= $b; ?>');">
              <option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
              <?php 
			  $con = connect();
			  $q ="SELECT * FROM jentera WHERE kategori_jentera ='Pemunggahan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jpunggah->id_jentera[$b]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="pemunggahan_lain<?= $b; ?>" class="<?php if($jpunggah->nama_jentera[$b]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_pemunggahan[<?= $b; ?>]" id="lain_pemunggahan[<?= $b; ?>]" size="25" value="<?= ucwords($jpunggah->nama_jentera[$b]);?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= ucwords($jpunggah->nama_jentera[$b]);?>
<?php } ?>
           </div>
          </div></td>
        <td><a href="javascript:add_punggah('b')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
        <td><div align="center">
          <?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_pemunggahan[<?= $b; ?>]" onKeypress="keypress(event)" size="11" id="bil_pemunggahan[<?= $b; ?>]" value="<?= $jpunggah->value[$b];?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= $jpunggah->value[$b];?>
<?php } ?>
        </div></td>
      </tr>
	  <?php } ?>
 <!-- angkut new additional 14/07/2010 -->
 <tr>
    <td height="37"><?=setstring ('mal', 'Pengangkutan BTS dari platform atau pusat pengumpulan ke kilang', 'en', 'Mainline Transportation of FFBs from platform or collection centres to mill')?>
	<?php 
		$varjentera[2]='pengangkutan';
		$jangkut = new user('jentera_estate',$varjentera);
	?>
		<input name="angkut1[0]" type="hidden" id="angkut1[0]" value="<?= $jangkut->id_jentera[0];?>" />
        <input name="angkut2[0]" type="hidden" id="angkut2[0]" value="<?= $jangkut->lesen[0];?>" />
        <input name="angkut3[0]" type="hidden" id="angkut3[0]" value="<?= $jangkut->tahun[0];?>" />
        <input name="angkut4[0]" type="hidden" id="angkut4[0]" value="<?= $jangkut->nama_jentera[0]; ?>" />
        <input name="angkut5[0]" type="hidden" id="angkut5[0]" value="<?= $jangkut->type[0]; ?>" />
	</td>
    <td>
		<div align="center">
			<?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_pengangkutan[0]" onKeypress="keypress(event)" size="11" id="peratus_pengangkutan[0]" value="<?= number_format($jangkut->percent[0],2);?>" onchange="tukar_format(this)" autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jangkut->percent[0],2);?>
<?php } ?>%</div>
		</td>
    <td>
        <div align="left">
        
        <?php
        	$con = connect();
			$q ="SELECT * FROM jentera WHERE kategori_jentera ='Pengangkutan' ORDER BY id_jentera";
			$r = mysql_query($q,$con);
		?>
            <select name="jentera_pengangkutan[0]" id="jentera_pengangkutan[0]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pengangkutan_lain')">
				<option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
				<?php
				
					$total_pengangkutan = mysql_num_rows($r);
					while($row=mysql_fetch_array($r)){
				?>
				<option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jangkut->id_jentera[0]){?>selected="selected"<?php } ?>><?= $row['nama_jentera'];?></option>
              <?php } ?>
            </select>
			<div id="pengangkutan_lain" class="<?php if($jangkut->nama_jentera[0]!=""){echo "show";} else{echo "hide";}?>">
				<?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_pengangkutan[0]" id="lain_pengangkutan[0]" size="25" value="<?= ucwords($jangkut->nama_jentera[0]);?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= ucwords($jangkut->nama_jentera[0]);?>
<?php } ?>
			</div>
        </div>
	</td>
    <td><a href="javascript:add_angkut('bbts')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
	<td>
		<div align="center">
			<?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_pengangkutan[0]" onKeypress="keypress(event)" size="11" id="bil_pengangkutan[0]" value="<?= number_format($jangkut->value[0]);?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jangkut->value[0]);?>
<?php } ?>
        </div>
	</td>
</tr>
      
<?php
	$totangkut= $jangkut->total;
	//echo $total_pengangkutan; 
	
	for ($bb=1; $bb<$total_pengangkutan; $bb++){
	//echo "bts".$bb;
	?>

<tr bgcolor="#ffFFff" class="<?php if($totangkut>$bb){ echo "show";} else{echo "hide";}?>" id="bbts<?= $bb; ?>">
    <td height="37"><?=setstring ('mal', 'Pengangkutan BTS dari platform atau pusat pengumpulan ke kilang', 'en', 'Mainline Transportation of FFBs from platform or collection centres to mill')?>
		<input name="angkut1[<?= $bb; ?>]" type="hidden" id="angkut1[<?= $bb; ?>]" value="<?= $jangkut->id_jentera[$bb];?>" />
        <input name="angkut2[<?= $bb; ?>]" type="hidden" id="angkut2[<?= $bb; ?>]" value="<?= $jangkut->lesen[$bb];?>" />
        <input name="angkut3[<?= $bb; ?>]" type="hidden" id="angkut3[<?= $bb; ?>]" value="<?= $jangkut->tahun[$bb];?>" />
        <input name="angkut4[<?= $bb; ?>]" type="hidden" id="angkut4[<?= $bb; ?>]" value="<?= $jangkut->nama_jentera[$bb]; ?>" />
        <input name="angkut5[<?= $bb; ?>]" type="hidden" id="angkut5[<?= $bb; ?>]" value="<?= $jangkut->type[$bb]; ?>" />		</td>
    <td>
		<div align="center">
			<?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="peratus_pengangkutan[<?= $bb; ?>]" onKeypress="keypress(event)" size="11" id="peratus_pengangkutan[<?= $bb; ?>]" value="<?= number_format($jangkut->percent[$bb],2);?>" onchange="tukar_format(this)" autocomplete="off" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= number_format($jangkut->percent[$bb],2);?>
<?php } ?>%
		</div>
	</td>
    <td>
        <div align="left">
        <?php
        			$con = connect();
					$q ="SELECT * FROM jentera WHERE kategori_jentera ='Pengangkutan' ORDER BY id_jentera";
					$r = mysql_query($q,$con);
		?>
            <select name="jentera_pengangkutan[<?= $bb; ?>]" id="jentera_pengangkutan[<?= $bb; ?>]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pengangkutan_lain<?= $bb; ?>')">
				<option><?=setstring ( 'mal', '-Pilih-', 'en', '-Choose-'); ?></option>
				<?php 
				
					while($row=mysql_fetch_array($r)){?>
					<option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jangkut->id_jentera[$bb]){?>selected="selected"<?php } ?>>
				<?= $row['nama_jentera'];?>
				</option>
				<?php } ?>
			</select>
			
		<div id="pengangkutan_lain<?= $bb; ?>" class="<?php if($jangkut->nama_jentera[$b]!=""){echo "show";} else{echo "hide";}?>">
            <?php if($_SESSION['view']!="true"){ ?><input type="text" name="lain_pengangkutan[<?= $bb; ?>]" id="lain_pengangkutan[<?= $bb; ?>]" size="25" value="<?= ucwords($jangkut->nama_jentera[$bb]);?>" />
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= ucwords($jangkut->nama_jentera[$bb]);?>
<?php } ?>
        </div>
        </div>
	</td>
    <td><a href="javascript:add_angkut('bbts')"><?php if($_SESSION['view']!="true"){ ?><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" />
<?php } ?></a></td>
    <td>
		<div align="center">
			<?php if($_SESSION['view']!="true"){ ?><input type="text" class="field_active" name="bil_pengangkutan[<?= $bb; ?>]" onKeypress="keypress(event)" size="11" id="bil_pengangkutan[<?= $bb; ?>]" value="<?= $jangkut->value[$bb];?>" onchange="tukar_format2(this)" autocomplete="off" onblur="pitmid = true; hantar(2, 'sementara');"/>
<?php } ?>

<?php if($_SESSION['view']=="true"){ ?><?= $jangkut->value[$bb];?>
<?php } ?>
        </div>
	</td>
</tr>
<?php } ?>
<!-- End -->
    </table></td>
  </tr>
  

  <tr>
    <td colspan="2"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <div align="center">
        <div align="center">
          <div align="center"><br />
            <?php
		  	if(isset($_GET['print'])) {
		  ?>
            <input type="submit" value="Print" />
            <?php
		   }
		   else {
		  ?><div id="no-print">
         
         <?php if($_SESSION['view']!="true"){ ?>



          <input type="button" name="simpan_sementara" id="simpan_sementara" value=<?=setstring ( 'mal', '"Simpan Sementara"', 'en', '"Save Temporarily"'); ?> onclick="hantar(2,'sementara');" />
        <input type="button" name="simpan" id="simpan" value=<?=setstring ( 'mal', '"Simpan &amp; Sahkan"', 'en', '"Save &amp; Verify"'); ?> onclick="pitmid = true; hantar(1, 'sahkan');" />
        <input name="cetak" type="button" value=<?=setstring ( 'mal', '"Cetak"', 'en', '"Print"'); ?>
 onclick="window.print()" /><?php } ?>
        <br />
            </div>
            <?php
			}
			?>
          </div>
        </div>
      </div></td>
  </tr>
</table>
</form>
