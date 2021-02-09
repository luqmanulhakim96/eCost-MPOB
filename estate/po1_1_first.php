<?php session_start();
include('../Connections/connection.class.php');
include('../class/syarikat.class.php');
include('../class/user.class.php');

include('../setstring.inc');
ini_set('display_errors', 0);

$company= new syarikat('syarikat','');
$ahli = new syarikat('keahlian','');
$muka = new syarikat('mukabumi','');
$pengguna = new user('estate',$_SESSION['lesen']);



		function luas_data($table,$data, $tahunsebelum){

		if(strlen($tahunsebelum)==1)
			{
		$table = $table."0".substr($tahunsebelum,-2);
			}
		else{
		$table = $table.substr($tahunsebelum,-2);
		}
		$con = connect();
	    $qblm="SELECT sum($data) as $data FROM $table WHERE lesen = '".$_SESSION['lesen']."' group by lesen";
		$rblm=mysqli_query($con, $qblm);
		$totalblm = mysqli_num_rows($rblm);
		$rowblm= mysqli_fetch_array($rblm);
		//echo "<br>";
		$data1 = $rowblm[$data];
		$jum_data = $data1;

		return $jum_data;
		}


 $ps1 = luas_data("tanam_semula","tanaman_semula", date('y')-1);
 $ps2 = luas_data("tanam_semula","tanaman_semula", date('y')-2);
 $ps3 = luas_data("tanam_semula","tanaman_semula", date('y')-3);

 $pb1 = luas_data("tanam_baru","tanaman_baru", date('y')-1);
 $pb2 = luas_data("tanam_baru","tanaman_baru", date('y')-2);
 $pb3 = luas_data("tanam_baru","tanaman_baru", date('y')-3);



 $pt1 = luas_data("tanam_tukar","tanaman_tukar", date('y')-1);
 $pt2 = luas_data("tanam_tukar","tanaman_tukar", date('y')-2);
 $pt3 = luas_data("tanam_tukar","tanaman_tukar", date('y')-3);

$jumlah_semua = 	$pengguna->luastuai + $pb1+$pb2+$pb3 + $ps1+$ps2+$ps3 + $pt1+$pt2+$pt3;
?>
<script type="text/javascript">
	$(function() {
		$("#darjahbukit").hide();
		$("#darjahrata").hide();
		$("#darjahalun").hide();
	});
</script>
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>
<script type="text/javascript">


	var total_ha =  <?= $pengguna->jumlahluas; ?>;
	function field_blur(obj,obj_id) {
		if(number_only(obj)) {
			val = obj.value * 1;
			percentage = val/total_ha;
			percentage = percentage * 100.0;
			percentage = bulatkan(percentage);
			$("#" + obj_id).html(percentage + " %");
			if(percentage > 100.0) {
				$("#" + obj_id).addClass("static_txt_error");
			}
			else {
				$("#" + obj_id).removeClass("static_txt_error");
			}
		}
		else {
			$("#" + obj_id).html("0 %");

		}
	}

	function field_click(obj) {
		$(obj).removeClass("field_edited");
		$(obj).addClass("field_active");
	}


	function kiraan (e){
		var jumlah = 0;
		var a = $("#percentrata").val();
		var b = $("#percentalun").val();
		var c = $("#percentbukit").val();
		var d = $("#percentcerun").val();

		var f = e.value;
		if(f>100){
			alert('<?=setstring ( 'mal', 'Jumlah Peratusan melebihi had 100 %', 'en', 'Total Percentage is more than 100%'); ?>');
		e.value = "0.00";}


		jum = parseInt(a)+parseInt(b)+parseInt(c)+parseInt(d);
		//alert(jum);
		if(jum>100){
			alert('<?=setstring ( 'mal', 'Jumlah Peratusan melebihi had 100 %', 'en', 'Total Percentage is more than 100%'); ?>');
		e.value = "0.00";
		}
		else{
		$('#jp').html(jum);
		}
		$("#jp").format({format:"#,###.00", locale:"us"});

	}
</script>
<link rel="stylesheet" href="../text_style.css" type="text/css" />



