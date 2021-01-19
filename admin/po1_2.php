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


	<script type="text/javascript">
			$(document).ready(function(){
							$(".work").colorbox({width:"50%", inline:true, href:"#inline_work"});
							$(".pekerja").colorbox({width:"50%", inline:true, href:"#inline_pekerja"});	
							$(".machine").colorbox();
				});			
				
		</script>
        
<script type="text/javascript">
function simpanmachine(nilai, id)
{
	//alert(nilai);
	//alert(id);
	
	var pasti = confirm('Update this value?');
	if(pasti){
	window.location.href='save_work.php?type=updatemachine&id='+id+'&value='+nilai;
	}
}
</script>

<b>1.8&nbsp;&nbsp; Bilangan pekerja mengikut kategori[<i>Number of workers according to work categories</i>]</b>
<br>
<form id="form1" name="form1" method="post" action="home.php?id=po1year&po2=true&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><table width="99%" align="center" >
      <tr align="center">
        <td colspan="2"><div align="left"><b>Kategori Kerja[<i>work category</i>]</b></div></td>
        </tr>
      <tr align="center">
        <td colspan="2"><div align="left">
          <table width="100%">
            <tr>
              <td width="4%"><a href="#" class='pekerja'><img src="../images/add_48.png" width="24" height="24" border="0" /></a></td>
              <td width="96%"><a href="#" class="pekerja"><strong>Add new work categories</strong></a></td>
            </tr>
          </table>
        </div></td>
      </tr>
      <?php $con =connect();
  		$qp ="select * from pekerja order by nama_pekerja";
	  $rp = mysql_query($qp,$con);
	  while ($rowrp = mysql_fetch_array($rp)){
	  ?>
      <tr align="center">
        <td height="52" colspan="2" ><div align="left"><strong>Category :</strong>
        <?= $rowrp['nama_pekerja'];?> [<em><?= $rowrp['nama_pekerja_english'];?></em>]
        <a href="save_work.php?type=removepekerja&amp;id=<?= $rowrp['id_pekerja']; ?>" onclick="return confirm('Delete this data?');"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" /></a></div></td>
      </tr>
      
      <?php 
	  
	  $qpa ="select * from pekerja_var where nama_pekerja = '".$rowrp['nama_pekerja']."' order by var_malay";
	  $rpa = mysql_query($qpa,$con);
	  while ($rowrpa = mysql_fetch_array($rpa)){
	  ?>
      <tr align="center">
        <td width="33" height="21" ><div align="right"><a href="save_work.php?type=removepekerjavar&id=<?= $rowrpa['id_pekerja_var'];?>" onclick="return confirm('Delete this data?');"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" /></a></div></td>
        <td width="1012" ><div align="left"><?= $rowrpa['var_malay'];?> [<em><?= $rowrpa['var_english'];?></em>]</div></td>
      </tr>
      
      	<?php } ?>
        <tr align="center">
        <td><a href="save_pekerja.php?id=<?= $rowrp['nama_pekerja'];?>" class="machine"><img src="../images/add_48 - small.png" width="20" height="20" border="0" title="Add new data for <?= ucfirst($rowrp['nama_pekerja']);?>"  /></a></td>
        <td ><div align="left"><a href="save_pekerja.php?id=<?= $rowrp['nama_pekerja'];?>" class="machine">Clik here to add new data</a></div></td>
      </tr>
      <?php } ?>
      
    </table></td>
  </tr>
  
  
  <tr>
    <td colspan="2"></td>
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
    <td colspan="2"><b>1.9 &nbsp;&nbsp;  Penggunaan jentera ladang [<i>Form mechanizations</i>].</b></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%">
      <tr>
        <td width="4%"><a href="#" class='work'><img src="../images/add_48.png" width="24" height="24" border="0" /></a></td>
        <td width="96%"><a href="#" class="work"><strong>Add new form mechanizations</strong></a></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="99%" align="center" id="box-table-a" style="border:#333333 1px solid;">
      <tr align="center">
        <th colspan="2"><b>Kategori Kerja<br/>
          [<i>Work Categories</i>]</b></th>
        <th width="347"><b>Jenis Jentera<br/>
          [<i>Type of Machine</i>]</b></th>
      </tr>
      
      <?php $con =connect();
		$qj ="select * from jentera_var order by nama_jentera";
	  $rj = mysql_query($qj,$con);
	  $j=0;
	  while($rowrj = mysql_fetch_array($rj)){
	  ?>
      <tr>
        <td width="78" height="44" ><div align="right"><?= ++$j; ?>.</div></td>
        <td width="616"><a href="save_work.php?type=remove&amp;id=<?= $rowrj['nama_jentera'];?>" onclick="return confirm('Delete this work category?');"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" /></a>
          <?= $rowrj['nama_malay'];?> <br />[<i><?= $rowrj['nama_english'];?></i>]</td>
        <td align="center">
        
        <?php
		
		$con =connect(); 
      $qjen ="select * from jentera  where kategori_jentera ='".$rowrj['nama_jentera']."'  order by nama_jentera";
	  $rjen = mysql_query($qjen,$con);
	  $jen=0;
	  while($rowrjen = mysql_fetch_array($rjen)){
		
		?>
        <div align="left">
         <?= ++$jen; ?> .<a href="save_work.php?type=removemachine&amp;id=<?= $rowrjen['id_jentera'];?>" onclick="return confirm('Delete this machine?');"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" /></a> 
         <input name="<?= $rowrj['nama_jentera'];?>[<?= $jen; ?>]" type="text" id="<?= $rowrj['nama_jentera'];?>[<?= $jen; ?>]" style="border-color:#999999; border: hidden" value="<?= $rowrjen['nama_jentera']; ?>" size="40" onchange="simpanmachine(this.value,'<?= $rowrjen['id_jentera'];?>')" />
          <br />
        </div>
        <div align="left">
          <?php } ?>  
          <a href="save_machine.php?id=<?= $rowrj['nama_jentera'];?>" class="machine"><img src="../images/add_48 - small.png" width="20" height="20" border="0" title="Add new machine"  /></a> </div></td>
      </tr>
   
      <?php } ?>
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
    <td>&nbsp;</td>
  </tr>
</table>
</form> 
<br>


<div  style='display:none'>
			<div id='inline_work' style='padding:10px; background:#fff;'>
			  <form action="save_work.php" method="post">
			    <table width="100%">
                  <tr>
                    <td colspan="3"><u><strong>Add machine</strong></u></td>
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
                        <input name="type" type="hidden" id="type" value="add" /></td>
                  </tr>
                </table>
			  </form>            
	  </div>
</div>
        
        
        
        
	<div style="display:none" >
			<div id='inline_pekerja' style='padding:10px; background:#fff;'>
			  <form action="save_work.php" method="post">
			    <table width="100%">
                  <tr>
                    <td colspan="3"><u><strong>Add machine</strong></u></td>
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
                        <input name="type" type="hidden" id="type" value="addpekerja" /></td>
                  </tr>
                </table>
			  </form>            
	  </div>
</div>
