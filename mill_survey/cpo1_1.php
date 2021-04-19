<?php session_start();
include('../Connections/connection.class.php');
include('../class/syarikat.class.php');
$company= new syarikat('syarikat','');
$teknologi = new syarikat('steril','');
include('../setstring.inc');
?>


<script language="javascript">
function semaksama(){

	var a = document.getElementById("katalaluan1").value;
	var b = document.getElementById("katalaluan2").value;


	if(a!=b){
	alert("<?=setstring ( 'mal', 'Katalaluan tidak sama', 'en', 'Password is not match'); ?>");
	}

	}


</script>
<script src="../js/live/livevalidation_standalone.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="../js/live/consolidated_common.css">

<link rel="stylesheet" type="text/css" href="../text_style.css" />
<script type="text/javascript" src="../text_js.js"></script>
<form id="form1" name="form1" method="post" action="save_first.php">
  <table width="64%" align="center" cellspacing="0" class="tableCss" style="border:1px #333333 solid; padding:2px;">
    <tr>
      <td height="33" bgcolor="#99FF99">&nbsp;</td>
      <td bgcolor="#99FF99"><strong>
        <?=setstring ( 'mal', 'Katalaluan', 'en', 'Password'); ?>
      </strong></td>
      <td colspan="2" bgcolor="#99FF99"><input name="katalaluan1" type="password" id="katalaluan1" value="123456" />
        <br />

       <script language="javascript">
      var f1 = new LiveValidation('katalaluan1');
f1.add( Validate.Presence );
      </script>

       <em>**
       <?=setstring ( 'mal', 'Sila masukkan kata laluan yang baru', 'en', 'Please insert your new password.'); ?>
       <br />
       <?=setstring ( 'mal', 'Kata laluan asal adalah 123456', 'en', 'Default password is 123456 '); ?>
       </em></td>
    </tr>
    <tr>
      <td height="17" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td height="33" bgcolor="#99FF99">&nbsp;</td>
      <td bgcolor="#99FF99"><strong>
        <?=setstring ( 'mal', 'Taip semula kata laluan', 'en', 'Re-type Password'); ?>
      </strong></td>
      <td colspan="2" bgcolor="#99FF99"><input name="katalaluan" type="password" id="katalaluan" value="123456"   />

       <script language="javascript">
    	var f19 = new LiveValidation('katalaluan');
		f19.add( Validate.Confirmation, { match: 'katalaluan1' } );
    </script>
       <em><br />
       **
       <?=setstring ( 'mal', 'Sila sahkan semula kata laluan yang baru', 'en', 'Please re-type your new password'); ?>
</em></td>
    </tr>
    <tr>
      <td height="17">&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="14" height="37" bgcolor="#99FF99">&nbsp;</td>
      <td width="218" bgcolor="#99FF99"><strong>
      <?=setstring ( 'mal', 'Jenis Syarikat', 'en', 'Company Type'); ?>

      </strong></td>
      <td colspan="2" bgcolor="#99FF99"><select name="syarikat" id="syarikat" style="width:330px">
          <option>-<?=setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
          <?php
		//$company = new syarikat('syarikat','');
		for ($i=0; $i<$company->total; $i++){ ?>
          <option value="<?= $company->comp_name[$i];?>">
          <?= $company->comp_name[$i]; ?>
          </option>
          <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td height="15" colspan="4">&nbsp;</td>
    </tr>


    <tr>
      <td height="33" bgcolor="#99FF99">&nbsp;</td>
      <td bgcolor="#99FF99"><strong>
      <?=setstring ( 'mal', 'Teknologi Pensterilan', 'en', 'Sterilization Technology'); ?>
      </strong></td>
      <td colspan="2" bgcolor="#99FF99"><label>
        <select name="teknologi" id="teknologi">
          <option>-<?=setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
          <?php for($i=0; $i<$teknologi->total; $i++){?>
          <option value="<?= $teknologi->nama[$i];?>">
            <?= $teknologi->nama[$i];?>
          </option>
          <?php } ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td height="15" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td height="33" bgcolor="#99FF99">&nbsp;</td>
      <td bgcolor="#99FF99"><strong>
      <?=setstring ( 'mal', 'Integrasi dengan estate kelapa sawit', 'en', 'Integrated with an oil palm estate /s'); ?>
      </b></strong></td>
      <td width="228" bgcolor="#99FF99"><input type="radio" name="integrasi" id="radioIntegrasi1"  value="Y"  checked="checked"/>        <?=setstring ( 'mal', 'Ya', 'en', 'Yes'); ?></td>
      <td width="214" bgcolor="#99FF99"><input type="radio" name="integrasi" id="radioIntegrasi2" value="N"/>
      <?=setstring ( 'mal', 'Tidak', 'en', 'No'); ?></td>
    </tr>
    <tr>
      <td height="15" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td height="38" valign="top" bgcolor="#99FF99">&nbsp;</td>
      <td bgcolor="#99FF99"><strong>
      <?=setstring ( 'mal', 'Tahun kilang mula beroperasi', 'en', 'Year of mill first started operating'); ?>
      </strong></td>
      <td bgcolor="#99FF99"><label>
        <input name="tahun_operasi" type="text" autocomplete="off" class="field_active" id="tahun_operasi" size="4" maxlength="4" />
      </label></td>
      <td bgcolor="#99FF99">&nbsp;</td>
    </tr>
    <tr>
      <td height="31" valign="top">&nbsp;</td>
      <td colspan="3"><div align="center">
          <input type="submit" name="button" id="button" value="<?=setstring ( 'mal', 'Simpan', 'en', 'Save'); ?>" onclick="window.href.location='home.php?id=home'" />
          <input type="button" name="button2" id="button2" value="<?=setstring ( 'mal', 'Batal', 'en', 'Cancel'); ?>" onclick="window.location.href='../logout.php'" />
      </div></td>
    </tr>
  </table>
</form>
