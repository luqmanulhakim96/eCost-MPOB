<?
session_start();
?>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<style type="text/css">
<!--
.style2 {	color: #FFFFFF;
	font-weight: bold;
}
.style3 {color: #FFFFFF}
-->
</style>

<table width="100%" border="0">
  <tr>
    <td><div align="center"><u><strong>List Of Outliers Company </strong></u></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <form name="form" id="form">
        <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
          <option value="home.php?id=mc_company&company=A">Company A</option>
          <option value="home.php?id=mc_company&amp;company=B">Company B</option>
          <option value="home.php?id=mc_company&amp;company=C">Company C</option>
                </select>
      </form>
      </div></td>
  </tr>
</table>
<br/ >
<br />
<table width="100%" cellpadding="4" cellspacing="0" style="border-collapse:collapse">
  <tr >
    <td>&nbsp;</td>
  </tr>
  <tr >
    <td><div align="center"><strong>Cost of Oil Plant for Company  (RM Per Hectare) </strong> <a href="home.php?id=company_profile">Company Profile</a></div></td>
  </tr>
  <tr >
    <td><script type="text/javascript" src="ampie/swfobject.js"></script>
        <div id="flashcontent" align="center"> </div>
        <br />
        <br />
        <table width="100%" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #000000;">
          <col width="204">
          <col width="108">
          <col width="103">
          <col width="86">
          <tr height="17">
            <td width="204" height="35" bgcolor="#8A1602"><span class="style2"><?=$_SESSION['title']?></span></td>
            <td width="108" bgcolor="#8A1602"><span class="style3">          1,125.50 </span></td>
            <td width="103" bgcolor="#8A1602"><span class="style3">         1,359.00 </span></td>
            <td width="86" bgcolor="#8A1602"><span class="style3">       985.00 </span></td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Weeding</td>
            <td width="108">               250.00 </td>
            <td>             405.00 </td>
            <td width="86">         330.00 </td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Lalang control</td>
            <td width="108">               139.00 </td>
            <td>             110.00 </td>
            <td width="86">           79.00 </td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Drains</td>
            <td width="108">               125.00 </td>
            <td>               85.00 </td>
            <td width="86">           56.00 </td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Roads, bridges, paths, etc</td>
            <td width="108">               155.00 </td>
            <td>             160.00 </td>
            <td width="86">         122.00 </td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Soil/water conservation</td>
            <td width="108">                60.00 </td>
            <td>               92.00 </td>
            <td width="86">           31.00 </td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Boundaries and survey</td>
            <td width="108">                38.00 </td>
            <td>               22.00 </td>
            <td width="86">           16.00 </td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Cover crops</td>
            <td width="108">               160.00 </td>
            <td>             135.00 </td>
            <td width="86">           55.00 </td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Survey and supply</td>
            <td width="108">                28.00 </td>
            <td>               65.00 </td>
            <td width="86">           32.00 </td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Pruning</td>
            <td width="108">                22.00 </td>
            <td>               40.00 </td>
            <td width="86">           48.00 </td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Pests and diseases</td>
            <td width="108">               135.00 </td>
            <td>             190.00 </td>
            <td width="86">         150.00 </td>
          </tr>
          <tr height="17">
            <td height="17" width="204"> Castration</td>
            <td width="108">                13.50 </td>
            <td>               55.00 </td>
            <td width="86">           66.00 </td>
          </tr>
        </table>
        <script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("ampie/ampie.swf", "ampie", "520", "340", "8", "#000000");
		so.addVariable("path", "ampie/");
		so.addVariable("settings_file", encodeURIComponent("mi_company_settings.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_company.xml"));
		so.write("flashcontent");
		// ]]>
	</script>    </td>
  </tr>
</table>
