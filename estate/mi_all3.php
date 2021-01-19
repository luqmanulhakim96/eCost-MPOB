<?php 
session_start();
header("Content-type:application/xml");
include('../Connections/connection.class.php');
 
include ('../class/user.class.php');
$pengguna = new user('estate',$_SESSION['lesen']);?><chart>
	<series>
		<value xid="2002"><?= strtoupper($pengguna->namaestet);?></value>
		<value xid="2003">ROMPIN</value>
		<value xid="2004">PAHANG</value>
		<value xid="2005">SEMENANJUNG</value>
		<value xid="2006">MALAYSIA</value>
	</series>
	<graphs>
		
		
			
		<graph gid="Kos BTS" title="Kos Matang (RM/T BTS)">
			<value xid="2002">192.82</value>
			<value xid="2003">173.70</value>			
			<value xid="2004">201.90</value>
			<value xid="2005">214.26</value>
			<value xid="2006">208.27</value>
		</graph>			
					
	</graphs>
</chart>
