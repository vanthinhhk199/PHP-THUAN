<?php 

include('includes/header.php');
include('../middleware/adminMiddleware.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Products
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $product = getAll("products");

                                if (mysqli_num_rows($product) > 0)
                                {
                                    foreach($product as $item)
                                    {
                                        ?>

                                            <tr>
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['name']; ?></td>
                                                <td>
                                                    <img src="../uploads/<?= $item['image']; ?>" width="50px" alt="<?= $item['image']; ?>">
                                                </td>
                                                <td><?= $item['status'] == '0'? "Visible":"Hidden" ?></td>
                                                <td>
                                                    <a href="edit-products.php?id=<?= $item['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm delete_product_btn" value="<?= $item['id'] ?>">Delete</button>
                                                </td>
                                            </tr>
                                        <?php 
                                    }
                                }else{
                                    echo "No records found";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>