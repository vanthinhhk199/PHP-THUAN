<?php 
  session_start();
  $page_title = "Registration From";
  include('../includes/header.php');

?>

<div class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <?php 
          if (isset($_SESSION['status'])) {
            echo "<h5 style='color:red';>".$_SESSION['status']."</h5>";
            unset($_SESSION['status']);
          }
        ?>
        <div class="card">
          <div class="card-header">
            <h4>Register Form</h4>
          </div>
          <div class="card-body">
            <form action="../functions/authcode.php" method="POST">
              <div class="mb-3">
                <label class="form-label">Tên</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập Tên" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control" placeholder="Nhập SĐT" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Nhập Email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật Khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" id="exampleInputPassword1" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" name="cpassword" class="form-control" placeholder="Nhập lại mật khẩu" required>
              </div>
              <button type="submit" name="register_btn" class="btn btn-primary">Đăng Ký</button>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

<?php include('../includes/footer.php'); ?>