<?php
require('top.php');

if (!isset($_GET['id']) && $_GET['id'] != '') {
?>
   <script>
      window.location.href = 'index.php';
   </script>
<?php
}

$cat_id = mysqli_real_escape_string($con, $_GET['id']);

$price_high_selected = "";
$price_low_selected = "";
$new_selected = "";
$old_selected = "";
$sort_order = "";
if (isset($_GET['sort'])) {
   $sort = mysqli_real_escape_string($con, $_GET['sort']);
   if ($sort == "price_high") {
      $sort_order = " order by product.price desc ";
      $price_high_selected = "selected";
   }
   if ($sort == "price_low") {
      $sort_order = " order by product.price asc ";
      $price_low_selected = "selected";
   }
   if ($sort == "new") {
      $sort_order = " order by product.id desc ";
      $new_selected = "selected";
   }
   if ($sort == "old") {
      $sort_order = " order by product.id asc ";
      $old_selected = "selected";
   }
}

if ($cat_id > 0) {
   $get_product = get_product($con, '', $cat_id, '', '', $sort_order);
} else {
?>
   <script>
      window.location.href = 'index.php';
   </script>
<?php
}
?>
<style>
   select {
      margin-left: 30%;
   }
</style>
<!-- latest product section start -->



<?php if (count($get_product) > 0) { ?>
   <div class="fashion_section">
      <div class="container">
         <h1 class="fashion_taital">Man & Woman Fashion</h1>
         <select id="sort_product_id" onchange="sort_product_drop('<?php echo $cat_id ?>','<?php echo SITE_PATH ?>')">
            <option value="">Default softing</option>
            <option value="price_low" <?php echo $price_low_selected ?>>Sort by price low to hight</option>
            <option value="price_high" <?php echo $price_high_selected ?>>Sort by price high to low</option>
            <option value="new" <?php echo $new_selected ?>>Sort by new first</option>
            <option value="old" <?php echo $old_selected ?>>Sort by old first</option>
         </select>
         <div class="fashion_section_2">
            <div class="row">
               <?php
               foreach ($get_product as $list) {
               ?>
                  <div class="col-lg-4 col-sm-4">
                     <div class="box_main">
                        <h4 class="shirt_text"><?php echo $list['name'] ?></h4>
                        <p class="price_text">Price <span style="color: #262626;">Rs. <?php echo $list['price'] ?></span></p>
                        <div class="tshirt_img"><a href="product.php?id=<?php echo $list['id'] ?>">
                              <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                           </a></div>
                        <div class="btn_main">
                           <div class="buy_bt"><a href="#">Buy Now</a></div>
                           <div class="seemore_bt"><a href="product.php?id=<?php echo $list['id'] ?>">See More</a></div>
                        </div>
                     </div>
                  </div>
               <?php } ?>
            </div>
         </div>
      </div>
   <?php } else {
   echo "Data not found";
} ?>
   <!-- latest product section end -->
   <?php include('footer.php') ?>