<?php
class estate
{
	function  __construct($var)
	{
	if($type=='estate')
		{
		echo $var;
		$this->viewestate($var);}
	}
	//========================================
	function viewestate($var)
	{
		if(isset($_SESSION['tahun'])){
			if($_SESSION['tahun'] == date('Y')){
				$table = 'esub';
			}
			else{
				$table="esub_".$_SESSION['tahun'];
			}
		}elseif(isset($_COOKIE['tahun_report'])){
			if($_COOKIE['tahun_report'] == date('Y')){
				$table = 'esub';
			}
			else{
				$table="esub_".$_COOKIE['tahun_report'];
			}
		}


		$con = connect();
		echo $q ="select * from $table where es.no_lesen_baru = '$var' group by es.no_lesen_baru";
		$r = mysqli_query($con,$q);
		$res_total = mysqli_num_rows($r);
		$this->total = $res_total;
		$i = 0;
		while($row=mysqli_fetch_array($r))
		{
			$this->nolesenlama=$row['No_Lesen'];
			$this->namaestet=$row['Nama_Estet'];
			$this->password=$row['password'];
			$this->jumlahluas=$row['Jumlah'];
			$this->nolesen=$row['No_Lesen_Baru'];
			$this->alamat1=$row['Alamat1'];
			$this->alamat2=$row['Alamat2'];
			$this->poskod=$row['Poskod'];
			$this->bandar=$row['Bandar'];
			$this->negeri=$row['Negeri'];
			$this->notelefon=$row['No_Telepon'];
			$this->nofax=$row['No_Fax'];
			$this->email=$row['Emel'];
			$this->negeripremis=$row['Negeri_Premis'];
			$this->daerahpremis=$row['Daerah_Premis'];
			$this->syarikatinduk=$row['Syarikat_Induk'];
			$this->berhasil=$row['Berhasil'];
			$this->belumberhasil=$row['Belum_Berhasil'];
			$this->luastuai=$row['Keluasan_Yang_Dituai'];
			$i++;
		}
	}
}
?>
