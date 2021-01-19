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
    if (form_field.value == "License No. @ Estate Name") { form_field.value='';}
}
function hantarall()
{
    document.find1.action = "home.php?id=estate&sub=view_estate";
    document.find1.submit();
}
</script>
 <!-- /script control search --> 
  <br />
<form id="find1" name="find1" method="post" action="">
  <div align="center">
    <input name="search" autocomplete="off" type="text" id="search" onclick="clear_search_field(this);" value="License No. @ Estate Name" size="50" />
    
    <?php if ($id=='estate'){ ?><a href="#" class="round" onclick="hantarall();"><ins>Find Estate</ins></a><?php } ?>
 
  </div>
</form>
   <br />   <br />