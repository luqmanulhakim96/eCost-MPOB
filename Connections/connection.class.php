<?php

function connect($alternate=1, $custom=false)
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db_n = "mpob";

        $con=mysql_connect($host,$user,$pass);
        mysql_select_db($db_n,$con);

        return $con;

        }

?>
