<?php //inclclude('../Connections/connection.class.php');
class daerah
{
	function  __construct($type,$var)
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
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$this->total = $res_total;
		$i = 0;
		while($row=mysqli_fetch_array($r))
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
		$r = mysqli_query($con,$q);

		$res_total = mysqli_num_rows($r);
		$this->total = $res_total;
		$i = 0;
		while($row=mysqli_fetch_array($r))
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
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$row=mysqli_fetch_array($r);
		$nama = strtoupper($row['nama']);
		return $nama;
	}



}
?>
