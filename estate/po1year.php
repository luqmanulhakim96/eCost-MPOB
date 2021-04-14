<?php
// edited and done 22/06/2010
// print_r($nilai);
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
a_12,
a_13,
total_a ,
b_1a ,
b_1b ,
b_1c ,
total_b_1 ,
total_b_2 ,
b_3a ,
b_3b ,
b_3c ,

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
total_b_15 ,
total_b_16 ,
total_b ,
status
)
VALUES (
'$year', '".$_SESSION['tahun']."', '".$_SESSION['lesen']."', '".$t."', null, null,null,null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,  '0'
);
";
$r=mysqli_query($con, $q);
// print($q);
}
	// Check lesen exist in table tanam_semula, tanam_baru or tanam_tukar

	if($t=="Penanaman Semula"){
		$table="tanam_semula";
		$data="tanaman_semula";
		}
	if($t=="Penanaman Baru"){
		$table="tanam_baru";
		$data = "tanaman_baru";
		}
	if($t=="Penukaran"){
		$table="tanam_tukar";
		$data = "tanaman_tukar";
		}

		$con = connect();
		$ft = $_SESSION['tahun'];
		$st = $ft[2].$ft[3];

		$tahunsebelum = $st-$year;
		if(strlen($tahunsebelum==1)){
		 $table = $table.'0'.$tahunsebelum;
		}
		else{
		 $table = $table.$tahunsebelum;
		}

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


	var total_ha = <?php echo  $data;?>;
	var total_ha_avg = <?php echo  $data?>;

