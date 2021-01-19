<?php

/*
 *  Filename: mill/index.php
 *  Copyright 2010 Malaysia Palm Oil Board
 *	Last update: 15.10.2010 11:46:16 am
 * 	2010-10-15 Fadli Saad  <fadlisaad@gmail.com> modified code to check progress
 */


if(isset($_GET['firsttime'])) {
?>
<link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../ui/ui.core.js"></script>
<script type="text/javascript" src="../ui/ui.draggable.js"></script>
<script type="text/javascript" src="../ui/ui.resizable.js"></script>
<script type="text/javascript" src="../ui/ui.dialog.js"></script>
<script type="text/javascript" src="../ui/ui.progressbar.js"></script>
<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>
<script type="text/javascript">
	$(function() {
		$("#dialog_1").dialog( {
			autoOpen:true,
			modal:true
		});
	});
</script>
<style type="text/css">
<!--
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<div id="dialog_1">
	<p><?=setstring ( 'mal', 'Selamat Datang Ke Sistem E-COST Kilang', 'en', 'Welcome to E-COST System for Mill'); ?>
 </p>
	<p><?=setstring ( 'mal', 'Sila Kemaskini Profil Anda Terlebih Dahulu', 'en', 'Please Update Your Profile First'); ?>
</p>
</div>
<?php
	}
?>
<link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../ui/ui.core.js"></script>
<script type="text/javascript" src="../ui/ui.draggable.js"></script>
<script type="text/javascript" src="../ui/ui.resizable.js"></script>
<script type="text/javascript" src="../ui/ui.dialog.js"></script>
<script type="text/javascript" src="../ui/ui.progressbar.js"></script>
<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>
<script type="text/javascript">
	$(function() {
		$("#progress").progressbar({ 
			value:<?php echo number_format($totalmill,2);?>
		});
	});
</script>
<p><strong><?=setstring ( 'mal', 'Selamat Datang ', 'en', 'Welcome'); ?> <?= strtoupper($pengguna->nama);?></strong></p>

<table width="100%" border="0">
  <tr>
    <td width="53%" height="72">
      <div style=" background-color: #ccc;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border: 1px solid #000;
padding: 10px;">
<table><tr><td><strong><img src="../folder.png" alt="aaa" width="100" height="100" /></strong></td>
<td>
        <ul>
          <li><?=setstring ( 'mal', 'Login berjaya terakhir anda pada', 'en', 'Last success login on'); ?> 
            <?= $pengguna->success; ?>
          </li>
        <br />
          <li><?=setstring ( 'mal', 'Login gagal terakhir anda pada', 'en', 'Last failed login on'); ?>
<?= $pengguna->success; ?>          </li>
        <br />
          <li><?=setstring ( 'mal', 'Sila klik pada menu di atas untuk navigasi.', 'en', 'Please click on the menu to navigate.'); ?></li>
      </ul></td>
      </tr>
      </table>
      </div></td>
  </tr>
  
<!--  <tr>
    <td style="border-bottom:#000000 solid 1px;"> </td>
  </tr>
  <tr>
    <td> </td>
  </tr>
  <?php
  	$con = connect();
	$tahun_lepas = $_SESSION['tahun']-1;
		$query = "select * from graf_mill where lesen ='".$_SESSION['lesen']."' and tahun ='$tahun_lepas' ";
		$res = mysql_query($query,$con);
		$row = mysql_fetch_array($res); 
		$res_total = mysql_num_rows($res);
		
		
		function median($numbers=array())
{
	if (!is_array($numbers))
		$numbers = func_get_args();
	
	rsort($numbers);
	$mid = (count($numbers) / 2);
	return ($mid % 2 != 0) ? $numbers{$mid-1} : (($numbers{$mid-1}) + $numbers{$mid}) / 2;
}

