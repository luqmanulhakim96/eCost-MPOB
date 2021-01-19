<script>
var check=0;
function checkProgress()
{
	for(i = 0; i<= document.form1.elements.length; i++)
	{
		if(document.form1.elements[i].value =="")
		{
			document.form1.action='home.php?id=po3_2&penjagaan=true&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=false&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>';		
			}
	}

}
</script>

<form name="form1" id="form1" method="post" action="home.php?id=po3_2&penjagaan=true&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=true&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">

<table class="tableCss" align="left">
  <tr>
    <td width="52"><b>3.</b></td>
    <td width="825" colspan="2"><b>Ditanam pada dan sebelum tahun 2005&nbsp; (<span class="style1">Data dari e-submission</span>)</b></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  
  <tr>
    <td><b>3.1</b></td>
    <td colspan="2"><b>Keluasan keluasan kawasan matang </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="txtArea" type="text" value="10292" onKeypress="keypress(event)" />
      &nbsp;Hektar </td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>3.2</b></td>
    <td colspan="2"><b>Maklumat penghasilan BTS </b></td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  
  <tr>
    <td></td>
    <td colspan="2"><table width="80%"  frame="box" class="subTable">
      <tr>
        <td align="center">Bulan </td>
        <td width="198">Kawasan dituai </td>
        <td>Pengeluaran BTS (tan) </td>
        <td width="206">Purata hasil (tan per hektar) </td>
      </tr>
      <tr>
        <td width="137" align="center"><div align="right">Januari </div></td>
        <td><input name="txtCa13" type="text" value="2345" onKeypress="keypress(event)" /></td>
        <td width="183"><input name="txtCa1" type="text" value="453" /></td>
        <td><input name="txtCa25" type="text" value="123" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Februari </div></td>
        <td><input name="txtCa14" type="text" value="754" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa2" type="text" value="234" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa26" type="text" value="123" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Mac</div></td>
        <td><input name="txtCa15" type="text" value="785" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa3" type="text" value="567" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa27" type="text" value="231" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">April </div></td>
        <td><input name="txtCa16" type="text" value="465" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa4" type="text" value="123" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa28" type="text" value="127" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Mei </div></td>
        <td><input name="txtCa17" type="text" value="896" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa5" type="text" value="768" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa29" type="text" value="126" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Jun </div></td>
        <td><input name="txtCa18" type="text" value="234" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa6" type="text" value="234" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa30" type="text" value="143" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Julai </div></td>
        <td><input name="txtCa19" type="text" value="876" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa7" type="text" value="324" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa31" type="text" value="156" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Ogos</div></td>
        <td><input name="txtCa20" type="text" value="324" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa8" type="text" value="567" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa32" type="text" value="187" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">September</div></td>
        <td><input name="txtCa21" type="text" value="789" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa9" type="text" value="234" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa33" type="text" value="187" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Oktober</div></td>
        <td><input name="txtCa22" type="text" value="345" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa10" type="text" value="456" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa34" type="text" value="126" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">November</div></td>
        <td><input name="txtCa23" type="text" value="656" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa11" type="text" value="123" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa35" type="text" value="187" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Disember</div></td>
        <td><input name="txtCa24" type="text" value="234" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa12" type="text" value="765" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa36" type="text" value="187" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><div align="right">Jumlah* </div></td>
        <td><input name="txtCa37" type="text" value="4857" onKeypress="keypress(event)" /></td>
        <td><input name="txtCa38" type="text" value="1532" onKeypress="keypress(event)" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td valign="top">3.2.1</td>
    <td colspan="2">Sila semak keluasan kawasan dituai dan pengeluaran BTS sekiranya junlah purata hasil BTS estet tuan tidak berada di antara 5 hingga 45 tan sehektar setahun, sila nyatakan sebab-sebabnya.</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><table width="80%" frame="box" class="subTable">
      <tr>
        <td colspan="3">Sebab<br />
          <label>
          <textarea name="textarea" id="textarea" cols="80" rows="8"></textarea>
          </label></td>
        </tr>
      
    </table></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">    <?php
		  	if(isset($_GET['print'])) {
		  ?>
          <input type="submit" value="Print" />
          <?php
		   }
		   else {
		  ?>
            <input type="reset" name="button3" id="button3" value="Simpan &amp; Keluar" onclick="window.location = 'http://<?= $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../" ?>';" />
            <input type="submit" name="button" id="button" value="Simpan" onclick="return check()" />
            <input type="reset" name="button2" id="button2" value="Batal" />
            <?php
			}
			?> </td>
  </tr>
</table>
</form>