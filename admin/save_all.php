<?php include('../Connections/connection.class.php'); ?>
<?php error_reporting(0); ?>

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
    $r_fbb = mysqli_query($con, $q_fbb);
    // print_r($q_fbb);


    $q_login = "update login_estate "
            . " set password='$password', "
            . " firsttime='$firsttime', "
            . " success='$success', fail='$fail'"
            . " where lesen ='$nolesen'	";
    $r_login = mysqli_query($con, $q_login);


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

    $r_baru = mysqli_query($con, $q_baru);
    $qdelete_all = "delete from tanam_baru$tahun_baru "
            . "where tanaman_baru='' ";
    $rdelete_all = mysqli_query($con, $qdelete_all);
      // print_r($q_baru);

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
    $r_tukar = mysqli_query($con, $q_tukar);
    $qdelete_all = "delete from tanam_tukar$tahun_tukar "
            . "where tanaman_tukar='' ";
    $rdelete_all = mysqli_query($con, $qdelete_all);
    // print_r($q_tukar);


    //echo "<br>";
    $q_semula = "insert into tanam_semula$tahun_semula (nama_estet, lesen, negeri, daerah, bulan, tanaman_semula) values ('$nama_estet','$nolesen','$negeri_premis','$daerah_premis', '$bulan_semula', '$tanaman_semula')";
    $r_semula = mysqli_query($con, $q_semula);
    $qdelete_all = "delete from tanam_semula$tahun_semula where tanaman_semula='' ";
    $rdelete_all = mysqli_query($con, $qdelete_all);


    $q_estateinfo = "update  $table set alamat1 = '$alamat1', alamat2 = '$alamat2', poskod ='$poskod', bandar =upper('$daerah'), negeri='$negeri', 		                    no_telepon = '$notelefon', no_fax ='$nofax', emel = '$email' where no_lesen_baru= '$nolesen'";
    $r_estateinfo = mysqli_query($con, $q_estateinfo);
    // print_r($q_estateinfo);



    // $q_estatedetail = "update  estate_info set pegawai='$pegawai', syarikat ='$syarikat',integrasi = '$integrasi', keahlian='$keahlian'"
    //         . " where lesen = '$nolesen'";
    $r_estatedetail = mysqli_query($con, $q_estatedetail);
    // print_r($q_estatedetail);

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
    $imm_update = mysqli_query($con, $qUpdateImmature);
    $imm_update_row = mysqli_fetch_array($imm_update);

    $belum_berhasil = $imm_update_row['totalImmature'] ?? 0;
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
    $r_esub = mysqli_query($con, $q_esub);
    $s_esub = mysqli_fetch_array($r_esub);

    // print_r($q_esub);

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
    $rdelete = mysqli_query($con, $qdelete);

    $qdelete_all = "delete from $table where $field='' ";
    $rdelete_all = mysqli_query($con, $qdelete_all);

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
    $imm_update = mysqli_query($con, $qUpdateImmature);
    $imm_update_row = mysqli_fetch_array($imm_update);

    $sql = "select keluasan_yang_dituai as luas from esub where no_lesen_baru='$lesen'";
    $sqlresult = mysqli_query($con, $sql);
    $keluasan = mysqli_fetch_array($sqlresult);

    $belum_berhasil = $imm_update_row['totalImmature'];
    $jumlah = $belum_berhasil + $keluasan['luas'];

    $q_esub = "update $tableesub set Belum_Berhasil ='$belum_berhasil', Jumlah ='$jumlah' where no_lesen_baru='$lesen'";
    $r_esub = mysqli_query($con, $q_esub);

    echo "<script>window.location.href='view_estate_all.php?nolesen=$lesen'</script>";
}
?>
