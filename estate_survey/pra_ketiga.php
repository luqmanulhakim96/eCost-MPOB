<!-- DONE 29/06/2010 -->
<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=po3_1&po2=<? echo $_GET['po2'];?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=false&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>';		
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
	z=<? echo $_POST['totalT']; ?>*1;
	zz=<? echo $_POST['totaltahun1']; ?>*1;
	z=z*1;
	zz=zz*1;
	document.getElementById("totalTT").value=total+z+zz;
	//***************
	
	kosha1=document.getElementById(b).value*1;
	kosha2=document.getElementById("total2").value*1;
	document.getElementById("total2").value=kosha1+kosha2;
	document.getElementById("totalT2").value=kosha1+kosha2;
	z=<? echo $_POST['totalT2']; ?>*1;
	zz=<? echo $_POST['totalKtahun1']; ?>*1;
	z=z*1;
	zz=zz*1;
	document.getElementById("totalTT2").value=kosha1+kosha2+z+zz ;
	
}
</script>
<form method="post" id="form1" name="form1" action="home.php?id=po3_1&po2=<? echo $_GET['po2'];?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=false&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">
<table class="tableCss" align="left">
  <tr>
    <td width="52"><b>2.3.</b></td>
    <td colspan="4"><b>TAHUN KETIGA&nbsp;(Ditanam pada tahun 2006)&nbsp;[<i>Third YEAR&nbsp;(Planted in 2006)</i>]</b></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.3.1.</b></td>
    <td colspan="4"><b>Jenis penanaman&nbsp;[<i>Type of planted</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td width="436">a.&nbsp;Penanaman Baru&nbsp;[<i>New Planting</i>]</td>
    <td colspan="3"><input type="radio" name="radioTanam" value="Penanaman Baru [New Planting]"/></td>
  </tr>
  <tr>
    <td></td>
    <td>b.&nbsp;Penanaman Semula&nbsp;[<i>Replanting</i>]</td>
    <td colspan="3"><input type="radio" name="radioTanam" value="Penanaman Semula [Replanting]"/></td>
  </tr>
  <tr>
    <td></td>
    <td>c.&nbsp;Penukaran dari Tanaman Lain&nbsp;[<i>Conversion from others crops</i>]</td>
    <td colspan="3"><input name="radioTanam" type="radio" value="Penukaran dari Tanaman Lain [Conversion from others crops]" checked/></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.3.2.</b></td>
    <td colspan="4"><b>Keluasan Tanaman&nbsp;[<i>Total Planted Area</i>]</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="txtArea" id="keluasan" type="text" value="1660.32" onKeypress="keypress(event)" />
      &nbsp;Hektar/[<i>Hectare</i>]</td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.3.3.</b></td>
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
    <td width="136"><b>Kos&nbsp;[<i>Cost</i>]&nbsp;RM</b></td>
    <td width="131"><b>Kos(RM)/Ha&nbsp;</b></td>
    <td width="346"><b>Kos&nbsp;[<i>Cost</i>]&nbsp;(RM)</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4"><table width="80%"  frame="box" class="subTable">
      <tr>
        <td width="25" align="center">1.</td>
        <td width="444">Meracun &nbsp;[<i>Weeding</i>]</td>
        <td width="145"><input name="txtCa13" type="text" onblur="kiraTotal(this.value,'txtCa25')" onkeyup="kira('31','32','txtCa25','txtCa',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td width="145"><input name="txtCa25" type="text" id="txtCa25" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td width="145"><input name="txtCa" type="text" id="txtCa" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">2.</td>
        <td>Kawalan lalang &nbsp;[<i>Lalang control</i>]</td>
        <td><input name="txtCa14" type="text" onblur="kiraTotal(this.value,'txtCa26')" onkeyup="kira('31','32','txtCa26','txtCa2',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa26" type="text" id="txtCa26" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa2" type="text" id="txtCa2" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">3.</td>
        <td>Perparitan &nbsp;[<i>Drainage</i>]</td>
        <td><input name="txtCa15" type="text" onblur="kiraTotal(this.value,'txtCa27')" onkeyup="kira('31','32','txtCa27','txtCa3',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa27" type="text" id="txtCa27" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa3" type="text" id="txtCa3" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">4.</td>
        <td>Jalan, jambatan, lorong, dsb &nbsp;[<i>Roads,bridges,paths,etc</i>]</td>
        <td><input name="txtCa16" type="text" onblur="kiraTotal(this.value,'txtCa28')" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa28" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa4" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">5.</td>
        <td>Pemuliharan tanah/air&nbsp;[<i>Soil/water conservation</i>]</td>
        <td><input name="txtCa17" type="text" onblur="kiraTotal(this.value,'txtCa29')" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15" onKeypress="keypress(event)"/>        </td>
        <td><input name="txtCa29" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa5" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">6.</td>
        <td>Persempadan/survei &nbsp;[<i>Boundary/survey</i>]</td>
        <td><input name="txtCa18" type="text" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa30" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa6" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">7.</td>
        <td>Tanah penutup bumi&nbsp;[<i>Cover crops</i>]</td>
        <td><input name="txtCa19" type="text" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa31" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa7" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">8.</td>
        <td>Banci/sulaman&nbsp;[<i>Census/supplies</i>]</td>
        <td><input name="txtCa20" type="text" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa32" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa8" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">9.</td>
        <td>Memangkas&nbsp;[<i>Pruning</i>]</td>
        <td><input name="txtCa21" type="text" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa33" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa9" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">10.</td>
        <td>Kawalan serangga dan penyakit&nbsp;[<i>Pests & diseases control</i>]</td>
        <td><input name="txtCa22" type="text" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa34" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa10" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">11.</td>
        <td>Pengkasian&nbsp;[<i>Castration</i>]</td>
        <td><input name="txtCa23" type="text" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa35" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa11" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="center">12.</td>
        <td>Perbelanjaan-perbelanjaan lain &nbsp;[<i>Other expenditure</i>]</td>
        <td><input name="txtCa24" type="text" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa36" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa12" type="text" value="0" size="10" onKeypress="keypress(event)"/></td>
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
      <tr>
        <td colspan="2" align="right"><strong>Jumlah Tahun 1,Tahun 2,Tahun 3</strong></td>
        <td><input name="totalTT" id="totalTT" type="text" class="textBox" value="0" size="15" /></td>
        <td><input name="totalTT2" type="text" class="textBox" id="totalTT2" value="0" size="10" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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
        <td width="23" align="right">1.</td>
        <td width="379">Pembellian baja&nbsp;[<i>Purchase of fertiliser</i>]</td>
        <td width="247"><input name="txtCb1" type="text" value="0" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Upah Membaja&nbsp;[<i>Labour cost to apply fertilizers</i>]</td>
        <td><input name="txtCb2" type="text" value="0" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Analisis tanah dan daun&nbsp;[<i>Soil and foliar analysis</i>]</td>
        <td><input name="txtCb3" type="text" value="0" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Kuantiti baja&nbsp;[<i>Quantity of fertilizer</i>]</td>
        <td><input name="txtCb4" type="text" value="0" onKeypress="keypress(event)"/>
          &nbsp;Tan&nbsp;[<i>Tonnes</i>]</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4"><label></label>
      <label>
      <input type="reset" name="button2" id="button2" value="   Cetak   " />
      </label></td>
  </tr>
</table>
</form>
<div id="set" onclick="changeStyle()" style="position:fixed;left:1020px; top:520px;border-style: solid solid solid solid; border-color: -moz-use-text-color rgb(0, 0, 0) rgb(0, 0, 0) -moz-use-text-color; border-width: 2px 2px 2px 2px; padding: 10px; background-color:#99FF99; text-align: center;">
  <div align="left"><img src="../images/001_23.gif" alt="" width="16" height="16" style="cursor:pointer" /> </div>
  <div id="divtotal" style="visibility:visible">
    <table width="14%" border="0" align="center" cellpadding="4" cellspacing="0" >
      <tr>
        <td><div align="center"> Jumlah
          <input name="total" type="text" id="total" size="10" size="10"/>
        </div></td>
        <td><div align="center"><b>Kos(RM)/Ha&nbsp;</b>
                <input name="total2" type="text" id="total2" size="10" size="10"/>
        </div></td>
      </tr>
    </table>
  </div>
</div>
