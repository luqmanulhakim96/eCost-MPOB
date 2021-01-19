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
      <h2>Distribution of Mills by CPO Output, <?php echo $_COOKIE['tahun_report'];?>
        <script type="text/javascript" src="../js/bar/swfobject.js"></script>
<strong></strong></h2>
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
</table>

<?php $_SESSION['session_tahun_report']= $_COOKIE['tahun_report'];?>

<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("../xml/amline.swf", "amline", "100%", "100%", "8", "#FFFFFF");
		so.addVariable("settings_file", encodeURIComponent("../xml/amline_settings.xml"));
		so.addVariable("data_file", encodeURIComponent("../xml/amline_cpo_output.php"));
		so.write("flashcontent");
		// ]]>
	</script><br><br />

<!-- end of amline script -->
