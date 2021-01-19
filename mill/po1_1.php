<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=po1_2&pekerja=true&pol=false&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>';		
			}
	}
}

function check() {
	percent1 = document.getElementById("percent1").value*1;
	if((percent1 > 100)||(percent1 < 0)) {
		alert("Please insert valid value.");
		//document.getElementById("percent1").focus();
		return false;
	}
	percent2 = document.getElementById("percent2").value*1;
	if((percent2 > 100)||(percent2 < 0)) {
		alert("Please insert valid value.");
		//document.getElementById("percent2").focus();
		return false;
	}
}

function checkout() {
	percent1 = document.getElementById("percent1").value*1;
	if(percent1 > 100) {
		alert("Invalid input!");
		document.getElementById("percent1").focus();
		return false;
	}
	
	percent2 = document.getElementById("percent2").value*1;
	if(percent2 > 100) {
		alert("Invalid input!");
		document.getElementById("percent2").focus();
		return false;
	}
}

</script>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
	font-size: 14px;
}
-->
</style>

<form id="form1" name="form1" method="post" action="home.php?id=po1_2&pekerja=true&pol=true&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">
<table class="tableCss" >
  <tr>
    <td colspan="3"><span class="style1">Kos Adalah Bagi Januari - Disember 2008</span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="38"><b>1.1</b></td>
    <td colspan="2"><b>Jenis Syarikat</b></td>
  </tr>
  <?php
  	if(!isset($_GET['print'])) {
  ?>
  <tr>
    <td></td>
    <td width="601">Syarikat Perseorangan</td>
    <td width="31"><input type="radio" name="radioSykt" value="Syarikat perseorangan[Sole Proprietorship]" checked="checked"  /></td>
  </tr>
  <tr>
    <td></td>
    <td>Syarikat Berhad</td>
    <td><input type="radio" name="radioSykt" value="Syarikat Berhad[Public Limited Company]" checked="checked" /></td>
  </tr>
  <tr>
    <td></td>
    <td>Syarikat Sendirian Berhad</td>
    <td><input type="radio" name="radioSykt"  value="Syarikat Sendirian Berhad[Private Limited Company]"  checked="checked"/></td>
  </tr>
  <tr>
    <td></td>
    <td>Syarikat Perkongsian</td>
    <td><input type="radio" name="radioSykt"  value="Syarikat perkongsian[Partnership]"  checked="checked"/></td>
  </tr>
  <tr>
    <td></td>
    <td>Koperasi</td>
    <td><input type="radio" name="radioSykt" value="Koperasi[Coorperatives]" checked="checked" /></td>
  </tr>
  <?php
  	}
  ?>
  <tr>
    <td></td>
    <td>Agensi Kerajaan</td>
    <td><input type="radio" name="radioSykt"  value="Agensi Kerajaan[Public Agency]"  checked="checked"/></td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.2</b></td>
    <td colspan="2"><strong>Keahlian dalam persatuan</b></strong></td>
  </tr>
    <?php
  	if(!isset($_GET['print'])) {
  ?>
  <tr>
    <td></td>
    <td>Persatuan Pengeluar Pertanian Malaysia</td>
    <td><input type="radio" name="radioAhli" value="Persatuan Pengeluar Pertanian Malaysia[Malaysian Agriculture Producers Association(MARA)]"  
			checked="checked"/></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td></td>
    <td>Persatuan Pengeluar Malaysia Timur</td>
    <td><input type="radio" name="radioAhli"  value="Persatuan Pengeluar Malaysia Timur[East Malaysian Producers Assorciation(EMPA)]" checked="checked" />    </td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.3</b></td>
    <td colspan="2"><strong>Integrasi dengan kilang buah sawit</strong></td>
  </tr>
  <tr>
    <?php
  	if(!isset($_GET['print'])) {
  ?>
    <td></td>
    <td>Ya</td>
    <td><input type="radio" name="radioIntegrasi"  value="Ya[Yes]"  checked="checked"/></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td></td>
    <td>Tidak</td>
    <td><input type="radio" name="radioIntegrasi"  value="Tidak[No]"  checked="checked"/></td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.4</b></td>
    <td colspan="2"> <strong>Lokasi estet</b></strong></td>
  </tr>
    <?php
  	if(!isset($_GET['print'])) {
  ?>
  <tr>
    <td></td>
    <td>Kawasan landai</td>
    <td><input type="radio" name="radioLokasi" value="Kawasan pantai[Flat]" checked="checked" /></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td></td>
    <td>Kawasan pedalaman</td>
    <td><input type="radio" name="radioLokasi" value="Kawasan pedalaman[Inland]" checked="checked" /></td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.5</b></td>
    <td colspan="2"><strong>Bentuk mukabumi estet</b></strong></td>
  </tr>
    <?php
  	if(!isset($_GET['print'])) {
  ?>
  <tr>
    <td></td>
    <td>Rata / Landai</td>
    <td><input type="radio" name="radioBtkMukaBumi"  value="Rantai/lantai[Flat]"  checked="checked"/></td>
  </tr>
  <tr>
    <td></td>
    <td>Beralun</td>
    <td><input type="radio" name="radioBtkMukaBumi"  value="Beralun[Undulating]" checked="checked" /></td>
  </tr>
    <?php
}
  ?>
  <tr>
    <td></td>
    <td>Berbukit</td>
    <td><input type="radio" name="radioBtkMukaBumi"   value="Berbukit[Hilly]"  checked="checked"/></td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.6</b></td>
    <td colspan="2"><table class="subTable">
      <tr>
        <td width="398"><b>Peratus kawasan berbukit</b></td>
        <td width="220"><input id="percent1" type="text" name="txtKawBukit" class="textbox" disabled="disabled" value="<? echo "60"; ?>"/>
          %</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top"><b>1.7</b></td>
    <td colspan="2"><table class="subTable">
      <tr>
        <td width="398"><b>Peratus kecerunan melebihi 25 darjah</b></td>
        <td width="220"><input id="percent2" type="text" name="txtKawCerun" disabled="disabled" class="textbox" value="<? echo "60"; ?>"/>
% </td>
      </tr>
      
      <tr>
        <td colspan="2">
          <br>
          <?php
		  	if(isset($_GET['print'])) {
		  ?>
          <input type="reset" value="Print" onclick="window.location = 'http://<?= $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/printout.php?borang=po1_1" ?>';" />
          <?php
		   }
		   else {
		  ?>
          	<input type="reset" name="button3" id="button3" value="Simpan &amp; Keluar" onclick="window.location = 'http://<?= $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../" ?>';" />
            <input type="submit" name="button" id="button" value="Simpan" onclick="return check()" />
            <input type="reset" name="button2" id="button2" value="Batal" />

            <?php
			}
			?>                                        </td>
        </tr>
    </table></td>
  </tr>
</table>
</form> 