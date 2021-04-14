<?php
error_reporting(0);

session_start();
extract($_REQUEST);
// print_r(extract($_REQUEST));
/** error_reporting(E_ERROR | E_WARNING | E_PARSE); */
include ('../Connections/connection.class.php');
$con = connect();
$q = "SELECT * FROM kos_belum_matang WHERE pb_tahun = '" . $year . "' AND pb_thisyear='" . $thisyear . "' AND lesen ='" . $_SESSION['lesen'] . "' AND pb_type =  '" . $type . "'";
$r = mysqli_query($con,$q);
$total = mysqli_num_rows($r);
// print_r($_REQUEST);
// print_r("<br>");

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
$a_12 = str_replace(",", '', $a_12);
$a_13 = str_replace(",", '', $a_13);
$total_kos_a = str_replace(",", '', $total_kos_a);

if(isset($b_1a)){ //if variable exist in request
  $b_1a = str_replace(",", '', $b_1a);
}else {
  $b_1a = 0;
}

if(isset($b_1b)){ //if variable exist in request
  $b_1b = str_replace(",", '', $b_1b);
}else {
  $b_1b = 0;
}

if(isset($b_1c)){ //if variable exist in request
  $b_1c = str_replace(",", '', $b_1c);
}else {
  $b_1c = 0;
}


// $total_racun = str_replace(",", '', $total_b_1);
if($total_b_1){
  $total_racun = str_replace(",", '', $total_b_1);
}
else {
  $total_racun = number_format($b_1a + $b_1b + $b_1c,2);
  $total_racun = str_replace(",", '', $total_racun);
}

$total_b_2 = str_replace(",", '', $total_b_2);

if(isset($b_3a)){ //if variable exist in request
  $b_3a = str_replace(",", '', $b_3a);
}else {
  $b_3a = 0;
}

if(isset($b_3b)){ //if variable exist in request
  $b_3b = str_replace(",", '', $b_3b);
}else {
  $b_3b = 0;
}

if(isset($b_3c)){ //if variable exist in request
  $b_3c = str_replace(",", '', $b_3c);
}else {
  $b_3c = 0;
}



$total_baja = str_replace(",", '', $total_b_3);

if($total_baja){
  $total_baja = str_replace(",", '', $total_b_3);
}
else {
  $total_baja = $b_3a + $b_3b + $b_3c ;
}

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
$total_b_15 = str_replace(",", '', $total_b_15);
$total_b_16 = str_replace(",", '', $total_b_16);
$total_kos_b = str_replace(",", '', $total_kos_b);
//$total_b_kos_per_hektar = str_replace(",", '', $total_b_kos_per_hektar);



if ($total == 0) {
    $q = "INSERT INTO kos_belum_matang VALUES ('$year','$thisyear', '" . $_SESSION['lesen'] . "', '$type',
	'$a_1',
	'$a_2',
	'$a_3',
	'$a_4',
	'$a_5',
	'$a_6',
	'$a_7',
	'$a_8',
	'$a_9',
	'$a_10',
	'$a_11',
  '$a_12',
  '$a_13',
	'$total_kos_a',
	'$b_1a',
	'$b_1b',
	'$b_1c',
	'$total_racun',
	'$total_b_2',
	'$b_3a',
	'$b_3b',
	'$b_3c',

	'$total_baja',
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
  '$total_b_15',
	'$total_b_16',
	'$total_kos_b',
	'$status'
)";
    $r = mysqli_query($con,$q);
}

