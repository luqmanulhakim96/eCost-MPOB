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
    <div id="grey-button"> <a class="grey-button pcb"   href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&amp;field=Harvesting tools&type=<?php echo $type; ?>','','')"><span>Harvesting tools</span></a> </div>



    <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Harvesting tools" width="320px" height="280px" style="border:none"></iframe></td>
    <td>
    <div id="grey-button"> <a class="grey-button pcb"   href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&amp;field=Harvesting and collection of FFB and loose fruit&type=<?php echo $type; ?>','','')"><span>Harvesting and collection of FFB and loose fruit</span></a> </div>


    <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Harvesting and collection of FFB and loose fruit" width="320px" height="280px" style="border:none"></iframe></td>
    <td>

    <div id="grey-button"> <a class="grey-button pcb"   href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&amp;field=Mandore wages/ direct field supervision costs&type=<?php echo $type; ?>','','')"><span>Mandore wages/ direct field supervision costs</span></a> </div>



    <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Mandore wages/ direct field supervision costs" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
    <td>

    <div id="grey-button"> <a class="grey-button pcb"   href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&amp;field=Machinery use and maintenance&type=<?php echo $type; ?>','','')"><span>Machinery use and maintenance</span></a> </div>

   <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Machinery use and maintenance" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a class="grey-button pcb"   href="javascript:openScript('linear_mature_graph_view.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&amp;field=Total Harvesting&type=<?php echo $type; ?>','','')"><span>Total Harvesting</span></a> </div>

   <iframe src="linear_mature_graph.php?table=analysis_kos_matang_penuaian&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Total Harvesting" width="320px" height="280px" style="border:none"></iframe></td>
    <td></td>
  </tr>
</table>


