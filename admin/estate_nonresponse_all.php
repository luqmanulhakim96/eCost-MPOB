<?php 
extract($_REQUEST);
include '../class/admin.estate.class.php'; ?>

<!--<script type="text/javascript" src="js/table.filter.min.js"></script>
-->

<?php include("baju.php");
include('pages.php');
	if($year == date('Y')){
		$table = 'esub';
	}
	else{
		$table="esub_".$year;
	}
	
	if($type=='peninsular'){
		$result_incomplete = $result_peninsular_incomplete;
		if(isset($negeri)){
			$tempat = $negeri;
		}else{
			$tempat = "Peninsular Malaysia";
		}
	}
	else if($type=='sabah'){
		$result_incomplete = $result_sabah_incomplete;
		if(isset($district)){
			$tempat = $district.", Sabah";
		}else{
			$tempat = "Sabah";
		}
	}
	else if($type=='sarawak'){
		$result_incomplete = $result_sarawak_incomplete;
		if(isset($district)){
			$tempat = $district.", Sarawak";
		}else{
			$tempat = "Sarawak";
		}
	}
	else
	{
		$result_incomplete = $result_all_incomplete;
		$tempat = "Malaysia";
	}
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
<div align="center">
  <h2>List of All Estate Non-Response Survey in <?php echo $tempat;?></h2>
</div>



        <table width="100%" border="0" cellpadding="0" align="left" cellspacing="0" class="baju" id="example2">
	<thead>
		<tr bgcolor="#8A1602" height="30">
			<th width="4%"><span class="style1">No.</span></th>
		  <th width="15%"><span class="style1">Estate Name</span></th>
		  <th width="19%"><span class="style1">Company Name</span></th>
		  <th width="24%"><span class="style1"> License No.</span></th>
		  <th width="14%" bgcolor="#8A1602"><span class="style1">E-mail</span></th>
		  <th width="24%"><span class="style1">Last access</span></th>
		  <th width="24%" class="style1">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php while($row=mysql_fetch_array($result_incomplete)) { ?>
		<tr valign="top" <?php if(++$er%2==0){?>class="alt"<?php } ?>>
			<td><?php //echo $list++; ?></td>
			<td><a href="estate_details_incomplete.php?id=<?php echo $row['lesen'];?>" class="boxcolor">
			  <?php 
			$con=connect();
			$qm ="select * from $table where no_lesen_baru ='".$row['lesen']."'";
			$rm = mysql_query($qm,$con);
			$rowm = mysql_fetch_array($rm);?>
			<?php echo $rowm['Nama_Estet'];?></a></td>
			<td><?php echo $rowm['Syarikat_Induk'];?></td>
			<td><?php echo $rowm['No_Lesen_Baru'];?></td>
			<td><a href="emailnonresponde.php?bil=<?php echo $row['id'];?>" class="boxcolor"><?php echo $rowm['Emel'];?></a><div align="center"></div></td>
			<td><?php 
	 			$qa ="select success,password from login_estate where lesen ='".$row['lesen']."'";
				$ra = mysql_query($qa,$con);
				$rowa = mysql_fetch_array($ra);
			
			echo $rowa['success'];?></td>
		    <td><div align="center"><a href="auto_login.php?username=<?php echo $rowm['No_Lesen_Baru'];?>&amp;password=<?php echo $rowa['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&view=false" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a>
            	<a href="auto_login.php?username=<?php echo $rowm['No_Lesen_Baru'];?>&amp;password=<?php echo $rowa['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&view=true" target="_blank" > <img src="../images/001_36.png" width="20" height="20" border="0" title="View Only" /></a>
            	</div></td>
		</tr>
	<?php } mysql_close($con);?>
	</tbody>
</table>
<br />

&nbsp;&nbsp;&nbsp;<br />
<?php if(isset($district)){?>
	<a href="estate_nonresponse_all_excel.php?type=<?php echo $type;?>&amp;district=<?php echo $district;?>" target="_blank"><img src="../images/Excel-icon.png" width="48" height="48" border="0" title="Pindah ke Excel" /></a><br/>
<?php
}else{
?>
	<a href="estate_nonresponse_all_excel.php?type=<?php echo $type;?>" target="_blank"><img src="../images/Excel-icon.png" width="48" height="48" border="0" title="Pindah ke Excel" /></a><br/>
<?php
}
?>

<br />
<br />