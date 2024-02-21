<?php
require('top.php');
$str = mysqli_real_escape_string($con, $_GET['str']);
if ($str != '') {
   $get_product = get_product($con, '', '', '', $str);
} else {
?>
   <script>
      window.location.href = 'index.php';
   </script>
<?php
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
</style>

<?php if (count($get_product) > 0) { ?>
   <div class="container text-center">
      <div class="row box">
         <?php
         foreach ($get_product as $list) {
         ?>
            <div class="col item-1">
               <a href="product.php?id=<?php echo $list['id'] ?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" width="100%" alt=""></a>
               <h6><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a>
               </h6>
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
<?php require('footer.php') ?>