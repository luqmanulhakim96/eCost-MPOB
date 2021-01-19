<?php
session_start();
include ('../Connections/connection.class.php');
extract($_POST);
extract($_GET);
$con = connect();
$var = str_replace("zxz","&",$var);

if($jenis=="company")
{
	$q="insert into company values ('','$var')";
}
else if($jenis=="keahlian")
{
	$q="insert into keahlian values ('','$var','')";
}
else if($jenis=="mukabumi")
{
	$q="insert into muka_bumi values ('','$var')";
}
else if($jenis=="lokasi")
{
	$q="insert into lokasi values ('','$var')";
}
//=============================================================================
else if($jenis=="editcompany")
{
	$q="update company set comp_name ='$var' where comp_id='$id'";
}
else if($jenis=="editkeahlian")
{
	$q="update keahlian set ahli_name ='$var' where ahli_id='$id'";
}
else if($jenis=="editmukabumi")
{
	$q="update muka_bumi set mb_name ='$var' where mb_id='$id'";
}
else if($jenis=="editlokasi")
{
	$q="update lokasi set lokasi_name ='$var' where lokasi_id='$id'";
}
//============================================================================
else if($jenis=="deletecompany")
{
	$q="delete from company where comp_id ='$var'";
}
else if($jenis=="deletekeahlian")
{
	$q="delete from keahlian where ahli_id ='$var'";
}
else if($jenis=="deletemukabumi")
{
	$q="delete from muka_bumi where mb_id ='$var'";
}
else if($jenis=="deletelokasi")
{
	$q="delete from lokasi where lokasi_id ='$var'";
}

$r = mysql_query($q,$con);
echo "<script>window.location.href='home.php?id=po1_1'</script>";
?>