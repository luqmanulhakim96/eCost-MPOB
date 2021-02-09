<?php
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con = connect();
for($i=0; $i<$total; $i++)
{
$minimum[$i] =str_replace(",",'',$minimum[$i]);
$maximum[$i] =str_replace(",",'',$maximum[$i]);

$q ="update ringkasan_kos set minimum = '".$minimum[$i]."', maximum ='".$maximum[$i]."' where type = '".$type[$i]."'";
$r =mysqli_query($con, $q);
}
echo "<script>window.location.href='home.php?id=config&sub=range'</script>";

?>
