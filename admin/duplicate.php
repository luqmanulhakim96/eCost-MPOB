<title>Duplicate data</title>
<?php include ('../Connections/connection.class.php');
extract($_REQUEST);

$con = connect();
$tahun_lepas = $tahun-1;
 $q="select * from taxonomy_all where type = '".$tahun_lepas."'";
$r=mysql_query($q,$con);

while($row=mysql_fetch_array($r)){

	$add ="INSERT INTO taxonomy_all (
name ,
contents ,
parent ,
level ,
type ,
id ,
position
)
VALUES (
'".$row['name']."', '".$row['contents']."', '".$row['parents']."', '".$row['level']."', '$tahun', '' , '".$row['position']."'
);";
	$radd = mysql_query($add,$con);
}

echo "<script>location.href='home.php?id=config&sub=chapter';</script>";

?>
