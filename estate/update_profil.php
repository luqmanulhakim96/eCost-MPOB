<?php session_start();
extract($_POST);
include('../Connections/connection.class.php');
$con = connect();

if(date('Y') == $_SESSION['tahun']){
    $table = "esub";
}else{
    $table = "esub_".$_SESSION['tahun'];
}
    $q ="update  ".$table." set alamat1 = '$alamat1', alamat2 = '$alamat2', poskod ='$poskod', bandar =upper('$daerah'), negeri='$negeri', no_telepon = '$notelefon', no_fax ='$nofax', emel = '$email' where no_lesen_baru= '$nolesen'";
    /** echo $q; */
    $r = mysqli_query($con, $q);

    echo "<script>parent.$.fn.colorbox.close(); </script>";
?>
