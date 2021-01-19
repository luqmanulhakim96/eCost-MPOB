<?php

class user_last_year {

    function user_last_year($type, $var, $year) {
        if ($type == 'estateTahun') {
            $this->viewestateTahun($var, $year);
        }
    }

    //========================================


    function viewestateTahun($var, $tahun) {

        $table = "esub_" . $tahun;

        $con = connect();
        $q = "select 
			es.No_Lesen, es.Jumlah, es.Nama_Estet, 	es.No_Lesen_Baru, es.Alamat1,es.Alamat2, es.Poskod, es.Bandar, es.Negeri,				es.No_Telepon, 				 	 				 	
	es.No_Fax, 				 	 				 	
	es.Emel,		 	 				 	
	es.Negeri_Premis, 				 	 				 	
	es.Daerah_Premis, 				 	 				 	
	es.Syarikat_Induk, 				 	 				 	
	es.Berhasil, 				 	 				 	
	es.Belum_Berhasil, 				 	 				 	
	es.Keluasan_Yang_Dituai,
	le.password , ei.pegawai, ei.syarikat, ei.integrasi, ei.keahlian,
	 	ei.lanar, 
		ei.pedalaman ,
		ei.gambutcetek ,
		ei.gambutdalam ,
		ei.laterit ,
		ei.asidsulfat ,
		ei.tanahpasir ,
		ei.percentrata ,
		ei.percentalun ,
		ei.percentbukit ,
		ei.percentcerun, le.success, le.fail, le.firsttime
		from 
			$table es,estate_info ei, login_estate le 
		where es.no_lesen_baru = '$var' and ei.lesen ='$var' and le.lesen='$var'  group by es.no_lesen_baru";

        $r = mysql_query($q, $con);
        $res_total = 0;
        if ($r) {
            $res_total = mysql_num_rows($r);
        }
        $this->total = $res_total;
        $i = 0;
        while ($row = mysql_fetch_array($r)) {
            $this->nolesenlama = $row['No_Lesen'];
            $this->namaestet = $row['Nama_Estet'];
            $this->password = $row['password'];
            $this->jumlahluas = $row['Berhasil'];
            $this->jumlahakhir = $row['Jumlah'];
            $this->nolesen = $row['No_Lesen_Baru'];
            $this->alamat1 = $row['Alamat1'];
            $this->alamat2 = $row['Alamat2'];
            $this->poskod = $row['Poskod'];
            $this->bandar = $row['Bandar'];
            $this->negeri = $row['Negeri'];
            $this->notelefon = $row['No_Telepon'];
            $this->nofax = $row['No_Fax'];
            $this->email = $row['Emel'];
            $this->negeripremis = $row['Negeri_Premis'];
            $this->daerahpremis = $row['Daerah_Premis'];
            $this->syarikatinduk = $row['Syarikat_Induk'];
            $this->berhasil = $row['Berhasil'];
            $this->belumberhasil = $row['Belum_Berhasil'];
            $this->luastuai = $row['Keluasan_Yang_Dituai'];
            $this->pegawai = $row['pegawai'];
            $this->jenissyarikat = $row['syarikat'];
            $this->integrasi = $row['integrasi'];
            $this->keahlian = $row['keahlian'];
            $this->lanar = $row['lanar'];
            $this->pedalaman = $row['pedalaman'];
            $this->gambutcetek = $row['gambutcetek'];
            $this->gambutdalam = $row['gambutdalam'];
            $this->laterit = $row['laterit'];
            $this->asidsulfat = $row['asidsulfat'];
            $this->tanahpasir = $row['tanahpasir'];
            $this->percentrata = $row['percentrata'];
            $this->percentalun = $row['percentalun'];
            $this->percentbukit = $row['percentbukit'];
            $this->percentcerun = $row['percentcerun'];
            $this->success = $row['success'];
            $this->fail = $row['fail'];
            $this->firsttime = $row['firsttime'];
            $i++;
        }
    }

}

?>