<?php session_start();
extract($_POST);
include('../Connections/connection.class.php');
$con = connect();

if(date('Y') == $_SESSION['tahun']){
    $table = "esub";
}else{
    $table = "esub_".$_SESSION['tahun'];
}
    // $q ="update  ".$table." set alamat1 = '$alamat1', alamat2 = '$alamat2', poskod ='$poskod', bandar =upper('$daerah'), negeri='$negeri', no_telepon = '$notelefon', no_fax ='$nofax', emel = '$email' where no_lesen_baru= '$nolesen'";

if (isset($notelefon)) {


    $q ="update  ".$table." set  no_telepon = '$notelefon', no_fax ='$nofax', emel = '$email' ";
    $r = mysqli_query($con, $q);
    $t = "update  estate_info set pegawai='$pegawai' ";
    $u = mysqli_query($con, $t);


    if (!$r) {
      echo("Error description: " . mysqli_error($con));
    }
  }
  else {
      $p ="update estate_info set syarikat ='$syarikat',integrasi = '$integrasi', keahlian='$keahlian'";
        $s = mysqli_query($con, $p);
        if (!$s) {
          echo("Error description: " . mysqli_error($con));
        }
  }


    echo "<script>parent.$.fn.colorbox.close(); </script>";

exit;
?>
