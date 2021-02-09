<?php
$con = connect();
$q="select * from esub where no_lesen_baru ='$lesen'";
$r= mysqli_query($con, $q);
$row= mysqli_fetch_array($r);

?>
<table width="100%">
  <tr>
    <td colspan="4"><div align="center"><strong>(Additional Information) </strong><br />
      <strong>(<em>Maklumat Tambahan</em>) </strong></div></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center"><u><strong>Palm Trees Plant Profile Information <br />
          <em>Maklumat Profil Tanaman Pokok Kelapa Sawit</em></strong></u></div></td>
  </tr>
  <tr>
    <td width="9%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="34%">&nbsp;</td>
  </tr>
  <tr valign="top">
    <td><strong>Estate Name<br />
        <em>Nama Estate</em></strong></td>
    <td><strong>: <u><?php echo $row['Nama_Estet'];?></u></strong></td>
    <td><strong>State</strong><br />
      <em><strong>Negeri</strong></em></td>
    <td><strong> : <u><?php echo $row['Negeri']; ?></u></strong></td>
  </tr>
  <tr valign="top">
    <td><strong>Licence No. <br />
        <em>No. Lesen</em> </strong></td>
    <td><strong>: <u><?php echo $row['No_Lesen_Baru']; ?></u></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">State the palm tree plant (in hectare) by year <br />
      (<em>Nyatakan keluasan (hektar) tanaman pokok kelapa sawit yang masih ada mengikut tahun ditanam</em>)</td>
  </tr>
</table>
<table width="50%" align="center" id="box-table-a">
  <tr>
    <th><div align="center"><strong>Year of planted<br />
    <em>Tahun ditanam </em></strong></div></th>
    <th><div align="center"><strong> Age of Palm<br />
          <em>Umur Pokok </em><br />
    </strong></div></th>
    <th><div align="center"><strong>Area(hectare)<br />
        <em>Keluasan(hektar) </em></strong></div></th>
  </tr>
  <?php
  $con=connect();
  $qpokok ="select * from age_profile where lesen = '$lesen' order by tahun_tanam";
  $rpokok = mysqli_query($con, $qpokok);

  $totalluas=0;
  while($rowpokok=mysqli_fetch_array($rpokok)){
  ?>
  <tr>
    <td><div align="center">
      <?= $rowpokok['umur_pokok'];?>
    </div></td>
    <td><div align="center">
      <?= $rowpokok['tahun_tanam'];?>
    </div></td>
    <td><div align="center">
      <?php $luas=$rowpokok['keluasan']; echo number_format($luas,2);
	  $totalluas =$totalluas+$luas;
	  ?>
    </div></td>
  </tr>
  <?php } ?>
</table>
<table width="100%">
  <tr valign="top">
    <td width="30%"><strong>Total Area Plant (in hectare)<br />
        <em>Jumlah Keluasan Tanaman (hektar)        </em></strong></td>
    <td width="70%"><strong>: <?= number_format($totalluas,2);?></strong></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
