<?php 
session_start();
include ('../Connections/connection.class.php');
extract($_REQUEST);
include ('baju.php');

$con = connect();
	 $q ="select * from negeri where nama='$id' order by nama";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$row=mysql_fetch_array($r);
?><style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><h2>List of District in <?php echo $row['nama'];?>
    </h2>
<img name="<?php echo $id; ?>" src="../images/<?php echo $row['negeri_path'];?>" alt="negeri" /><br />
<br />
<table width="100%" class="baju">
  
  <tr>
    <th width="4%">No.</th>
    <th width="96%">District Name</th>
    <th width="96%">Report</th>
  </tr>
  <?php
  	$q ="select * from district where state_id='".$row['id']."' order by district_name";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		while($rowd=mysql_fetch_array($r)){
  ?>
  
  <tr <?php if(++$l%2==0){?>class="alt"<?php } ?>>
    <td><?php echo $l;?>. </td>
    <td><?php echo $rowd['district_name'];?></td>
    <td><div align="center"><a href="<?php echo $_SESSION['ru'];?>&district=<?php echo $rowd['district_name'];?>">View</a></div></td>
  </tr>
  <?php } ?>
</table>

