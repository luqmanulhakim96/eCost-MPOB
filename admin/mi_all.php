<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<table width="100%" cellpadding="4" style="border-collapse:collapse">
  <tr>
    <td colspan="5"><div align="center"><u><strong>Percentage of Estate Respondents for Immature Stage (<?php $tahun =date('Y'); echo $tahun; ?>) </strong></u></div></td>
  </tr>
  <tr>
    <td bgcolor="#8A1602"><span class="style1"></span></td>
    <td bgcolor="#8A1602"><div align="center"><span class="style1"><strong>New Planting </strong></span></div></td>
    <td bgcolor="#8A1602"><div align="center"><span class="style1"><strong>Replanting</strong></span></div></td>
    <td bgcolor="#8A1602"><div align="center"><span class="style1"><strong>Conversion</strong></span></div></td>
    <td bgcolor="#8A1602"><div align="center"><span class="style1"><strong>Total</strong></span></div></td>
  </tr>
  <tr>
    <td>Peninsular Malaysia </td>
    <td><div align="center"><?php 
	
	$newplant=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Baru','peninsular');
	$replant=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Semula','peninsular');
	$convert=$response->tanambaru($tahun,'kos_belum_matang','Penukaran','peninsular');
	$totalall = $newplant+$replant+$convert; 
	
	$jumlahall = $response->totalall('');
	$jumlahpeninsular=$response->totalall('peninsular');
	$jumlahsabah=$response->totalall('sabah');
	$jumlahsarawak=$response->totalall('sarawak');
	
	?>
	<?= number_format(($newplant/$jumlahpeninsular*100),2);?>
	</div></td>
    <td><div align="center"><?= number_format(($replant/$jumlahpeninsular*100),2);?></div></td>
    <td><div align="center"><?= number_format(($convert/$jumlahpeninsular*100),2);?></div></td>
    <td><div align="center"><?= number_format(($totalall/$jumlahall*100),2);?></div></td>
  </tr>
  <tr>
    <td>Sabah</td>
    <td><div align="center">
	<?php
	$newplantsbh=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Baru','sabah');
	$replantsbh=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Semula','sabah');
	$convertsbh=$response->tanambaru($tahun,'kos_belum_matang','Penukaran','sabah');
	$totalallsbh = $newplantsbh+$replantsbh+$convertsbh; 
	?>
	
	<?= number_format(($newplantsbh/$jumlahsabah*100),2);?>
	</div></td>
    <td><div align="center"><?= number_format(($replantsbh/$jumlahsabah*100),2);?></div></td>
    <td><div align="center"><?= number_format(($convertsbh/$jumlahsabah*100),2);?></div></td>
    <td><div align="center"><?= number_format(($totalallsbh/$jumlahsabah*100),2);?></div></td>
  </tr>
  <tr>
    <td>Sarawak</td>
    <td><div align="center">
		<?php
	$newplantswk=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Baru','sarawak');
	$replantswk=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Semula','sarawak');
	$convertswk=$response->tanambaru($tahun,'kos_belum_matang','Penukaran','sarawak');
	$totalallswk = $newplantswk+$replantswk+$convertswk; 
	?>
	
	<?= number_format(($newplantswk/$jumlahsarawak*100),2);?>
	
	</div></td>
    <td><div align="center"><?= number_format(($replantswk/$jumlahsarawak*100),2);?></div></td>
    <td><div align="center"><?= number_format(($convertswk/$jumlahsarawak*100),2);?></div></td>
    <td><div align="center"><?= number_format(($totalallswk/$jumlahsarawak*100),2);?></div></td>
  </tr>
  <tr bgcolor="#FF9966">
    <td><strong>Malaysia</strong></td>
    <td bgcolor="#FF9966"><div align="center"><strong><?php $np = ($newplant/$jumlahpeninsular*100)+($newplantsbh/$jumlahsabah*100)+($newplantswk/$jumlahsarawak*100); echo number_format($np,2); ?></strong></div></td>
    <td><div align="center"><strong><?php $rp = ($replant/$jumlahpeninsular*100)+($replantsbh/$jumlahsabah*100)+($replantswk/$jumlahsarawak*100); echo number_format($rp,2); ?></strong></div></td>
    <td><div align="center"><strong><?php $cv=($convert/$jumlahpeninsular*100)+($convertsbh/$jumlahsabah*100)+($convertswk/$jumlahsarawak*100); echo number_format($cv,2);?></strong></div></td>
    <td><div align="center"><strong><?php $ta = ($totalall/$jumlahall*100)+($totalallsbh/$jumlahsabah*100)+($totalswk/$jumlahsarawak*100);
	echo number_format($ta,2);?></strong></div></td>
  </tr>
</table>
<br />
<br />

<div id="mi_all" align="center"></div>
<script type="text/javascript" src="amcolumn/swfobject.js"></script>


	<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "520", "380", "8", "#FFFFFF");
		so.addVariable("path", "amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("mi_all_setting.xml"));
		so.addVariable("data_file", encodeURIComponent("mi_all_data.php"));
		so.addVariable("preloader_color", "#999999");
		so.write("mi_all");
		// ]]>
	</script><br />
<br />
