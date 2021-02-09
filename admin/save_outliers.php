<?php include ('../Connections/connection.class.php');
extract($_REQUEST);


function semak ($name,$year, $type,$pro, $min,$max){
	$con=connect();
	$q="select * from outliers where name = '$name' and type='$type' and year='$year'";
	$r=mysqli_query($con, $q);
	$total = mysqli_num_rows($r);
	if($total==0){add ($name,$year, $type, $pro, $min, $max);}
	else {kemaskini ($name,$year, $type, $min, $max);}
}

function add ($name,$year, $type, $pro, $min, $max){
	$con=connect();
	$q="INSERT INTO `outliers` (
`NAME` ,
`YEAR` ,
`TYPE` ,
`SUBTYPE` ,
`MIN` ,
`MAX`
)
VALUES (
'$name', '$year', '$type', '$pro', '$min', '$max'
);";
	$r=mysqli_query($con, $q);

}

function kemaskini ($name,$year, $type, $min, $max){
	$con=connect();
 	$q="update outliers set min='$min', max='$max'  where name = '$name' and type='$type' and year='$year'";
	$r=mysqli_query($con, $q);

}

if(isset($update_mill))
{
	for($r=0; $r<=$jumlah; ++$r){
	$s=semak($name[$r], $_COOKIE['tahun_report'], 'mill', $type[$r], $min[$r], $max[$r]);

	}
}
if(isset($update_immature))
{
	for($r=0; $r<=$jumlah; ++$r){
	$s=semak($name[$r], $_COOKIE['tahun_report'], 'estate_immature', $type[$r], $min[$r], $max[$r]);

	}
}
if(isset($update_mature_cost))
{
	for($r=0; $r<=$jumlah; ++$r){
	$s=semak($name[$r], $_COOKIE['tahun_report'], 'estate_mature', $type[$r], $min[$r], $max[$r]);

	}
}
if(isset($update_mature_harvesting))
{
	for($r=0; $r<=$jumlah; ++$r){
	$s=semak($name[$r], $_COOKIE['tahun_report'], 'estate_mature', $type[$r], $min[$r], $max[$r]);

	}
}
if(isset($update_mature_transportation))
{
	for($r=0; $r<=$jumlah; ++$r){
	$s=semak($name[$r], $_COOKIE['tahun_report'], 'estate_mature', $type[$r], $min[$r], $max[$r]);

	}
}

$con=connect();
$qd="delete from outliers where name='' ";
$rd=mysqli_query($con, $qd);

if(isset($update_mill)){
echo "<script>window.location.href='home.php?id=config&sub=range_outliers_mill'; </script>";
}
else{
echo "<script>window.location.href='home.php?id=config&sub=range_outliers'; </script>";

}
?>
