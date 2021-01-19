<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--

table {
	border: 1px solid #999;
}
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="400" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <th scope="col">Import Data</th>
    </tr>
    <tr>
      <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="right"><div align="center">0%</div></td>
          </tr>
        </table>
          </th>      </td>
    </tr>
    <tr>
      <td align="left"><u><strong>Integration to other database</strong></u></td>
    </tr>
    <tr>
      <td align="left">E-Sub Database<br />
        E-Kilang Database<br /></td>
    </tr>
    <tr>
      <td align="center" colspan="3"><span class="style1">Error : invalid connection </span></td>
    </tr>
    <tr>
      <td align="center" colspan="3"><button disabled="disabled">Start Integration</button></td>
    </tr>
  </table>
</form>
<?php if($show==1){?>
<table width="400" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <th scope="col">Import Data</th>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" width="50%" style="background-color:#900; color:#FFF">50%</td>
        <td align="left" width="50%">&nbsp;</td>
      </tr>
    </table></th>
  </tr>
  <tr>
    <td align="left">Connecting to E-Sub Database Server...Succcess!<br />
    Connecting to E-KIlang Database Server...Success!<br />
    Checking data at E-Sub...30%<br />
    Checking data at E-Kilang...50% <br /></td>
  </tr>
    <tr>
      <td align="center" colspan="3"><button disabled="disabled">Start</button></td>
    </tr>
</table>
<?php } ?>
</body>
</html>

