<?php 

include('includes/header.php');
include('../functions/myfuntions.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products</h4>
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
                                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                                <?php 
                                            }
                                        }else{
                                            echo "No category available";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Name</label>
                                <input type="text" name="name" placeholder="Name Products" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" name="slug" placeholder="Slug" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea name="description" placeholder="description" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea type="text" name="small_description" placeholder="Small Description" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Original Price</label>
                                <input type="text" name="original_price" placeholder="Original Price" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Selling Price</label>
                                <input type="text" name="selling_price" placeholder="Selling Price" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" name="image" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Meta Title" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea rows="3" name="meta_description" placeholder="Meta Description" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea rows="3" name="meta_keywords" placeholder="Meta Keywords" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label>
                                    <input type="text" name="qty" placeholder="Quantity" class="form-control mb-2">
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="mb-0">Status</label><br>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="mb-0">Trending</label><br>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>  
            </div>  
        </div>
    </div>
</div>

<?php 

include('includes/footer.php');

?>
