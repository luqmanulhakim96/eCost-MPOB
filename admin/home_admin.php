<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 13px;
	font-weight: bold;
}
-->
</style>
<table width="90%" border="0" align="center" cellspacing="0">
  <tr>
    <td colspan="2"><h2>Welcome Administrator</h2>
        <ul>
          <li>Last successful login was on
            <?= $user->success; ?>
          </li>
        </ul>
      <ul>
          <li>Last failed login was on
            <?= $user->fail;  ?>
          </li>
      </ul>
      <ul>
          <li>Please use navigation bar to proceed.</li>
		  </ul><ul>
		  <li>To view the details of submitted responses, click on 'Estate' or 'Mill'.</li>
      </ul></td>
  </tr>
  <tr>
    <td width="22%" height="17">&nbsp;</td>
    <td width="78%" valign="top">&nbsp;</td>
  </tr>
  <?php include('overview-estate.php'); ?>
  <tr>
    <td height="18" colspan="2">&nbsp;</td>
  </tr>
  <?php include('overview-mill.php'); ?>
  <tr>
    <td height="19">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
