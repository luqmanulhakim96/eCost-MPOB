<?php

/*
 *  Filename: class/mill_class.php
 *  Copyright 2010 Malaysia Palm Oil Board
 * 	Last update: 15.10.2010 11:46:16 am
 * 	2010-10-15 Fadli Saad  <fadlisaad@gmail.com> modified code to check progress
 */

class user {

    function  __construct($type, $var) {
        if ($type == 'mill') {
            $this->viewmill($var);
        } else if ($type == 'bts') {
            $this->viewbts($var);
        } else if ($type == 'pemprosesan') {
            $this->viewpemprosesan($var);
        } else if ($type == 'koslain') {
            $this->viewkoslain($var);
        } else if ($type == 'buruh') {
            $this->viewburuh($var);
        } else if ($type == 'ekilang') {
            $this->viewekilang($var);
        } else if ($type == 'video') {
            $this->viewvideo($var);
        } else if ($type == 'koskomponen') {
            $this->viewkoskomponen($var);
        } else if ($type == 'warga') {
            $this->viewwargawhere($var);
        }
    }

    //========================================

    function viewwargatotal($var) {
        $con = connect();
        $q = "select sum(value) as value from warga_mill where jenis ='" . $var[0] . "' and lesen ='" . $var[1] . "' and tahun='" . $var[2] . "' ";
        $r = mysqli_query($con, $q);
        $row = mysqli_fetch_array($r);
        $nilai = $row['value'];
        if ($nilai == NULL) {
            $nilai = 0;
        }
        return $nilai;
    }

    function viewwargawhere($var) {
        $con = connect();
        $q = "select * from warga_mill where jenis ='" . $var[0] . "' and lesen ='" . $var[1] . "' and tahun='" . $var[2] . "' and warga ='" . $var[3] . "' ";
        $r = mysqli_query($con,$q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $row = mysqli_fetch_array($r);
        $nilai = $row['value'];
        if ($res_total == 0) {
            $nilai = 0;
        }
        return $nilai;
    }

    function viewmill($var) {
        $con = connect();
        $q = "select lm.firsttime, "
                . "lm.success, "
                . "lm.fail, "
                . "lm.password, "
                . "eak.lesen, "
                . "eak.nama, "
                . "eak.alamat1, "
                . "eak.alamat2, "
                . "eak.alamat3, "
                . "eak.alamatsurat1, "
                . "eak.alamatsurat2, "
                . "eak.alamatsurat3, "
                . "eak.notel, "
                . "eak.nofax, "
                . "eak.email, "
                . "eak.pegawai, "
                . "eak.jpg, "
                . "eak.kategori, "
                . "mi.syarikat, "
                . "mi.integrasi, "
                . "mi.teknologi, "
                . "mi.tahun_operasi, "
                . "mi.lesenlama, "
                . "mi.syarikatinduk, "
                . "mi.daerahpremis, "
                . "mi.negeripremis, "
                . "mi.kapasiti, "
                . "lm.firsttime "
                . "from alamat_ekilang eak, "
                . "login_mill lm, "
                . "mill_info mi "
                . "where "
                . "eak.lesen = '$var' "
                . "and lm.lesen='$var' "
                . "and mi.lesen='$var'";
        $r = mysqli_query($con,$q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->nama = $row['nama'];
            $this->alamat1 = $row['alamat1'];
            $this->alamat2 = $row['alamat2'];
            $this->alamat3 = $row['alamat3'];
            $this->alamatsurat1 = $row['alamatsurat1'];
            $this->alamatsurat2 = $row['alamatsurat2'];
            $this->alamatsurat3 = $row['alamatsurat3'];
            $this->notel = $row['notel'];
            $this->nofax = $row['nofax'];
            $this->email = $row['email'];
            $this->pegawai = $row['pegawai'];
            $this->jpg = $row['jpg'];
            $this->kategori = $row['kategori'];
            $this->tahun_operasi = $row['tahun_operasi'];
            $this->syarikat = $row['syarikat'];
            $this->integrasi = $row['integrasi'];
            $this->teknologi = $row['teknologi'];
            $this->tahun_operasi = $row['tahun_operasi'];
            $this->password = $row['password'];
            $this->success = $row['success'];
            $this->fail = $row['fail'];
            $this->lesenlama = $row['lesenlama'];
            $this->syarikatinduk = $row['syarikatinduk'];
            $this->daerahpremis = $row['daerahpremis'];
            $this->negeripremis = $row['negeripremis'];
            $this->kapasiti = $row['kapasiti'];
            $this->firsttime = $row['firsttime'];

            $i++;
        }
    }

    //========================================
    function viewbts($var) {
        $con = connect();
        $q = "select NO_LESEN, NEGERI, SYARIKAT_INDUK, SUM(FFB_PROSES) as fbb_proses, count(BULAN)as bulan from ekilang where NO_LESEN = '" . $var[0] . "' and tahun = '" . $var[1] . "' group by NO_LESEN";
        $r = mysqli_query($con,$q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['NO_LESEN'];
            $this->negeri = $row['NEGERI'];
            $this->syarikatinduk = $row['SYARIKAT_INDUK'];
            $this->fbb_proses = $row['fbb_proses'];
            $this->bulan = $row['bulan'];
            $this->bts = ($row['fbb_proses'] / $row['bulan']);
            $i++;
        }
    }

//========================================
    function viewpemprosesan($var) {
        $con = connect();
        $q = "select * from mill_pemprosesan where lesen = '" . $var[0] . "' and tahun = '" . $var[1] . "'";

        $r = mysqli_query($con,$q );
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->tahun = $row['tahun'];
            $this->kp_1 = $row['kp_1'];
            $this->kp_2 = $row['kp_2'];
            $this->kp_3 = $row['kp_3'];
            $this->kp_4 = $row['kp_4'];
            $this->kp_5 = $row['kp_5'];
            $this->kp_6 = $row['kp_6'];
            $this->kp_7 = $row['kp_7'];
            $this->kp_8 = $row['kp_8'];
            $this->kp_9 = $row['kp_9'];
            $this->kp_10 = $row['kp_10'];
            $this->kp_11 = $row['kp_11'];
            $this->kp_12 = $row['kp_12'];
            $this->kp_13 = $row['kp_13'];
            $this->kp_14 = $row['kp_14'];
            $this->kp_15 = $row['kp_15'];
            $this->total_kp = $row['total_kp'];
            $this->status = $row['status'];

            $i++;
        }
    }

