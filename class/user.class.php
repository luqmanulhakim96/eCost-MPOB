<?php

class user {
    function  __construct($type, $var) {
        if ($type == 'estate') {
            $this->viewestate($var);
        } else if ($type == 'esub') {
            $this->viewesub($var);
        } else if ($type == 'age_profile') {
            $this->viewage($var);
        } else if ($type == 'kos_belum_matang') {
            $this->viewkosbelummatang($var);
        } else if ($type == 'penanaman_baru') {
            $this->viewpenanamanbaru($var);
        } else if ($type == 'keluasan') {
            $this->viewkeluasan($var);
        } else if ($type == 'survey') {
            $this->viewsurvey($var);
        } else if ($type == 'matang_penjagaan') {
            $this->viewmatang_penjagaan($var);
        } else if ($type == 'matang_penuaian') {
            $this->viewmatang_penuaian($var);
        } else if ($type == 'matang_pengangkutan') {
            $this->viewmatang_pengangkutan($var);
        } else if ($type == 'belanja_am') {
            $this->viewbelanja_am($var);
        } else if ($type == 'belanja_am_var') {
            $this->viewbelanja_am_var($var);
        } else if ($type == 'kos') {
            $this->viewkos($var);
        } else if ($type == 'bts') {
            $this->viewbts($var);
        } else if ($type == 'range_kos') {
            $this->viewrange_kos($var);
        } else if ($type == 'buruh') {
            $this->viewburuh($var);
        } else if ($type == 'tanaman') {
            $this->viewtanaman($var);
        } else if ($type == 'video') {
            $this->viewvideo($var);
        } else if ($type == 'file') {
            $this->viewfile($var);
        } else if ($type == 'koskomponen') {
            $this->viewkoskomponen($var);
        } else if ($type == 'warga') {
            $this->viewwargawhere($var);
        } else if ($type == 'jentera_estate') {
            $this->viewjenteraestate($var);
        } else if ($type == 'period') {
            $this->viewperiod($var);
        } else if ($type == 'period_open') {
            $this->viewperiodopen($var);
        }
    }

    //========================================
    function viewestate($var) {
        if (isset($_SESSION['tahun'])) {
            if (date('Y') == $_SESSION['tahun']) {
                $table = "esub";
            } else {
                $table = "esub_" . $_SESSION['tahun'];
            }
        } elseif (isset($_COOKIE['tahun_report'])) {
            if (date('Y') == $_COOKIE['tahun_report']) {
                $table = "esub";
            } else {
                $table = "esub_" . $_COOKIE['tahun_report'];
            }
        }
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

        $r = mysqli_query($con, $q);
        $res_total = 0;
        if ($r) {
            $res_total = mysqli_num_rows($r);
        }
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
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

    //========================================
    function viewesub($var) {
        if (date('Y') == $_SESSION['tahun']) {
            $table = "esub";
        } else {
            $table = "esub_" . $_SESSION['tahun'];
        }

        $con = connect();
        $q = "select * from $table where no_lesen_baru ='$var'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['No_Lesen_Baru'];
            $this->jumlahluas = $row['Jumlah'];
            $this->jumlahluasterakhir = $row['Keluasan_Yang_Dituai'];
            $i++;
        }
    }

    //========================================
    function viewage($var) {
        $con = connect();
        $q = "select * from age_profile where lesen ='$var' order by tahun_tanam";
        $r = mysqli_query( $con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen[$i] = $row['lesen'];
            $this->umur_pokok[$i] = $row['umur_pokok'];
            $this->tahun_tanam[$i] = $row['tahun_tanam'];
            $this->keluasan[$i] = $row['keluasan'];

            $this->totalKeluasan += $this->keluasan[$i];
            $i++;
        }
    }

