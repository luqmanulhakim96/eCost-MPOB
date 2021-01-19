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

<h2>Mill Processing Cost</h2>
<table width="100%">
  <tr>
    <td colspan="3" bgcolor="#8A1602"><h3 class="style1">Processing Cost</h3></td>
  </tr>
  
  <?php
  
  $con=connect();
    $qs="select * from q_mill where type='other_cost'";
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
  
    	<td><div id="grey-button"><a class="grey-button pcb" href="javascript:openScript('linear_mill_process_graph_view.php?table=analysis_mill_kos_lain&tahun=<?php echo $_COOKIE['tahun_report']; ?>&amp;field=<?php echo $rows['name'];?>&type=<?php echo $type; ?>','','')"><span><?php echo $rows['name'];?></span></a></div>
    	<iframe src="linear_mill_process_graph.php?table=analysis_mill_kos_lain&tahun=<?php echo $_COOKIE['tahun_report']; ?>&amp;field=<?php echo $rows['name'];?>&type=<?php echo $type; ?>" width="320px" height="280px" style="border:none"></iframe>      
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
  	
<?php
   }
?>
 

</table>