<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-weight: bold}
-->
</style>
<form id="form1" name="form1" method="post" action="save_first.php">
<table width="100%" align="center" cellspacing="0" class="tableCss" style="border:1px #333333 solid; padding:2px;">
  <tr>
    <td height="29" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"><strong><?=setstring ( 'mal', 'Nama pegawai melapor', 'en', 'Name of Reporting Officer'); ?></strong>      </td>
    <td colspan="4" bgcolor="#99FF99"><input name="pegawai" type="text" id="pegawai" style="text-align:left; font-weight:normal;" value="<?= $pengguna->pegawai; ?>" size="50" width="50" />
      <input name="nolesen" type="hidden" id="nolesen" value="<?= $_SESSION['lesen'];?>" />    </td>
  </tr>

  <tr>
    <td width="14" height="37">&nbsp;</td>
    <td colspan="2"><b><?=setstring ( 'mal', 'Jenis syarikat', 'en', 'Company Type'); ?></b></td>
    <td colspan="4"><select name="syarikat" id="syarikat" style="width:330px">
      <option>-<?=setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
      <?php
		for ($i=0; $i<$company->total; $i++){ ?>
      <option value="<?= $company->comp_name[$i];?>" <?php if($company->comp_name[$i]==$pengguna->jenissyarikat){?>selected="selected"<?php } ?>>
        <?= $company->comp_alt[$i]; ?>
        </option>
      <?php } ?>
    </select></td>
  </tr>

  <tr>
    <td height="32" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"><strong><?=setstring ( 'mal', 'Keahlian dalam persatuan', 'en', 'Membership in Union'); ?></b></strong></td>
    <td colspan="4" bgcolor="#99FF99"><select name="keahlian" id="keahlian" style="width:330px">
      <option>-<?=setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
      <?php for ($i=0; $i<$ahli->total; $i++){?>
      <option value="<?= $ahli->ahli_name[$i]; ?>" <?php if($ahli->ahli_name[$i]==$pengguna->keahlian){?>selected="selected"<?php } ?>>
        <?= $ahli->ahli_alt[$i];?>
        </option>
      <?php } ?>
    </select></td>
  </tr>

  <tr>
    <td height="31">&nbsp;</td>
    <td colspan="2"><strong><?=setstring ( 'mal', 'Integrasi dengan kilang buah sawit', 'en', 'Integration with Palm Factory'); ?></strong></td>
    <td><input type="radio" name="integrasi" id="radio" value="Y" <?php if($pengguna->integrasi=='Y'){?>checked="checked"<?php } ?> />
<?=setstring ( 'mal', 'Ya', 'en', 'Yes'); ?></td>
    <td colspan="3"><input type="radio" name="integrasi" id="radio2" value="N" <?php if($pengguna->integrasi=='N'){?>checked="checked"<?php } ?> />