    //========================================
    function viewkoslain($var) {
        $con = connect();
        $q = "select * from mill_kos_lain where lesen = '" . $var[0] . "' and tahun = '" . $var[1] . "'";
        $r = mysqli_query($con,$q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->tahun = $row['tahun'];
            $this->kl_1 = $row['kl_1'];
            $this->kl_2 = $row['kl_2'];
            $this->kl_3 = $row['kl_3'];
            $this->kl_4 = $row['kl_4'];
            $this->kl_5 = $row['kl_5'];
            $this->total_kl = $row['total_kl'];
            $this->status = $row['status'];

            $i++;
        }
    }

    //========================================
    function viewburuh($var) {
        $con = connect();
        $q = "select * from mill_buruh where lesen = '" . $var[0] . "' and tahun = '" . $var[1] . "'";
        $r = mysqli_query($con,$q );
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['lesen'];
            $this->tahun = $row['tahun'];
            $this->mb_1 = $row['mb_1'];
            $this->mb_2 = $row['mb_2'];
            $this->mb_3 = $row['mb_3'];
            $this->mb_4 = $row['mb_4'];
            $this->mb_5 = $row['mb_5'];
            $this->total_mb = $row['total_mb'];
            $this->mb_1b = $row['mb_1b'];
            $this->mb_2b = $row['mb_2b'];
            $this->mb_3b = $row['mb_3b'];
            $this->mb_4b = $row['mb_4b'];
            $this->mb_5b = $row['mb_5b'];
            $this->total_mb_b = $row['total_mb_b'];
            $this->mb_1c = $row['mb_1c'];
            $this->mb_2c = $row['mb_2c'];
            $this->mb_3c = $row['mb_3c'];
            $this->mb_4c = $row['mb_4c'];
            $this->mb_5c = $row['mb_5c'];
            $this->total_mb_c = $row['total_mb_c'];
            $this->status = $row['status'];

            $i++;
        }
    }

    //========================================
    function viewekilang($var) {
        $con = connect();
        $q = "select NO_LESEN, "
                . "NEGERI, "
                . "SYARIKAT_INDUK,"
                . "ekilang.NAMA_KILANG "
                . "from ekilang where NO_LESEN = '" . $var . "' group by NO_LESEN";
        $r = mysqli_query($con,$q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->lesen = $row['NO_LESEN'];
            $this->negeri = $row['NEGERI'];
            $this->syarikatinduk = $row['SYARIKAT_INDUK'];
            $this->namakilang = $row['NAMA_KILANG'];
            $i++;
        }
    }

    //========================================
    function viewvideo() {
        $con = connect();
        $q = "select * from video where status=1";
        $r = mysqli_query($con,$q );
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
        $r = mysqli_query($con,$q);
        $res_total = mysqli_num_rows($r);
        $this->total = $res_total;
        $i = 0;
        while ($row = mysqli_fetch_array($r)) {
            $this->title[$i] = $row['title'];
            $this->description[$i] = $row['description'];
            $i++;
        }
    }

}

?>
