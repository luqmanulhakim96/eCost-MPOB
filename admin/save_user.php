<?php
include('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con= connect();

if(isset($tambah)){
 		$query="INSERT INTO `login_admin` (
		`email` ,
		`password` ,
		`firsttime` ,
		`success` ,
		`fail` ,
		`level`
		)
		VALUES (
		'$email', '$password', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$level'
		);";
		$res=mysql_query($query,$con);

 		$query = "INSERT INTO user (
		u_type, u_fullname, u_email, u_image, u_DOB, u_question, u_answer, u_thumb) VALUES
		('1', '$fullname', '$email', 'images/user_portrait.gif', '00-00-0000', '', '', '')";
		$res = mysql_query($query,$con);
		
		if($level == "1"){
			$query = "INSERT INTO user_super (u_email) VALUES ('$email')";
			mysql_query($query, $con);
		}
	echo "<script>window.location.href='home.php?id=config&sub=user';</script>";
}
else if(isset($ubah)){
	$query="UPDATE login_admin SET email='$email',password='$password',level='$level'
	WHERE email='$idp'";
	$res=mysql_query($query,$con);
	
	$query = "UPDATE user SET u_fullname='$fullname', u_email='$email' WHERE u_email='$email'";
	$res=mysql_query($query,$con);
	
	$query = "SELECT * FROM user_super WHERE u_email = '$email'";
	$res = mysql_query($query, $con);
	
	if(mysql_num_rows($res) > 0){
		if($level == "2"){
			$query = "DELETE FROM user_super WHERE u_email = '$email'";
			mysql_query($query, $con);
		}else{
			$query = "UPDATE user_super SET u_email = '$email' WHERE u_email = '$email'";
			mysql_query($query, $con);
		}
	}else{
		if($level == "1"){
			$query = "INSERT INTO user_super(u_email) VALUES ('$email')";
			mysql_query($query, $con);
		}
	}

	echo "<script>window.location.href='home.php?id=config&sub=user';</script>";
}
?>