  <?php include('../Connections/connection.class.php');
  extract($_POST);
  extract($_GET);

  $con =connect();

  if($jenis=="editpengangkutan"){
  $jenisa="editpengangkutan";
  $title=" 	Pengangkutan BTS ke Kilang [Transport of FFBs to Mill]";
  $qp ="select * from pengangkutan_var where id_pengangkutan='$id' ";}

  else if($jenis =="editpenuaian"){
  $jenisa="editpenuaian";
  $title = "Penuaian dan Pemungutan BTS [Harvesting and Collection of FFBs]";
  $qp ="select * from penuaian_var where id_penuaian='$id' ";}

 else if($jenis =="editpenjagaan"){
  $jenisa="editpenjagaan";
  $title = "Penjagaan [Upkeep]";
 $qp ="select * from penjagaan_mature_var where id_penjagaan='$id' ";
 }


  else if($jenis =="editperbelanjaan"){
  $jenisa="editperbelanjaan";
  $title = "Maklumat mengenai Perbelanjaan Am [General Expenses Information]";
 $qp ="select * from perbelanjaan_am_var where id_perbelanjaan='$id' ";
 }


  $rp = mysqli_query($con, $qp);
  $row=mysqli_fetch_array($rp);
  ?>
  <form action="save_mature.php" method="post">
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