</script>
<script language="javascript">
function kiraan_baru(obj,jenis)
{
var tanambaru = <?php echo $data;?>;

	if(number_only(obj)) {

			jumlah_belanja =0;
			jumlah_belanja_kos =0;
			for(b=1; b<=13; b++ ){
			jumlahb= document.getElementById("a_"+b).value;
			jumlahb = jumlahb.replace(/,/g,"");

			jumlah_belanja = Number(jumlah_belanja)+Number(jumlahb);//kos perbelanjaan
			jumlahb_kos = Number(jumlahb)/Number(tanambaru);
			jumlahb_kos = bulatkan(jumlahb_kos);
			jumlah_belanja_kos = Number(jumlah_belanja_kos)+Number(jumlahb_kos);//kos perbelanjaan per ha

			$("#a_"+b).format({format:"#,###.00", locale:"us"});
			$("#kosha"+b).html(jumlahb_kos);
			$("#kosha"+b).format({format:"#,###.00", locale:"us"});

			}
			document.getElementById("total_kos_a").value=jumlah_belanja;
			$("#total_kos_a").format({format:"#,###.00", locale:"us"});
			$("#total_kos_per_ha_a").html(jumlah_belanja_kos);
			$("#total_kos_per_ha_a").format({format:"#,###.00", locale:"us"});
			//-------------------------- penjagaan ------------------------------------------

			jumlah_jaga =0;
			jumlah_jaga_kos = 0;

			if(jenis=="anak"){
			//alert(jenis);
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



			for(j=1; j<=16; j++ ){
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
			$("#total_kos_per_ha_b").html(jumlah_jaga_kos);
			$("#total_kos_per_ha_b").format({format:"#,###.00", locale:"us"});

			total_all = Number(jumlah_belanja)+Number(jumlah_jaga);
			$("#total_all").html(total_all);
			$("#total_all").format({format:"#,###.00", locale:"us"});

			total_all_per_ha = Number(jumlah_belanja_kos)+Number(jumlah_jaga_kos);
			$("#total_all_per_ha").html(total_all_per_ha);
			$("#total_all_per_ha").format({format:"#,###.00", locale:"us"});



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

<?php if(!$totalblm){ ?>
<table width="90%" align="center">
  <tr>
    <td colspan="3"><span class="style14"><?=setstring ( 'mal', 'Tiada data dari sistem e-sub <br />
    Tuan tidak perlu menjawab seksyen ini', 'en', 'Data is unavailable from the e-sub system <br /> You dont have to answer this section'); ?>
.</span></td>
  </tr>
  <tr>
    <td><strong><a href="home.php?id=matang&penjagaan"><?=setstring ( 'mal', 'Klik disini untuk ke halaman seterusnya', 'en', 'Click here to go to the next page'); ?>
</a></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php } ?>

<?php if($totalblm>0){ ?>
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-weight: bold}
-->
</style>

<form id="form1" name="form1" method="post" action="">
  <table align="center" width="90%" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss" style="background-color:#FFFFFF;">
	<input name="form_year" type="hidden" value="po1year"/> <? /*to differentiate between other PO year*/?>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><span class="style7">
       <?=setstring ( 'mal', 'MAKLUMAT KAWASAN BELUM MATANG BAGI', 'en', 'INFORMATION OF IMMATURE AREA FOR'); ?>
       <span style="text-transform:uppercase; color:#FF3300;">

	   <?php if($_GET['t']=="Penanaman Baru"){
	   	echo setstring('mal', 'Penanaman Baru', 'en', 'New Planting');
	   }
	   if($_GET['t']=="Penanaman Semula"){
	   	echo setstring('mal', 'Penanaman Semula', 'en', 'Replanting');
	   }
	   if($_GET['t']=="Penukaran"){
	   	echo setstring('mal', 'Penukaran', 'en', 'Conversion');
	   }	    ?>
       </span>

       <?php
	if($_GET['year'] == "1"){
		echo setstring('mal', 'TAHUN PERTAMA', 'en', 'FIRST YEAR');
		$x=1;
		}
	else if($_GET['year'] == "2") {
		echo setstring('mal', 'TAHUN KEDUA', 'en', 'SECOND YEAR');
		$x=2;
		}
	else {
		echo setstring('mal', 'TAHUN KETIGA', 'en', 'THIRD YEAR');
		$x=3;
		}
	 ?>
    </span></td>
  </tr>

  <tr>
    <td><span class="style7">(<?=setstring ( 'mal', 'DITANAM PADA', 'en', 'PLANTED IN YEAR'); ?> <?php echo $ts = $tahunsemasa-$x; ?>)</span></td>
    <td colspan="3"><span class="style8"></span></td>
  </tr>
  <tr>
    <td width="456">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
 <!-- <tr>
    <td height="31" colspan="4"><strong>
    <?=setstring ( 'mal', 'Keluasan kawasan penanaman baru tahun pertama pada tahun lepas (terakhir dari e-SUB)', 'en', 'Total of last year new planting area at year one (last from e-SUB)'); ?></strong></td>
    </tr>
  <tr>
    <td height="31"><span style="color:#0000CC; font-weight:bold;"><?php
	$keluasan_sub = $data;
	 echo number_format($keluasan_sub,2);?></span>
      &nbsp;<?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></td>
    <td colspan="3">&nbsp;</td>
  </tr>-->
  <tr>
    <td height="31" colspan="4"><strong><?=setstring ( 'mal', 'Keluasan ', 'en', 'Area'); ?></strong></td>
    </tr>
  <tr>
    <td colspan="4"><span style="color:#0000CC; font-weight:bold;" ><?php echo number_format($keluasan_sub,2);?></span> &nbsp;<?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><b><?=setstring ( 'mal', 'Jumlah kos mengikut operasi: ', 'en', 'Total cost according to operation: '); ?></b></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td width="128">&nbsp;</td>
    <td width="214">&nbsp;</td>
    <td width="181">&nbsp;</td>
    </tr>

  <tr>
    <td colspan="4">
    <table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;">
      <tr>
        <td height="40" align="right" background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="right" class="style1 style2 style11">a.  </div></td>
        <td height="34" align="right" background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="left" class="style12"><?=setstring ( 'mal', 'Perbelanjaan Tidak Berulang', 'en', 'Non-Recurrent Expenditures'); ?></div></td>
        <td background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="center" class="style12"><?=setstring ( 'mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style12">(RM)</div></td>
        <td background="../images/tb_BG.gif" bgcolor="#CC3366"><div align="center" class="style12"><?=setstring ( 'mal', 'Kos Per Hektar', 'en', 'Cost Per hectare'); ?></div>
        <div align="center" class="style12"> (RM)</div></td>
        </tr>

      <tr bgcolor="#99FF99">
        <td width="18" height="35" align="right">1.</td>
        <td width="429" bgcolor="#99FF99"><?=setstring ( 'mal', 'Menebang dan membersih kawasan', 'en', 'Felling and land clearing'); ?></td>
        <td width="163"><div align="center">
          <input name="a_1" type="text" class="field_active" id="a_1" value="<?= number_format($nilai->a_1,2); ?>" onchange="kiraan_baru(this,'')" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td width="138"><div align="center">
          <span id="kosha1"><?php $x1 =($nilai->a_1/$data); echo number_format($x1,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="38" align="right">2.</td>
        <td><?=setstring ('mal', 'Membuat teres dan landasan', 'en', 'Teracing and platform') ?> &nbsp;</td>
        <td><div align="center">
          <input name="a_2" type="text" class="field_active" id="a_2" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->a_2,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td><div align="center">
          <span id="kosha2"><?php $x2 =($nilai->a_2/$data); echo number_format($x2,2); ?></span>
        </div></td>
        </tr>


				<tr bgcolor="#99FF99">
					<td height="32" align="right">3.</td>
					<td><?=setstring ( 'mal', 'Membaris, melubang dan menanam', 'en', 'Lining, holing and planting'); ?>&nbsp;</td>
					<td bgcolor="#99FF99"><div align="center">
							<input name="a_13" type="text" class="field_active" id="a_13" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->a_13,2); ?>" onKeypress="keypress(event)" size="15"/>
					</div></td>
					<td bgcolor="#99FF99"><div align="center">
							<span id="kosha13"><?php $x13 =($nilai->a_13/$data); echo number_format($x13,2); ?></span>
						</div></td>
						 </tr>

						 <tr>
							 <td height="32" align="right" bgcolor="#FFFFFF">4.</td>
							 <td bgcolor="#FFFFFF" ><?=setstring ('mal','Pembinaan jalan, parit, ban & pintu air dan sebagainya', 'en', 'Construction of road, drain, bund watergate and etc')?>&nbsp;</td>
							 <td bgcolor="#FFFFFF"><div align="center">
									 <input name="a_12" type="text" class="field_active" id="a_12" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->a_12,2); ?>" onKeypress="keypress(event)" size="15"/>
							 </div></td>
						 <td bgcolor="#FFFFFF"><div align="center">
								 <span id="kosha12"><?php $x12 =($nilai->a_12/$data); echo number_format($x12,2); ?></span>
							 </div></td>
							 </tr>

				<?php /*
      <tr bgcolor="#99FF99">
        <td height="43" align="right">3.</td>
        <td><?=setstring ('mal', 'Pembinaan jalan', 'en', 'Road construction')?></td>
        <td><div align="center"> */ ?>
          <input name="a_3" type="hidden" class="field_active" id="a_3" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15"/>
<?php /*        </div></td>
        <td><div align="center">
          <span id="kosha3"><?php $x3 =($nilai->a_3/$data); echo number_format($x3,2); ?></span>
        </div></td>
        </tr> */?>


<?php /*
      <tr>
        <td height="34" align="right">4.</td>
        <td><?=setstring ('mal', 'Pembinaan parit', 'en', 'Drain construction')?> &nbsp;</td>
        <td><div align="center"> */?>
          <input name="a_4" type="hidden" class="field_active" id="a_4" onchange="kiraan_baru(this,'')"onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15"/>
<?php /*        </div></td>
        <td><div align="center">
          <span id="kosha4"><?php $x4 =($nilai->a_4/$data); echo number_format($x4,2); ?></span>
        </div></td>
        </tr> */?>

<?php /*
      <tr bgcolor="#99FF99">
        <td height="38" align="right">5.</td>
        <td><?=setstring ('mal', 'Pembinaan ban dan pintu air', 'en', 'Bund and watergate construction')?> </td>
        <td><div align="center"> */?>
          <input name="a_5" type="hidden" class="field_active" id="a_5" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15"/>
<?php /*         <td><div align="center">
          <span id="kosha5"><?php $x5 =($nilai->a_5/$data); echo number_format($x5,2); ?></span>
        </div></td>
        </tr> */?>

<?php /*
      <tr>
        <td height="31" align="right">6.</td>
        <td><?=setstring ('mal','Membaris', 'en', 'Lining') ?> &nbsp;</td>
        <td><div align="center"> */?>
          <input name="a_6" type="hidden" class="field_active" id="a_6" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15"/>
<?php /*        </div></td>
        <td><div align="center">
          <span id="kosha6"><?php $x6 =($nilai->a_6/$data); echo number_format($x6,2); ?></span>
        </div></td>
        </tr> */?>
<?php /*
      <tr bgcolor="#99FF99">
        <td height="31" align="right">7.</td>
        <td><?=setstring ('mal','Melubang dan menanam', 'en', 'Holing and planting' ) ?> &nbsp;</td>
        <td><div align="center"> */?>
          <input name="a_7" type="hidden" class="field_active" id="a_7" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15"/>
<?php /*        </div></td>
        <td><div align="center">
          <span id="kosha7"><?php $x7 =($nilai->a_7/$data); echo number_format($x7,2); ?></span>
        </div></td>
        </tr> */?>
      <tr>
        <td height="34" align="right" bgcolor="#99FF99">5.</td>
        <td bgcolor="#99FF99"><?=setstring ('mal', 'Pembajaan awal', 'en', 'Basal fertiliser') ?> &nbsp;</td>
        <td bgcolor="#99FF99"><div align="center">
          <input name="a_8" type="text" class="field_active" id="a_8" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->a_8,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <span id="kosha8"><?php $x8 =($nilai->a_8/$data); echo number_format($x8,2); ?></span>
        </div></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td height="32" align="right">6.</td>
        <td><?=setstring ('mal','Anak pokok sawit' , 'en', 'Seedlings') ?>&nbsp;</td>
        <td><div align="center">
          <input name="a_9" type="text" class="field_active" id="a_9" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->a_9,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td><div align="center">
          <span id="kosha9"><?php $x9 =($nilai->a_9/$data); echo number_format($x9,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="32" align="right" bgcolor="#99FF99">7.</td>
        <td bgcolor="#99FF99" ><?=setstring ('mal','Tanaman penutup bumi', 'en', 'Cover crops')?>&nbsp;</td>
        <td bgcolor="#99FF99" ><div align="center">
          <input name="a_10" type="text" class="field_active" id="a_10" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->a_10,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <span id="kosha10"><?php $x10 =($nilai->a_10/$data); echo number_format($x10,2); ?></span>
        </div></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td height="32" align="right">8.</td>
        <td><?=setstring ( 'mal', 'Perbelanjaan-perbelanjaan lain', 'en', 'Other expenditures'); ?>&nbsp;</td>
        <td><div align="center">
          <input name="a_11" type="text" class="field_active" id="a_11" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->a_11,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td><div align="center">
          <span id="kosha11"><?php $x11 =($nilai->a_11/$data); echo number_format($x11,2); ?></span>
        </div></td>
        </tr>




      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        </tr>
      <tr>
        <td height="45" align="right"><div align="right"></div></td>
        <td><div align="right"><strong><?=setstring ( 'mal', 'Jumlah kecil', 'en', 'Subtotal'); ?> (a) :</strong><strong> </strong></div></td>
        <td bgcolor="#FFCC66">

          <div align="center">
            <input name="total_kos_a" type="text" id="total_kos_a"  style="font-weight:bold; text-align:center" value="<?= number_format($nilai->total_a,2); ?>" size="15" readonly="true" />
          </div>          </td>
        <td bgcolor="#FFCC66"><div align="center"><strong>
          <span id="total_kos_per_ha_a"><?php $total_x = $x1+$x2+$x3+$x4+$x5+$x6+$x7+$x8+$x9+$x10+$x11+$x12+$x13; echo number_format($total_x,2);?></span>
        </strong>

        </div></td>
        </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
  	<td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable" style="margin:3px;">
      <tr>
        <td height="41" align="right" background="../images/tb_BG.gif"><div align="right" class="style3">b. </div></td>
        <td height="41" align="right" background="../images/tb_BG.gif"><div align="left" class="style3"><?=setstring ( 'mal', 'Penjagaan', 'en', 'Upkeep'); ?></div></td>
        <td background="../images/tb_BG.gif"><div align="center" class="style3"><?=setstring ( 'mal', 'Kos', 'en', 'Cost'); ?></div>          <div align="center" class="style3"> (RM)</div></td>
        <td background="../images/tb_BG.gif"><div align="center" class="style3"><?=setstring ( 'mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></div>
        <div align="center" class="style3"> (RM)</div></td>
        </tr>

      <tr>
        <td width="18" height="36" align="right" bgcolor="#99FF99"><div align="right">1.</div></td>
        <td width="428" bgcolor="#99FF99"><?=setstring ( 'mal', 'Meracun', 'en', 'Weeding'); ?> &nbsp;</td>
        <td width="162" bgcolor="#99FF99"><div align="center" class="style6">
  <input name="total_b_1" type="text" class="field_active" id="total_b_1"  style="font-weight:bold; text-align:center" onchange="kiraan_baru(this,'')" onblur="$('#b_1a,#b_1b,#b_1c').attr('disabled','disabled')" value="<?php
  if($nilai->total_b_1==0){
  $nilai->total_b_1 = $nilai->b_1a+$nilai->b_1b+$nilai->b_1c;
  echo number_format($nilai->total_b_1,2);
  }
  else{
  echo number_format($nilai->total_b_1,2);
  }
   ?>" onKeypress="keypress(event)" size="15" />

		</div></td>
        <td width="141" bgcolor="#99FF99"><div align="center" class="style6"><span id="jaga1"><?php $y1 =($nilai->total_b_1/$data); echo number_format($y1,2); ?></span></div></td>
        </tr>
      <tr>
        <td height="38" align="right">&nbsp;</td>
        <td bgcolor="#CCCCFF">i. <?=setstring ( 'mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
        <td bgcolor="#CCCCFF"><div align="center">
          <input name="b_1a" type="text" class="field_active" id="b_1a" onblur="$('#total_b_1').attr('disabled','disabled')" value="<?= number_format($nilai->b_1a,2); ?>" size="15" onKeypress="keypress(event)" onchange="kiraan_baru(this,'anak')" />
        </div></td>
        <td bgcolor="#CCCCFF"><div align="center"><span id="j1"><?php $sy1 =($nilai->b_1a/$data); echo number_format($sy1,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="38" align="right">&nbsp;</td>
        <td bgcolor="#CCCCFF">ii. <?=setstring ( 'mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
        <td bgcolor="#CCCCFF"><div align="center">
          <input name="b_1b" type="text" class="field_active" id="b_1b"  onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_1').attr('disabled','disabled')" value="<?= number_format($nilai->b_1b,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#CCCCFF"><div align="center"><span id="j2"><?php $sy2 =($nilai->b_1b/$data); echo number_format($sy2,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="38" align="right">&nbsp;</td>
        <td bgcolor="#CCCCFF"><span onmouseover="tunjuk_bantu('')">iii. <?=setstring ( 'mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
				<br>
				<span class="kecil">(
					<?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Cost of fuel, tires, batteries, black oil etc. as well as machinery overhauls'); ?>

						)        </span></td>


				<td bgcolor="#CCCCFF"><div align="center">
          <input name="b_1c" type="text" class="field_active" id="b_1c" onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_1').attr('disabled','disabled')" value="<?= number_format($nilai->b_1c,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#CCCCFF"><div align="center"><span id="j3"><?php $sy3 =($nilai->b_1c/$data); echo number_format($sy3,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#99FF99">2.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Kawalan lalang', 'en', 'Lalang control'); ?> &nbsp;</td>
        <td bgcolor="#99FF99"><div align="center">
          <input name="total_b_2" type="text" class="field_active" id="total_b_2"  onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_2,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
        <span id="jaga2"><?php $y3 =($nilai->total_b_2/$data); echo number_format($y3,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="37" align="right">3.</td>
        <td><?=setstring ( 'mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
        <td><div align="center" class="style10"><span class="style6">
          <input name="total_b_3" type="text" class="field_active" id="total_b_3"  style="font-weight:bold; text-align:center" value="<?php

		   if($nilai->total_b_3==0){
		   $nilai->total_b_3= $nilai->b_3a+$nilai->b_3b+$nilai->b_3c+$nilai->b_3d;
		   echo number_format($nilai->total_b_3,2);
		   }else{
		   echo number_format($nilai->total_b_3,2);
		   }
		    ?>" size="15" onKeypress="keypress(event)" onchange="kiraan_baru(this,'')" onblur="$('#b_3a, #b_3b, #b_3c, #b_3d').attr('disabled','disabled')" />
          </span></div></td>
        <td><div align="center" class="style10">
        <span id="jaga3"><?php $y2 =($nilai->total_b_3/$data); echo number_format($y2,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="39" align="right">&nbsp;</td>
        <td bgcolor="#FFFFCC">i. <?=setstring ( 'mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
        <td bgcolor="#FFFFCC"><div align="center">
          <input name="b_3a" type="text" class="field_active" id="b_3a"  onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_3').attr('disabled','disabled')" onfocus="$('#total_b_3').attr('disabled','disabled')" value="<?= number_format($nilai->b_3a,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#FFFFCC"><div align="center"><span id="j5"><?php $sy1a =($nilai->b_3a/$data); echo number_format($sy1a,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="39" align="right">&nbsp;</td>
        <td bgcolor="#FFFFCC">ii. <?=setstring ( 'mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers '); ?></td>
        <td bgcolor="#FFFFCC"><div align="center">
          <input name="b_3b" type="text" class="field_active" id="b_3b"  onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_3').attr('disabled','disabled')" onfocus="$('#total_b_3').attr('disabled','disabled')" value="<?= number_format($nilai->b_3b,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#FFFFCC"><div align="center"><span id="j6"><?php $sy1b =($nilai->b_3b/$data); echo number_format($sy1b,2); ?></span></div></td>
      </tr>
      <tr>
        <td height="39" align="right">&nbsp;</td>
        <td bgcolor="#FFFFCC">iii. <?=setstring ( 'mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?>
				<br>
				<span class="kecil">(
					<?= setstring('mal', 'Kos bahan api, tayar, bateri, minyak hitam dan lain-lain serta baik pulih jentera', 'en', 'Cost of fuel, tires, batteries, black oil etc. as well as machinery overhauls'); ?>

						)        </span></td>


        <td bgcolor="#FFFFCC"><div align="center">
          <input name="b_3c" type="text" class="field_active" id="b_3c"  onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_3').attr('disabled','disabled')" onfocus="$('#total_b_3').attr('disabled','disabled')" value="<?= number_format($nilai->b_3c,2); ?>" onKeypress="keypress(event)" size="15" />
        </div></td>
        <td bgcolor="#FFFFCC"><div align="center"><span id="j7"><?php $sy1c =($nilai->b_3c/$data); echo number_format($sy1c,2); ?></span></div></td>
      </tr>
<?php /*
      <tr>
        <td height="39" align="right">&nbsp;</td>
        <td bgcolor="#FFFFCC">iv. <?=setstring ( 'mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
        <td bgcolor="#FFFFCC"><div align="center"> */?>
          <input name="b_3d" type="hidden" class="field_active" id="b_3d"  onchange="kiraan_baru(this,'anak')" onblur="$('#total_b_3').attr('disabled','disabled')" onfocus="$('#total_b_3').attr('disabled','disabled')" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15" />
<?php /*      </div></td>
        <td bgcolor="#FFFFCC"><div align="center"><span id="j8"><?php $sy1d =($nilai->b_3d/$data); echo number_format($sy1d,2); ?></span></div></td>
      </tr> */?>

<?php /*
      <tr>
        <td height="39" align="right" bgcolor="#99FF99">4.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Pemuliharaan tanah dan air', 'en', 'Soil and water conservation'); ?></td>
        <td bgcolor="#99FF99"><div align="center"> */?>
          <input name="total_b_4" type="hidden" class="field_active" id="total_b_4" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15"/>
<?php /*        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <span id="jaga4"><?php $y4 =($nilai->total_b_4/$data); echo number_format($y4,2); ?></span>
        </div></td>
        </tr> */?>
<?php /*
      <tr>
        <td height="34" align="right" bgcolor="#FFFFFF">5.</td>
        <td bgcolor="#FFFFFF"><?=setstring ( 'mal', 'Penjagaan jalan, jambatan, lorong dan sebagainya', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?> </td>
        <td bgcolor="#FFFFFF"><div align="center"> */?>
          <input name="total_b_5" type="hidden" class="field_active" id="total_b_5"  onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15"/>
<?php /*         </div></td>
        <td bgcolor="#FFFFFF"><div align="center">
        <span id="jaga5"><?php $y5 =($nilai->total_b_5/$data); echo number_format($y5,2); ?></span>
        </div></td>
        </tr> */?>
<?php /*
      <tr>
        <td height="40" align="right" bgcolor="#99FF99">6.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Penjagaan parit', 'en', 'Upkeep of drain'); ?></td>
        <td bgcolor="#99FF99"><div align="center"> */?>
          <input name="total_b_6" type="hidden" class="field_active" id="total_b_6" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15"/>
<?php /*        </div></td>
        <td bgcolor="#99FF99"><div align="center">
        <span id="jaga6"><?php $y6 =($nilai->total_b_6/$data); echo number_format($y6,2); ?></span>
        </div></td>
        </tr> */?>
<?php /*
      <tr>
        <td height="38" align="right">7.</td>
        <td><?=setstring ( 'mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeep of bunds and watergate'); ?></td>
        <td><div align="center"> */?>
          <input name="total_b_7" type="hidden" class="field_active" id="total_b_7" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15"/>
<?php /*        </div></td>
        <td><div align="center">
         <span id="jaga7"><?php $y7 =($nilai->total_b_7/$data); echo number_format($y7,2); ?></span>
        </div></td>
        </tr> */?>
<?php /*
      <tr>
        <td height="37" align="right" bgcolor="#99FF99">8.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Persempadanan dan survei', 'en', 'Boundaries and survey'); ?></td>
        <td bgcolor="#99FF99"><div align="center"> */?>
          <input name="total_b_8" type="hidden" class="field_active" id="total_b_8" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15"/>
<?php /*        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <span id="jaga8"><?php $y8 =($nilai->total_b_8/$data); echo number_format($y8,2); ?></span>
        </div></td>
        </tr> */?>

				<tr bgcolor="#99FF99">
					<td height="36" align="right">4.</td>
					<td align="right"><div align="left"><?=setstring ( 'mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></div></td>
					<td><div align="center">

						<input name="total_b_16" type="text" class="field_active" id="total_b_16" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_16,2); ?>" onKeypress="keypress(event)" size="15" tabindex="4" />
					</div></td>
					<td><div align="center">
						<span id="jaga16"><?php $y16 =($nilai->total_b_16/$data); echo number_format($y16,2); ?></span>
					</div></td>
				</tr>

				<tr bgcolor="#FFFFFF">
					<td height="36" align="right">5.</td>
					<td align="right"><div align="left"><?=setstring ( 'mal', 'Penjagaan jalan, parit, ban, pintu air dan sebagainya', 'en', 'Maintenance of road, drain, bund watergate and etc'); ?></div></td>
					<td><div align="center">

				<input name="total_b_15" type="text" class="field_active" id="total_b_15" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_15,2); ?>" onKeypress="keypress(event)" size="15" tabindex="4" />
					</div></td>
					<td><div align="center">
						<span id="jaga15"><?php $y15 =($nilai->total_b_15/$data); echo number_format($y15,2); ?></span>
					</div></td>
				</tr>

      <tr>
        <td height="35" align="right" bgcolor="#99FF99">6.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Tanaman penutup bumi', 'en', 'Cover crops'); ?></td>
        <td bgcolor="#99FF99"><div align="center">
         <input name="total_b_9" type="text" class="field_active" id="total_b_9" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_9,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <span id="jaga9"><?php $y9 =($nilai->total_b_9/$data); echo number_format($y9,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="38" align="right" bgcolor="#FFFFFF">7.</td>
        <td bgcolor="#FFFFFF"><?=setstring ( 'mal', 'Kawalan serangga dan penyakit', 'en', 'Pest and diseases control'); ?></td>
        <td bgcolor="#FFFFFF"><div align="center">
          <input name="total_b_10" type="text" class="field_active" id="total_b_10" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_10,2); ?>" onKeypress="keypress(event)" size="15"/>
        </div></td>
        <td bgcolor="#FFFFFF"><div align="center">
         <span id="jaga10"><?php $y10 =($nilai->total_b_10/$data); echo number_format($y10,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="34" align="right" bgcolor="#99FF99">8.</td>
        <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation'); ?></td>
        <td bgcolor="#99FF99"><div align="center">
          <input name="total_b_11" type="text" class="field_active" id="total_b_11" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_11,2); ?>" onKeypress="keypress(event)" size="15" tabindex="1" />
        </div></td>
        <td bgcolor="#99FF99"><div align="center">
          <span id="jaga11"><?php $y11 =($nilai->total_b_11/$data); echo number_format($y11,2); ?></span>
        </div></td>
        </tr>
      <tr>
        <td height="35" align="right" bgcolor="#FFFFFF">9.</td>
        <td bgcolor="#FFFFFF"><?=setstring ( 'mal', 'Banci / sulaman', 'en', 'Census / supplies'); ?></td>
        <td bgcolor="#FFFFFF"><div align="center">
          <input name="total_b_12" type="text" class="field_active" id="total_b_12" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_12,2); ?>" onKeypress="keypress(event)" size="15" tabindex="2" />
        </div></td>
        <td bgcolor="#FFFFFF"><div align="center">
          <span id="jaga12"><?php $y12 =($nilai->total_b_12/$data); echo number_format($y12,2); ?></span>
        </div></td>
        </tr>
<?php /*
      <tr>
        <td height="38" align="right">13.</td>
        <td align="right"><div align="left"><?=setstring ( 'mal', 'Pengkasian', 'en', 'Castration'); ?></div></td>
        <td><div align="center"> */?>
          <input name="total_b_13" type="hidden" class="field_active" id="total_b_13" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format(0,2); ?>" onKeypress="keypress(event)" size="15" tabindex="3" />
<?php /*        </div></td>
        <td><div align="center">
          <span id="jaga13"><?php $y13 =($nilai->total_b_13/$data); echo number_format($y13,2); ?></span>
        </div></td>
      </tr> */?>

      <tr bgcolor="#99FF99">
        <td height="36" align="right">10.</td>
        <td align="right"><div align="left"><?=setstring ( 'mal', 'Perbelanjaan pelbagai', 'en', 'Other Expenditures'); ?></div></td>
        <td><div align="center">
          <input name="total_b_14" type="text" class="field_active" id="total_b_14" onchange="kiraan_baru(this,'')" onclick="field_click(this)" value="<?= number_format($nilai->total_b_14,2); ?>" onKeypress="keypress(event)" size="15" tabindex="4" />
        </div></td>
        <td><div align="center">
          <span id="jaga14"><?php $y14 =($nilai->total_b_14/$data); echo number_format($y14,2); ?></span>
        </div></td>
      </tr>






      <tr>
        <td colspan="2" align="right">&nbsp;</td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        </tr>
      <tr>
        <td height="35" colspan="2" align="right"><strong><?=setstring ( 'mal', 'Jumlah kecil', 'en', 'Subtotal'); ?> (b) :</strong></td>
        <td bgcolor="#FFCC66"><div align="center"><strong>
          <span class="style6">
          <input name="total_kos_b" type="text" id="total_kos_b" style="font-weight:bold; text-align:center" value="<?= number_format($nilai->total_b,2); ?>" size="15" readonly="true" />
          </span>
        </strong></div></td>
        <td bgcolor="#FFCC66"><div align="center"><strong><span id="total_kos_per_ha_b"><?php $z =($nilai->total_b/$data); echo number_format($z,2); ?></span></strong></div></td>
        </tr>
      <tr>
        <td height="17" colspan="2" align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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
          <span style="text-transform:lowercase;">	   <?php if($_GET['t']=="Penanaman Baru"){
	   	echo setstring('mal', 'Penanaman Baru', 'en', 'New Planting');
	   }
	   if($_GET['t']=="Penanaman Semula"){
	   	echo setstring('mal', 'Penanaman Semula', 'en', 'Replanting');
	   }
	   if($_GET['t']=="Penukaran"){
	   	echo setstring('mal', 'Penukaran', 'en', 'Conversion');
	   }	    ?></span>

	   <?php
	if($_GET['year'] == "1"){
		echo setstring('mal', 'pada tahun pertama', 'en', 'on first year');
		}
	else if($_GET['year'] == "2") {
		echo setstring('mal', 'pada tahun kedua', 'en', 'on second year');
		}
	else {
		echo setstring('mal', 'pada tahun ketiga', 'en', 'on third year');
		}
	 ?>
	    : </strong></div></td>
    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all"><?php $total_all = $nilai->total_a+$nilai->total_b; echo number_format($total_all,2);?></span></strong></div></td>
    <td bgcolor="#CC6699"><div align="center"><strong><span id="total_all_per_ha"><?php $kph = (($total_all)/($data)); echo number_format($kph,2); ?></span></strong></div></td>
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
        <input type="button" name="simpan_sementara" id="simpan_sementara" value=<?=setstring ( 'mal', '"Simpan"', 'en', '"Save"'); ?> onclick="hantar(2);" />
        <input type="button" name="simpan" id="simpan" value=<?=setstring ( 'mal', '"Simpan & Seterusnya"', 'en', '"Save &amp; Next"'); ?> onclick="hantar(1);" />

         <input type="button" name="simpan" id="simpan" value=<?=setstring ( 'mal', '"Kembali"', 'en', '"Back"'); ?> onclick="history.go(-1);" />

      </div>
	</td>
  </tr>
</table>


</form>
<?php } ?>
