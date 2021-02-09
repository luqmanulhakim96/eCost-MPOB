<?php
if($nilai->total==0)
{
$con = connect();
$q="INSERT INTO kos_belum_matang (
pb_tahun ,
pb_thisyear ,
lesen ,
pb_type ,
a_1 ,
a_2 ,
a_3 ,
a_4 ,
a_5 ,
a_6 ,
a_7 ,
a_8 ,
a_9 ,
a_10 ,
a_11 ,
total_a ,
b_1a ,
b_1b ,
b_1c ,
total_b_1 ,
total_b_2 ,
b_3a ,
b_3b ,
b_3c ,
b_3d ,
total_b_3 ,
total_b_4 ,
total_b_5 ,
total_b_6 ,
total_b_7 ,
total_b_8 ,
total_b_9 ,
total_b_10 ,
total_b_11 ,
total_b_12 ,
total_b_13 ,
total_b_14 ,
total_b ,
status
)
VALUES (
'$year', '".$_SESSION['tahun']."', '".$_SESSION['lesen']."', '".$t."', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'
);
";
$r=mysqli_query($con, $q);
}

if($t=="Penanaman Semula"){$table="tanam_semula";$data="tanaman_semula";}
if($t=="Penanaman Baru"){$table="tanam_baru";$data = "tanaman_baru";}
if($t=="Penukaran"){$table="tanam_tukar";$data = "tanaman_tukar"; }
$con = connect();

$ft = $_SESSION['tahun'];
$st = $ft[2].$ft[3];

$tahunsebelum = $st-$year;
if(strlen($tahunsebelum) == 1)
{
	  $tahunsebelum = '0'.$tahunsebelum;
}

$table = $table.$tahunsebelum;

$qblm="SELECT sum($data) as $data FROM $table WHERE lesen = '".$_SESSION['lesen']."' group by lesen";
//echo $qblm;
$rblm=mysqli_query($con, $qblm);
$rowblm= mysqli_fetch_array($rblm);
$totalblm = mysqli_num_rows($rblm);

$data = $rowblm[$data];
?>
<script language="javascript">
function hantar(x)
{
	document.form1.action = "save_kos_belum_matang.php?status="+x;
	document.form1.target = "_parent";
	document.form1.submit();
}
</script>

<link rel="stylesheet" href="../text_style.css" type="text/css" />
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
		$("#helper").show('slow');
	}

	function sembunyi_bantu() {
		$("#helper").hide('slow');
	}
