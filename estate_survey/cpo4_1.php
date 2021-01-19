<?php 
$variable = $_SESSION['lesen'];
$keluasan = new user('keluasan',$variable);
$jumlah_luas= $keluasan->jumlah;

$jumlah_belum_hasil = $keluasan->jumlah_belum_berhasil;

$bts_sum = new user('bts',$variable);
$jumlah_bts = $bts_sum->purata_hasil_buah;

$var[0]=$_SESSION['lesen'];
$var[1]=$_COOKIE['tahun_report'];

$matang[0]=$var[0];
$matang[1]=$var[1];


	
	function kbm($pembolehubah)
	{
		$con = connect();
	    $q ="select * from kos_belum_matang where lesen ='".$_SESSION['lesen']."' and pb_thisyear ='".$_COOKIE['tahun_report']."'  and status=1 and pb_tahun='$pembolehubah' ";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$survey[0] = $res_total;
		
		$q ="select * from kos_belum_matang where lesen ='".$_SESSION['lesen']."' and pb_thisyear ='".$_COOKIE['tahun_report']."' and pb_tahun='$pembolehubah' ";
		$r = mysql_query($q,$con);
		$row= mysql_fetch_array($r);
				
		
		 $survey[1] = $row['a_1']+$row['a_2']+$row['a_3']+$row['a_4']+$row['a_5']+$row['a_6']+$row['a_7']+$row['a_8']+$row['a_9']+$row['a_10']+$row['a_11']+$row['total_a']+$row['b_1a']+$row['b_1b']+$row['b_1c']+$row['total_b_1']+$row['total_b_2']+$row['b_3a']+$row['b_3b']+$row['b_3c']+$row['b_3d']+$row['total_b_3']+$row['total_b_4']+$row['total_b_5']+$row['total_b_6']+$row['total_b_7']+$row['total_b_8']+$row['total_b_9']+$row['total_b_10']+$row['total_b_11']+$row['total_b_12']+$row['total_b_13']+$row['total_b_14']+$row['total_b'];
		//total	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
		
		return $survey; 
	}
	
	function mtg($pembolehubah)
	{
	  	$con = connect();
		$qbaja ="select * from $pembolehubah where lesen ='".$_SESSION['lesen']."' and pb_thisyear ='".$_COOKIE['tahun_report']."'  and status!=1 ";
		$rbaja = mysql_query($qbaja,$con);
		$res_total_baja = mysql_num_rows($rbaja);
		$matured[0]=$res_total_baja;
		return $matured;
	}
	
	$satu_all =kbm(1);
	$dua_all =kbm(2);
	$tiga_all=kbm(3);

	$mtg_jaga=mtg("kos_matang_penjagaan");
	$mtg_tuai = mtg("kos_matang_penuaian");
	$mtg_angkut = mtg("kos_matang_pengangkutan");
//-----------------------------------------------


	function tanaman_tahun($tahuntanaman)
	{
			
		$con = connect();
		$q1="select sum(tanaman_baru) as jumlah from tanam_baru$tahuntanaman where lesen ='".$_SESSION['lesen']."' ";
		$r1= mysql_query($q1,$con);
		$row1= mysql_fetch_array($r1);
		
		$q2="select sum(tanaman_semula) as jumlah from tanam_semula$tahuntanaman where lesen ='".$_SESSION['lesen']."' ";
		$r2= mysql_query($q2,$con);
		$row2= mysql_fetch_array($r2);
		
		$q3="select sum(tanaman_tukar) as jumlah from tanam_tukar$tahuntanaman  where lesen ='".$_SESSION['lesen']."' ";
		$r3= mysql_query($q3,$con);
		$row3= mysql_fetch_array($r3);
		
		//echo "<br>";
		
		$js[0] = $row1['jumlah']+$row2['jumlah']+$row3['jumlah'];
		return $js;		
	}
	
			$tahun = $_COOKIE['tahun_report'];
			$pertama = $tahun-3;
			$kedua = $tahun-2;
			$ketiga = $tahun-1; 
			
			$pertama = substr($pertama,-2);
			$kedua = substr($kedua,-2);
			$ketiga = substr($ketiga,-2);
			
			
			$satu = tanaman_tahun($pertama);
			$dua = tanaman_tahun($kedua);
			$tiga = tanaman_tahun($ketiga);
			
			//echo $satu[0];
			//echo $dua[0];
			//echo $tiga[0]; 
			
	function viewkos_semasa($pu)
	{
		$con = connect();
		$qe ="select sum(total_a) as jumlah_a, sum(total_b) as jumlah_b from kos_belum_matang where lesen ='".$pu[0]."' and pb_thisyear = '".$pu[1]."' and pb_tahun='".$pu[2]."' and pb_type='".$pu[3]."'";
		$re = mysql_query($qe,$con);
		$res_totale = mysql_num_rows($re);
		$rowe=mysql_fetch_array($re);
	 	
			$t[0]=$rowe['lesen'];
			$t[1] = $rowe['jumlah_a']/$pu[4];
			$t[2] = $rowe['jumlah_b'];
			$t[3]= $rowe['jumlah_a']+$rowe['jumlah_b'];
			$t[4] = $t[3]/$pu[4];
			return $t;
	}
			

