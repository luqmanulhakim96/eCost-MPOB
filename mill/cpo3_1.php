<?php
$variable[0]=$_SESSION['lesen'];
$variable[1]=$_SESSION['tahun'];
$koslain2 = new user('koslain',$variable);

if($koslain2->total==0)
{
	$con =connect();
	$q="INSERT INTO mill_kos_lain (
lesen ,
tahun ,
kl_1 ,
kl_2 ,
kl_3 ,
kl_4 ,
kl_5 ,
total_kl,status
)
VALUES (
'".$_SESSION['lesen']."', '".$_SESSION['tahun']."', null, null, null, null, null, null,'0'
)
";
	$r=mysqli_query($con, $q);
}

print_r($q);

$pu[0] = $_SESSION['lesen'];
$pu[1]= $_SESSION['tahun']-1;
$bts = new user('bts',$pu);

$koslain = new user('koslain',$variable);

$d= $bts->fbb_proses;
?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<script type="text/javascript" src="../text_js.js"></script>

<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>


<script language="javascript">
var pitmid = false;
	window.onbeforeunload=function() {
		if(pitmid == false)
			var ok = confirm("<?=setstring ( 'mal', 'Simpan sebelum keluar?', 'en', 'Save before proceed?'); ?>");
				if(ok == true) {
					document.form1.action='save_kos_lain.php?status=<?= $koslain2->status; ?>';
					document.form1.submit();
					}
				}
</script>

<script type="text/javascript">
 <?php //echo $bts->bts;?>
var bts_lepas = 0;
var tan_lepas = <?php echo $bts->fbb_proses ?? 0; ?>;

	function field_blur(obj, bts_tan, bts_beza, nilai,nilai_asal, total_nilai,total_bts_tan, total_bts_beza) {
		if(number_only(obj)) {


					jumlah_all =0;
					for(e=1; e<=5; e++ ){
					jumlah= document.getElementById("kl_"+e).value;
					jumlah = jumlah.replace(/,/g,"");
					jumlah_all = Number(jumlah_all)+Number(jumlah);
					$("#kl_"+e).format({format:"#,###.00", locale:"us"});
					}
					document.getElementById("total_kl").value=jumlah_all;
					$("#total_kl").format({format:"#,###.00", locale:"us"});


					jumlahbts_all =0;
					for(b=1; b<=5; b++ ){

					kos= document.getElementById("kl_"+b).value;
					kos = kos.replace(/,/g,"");

					bts = Number(kos)/Number(tan_lepas);
					bts = bulatkan(bts);

					$("#bts_tan_"+b).html(bts);
					$("#bts_tan_"+b).format({format:"#,###.00", locale:"us"});

					jumlahbts_all = Number(jumlahbts_all)+Number(bts);
					}
					$("#total_bts_tan").html(jumlahbts_all);
					$("#total_bts_tan").format({format:"#,###.00", locale:"us"});

				/*total_all=document.getElementById(total_nilai).value;
				total_all = total_all.replace(",","");
				total_btstan=document.getElementById(total_bts_tan).innerHTML;
				total_btstan = total_btstan.replace(",","");				//total_btsbeza=Number(document.getElementById("total_bts_beza").innerHTML);

				//alert(nilai);
				//alert(nilai_asal);

				//alert(bts_tan);
				//alert(total_btstan);alert(total_btsbeza);

 				total_bersih=Number(total_all)-Number(nilai_asal);
				//alert(total_bersih);
				total_bersih = bulatkan(total_bersih);
				new_value=Number(total_bersih)+Number(nilai);
				new_value=bulatkan(new_value);
				//alert(new_value);
				document.getElementById(total_nilai).value=new_value;
				//nilai total

				nilai_bts_tan = Number(nilai)/tan_lepas;
				nilai_bts_tan = bulatkan(nilai_bts_tan);
				//alert(nilai_bts_tan);
				nilai_total_bts_tan = total_btstan-Number(document.getElementById(bts_tan).innerHTML)+nilai_bts_tan;
				$("#"+total_bts_tan).html(nilai_total_bts_tan);
				$("#"+bts_tan).html(nilai_bts_tan);
				//bts_tan

				//nilai_bts_beza = Number(nilai_bts_tan)-bts_lepas;
				//nilai_bts_beza = bulatkan(nilai_bts_beza);
				//alert(nilai_bts_beza);
				//$("#"+bts_beza).html(nilai_bts_beza);
				//bts_beza

				$(obj).format({format:"#,###.00", locale:"us"});
				$("#"+total_nilai).format({format:"#,###.00", locale:"us"});
				$("#"+total_bts_tan).format({format:"#,###.00", locale:"us"});

				$("#"+bts_tan).format({format:"#,###.00", locale:"us"});
				$("#"+bts_beza).format({format:"#,###.00", locale:"us"}); */


		}
		else {
			$("#" + obj_id).html("0.00");
		}
		$(obj).format({format:"#,###.00", locale:"us"});
	}
	function field_click(obj) {
		$(obj).format({format:"#,###.00", locale:"us"});
		$(obj).removeClass("field_edited");
		$(obj).addClass("field_active");
	}