    //========================================
    function viewkosbelummatang($var) {
        $con = connect();

        $q = "select * from kos_belum_matang where lesen ='" . $var[0] . "' and tahun ='" . $var[1] . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen[$i] = $row['lesen'];
            $this->tahun[$i] = $row['tahun'];
            $this->no_item[$i] = $row['no_item'];
            $this->jumlah[$i] = $row['jumlah'];
            $this->status[$i] = $row['status'];
            $i++;
        }
    }

    //========================================
    function viewpenanamanbaru($var) {
        $con = connect();
        $q = "select * from kos_belum_matang where lesen ='" . $var[0] . "' and pb_thisyear ='" . $var[1] . "' and pb_tahun ='" . $var[2] . "' and pb_type='" . $var[3] . "' ";

        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->pb_tahun = $row['pb_tahun'];
            $this->pb_thisyear = $row['pb_thisyear'];
            $this->lesen = $row['lesen'];
            $this->pb_type = $row['pb_type'];
            $this->a_1 = $row['a_1'];
            $this->a_2 = $row['a_2'];
            $this->a_3 = $row['a_3'];
            $this->a_4 = $row['a_4'];
            $this->a_5 = $row['a_5'];
            $this->a_6 = $row['a_6'];
            $this->a_7 = $row['a_7'];
            $this->a_8 = $row['a_8'];
            $this->a_9 = $row['a_9'];
            $this->a_10 = $row['a_10'];
            $this->a_11 = $row['a_11'];
            $this->total_a = $row['total_a'];
            $this->b_1a = $row['b_1a'];
            $this->b_1b = $row['b_1b'];
            $this->b_1c = $row['b_1c'];
            $this->total_b_1 = $row['total_b_1'];
            $this->total_b_2 = $row['total_b_2'];
            $this->b_3a = $row['b_3a'];
            $this->b_3b = $row['b_3b'];
            $this->b_3c = $row['b_3c'];
            $this->b_3d = $row['b_3d'];
            $this->total_b_3 = $row['total_b_3'];
            $this->total_b_4 = $row['total_b_4'];
            $this->total_b_5 = $row['total_b_5'];
            $this->total_b_6 = $row['total_b_6'];
            $this->total_b_7 = $row['total_b_7'];
            $this->total_b_8 = $row['total_b_8'];
            $this->total_b_9 = $row['total_b_9'];
            $this->total_b_10 = $row['total_b_10'];
            $this->total_b_11 = $row['total_b_11'];
            $this->total_b_12 = $row['total_b_12'];
            $this->total_b_13 = $row['total_b_13'];
            $this->total_b_14 = $row['total_b_14'];
            $this->total_b = $row['total_b'];
            $this->status = $row['status'];

            $i++;
        }
    }

    //========================================
    function viewkeluasan($var) {
        $con = connect();
        if (date('Y') == $_SESSION['tahun']) {
            $table = "esub";
        } else {
            $table = "esub_" . $_SESSION['tahun'];
        }

        $q = "select * from $table where no_lesen_baru ='" . $var . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['No_Lesen_Baru'];
            $this->jumlah = $row['Jumlah'];
            $this->jumlah_belum_berhasil = $row['Belum_Berhasil'];
            $i++;
        }
    }

    //========================================
    function viewsurvey($var) {
        $con = connect();

        $q = "select * from " . $var[2] . " where lesen ='" . $var[0] . "' and pb_thisyear ='" . $var[1] . "'   ";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
    }

    //========================================
    function viewmatang_penjagaan($var) {
        $con = connect();

        $q = "select * from kos_matang_penjagaan where lesen ='" . $var[0] . "' and pb_thisyear='" . $var[1] . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->tahun = $row['pb_thisyear'];
            $this->b_1a = $row['b_1a'];
            $this->b_1b = $row['b_1b'];
            $this->b_1c = $row['b_1c'];
            $this->total_b_1 = $row['total_b_1'];
            $this->total_b_2 = $row['total_b_2'];
            $this->b_3a = $row['b_3a'];
            $this->b_3b = $row['b_3b'];
            $this->b_3c = $row['b_3c'];
            $this->b_3d = $row['b_3d'];
            $this->total_b_3 = $row['total_b_3'];
            $this->total_b_4 = $row['total_b_4'];
            $this->total_b_5 = $row['total_b_5'];
            $this->total_b_6 = $row['total_b_6'];
            $this->total_b_7 = $row['total_b_7'];
            $this->total_b_8 = $row['total_b_8'];
            $this->total_b_9 = $row['total_b_9'];
            $this->total_b_10 = $row['total_b_10'];
            $this->total_b_11 = $row['total_b_11'];
            $this->total_b_12 = $row['total_b_12'];
            $this->total_b = $row['total_b'];
            $this->status = $row['status'];
            $i++;
        }
    }

    //========================================
    function viewmatang_penuaian($var) {
        $con = connect();

        $q = "select * from kos_matang_penuaian where lesen ='" . $var[0] . "' and pb_thisyear='" . $var[1] . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->tahun = $row['pb_thisyear'];
            $this->a_1 = $row['a_1'];
            $this->a_2 = $row['a_2'];
            $this->a_3 = $row['a_3'];
            $this->a_4 = $row['a_4'];
            $this->total_b = $row['total_b'];
            $this->status = $row['status'];

            $i++;
        }
    }

    //========================================
    function viewmatang_pengangkutan($var) {
        $con = connect();

        $q = "select * from kos_matang_pengangkutan where lesen ='" . $var[0] . "' and pb_thisyear='" . $var[1] . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->tahun = $row['pb_thisyear'];
            $this->a_1 = $row['a_1'];
            $this->a_2 = $row['a_2'];
            $this->a_3 = $row['a_3'];
            $this->total_a = $row['total_a'];
            $this->b_1a = $row['b_1a'];
            $this->b_1b = $row['b_1b'];
            $this->b_1c = $row['b_1c'];
            $this->total_b_1 = $row['total_b_1'];
            $this->total_b_2 = $row['total_b_2'];
            $this->total_b = $row['total_b'];
            $this->status = $row['status'];

            $i++;
        }
    }

    //========================================
    function viewbelanja_am($var) {
        $con = connect();

        $q = "select * from belanja_am_kos where lesen ='" . $var[0] . "' and thisyear='" . $var[1] . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->tahun = $row['pb_thisyear'];
            $this->emolumen = $row['emolumen'];
            $this->kos_ibupejabat = $row['kos_ibupejabat'];
            $this->kos_agensi = $row['kos_agensi'];
            $this->kebajikan = $row['kebajikan'];
            $this->sewa_tol = $row['sewa_tol'];
            $this->penyelidikan = $row['penyelidikan'];
            $this->perubatan = $row['perubatan'];
            $this->penyelenggaraan = $row['penyelenggaraan'];
            $this->cukai_keuntungan = $row['cukai_keuntungan'];
            $this->penjagaan = $row['penjagaan'];
            $this->kawalan = $row['kawalan'];
            $this->air_tenaga = $row['air_tenaga'];
            $this->perbelanjaan_pejabat = $row['perbelanjaan_pejabat'];
            $this->susut_nilai = $row['susut_nilai'];
            $this->perbelanjaan_lain = $row['perbelanjaan_lain'];
            $this->total_perbelanjaan = $row['total_perbelanjaan'];

            $total_all = $row['emolumen'] +
                    $row['kos_ibupejabat'] +
                    $row['kos_agensi'] +
                    $row['kebajikan'] +
                    $row['sewa_tol'] +
                    $row['penyelidikan'] +
                    $row['perubatan'] +
                    $row['penyelenggaraan'] +
                    $row['cukai_keuntungan'] +
                    $row['penjagaan'] +
                    $row['kawalan'] +
                    $row['air_tenaga'] +
                    $row['perbelanjaan_pejabat'] +
                    $row['susut_nilai'] +
                    $row['perbelanjaan_lain'];


            $q = "update belanja_am_kos set total_perbelanjaan ='$total_all'   where lesen ='" . $var[0] . "' and thisyear='" . $var[1] . "'";
            $r = mysqli_query($con, $q);

            $i++;
        }
    }

    //========================================
    function viewbelanja_am_var($var) {
        $con = connect();

        $q = "select * from belanja_am_var where lesen ='" . $var[0] . "' and thisyear='" . $var[1] . "' and type ='" . $var[2] . "' and subtype='" . $var[3] . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->thisyear = $row['thisyear'];
            $this->type = $row['type'];
            $this->kos = $row['kos'];
            $this->subtype = $row['subtype'];

            $i++;
        }
    }

    //========================================
    function viewkos($var) {
        $con = connect();
        $q = "select sum(total_a) as jumlah_a, sum(total_b) as jumlah_b from kos_belum_matang where lesen ='" . $var[0] . "' and pb_thisyear = '" . $var[1] . "' and pb_tahun='" . $var[2] . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->jumlah_tak_berulang = $row['jumlah_a'];
            $this->jumlah_penjagaan = $row['jumlah_b'];
            $this->jumlah_all = $row['jumlah_a'] + $row['jumlah_b'];
            $i++;
        }
    }

    //========================================
    function viewbts($var) {
        $con = connect();
        $tahunfbb = $_SESSION['tahun'];

        if ($_SESSION['tahun'] == date('Y')) {
            $q = "select * from fbb_production where lesen ='" . $var . "'";
        } else {
            if ($tahunfbb < 2012) {
                $vari = substr($var, 0, -1);
            } else {
                $vari = $var;
            }

            $q = "select * from fbb_production$tahunfbb where lesen ='" . $vari . "'";
        }

        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->bil = $row['bil'];
            $this->nama = $row['nama'];
            $this->negeri = $row['negeri'];
            $this->daerah = $row['daerah'];
            $this->jumlah_pengeluaran = $row['jumlah_pengeluaran'];
            $this->purata_hasil_buah = $row['purata_hasil_buah'];
            $i++;
        }
    }

    //========================================
    function viewrange_kos($var) {
        $con = connect();
        $q = "select * from ringkasan_kos where type ='" . $var[1] . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        while ($row = mysqli_fetch_array($r)) {
            $this->type = $row['type'];
            $this->minimum = $row['minimum'];
            $this->maximum = $row['maximum'];
            if ($var[0] >= $this->minimum && $var[0] <= $this->maximum) {
                $this->status = "Y";
            } else {
                $this->status = "X";
            }
        }
    }

    //========================================
    function viewburuh($var) {
        $con = connect();
        $q = "select * from buruh where lesen = '" . $var[0] . "' and tahun ='" . $var[1] . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->tahun = $row['tahun'];
            $this->mandur_penuai_tempatan = $row['mandur_penuai_tempatan'];
            $this->mandur_am_tempatan = $row['mandur_am_tempatan'];
            $this->jumlah_mandur_tempatan = $row['jumlah_mandur_tempatan'];
            $this->mandur_penuai_asing = $row['mandur_penuai_asing'];
            $this->mandur_am_asing = $row['mandur_am_asing'];
            $this->jumlah_mandur_asing = $row['jumlah_mandur_asing'];
            $this->kekurangan_mandur_estet = $row['kekurangan_mandur_estet'];
            $this->mandur_penuai_k_tempatan = $row['mandur_penuai_k_tempatan'];
            $this->mandur_am_k_tempatan = $row['mandur_am_k_tempatan'];
            $this->jumlah_mandur_k_tempatan = $row['jumlah_mandur_k_tempatan'];
            $this->mandur_penuai_k_asing = $row['mandur_penuai_k_asing'];
            $this->mandur_am_k_asing = $row['mandur_am_k_asing'];
            $this->jumlah_mandur_k_asing = $row['jumlah_mandur_k_asing'];
            $this->kekurangan_mandur_kontraktor = $row['kekurangan_mandur_kontraktor'];
            $this->pekerja_estet_tempatan = $row['pekerja_estet_tempatan'];
            $this->pekerja_am_tempatan = $row['pekerja_am_tempatan'];
            $this->jumlah_pekerja_tempatan = $row['jumlah_pekerja_tempatan'];
            $this->pekerja_estet_asing = $row['pekerja_estet_asing'];
            $this->pekerja_am_asing = $row['pekerja_am_asing'];
            $this->jumlah_pekerja_asing = $row['jumlah_pekerja_asing'];
            $this->kekurangan_pekerja_estet = $row['kekurangan_pekerja_estet'];
            $this->pekerja_estet_k_tempatan = $row['pekerja_estet_k_tempatan'];
            $this->pekerja_am_k_tempatan = $row['pekerja_am_k_tempatan'];
            $this->jumlah_pekerja_k_tempatan = $row['jumlah_pekerja_k_tempatan'];
            $this->pekerja_estet_k_asing = $row['pekerja_estet_k_asing'];
            $this->pekerja_am_k_asing = $row['pekerja_am_k_asing'];
            $this->jumlah_pekerja_k_asing = $row['jumlah_pekerja_k_asing'];
            $this->kekurangan_pekerja_kontraktor = $row['kekurangan_pekerja_kontraktor'];
            $this->eksekutif_tempatan = $row['eksekutif_tempatan'];
            $this->kakitangan_tempatan = $row['kakitangan_tempatan'];
            $this->jumlah_kakitangan_tempatan = $row['jumlah_kakitangan_tempatan'];
            $this->eksekutif_asing = $row['eksekutif_asing'];
            $this->kakitangan_asing = $row['kakitangan_asing'];
            $this->jumlah_kakitangan_asing = $row['jumlah_kakitangan_asing'];
            $this->kekurangan_eksekutif = $row['kekurangan_eksekutif'];
            $this->eksekutif_k_tempatan = $row['eksekutif_k_tempatan'];
            $this->kakitangan_k_tempatan = $row['kakitangan_k_tempatan'];
            $this->jumlah_kakitangan_k_tempatan = $row['jumlah_kakitangan_k_tempatan'];
            $this->eksekutif_k_asing = $row['eksekutif_k_asing'];
            $this->kakitangan_k_asing = $row['kakitangan_k_asing'];
            $this->jumlah_kakitangan_k_asing = $row['jumlah_kakitangan_k_asing'];
            $this->kekurangan_kakitangan_kontraktor = $row['kekurangan_kakitangan_kontraktor'];
            $this->penuai_tempatan = $row['penuai_tempatan'];
            $this->penuai_asing = $row['penuai_asing'];
            $this->penuai_tempatan_kontraktor = $row['penuai_tempatan_kontraktor'];
            $this->penuai_asing_kontraktor = $row['penuai_asing_kontraktor'];
            $this->penuai_kumpulan_tempatan = $row['penuai_kumpulan_tempatan'];
            $this->penuai_kumpulan_asing = $row['penuai_kumpulan_asing'];
            $this->penuai_kumpulan_tempatan_kontraktor = $row['penuai_kumpulan_tempatan_kontraktor'];
            $this->penuai_kumpulan_asing_kontraktor = $row['penuai_kumpulan_asing_kontraktor'];
            $this->pemungut_bts_tempatan = $row['pemungut_bts_tempatan'];
            $this->pemungut_bts_asing = $row['pemungut_bts_asing'];
            $this->pemungut_bts_tempatan_kontraktor = $row['pemungut_bts_tempatan_kontraktor'];
            $this->pemungut_bts_asing_kontraktor = $row['pemungut_bts_asing_kontraktor'];
            $this->pemungut_buahrelai_tempatan = $row['pemungut_buahrelai_tempatan'];
            $this->pemungut_buahrelai_asing = $row['pemungut_buahrelai_asing'];
            $this->pemungut_buahrelai_tempatan_kontraktor = $row['pemungut_buahrelai_tempatan_kontraktor'];
            $this->pemungut_buahrelai_asing_kontraktor = $row['pemungut_buahrelai_asing_kontraktor'];
            $this->jumlah_tempatan = $row['jumlah_tempatan'];
            $this->jumlah_asing = $row['jumlah_asing'];
            $this->jumlah_tempatan_kontraktor = $row['jumlah_tempatan_kontraktor'];
            $this->jumlah_asing_kontraktor = $row['jumlah_asing_kontraktor'];
            $this->jumlahkumpulan_tempatan = $row['jumlahkumpulan_tempatan'];
            $this->jumlahkumpulan_asing = $row['jumlahkumpulan_asing'];
            $this->jumlahkumpulan_tempatan_kontraktor = $row['jumlahkumpulan_tempatan_kontraktor'];
            $this->jumlahkumpulan_asing_kontraktor = $row['jumlahkumpulan_asing_kontraktor'];
            $this->kekurangan_penuai_estet = $row['kekurangan_penuai_estet'];
            $this->kekurangan_penuai_kontraktor = $row['kekurangan_penuai_kontraktor'];
        }
    }

    //========================================
    function viewtanaman($var) {
        $con = connect();
        $q = "select * from " . $var[1] . " where lesen = '" . $var[0] . "'";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
        }
    }

    //========================================
    function viewvideo() {
        $con = connect();
        $q = "select * from video where status=1";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        while ($row = mysqli_fetch_array($r)) {
            $this->id = $row['id'];
            $this->path = $row['path'];
            $this->title = $row['title'];
            $this->status = $row['status'];
        }
    }

    //========================================
    function viewfile() {
        $con = connect();
        $q = "select * from file_upload";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        while ($row = mysqli_fetch_array($r)) {
            $this->id = $row['id'];
            $this->path = $row['path'];
            $this->title = $row['title'];
            $this->status = $row['status'];
        }
    }

    //========================================
    function viewkoskomponen() {
        $con = connect();
        $q = "select * from var_costcomponent order by title";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        while ($row = mysqli_fetch_array($r)) {
            $this->title[$i] = $row['title'];
            $this->description[$i] = $row['description'];
            $i++;
        }
    }

    //========================================
    function viewwargawhere($var) {
        $con = connect();
        $q = "select * from warga_estate where jenis ='" . $var[0] . "' and lesen ='" . $var[1] . "' and tahun='" . $var[2] . "' and warga ='" . $var[3] . "' ";
        $r = mysqli_query($con, $q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $row = mysqli_fetch_array($r);
        $nilai = $row['value'];
        if ($res_total == 0) {
            $nilai = 0;
        }
        return $nilai;
    }

    //========================================
    function viewwargatotal($var) {
        $con = connect();
        $q = "select sum(value) as value from warga_estate where jenis ='" . $var[0] . "' and lesen ='" . $var[1] . "' and tahun='" . $var[2] . "' ";
        $r = mysqli_query($con, $q);
        $row = mysqli_fetch_array($r);
        $nilai = $row['value'];
        if ($nilai == NULL) {
            $nilai = 0;
        }
        return $nilai;
    }

    //========================================
    function viewjentera($var) {
        $con = connect();
        $q = "select nama_jentera from jentera where id_jentera ='$var' ";
        $r = mysqli_query($con, $q);
        $row = mysqli_fetch_array($r);
        return $row['nama_jentera'];
    }

    function viewtotaljentera($var) {
        $con = connect();
        $q = "select count(id_jentera) as jumlah from jentera where kategori_jentera ='$var' ";
        $r = mysqli_query($con, $q);
        $row = mysqli_fetch_array($r);
        return $row['jumlah'];
    }

    //------------------------------------------------
    function viewjenteraestate($var) {
        $con = connect();
        $q = "select * from estate_jentera where tahun ='" . $var[1] . "' and lesen = '" . $var[0] . "' and type = '" . $var[2] . "' order by id_jentera";
        $r = mysqli_query($con, $q);
        $this->total = mysqli_num_rows($r);
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->id_jentera[$i] = $row['id_jentera'];
            $this->lesen[$i] = $row['lesen'];
            $this->tahun[$i] = $row['tahun'];
            $this->value[$i] = $row['value'];
            $this->percent[$i] = $row['percent'];
            $this->nama_jentera[$i] = $row['nama_jentera'];
            $this->type[$i] = $row['type'];
            $i++;
        }
    }

    //========================================
    function viewperiod($var) {
        $con = connect();

        $q = "select * from period_survey where st_id ='$var'";
        // $r = mysqli_query($con, $q);
        $r = mysqli_query($con, $q);

        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        while ($row = mysqli_fetch_array($r)) {
            $this->st_id = $row['st_id'];
            $this->st_status = $row['st_status'];
            $this->st_date = $row['st_date'];
        }
    }

    function viewperiodopen($var) {
        $con = connect();
        // $con=connect($this->host,$this->user,$this->pass);

        $q = "select * from period_survey where st_status='Open' and st_id ='" . $var[0] . "'";
        // $r = mysqli_query($con, $q);
        $r = mysqli_query($con, $q);

        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        while ($row = mysqli_fetch_array($r)) {
            $this->st_id = $row['st_id'];
            $this->st_status = $row['st_status'];
            $this->st_date = $row['st_date'];
        }
    }

    //========================================
}

?>
