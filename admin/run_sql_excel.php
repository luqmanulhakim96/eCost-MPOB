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

$q = mysqli_query($con, $query);

$num_fields = mysqli_num_fields($q);

echo "<table width='100%' class='baju'><tr>";

////Field name display starts////
for ($i = 0; $i < $num_fields; $i++)
{
  echo '<th>' . mysqli_field_name($q, $i) . '</th>';
}
/// Field name display ends /////

/// Data or Record display starts /////
while ($nt = mysqli_fetch_row($q))
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
