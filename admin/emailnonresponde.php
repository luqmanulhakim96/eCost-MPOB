<?php include ('../Connections/connection.class.php');
	extract($_REQUEST);
	$lesen = $_GET['bil'];
?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style2 {
	font-size: 14px;
	font-weight: bold;
	color: #FFFFFF;
}
-->
</style>
<?php 
	$con = connect();
	$q	= "SELECT ekilang.syarikat_induk, ekilang.no_lesen lesen, ekilang.nama_kilang nama, ekilang.negeri negeri, alamat_ekilang.alamatsurat1 alamat1,  alamat_ekilang.alamatsurat2 alamat2, alamat_ekilang.alamatsurat3 alamat3, alamat_ekilang.notel notel, alamat_ekilang.nofax nofax, alamat_ekilang.email, alamat_ekilang.pegawai FROM ekilang";
	$q .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$q .= " WHERE ekilang.no_lesen = '$lesen'";
	$q .= " LIMIT 1";
	$r = mysql_query($q,$con);
	$row=mysql_fetch_array($r);
?>
<form id="form1" name="form1" method="post" action="email.php?bil=<?= $row['email'];?>">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="2" style="border:1px #333333 solid">
    <tr bgcolor="#8A1602">
      <td height="36" colspan="5" bgcolor="#8A1602"><span class="style2">Send Notifications about Non Response Survey </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="2%">&nbsp;</td>
      <td width="20%"><strong>Estet</strong></td>
      <td width="2%"><strong>:</strong></td>
      <td width="76%" colspan="2"><?= $row['nama'];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>No Lesen (Baru)</strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><?= $row['lesen'];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Alamat Surat Menyurat </strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><?php echo $row['alamat1']; ?> <?php echo $row['alamat2']; ?> <?php echo $row['alamat3']; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Negeri</strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><?= $row['negeri'];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>No. Telefon</strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><?= $row['notel'];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>No. Faks</strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><?= $row['nofax'];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Emel</strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><?= $row['email'];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Pengurus</strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><?= $row['pegawai'];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Syarikat Induk</strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><?= $row['syarikat_induk'];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Daerah Premis </strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><?= $row['Daerah_Premis'];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Negeri Premis </strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><?= $row['Negeri_Premis'];?></td>
    </tr>
    <tr valign="top">
      <td>&nbsp;</td>
      <td><strong>Note</strong></td>
      <td><strong>:</strong></td>
      <td colspan="2"><strong>
        <textarea id="mesej" name="mesej" cols="50" rows="6"></textarea>
      </strong></td>
    </tr>
    <tr valign="top">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">
	  <input type="submit" name="Submit" value="Send Email" />
	  <input type="reset" name="Submit2" value="Reset" />
	  </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
  </table>
</form>
<?php //} ?>