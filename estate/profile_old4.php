<!-- <script type="text/javascript">
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
		var html = null; -->


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

            <td colspan="2">  <input type="submit" name="sw-sunting" id="sw-simpan" value=<?php echo setstring ( 'mal', '"Kembali"', 'en', '"Back"'); ?> />
              <td colspan="2"><input type="button" name="button" id="sw-sunting" value=<?php echo setstring ( 'mal', '"Edit Maklumat Am"', 'en', 'Edit General Information'); ?> />
            </td>
        </tr>

      </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><div id="borang1">
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
							<td colspan="2"> <input name="syarikat" type="text" id="syarikat" value="<?= $pengguna->jenissyarikat; ?>" size="50" /></td>

							<?php /*
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

					*/?>
          <tr>
            <td width="201" align="left" valign="top"><strong>
              <?php echo setstring ( 'mal', 'Keahlian dalam Persatuan', 'en', 'Membership in Union'); ?>
              </b></strong></td>
							<td colspan="2"> <input name="keahlian" type="text" id="keahlian" value="<?= $pengguna->keahlian; ?>" size="50" /></td>

							<?php /*
            <td><div align="center"><strong>:</strong></div></td>
            <td><?php echo keahlian($pengguna->keahlian); ?></td>
						*/?>

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
			<div id="borang" ></div>
      <table width="100%">
        <tr>
          <td colspan="3" align="left" valign="top"></td>
        </tr>
      </table></td>
  </tr>
</table>



<br />
<div align="center"> </div>
<br />
<br />
