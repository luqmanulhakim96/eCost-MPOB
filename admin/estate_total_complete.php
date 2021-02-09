<?php include '../class/admin.estate.class.php';
include('pages.php');
include('baju.php');
?>

<link rel="stylesheet" href="../js/colorbox/colorbox.css" type="text/css" />
<script type="text/javascript" src="../js/colorbox/colorbox/jquery.colorbox.js"></script>

<script type="text/javascript">
			$(document).ready(function(){
				$(".boxcolor").colorbox({width:"60%", height:"100%", iframe:true});
			});
		</script>







<style>
.filtering { background-color:light-gray}
#jqtf_filters {
	list-style:none;
	}
#jqtf_filters li {
	display:inline-block;
	position:relative;
	float:left;
	margin-bottom:20px
}
.style1 {color: #FFFFFF}
</style>

<div align="center"><h2>List of Completed Response Survey in Malaysia</h2></div>
<table width="100%"  border="0" align="left" cellpadding="4" cellspacing="0" class="baju" id="example2">
<thead>
		<tr bgcolor="#8A1602" height="30">
			<th width="4%" filter='false'><span class="style1">No.</span></th>
		  <th><span class="style1">Estate Name</span></th>
		  <th class="style1">Company Name</th>
		  <th><span class="style1">New License No.</span></th>
		  <th><span class="style1">E-mail</span></th>
		  <th><span class="style1">Last access</span></th>
	      <th class="style1">Action</th>
	  </tr>
	</thead>
	<tbody>
	<?php while($row=mysqli_fetch_array($result_complete)) { ?>
		<tr valign="top" <?php if($list%2==0){?>class="alt"<?php } ?>>
			<td><?php echo $list++; ?></td>
			<td><a href="estate_details.php?id=<?php echo $row['lesen'];?>&year=<?php echo $_COOKIE['tahun_report'];?>" class="boxcolor"><?php echo $row['nama'];?></a></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['lesen'];?></td>
			<td><a href="emailnonresponde.php?emel=<?php echo $row['email'];?>&lesen=<?php echo $row['lesen'];?>"  class="boxcolor"><?php echo $row['email'];?></a><div align="center"></div></td>
			<td><?php echo $row['access'];?></td>
		    <td><div align="center">
            <?php
             $qa ="select success,password,lesen from login_estate where lesen ='".$row['lesen']."'";
	$ra = mysqli_query($con, $qa);
	$rowa = mysqli_fetch_array($ra);
			?>

            <a href="auto_login.php?username=<?php echo $rowa['lesen'];?>&amp;password=<?php echo $rowa['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a>


                   <a href="auto_login.php?username=<?php echo $rowa['lesen'];?>&amp;password=<?php echo $rowa['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&view=true" target="_blank" > <img src="../images/001_36.png" width="20" height="20" border="0" title="View Only" /></a>

            </div></td>
		</tr>
	<?php } mysqli_close($con);?>
	</tbody>
</table>


<br />


&nbsp;&nbsp;&nbsp;
<a href="estate_total_complete_excel.php" target="_blank"><img src="../images/Excel-icon.png" width="48" height="48" border="0" title="Pindah ke Excel" /></a><br/>
<br />
<br />
