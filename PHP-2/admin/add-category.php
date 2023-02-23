<?php 

include('includes/header.php');
include('../functions/myfuntions.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name Categogy" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Slug</label>
                                <input type="text" name="slug" placeholder="Slug" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label>Description</label>
                                <textarea name="description" placeholder="description" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Meta Title" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label>Meta Description</label>
                                <textarea rows="3" name="meta_description" placeholder="Meta Description" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>Meta Keywords</label>
                                <textarea rows="3" name="meta_keywords" placeholder="Meta Keywords" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label>Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-6">
                                <label>Popular</label>
                                <input type="checkbox" name="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>  
            </div>  
        </div>
    </div>
</div>

<?php 

include('includes/footer.php')

?>
