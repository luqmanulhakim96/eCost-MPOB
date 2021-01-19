<?php
 include('../Connections/connection.class.php'); 
 extract($_REQUEST);
 $con=connect();
 if(isset($simpan)){
 	
	if($total==0){
 	$q="insert into ekilang_state (lesen, daerah, negeri) values ('$lesen', ucase('$daerah'), ucase('$negeri'))";
	}
	if($total!=0){
 echo	 $q="update ekilang_state set daerah =ucase('$daerah'), negeri=ucase('$negeri') where lesen='$lesen'";
	}
	$r=mysql_query($q,$con);
	
	echo "<script>window.location.href='edit_kilang.php'</script>";

 }
 
 
 $con=connect();
  $q="select * from ekilang_state where lesen ='$nolesen'";
 $r=mysql_query($q,$con);
 $row = mysql_fetch_array($r);
 
?>
<form id="form1" name="form1" method="post" action="save_state_kilang.php">
  <table width="100%">
    <tr>
      <td width="9%">No Lesen</td>
      <td width="91%">: 
      <input name="lesen" type="text" id="lesen" value="<?php echo $nolesen; ?>" readonly="true" /></td>
    </tr>
    <tr>
      <td>Daerah </td>
      <td>:
      <input type="text" name="daerah" id="daerah" value="<?php echo $row['daerah'];?>" /></td>
    </tr>
    <tr>
      <td>Negeri</td>
      <td>:
        <label>
        <input type="text" name="negeri" id="negeri" value="<?php echo $row['negeri'];?>" />
        <input name="total" type="hidden" id="total" value="<?php echo $total; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="simpan" id="simpan" value="Simpan" /></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
