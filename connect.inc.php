<?php

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'newsdir';

    $con = mysqli_connect($host, $username, $password);
    $selectdb = mysqli_select_db($con, $dbname);

?>