<?php
session_start();
header("Content-type:application/xml"); 
include('../Connections/connection.class.php');
?><chart>
	<series>
		<value xid="0">Under 100</value>
		<value xid="51">100-499</value>
		<value xid="52">500-999</value>
		<value xid="53">1,000-1,499</value>
		<value xid="54">1,500-1,999</value>
		<value xid="55">2,000 and Larger</value>
	</series>
	<graphs>
		<graph gid="1">
		<?php
			function luas($nilai,$nilai2){
			$con=connect();
			$q ="SELECT count(Jumlah) as Jumlah FROM esub WHERE Jumlah between '$nilai' and '$nilai2'";
			$r = mysql_query($q,$con);
			$row = mysql_fetch_array($r);
			$size[0] = $row['Jumlah'];
			return $size;
			}
			
		?>
			<value xid="0"><?php $luas = luas(0,99); echo $luas[0]; ?></value>
			<value xid="51"><?php $luas = luas(100,499); echo $luas[0]; ?></value>
			<value xid="52"><?php $luas = luas(500,999); echo $luas[0]; ?></value>
			<value xid="53"><?php $luas = luas(1000,1499); echo $luas[0]; ?></value>
			<value xid="54"><?php $luas = luas(1500,1999); echo $luas[0]; ?></value>
			<value xid="55"><?php $luas = luas(2000,99999999); echo $luas[0]; ?></value>
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
