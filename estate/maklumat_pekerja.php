<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=po1year&po2=false&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>';		
			}
	}

}

</script>


<b>1.8&nbsp;&nbsp; Bilangan pekerja mengikut kategori[<i>Number of workers according to work categories</i>]</b>
<br>
<form id="form1" name="form1" method="post" action="home.php?id=po1year&po2=true&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><table width="99%" align="center" frame="box"  class="tableCss">
      <tr align="center">
        <td width="293" rowspan="3"><b>Kategori Kerja[<i>work category</i>]</b></td>
        <td colspan="4"><b>Bilangan[<i>Number</i>]</b></td>
      </tr>
      <tr align="center">
        <td colspan="2" ><b>Dibayar oleh estet</b><br/>
          [<i>Paid directly by estate</i>]</td>
        <td colspan="2"><b>Dibayar oleh kontraktor</b><br/>
          [<i>Paid by contractors</i>]</td>
      </tr>
      <tr align="center">
        <td width="103"><b>Tempatan</b><br/>
          [<i>Local</i>]</td>
        <td width="103"><b>Asing</b><br/>
          [<i>Foreign</i>]</td>
        <td width="103"><b>Tempatan</b><br/>
          [<i>Local</i>]</td>
        <td width="104"><b>Asing</b><br/>
          [<i>Foreign</i>]</td>
      </tr>
      <tr align="center">
        <td width="293"><div align="right">Mandur penuai [<i>Harvesting mandore</i>]</div></td>
        <td width="103"><input type="text" class="textbox" name="11" size="11" id="11" value="3"/></td>
        <td width="103"><input type="text" class="textbox" name="12" size="11" id="12" value="0"/></td>
        <td width="103"><input type="text" class="textbox" name="13" size="11" id="13" value="0"/></td>
        <td width="104"><input type="text" class="textbox" name="14" size="11" id="14" value="0"/></td>
      </tr>
      <tr align="center">
        <td><div align="right">Mandur am [<i>General mandore</i>]</div></td>
        <td><input type="text" class="textbox" name="25" size="11" id="25" value="0"/></td>
        <td><input type="text" class="textbox" name="26" size="11" id="26" value="0"/></td>
        <td><input type="text" class="textbox" name="27" size="11" id="27" value="0"/></td>
        <td><input type="text" class="textbox" name="28" size="11" id="28" value="0"/></td>
      </tr>
      <tr align="center">
        <td><div align="right"><b>Jumlah kecil [<i>Sub-total</i>]</b></div></td>
        <td><input type="text" class="textbox" name="39"  size="11" id="39" value="3"  onFocus="cal(39,11,25)" readonly /></td>
        <td><input type="text" class="textbox" name="310" size="11" id="310" value="0" onFocus="cal(310,12,26)" readonly /></td>
        <td><input type="text" class="textbox" name="311" size="11" id="311" value="0" onFocus="cal(311,13,27)" readonly/></td>
        <td><input type="text" class="textbox" name="312" size="11" id="312" value="0" onFocus="cal(312,14,28)" readonly/></td>
      </tr>
      <tr align="center" >
        <td><div align="right"><b>Kekurangan [<i>Shortage</i>]</b></div></td>
        <td colspan="2"><input type="text" class="textbox" name="413" size="11" id="413" value="0"/></td>
        <td colspan="2"><input type="text" class="textbox" name="414" size="11" id="414" value="0"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="99%" align="center"  frame="box"  class="tableCss">
      <tr align="center" >
        <td width="293"><div align="right">Penuai [<i>Harvesters</i>]</div></td>
        <td width="103"><input type="text" name="515" class="textbox"size="11" id="515" value="3"/></td>
        <td width="103"><input type="text" name="516" class="textbox"size="11" id="516" value="24"/></td>
        <td width="103"><input type="text" name="517" class="textbox"size="11" id="517" value="0"></td>
        <td width="104"><input type="text" name="518" class="textbox"size="11" id="518" value="0"></td>
      </tr>
      <tr align="center">
        <td><div align="right">Pemungut BTS* [<i>FFB Collectors*</i>]</div></td>
        <td><input type="text" name="619" size="11" class="textbox"id="619" value="3"/></td>
        <td><input type="text" name="620" size="11" class="textbox"id="620" value="24"/></td>
        <td><input type="text" name="621" size="11" class="textbox"id="621" value="0"/></td>
        <td><input type="text" name="622" size="11" class="textbox"id="622" value="0"/></td>
      </tr>
      <tr align="center">
        <td><div align="right">Pemungut buah relai [<i>Loose fruit Collectors</i>]</div></td>
        <td><input type="text" name="723" size="11" class="textbox" id="723" value="0"/></td>
        <td><input type="text" name="724" size="11" class="textbox" id="724" value="0"/></td>
        <td><input type="text" name="725" size="11" class="textbox" id="725" value="0"/></td>
        <td><input type="text" name="726" size="11" class="textbox" id="726" value="0"/></td>
      </tr>
      <tr align="center">
        <td><div align="right"><b>Jumlah kecil [<i>Sub-total</i>]</b></div></td>
        <td><input type="text" name="827" size="11" class="textbox" id="827" value="3" onFocus="cal2(827,515,619,723)" readonly/></td>
        <td><input type="text" name="828" size="11" class="textbox" id="828" value="24" onFocus="cal2(828,516,620,724)" readonly/></td>
        <td><input type="text" name="829" size="11" class="textbox" id="829" value="0" onFocus="cal2(829,517,621,725)" readonly/></td>
        <td><input type="text" name="830" size="11" class="textbox" id="830" value="0" onFocus="cal2(830,518,622,726)" readonly/></td>
      </tr>
      <tr align="center">
        <td><div align="right"><b>Kekurangan [<i>Shortage</i>]</b></div></td>
        <td colspan="2"><input type="text" name="931" class="textbox" size="11" id="931" value="0"/></td>
        <td colspan="2"><input type="text" name="932" class="textbox" size="11" id="932" value="0"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="99%" align="center"  frame="box"  class="tableCss" >
      <tr align="center">
        <td width="293"><div align="right">Pekerja estet [<i>Field workers</i>]</div></td>
        <td width="103"><input type="text" name="1033" size="11" class="textbox" id="1033" value="0"/></td>
        <td width="103"><input type="text" name="1034" size="11" class="textbox" id="1034" value="0"/></td>
        <td width="103"><input type="text" name="1035" size="11" class="textbox" id="1035" value="0"/></td>
        <td width="104"><input type="text" name="1036" size="11" class="textbox" id="1036" value="0"/></td>
      </tr>
      <tr align="center">
        <td><div align="right">Pekerja am lain [<i>Other general workers</i>]</div></td>
        <td><input type="text" name="1137" size="11" class="textbox" id="1137" value="0"/></td>
        <td><input type="text" name="1138" size="11" class="textbox" id="1138" value="0"/></td>
        <td><input type="text" name="1139" size="11" class="textbox" id="1139" value="0"/></td>
        <td><input type="text" name="1140" size="11" class="textbox" id="1140" value="0"/></td>
      </tr>
      <tr align="center">
        <td><div align="right"><b>Jumlah kecil [<i>Sub-total</i>]</b></div></td>
        <td><input type="text" name="1241" size="11"class="textbox" onFocus="cal(1241,1033,1137)" readonly id="1241" value="0"/></td>
        <td><input type="text" name="1242" size="11"class="textbox" id="1242" onFocus="cal(1242,1034,1138)" readonly value="0"/></td>
        <td><input type="text" name="1243" size="11"class="textbox" onFocus="cal(1243,1035,1139)" readonly  id="1243" value="0"/></td>
        <td><input type="text" name="1244" size="11" class="textbox" onFocus="cal(1244,1036,1140)" readonly  id="1244" value="0"/></td>
      </tr>
      <tr align="center">
        <td><div align="right"><b>Kekurangan [<i>Shortage</i>]</b></div></td>
        <td colspan="2"><input type="text" name="1345" class="textbox" size="11" id="1345" value="0"/></td>
        <td colspan="2"><input type="text" name="1346" class="textbox" size="11" id="1346" value="0"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="99%" align="center" frame="box" class="tableCss" >
      <tr align="center">
        <td width="293"><div align="right">Eksekutif [<i>Executives</i>]</div></td>
        <td width="103"><input type="text" name="1447" size="11" class="textbox" id="1447" value="0"/></td>
        <td width="103"><input type="text" name="1448" size="11" class="textbox" id="1448" value="0"/></td>
        <td width="103"><input type="text" name="1449" size="11" class="textbox" id="1449" value="0"/></td>
        <td width="104"><input type="text" name="1450" size="11" class="textbox" id="1450" value="0"/></td>
      </tr>
      <tr align="center">
        <td><div align="right">Kakitangan [<i>Staff</i>]</div></td>
        <td><input type="text" name="1551" size="11" class="textbox" id="1551" value="0"/></td>
        <td><input type="text" name="1552" size="11" class="textbox" id="1552" value="0"/></td>
        <td><input type="text" name="1553" size="11" class="textbox" id="1553" value="0"/></td>
        <td><input type="text" name="1554" size="11" class="textbox" id="1554" value="0"/></td>
      </tr>
      <tr align="center">
        <td><div align="right"><b>Jumlah kecil [<i>Sub-total</i>]</b></div></td>
        <td><input type="text" name="1655" size="11" class="textbox" id="1655" onFocus="cal(1655,1447,1551)" readonly value="0"/></td>
        <td><input type="text" name="1656" size="11" class="textbox" id="1656" onFocus="cal(1656,1448,1552)" readonly value="0"/></td>
        <td><input type="text" name="1657" size="11" class="textbox" id="1657" onFocus="cal(1657,1449,1553)" readonly value="0"/></td>
        <td><input type="text" name="1658" size="11" class="textbox" id="1658" onFocus="cal(1658,1450,1554)" readonly value="0"/></td>
      </tr>
      <tr align="center">
        <td><div align="right"><b>Kekurangan [<i>Shortage</i>]</b></div></td>
        <td colspan="2"><input type="text" name="1759" class="textbox" size="11" id="1759" value="0"/></td>
        <td colspan="2"><input type="text" name="1760" class="textbox" size="11" id="1760" value="0"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table class="subTable" align="left">
      <tr>
        <td>Note*: Sekiranya kerja menuai dan memungut BTS dilakukan oleh orang yang sama, sila kosongkan ruangan ini.<br/>
            <i>[Note*: If harvesting and FFBs collection is done by the same labour, please leave this row blank.]</i></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="reset" name="button2" id="button2" value="Cetak" /></td>
  </tr>
</table>
  </form> 
<br>
