<?php
session_start();


include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
error_reporting(0);

// $con = mysqli_connect();
// $con=mysqli_connect($host, $user, $pass);
// mysqli_select_db($con, $db_n);
$con = connect();

// $password_hashed = password_hash($password, PASSWORD_BCRYPT);

// $q ="select * from login_admin where email = '$username' and password = '$password_hashed' ";
$q ="select * from login_admin where email = '$username'";
// $r = mysqli_query($q,$con);
// $r = mysqli_query($con,$q) or die(mysqli_error($con));

$r = $con->query($q) or die ($con->error());

// $row = mysqli_fetch_array($r);
$row = $r->fetch_array();

// print_r($row['password']);
if (password_verify($password, $row['password'])) { //if password entered matched with encrypted password
	$firsttime = $row['firsttime'];
	$email = $row['email'];

	$_SESSION['type']=  "admin";
	$_SESSION['email']=  $email;

	$con = connect();
	$q1 ="update login_admin set success= now() where email = '$username'";
	// $r1 = mysqli_query($q1,$con);
	// $r = mysqli_query($con, $q1);
	$r = $con->query($q1);


			if(isset($set)){
	  		setcookie("cookname", $username, time()+60*60*24*100, "/");
	 		setcookie("cookpass", $password, time()+60*60*24*100, "/");
   			}

			else
			{
			setcookie("cookname", "", time()+60*60*24*100, "/");
	  		setcookie("cookpass", "", time()+60*60*24*100, "/");
			}

}else {
	// $con = mysqli_connect();
	$con=connect($host,$user,$pass);

	$q ="update login_admin set fail= NOW() where email = '$username'";
	// $r = mysqli_query($q,$con);
	// $r = mysqli_query($con, $q);
	$r = $con->query($q);
	// printf($r);
	echo "<script>window.location.href='../index1.php?fail=true';</script>";
}
echo "<script>window.location.href='home.php?id=home_admin'</script>";
//
// $total = mysqli_num_rows($r);
//
// $firsttime = $row['firsttime'];
// $email = $row['email'];
//
// $_SESSION['type']=  "admin";
// $_SESSION['email']=  $email;
//
// if($total!=0)
// {
// 	$con = connect();
// 	$q1 ="update login_admin set success= now() where email = '$username'";
// 	// $r1 = mysqli_query($q1,$con);
// 	$r = mysqli_query($con, $q1);
//
//
//
// 							if(isset($set)){
// 					  		setcookie("cookname", $username, time()+60*60*24*100, "/");
// 					 		setcookie("cookpass", $password_hashed, time()+60*60*24*100, "/");
// 				   			}
//
// 							else
// 							{
// 							setcookie("cookname", "", time()+60*60*24*100, "/");
// 					  		setcookie("cookpass", "", time()+60*60*24*100, "/");
//
// 							}
// }
//
// else if ($total==0)
// {
//
// 	// $con = mysqli_connect();
// 	$con=connect($host,$user,$pass);
//
// 	$q ="update login_admin set fail= NOW() where email = '$username'";
// 	// $r = mysqli_query($q,$con);
// 	$r = mysqli_query($con, $q);
// 	// printf($r);
// 	// echo "<script>window.location.href='../index1.php?fail=true';</script>";
// }
//
// // echo "<script>window.location.href='home.php?id=home_admin'</script>";



?>
