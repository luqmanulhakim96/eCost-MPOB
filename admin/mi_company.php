<?php
	extract($_GET);
	if(!isset($title))
		$title = "New Planting";
?>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<style type="text/css">
<!--
.style4 { font-weight: bold; color: #FFFFFF; }
.style5 {	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>

<form id="form1" name="form1" method="post" action="">
  <table width="100%">
    <tr>
      <td><div align="center"><u><strong>List Of Outliers Company </strong></u></div></td>
    </tr>
    <tr>
      <td><div align="center">
        <select name="menu1" onchange="MM_jumpMenu('parent',this,0)">
          <option value="#">-</option>
          <option value="home.php?id=new_planting_company&amp;comp=A" <?php if ($comp=='A'){?> selected="selected" <?php } ?>>Company A</option>
          <option value="home.php?id=new_planting_company&amp;comp=B" <?php if ($comp=='B'){?> <?php } ?>>Company B</option>
          <option value="home.php?id=new_planting_company&amp;comp=C" <?php if ($comp=='C'){?> <?php } ?>>Company C</option>

        </select>
      </div></td>
    </tr>
	
  </table>
  <?php if ($comp!=NULL){
  ?>
  <table width="100%" cellpadding="4" cellspacing="0" style="border-collapse:collapse">
 
    <tr >
      <td  colspan="5">&nbsp;</td>
    </tr>
    <tr >
      <td  colspan="5"><div align="center"><strong>Cost of Oil Plant <?= $title ?> for Company <?php echo $comp;?> (RM Per Hectare) </strong> <a href="home.php?id=company_profile">Company Profile</a></div></td>
    </tr>
    <tr >
      <td  colspan="5">
	  <script type="text/javascript" src="ampie/swfobject.js"></script>
	<div id="flashcontent" align="center">	</div>
<br />

	<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("ampie/ampie.swf", "ampie", "520", "340", "8", "#000000");
		so.addVariable("path", "ampie/");
		so.addVariable("settings_file", encodeURIComponent("mi_company_settings.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_company.xml"));
		so.write("flashcontent");
		// ]]>
	</script>	  </td>
    </tr>
    <tr >
      <td   bgcolor="#8A1602">&nbsp;</td>
      <td bgcolor="#8A1602"><div align="center" class="style4">2008</div></td>
      <td colspan="2" bgcolor="#8A1602"><div align="center" class="style4">2009</div></td>
      <td  rowspan="2" bgcolor="#8A1602"><div align="center" class="style4">% Cost Increase 
      </div>
      <div align="center" class="style4"></div></td>
    </tr>
    <tr >
      <td   bgcolor="#8A1602">&nbsp;</td>
      <td  bgcolor="#8A1602" class="style4"><div align="center">Mean</div></td>
      <td  bgcolor="#8A1602" class="style4"><div align="center"><span class="style5">Mean</span></div></td>
      <td  bgcolor="#8A1602" class="style4"><div align="center">Median</div></td>
    </tr>
    <tr >
      <td  ><u><em><strong>Upkeep and Cultivation </strong></em></u></td>
      <td><div align="center"><strong>963.77</strong></div></td>
      <td  ><div align="center"><strong>1120.66</strong></div></td>
      <td  ><div align="center"><strong>608.91</strong></div></td>
      <td  align="right"><div align="center"><strong>140</strong></div></td>
    </tr>
    <tr >
      <td  >Weeding</td>
      <td><div align="center">134.48</div></td>
      <td  ><div align="center">113.00</div></td>
      <td  ><div align="center">135.00</div></td>
      <td  align="right"><div align="center">0.39</div></td>
    </tr>
    <tr >
      <td  >Lalang    control</td>
      <td ><div align="center">10.78</div></td>
      <td ><div align="center">11.00</div></td>
      <td ><div align="center">11.00</div></td>
      <td align="right"><div align="center">2.04</div></td>
    </tr>
    <tr >
      <td  >Drains</td>
      <td ><div align="center">9.01</div></td>
      <td ><div align="center">9.00</div></td>
      <td ><div align="center">9.50</div></td>
      <td align="right"><div align="center">5.44</div></td>
    </tr>
    <tr >
      <td  >Roads, bridges, paths etc</td>
      <td ><div align="center">103.21</div></td>
      <td ><div align="center">72.00</div></td>
      <td ><div align="center">103.50</div></td>
      <td align="right"><div align="center">0.28</div></td>
    </tr>
    <tr >
      <td  >Soil and water conservation </td>
      <td ><div align="center">15.05</div></td>
      <td ><div align="center">13.00</div></td>
      <td ><div align="center">15.50</div></td>
      <td align="right"><div align="center">2.99</div></td>
    </tr>
    <tr >
      <td  >Boundary and survey </td>
      <td ><div align="center">12.91</div></td>
      <td ><div align="center">14.50</div></td>
      <td ><div align="center">13.00</div></td>
      <td align="right"><div align="center">0.70</div></td>
    </tr>
    <tr >
      <td  >Cover crop </td>
      <td ><div align="center">35.56</div></td>
      <td ><div align="center">31.00</div></td>
      <td ><div align="center">36.00</div></td>
      <td align="right"><div align="center">1.24</div></td>
    </tr>
    <tr >
      <td  >Survey and Supply </td>
      <td ><div align="center">6.93</div></td>
      <td ><div align="center">5.50</div></td>
      <td ><div align="center">7.00</div></td>
      <td align="right"><div align="center">1.01</div></td>
    </tr>
    <tr >
      <td  >Pruning</td>
      <td ><div align="center">28.99</div></td>
      <td ><div align="center">31.00</div></td>
      <td ><div align="center">29.00</div></td>
      <td align="right"><div align="center">0.03</div></td>
    </tr>
    <tr >
      <td  >Pests and diseases </td>
      <td ><div align="center">5.89</div></td>
      <td ><div align="center">5.00</div></td>
      <td ><div align="center">6.00</div></td>
      <td align="right"><div align="center">1.87</div></td>
    </tr>
    <tr >
      <td  >Castration</td>
      <td ><div align="center">14.47</div></td>
      <td ><div align="center">14.50</div></td>
      <td ><div align="center">15.00</div></td>
      <td align="right"><div align="center">122.7</div></td>
    </tr>
    <tr >
      <td  >Other upkeep costs </td>
      <td ><div align="center">377.28</div></td>
      <td ><div align="center">319.50</div></td>
      <td ><div align="center">380.50</div></td>
      <td align="right"><div align="center">0.85</div></td>
    </tr>
    
    <tr >
      <td colspan="5"  ><hr /></td>
    </tr>
    <tr >
      <td  ><u><strong><em>Fertilisation</em></strong></u></td>
      <td ><div align="center"><strong>948.74</strong></div></td>
      <td ><div align="center"><strong>5,931.84 </strong></div></td>
      <td ><div align="center"><strong>6,412.80 </strong></div></td>
      <td align="right"><div align="center"><strong>575.93</strong></div></td>
    </tr>
    <tr >
      <td  >Fertilisers</td>
      <td ><div align="center">442.43</div></td>
      <td ><div align="center">525.94</div></td>
      <td ><div align="center">455.70</div></td>
      <td align="right"><div align="center">3.00</div></td>
    </tr>
    <tr >
      <td  >Fertiliser application </td>
      <td ><div align="center">482.25</div></td>
      <td ><div align="center">581.00</div></td>
      <td ><div align="center">496.72</div></td>
      <td align="right"><div align="center">3.00</div></td>
    </tr>
    <tr >
      <td  >Soil and foliar analysis </td>
      <td ><div align="center">490.74</div></td>
      <td ><div align="center">720.00</div></td>
      <td ><div align="center">500.00</div></td>
      <td align="right"><div align="center">1.89</div></td>
    </tr>
    
    <tr >
      <td   bgcolor="#FF9966"><strong>Total    </strong></td>
      <td align="right" bgcolor="#FF9966"><div align="center"><strong>2,741.44</strong></div></td>
      <td align="right" bgcolor="#FF9966"><div align="center"><strong>8,078.28</strong></div></td>
      <td align="right" bgcolor="#FF9966"><div align="center"><strong>8,245.72</strong></div></td>
      <td align="right" bgcolor="#FF9966"><div align="center"><strong>200.78</strong></div></td>
    </tr>
    <tr bgcolor="#F12703" >
      <td><div align="left"><strong>Total Immature Cost </strong></div></td>
      <td align="right"><div align="center"><strong>RM 2,741.44</strong></div></td>
      <td colspan="2" align="right"><div align="center"><strong>RM 16,324.00 </strong></div></td>
      <td align="right"><div align="center"><strong>350.78 </strong>%</div>
          <div align="center"></div>
        <div align="center"></div></td>
    </tr>
    <tr >
      <td>&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td colspan="2" align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
    </tr>
    <tr >
      <td>&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td colspan="2" align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
    </tr>
  </table>
  <?php } ?>
</form>
