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
		
		<graph gid="Kos Matang" title="Kos Matang (RM/Ha)">
			<value xid="2002">1952</value>
			<value xid="2003">1433</value>			
			<value xid="2004">1998</value>
			<value xid="2005">1690</value>
			<value xid="2006">1051</value>
		</graph>
			
					
	</graphs>
</chart>
