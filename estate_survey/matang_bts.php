<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=po3_2&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=false&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>';		
			}
	}

}

</script>

<form name="form1" id="form1" method="post" action="home.php?id=po3_2&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=true&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">

<table class="tableCss" align="left">
  <tr>
    <td width="52"><b>3.</b></td>
    <td width="825" colspan="2"><b>Ditanam pada dan sebelum tahun 2005&nbsp;[<i>Planted 2005 and before</i>]</b></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  
  <tr>
    <td><b>3.1</b></td>
    <td colspan="2"><b>Keluasan keluasan kawasan matang [<i>Total Mature Area</i>]</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="txtArea" onKeypress="keypress(event)" />
      &nbsp;Hektar [<i>Hectare</i>]</td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>3.2</b></td>
    <td colspan="2"><b>Maklumat penghasilan BTS [<em>Information on FFB Yield</em>]</b></td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  
  <tr>
    <td></td>
    <td colspan="2"><table width="80%"  frame="box" class="subTable">
      <tr>
        <td align="center">Bulan [<em>Month</em>]</td>
        <td width="198">Kawasan dituai <br />
          [<em>Harvesting area</em>]</td>
        <td>Pengeluaran BTS (tan) <br />
          [<em>FFB production (tonnes)</em>]</td>
        <td width="206">Purata hasil (tan per hektar) <br />
          [<em>Average yield (tonnes per hectare)</em>]</td>
      </tr>
      <tr>
        <td width="137" align="center"><div align="right">Januari [<em>January</em>]</div></td>
        <td><input type="text" name="txtCa13" onKeypress="keypress(event)" /></td>
        <td width="183"><input type="text" name="txtCa1" /></td>
        <td><input type="text" name="txtCa25" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Februari [<em>February</em>]</div></td>
        <td><input type="text" name="txtCa14" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa2" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa26" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Mac [<em>March</em>]</div></td>
        <td><input type="text" name="txtCa15" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa3" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa27" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">April [<em>April</em>]</div></td>
        <td><input type="text" name="txtCa16" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa4" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa28" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Mei [<em>May</em>]</div></td>
        <td><input type="text" name="txtCa17" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa5" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa29" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Jun [<em>June</em>]</div></td>
        <td><input type="text" name="txtCa18" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa6" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa30" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Julai [<em>July</em>]</div></td>
        <td><input type="text" name="txtCa19" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa7" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa31" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Ogos [<em>August</em>]</div></td>
        <td><input type="text" name="txtCa20" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa8" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa32" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">September [<em>September</em>]</div></td>
        <td><input type="text" name="txtCa21" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa9" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa33" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Oktober [<em>October</em>]</div></td>
        <td><input type="text" name="txtCa22" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa10" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa34" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">November [<em>November</em>]</div></td>
        <td><input type="text" name="txtCa23" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa11" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa35" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center"><div align="right">Disember [<em>December</em>]</div></td>
        <td><input type="text" name="txtCa24" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa12" onKeypress="keypress(event)" /></td>
        <td><input type="text" name="txtCa36" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><div align="right">Jumlah* [<em>Total*</em>]</div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td valign="top">3.2.1</td>
    <td colspan="2">Sila semak keluasan kawasan dituai dan pengeluaran BTS sekiranya junlah purata hasil BTS estet tuan tidak berada di antara 5 hingga 45 tan sehektar setahun, sila nyatakan sebab-sebabnya. [<em>Please double check your area and FFB production if total of average yield FFB(/hectare/year) for your estate is not in range of 5 to 45 tonne per hectare per year, please state your reason</em>]</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><table width="80%" frame="box" class="subTable">
      <tr>
        <td colspan="3">Sebab [<em>Reason</em>]<br />
          <label>
          <textarea name="textarea" id="textarea" cols="80" rows="8"></textarea>
          </label></td>
        </tr>
      
    </table></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><label></label>
      <label>
      <input type="reset" name="button2" id="button2" value="  Cetak  ">
    </label></td>
  </tr>
</table>
</form>