if($form_year == 'po1year'){
  $q = "UPDATE kos_belum_matang SET
        a_1 = '$a_1',
        a_2 = '$a_2',
        a_3 = '$a_3',
        a_4 = '$a_4',
        a_5 = '$a_5',
        a_6 = '$a_6',
        a_7 = '$a_7',
        a_8 = '$a_8',
        a_9 = '$a_9',
        a_10 = '$a_10',
        a_11 = '$a_11',
        a_12 = '$a_12',
        a_13 = '$a_13',
        total_a='$total_kos_a',
        b_1a='$b_1a',
        b_1b='$b_1b',
        b_1c='$b_1c',
        total_b_1='$total_racun',
        total_b_2='$total_b_2',
        b_3a='$b_3a',
        b_3b='$b_3b',
        b_3c='$b_3c',

        total_b_3= '$total_baja',
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
        total_b_15='$total_b_15',
        total_b_16='$total_b_16',
        total_b='$total_kos_b',
        status = '$status'
        WHERE pb_tahun = '$year' AND pb_thisyear='$thisyear' AND lesen ='" . $_SESSION['lesen'] . "' AND pb_type =  '$type'";
        $r = mysqli_query($con,$q);
}
elseif ($form_year == 'po2year') {
  $q = "UPDATE kos_belum_matang SET
        b_1a='$b_1a',
        b_1b='$b_1b',
        b_1c='$b_1c',
        total_b_1='$total_racun',
        total_b_2='$total_b_2',
        b_3a='$b_3a',
        b_3b='$b_3b',
        b_3c='$b_3c',

        total_b_3= '$total_baja',
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
        total_b_15='$total_b_15',
        total_b_16='$total_b_16',
        total_b='$total_kos_b',
        status = '$status'
        WHERE pb_tahun = '$year' AND pb_thisyear='$thisyear' AND lesen ='" . $_SESSION['lesen'] . "' AND pb_type =  '$type'";
        // $r = mysqli_query($con,$q)  or die(mysqli_error($con));
          $r = mysqli_query($con,$q)  ;
          // print($q);
}

else {
  $q = "UPDATE kos_belum_matang SET
        b_1a='$b_1a',
        b_1b='$b_1b',
        b_1c='$b_1c',
        total_b_1='$total_racun',
        total_b_2='$total_b_2',
        b_3a='$b_3a',
        b_3b='$b_3b',
        b_3c='$b_3c',

        total_b_3= '$total_baja',
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
        total_b_15='$total_b_15',
        total_b_16='$total_b_16',
        total_b='$total_kos_b',
        status = '$status'
        WHERE pb_tahun = '$year' AND pb_thisyear='$thisyear' AND lesen ='" . $_SESSION['lesen'] . "' AND pb_type =  '$type'";
          $r = mysqli_query($con,$q);
}

if ($total != 0) {
    $q = "UPDATE kos_belum_matang SET
        	a_1 = '$a_1',
        	a_2 = '$a_2',
        	a_3 = '$a_3',
        	a_4 = '$a_4',
        	a_5 = '$a_5',
        	a_6 = '$a_6',
        	a_7 = '$a_7',
        	a_8 = '$a_8',
        	a_9 = '$a_9',
        	a_10 = '$a_10',
        	a_11 = '$a_11',
          a_12 = '$a_12',
          a_13 = '$a_13',
        	total_a='$total_kos_a',
        	b_1a='$b_1a',
        	b_1b='$b_1b',
        	b_1c='$b_1c',
        	total_b_1='$total_racun',
        	total_b_2='$total_b_2',
        	b_3a='$b_3a',
        	b_3b='$b_3b',
        	b_3c='$b_3c',

        	total_b_3= '$total_baja',
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
          total_b_15='$total_b_15',
          total_b_16='$total_b_16',
        	total_b='$total_kos_b',
        	status = '$status'
        	WHERE pb_tahun = '$year' AND pb_thisyear='$thisyear' AND lesen ='" . $_SESSION['lesen'] . "' AND pb_type =  '$type'";
            $r = mysqli_query($con,$q);
}
// echo $q;

$lesen = $_SESSION['lesen'];
$tahuntrim = substr($_SESSION['tahun'], -2);
$pertama = $tahuntrim - 1;
$kedua = $tahuntrim - 2;
$ketiga = $tahuntrim - 3;

if (strlen($pertama) == 1) {
    $pertama = "0" . $pertama;
}
if (strlen($kedua) == 1) {
    $kedua = "0" . $kedua;
}
if (strlen($ketiga) == 1) {
    $ketiga = "0" . $ketiga;
}

$qblm1 = "SELECT * FROM tanam_baru" . $pertama . " tb1 WHERE tb1.lesen = '$lesen' LIMIT 1";
$rblm1 = mysqli_query($con, $qblm1);
$baru1 = mysqli_num_rows($rblm1);

$qblm11 = "SELECT * FROM tanam_baru" . $kedua . " tb2 WHERE tb2.lesen = '$lesen' LIMIT 1";
$rblm11 = mysqli_query($con, $qblm11);
$baru2 = mysqli_num_rows($rblm11);

$qblm111 = "SELECT * FROM tanam_baru" . $ketiga . " tb3 WHERE tb3.lesen = '$lesen' LIMIT 1";
$rblm111 = mysqli_query($con, $qblm111);
$baru3 = mysqli_num_rows($rblm111);

