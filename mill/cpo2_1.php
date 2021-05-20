<?php
$variable[0]=$_SESSION['lesen'];
$variable[1]=$_SESSION['tahun'];
$valueTahunSebelum[0]=$session_lesen;
$valueTahunSebelum[1]=$_SESSION['tahun']-1;

$bts2 = new user('pemprosesan',$variable);

if($bts2->total==0)
{
	$con =connect();
	$q="INSERT INTO mill_pemprosesan (
lesen ,
tahun ,
kp_1 ,
kp_2 ,
kp_3 ,
kp_4 ,
kp_5 ,
kp_6 ,
kp_7 ,
kp_8 ,
kp_9 ,
kp_10 ,
kp_11 ,
kp_12 ,
kp_13 ,
kp_14 ,
kp_15 ,
total_kp,status
)
VALUES (
'".$_SESSION['lesen']."', '".$_SESSION['tahun']."', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,'0'
)
";
	$r=mysqli_query($con, $q);
}
// print($q);

$pu[0] = $_SESSION['lesen'];
$pu[1]= $_SESSION['tahun']-1;
$bts = new user('bts',$pu);


$proses = new user('pemprosesan',$variable);
$prosesTahunSebelum = new user('pemprosesan',$valueTahunSebelum);

$total_bts_tan_lepas = $prosesTahunSebelum->kp_1 = $prosesTahunSebelum->kp_2 + $prosesTahunSebelum->kp_3 + $prosesTahunSebelum->kp_4 + $prosesTahunSebelum->kp_5 + $prosesTahunSebelum->kp_6 +
$prosesTahunSebelum->kp_7 + $prosesTahunSebelum->kp_8 + $prosesTahunSebelum->kp_9 + $prosesTahunSebelum->kp_10 + $prosesTahunSebelum->kp_11 + $prosesTahunSebelum->kp_12 + $prosesTahunSebelum->kp_13 +
$prosesTahunSebelum->kp_14 + $prosesTahunSebelum->kp_15;

function kiraPerubahan($valueBaru, $valueLama){
	//echo $valueLama."<br>";
	$result = (($valueBaru - $valueLama)/$valueLama) * 100;
	return number_format($result,2);
}
?>
<?php  $bts->fbb_proses; ?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>
<script type="text/javascript">
 <?php //echo $bts->bts;?>
var bts_lepas = 0;
var tan_lepas = <?php echo $bts->fbb_proses ?? 0; ?>;

	function field_blur(obj, bts_tan, bts_beza, nilai,nilai_asal, total_nilai,total_bts_tan, total_bts_beza) {
		if(number_only(obj)) {

			jumlah_all =0;
			for(e=1; e<=15; e++ ){
			jumlah= document.getElementById("kp_"+e).value;
			jumlah = jumlah.replace(/,/g,"");
			jumlah_all = Number(jumlah_all)+Number(jumlah);
			$("#kp_"+e).format({format:"#,###.00", locale:"us"});
			}
			document.getElementById("total_kp").value=jumlah_all;
			$("#total_kp").format({format:"#,###.00", locale:"us"});

			jumlahbts_all =0;

			all_kiraan =0;
			for(b=1; b<=15; b++ ){

			kos= document.getElementById("kp_"+b).value;
			kos = kos.replace(/,/g,"");
			//alert(kos);

			all_kiraan = Number(all_kiraan)+Number(kos);

			bts = Number(kos)/Number(tan_lepas);
			bts = bts;
			//alert(bts);
			$("#bts_tan_"+b).html(bts);
			$("#bts_tan_"+b).format({format:"#,###.00", locale:"us"});

			jumlahbts_all = Number(jumlahbts_all)+Number(bts);
			}

			//alert(all_kiraan);
			$("#total_bts_tan").html(jumlahbts_all);
			$("#total_bts_tan").format({format:"#,###.00", locale:"us"});

			total_all=document.getElementById(total_nilai).value;
				total_all = total_all.replace(",","");
				total_btstan=document.getElementById(total_bts_tan).innerHTML;
				total_btstan = total_btstan.replace(",","");

 				total_bersih=Number(total_all)-Number(nilai_asal);
				total_bersih = bulatkan(total_bersih);
				new_value=Number(total_bersih)+Number(nilai);
				new_value=bulatkan(new_value);
				document.getElementById(total_nilai).value=all_kiraan;
				//nilai total

				nilai_bts_tan = Number(nilai)/tan_lepas;
				nilai_bts_tan = bulatkan(nilai_bts_tan);
				nilai_total_bts_tan = total_btstan-Number(document.getElementById(bts_tan).innerHTML)+nilai_bts_tan;
				$("#"+total_bts_tan).html(nilai_total_bts_tan);
				$("#"+bts_tan).html(nilai_bts_tan);

				$(obj).format({format:"#,###.00", locale:"us"});
				$("#"+total_nilai).format({format:"#,###.00", locale:"us"});
				$("#"+total_bts_tan).format({format:"#,###.00", locale:"us"});

				$("#"+bts_tan).format({format:"#,###.00", locale:"us"});
				$("#"+bts_beza).format({format:"#,###.00", locale:"us"});

		}
		else {
			$("#" + obj_id).html("0.00");
		}
		$(obj).format({format:"#,###.00", locale:"us"});
	}
	function field_click(obj) {
		$(obj).format({format:"#,###.00", locale:"us"});
		$(obj).removeClass("field_edited");
		$(obj).addClass("field_active");
	}

