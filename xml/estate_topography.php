<?php session_start();
//header("Content-type:application/xml");
include('../Connections/connection.class.php');
$con = connect(); 
/*echo $q ="select sum(lanar) as lanar,
sum(gambutcetek) as gambutcetek,
sum(gambutdalam) as gambutdalam,
sum(pedalaman) as pedalaman,
sum(laterit) as laterit,
sum(asidsulfat) as asidsulfat,
sum(tanahpasir) as tanahpasir
 from estate_info where lesen not like '%123456%'";*/
extract($_REQUEST);
 
if($year == date('Y')){
	$table = 'esub';
}
else{
	$table="esub_".$year;
}
$q = "SELECT sum(info.percentrata) as rata, sum(info.percentbukit) as bukit25, sum(info.percentcerun) as bukit, sum(info.percentalun) as beralun
			FROM estate_info info
			INNER JOIN $table a on info.lesen = a.No_Lesen_Baru
			LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year' 
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year' 
			WHERE  
			a.No_Lesen_Baru <> ''
			and a.No_Lesen_Baru not like '%123456%' 
			and (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)";
			
$r= mysql_query($q,$con);
$row = mysql_fetch_array($r);

$rata = $row['rata'];
$bukit25 = $row['bukit25'];
$bukit = $row['bukit'];
$beralun = $row['beralun'];
/*$a=$row['lanar'];
$b=$row['gambutcetek'];
$c=$row['gambutdalam'];
$d=$row['pedalaman'];
$e=$row['laterit'];
$f=$row['asidsulfat'];
$g=$row['tanahpasir'];

$tanahlanar = $a;
$tanahgambut= $b+$c;
$tanahpedalaman= $d;
$lainlaintanah= $e+$f+$g; */

//pull_out="true";
?>

 <pie>
 
   <slice title="Flat Area" pull_out="true"><?php echo $rata;?></slice>
   <slice title="Area more than 25&#176; slope" pull_out="true"><?php echo $bukit25; ?></slice>
   <slice title="Hilly Area" pull_out="true"><?php echo $bukit; ?></slice>
   <slice title="Undulating Terrain" pull_out="true"><?php echo $beralun; ?></slice>
</pie>