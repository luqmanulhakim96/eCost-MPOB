<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #666666;
}
.style2 {
	color: #666666
}
-->
</style>
<?php include ('baju.php'); ?>
<fieldset>
<legend><span class="style1">Run SQL query/queries on e-COST </span></legend>
<form id="form1" name="form1" method="post" action="home.php?id=sql">
  <table width="75%">
    <tr>
      <td colspan="2"><textarea name="statement" cols="150" rows="4" id="statement" ><?php echo trim($statement); ?>
      </textarea>
        <script language="javascript">
      var f17 = new LiveValidation('statement');
f17.add( Validate.Exclusion, { within: [ 'delete' , 'update', 'truncate','repair' ], partialMatch: true } );
      </script>
      </td>
    </tr>
    <tr>
      <td><input name="run" type="hidden" id="run" value="1" />
        <input type="submit" name="Submit" value="Go" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div>
          <input name="checkbox" type="checkbox" value="checkbox" checked="checked" />
          Show this query here again </div></td>
      <td><div align="right"></div></td>
    </tr>
    <tr>
      <td colspan="2"></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
function convert(x)
{	
	document.form2.action = "run_sql_excel.php?jenis="+x;
	document.form2.target = "_blank";
	document.form2.submit();

}
</script>
<?php if ($run == '1')
{ ?>
<table width="100%">
  <tr>
    <td><form id="form2" name="form2" method="post" action="">
        <a href="#"><img src="../images/Excel-icon.png" width="48" height="48" border="0" title="Convert to Excel" onclick="convert('excel');" /></a>
        <input name="sql" type="hidden" id="sql" value="<?= $statement; ?>" />
      </form></td>
  </tr>
</table>
<?php   $con = connect();
  $query = trim($statement);

  $q = mysql_query($query, $con);

  $num_fields = mysql_num_fields($q);

  echo "<table width='100%' class='baju'><tr>";

  ////Field name display starts////
  for ($i = 0; $i < $num_fields; $i++)
  {
    echo '<th>' . mysql_field_name($q, $i) . '</th>';
  }
  /// Field name display ends /////

  /// Data or Record display starts /////
  while ($nt = mysql_fetch_row($q))
  {
    ++$r;
    if ($r % 2 == 0)
    {
      echo "<tr class='alt' >";
    }
    else
    {
      echo "<tr  >";
    }
    while (list($key, $val) = each($nt))
    {
      echo "<td>$val</td>";
    }
    echo "</tr>";
  }
  ////// End of data display ///////
  echo "</tr></table>"; ?>
<br />
<?php } ?>
</fieldset>
