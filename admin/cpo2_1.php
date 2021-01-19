<script type="text/javascript">
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
		document.getElementById("set").style.left='940px';
		document.getElementById("clickme").style.visibility='visible';
	}
	
}
function calculate(x) {
	if(x == "")
		return;
	number1 = document.getElementById("totalT1").value*1;
	number2 = x*1;
	total = number1 + number2;
	document.getElementById("total").value = (total * 100)/1000;
	document.getElementById("totalT1").value = (total * 100)/1000;
	document.getElementById("totalT2").value = ((total/20000)*100)/1000;
	document.getElementById("totalT3").value = ((total/40000)*100)/1000;
	document.getElementById("total2").value = ((total/20000)*100)/1000;
	document.getElementById("total3").value = ((total/40000)*100)/1000;
}
function calc(nilai,id,id2) {
	if(nilai == "") {
		document.getElementById(id).value = "";
		document.getElementById(id2).value = "";
		return;
	}
	val = nilai * 1;
	num1 = val/20000;
	num2 = val/40000;
	document.getElementById(id).value = (num1 * 100)/1000;
	document.getElementById(id2).value = (num2 * 100)/1000;
}
</script>
<table width="957" align="left" class="tableCss">
  
  <tr>
    <td width="45"><strong>2.1</strong></td>
    <td colspan="4"><b>KOS PEMPROSESAN&nbsp;[<em>PROCESSING COSTS</em>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4">Kos perlu diselaraskan mengikut tahun kewangan Januari - Disember 2008</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4">[<i>Cost must be adjusted to the January - December 2008 financial year</i>] </td>
  </tr>
  
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td width="426"><b>Jenis Kos [<em>Cost Items</em>]</b></td>
    <td width="136"><strong>Kos (RM)</strong></td>
    <td width="145"><b>Kos(RM)/Tan FFB</b></td>
    <td width="181"><strong>Kos (RM)/Tan CPO</strong></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4">
    <table width="100%" frame="box" class="subTable">
      <tr>
        <td width="31" align="right">1.</td>
        <td width="379">Air, bahan kimia dan bekalan tenaga&nbsp;[<i>Water, chemicals and power supply</i>]</td>
        <td width="143"><label>
          <div align="center">
            <input name="text1" type="text" id="text1" value="0" onkeyup="calc(this.value,'text17','text33')" onblur="calculate(this.value)" />
            </div>
        </label></td>
        <td width="156"><div align="center">
          <input name="text17" type="text" id="text17" value="0.00" />
        </div></td>
        <td width="163"><div align="center">
          <input name="text33" type="text" id="text33" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Bahan bakar dan minyak pelincir&nbsp;[<i>Fuel and lubricants</i>]</td>
        <td><div align="center">
          <input name="textfield2" type="text" id="text2" value="0" onkeyup="calc(this.value,'text18','text34')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield18" type="text" id="text18" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield34" type="text" id="text34" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Buruh kilang sawit&nbsp;[<i>Palm oil mill labour</i>]</td>
        <td><div align="center">
          <input name="textfield3" type="text" id="text3" value="0" onkeyup="calc(this.value,'text19','text35')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield19" type="text" id="text19" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield35" type="text" id="text35" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Kawalan efluen&nbsp;[<i>Effluent control</i>]</td>
        <td><div align="center">
          <input name="textfield4" type="text" id="textfield4" value="0" onkeyup="calc(this.value,'text20','text36')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield20" type="text" id="text20" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield36" type="text" id="text36" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">5.</td>
        <td>Pembungkusan isirong&nbsp;[<i>Packing of kernel</i>]</td>
        <td><div align="center">
          <input name="textfield5" type="text" id="textfield5" value="0" onkeyup="calc(this.value,'text21','text37')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield21" type="text" id="text21" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield37" type="text" id="text37" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">6.</td>
        <td>Pengurusan dan pentadbiran&nbsp;[<i>Management and administration</i>]</td>
        <td><div align="center">
          <input name="textfield6" type="text" id="textfield6" value="0" onkeyup="calc(this.value,'text22','text38')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield22" type="text" id="text22" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield38" type="text" id="text38" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">7.</td>
        <td>Perbelanjaan pejabat&nbsp;[<i>Office expenses</i>]</td>
        <td><div align="center">
          <input name="textfield7" type="text" id="textfield7" value="0" onkeyup="calc(this.value,'text23','text39')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield23" type="text" id="text23" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield39" type="text" id="text39" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">8.</td>
        <td>Persampelan dan ujian makmal&nbsp;[<i>Sampling and laboratory testing</i>]</td>
        <td><div align="center">
          <input name="textfield8" type="text" id="textfield8" value="0" onkeyup="calc(this.value,'text24','text40')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield24" type="text" id="text24" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield40" type="text" id="text40" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right" valign="top">9.</td>
        <td>Kebajikan buruh yang tidak dibayar terus kepada pekerja<br /></td>
        <td><div align="center">
          <input name="textfield9" type="text" id="textfield9" value="0" onkeyup="calc(this.value,'text25','text41')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield25" type="text" id="text25" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield41" type="text" id="text41" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right" valign="top">10.</td>
        <td>Penaikan taraf, penjagaan dan pembaikan kilang sawit&nbsp;<br /></td>
        <td><div align="center">
          <input name="textfield10" type="text" id="textfield10" value="0" onkeyup="calc(this.value,'text26','text42')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield26" type="text" id="text26" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield42" type="text" id="text42" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">11</td>
        <td>Sewa, cukai tanah, yuran [<em>Rents, land quit rent, fees</em>]</td>
        <td><div align="center">
          <input name="textfield11" type="text" id="textfield11" value="0" onkeyup="calc(this.value,'text27','text43')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield27" type="text" id="text27" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield43" type="text" id="text43" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">12</td>
        <td>Kawalan keselamatan kilang sawit [<em>Palm ol mill security</em>]</td>
        <td><div align="center">
          <input name="textfield12" type="text" id="textfield12" value="0" onkeyup="calc(this.value,'text28','text44')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield28" type="text" id="text28" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield44" type="text" id="text44" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right" valign="top">13</td>
        <td>Penyelidikan dan pembangunan kilang sawit <br /></td>
        <td><div align="center">
          <input name="textfield13" type="text" id="textfield13" value="0" onkeyup="calc(this.value,'text29','text45')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield29" type="text" id="text29" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield45" type="text" id="text45" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">14</td>
        <td>Susutnilai kilang sawit [<em>Depreciation of palm oil mill</em>]</td>
        <td><div align="center">
          <input name="textfield14" type="text" id="textfield14" value="0" onkeyup="calc(this.value,'text30','text46')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield30" type="text" id="text30" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield46" type="text" id="text46" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">15</td>
        <td>Bayaran pengurusan Ibu Pejabat [<em>Headquaters management charges</em>]</td>
        <td><div align="center">
          <input name="textfield15" type="text" id="textfield15" value="0" onkeyup="calc(this.value,'text31','text47')" onblur="calculate(this.value)" />
        </div></td>
        <td><div align="center">
          <input name="textfield31" type="text" id="text31" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="textfield47" type="text" id="text47" value="0.00" />
        </div></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>Jumlah[<em>Total</em>]</td>
        <td><div align="center">
          <input name="totalT1" type="text" id="totalT1" value="0" />
        </div></td>
        <td><div align="center">
          <input name="totalT2" type="text" id="totalT2" value="0.00" />
        </div></td>
        <td><div align="center">
          <input name="totalT3" type="text" id="totalT3" value="0.00" />
        </div></td>
      </tr>
    </table>    </td>
  </tr>
  
  <tr>
    <td></td>
    <td colspan="4">
    <form action="home.php?id=cpo3_1"><input type="submit" name="button" id="button" value="Save" /><input type="reset" name="button2" id="button2" value="Reset" /></form></td>
  </tr>
</table>
