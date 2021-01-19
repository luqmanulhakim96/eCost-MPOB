<?php //include('../Connections/connection.class.php');
class syarikat 
{
	function syarikat($type,$var)
	{	
		if($type=='syarikat')
		{ $this->viewsyarikat($var);}
		
		else if($type=='keahlian')
		{ $this->viewkeahlian($var);}
		
		else if($type=='mukabumi')
		{ $this->viewmukabumi($var);}
		
		else if($type=='steril')
		{ $this->viewsteril($var);}
		
		else if($type=='lokasi')
		{ $this->viewlokasi($var);}
	}
	
	//========================================
	function viewsyarikat($var)
	{
		$con = connect();
		$q ="select * from company order by comp_name";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$this->total = $res_total; 
		$i = 0;
		while($row=mysql_fetch_array($r))
		{
			$this->comp_id[$i]=$row['comp_id'];
			$this->comp_name[$i]=$row['comp_name'];
			
			if($_COOKIE['lang']=='mal'){
			$this->comp_alt[$i]=$row['comp_name'];
			}
			else{
			$this->comp_alt[$i]=$row['comp_name_english'];
			}
			$i++;		
		}	
	}
	function viewkeahlian($var)
	{
		$con = connect();
		$q ="select * from keahlian order by ahli_name";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$this->total = $res_total; 
		$i = 0;
		while($row=mysql_fetch_array($r))
		{
			$this->ahli_id[$i]=$row['ahli_id'];
			$this->ahli_name[$i]=$row['ahli_name'];
			$this->ahli_short[$i]=$row['ahli_short'];
			if($_COOKIE['lang']=='mal'){
			$this->ahli_alt[$i]=$row['ahli_name'];
			}
			else{
			$this->ahli_alt[$i]=$row['ahli_name_english'];
			}
			
			$i++;		
		}	
	}
	function viewmukabumi($var)
	{
		$con = connect();
		$q ="select * from muka_bumi order by mb_name";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$this->total = $res_total; 
		$i = 0;
		while($row=mysql_fetch_array($r))
		{
			$this->mb_id[$i]=$row['mb_id'];
			$this->mb_name[$i]=$row['mb_name'];
			$i++;		
		}	
	}
	
	function viewsteril($var)
	{
		$con = connect();
		$q ="select * from steril order by nama";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$this->total = $res_total; 
		$i = 0;
		while($row=mysql_fetch_array($r))
		{
			$this->nama[$i]=$row['nama'];
			$i++;		
		}	
	}
	function viewlokasi($var)
	{
		$con = connect();
		$q ="select * from lokasi order by lokasi_name";
		$r = mysql_query($q,$con);
		$res_total = mysql_num_rows($r);
		$this->total = $res_total; 
		$i = 0;
		while($row=mysql_fetch_array($r))
		{
			$this->lokasi_id[$i]=$row['lokasi_id'];
			$this->lokasi_name[$i]=$row['lokasi_name'];
			$i++;		
		}	
	}
	
}
?>