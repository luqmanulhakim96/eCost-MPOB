<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=home&finished=true&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=false';		
			}
	}

}

</script>
 <form id="form1" name="form1" method="post" action="home.php?id=home&finished=true&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=false'">
<table class="tableCss" align="left">
  
  <tr>
    <td width="52"><b>4.1.</b></td>
    <td colspan="2"><b>MAKLUMAT MENGENAI PERBELAJAAN AM</b></td>
  </tr>
  
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td width="594"><b><u>Butiran-butiran kos&nbsp;</u></b></td>
    <td width="231"><b>Kos&nbsp;(RM)</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><table width="90%"  frame="box" class="subTable">
      <tr>
        <td width="25" align="center">1.</td>
        <td width="444">Kos Ibu Pejabat</td>
        <td width="145"><input name="txtCa1" type="text" value="3500.00" /></td>
      </tr>
      <tr>
        <td align="center">2.</td>
        <td>Kos agensi&nbsp;</td>
        <td><input name="txtCa2" type="text" value="1222.99" /></td>
      </tr>
      <tr>
        <td align="center">3.</td>
        <td>Pengurusan estet, penyeliaan dan pentadbiran&nbsp;</td>
        <td><input name="txtCa3" type="text" value="1122.89" /></td>
      </tr>
      <tr>
        <td align="center">4.</td>
        <td>Kebajikan tidak dibayar terus kepada perkerja &nbsp;</td>
        <td><input name="txtCa4" type="text" value="1450.30" /></td>
      </tr>
      <tr>
        <td align="center">5.</td>
        <td>Susutnilai</td>
        <td><input name="txtCa5" type="text" value="1890.10" /></td>
      </tr>
      <tr>
        <td align="center">6.</td>
        <td>Cukai&nbsp;</td>
        <td><input name="txtCa6" type="text" value="580.20" /></td>
      </tr>
      <tr>
        <td align="center">7.</td>
        <td>Penyelidikan dan pembangunan</td>
        <td><input name="txtCa7" type="text" value="1280.90" /></td>
      </tr>
      <tr>
        <td align="center">8.</td>
        <td>Cukai Keuntungan</td>
        <td><input name="txtCa8" type="text" value="890.10" /></td>
      </tr>
      <tr>
        <td align="center">9.</td>
        <td>Ses COSS</td>
        <td><input name="txtCa9" type="text" value="1600.20" /></td>
      </tr>
      <tr>
        <td align="center">10.</td>
        <td>Lain-lain Kos</td>
        <td><input name="txtCa10" type="text" value="100.00" /></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td>Jumlah</td>
        <td><label>
          <input name="textfield" type="text" id="textfield" value="8920.90" />
        </label></td>
      </tr>
      
      
    </table></td>
  </tr>
  
    
      </tr>
    
  
  <tr>
    <td></td>
    <td colspan="2"><label></label><label></label>
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
			?> 
               </td>
  </tr>
</table>
</form> 