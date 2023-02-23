<?php 
    $page_title = "Cart"; 
    include '../functions/userfunctions.php';
    include('../includes/header.php');
    
    include('../functions/authenticate.php');
?>

<div class="py-3 bg-light">
    <div class="container">
        <h6>
            <a class="text-dark" href="../index.php">
                Home / 
            </a>
                Cart
        </h6>
    </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div id="mycart">
                <?php 
                $items = getCartItems();
                
                if(mysqli_num_rows($items) > 0)
                {
                ?>
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <h6>Product</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Name</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Quantity</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Action</h6>
                        </div>
                    </div>
                    <?php 
                    if (mysqli_num_rows($items) > 0)
                    {
                        foreach ($items as $citem)
                        {
                    ?>
                            <div class="card product_data shadow-sm mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-2 p-3">
                                        <img src="../uploads/<?= $citem['image']; ?>" alt="Image" width="80px">
                                    </div>
                                    <div class="col-md-3">
                                        <h5><?= $citem['name']; ?></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Price: <?= $citem['selling_price']; ?> $</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="prodId" value="<?= $citem['prod_id']; ?>">
                                        <div class="input-group mb-3" style="width: 110px;">
                                            <button class="input-group-text decrement-btn updateQty">-</button>
                                                <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty']; ?>" disabled>
                                            <button class="input-group-text increment-btn updateQty">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-danger btn-sm deteleItem" value="<?= $citem['cid']; ?>"><i class="fa fa-trash"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                    <?php 
                        }
                    }
                    ?>
                    <div class=" float-end">
                        <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
                    </div>
                <?php 
                }else{
                ?>
                    <div class="card card-body text-center shadow">
                        <h4 class="py-3">Your cart is empty</h4>
                    </div>
                <?php 
                }
                ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


<?php include('../includes/footer.php'); ?>
  