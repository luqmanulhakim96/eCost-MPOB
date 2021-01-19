
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
		document.getElementById("set").style.left='-300px';
		document.getElementById("divtotal").style.visibility = 'hidden';
	}
	else
	{
		document.getElementById("set").style.left='0px';
		document.getElementById("divtotal").style.visibility = 'visible';
	}
	
}

//kira('31','32','txtCa11','txtCa12',this.value)
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
		
		z=document.getElementById("totalTan").value*1;
		z = z + document.getElementById(b).value*1;
		z = Math.round(z*100)/100;
		document.getElementById("totalTan").value = z;
		kosha=e/x;
		kosha=Math.round(kosha*100)/100
		document.getElementById(c).value=kosha;
		nilai_dahulu=1000;
		
		prcntg=((e-nilai_dahulu)/nilai_dahulu)*100;
		document.getElementById(d).value=prcntg+"%";
		document.getElementById(b).value=Math.round((e/4935)*100)/100;
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
	document.getElementById("totalU2").value=kosha1+kosha2;
	//document.getElementById("totalU").value=Math.round((total-kosha2-number1)*100)/100;
	n1 = document.getElementById("totalU").value*1;
	n1 = n1 + x*1;
	document.getElementById("totalU").value = n1/2;
}

</script><form id="form1" name="form1" method="post" action="home.php?id=po2year&po2=<? echo $_GET['po2'];?>&pol=<? echo $_GET['pol']; ?>&po3=true&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">

