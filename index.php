<?php require('top.php') ?>

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

<!-- latest product section start -->

<div class="container text-center">
   <div class="row box">
      <?php
      $get_product = get_product($con, 16);
      foreach ($get_product as $list) {
      ?>
         <div class="col item-1">
            <a href="product.php?id=<?php echo $list['id'] ?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" width="100%" alt="" ></a>
            <h6><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h6>
            <h3>Rs.<?php echo $list['price'] ?></h3>
            <h5><del>Rs.<?php echo $list['mrp'] ?></del></h5>
               <small class="fa fa-star text-warning mr-1"></small>
               <small class="fa fa-star text-warning mr-1"></small>
               <small class="fa fa-star text-warning mr-1"></small>
               <small class="fa fa-star text-warning mr-1"></small>
               <small class="fa fa-star text-warning mr-1"></small>
               <div>
            <button class="btn btn-danger btn-add-to-cart"><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')">Add item +</a></button>
         </div>
         </div>
      <?php } ?>
   </div>
</div>

<!-- latest product section end -->

<!-- Best Seller section start -->
<div class="fashion_section">
   <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               <h1 class="fashion_taital" style="background-color: #EE5A24; color: white; padding-top: 6px; ">Top Rated</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <?php
                        $get_product = get_product($con, 4, '', '', '', '', 'yes');
                        foreach ($get_product as $list) {
                        ?>
                           <div class="box_main">
                              <h4 class="shirt_text"><?php echo $list['name'] ?></h4>
                              <p class="price_text">Rs. <span style="color: #262626;"><?php echo $list['price'] ?></span></p>
                              <div class="electronic_img"><a href="product.php?id=<?php echo $list['id'] ?>">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                                 </a></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#">Buy Now</a></div>
                                 <div class="seemore_bt"><a href="#">See More</a></div>
                              </div>
                           </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Best Seller section End -->

         <div class="carousel-item">
            <div class="container">
               <h1 class="fashion_taital" style="background-color: #0652DD; color: white; padding-top: 6px; ">New Arrival</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Laptop</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="images/laptop-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Mobile</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="images/mobile-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Computers</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="images/computer-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Best Seller section start -->

         <div class="carousel-item">
            <div class="container">
               <h1 class="fashion_taital" style="background-color: #EA2027; color: white; padding-top: 6px; ">Hot</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Laptop</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="images/laptop-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Mobile</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="images/mobile-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Computers</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="images/computer-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Best Seller section start -->
<!-- electronic section end -->
      
   </div>
</div>
<!-- jewellery  section end -->
<?php require('footer.php') ?>