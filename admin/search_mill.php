<?php
  session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");
?>

<link href="../css/buttonround.css" rel="stylesheet" type="text/css" />
<!-- script control search kredit to EOL--> 
<script language="JavaScript">
function clear_search_field(form_field) 
{
    if (form_field.value == "License No. @ Mill Name") { form_field.value='';}
}
function hantarall()
{
    document.find2.action = "home.php?id=adm_mill&sub=view_mill";
    document.find2.submit();
}
</script>
 <!-- /script control search --> 
  <br />
<form id="find2" name="find2" method="post" action="">
  <div align="center">
    <input name="search" autocomplete="off" type="text" id="search" onclick="clear_search_field(this);" value="License No. @ Mill Name" size="50" />
    <a href="#" class="round" onclick="hantarall();"><ins>Find Mill</ins></a>
 
  </div>
</form>
   <br />   <br />