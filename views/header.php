<?php
//start session
session_start();
//$adminID= $_SESSION['adminID'];
//load and initialize database class
require_once '../globus/core/db.php';
$db = new DB();
//load and initialize Extra class
require_once '../globus/core/extra.php';
$extra = new Extra();
//handle client session 
if(!isset($_SESSION['sessData'])): $_SESSION['sessData']='';
endif;
include('ajax.php');
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.0/template-1/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jun 2019 09:12:54 GMT -->
<head>
    <meta charset="utf-8">
    <title>Unishop | Universal E-Commerce Template
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Unishop - Universal E-Commerce Template">
    <meta name="keywords" content="shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Rokaux">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="../css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="../css/styles.min.css">
    <!-- Customizer Styles-->
    <link rel="stylesheet" media="screen" href="../customizer/customizer.min.css">
    <!-- Google Tag Manager-->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../../../../www.googletagmanager.com/gtm5445.php?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-T4DJFPZ');
      
    </script>
    <!-- Modernizr-->
    <script src="../js/modernizr.min.js"></script>
  </head>
  <!-- Body-->
  <body>
    <!-- Google Tag Manager (noscript)-->
    <noscript>
      <iframe src="http://www.googletagmanager.com/ns.php?id=GTM-T4DJFPZ" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>
    <!-- Template Customizer-->
    <div class="customizer-backdrop"></div>
    <!-- <div class="customizer">
      <div class="customizer-toggle"><i class="icon-cog"></i></div>
      <div class="customizer-body">
        <div class="btn-group mb-4">
          <button class="btn btn-white btn-rounded btn-block dropdown-toggle my-0" type="button" data-toggle="dropdown">Choose Template</button>
          <div class="dropdown-menu"><a class="dropdown-item" href="index.php">Template 1 (Clothing)</a><a class="dropdown-item" href="http://themes.rokaux.com/unishop/v3.0/template-2/index.php">Template 2 (Furniture)</a><a class="dropdown-item" href="http://themes.rokaux.com/unishop/v3.0/template-3/index.php">Template 3 (Electronics)</a></div>
        </div>
        <div class="customizer-title">Choose color</div>
        <div class="customizer-color-switch"><a class="active" href="#" data-color="default" style="background-color: #0da9ef;"></a><a href="#" data-color="2ecc71" style="background-color: #2ecc71;"></a><a href="#" data-color="f39c12" style="background-color: #f39c12;"></a><a href="#" data-color="e74c3c" style="background-color: #e74c3c;"></a></div>
        <div class="customizer-title">Header option</div>
        <div class="form-group">
          <select class="form-control form-control-rounded input-light" id="header-option">
            <option value="sticky">Sticky</option>
            <option value="static">Static</option>
          </select>
        </div>
        <div class="customizer-title">Footer option</div>
        <div class="form-group">
          <select class="form-control form-control-rounded input-light" id="footer-option">
            <option value="dark">Dark</option>
            <option value="light">Light</option>
          </select>
        </div><a class="btn btn-primary btn-rounded btn-block margin-bottom-none" href="https://wrapbootstrap.com/theme/unishop-universal-e-commerce-template-WB0148688/?ref=rokaux">Buy Unishop</a>
      </div>
    </div> -->
    <!-- Off-Canvas Category Menu-->
    <div class="offcanvas-container" id="shop-categories">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title">Shop Categories</h3>
      </div>
      <nav class="offcanvas-menu">
        <ul class="menu">
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
          <li class="has-children"><span><a href="#"><?php echo $showCategory['category_name'];?></a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <?php
              //Select categories & sub categories
              $tblName='subcategory';
              $condition=array(
                                  'Order by' => 'usbCategoryID ID asc',
                                  'where' => array('categoryID' => $showCategory['categoryID'])
                              );
              $allSubCategory=$db->getRows($tblName,$condition);
              //check if there are available data
              if(!empty($allSubCategory)):
                  $count = 0; 
                  foreach($allSubCategory as $showSubCategory): 
                      $count++; 
              ?>
                  <li><a href="shop-product.php?SubCategory=<?php echo urlencode(trim($showSubCategory['subCategory_name']))?>&ct=<?php echo $showCategory['categoryID'];?>&sct=<?php echo $showSubCategory['subCategoryID'];?>"><?php echo $showSubCategory['subCategory_name'];?></a></li>
              <?php
                  endforeach;
              else: ?><li><a href="shop-product.php?Category=<?php echo urlencode(trim($showCategory['category_name']))?>&ct=<?php echo $showCategory['categoryID'];?>"><?php echo $showCategory['category_name'];?></a></li>
              <?php
              endif;
              ?>
            </ul>
          </li>
