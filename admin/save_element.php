<?php include('../Connections/connection.class.php');
extract($_GET);
extract($_POST);
$con = connect();
//-------------------- addto taxo  ----------------------------
if($jenis=='addtaxo'){
		
}

//-------------------- delete ----------------------------
else if($jenis=='delete'){
				$q ="delete  from taxonomy_all where id='$id' ";
				$r = mysql_query($q,$con);
}

//-------------------- update ----------------------------
else if($jenis=='update'){
				$q ="update from taxonomy_all set where name = '$name' ";
				$r = mysql_query($q,$con);
}
//-------------------- simpan --------------------------------------
else if(isset($simpan))
{
	
	$con=connect();
 $q1="select * from taxonomy_all where name = '$domain' and typetaxo='$taxoname' and parent='$parent' and level ='$level' and type ='$level' limit 0,1";
	$r1=mysql_query($q1,$con);
	$totalr = mysql_num_rows($r1);
	
	if($totalr==0){
	 $q="insert into taxonomy_all values ('$domain','$taxoname','$parent','$level','$type','','')";
	$r = mysql_query($q,$con);
	}
}

echo "<script>window.location.href='home.php?id=config&sub=chapter&type=$type'</script>";



?>
