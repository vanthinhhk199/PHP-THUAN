<?php 
include('../config/dbcon.php');
include('authcode.php');

if (isset($_SESSION['auth'])) {

    if (isset($_POST['add_comment']))
    {
        $ct_cmt = $_POST['ct_cmt'];
        $user_id = $_SESSION['auth_user']['user_id'];
        $prod_id = $_POST['prod_id'];
    
        $checkorder = "SELECT user_id, prod_id FROM orders INNER JOIN order_items ON orders.id = order_items.order_id WHERE user_id = '$user_id' AND order_items.prod_id = '$prod_id'";
        $checkorder_run = mysqli_query($con, $checkorder);

        if (mysqli_num_rows($checkorder_run)>0) {

            $insert_cmt = "INSERT INTO comment (prod_id, user_id, content) VALUES ('$prod_id', '$user_id', '$ct_cmt')";
            $insert_cmt_run = mysqli_query($con, $insert_cmt);

            redirect("../index.php","Add comment successful");

        }else{
            redirect("../index.php","You need to purchase to comment");
        }

    }

}else{
    redirect("../index.php","Login to continue");
}


?>