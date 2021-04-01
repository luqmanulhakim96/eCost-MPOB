<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-weight: bold; }
-->
</style>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<table width="85%" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right"><a href="#"><img src="../images/Print.png" width="24" height="24" border="0" title="Print this page" /></a></div></td>
  </tr>
  <tr valign="top">
    <td width="10%">Select Year :</td>
    <td width="45%"><form name="form" id="form">
      <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
        <option value="home.php?id=estate&sub=new_planting_state&year=1&state=<?= $state; ?>" <?php if($year=='1'){?>selected="selected" <?php } ?>>Year 1</option>
        <option value="home.php?id=estate&amp;sub=new_planting_state&amp;year=2&state=<?= $state; ?>" <?php if($year=='2'){?>selected="selected" <?php } ?>>Year 2</option>
        <option value="home.php?id=estate&amp;sub=new_planting_state&amp;year=3&state=<?= $state; ?>" <?php if($year=='3'){?>selected="selected" <?php } ?>>Year 3</option>
        </select>
    </form>    </td>
    <td width="45%">
	<?php $con = connect();
	$qstate ="select * from negeri where id like '$state'";
	$rstate = mysqli_query($con, $qstate);
	$rowstate = mysqli_fetch_array($rstate);
	?>

	<img src="../images/<?= $rowstate['negeri_path']; ?>" alt="" name="state" width="91" height="45" class="thinborderfloat" id="state" title="<?= $rowstate['nama'];?>" />
	<?php mysqli_close($con);?>	</td>
  </tr>

