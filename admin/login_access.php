<?php
session_start();

include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);

$con = connect();
$q ="select * from login_admin where email = '$username' and password = '$password'";
$r = mysql_query($q,$con);
$row = mysql_fetch_array($r);
$total = mysql_num_rows($r);


$firsttime = $row['firsttime'];
$email = $row['email'];

$_SESSION['type']=  "admin";
$_SESSION['email']=  $email;

if($total!=0)
{
	$con = connect();
	$q1 ="update login_admin set success= now() where email = '$username'";
	$r1 = mysql_query($q1,$con);
	
	
							if(isset($set)){
					  		setcookie("cookname", $username, time()+60*60*24*100, "/");
					 		setcookie("cookpass", $password, time()+60*60*24*100, "/");
				   			}

							else
							{
							setcookie("cookname", "", time()+60*60*24*100, "/");
					  		setcookie("cookpass", "", time()+60*60*24*100, "/");

							}
}

else if ($total==0)
{
	
	$con = connect();
	$q ="update login_admin set fail= NOW() where email = '$username'";
	$r = mysql_query($q,$con);
	echo "<script>window.location.href='../index1.php?fail=true';</script>";
}

echo "<script>window.location.href='home.php?id=home_admin'</script>";



?>