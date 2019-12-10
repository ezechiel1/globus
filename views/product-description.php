<?php 
    include("header.php");
    if(!isset($_GET['sct'])) header("location: dashboard.php");
      $subCategoryID=$_GET['sct'];
      $categoryID=$_GET['ct'];
      $productID=$_GET['pt'];
      $subCategory=urldecode($_GET['SubCategory']);
      //...Get path
      $sPath='../globus/'.substr($db->getSubCatPath($categoryID,$subCategoryID),6);
?>

  <body>
    <!-- Google Tag Manager (noscript)-->

 
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Single Product</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="../index.php">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="shop.php">Shop</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Single Product</li>
            </ul>
          </div>
        </div>
      </div>
<?php
//Code to select data form the table database
$all=$db->wProductDescription($categoryID,$subCategoryID,$productID);
        //check if there are available data
        if(!empty($all)):
            $count = 0; 
            foreach($all as $show): 
                $count++; 
?>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Poduct Gallery-->
          <div class="col-md-6">
            <div class="product-gallery"><span class="product-badge text-danger">30% Off</span>
              <div class="gallery-wrapper">
                <div class="gallery-item active"><a href="<?php echo $sPath.$show['product_picture'];?>" data-hash="one" data-size="1000x667"></a></div>
                <div class="gallery-item"><a href="../img/shop/single/02.jpg" data-hash="two" data-size="1000x667"></a></div>
                <div class="gallery-item"><a href="../img/shop/single/03.jpg" data-hash="three" data-size="1000x667"></a></div>
                <div class="gallery-item"><a href="../img/shop/single/04.jpg" data-hash="four" data-size="1000x667"></a></div>
                <div class="gallery-item"><a href="../img/shop/single/05.jpg" data-hash="five" data-size="1000x667"></a></div>
              </div>
              <div class="product-carousel owl-carousel">
                <div data-hash="one"><img src="<?php echo $sPath.$show['product_picture'];?>" alt="Product"></div>
                <div data-hash="two"><img src="../img/shop/single/02.jpg" alt="Product"></div>
                <div data-hash="three"><img src="../img/shop/single/03.jpg" alt="Product"></div>
                <div data-hash="four"><img src="../img/shop/single/04.jpg" alt="Product"></div>
                <div data-hash="five"><img src="../img/shop/single/05.jpg" alt="Product"></div>
              </div>
              <ul class="product-thumbnails">
                <li class="active"><a href="#one"><img src="<?php echo $sPath.$show['product_picture'];?>" alt="Product"></a></li>
                <li><a href="#two"><img src="../img/shop/single/th02.jpg" alt="Product"></a></li>
                <li><a href="#three"><img src="../img/shop/single/th03.jpg" alt="Product"></a></li>
                <li><a href="#four"><img src="../img/shop/single/th04.jpg" alt="Product"></a></li>
                <li><a href="#five"><img src="../img/shop/single/th05.jpg" alt="Product"></a></li>
              </ul>
            </div>
          </div>
          <!-- Product Info-->
          <div class="col-md-6">
            <div class="padding-top-2x mt-2 hidden-md-up"></div>
              <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
              </div><span class="text-muted align-middle">&nbsp;&nbsp;4.2 | 3 customer reviews</span>
            <h2 class="padding-top-1x text-normal"><?php echo $show['product_name'];?></h2><span class="h2 d-block">
              <del class="text-muted text-normal">$<?php echo ($show['product_price']+80);?></del>&nbsp; $<?php echo $show['product_price'];?></span>
            <p style="overflow: hidden;height: 189px;text-align: justify;"><?php echo $show['product_description'];?></p>
            <div class="row margin-top-1x">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="size">Men's size</label>
                  <select class="form-control" id="size">
                    <option>Chooze size</option>
                    <option>11.5</option>
                    <option>11</option>
                    <option>10.5</option>
                    <option>10</option>
                    <option>9.5</option>
                    <option>9</option>
                    <option>8.5</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="color">Choose color</label>
                  <select class="form-control" id="color">
                    <option>White/Red/Blue</option>
                    <option>Black/Orange/Green</option>
                    <option>Gray/Purple/White</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <select class="form-control" id="quantity">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="pt-1 mb-2"><span class="text-medium">SKU:</span> #21457832</div>
            <div class="padding-bottom-1x mb-2"><span class="text-medium">Categories:&nbsp;</span><a class="navi-link" href="#">Men’s shoes,</a><a class="navi-link" href="#"> Snickers,</a><a class="navi-link" href="#"> Sport shoes</a></div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-between">
              <div class="entry-share mt-2 mb-2"><span class="text-muted">Share:</span>
                <div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
              </div>
              <div class="sp-buttons mt-2 mb-2">

<?php 
if($_SESSION['sessData']!=''):
  $getTable=$db->getTableProduct($categoryID,$subCategoryID);
?>
                <input type="hidden" id="clientID" value="<?php echo $_SESSION['ClientID'];?>">
                  <input type="hidden" id="productID" value="<?php echo $show['productID'];?>">
                  <input type="hidden" id="product_table" value="<?php echo $getTable;?>">
                  <input type="hidden" id="subCategoryID" value="<?php echo $show['subCategoryID'];?>">
                  <input type="hidden" id="categoryID" value="<?php echo $show['categoryID'];?>">
                  <input type="hidden" id="quantity" value="1">
                 <input type="hidden" id="price" value="<?php echo $show['product_price'];?>">
<?php
 $select=$db->getRows('shop_wishing', array('where'=>array('clientID'=>$_SESSION['ClientID'],'productID'=>$productID, 'categoryID'=>$categoryID,'subCategoryID'=>$subCategoryID)));
 if (!empty($select)):
