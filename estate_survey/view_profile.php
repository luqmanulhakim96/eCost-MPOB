<?php ob_start();
session_start();
include('../Connections/connection.class.php');
include ('../class/user.class.php');
$pengguna = new user('estate',$_SESSION['lesen']);
$session_lesen = $_SESSION['lesen'];?>
<link rel='shortcut icon' href='../images/icon.ico' />

<title>Profil Pengguna (E-COST)</title>

<strong>PROFIL PENGGUNA</strong><br>
<br>
<table width='95%' border='0' align='center'>
	<tr>
    	<td><table width='100%' border='0' align='center' cellpadding='1' cellspacing='1' style='border:1px #333333 solid'>

          <tr>
            <td colspan='4' bgcolor='#999999'><span class='style1'>PROFIL ESTET</span></td>
          </tr>

          <tr>
            <td width='23%'><strong>Estet</strong></td>
            <td width='1%'><strong>:</strong></td>
            <td width='38%'><?php echo $pengguna->namaestet; ?></td>
            <td width='38%' rowspan='3'>&nbsp;</td>
          </tr>
          <tr>
            <td><strong>No Lesen (Lama)</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $pengguna->nolesenlama; ?></td>
          </tr>
          <tr>
            <td><strong>No Lesen (Baru)</strong></td>
            <td><strong>:</strong></td>
            <td>
            <?php echo $pengguna->nolesen; ?></td>
          </tr>

          <tr>
            <td><strong>Alamat Surat Menyurat </strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'>
            <?php echo $pengguna->alamat1; ?> <?php echo $pengguna->alamat2; ?> <?php echo $pengguna->poskod; ?> <?php echo $pengguna->bandar; ?> <?php echo $pengguna->negeri; ?></td>
          </tr>
          <tr>
            <td><strong>Poskod</strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'>
            <?php echo $pengguna->poskod; ?></td>
          </tr>
          <tr>
            <td><strong>Daerah</strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'>
            <?php $pb = $pengguna->bandar; echo str_replace(',','',$pb); ?></td>
          </tr>
          <tr>
            <td><strong>Negeri</strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'><?php echo $pengguna->negeri; ?></td>
          </tr>
          <tr>
            <td><strong>No. Telefon</strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'>
            <?php echo $pengguna->notelefon; ?></td>
          </tr>
          <tr>
            <td><strong>No. Faks</strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'><?php echo $pengguna->nofax; ?></td>
          </tr>
          <tr>
            <td><strong>Emel</strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'>
            <?php echo $pengguna->email; ?></td>
          </tr>
          <tr>
            <td><strong>Pengurus</strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'><?php echo $pengguna->pegawai; ?></td>
          </tr>
          <tr>
            <td><strong>Syarikat Induk</strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'>
            <?php echo $pengguna->syarikatinduk; ?></td>
          </tr>
          <tr>
            <td><strong>Daerah Premis </strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'>
            <?php echo $pengguna->daerahpremis; ?></td>
          </tr>
          <tr>
            <td><strong>Negeri Premis </strong></td>
            <td><strong>:</strong></td>
            <td colspan='2'>
            <?php echo $pengguna->negeripremis; ?></td>
          </tr>
          <tr>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan='4'><label></label>
            <br /></td>
          </tr>
      </table></td>
    </tr>
    <tr>
    	<td></td>
    </tr>
    <tr>
    	<td><div id='borang'>
   <table width='100%' align='center' class='tableCss' style='border:#333333 solid 1px;'>
      <tr>
        <td colspan='3' align='left' valign='top' bgcolor='#999999'><span class='style1'>MAKLUMAT AM </span></td>
        </tr>

      <tr>
        <td width='201' align='left' valign='top'><b>Jenis Syarikat</b></td>
        <td width='7'><div align='center'><strong>:</strong></div></td>
        <td width='674'><?php echo $pengguna->jenissyarikat; ?></td>
      </tr>
      <tr>
        <td width='201' align='left' valign='top'><strong>Keahlian dalam Persatuan</b></strong></td>
        <td><div align='center'><strong>:</strong></div></td>
        <td><?php echo $pengguna->keahlian; ?></td>
      </tr>
      <tr>
        <td width='201' align='left' valign='top'><strong>Integrasi dengan Kilang Buah Sawit</strong></td>
        <td><div align='center'><strong>:</strong></div></td>
        <td>
		<?php $ig = $pengguna->integrasi;
		if ($ig=='Y'){?>
		 Ya
		<?php }
		if ($ig=='N'){?>
		 Tidak
		<?php } ?>		</td>
      </tr>
      <tr>
        <td colspan='3' align='left' valign='top'>&nbsp;</td>
      </tr>
      <tr>
        <td colspan='3' align='left' valign='top'>

        </td>
      </tr>

      <tr>
        <td colspan='3' align='left' valign='top'><table width='100%'>
          <tr>
            <td><div id='percent_soil'></div>
              <div align='center'><br />
                  <strong>Peratusan Jenis Tanah
                    </strong>
                <script type='text/javascript' src='ampie/swfobject.js'></script>
                            <script type='text/javascript'>
		// <![CDATA[
		var so = new SWFObject('ampie/ampie.swf', 'ampie', '520', '400', '8', '#FFFFFF');
		so.addVariable('path', 'ampie/');
		so.addVariable('settings_file', encodeURIComponent('ampie/settings.xml'));
		so.addVariable('data_file', encodeURIComponent('ampie/data.php'));
		<?php
		if(!isset($_GET['logging'])) {
		?>
		so.write('percent_soil');
		<?php
		}
		?>
		// ]]>
	            </script>
              </div></td>
            <td>

             <div id='percent_mukabumi'></div>
             <div align='center'><br />
                 <strong>Peratusan Jenis Mukabumi
                   </strong>
                          <script type='text/javascript'>
		// <![CDATA[
		var so = new SWFObject('ampie/ampie.swf', 'ampie', '520', '400', '8', '#FFFFFF');
		so.addVariable('path', 'ampie/');
		so.addVariable('settings_file', encodeURIComponent('ampie/settingsmukabumi.xml'));
		so.addVariable('data_file', encodeURIComponent('ampie/datamukabumi.php'));
		<?php
		if(!isset($_GET['logging'])) {
		?>
		so.write('percent_mukabumi');
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
        <td colspan='3' align='left' valign='top'>&nbsp;</td>
      </tr>
</table>

    	</div><table width='100%'>
          <tr>
            <td colspan='3' align='left' valign='top'>&nbsp;</td>
      </tr>
        </table></td>
    </tr>
</table>
<br />
<div align='center'>



	</div>
	<br />
	<br />
<?php

$htmlcontent = ob_get_contents();
ob_clean();

require_once('../print/mypdf.class.php');

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->remove_header = 1;
$pdf->remove_footer = 1;
$pdf->init();
$pdf->SetTitle('Profil Syarikat');
$pdf->SetSubject('Responden Estet');
// default header/footer
$pdf->setPrintHeader();
$pdf->setPrintFooter();

$pdf->AddPage();
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

$pdf->Output('cetak/maklumat-syarikat.pdf', 'I');

?>
