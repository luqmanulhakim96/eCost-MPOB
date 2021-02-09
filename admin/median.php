<?php

function median($numbers=array())
{
	if (!is_array($numbers))
		$numbers = func_get_args();

	rsort($numbers);
	echo count($numbers);
	echo $mid = (count($numbers) / 2);
	return ($mid % 2 != 0) ? $numbers{$mid-1} : (($numbers{$mid-1}) + $numbers{$mid}) / 2;
}


echo median(array(44,12,34,21,35,55,77,54,60)); // 39
echo median(1,1,1,1,1,1,1,1,1,1,2,2,3,3,3); // 2


// connect to database
$link = mysqli_connect("localhost","root","");
$db = mysqli_select_db("mpob", $link);

// select and retreive data
$sql = "SELECT * FROM graf_kbm where sessionid='Basal fertiliser' and tahun ='2010' and status='1'";
$sql_result = mysqli_query($sql,$link);
$i=0;
while ($row = mysqli_fetch_array($sql_result))
{
// load array with data from table
$test_data[] = $row["y"];
$i = $i + 1;
}
echo median($test_data);

/*
// sort the array
rsort($test_data);

    for ( $count = 0; $count<$i; $count++)
	 echo "$test_data[$count] <br>";

mysql_free_result($sql_result);

$oe_value = count($test_data);

if ($oe_value % 2 == 0 )
    {
    $position = 1;
    }
    else
    {
    $position = 2;
    }
if ($position == 2 )
    {
    $median = $test_data[(count($test_data)/2)];
    }
    else
    {
    $median= (($test_data[(count($test_data)/2)-1]) +
                                  ($test_data[(count($test_data)/2)]))/2;
    }
*/
//  $median will either be the middle value in the array if the count is odd
// or the average of the center two numbers if the count is even
?>
