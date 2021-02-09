<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="facebox/facebox.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
})
</script>

<table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td height="26" colspan="4"><div align="center"><strong>List of Outlier Estate in <?= $region; ?></strong></div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td width="4%" class="style1">No.</td>
    <td width="37%" height="33" class="style1">Estate Name </td>
    <td width="31%" bgcolor="#8A1602" class="style1">Main Company </td>
    <td width="28%" class="style1">E-mail</td>
  </tr>
  <?php $con = connect();
 $q ="select * from esub  order by rand() limit 0,$total";
  $r = mysqli_query($con, $q);
  $j =0;
  while($row=mysqli_fetch_array($r)){
  ?>
  <tr valign="top">
    <td><?php echo ++$j; ?></td>
    <td><?= $row['Nama_Estet'];?></td>
    <td><?= $row['Syarikat_Induk'];?></td>
    <td><a href="email.php?bil=<?= $row['Bil'];?>" rel="facebox" ><?= $row['Emel'];?></a>
    <div align="center"></div></td>
  </tr>
  <?php } mysqli_close($con);?>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