?>
<script>
	$(function() {
		$("#jumlah").mouseover(function() {
			$("#total").css("font-size","15px");
		});
		$("#jumlah").mouseout(function() {
			$("#total").css("font-size","12px");
		});
	});
</script>

<form id="form1" name="form1" method="post" action="mail_ringkasan.php">
  <table width="100%" align="center" class="tableCss">
<tr>
      <td width="51"> </td>
      <td width="824" colspan="2"><span class="style1"><?=setstring ( 'mal', 'Kos di estet tuan', 'en', 'Costs at your estate'); ?>
:</span></td>
    </tr>
    <tr>
      <td height="10px"></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2">
      
      
      
      
      
      
      <?php $all_var = $satu[0]+$dua[0]+$tiga[0];
	  if($all_var>0){
	  ?>
      
      <table width="80%" align="center" cellspacing="0" frame="box" style="border:#999999 solid 1px;">
          <tr>
            <td width="30" background="../images/tb_BG.gif"><div align="center"></div></td>
            <td width="436" height="40" background="../images/tb_BG.gif"><strong><?=setstring ( 'mal', 'Kos Belum Matang', 'en', 'Cost for Immature Crop'); ?>
</strong></td>
            <td background="../images/tb_BG.gif"><strong>
              <?=setstring ( 'mal', 'Penanaman Baru <br>(Kos Per Hektar)', 'en', 'New Planting <br>(Cost Per Hectare)'); ?>
              <br />
(RM) </strong></td>
            <td background="../images/tb_BG.gif"><strong>
              <?=setstring ( 'mal', 'Penanaman Semula <br>(Kos Per Hektar)', 'en', 'Replanting <br>(Cost Per Hectare)'); ?>
              <br />
(RM) </strong></td>
            <td background="../images/tb_BG.gif"><strong>
              <?=setstring ( 'mal', 'Penukaran <br>(Kos Per Hektar)', 'en', 'Conversion <br>(Cost Per Hectare)'); ?>
              <br />
(RM) </strong></td>
            <td background="../images/tb_BG.gif"><div align="right"><strong><?=setstring ( 'mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?>
<br />
              (RM) </strong></div></td>
            <td background="../images/tb_BG.gif"> </td>
          </tr>
          
          <?php if($tiga[0]!=0){?>
          <tr>
            <td height="33" colspan="2" bgcolor="#99FF99"><div align="left"><a href="home.php?id=belum_matang&year=1&t=Penanaman+Baru">
            <?php 
				
			if(($satu_all[0]==0) or ($satu_all[1]==0)){
			?>
            <img src="../images/001_30.gif" width="24" height="24" border="0" />
			
			<?php } ?> 
              <?=setstring ( 'mal', 'Tahun Pertama', 'en', 'First Year'); ?>
</a>
<?php //echo $satu_all[1];?>
</div></td>
            <td width="178" bgcolor="#99FF99"><?php

			$pembolehubah[0]=$_SESSION['lesen'];
			$pembolehubah[1]=$_COOKIE['tahun_report'];
			$pembolehubah[2]=1;
			$pembolehubah[3]="Penanaman Baru"; 
			$pembolehubah[4]=$tiga[0]; 
			$pb1 = viewkos_semasa($pembolehubah);
			echo number_format($pb1[4],2);
			
			?></td>
            <td width="178" bgcolor="#99FF99"><?php 
			
			$pembolehubah[3]="Penanaman Semula"; 
			$pembolehubah[4]=$tiga[0]; 
			$pb2 = viewkos_semasa($pembolehubah);
			echo number_format($pb2[4],2);
			?></td>
            <td width="178" bgcolor="#99FF99"><?php 
			$pembolehubah[3]="Penukaran"; 
			$pembolehubah[4]=$tiga[0]; 
			$pb3 = viewkos_semasa($pembolehubah);
			echo number_format($pb3[4],2);
			?></td>
            <td width="178" bgcolor="#99FF99">              <div align="right">
              <?php
			$var[2]=1;
			$nilai = new user('kos',$var);
			
			
		//	echo $tiga[0]."<br>";
			
		//	echo $jumlah_luas."<br>".$nilai->jumlah_all."<br>";
			//echo $nilai->total;
			$a = ($nilai->jumlah_all/$tiga[0]); 
			echo number_format($a,2);?>            
            </div></td>
            <td width="93" bgcolor="#99FF99"> </td>
          </tr>
          <tr>
            <td height="31"> </td>
            <td height="31" bgcolor="#CCFFCC"><a href="home.php?id=belum_matang&year=1&t=Penanaman+Baru">-<?=setstring ( 'mal', 'Perbelanjaan tidak berulang', 'en', 'Non-recurrent expenses'); ?>
</a></td>
            <td bgcolor="#CCFFCC"><?php echo number_format($pb1[1],2);?></td>
            <td bgcolor="#CCFFCC"><?php echo number_format($pb2[1],2);?></td>
            <td bgcolor="#CCFFCC"><?php echo number_format($pb3[1],2);?></td>
            <td bgcolor="#CCFFCC"><div align="right">
			<?php 			
			$a1 =($nilai->jumlah_tak_berulang/$tiga[0]); echo number_format($a1,2);?></div></td>
            <td bgcolor="#CCFFCC"> </td>
          </tr>
          <?php }
		   ?>
          
          
          <?php if($dua[0]!=0){?>
          <tr>
            <td height="31" colspan="2"><div align="left"><a href="home.php?id=belum_matang&year=1&t=Penanaman+Baru">
            
            <?php 
				
			if(($dua_all[0]==0) or ($dua_all[1]==0)){
			
		?><img src="../images/001_30.gif" width="24" height="24" border="0" /><?php } ?>
              <?=setstring ( 'mal', 'Tahun Kedua', 'en', 'Second Year'); ?>
</a><?php //echo $dua_all[1];?></div></td>
            <td><?php 

			$pembolehubah[0]=$_SESSION['lesen'];
			$pembolehubah[1]=$_COOKIE['tahun_report'];
			$pembolehubah[2]=2;
			$pembolehubah[3]="Penanaman Baru"; 
			$pembolehubah[4]=$dua[0]; 
			$ps1 = viewkos_semasa($pembolehubah);
			echo number_format($ps1[4],2);
			
			?>
			
		</td>
            <td><?php 

		
			$pembolehubah[3]="Penanaman Semula"; 
			$pembolehubah[4]=$dua[0]; 
			$ps2 = viewkos_semasa($pembolehubah);
			echo number_format($ps2[4],2);
			
			?></td>
            <td>
            <?php 

			$pembolehubah[3]="Penukaran"; 
			$pembolehubah[4]=$dua[0]; 
			$ps3 = viewkos_semasa($pembolehubah);
			echo number_format($ps3[4],2);
			
			?>
            </td>
            <td><div align="right"><?php 
			//echo $dua[0]."<br>";
			
			
			$var[2]=2;
			$nilai = new user('kos',$var);
			$b = ($nilai->jumlah_penjagaan/$dua[0]); 
			echo number_format($b,2);?></div></td>
            <td> </td>
          </tr>
          <?php }
		   ?>
          
          
          
          
          <?php if($satu[0]!=0){?>
          <tr>
            <td height="33" colspan="2" bgcolor="#99FF99"><div align="left"><a href="home.php?id=belum_matang&year=1&t=Penanaman+Baru">
            <?php 			if(($tiga_all[0]==0) or ($tiga_all[1]==0)){
			

			?><img src="../images/001_30.gif" width="24" height="24" border="0" /><?php 
				}
			 ?>
              <?=setstring ( 'mal', 'Tahun Ketiga', 'en', 'Third Year'); ?>
</a></div></td>
            <td bgcolor="#99FF99"><?php $pembolehubah[0]=$_SESSION['lesen'];
			$pembolehubah[1]=$_COOKIE['tahun_report'];
			$pembolehubah[2]=3;
			$pembolehubah[3]="Penanaman Baru"; 
			$pembolehubah[4]=$satu[0]; 
			$pt1 = viewkos_semasa($pembolehubah);
			echo number_format($pt1[4],2);?></td>
            <td bgcolor="#99FF99"><?php 
			$pembolehubah[3]="Penanaman Semula"; 
			$pembolehubah[4]=$satu[0]; 
			$pt2 = viewkos_semasa($pembolehubah);
			echo number_format($pt2[4],2);
			?></td>
            <td bgcolor="#99FF99"><?php 
			$pembolehubah[3]="Penukaran"; 
			$pembolehubah[4]=$satu[0]; 
			$pt3 = viewkos_semasa($pembolehubah);
			echo number_format($pt3[4],2);
			
			?></td>
            <td bgcolor="#99FF99"><div align="right"><?php 
			$var[2]=3;
			$nilai = new user('kos',$var);
			$c = ($nilai->jumlah_penjagaan/$satu[0]); 
			 echo number_format($c,2);?></div></td>
            <td bgcolor="#99FF99"> </td>
          </tr>
          <?php } ?>
          
          <tr>
            <td><div align="center"></div></td>
            <td height="33"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?>
</strong></div></td>
            <td bgcolor="#FFCC66" id="jumlah">&nbsp;</td>
            <td bgcolor="#FFCC66" id="jumlah">&nbsp;</td>
            <td bgcolor="#FFCC66" id="jumlah">&nbsp;</td>
            <td bgcolor="#FFCC66" id="jumlah"><div align="center" id="total">
                <div align="right"><?php $jabc=$a+$b+$c;  echo number_format($jabc,2);?></div>
            </div></td>
            <td bgcolor="#FFCC66" id="jumlah"> </td>
          </tr>
        </table>
        <?php }//jika ada kos belum matang ?>
        
        
        <?php if($all_var==0){?>
        
		  <div align="center">
            <?php include('../css/border.php');?>
       <table width="80%">
  <tr>
    <td>  <p align="center" class="shadow" style="display: block" rel="#00CCFF" >
          		<br /><b>
<?=setstring ( 'mal', 'Tiada Maklumat Kos Belum Matang', 'en', 'No information for Immature Cost'); ?>
<br />
</b>
<br />

          </p> </td>
  </tr>
</table>

          </div>
        <?php } // jika tiada kos belum matang ?>
        
        
        
        <p><?php //echo $jumlah_luas;?> </p>
        <table width="80%" align="center" cellspacing="0" frame="box" style="border:#999999 solid 1px;">
            <tr>
              <td background="../images/tb_BG.gif"><div align="center"></div></td>
              <td height="40" background="../images/tb_BG.gif"><strong><?=setstring ( 'mal', 'Kos Matang', 'en', 'Cost for Mature Crop'); ?>
</strong></td>
              <td background="../images/tb_BG.gif"><div align="right"><strong><?=setstring ( 'mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?>
<br />
                (RM)</strong></div></td>
              <td background="../images/tb_BG.gif"> </td>
              <td background="../images/tb_BG.gif"><div align="right"><strong><?=setstring ( 'mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?>
<br />
                (RM)</strong></div></td>
              <td background="../images/tb_BG.gif"> </td>
            </tr>
			<?php //echo $jumlah_luas; ?>
            <tr>
              <td width="19" bgcolor="#99FF99"><div align="center">1.</div></td>
              <td width="166" height="33" bgcolor="#99FF99">
              
              <?php if($mtg_jaga[0]>0){ ?>
              <img src="../images/001_30.gif" width="24" height="24" border="0" />
              <?php } ?>
              
               <a href="home.php?id=matang&penjagaan"><?=setstring ( 'mal', 'Kos Penjagaan', 'en', 'Cost for Upkeep'); ?>
</a></td>
              <td width="253" bgcolor="#99FF99"><div align="right"><?php 
			 $jaga = new user('matang_penjagaan',$matang); 
			  $d = ($jaga->total_b/$jumlah_luas); 
			  
			  
			  
			
					
			  echo number_format($d,2);
			  ?></div></td>
              <td width="14" bgcolor="#99FF99"> </td>
             <?php $e = $d/$jumlah_bts;
			 $rk[0] =$e;
			 $rk[1]="penjagaan";
			 $ringkasan = new user('range_kos',$rk);
			
			 ?>
			 <td width="188" bgcolor="#99FF99" class="ringkasan" <?php if($ringkasan->status=='X'){?>style="border:3px #FF3300 solid;"<?php } ?>><div align="right" <?php if($ringkasan->status=='X'){?>style="text-decoration:blink; font-weight:bold"<?php } ?>><?php echo $ee=number_format($e,2);?></div></td>
    
		
				
			  <td width="93" bgcolor="#99FF99"> </td>
            </tr>
            <tr>
              <td><div align="center"></div></td>
              <td height="31" bgcolor="#CCFFCC">
              <?php if($totaljaga>0){?>
              <img src="../images/001_30.gif" width="24" height="24" border="0" />
              <?php }?>
               <a href="home.php?id=matang&penjagaan"><?=setstring ( 'mal', '-Kos Pembajaan', 'en', '-Fertilizing Cost'); ?>
</a></td>
              <td bgcolor="#CCFFCC" ><div align="right"><?php 
				
				
				  $con =connect();
				$qjaga ="select total_b_3, b_3a, b_3b, b_3c, b_3d from kos_matang_penjagaan where pb_thisyear ='".$_COOKIE['tahun_report']."' and lesen ='".$_SESSION['lesen']."' and status='1' ";
				$rjaga=mysql_query($qjaga,$con);
				$rowjaga = mysql_fetch_array($rjaga);
				$totaljaga = mysql_num_rows($rjaga);
				
				if($rowjaga['total_b_3']==0){
				$ftotal = $rowjaga['b_3a']+$rowjaga['b_3b']+$rowjaga['b_3c']+$rowjaga['b_3d'];
				}
				if($rowjaga['total_b_3']>0){
				$ftotal = $rowjaga['total_b_3'];
				}
				 	$f = ($ftotal/$jumlah_luas);
			 
				echo number_format($f,2);?></div></td>
              <td bgcolor="#CCFFCC"> </td>
			  
			  <?php 
			//  $f= number_format($f,2);
			   $f = str_replace(",","",$f);
			  
			  $g =$f/$jumlah_bts;
			 $rk[0] =$g;
			 $rk[1]="pembajaan";
			 $ringkasan = new user('range_kos',$rk);
			 ?>
              <td bgcolor="#CCFFCC" <?php if($ringkasan->status=='X'){?>style="border:3px #FF3300 solid;"<?php } ?>><div align="right" <?php if($ringkasan->status=='X'){?>style="text-decoration:blink; font-weight:bold"<?php } ?>><?php  echo $gg=number_format($g,2);?></div></td>
			  
			  
			  
			  
              <td bgcolor="#CCFFCC"> </td>
            </tr>
            <tr>
              <td><div align="center">2.</div></td>
              <td height="36">
              <?php if($mtg_tuai[0]>0){ ?>
              <img src="../images/001_30.gif" width="24" height="24" border="0" />
              <?php } ?>
              
               <a href="home.php?id=matang&penuaian">
              <?=setstring ( 'mal', 'Kos Penuaian BTS', 'en', 'FFB Harvesting Cost'); ?>
              </a></td>
              <td><div align="right"><?php 
			    $tuai = new user('matang_penuaian',$matang);
			  $h = ($tuai->total_b/$jumlah_luas);
			   echo number_format($h,2);?></div></td>
              <td> </td>
			  <?php  $i = $h/$jumlah_bts;
			 $rk[0] =$i;
			 $rk[1]="penuaian";
			 $ringkasan = new user('range_kos',$rk);
			 ?>
              <td <?php if($ringkasan->status=='X'){?>style="border:3px #FF3300 solid;"<?php } ?>><div align="right" <?php if($ringkasan->status=='X'){?>style="text-decoration:blink; font-weight:bold"<?php } ?>>
                <?php echo $ii= number_format($i,2);?>
              </div></td>
			  
			  
              <td > </td>
            </tr>
            <tr>
              <td bgcolor="#99FF99"><div align="center">3.</div></td>
              <td height="33" bgcolor="#99FF99">
              
              <?php if($mtg_angkut[0]>0){ ?>
              <img src="../images/001_30.gif" width="24" height="24" border="0" />
              <?php } ?>
              
              
               <a href="home.php?id=matang&pengangkutan"><?=setstring ( 'mal', 'Kos Pengangkutan BTS', 'en', 'FFB Transportation Cost'); ?>
 </a></td>
              <td bgcolor="#99FF99"><div align="right"><?php 
			  $angkut = new user('matang_pengangkutan',$matang);
			  $j = ($angkut->total_b/$jumlah_luas);
			  echo number_format($j,2);?></div></td>
              <td bgcolor="#99FF99"> </td>
			  
			  <?php $k = $j/$jumlah_bts;
			 $rk[0] =$k;
			 $rk[1]="pengangkutan";
			 $ringkasan = new user('range_kos',$rk);
			 ?>
              <td bgcolor="#99FF99" <?php if($ringkasan->status=='X'){?>style="border:3px #FF3300 solid;"<?php } ?>><div align="right" <?php if($ringkasan->status=='X'){?>style="text-decoration:blink; font-weight:bold"<?php } ?>><?php  echo $kk=number_format($k,2);?></div></td>
			  
			  
              <td bgcolor="#99FF99"> </td>
            </tr>
            <tr>
              <td><div align="center">4.</div></td>
              <td height="33">
              <?php if($mtg_belanja[0]>0){ ?>
              <img src="../images/001_30.gif" width="24" height="24" border="0" />
              <?php } ?>
              
               <a href="home.php?id=umum"><?=setstring ( 'mal', 'Kos Perbelanjaan Am', 'en', 'General Expenses Cost'); ?>
 </a></td>
              <td><div align="right"><?php 
			  $belanja = new user('belanja_am',$matang);
			  
			  $l = ($belanja->total_perbelanjaan/$jumlah_luas); echo number_format($l,2);?></div></td>
              <td> </td>
			  
			    <?php $m = $l/$jumlah_bts;
			 $rk[0] =$m;
			 $rk[1]="pembajaan";
			 $ringkasan = new user('range_kos',$rk);
			 ?>
              <td <?php if($ringkasan->status=='X'){?>style="border:3px #FF3300 solid;"<?php } ?>><div align="right" <?php if($ringkasan->status=='X'){?>style="text-decoration:blink; font-weight:bold"<?php } ?>><?php  echo $mm = number_format($m,2);?> </div></td>
			  
			  
              <td> </td>
            </tr>
            <tr>
              <td><div align="center"></div></td>
              <td height="33"><div align="right"><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?>
</strong></div></td>
              <td bgcolor="#FFCC66" id="jumlah"><div align="center" id="total">
                  <div align="right"><span class="style2">
				  <?php $jh = $d+$h+$j+$l;
				  echo number_format($jh,2);?>
				  </span> </div>
              </div
		></td>
              <td bgcolor="#FFCC66" id="jumlah"> </td>
              <td bgcolor="#FFCC66"><div align="center" style="text-decoration:blink;">
                  <div align="right"><strong><?php 
				 
					$ee = str_replace(",",'',$ee);
					$ii = str_replace(",",'',$ii);
					$kk = str_replace(",",'',$kk);
					$mm = str_replace(",",'',$mm);
					 				 
				  $jb = $ee+$ii+$kk+$mm;
				  echo number_format($jb,2);?></strong></div>
              </div></td>
              <td bgcolor="#FFCC66"> </td>
            </tr>
        </table></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2"> </td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2">
          <div align="center">
           <?php if($_SESSION['view']!="true"){ ?> <input type="submit" name="button" id="button" value=<?=setstring ( 'mal', '"Hantar ke MPOB"', 'en', '"Send to MPOB"'); ?>
 onclick="pitmid = true; return confirm('Anda pasti untuk simpan dan sahkan?')" />
<?php } ?>


          </div>
</form>
<br /></td>
    </tr></form><table width="85%">
<tr>
  <td width="5%">&nbsp;</td>
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
          <td>&nbsp;</td>
          <td width="61%">&nbsp;</td>
          <td width="17%">&nbsp;</td>
          <td width="17%">&nbsp;</td>
        </tr>
      </table>
<?php mysql_close($con);?>