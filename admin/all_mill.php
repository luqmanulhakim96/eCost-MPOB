<?php include('Connections/connection.class.php');?>

		<link rel="shortcut icon" href="../images/rental_icon.ico" />
	<title></title>
		<style type="text/css" title="currentStyle">
			@import "../js/datatable/css/demo_page.css";
			@import "../js/datatable/css/demo_table.css";
		body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
        </style>


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


<script type="text/javascript">

function openScript(url, width, height) {
        var Win = window.open(url,"openScript",'_blank','width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}

</script>

        <h2>List of Mill in E-COST<br />
        </h2>
        <h3><!--
        <a href="#" onclick="openScript('add_mill_all.php','','')" >
        <img src="../images/add_48.png" width="24" height="24" border="0" />
        Add New Mill      </a>  --></h3>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="example">

          <thead>
          <tr bgcolor="#FF9966">
            <th width="4%">No.</th>
            <th width="30%">Estate Name</th>
            <th width="16%">License No.</th>
            <th width="24%">State</th>
            <th width="26%">Action </th>
          </tr>
          </thead>


          <tbody>
          <?php


	 		$con = connect();

			$q="select * from alamat_ekilang order by lesen ";
			$r=mysqli_query($con, $q);
			$total = mysqli_num_rows($r);
			$k=0;
			while($row=mysqli_fetch_array($r)){
			if($k%2==0){ $color = "#FFCCCC"; }
		  if($k%2==1) { $color = "#FFE784"; }
		  ?>
          <tr valign="top" bgcolor="<?php echo $color; ?>">
            <td><div align="left"><?php echo $k=$k+1; ?></div></td>
            <td><div align="left"><?php echo $row['nama'];?></div></td>
            <td><div align="left"><?php echo $row['lesen'];?></div></td>
            <td><div align="left"><?php echo $row['alamat1'];?> <?php echo $row['alamat3'];?> <?php echo $row['alamat3'];?></div></td>
            <td><div align="center">

            <a href="#" onclick="openScript('view_mill_all.php?nolesen=<?php echo $row['lesen'];?>','','')" ><img src="../images/001_36.png" alt="Edit" width="20" height="20" border="0" title="Edit this information" /></a>

            <!--<a href="delete_all_data_mill.php?nolesen=<?php echo $row['lesen'];?>&tahun=<?php echo date('Y');?>"><img src="../images/remove.png" width="20" height="20" border="0" title="Delete this data?" onclick="return confirm('Are you sure to delete this data? All deleted data are not recoverable.');" /></a>--></div></td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
        <br />
<br />
<?php mysqli_close($con);?>
