<script type="text/javascript" language="javascript" src="../js/datatable/js/jquery.dataTables.js"></script>
  <style type="text/css">
      		@import "../js/datatable/css/demo_page.css";
			@import "../js/datatable/css/demo_table.css";
      </style>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {

			
	$('#example').dataTable( {"sPaginationType": "full_numbers","iDisplayLength": 25,"sDom" : '<"H"frilp><t>', "bAutoWidth": false,
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