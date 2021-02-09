<script>
var check=0;
function checkProgress()
{

	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=home&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=false';
			}
	}

}

</script>

<script type="text/javascript">
			$(document).ready(function(){
							$(".perbelanjaan").colorbox({width:"50%", inline:true, href:"#inline_perbelanjaan"});
							$(".editperbelanjaan").colorbox();

				});

</script>




 <form id="form1" name="form1" method="post" action="home.php?id=home&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=false'">
<table class="tableCss" align="left">

  <tr>
    <td width="52"><b>4.1.</b></td>
    <td colspan="2"><b>MAKLUMAT MENGENAI PERBELANJAAN AM&nbsp;[<i>General Expenses Information</i>]</b></td>
  </tr>

  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td width="594"><b><u>Butiran-butiran kos&nbsp;[<i>Cost Items</i>]</u></b></td>
    <td width="231">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">

    <table width="99%" frame="box" class="subTable">
        <?php
	   $con =connect();
  	$qb="select * from perbelanjaan_am_var order by nama_malay ";
  	$rb = mysqli_query($con, $qb);
  	$b=0;
  		while($rowb=mysqli_fetch_array($rb)){
		++$b;
	?>
        <tr>
          <td width="67" align="right"><div align="left"><a href="save_mature.php?id=<?= $rowb['id_perbelanjaan'];?>&amp;type=deleteperbelanjaan"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" onclick="return confirm('Delete this data?');" /></a> <a href="save_tanaman_mature.php?id=<?= $rowb['id_perbelanjaan'];?>&amp;jenis=editperbelanjaan" class="editperbelanjaan"><img src="../images/editsmall.png" width="16" height="16" border="0" /></a>
                  <?= $b; ?>
            .</div></td>
          <td width="855"><?= $rowb['nama_malay'];?>
            &nbsp;[<i>
              <?= $rowb['nama_english'];?>
            </i>]</td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php } ?>
      </table>


    </td>
  </tr>


      </tr>


  <tr>
    <td><a href="#" class="perbelanjaan"><img src="../images/add_48.png" alt="" width="24" height="24" border="0" title="Maklumat Mengenai Perbelanjaan Am [General Expenses Information]" /></a></td>
    <td colspan="2">

        </td>
  </tr>
</table>
</form>














	<div style="display:none" >
			<div id='inline_perbelanjaan' style='padding:10px; background:#fff;'>
			  <form action="save_mature.php" method="post">
			    <table width="100%">
                  <tr>
                    <td colspan="3"><u><strong>Maklumat Mengenai Perbelanjaan Am [General Expenses Information]</strong></u></td>
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
                        <input name="type" type="hidden" id="type" value="addperbelanjaan" /></td>
                  </tr>
                </table>
			  </form>
	  </div>
</div>