</script>

<script language="javascript">
	function hantar(x)
	{
		document.form1.action = "save_pemprosesan.php?status="+x;
		document.form1.target = "_parent";
		document.form1.submit();
	}
</script>
<script language="javascript">
function hantar(x,y)
{
	document.form1.action = "save_pemprosesan.php?status="+x+"&simpanstatus="+y;
	document.form1.target = "_parent";
	document.form1.submit();
}
</script>

<script type="text/javascript" src="../ui/ui.core.js"></script>
<script type="text/javascript" src="../ui/ui.dialog.js"></script>


<script language="javascript">
var pitmid = false;
	window.onbeforeunload=function() {
		if(pitmid == false)
			var ok = confirm("<?=setstring ( 'mal', 'Simpan sebelum keluar?', 'en', 'Save before proceed?'); ?>");
				if(ok == true) {
					document.form1.action='save_pemprosesan.php?status=0';
					document.form1.submit();
				}
	}
</script>

<form id="form1" name="form1" method="post" action="save_pemprosesan.php">
  <table width="90%" align="center" cellspacing="0" class="tableCss" style="-moz-border-radius:5px;">
    <tr>
      <td height="34" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td height="34" colspan="4"><span class="style1"><?=setstring ( 'mal', 'KOS PEMPROSESAN', 'en', 'PROCESSING COST'); ?>
</span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td width="426" height="26" bgcolor="#FFCCFF"><strong><?=setstring ( 'mal', 'Jumlah BTS diproses pada tahun  ', 'en', 'Total of Processed FFB on Year'); ?>
	<?php  /* <td width="426" height="26" bgcolor="#FFCCFF"><strong><?=setstring ( 'mal', 'Jumlah BTS diproses pada tahun lepas ', 'en', 'Total of Processed FFB on Last Year'); ?> */ ?>

	<span class="style2">
	<?php
	$tahun = $_SESSION['tahun'];
	echo $tahun_sebelum = $tahun - 1;
	?>
</strong></td>

      <td colspan="3" bgcolor="#FFCCFF"><label><strong>
<?php $d =$bts->fbb_proses; echo number_format($d,2);
?>
<?=setstring ( 'mal', 'Tan', 'en', 'Tonne'); ?>
</strong></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="136">&nbsp;</td>
      <td width="157">&nbsp;</td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td height="628" colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable">
          <tr>
            <td height="47" colspan="2" align="right" background="../images/tb_BG.gif"><div align="left"><strong><?=setstring ( 'mal', 'Jenis Kos', 'en', 'Cost Type'); ?>
</strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Kos', 'en', 'Cost'); ?>
 <br />
              (RM)</strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?>
