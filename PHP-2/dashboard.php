<?php 
    session_start();
    $page_title = "Dashboard"; 
    include('./includes/header.php');
    include('./includes/navbar.php');
?>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                            <h4>User Dashboard</h4>
                        </div>
                        <div class="card-body">
                            <h4>Accesss when you are Logged In</h4>
                            <hr>
                            <h5 class="style: font-family: Helvetica, Arial, Tahoma, sans-serif;" >Username: <?= $_SESSION['auth_user']['name']; ?></h5>
                            <h5>Email ID: <?= $_SESSION['auth_user']['email']; ?></h5>
                            <h5>Phone: <?= $_SESSION['auth_user']['phone']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('./includes/footer.php'); ?>