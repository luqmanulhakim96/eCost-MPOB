<script type="text/javascript">
		$(function() {
		$("#sw-simpan").hide();
		$("#sw-simpan").click(function() {
			$("#borang").hide();
			$("#borang").html(html);
			$("#borang").show();
			$("#sw-sunting").show();
			$("#sw-simpan").hide();
		});
		$("#sw-sunting").click(function() {
			$("#sw-sunting").hide();
			$("#sw-simpan").show();
			$("#borang").hide();
			html = $("#borang").html();
			$.post("po1_1.php?r=1","",function(out) {
				$("#borang").html(out);
				$("#borang").show("slow");
			});
		});
		});
		var html = null;



		var total_ha =  <?= $pengguna->jumlahluas; ?>;
		function field_blur(obj,obj_id) {
			if(number_only(obj)) {
				val = obj.value * 1;
				percentage = val/total_ha;
				percentage = percentage * 100.0;
				percentage = bulatkan(percentage);
				$("#" + obj_id).html(percentage + " %");
				if(percentage > 100.0) {
					$("#" + obj_id).addClass("static_txt_error");
				}
				else {
					$("#" + obj_id).removeClass("static_txt_error");
				}
			}
			else {
				$("#" + obj_id).html("0 %");

			}
		}

		function field_click(obj) {
			$(obj).removeClass("field_edited");
			$(obj).addClass("field_active");
		}


		function kiraan (e){
			var jumlah = 0;
			var a = $("#percentrata").val();
			var b = $("#percentalun").val();
			var c = $("#percentbukit").val();
			var d = $("#percentcerun").val();

			var f = e.value;
			if(f>100){
				alert('<?php echo setstring ( 'mal', 'Jumlah Peratusan melebihi had 100 %', 'en', 'Total Percentage is more than 100%'); ?>');
			e.value = "0.00";}


			jum = parseInt(a)+parseInt(b)+parseInt(c)+parseInt(d);
			//alert(jum);
			if(jum>100){
				alert('<?php echo setstring ( 'mal', 'Jumlah Peratusan melebihi had 100 %', 'en', 'Total Percentage is more than 100%'); ?>');
			e.value = "0.00";
			}
			else{
			$('#jp').html(jum);
			}
			$("#jp").format({format:"#,###.00", locale:"us"});

		}



	</script>
<style type="text/css">
<!--
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-transform: none;
}
-->
</style>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>

<form action="update_profil.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

<script type="text/javascript">
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements

				$(".facebox").colorbox({width:"60%", height:"50%", iframe:true,onClosed:function(){
						window.location='home.php?id=profile';
					}});
				$(".facebox1").colorbox({width:"60%", height:"80%", iframe:true,onClosed:function(){
						window.location='home.php?id=profile';
					}}
);



			});
		</script>


