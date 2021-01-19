<?php 
extract($_POST);
extract($_GET);?>
<form action="save_work.php" method="post">
<table width="300px">
  <tr>
	<td colspan="3"><u><strong>Add machine</strong></u></td>
  </tr>
  <tr>
	<td width="20%">Type of machine</td>
	<td width="1%">:</td>
	<td width="79%"><input name="nama_jentera" type="text" id="nama_jentera" size="50" />
	
	  <script type="text/javascript">
	var namajentera = new LiveValidation('nama_jentera');
	namajentera.add( Validate.Presence );
	
	</script>                    </td>
  </tr>

  <tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><input type="submit" name="button3" id="button3" value="    Save   " />
		<input type="reset" name="button4" id="button4" value="   Reset   " />
	  <input name="type" type="hidden" id="type" value="addmachine" />
	  <input name="id" type="hidden" id="id" value="<?= $id; ?>" /></td>
  </tr>
</table>
</form>