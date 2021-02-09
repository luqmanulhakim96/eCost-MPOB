<?php

session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");


include('../class/global.class.php');
$people = viewglobal("contact_person");
?>
<script type="text/javascript" src="../js/nice/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('bi');
});

</script>
<form id="form1" name="form1" method="post" action="home.php?id=config&amp;sub=people_set">
  <table width="100%">
    <tr>
      <td colspan="3"><h2>Custome Contact Person</h2></td>
    </tr>
    <tr>
      <td width="7%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="92%">&nbsp;</td>
    </tr>
    <tr valign="top">
      <td><strong>Description</strong></td>
      <td><strong>:</strong></td>
      <td><textarea name="bi" id="bi" cols="60" rows="5"><?php echo $people[1];?></textarea>
      <input name="id_pengumuman" type="hidden" id="id_pengumuman" value="<?php echo $people[0];?>" /></td>
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
 $q="update global_variables set description ='$bi' where value ='$id_pengumuman'";
$r= mysqli_query($con, $q);

echo "<script>window.location.href='home.php?id=config&sub=people_set';</script>";
}
?>