</table>
<?php
	if($_GET['year'] == "1" or !isset($_GET['year'])) {
?>
<table width="85%" align="center" cellpadding="4" cellspacing="0" style="border-collapse:collapse">
<tr>
<td colspan="5"><strong>Cost in the First Year of Oil Palm New Planting (RM per hectare) </strong></td>
</tr>
  <tr bgcolor="#8A1602">
    <td width="34%" rowspan="2"><span class="style5">Cost Items </span></td>
    <td bgcolor="#8A1602"><div align="center" class="style5">
      <div align="right">2008</div>
    </div></td>
    <td colspan="2" bgcolor="#8A1602"><div align="center" class="style5">
      <div align="right">2009</div>
    </div></td>
    <td rowspan="2" bgcolor="#8A1602"><div align="right"><span class="style5">% Change </span></div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Median</span></div></td>
  </tr>
  <tr>
    <td><u><strong><em>Non-Recurrent Costs </em></strong></u></td>
    <td><div align="right"><strong>2818.20</strong></div></td>
    <td><div align="right"><strong>3339.03</strong></div></td>
    <td><div align="right"><strong>2587.07</strong></div></td>
    <td><div align="right"><strong>18.48</strong></div></td>
  </tr>
  <tr>
    <td>Felling and Clearing</td>
    <td><div align="right">620.52</div></td>
    <td><div align="right">728.19</div></td>
    <td><div align="right">585.81</div></td>
    <td><div align="right">17.35</div></td>
  </tr>
  <tr>
    <td>Terracing and Platform </td>
    <td><div align="right">502.87</div></td>
    <td><div align="right">551.89</div></td>
    <td><div align="right">383.85</div></td>
    <td><div align="right">9.75</div></td>
  </tr>
  <tr>
    <td>Road Construction </td>
    <td><div align="right">407.74</div></td>
    <td><div align="right">481.70</div></td>
    <td><div align="right">386.57</div></td>
    <td><div align="right">18.14</div></td>
  </tr>
  <tr>
    <td>Drain Construction </td>
    <td><div align="right">262.65</div></td>
    <td><div align="right">296.15</div></td>
    <td><div align="right">193.22</div></td>
    <td><div align="right">12.76</div></td>
  </tr>
  <tr>
    <td>Lining</td>
    <td><div align="right">156.90</div></td>
    <td><div align="right">76.71</div></td>
    <td><div align="right">46.15</div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td>Holing and planting </td>
    <td><div align="right"></div></td>
    <td><div align="right">247.98</div></td>
    <td><div align="right">199.56</div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td>Basal Fertilizer </td>
    <td><div align="right"></div></td>
    <td><div align="right">229.42</div></td>
    <td><div align="right">115.84</div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td>Planting Material </td>
    <td><div align="right">652.85</div></td>
    <td><div align="right">535.69</div></td>
    <td><div align="right">541.54</div></td>
    <td><div align="right">-17.95</div></td>
  </tr>
  <tr>
    <td>Cover Cops </td>
    <td><div align="right"></div></td>
    <td><div align="right">122.77</div></td>
    <td><div align="right">95.89</div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td>Other non-recurrent costs </td>
    <td><div align="right">214.67</div></td>
    <td><div align="right">68.52</div></td>
    <td><div align="right">38.65</div></td>
    <td><div align="right">-68.08</div></td>
  </tr>
  <tr>
    <td colspan="5"><hr /></td>
  </tr>
  <tr>
    <td><u><strong><em>Upkeep and Cultivation </em></strong></u></td>
    <td><div align="right"><strong>1021.02</strong></div></td>
    <td><div align="right"><strong>1087.92</strong></div></td>
    <td><div align="right"><strong>593.61</strong></div></td>
    <td><div align="right"><strong>6.55</strong></div></td>
  </tr>
  <tr>
    <td>Weeding</td>
    <td><div align="right">195.61</div></td>
    <td><div align="right">241.24</div></td>
    <td><div align="right">181.20</div></td>
    <td><div align="right">23.33</div></td>
  </tr>
  <tr>
    <td>Lalang control </td>
    <td><div align="right">78.77</div></td>
    <td><div align="right">83.47</div></td>
    <td><div align="right">23.41</div></td>
    <td><div align="right">5.97</div></td>
  </tr>
  <tr>
    <td>Drains</td>
    <td><div align="right">77.70</div></td>
    <td><div align="right">84.20</div></td>
    <td><div align="right">31.21</div></td>
    <td><div align="right">8.37</div></td>
  </tr>
  <tr>
    <td>Roads, bridges, paths, etc </td>
    <td><div align="right">244.41</div></td>
    <td><div align="right">248.47</div></td>
    <td><div align="right">118.75</div></td>
    <td><div align="right">1.66</div></td>
  </tr>
  <tr>
    <td>Soil/Water Conservation </td>
    <td><div align="right">56.88</div></td>
    <td><div align="right">79.45</div></td>
    <td><div align="right">39.60</div></td>
    <td><div align="right">39.68</div></td>
  </tr>
  <tr>
    <td>Boundaries and survey </td>
    <td><div align="right">48.07</div></td>
    <td><div align="right">34.33</div></td>
    <td><div align="right">9.66</div></td>
    <td><div align="right">-28.59</div></td>
  </tr>
  <tr>
    <td>Cover Cops </td>
    <td><div align="right">94.54</div></td>
    <td><div align="right">80.09</div></td>
    <td><div align="right">58.36</div></td>
    <td><div align="right">-15.29</div></td>
  </tr>
  <tr>
    <td>Survey and supply </td>
    <td><div align="right">52.87</div></td>
    <td><div align="right">22.64</div></td>
    <td><div align="right">6.15</div></td>
    <td><div align="right">-57.19</div></td>
  </tr>
  <tr>
    <td>Pruning</td>
    <td><div align="right">37.30</div></td>
    <td><div align="right">25.77</div></td>
    <td><div align="right">8.26</div></td>
    <td><div align="right">-30.92</div></td>
  </tr>
  <tr>
    <td>Pests and diseases </td>
    <td><div align="right">43.53</div></td>
    <td><div align="right">59.52</div></td>
    <td><div align="right">31.67</div></td>
    <td><div align="right">-39.96</div></td>
  </tr>
  <tr>
    <td>Castration</td>
    <td><div align="right">48.97</div></td>
    <td><div align="right">19.89</div></td>
    <td><div align="right">13.00</div></td>
    <td><div align="right">-59.38</div></td>
  </tr>
  <tr>
    <td>Other costs of upkeep </td>
    <td><div align="right">43.37</div></td>
    <td><div align="right">108.84</div></td>
    <td><div align="right">72.33</div></td>
    <td><div align="right">150.96</div></td>
  </tr>
  <tr>
    <td colspan="5"><hr /></td>
  </tr>
  <tr>
    <td><u><em><strong>Fertilisation</strong></em></u></td>
    <td><div align="right"><strong>333.46</strong></div></td>
    <td><div align="right"><strong>721.62</strong></div></td>
    <td><div align="right"><strong>289.69</strong></div></td>
    <td><div align="right"><strong>116.40</strong></div></td>
  </tr>
  <tr>
    <td>Fertilisers</td>
    <td><div align="right">265.09</div></td>
    <td><div align="right">626.90</div></td>
    <td><div align="right">256.76</div></td>
    <td><div align="right">136.49</div></td>
  </tr>
  <tr>
    <td>Fertilisers application </td>
    <td><div align="right">57.94</div></td>
    <td><div align="right">87.78</div></td>
    <td><div align="right">35.00</div></td>
    <td><div align="right">51.50</div></td>
  </tr>
  <tr>
    <td>Soil and foliar analysis </td>
    <td><div align="right">10.43</div></td>
    <td><div align="right">6.93</div></td>
    <td><div align="right">6.93</div></td>
    <td><div align="right">-33.56</div></td>
  </tr>
  <tr bgcolor="#FF9966">
    <td><strong>Total</strong></td>
    <td bgcolor="#FF9966"><div align="right"><strong>4172.68</strong></div></td>
    <td bgcolor="#FF9966"><div align="right"><strong>5148.56</strong></div></td>
    <td bgcolor="#FF9966"><div align="right"><strong>3479.36</strong></div></td>
    <td bgcolor="#FF9966"><div align="right"><strong>23.39</strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
	}
	else if($_GET['year'] == "2") {
?>
<table width="85%" align="center" cellpadding="4" cellspacing="0" style="border-collapse:collapse">

  <tr>
<td colspan="5"><strong>Cost in the Second Year of Oil Palm New Planting (RM per hectare) </strong></td>
</tr>
  <tr bgcolor="#8A1602">
    <td width="34%" rowspan="2"><span class="style5">Cost Items </span></td>
    <td bgcolor="#8A1602"><div align="center" class="style5">
      <div align="right">2008</div>
    </div></td>
    <td colspan="2" bgcolor="#8A1602"><div align="center" class="style5">
      <div align="right">2009</div>
    </div></td>
    <td rowspan="2" bgcolor="#8A1602"><div align="right"><span class="style5">% Change </span></div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Median</span></div></td>
  </tr>
  <tr>
    <td><u><strong><em>Upkeep and Cultivation </em></strong></u></td>
    <td><div align="right"><strong>1021.02</strong></div></td>
    <td><div align="right"><strong>1087.92</strong></div></td>
    <td><div align="right"><strong>593.61</strong></div></td>
    <td><div align="right"><strong>6.55</strong></div></td>
  </tr>
  <tr>
    <td>Weeding</td>
    <td><div align="right">195.61</div></td>
    <td><div align="right">241.24</div></td>
    <td><div align="right">181.20</div></td>
    <td><div align="right">23.33</div></td>
  </tr>
  <tr>
    <td>Lalang control </td>
    <td><div align="right">78.77</div></td>
    <td><div align="right">83.47</div></td>
    <td><div align="right">23.41</div></td>
    <td><div align="right">5.97</div></td>
  </tr>
  <tr>
    <td>Drains</td>
    <td><div align="right">77.70</div></td>
    <td><div align="right">84.20</div></td>
    <td><div align="right">31.21</div></td>
    <td><div align="right">8.37</div></td>
  </tr>
  <tr>
    <td>Roads, bridges, paths, etc </td>
    <td><div align="right">244.41</div></td>
    <td><div align="right">248.47</div></td>
    <td><div align="right">118.75</div></td>
    <td><div align="right">1.66</div></td>
  </tr>
  <tr>
    <td>Soil/Water Conservation </td>
    <td><div align="right">56.88</div></td>
    <td><div align="right">79.45</div></td>
    <td><div align="right">39.60</div></td>
    <td><div align="right">39.68</div></td>
  </tr>
  <tr>
    <td>Boundaries and survey </td>
    <td><div align="right">48.07</div></td>
    <td><div align="right">34.33</div></td>
    <td><div align="right">9.66</div></td>
    <td><div align="right">-28.59</div></td>
  </tr>
  <tr>
    <td>Cover Cops </td>
    <td><div align="right">94.54</div></td>
    <td><div align="right">80.09</div></td>
    <td><div align="right">58.36</div></td>
    <td><div align="right">-15.29</div></td>
  </tr>
  <tr>
    <td>Survey and supply </td>
    <td><div align="right">52.87</div></td>
    <td><div align="right">22.64</div></td>
    <td><div align="right">6.15</div></td>
    <td><div align="right">-57.19</div></td>
  </tr>
  <tr>
    <td>Pruning</td>
    <td><div align="right">37.30</div></td>
    <td><div align="right">25.77</div></td>
    <td><div align="right">8.26</div></td>
    <td><div align="right">-30.92</div></td>
  </tr>
  <tr>
    <td>Pests and diseases </td>
    <td><div align="right">43.53</div></td>
    <td><div align="right">59.52</div></td>
    <td><div align="right">31.67</div></td>
    <td><div align="right">-39.96</div></td>
  </tr>
  <tr>
    <td>Castration</td>
    <td><div align="right">48.97</div></td>
    <td><div align="right">19.89</div></td>
    <td><div align="right">13.00</div></td>
    <td><div align="right">-59.38</div></td>
  </tr>
  <tr>
    <td>Other costs of upkeep </td>
    <td><div align="right">43.37</div></td>
    <td><div align="right">108.84</div></td>
    <td><div align="right">72.33</div></td>
    <td><div align="right">150.96</div></td>
  </tr>
  <tr>
    <td colspan="5"><hr /></td>
  </tr>
  <tr>
    <td><u><em><strong>Fertilisation</strong></em></u></td>
    <td><div align="right"><strong>333.46</strong></div></td>
    <td><div align="right"><strong>721.62</strong></div></td>
    <td><div align="right"><strong>289.69</strong></div></td>
    <td><div align="right"><strong>116.40</strong></div></td>
  </tr>
  <tr>
    <td>Fertilisers</td>
    <td><div align="right">265.09</div></td>
    <td><div align="right">626.90</div></td>
    <td><div align="right">256.76</div></td>
    <td><div align="right">136.49</div></td>
  </tr>
  <tr>
    <td>Fertilisers application </td>
    <td><div align="right">57.94</div></td>
    <td><div align="right">87.78</div></td>
    <td><div align="right">35.00</div></td>
    <td><div align="right">51.50</div></td>
  </tr>
  <tr>
    <td>Soil and foliar analysis </td>
    <td><div align="right">10.43</div></td>
    <td><div align="right">6.93</div></td>
    <td><div align="right">6.93</div></td>
    <td><div align="right">-33.56</div></td>
  </tr>
  <tr bgcolor="#FF9966">
    <td><strong>Total</strong></td>
    <td bgcolor="#FF9966"><div align="right"><strong>4172.68</strong></div></td>
    <td bgcolor="#FF9966"><div align="right"><strong>5148.56</strong></div></td>
    <td bgcolor="#FF9966"><div align="right"><strong>3479.36</strong></div></td>
    <td bgcolor="#FF9966"><div align="right"><strong>23.39</strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
  </tr>
</table>
<?php
	}
	else {
?>
<table width="85%" align="center" cellpadding="4" cellspacing="0" style="border-collapse:collapse">
  <tr>
<td colspan="5"><strong>Cost in the Third Year of Oil Palm New Planting (RM per hectare) </strong></td>
</tr>
  <tr bgcolor="#8A1602">
    <td width="34%" rowspan="2"><span class="style5">Cost Items </span></td>
    <td bgcolor="#8A1602"><div align="center" class="style5">
      <div align="right">2008</div>
    </div></td>
    <td colspan="2" bgcolor="#8A1602"><div align="center" class="style5">
      <div align="right">2009</div>
    </div></td>
    <td rowspan="2" bgcolor="#8A1602"><div align="right"><span class="style5">% Change </span></div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Mean</span></div></td>
    <td bgcolor="#8A1602"><div align="right"><span class="style5">Median</span></div></td>
  </tr>
  <tr>
    <td><u><strong><em>Upkeep and Cultivation </em></strong></u></td>
    <td><div align="right"><strong>1021.02</strong></div></td>
    <td><div align="right"><strong>1087.92</strong></div></td>
    <td><div align="right"><strong>593.61</strong></div></td>
    <td><div align="right"><strong>6.55</strong></div></td>
  </tr>
  <tr>
    <td>Weeding</td>
    <td><div align="right">195.61</div></td>
    <td><div align="right">241.24</div></td>
    <td><div align="right">181.20</div></td>
    <td><div align="right">23.33</div></td>
  </tr>
  <tr>
    <td>Lalang control </td>
    <td><div align="right">78.77</div></td>
    <td><div align="right">83.47</div></td>
    <td><div align="right">23.41</div></td>
    <td><div align="right">5.97</div></td>
  </tr>
  <tr>
    <td>Drains</td>
    <td><div align="right">77.70</div></td>
    <td><div align="right">84.20</div></td>
    <td><div align="right">31.21</div></td>
    <td><div align="right">8.37</div></td>
  </tr>
  <tr>
    <td>Roads, bridges, paths, etc </td>
    <td><div align="right">244.41</div></td>
    <td><div align="right">248.47</div></td>
    <td><div align="right">118.75</div></td>
    <td><div align="right">1.66</div></td>
  </tr>
  <tr>
    <td>Soil/Water Conservation </td>
    <td><div align="right">56.88</div></td>
    <td><div align="right">79.45</div></td>
    <td><div align="right">39.60</div></td>
    <td><div align="right">39.68</div></td>
  </tr>
  <tr>
    <td>Boundaries and survey </td>
    <td><div align="right">48.07</div></td>
    <td><div align="right">34.33</div></td>
    <td><div align="right">9.66</div></td>
    <td><div align="right">-28.59</div></td>
  </tr>
  <tr>
    <td>Cover Cops </td>
    <td><div align="right">94.54</div></td>
    <td><div align="right">80.09</div></td>
    <td><div align="right">58.36</div></td>
    <td><div align="right">-15.29</div></td>
  </tr>
  <tr>
    <td>Survey and supply </td>
    <td><div align="right">52.87</div></td>
    <td><div align="right">22.64</div></td>
    <td><div align="right">6.15</div></td>
    <td><div align="right">-57.19</div></td>
  </tr>
  <tr>
    <td>Pruning</td>
    <td><div align="right">37.30</div></td>
    <td><div align="right">25.77</div></td>
    <td><div align="right">8.26</div></td>
    <td><div align="right">-30.92</div></td>
  </tr>
  <tr>
    <td>Pests and diseases </td>
    <td><div align="right">43.53</div></td>
    <td><div align="right">59.52</div></td>
    <td><div align="right">31.67</div></td>
    <td><div align="right">-39.96</div></td>
  </tr>
  <tr>
    <td>Castration</td>
    <td><div align="right">48.97</div></td>
    <td><div align="right">19.89</div></td>
    <td><div align="right">13.00</div></td>
    <td><div align="right">-59.38</div></td>
  </tr>
  <tr>
    <td>Other costs of upkeep </td>
    <td><div align="right">43.37</div></td>
    <td><div align="right">108.84</div></td>
    <td><div align="right">72.33</div></td>
    <td><div align="right">150.96</div></td>
  </tr>
  <tr>
    <td colspan="5"><hr /></td>
  </tr>
  <tr>
    <td><u><em><strong>Fertilisation</strong></em></u></td>
    <td><div align="right"><strong>333.46</strong></div></td>
    <td><div align="right"><strong>721.62</strong></div></td>
    <td><div align="right"><strong>289.69</strong></div></td>
    <td><div align="right"><strong>116.40</strong></div></td>
  </tr>
  <tr>
    <td>Fertilisers</td>
    <td><div align="right">265.09</div></td>
    <td><div align="right">626.90</div></td>
    <td><div align="right">256.76</div></td>
    <td><div align="right">136.49</div></td>
  </tr>
  <tr>
    <td>Fertilisers application </td>
    <td><div align="right">57.94</div></td>
    <td><div align="right">87.78</div></td>
    <td><div align="right">35.00</div></td>
    <td><div align="right">51.50</div></td>
  </tr>
  <tr>
    <td>Soil and foliar analysis </td>
    <td><div align="right">10.43</div></td>
    <td><div align="right">6.93</div></td>
    <td><div align="right">6.93</div></td>
    <td><div align="right">-33.56</div></td>
  </tr>
  <tr bgcolor="#FF9966">
    <td><strong>Total</strong></td>
    <td bgcolor="#FF9966"><div align="right"><strong>4172.68</strong></div></td>
    <td bgcolor="#FF9966"><div align="right"><strong>5148.56</strong></div></td>
    <td bgcolor="#FF9966"><div align="right"><strong>3479.36</strong></div></td>
    <td bgcolor="#FF9966"><div align="right"><strong>23.39</strong></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFCCFF"><strong>Total Immature Cost</strong></td>
    <td bgcolor="#FFCCFF"><div align="right"><strong>9,133.23</strong></div></td>
    <td bgcolor="#FFCCFF"><div align="right"><strong>10,150.30</strong></div></td>
    <td bgcolor="#FFCCFF"><div align="right"><strong>8,431.12</strong></div></td>
    <td bgcolor="#FFCCFF"><div align="right"><strong>10.31</strong></div></td>
  </tr>
</table>
<?php
	}
?>
