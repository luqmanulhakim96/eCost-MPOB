<?php 
session_start();
header("Content-type:application/xml");
include('../Connections/connection.class.php');
 
include ('../class/user.class.php');
$pengguna = new user('estate',$_SESSION['lesen']);?>
<chart>
	<series>
		<value xid="2002"><?= strtoupper($pengguna->namaestet);?></value>
		<value xid="2003">ROMPIN</value>
		<value xid="2004">PAHANG</value>
		<value xid="2005">SEMENANJUNG</value>
		<value xid="2006">MALAYSIA</value>
	</series>
	<graphs>
		<graph gid="Kos Belum Matang" title="Kos Belum Matang (RM/Ha)">
			<value xid="2002">1489</value>
			<value xid="2003">1382</value>			
			<value xid="2004">1052</value>
			<value xid="2005">1113</value>
			<value xid="2006">1981</value>
		</graph>
		
					
	</graphs>
</chart>
