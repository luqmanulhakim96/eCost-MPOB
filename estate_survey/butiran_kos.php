<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=home&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=false';		
			}
	}

}

</script>

 <form id="form1" name="form1" method="post" action="home.php?id=home&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=false'">
<table class="tableCss" align="left">
  
  <tr>
    <td width="52"><b>4.1.</b></td>
    <td colspan="2"><b>MAKLUMAT MENGENAI PERBELANJAAN AM&nbsp;[<i>General Expenses Information</i>]</b></td>
  </tr>
  
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td width="594"><b><u>Butiran-butiran kos&nbsp;[<i>Cost Items</i>]</u></b></td>
    <td width="231"><b>Kos&nbsp;[<i>Cost</i>]&nbsp;RM</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><table width="90%"  frame="box" class="subTable">
      <tr>
        <td width="25" align="center">1.</td>
        <td width="444">Kos Ibu Pejabat [<i>Cost allocated to headquaters</i>]</td>
        <td width="145"><input type="text" name="txtCa1" class="field_active" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">2.</td>
        <td>Kos agensi&nbsp;[<i>Agency Cost</i>]</td>
        <td><input type="text" name="txtCa2" class="field_active" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">3.</td>
        <td>Pengurusan estet, penyeliaan dan pentadbiran&nbsp;[<i>Estet management, supervision and administration</i>]</td>
        <td><input type="text" name="txtCa3" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">4.</td>
        <td>Kebajikan tidak dibayar terus kepada perkerja &nbsp;[<i>Labour welfare not paid directly to workers</i>]</td>
        <td><input type="text" name="txtCa4" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">5.</td>
        <td>Susutnilai [<em>Depreciation</em>]</td>
        <td><input type="text" name="txtCa5" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">6.</td>
        <td>Cukai&nbsp;[<i>Tax</i>]</td>
        <td><input type="text" name="txtCa6" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">7.</td>
        <td>Penyelidikan dan pembangunan[<i>Research and developmet</i>]</td>
        <td><input type="text" name="txtCa7" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">8.</td>
        <td>Cukai Keuntungan [<em>Windfall profit tax</em>]</td>
        <td><input type="text" name="txtCa8" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">9.</td>
        <td>Ses COSS [<em>Cess COSS</em>]</td>
        <td><input type="text" name="txtCa9" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">10.</td>
        <td>Lain-lain Kos&nbsp;[<i>Other Cost</i>]</td>
        <td><input type="text" name="txtCa10" class="field_active" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td>Jumlah <strong>[<em>Total</em>]</strong></td>
        <td>&nbsp;</td>
      </tr>
      
      
    </table></td>
  </tr>
  
    
      </tr>
    
  
  <tr>
    <td></td>
    <td colspan="2"><label></label><label></label>
     
        <label></label>
        <label>
        <input type="reset" name="button2" id="button2" value="   Cetak  " />
        </label>
      </td>
  </tr>
</table>
</form> 