?>
                <span id="displayWish">
                  <button class="btn btn-outline-danger  btn-sm btn-wishlist" onclick="delLike();" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                </span>
<?php
   else:
?>
                <span id="displayWish">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" onclick="addLike();" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                </span>
<?php endif;?>

<?php
 $select=$db->getRows('shop_cart', array('where'=>array('clientID'=>$_SESSION['ClientID'],'productID'=>$productID, 'categoryID'=>$categoryID,'subCategoryID'=>$subCategoryID)));
    if (!empty($select)):
?>
                <span id="displayCart">
                  <button class="btn btn-danger" onclick="deltocart();" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-bag"></i> Delete to Cart</button>
                </span>
<?php
   else:
?>        
                <span id="displayCart">
                  <button class="btn btn-primary" onclick="addtocart();" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-bag"></i> Add to Cart</button>
                </span>

<?php endif;?>
<?php else:?>
                  <a href="account-login.php"><button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button></a>
                  <a href="account-login.php" class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product">Add to Cart</a>
 <?php endif;?>         
              </div>
            </div>
          </div>
        </div>
        <!-- Product Tabs-->
  <?php
  endforeach;
endif;
?>


        <!-- Related Products Carousel-->
        <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">You May Also Like</h3>
        <!-- Carousel-->
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
   <?php
//Code to select data form the table database
$all=$db->wProduct($categoryID,$subCategoryID);
        //check if there are available data
        if(!empty($all)):
            $count = 0; 
            foreach($all as $show): 
                $count++; 
?>      
          <!-- Product-->
          <div class="grid-item">
            <div class="product-card">
                <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                </div><a class="product-thumb" href="product-description.php?SubCategory=<?php echo urlencode(trim($show['product_name']))?>&ct=<?php echo $show['categoryID'];?>&sct=<?php echo $show['subCategoryID'];?>&pt=<?php echo $show['productID'];?>"><img src="<?php echo $sPath.$show['product_picture'];?>" alt="Product"></a>
              <h3 class="product-title"><a href="../views/product-description.php"><?php echo $show['product_name'];?></a></h3>
              <h4 class="product-price">$<?php echo $show['product_price'];?></h4>
              <div class="product-buttons">
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
              </div>
            </div>
          </div>
        
<?php
  endforeach;
endif;
?>
 </div>
      </div>
      <!-- Site Footer-->
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <!-- Contact Info-->
              <section class="widget widget-light-skin">
                <h3 class="widget-title">Get In Touch With Us</h3>
                <p class="text-white">Phone: 00 33 169 7720</p>
                <ul class="list-unstyled text-sm text-white">
                  <li><span class="opacity-50">Monday-Friday:</span>9.00 am - 8.00 pm</li>
                  <li><span class="opacity-50">Saturday:</span>10.00 am - 6.00 pm</li>
                </ul>
                <p><a class="navi-link-light" href="#">support@unishop.com</a></p><a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- Mobile App Buttons-->
              <section class="widget widget-light-skin">
                <h3 class="widget-title">Our Mobile App</h3><a class="market-button apple-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">App Store</span></a><a class="market-button google-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Google Play</span></a><a class="market-button windows-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Windows Store</span></a>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- About Us-->
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title">About Us</h3>
                <ul>
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">About Unishop</a></li>
                  <li><a href="#">Our Story</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Our Blog</a></li>
                </ul>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- Account / Shipping Info-->
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title">Account &amp; Shipping Info</h3>
                <ul>
                  <li><a href="#">Your Account</a></li>
                  <li><a href="#">Shipping Rates & Policies</a></li>
                  <li><a href="#">Refunds & Replacements</a></li>
                  <li><a href="#">Taxes</a></li>
                  <li><a href="#">Delivery Info</a></li>
                  <li><a href="#">Affiliate Program</a></li>
                </ul>
              </section>
            </div>
          </div>
          <hr class="hr-light mt-2 margin-bottom-2x">
          <div class="row">
            <div class="col-md-7 padding-bottom-1x">
              <!-- Payment Methods-->
              <div class="margin-bottom-1x" style="max-width: 615px;"><img src="../img/payment_methods.png" alt="Payment Methods">
              </div>
            </div>
            <div class="col-md-5 padding-bottom-1x">
              <div class="margin-top-1x hidden-md-up"></div>
              <!--Subscription-->
              <form class="subscribe-form" action="http://rokaux.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=1194bb7544" method="post" target="_blank" novalidate>
                <div class="clearfix">
                  <div class="input-group input-light">
                    <input class="form-control" type="email" name="EMAIL" placeholder="Your e-mail"><span class="input-group-addon"><i class="icon-mail"></i></span>
                  </div>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                  </div>
                  <button class="btn btn-primary" type="submit"><i class="icon-check"></i></button>
                </div><span class="form-text text-sm text-white opacity-50">Subscribe to our Newsletter to receive early discount offers, latest news, sales and promo information.</span>
              </form>
            </div>
          </div>
          <!-- Copyright-->
          <p class="footer-copyright">© All rights reserved. Made with &nbsp;<i class="icon-heart text-danger"></i><a href="http://rokaux.com/" target="_blank"> &nbsp;by rokaux</a></p>
        </div>
      </footer>
    </div>
    <!-- Photoswipe container-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
          </div>
        </div>
      </div>
    </div>
   
     
    
    <!-- Photoswipe container-->
    
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="../js/vendor.min.js"></script>
    <script src="../js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="../customizer/customizer.min.js"></script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.0/template-1/shop-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jun 2019 09:17:15 GMT -->
</html>