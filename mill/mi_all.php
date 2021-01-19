<?php 
session_start();
header("Content-type:application/xml");
include('../Connections/connection.class.php');
 
include ('../class/mill.class.php');
$pengguna = new user('mill',$_SESSION['lesen']);?>
<chart>
	<series>
		<value xid="2002"><?= strtoupper($pengguna->nama);?></value>
		<value xid="2004">PAHANG</value>
		<value xid="2005">SEMENANJUNG</value>
		<value xid="2006">MALAYSIA</value>
	</series>
	<graphs>
		<graph gid="Kos Per Tan BTS (RM)" title="Kos Per Tan BTS (RM)">
			<value xid="2002">1450</value>
			<value xid="2004">1947</value>
			<value xid="2005">1024</value>
			<value xid="2006">1071</value>
		</graph>
				
					
	</graphs>
</chart>
