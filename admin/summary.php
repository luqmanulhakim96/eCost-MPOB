<?php

  session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17%" valign="top" class="tajuk"><?php include("menu_summary.php"); ?>&nbsp;</td>
    <td width="83%" valign="top"><table width="99%" border="0" cellpadding="0" cellspacing="0" class="tableinside">
      <tr>
        <td><?php include($open_detail); ?></td>
      </tr>
    </table></td>
  </tr>
</table>