<?php
include('baju_merah.php');
?>
<style type="text/css">
<!--
.style2 {font-weight: bold}
-->
</style>
<br><table width="100%">
  <tr>
    <td><div align="center">
      <h2><b>&nbsp;&nbsp;Percentage of Oil Palm Estates According to Various Size Group</b>
        <!-- amline script-->
        <script type="text/javascript" src="../js/bar/swfobject.js"></script>
        </h2>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">
      <div id="flashcontent" style="width:100%; height:400px"> <strong>You need to upgrade your Flash Player</strong> </div>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">
      <h2><b>&nbsp;&nbsp;Table Percentage of Oil Palm Estates According to Various Size Group</b>
        <!-- amline script-->
        <script type="text/javascript" src="../js/bar/swfobject.js"></script>
        </h2>
    </div></td>
  </tr>
  <tr>
    <td>

    <?php

	$con =connect();
	$query = "SELECT count(Jumlah) as Jumlah FROM esub ";
		$res_jumlah = mysqli_query($con, $query);
		$row_jumlah = mysqli_fetch_array($res_jumlah);
		$jumlah = $row_jumlah['Jumlah'];

    function luas($nilai,$nilai2,$jumlah){
			$con=connect();
			$q ="SELECT count(Jumlah) as Jumlah FROM esub WHERE Jumlah between '$nilai' and '$nilai2'";
			$r = mysqli_query($con, $q);
			$row = mysqli_fetch_array($r);
			$total = mysqli_num_rows($r);
			$size[0] = $row['Jumlah'];

			$size[1] = round($size[0]/$jumlah*100,2);

			return $size;
			}
	?>

    <table width="60%" align="center" class="baju">
      <tr>
        <th>Size group</th>
        <th><div align="right">Number</div></th>
        <th><div align="right">%</div></th>
      </tr>
      <tr class="alt">
        <td>&lt;100</td>
        <td><div align="right">
          <?php $luas1 = luas(0,99,$jumlah); echo number_format($luas1[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas1[1],2);?>&nbsp;</div></td>
      </tr>
      <tr>
        <td>100-499</td>
        <td><div align="right">
          <?php $luas2 = luas(100,499,$jumlah); echo number_format($luas2[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas2[1],2);?>&nbsp;</div></td>
      </tr>
      <tr class="alt">
        <td>500-999</td>
        <td><div align="right">
          <?php $luas3 = luas(500,999,$jumlah); echo number_format($luas3[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas3[1],2);?>&nbsp;</div></td>
      </tr>
      <tr>
        <td>1000-1499</td>
        <td><div align="right">
          <?php $luas4 = luas(1000,1499,$jumlah); echo number_format($luas4[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas4[1],2);?>&nbsp;</div></td>
      </tr>
      <tr class="alt">
        <td>1500-1999</td>
        <td><div align="right">
          <?php $luas5 = luas(1500,1999,$jumlah); echo number_format($luas5[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas5[1],2);?>&nbsp;</div></td>
      </tr>
      <tr class="alt">
        <td>2000&gt;</td>
        <td><div align="right">
          <?php $luas6 = luas(2000,99999999,$jumlah); echo number_format($luas6[0]); ?>
          &nbsp;</div></td>
        <td><div align="right"><?php echo number_format($luas6[1],2);?>&nbsp;</div></td>
      </tr>
      <tr>
        <td><strong>Total</strong></td>
        <td><div align="right"><strong>
          <?php  $jumlah = $luas1[0]+$luas2[0]+$luas3[0]+$luas4[0]+$luas5[0]+$luas6[0]; echo number_format($jumlah,2);?>
        &nbsp;</strong></div></td>
        <td><div align="right"> <span class="style2">
          <?php  $jumlah_percent = $luas1[1]+$luas2[1]+$luas3[1]+$luas4[1]+$luas5[1]+$luas6[1]; echo number_format($jumlah_percent,2);?>
        </span>&nbsp;</div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<script type="text/javascript">
		// <![CDATA[
		var so = new SWFObject("../xml/amline.swf", "amline", "100%", "100%", "8", "#FFFFFF");
		so.addVariable("settings_file", encodeURIComponent("../xml/amline_settings.xml"));
		so.addVariable("data_file", encodeURIComponent("../xml/amline_data.php"));
		so.write("flashcontent");
		// ]]>
	</script><br><br />

<!-- end of amline script -->
