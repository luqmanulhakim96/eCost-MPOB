<?php include('../Connections/connection.class.php'); ?>
<?php

extract($_REQUEST);

$con = connect();
if ($type != "delete") {
    if (date('Y') == $_COOKIE['tahun_report']) {
        $table = "esub";
        $tablefbb = "fbb_production";
    } else {
        $table = "esub_" . $_COOKIE['tahun_report'];
        $tablefbb = "fbb_production" . $_COOKIE['tahun_report'];
    }

    $q_fbb = "update $tablefbb set "
            . "nama ='$fbb_nama', "
            . "negeri ='$fbb_negeri', "
            . "daerah ='$fbb_daerah', "
            . "jumlah_pengeluaran =upper('$fbb_jumlah_pengeluaran'), "
            . "purata_hasil_buah =upper('$purata_hasil_buah') "
            . "where lesen = '$lesen_singkat'";
    $r_fbb = mysql_query($q_fbb, $con);


    $q_login = "update login_estate "
            . " set password='$password', "
            . " firsttime='$firsttime', "
            . " success='$success', fail='$fail'"
            . " where lesen ='$nolesen'	";
    $r_login = mysql_query($q_login, $con);


    $q_baru = "insert into tanam_baru$tahun_baru "
            . "(nama_estet, "
            . "lesen, "
            . "negeri, "
            . "daerah, "
            . "bulan, "
            . "tanaman_baru) "
            . "values "
            . "('$nama_estet',"
            . "'$nolesen',"
            . "'$negeri_premis',"
            . "'$daerah_premis',"
            . " '$bulan_baru',"
            . " '$tanaman_baru')";
    $r_baru = mysql_query($q_baru, $con);
    $qdelete_all = "delete from tanam_baru$tahun_baru "
            . "where tanaman_baru='' ";
    $rdelete_all = mysql_query($qdelete_all, $con);

    //echo "<br>";

    $q_tukar = "insert into tanam_tukar$tahun_tukar "
            . "(nama_estet, "
            . "lesen, "
            . "negeri, "
            . "daerah, "
            . "bulan, "
            . "tanaman_tukar) "
            . "values "
            . "('$nama_estet',"
            . "'$nolesen',"
            . "'$negeri_premis',"
            . "'$daerah_premis', "
            . "'$bulan_tukar', "
            . "'$tanaman_tukar')";
    $r_tukar = mysql_query($q_tukar, $con); 
    $qdelete_all = "delete from tanam_tukar$tahun_tukar "
            . "where tanaman_tukar='' ";
    $rdelete_all = mysql_query($qdelete_all, $con);


    //echo "<br>";
    $q_semula = "insert into tanam_semula$tahun_semula (nama_estet, lesen, negeri, daerah, bulan, tanaman_semula) values ('$nama_estet','$nolesen','$negeri_premis','$daerah_premis', '$bulan_semula', '$tanaman_semula')";
    $r_semula = mysql_query($q_semula, $con);
    $qdelete_all = "delete from tanam_semula$tahun_semula where tanaman_semula='' ";
    $rdelete_all = mysql_query($qdelete_all, $con);


    $q_estateinfo = "update  $table set alamat1 = '$alamat1', alamat2 = '$alamat2', poskod ='$poskod', bandar =upper('$daerah'), negeri='$negeri', 		                    no_telepon = '$notelefon', no_fax ='$nofax', emel = '$email' where no_lesen_baru= '$nolesen'";
    $r_estateinfo = mysql_query($q_estateinfo, $con);



    $q_estatedetail = "update  estate_info set pegawai='$pegawai', syarikat ='$syarikat',integrasi = '$integrasi', keahlian='$keahlian'"
            . " where lesen = '$nolesen'";
    $r_estatedetail = mysql_query($q_estatedetail, $con);

    $qUpdateImmature = "select CONVERT(SUM(qr.val), DECIMAL(18,9)) as totalImmature from(
								select qry1.lesen, qry1.tanaman_baru as val from(
									select lesen, tanaman_baru from tanam_baru$tahun1
									union
									select lesen, tanaman_baru from tanam_baru$tahun2
									union
									select lesen, tanaman_baru from tanam_baru$tahun3
								) qry1
								
								UNION
								
								select qry2.lesen, qry2.tanaman_semula as val from(
									select lesen, tanaman_semula from tanam_semula$tahun1
									union
									select lesen, tanaman_semula from tanam_semula$tahun2
									union
									select lesen, tanaman_semula from tanam_semula$tahun3
								) qry2
								
								UNION
								
								select qry3.lesen, qry3.tanaman_tukar as val from(
									select lesen, tanaman_tukar from tanam_tukar$tahun1
									union
									select lesen, tanaman_tukar from tanam_tukar$tahun2
									union
									select lesen, tanaman_tukar from tanam_tukar$tahun3
								) qry3
							) qr
							where qr.lesen='$nolesen'";
    $imm_update = mysql_query($qUpdateImmature, $con);
    $imm_update_row = mysql_fetch_array($imm_update);

    $belum_berhasil = $imm_update_row['totalImmature'];
    $jumlah = $belum_berhasil + $keluasan;

    $q_esub = "update $table set 
										Nama_Estet ='$nama_estet',
										No_Lesen= '$no_lesen',
										Alamat1 = '$alamat1',
										Alamat2 = '$alamat2',
										Poskod = '$poskod',
										Bandar = '$bandar',
										Negeri = '$negeri',
										No_Telepon = '$notelefon',
										No_Fax ='$nofax',
										Emel ='$email',
										Negeri_Premis ='$negeri_premis',
										Daerah_Premis ='$daerah_premis',
										Syarikat_Induk ='$syarikat_induk',
										Berhasil ='$berhasil',
										Belum_Berhasil ='$belum_berhasil',
										Jumlah ='$jumlah',
										Keluasan_Yang_Dituai ='$keluasan'
										where no_lesen_baru='$nolesen'
										";
    $r_esub = mysql_query($q_esub, $con);

    echo "<script>window.location.href='view_estate_all.php?nolesen=$nolesen'</script>";
}

