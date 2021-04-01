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
    <td colspan="3" bgcolor="#8A1602"><h3 class="style1 style1">b. Harvesting</h3></td>
  </tr>
  <tr>
	<td>
	<div id="grey-button"> <a class="grey-button pcb"   href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&amp;field=Wages for harvesters, FFB and loose fruit collecters&type=<?php echo $type; ?>','','')"><span>Wages for harvesters, FFB and loose fruit collecters</span></a> </div>
	<iframe src="linear_mature_graph.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Wages for harvesters, FFB and loose fruit collecters" width="320px" height="280px" style="border:none"></iframe></td>
	<td>
	<div id="grey-button"> <a class="grey-button pcb"   href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&amp;field=Machinery use and maintenance&type=<?php echo $type; ?>','','')"><span>Machinery use and maintenance</span></a> </div>
 <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Machinery use and maintenance" width="320px" height="280px" style="border:none"></iframe></td>
	  <td>
    <div id="grey-button"> <a class="grey-button pcb"   href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&amp;field=Purchases of harvesting tools&type=<?php echo $type; ?>','','')"><span>Purchases of harvesting tools</span></a> </div>
    <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Purchases of harvesting tools" width="320px" height="280px" style="border:none"></iframe></td>


  </tr>
  <tr>
	<td>
	<div id="grey-button"> <a class="grey-button pcb"   href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&amp;field=Wages for harvesting mandore&type=<?php echo $type; ?>','','')"><span>Wages for harvesting mandore</span></a> </div>
	<iframe src="linear_mature_graph.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Wages for harvesting mandore" width="320px" height="280px" style="border:none"></iframe></td>

<?php /*
		<td><div id="grey-button"> <a class="grey-button pcb"   href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&amp;field=Total Harvesting&type=<?php echo $type; ?>','','')"><span>Total Harvesting</span></a> </div>
   <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Total Harvesting" width="320px" height="280px" style="border:none"></iframe></td>
	 */?>
		<td></td>
  </tr>
</table>
