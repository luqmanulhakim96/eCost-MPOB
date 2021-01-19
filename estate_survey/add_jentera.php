<?php include('../Connections/connection.class.php');
extract($_POST);
extract($_GET);?>

<form id="form1" name="form1" method="post" action="">
  <table width="100%">
    <tr>
      <td colspan="2"><u><span class="style1">Tambah Jentera </span></u></td>
    </tr>
    <tr>
      <td>Kategori</td>
      <td>:
      <input name="jentera" type="text" id="jentera" value="<?= $jentera; ?>" /></td>
    </tr>
    <tr>
      <td width="19%">Nama Jentera </td>
      <td width="81%">:
      <input name="nama" type="text" id="nama" size="40" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="tambah" type="submit" id="tambah" value="Tambah" />
      <input type="button" name="Submit2" value="   Batal  " onclick="window.cloase();" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<?php if(isset($tambah))
{
	$con = connect();
	$q ="insert into jentera values('','$jentera','$nama')";
	$r = mysql_query($q,$con);
	echo "<script>window.close();top.opener.window.location.reload();</script>";
}
?>