<strong>
<?php echo setstring ( 'mal', 'PROFIL PENGGUNA', 'en', 'USER PROFILE'); ?>
</strong><br>
<br>
<table width="95%" border="0" align="center">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" style="border:1px #333333 solid">
        <tr>
          <td colspan="4" bgcolor="#999999"><span class="style1">
            <?php echo setstring ( 'mal', 'PROFIL ESTET', 'en', 'ESTATE PROFILE'); ?>
            </span></td>
        </tr>
        <tr>
          <td width="23%"><strong>
            <?php echo setstring ( 'mal', 'Estet', 'en', 'Estate'); ?>
            </strong></td>
          <td width="1%"><strong>:</strong></td>
          <td width="38%"><?php echo  $pengguna->namaestet; ?></td>
          <td width="38%" rowspan="3"></td>
        </tr>

				<?php /*
        <tr>
          <td><strong>
            <?php //echo setstring ( 'mal', 'No Lesen (Lama)', 'en', 'License No (Old)'); ?>
            </strong></td>
          <td><strong></strong></td>
          <td><?php //echo $pengguna->nolesenlama; ?></td>
        </tr>
				*/ ?>


        <tr>
          <td><strong>
            <?php echo setstring ( 'mal', 'No Lesen', 'en', 'License No'); ?>
            </strong></td>
          <td><strong>:</strong></td>
          <td><?php echo  $pengguna->nolesen; ?></td>
        </tr>

			<?php	/*
        <tr>
          <td><strong>
            <?php //echo setstring ( 'mal', 'Alamat Surat Menyurat', 'en', 'Mailing Address'); ?>
            </strong></td>
          <td><strong></strong></td>
          <td colspan="2"><?php //echo  $pengguna->alamat1; ?>
            <?php //echo  $pengguna->alamat2; ?>
            <?php //echo  $pengguna->poskod; ?>
            <?php //echo  $pengguna->bandar; ?>
            <?php //echo  $pengguna->negeri; ?></td>
        </tr>
							*/ ?>

			<?php /*
        <tr>
          <td><strong>
            <?php //echo setstring ( 'mal', 'Poskod', 'en', 'Postcode'); ?>
            </strong></td>
          <td><strong></strong></td>
          <td colspan="2"><?php //echo $pengguna->poskod; ?></td>
        </tr>
					*/ ?>
	<?php /*
        <tr>
          <td><strong>
            <?php //echo setstring ( 'mal', 'Daerah', 'en', 'District'); ?>
            </strong></td>
          <td><strong></strong></td>
          <td colspan="2"><?php //$pb = $pengguna->bandar; echo str_replace(",","",$pb); ?></td>
        </tr>
				*/ ?>

	<?php /*
        <tr>
          <td><strong>
            <?php //echo setstring ( 'mal', 'Negeri', 'en', 'State'); ?>
            </strong></td>
          <td><strong></strong></td>
          <td colspan="2"><?php //echo  $pengguna->negeri; ?></td>
        </tr>
				*/ ?>

        <tr>
          <td><strong>
            <?php echo setstring ( 'mal', 'No. Telefon', 'en', 'Contact No'); ?>
            </strong></td>
          <td><strong>:</strong></td>
					<?php /*
          <td colspan="2"><?php //echo  $pengguna->notelefon; ?></td>
					*/ ?>
					<td colspan="2"> <input name="notelefon" type="text" id="notelefon" value="<?= $pengguna->notelefon; ?>" size="50" class="telefon" /></td>
        </tr>

        <tr>
          <td><strong>
            <?php echo setstring ( 'mal', 'No. Faks', 'en', 'Fax No'); ?>
            </strong></td>
          <td><strong>:</strong></td>
						<?php /*
          <td colspan="2"><?php //echo  $pengguna->nofax; ?></td>
					*/ ?>
					<td colspan="2"> <input name="nofax" type="text" id="nofax" value="<?= $pengguna->nofax; ?>" size="50" class="telefon" /></td>

        </tr>


        <tr>
          <td><strong>
            <?php echo setstring ( 'mal', 'Emel', 'en', 'Email'); ?>
            </strong></td>
          <td><strong>:</strong></td>
					<?php /*
          <td colspan="2"><?php //echo  $pengguna->email; ?></td>
					*/ ?>
					<td colspan="2"> <input name="email" type="text" id="email" value="<?= $pengguna->email; ?>" size="50" /></td>

        </tr>


        <tr>
          <td><strong>
            <?php echo setstring ( 'mal', 'Pegawai Melapor', 'en', 'Reporting Officer'); ?>
            </strong></td>
          <td><strong>:</strong></td>
					<?php /*
          <td colspan="2"><?php //echo  $pengguna->pegawai; ?></td>
					*/ ?>
					<td colspan="2"> <input name="pegawai" type="text" id="pegawai" value="<?= $pengguna->pegawai; ?>" size="50" /></td>


        </tr>
        <tr>
          <td><strong>
            <?=setstring ( 'mal', 'Syarikat Induk', 'en', 'Headquarters'); ?>
            </strong></td>
          <td><strong>:</strong></td>
          <td colspan="2"><?php echo  $pengguna->syarikatinduk; ?></td>
        </tr>
        <tr>
          <td><strong>
            <?php echo setstring ( 'mal', 'Daerah Premis', 'en', 'Premis District'); ?>
            </strong></td>
          <td><strong>:</strong></td>
          <td colspan="2"><?php echo  $pengguna->daerahpremis; ?></td>
        </tr>
        <tr>
          <td><strong>
            <?php echo setstring ( 'mal', 'Negeri Premis', 'en', 'Premis State'); ?>
            </strong></td>
          <td><strong>:</strong></td>
          <td colspan="2"><?php echo  $pengguna->negeripremis; ?></td>
        </tr>
        <tr>
          <td></td>
          <td>
				  <td colspan="2">	<input type="submit" name="Submit" value="<?=setstring ( 'mal', 'Simpan', 'en', 'Save'); ?>" />
					</a>  <a href="password.php" class="facebox" style="text-decoration:none">
					<input type="button" value="<?php echo setstring ( 'mal', 'Tukar kata laluan', 'en', 'Change Password'); ?>" />

				</form>

					 </td>
					<?php /*
          <td colspan="2"><a href="profil.php" class="facebox1" style="text-decoration:none">
            <input type="button" value="<?php echo setstring ( 'mal', 'Ubah Profil Estate ', 'en', 'Change Estate Profile'); ?>" />
							*/?>

							<?php /*
            </a>  <a href="password.php" class="facebox" style="text-decoration:none">
            <input type="button" value="<?php echo setstring ( 'mal', 'Tukar kata laluan', 'en', 'Change Password'); ?>" /> </a> 
						*/?>

              <input type="submit" name="sw-sunting" id="sw-simpan" value=<?php echo setstring ( 'mal', '"Kembali"', 'en', '"Back"'); ?> />
              <input type="button" name="button" id="sw-sunting" value=<?php echo setstring ( 'mal', '"Edit Maklumat Am"', 'en', 'Edit General Information'); ?> />
            </td>
        </tr>

      </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><div id="borang">
        <table width="100%" align="center" class="tableCss" style="border:#333333 solid 1px;">
          <tr>
            <td colspan="3" align="left" valign="top" bgcolor="#999999"><span class="style1">
              <?php echo setstring ( 'mal', 'MAKLUMAT AM', 'en', 'GENERAL INFORMATION'); ?>
              </span></td>
          </tr>
          <tr>
            <td width="201" align="left" valign="top"><b>
              <?php echo setstring ( 'mal', 'Jenis Syarikat', 'en', 'Company Type'); ?>
              </b></td>
            <td width="7"><div align="center"><strong>:</strong></div></td>
            <td width="674"><?php function company($x){
			$con =connect();
			$query = "select * from company where comp_name = '$x' ";
			$res = mysqli_query($con, $query);
			$row = mysqli_fetch_array($res);
			if($_COOKIE['lang']=='mal'){
			$data = $row['comp_name'];
			}
			else{
			$data = $row['comp_name_english'];
			}
			return $data;
		}


		function keahlian($x){
			$con =connect();
			$query = "select * from keahlian where ahli_name = '$x' ";
			$res = mysqli_query($con, $query);
			$row = mysqli_fetch_array($res);
			if($_COOKIE['lang']=='mal'){
			$data = $row['ahli_name'];
			}
			else{
			$data = $row['ahli_name_english'];
			}
			return $data;
		}


		?>
              <?php echo company($pengguna->jenissyarikat); ?></td>
          </tr>
          <tr>
            <td width="201" align="left" valign="top"><strong>
              <?php echo setstring ( 'mal', 'Keahlian dalam Persatuan', 'en', 'Membership in Union'); ?>
              </b></strong></td>
            <td><div align="center"><strong>:</strong></div></td>
            <td><?php echo keahlian($pengguna->keahlian); ?></td>
          </tr>
          <tr>
            <td width="201" align="left" valign="top"><strong>
              <?php echo setstring ( 'mal', 'Integrasi dengan Kilang Buah Sawit', 'en', 'Integration with Palm Factory'); ?>
              </strong></td>
            <td><div align="center"><strong>:</strong></div></td>
            <td><?php $ig = $pengguna->integrasi;
		if ($ig=='Y'){?>
              <?php echo setstring ( 'mal', 'Ya', 'en', 'Yes'); ?>
              <?php }
		if ($ig=='N'){?>
              <?php echo setstring ( 'mal', 'Tidak', 'en', 'No'); ?>
              <?php } ?>
            </td>
          </tr>
          <!--<tr>
        <td width="201" align="left" valign="top"><strong>Integrasi dengan Kilang</strong></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td><img src="../images/accepted_48.png" width="16" height="16" /> Ya</td>
      </tr>-->
          <tr>
            <td colspan="3" align="left" valign="top"> </td>
          </tr>
          <tr>
            <td colspan="3" align="left" valign="top"></td>
          </tr>
          <tr>
            <td colspan="3" align="left" valign="top"><table width="100%">
                <tr>
                  <td><div id="percent_soil" ></div>
                    <div align="center"><br />
                      <strong>
                      <?php echo setstring ( 'mal', 'Peratusan Jenis Tanah', 'en', 'Percentage of Soil Composition'); ?>
                      </strong>
                      <script type="text/javascript" src="ampie/swfobject.js"></script>
                      <script type="text/javascript">
		// <![CDATA[
		var so = new SWFObject("ampie/ampie.swf", "ampie", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "ampie/");
		so.addVariable("settings_file", encodeURIComponent("ampie/settings.xml"));
		so.addVariable("data_file", encodeURIComponent("ampie/data.php"));
		<?php
		if(!isset($_GET['logging'])) {
		?>
		so.write("percent_soil");
		<?php
		}
		?>
		// ]]>
	            </script>
                    </div></td>
                  <td><div id="percent_mukabumi"></div>
                    <div align="center"><br />
                      <strong>
                      <?php echo setstring ( 'mal', 'Peratusan Jenis Mukabumi', 'en', 'Percentage of Terrain Type'); ?>
                      </strong>
                      <script type="text/javascript">
		// <![CDATA[
		var so = new SWFObject("ampie/ampie.swf", "ampie", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "ampie/");
		so.addVariable("settings_file", encodeURIComponent("ampie/settingsmukabumi.xml"));
		so.addVariable("data_file", encodeURIComponent("ampie/datamukabumi.php"));
		<?php
		if(!isset($_GET['logging'])) {
		?>
		so.write("percent_mukabumi");
		<?php
		}
		?>
		// ]]>
	           </script>
                    </div></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="3" align="left" valign="top"> </td>
          </tr>
        </table>
      </div>
      <table width="100%">
        <tr>
          <td colspan="3" align="left" valign="top"></td>
        </tr>
      </table></td>
  </tr>
