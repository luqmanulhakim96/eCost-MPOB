<?php

session_start();
error_reporting(1);

include ('../Connections/connection.class.php');
extract($_REQUEST);
//extract($_GET);
ini_set('memory_limit', '100M');

//$whitelist = array('jpg', 'png', 'gif', 'jpeg','xls','pdf','doc','docx','xlsx','mp4');    // Allowed file extensions
$whitelist = array('pdf');    // Allowed file extensions

$backlist = array('php', 'php3', 'php4', 'phtml', 'exe', 'jpg', 'png', 'gif', 'jpeg', 'mp4', 'xls', 'doc', 'docx'); // Restrict file extensions

$con = connect();
$qfile = "select * from file_upload where id ='$id'";
$rfile = mysqli_query($con, $qfile);
$rowfile = mysqli_fetch_array($rfile);
$pathfile = $rowfile['path'];

/* start of captcha validation */
//echo $_SESSION['captcha']['code'];
if($captcha!=$_SESSION['captcha']['code']){
echo "<html><script language='javascript'>alert('Invalid CAPTCHA Code!'); location.href='home.php?id=config&sub=upfile';</script></html>";
}
/* end of captcha validation */


//=============== for video upload ========================
if ($jenis == 'file') {

    function findexts($filename) {
        $filename = strtolower($filename);
        // $exts = preg_split("[/\\.]", $filename);
        // $n = count($exts) - 1;
        // $exts = $exts[$n];
        $exts = pathinfo($filename, PATHINFO_EXTENSION);
        return $exts;
    }

    $ext = findexts($_FILES['ufile']['name']);
    // echo $ext;
    if (!in_array($ext, $whitelist))
        HandleError('Invalid file extension');
    if (in_array($ext, $backlist))
        HandleError('Invalid file extension');

    $target = "../file/";
    $target = $target . "ecost" . rand() . "." . $ext;

    $addby = $_SESSION['email'];
    $addfrom = $_SERVER['REMOTE_ADDR'];
    if (move_uploaded_file($_FILES['ufile']['tmp_name'], $target)) {
        $q = "insert into file_upload (`path`, `title`, `status`, `addby`, `addtime`, `addfrom`) values ($target','$title','1', '$addby', now(), '$addfrom');";
        $r = mysqli_query($con, $q);
        echo $q;
    } else {
        echo "<html><script language='javascript'>alert('Upload File Failed!'),history.go(-1)</script></html>";
    }
}
//=============================delete file ===============

if ($jenis == 'delete') {
    $q = "delete from file_upload where id= '$id' ";
    $r = mysqli_query($con, $q);
//echo $pathfile;
    unlink($pathfile);
}

function HandleError($message) {
    //echo $message;
    echo "<script language='javascript'>alert('$message'),history.go(-1)</script>";
    exit(0);
}

// echo "<script>window.location.href='home.php?id=config&sub=upfile'</script>";
?>
