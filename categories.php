<?php
require('top.php');

if(!isset($_GET['id']) || $_GET['id']==''){
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
    exit; // Added to stop further execution if 'id' is not set
}

$cat_id=mysqli_real_escape_string($con,$_GET['id']);

$sub_categories='';
if(isset($_GET['sub_categories'])){
    $sub_categories=mysqli_real_escape_string($con,$_GET['sub_categories']);
}

$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";

if(isset($_GET['sort'])){
    $sort=mysqli_real_escape_string($con,$_GET['sort']);
    if($sort=="price_high"){
        $sort_order=" order by product.price desc ";
        $price_high_selected="selected";    
    } elseif($sort=="price_low"){
        $sort_order=" order by product.price asc ";
        $price_low_selected="selected";
    } elseif($sort=="new"){
        $sort_order=" order by product.id desc ";
        $new_selected="selected";
    } elseif($sort=="old"){
        $sort_order=" order by product.id asc ";
        $old_selected="selected";
    }
}

if($cat_id > 0 && $sub_categories != '') {
   // Fetch products based on both category and subcategory
   $get_product = get_product($con, '', $cat_id, $sub_categories, '', $sort_order);
} elseif ($cat_id > 0) {
   // Fetch products only based on category
   $get_product = get_product($con, '', $cat_id, '', '', $sort_order);
} else {
   ?>
   <script>
   window.location.href='index.php';
   </script>
   <?php
   exit; // Added to stop further execution if category or subcategory is not valid
}
                                  
?>

<style>
   .item-1 {
      border: 1px solid orange;
      margin: 10px;
      min-height: 100px;
      min-width: 150px;
      max-width: 150px;
   }

   .box {
      margin-left: auto;
   }

   h6 {
      text-align: left;
      margin-top: 5px;
   }

   h3 {
      font-weight: bold;
      text-align: left;
   }

   h5 {
      margin-top: -10px;
      text-align: left;
   }
   select {
      margin-left: 25%;
      padding: 5px;
      border: 2px solid black;
      border-radius: 5px;
      color: black;
   }
</style>

<!-- latest product section start -->
<?php
$sub_cat_res = mysqli_query($con, "select * from sub_categories where status='1' and categories_id='$cat_id'");
if (mysqli_num_rows($sub_cat_res) > 0) {
?>
   <div id="sub-cate-box">
      <?php
      while ($sub_cat_rows = mysqli_fetch_assoc($sub_cat_res)) {
         echo '<h3 class="sub-cate-heading"><a href="categories.php?id=' . $cat_id . '&sub_categories=' . $sub_cat_rows['id'] . '">' . $sub_cat_rows['sub_categories'] . '</a></h3>';
      }
      ?>
   </div>
<?php } ?>

<?php if (count($get_product) > 0) { ?>
   <h1 class="fashion_taital">NEW ARRIVAL</h1>
   <select id="sort_product_id" onchange="sort_product_drop('<?php echo $cat_id ?>','<?php echo SITE_PATH ?>')">
      <option value="">Default sorting</option>
      <option value="price_low" <?php echo $price_low_selected ?>>Sort by price low to high</option>
      <option value="price_high" <?php echo $price_high_selected ?>>Sort by price high to low</option>
      <option value="new" <?php echo $new_selected ?>>Sort by new first</option>
      <option value="old" <?php echo $old_selected ?>>Sort by old first</option>
   </select>

   <div class="container text-center">
      <div class="row box">
         <?php
         foreach ($get_product as $list) {
         ?>
            <div class="col item-1">
               <a href="product.php?id=<?php echo $list['id'] ?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" width="100%" alt=""></a>
               <h6><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h6>
               <h3>Rs.<?php echo $list['price'] ?></h3>
               <h5><del>Rs.<?php echo $list['mrp'] ?></del></h5>
               <small class="fa fa-star text-warning mr-1"></small>
               <small class="fa fa-star text-warning mr-1"></small>
               <small class="fa fa-star text-warning mr-1"></small>
               <small class="fa fa-star text-warning mr-1"></small>
               <small class="fa fa-star text-warning mr-1"></small>
            </div>
         <?php } ?>
      </div>
   </div>
<?php } else {
   echo "Data not found";
} ?>
<!-- latest product section end -->
<?php include('footer.php') ?>
