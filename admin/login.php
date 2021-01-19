<?php error_reporting(0);
include('../Connections/connection.class.php');
?>
<style type="text/css">
<!--
.style1 {color: #0000FF}
-->
</style>
<p>&nbsp;</p>


<form action="login_access.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0" cellpadding="1" cellspacing="0"  aria-describedby="login">
    <tr>
      <td width="33%" rowspan="9" valign="top"><div align="center"><img alt="monitor" src="../images/Monitor.png" width="127" height="145" /></div></td>
      <td width="13%" valign="middle"><strong>User ID</strong></td>
      <td width="1%" valign="bottom"><strong>:</strong></td>
      <td width="27%" valign="bottom"><input name="username" type="text" id="username" size="30" autocomplete="off" value="<?php echo $_COOKIE['cookname'];?>"/></td>
      <td width="26%" align="left" valign="bottom">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top"><strong>Password</strong></td>
      <td valign="top"><strong>:</strong></td>
      <td valign="top"><input name="password" type="password" id="password" size="30" autocomplete="off" value="<?php echo $_COOKIE['cookpass'];?>" /></td>
      <td valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><label>
        <input name="set" type="checkbox" id="set" value="1" />
      Remember my password?</label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><input type="submit" name="button" id="button" value="Login" />      </td>
      <td>&nbsp;</td>
    </tr>
   
  </table>
</form>
