<?php 

include('includes/header.php');
include('../middleware/adminMiddleware.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <?php
                        $product_ad = getAll("products");
                        
                        if($product_tk = mysqli_num_rows($product_ad)) {
                            ?>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Tổng Sản Phẩm</p>
                                <h4 class="mb-0"><?= $product_tk ?></h4>
                            </div>
                            <?php
                        }
                    ?>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <?php
                            $category_ad = getAll("categories");
                            
                            if($category_tk = mysqli_num_rows($category_ad)) {
                                ?>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Tổng Danh Mục</p>
                                    <h4 class="mb-0"><?= $category_tk ?></h4>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <?php
                            $user_ad = getAll("users");
                            
                            if($user_tk = mysqli_num_rows($user_ad)) {
                                ?>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Tổng Người Dùng</p>
                                    <h4 class="mb-0"><?= $user_tk ?></h4>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <?php
                            $order_ad = getAll("orders");
                            
                            if($order_tk = mysqli_num_rows($order_ad)) {
                                ?>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Tổng Số Order</p>
                                    <h4 class="mb-0"><?= $order_tk ?></h4>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>
