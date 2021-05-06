<?php
$variable[0]=$_SESSION['lesen'];
$variable[1]=$_SESSION['tahun'];
$pu[0] = $_SESSION['lesen'];
$pu[1]= $_SESSION['tahun']-1;

$bts = new user('bts',$pu);
$proses = new user('pemprosesan',$variable);
$koslain = new user('koslain',$variable);
$buruh = new user('buruh',$variable);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

</style>
</head>

<body>
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

			<? echo "YA"; }else{?>
			<? echo "TIDAK";
			?>
			<?
			} ?></td>
          </tr>
          <tr>
            <td><strong><?=setstring ( 'mal', 'Tahun Kilang Mula Beroperasi', 'en', 'Years of Mill Starts Operate'); ?>
</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?= $pengguna->tahun_operasi; ?>
            (<?php $ts = $_SESSION['tahun']; $to = $ts-$pengguna->tahun_operasi; echo $to; ?> Tahun)</td>
          </tr>
        </table>

	<table width="90%" align="center" cellspacing="0" class="tableCss" style="-moz-border-radius:5px;">
    <tr>
      <td height="34" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td height="34" colspan="4"><span class="style1"><?=setstring ( 'mal', 'KOS PEMPROSESAN', 'en', 'PROCESSING COST'); ?>
</span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td width="426" height="26" bgcolor="#FFCCFF"><strong><?=setstring ( 'mal', 'Jumlah BTS diproses pada tahun lepas ', 'en', 'Total of Processed FFB on Last Year'); ?>
</strong></td>
      <td colspan="3" bgcolor="#FFCCFF"><label><strong>
<?php $d =$bts->fbb_proses; echo number_format($d,2);
?>
<?=setstring ( 'mal', 'Tan', 'en', 'Tonne'); ?>
</strong></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="136">&nbsp;</td>
      <td width="157">&nbsp;</td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td height="628" colspan="4"><table width="100%" cellspacing="0" frame="box" class="subTable">
          <tr>
            <td height="47" colspan="2" align="right" background="../images/tb_BG.gif"><div align="left"><strong><?=setstring ( 'mal', 'Jenis Kos', 'en', 'Cost Type'); ?>
</strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Kos', 'en', 'Cost'); ?>
 <br />
              (RM)</strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?>
<br />
              (RM)</strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Perubahan Kos Per Tan BTS dengan Tahun Lepas', 'en', 'Different of Cost Per Tonne FFB with Last Year'); ?>
</strong> <br />
                    <strong>(%)</strong></div></td>
          </tr>
          <tr>
            <td width="28" height="51" align="center" valign="middle" bgcolor="#99FF99">1.</td>
            <td width="311" bgcolor="#99FF99"><span id="s1"><?=setstring ( 'mal', 'Air, bahan kimia dan bekalan tenaga', 'en', 'Water, chemical and power'); ?>
&nbsp;</span></td>
            <td width="164" align="center" valign="middle" bgcolor="#99FF99">
                <div align="center">
                  <?php echo number_format($proses->kp_1,2); ?>
              </div></td>
            <td width="166" align="center" valign="middle" bgcolor="#99FF99"><div align="center" id="bts_tan_1"><?php $k1=$proses->kp_1/$d; echo number_format($k1,2);?></div></td>
            <td width="188" align="center" valign="middle" bgcolor="#99FF99"><div align="center" id="bts_beza_1">0.00</div></td>
          </tr>
          <tr>
            <td height="36" align="center" valign="middle">2.</td>
            <td><?=setstring ( 'mal', 'Bahan bakar dan minyak pelincir', 'en', 'Fuel and Lubricant'); ?>
&nbsp;</td>
            <td align="center" valign="middle"><div align="center">
                <?php echo number_format($proses->kp_2,2); ?>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_2"><?php $k2=$proses->kp_2/$d; echo number_format($k2,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_2"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="34" align="center" valign="middle" bgcolor="#99FF99">3.</td>
            <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Buruh kilang sawit', 'en', 'Mill Worker'); ?>
&nbsp;</td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <?php echo number_format($proses->kp_3,2); ?>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_tan_3"><?php $k3=$proses->kp_3/$d; echo number_format($k3,2);?></div>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_beza_3"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="32" align="center" valign="middle">4.</td>
            <td><?=setstring ( 'mal', 'Kawalan efluen', 'en', 'Effluent Control'); ?>