</table>

<form id="form1" name="form1" method="post" action="save_profile.php">
<table width="100%" align="center" cellspacing="0" class="tableCss" style="border:1px #333333 solid; padding:2px;">
  <tr>
    <td height="29" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"><strong><?php echo setstring ( 'mal', 'Nama pegawai melapor', 'en', 'Name of Reporting Officer'); ?></strong>      </td>
    <td colspan="4" bgcolor="#99FF99"><input name="pegawai" type="text" id="pegawai" style="text-align:left; font-weight:normal;" value="<?php echo $pengguna->pegawai; ?>" size="50" width="50" />
      <input name="nolesen" type="hidden" id="nolesen" value="<?php echo  $_SESSION['lesen'];?>" />    </td>
  </tr>

  <tr>
    <td width="14" height="37">&nbsp;</td>
    <td colspan="2"><strong><?php echo setstring ( 'mal', 'Jenis syarikat', 'en', 'Company Type'); ?></strong></td>
    <td colspan="4"><select name="syarikat" id="syarikat" style="width:330px">
      <option>-<?php echo setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
      <?php
		for ($i=0; $i<$company->total; $i++){ ?>
      <option value="<?php echo  $company->comp_name[$i];?>" <?php if($company->comp_name[$i]==$pengguna->jenissyarikat){?>selected="selected"<?php } ?>>
        <?php echo $company->comp_alt[$i]; ?>
        </option>
      <?php } ?>
    </select></td>
  </tr>

  <tr>
    <td height="32" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"><strong><?php echo setstring ( 'mal', 'Keahlian dalam persatuan', 'en', 'Membership in Union'); ?></strong></strong></td>
    <td colspan="4" bgcolor="#99FF99"><select name="keahlian" id="keahlian" style="width:330px">
      <option>-<?php echo setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
      <?php for ($i=0; $i<$ahli->total; $i++){?>
      <option value="<?php echo  $ahli->ahli_name[$i]; ?>" <?php if($ahli->ahli_name[$i]==$pengguna->keahlian){?>selected="selected"<?php } ?>>
        <?php echo  $ahli->ahli_alt[$i];?>
        </option>
      <?php } ?>
    </select></td>
  </tr>

  <tr>
    <td height="31">&nbsp;</td>
    <td colspan="2"><strong><?php echo setstring ( 'mal', 'Integrasi dengan kilang buah sawit', 'en', 'Integration with Palm Factory'); ?></strong></td>
    <td><input type="radio" name="integrasi" id="radio" value="Y" <?php if($pengguna->integrasi=='Y'){?>checked="checked"<?php } ?> />
