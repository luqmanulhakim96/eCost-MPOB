<?php
$tahun = $_COOKIE['tahun_report'];
?>
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

<h2>General Chargers</h2>
<table width="100%">
  <tr>
    <td colspan="3" bgcolor="#8A1602"><h3 class="style1">General Chargers</h3></td>
  </tr>

  <?php

  $con=connect();
    $qs="select * from q_km where type='gc'";
  $rs = mysql_query($qs,$con);

  $jl=0;
  $js=0;
  $ml=0;
  $ms=0;

  $perubahan =0;
  $perubahan_baru=0;
  $countColumn = 0;
   while($rows=mysql_fetch_array($rs)){
	   if($countColumn == 0){
?>
	<tr>
<?php
	   }
?>
    <td>
    <div id="grey-button">
    <a class="grey-button pcb" href="javascript:openScript('linear_gc_graph_view.php?table=analysis_belanja_am_kos&tahun=<?php echo $tahun; ?>&amp;field=<?php echo $rows['name'];?>&type=<?php echo $type; ?>','','')"><span><?php echo $rows['name'];?></span></a>
    </div>



      <iframe src="linear_gc_graph.php?table=analysis_belanja_am_kos&tahun=<?php echo $tahun; ?>&amp;field=<?php echo $rows['name'];?>&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe>

<!--      <img src="linear_gc_graph.php?table=analysis_belanja_am_kos&tahun=<?php echo $tahun; ?>&amp;field=<?php echo $rows['name'];?>&type=<?php echo $type; ?>" />-->
      </td>
<?php
	if($countColumn == 2){
?>
	</tr>
<?php
	}
	$countColumn++;

	if($countColumn > 2){
		$countColumn = 0;
	}
?>
  <?php } ?>
  <tr>
    <td>
    <div id="grey-button">
    <a class="grey-button pcb" href="javascript:openScript('linear_gc_graph_view.php?table=analysis_belanja_am_kos&tahun=<?php echo $tahun; ?>&amp;field=Cost Per Hectare&type=<?php echo $type; ?>','','')"><span>Total General Charges</span></a>
    </div>



      <iframe src="linear_gc_graph.php?table=analysis_belanja_am_kos&tahun=<?php echo $tahun; ?>&amp;field=Cost Per Hectare&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe>

      </td>
	<td></td>
	<td></td>
  </tr>

</table>


