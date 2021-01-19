<?php 
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);

$con = connect();
$total = count($emolumen);


function semakbelanja ($nl, $th,$stat){
		$con = connect();
		$q="select * from belanja_status where lesen ='$nl' and tahun = '$th' limit 1";
		$r=mysql_query($q,$con);
		$totalr = mysql_num_rows($r);
					if($totalr==0)
					{
								$q="insert into belanja_status values('$nl', '$th','$stat')";
								$r=mysql_query($q,$con);
					}
					if($totalr>0)
					{
								$q="update belanja_status set status='$stat' where lesen ='$nl' and tahun ='$th'";
								$r=mysql_query($q,$con);
					}
				
}
semakbelanja($_SESSION['lesen'], date('Y'), $status);







if ($wujud==0)
{
for($j=1; $j<=$total; $j++){
$emolumen[$j] =str_replace(",",'',$emolumen[$j]);
$q="INSERT INTO  belanja_am_var (thisyear, lesen, type, kos, subtype) VALUES ('$thisyear', '$lesen', '$type', '$emolumen[$j]', '$j')";
//echo "<br>";
$r = mysql_query($q,$con);
}
}
else
{
for($j=1; $j<=$total; $j++){
$emolumen[$j] = str_replace(",",'',$emolumen[$j]);
$q="update  belanja_am_var set  kos='$emolumen[$j]' where thisyear='$thisyear' and lesen ='$lesen' and type='$type' and subtype= '$j'";
//echo "<br>";
$r = mysql_query($q,$con);
}
}

$totalemolumen=str_replace(",",'',$totalemolumen); 
$q="update belanja_am_kos set $type = '$totalemolumen' where lesen ='$lesen' and thisyear= '$thisyear'";
$r = mysql_query($q,$con);

		 echo "<script>window.close();top.opener.window.location.reload();</script>";

?>