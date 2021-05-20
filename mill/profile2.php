<link rel="stylesheet" type="text/css" href="../text_style.css" />
<?php if(!isset($_GET['utama'])) { ?><strong><h2><?=setstring ( 'mal', 'PROFIL PENGGUNA', 'en', 'USER PROFILE'); ?></h2>
</strong>
<?php
	}
?>
    <table width="100%" border="0" align="right" cellpadding="3" cellspacing="0">
      <tr>
        <td width="90%" valign="top">
        <?php

    if(isset($_GET['utama'])) {
?>
          <p><strong>Selamat Datang</strong></p>
          <p>Login terakhir anda pada
          <?= date("d-m-Y h:i",strtotime("200911301150")) ?></p>
          <?php
		}
		else {
	?>
        <table width="82%" border="0" align="center" cellpadding="1" cellspacing="1" id="box-table-a">

          <tr>
            <td height="27" colspan="4"><h2><strong><?=setstring ( 'mal', 'Maklumat Am', 'en', 'General Information'); ?>
</strong></h2></td>
          </tr>
          <tr>
            <td width="28%"><strong><?=setstring ( 'mal', 'Nama Kilang', 'en', 'Mill / Factory Name'); ?>
</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="70%" colspan="2"><?= $pengguna->nama; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'No Lesen (Baru)', 'en', 'License No (New)'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->lesen; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'No Lesen (Lama)', 'en', 'License No (Old)'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->lesenlama; ?></td>
          </tr>


          <tr>
            <td height="31" colspan="4"><h2><strong><?=setstring ( 'mal', 'Alamat Hubungan', 'en', 'Contact Address'); ?>
</strong></h2></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Alamat Surat Menyurat', 'en', 'Mailing Address'); ?>
 </strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->alamatsurat1; ?></td>
          </tr>

          <tr>
            <td><strong><?=setstring ( 'mal', 'Poskod', 'en', 'Postcode'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->alamatsurat2; ?></td>
          </tr>

          <tr>
            <td><strong><?=setstring ( 'mal', 'Negeri', 'en', 'State'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->alamatsurat3; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'No. Telefon', 'en', 'Telephone No'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->notel; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'No. Faks', 'en', 'Fax No'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->nofax; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Emel', 'en', 'Email'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->email; ?></td>
          </tr>

          <tr>
            <td><strong><?=setstring ( 'mal', 'Pegawai Melapor', 'en', 'Reporting Officer'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->pegawai; ?></td>
          </tr>

          <tr valign="top">
            <td><strong><?=setstring ( 'mal', 'Syarikat Induk', 'en', 'Headquarters'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->syarikatinduk; ?></td>
          </tr>

          <tr>
            <td><strong><?=setstring ( 'mal', 'Daerah Premis ', 'en', 'Premist District'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->daerahpremis; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Negeri Premis', 'en', 'Premist State'); ?>
 </strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->negeripremis; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Kapasiti Kilang', 'en', 'Mill Capacity'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->kapasiti; ?>
            <?=setstring ( 'mal', 'Tan BTS sejam', 'en', 'Tonne FFB Per Hour'); ?></td>
          </tr>
          <tr>
            <td> </td>
            <td> </td>
            <td colspan="2"> </td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Jenis Syarikat', 'en', 'Company Type'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->syarikat; ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Teknologi Pensterilan', 'en', 'Sterilization Technology'); ?>
</strong><br /></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->teknologi; ?></td>
          </tr>

          <tr>
            <td><strong><?=setstring ( 'mal', 'Integrasi dengan Estet', 'en', 'Integration with Estate'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php if($pengguna->integrasi=='Y'){?>

			<?php echo "YA"; }else{?>
			<?php echo "TIDAK";
			?>
			<?php
			} ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Tahun Kilang Mula Beroperasi', 'en', 'Years of Mill Starts Operate'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->tahun_operasi; ?>
            (<?php $ts = $_SESSION['tahun']; $to = $ts-$pengguna->tahun_operasi; echo $to; ?> Tahun)</td>
          </tr>

          <tr>
            <td> </td>
            <td></td>
            <td colspan="2">
            <div id="button">
            <input type="button" name="Button" value=<?=setstring ( 'mal', '"Sunting"', 'en', '"Edit"'); ?>
 onclick="window.location.href='home.php?id=editprofile'" />
            <input type="button" name="Button" value=<?=setstring ( 'mal', '"Cetak"', 'en', '"Print"'); ?>
 onclick="window.print()" />
            </div></td>
          </tr>
        </table>
        <?php
			}
		?>

          <div align="left"><br />
          </div>
          <br /></td>
      </tr>
      <tr>
        <td valign="top"> </td>
      </tr>
    </table>
<br>
