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
            <h4>Reset Password</h4>
          </div>
          <div class="card-body p-4">
            <form action="../functions/authcode.php" method="POST">
              <div class="form-group mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Nhập Email" required>
              </div>
              <div class="form-group mb-3">
                <button type="submit" name="reset_pass_btn" class="btn btn-primary">Gửi</button>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

<?php include('../includes/footer.php'); ?>