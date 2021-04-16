<?php

function connect($alternate=1, $custom=false)
    {
        $host = "localhost";
        $user = "artanis";
        $pass = "M@xis123";
        $db_n = "mpob";

        $con = mysqli_connect($host,$user,$pass);
        // mysqli_select_db($db_n,$con);
        mysqli_select_db($con, $db_n);


        return $con;

    }
?>
