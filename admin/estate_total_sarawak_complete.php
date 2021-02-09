<?php include '../class/admin.estate.class.php'; ?>
<script type="text/javascript" language="javascript" src="../js/datatable/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {


	$('#example').dataTable( {"sPaginationType": "full_numbers","iDisplayLength": 25,
		"fnDrawCallback": function ( oSettings ) {
			/* Need to redo the counters if filtered or sorted */
			if ( oSettings.bSorted || oSettings.bFiltered )
			{
				for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
				{
					$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
				}
			}
		},
		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [ 0 ] }
		],
		"aaSorting": [[ 1, 'asc' ]]
	} );
} );
			</script>

<link rel="stylesheet" href="../js/colorbox/colorbox.css" type="text/css" />
<script type="text/javascript" src="../js/colorbox/colorbox/jquery.colorbox.js"></script>

<script type="text/javascript">
			$(document).ready(function(){
				$(".boxcolor").colorbox({width:"60%", height:"100%", iframe:true});
			});
		</script>


      <style>
      		@import "../js/datatable/css/demo_page.css";
			@import "../js/datatable/css/demo_table.css";
      .style1 {color: #FFFFFF}
      </style>

<div align="center"><h2>List of Completed Response Survey in Sarawak</h2></div>

 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="example">
	<thead>
		<tr bgcolor="#8A1602" height="30">
			<th width="4%"><span class="style1">No.</span></th>
		  <th><span class="style1">Estate Name</span></th>
		  <th><span class="style1">License</span></th>
		  <th class="style1">Company Name</th>
		  <th><span class="style1">E-mail</span></th>
		  <th><span class="style1">Last access</span></th>
	      <th class="style1">Action</th>
	  </tr>
	</thead>
	<tbody>
	<?php while($row=mysqli_fetch_array($result_sarawak_complete)) { ?>
		<tr valign="top">
			<td><?php echo $list++; ?></td>
			<td><a href="estate_details.php?id=<?php echo $row['lesen'];?>&year=<?php echo $_COOKIE['tahun_report'];?>" class="boxcolor"><?php echo $row['nama'];?></a></td>
			<td><?php echo $row['lesen'];?></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><a href="emailnonresponde.php?lesen=<?php echo $row['lesen'];?>" class="boxcolor"><?php echo $row['email'];?></a><div align="center"></div></td>
			<td><?php echo $row['access'];?></td>
		    <td><div align="center">
              <?php  $qa ="select success,password,lesen from login_estate where lesen ='".$row['lesen']."'";
	$ra = mysqli_query($con, $qa);
	$rowa = mysqli_fetch_array($ra);?>
            <a href="auto_login.php?username=<?php echo $rowa['lesen'];?>&amp;password=<?php echo $rowa['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a></div></td>
		</tr>
	<?php } mysqli_close($con);?>
	</tbody>
</table>



<br />
&nbsp;&nbsp;&nbsp;
<a href="estate_total_sarawak_complete_excel.php" target="_blank"><img src="../images/Excel-icon.png" width="48" height="48" border="0" title="Pindah ke Excel" /></a><br/>
<br />
<br />
