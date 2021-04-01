<?
session_start();
$title = $_SESSION['title'];
?>
<style type="text/css">
<!--
.style1 {
	font-size: 11px;
	font-style: italic;
}
.style5 {color: #FFFFFF; font-weight: bold; }
-->
</style>
<table width="100%">
  <tr valign="top">
    <td width="41%"><div align="center"><img src="images/region.png" width="404" height="179" border="0" usemap="#Map" /><br />
        <span class="style1">Select on Region to view Data by Region </span><br />
        <br />
    </div></td>
  </tr>
  <tr>
    <td><table width="100%" cellpadding="4" cellspacing="4">
      <tr>
        <td colspan="2">
		<?php
		if ($region !=NULL){?>


		<?php
			if ($region==1)
			{
		?>
		<div id="mi_region1" align="center"></div>
		<br />
		<table width="100%" align="center" cellpadding="4" cellspacing="4">
          <col width="257">
          <col width="72">
          <col width="66" span="2">
          <tr height="17">
            <td height="17" width="257"></td>
            <td colspan="3" width="204">2007</td>
          </tr>
          <tr height="18">
            <td height="18" width="257">&nbsp;</td>
            <td width="72" bgcolor="#790000"><span class="style5">PM</span></td>
            <td width="66" bgcolor="#790000"><span class="style5">Sabah</span></td>
            <td width="66" bgcolor="#790000"><span class="style5">Sarawak</span></td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Weeding</td>
            <td width="72">128.76</td>
            <td width="66">112.53</td>
            <td width="66">134.48</td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Lalang    control</td>
            <td width="72">10.36</td>
            <td width="66">10.79</td>
            <td width="66">10.78</td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Cultivation/conservation</td>
            <td width="72">8.69</td>
            <td width="66">8.51</td>
            <td width="66">9.01</td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Upkeep of roads, bridges, paths etc</td>
            <td width="72">61.31</td>
            <td width="66">71.79</td>
            <td width="66">103.21</td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Upkeep    drains</td>
            <td width="72">13.55</td>
            <td width="66">12.45</td>
            <td width="66">15.05</td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Pests    and diseases</td>
            <td width="72">15.91</td>
            <td width="66">14.06</td>
            <td width="66">12.91</td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Pruning    and palm sanitation</td>
            <td width="72">51.46</td>
            <td width="66">30.53</td>
            <td width="66">35.56</td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Upkeep    bunds, boundaries &amp; watergates</td>
            <td width="72">6.13</td>
            <td width="66">5.06</td>
            <td width="66">6.93</td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Mandore    wages/ direct field supervision</td>
            <td width="72">33.33</td>
            <td width="66">30.49</td>
            <td width="66">28.99</td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Survey    of palms</td>
            <td width="72">4.91</td>
            <td width="66">4.7</td>
            <td width="66">5.89</td>
          </tr>
          <tr height="17">
            <td height="17" width="257">Sundry    expenses</td>
            <td width="72">11.77</td>
            <td width="66">14.07</td>
            <td width="66">14.47</td>
          </tr>
        </table>
		<?php } ?>
        <?php if($region==2){?>
<div id="mi_region2" align="center"></div><br />

			<table width="85%" align="center" cellpadding="1" style="border-collapse:collapse">
          <tr>
            <td colspan="4"><div align="center"><u><strong>Cost of Oil Palm New Planting by Region (
			Sarawak
			) (RM per hectare) </strong></u></div></td>
            </tr>
          <tr bgcolor="#8A1602">
            <td width="34%" rowspan="2"><span class="style5">Cost Items </span></td>
            <td colspan="3"><div align="center"><u><span class="style5">Sarawak</span></u></div></td>
            </tr>
          <tr bgcolor="#8A1602">
            <td bgcolor="#8A1602"><div align="center"><span class="style5">Year 1 </span></div></td>
            <td bgcolor="#8A1602"><div align="center"><span class="style5">Year 2 </span></div></td>
            <td bgcolor="#8A1602"><div align="center"><span class="style5">Year 3 </span></div></td>
          </tr>
          <tr>
            <td><u><strong><em>Non-Recurrent Costs </em></strong></u></td>
            <td><div align="center"><strong>3842.91</strong></div></td>
            <td><div align="center"><strong>0.00</strong></div></td>
            <td><div align="center"><strong>0.00</strong></div></td>
          </tr>
          <tr>
            <td>Felling and Clearing</td>
            <td><div align="center">898.60</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Terracing and Platform </td>
            <td><div align="center">737.34</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Road Construction </td>
            <td><div align="center">643.78</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Drain Construction </td>
            <td><div align="center">276.43</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Lining</td>
            <td><div align="center">72.00</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Holing and planting </td>
            <td><div align="center">358.26</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Basal Fertilizer </td>
            <td><div align="center">179.17</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Planting Material </td>
            <td><div align="center">481.27</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Cover Cops </td>
            <td><div align="center">118.39</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Other non-recurrent costs </td>
            <td><div align="center">77.67</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td colspan="4"><hr /></td>
            </tr>
          <tr>
            <td><u><strong><em><?=$title?> </em></strong></u></td>
            <td><div align="center"><strong>1114.97</strong></div></td>
            <td><div align="center"><strong>1322.30</strong></div></td>
            <td><div align="center"><strong>924.31</strong></div></td>
          </tr>
          <tr>
            <td>Weeding</td>
            <td><div align="center">276.76</div></td>
            <td><div align="center">260.76</div></td>
            <td><div align="center">217.11</div></td>
          </tr>
          <tr>
            <td>Lalang control </td>
            <td><div align="center">94.87</div></td>
            <td><div align="center">20.94</div></td>
            <td><div align="center">16.68</div></td>
          </tr>
          <tr>
            <td>Drains</td>
            <td><div align="center">79.14</div></td>
            <td><div align="center">199.67</div></td>
            <td><div align="center">116.64</div></td>
          </tr>
          <tr>
            <td>Roads, bridges, paths, etc </td>
            <td><div align="center">282.68</div></td>
            <td><div align="center">309.90</div></td>
            <td><div align="center">278.98</div></td>
          </tr>
          <tr>
            <td>Soil/Water Conservation </td>
            <td><div align="center">59.35</div></td>
            <td><div align="center">20.13</div></td>
            <td><div align="center">8.69</div></td>
          </tr>
          <tr>
            <td>Boundaries and survey </td>
            <td><div align="center">22.88</div></td>
            <td><div align="center">16.08</div></td>
            <td><div align="center">17.99</div></td>
          </tr>
          <tr>
            <td>Cover Cops </td>
            <td><div align="center">74.07</div></td>
            <td><div align="center">50.11</div></td>
            <td><div align="center">11.26</div></td>
          </tr>
          <tr>
            <td>Survey and supply </td>
            <td><div align="center">6.17</div></td>
            <td><div align="center">25.83</div></td>
            <td><div align="center">38.68</div></td>
          </tr>
          <tr>
            <td>Pruning</td>
            <td><div align="center">32.89</div></td>
            <td><div align="center">33.49</div></td>
            <td><div align="center">41.16</div></td>
          </tr>
          <tr>
            <td>Pests and diseases </td>
            <td><div align="center">28.71</div></td>
            <td><div align="center">41.70</div></td>
            <td><div align="center">56.87</div></td>
          </tr>
          <tr>
            <td>Castration</td>
            <td><div align="center">54.98</div></td>
            <td><div align="center">24.25</div></td>
            <td><div align="center">19.26</div></td>
          </tr>
          <tr>
            <td>Other costs of upkeep </td>
            <td><div align="center">102.47</div></td>
            <td><div align="center">319.44</div></td>
            <td><div align="center">100.99</div></td>
          </tr>
          <tr>
            <td colspan="4"><hr /></td>
            </tr>
          <tr>
            <td><u><em><strong>Fertilisation</strong></em></u></td>
            <td><div align="center"><strong>644.52</strong></div></td>
            <td><div align="center"><strong>622.03</strong></div></td>
            <td><div align="center"><strong>965.35</strong></div></td>
          </tr>
          <tr>
            <td>Fertilisers</td>
            <td><div align="center">580.61</div></td>
            <td><div align="center">525.50</div></td>
            <td><div align="center">825.76</div></td>
          </tr>
          <tr>
            <td>Fertilisers application </td>
            <td><div align="center">63.91</div></td>
            <td><div align="center">96.53</div></td>
            <td><div align="center">134.59</div></td>
          </tr>
          <tr>
            <td>Soil and foliar analysis </td>
            <td><div align="center">0.00</div></td>
            <td><div align="center">0.00</div></td>
            <td><div align="center">5.00</div></td>
          </tr>
          <tr bgcolor="#FF9966">
            <td><strong>Total</strong></td>
            <td bgcolor="#FF9966"><div align="center"><strong>5602.40</strong></div></td>
            <td bgcolor="#FF9966"><div align="center"><strong>1944.33</strong></div></td>
            <td bgcolor="#FF9966"><div align="center"><strong>1889.66</strong></div></td>
          </tr>
          <tr bgcolor="#FFCC66">
            <td><strong>Total Immature Cost </strong></td>
            <td colspan="3" bgcolor="#FFCC66"><div align="center"><strong>9436.39</strong></div>
              <div align="center"></div>              <div align="center"></div></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
			<?php } ?>
						<?php if($region==3){?>
			            <div id="mi_region3" align="center"></div><br />

			            <table width="85%" align="center" cellpadding="1" style="border-collapse:collapse">
          <tr>
            <td colspan="4"><div align="center"><u><strong>Cost of Oil Palm New Planting by Region (
			Sabah
			) (RM per hectare) </strong></u></div></td>
            </tr>
          <tr bgcolor="#8A1602">
            <td width="34%" rowspan="2"><span class="style5">Cost Items </span></td>
            <td colspan="3"><div align="center"><u><span class="style5">Sabah</span></u></div></td>
            </tr>
          <tr bgcolor="#8A1602">
            <td bgcolor="#8A1602"><div align="center"><span class="style5">Year 1 </span></div></td>
            <td bgcolor="#8A1602"><div align="center"><span class="style5">Year 2 </span></div></td>
            <td bgcolor="#8A1602"><div align="center"><span class="style5">Year 3 </span></div></td>
          </tr>
          <tr>
            <td><u><strong><em>Non-Recurrent Costs </em></strong></u></td>
            <td><div align="center"><strong>3024.21</strong></div></td>
            <td><div align="center"><strong>0.00</strong></div></td>
            <td><div align="center"><strong>0.00</strong></div></td>
          </tr>
          <tr>
            <td>Felling and Clearing</td>
            <td><div align="center">574.00</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Terracing and Platform </td>
            <td><div align="center">491.60</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Road Construction </td>
            <td><div align="center">570.63</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Drain Construction </td>
            <td><div align="center">263.05</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Lining</td>
            <td><div align="center">65.78</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Holing and planting </td>
            <td><div align="center">153.08</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Basal Fertilizer </td>
            <td><div align="center">261.90</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Planting Material </td>
            <td><div align="center">450.94</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Cover Cops </td>
            <td><div align="center">104.91</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>Other non-recurrent costs </td>
            <td><div align="center">88.33</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td colspan="4"><hr /></td>
            </tr>
          <tr>
            <td><u><strong><em><?=$title?> </em></strong></u></td>
            <td><div align="center"><strong>971.93</strong></div></td>
            <td><div align="center"><strong>1553.05</strong></div></td>
            <td><div align="center"><strong>1091.91</strong></div></td>
          </tr>
          <tr>
            <td>Weeding</td>
            <td><div align="center">214.26</div></td>
            <td><div align="center">319.16</div></td>
            <td><div align="center">285.26</div></td>
          </tr>
          <tr>
            <td>Lalang control </td>
            <td><div align="center">95.59</div></td>
            <td><div align="center">103.29</div></td>
            <td><div align="center">57.95</div></td>
          </tr>
          <tr>
            <td>Drains</td>
            <td><div align="center">68.07</div></td>
            <td><div align="center">140.33</div></td>
            <td><div align="center">132.20</div></td>
          </tr>
          <tr>
            <td>Roads, bridges, paths, etc </td>
            <td><div align="center">231.23</div></td>
            <td><div align="center">352.77</div></td>
            <td><div align="center">330.82</div></td>
          </tr>
          <tr>
            <td>Soil/Water Conservation </td>
            <td><div align="center">37.91</div></td>
            <td><div align="center">50.89</div></td>
            <td><div align="center">72.54</div></td>
          </tr>
          <tr>
            <td>Boundaries and survey </td>
            <td><div align="center">27.74</div></td>
            <td><div align="center">18.89</div></td>
            <td><div align="center">25.50</div></td>
          </tr>
          <tr>
            <td>Cover Cops </td>
            <td><div align="center">82.40</div></td>
            <td><div align="center">89.53</div></td>
            <td><div align="center">69.31</div></td>
          </tr>
          <tr>
            <td>Survey and supply </td>
            <td><div align="center">33.79</div></td>
            <td><div align="center">86.01</div></td>
            <td><div align="center">63.98</div></td>
          </tr>
          <tr>
            <td>Pruning</td>
            <td><div align="center">17.24</div></td>
            <td><div align="center">44.49</div></td>
            <td><div align="center">27.58</div></td>
          </tr>
          <tr>
            <td>Pests and diseases </td>
            <td><div align="center">63.20</div></td>
            <td><div align="center">53.79</div></td>
            <td><div align="center">43.15</div></td>
          </tr>
          <tr>
            <td>Castration</td>

            <td><div align="center">10.75</div></td>
            <td><div align="center">20.51</div></td>
            <td><div align="center">25.21</div></td>
          </tr>
          <tr>
            <td>Other costs of upkeep </td>
            <td><div align="center">89.75</div></td>
            <td><div align="center">273.39</div></td>
            <td><div align="center">92.45</div></td>
          </tr>
          <tr>
            <td colspan="4"><hr /></td>
            </tr>
          <tr>
            <td><u><em><strong>Fertilisation</strong></em></u></td>
            <td><div align="center"><strong>780.19</strong></div></td>
            <td><div align="center"><strong>571.83</strong></div></td>
            <td><div align="center"><strong>675.58</strong></div></td>
          </tr>
          <tr>
            <td>Fertilisers</td>
            <td><div align="center">681.29</div></td>
            <td><div align="center">508.11</div></td>
            <td><div align="center">605.71</div></td>
          </tr>
          <tr>
            <td>Fertilisers application </td>
            <td><div align="center">98.90</div></td>
            <td><div align="center">60.60</div></td>
            <td><div align="center">67.47</div></td>
          </tr>
          <tr>
            <td>Soil and foliar analysis </td>
            <td><div align="center">0.00</div></td>
            <td><div align="center">3.12</div></td>
            <td><div align="center">2.70</div></td>
          </tr>
          <tr bgcolor="#FF9966">
            <td><strong>Total</strong></td>
            <td bgcolor="#FF9966"><div align="center"><strong>4776.33</strong></div></td>
            <td bgcolor="#FF9966"><div align="center"><strong>2124.88</strong></div></td>
            <td bgcolor="#FF9966"><div align="center"><strong>1901.53</strong></div></td>
          </tr>
          <tr bgcolor="#FFCC66">
            <td><strong>Total Immature Cost </strong></td>
            <td colspan="3" bgcolor="#FFCC66"><div align="center"><strong>8802.75</strong></div>
              <div align="center"></div>              <div align="center"></div></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
			<?php } ?>

		<?php } ?>		</td>
        </tr>

    </table></td>
  </tr>
</table>

<map name="Map" id="Map">
<area shape="poly" coords="147,164,146,161" href="#" />
<area shape="poly" coords="32,11" href="#" /><area shape="poly" coords="28,12" href="#" />

<area shape="poly" title="Region 1 (Semenanjung Malaysia)" coords="28,13,56,28,84,27,114,49,124,81,123,106,135,130,139,147,144,164,125,165,105,153,84,140,72,127,62,118,49,100,42,84,34,59,31,52" href="home.php?id=mc_region1&region=1" />
<area shape="poly" title="Region 3 (Sabah)" coords="299,63,314,51,328,30,341,32,349,43,358,52,372,60,388,69,377,76,364,80,369,87,354,92,335,92,315,92,306,93" href="home.php?id=mc_region1&region=3" />
<area shape="poly" title="Region 2 (Sarawak)" coords="300,77,286,79,275,86,256,97,242,116,217,122,203,138,196,155,186,159,171,151,168,146,175,165,184,171,209,170,227,157,248,160,265,160,281,145,286,133,299,116,302,100,308,95,304,107,305,99" href="home.php?id=mc_region1&region=2" />
</map>

		<script type="text/javascript" src="amcolumn/swfobject.js"></script>
	<script type="text/javascript">
		// <![CDATA[
		var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("mie_region_setting.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_region.txt"));
		so.addVariable("preloader_color", "#999999");
		so.write("mi_region1");
		// ]]>
	</script>

		<script type="text/javascript">
		// <![CDATA[
		var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("mie_region_setting2.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_region2.txt"));
		so.addVariable("preloader_color", "#999999");
		so.write("mi_region2");
		// ]]>
	</script>

		<script type="text/javascript">
		// <![CDATA[
		var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("mie_region_setting3.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_region3.txt"));
		so.addVariable("preloader_color", "#999999");
		so.write("mi_region3");
		// ]]>
	</script>