<table align="left" class="tableCss">
  <tr>
    <td width="46"><b>2.1</b></td>
    <td colspan="5"><b>TAHUN PERTAMA(Ditanam pada tahun 2008)</b></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.1.1</b></td>
    <td colspan="5"><b>Jenis penanaman</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="5">&nbsp;Penanaman Baru</td>
    </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.1.2</b></td>
    <td colspan="5"><b>Keluasan Tanaman</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="txtArea" id="keluasan" type="text" value="1660.32" sizr="10"/>
      &nbsp;Hektar</td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.1.3.</b></td>
    <td colspan="5"><b>Jumlah kos mengikut operasi</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="5">Kos perlu diselaraskan mengikut tahun kewangan Januari--Disember 2008</td>
  </tr>
  
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td align="right"><b>a.</b></td>
    <td width="395"><b><u>Perbelanjaan Tidak Berulang </u></b></td>
    <td width="126"><b>Kos&nbsp;(RM)</b></td>
    <td width="117"><div id="1" class="hide"><b>Kos(RM)/Ha&nbsp;</b></div></td>
    <td width="123"><strong>Kos(RM)/Tan</strong></td>
    <td width="147"><div id="2" class="hide"><b>(~  Tahun Sebelum</b>)</div></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="5">
    <table width="98%" frame="box" class="subTable">
      <tr>
        <td width="27" align="right">1.</td>
        <td width="470">Menebang dan membersih kawasan&nbsp;</td>
        <td width="144"><input name="txtCa1" type="text" class="textBox" onblur="kiraTotal(this.value,'txtCa11')" onkeyup="kira('31','txtCa45','txtCa11','txtCa12',this.value)" value="0" size="15"/></td>
        <td width="144"><div id="31" class="hide">
          
            <div align="left">
              <input name="txtCa19" type="text" class="textBox" id="txtCa11" value="0" size="10" />
              </div>
        </div></td>
        <td width="144"><label>
          <input name="txtCa66" type="text" class="textBox" id="txtCa45" value="0" size="10" />
        </label></td>
        <td width="144"><div id="32" class="hide">
          
            <div align="left">
              <input name="txtCa19" type="text" class="textBox" id="txtCa12" value="0" size="10" />
              </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Membuat teres dan landasan&nbsp;</td>
        <td><input name="txtCa3" type="text" class="textBox" onblur="kiraTotal(this.value,'txtCa')" onkeyup="kira('31','txtCa46','txtCa','txtCa24',this.value)" value="0" size="15"/></td>
        <td><div id="41" class="hide">
          
            <div align="left">
              <input name="txtCa20" type="text" class="textBox" id="txtCa" value="0" size="10" />
            </div>
        </div></td>
        <td><input name="txtCa67" type="text" class="textBox" id="txtCa46" value="0" size="10" /></td>
        <td><div id="42" class="hide">
          
            <div align="left">
              <input name="txtCa53" type="text" class="textBox" id="txtCa24" value="0" size="10" />
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Pembinaan Jalan&nbsp;</td>
        <td><input name="txtCa11" type="text" class="textBox" onblur="kiraTotal(this.value,'txtCa2')" onkeyup="kira('31','txtCa47','txtCa2','txtCa25',this.value)" value="0" size="15"/></td>
        <td><div id="51" class="hide">
          
            <div align="left">
              <input name="txtCa33" type="text" class="textBox" id="txtCa2" value="0" size="10" />
            </div>
        </div></td>
        <td><input name="txtCa68" type="text" class="textBox" id="txtCa47" value="0" size="10" /></td>
        <td><div id="52" class="hide">
          
            <div align="left">
              <input name="txtCa21" type="text" class="textBox" id="txtCa25" value="0" size="10" />
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Pembinaan parit&nbsp;</td>
        <td><input name="txtCa12" type="text" class="textBox" onblur="kiraTotal(this.value,'txtCa3')" onkeyup="kira('31','txtCa48','txtCa3','txtCa26',this.value)" value="0" size="15" /></td>
        <td><div id="61" class="hide">
          
            <div align="left">
              <input name="txtCa34" type="text" class="textBox" id="txtCa3" value="0" size="10" />
            </div>
        </div></td>
        <td><input name="txtCa69" type="text" class="textBox" id="txtCa48" value="0" size="10" /></td>
        <td><div id="62" class="hide">
          
            <div align="left">
              <input name="txtCa22" type="text" class="textBox" id="txtCa26" value="0" size="10" />
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">5.</td>
        <td>Membaris&nbsp;</td>
        <td><input name="txtCa13" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa4')" onkeyup="kira('31','txtCa49','txtCa4','txtCa27',this.value)" /></td>
        <td><div id="71" class="hide">
          
            <div align="left">
              <input name="txtCa35" type="text" class="textBox" id="txtCa4" value="0" size="10" />
            </div>
        </div></td>
        <td><input name="txtCa70" type="text" class="textBox" id="txtCa49" value="0" size="10" /></td>
        <td><div id="72" class="hide">
          
            <div align="left">
              <input name="txtCa23" type="text" class="textBox" id="txtCa27" value="0" size="10" />
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">6.</td>
        <td>Melubang dan menanam&nbsp;</td>
        <td><input name="txtCa14" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa5')" onkeyup="kira('31','txtCa50','txtCa5','txtCa28',this.value)" /></td>
        <td><div id="81" class="hide">
          
            <div align="left">
              <input name="txtCa36" type="text" class="textBox" id="txtCa5" value="0" size="10" />
            </div>
        </div></td>
        <td><input name="txtCa71" type="text" class="textBox" id="txtCa50" value="0" size="10" /></td>
        <td><div id="82" class="hide">
          
            <div align="left">
              <input name="txtCa24" type="text" class="textBox" id="txtCa28" value="0" size="10" />
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">7.</td>
        <td>Pembajaan awal&nbsp;</td>
        <td><input name="txtCa15" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa6')" onkeyup="kira('31','txtCa51','txtCa6','txtCa29',this.value)" /></td>
        <td><div id="91" class="hide">
          
            <div align="left">
              <input name="txtCa37" type="text" class="textBox" id="txtCa6" value="0" size="10" />
            </div>
        </div></td>
        <td><input name="txtCa72" type="text" class="textBox" id="txtCa51" value="0" size="10" /></td>
        <td><div id="92" class="hide">
          
            <div align="left">
              <input name="txtCa25" type="text" class="textBox" id="txtCa29" value="0" size="10" />
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">8.</td>
        <td>Bahan tanaman&nbsp;</td>
        <td><input name="txtCa16" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa7')" onkeyup="kira('31','txtCa52','txtCa7','txtCa30',this.value)" /></td>
        <td><div id="101" class="hide">
          
            <div align="left">
              <input name="txtCa38" type="text" class="textBox" id="txtCa7" value="0" size="10" />
            </div>
        </div></td>
        <td><input name="txtCa73" type="text" class="textBox" id="txtCa52" value="0" size="10" /></td>
        <td><div id="102" class="hide">
          
            <div align="left">
              <input name="txtCa26" type="text" class="textBox" id="txtCa30" value="0" size="10" />
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">9.</td>
        <td>Tanaman penutup bumi&nbsp;</td>
        <td><input name="txtCa17" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa8')" onkeyup="kira('31','txtCa53','txtCa8','txtCa31',this.value)" /></td>
        <td><div id="111" class="hide">
          
            <div align="left">
              <input name="txtCa39" type="text" class="textBox" id="txtCa8" value="0" size="10" />
            </div>
        </div></td>
        <td><input name="txtCa74" type="text" class="textBox" id="txtCa53" value="0" size="10" /></td>
        <td><div id="112" class="hide">
          
            <div align="left">
              <input name="txtCa27" type="text" class="textBox" id="txtCa31" value="0" size="10" />
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">10.</td>
        <td>Perbelanjaan-perbelanjaan lain&nbsp;</td>
        <td><input name="txtCa18" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa9')" onkeyup="kira('31','txtCa54','txtCa9','txtCa32',this.value)"  /></td>
        <td><div id="121" class="hide">
          
            <div align="left">
              <input name="txtCa40" type="text" class="textBox" id="txtCa9" value="0" size="10" />
            </div>
        </div></td>
        <td><input name="txtCa75" type="text" class="textBox" id="txtCa54" value="0" size="10" /></td>
        <td><div id="122" class="hide">
          
            <div align="left">
              <input name="txtCa28" type="text" class="textBox" id="txtCa32" value="0" size="10" />
            </div>
        </div></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><div align="right"></div></td>
        <td><div align="right"><strong>Jumlah (RM)</strong></div></td>
        <td><label>
          <input name="totalU" type="text" id="totalU" value="0" size="15" />
        </label></td>
        <td><label>
          <input name="totalU2" type="text" id="totalU2" value="0" size="10" />
        </label></td>
        <td><input name="txtCa76" type="text" class="textBox" id="totalTan" value="0" size="10" /></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="8px"></td>
  </tr>
  <tr>
    <td align="right"><b>b.</b></td>
    <td  colspan="5"><b><u>Penjagan&nbsp;</u></b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="5"><table width="99%" frame="box" class="subTable">
      <tr>
        <td width="23" align="right">1.</td>
        <td width="470">Meracun &nbsp;</td>
        <td width="147"><input name="txtCa2" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa10')" onkeyup="kira('31','32','txtCa10','txtCa33',this.value)" /></td>
        <td width="147"><input name="txtCa41" type="text" class="textBox" id="txtCa10" value="0" size="10" /></td>
        <td width="147"><input name="txtCa54" type="text" class="textBox" id="txtCa33" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Kawalan lalang &nbsp;</td>
        <td><input name="txtCa4" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa13')" onkeyup="kira('31','32','txtCa13','txtCa34',this.value)" /></td>
        <td><input name="txtCa42" type="text" class="textBox" id="txtCa13" value="0" size="10" /></td>
        <td><input name="txtCa55" type="text" class="textBox" id="txtCa34" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Perparitan &nbsp;</td>
        <td><input name="txtCa5" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa14')" onkeyup="kira('31','32','txtCa14','txtCa35',this.value)" /></td>
        <td><input name="txtCa43" type="text" class="textBox" id="txtCa14" value="0" size="10" /></td>
        <td><input name="txtCa56" type="text" class="textBox" id="txtCa35" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Jalan, jambatan, lorong, dsb &nbsp;</td>
        <td><input name="txtCa6" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa15')" onkeyup="kira('31','32','txtCa15','txtCa36',this.value)" /></td>
        <td><input name="txtCa44" type="text" class="textBox" id="txtCa15" value="0" size="10" /></td>
        <td><input name="txtCa57" type="text" class="textBox" id="txtCa36" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">5.</td>
        <td>Pemuliharan tanah/air&nbsp;</td>
        <td><input name="txtCa7" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa6')" onkeyup="kira('31','32','txtCa16','txtCa37',this.value)" /></td>
        <td><input name="txtCa45" type="text" class="textBox" id="txtCa16" value="0" size="10" /></td>
        <td><input name="txtCa58" type="text" class="textBox" id="txtCa37" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">6.</td>
        <td>Persempadan/survei &nbsp;</td>
        <td><input name="txtCa8" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa17')" onkeyup="kira('31','32','txtCa17','txtCa38',this.value)" /></td>
        <td><input name="txtCa46" type="text" class="textBox" id="txtCa17" value="0" size="10" /></td>
        <td><input name="txtCa59" type="text" class="textBox" id="txtCa38" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">7.</td>
        <td>Tanah penutup bumi&nbsp;</td>
        <td><input name="txtCa9" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa18')" onkeyup="kira('31','32','txtCa18','txtCa39',this.value)" /></td>
        <td><input name="txtCa47" type="text" class="textBox" id="txtCa18" value="0" size="10" /></td>
        <td><input name="txtCa60" type="text" class="textBox" id="txtCa39" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">8.</td>
        <td>Banci/sulaman&nbsp;</td>
        <td><input name="txtCa10" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa19')" onkeyup="kira('31','32','txtCa19','txtCa40',this.value)" /></td>
        <td><input name="txtCa48" type="text" class="textBox" id="txtCa19" value="0" size="10" /></td>
        <td><input name="txtCa61" type="text" class="textBox" id="txtCa40" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">9.</td>
        <td>Memangkas&nbsp;</td>
        <td><input name="txtCa29" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa20')" onkeyup="kira('31','32','txtCa20','txtCa41',this.value)" /></td>
        <td><input name="txtCa49" type="text" class="textBox" id="txtCa20" value="0" size="10" /></td>
        <td><input name="txtCa62" type="text" class="textBox" id="txtCa41" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">10.</td>
        <td>Kawalan serangga dan penyakit&nbsp;</td>
        <td><input name="txtCa30" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa21')" onkeyup="kira('31','32','txtCa21','txtCa42',this.value)" /></td>
        <td><input name="txtCa50" type="text" class="textBox" id="txtCa21" value="0" size="10" /></td>
        <td><input name="txtCa63" type="text" class="textBox" id="txtCa42" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">11.</td>
        <td>Pengkasian&nbsp;</td>
        <td><input name="txtCa31" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa22')" onkeyup="kira('31','32','txtCa22','txtCa43',this.value)" /></td>
        <td><input name="txtCa51" type="text" class="textBox" id="txtCa22" value="0" size="10" /></td>
        <td><input name="txtCa64" type="text" class="textBox" id="txtCa43" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="right">12.</td>
        <td>Perbelanjaan-perbelanjaan lain &nbsp;</td>
        <td><input name="txtCa32" type="text" class="textBox" value="0" size="15" onblur="kiraTotal(this.value,'txtCa23')" onkeyup="kira('31','32','txtCa23','txtCa44',this.value)" /></td>
        <td><input name="txtCa52" type="text" class="textBox" id="txtCa23" value="0" size="10" /></td>
        <td><input name="txtCa65" type="text" class="textBox" id="txtCa44" value="0" size="10" /></td>
      </tr>
      <tr>
        <td colspan="2" align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="right"><strong>Jumlah (RM)</strong></td>
        <td><input name="totalT" id="totalT" type="text" class="textBox" value="0" size="15" /></td>
        <td><input name="totalT2" type="text" class="textBox" id="totalT2" value="0" size="10" /></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="8px"></td>
  </tr>
  <tr>
    <td align="right"><b>c.</b></td>
    <td colspan="5"><b>Pembajaan&nbsp;</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="5"><table width="80%" frame="box" class="subTable">
      <tr>
        <td width="21" align="right">1.</td>
        <td width="448">Pembellian baja&nbsp;</td>
        <td width="305"><input name="txtCc1" type="text"  class="textBox" value="0"/></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Upah Membaja&nbsp;</td>
        <td><input name="txtCc2" type="text" class="textBox" value="0"/></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Analisis tanah dan daun&nbsp;</td>
        <td><input name="txtCc3" type="text" class="textBox" value="0"/></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Kuantiti baja&nbsp;</td>
        <td><input name="txtCc4" type="text" class="textBox" value="0"/>
          &nbsp;Tan&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><div align="right"></div></td>
        <td><div align="right"><strong>Jumlah (RM)</strong></div></td>
        <td><label>
          <input name="textfield3" type="text" id="textfield3" value="0" />
        </label></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="5"><label></label>
    <?php
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
			?>  </td>
  </tr>
</table>


</form> 
<div id="set" onclick="changeStyle()" style="position:fixed;left:0px; top:500px;border-style: solid solid solid solid; border-color: -moz-use-text-color rgb(0, 0, 0) rgb(0, 0, 0) -moz-use-text-color; border-width: 2px 2px 2px 2px; padding: 10px; background-color:#99FF99; text-align: center;">
  
  <div align="right"><img src="../images/001_23.gif" width="16" height="16" style="cursor:pointer" />
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