</script>

<script language="javascript">
function hantar(x)
{

	document.form1.action = "save_kos_lain.php?status="+x;
	document.form1.target = "_parent";
	document.form1.submit();
}
</script>



<!-- <style type="text/css">
.style1 {
	font-size: 14px;
	font-weight: bold;
}
.style2 {
	color: #330066;
	font-weight: bold;
}
</style> -->
<form id="form1" name="form1" method="post" action="">
  <table width="90%" align="center" class="tableCss">
    <tr>
      <td height="31" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td width="1106" height="31" colspan="4"><span class="style1"><?=setstring ( 'mal', 'KOS-KOS LAIN', 'en', 'OTHER COST'); ?></span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><table width="90%" align="center" cellspacing="0" frame="box" class="subTable">
          <tr>
            <td height="46" align="right" valign="middle" background="../images/tb_BG.gif">&nbsp;</td>
            <td height="46" align="right" valign="middle" background="../images/tb_BG.gif"><div align="left"><strong><?=setstring ( 'mal', 'Jenis Kos', 'en', 'Cost Item'); ?></strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Jumlah Kos', 'en', 'Cost Amaunt'); ?><br />
              (RM)</strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?><br />
              (RM)</strong></div></td>
            <td background="../images/tb_BG.gif"><div align="center"><strong><?=setstring ( 'mal', 'Perubahan Kos Per Tan BTS dengan Tahun Lepas', 'en', 'Different of Cost Per Tonne FFB with Last Year'); ?><br />
              (%)</strong></div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td width="23" height="50" align="center" valign="middle">1.</td>
            <td width="353" align="left" valign="middle"><span style="cursor:help"><?=setstring ( 'mal', 'Kos penghantaran. Caj kemudahan pukal, pengangkutan, pengendalian &amp; insuran&nbsp;', 'en', 'Forwarding Expenses
- Bulking installation charges, freight, transport & handling, insurance'); ?></span><br /></td>
            <td width="161" align="center" valign="middle"><input name="kl_1" type="text" autocomplete="off" class="field_active" id="kl_1" onchange="field_blur(this,'bts_tan_1','bts_beza_1',this.value,'<?= $koslain->kl_1; ?>','total_kl','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($koslain->kl_1,2); ?>" /></td>
            <td width="151" align="center" valign="middle" bgcolor="#99FF99"><div align="center" id="bts_tan_1"><?php $k1=$koslain->kl_1/$d; echo number_format($k1,2);?></div></td>
            <td width="165" align="center" valign="middle"><div align="center" id="bts_beza_1">0.00</div></td>
          </tr>
          <tr>
            <td height="39" align="center" valign="middle">2.</td>
            <td align="left" valign="middle"><?=setstring ('mal','Cukai jualan (untuk kilang di Sabah dan Sarawak)', 'en','Sales tax (for mills in Sabah and Sarawak)')?> <br /></td>
            <td align="center" valign="middle"><input name="kl_2" type="text" autocomplete="off" class="field_active" id="kl_2" onchange="field_blur(this,'bts_tan_2','bts_beza_2',this.value,'<?= $koslain->kl_2; ?>','total_kl','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($koslain->kl_2,2); ?>" /></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_2"><?php $k2=$koslain->kl_2/$d; echo number_format($k2,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_2">0.00</div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td height="41" align="center" valign="middle">3.</td>
            <td align="left" valign="middle"><?=setstring ('mal', 'Perbelanjaan jualan (termasuk komisyen)', 'en', 'Selling expenses (including commission)')?><br /></td>
            <td align="center" valign="middle"><input name="kl_3" type="text" autocomplete="off" class="field_active" id="kl_3" onchange="field_blur(this,'bts_tan_3','bts_beza_3',this.value,'<?= $koslain->kl_3; ?>','total_kl','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($koslain->kl_3,2); ?>" /></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_3"><?php $k3=$koslain->kl_3/$d; echo number_format($k3,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_3">0.00</div></td>
          </tr>
          <tr>
            <td height="40" align="center" valign="middle">4.</td>
            <td align="left" valign="middle"><?=setstring ( 'mal', 'Ses MPOB', 'en', 'Cess MPOB'); ?></td>
            <td align="center" valign="middle"><input name="kl_4" type="text" autocomplete="off" class="field_active" id="kl_4" onchange="field_blur(this,'bts_tan_4','bts_beza_4',this.value,'<?= $koslain->kl_1; ?>','total_kl','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($koslain->kl_4,2); ?>" /></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_4"><?php $k4=$koslain->kl_4/$d; echo number_format($k4,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_4">0.00</div></td>
          </tr>
          <tr bgcolor="#99FF99">
            <td height="37" align="center" valign="middle">5.</td>
            <td align="left" valign="middle"><?=setstring ( 'mal', 'Perbelanjaan lain', 'en', 'Other Expenditure'); ?></td>
            <td align="center" valign="middle"><input name="kl_5" type="text" autocomplete="off" class="field_active" id="kl_5" onchange="field_blur(this,'bts_tan_5','bts_beza_5',this.value,'<?= $koslain->kl_4; ?>','total_kl','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onKeypress="keypress(event)" value="<?php echo number_format($koslain->kl_5,2); ?>" /></td>
            <td align="center" valign="middle"><div align="center" id="bts_tan_5"><?php $k5=$koslain->kl_5/$d; echo number_format($k5,2);?></div></td>
            <td align="center" valign="middle"><div align="center" id="bts_beza_5">0.00</div></td>
          </tr>
          <tr>
            <td height="17" align="center" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
          </tr>
          <tr bgcolor="#FFFFCC">
            <td height="37" style="border-top:solid #333333 1px;" align="center" valign="middle">&nbsp;</td>
            <td align="left" valign="middle" bgcolor="#FFFFCC" style="border-top:solid #333333 1px;"><span class="style2">
              <?=setstring ( 'mal', 'Jumlah keseluruhan', 'en', 'Total'); ?>
            </span></td>
            <td align="center" style="border-top:solid #333333 1px;" valign="middle"><input name="total_kl" type="text" class="field_active" id="total_kl" onchange="field_blur(this,'bts_tan_5','bts_beza_5',this.value,'<?= $koslain->kl_5; ?>','total_kl','total_bts_tan', 'total_bts_beza')" onclick="field_click(this)" onkeypress="keypress(event)" value="<?php echo number_format($koslain->total_kl,2); ?>" readonly="true" autocomplete="off"/></td>
            <td align="center" style="border-top:solid #333333 1px;" valign="middle"><div align="center" id="total_bts_tan">
              <?php $total_bts_tan = $k1+$k2+$k3+$k4+$k5; echo number_format($total_bts_tan,2);?>
            </div></td>
            <td align="center" style="border-top:solid #333333 1px;" valign="middle"><div align="center">0.00</div></td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td height="37" align="center" valign="middle" style="border-top:solid #333333 1px;">&nbsp;</td>
            <td align="left" valign="middle" style="border-top:solid #333333 1px;"><span class="style2"><?=setstring ( 'mal', 'Harga purata isirong yang didapati pada tahun lepas', 'en', 'Mean of kernel price obtained last year'); ?> (RM)</span></td>
            <td align="center" valign="middle" style="border-top:solid #333333 1px;">


            <script language="javascript">
            function tukarnombor(obj){
						if(number_only(obj)){
						$(obj).format({format:"#,###.00", locale:"us"});
						$(obj).removeClass("field_edited");
						$(obj).addClass("field_active");
						}
			}
            </script>

            <?php

					$con =connect();
					$qisi="select * from mill_isirung where lesen = '".$_SESSION['lesen']."' and tahun ='".$_SESSION['tahun']."' limit 1";
					$risi=mysqli_query($con, $qisi);
					$rowisi=mysqli_fetch_array($risi);
					$totalisi = mysqli_num_rows($risi);

					if($totalisi==0){
							$con =connect();
							$q="insert into mill_isirung (lesen,tahun) values ('".$_SESSION['lesen']."','".$_SESSION['tahun']."')";
							$r=mysqli_query($con, $q);

				}


			?>
            <input name="isirung" type="text" class="field_active" id="isirung" onchange="tukarnombor(this)"  onkeypress="keypress(event)" value="<?php echo number_format($rowisi['isirung'],2); ?>"  autocomplete="off"/>





            </td>
            <td align="center" valign="middle" style="border-top:solid #333333 1px;">&nbsp;</td>
            <td align="center" valign="middle" style="border-top:solid #333333 1px;">&nbsp;</td>
          </tr>
        </table>
        <br />
      </td>
    </tr>
    <tr>
      <td colspan="4">
          <div align="center">
            <?php
		  	if(isset($_GET['print'])) {
		  ?>
            <input name="submit" type="submit" value="Print" />
            <?php
		   }
		   else {
		  ?><div id="no-print">
            <input type="button" name="button2" id="button2" value=<?=setstring ( 'mal', '"Simpan"', 'en', '"Save"'); ?> onclick="hantar(2); " />
            <input type="button" name="button" id="button" value=<?=setstring ( 'mal', '"Simpan &amp; Seterusnya"', 'en', '"Save &amp; Next"'); ?>  onclick="pitmid=true; hantar(1);"/>
            <input name="cetak" type="button" value="<?php echo setstring ( 'mal', 'Kembali', 'en', 'Back'); ?>" onclick="window.location.href='home.php?id=kos_proses'"   />
            </div>
			<?php
			}
			?>
            <input name="lesen" type="hidden" id="lesen" value="<?= $_SESSION['lesen'];?>" />
            <input name="tahun" type="hidden" id="tahun" value="<?= $_SESSION['tahun'];?>" />
          </div>
       </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </table>
</form>
