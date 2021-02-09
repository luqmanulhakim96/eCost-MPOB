<?php //include('../mysqli_connections/mysqli_connection.class.php');
class admin
{
	function  __construct($type,$var)
	{
		if($type=='workers')
		{ $this->viewworkers($var);}

		else if($type=='user')
		{ $this->viewuser($var);}

		else if($type=='workerslist')
		{ $this->viewworkerslist($var);}

		else if($type=='video')
		{ $this->viewvideo($var);}

		else if($type=='koskomponen')
		{ $this->viewkoskomponen($var);}

		else if($type=='rangekos')
		{ $this->viewrangekos($var);}

	}

	//========================================
	function viewworkers($var)
	{
		$con = connect();
		$q ="select * from warganegara where jenis = '$var' order by kod_warga";
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$this->total = $res_total;
		$i = 0;
		while($row=mysqli_fetch_array($r))
		{
			$this->kod_warga[$i]=$row['kod_warga'];
			$this->keterangan[$i]=$row['keterangan'];
			$this->jenis[$i]=$row['jenis'];
			$i++;
		}
	}
	//========================================
	function viewuser($var)
	{
		$con = connect();
		$q ="select
		la.email, la.password, la.firsttime, la.success, la.fail,
		u.u_fullname
		 from
		login_admin la, user u where la.email = '$var' and u.u_email='$var'";
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$this->total = $res_total;
		$i = 0;
		while($row=mysqli_fetch_array($r))
		{
			$this->email=$row['email'];
			$this->password=$row['password'];
			$this->firsttime=$row['firsttime'];
			$this->success=$row['success'];
			$this->fail=$row['fail'];
			$this->name=$row['u_fullname'];
			$i++;
		}
	}
	//========================================
	function viewworkerslist($var)
	{
		$con = connect();
		$q ="select * from warganegara where kod_warga='$var'";
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$this->total = $res_total;
		$i = 0;
		while($row=mysqli_fetch_array($r))
		{
			$this->kod_warga=$row['kod_warga'];
			$this->keterangan=$row['keterangan'];
			$this->jenis=$row['jenis'];
			$i++;
		}
	}
	//========================================
	function viewvideo($var)
	{
		$con = connect();
		$q ="select * from video where status=1";
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$this->total = $res_total;
		$i = 0;
		while($row=mysqli_fetch_array($r))
		{
			$this->id=$row['id'];
			$this->path=$row['path'];
			$this->title=$row['title'];
			$this->status=$row['status'];
		}
	}
		//========================================
	function viewkoskomponen($var)
	{
		$con = connect();
		$q ="select * from var_costcomponent order by title";
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$this->total = $res_total;
		$i = 0;
		while($row=mysqli_fetch_array($r))
		{
			$this->title[$i]=$row['title'];
			$this->description[$i]=$row['description'];
			$i++;
		}
	}
	//========================================
	function viewrangekos($var)
	{
		$con = connect();
		$q ="select * from ringkasan_kos order by type";
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$this->total = $res_total;
		$i = 0;
		while($row=mysqli_fetch_array($r))
		{
			$this->type[$i]=$row['type'];
			$this->minimum[$i]=$row['minimum'];
			$this->maximum[$i]=$row['maximum'];
			$i++;
		}
	}


}
?>
