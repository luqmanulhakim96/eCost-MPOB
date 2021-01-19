<style>
			@import "../js/datatable/media/css/demo_table_jui.css";
</style>
<script type="text/javascript" language="javascript" src="../js/datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
		
			
	$('#example2').dataTable( {"sPaginationType": "full_numbers","iDisplayLength": 25,"bJQueryUI": false,"sDom" : '<"H"frilp><t>',  

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
		]
	} );
} );
			</script>