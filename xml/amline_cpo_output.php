<?php
session_start();
header("Content-type:application/xml");
include('../Connections/connection.class.php');
?><chart>
	<series>
		<value xid="0">Under 10000</value>
		<value xid="51">10000-20000</value>
		<value xid="52">20001-30000</value>
		<value xid="53">30001-40000</value>
		<value xid="54">40001-50000</value>
		<value xid="55">50000 and Larger</value>
	</series>
	<graphs>
		<graph gid="1">
		<?php
			function luas_cpo($nilai,$nilai2){
			$con=connect();
		 	$tahun_lepas = $_SESSION['session_tahun_report']-1;

			$q ="select sum(PENGELUARAN_CPO) as JUMLAH from ekilang ek , login_mill lm where lm.lesen = ek.no_lesen
		and lm.success !='0000-00-00 00:00:00' and lm.firsttime !='1'
		and ek.tahun = '".$tahun_lepas."' and ek.PENGELUARAN_CPO between '$nilai' and '$nilai2'";
			$r = mysqli_query($con, $q);
			$row = mysqli_fetch_array($r);
			$size[0] = $row['JUMLAH'];
			return $size;
			}

		?>
			<value xid="0"><?php $luas = luas_cpo(0,10000); echo $luas[0]; ?></value>
			<value xid="51"><?php $luas1 = luas_cpo(10001,20000); echo $luas1[0]; ?></value>
			<value xid="52"><?php $luas2 = luas_cpo(20001,30000); echo $luas2[0]; ?></value>
			<value xid="53"><?php $luas3 = luas_cpo(30001,40000); echo $luas3[0]; ?></value>
			<value xid="54"><?php $luas4 = luas_cpo(40001,50000); echo $luas4[0]; ?></value>
			<value xid="55"><?php $luas5 = luas_cpo(50001,999999999999999); echo $luas5[0]; ?></value>
		</graph>
	</graphs>
	<guides>
	 <guide>
	   <start_value></start_value>
	   <title></title>
	   <color>#00CC00</color>
	   <inside>true</inside>
	 </guide>
	</guides>
</chart>
