
<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=po3year&po2=<? echo $_GET['po2'];?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3'];?>&po4=false&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>';	
				ok=confirm("Data tidak lengkap.Sila penuhkan ruang kosong. Teruskan?");
				if(ok)
				{
					return true;
				}	
				else
				{
				
				return false;
				}		
			}
	}

}
function changeStyle()
{
	if(document.getElementById("divtotal").style.visibility=='visible')
	{
		document.getElementById("divtotal").style.visibility='hidden';
		document.getElementById("set").style.left='1230px';
		document.getElementById("clickme").style.visibility='visible';
	}
	else
	{
		document.getElementById("divtotal").style.visibility='visible';
		document.getElementById("set").style.left='1020px';
		document.getElementById("clickme").style.visibility='visible';
	}
	
}
function kira(a,b,c,d,e)
{
	
	if(e=="")
	{
		document.getElementById(c).value="";
		document.getElementById(d).value="";
		
	
	}
	else
	{
		x=document.getElementById("keluasan").value;
		
		
		kosha=e/x;
		kosha=Math.round(kosha*100)/100
		document.getElementById(c).value=kosha;
		
		nilai_dahulu=1000;
		
		prcntg=((e-nilai_dahulu)/nilai_dahulu)*100;
		document.getElementById(d).value=prcntg+"%";
		
	}
}
function kiraTotal(x,b)
{
	number1=document.getElementById("total").value*1;
	number2=x*1;
	total=number1+number2;
	document.getElementById("total").value=total;
	document.getElementById("totalT").value=total;
	//***************
	
	kosha1=document.getElementById(b).value*1;
	kosha2=document.getElementById("total2").value*1;
	document.getElementById("total2").value=kosha1+kosha2;
	document.getElementById("totalT2").value=kosha1+kosha2;
	
}
</script>
<form id="form1" name="form1" method="post" action="home.php?id=po3year&po2=<? echo $_GET['po2'];?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3'];?>&po4=true&po5=<? echo $_GET['po5']; ?>po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">
<table class="tableCss" align="left">
  <tr>
    <td width="50"><b>2.2.</b></td>
    <td colspan="4"><b>TAHUN KEDUA&nbsp;(Ditanam pada tahun 2007)&nbsp;[<i>SECOND YEAR&nbsp;(Planted in 2007)</i>]</b></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.2.1.</b></td>
    <td colspan="4"><b>Jenis penanaman&nbsp;[<i>Type of planted</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td width="435">a.&nbsp;Penanaman Baru&nbsp;[<i>New Planting</i>]</td>
    <td colspan="3"><input type="radio" name="radioTanam"  value="Penanaman Baru [New Planting]"/></td>
  </tr>
  <tr>
    <td></td>
    <td>b.&nbsp;Penanaman Semula&nbsp;[<i>Replanting</i>]</td>
    <td colspan="3"><input name="radioTanam" type="radio" value="Penanaman Semula [Replanting]" checked/></td>
  </tr>
  <tr>
    <td><img src="../images/add_48.png" alt="" width="24" height="24" /></td>
    <td>c.&nbsp;Penukaran dari Tanaman Lain&nbsp;[<i>Conversion from others crops</i>]</td>
    <td colspan="3"><input type="radio" name="radioTanam" value="Penukaran dari Tanaman Lain [Conversion from others crops]"/></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.2.2.</b></td>
    <td colspan="4"><b>Keluasan Tanaman&nbsp;[<i>Total Planted Area</i>]</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="txtArea" id="keluasan" type="text" value="1660.32" />
      &nbsp;Hektar/[<i>Hectare</i>]</td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.2.3.</b></td>
    <td colspan="4"><b>Jumlah kos mengikut operasi&nbsp;[<i>Total cost according to operation</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4">Kos perlu diselaraskan mengikut tahun kewangan Januari--Disember 2008</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4">[<i>Cost must be adjusted to the January--Disember 2008 financial year</i>]</td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td align="right"><b>a.</b></td>
    <td><b><u>Penjagaan&nbsp;[<i>Upkeep</i>]</u></b></td>
    <td width="119"><b>Kos&nbsp;[<i>Cost</i>]&nbsp;RM</b></td>
    <td width="118"><b>Kos(RM)/Ha&nbsp;</b></td>
    <td width="357"><span class="hide"><b>Kos&nbsp;[<i>Cost</i>]&nbsp;(RM)</b></span></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4"><table width="80%" frame="box" class="subTable">
      <tr>
        <td width="17" align="center">1.</td>
        <td width="453">Meracun &nbsp;[<i>Weeding</i>]</td>
        <td width="144"><input name="txtCa13" type="text" onblur="kiraTotal(this.value,'txtCa25')" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15"/></td>
        <td width="144"><input name="txtCa25" type="text" id="txtCa25" value="0" size="10" /></td>
        <td width="144"><input name="txtCa1" type="text" id="txtCa1" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">2.</td>
        <td>Kawalan lalang &nbsp;[<i>Lalang control</i>]</td>
        <td><input name="txtCa14" type="text" onblur="kiraTotal(this.value,'txtCa26')" onkeyup="kira('31','32','txtCa26','txtCa2',this.value)" value="0" size="15"/></td>
        <td><input name="txtCa26" type="text" id="txtCa26" value="0" size="10" /></td>
        <td><input name="txtCa2" type="text" id="txtCa2" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">3.</td>
        <td>Perparitan &nbsp;[<i>Drainage</i>]</td>
        <td><input name="txtCa15" type="text" onblur="kiraTotal(this.value,'txtCa27')" onkeyup="kira('31','32','txtCa27','txtCa3',this.value)" value="0" size="15"/></td>
        <td><input name="txtCa27" type="text" id="txtCa27" value="0" size="10" /></td>
        <td><input name="txtCa3" type="text" id="txtCa3" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">4.</td>
        <td>Jalan, jambatan, lorong, dsb &nbsp;[<i>Roads,bridges,paths,etc</i>]</td>
        <td><input name="txtCa16" type="text" onblur="kiraTotal(this.value,'txtCa28')" onkeyup="kira('31','32','txtCa28','txtCa4',this.value)" value="0" size="15"/></td>
        <td><input name="txtCa28" type="text" id="txtCa28" value="0" size="10" /></td>
        <td><input name="txtCa4" type="text" id="txtCa4" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">5.</td>
        <td>Pemuliharan tanah/air&nbsp;[<i>Soil/water conservation</i>]</td>
        <td><input name="txtCa17" type="text" value="0" size="15" /></td>
        <td><input name="txtCa29" type="text" value="0" size="10" /></td>
        <td><input name="txtCa5" type="text" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">6.</td>
        <td>Persempadan/survei &nbsp;[<i>Boundary/survey</i>]</td>
        <td><input name="txtCa18" type="text" value="0" size="15" /></td>
        <td><input name="txtCa30" type="text" value="0" size="10" /></td>
        <td><input name="txtCa6" type="text" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">7.</td>
        <td>Tanah penutup bumi&nbsp;[<i>Cover crops</i>]</td>
        <td><input name="txtCa19" type="text" value="0" size="15" /></td>
        <td><input name="txtCa31" type="text" value="0" size="10" /></td>
        <td><input name="txtCa7" type="text" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">8.</td>
        <td>Banci/sulaman&nbsp;[<i>Census/supplies</i>]</td>
        <td><input name="txtCa20" type="text" value="0" size="15" /></td>
        <td><input name="txtCa32" type="text" value="0" size="10" /></td>
        <td><input name="txtCa8" type="text" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">9.</td>
        <td>Memangkas&nbsp;[<i>Pruning</i>]</td>
        <td><input name="txtCa21" type="text" value="0" size="15" /></td>
        <td><input name="txtCa33" type="text" value="0" size="10" /></td>
        <td><input name="txtCa9" type="text" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">10.</td>
        <td>Kawalan serangga dan penyakit&nbsp;[<i>Pests & diseases control</i>]</td>
        <td><input name="txtCa22" type="text" value="0" size="15" /></td>
        <td><input name="txtCa34" type="text" value="0" size="10" /></td>
        <td><input name="txtCa10" type="text" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">11.</td>
        <td>Pengkasian&nbsp;[<i>Castration</i>]</td>
        <td><input name="txtCa23" type="text" value="0" size="15" /></td>
        <td><input name="txtCa35" type="text" value="0" size="10" /></td>
        <td><input name="txtCa11" type="text" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">12.</td>
        <td>Perbelanjaan-perbelanjaan lain &nbsp;[<i>Other expenditure</i>]</td>
        <td><input name="txtCa24" type="text" value="0" size="15" /></td>
        <td><input name="txtCa36" type="text" value="0" size="10" /></td>
        <td><input name="txtCa12" type="text" value="0" size="10" /></td>
      </tr>
      <tr>
        <td colspan="2" align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="right"><strong>Jumlah</strong></td>
        <td><input name="totalT" id="totalT" type="text" class="textBox" value="0" size="15" /></td>
        <td><input name="totalT2" type="text" class="textBox" id="totalT2" value="0" size="10" /></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td align="right"><b>b.</b></td>
    <td colspan="4"><b><u>Pembajaan&nbsp;[<i>Fertilizer Application</i>]</u></b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4"><table width="80%" frame="box" class="subTable">
      <tr>
        <td width="12" align="right">1.</td>
        <td width="385">Pembellian baja&nbsp;[<i>Purchase of fertiliser</i>]</td>
        <td width="253"><input name="txtCb1" type="text" value="0" /></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Upah Membaja&nbsp;[<i>Labour cost to apply fertilizers</i>]</td>
        <td><input name="txtCb2" type="text" value="0" /></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Analisis tanah dan daun&nbsp;[<i>Soil and foliar analysis</i>]</td>
        <td><input name="txtCb3" type="text" value="0" /></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Kuantiti baja&nbsp;[<i>Quantity of fertilizer</i>]</td>
        <td><input name="txtCb4" type="text" value="0" />
          &nbsp;Tan&nbsp;[<i>Tonnes</i>]</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4">
    <input type="hidden" name="totaltahun1" value="<? echo $_POST['totalT']; ?>" />
    <input type="hidden" name="totalKtahun1" value="<? echo $_POST['totalT2']; ?>"
    <input type="submit" name="button" id="button" value="Save" onclick="return checkProgress()" />
<input type="reset" name="button2" id="button2" value="Reset" />

            </td>
  </tr>
</table>
</form>
