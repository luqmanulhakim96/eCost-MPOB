<?php
include('../Connections/connection.class.php');
$tahun="2010";
header("Content-type: application");
header("Content-Disposition: attachment; filename=excel_data_estate_$tahun.xls");
include("baju.php");
$con = connect();
?>
<style>
body {
	font-family:Tahoma ;
	font-size: 12px; 

}td,th {
	font-size: 12px;
}

</style>


<?php
function esub($lesen){
		$con=connect();
 		$q="select * from esub where NO_LESEN_BARU = '$lesen' limit 1 ";
  		$r=mysql_query($q,$con);
		$row=mysql_fetch_array($r);
		
		$sub[0]=$row['Nama_Estet'];
		$sub[1]=$row['Negeri_Premis'];
		$sub[2]=$row['Daerah_Premis'];
		$sub[3]=$row['Syarikat_Induk'];
		$sub[4]=$row['Berhasil'];
		$sub[5]=$row['Belum_Berhasil'];
		$sub[6]=$row['Jumlah'];
		$sub[7]=$row['Keluasan_Yang_Dituai'];
		
		return $sub;	
	}

//----------------------------------------------------
function luas($lesen,$table,$field){
 		$con=connect();
		$q="select sum($field) as jumlah from $table where lesen = '$lesen' group by lesen limit 1 ";
  		$r=mysql_query($q,$con);
		$row=mysql_fetch_array($r);
		
		$sub[0] = round($row['jumlah'],2);
		return $sub;
		
	}
//---------------------------------------------------
function kos_belum_matang($lesen,$tahun,$type,$tahun_tanam,$keluasan){
		$con=connect();
	
		$q="select * from kos_belum_matang where lesen = '$lesen' and pb_thisyear='$tahun' and pb_tahun='$tahun_tanam' and pb_type='$type' limit 1 ";
  		$r=mysql_query($q,$con);
		$row=mysql_fetch_array($r);
		
		$sub[0]=round($row['a_1']/$keluasan,2);
		$sub[1]=round($row['a_2']/$keluasan,2);
		$sub[2]=round($row['a_3']/$keluasan,2);
		$sub[3]=round($row['a_4']/$keluasan,2);
		$sub[4]=round($row['a_5']/$keluasan,2);
		$sub[5]=round($row['a_6']/$keluasan,2);
		$sub[6]=round($row['a_7']/$keluasan,2);
		$sub[7]=round($row['a_8']/$keluasan,2);
		$sub[8]=round($row['a_9']/$keluasan,2);
		$sub[9]=round($row['a_10']/$keluasan,2);
		$sub[10]=round($row['a_11']/$keluasan,2);
		$sub[11]=round($row['total_a']/$keluasan,2);
		$sub[12]=round($row['b_1a']/$keluasan,2);
		$sub[13]=round($row['b_1b']/$keluasan,2);
		$sub[14]=round($row['b_1c']/$keluasan,2);
		$sub[15]=round($row['total_b_1']/$keluasan,2);
		$sub[16]=round($row['total_b_2']/$keluasan,2);
		$sub[17]=round($row['b_3a']/$keluasan,2);
		$sub[18]=round($row['b_3b']/$keluasan,2);
		$sub[19]=round($row['b_3c']/$keluasan,2);
		$sub[20]=round($row['b_3d']/$keluasan,2);
		$sub[21]=round($row['total_b_3']/$keluasan,2);
		$sub[22]=round($row['total_b_4']/$keluasan,2);
		$sub[23]=round($row['total_b_5']/$keluasan,2);
		$sub[24]=round($row['total_b_6']/$keluasan,2);
		$sub[25]=round($row['total_b_7']/$keluasan,2);
		$sub[26]=round($row['total_b_8']/$keluasan,2);
		$sub[27]=round($row['total_b_9']/$keluasan,2);
		$sub[28]=round($row['total_b_10']/$keluasan,2);
		$sub[29]=round($row['total_b_11']/$keluasan,2);
		$sub[30]=round($row['total_b_12']/$keluasan,2);
		$sub[31]=round($row['total_b_13']/$keluasan,2);
		$sub[32]=round($row['total_b_14']/$keluasan,2);
		$sub[33]=round($row['total_b']/$keluasan,2);	
		
		return $sub;	
	}
//-----------------------------------------
function bts($var)
	{
		$con = connect();
		$vari = substr($var,0,-1);
	  	$q ="select * from fbb_production where lesen ='".$vari."'";
		$r = mysql_query($q,$con);
		$row = mysql_fetch_array($r);
		//$sub[0]=$row['jumlah_pengeluaran'];
		$sub[0]=round($row['purata_hasil_buah'],2);
		return $sub;
	}

