<?php 
    include("header.php");
?>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Content-->
      <!-- Main Slider-->
      <section class="hero-slider" style="background-image: url(img/hero-slider/main-bg.jpg);">
        <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
<?php
//Code to select data form the table database
$all=$db->wsubCategory();
        //check if there are available data
        if(!empty($all)):
            $count = 0; 
            foreach($all as $show): 
                $totSub=$db->getTotalSubProduct($show['subCategoryID']);
                $count++; 
?>          

          <div class="item">
            <div class="container padding-top-3x">
              <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                  <div class="from-bottom"><img class="d-inline-block w-150 mb-4" src="img/hero-slider/logo01.png" alt="Puma">
                    <div class="h2 text-body text-normal mb-2 pt-1"><?php echo $show['subCategory_name'];?></div>
                    <div class="h2 text-body text-normal mb-4 pb-1">starting at <span class="text-bold">$37.99</span></div>
                  </div><a class="btn btn-primary scale-up delay-1" href="views/shop-product.php?SubCategory=<?php echo urlencode(trim($show['subCategory_name']))?>&ct=<?php echo $showCategory['categoryID'];?>&sct=<?php echo $show['subCategoryID'];?>">View Products</a>
                </div>
                <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src="img/hero-slider/01.png" alt="Puma Backpack"></div>
              </div>
            </div>
          </div>
<?php
    endforeach;
    //else: echo '<strong><br>No Product Found!</strong>';
endif;
?>   

        </div>
      </section>

      <!-- Top Categories-->
      <section class="container padding-top-3x">
        <h3 class="text-center mb-30">Our Categories</h3>
        <div class="row">
<?php
//Select categories & sub categories
$tblName='category';
$condition=array(
                    'Order by' => 'categoryID ID asc',
                    'where'    => array('post' =>1, 'status' => 1)
                );
$allCategory=$db->getRows($tblName,$condition);
//check if there are available data
if(!empty($allCategory)):
    $count = 0; 
    foreach($allCategory as $showCategory): 
        $count++; 
?>

          <div class="col-md-4 col-sm-6">
            <div class="card mb-30"><a class="card-img-tiles" href="views/shop-products.php?Category=<?php echo urlencode(trim($showCategory['category_name']))?>&ct=<?php echo $showCategory['categoryID'];?>">
                <div class="inner">
                  <div class="main-img"><img src="<?php echo 'globus/'.substr($showCategory['category_picture1'],6);?>" alt="<?php echo 'globus'.substr($showCategoty['category_picture3'],6);?>"></div>
                  <div class="thumblist"><img src="<?php echo 'globus/'.substr($showCategory['category_picture2'],6);?>" alt="Category"><img src="<?php echo 'globus/'.substr($showCategory['category_picture3'],6);?>" alt="Category"></div>
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title"><?php echo $showCategory['category_name'];?> </h4>
                <p class="text-muted">Starting from minimum Pices </p><a class="btn btn-outline-primary btn-sm" href="views/shop-products.php?Category=<?php echo urlencode(trim($showCategory['category_name']))?>&ct=<?php echo $showCategory['categoryID'];?>">View Products</a>
              </div>
            </div>
          </div>

<?php
    endforeach;
