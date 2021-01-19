
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

<script type="text/javascript">
			$(document).ready(function(){
							$(".penuaian").colorbox({width:"50%", inline:true, href:"#inline_penuaian"});
							$(".penjagaan").colorbox({width:"50%", inline:true, href:"#inline_penjagaan"});
							$(".pengangkutan").colorbox({width:"50%", inline:true, href:"#inline_pengangkutan"});
							$(".editpenjagaan").colorbox();
							$(".editpenuaian").colorbox();
							$(".editpengangkutan").colorbox();

				});			
				
</script>


<form name="form1" id="form1" action="home.php?id=po4_1&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=true&po8=<? echo $_GET['po8']; ?>" method="post">

<table class="tableCss" align="left">
  
  <tr>
    <td width="52"><b>3.3.</b></td>
    <td colspan="2"><b>Jumlah kos mengikut operasi&nbsp;[<i>Total cost according to operation</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">Kos perlu diselaraskan mengikut tahun kewangan Januari--Disember</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">[<i>Cost must be adjusted to the January--Disember financial year</i>]</td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td align="right"><b>a.</b></td>
    <td width="594"><b><u>Penjagaan&nbsp;[<i>Upkeep</i>]</u></b></td>
    <td width="231">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">
    
    
    <table width="99%" frame="box" class="subTable">
    
    
       <?php
	   $con =connect();
  	$qb="select * from penjagaan_mature_var order by nama_malay ";
  	$rb = mysql_query($qb,$con);
  	$b=0;
  		while($rowb=mysql_fetch_array($rb)){
		++$b; 
	?>
      <tr>
        <td width="67" align="right"><div align="left"><a href="save_mature.php?id=<?= $rowb['id_penjagaan'];?>&type=deletepenjagaan"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" onclick="return confirm('Delete this data?');" /></a> <a href="save_tanaman_mature.php?id=<?= $rowb['id_penjagaan'];?>&jenis=editpenjagaan" class="editpenjagaan"><img src="../images/editsmall.png" width="16" height="16" border="0" /></a> 
          <?= $b; ?>.</div></td>
        <td width="855"><?= $rowb['nama_malay'];?> &nbsp;[<i><?= $rowb['nama_english'];?></i>]</td>
        </tr>
       <?php } ?>
    </table>    </td>
  </tr>
  <tr>
    <td><a href="#" class="penjagaan"><img src="../images/add_48.png" alt="" width="24" height="24" border="0" title="Jenis penanaman&nbsp;[type of planted]" /></a></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  
  
    
    <tr>
      <td align="right"><strong>b.</strong></td>
      <td colspan="2"><b><u>Penuaian dan Pemungutan BTS&nbsp;[<i>Harvesting and Collection of FFBs</i>]</u></b></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2"><table width="99%" frame="box" class="subTable">
        <?php
	   $con =connect();
  	$qb="select * from penuaian_var order by nama_malay ";
  	$rb = mysql_query($qb,$con);
  	$b=0;
  		while($rowb=mysql_fetch_array($rb)){
		++$b; 
	?>
        <tr>
          <td width="67" align="right"><div align="left"><a href="save_mature.php?id=<?= $rowb['id_penuaian'];?>&amp;type=deletepenuaian"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" onclick="return confirm('Delete this data?');" /></a> <a href="save_tanaman_mature.php?id=<?= $rowb['id_penuaian'];?>&amp;jenis=editpenuaian" class="editpenuaian"><img src="../images/editsmall.png" width="16" height="16" border="0" /></a>
                  <?= $b; ?>
            .</div></td>
          <td width="855"><?= $rowb['nama_malay'];?>
            &nbsp;[<i>
              <?= $rowb['nama_english'];?>
            </i>]</td>
        </tr>
        <?php } ?>
      </table></td>
    </tr>
    <tr>
      <td><a href="#" class="penuaian"><img src="../images/add_48.png" alt="" width="24" height="24" border="0" title="Penuaian dan Pemungutan BTS [Harvesting and Collection of FFBs]" /></a></td>
      <td colspan="2">&nbsp;</td>
    </tr>
      </tr>
    <tr>
    <td height="10px"></td>
  </tr>
    <tr>
      <td align="right"><strong>c.</strong></td>
      <td colspan="2"><b><u>Pengangkutan BTS ke Kilang&nbsp;[<i>Transport of FFBs to Mill</i>]</u></b></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2"><table width="99%" frame="box" class="subTable">
        <?php
	   $con =connect();
  	$qb="select * from pengangkutan_var order by nama_malay ";
  	$rb = mysql_query($qb,$con);
  	$b=0;
  		while($rowb=mysql_fetch_array($rb)){
		++$b; 
	?>
        <tr>
          <td width="67" align="right"><div align="left"><a href="save_mature.php?id=<?= $rowb['id_pengangkutan'];?>&amp;type=deletepengangkutan"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" onclick="return confirm('Delete this data?');" /></a> <a href="save_tanaman_mature.php?id=<?= $rowb['id_pengangkutan'];?>&amp;jenis=editpengangkutan" class="editpengangkutan"><img src="../images/editsmall.png" width="16" height="16" border="0" /></a>
                  <?= $b; ?>
            .</div></td>
          <td width="855"><?= $rowb['nama_malay'];?>
            &nbsp;[<i>
              <?= $rowb['nama_english'];?>
            </i>]</td>
        </tr>
        <?php } ?>
      </table></td>
    </tr>
    <tr>
      <td><a href="#" class="pengangkutan"><img src="../images/add_48.png" alt="" width="24" height="24" border="0" title="Pengangkutan BTS ke Kilang [Transport of FFBs to Mill" /></a></td>
      <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td></td>
    <td colspan="2"></td>
  </tr>
</table>
</table>

</form>





















  
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
      






	<div style="display:none" >
			<div id='inline_penuaian' style='padding:10px; background:#fff;'>
			  <form action="save_mature.php" method="post">
			    <table width="100%">
                  <tr>
                    <td colspan="3"><u><strong>Penuaian dan Pemungutan BTS [Harvesting and Collection of FFBs]</strong></u></td>
                  </tr>
                  <tr>
                    <td width="20%">Name (Malay)</td>
                    <td width="1%">:</td>
                    <td width="79%"><input name="malay" type="text" id="malay" size="50" />
                    
                      <script type="text/javascript">
					var f11 = new LiveValidation('malay');
					f11.add( Validate.Presence );
                    
                    </script>
                    
                    </td>
                  </tr>
                  <tr>
                    <td>Name (English)</td>
                    <td>:</td>
                    <td>
                      <input name="english" type="text" id="english" size="50" />
                        <script type="text/javascript">
					var f12 = new LiveValidation('english');
						f12.add( Validate.Presence );
                        
                        </script>
                      
                      
                  </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="button3" id="button3" value="    Save   " />
                        <input type="reset" name="button4" id="button4" value="   Reset   " />
                        <input name="type" type="hidden" id="type" value="addpenuaian" /></td>
                  </tr>
                </table>
			  </form>            
	  </div>
</div>
















	<div style="display:none" >
			<div id='inline_penjagaan' style='padding:10px; background:#fff;'>
			  <form action="save_mature.php" method="post">
			    <table width="100%">
                  <tr>
                    <td colspan="3"><u><strong>Penjagaan [Upkeep]</strong></u></td>
                  </tr>
                  <tr>
                    <td width="20%">Name (Malay)</td>
                    <td width="1%">:</td>
                    <td width="79%"><input name="malay" type="text" id="malay" size="50" />
                    
                      <script type="text/javascript">
					var f11 = new LiveValidation('malay');
					f11.add( Validate.Presence );
                    
                    </script>
                    
                    </td>
                  </tr>
                  <tr>
                    <td>Name (English)</td>
                    <td>:</td>
                    <td>
                      <input name="english" type="text" id="english" size="50" />
                        <script type="text/javascript">
					var f12 = new LiveValidation('english');
						f12.add( Validate.Presence );
                        
                        </script>
                      
                      
                  </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="button3" id="button3" value="    Save   " />
                        <input type="reset" name="button4" id="button4" value="   Reset   " />
                        <input name="type" type="hidden" id="type" value="addpenjagaan" /></td>
                  </tr>
                </table>
			  </form>            
	  </div>
</div>






















	<div style="display:none" >
			<div id='inline_pengangkutan' style='padding:10px; background:#fff;'>
			  <form action="save_mature.php" method="post">
			    <table width="100%">
                  <tr>
                    <td colspan="3"><u><strong>Pengangkutan BTS ke Kilang [Transport of FFBs to Mill]</strong></u></td>
                  </tr>
                  <tr>
                    <td width="20%">Name (Malay)</td>
                    <td width="1%">:</td>
                    <td width="79%"><input name="malay" type="text" id="malay" size="50" />
                    
                      <script type="text/javascript">
					var f11 = new LiveValidation('malay');
					f11.add( Validate.Presence );
                    
                    </script>
                    
                    </td>
                  </tr>
                  <tr>
                    <td>Name (English)</td>
                    <td>:</td>
                    <td>
                      <input name="english" type="text" id="english" size="50" />
                        <script type="text/javascript">
					var f12 = new LiveValidation('english');
						f12.add( Validate.Presence );
                        
                        </script>
                      
                      
                  </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="button3" id="button3" value="    Save   " />
                        <input type="reset" name="button4" id="button4" value="   Reset   " />
                        <input name="type" type="hidden" id="type" value="addpengangkutan" /></td>
                  </tr>
                </table>
			  </form>            
	  </div>
</div>