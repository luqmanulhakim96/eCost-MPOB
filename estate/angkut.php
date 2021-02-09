<tr bgcolor="#99FF99">
    <td height="37"><?=setstring ('mal', 'Pengangkutan BTS dari platform atau pusat pengumpulan ke kilang', 'en', 'Mainline loading of FFBs from platform or collection centres to mill')?>
	<?php
		$varjentera[2]='pengangkutan';
		$angkut = new user('jentera_estate',$varjentera);
	?>
		<input name="angkut1[0]" type="hidden" id="angkut1[0]" value="<?= $angkut->id_jentera[0];?>" />
        <input name="angkut2[0]" type="hidden" id="angkut2[0]" value="<?= $angkut->lesen[0];?>" />
        <input name="angkut3[0]" type="hidden" id="angkut3[0]" value="<?= $angkut->tahun[0];?>" />
        <input name="angkut4[0]" type="hidden" id="angkut4[0]" value="<?= $angkut->nama_jentera[0]; ?>" />
        <input name="angkut5[0]" type="hidden" id="angkut5[0]" value="<?= $angkut->type[0]; ?>" />
	</td>
    <td>
		<div align="center">
			<input type="text" class="field_active" name="peratus_pengangkutan[0]" onKeypress="keypress(event)" size="11" id="peratus_pengangkutan[0]" value="<?= number_format($angkut->percent[0],2);?>" onchange="tukar_format(this)"; autocomplete="off" />%</div>
		</td>
    <td>
        <div align="left">
            <select name="jentera_pengangkutan[0]" id="jentera_pengangkutan[0]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pengangkutan_lain');">
				<option>-Pilih-</option>
				<?php
					$con = connect();
					$q ="select * from jentera where kategori_jentera ='pengangkutan' order by id_jentera";
					$r = mysqli_query($con, $q);
					$total_pengangkutan = mysqli_num_rows($r);
					while($row=mysqli_fetch_array($r)){
				?>
				<option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$angkut->id_jentera[0]){?>selected="selected"<?php } ?>><?= $row['nama_jentera'];?></option>
              <?php } ?>
            </select>
			<div id="pengangkutan_lain" class="<?php if($angkut->nama_jentera[0]!=""){echo "show";} else{echo "hide";}?>">
				<input type="text" name="lain_pengangkutan[0]" id="lain_pengangkutan[0]" size="25" value="<?= ucwords($angkut->nama_jentera[0]);?>" />
			</div>
        </div>
	</td>
    <td><a href="javascript:add_angkut('b')"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
	<td>
		<div align="center">
			<input type="text" class="field_active" name="bil_pengangkutan[0]" onKeypress="keypress(event)" size="11" id="bil_pengangkutan[0]" value="<?= number_format($angkut->value[0]);?>" onchange="tukar_format2(this)"; autocomplete="off" />
        </div>
	</td>
</tr>

<?php
	$totpunggah= $angkut->total;
	for ($b=1; $b<$total_pengangkutan; $b++){?>

<tr bgcolor="#99FF99" class="<?php if($totpunggah>$b){ echo "show";} else{echo "hide";}?>" id="b<?= $b; ?>">
    <td height="37"><?=setstring ('mal', 'Pengangkutan BTS dari platform atau pusat pengumpulan ke kilang', 'en', 'Mainline loading of FFBs from platform or collection centres to mill')?>
		<input name="angkut1[<?= $b; ?>]" type="hidden" id="angkut1[<?= $b; ?>]" value="<?= $angkut->id_jentera[$b];?>" />
        <input name="angkut2[<?= $b; ?>]" type="hidden" id="angkut2[<?= $b; ?>]" value="<?= $angkut->lesen[$b];?>" />
        <input name="angkut3[<?= $b; ?>]" type="hidden" id="angkut3[<?= $b; ?>]" value="<?= $angkut->tahun[$b];?>" />
        <input name="angkut4[<?= $b; ?>]" type="hidden" id="angkut4[<?= $b; ?>]" value="<?= $angkut->nama_jentera[$b]; ?>" />
        <input name="angkut5[<?= $b; ?>]" type="hidden" id="angkut5[<?= $b; ?>]" value="<?= $angkut->type[$b]; ?>" />		</td>
    <td>
		<div align="center">
			<input type="text" class="field_active" name="peratus_pengangkutan[<?= $b; ?>]" onKeypress="keypress(event)" size="11" id="peratus_pengangkutan[<?= $b; ?>]" value="<?= number_format($angkut->percent[$b],2);?>" onchange="tukar_format(this)"; autocomplete="off" />%
		</div>
	</td>
    <td>
        <div align="left">
            <select name="jentera_pengangkutan[<?= $b; ?>]" id="jentera_pengangkutan[<?= $b; ?>]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pengangkutan_lain<?= $b; ?>');">
				<option>-Pilih-</option>
				<?php
					$con = connect();
					$q ="select * from jentera where kategori_jentera ='pengangkutan' order by id_jentera";
					$r = mysqli_query($con, $q);
					while($row=mysqli_fetch_array($r)){?>
					<option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$angkut->id_jentera[$b]){?>selected="selected"<?php } ?>>
				<?= $row['nama_jentera'];?>
				</option>
				<?php } ?>
			</select>

		<div id="pengangkutan_lain<?= $b; ?>" class="<?php if($angkut->nama_jentera[$b]!=""){echo "show";} else{echo "hide";}?>">
            <input type="text" name="lain_pengangkutan[<?= $b; ?>]" id="lain_pengangkutan[<?= $b; ?>]" size="25" value="<?= ucwords($angkut->nama_jentera[$b]);?>" />
        </div>
        </div>
	</td>
    <td><a href="javascript:add_angkut('b')"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
    <td>
		<div align="center">
			<input type="text" class="field_active" name="bil_pengangkutan[<?= $b; ?>]" onKeypress="keypress(event)" size="11" id="bil_pengangkutan[<?= $b; ?>]" value="<?= number_format($angkut->value[$b]);?>" onchange="tukar_format2(this)"; autocomplete="off" />
        </div>
	</td>
</tr>
<?php } ?>
