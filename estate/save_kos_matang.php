<?php

error_reporting(0);
session_start();
extract($_POST);
extract($_GET);


include ('../Connections/connection.class.php');
$con = connect();
if ($type == "penjagaan") {
    $table = "kos_matang_penjagaan";
} else if ($type == "penuaian") {
    $table = "kos_matang_penuaian";
} else if ($type == "pengangkutan") {
    $table = "kos_matang_pengangkutan";
}

$q = "select * from $table where pb_thisyear='$thisyear' and lesen ='" . $_SESSION['lesen'] . "'";
$r = mysqli_query($con, $q);
$total = mysqli_num_rows($r);



$a_1 = str_replace(",", '', $a_1);
$a_2 = str_replace(",", '', $a_2);
$a_3 = str_replace(",", '', $a_3);
$a_4 = str_replace(",", '', $a_4);
$a_5 = str_replace(",", '', $a_5);
$a_6 = str_replace(",", '', $a_6);
$a_7 = str_replace(",", '', $a_7);
$a_8 = str_replace(",", '', $a_8);
$a_9 = str_replace(",", '', $a_9);
$a_10 = str_replace(",", '', $a_10);
$a_11 = str_replace(",", '', $a_11);
$total_kos_a = str_replace(",", '', $total_kos_a);
$b_1a = str_replace(",", '', $b_1a);
$b_1b = str_replace(",", '', $b_1b);
$b_1c = str_replace(",", '', $b_1c);


$total_b_1 = str_replace(",", '', $total_b_1);
$total_b_2 = str_replace(",", '', $total_b_2);
$b_3a = str_replace(",", '', $b_3a);
$b_3b = str_replace(",", '', $b_3b);
$b_3c = str_replace(",", '', $b_3c);
$b_3d = str_replace(",", '', $b_3d);
$total_b_3 = str_replace(",", '', $total_b_3);
$total_b_4 = str_replace(",", '', $total_b_4);
$total_b_5 = str_replace(",", '', $total_b_5);
$total_b_6 = str_replace(",", '', $total_b_6);
$total_b_7 = str_replace(",", '', $total_b_7);
$total_b_8 = str_replace(",", '', $total_b_8);
$total_b_9 = str_replace(",", '', $total_b_9);
$total_b_10 = str_replace(",", '', $total_b_10);
$total_b_11 = str_replace(",", '', $total_b_11);
$total_b_12 = str_replace(",", '', $total_b_12);
$total_b_13 = str_replace(",", '', $total_b_13);
$total_b_14 = str_replace(",", '', $total_b_14);
$total_b = str_replace(",", '', $total_b);

$total_a = str_replace(",", '', $total_a);

