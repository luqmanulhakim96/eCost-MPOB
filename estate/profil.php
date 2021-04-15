<?php
session_start();
include('../Connections/connection.class.php');
include('../class/user.class.php');
include('../class/district.class.php');
include('../setstring.inc');
$pengguna = new user('estate',$_SESSION['lesen']);
$negeri = new daerah('negeri','');
?>
<script type="text/javascript">
	$('.poskod').numeric();
</script>

<script type="text/javascript">
	$('.telefon').numeric({allow:"-"});
</script><style type="text/css">

</style>
<form action="update_profil.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" style="border:1px #333333 solid">
    <tr>
      <td width="1%" height="33">&nbsp;</td>
      <td width="15%"><strong><?=setstring ( 'mal', 'Alamat 1', 'en', 'Address 1'); ?> </strong></td>
      <td width="3%"><strong>:</strong></td>
      <td width="81%" colspan="2">
        <input name="alamat1" type="text" id="alamat1" value="<?= $pengguna->alamat1; ?>" size="50" />
        <input name="nolesen" type="hidden" id="nolesen" value="<?= $_SESSION['lesen'];?>" /></td>
    </tr>
    <tr>
      <td height="35">&nbsp;</td>
      <td><strong><?=setstring ( 'mal', 'Alamat 2', 'en', 'Address 2'); ?></strong></td>
      <td><strong>:</strong></td>
      <td colspan="2">
      <input name="alamat2" type="text" id="alamat2" value="<?= $pengguna->alamat2; ?>" size="50" /></td>
    </tr>
    <tr>
      <td height="35">&nbsp;</td>
      <td><strong><?=setstring ( 'mal', 'Poskod', 'en', 'Postcode'); ?></strong></td>
      <td><strong>:</strong></td>
      <td colspan="2">
      <input name="poskod" type="text" id="poskod" value="<?= $pengguna->poskod; ?>" size="50" class="poskod"/></td>
    </tr>
    <tr>
      <td height="31">&nbsp;</td>
      <td><strong><?=setstring ( 'mal', 'Daerah', 'en', 'District'); ?></strong></td>
      <td><strong>:</strong></td>
      <td colspan="2">
      <input name="daerah" type="text" id="daerah" value="<?php $pb = $pengguna->bandar; echo str_replace(",","",$pb); ?>" size="50" /></td>
    </tr>
    <tr>
      <td height="36">&nbsp;</td>
      <td><strong><?=setstring ( 'mal', 'Negeri', 'en', 'State'); ?></strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><select name="negeri" id="negeri">
        <?php for ($i=0; $i<$negeri->total; $i++ ){?>
		<option value="<?= $negeri->namanegeri[$i]; ?>" <?php if ($negeri->namanegeri[$i]==$pengguna->negeri){ ?>selected="selected"<?php } ?>><?= $negeri->namanegeri[$i];?></option>
		<?php } ?>
      </select>
      </td>
    </tr>
    <tr>
      <td height="35">&nbsp;</td>
      <td><strong><?=setstring ( 'mal', 'No. Telefon', 'en', 'Phone No.'); ?></strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"> <input name="notelefon" type="text" id="notelefon" value="<?= $pengguna->notelefon; ?>" size="50" class="telefon" /></td>
    </tr>
    <tr>
      <td height="32">&nbsp;</td>
      <td><strong><?=setstring ( 'mal', 'No. Faks', 'en', 'Fax No.'); ?></strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"> <input name="nofax" type="text" id="nofax" value="<?= $pengguna->nofax; ?>" size="50" class="telefon" /></td>
    </tr>
    <tr>
      <td height="31">&nbsp;</td>
      <td><strong><?=setstring ( 'mal', 'Emel', 'en', 'E-mail'); ?></strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"> <input name="email" type="text" id="email" value="<?= $pengguna->email; ?>" size="50" /></td>
    </tr>





    <tr>
      <td colspan="5">
          <div align="center"><br />
            <input type="submit" name="Submit" value="<?=setstring ( 'mal', 'Simpan', 'en', 'Save'); ?>" />
            <input type="reset" name="Reset" value="<?=setstring ( 'mal', 'Batal', 'en', 'Reset'); ?>" />
      </div></td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
  </table>
</form>
