<?php 
$page_title = "Products"; 
include('../functions/userfunctions.php');
include('../includes/header.php');

if (isset($_GET['category']))
{
    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories",$category_slug);
    $category = mysqli_fetch_array($category_data);

    if ($category)
    {
        $cid = $category['id'];
    ?>

        <div class="py-3 bg-light">
            <div class="container">
                <h6 class="text-dark">
                    <a href="categories.php" class="text-dark">Home /</a>
                    <a href="categories.php" class="text-dark">Collections / </a>
                    <?= $category['name']; ?></h6>
            </div>
        </div>

        <div class="py-3">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <h1><?= $category['name']; ?></h1>
                <hr>
                <div class="row">
                    <?php 
                        $products = getProdByCategory($cid);
                        
                        if (mysqli_num_rows($products) > 0)
                        {
                            foreach($products as $item)
                            {
                                ?>
                                <div class="col-md-3 mb-2">
                                    <a href="product-view.php?product=<?=$item['slug']; ?>">
                                        <div class="card shadow">
                                            <div class="card-body mt-2">
                                                <img src="../uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                                <h4 class="text-center mt-2"><?= $item['name']; ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                        }else{
                            echo "No data available";
                        }
                    ?>
                </div>
            </div>
            </div>
        </div>
        </div>

    <?php 
    }
    else
    {
        echo "Something went wrong";
    }
}
else
{
    echo "Something went wrong";
}

include('../includes/footer.php'); ?>
  