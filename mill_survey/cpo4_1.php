<?php $variable[0]=$_SESSION['lesen'];
$variable[1]=$_COOKIE['tahun_report'];

$bts = new user('bts',$_SESSION['lesen']);
$proses = new user('pemprosesan',$variable);
$koslain = new user('koslain',$variable);

function mill_proses($var){
		$con = connect();
		$q ="select * from mill_pemprosesan where lesen = '".$var[0]."' and tahun = '".$var[1]."'";
		$r = mysqli_query($con, $q);
		$row =  mysqli_fetch_array($r);
		$stat[0]=$row['status'];
		return $stat;
}

function mill_kos_lain($var){
		$con =connect();
		$q ="select * from mill_kos_lain where lesen = '".$var[0]."' and tahun = '".$var[1]."'";
		$r = mysqli_query($con, $q);
		$row =  mysqli_fetch_array($r);
		$stat[0]=$row['status'];
		return $stat;
}

$mp = mill_proses($variable);
$mll = mill_kos_lain ($variable);
?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />

<!--<script language="javascript">
var pitmid = false;
	window.onbeforeunload=function() {
		if(pitmid == false)
			var ok = confirm("<?=setstring ( 'mal', 'Simpan sebelum keluar?', 'en', 'Save before proceed?'); ?>");
				if(ok == true) {
document.form1.action='home.php?id=home&amp;finished=true&amp;ringkasan=true';
document.form1.submit();
		}
}
</script>-->


<style type="text/css">
<!--
.style1 {font-style: italic}
-->
</style>
<form action="mail_ringkasan.php" method="post" name="form1" id="form1">
<table align="left" class="tableCss">

  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="51">&nbsp;</td>
    <td width="824" colspan="2"><span  style="text-transform:uppercase; font-weight:bold; "><?=setstring ( 'mal', 'Kos Pemprosesan BTS Dikilang Tuan', 'en', 'FFB Processing Cost at Your Mill'); ?></span></td>
  </tr>

  <tr>
    <td height="10px"></td>
  </tr>

  <tr>
    <td></td>
    <td colspan="2"><table width="90%" align="center" cellspacing="0" frame="box" class="subTable">
      <tr>
        <td height="38" colspan="2" align="right" background="../images/tb_BG.gif"><div align="left"><strong><?=setstring ( 'mal', 'Jenis', 'en', 'Type'); ?></strong></div></td>
        <td background="../images/tb_BG.gif"><div align="right"><strong><?=setstring ( 'mal', 'Kos Per Tan', 'en', 'Cost Per Tonne'); ?> (RM)</strong></div></td>
        <td background="../images/tb_BG.gif">&nbsp;</td>
      </tr>
      <tr>
        <td width="25" height="38" align="right" bgcolor="#99FF99">1.</td>
        <td width="439" bgcolor="#99FF99"><a href="home.php?id=kos_proses">
        <?php
		//echo $mp[0];

		if($mp[0]=="2"){ ?>
        <img src="images/001_11.gif" width="24" height="24" border="0" />
        <?php } ?>

          <?=setstring ( 'mal', 'Kos Pemprosesan BTS', 'en', 'FFB Processing Cost'); ?></a></td>
        <td width="255" bgcolor="#99FF99"><div align="right">
          <?php
		//  echo $proses->total_kp."<br>".$bts->fbb_proses;

		  $d=($proses->total_kp/$bts->fbb_proses); echo number_format($d,2);?>
        </div></td>
        <td width="13" bgcolor="#99FF99">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="right">2.</td>
        <td><a href="home.php?id=kos_lain">

        <?php
		//echo $mll[0];
		if($mll[0]=="2"){ ?>
        <img src="images/001_11.gif" width="24" height="24" border="0" />
         <?php } ?>

		  <?=setstring ( 'mal', 'Kos Lain-lain', 'en', 'Other Expenditure'); ?></a></td>
        <td>
          <div align="right"><?php
		  $d2=($koslain->total_kl/$bts->fbb_proses); echo number_format($d2,2);?></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#99FF99">&nbsp;</td>
        <td bgcolor="#99FF99"><strong> <?=setstring ( 'mal', 'Jumlah Kos Pemprosesan', 'en', 'Total Processing Cost'); ?></strong></td>
        <td bgcolor="#99FF99">
          <div align="right"><span id"a" style="text-decoration:blink">
            <strong><?php $jd = $d+$d2; echo number_format($jd,2);?></strong>
          </span></div></td>
        <td bgcolor="#99FF99">&nbsp;</td>
      </tr>

    </table></td>
  </tr>

  <tr>
    <td></td>
    <td colspan="2"><div align="center" id="no-print">
      <p><?php if($_SESSION['view']!="true"){ ?>    <input type="submit" value=<?=setstring ( 'mal', '"Hantar ke MPOB" ', 'en', '"Send to MPOB"'); ?> onclick="pitmid = true; return confirm('Anda pasti untuk simpan dan sahkan?')" />
        <input name="selesai" type="hidden" id="selesai" value="1" />
        <input name="cetak" type="button" value=<?=setstring ( 'mal', '"Cetak"', 'en', '"Print"'); ?> onclick="window.print()" />
<?php } ?>



      </p>
      <table width="100%">
        <tr>
          <td width="5%"><a href="home.php?id=kos_lain"><img src="images/001_11.gif" alt="" width="24" height="24" border="0" /></a></td>
          <td colspan="3"><em>

          <?php $bm ="Tanda ini menunjukkan data anda adalah &quot;<strong>Simpan Sementara</strong>&quot;. <br />
            Sila klik &quot;<strong>Simpan dan Sahkan</strong>&quot; untuk mengesahkan data anda. Harap maklum." ;

			$bi ="This symbol indicates that your data is &quot;<strong>Save Temporarily</strong>&quot;. <br />
            Please click &quot;<strong>Save & Verify</strong>&quot; to verify your data." ;

			echo setstring( 'mal', $bm, 'en', $bi);

			?></em></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="61%">&nbsp;</td>
          <td width="17%">&nbsp;</td>
          <td width="17%">&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>

    </div></td>
  </tr>
</table>
</form>
