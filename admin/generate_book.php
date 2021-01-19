<?php include('../Connections/connection.class.php');
extract($_REQUEST);






$con = connect();
		$query = "select * from taxonomy_all where id = '$reportid'";
		$res = mysql_query($query,$con);
		$row = mysql_fetch_array($res); 
		$res_total = mysql_num_rows($res);
		
		$name = $row['name'];
	$name = str_replace(".","",$name);
		$name = str_replace(" ","_",$name);

if($type=='not_view'){
header("Content-type:application/msword");
header('Content-Disposition: attachment; filename='.$name.'-'.date('d/m/Y').'.doc');
}
	
?><style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<div align="center">
  <h2><?php echo $row['name'];?>
  </h2>
</div>

<br />
<?php echo $row['contents'];?>
