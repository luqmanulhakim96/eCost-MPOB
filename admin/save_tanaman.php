  <?php include('../Connections/connection.class.php');
  extract($_POST);
  extract($_GET);

  $con =connect();

  if($jenis==""){
  $jenisa="edittanaman";
  $title="Jenis penanaman [type of planted]";
  $qp ="select * from tanaman_var where id_tanaman='$id' ";}

  else if($jenis =="editbelanja"){
  $jenisa="editbelanja";
  $title = "Perbelanjaan Tidak Berulang / Non-Recurrent Expenditures";
  $qp ="select * from belanja_takulang_var where id_belanja='$id' ";}

 else if($jenis =="editpenjagaan"){
  $jenisa="editpenjagaan";
  $title = "Penjagaan [Upkeep]";
 $qp ="select * from penjagaan_var where id_penjagaan='$id' ";
 }

 else if($jenis =="editpembajaan"){
  $jenisa="editpembajaan";
  $title = "Pembajaan [Fertilizer Application]";
 $qp ="select * from pembajaan_var where id_pembajaan='$id' ";
 }

  $rp = mysqli_query($con, $qp);
  $row=mysqli_fetch_array($rp);
  ?>
  <form action="save_immature.php" method="post">
	<table width="300px">
	  <tr>
		<td colspan="3"><u><strong><?= $title; ?>
		</strong></u></td>
	  </tr>
	  <tr>
		<td width="20%">Name (Malay)</td>
		<td width="1%">:</td>
		<td width="79%"><input name="malay" type="text" id="malay" value="<?= $row['nama_malay'];?>" size="50" />

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
		  <input name="english" type="text" id="english" value="<?= $row['nama_english'];?>" size="50" />
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
			<input name="type" type="hidden" id="type" value="<?= $jenisa; ?>" />
			<input name="id" type="hidden" id="id" value="<?= $id; ?>" /></td>
	  </tr>
	</table>
  </form>