<?php
    endforeach;
endif;
?>
        </ul>
      </nav>
    </div>
    <!-- Off-Canvas Mobile Menu-->
    <div class="offcanvas-container" id="mobile-menu"><?php 
if($_SESSION['sessData']!=''):
  $table='client';
  $condition= array('where' => array('clientID'=>$_SESSION['ClientID']));
  $select=$db->getRows($table,$condition);
  if (!empty($select)):
    foreach ($select as $key):
?>
      <a class="account-link" href="account-orders.php">
        <div class="user-ava"><img src="<?='../img/client/'.$key['client_profil']?>" alt="Ns. Olivier">
        </div>
        <div class="user-info">
          <h6 class="user-name"><?=$key['client_fname'].' '.$key['client_lname']?></h6>
        </div>
      </a>
<?php
endforeach;
endif;
endif;
?>
          <nav class="offcanvas-menu">
            <ul class="menu">
              <li class="has-children"><span><a href="#">Art & furniture</a><span class="sub-menu-toggle"></span></span>
                <ul class="offcanvas-submenu">
                  <li><a href="views/shop-product.php?cat=1">Home furnitures </a></li>
                  <li><a href="views/shop-product.php?cat=1">Office furnitures</a></li>
                </ul>
              </li>
              <li class="has-children"><span><a href="#">Electronics</a><span class="sub-menu-toggle"></span></span>
                <ul class="offcanvas-submenu">
                  <li><a href="views/shop-product.php?cat=1">Mobile Phones</a></li>
                  <li><a href="views/shop-product.php?cat=1">Computers</a></li>
                  <li><a href="views/shop-product.php?cat=1">Smart Watch's</a></li>
                  <li><a href="views/shop-product.php?cat=1">USB & Cables</a></li>
                  <li><a href="views/shop-product.php?cat=1">View More</a></li>
                </ul>
              </li>
              <li class="has-children"><span><a href="#">life & Beauty</a><span class="sub-menu-toggle"></span></span>
                <ul class="offcanvas-submenu">
                  <li><a href="views/shop-product.php?cat=1">Man's Clothing &amp; Tops</a></li>
                  <li><a href="views/shop-product.php?cat=1">Woman's Clothing</a></li>
                  <li><a href="views/shop-product.php?cat=1">kids clothing</a></li>
                  <li><a href="views/shop-product.php?cat=1">Bags</a></li>
                </ul>
              </li>

              <li class="has-children"><span><a href="#">Accessories</a><span class="sub-menu-toggle"></span></span>
                <ul class="offcanvas-submenu">
                  <li><a href="views/shop-product.php?cat=1">Sunglasses</a></li>
                  <li><a href="views/shop-product.php?cat=1">Hats</a></li>
                  <li><a href="views/shop-product.php?cat=1">Watches</a></li>
                  <li><a href="views/shop-product.php?cat=1">Jewelry</a></li>
                  <li><a href="views/shop-product.php?cat=1">Belts</a></li>
                  <li><a href="views/shop-product.php?cat=1">View All</a></li>
                </ul>
              </li>
            </ul>
          </nav>
    </div>
    <!-- Topbar-->
    <div class="topbar">
      <div class="topbar-column"><a class="hidden-md-down" href="mailto:nsanze.olivier@gmail.com"><i class="icon-mail"></i>&nbsp; nsanze.olivier@gmail.com</a><a class="hidden-md-down" href="tel:+25078343969"><i class="icon-bell"></i>&nbsp; +250782343969</a><a class="social-button sb-facebook shape-none sb-dark" href="#" target="_blank"><i class="socicon-facebook"></i></a><a class="social-button sb-twitter shape-none sb-dark" href="#" target="_blank"><i class="socicon-twitter"></i></a><a class="social-button sb-instagram shape-none sb-dark" href="#" target="_blank"><i class="socicon-instagram"></i></a><a class="social-button sb-pinterest shape-none sb-dark" href="#" target="_blank"><i class="socicon-pinterest"></i></a>
      </div>
      <div class="topbar-column"><a class="hidden-md-down" href="#"><i class="icon-download"></i>&nbsp; Get mobile app</a>
        <div class="lang-currency-switcher-wrap">
          <div class="lang-currency-switcher dropdown-toggle"><span class="language"><img alt="English" src="../img/flags/GB.png"></span><span class="currency">$ USD</span></div>
          <div class="dropdown-menu">
            <div class="currency-select">
               <select class="form-control form-control-rounded form-control-sm">
                <option value="usd">F Rwf</option>
                <option value="usd">$ USD</option>
                <option value="usd">£ UKP</option>
                <option value="usd">€ EUR</option>
              </select>
            </div><a class="dropdown-item" href="#"><img src="../img/flags/Rw.png" alt="Rwanda">Rwanda</a><a class="dropdown-item" href="#"><img src="../img/flags/DE.png" alt="Deutsch">Deutsch</a><a class="dropdown-item" href="#"><img src="../img/flags/IT.png" alt="Italiano">Italiano</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Navbar-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <header class="navbar navbar-sticky">
      <!-- Search-->
      <form class="site-search" method="get">
        <input type="text" name="site_search" placeholder="Type to search...">
        <div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="icon-cross"></i></span></div>
      </form>
      <div class="site-branding">
        <div class="inner">
          <!-- Off-Canvas Toggle (#shop-categories)--><a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
          <!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
          <!-- Site Logo--><a class="site-logo" href="../index.php"><img src="../img/logo/logo.png" alt="Unishop"></a>
        </div>
      </div>
      <!-- Main Navigation-->
      <nav class="site-menu">
        <ul>
          <li class="has-megamenu active"><a href="../index.php"><span>Home</span></a>
            <ul class="mega-menu">
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
             <li><a class="d-block img-thumbnail text-center navi-link" href="shop-products.php?Category=<?php echo urlencode(trim($showCategory['category_name']))?>&ct=<?php echo $showCategory['categoryID'];?>"><img style="width: 100%; height: 60%;" alt="<?php echo $showCategory['category_name'];?>" src="<?php echo '../globus/'.substr($showCategory['category_picture1'],6);?>">
                  <h6 class="mt-3"><?php echo $showCategory['category_name'];?></h6></a>
              </li>
<?php
    endforeach;
endif;
?>
            </ul>
          </li>
          <li><a href="../views/shop.php"><span>Shop</span></a>
            <!-- <ul class="sub-menu">
                <li><a href="shop-categories.php">Shop Categories</a></li>
              <li class="has-children"><a href="shop-grid-ls.php"><span>Shop Grid</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-ls.php">Grid Left Sidebar</a></li>
                    <li><a href="shop-grid-rs.php">Grid Right Sidebar</a></li>
                    <li><a href="shop-grid-ns.php">Grid No Sidebar</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="shop-list-ls.php"><span>Shop List</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-list-ls.php">List Left Sidebar</a></li>
                    <li><a href="shop-list-rs.php">List Right Sidebar</a></li>
                    <li><a href="shop-list-ns.php">List No Sidebar</a></li>
                </ul>
              </li>
                <li><a href="shop-single.php">Single Product</a></li>
                <li><a href="cart.php">Cart</a></li>
              <li class="has-children"><a href="checkout-address.php"><span>Checkout</span></a>
                <ul class="sub-menu">             
                    <li><a href="checkout-address.php">Address</a></li>
                    <li><a href="checkout-shipping.php">Shipping</a></li>
                    <li><a href="checkout-payment.php">Payment</a></li>
                    <li><a href="checkout-review.php">Review</a></li>
                    <li><a href="checkout-complete.php">Complete</a></li>
                </ul>
              </li>
            </ul> -->
          </li>
<!--
          <li class="has-megamenu"><a href="#"><span>Mega Menu</span></a>
            <ul class="mega-menu">
              <li><span class="mega-menu-title">Top Categories</span>
                <ul class="sub-menu">
                  <li><a href="#">Men's Shoes</a></li>
                  <li><a href="#">Women's Shoes</a></li>
                  <li><a href="#">Shirts and Tops</a></li>
                  <li><a href="#">Swimwear</a></li>
                  <li><a href="#">Shorts and Pants</a></li>
                  <li><a href="#">Accessories</a></li>
                </ul>
              </li>
              <li><span class="mega-menu-title">Specialty Shops</span>
                <ul class="sub-menu">
                  <li><a href="#">Junior's Shop</a></li>
                  <li><a href="#">Swim Shop</a></li>
                  <li><a href="#">Athletic Shop</a></li>
                  <li><a href="#">Outdoor Shop</a></li>
                  <li><a href="#">Luxury Shop</a></li>
                  <li><a href="#">Accessories Shop</a></li>
                </ul>
              </li>
              <li>
                <section class="promo-box" style="background-image: url(img/banners/02.jpg);"><span class="overlay-dark" style="opacity: .4;"></span>
                  <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                    <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                    <h3 class="text-bold text-light text-shadow">Sunglasses</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
                  </div>
                </section>
              </li>
              <li>
                <section class="promo-box" style="background-image: url(img/banners/03.jpg);">
                   Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.<span class="overlay-dark" style="opacity: .45;"></span>
                  <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                    <h3 class="text-bold text-light text-shadow">Limited Offer</h3>
                    <h4 class="text-light text-thin text-shadow">save up to 50%!</h4><a class="btn btn-sm btn-primary" href="#">Learn More</a>
                  </div>
                </section>
              </li>
            </ul>
          </li>
-->
          <li><a href="../views/account-login.php"><span>Account</span></a>
            <ul class="sub-menu">
                <li><a href="../views/account-login.php">Login / Register</a></li>
<!--
                <li><a href="account-password-recovery.php">Password Recovery</a></li>
                <li><a href="account-orders.php">Orders List</a></li>
                <li><a href="account-wishlist.php">Wishlist</a></li>
                <li><a href="account-profile.php">Profile Page</a></li>
                <li><a href="account-address.php">Contact / Shipping Address</a></li>
                <li><a href="account-tickets.php">My Tickets</a></li>
                <li><a href="account-single-ticket.php">Single Ticket</a></li>
-->
            </ul>
          </li>
          <li><a href="blog-rs.php"><span>Media</span></a>
            <ul class="sub-menu">
              <li class="has-children"><a href="blog-rs.php"><span>Blog Layout</span></a>
                <ul class="sub-menu">
                    <li><a href="blog-rs.php">Blog Right Sidebar</a></li>
                    <li><a href="blog-ls.php">Blog Left Sidebar</a></li>
                    <li><a href="blog-ns.php">Blog No Sidebar</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="blog-single-rs.php"><span>Single Post Layout</span></a>
                <ul class="sub-menu">
                    <li><a href="blog-single-rs.php">Post Right Sidebar</a></li>
                    <li><a href="blog-single-ls.php">Post Left Sidebar</a></li>
                    <li><a href="blog-single-ns.php">Post No Sidebar</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="about.php"><span>About Us</span></a>
<!--
            <ul class="sub-menu">
                <li><a href="about.php">About Us</a></li>
                <li><a href="contacts.php">Contacts</a></li>
                <li><a href="faq.php">Help / FAQ</a></li>
                <li><a href="order-tracking.php">Order Tracking</a></li>
                <li><a href="search-results.php">Search Results</a></li>
                <li><a href="404.php">404 Not Found</a></li>
                <li><a href="coming-soon.php">Coming Soon</a></li>
              <li><a class="text-danger" href="docs/dev-setup.php">Documentation</a></li>
            </ul>
-->
          </li>
          <li><a href="contacts.php"><span>Contacts</span></a>
<!--
            <ul class="sub-menu">
                <li><a href="about.php">About Us</a></li>
                <li><a href="contacts.php">Contacts</a></li>
                <li><a href="faq.php">Help / FAQ</a></li>
                <li><a href="order-tracking.php">Order Tracking</a></li>
                <li><a href="search-results.php">Search Results</a></li>
                <li><a href="404.php">404 Not Found</a></li>
                <li><a href="coming-soon.php">Coming Soon</a></li>
              <li><a class="text-danger" href="docs/dev-setup.php">Documentation</a></li>
            </ul>
-->
          </li>
         <!--  <li class="has-megamenu"><a href="components/accordion.php"><span>Components</span></a>
            <ul class="mega-menu">
              <li><span class="mega-menu-title">A - F</span>
                  <ul class="sub-menu">
                    <li><a href="components/accordion.php">Accordion</a></li>
                    <li><a href="components/alerts.php">Alerts</a></li>
                    <li><a href="components/buttons.php">Buttons</a></li>
                    <li><a href="components/cards.php">Cards</a></li>
                    <li><a href="components/carousel.php">Carousel</a></li>
                    <li><a href="components/countdown.php">Countdown</a></li>
                    <li><a href="components/forms.php">Forms</a></li>
                  </ul>
              </li>
              <li><span class="mega-menu-title">G - M</span>
                  <ul class="sub-menu">
                    <li><a href="components/gallery.php">Gallery</a></li>
                    <li><a href="components/google-maps.php">Google Maps</a></li>
                    <li><a href="components/images.php">Images &amp; Figures</a></li>
                    <li><a href="components/list-group.php">List Group</a></li>
                    <li><a href="components/market-social-buttons.php">Market &amp; Social Buttons</a></li>
                    <li><a href="components/media.php">Media Object</a></li>
                    <li><a href="components/modal.php">Modal</a></li>
                  </ul>
              </li>
              <li><span class="mega-menu-title">P - T</span>
                  <ul class="sub-menu">
                    <li><a href="components/pagination.php">Pagination</a></li>
                    <li><a href="components/pills.php">Pills</a></li>
                    <li><a href="components/progress-bars.php">Progress Bars</a></li>
                    <li><a href="components/shop-items.php">Shop Items</a></li>
                    <li><a href="components/steps.php">Steps</a></li>
                    <li><a href="components/tables.php">Tables</a></li>
                    <li><a href="components/tabs.php">Tabs</a></li>
                  </ul>
              </li>
              <li><span class="mega-menu-title">T - W</span>
                  <ul class="sub-menu">
                    <li><a href="components/team.php">Team</a></li>
                    <li><a href="components/toasts.php">Toast Notifications</a></li>
                    <li><a href="components/tooltips-popovers.php">Tooltips &amp; Popovers</a></li>
                    <li><a href="components/typography.php">Typography</a></li>
                    <li><a href="components/video-player.php">Video Player</a></li>
                    <li><a href="components/widgets.php">Widgets</a></li>
                  </ul>
              </li>
            </ul>
          </li> -->
        </ul>
      </nav>
      <!-- Toolbar-->
      <div class="toolbar">
        <div class="inner">
          <div class="tools">
            <div class="search"><i class="icon-search"></i></div>
            <div class="account"><a href="#"></a><i class="icon-head"></i>
              <?php 
if($_SESSION['sessData']!=''):
  $table='client';
  $condition= array('where' => array('clientID'=>$_SESSION['ClientID']));
  $select=$db->getRows($table,$condition);
  if (!empty($select)):
    foreach ($select as $key):
?>
              <ul class="toolbar-dropdown">
                <li class="sub-menu-user">
                  <div class="user-ava"><img src="<?php echo '../img/client/'.$key['client_profil'];?>" alt="Olivier.Ns">
                  </div>
                  <div class="user-info">
                    <h6 class="user-name"><?=$key['client_fname'].' '.$key['client_lname']?></h6>
                  </div>
                </li>
                  <li><a href="../views/account-profile.php">My Profile</a></li>
                  <li><a href="../views/account-orders.php">Orders List</a></li>
                  <li><a href="../views/account-wishlist.php">Wishlist</a></li>
                <li class="sub-menu-separator"></li>
                <li><a href="../class/login.php?request=logout"> <i class="icon-unlock"></i>Logout</a></li>
              </ul>
<?php endforeach;endif;else: ?>
              <ul class="toolbar-dropdown">
                <li class="sub-menu-separator"></li>
                <li><a href="account-login.php"> <i class="icon-unlock"></i>Login</a></li>
              </ul>
<?php endif;?>
            </div>
            <div class="cart"><a href="cart.php"></a><i class="icon-bag"></i>
 <?php 
if($_SESSION['sessData']!=''):
?>
              <span class="count">3</span><span class="subtotal">$289.68</span>
              <div class="toolbar-dropdown">
                <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.php"><img src="../img/cart-dropdown/01.jpg" alt="Product"></a>
                  <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.php">Unionbay Park</a><span class="dropdown-product-details">1 x $43.90</span></div>
                </div>
                <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.php"><img src="../img/cart-dropdown/02.jpg" alt="Product"></a>
                  <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.php">Daily Fabric Cap</a><span class="dropdown-product-details">2 x $24.89</span></div>
                </div>
                <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.php"><img src="../img/cart-dropdown/03.jpg" alt="Product"></a>
                  <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.php">Haan Crossbody</a><span class="dropdown-product-details">1 x $200.00</span></div>
                </div>
                <div class="toolbar-dropdown-group">
                  <div class="column"><span class="text-lg">Total:</span></div>
                  <div class="column text-right"><span class="text-lg text-medium">$289.68&nbsp;</span></div>
                </div>
                <div class="toolbar-dropdown-group">
                  <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="cart.php">View Cart</a></div>
                  <div class="column"><a class="btn btn-sm btn-block btn-success" href="checkout-address.php">Checkout</a></div>
                </div>
              </div>
<?php else: ?>   
              <span class="count">0</span><span class="subtotal">$0.00</span>
<?php endif;?>
              


            </div>
          </div>
        </div>
      </div>
    </header>