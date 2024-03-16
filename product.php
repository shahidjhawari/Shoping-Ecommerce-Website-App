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
    margin-bottom: 30px;
  }

  .buy-now-btn {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    margin-top: 20px;
    margin-bottom: 30px;
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

<<div class="container">
  <?php foreach ($get_product as $product) { ?>
    <div class="product-details">
      <a href="product.php?id=<?php echo $product['id']; ?>">
        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $product['image'] ?>" alt="full-image" class="product-image">
      </a>

      <?php
      if (isset($multipleImages[$product['id']])) {
        echo '<div class="multiple-images">';
        foreach ($multipleImages[$product['id']] as $image) {
          echo "<img width='50px' src='" . PRODUCT_MULTIPLE_IMAGE_SITE_PATH . $image . "' onclick='showMultipleImage(\"" . PRODUCT_MULTIPLE_IMAGE_SITE_PATH . $image . "\", " . $product['id'] . ")'>";
        }
        echo '</div>';
      }
      ?>

      <div class="product-name"><?php echo $product['name'] ?></div>
      <div class="product-short-description">
        <?php echo strlen($product['description']) > 100 ? substr($product['description'], 0, 100) . '...' : $product['description']; ?>
      </div>
      <div class="product-price">Rs. <?php echo $product['price'] ?></div>
      <div class="old-price">Rs. <?php echo $product['mrp'] ?></div>
      <div class="product-categories">
        <?php echo $product['categories'] ?>
      </div>
      <div class="product-long-description"><?php echo $product['description'] ?></div>

      <div class="social-share-box">
        <a href="https://www.facebook.com/share.php?u=<?php echo $meta_url ?>"><img src='images/facebook.png' width="50px" /></a>
        <a href="https://twitter.com/share?text=<?php echo $product['name'] ?>&url=<?php echo $meta_url ?>"><img src='images/twitter.png' width="50px" /></a>
        <a href="https://whatsapp.com/send?text=<?php echo $product['name'] ?> <?php echo $meta_url ?>"><img src='images/whatsapp.png' width="50px" /></a>
      </div>

      <div class="quantity-container">
        <div class="quantity-label">Quantity:</div>
        <input type="number" min="1" max="5" class="quantity-button" id="qty_<?php echo $product['id']; ?>" value="1"></input>
      </div>

      <a href="cart.php" class="btn btn-primary add-to-cart-btn" onclick="manage_cart('<?php echo $product['id'] ?>','add')">Add to cart</a>
      <a href="#" class="btn btn-success buy-now-btn">Buy Now</a>
    </div>
  <?php } ?>
</div>

<script>
  function showMultipleImage(imagePath, productId) {
    document.getElementById('mainProductImage_' + productId).src = imagePath;
  }
</script>





<?php include('footer.php') ?>