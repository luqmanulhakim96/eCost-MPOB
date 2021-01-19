<?php session_start();
header("Content-type:application/xml"); 
include('../Connections/connection.class.php');
include ('../class/response.class.php');
$response = new response('','');
$tahun = $_SESSION['tahun'];

	$newplant=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Baru','peninsular');
	$replant=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Semula','peninsular');
	$convert=$response->tanambaru($tahun,'kos_belum_matang','Penukaran','peninsular');
	$totalall = $newplant+$replant+$convert; 
	
	$jumlahall = $response->totalall('');
	$jumlahpeninsular=$response->totalall('peninsular');
	$jumlahsabah=$response->totalall('sabah');
	$jumlahsarawak=$response->totalall('sarawak');
	
	$newplantsbh=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Baru','sabah');
	$replantsbh=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Semula','sabah');
	$convertsbh=$response->tanambaru($tahun,'kos_belum_matang','Penukaran','sabah');
	$totalallsbh = $newplantsbh+$replantsbh+$convertsbh; 
	
	$newplantswk=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Baru','sarawak');
	$replantswk=$response->tanambaru($tahun,'kos_belum_matang','Penanaman Semula','sarawak');
	$convertswk=$response->tanambaru($tahun,'kos_belum_matang','Penukaran','sarawak');
	$totalallswk = $newplantswk+$replantswk+$convertswk; 
?>
<chart>
	<series>
		<value xid="2002">Peninsular Malaysia</value>
		<value xid="2004">Sabah</value>
		<value xid="2005">Sarawak</value>
	</series>
	<graphs>
		<graph gid="New Planting" title="New Planting">
			<value xid="2002"><?= ($newplant/$jumlahpeninsular*100);?></value>
			<value xid="2004"><?= ($newplantsbh/$jumlahsabah*100);?></value>			
			<value xid="2005"><?= ($newplantswk/$jumlahsarawak*100);?></value>
		</graph>
		<graph gid="Replanting" title="Replanting">
			<value xid="2002"><?= ($replant/$jumlahpeninsular*100);?></value>
			<value xid="2004"><?= ($replantsbh/$jumlahsabah*100);?></value>			
			<value xid="2005"><?= ($replantswk/$jumlahsarawak*100);?></value>
		</graph>		
		<graph gid="Conversion" title="Conversion">
			<value xid="2002"><?= ($convert/$jumlahpeninsular*100);?></value>
			<value xid="2004"><?= ($convertsbh/$jumlahsabah*100);?></value>			
			<value xid="2005"><?= ($convertswk/$jumlahsarawak*100);?></value>
		</graph>		
					
	</graphs>
</chart>
