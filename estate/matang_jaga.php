
<script>
var check=0;
function checkProgress()
{
	
	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=po4_1&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=false&po8=<? echo $_GET['po8']; ?>';		
			}
	}

}

</script>

<form name="form1" id="form1" action="home.php?id=po4_1&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=true&po8=<? echo $_GET['po8']; ?>" method="post">

<table class="tableCss" align="left">
  
  <tr>
    <td width="52"><b>3.3.</b></td>
    <td colspan="2"><b>Jumlah kos mengikut operasi&nbsp;[<i>Total cost according to operation</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">Kos perlu diselaraskan mengikut tahun kewangan Januari--Disember 2008</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">[<i>Cost must be adjusted to the January--Disember 2008 financial year</i>]</td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td align="right"><b>a.</b></td>
    <td width="594"><b><u>Penjagaan&nbsp;[<i>Upkeep</i>]</u></b></td>
    <td width="231"><b>Kos&nbsp;[<i>Cost</i>]&nbsp;RM</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><table width="90%"  frame="box" class="subTable">
      <tr>
        <td width="25" align="center">1.</td>
        <td width="444">Meracun &nbsp;[<i>Weeding</i>]</td>
        <td width="145"><input type="text" name="txtCa1" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">2.</td>
        <td>Kawalan lalang &nbsp;[<i>Lalang control</i>]</td>
        <td><input type="text" name="txtCa2" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">3.</td>
        <td>Pemuliharan tanah/ air&nbsp;[<i>Soil/ water conservation</i>]</td>
        <td><input type="text" name="txtCa3" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">4.</td>
        <td>Penjagaan Jalan, jambatan, lorong, dsb &nbsp;[<i>Upkeeps of Roads, bridges, paths, etc</i>]</td>
        <td><input type="text" name="txtCa4" onKeypress="keypress(event)" /></td>
      </tr>
      <tr>
        <td align="center">5.</td>
        <td>Penjagaan Parit [<em>Upkeeps of drains</em>]</td>
        <td><input type="text" name="txtCa5" onKeypress="keypress(event)"  /></td>
      </tr>
      <tr>
        <td align="center">6.</td>
        <td>Kawalan serangga dan penyakit&nbsp;[<i>Pests &amp; diseases control</i>]</td>
        <td><input type="text" name="txtCa6" onKeypress="keypress(event)"  /></td>
      </tr>
      <tr>
        <td align="center">7.</td>
        <td>Memangkas&nbsp;dan membersihkan pokok [<i>Pruning and palm sanitation</i>]</td>
        <td><input type="text" name="txtCa7" onKeypress="keypress(event)"  /></td>
      </tr>
      <tr>
        <td align="center">8.</td>
        <td>Penjagaan ban, sempadan dan empangan [<em>Upkeeps of bunds, boundaries and Watergates</em>]</td>
        <td><input type="text" name="txtCa8" onKeypress="keypress(event)"  /></td>
      </tr>
      <tr>
        <td align="center">9.</td>
        <td>Upah mandur/ kos penyeliaan estet [<em>Mandore wages/ direct field supervision costs</em>]</td>
        <td><input type="text" name="txtCa9" onKeypress="keypress(event)"  /></td>
      </tr>
      <tr>
        <td align="center">10.</td>
        <td>Banci/sulaman&nbsp;[<i>Census/supplies</i>]</td>
        <td><input type="text" name="txtCa10" onKeypress="keypress(event)"  /></td>
      </tr>
      <tr>
        <td align="center">11.</td>
        <td>Perbelanjaan pelbagai &nbsp;[<i>Other expenditure</i>s]</td>
        <td><input type="text" name="txtCa11" onKeypress="keypress(event)"  /></td>
      </tr>
      
    </table></td>
  </tr>
  
  
    
  <tr>
    <td></td>
    <td colspan="2"><label></label>
      <label>
      <input type="reset" name="button2" id="button2" value="  Cetak  ">
    </label></td>
  </tr>
</table>
</table>

</form>