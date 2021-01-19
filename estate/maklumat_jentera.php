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
<form id="form1" name="form1" method="post" action="home.php?id=po1year&po2=true&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  
  <tr>
    <td colspan="2"><b>1.9 &nbsp;&nbsp;  Penggunaan jentera ladang [<i>Form mechanizations</i>].</b></td>
  </tr>
  <tr>
    <td colspan="2"><table width="99%" align="center" frame="box"class="tableCss">
      <tr align="center">
        <td colspan="2"><b>Kategori Kerja<br/>
          [<i>Work Categories</i>]</b></td>
        <td width="159"><b>Peratus Kawasan<br/>
          [<i>Percent of Fields]</i></b></td>
        <td width="137"><b>Jenis Jentera<br/>
          [<i>Type of Machine</i>]</b></td>
      </tr>
      <tr>
        <td width="29" align="right">1.</td>
        <td width="365">Pembajaan [<i>Fertiliser application</i>]</td>
        <td  align="center"><input type="text"  name="jentera11" class="textbox" size="11" value="30"/>
          %</td>
        <td align="center"><textarea name="jentera12" rows="3" cols="15" ><? echo $f2 ?></textarea></td>
      </tr>
      <tr>
        <td align="right">2.</td>
        <td>Pemyemburan racun herba & makhluk perosak<br/>
          [<i>Spraying of herbicide & perticide</i>]</td>
        <td align="center"><input type="text"  name="jentera23" class="textbox" size="11" value="10"/>
          %</td>
        <td align="center"><textarea name="jentera24" rows="3" cols="15" ><? echo $f4 ?></textarea></td>
      </tr>
      <tr>
        <td align="right">3.</td>
        <td>Penuaian [<i>Harvesting</i>]</td>
        <td align="center"><input type="text"  name="jentera35" class="textbox" size="11" value="70"/>
          %</td>
        <td align="center"><textarea name="jentera36" rows="3" cols="15" ><? echo $f6 ?></textarea></td>
      </tr>
      <tr>
        <td align="right">4.</td>
        <td>Pemunggahan BTS ke platform<br/>
          [<i>Infield collection of FFBs to platform</i>]</td>
        <td align="center"><input type="text"  name="jentera47" class="textbox" size="11"  value="70"/>
          %</td>
        <td align="center"><textarea name="jentera48"  rows="3" cols="15"  ><? echo $f8 ?></textarea></td>
      </tr>
      <tr>
        <td align="right" valign="top">5.</td>
        <td>Pengangkutan BTS dari platform ke pusat <br/>
          pengumpulan atau ke kilang <br/>
          [<i>Mainline loadind of FFBs from platform to collection <br/>
            centres or mill</i>]</td>
        <td align="center"><input type="text"  name="jentera59" class="textbox" size="11"  value="70"/>
          %</td>
        <td align="center"><textarea name="jentera510" rows="3" cols="15" ><? echo $f10 ?></textarea></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table class="subTable" align="left">
      <tr>
        <td><sup>*</sup><i>Contoh:penyembur berkuasa,grabber,backhoe,dsb[<sup>*</sup>Example:power sprayer, grabber, backhoe, etc]</i> </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="reset" name="button2" id="button2" value="Cetak" />

      </td>
  </tr>
</table>
  </form> 
<br>
