<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=po1_2&pol=false&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>';		
			}
	}

}

</script>

<form id="form1" name="form1" method="post" action="home.php?id=po1_2&pol=true&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">
<table class="tableCss" >
  <tr>
    <td width="38"><b>1.1</b></td>
    <td colspan="2"><b>Jenis Syarikat</b> [<i> Type of company</i>]</td>
  </tr>
  <tr>
    <td></td>
    <td width="601">Syarikat perseorangan [<i>Sole Proprietorship</i>]</td>
    <td width="31"><input type="radio" name="radioSykt" value="Syarikat perseorangan[Sole Proprietorship]" checked="checked"  /></td>
  </tr>
  <tr>
    <td></td>
    <td>Syarikat Berhad [<i>Public Limited Company</i>]</td>
    <td><input type="radio" name="radioSykt" value="Syarikat Berhad[Public Limited Company]" checked="checked" /></td>
  </tr>
  <tr>
    <td></td>
    <td>Syarikat Sendirian Berhad [<i>Private Limited Company</i>]</td>
    <td><input type="radio" name="radioSykt"  value="Syarikat Sendirian Berhad[Private Limited Company]"  checked="checked"/></td>
  </tr>
  <tr>
    <td></td>
    <td>Syarikat perkongsian [<i>Partnership</i>]</td>
    <td><input type="radio" name="radioSykt"  value="Syarikat perkongsian[Partnership]"  checked="checked"/></td>
  </tr>
  <tr>
    <td></td>
    <td>Koperasi [<i>Coorperatives</i>]</td>
    <td><input type="radio" name="radioSykt" value="Koperasi[Coorperatives]" checked="checked" /></td>
  </tr>
  <tr>
    <td></td>
    <td>Agensi Kerajaan [<i>Public Agency</i>]</td>
    <td><input type="radio" name="radioSykt"  value="Agensi Kerajaan[Public Agency]"  checked="checked"/></td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.2</b></td>
    <td colspan="2">Keahlian dalam persatuan</b> [<i>Member of association</i>]</td>
  </tr>
  <tr>
    <td></td>
    <td>Persatuan Pengeluar Pertanian Malaysia [<i>Malaysian Agriculture Producers Association(MARA)</i>] </td>
    <td><input type="radio" name="radioAhli" value="Persatuan Pengeluar Pertanian Malaysia[Malaysian Agriculture Producers Association(MARA)]"  
			checked="checked"/></td>
  </tr>
  <tr>
    <td></td>
    <td>Persatuan Pengeluar Malaysia Timur [<i>East Malaysian Producers Assorciation(EMPA)<i>] </td>
    <td><input type="radio" name="radioAhli"  value="Persatuan Pengeluar Malaysia Timur[East Malaysian Producers Assorciation(EMPA)]" checked="checked" /></td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.3</b></td>
    <td colspan="2">Integrasi dengan kilang buah sawit</b> [<i>Integrated with a palm oil mill</i>]</td>
  </tr>
  <tr>
    <td></td>
    <td>Ya [<i>Yes</i>] </td>
    <td><input type="radio" name="radioIntegrasi"  value="Ya[Yes]"  checked="checked"/></td>
  </tr>
  <tr>
    <td></td>
    <td>Tidak [<i>No</i>] </td>
    <td><input type="radio" name="radioIntegrasi"  value="Tidak[No]"  checked="checked"/></td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.4</b></td>
    <td colspan="2"> Lokasi estet</b> [<i>Location of estate</i>]</td>
  </tr>
  <tr>
    <td></td>
    <td>Kawasan pantai [<i>Flat</i></td>
    <td><input type="radio" name="radioLokasi" value="Kawasan pantai[Flat]" checked="checked" /></td>
  </tr>
  <tr>
    <td></td>
    <td>Kawasan pedalaman [<i>Inland</i>]</td>
    <td><input type="radio" name="radioLokasi" value="Kawasan pedalaman[Inland]" checked="checked" /></td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.5</b></td>
    <td colspan="2">Bentuk mukabumi estet</b> [<i>estet topography</i>]</td>
  </tr>
  
  <tr>
    <td></td>
    <td>Rantai/lantai [<i>Flat</i>]</td>
    <td><input type="radio" name="radioBtkMukaBumi"  value="Rantai/lantai[Flat]"  checked="checked"/></td>
  </tr>
  <tr>
    <td></td>
    <td>Beralun [<i>Undulating</i>]</td>
    <td><input type="radio" name="radioBtkMukaBumi"  value="Beralun[Undulating]" checked="checked" /></td>
  </tr>
  <tr>
    <td></td>
    <td>Berbukit [<i>Hilly</i>] </td>
    <td><input type="radio" name="radioBtkMukaBumi"   value="Berbukit[Hilly]"  checked="checked"/></td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.6</b></td>
    <td colspan="2"><table class="subTable">
      <tr>
        <td width="398"><b>Peratus kawasan berbukit</b> [<i>Percentage hilly</i>]</td>
        <td width="220"><input type="text" name="txtKawBukit" class="textbox" value="<? echo "60"; ?>"/>
          %</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top"><b>1.7</b></td>
    <td colspan="2"><table class="subTable">
      <tr>
        <td colspan="2"><b>Peratus kecerunan melebihi 25 darjah</b></td>
      </tr>
      <tr>
        <td width="398">[<i>Percent of area with gradient greater than 25 degree</i>]</td>
        <td width="220"><input type="text" name="txtKawCerun"  class="textbox" value="<? echo "60"; ?>"/>
          % </td>
      </tr>
      <tr>
        <td colspan="2"><a href="../print/form.php">Cetak</a></td>
        </tr>
    </table></td>
  </tr>
</table>
</form>