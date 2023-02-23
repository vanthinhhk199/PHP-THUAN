<?php 
  session_start();
  if (isset($_SESSION['auth'])) {
    $_SESSION['status'] = "Bạn đã đăng nhập";
    header("Location: index.php");
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
            <h4>Login Form</h4>
          </div>
          <div class="card-body">
            <form action="../functions/authcode.php" method="POST">
              <div class="form-group mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Nhập Email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
              </div>
              <div class="form-group mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật Khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" id="exampleInputPassword1" required>
              </div>
              <div class="form-group">
                <button type="submit" name="login_btn" class="btn btn-primary">Đăng Nhập</button>
                <a href="password-reset.php" class="float-end">Quên mật khẩu</a>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

<?php include('../includes/footer.php'); ?>