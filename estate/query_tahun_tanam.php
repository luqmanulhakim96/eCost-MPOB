<?php
function tanaman_tahun($tahuntanaman) {
    $con = connect();
    $q1 = "select sum(tanaman_baru) as jumlah from tanam_baru$tahuntanaman where lesen ='" . $_SESSION['lesen'] . "' ";
    $r1 = mysqli_query($con, $q1);
    $row1 = mysqli_fetch_array($r1);

    $q2 = "select sum(tanaman_semula) as jumlah from tanam_semula$tahuntanaman where lesen ='" . $_SESSION['lesen'] . "' ";
    $r2 = mysqli_query($con, $q2);
    $row2 = mysqli_fetch_array($r2);

    $q3 = "select sum(tanaman_tukar) as jumlah from tanam_tukar$tahuntanaman  where lesen ='" . $_SESSION['lesen'] . "' ";
    $r3 = mysqli_query($con, $q3);
    $row3 = mysqli_fetch_array($r3);

    $js[0] = $row1['jumlah'] + $row2['jumlah'] + $row3['jumlah'];
    $js[1] = $row1['jumlah'];
    $js[2] = $row2['jumlah'];
    $js[3] = $row3['jumlah'];
    return $js;
}



?>
