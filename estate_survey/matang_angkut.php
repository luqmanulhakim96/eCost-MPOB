<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=po4_1&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=false&po8=<? echo $_GET['po8']; ?>';		
			}
	}

}

</script>

<form name="form1" id="form1" action="home.php?id=po4_1&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=true&po8=<? echo $_GET['po8']; ?>" method="post">

<table class="tableCss" align="left">
  
  <tr>
    <td width="52"><b>3.3.</b></td>
    <td width="825" colspan="2"><b>Jumlah kos mengikut operasi&nbsp;[<i>Total cost according to operation</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">Kos perlu diselaraskan mengikut tahun kewangan Januari--Disember 2008</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">[<i>Cost must be adjusted to the January--Disember 2008 financial year</i>]</td>
  </tr>
  
    <tr>
      <td align="right"><strong>d.</strong></td>
      <td colspan="2"><b><u>Pengangkutan BTS ke Kilang&nbsp;[<i>Transport of FFBs to Mil</i>]</u></b></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2"><table width="90%"  frame="box" class="subTable">
        <tr>
          <td width="25" align="center">1.</td>
          <td width="444">Pemunggahan BTS ke platform  [<i>Infield FFB evacuation to platform</i>]</td>
          <td width="145"><input type="text" name="txtCa13" onKeypress="keypress(event)" /></td>
        </tr>
        <tr>
          <td align="center" valign="top">2.</td>
          <td>Pengankutan BTS dari platform ke pusat pengumpulan atau ke kilang &nbsp;[<i>Meanline transportation cost from platform to loading centre or mill</i>]</td>
          <td><input type="text" name="txtCa13" onKeypress="keypress(event)"/></td>
        </tr>
        <tr>
          <td align="center" valign="top">3.</td>
          <td>Penjagaan traktor &amp; treler, lori, keretapi, pengankutan sungai, dsb&nbsp;[<i>Upkeep of tractor &amp; trailer, lorry, railway, river transport, etc</i>]</td>
          <td><input type="text" name="txtCa13" onKeypress="keypress(event)" /></td>
        </tr>
        <tr>
          <td align="center">4.</td>
          <td>Perbelanjaan pelbagai &nbsp;[<i>Other expenditures</i>]</td>
          <td><input type="text" name="txtCa13" onKeypress="keypress(event)" /></td>
        </tr>
      </table></td>
    </tr>
  <tr>
    <td></td>
    <td colspan="2"><label></label>
      <label>
      <input type="reset" name="button2" id="button2" value="   Cetak  ">
    </label></td>
  </tr>
</table>
</table>

</form>