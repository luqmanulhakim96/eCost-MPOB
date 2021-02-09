<?php session_start();
header("Content-type:application/xml");
include('../../Connections/connection.class.php');
include('../../setstring.inc');
$con = connect();
$q ="select * from estate_info where lesen = '".$_SESSION['lesen']."'";
$r= mysqli_query($con, $q);
$row = mysqli_fetch_array($r);

$a=$row['lanar'];
$b=$row['gambutcetek'];
$c=$row['gambutdalam'];
$d=$row['pedalaman'];
$e=$row['laterit'];
$f=$row['asidsulfat'];
$g=$row['tanahpasir'];

$tanahlanar = $a;
$tanahgambut= $b+$c;
$tanahpedalaman= $d;
$lainlaintanah= $e+$f+$g;

//pull_out="true";
?>

 <pie>

   <slice title="<?=setstring ( 'mal', 'Tanah Lanar', 'en', 'Alluvial soil'); ?>"><?php echo $tanahlanar;?></slice>
   <slice title="<?=setstring ( 'mal', 'Tanah Pedalaman', 'en', 'Inland Soil'); ?>"><?php echo $tanahpedalaman; ?></slice>
   <slice title="<?=setstring ( 'mal', 'Tanah Gambut', 'en', 'Peat Soil'); ?>"><?php echo $tanahgambut; ?></slice>
   <slice title="<?=setstring ( 'mal', 'Lain-lain Tanah', 'en', 'Others'); ?>"><?php echo $lainlaintanah; ?></slice>
</pie>
