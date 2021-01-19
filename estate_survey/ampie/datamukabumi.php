<?php session_start();
header("Content-type:application/xml"); 
include('../../Connections/connection.class.php');
include('../../setstring.inc');
$con = connect(); 
$q ="select * from estate_info where lesen = '".$_SESSION['lesen']."'";
$r= mysql_query($q,$con);
$row = mysql_fetch_array($r);

$a=$row['percentrata'];
$b=$row['percentcerun'];
$c=$row['percentbukit'];
$d=$row['percentalun'];


$tanahlanar = $a;
$tanahgambut= $b;
$tanahpedalaman= $c;
$lainlaintanah= $d; 

//pull_out="true";
?>

 <pie>
 
   <slice title="<?=setstring ( 'mal', 'Rata/Landai', 'en', 'Flat Area'); ?>"><?php echo $tanahlanar;?></slice>
   <slice title="<?=setstring ( 'mal', 'Berbukit (Cerun &raquo; 25 darjah)', 'en', 'Area more than 25% slope'); ?>"><?php echo $tanahpedalaman; ?></slice>
   <slice title="<?=setstring ( 'mal', 'Berbukit', 'en', 'Hilly Area'); ?>"><?php echo $tanahgambut; ?></slice>
   <slice title="<?=setstring ( 'mal', 'Beralun', 'en', 'Undulating terrain'); ?>"><?php echo $lainlaintanah; ?></slice>
</pie>