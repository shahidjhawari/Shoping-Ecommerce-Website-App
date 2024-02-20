<?php require('top.php') ?>

<!-- latest product section start -->
<div class="container">
   <h1 class="text-center">Man & Woman Fashion</h1>
   <div class="row">
      <?php
      $get_product = get_product($con, 6);
      $count = 0;
      foreach ($get_product as $list) {
         ?>
         <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card">
               <img class="card-img-top" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
               <div class="card-body">
                  <h4 class="card-title"><?php echo $list['name'] ?></h4>
                  <p class="card-text">Price <span style="color: #262626;">Rs. <?php echo $list['price'] ?></span></p>
                  <div class="d-flex justify-content-between">
                     <a href="#" class="btn btn-primary">Buy Now</a>
                     <div>
                        <a href="product.php?id=<?php echo $list['id'] ?>" class="btn btn-secondary">See More</a>
                        <a href="wishlist.php" class="btn btn-info ml-3" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')">Add to fav</a>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php
         $count++;
         if ($count % 2 == 0) {
            echo '</div><div class="row">';
         }
      } ?>
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
         <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
         </a>
      </div>
   </div>
   <!-- Best Seller section start -->
   <!-- electronic section end -->
   <!-- jewellery  section start -->
   <div class="jewellery_section">
      <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container">
                  <h1 class="fashion_taital">Jewellery Accessories</h1>
                  <div class="fashion_section_2">
                     <div class="row">
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">Jumkas</h4>
                              <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                              <div class="jewellery_img"><img src="images/jhumka-img.png"></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#">Buy Now</a></div>
                                 <div class="seemore_bt"><a href="#">See More</a></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">Necklaces</h4>
                              <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                              <div class="jewellery_img"><img src="images/neklesh-img.png"></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#">Buy Now</a></div>
                                 <div class="seemore_bt"><a href="#">See More</a></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">Kangans</h4>
                              <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                              <div class="jewellery_img"><img src="images/kangan-img.png"></div>
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
            <div class="carousel-item">
               <div class="container">
                  <h1 class="fashion_taital">Jewellery Accessories</h1>
                  <div class="fashion_section_2">
                     <div class="row">
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">Jumkas</h4>
                              <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                              <div class="jewellery_img"><img src="images/jhumka-img.png"></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#">Buy Now</a></div>
                                 <div class="seemore_bt"><a href="#">See More</a></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">Necklaces</h4>
                              <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                              <div class="jewellery_img"><img src="images/neklesh-img.png"></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#">Buy Now</a></div>
                                 <div class="seemore_bt"><a href="#">See More</a></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">Kangans</h4>
                              <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                              <div class="jewellery_img"><img src="images/kangan-img.png"></div>
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
            <div class="carousel-item">
               <div class="container">
                  <h1 class="fashion_taital">Jewellery Accessories</h1>
                  <div class="fashion_section_2">
                     <div class="row">
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">Jumkas</h4>
                              <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                              <div class="jewellery_img"><img src="images/jhumka-img.png"></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#">Buy Now</a></div>
                                 <div class="seemore_bt"><a href="#">See More</a></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">Necklaces</h4>
                              <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                              <div class="jewellery_img"><img src="images/neklesh-img.png"></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#">Buy Now</a></div>
                                 <div class="seemore_bt"><a href="#">See More</a></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">Kangans</h4>
                              <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                              <div class="jewellery_img"><img src="images/kangan-img.png"></div>
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
         <a class="carousel-control-prev" href="#jewellery_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#jewellery_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
         </a>
         <div class="loader_main">
            <div class="loader"></div>
         </div>
      </div>
   </div>
   <!-- jewellery  section end -->
   <?php require('footer.php') ?>