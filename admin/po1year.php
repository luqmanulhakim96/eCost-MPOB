
<script>
var check=0;
function checkProgress()
{

	for(i = 0; i<= document.form1.elements.length; i++)
	{
			if(document.form1.elements[i].value =="")
			{
				document.form1.action='home.php?id=po2year&po2=<? echo $_GET['po2'];?>&pol=<? echo $_GET['pol']; ?>&po3=false&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>';

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
		document.getElementById("divtotal").style.visibility='hidden';
		document.getElementById("set").style.left='1230px';
		document.getElementById("clickme").style.visibility='visible';
	}
	else
	{
		document.getElementById("divtotal").style.visibility='visible';
		document.getElementById("set").style.left='1020px';
		document.getElementById("clickme").style.visibility='visible';
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
function askformore(val)
{

	var soklan=prompt('Kemaskini soalan','');
	if (soklan!=null && soklan!="")
	  {
	 	document.getElementById("soalanT" + val).innerHTML="<span style='color:red'>"+soklan+"</span>";
		document.getElementById("checkbox" + val).style.visibility='visible';
		document.getElementById("imejasal" + val).style.visibility='hidden';
		document.getElementById("imej" + val).style.visibility='visible';
		document.getElementById("ia" + val).style.visibility='visible';
		document.getElementById("no" + val).style.visibility='visible';
	  }

}
</script>

	<script type="text/javascript">
			$(document).ready(function(){
							$(".tanaman").colorbox({width:"50%", inline:true, href:"#inline_tanaman"});
							$(".belanja").colorbox({width:"50%", inline:true, href:"#inline_belanja"});
							$(".penjagaan").colorbox({width:"50%", inline:true, href:"#inline_penjagaan"});
							$(".pembajaan").colorbox({width:"50%", inline:true, href:"#inline_pembajaan"});
							$(".edittanaman").colorbox();
							$(".editpenjagaan").colorbox();
							$(".editbelanja").colorbox();
							$(".editpembajaan").colorbox();

				});

		</script>

<form id="form1" name="form1" method="post" action="home.php?id=po2year&po2=<? echo $_GET['po2'];?>&pol=<? echo $_GET['pol']; ?>&po3=true&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>">

<table align="left" class="tableCss">


  <tr>
    <td><b>2.1.1</b></td>
    <td colspan="2"><b>Jenis penanaman&nbsp;[<i>type of planted</i>]</b></td>
  </tr>

  <?php
  $con =connect();
  $qp ="select * from tanaman_var ";
  $rp = mysqli_query($con, $qp);
  $p=0;
  while($rowrp=mysqli_fetch_array($rp)){
  ++$p;
  ?>
  <tr>
    <td></td>
    <td width="497"><a href="save_immature.php?type=deletetanaman&id=<?= $rowrp['id_tanaman'];?>" onclick="return confirm('Delete this data?');"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" /></a>
      <a href="save_tanaman.php?id=<?= $rowrp['id_tanaman'];?>" class="edittanaman"><img src="../images/editsmall.png" width="16" height="16" border="0" /></a>
      <?= $p; ?>.&nbsp;&nbsp;<?= $rowrp['nama_malay'];?>&nbsp;[<i><?= $rowrp['nama_english'];?></i>]</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>

  <tr>
    <td><a href="#" class="tanaman"><img src="../images/add_48.png" alt="" width="24" height="24" border="0" title="Jenis penanaman�[type of planted]" /></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.1.2</b></td>
    <td colspan="2"><b>Keluasan Tanaman&nbsp;[<i>Total Planted Area</i>]</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hektar&nbsp;[<i>Hectare</i>]</td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><b>2.1.3.</b></td>
    <td colspan="2"><b>Jumlah kos mengikut operasi&nbsp;[<i>Total cost according to operation</i>]</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">Kos perlu diselaraskan mengikut tahun kewangan Januari--Disember</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">[<i>Cost must be adjusted to the January--Disember financial year</i>]</td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td align="right"><b>a.</b></td>
    <td><b><u>Perbelanjaan Tidak Berulang / <i>Non-Recurrent Expenditures</i></u></b></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td valign="bottom"><a href="#" class="belanja"><img src="../images/add_48.png" alt="" width="24" height="24" border="0" /></a></td>
    <td colspan="2">
    <table width="98%" frame="box" class="subTable">

    <?php
  $qa="select * from belanja_takulang_var order by nama_malay ";
  $ra = mysqli_query($con, $qa);
  $a=0;
  while($rowa=mysqli_fetch_array($ra)){
	++$a;
	?>

      <tr>
        <td width="71" height="34" align="right"><div align="left"><a href="save_immature.php?type=deletebelanja&id=<?= $rowa['id_belanja'];?>" onclick="return confirm('Delete this data?');"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" /></a>
            <a href="save_tanaman.php?id=<?= $rowa['id_belanja'];?>&jenis=editbelanja" class="editbelanja"><img src="../images/editsmall.png" width="16" height="16" border="0" /></a>
            <?= $a; ?>
          .</div></td>
        <td width="858"><?= $rowa['nama_malay'];?>&nbsp;[<i><?= $rowa['nama_english'];?></i>]</td>
        </tr>
        <?php } ?>
    </table></td>
  </tr>
  <tr>
    <td height="8px"></td>
  </tr>
  <tr>
    <td align="right"><b>b.</b></td>
    <td  colspan="2"><b><u>Penjagaan&nbsp;[<i>Upkeep</i>]</u></b></td>
  </tr>
  <tr>
    <td valign="bottom"><a href="#"  class="penjagaan"><img src="../images/add_48.png" alt="" name="imejasal3" width="24" height="24" border="0" /></a></td>
    <td colspan="2"><table width="99%" frame="box" class="subTable">


       <?php
  	$qb="select * from penjagaan_var order by nama_malay ";
  	$rb = mysqli_query($con, $qb);
  	$b=0;
  		while($rowb=mysqli_fetch_array($rb)){
		++$b;
	?>
      <tr>
        <td width="67" align="right"><div align="left"><a href="save_immature.php?id=<?= $rowb['id_penjagaan'];?>&type=deletepenjagaan"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" onclick="return confirm('Delete this data?');" /></a> <a href="save_tanaman.php?id=<?= $rowb['id_penjagaan'];?>&jenis=editpenjagaan" class="editpenjagaan"><img src="../images/editsmall.png" width="16" height="16" border="0" /></a>
          <?= $b; ?>.</div></td>
        <td width="855"><?= $rowb['nama_malay'];?> &nbsp;[<i><?= $rowb['nama_english'];?></i>]</td>
        </tr>
       <?php } ?>



    </table></td>
  </tr>
  <tr>
    <td height="8px"></td>
  </tr>
  <tr>
    <td align="right"><b>c.</b></td>
    <td colspan="2"><b>Pembajaan&nbsp;[<i>Fertilizer Application</i>]</b></td>
  </tr>
  <tr>
    <td valign="bottom"><a href="#" class="pembajaan"><img src="../images/add_48.png" alt="" width="24" height="24" border="0"  id="imejasal4" /></a></td>
    <td colspan="2"><table width="99%" frame="box" class="subTable">


       <?php
  	$qc="select * from pembajaan_var order by nama_malay ";
  	$rc = mysqli_query($con, $qc);
  	$c=0;
  		while($rowc=mysqli_fetch_array($rc)){
		++$c;
	?>
      <tr>
        <td width="67" align="right"><div align="left"><a href="save_immature.php?id=<?= $rowc['id_penjagaan'];?>&type=deletepembajaan"><img src="../images/001_02.gif" alt="" width="16" height="16" border="0" onclick="return confirm('Delete this data?');" /></a> <a href="save_tanaman.php?id=<?= $rowc['id_pembajaan'];?>&jenis=editpembajaan" class="editpembajaan"><img src="../images/editsmall.png" width="16" height="16" border="0" /></a>
          <?= $c; ?>.</div></td>
        <td width="855"><?= $rowc['nama_malay'];?> &nbsp;[<i><?= $rowc['nama_english'];?></i>]</td>
        </tr>
       <?php } ?>



    </table></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><label></label></td>
  </tr>
</table>


</form>
























	<div style="display:none" >
			<div id='inline_tanaman' style='padding:10px; background:#fff;'>
			  <form action="save_immature.php" method="post">
			    <table width="100%">
                  <tr>
                    <td colspan="3"><u><strong>Jenis penanaman [type of planted]</strong></u></td>
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
                        <input name="type" type="hidden" id="type" value="addtanaman" /></td>
                  </tr>
                </table>
			  </form>
	  </div>
</div>








	<div style="display:none" >
			<div id='inline_belanja' style='padding:10px; background:#fff;'>
			  <form action="save_immature.php" method="post">
			    <table width="100%">
                  <tr>
                    <td colspan="3"><u><strong>Perbelanjaan Tidak Berulang / Non-Recurrent Expenditures]</strong></u></td>
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
                        <input name="type" type="hidden" id="type" value="addbelanja" /></td>
                  </tr>
                </table>
			  </form>
	  </div>
</div>
















	<div style="display:none" >
			<div id='inline_penjagaan' style='padding:10px; background:#fff;'>
			  <form action="save_immature.php" method="post">
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
			<div id='inline_pembajaan' style='padding:10px; background:#fff;'>
			  <form action="save_immature.php" method="post">
			    <table width="100%">
                  <tr>
                    <td colspan="3"><u><strong>Pembajaan [Fertilizer Application]</strong></u></td>
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
                        <input name="type" type="hidden" id="type" value="addpembajaan" /></td>
                  </tr>
                </table>
			  </form>
	  </div>
</div>
