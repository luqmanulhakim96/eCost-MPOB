	<link rel="stylesheet" href="../css/buttons/css/buttons.css" type="text/css" media="screen" />

<?php 

function getListRef($con, $ref) {
	$qw = "select * from taxonomy_all where parent = ".$ref." and type ='".$_COOKIE['tahun_report']."' order by position";
	$res = mysql_query($qw,$con);
    $ss = mysql_num_rows($res);
	$arr = array();
    $x=0;
	while($row=mysql_fetch_array($res))
		{
			 $arr[$x] = array($row['id'], $row['name']);
             $x++;				
		}

return $arr;		

}

function tree() {
	$con = connect();
    return trace($con, 0);
    
}

function trace($con, $ref) {
	$qw = "select * from taxonomy_all where parent = ".$ref." and type ='".$_COOKIE['tahun_report']."'  order by position";
	$res = mysql_query($qw,$con);
	
	$treestr = '';
	// $treestr += "<li>" + node(code,name) + "<ul>" + tree() + "</ul></li>";
	while($row=mysql_fetch_array($res))
		{
		$id = $row['id'];
		$name = $row['name'];
		$type = $row['type'];
		$level= $row['level']+1;
			 $treestr .= "<li>

			  &nbsp;<a href='save_element.php?jenis=delete&id=$id&type=$type' onclick=\"return confirm('Delete this data?');\">Delete</a>
			   &nbsp;<a href='add_element.php?taxoname=$name&taxoid=$id&type=$type&level=$level' class='nilai'>Add</a>
			   
			   &nbsp;<a href='edit_element.php?taxoname=$name&taxoid=$id&type=$type&level=$level' class='nilai'>Edit</a>
			 
			 
			 <b><a href='home.php?id=config&sub=generate&reportid=".$row['id']."'>[".$row['position']."] - " . $row['name'] . "</a></b><ul>" . trace($con, $row['id']) . "</ul></li>";			
		}
    
    return $treestr; 

}

?>
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
</script>    
<?php
	$con = connect();
	$qw_total = "select * from taxonomy_all where type ='".$_COOKIE['tahun_report']."'  order by name";
	$res_total = mysql_query($qw_total,$con);
	$total_res = mysql_num_rows($res_total);
?>
<table width="100%">
  <tr>
    <td>&nbsp;</td>
    <td><form action="" method="post" name="form1" id="form1">

<strong><h2>Add Chapter in Report Book</h2></strong>
    <br />
  Please add chapter that will be include in report book.<br />
  <a href="add_element.php?jenis=simpan&amp;taxoname=<?php echo  $first; ?>&amp;taxoid=0&amp;type=<?php echo $_COOKIE['tahun_report']; ?>&amp;level=0" class="nilai">Add </a>First Element<br />

<?php if($total_res==0){?>
<div id="green-button">
		  <a href="duplicate.php?tahun=<?php echo $_COOKIE['tahun_report'];?>" onclick="return confirm('Are sure to duplicate this data into <?php echo $_COOKIE['tahun_report'];?>?');" class="green-button pcb" >
		  <span>Duplicate Data for <?php echo $_COOKIE['tahun_report'];?></span>           </a>         </div>
<?php } ?>
  <br />
  <br />
  

<ul id="red" class="treeview-red">
<?php echo  tree(); ?>
</ul>
  
    

</form></td>
  </tr>
</table>


