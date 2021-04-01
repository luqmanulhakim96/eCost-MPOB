<?php session_start();

session_destroy();
setcookie("PHPSESSID","",time()-3600,"/");
echo "<script>window.location.href=\"index1.php\"</script>";
?>
