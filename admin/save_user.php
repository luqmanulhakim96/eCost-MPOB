<?php
include('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con= connect();


if(isset($tambah)){
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

 		$query="INSERT INTO `login_admin` (
		`email` ,
		`password` ,
		`firsttime` ,
		`success` ,
		`fail` ,
		`level`
		)

		VALUES (
		'$email', '$password_hashed', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$level'
		);" ;
		$res=mysqli_query($con, $query) or die(mysqli_error($con));
    print_r($res);
 		$query = "INSERT INTO user (
		u_type, u_fullname, u_email, u_image, u_DOB, u_question, u_answer, u_thumb) VALUES
		('1', '$fullname', '$email', 'images/user_portrait.gif', '00-00-0000', '', '', '')";
		$res = mysqli_query($con, $query);

		if($level == "1"){
			$query = "INSERT INTO user_super (u_email) VALUES ('$email')";
			mysqli_query($con, $query);
		}
	echo "<script>window.location.href='home.php?id=config&sub=user';</script>";
}
else if(isset($ubah)){

  $password_hashed = password_hash($password, PASSWORD_BCRYPT);
  
	$query="UPDATE login_admin SET email='$email',password='$password_hashed',level='$level'
	WHERE email='$idp'";
	$res=mysqli_query($con, $query);

	$query = "UPDATE user SET u_fullname='$fullname', u_email='$email' WHERE u_email='$email'";
	$res=mysqli_query($con, $query);

	$query = "SELECT * FROM user_super WHERE u_email = '$email'";
	$res = mysqli_query($con, $query);

	if(mysqli_num_rows($res) > 0){
		if($level == "2"){
			$query = "DELETE FROM user_super WHERE u_email = '$email'";
			mysqli_query($con, $query);
		}else{
			$query = "UPDATE user_super SET u_email = '$email' WHERE u_email = '$email'";
			mysqli_query($con, $query);
		}
	}else{
		if($level == "1"){
			$query = "INSERT INTO user_super(u_email) VALUES ('$email')";
			mysqli_query($con, $query);
		}
	}

	echo "<script>window.location.href='home.php?id=config&sub=user';</script>";
}
?>
