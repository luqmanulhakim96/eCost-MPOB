<?php
include ('../Connections/connection.class.php');
set_time_limit(0);
extract($_GET);
extract($_POST);
$start = $level;
$end = $level+1;

$con = connect();
$qt="select * from type_taxonomy where typetaxo = '$type' order by ordering limit $start,$end";
$rt = mysqli_query($con,$qt);
$row = mysqli_fetch_array($rt);

?>
<style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><title>Add Element</title>
<table width="100%">
  <tr>
    <td><form id="form1" name="form1" method="post" action="save_element.php">
      <div align="center">
        <input name="domain" type="text" id="domain" size="40" autocomplete="off" />
        <input name="simpan" type="submit" class="bgbutton" id="simpan" value="Add New <?= $taxoname;?>" />
        <input type="button" name="button" id="button" value="Cancel" onclick="history.go(-1);" />




        <input name="parent" type="hidden" id="parent" value="<?php echo $taxoid; ?>" />
        <input name="type" type="hidden" id="type" value="<?= $type; ?>" />
        <?php if($taxoid ==0){$parent=0;}
		else {$parent = $level;}?>
        <input name="level" type="hidden" id="level" value="<?= $parent; ?>" />
        <input name="taxoname" type="hidden" id="taxoname" value="<?= $row['fieldtaxo']; ?>" />
        </div>
    </form></td>
  </tr>
</table>
