
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
		document.getElementById("set").style.left='-300px';
		document.getElementById("divtotal").style.visibility = 'hidden';
	}
	else
	{
		document.getElementById("set").style.left='0px';
		document.getElementById("divtotal").style.visibility = 'visible';
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
    <td colspan="4"><b>TAHUN KEDUA&nbsp;(Ditanam pada tahun 2007)</b></td>
  </tr>
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td><b>2.2.1.</b></td>
    <td colspan="4"><b>Jenis penanaman&nbsp;</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4">Penanaman Semula</td>
    </tr>
  
  
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td><b>2.2.2.</b></td>
    <td colspan="4"><b>Keluasan Tanaman&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="txtArea" id="keluasan" type="text" value="1660.32" />
      &nbsp;Hektar</td>
  </tr>
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td><b>2.2.3.</b></td>
    <td colspan="4"><b>Jumlah kos mengikut operasi&nbsp;</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4">Kos perlu diselaraskan mengikut tahun kewangan Januari--Disember 2008</td>
  </tr>
  
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td align="right"><b>a.</b></td>
    <td><b><u>Penjagaan</u></b></td>
    <td width="119"><b>Kos (RM)</b></td>
    <td width="118"><b>Kos(RM)/Ha&nbsp;</b></td>
    <td width="357"><span class="hide"><b>(~ Tahun Sebelum)</b></span></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4"><table width="80%" frame="box" class="subTable">
      <tr>
        <td width="17" align="center">1.</td>
        <td width="453">Meracun </td>
        <td width="144"><input name="txtCa13" type="text" onblur="kiraTotal(this.value,'txtCa25')" onkeyup="kira('31','32','txtCa25','txtCa1',this.value)" value="0" size="15"/></td>
        <td width="144"><input name="txtCa25" type="text" id="txtCa25" value="0" size="10" /></td>
        <td width="144"><input name="txtCa1" type="text" id="txtCa1" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">2.</td>
        <td>Kawalan lalang </td>
        <td><input name="txtCa14" type="text" onblur="kiraTotal(this.value,'txtCa26')" onkeyup="kira('31','32','txtCa26','txtCa2',this.value)" value="0" size="15"/></td>
        <td><input name="txtCa26" type="text" id="txtCa26" value="0" size="10" /></td>
        <td><input name="txtCa2" type="text" id="txtCa2" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">3.</td>
        <td>Perparitan &nbsp;</td>
        <td><input name="txtCa15" type="text" onblur="kiraTotal(this.value,'txtCa27')" onkeyup="kira('31','32','txtCa27','txtCa3',this.value)" value="0" size="15"/></td>
        <td><input name="txtCa27" type="text" id="txtCa27" value="0" size="10" /></td>
        <td><input name="txtCa3" type="text" id="txtCa3" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">4.</td>
        <td>Jalan, jambatan, lorong, dsb </td>
        <td><input name="txtCa16" type="text" onblur="kiraTotal(this.value,'txtCa28')" onkeyup="kira('31','32','txtCa28','txtCa4',this.value)" value="0" size="15"/></td>
        <td><input name="txtCa28" type="text" id="txtCa28" value="0" size="10" /></td>
        <td><input name="txtCa4" type="text" id="txtCa4" value="0" size="10" /></td>
      </tr>
      <tr>
        <td align="center">5.</td>
        <td>Pemuliharan tanah/air&nbsp;</td>
        <td><input name="txtCa17" type="text" value="0" size="15" onblur="kiraTotal(this.value,'txtCa29')" onkeyup="kira('31','32','txtCa29','txtCa5',this.value)" /></td>
        <td><input name="txtCa29" type="text" value="0" size="10" id="txtCa29" /></td>
        <td><input name="txtCa5" type="text" value="0" size="10" id="txtCa5" /></td>
      </tr>
      <tr>
        <td align="center">6.</td>
        <td>Persempadan/survei </td>
        <td><input name="txtCa18" type="text" value="0" size="15" onblur="kiraTotal(this.value,'txtCa30')" onkeyup="kira('31','32','txtCa30','txtCa6',this.value)" /></td>
        <td><input name="txtCa30" type="text" value="0" size="10" id="txtCa30"/></td>
        <td><input name="txtCa6" type="text" value="0" size="10" id="txtCa6"/></td>
      </tr>
      <tr>
        <td align="center">7.</td>
        <td>Tanah penutup bumi&nbsp;</td>
        <td><input name="txtCa19" type="text" value="0" size="15" onblur="kiraTotal(this.value,'txtCa31')" onkeyup="kira('31','32','txtCa31','txtCa7',this.value)" /></td>
        <td><input name="txtCa31" type="text" value="0" size="10" id="txtCa31"/></td>
        <td><input name="txtCa7" type="text" value="0" size="10" id="txtCa7"/></td>
      </tr>
      <tr>
        <td align="center">8.</td>
        <td>Banci/sulaman&nbsp;</td>
        <td><input name="txtCa20" type="text" value="0" size="15" onblur="kiraTotal(this.value,'txtCa32')" onkeyup="kira('31','32','txtCa32','txtCa8',this.value)" /></td>
        <td><input name="txtCa32" type="text" value="0" size="10" id="txtCa32"/></td>
        <td><input name="txtCa8" type="text" value="0" size="10" id="txtCa8"/></td>
      </tr>
      <tr>
        <td align="center">9.</td>
        <td>Memangkas&nbsp;</td>
        <td><input name="txtCa21" type="text" value="0" size="15" onblur="kiraTotal(this.value,'txtCa33')" onkeyup="kira('31','32','txtCa33','txtCa9',this.value)" /></td>
        <td><input name="txtCa33" type="text" value="0" size="10" id="txtCa33"/></td>
        <td><input name="txtCa9" type="text" value="0" size="10" id="txtCa9"/></td>
      </tr>
      <tr>
        <td align="center">10.</td>
        <td>Kawalan serangga dan penyakit&nbsp;</td>
        <td><input name="txtCa22" type="text" value="0" size="15" onblur="kiraTotal(this.value,'txtCa34')" onkeyup="kira('31','32','txtCa34','txtCa10',this.value)" /></td>
        <td><input name="txtCa34" type="text" value="0" size="10" id="txtCa34"/></td>
        <td><input name="txtCa10" type="text" value="0" size="10" id="txtCa10"/></td>
      </tr>
      <tr>
        <td align="center">11.</td>
        <td>Pengkasian</td>
        <td><input name="txtCa23" type="text" value="0" size="15" onblur="kiraTotal(this.value,'txtCa35')" onkeyup="kira('31','32','txtCa35','txtCa11',this.value)" /></td>
        <td><input name="txtCa35" type="text" value="0" size="10" id="txtCa35"/></td>
        <td><input name="txtCa11" type="text" value="0" size="10" id="txtCa11"/></td>
      </tr>
      <tr>
        <td align="center">12.</td>
        <td>Perbelanjaan-perbelanjaan lain &nbsp;</td>
        <td><input name="txtCa24" type="text" value="0" size="15" onblur="kiraTotal(this.value,'txtCa36')" onkeyup="kira('31','32','txtCa36','txtCa12',this.value)" /></td>
        <td><input name="txtCa36" type="text" value="0" size="10" id="txtCa36"/></td>
        <td><input name="txtCa12" type="text" value="0" size="10" id="txtCa12"/></td>
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
    <td height="10"></td>
  </tr>
  <tr>
    <td align="right"><b>b.</b></td>
    <td colspan="4"><b><u>Pembajaan&nbsp;</u></b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4"><table width="80%" frame="box" class="subTable">
      <tr>
        <td width="12" align="right">1.</td>
        <td width="385">Pembellian baja&nbsp;</td>
        <td width="253"><input name="txtCb1" type="text" value="0" /></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Upah Membaja&nbsp;</td>
        <td><input name="txtCb2" type="text" value="0" /></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Analisis tanah dan daun&nbsp;</td>
        <td><input name="txtCb3" type="text" value="0" /></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Kuantiti baja&nbsp;</td>
        <td><input name="txtCb4" type="text" value="0" />
          &nbsp;Tan&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="4">
    <input type="hidden" name="totaltahun1" value="<? echo $_POST['totalT']; ?>" />
    <input type="hidden" name="totalKtahun1" value="<? echo $_POST['totalT2']; ?>" />
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
			?>       </td>
  </tr>
</table>
</form>
<div id="set" onclick="changeStyle()" style="position:fixed;left:0px; top:500px;border-style: solid solid solid solid; border-color: -moz-use-text-color rgb(0, 0, 0) rgb(0, 0, 0) -moz-use-text-color; border-width: 2px 2px 2px 2px; padding: 10px; background-color:#99FF99; text-align: center;">
  <div align="right"><img src="../images/001_23.gif" alt="" width="16" height="16" style="cursor:pointer" /> </div>
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
