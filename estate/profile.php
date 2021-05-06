

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
				$("#sw-sunting").ready(function() {
					$("#sw-sunting").hide();
					$("#sw-simpan").show();
					$("#borang").hide();
					html = $("#borang").html();
					$.post("po1_1.php?r=1","",function(out) {
						$("#borang").html(out);
						$("#borang").show();
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
				<input name="nolesen" type="hidden" id="nolesen" value="<?= $pengguna->nolesen; ?>"/>
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

				  <td  height="17" colspan="7"><div align="center">	<input type="submit" name="Submit" value="<?=setstring ( 'mal', 'Simpan', 'en', 'Save'); ?> " />
			    </a>  <a href="password.php" class="facebox" style="text-decoration:none">
					<input type="button" value="<?php echo setstring ( 'mal', 'Tukar kata laluan', 'en', 'Change Password'); ?>" />

				</form>
				</td>
				</tr>
				    <tr>
					<?php /*
          <td colspan="2"><a href="profil.php" class="facebox1" style="text-decoration:none">
            <input type="button" value="<?php echo setstring ( 'mal', 'Ubah Profil Estate ', 'en', 'Change Estate Profile'); ?>" />
							*/?>

							<?php /*
            </a>  <a href="password.php" class="facebox" style="text-decoration:none">
            <input type="button" value="<?php echo setstring ( 'mal', 'Tukar kata laluan', 'en', 'Change Password'); ?>" /> </a> 


            <td colspan="2">  <input type="submit" name="sw-sunting" id="sw-simpan" value=<?php echo setstring ( 'mal', '"Kembali"', 'en', '"Back"');  /> 	*/?>
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











					<?php session_start();
					header("Content-type:application/xml");
					include('../../Connections/connection.class.php');
					include('../../setstring.inc');
					$con = connect();
					$q ="select * from estate_info where lesen = '".$_SESSION['lesen']."'";
					$r= mysqli_query($con, $q);
					$row = mysqli_fetch_array($r);

					$a=$row['lanar'];
					$b=$row['gambutcetek'];
					$c=$row['gambutdalam'];
					$d=$row['pedalaman'];
					$e=$row['laterit'];
					$f=$row['asidsulfat'];
					$g=$row['tanahpasir'];

					$tanahlanar = $a;
					$tanahgambut= $b+$c;
					$tanahpedalaman= $d;
					$lainlaintanah= $e+$f+$g;

					//pull_out="true";
					?>
          <tr>
            <td colspan="3" align="center" valign="top"><table align="center" width="100%">
						<td align="center" id="borang" colspan="2"> </td>
						<?php /*
						<form id="form1" name="form1" method="post" action="save_profile.php"> </form> */ ?>
						<table width="100"" align="center" cellspacing="0" class="tableCss" style="border:1px #333333 solid; padding:2px;">

										 <?php session_start();
										 header("Content-type:application/xml");
										 include('../../Connections/connection.class.php');
										 include('../../setstring.inc');
										 $con = connect();
										 $q ="select * from estate_info where lesen = '".$_SESSION['lesen']."'";
										 $r= mysqli_query($con, $q);
										 $row = mysqli_fetch_array($r);

										 $a=$row['percentrata'];
										 $b=$row['percentcerun'];
										 $c=$row['percentbukit'];
										 $d=$row['percentalun'];


										 $tanahlanar = $a;
										 $tanahgambut= $b;
										 $tanahpedalaman= $c;
										 $lainlaintanah= $d;

										 //pull_out="true";
										 ?>


                    </div></td>
                  <td><div id="percent_mukabumi"></div>
                    <div align="center"><br />
                      <strong>
                      <?php echo setstring ( 'mal', 'Bentuk mukabumi estet', 'en', 'Percentage of Terrain Type'); ?>
                      </strong>


											<div id="piechart2" style="width: 600px; height: 300px;"></div>
										<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
										 <script type="text/javascript">
											 google.charts.load("current", {'packages':["corechart"]});
											 google.charts.setOnLoadCallback(drawChart);
											 function drawChart() {


												 var data = google.visualization.arrayToDataTable([
													 ['Area', ''],
													 ['Rata/Landai', <?php echo $tanahlanar; ?> ],
													 ['Cerun (>25 darjah)', <?php echo $tanahgambut; ?>],
													 ['Berbukit', <?php echo $tanahpedalaman; ?> ],
													 ['Beralun', <?php echo $lainlaintanah; ?>],


												 ]);

												 var options = {
													 title: '',
													 tooltip: { text: 'percentage' },
													 legend: 'true',
													 pieSliceText: '',
													 slices: {  0: {offset: 0.2},
																		 1: {offset: 0.2},
																		 2: {offset: 0.2},
																		 3: {offset: 0.2},
																		 4: {offset: 0.2},

													 },
												 };


												 var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
												 chart.draw(data, options);
											 }
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
</form>


















</div>