<?php echo setstring ( 'mal', 'Ya', 'en', 'Yes'); ?></td>
    <td colspan="3"><input type="radio" name="integrasi" id="radio2" value="N" <?php if($pengguna->integrasi=='N'){?>checked="checked"<?php } ?> />
<?php echo setstring ( 'mal', 'Tidak', 'en', 'No'); ?></td>
  </tr>
  <tr>
    <td height="24" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"> <strong><?php echo setstring ( 'mal', 'Keluasan mengikut jenis tanah:', 'en', 'Area respective to soil type:'); ?></strong></td>
    <td colspan="4" bgcolor="#99FF99"><div align="center"><span class="style2">
      <?php echo setstring ( 'mal', 'Jumlah Keluasan', 'en', 'Total all area'); ?>
    </span> : <span class="style2">
      <?php echo number_format($jumlah_semua,2);?> <?php echo setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?>
    </span></div>      <div align="center"></div></td>
    </tr>
    <?php
  	if(!isset($_GET['print'])) {
  ?>
  <tr>
    <td height="35"></td>
    <td colspan="2" bgcolor="#CCFFFF"><div align="left"><?php echo setstring ( 'mal', 'a. Tanah Lanar', 'en', 'a. Alluvial Soil'); ?></div></td>
    <td bgcolor="#CCFFFF"><div align="center">
      <input name="lanar" type="text" class="field_active" id="lanar" onblur="field_blur(this,'s1')" onclick="field_click(this)" value="<?php echo  $pengguna->lanar; ?>" size="3" />
      <?php echo setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
    <td bgcolor="#CCFFFF">
      <div align="center">
        <span id="s1"><?php $a = round($pengguna->lanar/$jumlah_semua*100,2);echo number_format($a,2); ?> %</span></div>    </td>
    <td bgcolor="#CCFFFF">&nbsp;</td>
    <td width="42" bgcolor="#CCFFFF">&nbsp;</td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td height="35"></td>
    <td colspan="2" bgcolor="#FFCCCC"><div align="left"><?php echo setstring ( 'mal', 'b. Tanah Pedalaman', 'en', 'b. Rural Land'); ?></div></td>
    <td bgcolor="#FFCCCC">
      <div align="center">
<input name="pedalaman" type="text" class="field_active" id="pedalaman" onblur="field_blur(this,'s2')" onclick="field_click(this)" value="<?php echo  $pengguna->pedalaman; ?>" size="3" />
<?php echo setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div>

      <div align="center"></div></td>
    <td bgcolor="#FFCCCC">
      <div align="center">
        <span id="s2">
        <?php $a = round($pengguna->pedalaman/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span></div>    </td>
    <td bgcolor="#FFCCCC">&nbsp;</td>
    <td bgcolor="#FFCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="34"></td>
    <td colspan="2" bgcolor="#FFFFCC"><div align="left"><?php echo setstring ( 'mal', 'c. Tanah Gambut : ', 'en', 'c. Peat Soil:'); ?></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><span class="style1"><?php echo $tg = $pengguna->gambutcetek+ $pengguna->gambutdalam; ?>  <?php echo setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></span></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><span class="style1">
    </span></div>      <span class="style1">
        <div align="center">
          <?php $a = round($tg/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</div>

    </span></td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="37"></td>
    <td width="96" bgcolor="#FFFFCC"><div align="right">i) </div></td>
    <td width="151" bgcolor="#FFFFCC"><?php echo setstring ( 'mal', 'Gambut Cetek', 'en', 'Shallow Peat Soil'); ?></td>
    <td width="216" bgcolor="#FFFFCC">
      <div align="center">
        <input name="gambutcetek" type="text" class="field_active" id="gambutcetek" onblur="field_blur(this,'s3')" onclick="field_click(this)" value="<?php echo  $pengguna->gambutcetek; ?>" size="3" />
      <?php echo setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?> </div></td>
    <td width="139" bgcolor="#FFFFCC">
      <div align="center">
        <span id="s3">
        <?php $a = round($pengguna->gambutcetek/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span></div>    </td>
    <td width="54" bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="34"></td>
    <td bgcolor="#FFFFCC"><div align="right">ii) </div></td>
    <td bgcolor="#FFFFCC"> <?php echo setstring ( 'mal', 'Gambut Dalam', 'en', 'Deep Peat Soil'); ?></td>
    <td bgcolor="#FFFFCC"><div align="center">
      <input name="gambutdalam" type="text" class="field_active" id="gambutdalam" onblur="field_blur(this,'s4')" onclick="field_click(this)" value="<?php echo  $pengguna->gambutdalam; ?>" size="3"  />
      <?php echo setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
    <td bgcolor="#FFFFCC">
      <div align="center">
        <span id="s4">
        <?php $a = round($pengguna->gambutdalam/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span></div></td>
      <td width="54" bgcolor="#FFFFCC">&nbsp;</td>
      <td bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="27"></td>
    <td colspan="2" bgcolor="#CACAFF"><?php echo setstring ( 'mal', 'd. Lain-lain Jenis Tanah :', 'en', 'Other Soil Type:'); ?></td>
    <td bgcolor="#CACAFF"><div align="center" class="style1"><?php echo $lt = $pengguna->laterit+$pengguna->asidsulfat+$pengguna->tanahpasir; ?> <?php echo setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
    <td bgcolor="#CACAFF"><span class="style1">

    </span>      <strong>

    </strong>
    <div align="center" class="style1">
      <?php $a = round($lt/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</div>    </td>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="37"></td>
    <td bgcolor="#CACAFF"><div align="right"> i)</div></td>
    <td bgcolor="#CACAFF"> <?php echo setstring ( 'mal', 'laterit', 'en', 'Laterite'); ?></td>
    <td bgcolor="#CACAFF"><div align="center">
          <input name="laterit" type="text" class="field_active" id="laterit" onblur="field_blur(this,'s5')" onclick="field_click(this)" value="<?php echo  $pengguna->laterit; ?>" size="3" />
      <?php echo setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
    <td bgcolor="#CACAFF"><div align="center">
          <span id="s5">
          <?php $a = round($pengguna->laterit/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span>
    </div>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="42"></td>
    <td bgcolor="#CACAFF"><div align="right">ii) </div></td>
    <td bgcolor="#CACAFF"><?php echo setstring ( 'mal', 'Asid Sulfat', 'en', 'Sulphate Acid'); ?> </td>
    <td bgcolor="#CACAFF"><div align="center">
          <input name="asidsulfat" type="text" class="field_active" id="asidsulfat" onblur="field_blur(this,'s6')" onclick="field_click(this)" value="<?php echo $pengguna->asidsulfat; ?>" size="3" />
      <?php echo setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
   <td bgcolor="#CACAFF"><div align="center">
     <span id="s6">
     <?php $a = round($pengguna->asidsulfat/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span></div></td>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="26"></td>
    <td bgcolor="#CACAFF"><div align="right">iii)</div></td>
    <td bgcolor="#CACAFF"> <?php echo setstring ( 'mal', 'Tanah berpasir', 'en', 'Sandy Soil'); ?> </td>
    <td bgcolor="#CACAFF"><div align="center">
      <input name="tanahpasir" type="text" class="field_active" id="tanahpasir" onblur="field_blur(this,'s7')" onclick="field_click(this)" value="<?php echo $pengguna->tanahpasir; ?>" size="3" />
      <?php echo setstring ( 'mal', 'Hektar', 'en', 'Hectares'); ?></div></td>
    <td bgcolor="#CACAFF"><div align="center"><strong>
      <span id="s7">
      <?php $a = round($pengguna->tanahpasir/$jumlah_semua*100,2);echo number_format($a,2); ?>
 %</span></strong></div></td>
    <td bgcolor="#CACAFF">&nbsp;</td>
    <td bgcolor="#CACAFF">&nbsp;</td>
  </tr>

  <!--<tr>
    <td height="34" bgcolor="#99FF99">&nbsp;</td>
    <td colspan="2" bgcolor="#99FF99"><strong><?php echo setstring ( 'mal', 'Bentuk mukabumi estet', 'en', 'Estate Terrain Type'); ?></strong></strong></td>
    <td bgcolor="#99FF99">
      <div align="center">
        <select name="select3" id="select3" >
          <option selected="selected" value="pilih">-<?php echo setstring ( 'mal', 'Pilih', 'en', 'Select'); ?>-</option>
          <option value="rata"><?php echo setstring ( 'mal', 'Rata/Landai', 'en', 'Flat Terrain'); ?></option>
          <option value="alun"><?php echo setstring ( 'mal', 'Beralun', 'en', 'Undulating Terrain'); ?></option>
          <option value="bukit"><?php echo setstring ( 'mal', 'Berbukit', 'en', 'Hilly Terrain'); ?></option>
        </select>
        </div> </td>
    <td bgcolor="#99FF99">&nbsp;</td>
    <td bgcolor="#99FF99">&nbsp;</td>
    <td bgcolor="#99FF99">&nbsp;</td>
  </tr>-->
    <?php
  	if(!isset($_GET['print'])) {
  ?>
    <?php
}
  ?>
    <tr valign="top">
      <td height="65">&nbsp;</td>
      <td colspan="6">
        <table width="100%" border="0" cellspacing="0" class="hide" id="rata">
          <tr>
            <td height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td colspan="3" bgcolor="#CCFF99"><strong>
              <?php echo setstring ( 'mal', 'Bentuk mukabumi estet', 'en', 'Estate Terrain Type'); ?>
            </strong></td>
          </tr>
          <tr>
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><?php echo setstring ( 'mal', 'Kawasan rata/landai', 'en', 'Flat Area'); ?>              (0-6
              <?php echo setstring ( 'mal', 'darjah', 'en', 'degree'); ?>
)</td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentrata" type="text" onclick="field_click(this)" class="field_active" id="percentrata" value="<?php echo $pengguna->percentrata; ?>" size="3" onchange="kiraan(this)" />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" class="hide" id="alun">
          <tr>
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><?php echo setstring ( 'mal', 'Kawasan beralun', 'en', 'Undulating Area'); ?>              (7-12
               <?php echo setstring ( 'mal', 'darjah', 'en', 'degree'); ?>
)</td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentalun" type="text" onclick="field_click(this)" class="field_active" id="percentalun" value="<?php echo $pengguna->percentalun; ?>" size="3"  onchange="kiraan(this)"  />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
        </table>        <table width="100%" border="0" cellspacing="0" class="hide" id="bukit">
          <tr>
            <td width="3%" height="30" bgcolor="#CCFF99">&nbsp;</td>
            <td width="39%" bgcolor="#CCFF99"><?php echo setstring ( 'mal', 'Kawasan berbukit', 'en', 'Hilly Area'); ?>              (12-25
               <?php echo setstring ( 'mal', 'darjah', 'en', 'degree'); ?>
)</td>
            <td width="29%" bgcolor="#CCFF99"><input name="percentbukit" type="text" onclick="field_click(this)" class="field_active" id="percentbukit" value="<?php echo $pengguna->percentbukit; ?>" size="3"  onchange="kiraan(this)"  />
            %</td>
            <td width="29%" bgcolor="#CCFF99">&nbsp;</td>
          </tr>
          <tr>
            <td height="33" bgcolor="#CCFF99">&nbsp;</td>
            <td height="33" bgcolor="#CCFF99">              <?php echo setstring ( 'mal', 'Curam', 'en', 'Steep'); ?>            (&gt;25  <?=setstring ( 'mal', 'darjah', 'en', 'degree'); ?> )</td>
            <td bgcolor="#CCFF99"><input name="percentcerun" type="text" onclick="field_click(this)" class="field_active" id="percentcerun" value="<?php echo $pengguna->percentcerun; ?>" size="3"   onchange="kiraan(this)"  />
            % </td>
            <td bgcolor="#CCFF99">&nbsp;</td>
          </tr>
          <tr>
            <td height="33" bgcolor="#CCFF99">&nbsp;</td>
            <td height="33" bgcolor="#CCFF99"><span class="style2">
              <?php echo setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?>
            </span></td>
            <td colspan="2" bgcolor="#CCFF99"><strong>
			<u>
			<?php $jumlah_percent = $pengguna->percentcerun+$pengguna->percentbukit+$pengguna->percentalun+$pengguna->percentrata; echo number_format($jumlah_percent,2);?>
            </u>
            </strong><br /></td>
          </tr>
      <!--    <?php if($jumlah_percent >=100){?><tr>
            <td height="33" bgcolor="#CCFF99">&nbsp;</td>
            <td height="33" bgcolor="#CCFF99">&nbsp;</td>
            <td colspan="2" bgcolor="#CCFF99">
              <img src="images/001_11.gif" width="20" height="20" />
              <span style=" color:#FF0000; font-weight:bold;">
              <?php echo setstring ( 'mal', 'Jumlah Peratusan melebihi had 100 %', 'en', 'Total Percentage is more than 100%'); ?>
              </span>              </td>
          </tr><?php }// if total percent is more than 100 ?>-->
      </table></td></tr>
    <tr>
      <td height="17" colspan="7"><div align="center">
        <p>
          <input type="submit" name="button" id="button" value="<?php echo setstring ( 'mal', 'Simpan', 'en', 'Save'); ?>" />
          <input type="submit" name="button2" id="button2" value=" <?php echo setstring ( 'mal', 'Cetak', 'en', 'Print'); ?>" />
        </p>
        <p>&nbsp;  </p>
      </div></td>
    </tr>
</table>
</form>

<br />
<div align="center"> </div>
<br />
<br />
