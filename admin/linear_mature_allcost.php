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
    <td colspan="3" bgcolor="#8A1602"><h3 class="style1">d. Total Cost of Matured Area</h3></td>
  </tr>
  <tr>
    <td>
     <div id="grey-button"><a class="grey-button pcb"  href="javascript:openScript('linear_mature_graph_view.php?table=alltable&tahun=<?php echo $tahun; ?>&amp;field=Total Cost of Matured Area&type=<?php echo $type; ?>','','')"><span>Total Cost</span></a> </div>



    <iframe  src="linear_mature_graph.php?table=alltable&tahun=<?php echo $tahun; ?>&type=<?php echo $type; ?>&field=Total Cost of Matured Area" width="320px" height="280px" style="border:none"></iframe></td>
    <td></td>
    <td></td>
  </tr>
</table>