function kos_matang_penjagaan($lesen,$tahun,$jum_tanam,$jum_bts){
		$con=connect();
//	echo $jum_bts;
		$q="select * from kos_matang_penjagaan where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
  		$r=mysql_query($q,$con);
		$row=mysql_fetch_array($r);
		
		$sub[0]=round($row['b_1a']/$jum_tanam,2);
		$sub[1]=round($row['b_1b']/$jum_tanam,2);
		$sub[2]=round($row['b_1c']/$jum_tanam,2);
		$sub[3]=round($row['total_b_1']/$jum_tanam,2);
		$sub[4]=round($row['total_b_2']/$jum_tanam,2);
		$sub[5]=round($row['b_3a']/$jum_tanam,2);
		$sub[6]=round($row['b_3b']/$jum_tanam,2);
		$sub[7]=round($row['b_3c']/$jum_tanam,2);
		$sub[8]=round($row['b_3d']/$jum_tanam,2);
		$sub[9]=round($row['total_b_3']/$jum_tanam,2);
		$sub[10]=round($row['total_b_4']/$jum_tanam,2);
		$sub[11]=round($row['total_b_5']/$jum_tanam,2);
		$sub[12]=round($row['total_b_6']/$jum_tanam,2);
		$sub[13]=round($row['total_b_7']/$jum_tanam,2);
		$sub[14]=round($row['total_b_8']/$jum_tanam,2);
		$sub[15]=round($row['total_b_9']/$jum_tanam,2);
		$sub[16]=round($row['total_b_10']/$jum_tanam,2);
		$sub[17]=round($row['total_b_11']/$jum_tanam,2);
		$sub[18]=round($row['total_b_12']/$jum_tanam,2);
		$sub[19]=round($row['total_b']/$jum_tanam,2);
		
		$sub[20]=round($sub[0]/$jum_bts,2);
		$sub[21]=round($sub[1]/$jum_bts,2);
		$sub[22]=round($sub[2]/$jum_bts,2);
		$sub[23]=round($sub[3]/$jum_bts,2);
		$sub[24]=round($sub[4]/$jum_bts,2);
		$sub[25]=round($sub[5]/$jum_bts,2);
		$sub[26]=round($sub[6]/$jum_bts,2);
		$sub[27]=round($sub[7]/$jum_bts,2);
		$sub[28]=round($sub[8]/$jum_bts,2);
		$sub[29]=round($sub[9]/$jum_bts,2);
		$sub[30]=round($sub[10]/$jum_bts,2);
		$sub[31]=round($sub[11]/$jum_bts,2);
		$sub[32]=round($sub[12]/$jum_bts,2);
		$sub[33]=round($sub[13]/$jum_bts,2);
		$sub[34]=round($sub[14]/$jum_bts,2);
		$sub[35]=round($sub[15]/$jum_bts,2);
		$sub[36]=round($sub[16]/$jum_bts,2);
		$sub[37]=round($sub[17]/$jum_bts,2);
		$sub[38]=round($sub[18]/$jum_bts,2);
		$sub[39]=round($sub[19]/$jum_bts,2);
	
		
		return $sub;	
	}
//----------------------------------------------------------------
function kos_matang_penuaian($lesen,$tahun,$jum_tanam,$jum_bts){
		$con=connect();
		$q="select * from kos_matang_penuaian where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
  		$r=mysql_query($q,$con);
		$row=mysql_fetch_array($r);
		
		$sub[0]=round($row['a_1']/$jum_tanam,2);
		$sub[1]=round($row['a_2']/$jum_tanam,2);
		$sub[2]=round($row['a_3']/$jum_tanam,2);
		$sub[3]=round($row['a_4']/$jum_tanam,2);
		$sub[4]=round($row['total_b']/$jum_tanam,2);
		
		$sub[5]=round($sub[0]/$jum_bts,2);
		$sub[6]=round($sub[1]/$jum_bts,2);
		$sub[7]=round($sub[2]/$jum_bts,2);
		$sub[8]=round($sub[3]/$jum_bts,2);
		$sub[9]=round($sub[4]/$jum_bts,2);
		
		return $sub;	
	}
