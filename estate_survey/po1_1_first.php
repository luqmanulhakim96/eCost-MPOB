<?php session_start();
include('../Connections/connection.class.php');
include('../class/syarikat.class.php');
include('../class/user.class.php');
include('../setstring.inc');
$company= new syarikat('syarikat','');
$ahli = new syarikat('keahlian','');
$muka = new syarikat('mukabumi','');
$pengguna = new user('estate',$_SESSION['lesen']);

$esub = new user('esub',$_SESSION['lesen']);
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
<script src="../js/live/livevalidation_standalone.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="../js/live/consolidated_common.css">

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


</script>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
.hide{
display:none;
}
.show {
display:normal;

}
.style1 {font-style: italic}
</style>
<script language="javascript">
function add_byr(no_me)
{
//alert(no_me);
	if (no_me=='Beralun')
	{
		document.getElementById('alun').className="show";
		document.getElementById('bukit').className="hide";
		document.getElementById('rata').className="hide";
	}
	else if (no_me=='Berbukit')
	{
		document.getElementById('bukit').className="show";
		document.getElementById('alun').className="hide";
		document.getElementById('rata').className="hide";
	}
	else if (no_me=='Rata/Landai')
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

<script language="javascript">

	var total_ha = <?= $esub->jumlahluas; ?>;
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

<script language="javascript">
function kira(obj,peratus){

	if(number_only(obj)) {
	val = obj.value*1;
	alert(val);
	}
}




	function semaksama(){

	var a = document.getElementById("katalaluan1").value;
	var b = document.getElementById("katalaluan2").value;


	if(a!=b){
	alert("<?=setstring ( 'mal', 'Katalaluan tidak sama', 'en', 'Password is not match'); ?>");
	}

	}

</script>

<form action="save_first.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="100%" align="center" cellspacing="0" class="tableCss" style="border:1px #333333 solid; padding:2px;">
  <tr>
    <td height="29" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"><strong>
    <?=setstring ( 'mal', 'Nama pegawai melapor', 'en', 'Name of reporting officer'); ?>
    </strong>      </td>
    <td colspan="4" bgcolor="#99FF99">
      <input name="pegawai" style="text-align:left; font-weight:normal;text-transform:uppercase;" size="50" width="50" type="text" autocomplete="off" id="pegawai"  />

      <script language="javascript">
      var f1 = new LiveValidation('pegawai');
f1.add( Validate.Presence );
      </script>

      <input name="no_lesen" type="hidden" id="no_lesen" value="<?= $_SESSION['lesen'];?>" /></td>
    </tr>

  <tr>
    <td height="37">&nbsp;</td>
    <td colspan="2"><strong>
      <?=setstring ( 'mal', 'Katalaluan', 'en', 'Password'); ?>
    </strong></td>
    <td colspan="4"><input name="katalaluan1" type="password" id="katalaluan1" value="123456" />



      <em><br />
      **
      <?=setstring ( 'mal', 'Sila masukkan kata laluan yang baru', 'en', 'Please insert your new password.'); ?>
      <br /> <?=setstring ( 'mal', 'Kata laluan asal adalah 123456', 'en', 'Default password is 123456 '); ?> </em>

    </td>
  </tr>
  <tr bgcolor="#99FF99">
    <td height="37">&nbsp;</td>
    <td colspan="2"><strong>

      <?=setstring ( 'mal', 'Taip semula kata laluan', 'en', 'Re-type Password'); ?>


    </strong></td>
    <td colspan="4"><input name="katalaluan2" type="password" id="katalaluan2" value="123456"  />
    <script language="javascript">
    	var f19 = new LiveValidation('katalaluan2');
		f19.add( Validate.Confirmation, { match: 'katalaluan1' } );
    </script>


      <em><br />
      **


            <?=setstring ( 'mal', 'Sila sahkan semula kata laluan yang baru', 'en', 'Please re-type your new password'); ?>

      </em></td>
  </tr>
  <tr>
    <td width="14" height="37">&nbsp;</td>
    <td colspan="2"><b>
    <?=setstring ( 'mal', 'Jenis syarikat', 'en', 'Type of company'); ?>
    </b></td>
    <td colspan="4">
      <select name="syarikat" id="syarikat" style="width:330px">
        <option>-<?=setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
		<?php
		//$company = new syarikat('syarikat','');
		for ($i=0; $i<$company->total; $i++){ ?>
        <option value="<?= $company->comp_name[$i];?>"><?= $company->comp_name[$i]; ?></option>
        <?php } ?>
      </select>   </td>
    </tr>

  <tr>
    <td height="32" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"><strong>
    <?=setstring ( 'mal', 'Keahlian dalam persatuan', 'en', 'Membership in union'); ?>
    </b></strong></td>
    <td colspan="4" bgcolor="#99FF99">
      <select name="keahlian" id="keahlian" style="width:330px">
        <option>-<?=setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
		<?php for ($i=0; $i<$ahli->total; $i++){?>
        <option value="<?= $ahli->ahli_name[$i]; ?>"><?= $ahli->ahli_name[$i];?></option>
		<?php } ?>
      </select>    </td>
    </tr>

  <tr>
    <td height="31">&nbsp;</td>
    <td colspan="2"><strong>
    <?=setstring ( 'mal', 'Integrasi dengan kilang buah sawit', 'en', 'Integration with palmoil mill'); ?>
    </strong></td>
    <td>
      <input type="radio" name="integrasi" id="radio" value="Y" checked="checked" />
      <?=setstring ( 'mal', 'Ya', 'en', 'Yes'); ?></td>
    <td colspan="3">
      <input type="radio" name="integrasi" id="radio2" value="N" />
      <?=setstring ( 'mal', 'Tidak', 'en', 'No'); ?></td>
    </tr>
  <tr>
    <td height="24" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"> <strong>
    <?=setstring ( 'mal', 'Keluasan mengikut jenis tanah:', 'en', 'Area respected to soil type'); ?>
    </strong></td>
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
    <td colspan="2" bgcolor="#CCFFFF"><div align="left">a. <?=setstring ( 'mal', 'Tanah Lanar', 'en', 'Alluvial soil'); ?></div></td>
    <td bgcolor="#CCFFFF"><div align="center">
      <input name="lanar" type="text" autocomplete="off" class="field_active" id="lanar" onchange="field_blur(this,'s1')" value="0" size="3" />

      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectare'); ?>
      </div></td>
    <td bgcolor="#CCFFFF">
      <div align="center">
        <span id="s1">0 %</span></div></td>
    <td bgcolor="#CCFFFF">&nbsp;</td>
    <td width="42" bgcolor="#CCFFFF">&nbsp;</td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td height="35"></td>
    <td colspan="2" bgcolor="#FFCCCC"><div align="left">b.
    <?=setstring ( 'mal', 'Tanah Pedalaman', 'en', 'Inland Soil'); ?>
    </div></td>
    <td bgcolor="#FFCCCC">
      <div align="center">
<input name="pedalaman" type="text" autocomplete="off" class="field_active" id="pedalaman" onblur="field_blur(this,'s2')" onclick="field_click(this)" value="0" size="3" />
<?=setstring ( 'mal', 'Hektar', 'en', 'Hectare'); ?></div>

      <div align="center"></div></td>
    <td bgcolor="#FFCCCC">
      <div align="center">
        <span id="s2">0 %</span></div>    </td>
    <td bgcolor="#FFCCCC">&nbsp;</td>
    <td bgcolor="#FFCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="34"></td>
    <td colspan="2" bgcolor="#FFFFCC"><div align="left">c.
    <?=setstring ( 'mal', 'Tanah Gambut', 'en', 'Peat Soil'); ?>
     : </div></td>
    <td bgcolor="#FFFFCC"><div align="center"><span class="style1" id="total_luas"> </span></div></td>
    <td bgcolor="#FFFFCC">      <span class="style1" id="percent_luas">   </span>
        <div align="center"></div> </td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="37"></td>
    <td width="96" bgcolor="#FFFFCC"><div align="right">i) </div></td>
    <td width="151" bgcolor="#FFFFCC"> <?=setstring ( 'mal', 'Gambut Cetek', 'en', 'Shallow peat soil'); ?></td>
    <td width="216" bgcolor="#FFFFCC">
      <div align="center">
        <input name="gambutcetek" type="text" autocomplete="off" class="field_active" id="gambutcetek" onblur="field_blur(this,'s3')" onclick="field_click(this)" value="0" size="3" />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectare'); ?> </div></td>
    <td width="139" bgcolor="#FFFFCC">
      <div align="center">
        <span id="s3">0 %</span></div>    </td>
    <td width="54" bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="34"></td>
    <td bgcolor="#FFFFCC"><div align="right">ii) </div></td>
    <td bgcolor="#FFFFCC"> <?=setstring ( 'mal', 'Gambut Dalam', 'en', 'Deep peat soil'); ?></td>
    <td bgcolor="#FFFFCC"><div align="center">
      <input name="gambutdalam" type="text" autocomplete="off" class="field_active" id="gambutdalam" onblur="field_blur(this,'s4')" onclick="field_click(this)" value="0" size="3" />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectare'); ?></div></td>
    <td bgcolor="#FFFFCC">
      <div align="center">
        <span id="s4">0 %</span></div></td>
      <td width="54" bgcolor="#FFFFCC">&nbsp;</td>
      <td bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="27"></td>
    <td colspan="2" bgcolor="#CACAFF">d. <?=setstring ( 'mal', 'Lain-lain Jenis Tanah', 'en', 'Others'); ?>:</td>
    <td bgcolor="#CACAFF"><div align="center" class="style1" id="total_luas2"></div></td>
    <td bgcolor="#CACAFF"><span class="style1">

    </span>
    <div align="center" class="style1" id="percent_luas2"></div>    </td>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="37"></td>
    <td bgcolor="#CACAFF"><div align="right"> i)</div></td>
    <td bgcolor="#CACAFF"> <?=setstring ( 'mal', 'Laterit ', 'en', 'Lateritic'); ?></td>
    <td bgcolor="#CACAFF"><div align="center">
          <input name="laterit" type="text" autocomplete="off" class="field_active" id="laterit" onblur="field_blur(this,'s5')" onclick="field_click(this)" value="0" size="3" />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectare'); ?></div></td>
    <td bgcolor="#CACAFF"><div align="center">
          <span id="s5">0 %</span>
    </div>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="42"></td>
    <td bgcolor="#CACAFF"><div align="right">ii) </div></td>
    <td bgcolor="#CACAFF"> <?=setstring ( 'mal', 'Asid Sulfat', 'en', 'Acid Sulphate '); ?> </td>
    <td bgcolor="#CACAFF"><div align="center">
          <input name="asidsulfat" type="text" autocomplete="off" class="field_active" id="asidsulfat" onblur="field_blur(this,'s6')" onclick="field_click(this)" value="0" size="3" />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectare'); ?></div></td>
   <td bgcolor="#CACAFF"><div align="center">
     <span id="s6">0 %</span></div></td>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="26"></td>
    <td bgcolor="#CACAFF"><div align="right">iii)</div></td>
    <td bgcolor="#CACAFF">  <?=setstring ( 'mal', 'Tanah berpasir', 'en', 'Sandy Soil'); ?></td>
    <td bgcolor="#CACAFF"><div align="center">
      <input name="tanahpasir" type="text" autocomplete="off" class="field_active" id="tanahpasir" onblur="field_blur(this,'s7')" onclick="field_click(this)" value="0" size="3" />
      <?=setstring ( 'mal', 'Hektar', 'en', 'Hectare'); ?></div></td>
    <td bgcolor="#CACAFF"><div align="center"><strong>
      <span id="s7">0 %</span></strong></div></td>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>

  <tr>
    <td height="34" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"><strong><?=setstring ( 'mal', 'Bentuk mukabumi estet', 'en', 'Estate topography'); ?></b></strong></td>
    <td bgcolor="#99FF99">
      <div align="center">
        <select name="muka" id="muka" onchange="add_byr(this.value)">
          <option>-<?=setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
		  <?php for ($i=0; $i<$muka->total; $i++){ ?>
          <option value="<?= $muka->mb_name[$i]; ?>"><?php echo $muka->mb_name[$i]; ?></option>
		  <?php } ?>
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
            <td width="39%" bgcolor="#CCFF99"><strong>
			<?=setstring ( 'mal', 'Peratus kawasan rata/landai', 'en', 'Percentage of flat area'); ?></strong></td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentrata" type="text" autocomplete="off" onclick="field_click(this)" class="field_active" id="percentrata" value="0" size="3" onblur="field_blur(this)" />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" class="hide" id="alun">
          <tr>
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><strong>
            <?=setstring ( 'mal', 'Peratus kawasan beralun', 'en', 'Percentage of undulating terrain'); ?>
            </strong></td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentalun" type="text" autocomplete="off" onclick="field_click(this)" class="field_active" id="percentalun" value="0" size="3" onblur="field_blur(this)" />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
        </table>

        <table width="100%" border="0" cellspacing="0" class="hide" id="bukit">
          <tr>
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><strong>
            <?=setstring ( 'mal', 'Peratus kawasan berbukit', 'en', 'Percentage of hilly area'); ?>
            </strong></td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentbukit" type="text" autocomplete="off" onclick="field_click(this)" class="field_active" id="percentbukit" value="0" size="3" onblur="field_blur(this)" />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
          <tr>
            <td height="33" bgcolor="#CCFF99">&nbsp;</td>
            <td height="33" bgcolor="#CCFF99"><strong>
            <?=setstring ( 'mal', 'Peratus kecerunan melebihi 25 darjah', 'en', 'Percentage of area more than 25% slope'); ?>
            </strong></td>
            <td bgcolor="#CCFF99"><input name="percentcerun" type="text" autocomplete="off" onclick="field_click(this)" class="field_active" id="percentcerun" value="0" size="3" onblur="field_blur(this)" />
            % </td>
            <td bgcolor="#CCFF99">&nbsp;</td>
          </tr>
          </table></td></tr>
    <tr>
      <td height="17" colspan="7"><div align="center">
        <p>

          <input type="submit" name="button" id="button" value="  <?=setstring ( 'mal', 'Simpan', 'en', 'Save'); ?>  " />

          		  <button type="button" onclick="window.location.href='../logout.php'"><?=setstring ( 'mal', 'Batal', 'en', 'Cancel'); ?></button>
        </p>
        <p>&nbsp;  </p>
      </div></td>
    </tr>
</table>
</form>
