<?php 

    session_start();

    if ($_SESSION['auth']) {

        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        $_SESSION['status'] = "Đăng xuất thành công";
        header("Location: ../view/login.php");
    }

?>