//------------------------------ kos matang (penjagaan) -----------------------------------
if ($total == 0 and $type == "penjagaan") {
    $q = "insert into kos_matang_penjagaan values ('$thisyear', '" . $_SESSION['lesen'] . "',
	'$b_1a',
	'$b_1b',
	'$b_1c',
	'$total_b_1',
	'$total_b_2',
	'$b_3a',
	'$b_3b',
	'$b_3c',
	'$b_3d',
	'$total_b_3',
	'$total_b_4',
	'$total_b_5',
	'$total_b_6',
	'$total_b_7',
	'$total_b_8',
	'$total_b_9',
	'$total_b_10',
	'$total_b_11',
  '$total_b_12',
  '$total_b_13',
	'$total_b_14',
	'$total_a',
	'$status'
)";

    $r = mysqli_query($con, $q) or die(mysqli_error());
}
if ($total == 1 and $type == "penjagaan") {
    $q = "update kos_matang_penjagaan set
	b_1a='$b_1a',
	b_1b='$b_1b',
	b_1c='$b_1c',
	total_b_1='$total_b_1',
	total_b_2='$total_b_2',
	b_3a='$b_3a',
	b_3b='$b_3b',
	b_3c='$b_3c',
	b_3d='$b_3d',
	total_b_3= '$total_b_3',
	total_b_4='$total_b_4',
	total_b_5='$total_b_5',
	total_b_6='$total_b_6',
	total_b_7='$total_b_7',
	total_b_8='$total_b_8',
	total_b_9='$total_b_9',
	total_b_10='$total_b_10',
	total_b_11='$total_b_11',
	total_b_12='$total_b_12',
  total_b_13='$total_b_13',
  total_b_14='$total_b_14',
	total_b='$total_a',
	status = '$status'
	where pb_thisyear='$thisyear' and lesen ='" . $_SESSION['lesen'] . "'";
    $r = mysqli_query($con, $q) or die(mysqli_error());
}
//------------------------------ kos matang (penuaian) -----------------------------------
if ($total == 0 and $type == "penuaian") {
    $total_b = str_replace(",", '', $total_b);
    $q = "insert into kos_matang_penuaian values ('$thisyear', '" . $_SESSION['lesen'] . "',
	'$a_1',
	'$a_2',
	'$a_3',
	'$a_4',
	'$total_b',
	'$status'
)";
    $r = mysqli_query($con, $q);
}
if ($total == 1 and $type == "penuaian") {
    $total_b = str_replace(",", '', $total_b);
    $q = "update kos_matang_penuaian set
	a_1='$a_1',
	a_2='$a_2',
	a_3='$a_3',
	a_4='$a_4',
	total_b='$total_b',
	status = '$status'
	where pb_thisyear='$thisyear' and lesen ='" . $_SESSION['lesen'] . "'";
    $r = mysqli_query($con, $q);
}
//------------------------------ kos matang (pengangkutan) -----------------------------------
if ($total == 0 and $type == "pengangkutan") {
    $total_racun = str_replace(",", '', $total_b_1);
    $total_b_1 = str_replace(",", '', $total_b_2);
    $total_b = str_replace(",", '', $total_a);

    $q = "insert into kos_matang_pengangkutan values ('$thisyear', '" . $_SESSION['lesen'] . "',
	'$a_1',
	'$a_2',
	'$a_3',
	'$total_racun',
	'$b_1a',
	'$b_1b',
	'$b_1c',
	'$total_b_1',
	'$total_b_3',
	'$total_b',
	'$status'
)";
    $r = mysqli_query($con, $q);
}
if ($total == 1 and $type == "pengangkutan") {

    $total_b_1 = str_replace(",", '', $total_b_1);
    $a_1 = str_replace(",", '', $a_1);
    $a_2 = str_replace(",", '', $a_2);
    $a_3 = str_replace(",", '', $a_3);
    $total_b_2 = str_replace(",", '', $total_b_2);
    $b_1a = str_replace(",", '', $b_1a);
    $b_1b = str_replace(",", '', $b_1b);
    $b_1c = str_replace(",", '', $b_1c);

    $total_b_3 = str_replace(",", '', $total_b_3);
    $total_a = str_replace(",", '', $total_a);


    $q = "update kos_matang_pengangkutan set
	a_1='$a_1',
	a_2='$a_2',
	a_3='$a_3',
	total_a = '$total_b_1',
	b_1a='$b_1a',
	b_1b='$b_1b',
	b_1c='$b_1c',
	total_b_1='$total_b_2',
	total_b_2='$total_b_3',
	total_b='$total_a',
	status = '$status'
	where pb_thisyear='$thisyear' and lesen ='" . $_SESSION['lesen'] . "'";
    $r = mysqli_query($con, $q);
}

if ($type == "penjagaan") {
    if ($status == 2) {
        $id = "matang&penjagaan";
        echo "<script>window.location.href='home.php?id=$id'</script>";
    } else {
        $id = "matang&penuaian";
        echo "<script>window.location.href='home.php?id=$id'</script>";
    }
} else if ($type == "penuaian") {
    if ($status == 2) {
        $id = "matang&penuaian";
        echo "<script>window.location.href='home.php?id=$id'</script>";
    } else {
        $id = "matang&pengangkutan";
        echo "<script>window.location.href='home.php?id=$id'</script>";
    }
} else if ($type == "pengangkutan") {
    if ($status == 2) {
        $id = "matang&pengangkutan";
        echo "<script>window.location.href='home.php?id=$id'</script>";
    } else {
        $id = "umum";
        echo "<script>window.location.href='home.php?id=$id'</script>";
    }
}
?>
