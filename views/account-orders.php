<?php 
    include("header.php");
?>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>My Orders</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.php">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="account-orders.php">Account</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>My Orders</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <div class="col-lg-4">
            <aside class="user-info-wrapper">
              <div class="user-cover" style="background-image: url(../img/account/user-cover-img.jpg);">
                <div class="info-label" data-toggle="tooltip" title="You currently have 290 Reward Points to spend"><i class="icon-medal"></i>290 points</div>
              </div>
<?php 
if($_SESSION['sessData']!=''):
  $table='client';
  $condition= array('where' => array('clientID'=>$_SESSION['ClientID']));
  $select=$db->getRows($table,$condition);
  if (!empty($select)):
    foreach ($select as $key):
?>
            <div class="user-info">
                <div class="user-avatar"><a class="edit-avatar" href="#"></a><img src="<?php echo '../img/client/'.$key['client_profil'];?>" alt="User"></div>
                <div class="user-data">
                  <h4><?=$key['client_fname'].' '.$key['client_lname']?></h4><span>Joined <?=$key['c_date']?></span>
                </div>
              </div>  
<?php endforeach;endif;endif;?>


              
            </aside>
            <nav class="list-group"><a class="list-group-item with-badge active" href="account-orders.php"><i class="icon-bag"></i>Orders<span class="badge badge-primary badge-pill">6</span></a><a class="list-group-item" href="account-profile.php"><i class="icon-head"></i>Profile</a><a class="list-group-item with-badge" href="account-wishlist.php"><i class="icon-heart"></i>Wishlist<span class="badge badge-primary badge-pill">3</span></a></nav>
          </div>
          <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th>Order #</th>
                    <th>Date Purchased</th>
                    <th>Status</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails">78A643CD409</a></td>
                    <td>August 08, 2017</td>
                    <td><span class="text-danger">Canceled</span></td>
                    <td><span class="text-medium">$760.50</span></td>
                  </tr>
                  <tr>
                    <td><a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails">34VB5540K83</a></td>
                    <td>July 21, 2017</td>
                    <td><span class="text-info">In Progress</span></td>
                    <td><span class="text-medium">$315.20</span></td>
                  </tr>
                  <tr>
                    <td><a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails">112P45A90V2</a></td>
                    <td>June 15, 2017</td>
                    <td><span class="text-warning">Delayed</span></td>
                    <td><span class="text-medium">$1,264.00</span></td>
                  </tr>
                  <tr>
                    <td><a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails">28BA67U0981</a></td>
                    <td>May 19, 2017</td>
                    <td><span class="text-success">Delivered</span></td>
                    <td><span class="text-medium">$198.35</span></td>
                  </tr>
                  <tr>
                    <td><a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails">502TR872W2</a></td>
                    <td>April 04, 2017</td>
                    <td><span class="text-success">Delivered</span></td>
                    <td><span class="text-medium">$2,133.90</span></td>
                  </tr>
                  <tr>
                    <td><a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails">47H76G09F33</a></td>
                    <td>March 30, 2017</td>
                    <td><span class="text-success">Delivered</span></td>
                    <td><span class="text-medium">$86.40</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <hr>
            <div class="text-right"><a class="btn btn-link-primary margin-bottom-none" href="#"><i class="icon-download"></i>&nbsp;Order Details</a></div>
          </div>
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
          <p class="footer-copyright">© All rights reserved. Made with &nbsp;<i class="icon-heart text-danger"></i><a href="http://rokaux.com/" target="_blank"> &nbsp;by rokaux</a></p>
        </div>
      </footer>
    </div>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="../views/js/vendor.min.js"></script>
    <script src="../views/js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="../views/customizer/customizer.min.js"></script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.0/template-1/account-orders.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jun 2019 09:15:21 GMT -->
</html>