</td>
            <td align="center" valign="middle"><div align="center">
                <?php echo number_format($proses->kp_4,2); ?>
            </div></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_4"><?php $k4=$proses->kp_4/$d; echo number_format($k4,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_4">
                <div align="center"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="35" align="center" valign="middle" bgcolor="#99FF99">5.</td>
            <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Pengurusan dan pentadbiran', 'en', 'Management and Administration'); ?>
</td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <?php echo number_format($proses->kp_5,2); ?>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_tan_5"><?php $k5=$proses->kp_5/$d; echo number_format($k5,2);?></div>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_beza_5"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="34" align="center" valign="middle">6.</td>
            <td><?=setstring ( 'mal', 'Perbelanjaan pejabat', 'en', 'Office Expenses'); ?>
&nbsp;</td>
            <td align="center" valign="middle"><div align="center">
                <?php echo number_format($proses->kp_6,2); ?>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_6"><?php $k6=$proses->kp_6/$d; echo number_format($k6,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_6"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="35" align="center" valign="middle" bgcolor="#99FF99">7.</td>
            <td bgcolor="#99FF99"><?=setstring ( 'mal', 'Persampelan dan ujian makmal', 'en', 'Sampling and laboratory testing'); ?>
</td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <?php echo number_format($proses->kp_7,2); ?>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_tan_7"><?php $k7=$proses->kp_7/$d; echo number_format($k7,2);?></div>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_beza_7"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="36" align="center" valign="middle">8.</td>
            <td><?=setstring ('mal','Kebajikan buruh yang tidak dibayar terus kepada pekerja', 'en', 'Labour welfare not paid directly to workers')?> </td>
            <td align="center" valign="middle"><div align="center">
                <?php echo number_format($proses->kp_8,2); ?>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_8"><?php $k8=$proses->kp_8/$d; echo number_format($k8,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_8"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="37" align="center" valign="middle" bgcolor="#99FF99">9.</td>
            <td bgcolor="#99FF99"><?=setstring ('mal','Penaikkan taraf kilang ' , 'en', 'Mill upgrading')?> <br /></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <?php echo number_format($proses->kp_9,2); ?>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_tan_9"><?php $k9=$proses->kp_9/$d; echo number_format($k9,2);?></div>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_beza_9"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="39" align="center" valign="middle">10.</td>
            <td> <?=setstring ('mal', 'Penjagaan dan pembaikan kilang sawit', 'en', 'Maintenance and repair of palm oil mill')?> &nbsp;<br /></td>
            <td align="center" valign="middle"><div align="center">
                <?php echo number_format($proses->kp_10,2); ?>
              </div>            </td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_10"><?php $k10=$proses->kp_10/$d; echo number_format($k10,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_10"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="40" align="center" valign="middle" bgcolor="#99FF99">11</td>
            <td bgcolor="#99FF99"><?=setstring ('mal','Sewa, cukai tanah, yuran', 'en', 'Rents, land quit rent, fees')?></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <?php echo number_format($proses->kp_11,2); ?>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_tan_11"><?php $k11=$proses->kp_11/$d; echo number_format($k11,2);?></div>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_beza_11"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="37" align="center" valign="middle">12</td>
            <td><?=setstring ('mal','Kawalan keselamatan kilang sawit', 'en','Palm oil mill security' ) ?> </td>
            <td align="center" valign="middle"><div align="center">
                <?php echo number_format($proses->kp_12,2); ?>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_tan_12"><?php $k12=$proses->kp_12/$d; echo number_format($k12,2);?></div>
            </div></td>
            <td align="center" valign="middle"><div align="center">
                <div align="center" id="bts_beza_12"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="38" align="center" valign="middle" bgcolor="#99FF99">13</td>
            <td bgcolor="#99FF99"><?=setstring ('mal', 'Penyelidikan dan pembangunan kilang sawit', 'en', 'Palm oil mill research and development')?> <br /></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <?php echo number_format($proses->kp_13,2); ?>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_tan_13"><?php $k13=$proses->kp_13/$d; echo number_format($k13,2);?></div>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_beza_13"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="36" align="center" valign="middle">14</td>
            <td><?=setstring ('mal', 'Susutnilai kilang sawit', 'en', 'Depreciation of palm oil mill')?> </td>
            <td align="center" valign="middle"><div align="center">
                <?php echo number_format($proses->kp_14,2); ?>
            </div></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_14"><?php $k14=$proses->kp_14/$d; echo number_format($k14,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_14">
                <div align="center"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="37" align="center" valign="middle" bgcolor="#99FF99">15</td>
            <td bgcolor="#99FF99"><?=setstring ('mal','Bayaran pengurusan Ibu Pejabat', 'en','Headquaters management charges')?></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><?php echo number_format($proses->kp_15,2); ?></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_tan_15"><?php $k15=$proses->kp_15/$d; echo number_format($k15,2);?></div>
            </div></td>
            <td align="center" valign="middle" bgcolor="#99FF99"><div align="center">
                <div align="center" id="bts_beza_15"> 0.00 </div>
            </div></td>
          </tr>
          <tr>
            <td height="17" align="center" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><div align="center"></div></td>
            <td align="center" valign="middle"><div align="center"></div></td>
            <td align="center" valign="middle"><div align="center"></div></td>
          </tr>
          <tr>
            <td height="33" align="center" valign="middle">&nbsp;</td>
            <td><div align="right"><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?></div></td>
            <td align="center" valign="middle" bgcolor="#FFCC66"><div align="center">
                <?php echo number_format($proses->total_kp,2); ?>
            </div></td>
            <td align="center" valign="middle" bgcolor="#FFCC66"><div align="center" id="total_bts_tan"><?php $total_bts_tan = $k1+$k2+$k3+$k4+$k5+$k6+$k7+$k8+$k9+$k10+$k11+$k12+$k13+$k14+$k15; echo number_format($total_bts_tan,2);?></div></td>
            <td align="center" valign="middle" bgcolor="#FFCC66"><div align="center" id="total_bts_beza">0.00</div></td>
          </tr>
      </table>
      </table>


      <table width="90%" align="center" class="tableCss">
    <tr>
      <td height="31" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td width="1106" height="31" colspan="4"><span class="style1"><?=setstring ( 'mal', 'KOS-KOS LAIN', 'en', 'OTHER COST'); ?></span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><table width="90%" align="center" cellspacing="0" frame="box" class="subTable">
          <tr>
            <td height="46" align="right" valign="middle" background="../images/tb_BG.gif">&nbsp;</td>
            <td height="46" align="right" valign="middle" background="../images/tb_BG.gif"><div align="left"><strong><?=setstring ( 'mal', 'Jenis Kos', 'en', 'Cost Item'); ?></strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Jumlah Kos', 'en', 'Cost Amaunt'); ?><br />
              (RM)</strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?><br />
              (RM)</strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Perubahan Kos Per Tan BTS dengan Tahun Lepas', 'en', 'Different of Cost Per Tonne FFB with Last Year'); ?><br />
              (%)</strong></div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td width="23" height="50" align="center" valign="middle">1.</td>
            <td width="353" align="left" valign="middle"><span style="cursor:help"><?=setstring ( 'mal', 'Kos penghantaran. Caj kemudahan pukal, pengangkutan, pengendalian &amp; insuran&nbsp;', 'en', 'Forwarding Expenses
- Bulking installation charges, freight, transport & handling, insurance'); ?></span><br /></td>
            <td width="161" align="center" valign="middle"><?php echo number_format($koslain->kl_1,2); ?></td>
            <td width="151" align="center" valign="middle" bgcolor="#99FF99"><div align="center" id="bts_tan_1"><?php $k1=$koslain->kl_1/$d; echo number_format($k1,2);?></div></td>
            <td width="165" align="center" valign="middle"><div align="center" id="bts_beza_1">0.00</div></td>
          </tr>
          <tr>
            <td height="39" align="center" valign="middle">2.</td>
            <td align="left" valign="middle"><?=setstring ('mal','Cukai jualan (untuk kilang di Sabah dan Sarawak)', 'en','Sales tax (for mills in Sabah and Sarawak)')?> <br /></td>
            <td align="center" valign="middle"><?php echo number_format($koslain->kl_2,2); ?></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_2"><?php $k2=$koslain->kl_2/$d; echo number_format($k2,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_2">0.00</div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td height="41" align="center" valign="middle">3.</td>
            <td align="left" valign="middle"><?=setstring ('mal', 'Perbelanjaan jualan (termasuk komisyen)', 'en', 'Selling expenses (including commission)')?><br /></td>
            <td align="center" valign="middle"><?php echo number_format($koslain->kl_3,2); ?></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_3"><?php $k3=$koslain->kl_3/$d; echo number_format($k3,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_3">0.00</div></td>
          </tr>
          <tr>
            <td height="40" align="center" valign="middle">4.</td>
            <td align="left" valign="middle"><?=setstring ( 'mal', 'Ses MPOB', 'en', 'Cess MPOB'); ?></td>
            <td align="center" valign="middle"><?php echo number_format($koslain->kl_4,2); ?></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_4"><?php $k4=$koslain->kl_4/$d; echo number_format($k4,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_4">0.00</div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td height="37" align="center" valign="middle">5.</td>
            <td align="left" valign="middle"><?=setstring ( 'mal', 'Perbelanjaan lain', 'en', 'Other Expenditure'); ?></td>
            <td align="center" valign="middle"><?php echo number_format($koslain->kl_5,2); ?></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_5"><?php $k5=$koslain->kl_5/$d; echo number_format($k5,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_5">0.00</div></td>
          </tr>
          <tr>
            <td height="17" align="center" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
          </tr>
          <tr bgcolor="#FFFFCC">
            <td height="37" style="border-top:solid #333333 1px;" align="center" valign="middle">&nbsp;</td>
            <td align="left" valign="middle" bgcolor="#FFFFCC" style="border-top:solid #333333 1px;"><span class="style2">
              <?=setstring ( 'mal', 'Jumlah keseluruhan', 'en', 'Total'); ?>
            </span></td>
            <td align="center" style="border-top:solid #333333 1px;" valign="middle"><?php echo number_format($koslain->total_kl,2); ?></td>
            <td align="center" style="border-top:solid #333333 1px;" valign="middle"><div align="center" id="total_bts_tan">
              <?php $total_bts_tan = $k1+$k2+$k3+$k4+$k5; echo number_format($total_bts_tan,2);?>
            </div></td>
            <td align="center" style="border-top:solid #333333 1px;" valign="middle"><div align="center">0.00</div></td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td height="37" align="center" valign="middle" style="border-top:solid #333333 1px;">&nbsp;</td>
            <td align="left" valign="middle" style="border-top:solid #333333 1px;"><span class="style2"><?=setstring ( 'mal', 'Harga purata isirong yang didapati pada tahun lepas', 'en', 'Mean of kernel price obtained last year'); ?> (RM)</span></td>
            <td align="center" valign="middle" style="border-top:solid #333333 1px;">


            <script language="javascript">
            function tukarnombor(obj){
						if(number_only(obj)){
						$(obj).format({format:"#,###.00", locale:"us"});
						$(obj).removeClass("field_edited");
						$(obj).addClass("field_active");
						}
			}
            </script>

            <?php

					$con =connect();
					$qisi="select * from mill_isirung where lesen = '".$_SESSION['lesen']."' and tahun ='".$_SESSION['tahun']."' limit 1";
					$risi=mysqli_query($con, $qisi);
					$rowisi=mysqli_fetch_array($risi);
					$totalisi = mysqli_num_rows($risi);
					?>
					<script>
					alert('<?php echo $qisi; ?>')
					</script>

					<?php

					if($totalisi==0){
							$con =connect();
							$q="insert into mill_isirung (lesen,tahun) values ('".$_SESSION['lesen']."','".$_SESSION['tahun']."')";
							$r=mysqli_query($con, $q);

				}


			?>
            <?php echo number_format($rowisi['isirung'],2); ?>





            </td>
            <td align="center" valign="middle" style="border-top:solid #333333 1px;">&nbsp;</td>
            <td align="center" valign="middle" style="border-top:solid #333333 1px;">&nbsp;</td>
          </tr>
        </table>
        <br />
      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </table>
  <?php $variable[0]=$_SESSION['lesen'];
$variable[1]=$_SESSION['tahun'];

$pu[0] = $_SESSION['lesen'];
$pu[1]= $_SESSION['tahun']-1;
$bts = new user('bts',$pu);

$proses = new user('pemprosesan',$variable);
$koslain = new user('koslain',$variable);

function mill_proses($var){
		$con = connect();
		$q ="select * from mill_pemprosesan where lesen = '".$var[0]."' and tahun = '".$var[1]."'";
		$r = mysqli_query($con, $q);
		$row =  mysqli_fetch_array($r);
		$stat[0]=$row['status'];
		return $stat;
}

function mill_kos_lain($var){
		$con =connect();
		$q ="select * from mill_kos_lain where lesen = '".$var[0]."' and tahun = '".$var[1]."'";
		$r = mysqli_query($con, $q);
		$row =  mysqli_fetch_array($r);
		$stat[0]=$row['status'];
		return $stat;
}

$mp = mill_proses($variable);
$mll = mill_kos_lain ($variable);
?>
<table width="90%" align="center" cellspacing="0" frame="box" class="subTable">
      <tr>
        <td height="38" colspan="2" align="right" background="../images/tb_BG.gif"><div align="left"><strong><?=setstring ( 'mal', 'Jenis', 'en', 'Type'); ?></strong></div></td>
        <td background="../images/tb_BG.gif"><div align="right"><strong><?=setstring ( 'mal', 'Kos Per Tan', 'en', 'Cost Per Tonne'); ?> (RM)</strong></div></td>
        <td background="../images/tb_BG.gif">&nbsp;</td>
      </tr>
      <tr>
        <td width="25" height="38" align="right" bgcolor="#99FF99">1.</td>
        <td width="439" bgcolor="#99FF99">
       <!-- <?php
		//echo $mp[0];

		if($mp[0]=="2"){ ?>
        <img src="images/001_11.gif" width="24" height="24" border="0" />
        <?php } ?>-->

          <?=setstring ( 'mal', 'Kos Pemprosesan BTS', 'en', 'FFB Processing Cost'); ?></td>
        <td width="255" bgcolor="#99FF99"><div align="right">
          <?php
		//  echo $proses->total_kp."<br>".$bts->fbb_proses;

		  $d=($proses->total_kp/$bts->fbb_proses); echo number_format($d,2);?>
        </div></td>
        <td width="13" bgcolor="#99FF99">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="right">2.</td>
        <td>

      <!--  <?php
		//echo $mll[0];
		if($mll[0]=="2"){ ?>
        <img src="images/001_11.gif" width="24" height="24" border="0" />
         <?php } ?>-->

		  <?=setstring ( 'mal', 'Kos Lain-lain', 'en', 'Other Expenditure'); ?></td>
        <td>
          <div align="right"><?php
		  $d2=($koslain->total_kl/$bts->fbb_proses); echo number_format($d2,2);?></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#99FF99">&nbsp;</td>
        <td bgcolor="#99FF99"><strong> <?=setstring ( 'mal', 'Jumlah Kos Pemprosesan', 'en', 'Total Processing Cost'); ?></strong></td>
        <td bgcolor="#99FF99">
          <div align="right"><span id"a" style="text-decoration:blink">
            <strong><?php $jd = $d+$d2; echo number_format($jd,2);?></strong>
          </span></div></td>
        <td bgcolor="#99FF99">&nbsp;</td>
      </tr>

    </table>
  <!--
  <table width="90%" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div style="text-align:center;"><h2><?=setstring ( 'mal', 'BILANGAN PEKERJA MENGIKUT KATEGORI', 'en', 'WORKERS NO. ACCORDING TO CATEGORY'); ?><br />
        <?=setstring ( 'mal', '(tidak termasuk pekerja pejabat)', 'en', '(excluding the office staff)'); ?></h2></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="90%" align="center" cellspacing="0"  frame="box" class="subTable">
          <tr>
            <td width="261" rowspan="2" align="left" background="../images/tb_BG.gif"><strong> <?=setstring ( 'mal', 'Jenis Buruh', 'en', 'Work Category'); ?></strong></td>
            <td height="32" colspan="3" align="center" background="../images/tb_BG.gif"><strong><?=setstring ( 'mal', 'Bilangan', 'en', 'No.'); ?></strong></td>
          </tr>
          <tr>
            <td width="170" height="38" align="center" background="../images/tb_BG.gif"><strong><?=setstring ( 'mal', 'Buruh Asing', 'en', 'Foreign Worker'); ?><br />
            </strong></td>
            <td width="163" align="center" background="../images/tb_BG.gif"><strong> <?=setstring ( 'mal', 'Buruh Tempatan', 'en', 'Local Worker'); ?><br />
            </strong></td>
            <td width="144" align="center" background="../images/tb_BG.gif"><strong><?=setstring ( 'mal', 'Kekurangan', 'en', 'Shortage'); ?> <br />
            </strong></td>
          </tr>
          <tr>
            <td height="37" align="left" bgcolor="#99FF99">1. <?=setstring ( 'mal', 'Penyelia', 'en', 'Supervisor'); ?></td>
            <td align="center" bgcolor="#99FF99"><?php echo $buruh->mb_1; ?></td>
            <td align="center" bgcolor="#99FF99"><?php echo $buruh->mb_1b; ?></td>
            <td align="center" bgcolor="#99FF99"><?php echo $buruh->mb_1c; ?></td>
          </tr>
          <tr>
            <td height="36" align="left"><div align="left">2. <?=setstring ( 'mal', 'Pemasang/Mekanik', 'en', 'Installer/Mechanics'); ?> </div></td>
            <td align="center"><?php echo $buruh->mb_2; ?></td>
            <td align="center"><?php echo $buruh->mb_2b; ?></td>
            <td align="center"><?php echo $buruh->mb_2c; ?></td>
          </tr>
          <tr>
            <td height="37" align="left" bgcolor="#99FF99"><div align="left">3. <?=setstring ( 'mal', 'Pekerja kilang', 'en', 'Mill worker'); ?></div></td>
            <td align="center" bgcolor="#99FF99"><?php echo $buruh->mb_3; ?></td>
            <td align="center" bgcolor="#99FF99"><?php echo $buruh->mb_3b; ?></td>
            <td align="center" bgcolor="#99FF99"><?php echo $buruh->mb_3c; ?></td>
          </tr>
          <tr>
            <td height="40" align="left"><div align="left">4. <?=setstring ( 'mal', 'Penjaga dandang', 'en', 'Boilermen'); ?> </div></td>
            <td align="center"><?php echo $buruh->mb_4; ?></td>
            <td align="center"><?php echo $buruh->mb_4b; ?></td>
            <td align="center"><?php echo $buruh->mb_4c; ?></td>
          </tr>
          <tr>
            <td height="42" align="left" bgcolor="#99FF99"><div align="left">5. <?=setstring ( 'mal', 'Lain-lain ', 'en', 'Other'); ?></div></td>
            <td align="center" bgcolor="#99FF99"><?php echo $buruh->mb_5; ?></td>
            <td align="center" bgcolor="#99FF99"><?php echo $buruh->mb_5b; ?></td>
            <td align="center" bgcolor="#99FF99"><?php echo $buruh->mb_5c; ?></td>
          </tr>
          <tr bgcolor="#FFFFCC">
            <td height="36" align="left" bgcolor="#FFFFCC"><span ><b><?=setstring ( 'mal', 'Jumlah keseluruhan', 'en', 'Total'); ?></b> </span></td>
            <td align="center"><?php
			$total_mb = $buruh->mb_1+$buruh->mb_2+$buruh->mb_3+$buruh->mb_4+$buruh->mb_5;
			echo $total_mb; ?></td>
            <td align="center"><?php
			$total_mb_b = $buruh->mb_1b+$buruh->mb_2b+$buruh->mb_3b+$buruh->mb_4b+$buruh->mb_5b;
			echo $total_mb_b; ?></td>
            <td align="center"><?php
			$total_mb_c=$buruh->mb_1c+$buruh->mb_2c+$buruh->mb_3c+$buruh->mb_4c+$buruh->mb_5c;
			echo $total_mb_c; ?></td>
          </tr>
          <tr>
            <td height="17" align="left">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
        	<td colspan="5" align="center">
        	<input name="cetak" type="button" value=<?=setstring ( 'mal', '"Cetak"', 'en', '"Print"'); ?> onclick="window.print();" />
            </td>
        </tr>
  </table>
  -->
</body>
</html>