$qblm2 = "SELECT * FROM tanam_semula" . $pertama . " ts1 WHERE ts1.lesen = '$lesen' LIMIT 1";
$rblm2 = mysqli_query($con, $qblm2);
$semula1 = mysqli_num_rows($rblm2);

$qblm22 = "SELECT * FROM tanam_semula" . $kedua . " ts2 WHERE ts2.lesen = '$lesen' LIMIT 1";
$rblm22 = mysqli_query($con, $qblm22);
$semula2 = mysqli_num_rows($rblm22);

$qblm222 = "SELECT * FROM tanam_semula" . $ketiga . " ts3 WHERE ts3.lesen = '$lesen' LIMIT 1";
$rblm222 = mysqli_query($con, $qblm222);
$semula3 = mysqli_num_rows($rblm222);

$qblm3 = "SELECT * FROM tanam_tukar" . $pertama . " tt1 WHERE tt1.lesen = '$lesen' LIMIT 1";
$rblm3 = mysqli_query($con, $qblm3);
$tukar1 = mysqli_num_rows($rblm3);

$qblm33 = "SELECT * FROM tanam_tukar" . $kedua . " tt2 WHERE tt2.lesen = '$lesen' LIMIT 1";
$rblm33 = mysqli_query($con, $qblm33);
$tukar2 = mysqli_num_rows($rblm33);

$qblm333 = "SELECT * FROM tanam_tukar" . $ketiga . " tt3 WHERE tt3.lesen = '$lesen' LIMIT 1";
$rblm333 = mysqli_query($con, $qblm333);
$tukar3 = mysqli_num_rows($rblm333);

$baru = $baru1 + $baru2 + $baru3;
$semula = $semula1 + $semula2 + $semula3;
$tukar = $tukar1 + $tukar2 + $tukar3;

  if ($year == 1 && $type == "Penanaman Baru") {
  if ($status == 2) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
  } else if ($baru2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman Baru'</script>";
  } else if ($baru3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Baru'</script>";
  } else if ($semula1 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penanaman Semula'</script>";
  } else if ($semula2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman Semula'</script>";
  } else if ($semula3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Semula'</script>";
  } else if ($tukar1 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
  } else if ($tukar2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
  } else if ($tukar3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
  } else {
  echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
  }
  }
  if ($year == 2 && $type == "Penanaman Baru") {
  if ($status == 2) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
  } else if ($baru3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Baru'</script>";
  } else if ($semula1 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penanaman Semula'</script>";
  } else if ($semula2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman Semula'</script>";
  } else if ($semula3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Semula'</script>";
  } else if ($tukar1 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
  } else if ($tukar2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
  } else if ($tukar3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
  } else {
  echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
  }
  }
  if ($year == 3 && $type == "Penanaman Baru") {
  if ($status == 2) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
  } else if ($semula1 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penanaman Semula'</script>";
  } else if ($semula2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman Semula'</script>";
  } else if ($semula3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Semula'</script>";
  } else if ($tukar1 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
  } else if ($tukar2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
  } else if ($tukar3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
  } else {
  echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
  }
  }

  if ($year == 1 && $type == "Penanaman Semula") {
  if ($status == 2) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
  } else if ($semula2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman Semula'</script>";
  } else if ($semula3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Semula'</script>";
  } else if ($tukar1 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
  } else if ($tukar2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
  } else if ($tukar3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
  } else {
  echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
  }
  }
  if ($year == 2 && $type == "Penanaman Semula") {
  if ($status == 2) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
  } else if ($semula3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman Semula'</script>";
  } else if ($tukar1 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
  } else if ($tukar2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
  } else if ($tukar3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
  } else {
  echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
  }
  }
  if ($year == 3 && $type == "Penanaman Semula") {
  if ($status == 2) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
  } else if ($tukar1 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
  } else if ($tukar2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
  } else if ($tukar3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
  } else {
  echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
  }
  }
  if ($year == 1 && $type == "Penukaran") {
  if ($status == 2) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
  } else if ($tukar2 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
  } else if ($tukar3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
  } else {
  echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
  }
  }
  if ($year == 2 && $type == "Penukaran") {
  if ($status == 2) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
  } else if ($tukar3 > 0) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
  } else {
  echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
  }
  }
  if ($year == 3 && $type == "Penukaran") {
  if ($status == 2) {
  echo "<script>window.location.href='home.php?id=belum_matang&year=$year&t=$type'</script>";
  } else {
  echo "<script>window.location.href='home.php?id=matang&penjagaan'</script>";
  }
  }

?>
