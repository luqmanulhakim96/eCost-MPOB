<?php 
		  $totpungut=$jpungut->total; 
		  for ($p=1; $p<$total_pemungutan; $p++){
		  
		  ?>

	  <tr class="<?php if($totpungut>$p){ echo "show";} else{echo "hide";}?>" id="sp<?= $p; ?>">
        <td height="35"><?=setstring ( 'mal', 'Pengutipan buah relai', 'en', 'Loose fruit collection'); ?> 
		
		 <input name="pungut1[<?= $p; ?>]" type="hidden" id="pungut1[<?= $p; ?>]" value="<?= $jpungut->id_jentera[$p];?>" />
          <input name="pungut2[<?= $p; ?>]" type="hidden" id="pungut2[<?= $p; ?>]" value="<?= $jpungut->lesen[$p];?>" />
          <input name="pungut3[<?= $p; ?>]" type="hidden" id="pungut3[<?= $p; ?>]" value="<?= $jpungut->tahun[$p];?>" />
          <input name="pungut4[<?= $p; ?>]" type="hidden" id="pungut4[<?= $p; ?>]" value="<?= $jpungut->nama_jentera[$p]; ?>" />
          <input name="pungut5[<?= $p; ?>]" type="hidden" id="pungut5[<?= $p; ?>]" value="<?= $jpungut->type[$p]; ?>" />		</td>
        <td><div align="center">
            <input type="text" class="field_active" name="peratus_pemungutan[<?= $p; ?>]" onKeypress="keypress(event)" size="11" id="peratus_pemungutan[<?= $p; ?>]" value="<?= number_format($jpungut->percent[$p],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
          %</div></td>
        <td><div align="left">
          <select name="jentera_pemungutan[<?= $p; ?>]" id="jentera_pemungutan[<?= $p; ?>]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pemungutan_lain<?= $p; ?>');">
            <option>-Pilih-</option>
            <?php 
			  $con = connect();
			  $q ="select * from jentera where kategori_jentera ='Pemungutan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  while($row=mysql_fetch_array($r)){?>
            <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jpungut->id_jentera[$p]){?>selected="selected"<?php } ?>>
              <?= $row['nama_jentera'];?>
              </option>
            <?php } ?>
          </select>
		  
		  <div id="pemungutan_lain<?= $p; ?>" class="<?php if($jpungut->nama_jentera[$p]!=""){echo "show";} else{echo "hide";}?>">
            <input type="text" name="lain_pemungutan[<?= $p; ?>]" id="lain_pemungutan[<?= $p; ?>]" size="25" value="<?= ucwords($jpungut->nama_jentera[$p]);?>" />
           </div>
		  
        </div></td>
        <td><a href="javascript:add_pungut('p')"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
        <td><div align="center">
            <input type="text" class="field_active" name="bil_pemungutan[<?= $p; ?>]" onKeypress="keypress(event)" size="11" id="bil_pemungutan[<?= $p; ?>]" value="<?= number_format($jpungut->value[0]);?>" onchange="tukar_format2(this)" autocomplete="off" />
        </div></td>
      </tr>
	  <?php } ?>