<br />
              (RM)</strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Perubahan Kos Per Tan BTS dengan Tahun Lepas', 'en', 'Different of Cost Per Tonne FFB with Last Year'); ?>
</strong> <br />
                    <strong>(%)</strong></div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td width="28" height="51" align="center" valign="middle">1.</td>
            <td width="311"><span id="s1"><?=setstring ( 'mal', 'Air, bahan kimia dan bekalan tenaga', 'en', 'Water, chemical and power'); ?>
&nbsp;</span></td>
            <td width="164" align="center" valign="middle"><label>
                <div align="center">
                  <input name="kp_1" type="text" class="field_active" id="kp_1" onchange="field_blur(this,'bts_tan_1','bts_beza_1',this.value,'<?= $proses->kp_1; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_1,2); ?>" />
                  </label>
              </div></td>
            <td width="166" align="center" valign="middle"><div align="center" id="bts_tan_1"><?php $k1=$proses->kp_1/$d; echo number_format($k1,2);?></div></td>
            <td width="188" align="center" valign="middle"><div align="center" id="bts_beza_1"><?php echo kiraPerubahan($k1, $prosesTahunSebelum->kp_1/$d); ?></div></td>
          </tr>
          <tr>
            <td height="36" align="center" valign="middle">2.</td>
            <td><?=setstring ( 'mal', 'Bahan bakar dan minyak pelincir', 'en', 'Fuel and Lubricant'); ?>