//----------------------------------------------------------------
function kos_matang_pengangkutan($lesen,$tahun,$jum_tanam,$jum_bts){
		$con=connect();
//	echo $jum_bts;
		$q="select * from kos_matang_pengangkutan where lesen = '$lesen' and pb_thisyear='$tahun' limit 1 ";
  		$r=mysql_query($q,$con);
		$row=mysql_fetch_array($r);
		
		$sub[0]=round($row['a_1']/$jum_tanam,2);
		$sub[1]=round($row['a_2']/$jum_tanam,2);
		$sub[2]=round($row['a_3']/$jum_tanam,2);
		$sub[3]=round($row['total_a']/$jum_tanam,2);
		$sub[4]=round($row['b_1a']/$jum_tanam,2);
		$sub[5]=round($row['b_1b']/$jum_tanam,2);
		$sub[6]=round($row['b_1c']/$jum_tanam,2);
		$sub[7]=round($row['total_b_1']/$jum_tanam,2);
		$sub[8]=round($row['total_b_2']/$jum_tanam,2);
		$sub[9]=round($row['total_b']/$jum_tanam,2);
		
		$sub[10]=round($sub[0]/$jum_bts,2);
		$sub[11]=round($sub[1]/$jum_bts,2);
		$sub[12]=round($sub[2]/$jum_bts,2);
		$sub[13]=round($sub[3]/$jum_bts,2);
		$sub[14]=round($sub[4]/$jum_bts,2);
		$sub[15]=round($sub[5]/$jum_bts,2);
		$sub[16]=round($sub[6]/$jum_bts,2);
		$sub[17]=round($sub[7]/$jum_bts,2);
		$sub[18]=round($sub[8]/$jum_bts,2);
		$sub[19]=round($sub[9]/$jum_bts,2);
		
		
		return $sub;	
	}
?>


<title>Data Estet Survey</title>

