<?php 
$page_title = "Products"; 
include('../functions/userfunctions.php');
include('../includes/header.php');

if (isset($_GET['product']))
{
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products",$product_slug);
    $product = mysqli_fetch_array($product_data);
    
    if ($product)
    {
        ?>
        <div class="bg-light py-4">
            <div class="py-3 bg-light">
                <div class="container">
                    <h6 class="text-dark">
                        <a href="categories.php" class="text-dark">Home /</a>
                        <a href="categories.php" class="text-dark">Collections / </a>
                        <?= $product['name']; ?></h6>
                </div>
            </div>
            <div class="container product_data">
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="shadow p-3">
                            <img src="../uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold"><?= $product['name']; ?>
                            <span class="float-end text-danger"><?php if($product['name']){echo "Trending";} ?></span>
                        </h4>
                        <hr>
                        <p><?= $product['small_description']; ?></p>
                        <hr>
                        <div class="row text-danger">
                            <div class="col-md-6">
                                <h5> Price : <span class="text-danger"><s><?= $product['original_price']; ?></s> $</span></h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Price : <span class="text-success"><?= $product['selling_price']; ?> $</span></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width: 110px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i>Add to Wishlist</button>
                            </div>
                        </div>
                        <hr>
                        <h6>Product Description</h6>
                        <p><?= $product['description']; ?></p>
                        <hr>
                        <section>
                            <div class="container ">
                                <div class="col-md-12 ">
                                    <div class="card">
                                    <?php 
                                        $prod_id = $product['id'];
                                        $userId = $_SESSION['auth_user']['user_id'];
                                        $data_cmt = comment($prod_id);

                                        foreach($data_cmt as $item){
                                            ?>
                                            <div class="card-body">
                                                <div class="d-flex flex-start align-items-center">
                                                    <div>
                                                        <h6 class="fw-bold text-primary mb-1"><?=$item['name'] ?></h6>
                                                    </div>
                                                </div>
    
                                                <p class="ms-4">
                                                    <?=$item['content'] ?>
                                                </p>
                                            </div>
                                            <?php 
                                        }
                                    ?>
                                        <form action="../functions/commentcode.php" method="POST">
                                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                                <div class="d-flex flex-start w-100">
                                                    <div class="form-outline w-100">
                                                        <label class="form-label" for="textAreaExample">Message</label>
                                                        <textarea class="form-control" id="textAreaExample" name="ct_cmt" rows="2"
                                                        style="background: #fff;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="float-end pt-1">
                                                    <input type="hidden" name="prod_id" value="<?= $product['id']?>">
                                                    <input type="submit" name="add_comment" class="btn btn-primary btn-sm"></input>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <?php 
    }else
    {
        echo "Product Not Found";
    }
}
else
{
    redirect("../index.php","Something went wrong");
}


include('../includes/footer.php'); ?>
