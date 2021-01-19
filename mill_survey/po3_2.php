<?php
	$var = "";
	if(isset($_GET['penjagaan'])) {
		$var = "po3_2&pembajaan=true";
	}
	if(isset($_GET['pembajaan'])) {
		$var = "po3_2&penuaian=true";
	}
	if(isset($_GET['penuaian'])) {
		$var = "po3_2&pengangkutan=true";
	}
	if(isset($_GET['pengangkutan'])) {
		$var = "po4_1";
	}
?>
<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=<?= $var ?>&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=false&po8=<? echo $_GET['po8']; ?>';		
			}
	}

}

</script>
<form name="form1" id="form1" action="home.php?id=<?= $var ?>&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=true&po8=<? echo $_GET['po8']; ?>" method="post">

<table class="tableCss" align="left">
  
  <tr>
    <td width="52"><b>3.3.</b></td>
    <td colspan="2"><b>Jumlah kos mengikut operasi&nbsp;</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">Kos perlu diselaraskan mengikut tahun kewangan Januari--Disember 2008</td>
  </tr>
  
  <tr>
    <td height="10px"></td>
  </tr>
  
  <?php
  	if(isset($_GET['penjagaan'])) {
  ?>
  <tr>
    <td align="right"></td>
    <td width="594"><b><u>Penjagaan&nbsp;</u></b></td>
    <td width="231"><b>Kos&nbsp;(RM)</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><table width="90%"  frame="box" class="subTable">
      <tr>
        <td width="25" align="center">1.</td>
        <td width="444">Meracun &nbsp;</td>
        <td width="145"><input name="txtCa1" type="text" value="850.90" /></td>
      </tr>
      <tr>
        <td align="center">2.</td>
        <td>Kawalan lalang </td>
        <td><input name="txtCa2" type="text" value="12.44" /></td>
      </tr>
      <tr>
        <td align="center">3.</td>
        <td>Pemuliharan tanah/ air&nbsp;</td>
        <td><input name="txtCa3" type="text" value="150.89" /></td>
      </tr>
      <tr>
        <td align="center">4.</td>
        <td>Penjagaan Jalan, jambatan, lorong, dsb &nbsp;</td>
        <td><input name="txtCa4" type="text" value="550.78" /></td>
      </tr>
      <tr>
        <td align="center">5.</td>
        <td>Penjagaan Parit </td>
        <td><input name="txtCa5" type="text" value="231.90" /></td>
      </tr>
      <tr>
        <td align="center">6.</td>
        <td>Kawalan serangga dan penyakit&nbsp;</td>
        <td><input name="txtCa6" type="text" value="980.80" /></td>
      </tr>
      <tr>
        <td align="center">7.</td>
        <td>Memangkas&nbsp;dan membersihkan pokok </td>
        <td><input name="txtCa7" type="text" value="1500.00" /></td>
      </tr>
      <tr>
        <td align="center">8.</td>
        <td>Penjagaan ban, sempadan dan empangan </td>
        <td><input name="txtCa8" type="text" value="1250.00" /></td>
      </tr>
      <tr>
        <td align="center">9.</td>
        <td>Upah mandur/ kos penyeliaan estet </td>
        <td><input name="txtCa9" type="text" value="2310.80" /></td>
      </tr>
      <tr>
        <td align="center">10.</td>
        <td>Banci/sulaman&nbsp;</td>
        <td><input name="txtCa10" type="text" value="1500.20" /></td>
      </tr>
      <tr>
        <td align="center">11.</td>
        <td>Perbelanjaan pelbagai &nbsp;</td>
        <td><input name="txtCa11" type="text" value="3400.20" /></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td><div align="right"><strong>Jumlah</strong></div></td>
        <td><label>
          <input type="text" name="textfield" id="textfield" />
        </label></td>
      </tr>
    </table></td>
  </tr>
  <?php
  	}
	if(isset($_GET['pembajaan'])) {
  ?>
  <tr>
    <td align="right"></td>
    <td colspan="2"><b><u>Pembajaan Pokok</u></b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><table width="90%" frame="box" class="subTable">
      <tr>
        <td width="23" align="right">1.</td>
        <td width="379">Pembellian baja&nbsp;</td>
        <td width="247"><input name="txtCb1" type="text" value="1289.00" /></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Upah Membaja</td>
        <td><input name="txtCb2" type="text" value="2301.00" /></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Analisis tanah dan daun</td>
        <td><input name="txtCb3" type="text" value="450.00" /></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Kuantiti baja&nbsp;</td>
        <td><input name="txtCb4" type="text" value="250" />
          &nbsp;Tan</td>
      </tr>
      <tr>
        <td align="right"><div align="right"></div></td>
        <td><div align="right"><strong>Jumlah</strong></div></td>
        <td><input type="text" name="textfield2" id="textfield2" /></td>
      </tr>
    </table></td>
  </tr>
  <?php
  	}
	if(isset($_GET['penuaian'])) {
   ?>
    <tr>
      <td align="right"></td>
      <td colspan="2"><b><u>Penuaian dan Pemungutan BTS&nbsp;</u></b></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2"><table width="90%"  frame="box" class="subTable">
        <tr>
          <td width="25" align="center">1.</td>
          <td width="444">Peralatan menuai </td>
          <td width="145"><input name="txtCa12" type="text" value="150.89" /></td>
        </tr>
        <tr>
          <td align="center">2.</td>
          <td>Upah Membaja </td>
          <td><input name="txtCa12" type="text" value="570.00" /></td>
        </tr>
        <tr>
          <td align="center">3.</td>
          <td>Analisis tanah dan daun</td>
          <td><input name="txtCa12" type="text" value="439.90" /></td>
        </tr>
        <tr>
          <td align="center">4.</td>
          <td>Kuantiti baja </td>
          <td><input name="txtCa12" type="text" value="178.90" /></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td><div align="right"><strong>Jumlah</strong></div></td>
          <td><input type="text" name="textfield3" id="textfield3" /></td>
        </tr>
        

      </table></td>
    </tr>
      </tr>
      <?php
		}
		if(isset($_GET['pengangkutan'])) {
	?>
    <tr>
      <td align="right"></td>
      <td colspan="2"><b><u>Pengankutan BTS ke Kilang</u></b></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2"><table width="90%"  frame="box" class="subTable">
        <tr>
          <td width="25" align="center">1.</td>
          <td width="444">Pemunggahan BTS ke platform</td>
          <td width="145"><input name="txtCa13" type="text" value="2580.78" /></td>
        </tr>
        <tr>
          <td align="center" valign="top">2.</td>
          <td>Pengankutan BTS dari platform ke pusat pengumpulan atau ke kilang </td>
          <td><input name="txtCa13" type="text" value="6750.90" /></td>
        </tr>
        <tr>
          <td align="center" valign="top">3.</td>
          <td>Penjagaan traktor &amp; treler, lori, keretapi, pengankutan sungai, dsb&nbsp;</td>
          <td><input name="txtCa13" type="text" value="4380.80" /></td>
        </tr>
        <tr>
          <td align="center">4.</td>
          <td>Perbelanjaan pelbagai </td>
          <td><input name="txtCa13" type="text" value="1748.80" /></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td><div align="right"><strong>Jumlah</strong></div></td>
          <td><input type="text" name="textfield4" id="textfield4" /></td>
        </tr>
      </table></td>
    </tr>
    <?php
		}
	?>
  <tr>
    <td></td>
    <td colspan="2">    <?php
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
			?> </td>
  </tr>
</table>
</table>

</form>