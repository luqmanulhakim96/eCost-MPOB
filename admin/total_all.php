<?php include '../class/test.class.php'; ?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
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
      </style>
      <?php include('baju.php');
include('pages.php');
?>
<div align="center"><strong>
List of All Mill Response Survey in Malaysia</strong></div>
        <table width="100%" class="baju" align="left" id="example2">
	<thead>

		<tr  height="30">
			<th width="4%">No.</th>
			<th>Mill Name</th>
			<th>Company Name</th>
			<th>License No.</th>
			<th>E-mail</th>
			<th>Last access</th>
            <th width="24%" class="style1">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php while($row = mysqli_fetch_array($result_all)) { ?>
		<tr valign="top" <?php if($list%2==0){?>class="alt"<?php } ?>>
			<td><?php echo $list++; ?></td>
			<td><a href="details.php?id=<?php echo $row['lesen'];?>" class="boxcolor"><?php echo $row['nama'];?></a></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['lesen'];?></td>
			<td><?php echo $row['email'];?></td>
			<td><?php echo $row['access'];?></td>
            <td><div align="center"><a href="auto_login_mill.php?username=<?php echo $row['lesen'];?>&amp;password=<?php echo $row['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&view=false" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a>
            	<a href="auto_login_mill.php?username=<?php echo $row['lesen'];?>&amp;password=<?php echo $row['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&view=true" target="_blank" > <img src="../images/001_36.png" width="20" height="20" border="0" title="View Only" /></a>
            	</div></td>
		</tr>
	<?php } mysqli_close($con);?>
	</tbody>
</table>
<br />
&nbsp;&nbsp;&nbsp;
<a href="total_all_excel.php" target="_blank"><img src="../images/Excel-icon.png" width="48" height="48" border="0" title="Pindah ke Excel" /></a><br/>
<br />
<br />
