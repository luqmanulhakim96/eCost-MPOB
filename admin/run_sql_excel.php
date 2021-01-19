<?php extract($_POST);
extract($_GET);
header("Content-type: application");

if ($jenis == 'excel')
{
  $tarikh = date("F j, Y, g:i a");
  header("Content-Disposition: attachment; filename=sql_query_run[$tarikh].xls");
}

/*if($jenis=='xml')
{header("Content-Disposition: attachment; filename=xml.xml");}*/


include ('../Connections/connection.class.php');

$con = connect();
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