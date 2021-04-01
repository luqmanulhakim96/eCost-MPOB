<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<link rel="stylesheet" href="../css/buttons/css/buttons.css" type="text/css" media="screen" />

<script type="text/javascript">

function openScript(url, width, height) {
	width = 800;
	height = 600;
        var Win = window.open(url,"openScript",'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}

</script>

<h2>Mature Cost</h2>
<table width="100%">
  <tr>
    <td colspan="3" bgcolor="#8A1602"><h3 class="style1">b. Transportation</h3></td>
  </tr>
  <tr>
	<?php /*
    <td>
     <div id="grey-button"><a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&amp;field=Internal&type=<?php echo $type; ?>','','')"><span>Internal</span></a> </div>
    <iframe  src="linear_mature_graph.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Internal" width="320px" height="280px" style="border:none"></iframe></td>

		<td>
     <div id="grey-button"><a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&amp;field=a) Platform&type=<?php echo $type; ?>','','')"><span>i. Loading of FFB (Platform)</span></a> </div>
    <iframe  src="linear_mature_graph.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=a) Platform" width="320px" height="280px" style="border:none"></iframe></td>
    <td>


      <div id="grey-button"><a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&amp;field=b) Ramp&type=<?php echo $type; ?>','','')"><span>i. Loading of FFB (Ramp)</span></a> </div>

    <iframe  src="linear_mature_graph.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=b) Ramp" width="320px" height="280px" style="border:none"></iframe></td>
*/?>
  </tr>
<tr>
<?php /*
    <td>
     <div id="grey-button"> <a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&amp;field=ii. Ramp upkeep&type=<?php echo $type; ?>','','')"><span>ii. Ramp upkeep</span></a> </div>
    <iframe  src="linear_mature_graph.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=ii. Ramp upkeep" width="320px" height="280px" style="border:none"></iframe></td>
		*/?>

		<td>
			<div id="grey-button"><a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&amp;field=Mainline transportation cost from platform/FFB collection centre/ramp to mill&type=<?php echo $type; ?>','','')"><span>Mainline transportation cost from platform</span></a></div>
			<iframe  src="linear_mature_graph.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Mainline transportation cost from platform/FFB collection centre/ramp to mill" width="320px" height="280px" style="border:none"></iframe></td>
			<td>
			 <div id="grey-button"><a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&amp;field=Machinery use and maintenance&type=<?php echo $type; ?>','','')"><span>Machinery use and maintenance</span></a> </div>
			<iframe  src="linear_mature_graph.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Machinery use and maintenance" width="320px" height="280px" style="border:none"></iframe></td>

			<td>
			 <div id="grey-button"><a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&amp;field=Total Transportation&type=<?php echo $type; ?>','','')"><span>Total Transportation</span></a> </div>
			<iframe  src="linear_mature_graph.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Total Transportation" width="320px" height="280px" style="border:none"></iframe></td>
<?php /*
		<td>
     <div id="grey-button"><a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&amp;field=External&type=<?php echo $type; ?>','','')"><span>External</span></a> </div>
    <iframe  src="linear_mature_graph.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=External" width="320px" height="280px" style="border:none"></iframe></td>
*/?>
  </tr>
  <tr>

<?php /*
		<td>
     <div id="grey-button"> <a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&amp;field=iii. River transport&type=<?php echo $type; ?>','','')"><span>iii. River transport</span></a></div>


    <iframe  src="linear_mature_graph.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=iii. River transport" width="320px" height="280px" style="border:none"></iframe></td>
    <td>


     <div id="grey-button"> <a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&amp;field=Other Expenditures&type=<?php echo $type; ?>','','')"><span>Other Expenditure</span></a></div>
  <iframe  src="linear_mature_graph.php?table=analysis_kos_matang_pengangkutan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Other Expenditures" width="320px" height="280px" style="border:none"></iframe></td>
*/?>
  </tr>

</table>
