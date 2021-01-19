<?php include ('../class/syarikat.class.php');
$syarikat= new syarikat('syarikat','');
$keahlian = new syarikat('keahlian','');
?>
<link href="editableText.css" rel="stylesheet" type="text/css">	

<script type="text/javascript"\>

function askformore(type)
{

	var soklan=prompt('Tambah Soalan','');
	if (soklan!=null && soklan!="")
	  {
	  	newValue = soklan;
		soklan = newValue.replace(/&/g, "zxz");
	 	window.location.href="save_var.php?jenis="+type+"&var="+soklan;
	  }

}

</script>

<script type='text/javascript'>
function deletedata(x,y)
{
	answer = confirm("Delete this data?");
	if (answer !=0)
	{
	window.location.href='save_var.php?jenis='+y+'&var='+x;
	}
}


function edit(id)
{

		document.getElementById(id).contentEditable='true';

}


function ubah(key,id_name,jenis)
{
			var ok=confirm('Save this data?');
				if(ok)
				{
					newValue = document.getElementById(id_name).innerHTML;
					newValue = newValue.replace(/&/g, "zxz");
			    	window.location.href="save_var.php?jenis="+jenis+"&var="+newValue+"&id="+key;
				}
				else
				{
					window.location.href='home.php?id=po1_1';
					//ie supportable
				}
}

</script>

<link href="../css/buttongrey.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.style5 {	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<form id="form1" name="form1" method="post" action="home.php?id=po1_2&pol=true&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">
<table class="tableCss" >
  <tr>
    <td colspan="2"><span class="style5">Click on text to edit </span></td>
    </tr>
  <tr>
    <td width="38"><b>1.1</b></td>
    <td><b>Jenis Syarikat</b> [<i> Type of company</i>]</td>
  </tr>
  <?php for ($i=0; $i<$syarikat->total; $i++){?>
  <tr>
    <td><div align="right"><a href="#" onClick="deletedata('<?= $syarikat->comp_id[$i];  ?>','deletecompany');"><img src="remove.png" width="20" height="20" border="0" ></a></div></td>
    <td width="601">
	<span class="editableText" id="j<?=$i; ?>" onClick="edit('j<?=$i;?>')" onblur="ubah('<?=$syarikat->comp_id[$i]; ?>','j<?=$i; ?>','editcompany')">
	<?= $syarikat->comp_name[$i]; ?>
	</span></td>
    </tr>
	<?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td><div class="buttonwrapper">
<a class="ovalbutton" href="javascript:askformore('company');"><span>Add Type of company</span></a>
</div></td>
  </tr>
  
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.2</b></td>
    <td>Keahlian dalam persatuan</b> [<i>Member of association</i>]</td>
  </tr>
  <?php for($j=0; $j<$keahlian->total; $j++){?>
  <tr>
    <td><div align="right"><a href="#" onclick="deletedata('<?= $keahlian->ahli_id[$j];  ?>','deletekeahlian');"><img src="remove.png" width="20" height="20" border="0"></a></div></td>
    <td>
<span class="editableText" id="k<?=$j; ?>" onClick="edit('k<?=$j;?>')" onblur="ubah('<?=$keahlian->ahli_id[$j]; ?>','k<?=$j; ?>','editkeahlian')">
<?= $keahlian->ahli_name[$j]; ?>
</span>
</td>
    </tr>
  <?php } ?>
  
  <tr>
    <td>&nbsp;</td>
    <td><div class="buttonwrapper"> <a class="ovalbutton" href="javascript:askformore('keahlian');"><span>Add Member of association </span></a> </div></td>
    </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.3</b></td>
    <td>Integrasi dengan kilang buah sawit</b> [<i>Integrated with a palm oil mill</i>]</td>
  </tr>
  <tr>
    <td></td>
    <td>Ya [<i>Yes</i>] </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tidak [<i>No</i>] </td>
    </tr>
  
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.4</b></td>
    <td> Lokasi estet</b> [<i>Location of estate</i>]</td>
  </tr>
  <?php $lokasi = new syarikat('lokasi','');
  for($l=0; $l<$lokasi->total; $l++){
  ?>
  
  <tr>
    <td><div align="right"><a href="#" onclick="deletedata('<?=  $lokasi->lokasi_id[$l]; ?>','deletelokasi');"><img src="remove.png" width="20" height="20" border="0" /></a></div></td>
    <td>
		<span class="editableText" id="l<?=$l; ?>" onClick="edit('l<?=$l;?>')" onblur="ubah('<?= $lokasi->lokasi_id[$l]; ?>','l<?=$l; ?>','editlokasi')">

<?= $lokasi->lokasi_name[$l];?>
</span>
</td>
    </tr>
	<?php } ?>
  
  <tr>
    <td>&nbsp;</td>
    <td><div class="buttonwrapper"> <a class="ovalbutton" href="javascript:askformore('lokasi');"><span>Add Location of estate </span></a> </div></td>
    </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
    <td><b>1.5</b></td>
    <td>Bentuk mukabumi estet</b> [<i>Estate topography</i>]</td>
  </tr>
  <?php $mukabumi = new syarikat('mukabumi','');
  for ($m=0; $m<$mukabumi->total; $m++){?>
  <tr>
    <td><div align="right"><a href="#" onclick="deletedata('<?= $mukabumi->mb_id[$m];  ?>','deletemukabumi');"><img src="remove.png" width="20" height="20" border="0" /></a></div></td>
    <td>
	<span class="editableText" id="m<?=$m; ?>" onClick="edit('m<?=$m;?>')" onblur="ubah('<?= $mukabumi->mb_id[$m]; ?>','m<?=$m; ?>','editmukabumi')">
	<?= $mukabumi->mb_name[$m]; ?>
	</span></td>
    </tr>
	<?php }?>
  <tr>
    <td>&nbsp;</td>
    <td><div class="buttonwrapper"> <a class="ovalbutton" href="javascript:askformore('mukabumi');"><span>Add Estate Topography </span></a> </div></td>
    </tr>
  <tr>
    <td height="15"></td>
  </tr>
  <tr>
  <!--  <td><b>1.6</b></td>
    <td><table class="subTable">
      <tr>
        <td width="398"><b>Peratus kawasan berbukit</b> [<i>Percentage hilly</i>]</td>
        <td width="220"><input type="text" name="txtKawBukit" class="textbox" value=""/>
          %</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top"><b>1.7</b></td>
    <td><table class="subTable">
      <tr>
        <td colspan="2"><b>Peratus kecerunan melebihi 25 darjah</b></td>
      </tr>
      <tr>
        <td width="398">[<i>Percent of area with gradient greater than 25 degree</i>]</td>
        <td width="220"><input type="text" name="txtKawCerun"  class="textbox" value=""/>
          % </td>
      </tr>
      <tr>
        <td colspan="2">                           </td>
        </tr>
      
    </table></td>
  </tr>-->
</table>
</form> 