<table width="100%" class="baju">
  <tr>
    <th width="3%">Bil.</th>
    <th width="19%">No.Lesen</th>
    <th width="17%">Nama Estet</th>
    <th width="22%">Negeri</th>
    <th width="12%">Daerah </th>
    <th width="10%">Syarikat Induk</th>
    
    <th width="2%">PB1_Luas</th>
    <th width="2%">PB1_a_1</th>
    <th width="2%">PB1_a_2</th>
    <th width="2%">PB1_a_3</th>
    <th width="2%">PB1_a_4</th>
    <th width="2%">PB1_a_5</th>
    <th width="2%">PB1_a_6</th>
    <th width="2%">PB1_a_7</th>
    <th width="3%">PB1_a_8</th>
    <th width="3%">PB1_a_9</th>
    <th width="3%">PB1_a_10</th>
    <th width="3%">PB1_a_11</th>
    <th width="3%">PB1_total_a</th>
    <th width="2%">PB1_b_1a</th>
    <th width="2%">PB1_b_1b</th>
    <th width="2%">PB1_b_1c</th>
    <th width="2%">PB1_total_b_1</th>
    <th width="2%">PB1_total_b_2</th>
    <th width="2%">PB1_b_3a</th>
    <th width="2%">PB1_b_3b</th>
    <th width="3%">PB1_b_3c</th>
    <th width="3%">PB1_b_3d</th>
    <th width="3%">PB1_total_b_3</th>
    <th width="3%">PB1_total_b_4</th>
    <th width="3%">PB1_total_b_5</th>
    <th width="3%">PB1_total_b_6</th>
    <th width="3%">PB1_total_b_7</th>
    <th width="3%">PB1_total_b_8</th>
    <th width="3%">PB1_total_b_9</th>
    <th width="3%">PB1_total_b_10</th>
    <th width="3%">PB1_total_b_11</th>
    <th width="3%">PB1_total_b_12</th>
    <th width="3%">PB1_total_b_13</th>
    <th width="3%">PB1_total_b_14</th>
    <th width="3%">PB1_total_a</th>
    <th width="2%">PB1_b_1a</th>
    <th width="2%">PB1_b_1b</th>
    <th width="2%">PB1_b_1c</th>
    <th width="2%">PB1_total_b_1</th>
    <th width="2%">PB1_total_b_2</th>
    <th width="2%">PB1_b_3a</th>
    <th width="2%">PB1_b_3b</th>
    <th width="3%">PB1_b_3c</th>
    <th width="3%">PB1_b_3d</th>
    <th width="3%">PB1_total_b_3</th>
    <th width="3%">PB1_total_b_4</th>
    <th width="3%">PB1_total_b_5</th>
    <th width="3%">PB1_total_b_6</th>
    <th width="3%">PB1_total_b_7</th>
    <th width="3%">PB1_total_b_8</th>
    <th width="3%">PB1_total_b_9</th>
    <th width="3%">PB1_total_b_10</th>
    <th width="3%">PB1_total_b_11</th>
    <th width="3%">PB1_total_b_12</th>
    <th width="3%">PB1_total_b_13</th>
    <th width="3%">PB1_total_b_14</th>
    <th width="3%">PB1_total_a</th>
    
    <th width="2%">PB2_Luas</th>
    <th width="2%">PB2_b_1a</th>
    <th width="2%">PB2_b_1b</th>
    <th width="2%">PB2_b_1c</th>
    <th width="2%">PB2_total_b_1</th>
    <th width="2%">PB2_total_b_2</th>
    <th width="2%">PB2_b_3a</th>
    <th width="2%">PB2_b_3b</th>
    <th width="3%">PB2_b_3c</th>
    <th width="3%">PB2_b_3d</th>
    <th width="3%">PB2_total_b_3</th>
    <th width="3%">PB2_total_b_4</th>
    <th width="3%">PB2_total_b_5</th>
    <th width="3%">PB2_total_b_6</th>
    <th width="3%">PB2_total_b_7</th>
    <th width="3%">PB2_total_b_8</th>
    <th width="3%">PB2_total_b_9</th>
    <th width="3%">PB2_total_b_10</th>
    <th width="3%">PB2_total_b_11</th>
    <th width="3%">PB2_total_b_12</th>
    <th width="3%">PB2_total_b_13</th>
    <th width="3%">PB2_total_b_14</th>
    <th width="3%">PB2_total_a</th>
    
    
    <th width="2%">PB3_Luas</th>
    <th width="2%">PB3_b_1a</th>
    <th width="2%">PB3_b_1b</th>
    <th width="2%">PB3_b_1c</th>
    <th width="2%">PB3_total_b_1</th>
    <th width="2%">PB3_total_b_2</th>
    <th width="2%">PB3_b_3a</th>
    <th width="2%">PB3_b_3b</th>
    <th width="3%">PB3_b_3c</th>
    <th width="3%">PB3_b_3d</th>
    <th width="3%">PB3_total_b_3</th>
    <th width="3%">PB3_total_b_4</th>
    <th width="3%">PB3_total_b_5</th>
    <th width="3%">PB3_total_b_6</th>
    <th width="3%">PB3_total_b_7</th>
    <th width="3%">PB3_total_b_8</th>
    <th width="3%">PB3_total_b_9</th>
    <th width="3%">PB3_total_b_10</th>
    <th width="3%">PB3_total_b_11</th>
    <th width="3%">PB3_total_b_12</th>
    <th width="3%">PB3_total_b_13</th>
    <th width="3%">PB3_total_b_14</th>
    <th width="3%">PB3_total_a</th>
    
    <th width="2%">PS1_Luas</th>
    <th width="2%">PS1_a_1</th>
    <th width="2%">PS1_a_2</th>
    <th width="2%">PS1_a_3</th>
    <th width="2%">PS1_a_4</th>
    <th width="2%">PS1_a_5</th>
    <th width="2%">PS1_a_6</th>
    <th width="2%">PS1_a_7</th>
    <th width="3%">PS1_a_8</th>
    <th width="3%">PS1_a_9</th>
    <th width="3%">PS1_a_10</th>
    <th width="3%">PS1_a_11</th>
    <th width="3%">PS1_total_a</th>
    
    <th width="2%">PS2_Luas</th>
    <th width="2%">PS2_b_1a</th>
    <th width="2%">PS2_b_1b</th>
    <th width="2%">PS2_b_1c</th>
    <th width="2%">PS2_total_b_1</th>
    <th width="2%">PS2_total_b_2</th>
    <th width="2%">PS2_b_3a</th>
    <th width="2%">PS2_b_3b</th>
    <th width="3%">PS2_b_3c</th>
    <th width="3%">PS2_b_3d</th>
    <th width="3%">PS2_total_b_3</th>
    <th width="3%">PS2_total_b_4</th>
    <th width="3%">PS2_total_b_5</th>
    <th width="3%">PS2_total_b_6</th>
    <th width="3%">PS2_total_b_7</th>
    <th width="3%">PS2_total_b_8</th>
    <th width="3%">PS2_total_b_9</th>
    <th width="3%">PS2_total_b_10</th>
    <th width="3%">PS2_total_b_11</th>
    <th width="3%">PS2_total_b_12</th>
    <th width="3%">PS2_total_b_13</th>
    <th width="3%">PS2_total_b_14</th>
    <th width="3%">PS2_total_a</th>
    
    
    <th width="2%">PS3_Luas</th>
    <th width="2%">PS3_b_1a</th>
    <th width="2%">PS3_b_1b</th>
    <th width="2%">PS3_b_1c</th>
    <th width="2%">PS3_total_b_1</th>
    <th width="2%">PS3_total_b_2</th>
    <th width="2%">PS3_b_3a</th>
    <th width="2%">PS3_b_3b</th>
    <th width="3%">PS3_b_3c</th>
    <th width="3%">PS3_b_3d</th>
    <th width="3%">PS3_total_b_3</th>
    <th width="3%">PS3_total_b_4</th>
    <th width="3%">PS3_total_b_5</th>
    <th width="3%">PS3_total_b_6</th>
    <th width="3%">PS3_total_b_7</th>
    <th width="3%">PS3_total_b_8</th>
    <th width="3%">PS3_total_b_9</th>
    <th width="3%">PS3_total_b_10</th>
    <th width="3%">PS3_total_b_11</th>
    <th width="3%">PS3_total_b_12</th>
    <th width="3%">PS3_total_b_13</th>
    <th width="3%">PS3_total_b_14</th>
    <th width="3%">PS3_total_a</th>
    
    <th width="2%">PT1_Luas</th>
    <th width="2%">PT1_a_1</th>
    <th width="2%">PT1_a_2</th>
    <th width="2%">PT1_a_3</th>
    <th width="2%">PT1_a_4</th>
    <th width="2%">PT1_a_5</th>
    <th width="2%">PT1_a_6</th>
    <th width="2%">PT1_a_7</th>
    <th width="3%">PT1_a_8</th>
    <th width="3%">PT1_a_9</th>
    <th width="3%">PT1_a_10</th>
    <th width="3%">PT1_a_11</th>
    <th width="3%">PT1_total_a</th>
    
    <th width="2%">PT2_Luas</th>
    <th width="2%">PT2_b_1a</th>
    <th width="2%">PT2_b_1b</th>
    <th width="2%">PT2_b_1c</th>
    <th width="2%">PT2_total_b_1</th>
    <th width="2%">PT2_total_b_2</th>
    <th width="2%">PT2_b_3a</th>
    <th width="2%">PT2_b_3b</th>
    <th width="3%">PT2_b_3c</th>
    <th width="3%">PT2_b_3d</th>
    <th width="3%">PT2_total_b_3</th>
    <th width="3%">PT2_total_b_4</th>
    <th width="3%">PT2_total_b_5</th>
    <th width="3%">PT2_total_b_6</th>
    <th width="3%">PT2_total_b_7</th>
    <th width="3%">PT2_total_b_8</th>
    <th width="3%">PT2_total_b_9</th>
    <th width="3%">PT2_total_b_10</th>
    <th width="3%">PT2_total_b_11</th>
    <th width="3%">PT2_total_b_12</th>
    <th width="3%">PT2_total_b_13</th>
    <th width="3%">PT2_total_b_14</th>
    <th width="3%">PT2_total_a</th>
    
    
    <th width="2%">PT3_Luas</th>
    <th width="2%">PT3_b_1a</th>
    <th width="2%">PT3_b_1b</th>
    <th width="2%">PT3_b_1c</th>
    <th width="2%">PT3_total_b_1</th>
    <th width="2%">PT3_total_b_2</th>
    <th width="2%">PT3_b_3a</th>
    <th width="2%">PT3_b_3b</th>
    <th width="3%">PT3_b_3c</th>
    <th width="3%">PT3_b_3d</th>
    <th width="3%">PT3_total_b_3</th>
    <th width="3%">PT3_total_b_4</th>
    <th width="3%">PT3_total_b_5</th>
    <th width="3%">PT3_total_b_6</th>
    <th width="3%">PT3_total_b_7</th>
    <th width="3%">PT3_total_b_8</th>
    <th width="3%">PT3_total_b_9</th>
    <th width="3%">PT3_total_b_10</th>
    <th width="3%">PT3_total_b_11</th>
    <th width="3%">PT3_total_b_12</th>
    <th width="3%">PT3_total_b_13</th>
    <th width="3%">PT3_total_b_14</th>
    <th width="3%">PT3_total_a</th>
    
    <th width="3%">KJ_Berhasil</th>
    <th width="3%">KJ_BTS</th>
    <th width="3%">KJ_b_1a</th>
    <th width="3%">KJ_b_1b</th>
    <th width="3%">KJ_b_1c</th>
    <th width="3%">KJ_total_b_1</th>
    <th width="3%">KJ_total_b_2</th>
    <th width="3%">KJ_b_3a</th>
    <th width="3%">KJ_b_3b</th>
    <th width="3%">KJ_b_3c</th>
    <th width="3%">KJ_b_3d</th>
    <th width="3%">KJ_total_b_3</th>
    <th width="3%">KJ_total_b_4</th>
    <th width="3%">KJ_total_b_5</th>
    <th width="3%">KJ_total_b_6</th>
    <th width="3%">KJ_total_b_7</th>
    <th width="3%">KJ_total_b_8</th>
    <th width="3%">KJ_total_b_9</th>
    <th width="3%">KJ_total_b_10</th>
    <th width="3%">KJ_total_b_11</th>
    <th width="3%">KJ_total_b_12</th>
    <th width="3%">KJ_total_b</th>
    
    <th width="3%">KJB_b_1a</th>
    <th width="3%">KJB_b_1b</th>
    <th width="3%">KJB_b_1c</th>
    <th width="3%">KJB_total_b_1</th>
    <th width="3%">KJB_total_b_2</th>
    <th width="3%">KJB_b_3a</th>
    <th width="3%">KJB_b_3b</th>
    <th width="3%">KJB_b_3c</th>
    <th width="3%">KJB_b_3d</th>
    <th width="3%">KJB_total_b_3</th>
    <th width="3%">KJB_total_b_4</th>
    <th width="3%">KJB_total_b_5</th>
    <th width="3%">KJB_total_b_6</th>
    <th width="3%">KJB_total_b_7</th>
    <th width="3%">KJB_total_b_8</th>
    <th width="3%">KJB_total_b_9</th>
    <th width="3%">KJB_total_b_10</th>
    <th width="3%">KJB_total_b_11</th>
    <th width="3%">KJB_total_b_12</th>
    <th width="3%">KJB_total_b</th>
    <th width="3%">KP_a_1</th>
    <th width="3%">KP_a_2</th>
    <th width="3%">KP_a_3</th>
    <th width="3%">KP_a_4</th>
    <th width="3%">KP_total_b</th>
    <th width="3%">KPB_a_1</th>
    <th width="3%">KPB_a_2</th>
    <th width="3%">KPB_a_3</th>
    <th width="3%">KPB_a_4</th>
    <th width="3%">KPB_total_b</th>
    
    <th width="3%">KA_a_1</th>
    <th width="3%">KA_a_2</th>
    <th width="3%">KA_a_3</th>
    <th width="3%">KA_total_a</th>
    <th width="3%">KA_b_1a</th>
    <th width="3%">KA_b_1b</th>
    <th width="3%">KA_b_1c</th>
    <th width="3%">KA_total_b_1</th>
    <th width="3%">KA_total_b_2</th>
    <th width="3%">KA_total_b</th>
    
    <th width="3%">KAB_a_1</th>
    <th width="3%">KAB_a_2</th>
    <th width="3%">KAB_a_3</th>
    <th width="3%">KAB_total_a</th>
    <th width="3%">KAB_b_1a</th>
    <th width="3%">KAB_b_1b</th>
    <th width="3%">KAB_b_1c</th>
    <th width="3%">KAB_total_b_1</th>
    <th width="3%">KAB_total_b_2</th>
    <th width="3%">KAB_total_b</th>
  </tr>
  <?php
  $con=connect();
  $q="select * from login_estate where success!='0000-00-00 00:00:00'  group by lesen order by lesen  ";
  $r=mysql_query($q,$con);
  $bil=0;
  while($row=mysql_fetch_array($r)){
  ?>
  <tr <?php if($bil%2==0){?>class="alt"<?php } ?>>
    <td><?php echo ++$bil; ?>. </td>
    <td><?php echo $row['lesen'];?></td>
    <td><?php $nl = esub($row['lesen']); echo $nl[0];?></td>
    <td><?php echo $nl[1];?></td>
    <td><?php echo $nl[2];?></td>
    <td><?php echo $nl[3];?></td>
    <td><?php $luas = luas($row['lesen'],'tanam_baru09','tanaman_baru'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Baru','1',$luas[0]); echo $kbm[0];?></td>
    <td><?php echo $kbm[1];?></td>
    <td><?php echo $kbm[2];?></td>
    <td><?php echo $kbm[3];?></td>
    <td><?php echo $kbm[4];?></td>
    <td><?php echo $kbm[5];?></td>
    <td><?php echo $kbm[6];?></td>
    <td><?php echo $kbm[7];?></td>
    <td><?php echo $kbm[8];?></td>
    <td><?php echo $kbm[9];?></td>
    <td><?php echo $kbm[10];?></td>
    <td><?php echo $kbm[11];?></td>
    <td><?php  echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    
    <td><?php  echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
<!---------------------------------------------------------------------->
    
    <td><?php $luas = luas($row['lesen'],'tanam_baru08','tanaman_baru'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Baru','2',$luas[0]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    
    <td><?php $luas = luas($row['lesen'],'tanam_baru07','tanaman_baru'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Baru','3',$luas[0]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    <td><?php $luas = luas($row['lesen'],'tanam_semula09','tanaman_semula'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Semula','1',$luas[0]); echo $kbm[0];?></td>
    <td><?php echo $kbm[1];?></td>
    <td><?php echo $kbm[2];?></td>
    <td><?php echo $kbm[3];?></td>
    <td><?php echo $kbm[4];?></td>
    <td><?php echo $kbm[5];?></td>
    <td><?php echo $kbm[6];?></td>
    <td><?php echo $kbm[7];?></td>
    <td><?php echo $kbm[8];?></td>
    <td><?php echo $kbm[9];?></td>
    <td><?php echo $kbm[10];?></td>
    <td><?php echo $kbm[11];?></td>
    
    <td><?php $luas = luas($row['lesen'],'tanam_semula08','tanaman_semula'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Semula','2',$luas[0]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    
    <td><?php $luas = luas($row['lesen'],'tanam_semula07','tanaman_semula'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penanaman Semula','3',$luas[0]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    <!-- --- ------ ------ --- - - -- - - -- - -   -- -- - --->
    <td><?php $luas = luas($row['lesen'],'tanam_tukar09','tanaman_tukar'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penukaran','1',$luas[0]); echo $kbm[0];?></td>
    <td><?php echo $kbm[1];?></td>
    <td><?php echo $kbm[2];?></td>
    <td><?php echo $kbm[3];?></td>
    <td><?php echo $kbm[4];?></td>
    <td><?php echo $kbm[5];?></td>
    <td><?php echo $kbm[6];?></td>
    <td><?php echo $kbm[7];?></td>
    <td><?php echo $kbm[8];?></td>
    <td><?php echo $kbm[9];?></td>
    <td><?php echo $kbm[10];?></td>
    <td><?php echo $kbm[11];?></td>
    
    <td><?php $luas = luas($row['lesen'],'tanam_tukar08','tanaman_tukar'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penukaran','2',$luas[0]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    
    <td><?php $luas = luas($row['lesen'],'tanam_tukar07','tanaman_tukar'); echo $luas[0];?></td>
    <td><?php $kbm= kos_belum_matang($row['lesen'],$tahun,'Penukaran','3',$luas[0]); echo $kbm[12];?></td>
    <td><?php echo $kbm[13];?></td>
    <td><?php echo $kbm[14];?></td>
    <td><?php echo $kbm[15];?></td>
    <td><?php echo $kbm[16];?></td>
    <td><?php echo $kbm[17];?></td>
    <td><?php echo $kbm[18];?></td>
    <td><?php echo $kbm[19];?></td>
    <td><?php echo $kbm[20];?></td>
    <td><?php echo $kbm[21];?></td>
    <td><?php echo $kbm[22];?></td>
    <td><?php echo $kbm[23];?></td>
    <td><?php echo $kbm[24];?></td>
    <td><?php echo $kbm[25];?></td>
    <td><?php echo $kbm[26];?></td>
    <td><?php echo $kbm[27];?></td>
    <td><?php echo $kbm[28];?></td>
    <td><?php echo $kbm[29];?></td>
    <td><?php echo $kbm[30];?></td>
    <td><?php echo $kbm[31];?></td>
    <td><?php echo $kbm[32];?></td>
    <td><?php echo $kbm[33];?></td>
    
    <td><?php echo $nl[4];?></td>
    <td><?php $bts=bts($row['lesen']); echo $bts[0];?></td>
    <td><?php $jaga = kos_matang_penjagaan($row['lesen'],$tahun,$nl[4],$bts[0]); echo $jaga[0];?></td>
    <td><?php echo $jaga[1];?></td>
    <td><?php echo $jaga[2];?></td>
    <td><?php echo $jaga[3];?></td>
    <td><?php echo $jaga[4];?></td>
    <td><?php echo $jaga[5];?></td>
    <td><?php echo $jaga[6];?></td>
    <td><?php echo $jaga[7];?></td>
    <td><?php echo $jaga[8];?></td>
    <td><?php echo $jaga[9];?></td>
    <td><?php echo $jaga[10];?></td>
    <td><?php echo $jaga[11];?></td>
    <td><?php echo $jaga[12];?></td>
    <td><?php echo $jaga[13];?></td>
    <td><?php echo $jaga[14];?></td>
    <td><?php echo $jaga[15];?></td>
    <td><?php echo $jaga[16];?></td>
    <td><?php echo $jaga[17];?></td>
    <td><?php echo $jaga[18];?></td>
    <td><?php echo $jaga[19];?></td>
    
    <td><?php echo $jaga[20];?></td>
    <td><?php echo $jaga[21];?></td>
    <td><?php echo $jaga[22];?></td>
    <td><?php echo $jaga[23];?></td>
    <td><?php echo $jaga[24];?></td>
    <td><?php echo $jaga[25];?></td>
    <td><?php echo $jaga[26];?></td>
    <td><?php echo $jaga[27];?></td>
    <td><?php echo $jaga[28];?></td>
    <td><?php echo $jaga[29];?></td>
    <td><?php echo $jaga[30];?></td>
    <td><?php echo $jaga[31];?></td>
    <td><?php echo $jaga[32];?></td>
    <td><?php echo $jaga[33];?></td>
    <td><?php echo $jaga[34];?></td>
    <td><?php echo $jaga[35];?></td>
    <td><?php echo $jaga[36];?></td>
    <td><?php echo $jaga[37];?></td>
    <td><?php echo $jaga[38];?></td>
    <td><?php echo $jaga[39];?></td>
    
    <td><?php $kt = kos_matang_penuaian($row['lesen'],$tahun,$nl[4],$bts[0]); echo $kt[0];?></td>
    <td><?php echo $kt[1];?></td>
    <td><?php echo $kt[2];?></td>
    <td><?php echo $kt[3];?></td>
    <td><?php echo $kt[4];?></td>
    <td><?php echo $kt[5];?></td>
    <td><?php echo $kt[6];?></td>
    <td><?php echo $kt[7];?></td>
    <td><?php echo $kt[8];?></td>
    <td><?php echo $kt[9];?></td>
    
    <td><?php $ka = kos_matang_pengangkutan($row['lesen'],$tahun,$nl[4],$bts[0]); echo $ka[0];?></td>
    <td><?php echo $ka[1];?></td>
    <td><?php echo $ka[2];?></td>
    <td><?php echo $ka[3];?></td>
    <td><?php echo $ka[4];?></td>
    <td><?php echo $ka[5];?></td>
    <td><?php echo $ka[6];?></td>
    <td><?php echo $ka[7];?></td>
    <td><?php echo $ka[8];?></td>
    <td><?php echo $ka[9];?></td>
    <td><?php echo $ka[10];?></td>
    <td><?php echo $ka[11];?></td>
    <td><?php echo $ka[12];?></td>
    <td><?php echo $ka[13];?></td>
    <td><?php echo $ka[14];?></td>
    <td><?php echo $ka[15];?></td>
    <td><?php echo $ka[16];?></td>
    <td><?php echo $ka[17];?></td>
    <td><?php echo $ka[18];?></td>
    <td><?php echo $ka[19];?></td>
    
  </tr>
  <?php } ?>
</table>
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td>PB1</td>
    <td>PENANAMAN BARU TAHUN PERTAMA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PB2</td>
    <td>PENANAMAN BARU TAHUN KEDUA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PB3</td>
    <td>PENANAMAN BARU TAHUN KETIGA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td width="3%">PS1</td>
    <td width="97%">PENANAMAN SEMULA TAHUN PERTAMA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PS2</td>
    <td>PENANAMAN SEMULA TAHUN KEDUA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PS3</td>
    <td>PENANAMAN SEMULA TAHUN KETIGA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PT1</td>
    <td>PENUKARAN TAHUN PERTAMA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PT2</td>
    <td>PENUKARAN TAHUN KEDUA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>PT3</td>
    <td>PENUKARAN TAHUN KETIGA (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>KJ</td>
    <td>KOS PENJAGAAN (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>KJB</td>
    <td>KOS PENJAGAAN (Kos Per Tan BTS)</td>
  </tr>
  <tr>
    <td>KT</td>
    <td>KOS PENUAIAN (Kos Per Hektar(RM))</td>
  </tr>
  <tr>
    <td>KTB</td>
    <td>KOS PENUAIAN (Kos Per Tan BTS)</td>
  </tr>
</table>
