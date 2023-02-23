<?php 
  if (isset($_SESSION['authenticated'])) {
    $_SESSION['status'] = "Bạn đã đăng nhập";
    header("Location: dashboard.php");
    exit(0);
  }

  $page_title = "Login From";
  include('../includes/header.php');

?>

<div class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <?php 
            if (isset($_SESSION['status'])) {
        ?>
              <div class="alert alert-success"><h5><?= $_SESSION['status']; ?></h5></div>
        <?php 
              unset($_SESSION['status']);
            }
        ?>
        <div class="card">
          <div class="card-header">
            <h4>Đổi Mật Khẩu</h4>
          </div>
          <div class="card-body">
            <form action="../functions/authcode.php" method="POST">
              <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                <div class="form-group mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>"  class="form-control" placeholder="Nhập Email" required>
                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputPassword1" class="form-label">Mật Khẩu</label>
                  <input type="password" name="new_password" class="form-control" placeholder="Nhập mật khẩu" id="exampleInputPassword1" required>
                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nhập Lại Mật Khẩu</label>
                  <input type="password" name="cpassword" class="form-control" placeholder="Nhập Lại Mật Khẩu" id="exampleInputPassword1" required>
                </div>
                <div class="form-group">
                  <button type="submit" name="password_update_btn" class="btn btn-primary">Cập Nhật Mật Khẩu</button>
                </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

<?php include('../includes/footer.php'); ?>