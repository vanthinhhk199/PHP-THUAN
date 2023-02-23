<?php 
session_start();
include('./config/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}
function getProducts()
{
    global $con;
    $limit = 8;
    if (!isset($_GET['page'])) {
        $page = 1;
    }else{
        $page = $_GET['page'];
    }
    $start = ($page - 1) * $limit;
    $query = "SELECT * FROM products ORDER BY id DESC LIMIT $start, $limit";
    return $query_run = mysqli_query($con, $query);
}
function getSearch($kw)
{
    global $con;
    $query = "SELECT * FROM products WHERE name LIKE '%".$kw."%' ";
    return $query_run = mysqli_query($con, $query);
}
function getAllTrending()
{
    global $con;
    $query = "SELECT * FROM products WHERE trending='1' ";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function redirect($url, $status)
{
    $_SESSION['status'] = $status;
    header('Location:'.$url);
    exit();
}

?>