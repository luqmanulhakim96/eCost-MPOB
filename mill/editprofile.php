<?php
include('../class/syarikat.class.php');
$company = new syarikat('syarikat', '');
$teknologi = new syarikat('steril', '');
$millProfile = new user('ekilang', $_SESSION['lesen']);
?>
<link rel="stylesheet" type="text/css" href="../text_style.css" />
<?php
if (!isset($_GET['utama'])) {
    ?>
    <strong><?= setstring('mal', 'PROFIL PENGGUNA', 'en', 'USER PROFILE'); ?>
    </strong><br>
    <?php
}
?>
<br>
<form id="form1" name="form1" method="post" action="save_profile.php">
    <table width="82%" border="0" align="center" cellpadding="3" cellspacing="0" aria-describedby="user-profile">
        <tr>
            <td width="90%" valign="top"><?php
                if (isset($_GET['utama'])) {
                    ?>
                    <p><strong>Selamat Datang TSEN MILL SDN BHD</strong></p>
                    <p>Login terakhir anda pada
                        <?= date("d-m-Y h:i", strtotime("200911301150")) ?>
                    </p>
                    <?php
                } else {
                    ?>
                    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" id="box-table-a" aria-describedby="user-profile-2">
                        <tr>
                            <th height="36" colspan="4" scope="col"><strong><?= setstring('mal', 'Maklumat Am', 'en', 'General Information'); ?></strong></th>
                        </tr>
                        <tr>
                            <td width="28%"><strong><?= setstring('mal', 'Nama Kilang', 'en', 'Mill / Factory Name'); ?></strong></td>
                            <td width="2%"><strong>:</strong></td>
                            <td width="70%" colspan="2"><?php echo $millProfile->namakilang; ?>
                                <input name="namakilang" type="hidden" autocomplete="off" id="namakilang"  value="<?= $millProfile->namakilang; ?>" size="50" />
                                 </td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'No Lesen (Baru)', 'en', 'License No (New)'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2"><?= $millProfile->lesen; ?>
                                <input name="lesen" type="hidden" autocomplete="off" id="lesen"  value="<?= $millProfile->lesen; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'No Lesen (Lama)', 'en', 'License No (Old)'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="lesenlama" type="text" autocomplete="off" id="lesenlama" value="<?= $pengguna->lesenlama; ?>" size="50" /></td>
                        </tr>

                        <tr>
                            <th height="36" colspan="4" scope="col"><strong><?= setstring('mal', 'Alamat Hubungan', 'en', 'Contact Address'); ?></strong></th>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Alamat Surat Menyurat', 'en', 'Mailing Address'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="alamat1" type="text" autocomplete="off" id="alamat1" value="<?= $pengguna->alamatsurat1; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Poskod', 'en', 'Postcode'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="alamat2" type="text" autocomplete="off" id="alamat2" value="<?= $pengguna->alamatsurat2; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Negeri', 'en', 'State'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="alamat3" type="text" autocomplete="off" id="alamat3" value="<?= $pengguna->alamatsurat3; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'No. Telefon', 'en', 'Telephone No'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="notel" type="text" autocomplete="off" id="notel" value="<?= $pengguna->notel; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'No. Faks', 'en', 'Fax No'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="nofax" type="text" autocomplete="off" id="nofax" value="<?= $pengguna->nofax; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Emel', 'en', 'Email'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="email" type="text" autocomplete="off" id="email" value="<?= $pengguna->email; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Pegawai Melapor', 'en', 'Reporting Officer'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="pegawai" type="text" autocomplete="off" id="pegawai" value="<?= $pengguna->pegawai; ?>" size="50" /></td>
                        </tr>
                        <tr valign="top">
                            <td><strong><?= setstring('mal', 'Syarikat Induk', 'en', 'Headquarters'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="syarikatinduk" type="text" autocomplete="off" id="syarikatinduk" value="<?= $pengguna->syarikatinduk; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Daerah Premis ', 'en', 'Premist District'); ?> </strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="daerahpremis" type="text" autocomplete="off" id="daerahpremis" value="<?= $pengguna->daerahpremis; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Negeri Premis', 'en', 'Premist State'); ?> </strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="negeripremis" type="text" autocomplete="off" id="negeripremis" value="<?= $pengguna->negeripremis; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Kapasiti Kilang', 'en', 'Mill Capacity'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="kapasiti" type="text" autocomplete="off" id="kapasiti" value="<?= number_format($pengguna->kapasiti, 2); ?>" size="10" />
                                <?= setstring('mal', 'Tan BTS sejam', 'en', 'Tonne FFB Per Hour'); ?></td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td colspan="2"> </td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Jenis Syarikat', 'en', 'Company Type'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <select name="syarikat" id="syarikat" style="width:330px">
                                    <?php
                                    for ($i = 0; $i < $company->total; $i++) {
                                        ?>
                                        <option value="<?= $company->comp_name[$i]; ?>" <?php if ($pengguna->syarikat == $company->comp_name[$i]) { ?>selected="selected"<?php } ?>>
                                            <?= $company->comp_name[$i]; ?>
                                        </option>
                                    <?php } ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Teknologi Pensterilan', 'en', 'Sterilization Technology'); ?></strong><br /></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <select name="teknologi" id="teknologi">
                                    <?php for ($i = 0; $i < $teknologi->total; $i++) { ?>
                                        <option value="<?= $teknologi->nama[$i]; ?>" <?php if ($pengguna->teknologi == $teknologi->nama[$i]) { ?>selected="selected"<?php } ?>>
                                            <?= $teknologi->nama[$i]; ?>
                                        </option>
                                    <?php } ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Integrasi dengan Estet', 'en', 'Integration with Estate'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input type="radio" name="integrasi" id="integrasi"  value="Y"  <?php if ($pengguna->integrasi == 'Y') { ?>checked="checked"<?php } ?>/>
                                <label for="radioIntegrasi1">Ya</label> 
                                <input type="radio" name="integrasi" id="integrasi" value="N" <?php if ($pengguna->integrasi == 'N') { ?>checked="checked"<?php } ?>/>
                                <label for="radioIntegrasi2">Tidak</label></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Tahun Kilang Mula Beroperasi', 'en', 'Years of Mill Starts Operate'); ?></strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2">
                                <input name="tahun_operasi" type="text" autocomplete="off" value="<?= $pengguna->tahun_operasi; ?>" class="field_active" id="tahun_operasi" size="4" maxlength="4" />               </td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td colspan="2"> </td>
                        </tr>

                        <tr>
                            <th colspan="4" scope="col"><strong><?= setstring('mal', 'Kata Laluan', 'en', 'Password'); ?>
                                </strong></th>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Kata Laluan', 'en', 'Password'); ?> </strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2"><input name="katalaluan1" type="password" id="katalaluan1" value="<?= $pengguna->password; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td><strong><?= setstring('mal', 'Sahkan Kata Laluan', 'en', 'Verify Password'); ?> </strong></td>
                            <td><strong>:</strong></td>
                            <td colspan="2"><input name="katalaluan2" type="password" id="katalaluan2" value="<?= $pengguna->password; ?>" size="50" /></td>
                        </tr>


                        <tr>
                            <td> </td>
                            <td> </td>
                            <td colspan="2"><input type="submit" name="Submit" value=<?= setstring('mal', '"Simpan"', 'en', '"Save"'); ?>
                                                   />
                                <input type="reset" name="Submit2" value=<?= setstring('mal', '"Batal"', 'en', '"Cancel"'); ?>
                                       /></td>
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
</form>
