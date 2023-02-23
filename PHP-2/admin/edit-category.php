<?php 

include('includes/header.php');
include('../middleware/adminMiddleware.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <?php 
                    if (isset($_GET['id']))
                    { 
                        $id = $_GET['id'];
                        $category = getByID("categories", $id);

                        if (mysqli_num_rows($category) > 0)
                        {
                            $data = mysqli_fetch_array($category);
                ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Category
                                    <a href="products.php" class="btn btn-primary float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="category_id" value="<?=$data['id'] ?>">
                                            <label>Name</label>
                                            <input type="text" name="name" placeholder="Name Categogy" value="<?=$data['name'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Slug</label>
                                            <input type="text" name="slug" placeholder="Slug" value="<?=$data['slug'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Description</label>
                                            <textarea name="description" placeholder="description" class="form-control"><?=$data['description'] ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Upload Image</label>
                                            <input type="file" name="image" class="form-control">
                                            <label>Current Image</label>
                                            <input type="hidden" name="old_image" value="<?=$data['image'] ?>">
                                            <img width="100px" src="../uploads/<?=$data['image'] ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Meta Title</label>
                                            <input type="text" name="meta_title" placeholder="Meta Title" value="<?=$data['meta_title'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Meta Description</label>
                                            <textarea rows="3" name="meta_description" placeholder="Meta Description" class="form-control"><?=$data['meta_description'] ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Meta Keywords</label>
                                            <textarea rows="3" name="meta_keywords" placeholder="Meta Keywords" class="form-control"><?=$data['meta_keywords'] ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Status</label>
                                            <input type="checkbox" name="status" <?= $data['status'] ? "checked":"" ?>>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Popular</label>
                                            <input type="checkbox" name="popular" <?= $data['popular'] ? "checked":"" ?>>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>  
                        </div> 
                <?php 
                        }else{
                            echo "Category not found";
                        }
                    }else{
                        echo "Id missing from url";
                    }
                ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>