<?php require('top.php') ?>


<style>
   .item-1 {
      border: 1px solid orange;
      margin: 10px;
      height: 250px;
      min-height: 100px;
      min-width: 150px;
      max-width: 150px;
   }

   .box {
      margin-left: auto;
   }

   h6 {
      text-align: left;
   }

   h3 {
      font-weight: bold;
      text-align: left;
      margin-top: -15px;
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
            <a href="#" class="product-link" data-product-id="<?php echo $list['id'] ?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" width="80%" alt=""></a>
            <h6><a href="#" class="product-link" data-product-id="<?php echo $list['id'] ?>"><?php echo strlen($list['name']) > 25 ? substr($list['name'], 0, 25) . '...' : $list['name'] ?></a></h6>
            <h3>Rs.<?php echo $list['price'] ?></h3>
            <h5><del>Rs.<?php echo $list['mrp'] ?></del></h5>
            <div class="neeche-wala">
                <div class="stars">
                    <small class="fa fa-star text-warning mr-1"></small>
                    <small class="fa fa-star text-warning mr-1"></small>
                    <small class="fa fa-star text-warning mr-1"></small>
                    <small class="fa fa-star text-warning mr-1"></small>
                    <small class="fa fa-star text-warning mr-1"></small>
                </div>
                <div class="add-to-cart">
                    <button class="btn btn-danger btn-add-to-cart"><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')">Add item +</a></button>
                </div>
            </div>
         </div>
      <?php } ?>
   </div>
</div>
<!-- latest product section end -->

<!-- Product detail modal -->
<div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="productDetailModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="productDetailModalLabel">Product Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="productDetailBody">
            <!-- Product details will be loaded here via AJAX -->
         </div>
      </div>
   </div>
</div>

<script>
   $(document).ready(function(){
      $('.product-link').click(function(e){
         e.preventDefault(); // Prevent default action of clicking on the link

         var productId = $(this).data('product-id');

         $.ajax({
            url: 'product_details.php', // Change this to the actual URL of your product details page
            type: 'GET',
            data: { id: productId },
            success: function(response){
               $('#productDetailBody').html(response);
               $('#productDetailModal').modal('show');
            }
         });
      });
   });
</script>


<!-- electronic section start -->
<div class="fashion_section">
    <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital" style="background-color: #0D1282; color: #fff;">New Arrivals</h1>
                    <div class="fashion_section_2">
                        <div class="row">
                            <?php
                            $get_product = get_product($con, 3);
                            foreach ($get_product as $list) {
                            ?>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="box_main">
                                        <h4 class="shirt_text"><?php echo $list['name']; ?></h4>
                                        <p class="price_text">Start Price <span style="color: #262626;">$ <?php echo $list['price']; ?></span></p>
                                        <div class="electronic_img"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image']; ?>" alt="product images"></div>
                                        <div class="btn_main">
                                            <div class="buy_bt"><a href="#">Buy Now</a></div>
                                            <div class="seemore_bt"><a href="#">See More</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <h1 class="fashion_taital" style="background-color: #D71313; color: #fff;">HOT</h1>
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
            <div class="carousel-item">
                <div class="container">
                    <h1 class="fashion_taital" style="background-color: #1A5D1A; color: #fff;">Trending</h1>
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
<!-- electronic section end -->



<?php require('footer.php') ?>