</script>
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>
<script type="text/javascript">
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
function kiraan_baru(obj,jenis)
{
var tanambaru = <?php echo $data;?>;


	if(number_only(obj)) {

					jumlah_jaga =0;
					jumlah_jaga_kos = 0;

					if(jenis=="anak"){
					a = document.getElementById("b_1a").value;
					a = a.replace(/,/g,"");
					a1 = Number(a)/Number(tanambaru);
					$("#j1").html(a1);
					$("#j1").format({format:"#,###.00", locale:"us"});

					b = document.getElementById("b_1b").value;
					b = b.replace(/,/g,"");
					b1 = Number(b)/Number(tanambaru);
					$("#j2").html(b1);
					$("#j2").format({format:"#,###.00", locale:"us"});

					c = document.getElementById("b_1c").value;
					c = c.replace(/,/g,"");
					c1 = Number(c)/Number(tanambaru);
					$("#j3").html(c1);
					$("#j3").format({format:"#,###.00", locale:"us"});

					abc = Number(a)+Number(b)+Number(c);
					document.getElementById("total_b_1").value=abc;
					$("#total_b_1").format({format:"#,###.00", locale:"us"});

					d = document.getElementById("b_3a").value;
					d = d.replace(/,/g,"");
					d1 = Number(d)/Number(tanambaru);
					$("#j5").html(d1);
					$("#j5").format({format:"#,###.00", locale:"us"});

					e = document.getElementById("b_3b").value;
					e = e.replace(/,/g,"");
					e1 = Number(e)/Number(tanambaru);
					$("#j6").html(e1);
					$("#j6").format({format:"#,###.00", locale:"us"});

					f = document.getElementById("b_3c").value;
					f = f.replace(/,/g,"");
					f1 = Number(f)/Number(tanambaru);
					$("#j7").html(f1);
					$("#j7").format({format:"#,###.00", locale:"us"});

					g = document.getElementById("b_3d").value;
					g = g.replace(/,/g,"");
					g1 = Number(g)/Number(tanambaru);
					$("#j8").html(g1);
					$("#j8").format({format:"#,###.00", locale:"us"});

					defg = Number(d)+Number(e)+Number(f)+Number(g);
					document.getElementById("total_b_3").value=defg;
					$("#total_b_3").format({format:"#,###.00", locale:"us"});
					}

					for(j=1; j<=14; j++ ){
					jumlahj= document.getElementById("total_b_"+j).value;
					jumlahj = jumlahj.replace(/,/g,"");

					jumlah_jaga = Number(jumlah_jaga)+Number(jumlahj);//kos penjagaan
					jumlahj_kos = Number(jumlahj)/Number(tanambaru);
					jumlahj_kos = bulatkan(jumlahj_kos);
					jumlah_jaga_kos = Number(jumlah_jaga_kos)+Number(jumlahj_kos);//kos perbelanjaan per ha

					$("#total_b_"+j).format({format:"#,###.00", locale:"us"});
					$("#jaga"+j).html(jumlahj_kos);
					$("#jaga"+j).format({format:"#,###.00", locale:"us"});

					}

					document.getElementById("total_kos_b").value=jumlah_jaga;

					$("#total_kos_b").format({format:"#,###.00", locale:"us"});
					$("#total_all_per_ha").html(jumlah_jaga_kos);
					$("#total_all_per_ha").format({format:"#,###.00", locale:"us"});
                                        $("#total_b_kos_per_hektar").val(jumlah_jaga_kos);



					//------------------------------------------------- keseluruhan -------------------------------------
		}
		else {
			$("#" +obj).html("0.00");
		}
		$(obj).format({format:"#,###.00", locale:"us"});

}
</script>


<script language="javascript">
	var pitmid = false;
	window.onbeforeunload=function() {
		if(pitmid == false)
			var ok = confirm("<?=setstring ( 'mal', 'Simpan sebelum keluar?', 'en', 'Save before proceed?'); ?>");
				if(ok == true){
							document.form1.action='save_kos_belum_matang.php?status=<?= $nilai->status; ?>';
  							document.form1.submit();
				}
	}
</script>

