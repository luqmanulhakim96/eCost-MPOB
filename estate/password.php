<?php session_start();
include('../Connections/connection.class.php');
include ('../class/user.class.php');
include('../setstring.inc');
$pengguna = new user('estate',$_SESSION['lesen']);
?><style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>

<form action="save_password.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%">
    <tr>
      <td colspan="2" style="font-size:14px"><u><b><?=setstring ( 'mal', 'Tukar kata laluan', 'en', 'Change Password'); ?></b></u></td>
    </tr>
    
    <tr>
      <td width="27%" height="39"><?=setstring ( 'mal', 'Nama Pengguna', 'en', 'User Name'); ?></td>
      <td width="73%">:
      <input name="name_estet" type="text" id="name_estet" value="<?= $pengguna->namaestet; ?>" size="40" readonly="true" />
      <input name="nolesen" type="hidden" id="nolesen" value="<?= $_SESSION['lesen']; ?>" /></td>
    </tr>
    <tr>
      <td height="38"><?=setstring ( 'mal', 'Kata laluan baru', 'en', 'Password'); ?></td>
      <td>:
      <input name="password" type="password" style="background: #B4E7E9" id="password" value="<?= $pengguna->password; ?>" size="40" /></td>
    </tr>
    <tr>
      <td height="41"><?=setstring ( 'mal', 'Kata laluan baru(masuk semula)', 'en', 'Re-enter password'); ?></td>
      <td>:
      <input name="repassword" type="password" style="background: #B4E7E9" id="repassword" value="<?= $pengguna->password; ?>" size="40" />
	  
	  </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="<?=setstring ( 'mal', 'Simpan', 'en', 'Save'); ?>" />
      <input type="reset" name="Submit2" value="<?=setstring ( 'mal', 'Batal', 'en', 'Reset'); ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