function pertama($tahun, $status,$negeri,$lesen){
$con=connect();
		$sql = "SELECT * FROM graf_mill where  tahun ='$tahun' and status='$status' ";
		if($negeri!="" & $negeri!="pm")
		{
			$sql.=" and negeri = '$negeri'";
		} 
		if($negeri!="" && $daerah!="")
		{
			$sql.=" and daerah = '$daerah'";
		} 
		if($negeri=="pm")
		{
			$sql.=" and (negeri not like 'SARAWAK' and negeri not like 'SABAH')";
		} 
		if($lesen!="")
		{
			$sql.=" and lesen = '$type' ";
		}
		
		
	//echo $sql."<br>";
		$sql_result = mysql_query($sql,$con); 
		$i=0; 
				while ($row = mysql_fetch_array($sql_result)) 
				{ 
				$test_data[] = $row["y"];
				
				$i = $i + 1; 
				} 
	//-----------------------------------------------------------------------------------------
	$tahun_lepas = $tahun-1; 
	$qoer = "SELECT SUM(FFB_PROSES) as FFB_PROSES, SUM(PENGELUARAN_CPO) as PENGELUARAN_CPO FROM graf_mill gm, ekilang ek where  gm.tahun ='$tahun' and gm.status='$status' ";
		if($negeri!="" & $negeri!="pm")
		{
			$qoer.=" and gm.negeri = '$negeri'";
		} 
		if($negeri!="" && $daerah!="")
		{
			$qoer.=" and gm.daerah = '$daerah'";
		} 
		if($negeri=="pm")
		{
			$qoer.=" and (gm.negeri not like 'SARAWAK' and gm.negeri not like 'SABAH')";
		} 
		
		if($lesen!="")
		{
			$qoer.=" and no_lesen = '$no_lesen' ";
		}
		
		
		$qoer .= " and gm.lesen = ek.no_lesen and ek.tahun='".$tahun_lepas."'";
		
	//echo $qoer;
		
	$roer = mysql_query($qoer,$con);
	$rowoer = mysql_fetch_array($roer);
	
	$oer = round($rowoer['PENGELUARAN_CPO']/$rowoer['FFB_PROSES'] *100,2);
	
	//-----------------------------------------------------------------------------------------
			
			
			
		$qavg = "SELECT AVG(y) as purata FROM graf_mill where tahun ='$tahun' and status='$status' ";
		if($negeri!="" & $negeri!="pm")
		{
			$qavg.=" and negeri = '$negeri'";
		} 
		if($negeri!="" && $daerah!="")
		{
			$qavg.=" and daerah = '$daerah'";
		} 
		if($negeri=="pm")
		{
			$qavg.=" and (negeri not like 'SARAWAK' and negeri not like 'SABAH')";
		} 
		
		if($lesen!="")
		{
			$qavg.=" and lesen = '$lesen' ";
		}
		
		
	//echo $qavg."<br>";
		$ravg = mysql_query($qavg,$con);
		$rrow = mysql_fetch_array($ravg);
		
		
			$var[0] = median($test_data);
			$var[1] = $rrow['purata'];		
			
			$var[2]= $oer;
			
			
			
			return $var; 
				
		}
		
		
  
  
   if($res_total==0){?>
  <!--<tr>
    <td valign="top"><div align="center">
     <p style="font-weight:bold; font-size:14px;"><?=setstring ( 'mal', 'Tiada Prestasi Kos Pemprosesan pada Tahun Lepas', 'en', 'The Processing Cost Performance for Previous Years in Unavailable'); ?>
</p> 

    </div></td>
  </tr>-->
  <?php } ?>
  <?php if($res_total>0){?>
  <tr>
  	<td><div align="center"><span style="font-weight:bold; font-size:14px;"><?=setstring ( 'mal', 'Prestasi Kos Pemprosesan pada Tahun Lepas', 'en', 'Last year Cost Processing Performance '); ?>
</span></div></td>
  </tr>
  <tr>
    <td height="183"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:#333333 1px solid;">
      <tr>
        <td height="49" colspan="2"> </td>
        <td width="33%" bgcolor="#F57A2C"><div align="center"><strong><?=setstring ( 'mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?>
</strong></div> <div align="center"><strong>(RM)</strong></div></td>
        <td width="32%" bgcolor="#62DFFF"><div align="center"><strong><?=setstring ( 'mal', 'Kadar Perahan Minyak', 'en', 'Oil Extraction Rate'); ?>
</strong></div>          <div align="center"></div>          <div align="center"><strong>(%)</strong></div></td>
        </tr>
      
      <tr>
        <td width="2%" height="44" bgcolor="#FFCCFF"> </td>
        <td width="33%" bgcolor="#FFCCFF"><div align="left"><strong><?= strtoupper($pengguna->nama);?></strong></div></td>
        <td bgcolor="#FFCCFF"><div align="center">
		<?php $a= pertama ($tahun_lepas,  '0',$pengguna->negeripremis, $_SESSION['lesen']); echo number_format($a[1],2); ?>
        
        </div></td>
        <td bgcolor="#FFCCFF"><div align="center"><?php echo number_format($a[2],2);?></div></td>
        </tr>
      <tr>
        <td height="38" bgcolor="#FFFFCC"> </td>
        <td height="38" bgcolor="#FFFFCC"><div align="left"><strong>
          <?= strtoupper($pengguna->negeripremis);?>
        </strong></div></td>
        <td bgcolor="#FFFFCC"><div align="center">
          <?php $a= pertama ($tahun_lepas,  '0',$pengguna->negeripremis, ''); echo number_format($a[1],2); ?>
        </div></td>
        <td bgcolor="#FFFFCC"><div align="center"><?php echo number_format($a[2],2);?></div></td>
        </tr>
      <tr>
        <td height="42" bgcolor="#88FFAE"> </td>
        <td height="42" bgcolor="#88FFAE"><div align="left"><strong>
          <?=setstring ( 'mal', 'SEMENANJUNG', 'en', 'PENINSULAR' ); ?>
        </strong></div></td>
        <td bgcolor="#88FFAE"><div align="center">
          <?php $a= pertama ($tahun_lepas,  '0','pm', ''); echo number_format($a[1],2); ?>
        </div></td>
        <td bgcolor="#88FFAE"><div align="center"><?php echo number_format($a[2],2);?></div></td>
        </tr>
      <tr>
        <td height="37" bgcolor="#FFA88A"> </td>
        <td height="37" bgcolor="#FFA88A"><div align="left"><strong>MALAYSIA</strong></div></td>
        <td bgcolor="#FFA88A"><div align="center">
          <?php $a= pertama ($tahun_lepas,  '0','', ''); echo number_format($a[1],2); ?>
        </div></td>
        <td bgcolor="#FFA88A"><div align="center"><?php echo number_format($a[2],2);?></div></td>
        </tr>
    </table>
    <div align="center"></div></td>
  </tr>
  <tr>
    <td height="32" >&nbsp;</td>
  </tr>
  
  <?php }?>-->
</table>
