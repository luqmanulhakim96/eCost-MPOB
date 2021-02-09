<?php include('../Connections/connection.class.php'); ?>
<?php

extract($_REQUEST);

$con = connect();
if ($type != "delete") {

	$syarikat_induk=strtoupper($syarikat_induk);
	$negeri=strtoupper($negeri);
    $q_fbb = "update ekilang "
            . " set "
            . " negeri='$negeri', "
            . " syarikat_induk='$syarikat_induk' "
            . " where "
            . " no_lesen = '$nolesen' "
            . " and tahun ='$tahun' ";
    $r_fbb = mysqli_query($con, $q_fbb);


    $q_login = "update "
            . " login_mill "
            . " set "
            . " password='$password', "
            . " firsttime='$firsttime', "
            . " success='$success', "
            . " fail='$fail' "
            . " where lesen ='$nolesen'	";
    $r_login = mysqli_query($con, $q_login);


    $qall = "select "
            . "* "
            . "from ekilang "
            . "where "
            . "no_lesen ='$nolesen' "
            . "and tahun='$tahun' ";
    $rall = mysqli_query($con, $qall);
    $totalall = mysqli_num_rows($rall);

    foreach ($jumlah as $id => $value) {
        $var = explode(":", $id);
        $value = str_replace(",", "", $value);
        $q = "update ekilang "
                . "set "
                . "ffb_proses='$value' "
                . "where "
                . "tahun = '$var[1]' "
                . "and bulan ='$var[2]' "
                . "and no_lesen='$var[0]'";
        if ($totalall == 0) {
            $q = "INSERT INTO `ekilang` "
                    . "(`NO_LESEN`, "
                    . "`NAMA_KILANG`,"
                    . " `NEGERI`,"
                    . " `SYARIKAT_INDUK`,"
                    . " `BULAN`,"
                    . " `TAHUN`,"
                    . " `FFB_PROSES`,"
                    . " `ESTET_SENDIRI`,"
                    . " `LAIN`,"
                    . " `PENGELUARAN_CPO`,"
                    . " `PENGELUARAN_PK`) "
                    . "VALUES "
                    . "('$var[0]', "
                    . "'$nama_kilang', "
                    . "'$negeri', "
                    . "'$syarikat_induk', "
                    . "'$var[2]', "
                    . "'$var[1]', "
                    . "'$value', "
                    . "'', "
                    . "'', "
                    . "'', "
                    . "'')";
        }//if total 0
		//echo $q."<br>";
        $a = mysqli_query($con, $q);
    }

    $tahun = $tahun + 1;


    echo "<script>window.location.href='view_mill_all.php?nolesen=$nolesen&tahun=$tahun'</script>";
}
?>
