 <?php 
extract($_POST);
extract($_GET);?> <form action="save_work.php" method="post">
<table width="300px">
  <tr>
	<td colspan="3"><u><strong>Add worker for <?= $id=ucfirst($id); ?></strong></u></td>
  </tr>
  <tr>
	<td width="20%">Name (Malay)</td>
	<td width="1%">:</td>
	<td width="79%"><input name="malay" type="text" id="malay" size="50" />
	
	  <script type="text/javascript">
	var f11 = new LiveValidation('malay');
	f11.add( Validate.Presence );
	
	</script>
	
	</td>
  </tr>
  <tr>
	<td>Name (English)</td>
	<td>:</td>
	<td>
	  <input name="english" type="text" id="english" size="50" />
		<script type="text/javascript">
	var f12 = new LiveValidation('english');
		f12.add( Validate.Presence );
		
		</script>
	  
	  
  </td>
  </tr>
  <tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><input type="submit" name="button3" id="button3" value="    Save   " />
		<input type="reset" name="button4" id="button4" value="   Reset   " />
		<input name="type" type="hidden" id="type" value="addpekerjaestet" />
		<input name="id" type="hidden" id="id" value="<?= $id; ?>" /></td>
  </tr>
</table>
</form>            