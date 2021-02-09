<?php
/*
 *      Filename: mill/buruh.php
 *      Copyright 2010 Malaysia Palm Oil Board <azman@mpob.gov.my>
 *		Last update: 15.10.2010 11:46:16 am
 */
$variable[0]=$_SESSION['lesen'];
$variable[1]=$_SESSION['tahun'];
$buruh2 = new user('buruh',$variable);
if($buruh2->total==0)
{
	$con =connect();
	$q="INSERT INTO mill_buruh
VALUES (
'".$_SESSION['lesen']."', '".$_SESSION['tahun']."', '', '', '', '', '', ''
,'','','','','','',
'','','','','',''
,'0'
)
";
	$r=mysqli_query($con, $q);
}

$pu[0] = $_SESSION['lesen'];
$pu[1]= $_SESSION['tahun']-1;
$bts = new user('bts',$pu);
$buruh = new user('buruh',$variable);
?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<link type="text/css" media="screen" rel="stylesheet" href="../js/colorbox/colorbox.css" />
<script type="text/javascript" src="../js/colorbox/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".warga").colorbox();
	});
</script>
<script language="javascript">
var pitmid = false;
	window.onbeforeunload=function() {
		if(pitmid == false)
			var ok = confirm("<?=setstring ( 'mal', 'Adakah anda mahu simpan terlebih dahulu sebelum keluar?', 'en', 'Do you want to save first?'); ?>");
				if(ok == true) {
	document.form1.action='save_buruh.php?status=<?= $buruh2->status; ?>';
	document.form1.submit();
	}
}
</script>

<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>

<script language="javascript">
function hantar(x)
{
	document.form1.action = "save_buruh.php?status="+x;
	document.form1.target = "_parent";
	document.form1.submit();
}

function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function kiraan_baru(nilai_baru, nilai_asal,field_total)
{
					jumlah_all =0;
					for(e=1; e<=5; e++ ){
					jumlah= document.getElementById("mb_"+e).value;
					jumlah = jumlah.replace(/,/g,"");
					jumlah_all = Number(jumlah_all)+Number(jumlah);
					}
					document.getElementById("total_mb").value=jumlah_all;


					jumlah_allb =0;
					for(b=1; b<=5; b++ ){
					jumlahb= document.getElementById("mb_"+b+"b").value;
					jumlahb = jumlahb.replace(/,/g,"");
					jumlah_allb = Number(jumlah_allb)+Number(jumlahb);
					}
					document.getElementById("total_mb_b").value=jumlah_allb;


					jumlah_allc =0;
					for(c=1; c<=5; c++ ){
					jumlahc = document.getElementById("mb_"+c+"c").value;
					jumlahc = jumlahc.replace(/,/g,"");
					jumlah_allc = Number(jumlah_allc)+Number(jumlahc);
					}
					document.getElementById("total_mb_c").value=jumlah_allc;


	/*total_asal=document.getElementById(field_total).value;
	total_asal = total_asal.replace(",","");
	if(total_asal >0){
 	total_bersih=Number(total_asal)-Number(nilai_asal);
	}
	else{total_bersih=0;}
	new_value=Number(total_bersih)+Number(nilai_baru);
	new_value=bulatkan(new_value);
	nilai_baru=bulatkan(nilai_baru);

	document.getElementById(field_total).value=new_value;*/

	//alert(nilai_baru);alert(nilai_asal);alert(new_value);	alert(total_asal);

}

</script>


