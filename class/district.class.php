<?php //inclclude('../Connections/connection.class.php');
class daerah 
{
	function daerah($type,$var)
	{	
		if($type=='daerah')
		{ $this->viewdaerah($var);}
		if($type=='negeri')
		{ $this->viewnegeri($var);}
	}
	
	//========================================
	function viewdaerah($var)
	{
		$con = connect();
		$q ="select * from district where state_id='$var' order by district_name";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$this->total = $res_total; 
		$i = 0;
		while($row=mysql_fetch_array($r))
		{
			$this->state[$i]=$row['state_id'];
			$this->daerah[$i]=$row['district_name'];
			$i++;		
		}	
	}
	//========================================
	function viewnegeri($var)
	{
		$con = connect();
	$q ="select * from negeri order by nama";
		$r = mysql_query($q,$con);

		$res_total = mysql_num_rows($r);
		$this->total = $res_total; 
		$i = 0;
		while($row=mysql_fetch_array($r))
		{
			$this->namanegeri[$i]=$row['nama'];
			$this->negeriid[$i]=$row['id'];
			$i++;		
		}	
	}
	
	//========================================
	function namanegeri($var)
	{
		$con = connect();
	echo	$q ="select * from negeri where id='$var'";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$row=mysql_fetch_array($r);
		$nama = strtoupper($row['nama']);
		return $nama;
	}
	

	
}
?>