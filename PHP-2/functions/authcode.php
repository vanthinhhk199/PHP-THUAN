<?php 

session_start();
include('../config/dbcon.php');
include('myfuntions.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token)
{

    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->SMTPAuth   = true;    

    $mail->Host       = 'smtp.gmail.com';                     
    $mail->Username   = 'vanthinhhk199@gmail.com';               
    $mail->Password   = 'arxvbulvwpyhnmyq';

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;                                  

    //Recipients
    $mail->setFrom('vanthinhhk199@gmail.com', $name);
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Email Verification from ...';

    $email_template = "
    <h2>Bạn đã đăng ký tài khoản tại ...</h2>
    <h5>xác minh địa chỉ email của bạn để đăng nhập với liên kết được cung cấp bên dưới.</h5>
    <a href='http://localhost:8080/PHP-2/functions/verify-email.php?token=$verify_token'>Click Me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
    echo 'Message has been sent';
}

function send_password_reset($get_name,$get_email,$token)
{
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->SMTPAuth   = true;    

    $mail->Host       = 'smtp.gmail.com';                     
    $mail->Username   = 'vanthinhhk199@gmail.com';               
    $mail->Password   = 'arxvbulvwpyhnmyq';

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;                                  

    //Recipients
    $mail->setFrom('vanthinhhk199@gmail.com', $get_name);
    $mail->addAddress($get_email);

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Reset Password';

    $email_template = "
    <h2>Hello</h2>
    <h5>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</h5>
    <a href='http://localhost:8080/PHP-2/view/password-change.php?token=$token&email=$get_email'>Click Me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
    echo 'Message has been sent';
}

if (isset($_POST['register_btn'])) 
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    $verify_token = md5(rand(000000, 999999));

    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query); //thực thi các truy vấn SQL


    if($cpassword === $password){
        if(mysqli_num_rows($check_email_query_run) > 0) //mysqli_num_rows() trả về số lượng hàng trong một tập kết quả.
        {
            redirect("../view/register.php","Email đã tồn tại");
        }else
        {
            //Lưu vào database
            $query = "INSERT INTO users (name, email, password, phone, verify_token) VALUE ('$name', '$email', '$password', '$phone', '$verify_token')";
            $query_run = mysqli_query($con, $query);
    
            if ($query_run)
            {
                sendemail_verify("$name", "$email", "$verify_token");

                redirect("../view/register.php","Vào Email để xác minh!");

            } else {

                redirect("../view/register.php","Đăng ký thất bại");
            }
        }
    }else
    {
        redirect("../view/register.php","Mật khẩu không khớp");
    }
    
}

// if (isset($_POST['login_btn'])) 
// {
//     if (!empty(trim($_POST['email'])) && !empty(trim(md5($_POST['password'])))) //trim() Xóa những ký tự có tên trong danh sách ký tự do bạn chỉ định ra khỏi vị trí đầu tiên và cuối cùng của chuỗi, empty() là hàm giúp kiểm tra một biến có rỗng hay không
//     {
//         $email = mysqli_real_escape_string($con, $_POST['email']); //hàm mysql_real_escape_string() để loại bỏ những kí tự có thể gây ảnh hưởng đến câu lệnh SQL.
//         $password = mysqli_real_escape_string($con, md5($_POST['password']));

//         $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
//         $login_query_run = mysqli_query($con, $login_query); //thực thi các truy vấn SQL

//         if (mysqli_num_rows($login_query_run) > 0) //mysqli_num_rows được sử dụng để lấy số hàng được trả về từ một truy vấn chọn.
//         {
//             $_SESSION['auth'] = true;

//             $row = mysqli_fetch_array($login_query_run);  //mysqli_fetch_array được sử dụng để tìm nạp các mảng hàng từ tập kết quả truy vấn.
//             $username = $row['name'];
//             $email = $row['email'];
//             $phone = $row['phone'];
//             $role_as = $row['role_as'];

