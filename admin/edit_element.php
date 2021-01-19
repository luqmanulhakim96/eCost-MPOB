<?php
include ('../Connections/connection.class.php');
set_time_limit(0);
extract($_GET);
extract($_POST);
$start = $level;
$end = $level+1; 

$con = connect();
$qt="select * from taxonomy_all where id = '$taxoid'";
$rt = mysql_query($qt,$con); 
$row = mysql_fetch_array($rt);

?>
<style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><title>Add Element</title>

<?php if($send!=true){?>
<table width="100%">
  <tr>
    <td><form id="form1" name="form1" method="post" action="edit_element.php">
      <div align="center">
        <input name="domain" type="text" id="domain" value="<?php echo $row['name'];?>" size="60" autocomplete="off" />
        <input name="position" type="text" value="<?php echo $row['position'];?>" id="position" size="4" />
        <input name="simpan" type="submit" class="bgbutton" id="simpan" value="Edit" />
        <input type="button" name="button" id="button" value="Cancel" onclick="history.go(-1);" />
        <input name="id" type="hidden" id="id" value="<?php echo $taxoid; ?>" />
        <input name="send" type="hidden" id="send" value="true" />
      </div>
    </form></td>
  </tr>
</table>
<?php } ?>
<?php
if(isset($simpan)){

        $con = connect();
		$query = "update taxonomy_all set name = '$domain', position ='$position' where id = '$id' ";
		$res = mysql_query($query,$con);
		
		echo "<script>window.location.href='home.php?id=config&sub=chapter';</script>";

}
?>
