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
<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="facebox/facebox.js" type="text/javascript"></script> 
<script>
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
}) 
</script>
	<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
    </style>
	<strong><?=setstring ( 'mal', 'PROFIL PENGGUNA', 'en', 'USER PROFILE'); ?></strong><br>
	<br>
<table width="95%" border="0" align="center">
	<tr>
    	<td><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" style="border:1px #333333 solid">
          
          <tr>
            <td colspan="4" bgcolor="#999999"><span class="style1"><?=setstring ( 'mal', 'PROFIL ESTET', 'en', 'ESTATE PROFILE'); ?></span></td>
          </tr>
          
          <tr>
            <td width="23%"><strong><?=setstring ( 'mal', 'Estet', 'en', 'Estate'); ?></strong></td>
            <td width="1%"><strong>:</strong></td>
            <td width="38%"><?= $pengguna->namaestet; ?></td>
            <td width="38%" rowspan="3"><div align="right"><a href="view_profile.php" target="_blank"><img src="../images/printer.png" alt="" width="48" height="48" border="0" /></a></div></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'No Lesen (Lama)', 'en', 'License No (Old)'); ?></strong></td>
            <td><strong>:</strong></td>
            <td><?= $pengguna->nolesenlama; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'No Lesen (Baru)', 'en', 'License No (New)'); ?></strong></td>
            <td><strong>:</strong></td>
            <td>
            <?= $pengguna->nolesen; ?></td>
          </tr>
          
          <tr>
            <td><strong> <?=setstring ( 'mal', 'Alamat Surat Menyurat', 'en', 'Mailing Address'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2">
            <?= $pengguna->alamat1; ?> <?= $pengguna->alamat2; ?> <?= $pengguna->poskod; ?> <?= $pengguna->bandar; ?> <?= $pengguna->negeri; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Poskod', 'en', 'Postcode'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2">
            <?= $pengguna->poskod; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Daerah', 'en', 'District'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2">
            <?php $pb = $pengguna->bandar; echo str_replace(",","",$pb); ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Negeri', 'en', 'State'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->negeri; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'No. Telefon', 'en', 'Contact No'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2">
            <?= $pengguna->notelefon; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'No. Faks', 'en', 'Fax No'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->nofax; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Emel', 'en', 'Email'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2">
            <?= $pengguna->email; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Pegawai Melapor', 'en', 'Reporting Officer'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->pegawai; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Syarikat Induk', 'en', 'Headquarters'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2">
            <?= $pengguna->syarikatinduk; ?></td>
          </tr>
          <tr>
            <td><strong> <?=setstring ( 'mal', 'Daerah Premis', 'en', 'Premis District'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2">
            <?= $pengguna->daerahpremis; ?></td>
          </tr>
          <tr>
            <td><strong> <?=setstring ( 'mal', 'Negeri Premis', 'en', 'Premis State'); ?></strong></td>
            <td><strong>:</strong></td>
            <td colspan="2">
            <?= $pengguna->negeripremis; ?></td>
          </tr>
          <tr>
            <td></td>
            <td> </td>
            <td>
            <?php if($_SESSION['view']!="true"){ ?>
            <a href="profil.php" rel="facebox"><?=setstring ( 'mal', '[Ubah Profil Estate] ', 'en', '[Change Estate Profile]'); ?></a>  <a href="password.php" rel="facebox"><?=setstring ( 'mal', '[Tukar kata laluan]', 'en', '[Change Password]'); ?></a>
            <?php } ?>
            
            </td>
            <td> </td>
          </tr>
          <tr>
            <td colspan="4"><label></label>
            <br /></td>
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
        <td colspan="3" align="left" valign="top" bgcolor="#999999"><span class="style1"> <?=setstring ( 'mal', 'MAKLUMAT AM', 'en', 'GENERAL INFORMATION'); ?></span></td>
        </tr>
      
      <tr>
        <td width="201" align="left" valign="top"><b><?=setstring ( 'mal', 'Jenis Syarikat', 'en', 'Company Type'); ?></b></td>
        <td width="7"><div align="center"><strong>:</strong></div></td>
        <td width="674"><?= $pengguna->jenissyarikat; ?></td>
      </tr>
      <tr>
        <td width="201" align="left" valign="top"><strong><?=setstring ( 'mal', 'Keahlian dalam Persatuan', 'en', 'Membership in Union'); ?></b></strong></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td><?= $pengguna->keahlian; ?></td>
      </tr>
      <tr>
        <td width="201" align="left" valign="top"><strong><?=setstring ( 'mal', 'Integrasi dengan Kilang Buah Sawit', 'en', 'Integration with Palm Factory'); ?></strong></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td>
		<?php $ig = $pengguna->integrasi; 
		if ($ig=='Y'){?>
		 <?=setstring ( 'mal', 'Ya', 'en', 'Yes'); ?>
		<?php } 
		if ($ig=='N'){?>
		 <?=setstring ( 'mal', 'Tidak', 'en', 'No'); ?>
		<?php } ?>		</td>
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
        <td colspan="3" align="left" valign="top">
       
        </td>
      </tr>
      
      <tr>
        <td colspan="3" align="left" valign="top"><table width="100%">
          <tr>
            <td><div id="percent_soil"></div>
              <div align="center"><br />
                  <strong><?=setstring ( 'mal', 'Peratusan Jenis Tanah', 'en', 'Percentage of Soil Composition'); ?>
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
            <td>  
            
             <div id="percent_mukabumi"></div>
             <div align="center"><br />
                 <strong><?=setstring ( 'mal', 'Peratusan Jenis Mukabumi', 'en', 'Percentage of Terrain Type'); ?>
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
    	
    	</div><table width="100%">
          <tr>
            <td colspan="3" align="left" valign="top">
                <?php if($_SESSION['view']!="true"){ ?>
               
                <div align="left">
                  <input type="submit" name="sw-sunting" id="sw-simpan" value=<?=setstring ( 'mal', '"Kembali"', 'en', '"Back"'); ?> />
                  <input type="submit" name="button" id="sw-sunting" value=<?=setstring ( 'mal', '"Edit Maklumat Am"', 'en', 'Edit General Information'); ?> />
                  
                </div>
                <?php } ?>
                </td>
      </tr>
        </table></td>
    </tr>
</table>
<br />
<div align="center">

    

	</div>
	<br />
	<br />