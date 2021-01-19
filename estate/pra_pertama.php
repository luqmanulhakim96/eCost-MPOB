
<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=po2year&po2=<? echo $_GET['po2'];?>&pol=<? echo $_GET['pol']; ?>&po3=false&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>';
				
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

</script><form id="form1" name="form1" method="post" action="home.php?id=po2year&po2=<? echo $_GET['po2'];?>&pol=<? echo $_GET['pol']; ?>&po3=true&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">

<table align="left" class="tableCss">
  <tr>
    <td width="51"><b>2.1</b></td>
    <td colspan="4"><b>TAHUN PERTAMA(Ditanam pada tahun 2008)&nbsp;[FIRST YEAR (Planted in 2008)]</b></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.1.1</b></td>
    <td colspan="4"><b>Jenis penanaman&nbsp;[<i>type of planted</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td width="497">a.&nbsp;&nbsp;Penanaman Baru&nbsp;[<i>New Planting</i>]</td>
    <td colspan="3"><input name="radioTanam" type="radio" value="Penanaman Baru [New Planting]" checked/></td>
  </tr>
  <tr>
    <td></td>
    <td>b.&nbsp;&nbsp;Penanaman Semula&nbsp;[<i>Replanting</i>] </td>
    <td colspan="3"><input type="radio" name="radioTanam" value="Penanaman Semula [Replanting]"/></td>
  </tr>
  <tr>
    <td></td>
    <td>c.&nbsp;&nbsp;Penukaran dari Tanaman Lain &nbsp;[<i>Conversion from others crops</i>]</td>
    <td colspan="3"><input type="radio" name="radioTanam"  value="Penukaran dari Tanaman Lain [Conversion from others crops]"/></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.1.2</b></td>
    <td colspan="4"><b>Keluasan Tanaman&nbsp;[<i>Total Planted Area</i>]</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="txtArea" id="keluasan" type="text" value="1660.32" size="10" onKeypress="keypress(event)"/>
      &nbsp;Hektar&nbsp;[<i>Hectare</i>]</td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.1.3.</b></td>
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
    <td><b><u>Perbelanjaan Tidak Berulang / <i>Non-Recurrent Expenditures</i></u></b></td>
    <td width="140"><b>Kos&nbsp;[<i>Cost</i>]&nbsp;(RM)</b></td>
    <td width="141"><div id="1" class="hide"><b>Kos(RM)/Ha&nbsp;</b></div></td>
    <td width="168"><div id="2" class="hide"><b>Kos&nbsp;[<i>Cost</i>]&nbsp;(RM)</b></div></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4">
    <table width="98%" frame="box" class="subTable">
      <tr>
        <td width="27" align="right">1.</td>
        <td width="470">Menebang dan membersih kawasan&nbsp;[<i>Falling and land clearing</i>]</td>
        <td width="144"><input name="txtCa1" type="text" class="textBox" onblur="kiraTotal(this.value,'txtCa11')" onkeyup="kira('31','32','txtCa11','txtCa12',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td width="144"><div id="31" class="hide">
          
            <div align="left">
              <input name="txtCa19" type="text" class="textBox" id="txtCa11" value="0" size="10" onKeypress="keypress(event)"/>
              </div>
        </div></td>
        <td width="144"><div id="32" class="hide">
          
            <div align="left">
              <input name="txtCa19" type="text" class="textBox" id="txtCa12" value="0" size="10" onKeypress="keypress(event)"/>
              </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Membuat teres dan landasan&nbsp;[<i>Terracing and platform</i>]</td>
        <td><input name="txtCa3" type="text" class="textBox" onblur="kiraTotal(this.value,'txtCa')" onkeyup="kira('31','32','txtCa','txtCa24',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><div id="41" class="hide">
          
            <div align="left">
              <input name="txtCa20" type="text" class="textBox" id="txtCa" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
        <td><div id="42" class="hide">
          
            <div align="left">
              <input name="txtCa53" type="text" class="textBox" id="txtCa24" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Pembinaan Jalan&nbsp;[<i>Road constuction</i>]</td>
        <td><input name="txtCa11" type="text" class="textBox" onblur="kiraTotal(this.value,'txtCa2')" onkeyup="kira('31','32','txtCa2','txtCa25',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><div id="51" class="hide">
          
            <div align="left">
              <input name="txtCa33" type="text" class="textBox" id="txtCa2" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
        <td><div id="52" class="hide">
          
            <div align="left">
              <input name="txtCa21" type="text" class="textBox" id="txtCa25" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Pembinaan parit&nbsp;[<i>Drain constuction</i>]</td>
        <td><input name="txtCa12" type="text" class="textBox" onblur="kiraTotal(this.value,'txtCa3')" onkeyup="kira('31','32','txtCa3','txtCa26',this.value)" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><div id="61" class="hide">
          
            <div align="left">
              <input name="txtCa34" type="text" class="textBox" id="txtCa3" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
        <td><div id="62" class="hide">
          
            <div align="left">
              <input name="txtCa22" type="text" class="textBox" id="txtCa26" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">5.</td>
        <td>Membaris&nbsp;[<i>Lining</i>]</td>
        <td><input name="txtCa13" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><div id="71" class="hide">
          
            <div align="left">
              <input name="txtCa35" type="text" class="textBox" id="txtCa4" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
        <td><div id="72" class="hide">
          
            <div align="left">
              <input name="txtCa23" type="text" class="textBox" id="txtCa27" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">6.</td>
        <td>Melubang dan menanam&nbsp;[<i>Holing and planting</i>]</td>
        <td><input name="txtCa14" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><div id="81" class="hide">
          
            <div align="left">
              <input name="txtCa36" type="text" class="textBox" id="txtCa5" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
        <td><div id="82" class="hide">
          
            <div align="left">
              <input name="txtCa24" type="text" class="textBox" id="txtCa28" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">7.</td>
        <td>Pembajaan awal&nbsp;[<i>Basal fertiliser</i>]</td>
        <td><input name="txtCa15" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><div id="91" class="hide">
          
            <div align="left">
              <input name="txtCa37" type="text" class="textBox" id="txtCa6" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
        <td><div id="92" class="hide">
          
            <div align="left">
              <input name="txtCa25" type="text" class="textBox" id="txtCa29" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">8.</td>
        <td>Bahan tanaman&nbsp;[<i>Planting material</i>]</td>
        <td><input name="txtCa16" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><div id="101" class="hide">
          
            <div align="left">
              <input name="txtCa38" type="text" class="textBox" id="txtCa7" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
        <td><div id="102" class="hide">
          
            <div align="left">
              <input name="txtCa26" type="text" class="textBox" id="txtCa30" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">9.</td>
        <td>Tanaman penutup bumi&nbsp;[<i>Cover crops</i>]</td>
        <td><input name="txtCa17" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><div id="111" class="hide">
          
            <div align="left">
              <input name="txtCa39" type="text" class="textBox" id="txtCa8" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
        <td><div id="112" class="hide">
          
            <div align="left">
              <input name="txtCa27" type="text" class="textBox" id="txtCa31" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">10.</td>
        <td>Perbelanjaan-perbelanjaan lain&nbsp;[<i>Other expenditures</i>]</td>
        <td><input name="txtCa18" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><div id="121" class="hide">
          
            <div align="left">
              <input name="txtCa40" type="text" class="textBox" id="txtCa9" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
        <td><div id="122" class="hide">
          
            <div align="left">
              <input name="txtCa28" type="text" class="textBox" id="txtCa32" value="0" size="10" onKeypress="keypress(event)"/>
            </div>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="8px"></td>
  </tr>
  <tr>
    <td align="right"><b>b.</b></td>
    <td  colspan="4"><b><u>Penjagan&nbsp;[<i>Upkeep</i>]</u></b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4"><table width="99%" frame="box" class="subTable">
      <tr>
        <td width="23" align="right">1.</td>
        <td width="470">Meracun &nbsp;[<i>Weeding</i>]</td>
        <td width="147"><input name="txtCa2" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)" /></td>
        <td width="147"><input name="txtCa41" type="text" class="textBox" id="txtCa10" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td width="147"><input name="txtCa54" type="text" class="textBox" id="txtCa33" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Kawalan lalang &nbsp;[<i>Lalang control</i>]</td>
        <td><input name="txtCa4" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa42" type="text" class="textBox" id="txtCa13" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa55" type="text" class="textBox" id="txtCa34" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Perparitan &nbsp;[<i>Drainage</i>]</td>
        <td><input name="txtCa5" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa43" type="text" class="textBox" id="txtCa14" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa56" type="text" class="textBox" id="txtCa35" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Jalan, jambatan, lorong, dsb &nbsp;[<i>Roads,bridges,paths,etc</i>]</td>
        <td><input name="txtCa6" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa44" type="text" class="textBox" id="txtCa15" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa57" type="text" class="textBox" id="txtCa36" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">5.</td>
        <td>Pemuliharan tanah/air&nbsp;[<i>Soil/water conservation</i>]</td>
        <td><input name="txtCa7" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa45" type="text" class="textBox" id="txtCa16" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa58" type="text" class="textBox" id="txtCa37" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">6.</td>
        <td>Persempadan/survei &nbsp;[<i>Boundary/survey</i>]</td>
        <td><input name="txtCa8" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa46" type="text" class="textBox" id="txtCa17" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa59" type="text" class="textBox" id="txtCa38" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">7.</td>
        <td>Tanah penutup bumi&nbsp;[<i>Cover crops</i>]</td>
        <td><input name="txtCa9" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa47" type="text" class="textBox" id="txtCa18" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa60" type="text" class="textBox" id="txtCa39" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">8.</td>
        <td>Banci/sulaman&nbsp;[<i>Census/supplies</i>]</td>
        <td><input name="txtCa10" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa48" type="text" class="textBox" id="txtCa19" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa61" type="text" class="textBox" id="txtCa40" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">9.</td>
        <td>Memangkas&nbsp;[<i>Pruning</i>]</td>
        <td><input name="txtCa29" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa49" type="text" class="textBox" id="txtCa20" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa62" type="text" class="textBox" id="txtCa41" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">10.</td>
        <td>Kawalan serangga dan penyakit&nbsp;[<i>Pests &amp; diseases control</i>]</td>
        <td><input name="txtCa30" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa50" type="text" class="textBox" id="txtCa21" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa63" type="text" class="textBox" id="txtCa42" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">11.</td>
        <td>Pengkasian&nbsp;[<i>Castration</i>]</td>
        <td><input name="txtCa31" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa51" type="text" class="textBox" id="txtCa22" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa64" type="text" class="textBox" id="txtCa43" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">12.</td>
        <td>Perbelanjaan-perbelanjaan lain &nbsp;[<i>Other expenditure</i>]</td>
        <td><input name="txtCa32" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa52" type="text" class="textBox" id="txtCa23" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td><input name="txtCa65" type="text" class="textBox" id="txtCa44" value="0" size="10" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td colspan="2" align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="right"><strong>Jumlah</strong></td>
        <td><input name="totalT" id="totalT" type="text" class="textBox" value="0" size="15" onKeypress="keypress(event)"/></td>
        <td><input name="totalT2" type="text" class="textBox" id="totalT2" value="0" size="10" onKeypress="keypress(event)"/></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="8px"></td>
  </tr>
  <tr>
    <td align="right"><b>c.</b></td>
    <td colspan="4"><b>Pembajaan&nbsp;[<i>Fertilizer Application</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4"><table width="80%" frame="box" class="subTable">
      <tr>
        <td width="21" align="right">1.</td>
        <td width="448">Pembellian baja&nbsp;[<i>Purchase of fertiliser</i>]</td>
        <td width="305"><input name="txtCc1" type="text"  class="textBox" value="0" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Upah Membaja&nbsp;[<i>Labour cost to apply fertilizers</i>]</td>
        <td><input name="txtCc2" type="text" class="textBox" value="0" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Analisis tanah dan daun&nbsp;[<i>Soil and foliar analysis</i>]</td>
        <td><input name="txtCc3" type="text" class="textBox" value="0" onKeypress="keypress(event)"/></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Kuantiti baja&nbsp;[<i>Quantity of fertilizer</i>]</td>
        <td><input name="txtCc4" type="text" class="textBox" value="0" onKeypress="keypress(event)"/>
          &nbsp;Tan&nbsp;[<i>Tonnes</i>]</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4"><label></label>
      <label>
      <input type="reset" name="button2" id="button2" value="   Cetak   " />
      </label>           </td>
  </tr>
</table>


</form> 
<div id="set" onclick="changeStyle()" style="position:fixed;left:1020px; top:520px;border-style: solid solid solid solid; border-color: -moz-use-text-color rgb(0, 0, 0) rgb(0, 0, 0) -moz-use-text-color; border-width: 2px 2px 2px 2px; padding: 10px; background-color:#99FF99; text-align: center;">
  
  <div align="left"><img src="../images/001_23.gif" width="16" height="16" style="cursor:pointer" />
  </div>
  <div id="divtotal" style="visibility:visible">
    <table width="14%" border="0" align="center" cellpadding="4" cellspacing="0" >
    <tr>
      <td><div align="center"> Jumlah 
        <input name="total" type="text" id="total" size="10" sizr="10"/>
      </div></td>
      <td><div align="center"><b>Kos(RM)/Ha&nbsp;</b>
        <input name="total2" type="text" id="total2" size="10" sizr="10"/>
      </div></td>
    </tr>
  </table>
  </div>
</div>