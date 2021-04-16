<?php
$tahun = $_COOKIE['tahun_report'];
?>
<link rel="stylesheet" href="../css/buttons/css/buttons.css" type="text/css" media="screen" />
<script type="text/javascript">

function openScript(url, width, height) {
	width = 800;
	height = 600;
        var Win = window.open(url,"openScript",'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no' );
}

</script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<h2>Mature Cost</h2>

<table width="100%">
  <tr>
    <td colspan="3" bgcolor="#8A1602"><h3 class="style1 style1">a. Upkeep</h3></td>
  </tr>
  <tr>
    <td>

    <div id="grey-button">
    <a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Weeding&type=<?php echo $type; ?>','','')"><span>Weeding</span></a>
    </div>


      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Weeding&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"><a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=i. Purchase of weedicide&type=<?php echo $type; ?>','','')"><span>i. Purchase of weedicide</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=i. Purchase of weedicide&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"><a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=ii. Labour cost for weeding&type=<?php echo $type; ?>','','')"><span>ii. Labour cost for weeding</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=ii. Labour cost for weeding&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=iii. Machinery use and maintenances&type=<?php echo $type; ?>','','')"><span>iii. Machinery use and maintenance</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=iii. Machinery use and maintenances&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"><a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Lalang Control&type=<?php echo $type; ?>','','')"><span>Lalang Control</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Lalang Control&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Fertilizing&type=<?php echo $type; ?>','','')"><span>Fertilizing</span></a> </div>


      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Fertilizing&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=i. Purchase of fertilizer&type=<?php echo $type; ?>','','')"><span>i. Purchase of fertilizer</span></a> </div>


      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&amp;field=i. Purchase of fertilizer" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=ii.Labour cost to apply fertilizers&type=<?php echo $type; ?>','','')"><span>ii.Labour cost to apply fertilizers</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=ii.Labour cost to apply fertilizers&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"><a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=iii. Machinery use and maintenance&type=<?php echo $type; ?>','','')"><span>iii. Machinery use and maintenance</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=iii. Machinery use and maintenance&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
	<?php /*
    <td><div id="grey-button"><a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=iv. Soil and foliar analysis&type=<?php echo $type; ?>','','')"><span>iv. Soil and foliar analysis</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=iv. Soil and foliar analysis&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
			*/?>
	  <td><div id="grey-button"> <a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Soil and foliar analysis &type=<?php echo $type; ?>','','')"><span>Soil and foliar analysis  </span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Soil and foliar analysis  &type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>

    <td><div id="grey-button"> <a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Maintenance of road, drain, bund watergate and etc&type=<?php echo $type; ?>','','')"><span>Maintenance of road, drain, bund watergate and etc</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Maintenance of road, drain, bund watergate and etc &type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>

			<td><div id="grey-button"><a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Pests and diseases control&type=<?php echo $type; ?>','','')"><span>Pests and diseases control</span></a> </div>
				<iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Pests and diseases control&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
	</tr>
  <tr>
	<td><div id="grey-button"><a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Pruning and palm sanitation&type=<?php echo $type; ?>','','')"><span>Pruning and palm sanitation</span></a> </div>
		<iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Pruning and palm sanitation&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
		<td><div id="grey-button"> <a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Census / supplies&type=<?php echo $type; ?>','','')"><span>Census / supplies</span></a> </div>
			<iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Census / supplies&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
			<td><div id="grey-button"><a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Mandore wages/ direct field supervision costs&type=<?php echo $type; ?>','','')"><span>Mandore wages/ direct field supervision costs</span></a> </div>
	      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Mandore wages/ direct field supervision costs&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
		<?php /*
    <td><div id="grey-button"><a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Upkeep drains&amp;type=<?php echo $type; ?>','','')"><span>Upkeep drains</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Upkeep drains&amp;type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"><a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Upkeeps of bunds, boundaries and Watergates&type=<?php echo $type; ?>','','')"><span>Upkeeps of bunds boundaries and Watergates</span></a> </div>

      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Upkeeps of bunds, boundaries and Watergates&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>
			*/?>
  </tr>
  <tr>



  </tr>
  <tr>
    <td><div id="grey-button"> <a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Other expenditure&type=<?php echo $type; ?>','','')"><span>Other expenditure</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Other expenditure&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>

	<td><div id="grey-button"> <a  class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Total Upkeep&type=<?php echo $type; ?>','','')"><span>Total Upkeep</span></a> </div>
      <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penjagaan&tahun=<?php echo $tahun; ?>&amp;field=Total Upkeep&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe></td>

	<td></td>
  </tr>
</table>
