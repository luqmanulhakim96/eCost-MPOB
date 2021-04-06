<style type="text/css">
<!--
.style1 {
	color: #FFFFFF
}
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

<h2>Immature Cost</h2>
<table width="100%">
  <?php if($tahun=='1'){?>
  <tr>
    <td colspan="3" bgcolor="#8A1602"><h3 class="style1">a. Non-Recurrent Expenditure</h3></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Felling and land clearing','','')" class="grey-button pcb"> <span>Felling and land clearing</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Felling and land clearing" width="320px" height="280px" style="border:none"></iframe>
      <br /></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Terracing and platform','','')" class="grey-button pcb"> <span>Terracing and platform</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Terracing and platform" width="320px" height="280px" style="border:none"></iframe></td>
			<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Lining, holing and planting','','')" class="grey-button pcb"> <span>Lining, holing and planting</span> </a> </div>
				<iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Lining, holing and planting" width="320px" height="280px" style="border:none"></iframe></td>

				</tr>
<?php /*
	  <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Road construction','','')" class="grey-button pcb"> <span>Road construction</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Road construction" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>

  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Drain construction','','')" class="grey-button pcb"> <span>Drain construction</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Drain construction" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Bund and watergate construction','','')" class="grey-button pcb"> <span>Bund and watergate construction</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Bund and watergate construction" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Lining','','')" class="grey-button pcb"> <span>Lining</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Lining" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Holing and planting','','')" class="grey-button pcb"> <span>Holing and planting</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Holing and planting" width="320px" height="280px" style="border:none"></iframe></td>
			*/?>
				<tr>
				<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Construction of road, drain, bund watergate and etc','','')" class="grey-button pcb"> <span>Construction of road, drain, bund watergate and etc</span> </a> </div>
					<iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Construction of road, drain, bund watergate and etc" width="320px" height="280px" style="border:none"></iframe></td>
					<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Basal fertiliser','','')" class="grey-button pcb"> <span>Basal fertiliser</span> </a> </div>
						<iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Basal fertiliser" width="320px" height="280px" style="border:none"></iframe></td>
		  <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Planting material','','')" class="grey-button pcb"> <span>Seedlings</span> </a> </div>
	      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Planting material" width="320px" height="280px" style="border:none"></iframe></td>

	  </tr>

			<tr>

			<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Cover crops','','')" class="grey-button pcb"> <span>Cover crops</span> </a> </div>
			 <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Cover crops" width="320px" height="280px" style="border:none"></iframe></td>
		 <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Other expenditures','','')" class="grey-button pcb"> <span>Other expenditures</span> </a> </div>
			 <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Other expenditures" width="320px" height="280px" style="border:none"></iframe></td>
		 <td></td>

		<td></td>
		</tr>
  <tr>
    <td colspan="3" bgcolor="#8A1602"><h3 class="style1">b. Upkeep</h3></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Weeding','','')" class="grey-button pcb"> <span>Weeding</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Weeding" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Purchase of weedicides','','')" class="grey-button pcb"> <span>i. Purchase of weedicide</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Purchase of weedicides" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Labour cost for weeding','','')" class="grey-button pcb"> <span>ii. Labour cost for weeding</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Labour cost for weeding" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Machinery use and maintenance','','')" class="grey-button pcb"> <span>iii. Machinery use and maintenance</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Machinery use and maintenance" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Lalang control','','')" class="grey-button pcb"> <span>Lalang control</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Lalang control" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Fertilizing','','')" class="grey-button pcb"> <span>Fertilizing</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Fertilizing" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Purchase of fertilizer','','')" class="grey-button pcb"> <span>i. Purchase of fertilizer</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Purchase of fertilizer" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Labour cost to apply fertilizers','','')" class="grey-button pcb"> <span>ii. Labour cost to apply fertilizers</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Labour cost to apply fertilizers" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Machinery use and maintenances','','')" class="grey-button pcb"> <span>iii. Machinery use and maintenance</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Machinery use and maintenances" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
  <?php /*  <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Soil and foliar analysis','','')" class="grey-button pcb"> <span>iv. Soil and foliar analysis</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Soil and foliar analysis" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Soil and water conservation','','')" class="grey-button pcb"> <span>Soil and water conservation</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Soil and water conservation" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Upkeep of roads, bridges, paths and etc','','')" class="grey-button pcb"> <span>Upkeep of roads, bridges, paths and etc.</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Upkeep of roads, bridges, paths and etc" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>

  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Upkeep of drain','','')" class="grey-button pcb"> <span>Upkeep of drain</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Upkeep of drain" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Upkeep of bunds and watergate','','')" class="grey-button pcb"> <span>Upkeep of bunds and watergate</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Upkeep of bunds and watergate" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Boundaries and survey','','')" class="grey-button pcb"> <span>Boundaries and survey</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Boundaries and survey" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
	*/?>
  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Cover crop','','')" class="grey-button pcb"> <span>Cover
		crop</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Cover crop" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Pest and diseases control','','')" class="grey-button pcb"> <span>Pest and diseases control</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Pest and diseases control" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Pruning and palm sanitation','','')" class="grey-button pcb"> <span>Pruning and palm sanitation</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Pruning and palm sanitation" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Census / supplies','','')" class="grey-button pcb"> <span>Census / supplies</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Census / supplies" width="320px" height="280px" style="border:none"></iframe></td>

  <?php /*  <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Castration','','')" class="grey-button pcb"> <span>Castration</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Castration" width="320px" height="280px" style="border:none"></iframe></td>
			*/?>
		<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Others Expenditure','','')" class="grey-button pcb"> <span>Other Expenditures</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Others Expenditure" width="320px" height="280px" style="border:none"></iframe></td>

			<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Maintenance of road, drain, bund watergate and etc','','')" class="grey-button pcb"> <span>Maintenance of road, drain, bund watergate and etc</span> </a> </div>
	      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Maintenance of road, drain, bund watergate and etc" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>

