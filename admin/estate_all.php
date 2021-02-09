<?php
session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");

include('Connections/connection.class.php');?>

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

	$('#the_table').dataTable( {
		"bProcessing": true,
		"bAutoWidth": true,
		"sAjaxSource": "estate_all_server.php",
		"iDisplayStart": 10,
		"sPaginationType": "full_numbers",
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
		"aaSorting": [[ 2, 'asc' ]]
	} );
			} );



</script>



<script type="text/javascript">

function openScript(url, width, height) {
        var Win = window.open(url,"openScript",'_blank','width=' + width + ',height=' + height + ',resizable=yes,scrollbars=yes,menubar=no,status=yes' );
}

</script>

        <h2>List of Estate in E-COST<br />
        </h2>
        <h3>
        <a href="#" onclick="openScript('add_estate_all.php','','')" >
        <img src="../images/add_48.png" width="24" height="24" border="0" />
        Add New Estate      </a>  </h3>

      <table width="100%" id="the_table" class="display">

          <thead>
          <tr>
            <th width="4%">No.</th>
            <th width="30%">Estate Name</th>
            <th width="16%">Old License No.</th>
            <th width="24%">New License No. </th>
            <th width="26%">Main Company</th>

            <th width="26%">Action</th>
          </tr>
        </thead>
        <tbody>
        <tr>
			<td colspan="6" class="dataTables_empty">Loading data from server</td>
		</tr>
        </tbody>
      </table>

        <br />
<br />
<?php mysqli_close($con);?>
