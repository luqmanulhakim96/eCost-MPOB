<?php include '../class/test.class.php'; ?>
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
      
      <?php
      include('baju.php');
	  include('pages.php');
	  ?>
      <div align="center">
        <h2><strong>List of Incompleted Response Survey in Malaysia</strong></h2>
      </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="baju" id="example2" align="left">
	<thead>

	  <tr bgcolor="#8A1602" height="30">
		  <th width="4%" class="style1">No.</th>
			<th class="style1">Mill Name</th>
			<th class="style1">Company Name</th>
			<th class="style1">License No.</th>
			<th class="style1">E-mail</th>
			<th class="style1">Last access</th>
	        <th class="style1">Action</th>
	  </tr>
	</thead>
	<tbody>
	<?php while($row = mysql_fetch_array($result_all)) { ?>
		<tr valign="top" <?php if($list%2==0){?>class="alt"<?php } ?>>
			<td><?php echo $list++; ?></td>
			<td><a href="details.php?id=<?php echo $row['lesen'];?>" class="boxcolor"><?php echo $row['nama'];?></a></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['lesen'];?></td>
			<td><a href="emailnonresponde.php?bil=<?php echo $row['id'];?>" class="boxcolor"><?php echo $row['email'];?></a><div align="center"></div></td>
			<td><?php echo $row['access'];?></td>
		    <td><div align="center">
            <?php
			$con=connect();
      $qa ="select success,password,lesen from login_mill where lesen ='".$row['lesen']."'";
	$ra = mysql_query($qa,$con);
	$rowrr = mysql_fetch_array($ra);
			?>
            
          <a href="auto_login_mill.php?username=<?php echo $rowrr['lesen'];?>&amp;password=<?php echo $rowrr['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>" target="_blank" title="View Survey"><img src="../estate/images/001_43.gif" alt="View Survey" width="20" height="20" border="0" title="View Survey" /></a>
          
        <a href="auto_login_mill.php?username=<?php echo $rowrr['lesen'];?>&amp;password=<?php echo $rowrr['password'];?>&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&view=true" target="_blank" > <img src="../images/001_36.png" width="20" height="20" border="0" title="View Only" /></a></div></td>
		</tr>
	<?php } mysql_close($con);?>
	</tbody>
</table>
<br />
&nbsp;&nbsp;&nbsp;
<a href="total_incomplete_excel.php" target="_blank"><img src="../images/Excel-icon.png" width="48" height="48" border="0" title="Pindah ke Excel" /></a><br/>
<br />
<br />