&nbsp;</td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_2" type="text" class="field_active" id="kp_2" onchange="field_blur(this,'bts_tan_2','bts_beza_2',this.value,'<?= $proses->kp_2; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_2,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_2"><?php $k2=$proses->kp_2/$d; echo number_format($k2,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_2"><?php echo kiraPerubahan($k2, $prosesTahunSebelum->kp_2/$d); ?></div>
            </div></td>
          </tr>
          <tr>
            <td height="34" align="center" valign="middle" bgcolor="#99FF99">3.</td>
            <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Buruh kilang sawit', 'en', 'Mill Worker'); ?>
&nbsp;</td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <input name="kp_3" type="text" class="field_active" id="kp_3" onchange="field_blur(this,'bts_tan_3','bts_beza_3',this.value,'<?= $proses->kp_3; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_3,2); ?>" />
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_tan_3"><?php $k3=$proses->kp_3/$d; echo number_format($k3,2);?></div>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_beza_3"><?php echo kiraPerubahan($k3, $prosesTahunSebelum->kp_3/$d); ?></div>
            </div></td>
          </tr>
          <tr>
            <td height="32" align="center" valign="middle">4.</td>
            <td><?=setstring ( 'mal', 'Kawalan efluen', 'en', 'Effluent Control'); ?>
</td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_4" type="text" class="field_active" id="kp_4" onchange="field_blur(this,'bts_tan_4','bts_beza_4',this.value,'<?= $proses->kp_4; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_4,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_4"><?php $k4=$proses->kp_4/$d; echo number_format($k4,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_4">
                <div align="center"><?php echo kiraPerubahan($k4, $prosesTahunSebelum->kp_4/$d); ?></div>
            </div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td height="35" align="center" valign="middle">5.</td>
            <td><?=setstring ( 'mal', 'Pengurusan dan pentadbiran', 'en', 'Management and Administration'); ?>
</td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_5" type="text" class="field_active" id="kp_5" onchange="field_blur(this,'bts_tan_5','bts_beza_5',this.value,'<?= $proses->kp_5; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_5,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_5"><?php $k5=$proses->kp_5/$d; echo number_format($k5,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_5"><?php echo kiraPerubahan($k5, $prosesTahunSebelum->kp_5/$d); ?></div>
            </div></td>
          </tr>
          <tr>
            <td height="34" align="center" valign="middle">6.</td>
            <td><?=setstring ( 'mal', 'Perbelanjaan pejabat', 'en', 'Office Expenses'); ?>
&nbsp;</td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_6" type="text" class="field_active" id="kp_6" onchange="field_blur(this,'bts_tan_6','bts_beza_6',this.value,'<?= $proses->kp_6; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_6,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_6"><?php $k6=$proses->kp_6/$d; echo number_format($k6,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_6"><?php echo kiraPerubahan($k6, $prosesTahunSebelum->kp_6/$d); ?></div>
            </div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td height="35" align="center" valign="middle">7.</td>
            <td><?=setstring ( 'mal', 'Persampelan dan ujian makmal', 'en', 'Sampling and laboratory testing'); ?>
</td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_7" type="text" class="field_active" id="kp_7" onchange="field_blur(this,'bts_tan_7','bts_beza_7',this.value,'<?= $proses->kp_7; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_7,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_7"><?php $k7=$proses->kp_7/$d; echo number_format($k7,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_7"><?php echo kiraPerubahan($k7, $prosesTahunSebelum->kp_7/$d); ?></div>
            </div></td>
          </tr>
          <tr>
            <td height="36" align="center" valign="middle">8.</td>
            <td><?=setstring ('mal','Kebajikan buruh yang tidak dibayar terus kepada pekerja', 'en', 'Labour welfare not paid directly to workers')?> </td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_8" type="text" class="field_active" id="kp_8" onchange="field_blur(this,'bts_tan_8','bts_beza_8',this.value,'<?= $proses->kp_8; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_8,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_8"><?php $k8=$proses->kp_8/$d; echo number_format($k8,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_8"><?php echo kiraPerubahan($k8, $prosesTahunSebelum->kp_8/$d); ?></div>
            </div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td height="37" align="center" valign="middle">9.</td>
            <td><?=setstring ('mal','Penaikkan taraf kilang ' , 'en', 'Mill upgrading')?> <br /></td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_9" type="text" class="field_active" id="kp_9" onchange="field_blur(this,'bts_tan_9','bts_beza_9',this.value,'<?= $proses->kp_9; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_9,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_9"><?php $k9=$proses->kp_9/$d; echo number_format($k9,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_9"><?php echo kiraPerubahan($k9, $prosesTahunSebelum->kp_9/$d); ?></div>
            </div></td>
          </tr>
          <tr>
            <td height="39" align="center" valign="middle">10.</td>
            <td> <?=setstring ('mal', 'Penjagaan dan pembaikan kilang sawit', 'en', 'Maintenance and repair of palm oil mill')?> &nbsp;<br /></td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_10" type="text" class="field_active" id="kp_10" onchange="field_blur(this,'bts_tan_10','bts_beza_10',this.value,'<?= $proses->kp_10; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_10,2); ?>" />
              </div>            </td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_10"><?php $k10=$proses->kp_10/$d; echo number_format($k10,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_10"><?php echo kiraPerubahan($k10, $prosesTahunSebelum->kp_10/$d); ?></div>
            </div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td height="40" align="center" valign="middle">11.</td>
            <td><?=setstring ('mal','Sewa, cukai tanah, yuran', 'en', 'Rents, land quit rent, fees')?></td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_11" type="text" class="field_active" id="kp_11" onchange="field_blur(this,'bts_tan_11','bts_beza_11',this.value,'<?= $proses->kp_11; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_11,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_11"><?php $k11=$proses->kp_11/$d; echo number_format($k11,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_11"><?php echo kiraPerubahan($k11, $prosesTahunSebelum->kp_11/$d); ?></div>
            </div></td>
          </tr>
          <tr>
            <td height="37" align="center" valign="middle">12.</td>
            <td><?=setstring ('mal','Kawalan keselamatan kilang sawit', 'en','Palm oil mill security' ) ?> </td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_12" type="text" class="field_active" id="kp_12" onchange="field_blur(this,'bts_tan_12','bts_beza_12',this.value,'<?= $proses->kp_12; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_12,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_12"><?php $k12=$proses->kp_12/$d; echo number_format($k12,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_12"><?php echo kiraPerubahan($k12, $prosesTahunSebelum->kp_12/$d); ?></div>
            </div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td height="38" align="center" valign="middle">13.</td>
            <td><?=setstring ('mal', 'Penyelidikan dan pembangunan kilang sawit', 'en', 'Palm oil mill research and development')?> <br /></td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_13" type="text" class="field_active" id="kp_13" onchange="field_blur(this,'bts_tan_13','bts_beza_13',this.value,'<?= $proses->kp_13; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_13,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_13"><?php $k13=$proses->kp_13/$d; echo number_format($k13,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_13"><?php echo kiraPerubahan($k13, $prosesTahunSebelum->kp_13/$d); ?></div>
            </div></td>
          </tr>
          <tr>
            <td height="36" align="center" valign="middle">14.</td>
            <td><?=setstring ('mal', 'Susutnilai kilang sawit', 'en', 'Depreciation of palm oil mill')?> </td>
            <td align="center" valign="middle"><div align="center">
                <input name="kp_14" type="text" class="field_active" id="kp_14" onchange="field_blur(this,'bts_tan_14','bts_beza_14',this.value,'<?= $proses->kp_14; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_14,2); ?>" />
            </div></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_14"><?php $k14=$proses->kp_14/$d; echo number_format($k14,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_14">
                <div align="center"><?php echo kiraPerubahan($k14, $prosesTahunSebelum->kp_14/$d); ?></div>
            </div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td height="37" align="center" valign="middle">15.</td>
            <td><?=setstring ('mal','Bayaran pengurusan Ibu Pejabat', 'en','Headquaters management charges')?></td>
            <td align="center" valign="middle"><input name="kp_15" type="text" class="field_active" id="kp_15" onchange="field_blur(this,'bts_tan_15','bts_beza_15',this.value,'<?= $proses->kp_15; ?>','total_kp','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->kp_15,2); ?>" /></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_15"><?php $k15=$proses->kp_15/$d; echo number_format($k15,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_15"><?php echo kiraPerubahan($k15, $prosesTahunSebelum->kp_15/$d); ?></div>
            </div></td>
          </tr>
          <tr>
            <td height="17" align="center" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><div align="center"></div></td>
            <td align="center" valign="middle"><div align="center"></div></td>
            <td align="center" valign="middle"><div align="center"></div></td>
          </tr>
          <tr>
            <td height="33" align="center" valign="middle">&nbsp;</td>
            <td><div align="right"><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?></div></td>
            <td align="center" valign="middle" bgcolor="#FFCC66"><div align="center">
                <input name="total_kp" type="text" class="field_active" id="total_kp" onblur="field_blur(this)" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($proses->total_kp,2); ?>" />
            </div></td>
            <td align="center" valign="middle" bgcolor="#FFCC66"><div align="center" id="total_bts_tan"><?php $total_bts_tan = $k1+$k2+$k3+$k4+$k5+$k6+$k7+$k8+$k9+$k10+$k11+$k12+$k13+$k14+$k15; echo number_format($total_bts_tan,2);?></div></td>
            <td align="center" valign="middle" bgcolor="#FFCC66"><div align="center" id="total_bts_beza"><?php echo kiraPerubahan($total_bts_tan, $total_bts_tan_lepas); ?></div></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><div align="center">
          <?php
		  	if(isset($_GET['print'])) {
		  ?>
          <input name="submit" type="submit" value="Print" />
          <?php
		   }
		   else {
		  ?>
          <input type="button" name="button2" id="button2" value=<?=setstring ( 'mal', '"Simpan"', 'en', '"Save"'); ?> onclick="hantar(2,'sementara');" />
          <input type="button" name="button" id="button" value=<?=setstring ( 'mal', '"Simpan &amp; Seterusnya"', 'en', '"Save &amp; Next"'); ?> onclick="pitmid=true; hantar(1, 'sahkan');"/>
          <input name="cetak" type="button" value="<?php echo setstring ( 'mal', 'Kembali', 'en', 'Back'); ?>" onclick="window.location.href='home.php?id=profile'"   />
          <?php
			}
			?>
          <input name="lesen" type="hidden" id="lesen" value="<?= $_SESSION['lesen'];?>" />
          <input name="tahun" type="hidden" id="tahun" value="<?= $_SESSION['tahun'];?>" />
      </div></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </table>
</form>