<form id="form1" name="form1" method="post" action="">
  <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><span class="style7"><?=setstring ( 'mal', 'MAKLUMAT KAWASAN BELUM MATANG  BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
       <span style="text-transform:uppercase; color:#FF3300;">
	   <?php
			if($t=='Penanaman Semula'){
				echo setstring ( 'mal', 'Penanaman Semula', 'en', 'Replanting');
			}
			else if($t=='Penanaman Baru'){
				echo setstring ( 'mal', 'Penanaman Baru', 'en', 'New Planting');
			}
			else{
				echo setstring ( 'mal', 'Penukaran', 'en', 'conversion');
			}
		?>
	   </span>
      <?=setstring ( 'mal', 'TAHUN ', 'en', 'YEAR'); ?>
      <?php
	if($_GET['year'] == "1"){ echo setstring ( 'mal', 'PERTAMA', 'en', '1'); $x=1; }
	else if($_GET['year'] == "2") {echo setstring ( 'mal', 'KEDUA', 'en', '2');$x=2;}
	else {echo setstring ( 'mal', 'KETIGA', 'en', '3'); $x=3; }
	 ?>
    </span></td>
  </tr>

  <tr>
    <td><span class="style7">(
    <?=setstring ( 'mal', 'DITANAM PADA TAHUN', 'en', 'PLANTED IN YEAR'); ?>
     <?php echo $ts = $tahunsemasa-$x; ?>)</span></td>
    <td colspan="3"><span class="style8"></span></td>
  </tr>
  <tr>
    <td width="456">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <!--<tr>
    <td height="31" colspan="4"><strong><?=setstring ( 'mal', 'Keluasan kawasan penanaman baru tahun pertama pada tahun lepas (terakhir dari e-SUB)', 'en', 'Total of last year new planting area at year one (last from e-SUB)'); ?></strong></td>
    </tr>
  <tr>
    <td height="31"><span style="color:#0000CC; font-weight:bold;"><?= number_format($data,2);?></span>
      &nbsp;<?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></td>
    <td colspan="3">&nbsp;</td>
  </tr>-->
  <tr>
    <td height="31" colspan="4"><strong><?=setstring ( 'mal', 'Keluasan', 'en', 'Area'); ?></strong></td>
    </tr>
  <tr>
    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($data,2);?></span> &nbsp;<?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><b><?=setstring ( 'mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?> </b></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td width="128">&nbsp;</td>
    <td width="214">&nbsp;</td>
    <td width="181">&nbsp;</td>
    </tr>

  <tr>
    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;">
      <tr>
        <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3"></div></td>
        <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?=setstring ('mal','Penjagaan', 'en', 'Upkeep')?></div></td>
        <td background="../images/tb_BG.gif"><div align="center" class="style3"><?=setstring ( 'mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
        <td background="../images/tb_BG.gif"><div align="center" class="style3"><?=setstring ( 'mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
        <div align="center" class="style3"> (RM)</div></td>
        </tr>

      <tr>
        <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
        <td width="428" bgcolor="#99FF99"><?=setstring ('mal', 'Meracun','en', 'Weeding')?> &nbsp;</td>
        <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
  <input name="total_b_1" type="text" id="total_b_1"  style="font-weight:bold; text-align:center" value="<?php

  if($nilai->total_b_1==0){
  $nilai->total_b_1 = $nilai->b_1a+$nilai->b_1b+$nilai->b_1c;
  echo number_format($nilai->total_b_1,2);
  }
  else{
  echo number_format($nilai->total_b_1,2);
  }
   ?>" size="15" class="field_active" onchange="kiraan_baru(this,'');" onKeypress="keypress(event)" onblur="$('#b_1a, #b_1b, #b_1c').attr('disabled','disabled')" />
        </div></td>
        <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 =($nilai->total_b_1/$data); echo number_format($y1,2); ?></span></div></td>
        </tr>
      <tr>
        <td height="38" align="right">&nbsp;</td>
        <td bgcolor="#CCCCFF">i. <?=setstring ( 'mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
        <td bgcolor="#CCCCFF"><div align="center">
          <input name="b_1a" type="text" class="field_active" id="b_1a" onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_1').attr('disabled','disabled')" value="<?= number_format($nilai->b_1a,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $y1 =($nilai->b_1a/$data); echo number_format($y1,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="38" align="right">&nbsp;</td>
        <td bgcolor="#CCCCFF">ii. <?=setstring ( 'mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
        <td bgcolor="#CCCCFF"><div align="center">
          <input name="b_1b" type="text" class="field_active" id="b_1b" onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_1').attr('disabled','disabled')" value="<?= number_format($nilai->b_1b,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $y1 =($nilai->b_1b/$data); echo number_format($y1,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="38" align="right">&nbsp;</td>
        <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?=setstring ( 'mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></span></td>
        <td bgcolor="#CCCCFF"><div align="center">
          <input name="b_1c" type="text" class="field_active" id="b_1c" onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_1').attr('disabled','disabled')" value="<?= number_format($nilai->b_1c,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $y1 =($nilai->b_1c/$data); echo number_format($y1,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#99FF99">2.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
        <td bgcolor="#99FF99"><div align="center">
          <input name="total_b_2" type="text" class="field_active" id="total_b_2" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_2,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
        <span id="jaga2"><?php $y1 =($nilai->total_b_2/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="37" align="right">3.</td>
        <td><?=setstring ( 'mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
        <td><div align="center" class="style10"><span class="style6">
          <input name="total_b_3" type="text" id="total_b_3"  style="font-weight:bold; text-align:center" value="<?php
          if($nilai->total_b_3==0){
		  $nilai->total_b_3=$nilai->b_3a+$nilai->b_3b+$nilai->b_3c;
		  echo number_format($nilai->total_b_3,2);
		  }
		  else{
		  echo number_format($nilai->total_b_3,2);
		  }
		  ?>" size="15" class="field_active" onKeypress="keypress(event)" onchange="kiraan_baru(this,'');" onblur="$('#b_3a, #b_3b, #b_3c, #b_3d').attr('disabled','disabled')" />
          </span></div></td>
        <td><div align="center" class="style10">
        <span id="jaga3"><?php $y1 =($nilai->total_b_3/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="39" align="right">&nbsp;</td>
        <td bgcolor="#FFFFCC">i. <?=setstring ( 'mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
        <td bgcolor="#FFFFCC"><div align="center">
          <input name="b_3a" type="text" class="field_active" id="b_3a" onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_3').attr('disabled','disabled')" value="<?= number_format($nilai->b_3a,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $y1 =($nilai->b_3a/$data); echo number_format($y1,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="39" align="right">&nbsp;</td>
        <td bgcolor="#FFFFCC">ii. <?=setstring ( 'mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
        <td bgcolor="#FFFFCC"><div align="center">
          <input name="b_3b" type="text" class="field_active" id="b_3b" onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_3').attr('disabled','disabled')" value="<?= number_format($nilai->b_3b,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $y1 =($nilai->b_3b/$data); echo number_format($y1,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="39" align="right">&nbsp;</td>
        <td bgcolor="#FFFFCC">iii. <?=setstring ( 'mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></td>
        <td bgcolor="#FFFFCC"><div align="center">
          <input name="b_3c" type="text" class="field_active" id="b_3c" onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_3').attr('disabled','disabled')" value="<?= number_format($nilai->b_3c,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $y1 =($nilai->b_3c/$data); echo number_format($y1,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="39" align="right">&nbsp;</td>
        <td bgcolor="#FFFFCC">iv. <?=setstring ( 'mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
        <td bgcolor="#FFFFCC"><div align="center">
          <input name="b_3d" type="text" class="field_active" id="b_3d" onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_3').attr('disabled','disabled')" value="<?= number_format($nilai->b_3d,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $y1 =($nilai->b_3d/$data); echo number_format($y1,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="39" align="right" bgcolor="#99FF99">4.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
        <td bgcolor="#99FF99"><div align="center">
          <input name="total_b_4" type="text" class="field_active" id="total_b_4" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_4,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <span id="jaga4"><?php $y1 =($nilai->total_b_4/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
        <td bgcolor="#FFFFFF"><?=setstring ( 'mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?></td>
        <td bgcolor="#FFFFFF"><div align="center">
          <input name="total_b_5" type="text" class="field_active" id="total_b_5" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_5,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#FFFFFF"><div align="center">
        <span id="jaga5"><?php $y1 =($nilai->total_b_5/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="40" align="right" bgcolor="#99FF99">6.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
        <td bgcolor="#99FF99"><div align="center">
          <input name="total_b_6" type="text" class="field_active" id="total_b_6" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_6,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
        <span id="jaga6"><?php $y1 =($nilai->total_b_6/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="38" align="right">7.</td>
        <td><?=setstring ( 'mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
        <td><div align="center">
          <input name="total_b_7" type="text" class="field_active" id="total_b_7" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_7,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td><div align="center">
         <span id="jaga7"><?php $y1 =($nilai->total_b_7/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="37" align="right" bgcolor="#99FF99">8.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
        <td bgcolor="#99FF99"><div align="center">
          <input name="total_b_8" type="text" class="field_active" id="total_b_8" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_8,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <span id="jaga8"><?php $y1 =($nilai->total_b_8/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
        <td bgcolor="#FFFFFF"><?=setstring ( 'mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
        <td bgcolor="#FFFFFF"><div align="center">
         <input name="total_b_9" type="text" class="field_active" id="total_b_9" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_9,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#FFFFFF"><div align="center">
          <span id="jaga9"><?php $y1 =($nilai->total_b_9/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="38" align="right" bgcolor="#99FF99">10.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
        <td bgcolor="#99FF99"><div align="center">
          <input name="total_b_10" type="text" class="field_active" id="total_b_10" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_10,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
         <span id="jaga10"><?php $y1 =($nilai->total_b_10/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="34" align="right" bgcolor="#FFFFFF">11.</td>
        <td bgcolor="#FFFFFF"><?=setstring ( 'mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
        <td bgcolor="#FFFFFF"><div align="center">
          <input name="total_b_11" type="text" class="field_active" id="total_b_11" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_11,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#FFFFFF"><div align="center">
          <span id="jaga11"><?php $y1 =($nilai->total_b_11/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="35" align="right" bgcolor="#99FF99">12.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
        <td bgcolor="#99FF99"><div align="center">
          <input name="total_b_12" type="text" class="field_active" id="total_b_12" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_12,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <span id="jaga12"><?php $y1 =($nilai->total_b_12/$data); echo number_format($y1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="38" align="right">13.</td>
        <td align="right"><div align="left"><?=setstring ( 'mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
        <td><div align="center">
          <input name="total_b_13" type="text" class="field_active" id="total_b_13" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_13,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td><div align="center">
          <span id="jaga13"><?php $y1 =($nilai->total_b_13/$data); echo number_format($y1,2); ?></span>
        </div></td>
      </tr>

      <tr bgcolor="#99FF99">
        <td height="36" align="right">14.</td>
        <td align="right"><div align="left"><?=setstring ( 'mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
        <td><div align="center">
          <input name="total_b_14" type="text" class="field_active" id="total_b_14" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_14,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td><div align="center">
          <span id="jaga14"><?php $y1 =($nilai->total_b_14/$data); echo number_format($y1,2); ?></span>
        </div></td>
      </tr>
      <tr>
        <td colspan="2" align="right">&nbsp;</td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        </tr>


    </table></td>
  </tr>


  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="44" colspan="2"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah kos', 'en', 'Total cost'); ?>
          <span style="text-transform:lowercase;">
		  <?php
			if($t=='Penanaman Semula'){
				echo setstring ( 'mal', 'penanaman semula', 'en', 'replanting');
			}
			else if($t=='Penanaman Baru'){
				echo setstring ( 'mal', 'penanaman baru', 'en', 'new planting');
			}
			else{
				echo setstring ( 'mal', 'penukaran', 'en', 'conversion');
			}
			?>
		</span> <?=setstring ( 'mal', 'tahun', 'en', 'year'); ?> <?php
	if($_GET['year'] == "1") echo setstring ( 'mal', 'pertama', 'en', '1');
	else if($_GET['year'] == "2") echo setstring ( 'mal', 'kedua', 'en', '2');
	else echo setstring ( 'mal', 'ketiga', 'en', '3');
	 ?> : </strong></div></td>
    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_b;?></span></strong><strong><span class="style6">
      <input name="total_kos_b" type="text" id="total_kos_b"  style="font-weight:bold; text-align:center" value="<?= number_format($nilai->total_b,2); ?>" size="15" readonly="true" onKeypress="keypress(event)" />
    </span></strong></div></td>
    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha">
        <?php $kph = (($total_all)/($data));
 //echo $kph.'<br>';
        $kph=round($kph,2, PHP_ROUND_HALF_UP); echo number_format($kph,2); ?></span></strong>
            <input name="total_b_kos_per_hektar" type="hidden" id="total_b_kos_per_hektar" value="<?php echo round($kph,2); ?>" />
    </div></td>
  </tr>
  <tr>
    <td colspan="4"><br /></td>
  </tr>
  <tr>
    <td colspan="4">
      <div align="center">
        <input name="thisyear" type="hidden" id="thisyear" value="<?= $tahunsemasa; ?>" />
        <input name="year" type="hidden" id="year" value="<?= $year; ?>" />
        <input name="type" type="hidden" id="type" value="<?= $t; ?>" />
<?php
		  	if(isset($_GET['print'])) {
		  ?>
        <input name="Button" type="button" value="Print" />
        <?php
		   }
		   else {
		  ?>
           <input type="button" name="simpan_sementara" id="simpan_sementara" value=<?=setstring ( 'mal', '"Simpan"', 'en', '"Save"'); ?> onclick="hantar(2);" />
        <input type="button" name="simpan" id="simpan" value=<?=setstring ( 'mal', '"Simpan & Seterusnya"', 'en', '"Save &amp; Next"'); ?> onclick="hantar(1);" />

         <input type="button" name="simpan" id="simpan" value=<?=setstring ( 'mal', '"Kembali"', 'en', '"Back"'); ?> onclick="history.go(-1);" />
            <?php
			}
			?>
      </div>
      <p align="center">&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
</table>


</form>
