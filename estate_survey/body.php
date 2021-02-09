<?php ob_start();
session_start();
 include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
//require '../forum/includes/functions.php';
//include ('../forum/phpbb.php');
?>
<script language="javascript">
function hantar(x)
{
	if(x=='1')
	{
	document.form1.action = "home.php?id=profile&logging=true<?php if(isset($_GET['mill'])) { echo "&mill=true"; } ?>";
	document.form1.target = "_parent";
	document.form1.submit();
	}
	if(x=='2')
	{
	document.form1.action = "home.php?id=home&firsttime";
	document.form1.target = "_parent";
	document.form1.submit();
	}
	if(x=='3')
	{
	document.form1.action = "../mill/home.php?id=home&firsttime";
	document.form1.target = "_parent";
	document.form1.submit();
	}
	if(x=='4')
	{
	document.form1.action = "home.php?id=profile&logging=true&mill=true";
	document.form1.target = "_parent";
	document.form1.submit();
	}
}
</script>
<form action="" method="post" name="form1" id="form1">
</form>
<?php
$con = connect();

	$username = addslashes(strip_tags($username));
	$katalaluan = addslashes(strip_tags($katalaluan));

/*	$remember = TRUE;
    $auth->login($username, $katalaluan, $remember, 1, 1);*/


if($mill!="true")
{
$q ="select * from login_estate where lesen = '$username' and password = '$katalaluan'";
}
if($mill=="true")
{
$q ="select * from login_mill where lesen = '$username' and password = '$katalaluan'";
}
$r = mysqli_query($con, $q);
$row = mysqli_fetch_array($r);
$total = mysqli_num_rows($r);
$firsttime = $row['firsttime'];
$lesen = $row['lesen'];
$password = $row['password'];


/*
$qhash ="select * from phpbb_users where username='$username'";
$rhash=mysqli_query($qhash,$con);
$rowhash = mysqli_fetch_array($rhash);
$password_hash = $rowhash['user_password'];

$check = phpbb_check_hash($katalaluan, $password_hash);
if($check==FALSE)
{
	echo "password incorrect";
}
else if($check==TRUE)
{
	echo "password correct";
}*/

    $_SESSION['lesen'] = $lesen;
	$_SESSION['password']=$password;
	if($mill!="true"){$_SESSION['type']=  "estate";
	$q1 ="update login_estate set success= now() where lesen = '$lesen'";
	$r1 = mysqli_query($con, $q1);
	}
	if($mill=="true"){$_SESSION['type']=  "mill";
	$q1 ="update login_mill set success= now() where lesen = '$lesen'";
	$r1 = mysqli_query($con, $q1);
	}

if ($total==0 and $mill!="true")
{

	$q ="update login_estate set fail= NOW() where lesen = '$username'";
		$r = mysqli_query($con, $q);
	echo "<script>window.location.href='../index1.php?fail=true';</script>";
}

if ($total!=0 and $mill!="true")
{

		$q ="update login_estate set succes= NOW() where lesen = '$username'";
		$r = mysqli_query($con, $q);
}
if ($total==0 and $mill=="true")
{

	$q ="update login_mill set fail= NOW() where lesen = '$username'";
		$r = mysqli_query($con, $q);
	echo "<script>window.location.href='../index1.php?fail=true';</script>";
}

if ($total!=0 and $mill=="true")
{

		$q ="update login_mill set succes= NOW() where lesen = '$username'";
		$r = mysqli_query($con, $q);
}

if ($firsttime=='2' and $mill!="true"){
?>
<body onLoad="hantar(1)"></body>
<?php
}
if ($firsttime=='1' and $mill!="true"){?>
<body onLoad="hantar(2)"></body>
<?php } ?>
<?php
if ($firsttime=='2' and $mill=="true"){
?>
<body onLoad="hantar(4)"></body>
<?php
}
if ($firsttime=='1' and $mill=="true"){?>
<body onLoad="hantar(3)"></body>
<?php } ?>