//             $_SESSION['role_as'] = $role_as;
            
//             $_SESSION['auth_user'] = [
//                 'name' => $username,
//                 'phone' => $phone,
//                 'email' => $email,
//             ];
            
//             if ($row['verify_status'] == "1" && $role_as == 1)
//             {
//                 $_SESSION['status'] = "Welcome To Dashboard";
//                 header("Location: ../admin/index.php");
//                 exit(0);
//             }
//             if ($row['verify_status'] == "1" && $role_as == 0)
//             {
//                 $_SESSION['status'] = "Bạn đã đăng nhập thành công";
//                 header("Location: ../index.php");
//                 exit(0);
//             }
//         }else
//         {

//             $_SESSION['status'] = "Email hoặc mật khẩu không hợp lệ";
//             header("Location: ../login.php");
//             exit(0);
//         }

//     }
//     else
//     {
//         $_SESSION['status'] = "All fields are Mandetory";
//         header("Location: ../login.php");
//         exit(0);
//     }
    
// }

if (isset($_POST['login_btn'])) 
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));    
    
    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);
    
    if (mysqli_num_rows($login_query_run) > 0) {
        
        $_SESSION['auth'] = true;
        
        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $email = $userdata['email'];
        $phone = $userdata['phone'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $email,
            'phone' => $phone,
        ];
        
        $_SESSION['role_as'] = $role_as;

        if ($userdata['verify_status'] == "1" && $role_as == 1)
        {
            redirect("../admin/index.php","Welcome To Dashboard");
        }
        if ($userdata['verify_status'] == "1" && $role_as == 0)
        {
            redirect("../index.php","Đăng nhập thành công");
        }
    }else{

        redirect("../view/login.php","Thông tin không hợp lệ");
    }
    
    
}

if (isset($_POST['reset_pass_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand(000000, 999999));

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);

    if(mysqli_num_rows($check_email_run) > 0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_token = "UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if ($update_token_run)
        {
            send_password_reset($get_name,$get_email,$token);
            redirect("../view/password-reset.php","Chúng tôi đã gửi email cho bạn một liên kết đặt lại mật khẩu");

        }else
        {
            redirect("../view/password-reset.php","Đã xảy ra sự cố.");
        }

    }else
    {
        redirect("../view/password-reset.php","Không Tìm Thấy Email");

    }
}

if (isset($_POST['password_update_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, md5($_POST['new_password']));
    $cpassword = mysqli_real_escape_string($con, md5($_POST['cpassword']));

    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    if (!empty($token))
    {
        if (!empty($email) && !empty($new_password) && !empty($cpassword))
        {
            //Kiểm tra token có khớp ko
            $check_token = "SELECT verify_token FROM users WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token); //thực thi các truy vấn SQL


            if(mysqli_num_rows($check_token_run) > 0) //mysqli_num_rows() trả về số lượng hàng trong một tập kết quả.
            {
                if ($new_password === $cpassword) {

                    $update_password = "UPDATE users SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($con, $update_password);
                    
                    if ($update_password_run) {

                        $new_token = md5(rand());
                        $update_new_token = "UPDATE users SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_new_token_run = mysqli_query($con, $update_new_token);

                        redirect("../view/login.php","Đã cập nhật mật khẩu thành công.");

                    }else
                    {
                        redirect("../view/password-change.php?token=$token&email=$email","Đã xảy ra sự cố khi cập nhật mật khẩu.");
                    }
                } else
                {
                    redirect("../view/password-change.php?token=$token&email=$email","Mật khẩu và Xác nhận mật khẩu không khớp");
                }
                
            
            } else
            {
                redirect("../view/password-change.php?token=$token&email=$email","Token không hợp lệ");
            }
        }else
        {
            redirect("../view/password-change.php?token=$token&email=$email","All Filed are Mandetory");
        }
    }else
    {
        redirect("../view/password-change.php?token=$token&email=$get_email","No Token Available");
    }
}

?>