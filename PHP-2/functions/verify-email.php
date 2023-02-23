<?php 
  session_start();
  include('../config/dbcon.php');
  include('../functions/myfuntions.php');


  if (isset($_GET['token']))
  {
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token,verify_status FROM users WHERE verify_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($con, $verify_query);

    
    if (mysqli_num_rows($verify_query_run) > 0) //mysqli_num_rows được sử dụng để lấy số hàng được trả về từ một truy vấn chọn.
    {
      $row = mysqli_fetch_array($verify_query_run); //mysqli_fetch_array được sử dụng để tìm nạp các mảng hàng từ tập kết quả truy vấn.
      if ($row['verify_status'] == "0")
      {
        $clicked_token = $row['verify_token'];
        $update_query = "UPDATE users SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
        $update_query_run = mysqli_query($con, $update_query);

        if ($update_query_run)
        {

          redirect("../view/login.php","Tài khoản của bạn đã được xác minh thành công");

        } else {
          redirect("../view/login.php","Xác minh không hoàn thành");
        }

      }else
      {
        redirect("../view/login.php","Email đã được xác minh. Vui lòng hãy đăng nhập");
      }
      

    }else 
    {
      redirect("../view/login.php","Token này không tồn tại");
    }
    
  }else {
    redirect("../view/login.php","Not Allowed");
  }

?>