endif;
?>
        </div>
        <div class="text-center"><a class="btn btn-outline-secondary margin-top-none" href="shop-categories.php">All Categories</a></div>
      </section>
      <!-- Promo #1-->
      <section class="container-fluid padding-top-3x">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 mb-30">
            <div class="rounded bg-faded position-relative padding-top-3x padding-bottom-3x"><span class="product-badge text-danger" style="top: 24px; left: 24px;"></span>
              <div class="text-center">
                <h2 class="display-2 text-bold mb-2">Welcome to Globus.com !</h2>
                <h4 class="h3 text-normal mb-4">
                    Here, you can shop anything related to Car and accessories, Technology, Art and Fornuture and/or beauty and life <br>
                    We have partnership with big companies allover the world such as BMW ,Apple, Kylie Cosmetics<br>
                    We are there for you and your satifaction is our priority<br>
                    Live lexury life in easy way!</h4>
                <div class="countdown mb-3" data-date-time="07/30/2018 12:00:00">
                  
                </div><br><a class="btn btn-primary margin-bottom-none" href="#">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 mb-30" style="min-height: 270px;">
            <div class="img-cover rounded" ></div>
            <video width="1920" height="1080" controls style="height: 100%!important;">
              <source src="Videos/INTROGlobussystem.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
          </div>
        </div>
      </section>
      <!-- Promo #2-->
      <!-- <section class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12">
            <div class="fw-section rounded padding-top-4x padding-bottom-4x" style="background-image: url(img/banners/home02.jpg);"><span class="overlay rounded" style="opacity: .35;"></span>
              <div class="text-center">
                <h3 class="display-4 text-normal text-white text-shadow mb-1">Old Collection</h3>
                <h2 class="display-2 text-bold text-white text-shadow">HUGE SALE!</h2>
                <h4 class="d-inline-block h2 text-normal text-white text-shadow border-default border-left-0 border-right-0 mb-4">at our outlet stores</h4><br><a class="btn btn-primary margin-bottom-none" href="contacts.php">Locate Stores</a>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <!-- Featured Products Carousel-->
      
      <!-- Product Widgets
      <section class="container padding-bottom-2x">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">Top Sellers</h3>
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="shop-single.php"><img src="img/shop/widget/01.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="views/shop-product.php?cat=1">Oakley Kickback</a></h4><span class="entry-meta">$155.00</span>
                </div>
              </div>
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="views/shop-product.php?cat=1"><img src="img/shop/widget/03.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="views/shop-product.php?cat=1">Vented Straw Fedora</a></h4><span class="entry-meta">$49.50</span>
                </div>
              </div>
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="views/shop-product.php?cat=1"><img src="img/shop/widget/04.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="views/shop-product.php?cat=1">Big Wordmark Tote</a></h4><span class="entry-meta">$29.99</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">New Arrivals</h3>
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="shop-single.php"><img src="img/shop/widget/05.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.php">Union Park</a></h4><span class="entry-meta">$49.99</span>
                </div>
              </div>
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="views/shop-product.php?cat=1"><img src="img/shop/widget/06.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="views/shop-product.php?cat=1">Cole Haan Crossbody</a></h4><span class="entry-meta">$200.00</span>
                </div>
              </div>
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="views/shop-product.php?cat=1"><img src="img/shop/widget/07.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="views/shop-product.php?cat=1">Skagen Holst Watch</a></h4><span class="entry-meta">$145.00</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">Best Rated</h3>
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="views/shop-product.php?cat=1"><img src="img/shop/widget/08.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="views/shop-product.php?cat=1">Jordan's City Hoodie</a></h4><span class="entry-meta">$65.00</span>
                </div>
              </div>
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="views/shop-product.php?cat=1"><img src="img/shop/widget/09.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="views/shop-product.php?cat=1">Palace Shell Track Jacket</a></h4><span class="entry-meta">$36.99</span>
                </div>
              </div>
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="views/shop-product.php?cat=1"><img src="img/shop/widget/10.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="views/shop-product.php?cat=1">Off the Shoulder Top</a></h4><span class="entry-meta">$128.00</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>-->
      <!-- Popular Brands-->
      <section class="bg-faded padding-top-3x padding-bottom-3x">
        <div class="container">
          <h3 class="text-center mb-30 pb-2">Our Parteners</h3>
          <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/01.png" alt="Adidas"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/02.png" alt="Brooks"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/03.png" alt="Valentino"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/04.png" alt="Nike"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/05.png" alt="Puma"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/06.png" alt="New Balance"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/07.png" alt="Dior"></div>
        </div>
      </section>
      <!-- Services-->
      <section class="container padding-top-3x padding-bottom-2x">
        <div class="row">
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/01.png" alt="Shipping">
            <h6>Free Worldwide Shipping</h6>
            <p class="text-muted margin-bottom-none">Free shipping for all orders over $100</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/02.png" alt="Money Back">
            <h6>Money Back Guarantee</h6>
            <p class="text-muted margin-bottom-none">We return money within 30 days</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/03.png" alt="Support">
            <h6>24/7 Customer Support</h6>
            <p class="text-muted margin-bottom-none">Friendly 24/7 customer support</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/04.png" alt="Payment">
            <h6>Secure Online Payment</h6>
            <p class="text-muted margin-bottom-none">We posess SSL / Secure Certificate</p>
          </div>
        </div>
      </section>
      <!-- Site Footer-->
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <!-- Contact Info-->
              <section class="widget widget-light-skin">
                <h3 class="widget-title">Get In Touch With Us</h3>
                <p class="text-white">Phone: +250782343969</p>
                <ul class="list-unstyled text-sm text-white">
                  <li><span class="opacity-50">Monday-Friday:</span>9.00 am - 8.00 pm</li>
                  <li><span class="opacity-50">Saturday:</span>10.00 am - 6.00 pm</li>
                </ul>
                <p><a class="navi-link-light" href="#">nsanze.olivier@gmail.com</a></p><a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
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
              <div class="margin-bottom-1x" style="max-width: 615px;"><img src="img/payment_methods.png" alt="Payment Methods">
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
          <p class="footer-copyright">© All rights reserved. Made with &nbsp;<i class="icon-heart text-danger"></i><a href="https://www.linkedin.com/in/nsanze-olivier-66680310/" target="_blank"> &nbsp;by Oly</a></p>
        </div>
      </footer>
    </div>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="js/vendor.min.js"></script>
    <script src="js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="customizer/customizer.min.js"></script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.0/template-1/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jun 2019 09:14:40 GMT -->
</html>