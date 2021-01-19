<?php include '../class/test.class.php'; ?>
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>

<tr>
	<td height="37" style="border:#333333 solid 1px; border-bottom:none; border-right:dotted 1px #999999;"><div align="center"><img src="../images/mill_m1.png" alt="estet" width="275" height="139" /></div></td>
    <td rowspan="2" valign="top" style="border:1px #666666 solid; border-left:none;"><table width="100%" border="0" cellspacing="0" style="padding:3px;">
      <tr>
        <td width="20%" height="31">&nbsp;</td>
        <td width="31%" background="../images/tb_BG.gif"><div align="center"><span class="style1">No of Respondent</span></div></td>
        <td width="31%" background="../images/tb_BG.gif"><div align="center"><strong>Total of Response</strong></div></td>
        <td width="49%" background="../images/tb_BG.gif"><div align="center"><span class="style1">Percentage Response (%)</span></div></td>
      </tr>
      <tr>
        <td height="35"><span class="style1">Total</span></td>
        <td bgcolor="#FFCC66"><div align="center"><?php echo number_format($total);?></div></td>
        <td bgcolor="#FFCC66"><div align="center"><?php echo number_format($total_all);?></div></td>
        <td bgcolor="#FFCC66"><div align="center"><?php echo number_format($percent_a,2);?></div></td>
      </tr>
      <tr>
        <td height="29" bgcolor="#99FF99"><span class="style1">Peninsular</span></td>
        <td bgcolor="#99FF99"><div align="center"><?php echo number_format($total_p);?></div></td>
        <td bgcolor="#99FF99"><div align="center"><?php echo number_format($total_peninsular);?></div></td>
        <td bgcolor="#99FF99"><div align="center"><?php echo number_format($percent_p,2);?></div></td>
      </tr>
      <tr>
        <td height="28"><span class="style1">Sabah</span></td>
        <td><div align="center"><?php echo number_format($total_sb);?></div></td>
        <td><div align="center"><?php echo number_format($total_sabah);?></div></td>
        <td><div align="center"><?php echo number_format($percent_sb,2);?></div></td>
      </tr>
      <tr>
        <td height="36" bgcolor="#99FF99"><span class="style1">Sarawak</span></td>
        <td bgcolor="#99FF99"><div align="center"><?php echo number_format($total_sw);?></div></td>
        <td bgcolor="#99FF99"><div align="center"><?php echo number_format($total_sarawak);?></div></td>
        <td bgcolor="#99FF99"><div align="center"><?php echo number_format($percent_sw,2);?></div></td>
      </tr>
    </table></td>
</tr>
<tr>
	<td height="59" style="border:#000000 1px solid; border-top:none; border-right:#999999 1px dotted;"><div align="center"><strong>Mill Respondent </strong></div></td>
</tr>