<?php 

include('includes/header.php');
include('../functions/myfuntions.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if (isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $product = getByID("products", $id);
                    if (mysqli_num_rows($product) > 0)
                    {
                        $data = mysqli_fetch_array($product);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Products
                                <a href="products.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-0">Select Category</label>
                                        <select class="form-select mb-2" name="category_id">
                                            <option selected>Select Categogy</option>
                                            <?php 
                                                $categories = getAll('categories');
        
                                                if (mysqli_num_rows($categories) > 0)
                                                {
                                                    foreach ($categories as $item) {
                                                        ?>
                                                        <option value="<?= $item['id'] ?>" <?= $data['category_id'] == $item['id']? 'selected':'' ?>><?= $item['name'] ?></option>
                                                        <?php 
                                                    }
                                                }else{
                                                    echo "No category available";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                                    <div class="col-md-6">
                                        <label class="mb-0">Name</label>
                                        <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Name Products" class="form-control mb-2" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Slug</label>
                                        <input type="text" name="slug" value="<?= $data['slug'] ?>" placeholder="Slug" class="form-control mb-2" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Description</label>
                                        <textarea rows="5" name="description" placeholder="Description" class="form-control mb-2" required><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Small Description</label>
                                        <textarea rows="5" type="text" name="small_description" placeholder="Small Description" class="form-control mb-2" required><?= $data['small_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Original Price</label>
                                        <input type="text" name="original_price" value="<?= $data['original_price'] ?>" placeholder="Original Price" class="form-control mb-2" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Selling Price</label>
                                        <input type="text" name="selling_price" value="<?= $data['selling_price'] ?>" placeholder="Selling Price" class="form-control mb-2" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Upload Image</label>
                                        <input type="file" name="image" class="form-control mb-2">
                                        <label>Current Image</label>
                                        <input type="hidden" name="old_image" value="<?=$data['image'] ?>">
                                        <img width="100px" src="../uploads/<?=$data['image'] ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Title</label>
                                        <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" placeholder="Meta Title" class="form-control mb-2" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Description</label>
                                        <textarea rows="5" name="meta_description" placeholder="Meta Description" class="form-control mb-2" required><?= $data['meta_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Keywords</label>
                                        <textarea rows="5" name="meta_keywords" placeholder="Meta Keywords" class="form-control mb-2" required><?= $data['meta_keywords'] ?></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-0">Quantity</label>
                                            <input type="text" name="qty" value="<?= $data['qty'] ?>" placeholder="Quantity" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label class="mb-0">Status</label><br>
                                            <input type="checkbox" name="status" <?= $data['status'] == '0'?'':'checked' ?>>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label class="mb-0">Trending</label><br>
                                            <input type="checkbox" name="trending" <?= $data['trending'] == '0'?'':'checked' ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>  
                    </div>  
            <?php
                    }else
                    {
                        echo 'Product Not found for given id';
                    }
                }else
                {
                    echo 'Id missing from url';
                }
            
            ?>
        </div>
    </div>
</div>

<?php 

include('includes/footer.php');

?>
