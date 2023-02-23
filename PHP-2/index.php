<?php 
    $page_title = "Home Page"; 
    include('./functions/homecode.php');
    include('./includes/header.php');
    include('./includes/slider.php');

?>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Trending Products</h4>
        <div class="underline mb-2"></div>
        <div class="owl-carousel">
          <?php 
            $trendingProducts = getAllTrending();
            if (mysqli_num_rows($trendingProducts) > 0) {
              foreach ($trendingProducts as $item) {
                ?>
                  <div class="item">
                      <a href="view/product-view.php?product=<?=$item['slug']; ?>">
                          <div class="card">
                              <div class="card-body mt-2">
                                  <img src="./uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                  <h6 class="text-center mt-2"><?= $item['name']; ?></h6>
                              </div>
                          </div>
                      </a>
                  </div>
                <?php
              }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Products</h4>
        <div class="underline mb-2"></div>
          <div class="row">
              <?php 
                if (isset($_POST['search_btn'])) {

                  $data = $_POST['search_data'];
                  $searchProducts = getSearch($data);
                  
                  if (mysqli_num_rows($searchProducts) > 0) {
                    foreach ($searchProducts as $item) {
                      ?>
                        <div class="col-md-3 mb-2">
                            <a href="view/product-view.php?product=<?=$item['slug']; ?>">
                                <div class="card">
                                    <div class="card-body mt-2">
                                        <img src="./uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                        <h6 class="text-center mt-2"><?= $item['name']; ?></h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                      <?php
                    }
                  }else{
                    ?>
                      <div class="card card-body text-center shadow">
                          <h4 class="py-3">There are no products to search for</h4>
                      </div>
                    <?php 
                  }
                }else{
                  $homeProducts = getProducts();
                  
                  if (mysqli_num_rows($homeProducts) > 0)
                  {
                    foreach ($homeProducts as $item)
                    {
                      ?>
                        <div id="content" class="col-md-3 mb-2">
                            <a href="view/product-view.php?product=<?=$item['slug']; ?>">
                                <div class="card">
                                    <div class="card-body mt-2">
                                        <img src="./uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                        <h6 class="text-center mt-2"><?= $item['name']; ?></h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                  }
                  ?>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination float-end">
                      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <?php 
                        $products = getAll('products');
                        $products_count = mysqli_num_rows($products);
                        $products_button = ceil($products_count / 8);
                        $i = 1;
                        for($i; $i <= $products_button; $i++){ 
                          echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                        } 
                      ?>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav>
                  <?php 
                }
                ?>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="py-5 bg-f2f2f2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>About Us</h4>
        <div class="underline mb-2"></div>
        <p>A mobile phone, cellular phone, cell phone, cellphone, handphone, hand phone or pocket phone, sometimes shortened to simply mobile, cell, or just phone, is a portable telephone that can make and receive calls over a radio frequency link while the user is moving within a telephone service area</p>
        <p>
          A mobile phone, cellular phone, cell phone, cellphone, handphone, hand phone or pocket phone, sometimes shortened to simply mobile, cell, or just phone, is a portable telephone that can make and receive calls over a radio frequency link while the user is moving within a telephone service area
          <br>
          A mobile phone, cellular phone, cell phone, cellphone, handphone, hand phone or pocket phone, sometimes shortened to simply mobile, cell, or just phone, is a portable telephone that can make and receive calls over a radio frequency link while the user is moving within a telephone service area
        </p>
            
      </div>
    </div>
  </div>
</div>

<div class="py-5 bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h4 class="text-white">Shop</h4>
        <div class="underline mb-2"></div>
        <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> Home</a><br>
        <a href="#" class="text-white"><i class="fa fa-angle-right"></i> Abount Us</a><br>
        <a href="cart.php" class="text-white"><i class="fa fa-angle-right"></i> My Cart</a><br>
        <a href="categories.php" class="text-white"><i class="fa fa-angle-right"> Our Collections</a></i><br>
      </div>
      <div class="col-md-3">
            <h4 class="text-white">Address</h4>
            <div class="underline mb-2"></div>
            <p class="text-white">
              #24, Ground Floor,
              2nd street xyz lauout,
              Bangalore, India.
            </p>
            <a href="Tel:+84905869960" class="text-white"><i class="fa fa-phone"></i>+84905869960</a>
            <a href="Email:vanthinhhk199@gmail.com" class="text-white"><i class="fa fa-envelope"></i>vanthinhhk199@gmail.com</a>
      </div>
      <div class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8115.669908859647!2d108.2189332161273!3d16.048659593840586!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c69cf3c7a3%3A0x2927993f5153d336!2zQuG6o28gdMOgbmcgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1svi!2s!4v1671994017188!5m2!1svi!2s" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</div>
<div class="py-2 bg-danger">
  <div class="text-center">
    <p class="mb-0 text-white">All rights reserved. Copyright @ Thinh - <?= date('Y') ?></p>
  </div>
</div>

<?php include('./includes/footer.php'); ?>
<script>
  $(document).ready(function () {
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
    })
  });

</script>
<script type="text/javascript">
  $("#reloader").click(function () { 
    $("#content").load("#content");
  });
</script>
  