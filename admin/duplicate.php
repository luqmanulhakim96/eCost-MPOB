<title>Duplicate data</title>
<?php include ('../Connections/connection.class.php');
extract($_REQUEST);

$con = connect();
$tahun_lepas = $tahun-1;
 $q="select * from taxonomy_all where type = '".$tahun_lepas."'";
$r=mysqli_query($con, $q);

while($row=mysqli_fetch_array($r)){

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
	$radd = mysqli_query($con, $add);
}

echo "<script>location.href='home.php?id=config&sub=chapter';</script>";

?>