<form id="form1" name="form1" method="post" action="">
  <table width="90%" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div style="text-align:center;"><h2><?=setstring ( 'mal', 'BILANGAN PEKERJA MENGIKUT KATEGORI', 'en', 'WORKERS NO. ACCORDING TO CATEGORY'); ?><br />
        <?=setstring ( 'mal', '(tidak termasuk pekerja pejabat)', 'en', '(excluding the office staff)'); ?></h2></div></td>
    </tr>
	<tr>
		<td colspan="2">
			<div id="no-print" style="text-align:center; text-decoration:blink;">
				<h1><?=setstring ( 'mal', 'Arahan : Sila klik <img src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /> untuk masukkan data', 'en', 'Instruction : Click <img src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /> to insert data'); ?></h1>
			</div>
		</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="90%" align="center" cellspacing="0"  frame="box" class="subTable">
          <tr>
            <td width="261" rowspan="2" align="left" background="../images/tb_BG.gif"><strong> <?=setstring ( 'mal', 'Jenis Buruh', 'en', 'Work Category'); ?></strong></td>
            <td height="32" colspan="3" align="center" background="../images/tb_BG.gif"><strong><?=setstring ( 'mal', 'Bilangan', 'en', 'No.'); ?></strong></td>
          </tr>
          <tr>
            <td width="170" height="38" align="center" background="../images/tb_BG.gif"><strong><?=setstring ( 'mal', 'Buruh Asing', 'en', 'Foreign Worker'); ?><br />
            </strong></td>
            <td width="163" align="center" background="../images/tb_BG.gif"><strong> <?=setstring ( 'mal', 'Buruh Tempatan', 'en', 'Local Worker'); ?><br />
            </strong></td>
            <td width="144" align="center" background="../images/tb_BG.gif"><strong><?=setstring ( 'mal', 'Kekurangan', 'en', 'Shortage'); ?> <br />
            </strong></td>
          </tr>
          <tr>
            <td height="37" align="left" bgcolor="#99FF99">1. <?=setstring ( 'mal', 'Penyelia', 'en', 'Supervisor'); ?></td>
            <td align="center" bgcolor="#99FF99"><input name="mb_1" type="text" class="field_active" id="mb_1" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_1;?>','total_mb')" value="<?php echo $buruh->mb_1; ?>" size="10" readonly="true" autocomplete="off"  />

               <a href="warga.php?type=FOREIGN&amp;field=mb_1" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a>

            </td>
            <td align="center" bgcolor="#99FF99"><input name="mb_1b" type="text" class="field_active" id="mb_1b" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_1b;?>','total_mb_b')" value="<?php echo $buruh->mb_1b; ?>" size="10" readonly="true" autocomplete="off"  />
            <a href="warga.php?type=LOCAL&amp;field=mb_1b" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
            <td align="center" bgcolor="#99FF99"><input name="mb_1c" type="text" autocomplete="off" class="field_active" id="mb_1c" value="<?php echo $buruh->mb_1c; ?>" size="10" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_1c;?>','total_mb_c')" /></td>
          </tr>
          <tr>
            <td height="36" align="left"><div align="left">2. <?=setstring ( 'mal', 'Pemasang/Mekanik', 'en', 'Installer/Mechanics'); ?> </div></td>
            <td align="center"><input name="mb_2" type="text" class="field_active" id="mb_2" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_2;?>','total_mb')" value="<?php echo $buruh->mb_2; ?>" size="10" readonly="true" autocomplete="off" />
            <a href="warga.php?type=FOREIGN&amp;field=mb_2" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
            <td align="center"><input name="mb_2b" type="text" class="field_active" id="mb_2b" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_2b;?>','total_mb_b')" value="<?php echo $buruh->mb_2b; ?>" size="10" readonly="true" autocomplete="off"/>
            <a href="warga.php?type=LOCAL&amp;field=mb_2b" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
            <td align="center"><input name="mb_2c" type="text" autocomplete="off" class="field_active" id="mb_2c" value="<?php echo $buruh->mb_2c; ?>" size="10" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_2c;?>','total_mb_c')"/></td>
          </tr>
          <tr>
            <td height="37" align="left" bgcolor="#99FF99"><div align="left">3. <?=setstring ( 'mal', 'Pekerja kilang', 'en', 'Mill worker'); ?></div></td>
            <td align="center" bgcolor="#99FF99"><input name="mb_3" type="text" class="field_active" id="mb_3" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_3;?>','total_mb')" value="<?php echo $buruh->mb_3; ?>" size="10" readonly="true" autocomplete="off" />
            <a href="warga.php?type=FOREIGN&amp;field=mb_3" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
            <td align="center" bgcolor="#99FF99"><input name="mb_3b" type="text" class="field_active" id="mb_3b" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_3b;?>','total_mb_b')" value="<?php echo $buruh->mb_3b; ?>" size="10" readonly="true" autocomplete="off"/>
            <a href="warga.php?type=LOCAL&amp;field=mb_3b" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
            <td align="center" bgcolor="#99FF99"><input name="mb_3c" type="text" autocomplete="off" class="field_active" id="mb_3c" value="<?php echo $buruh->mb_3c; ?>" size="10" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_3c;?>','total_mb_c')"/></td>
          </tr>
          <tr>
            <td height="40" align="left"><div align="left">4. <?=setstring ( 'mal', 'Penjaga dandang', 'en', 'Boilermen'); ?> </div></td>
            <td align="center"><input name="mb_4" type="text" class="field_active" id="mb_4" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_4;?>','total_mb')" value="<?php echo $buruh->mb_4; ?>" size="10" readonly="true" autocomplete="off"/>
            <a href="warga.php?type=FOREIGN&amp;field=mb_4" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
            <td align="center"><input name="mb_4b" type="text" class="field_active" id="mb_4b" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_4b;?>','total_mb_b')" value="<?php echo $buruh->mb_4b; ?>" size="10" readonly="true" autocomplete="off"/>
            <a href="warga.php?type=LOCAL&amp;field=mb_4b" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
            <td align="center"><input name="mb_4c" type="text" autocomplete="off" class="field_active" id="mb_4c" value="<?php echo $buruh->mb_4c; ?>" size="10" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_4c;?>','total_mb_c')"/></td>
          </tr>
          <tr>
            <td height="42" align="left" bgcolor="#99FF99"><div align="left">5. <?=setstring ( 'mal', 'Lain-lain ', 'en', 'Other'); ?></div></td>
            <td align="center" bgcolor="#99FF99"><input name="mb_5" type="text" class="field_active" id="mb_5" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_5;?>','total_mb')" value="<?php echo $buruh->mb_5; ?>" size="10" readonly="true" autocomplete="off"/>
            <a href="warga.php?type=FOREIGN&amp;field=mb_5" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
            <td align="center" bgcolor="#99FF99"><input name="mb_5b" type="text" class="field_active" id="mb_5b" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_5b;?>','total_mb_b')" value="<?php echo $buruh->mb_5b; ?>" size="10" readonly="true" autocomplete="off"/>
            <a href="warga.php?type=LOCAL&amp;field=mb_5b" class='warga' ><img id="no-print" src="../images/add_48.png" alt="sss" width="16" height="16" border="0" /></a></td>
            <td align="center" bgcolor="#99FF99"><input name="mb_5c" type="text" autocomplete="off" class="field_active" id="mb_5c" value="<?php echo $buruh->mb_5c; ?>" size="10" onchange="kiraan_baru(this.value, '<?php echo $buruh->mb_5c;?>','total_mb_c')"/></td>
          </tr>
          <tr bgcolor="#FFFFCC">
            <td height="36" align="left" bgcolor="#FFFFCC"><span ><b><?=setstring ( 'mal', 'Jumlah keseluruhan', 'en', 'Total'); ?></b> </span></td>
            <td align="center"><input name="total_mb" type="text" class="field_total" id="total_mb" value="<?php
			$total_mb = $buruh->mb_1+$buruh->mb_2+$buruh->mb_3+$buruh->mb_4+$buruh->mb_5;
			echo $total_mb; ?>" size="10" readonly="true" autocomplete="off" /></td>
            <td align="center"><input name="total_mb_b" type="text" class="field_total" id="total_mb_b" value="<?php
			$total_mb_b = $buruh->mb_1b+$buruh->mb_2b+$buruh->mb_3b+$buruh->mb_4b+$buruh->mb_5b;
			echo $total_mb_b; ?>" size="10" readonly="true" autocomplete="off" /></td>
            <td align="center"><input name="total_mb_c" type="text" class="field_total" id="total_mb_c" value="<?php
			$total_mb_c=$buruh->mb_1c+$buruh->mb_2c+$buruh->mb_3c+$buruh->mb_4c+$buruh->mb_5c;
			echo $total_mb_c; ?>" size="10" readonly="true" autocomplete="off" /></td>
          </tr>
          <tr>
            <td height="17" align="left">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td><div align="center">
          <?php
		  	if(isset($_GET['print'])) {
		  ?>
          <input name="submit" type="submit" value="Print" />
          <?php
		   }
		   else {
		  ?><div id="no-print">
          <input type="button" name="button2" id="button2" value=<?=setstring ( 'mal', '"Simpan"', 'en', '"Save"'); ?> onclick="hantar(2)" />
          <input type="button" name="button" id="button" value=<?=setstring ( 'mal', '"Simpan &amp; Seterusnya"', 'en', '"Save &amp; Next"'); ?> onclick="hantar(1)"/>
             <input name="cetak" type="button" value="<?php echo setstring ( 'mal', 'Kembali', 'en', 'Back'); ?>" onclick="window.location.href='home.php?id=kos_lain'"   />
</div>
          <?php
			}
			?>
          <input name="lesen" type="hidden" id="lesen" value="<?= $_SESSION['lesen'];?>" />
          <input name="tahun" type="hidden" id="tahun" value="<?= $_SESSION['tahun'];?>" />
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
