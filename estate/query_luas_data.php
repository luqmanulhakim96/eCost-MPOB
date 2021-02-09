<?php

function luas_data($table, $data, $tahunsebelum) {

    if (strlen($tahunsebelum) == 1) {
        $table = $table . "0" . substr($tahunsebelum, -2);
    } else {
        $table = $table . substr($tahunsebelum, -2);
    }
    $con = connect();
    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";
    $rblm = mysqli_query($con, $qblm);
    $rowblm = mysqli_fetch_array($rblm);
    return $rowblm[$data];
}



?>
