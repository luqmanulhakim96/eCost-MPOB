<?php

function connect($alternate=1, $custom=false)
    {
        $host = "localhost";
        $user = "ecost";
        $pass = "ecost2021";
        $db_n = "ecost2021";

        // $con = mysqli_connect($host,$user,$pass);
        $con = new mysqli($host,$user,$pass);

        // mysqli_select_db($db_n,$con);
        mysqli_select_db($con, $db_n);


        return $con;

    }
?>
