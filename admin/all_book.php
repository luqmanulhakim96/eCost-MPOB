<?php
include('../Connections/connection.class.php');
?>
<?php //set_time_limit(0);

if($_GET['type']=="doc"){
header("Content-type: application");
header("Content-Disposition: attachment; filename=report.doc");
}

function getListRef($con, $ref) {
	$qw = "select * from taxonomy_all where parent = ".$ref." and type ='".$_GET['tahun']."' order by position";
	$res = mysqli_query($con, $qw);
    $ss = mysqli_num_rows($res);
	$arr = array();
    $x=0;
	while($row=mysqli_fetch_array($res))
		{
			 $arr[$x] = array($row['id'], $row['name']);
             $x++;
		}

return $arr;

}

function tree() {
	$con =connect();
    return trace($con, 0);

}

function trace($con, $ref) {
	$qw = "select * from taxonomy_all where parent = ".$ref." and type ='".$_GET['tahun']."'  order by position";
	$res = mysqli_query($con, $qw);
	$treestr = '';
	// $treestr += "<li>" + node(code,name) + "<ul>" + tree() + "</ul></li>";
	while($row=mysqli_fetch_array($res))
		{
		$id = $row['id'];
		$name = $row['name'];
		$type = $row['type'];
		$level= $row['level']+1;
			 $treestr .= "<br><li>




			 <b>" . $row['name'] . "</b><ul>" . trace($con, $row['id']) . "
			 " . $row['contents'] . "
			 </ul><br></li>";
		}

    return $treestr;

}

?>
<script type="text/javascript" src="../jquery-1.3.2.js"></script>

<script type="text/javascript">
$(document).ready(function(){

	// third example
	$("#red").treeview({
		animated: "slow",
		collapsed: false,
		control: "#treecontrol"
	});

	$(".nilai").colorbox({width:"60%", height:"20%"});



});
</script><style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>

<title>Report of the MPOB Palm Oil Cost of Production Survey in <?php echo $_GET['tahun'];?></title><table width="100%">
  <tr>
    <td><form action="" method="post" name="form1" id="form1">

<strong>
<h2>Report of the MPOB Palm Oil Cost of Production Survey in <?php echo $_GET['tahun'];?></h2>
</strong>



<ul id="red" class="treeview-red">
<?= tree(); ?>
</ul>



</form></td>
  </tr>
</table>
