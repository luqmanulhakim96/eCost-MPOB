<?php
session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");
	   

$con = connect();
		$query = "select * from pengumuman ";
		$res = mysql_query($query,$con);
		$row = mysql_fetch_array($res); 
		$res_total = mysql_num_rows($res);
?>
<script type="text/javascript" src="../js/nice/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('bm');
	new nicEditor({fullPanel : true}).panelInstance('bi');
});

</script>
<form id="form1" name="form1" method="post" action="home.php?id=config&amp;sub=announce_set">
  <table width="100%">
    <tr>
      <td colspan="3"><h2>Annoucement Setting</h2></td>
    </tr>
    <tr>
      <td width="7%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="92%">&nbsp;</td>
    </tr>
    <tr valign="top">
      <td><strong>Bahasa</strong></td>
      <td><strong>:</strong></td>
      <td><textarea name="bm" id="bm" cols="60" rows="5"><?php echo $row['PENGUMUMAN'];?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="top">
      <td><strong>English</strong></td>
      <td><strong>:</strong></td>
      <td><textarea name="bi" id="bi" cols="60" rows="5"><?php echo $row['PENGUMUMAN_BI'];?></textarea>
      <input name="id_pengumuman" type="hidden" id="id_pengumuman" value="<?php echo $row['ID_PENGUMUMAN'];?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="save" id="save" value="Save" onclick="return confirm('Update this data?');" />
      <input type="reset" name="button2" id="button2" value="Reset" /></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<?php 
if(isset($save)){

$con = connect();
 $q="update pengumuman set pengumuman ='$bm', pengumuman_bi ='$bi' where id_pengumuman ='$id_pengumuman'";
$r= mysql_query($q,$con);

echo "<script>window.location.href='home.php?id=config&sub=announce_set';</script>";
}
?>