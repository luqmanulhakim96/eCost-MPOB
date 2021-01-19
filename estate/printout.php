<center><img src="../images/logompobn.png" width="100" /></img>
  <br />
  <br />
  LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br/>
  <table>
    <tr>
      <td colspan="3" class="printTitle" align="center"> KAJIAN KOS PENGELUARAN MINYAK SAWIT<br/>
        [<i>PALM OIL COST OF PRODUCTION SURVEY</i>]</td>
    </tr>
    <tr>
      <td height="20px"></td>
    </tr>
    <tr>
      <td colspan="3">Untuk pertanyaan lanjut, sila hubungi&amp; [<i>For further inquiries, please contact</i>]:</td>
    </tr>
    <tr>
      <td width="38"></td>
      <td width="388">Norhazifah Suhani&nbsp;&nbsp;&nbsp;&nbsp;(<i>zifah@mpob.gov.my</i>)</td>
      <td width="293"><b>03 7800 2866</b></td>
    </tr>
    <tr>
      <td></td>
      <td>Norfadilah Mazlan&nbsp;&nbsp;&nbsp;&nbsp;(<i>norfadilah@mpob.gov.my</i>)</td>
      <td><b> 03 7800 2851</b></td>
    </tr>
</table>
<hr/>
<table>
  <tr>
    <td width="350px" height="32">Estet ID [<i>Estate ID</i>]</td>
    <td>:<? echo $row[0] ?></td>
  </tr>
  <tr>
    <td height="32">No. Lesen MPOB [<i>MPOB License Number</i>]</td>
    <td>:<? echo $row[1] ?></td>
  </tr>
  <tr>
    <td height="32">Nama Estet [<i>Name of Estate</i>]</td>
    <td>:<? echo $row[2] ?></td>
  </tr>
  <tr>
    <td height="32">Syarikat Induk(jika ada)[<i>Parent Company (if any)</i>]</td>
    <td>:<? echo $row[3] ?></td>
  </tr>
  <tr>
    <td height="32">Negeri [<i>State</i>]</td>
    <td>:<? echo $row[4] ?></td>
  </tr>
  <tr>
    <td height="32">Nama Pegawai Melapor [<i>Name of Responding Officer</i>]</td>
    <td>:<? echo $row[5] ?></td>
  </tr>
  <tr>
    <td height="32">No.Telefon / No Fax [<i>Telephone / Fax NO.</i>]</td>
    <td>:<? echo $row[6] ?></td>
  </tr>
  <tr>
    <td height="32">Email [<i>Email</i>]</td>
    <td>:<? echo $row[7] ?></td>
  </tr>
</table>
<hr/>
<table>
  <tr>
    <td colspan="2" class="printTitle"> MAKLUMAT UMUM [<i>GENERAL INFORMATION</i>]</td>
  </tr>
  <tr>
    <td width="36"><b>1.1</b></td>
    <td width="716"><b>Jenis syarikat [<i>Type of company</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td height="32"><u><? echo $ans1_1 ?></u></td>
  </tr>
  <tr>
    <td><b>1.2</b></td>
    <td><b>Keahilian dalam persatuan [[<i>Members of association</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td height="32"><u><? echo $ans1_2 ?></u></td>
  </tr>
  <tr>
    <td><b>1.3</b></td>
    <td><b>Integrasi dengan kilang buah sawit [<i>Integrated with a palm  oil mill</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td height="32"><u><? echo $ans1_3 ?></u></td>
  </tr>
  <tr>
    <td><b>1.4</b></td>
    <td><b>Lokasi estet[<i>Location of estate</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td height="32"><u><? echo $ans1_4 ?></u></td>
  </tr>
  <tr>
    <td><b>1.5</b></td>
    <td><b>Bentuk mukabumi estet [<i>Estate topograhy</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td height="32"><u><? echo $ans1_5 ?></u></td>
  </tr>
  <tr>
    <td><b>1.6</b></td>
    <td><b>Peratus kawasan berbukit [<i> Percentage hilly</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td height="32"><u><? echo $ans1_6 ?>%</u></td>
  </tr>
  <tr>
    <td><b>1.7</b></td>
    <td><b> Peratus kecerunan melebihi 25 darjah [<i>Percent of area with gradient greater than 25 degree</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td height="32"><u><? echo $ans1_7 ?>%</u></td>
  </tr>
</table>
<input type="button" value="Print out" id='print' align="middle" onclick="javascript:hidestuffandprint()" />
</center>
<script type="text/javascript">
	window.print();
</script>