<?=setstring ( 'mal', 'Tidak', 'en', 'No'); ?></td>
  </tr>
  <tr>
    <td height="24" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"> <strong><?=setstring ( 'mal', 'Keluasan mengikut jenis tanah:', 'en', 'Area respective to soil type:'); ?></strong></td>
    <td colspan="4" bgcolor="#99FF99"><div align="center"><span class="style2">
      <?=setstring ( 'mal', 'Jumlah Keluasan', 'en', 'Total all area'); ?>
    </span> : <span class="style2">
      <?php echo number_format($jumlah_semua,2);?> <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?>
    </span></div>      <div align="center"></div></td>
    </tr>
    <?php
  	if(!isset($_GET['print'])) {
  ?>
  <tr>
    <td height="35"></td>
    <td colspan="2" bgcolor="#CCFFFF"><div align="left"><?=setstring ( 'mal', 'a. Tanah Lanar', 'en', 'a. Alluvial Soil'); ?></div></td>
    <td bgcolor="#CCFFFF"><div align="center">
      <input name="lanar" type="text" class="field_active" id="lanar" onblur="field_blur(this,'s1')" onclick="field_click(this)" value="<?= $pengguna->lanar; ?>" size="3" />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
    <td bgcolor="#CCFFFF">
      <div align="center">
        <span id="s1"><?php $a = round($pengguna->lanar/$jumlah_semua*100,2);echo number_format($a,2); ?> %</span></div>    </td>
    <td bgcolor="#CCFFFF">&nbsp;</td>
    <td width="42" bgcolor="#CCFFFF">&nbsp;</td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td height="35"></td>
    <td colspan="2" bgcolor="#FFCCCC"><div align="left"><?=setstring ( 'mal', 'b. Tanah Pedalaman', 'en', 'b. Rural Land'); ?></div></td>
    <td bgcolor="#FFCCCC">
      <div align="center">
<input name="pedalaman" type="text" class="field_active" id="pedalaman" onblur="field_blur(this,'s2')" onclick="field_click(this)" value="<?= $pengguna->pedalaman; ?>" size="3" />
<?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div>

      <div align="center"></div></td>
    <td bgcolor="#FFCCCC">
      <div align="center">
        <span id="s2">
        <?php $a = round($pengguna->pedalaman/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span></div>    </td>
    <td bgcolor="#FFCCCC">&nbsp;</td>
    <td bgcolor="#FFCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="34"></td>
    <td colspan="2" bgcolor="#FFFFCC"><div align="left"><?=setstring ( 'mal', 'c. Tanah Gambut : ', 'en', 'c. Peat Soil:'); ?></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><span class="style1"><?php echo $tg = $pengguna->gambutcetek+ $pengguna->gambutdalam; ?>  <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></span></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><span class="style1">
    </span></div>      <span class="style1">
        <div align="center">
          <?php $a = round($tg/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</div>

    </span></td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="37"></td>
    <td width="96" bgcolor="#FFFFCC"><div align="right">i) </div></td>
    <td width="151" bgcolor="#FFFFCC"><?=setstring ( 'mal', 'Gambut Cetek', 'en', 'Shallow Peat Soil'); ?></td>
    <td width="216" bgcolor="#FFFFCC">
      <div align="center">
        <input name="gambutcetek" type="text" class="field_active" id="gambutcetek" onblur="field_blur(this,'s3')" onclick="field_click(this)" value="<?= $pengguna->gambutcetek; ?>" size="3" />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?> </div></td>
    <td width="139" bgcolor="#FFFFCC">
      <div align="center">
        <span id="s3">
        <?php $a = round($pengguna->gambutcetek/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span></div>    </td>
    <td width="54" bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="34"></td>
    <td bgcolor="#FFFFCC"><div align="right">ii) </div></td>
    <td bgcolor="#FFFFCC"> <?=setstring ( 'mal', 'Gambut Dalam', 'en', 'Deep Peat Soil'); ?></td>
    <td bgcolor="#FFFFCC"><div align="center">
      <input name="gambutdalam" type="text" class="field_active" id="gambutdalam" onblur="field_blur(this,'s4')" onclick="field_click(this)" value="<?= $pengguna->gambutdalam; ?>" size="3"  />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
    <td bgcolor="#FFFFCC">
      <div align="center">
        <span id="s4">
        <?php $a = round($pengguna->gambutdalam/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span></div></td>
      <td width="54" bgcolor="#FFFFCC">&nbsp;</td>
      <td bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="27"></td>
    <td colspan="2" bgcolor="#CACAFF"><?=setstring ( 'mal', 'd. Lain-lain Jenis Tanah :', 'en', 'Other Soil Type:'); ?></td>
    <td bgcolor="#CACAFF"><div align="center" class="style1"><?php echo $lt = $pengguna->laterit+$pengguna->asidsulfat+$pengguna->tanahpasir; ?> <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
    <td bgcolor="#CACAFF"><span class="style1">

    </span>      <strong>

    </strong>
    <div align="center" class="style1">
      <?php $a = round($lt/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</div>    </td>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="37"></td>
    <td bgcolor="#CACAFF"><div align="right"> i)</div></td>
    <td bgcolor="#CACAFF"> <?=setstring ( 'mal', 'laterit', 'en', 'Laterite'); ?></td>
    <td bgcolor="#CACAFF"><div align="center">
          <input name="laterit" type="text" class="field_active" id="laterit" onblur="field_blur(this,'s5')" onclick="field_click(this)" value="<?= $pengguna->laterit; ?>" size="3" />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
    <td bgcolor="#CACAFF"><div align="center">
          <span id="s5">
          <?php $a = round($pengguna->laterit/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span>
    </div>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="42"></td>
    <td bgcolor="#CACAFF"><div align="right">ii) </div></td>
    <td bgcolor="#CACAFF"><?=setstring ( 'mal', 'Asid Sulfat', 'en', 'Sulphate Acid'); ?> </td>
    <td bgcolor="#CACAFF"><div align="center">
          <input name="asidsulfat" type="text" class="field_active" id="asidsulfat" onblur="field_blur(this,'s6')" onclick="field_click(this)" value="<?= $pengguna->asidsulfat; ?>" size="3" />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
   <td bgcolor="#CACAFF"><div align="center">
     <span id="s6">
     <?php $a = round($pengguna->asidsulfat/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span></div></td>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="26"></td>
    <td bgcolor="#CACAFF"><div align="right">iii)</div></td>
    <td bgcolor="#CACAFF"> <?=setstring ( 'mal', 'Tanah berpasir', 'en', 'Sandy Soil'); ?> </td>
    <td bgcolor="#CACAFF"><div align="center">
      <input name="tanahpasir" type="text" class="field_active" id="tanahpasir" onblur="field_blur(this,'s7')" onclick="field_click(this)" value="<?= $pengguna->tanahpasir; ?>" size="3" />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
    <td bgcolor="#CACAFF"><div align="center"><strong>
      <span id="s7">
      <?php $a = round($pengguna->tanahpasir/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span></strong></div></td>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>

  <!--<tr>
    <td height="34" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"><strong><?=setstring ( 'mal', 'Bentuk mukabumi estet', 'en', 'Estate Terrain Type'); ?></b></strong></td>
    <td bgcolor="#99FF99">
      <div align="center">
        <select name="select3" id="select3" >
          <option selected="selected" value="pilih">-<?=setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
          <option value="rata"><?=setstring ( 'mal', 'Rata/Landai', 'en', 'Flat Terrain'); ?></option>
          <option value="alun"><?=setstring ( 'mal', 'Beralun', 'en', 'Undulating Terrain'); ?></option>
          <option value="bukit"><?=setstring ( 'mal', 'Berbukit', 'en', 'Hilly Terrain'); ?></option>
        </select>
        </div> </td>
    <td bgcolor="#99FF99">&nbsp;</td>
    <td bgcolor="#99FF99">&nbsp;</td>
    <td bgcolor="#99FF99">&nbsp;</td>
  </tr>-->
    <?php
  	if(!isset($_GET['print'])) {
  ?>
    <?php
}
  ?>
    <tr valign="top">
      <td height="65">&nbsp;</td>
      <td colspan="6">
        <table width="100%" border="0" cellspacing="0" class="hide" id="rata">
          <tr>
            <td height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td colspan="3" bgcolor="#CCFF99"><strong>
              <?=setstring ( 'mal', 'Bentuk mukabumi estet', 'en', 'Estate Terrain Type'); ?>
            </strong></td>
          </tr>
          <tr>
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><?=setstring ( 'mal', 'Kawasan rata/landai', 'en', 'Flat Area'); ?>              (0-6
              <?=setstring ( 'mal', 'darjah', 'en', 'degree'); ?>
)</td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentrata" type="text" onclick="field_click(this)" class="field_active" id="percentrata" value="<?= $pengguna->percentrata; ?>" size="3" onchange="kiraan(this)" />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" class="hide" id="alun">
          <tr>
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><?=setstring ( 'mal', 'Kawasan beralun', 'en', 'Undulating Area'); ?>              (7-12
               <?=setstring ( 'mal', 'darjah', 'en', 'degree'); ?>
)</td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentalun" type="text" onclick="field_click(this)" class="field_active" id="percentalun" value="<?= $pengguna->percentalun; ?>" size="3"  onchange="kiraan(this)"  />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
        </table>        <table width="100%" border="0" cellspacing="0" class="hide" id="bukit">
          <tr>
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><?=setstring ( 'mal', 'Kawasan berbukit', 'en', 'Hilly Area'); ?>              (12-25
               <?=setstring ( 'mal', 'darjah', 'en', 'degree'); ?>
)</td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentbukit" type="text" onclick="field_click(this)" class="field_active" id="percentbukit" value="<?= $pengguna->percentbukit; ?>" size="3"  onchange="kiraan(this)"  />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
          <tr>
            <td height="33" bgcolor="#CCFF99">&nbsp;</td>
            <td height="33" bgcolor="#CCFF99">              <?=setstring ( 'mal', 'Curam', 'en', 'Steep'); ?>            (&gt;25  <?=setstring ( 'mal', 'darjah', 'en', 'degree'); ?> )</td>
            <td bgcolor="#CCFF99"><input name="percentcerun" type="text" onclick="field_click(this)" class="field_active" id="percentcerun" value="<?= $pengguna->percentcerun; ?>" size="3"   onchange="kiraan(this)"  />
            % </td>
            <td bgcolor="#CCFF99">&nbsp;</td>
          </tr>
          <tr>
            <td height="33" bgcolor="#CCFF99">&nbsp;</td>
            <td height="33" bgcolor="#CCFF99"><span class="style2">
              <?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?>
            </span></td>
            <td colspan="2" bgcolor="#CCFF99"><b id="jp">
			<u>
			<?php $jumlah_percent = $pengguna->percentcerun+$pengguna->percentbukit+$pengguna->percentalun+$pengguna->percentrata; echo number_format($jumlah_percent,2);?>
            </u>
            </b><br /></td>
          </tr>
      <!--    <?php if($jumlah_percent >=100){?><tr>
            <td height="33" bgcolor="#CCFF99">&nbsp;</td>
            <td height="33" bgcolor="#CCFF99">&nbsp;</td>
            <td colspan="2" bgcolor="#CCFF99">
              <img src="images/001_11.gif" width="20" height="20" />
              <span style=" color:#FF0000; font-weight:bold;">
              <?=setstring ( 'mal', 'Jumlah Peratusan melebihi had 100 %', 'en', 'Total Percentage is more than 100%'); ?>
              </span>              </td>
          </tr><?php }// if total percent is more than 100 ?>-->
    </table></td></tr>
    <tr>
      <td height="17" colspan="7"><div align="center">
        <p>
		<?php //if ($print!="true"){?>
          <input type="submit" name="button" id="button" value="<?=setstring ( 'mal', 'Simpan', 'en', 'Save'); ?>" />
		  <?php //} else //{ ?>
          <input type="submit" name="button2" id="button2" value=" <?=setstring ( 'mal', 'Cetak', 'en', 'Print'); ?>" />
		  <?php //} ?>
        </p>
        <p>&nbsp;  </p>
      </div></td>
    </tr>
</table>
</form>
