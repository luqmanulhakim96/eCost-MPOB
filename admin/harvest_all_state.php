<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style4 {font-size: 16px; font-weight: bold; color: #FFFFFF; }
.style5 {
	color: #FFFFFF;
	font-weight: bold;
}
.style6 {
	font-size: 14px;
	font-weight: bold;
}
-->
</style>
<table width="80%" align="center" cellpadding="4" cellspacing="0" style="border-collapse:collapse">
  <col width="257">
  <col width="72">
  <col width="66" span="5">
  <col width="64" span="3">
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td height="17">&nbsp;</td>
    <td height="17">&nbsp;</td>
    <td height="17">&nbsp;</td>
    <td height="17">&nbsp;</td>
    <td height="17">&nbsp;</td>
    <td height="17">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" colspan="7"><div align="center" class="style6">
      <table width="100%">
        <tr>
          <td><?php $con = connect();
	$qstate ="select * from negeri where id like '$state'";
	$rstate = mysql_query($qstate,$con);
	$rowstate = mysql_fetch_array($rstate);
	?>
	
	        <div align="center"><img src="../images/<?= $rowstate['negeri_path']; ?>" alt="" name="state" width="91" height="45" class="thinborderfloat" id="state" title="<?= $rowstate['nama'];?>" />
                <?php mysql_close($con);?>	
            </div></td>
        </tr>
      </table>
      Cost of Estate Harvesting and Collection of FBBs in
      <?= $rowstate['nama'];?></div></td>
  </tr>
  <tr height="17">
    <td width="258" height="17" bgcolor="#8A1602"><div align="center"></div></td>
    <td colspan="3" bgcolor="#8A1602"><div align="center" class="style4">
      <div align="center">RM per hectare</div>
    </div></td>
    <td colspan="3" bgcolor="#8A1602"><div align="center" class="style4">
      <div align="center">RM per tonne FFB</div>
    </div>      </td>
  </tr>
  <tr height="18">
    <td width="258" height="18" bgcolor="#8A1602">&nbsp;</td>
    <td width="68" bgcolor="#8A1602"><div align="center"><span class="style5">2006</span></div></td>
    <td width="104" bgcolor="#8A1602"><div align="center"><span class="style5">2007</span></div></td>
    <td width="68" bgcolor="#8A1602"><div align="center"><span class="style5">% Change</span></div></td>
    <td width="68" bgcolor="#8A1602"><div align="center"><span class="style5">2006</span></div></td>
    <td width="84" bgcolor="#8A1602"><div align="center"><span class="style5">2007</span></div></td>
    <td width="69" bgcolor="#8A1602"><div align="center"><span class="style5">% Change</span></div></td>
  </tr>
  <tr height="17">
    <td height="17" width="258">Harvesting tools </td>
    <td width="68"><div align="center">129.00</div></td>
    <td width="104"><div align="center">113.00</div></td>
    <td width="68"><div align="center">135.00</div></td>
    <td align="right"><div align="center">0.19</div></td>
    <td align="right"><div align="center">0.42</div></td>
    <td align="right"><div align="center">0.39</div></td>
  </tr>
  <tr height="17">
    <td height="17" width="258">Harvesting</td>
    <td width="68"><div align="center">11.00</div></td>
    <td width="104"><div align="center">11.00</div></td>
    <td width="68"><div align="center">11.00</div></td>
    <td align="right"><div align="center">6.18</div></td>
    <td align="right"><div align="center">1.95</div></td>
    <td align="right"><div align="center">2.04</div></td>
  </tr>
  <tr height="17">
    <td height="17" width="258">FBB collection </td>
    <td width="68"><div align="center">9.00</div></td>
    <td width="104"><div align="center">9.00</div></td>
    <td width="68"><div align="center">9.50</div></td>
    <td align="right"><div align="center">3.57</div></td>
    <td align="right"><div align="center">5.76</div></td>
    <td align="right"><div align="center">5.44</div></td>
  </tr>
  <tr height="17">
    <td height="17" width="258">Loose fruit collection </td>
    <td width="68"><div align="center">62.00</div></td>
    <td width="104"><div align="center">72.00</div></td>
    <td width="68"><div align="center">103.50</div></td>
    <td align="right"><div align="center">1.13</div></td>
    <td align="right"><div align="center">0.29</div></td>
    <td align="right"><div align="center">0.28</div></td>
  </tr>
  <tr height="17">
    <td height="17" width="258">Mandore wages / direct field supervision costs </td>
    <td width="68"><div align="center">14.00</div></td>
    <td width="104"><div align="center">13.00</div></td>
    <td width="68"><div align="center">15.50</div></td>
    <td align="right"><div align="center">3.32</div></td>
    <td align="right"><div align="center">4.42</div></td>
    <td align="right"><div align="center">2.99</div></td>
  </tr>
  <tr height="17">
    <td width="258" height="17" bgcolor="#FF9966"><strong>Total</strong></td>
    <td align="right" bgcolor="#FF9966"><div align="center"><strong>7,362.81</strong></div></td>
    <td align="right" bgcolor="#FF9966"><div align="center"><strong>8,078.28</strong></div></td>
    <td align="right" bgcolor="#FF9966"><div align="center"><strong>8,245.72</strong></div></td>
    <td align="right" bgcolor="#FF9966"><div align="center"><strong>135.94</strong></div></td>
    <td align="right" bgcolor="#FF9966"><div align="center"><strong>156.12</strong></div></td>
    <td align="right" bgcolor="#FF9966"><div align="center"><strong>200.78</strong></div></td>
  </tr>
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
</table>
<br />

<br />
