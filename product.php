<?php
ob_start();
require('top.php');
if (isset($_GET['id'])) {
  $product_id = mysqli_real_escape_string($con, $_GET['id']);
  if ($product_id > 0) {
    $get_product = get_product($con, '', '', $product_id);
  } else {
?>
    <script>
      window.location.href = 'index.php';
    </script>
  <?php
  }

  $resMultipleImages = mysqli_query($con, "select product_images from product_images where product_id='$product_id'");
  $multipleImages = [];
  if (mysqli_num_rows($resMultipleImages) > 0) {
    while ($rowMultipleImages = mysqli_fetch_assoc($resMultipleImages)) {
      $multipleImages[] = $rowMultipleImages['product_images'];
    }
  }
} else {
  ?>
  <script>
    window.location.href = 'index.php';
  </script>
<?php
}
?>

<style>
  .product-container {
    max-width: 400px;
    margin: 100px 0 20px 50px;
    padding: 20px;
  }

  .product-image {
    max-width: 100%;
    height: auto;
    margin-top: 20px;
  }

  .product-price {
    font-size: 24px;
    font-weight: bold;
  }

  .product-name {
    font-size: 24px;
    font-weight: bold;
    margin-top: 10px;
  }

  .old-price {
    font-size: 18px;
    color: red;
    text-decoration: line-through;
  }

  .product-categories {
    font-size: 14px;
    color: #666;
    margin-top: 10px;
  }

  .quantity-container {
    display: flex;
    align-items: center;
  }

  .quantity-label {
    margin-right: 10px;
  }

  .quantity-button {
    background-color: #f8f9fa;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
  }

  .add-to-cart-btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    margin-top: 20px;
    margin-right: 100px;
  }

  .buy-now-btn {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    margin-top: 20px;
  }

  .product-short-description {
    font-size: 16px;
    margin-top: 10px;
  }

  .product-long-description {
    font-size: 14px;
    margin-top: 20px;
    line-height: 1.6;
  }
</style>

<div class="container">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
    <ol class="carousel-indicators">
      <?php
      // Output the carousel indicators
      foreach ($multipleImages as $key => $image) {
        $active = ($key == 0) ? 'active' : '';
        echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $key . '" class="' . $active . '"></li>';
      }
      ?>
    </ol>
    <div class="carousel-inner">
      <?php
      // Output the product image with the class "product-image" as the first item in the carousel
      echo '<div class="carousel-item active">
              <img class="d-block w-100" src="' . PRODUCT_IMAGE_SITE_PATH . $get_product['0']['image'] . '" alt="Product Image">
            </div>';

      // Output the carousel images from $multipleImages
      foreach ($multipleImages as $key => $image) {
        echo '<div class="carousel-item">
                <img class="d-block w-100" src="' . PRODUCT_MULTIPLE_IMAGE_SITE_PATH . $image . '" alt="Slide ' . $key . '">
              </div>';
      }
      ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <?php if (isset($multipleImages[0])) { ?>
    <div>
      <?php
      foreach ($multipleImages as $list) {
        echo "<img width='50px' src='" . PRODUCT_MULTIPLE_IMAGE_SITE_PATH . $list . "' onclick=showMultipleImage('" . PRODUCT_MULTIPLE_IMAGE_SITE_PATH . $list . "')>";
      }
      ?>
    </div>
  <?php } ?>

  <!-- Rest of your product details and controls -->
  <div class="product-name"><?php echo $get_product['0']['name'] ?></div>
  <div class="product-short-description">
    <?php echo $get_product['0']['description'] ?>
  </div>
  <div class="product-price">Rs. <?php echo $get_product['0']['price'] ?></div>
  <div class="old-price">Rs. <?php echo $get_product['0']['mrp'] ?></div>
  <div class="product-categories">
    <?php echo $get_product['0']['categories'] ?>
  </div>
  <div class="product-long-description"><?php echo $get_product['0']['description'] ?></div>

  <div class="quantity-container">
    <div class="quantity-label">Quantity:</div>
    <input type="number" min="1" max="5" class="quantity-button" id="qty" value="1"></input>
  </div>

  <a href="cart.php" class="btn btn-primary add-to-cart-btn" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add')">Add to cart</a>
  <a href="#" class="btn btn-success buy-now-btn">Buy Now</a>
</div>



<?php include('footer.php') ?>