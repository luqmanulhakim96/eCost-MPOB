<!-- kutip -->
      <tr>
        <td height="37">
        <?=setstring ('mal', 'Pengutipan buah relai', 'en', 'Loose fruit collection')?>
          <?php 
		$varjentera[2]='pengutipan';
		$jkutip = new user('jentera_estate',$varjentera);
		?>
		
		 <input name="kutip1[0]" type="hidden" id="kutip1[0]" value="<?= $jkutip->id_jentera[0];?>" />
          <input name="kutip2[0]" type="hidden" id="kutip2[0]" value="<?= $jkutip->lesen[0];?>" />
          <input name="kutip3[0]" type="hidden" id="kutip3[0]" value="<?= $jkutip->tahun[0];?>" />
          <input name="kutip4[0]" type="hidden" id="kutip4[0]" value="<?= $jkutip->nama_jentera[0]; ?>" />
          <input name="kutip5[0]" type="hidden" id="kutip5[0]" value="<?= $jkutip->type[0]; ?>" />		</td>
        <td><div align="center">
          <input type="text" class="field_active" name="peratus_pengutipan[0]" onKeypress="keypress(event)" size="11" id="peratus_pengutipan[0]" value="<?= number_format($jkutip->percent[0],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
%</div></td>
        <td>
          <div align="left">
            <select name="jentera_pengutipan[0]" id="jentera_pengutipan[0]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pengutipan_lain');">
              <option>-Pilih-</option>
              <?php 
			  $con = connect();
			  $q ="select * from jentera where kategori_jentera ='Pemungutan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  $total_pengutipan = mysql_num_rows($r);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jkutip->id_jentera[0]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="pengutipan_lain" class="<?php if($jkutip->nama_jentera[0]!=""){echo "show";} else{echo "hide";}?>">
            <input type="text" name="lain_pengutipan[0]" id="lain_pengutipan[0]" size="25" value="<?= ucwords($jkutip->nama_jentera[0]);?>" />
           </div>
          </div></td>
        <td><a href="javascript:add_kutip('b')"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
        <td><div align="center">
          <input type="text" class="field_active" name="bil_pengutipan[0]" onKeypress="keypress(event)" size="11" id="bil_pengutipan[0]" value="<?= number_format($jkutip->value[0]);?>" onchange="tukar_format2(this)" autocomplete="off" />
        </div></td>
      </tr>
      
	  	  <?php $totkutip= $jkutip->total; for ($b=1; $b<$total_pengutipan; $b++){?>

	  <tr bgcolor="#99FF99" class="<?php if($totkutip>$b){ echo "show";} else{echo "hide";}?>" id="b<?= $b; ?>">
        <td height="37"><label></label>
        <?=setstring ('mal', 'Pengutipan buah relai', 'en', 'Loose fruit collection')?>
		
		 <input name="kutip1[<?= $b; ?>]" type="hidden" id="kutip1[<?= $b; ?>]" value="<?= $jkutip->id_jentera[$b];?>" />
          <input name="kutip2[<?= $b; ?>]" type="hidden" id="kutip2[<?= $b; ?>]" value="<?= $jkutip->lesen[$b];?>" />
          <input name="kutip3[<?= $b; ?>]" type="hidden" id="kutip3[<?= $b; ?>]" value="<?= $jkutip->tahun[$b];?>" />
          <input name="kutip4[<?= $b; ?>]" type="hidden" id="kutip4[<?= $b; ?>]" value="<?= $jkutip->nama_jentera[$b]; ?>" />
          <input name="kutip5[<?= $b; ?>]" type="hidden" id="kutip5[<?= $b; ?>]" value="<?= $jkutip->type[$b]; ?>" />		</td>
        <td><div align="center">
          <input type="text" class="field_active" name="peratus_pengutipan[<?= $b; ?>]" onKeypress="keypress(event)" size="11" id="peratus_pengutipan[<?= $b; ?>]" value="<?= number_format($jkutip->percent[$b],2);?>" onchange="tukar_format(this)"; autocomplete="off" />
%</div></td>
        <td>
          <div align="left">
            <select name="jentera_pengutipan[<?= $b; ?>]" id="jentera_pengutipan[<?= $b; ?>]" style="border:#FF6600 1px solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; width:200px;" onchange="tukar_field(this.value, 'pengutipan_lain<?= $b; ?>');">
              <option>-Pilih-</option>
              <?php 
			  $con = connect();
			  $q ="select * from jentera where kategori_jentera ='Pemungutan' order by id_jentera";
			  $r = mysql_query($q,$con);
			  while($row=mysql_fetch_array($r)){?>
              <option value="<?= $row['nama_jentera'];?>" <?php if($row['nama_jentera']==$jkutip->id_jentera[$b]){?>selected="selected"<?php } ?>>
                <?= $row['nama_jentera'];?>
                </option>
              <?php } ?>
            </select>
			
			<div id="pengutipan_lain<?= $b; ?>" class="<?php if($jkutip->nama_jentera[$b]!=""){echo "show";} else{echo "hide";}?>">
            <input type="text" name="lain_pengutipan[<?= $b; ?>]" id="lain_pengutipan[<?= $b; ?>]" size="25" value="<?= ucwords($jkutip->nama_jentera[$b]);?>" />
           </div>
          </div></td>
        <td><a href="javascript:add_kutip('b')"><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
        <td><div align="center">
          <input type="text" class="field_active" name="bil_pengutipan[<?= $b; ?>]" onKeypress="keypress(event)" size="11" id="bil_pengutipan[<?= $b; ?>]" value="<?= number_format($jkutip->value[$b]);?>" onchange="tukar_format2(this)" autocomplete="off" />
        </div></td>
      </tr>
	  <?php } ?>