<tr>
				<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Soil and foliar analysis','','')" class="grey-button pcb"> <span>Soil and foliar analysis</span> </a> </div>
				<iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Soil and foliar analysis" width="320px" height="280px" style="border:none"></iframe></td>
		</tr>
  <?php

  }

  ?>
  <?php if($tahun!='1'){?>
  <tr>
    <td colspan="3" bgcolor="#8A1602"><h3 class="style1">b. Upkeep</h3></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Weeding','','')" class="grey-button pcb"> <span>Weeding</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Weeding" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Purchase of weedicides','','')" class="grey-button pcb"> <span>i. Purchase of weedicide</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Purchase of weedicides" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Labour cost for weeding','','')" class="grey-button pcb"> <span>ii. Labour cost for weeding</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Labour cost for weeding" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Machinery use and maintenance','','')" class="grey-button pcb"> <span>iii. Machinery use and maintenance</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Machinery use and maintenance" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Lalang control','','')" class="grey-button pcb"> <span>Lalang control</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Lalang control" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Fertilizing','','')" class="grey-button pcb"> <span>Fertilizing</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Fertilizing" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Purchase of fertilizer','','')" class="grey-button pcb"> <span>i. Purchase of fertilizer</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Purchase of fertilizer" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Labour cost to apply fertilizers','','')" class="grey-button pcb"> <span>ii. Labour cost to apply fertilizers</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Labour cost to apply fertilizers" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Machinery use and maintenance','','')" class="grey-button pcb"> <span>iii. Machinery use and maintenance</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Machinery use and maintenances" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>

  <tr>
     <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Soil and foliar analysis','','')" class="grey-button pcb"> <span>Soil and foliar analysis</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Soil and foliar analysis" width="320px" height="280px" style="border:none"></iframe></td>

	  <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Maintenance of road, drain, bund watergate and etc','','')" class="grey-button pcb"> <span>Maintenance of road, drain, bund watergate and etc</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Maintenance of road, drain, bund watergate and etc" width="320px" height="280px" style="border:none"></iframe></td>
<?php /*
		<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Upkeep of roads, bridges, paths and etc','','')" class="grey-button pcb"> <span>Upkeep of roads, bridges, paths and etc.</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Upkeep of roads, bridges, paths and etc" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>

  <tr>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Upkeep of drain','','')" class="grey-button pcb"> <span>Upkeep of drain</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Upkeep of drain" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Upkeep of bunds and watergate','','')" class="grey-button pcb"> <span>Upkeep of bunds and watergate</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Upkeep of bunds and watergate" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Boundaries and survey','','')" class="grey-button pcb"> <span>Boundaries and survey</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Boundaries and survey" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
	*/?>
	<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Cover crop','','')" class="grey-button pcb"> <span>Cover crop</span> </a> </div>
		<iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Cover crop" width="320px" height="280px" style="border:none"></iframe></td>
  <tr>

    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Pest and diseases control','','')" class="grey-button pcb"> <span>Pest and diseases control</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Pest and diseases control" width="320px" height="280px" style="border:none"></iframe></td>
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Pruning and palm sanitation','','')" class="grey-button pcb"> <span>Pruning and palm sanitation</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Pruning and palm sanitation" width="320px" height="280px" style="border:none"></iframe></td>
			<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Census / supplies','','')" class="grey-button pcb"> <span>Census / supplies</span> </a> </div>
				<iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Census / supplies" width="320px" height="280px" style="border:none"></iframe></td>
	</tr>
  <tr>

			<?php /*
    <td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Castration','','')" class="grey-button pcb"> <span>Castration</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Castration" width="320px" height="280px" style="border:none"></iframe></td>
			*/?>
		<td><div id="grey-button"> <a href="javascript:openScript('linear_immature_graph_view.php?tahun=<?php echo $tahun; ?>&amp;type=<?php echo $type;?>&amp;field=Others Expenditure','','')" class="grey-button pcb"> <span>Other Expenditures</span> </a> </div>
      <iframe src="linear_immature_graph.php?type=<?php echo $type; ?>&tahun=<?php echo $tahun; ?>&field=Others Expenditure" width="320px" height="280px" style="border:none"></iframe></td>
  </tr>
  <?php } ?>
</table>
