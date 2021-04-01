<?php session_start();
include('../Connections/connection.class.php');
include('../class/syarikat.class.php');
include('../class/user.class.php');

include('../setstring.inc');


$company= new syarikat('syarikat','');
$ahli = new syarikat('keahlian','');
$muka = new syarikat('mukabumi','');
$pengguna = new user('estate',$_SESSION['lesen']);
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
	function berbukit(val) {
	
	if (val=="")
	{
		$("#darjahrata").hide();
		$("#darjahalun").hide();
		$("#darjahbukit").hide();
	}
	
		if(val == "bukit") {
			$("#darjahbukit").show('slow');
		}
		else {
			$("#darjahrata").hide();
			$("#darjahalun").hide();
		}
		
		if(val == "rata") {
			$("#darjahrata").show('slow');
		}
		else {
			$("#darjahbukit").hide();
			$("#darjahalun").hide();
		}
		
		if(val == "alun") {
			$("#darjahalun").show('slow');
		}
		else {
			$("#darjahrata").hide();
			$("#darjahbukit").hide();
		}
	}
	
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
</script>
<link rel="stylesheet" href="../text_style.css" type="text/css" />

<style type="text/css">
.hide{
display:none;
}
.show {
display:normal;

}
</style>
<script language="javascript">
function add_byr(no_me)
{
	if (no_me=='alun')
	{
		document.getElementById('alun').className="show";
		document.getElementById('bukit').className="hide";
		document.getElementById('rata').className="hide";
	}
	else if (no_me=='bukit')
	{
		document.getElementById('bukit').className="show";
		document.getElementById('alun').className="hide";
		document.getElementById('rata').className="hide";
	}
	else if (no_me=='rata')
	{
		document.getElementById('rata').className="show";
		document.getElementById('bukit').className="hide";
		document.getElementById('alun').className="hide";
	}
	else if (no_me=='pilih')
	{
		document.getElementById('rata').className="hide";
		document.getElementById('bukit').className="hide";
		document.getElementById('alun').className="hide";
	}
}
</script>

<form id="form1" name="form1" method="post" action="save_profile.php">
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
        <?= $company->comp_name[$i]; ?>
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
        <?= $ahli->ahli_name[$i];?>
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
    <td bgcolor="#99FF99"><div align="center"></div></td>
    <td bgcolor="#99FF99"><div align="center"></div></td>
    <td bgcolor="#99FF99">&nbsp;</td>
    <td bgcolor="#99FF99">&nbsp;</td>
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
        <span id="s1">0 %</span></div>    </td>
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
        <span id="s2">0 %</span></div>    </td>
    <td bgcolor="#FFCCCC">&nbsp;</td>
    <td bgcolor="#FFCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="34"></td>
    <td colspan="2" bgcolor="#FFFFCC"><div align="left"><?=setstring ( 'mal', 'c. Tanah Gambut : ', 'en', 'c. Peat Soil:'); ?></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><span class="style1"><?php echo $tg = $pengguna->gambutcetek+ $pengguna->gambutdalam; ?>  <?=setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></span></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><span class="style1">
    </span></div>      <span class="style1">
        <div align="center">0 %</div>
      
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
        <span id="s3">0 %</span></div>    </td>
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
        <span id="s4">0 %</span></div></td>
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
    <div align="center" class="style1">0 %</div>    </td>
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
          <span id="s5">0 %</span>
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
     <span id="s6">0 %</span></div></td>
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
      <span id="s7">0 %</span></strong></div></td>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="34" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"><strong><?=setstring ( 'mal', 'Bentuk mukabumi estet', 'en', 'Estate Terrain Type'); ?></b></strong></td>
    <td bgcolor="#99FF99">
      <div align="center">
        <select name="select3" id="select3" onchange="add_byr(this.value)">
          <option selected="selected" value="pilih">-<?=setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
          <option value="rata"><?=setstring ( 'mal', 'Rata/Landai', 'en', 'Flat Terrain'); ?></option>
          <option value="alun"><?=setstring ( 'mal', 'Beralun', 'en', 'Undulating Terrain'); ?></option>
          <option value="bukit"><?=setstring ( 'mal', 'Berbukit', 'en', 'Hilly Terrain'); ?></option>
        </select>
        </div> </td>
    <td bgcolor="#99FF99">&nbsp;</td>
    <td bgcolor="#99FF99">&nbsp;</td>
    <td bgcolor="#99FF99">&nbsp;</td>
  </tr>
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
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><strong><?=setstring ( 'mal', 'Peratus kawasan rata/landai', 'en', 'Percentage of Flat Area'); ?> </strong></td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentrata" type="text" onclick="field_click(this)" class="field_active" id="percentrata" value="<?= $pengguna->percentrata; ?>" size="3" onblur="field_blur(this)" />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" class="hide" id="alun">
          <tr>
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><strong><?=setstring ( 'mal', 'Peratus kawasan beralun', 'en', 'Percentage of Undulating Area'); ?></strong></td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentalun" type="text" onclick="field_click(this)" class="field_active" id="percentalun" value="<?= $pengguna->percentalun; ?>" size="3" onblur="field_blur(this)" />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
        </table>        <table width="100%" border="0" cellspacing="0" class="hide" id="bukit">
          <tr>
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><strong><?=setstring ( 'mal', 'Peratus kawasan berbukit', 'en', 'Percentage of Hilly Area'); ?></strong></td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentbukit" type="text" onclick="field_click(this)" class="field_active" id="percentbukit" value="<?= $pengguna->percentbukit; ?>" size="3" onblur="field_blur(this)" />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
          <tr>
            <td height="33" bgcolor="#CCFF99">&nbsp;</td>
            <td height="33" bgcolor="#CCFF99"><strong>Peratus kecerunan melebihi 25 darjah</strong></td>
            <td bgcolor="#CCFF99"><input name="percentcerun" type="text" onclick="field_click(this)" class="field_active" id="percentcerun" value="<?= $pengguna->percentcerun; ?>" size="3" onblur="field_blur(this)" />
            % </td>
            <td bgcolor="#CCFF99">&nbsp;</td>
          </tr>
          </table></td></tr>
    <tr>
      <td height="17" colspan="7"><div align="center">
        <p>
		<?php //if ($print!="true"){?>
          <input type="submit" name="button" id="button" value="<?=setstring ( 'mal', 'Simpan', 'en', 'Save'); ?>    " />
		  <?php //} else //{ ?>
          <input type="submit" name="button2" id="button2" value=" <?=setstring ( 'mal', 'Cetak', 'en', 'Print'); ?>      " />
		  <?php //} ?>
        </p>
        <p>&nbsp;  </p>
      </div></td>
    </tr>
</table>
</form> 