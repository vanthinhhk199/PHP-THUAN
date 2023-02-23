<?php 
session_start();
include('../config/dbcon.php');

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0' ";
    return $query_run = mysqli_query($con, $query);
}
function getSlugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}
function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='0' ";
    return $query_run = mysqli_query($con, $query);
}
function getCartItems()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
    return $query_run = mysqli_query($con, $query);
}
function getOrders()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    
    $query = "SELECT * FROM orders WHERE user_id='$userId' ORDER BY id DESC ";
    return $query_run = mysqli_query($con, $query);
}

function checkTrackingNoValid($trackingNo)
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$userId' ";
    return mysqli_query($con, $query);
}

function comment($prod_id)
{
    global $con;
    $query = "SELECT users.name, content FROM comment INNER JOIN products INNER JOIN users ON comment.user_id = users.id AND comment.prod_id = products.id WHERE comment.prod_id = '$prod_id' ORDER BY comment.id DESC LIMIT 0,4";
    return mysqli_query($con, $query);
}

function redirect($url, $status)
{
    $_SESSION['status'] = $status;
    header('Location:'.$url);
    exit();
}
?>