if ($type == "delete") {

    if (date('Y') == $_COOKIE['tahun_report']) {
        $tableesub = "esub";
        $tablefbb = "fbb_production";
    } else {
        $tableesub = "esub_" . $_COOKIE['tahun_report'];
        $tablefbb = "fbb_production" . $_COOKIE['tahun_report'];
    }

    $con = connect();
    $qdelete = "delete from $table where lesen ='$lesen' and bulan='$bulan' and $field='$luas' limit 1 ";
    $rdelete = mysql_query($qdelete, $con);

    $qdelete_all = "delete from $table where $field='' ";
    $rdelete_all = mysql_query($qdelete_all, $con);

    $qUpdateImmature = "select CONVERT(SUM(qr.val), DECIMAL(18,9)) as totalImmature from(
								select qry1.lesen, qry1.tanaman_baru as val from(
									select lesen, tanaman_baru from tanam_baru$tahun1
									union
									select lesen, tanaman_baru from tanam_baru$tahun2
									union
									select lesen, tanaman_baru from tanam_baru$tahun3
								) qry1
								
								UNION
								
								select qry2.lesen, qry2.tanaman_semula as val from(
									select lesen, tanaman_semula from tanam_semula$tahun1
									union
									select lesen, tanaman_semula from tanam_semula$tahun2
									union
									select lesen, tanaman_semula from tanam_semula$tahun3
								) qry2
								
								UNION
								
								select qry3.lesen, qry3.tanaman_tukar as val from(
									select lesen, tanaman_tukar from tanam_tukar$tahun1
									union
									select lesen, tanaman_tukar from tanam_tukar$tahun2
									union
									select lesen, tanaman_tukar from tanam_tukar$tahun3
								) qry3
							) qr
							where qr.lesen='$lesen'";
    $imm_update = mysql_query($qUpdateImmature, $con);
    $imm_update_row = mysql_fetch_array($imm_update);

    $sql = "select keluasan_yang_dituai as luas from esub where no_lesen_baru='$lesen'";
    $sqlresult = mysql_query($sql, $con);
    $keluasan = mysql_fetch_array($sqlresult);

    $belum_berhasil = $imm_update_row['totalImmature'];
    $jumlah = $belum_berhasil + $keluasan['luas'];

    $q_esub = "update $tableesub set Belum_Berhasil ='$belum_berhasil', Jumlah ='$jumlah' where no_lesen_baru='$lesen'";
    $r_esub = mysql_query($q_esub, $con);

    echo "<script>window.location.href='view_estate_all.php?nolesen=$lesen'</script>";
}
?>
