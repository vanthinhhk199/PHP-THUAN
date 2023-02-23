<?php
    $host = "localhost";
    $username = "root";
    $password = "123";
    $database = "php2.0";

    //Tạo kết nối vs csdl
    $con = mysqli_connect($host, $username, $password, $database);
    mysqli_set_charset($con, 'UTF8');

    //Check kết nối csdl
    if (!$con) {
        die("Kết nối CSDL thất bại: ". mysqli_connect_error());
    }
?>