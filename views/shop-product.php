<?php 
    include("header.php");
    if(!isset($_GET['sct']) and !isset($_GET['ct'])) header("location: dashboard.php");
      $subCategoryID=$_GET['sct'];
      $categoryID=$_GET['ct'];
      $subCategory=urldecode($_GET['SubCategory']);
      //...Get path
      $sPath='../globus/'.substr($db->getSubCatPath($categoryID,$subCategoryID),6);
?>
<div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Shop List <strong><?php echo $subCategory;?></strong></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="../index.php">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Shop List <strong><?php echo $subCategory;?></strong></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <!-- Shop Toolbar-->
            <div class="shop-toolbar padding-bottom-1x mb-2">
              <div class="column">
                <div class="shop-sorting">
                  <label for="sorting">Sort by:</label>
                  <select class="form-control" id="sorting">
                    <option>Popularity</option>
                    <option>Low - High Price</option>
                    <option>High - Low Price</option>
                    <option>Avarage Rating</option>
                    <option>A - Z Order</option>
                    <option>Z - A Order</option>
                  </select><span class="text-muted">Showing:&nbsp;</span><span>1 - 12 items</span>
                </div>
              </div>
              <div class="column">
                <div class="shop-view"></div>
              </div>
            </div>

<?php
//Code to select data form the table database
$all=$db->wProduct($categoryID,$subCategoryID);
        //check if there are available data
        if(!empty($all)):$count = 0; 
            foreach($all as $show): $count++;

//dynamic ajax function on add cart
  $addTitle='addtocart'.$show['productID'].'()'; $addCartDisplay='var cartAddDisplay="displaycart'.$show['productID'].'";'; $addIDcart='displaycart'.$show['productID'];
  $clientid='var clientIDd="clientID'.$show['productID'].'";';
  $productid='var productIDd="productID'.$show['productID'].'";';
  $product_table='var product_tabled="product_table'.$show['productID'].'";';
  $subcategory='var subCategoryIDd="subCategoryID'.$show['productID'].'";';
  $category='var categoryIDd="categoryID'.$show['productID'].'";';
  $quantite='var quantityd="quantity'.$show['productID'].'";';
  $prices='var priced="price'.$show['productID'].'";';

  //dynamic ajax function on delete cart
  $delTitle='deltocart'.$show['productID'].'()'; $delCartDisplay='var cartDelDisplay="displaycart'.$show['productID'].'";'; $delIDcart='displayCart'.$show['productID'];
  
?>
<script type="text/javascript">
    //the functionS to add to the cart
                function <?=$addTitle?>{
                  if(XMLHttpRequestObject){
                    XMLHttpRequestObject.open("POST","../class/shop_cartController.php");
                    XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttpRequestObject.onreadystatechange=function(){

                    
                    if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                      var datar=XMLHttpRequestObject.responseText;
                      <?=$addCartDisplay?>
                      var divsee=document.getElementById(cartAddDisplay);/// la ou ca va afficher 
                      divsee.innerHTML=datar;
                    }
                }
                    //load dynaamic variables
                    <?=$clientid?> 
                    <?=$productid?> 
                    <?=$product_table?>
                    <?=$subcategory?> 
                    <?=$category?> 
                    <?=$quantite?> 
                    <?=$prices?>
                    // les variables a etre envoyer et utiliser
                    var client=document.getElementById(clientIDd).value;
                    var prod=document.getElementById(productIDd).value;
                    var prod_table=document.getElementById(product_tabled).value;
                    var subcat=document.getElementById(subCategoryIDd).value;
                    var cat=document.getElementById(categoryIDd).value;
                    var quantity=document.getElementById(quantityd).value;
                    var price=document.getElementById(priced).value;
                    
                    var data=client+'|'+prod+'|'+prod_table+'|'+subcat+'|'+cat+'|'+quantity+'|'+price+'|'; //pour concatener plusieures variables
                    XMLHttpRequestObject.send("addtocart=" + data); // Send variables
                  }
                  return false;
                }

  //the functionS to delete to the cart
                function <?=$delTitle?>{
                  if(XMLHttpRequestObject){
                    XMLHttpRequestObject.open("POST","../class/shop_cartController.php");
                    XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttpRequestObject.onreadystatechange=function(){

                    
                    if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                      var datar=XMLHttpRequestObject.responseText;
                      <?=$delCartDisplay?>
                      var divsee=document.getElementById(cartDelDisplay);/// la ou ca va afficher 
                      divsee.innerHTML=datar;
                    }
                }

                    //load dynaamic variables
                    <?=$clientid?> 
                    <?=$productid?> 
                    <?=$product_table?>
                    <?=$subcategory?> 
                    <?=$category?> 
                    <?=$quantite?> 
                    <?=$prices?>
                    //les variables a etre envoyer et utiliser
                    var client=document.getElementById(clientIDd).value;
                    var prod=document.getElementById(productIDd).value;
                    var prod_table=document.getElementById(product_tabled).value;
                    var subcat=document.getElementById(subCategoryIDd).value;
                    var cat=document.getElementById(categoryIDd).value;
                    var quantity=document.getElementById(quantityd).value;
                    var price=document.getElementById(priced).value;
                    
                    var data=client+'|'+prod+'|'+prod_table+'|'+subcat+'|'+cat+'|'+quantity+'|'+price+'|'; //pour concatener plusieures variables
                    XMLHttpRequestObject.send("deltocart=" + data); // Send variables
                  }
                  return false;
                }
</script>
<!-- //end of dynamic ajax function -->
            <!-- Product-->
            <div class="product-card product-list"><a class="product-thumb" href="product-description.php?SubCategory=<?php echo urlencode(trim($show['product_name']))?>&ct=<?php echo $show['categoryID'];?>&sct=<?php echo $show['subCategoryID'];?>&pt=<?php echo $show['productID'];?>">
                  <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                  </div><img src="<?php echo $sPath.$show['product_picture'];?>" alt="Product"></a>
              <div class="product-info">
                <h3 class="product-title"><a href=""><?php echo $show['product_name'];?></a></h3>
                <h4  class="product-price"><?php echo $show['product_price'];?></h4>
                <p class="hidden-xs-down" style="overflow: hidden;height: 65px;text-align: justify;" ><?php echo $show['product_description'];?></p>
                <div class="product-buttons">
<?php 
if($_SESSION['sessData']!=''):
$getTable=$db->getTableProduct($categoryID,$subCategoryID);
?>
                  <input type="hidden" id="<?='clientID'.$show['productID'];?>" value="<?php echo $_SESSION['ClientID'];?>">
                  <input type="hidden" id="<?='productID'.$show['productID'];?>" value="<?php echo $show['productID'];?>">
                  <input type="hidden" id="<?='product_table'.$show['productID'];?>" value="<?php echo $getTable;?>">
                  <input type="hidden" id="<?='subCategoryID'.$show['productID'];?>" value="<?php echo $show['subCategoryID'];?>">
                  <input type="hidden" id="<?='categoryID'.$show['productID'];?>" value="<?php echo $show['categoryID'];?>">
                  <input type="hidden" id="<?='quantity'.$show['productID'];?>" value="1">
                 <input type="hidden" id="<?='price'.$show['productID'];?>" value="<?php echo $show['product_price'];?>">
<?php
 $select=$db->getRows('shop_wishing', array('where'=>array('clientID'=>$_SESSION['ClientID'],'productID'=>$show['productID'], 'categoryID'=>$show['categoryID'],'subCategoryID'=>$show['subCategoryID'])));
 if (!empty($select)):
?>
                <span id="displayWish">
                  <button role="button" onclick="delLike();" class="btn btn-outline-danger btn-sm btn-wishlist" data-toggle="tooltip"><i class="icon-heart "></i></button>
                </span>
<?php
   else:
?>  
                <span id="displayWish">
                   <button role="button" onclick="addLike();" class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip"><i class="icon-heart "></i></button>
                 </span>
<?php endif;?>  

<!-- shop_cart--> 

<?php
 $select=$db->getRows('shop_cart', array('where'=>array('clientID'=>$_SESSION['ClientID'],'productID'=>$show['productID'], 'categoryID'=>$show['categoryID'],'subCategoryID'=>$show['subCategoryID'])));
    if (!empty($select)):
?>
              <span id="<?=$addIDcart?>">
                  <button role="button" onclick="<?=$delTitle?>;" class="btn btn-outline-danger btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="This product have been deleted from your cart" title="Delete for your cart">Delete to Cart</button>
              </span>
<?php
   else:
?>  
              <span id="<?=$addIDcart?>">
                  <button role="button" onclick="<?=$addTitle?>;" class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="The product have been added to the cart" title="Add to your Cart">Add to Cart</button>
              </span>
<?php endif;?>
<?php else:?>
                  <a href="account-login.php"><button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button></a>
                  <a href="account-login.php" class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product">Add to Cart</a>
 <?php endif;?>

                </div>
              </div>
            </div>
  <?php
  endforeach;
  else: echo '<div>No Product found!</div>';
endif;
?>
            <!-- Product --><!--
            <div class="product-card product-list"><a class="product-thumb" href="../views/product-description.php">
                <div class="product-badge text-muted">Out of stock</div><img src="../img/shop/products/10.jpg" alt="Product"></a>
              <div class="product-info">
                <h3 class="product-title"><a href="shop-single.html">Daily Fabric Cap</a></h3>
                <h4 class="product-price">$31.99</h4>
                <p class="hidden-xs-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore odit officiis illo perferendis deserunt, ipsam dolor ad dolorem eaque veritatis harum facilis aliquid id doloribus incidunt quam beatae, soluta magni alori sedum quanto.</p>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button><a class="btn btn-outline-secondary btn-sm" href="shop-single.html">View Details</a>
                </div>
              </div>
            </div> -->

            <div class="pt-2">
              <!-- Pagination-->
              <nav class="pagination">
                <div class="column">
                  <ul class="pages">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li>...</li>
                    <li><a href="#">12</a></li>
                  </ul>
                </div>
                <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
              </nav>
            </div>
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
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script type="text/javascript">
        var pager = new Imtech.Pager();
        $(document).ready(function() {
            pager.paragraphsPerPage = 5; // set amount elements per page
            pager.pagingContainer = $('#content'); // set of main container
            pager.paragraphs = $('p', pager.pagingContainer); // set of required containers
            pager.showPage(1);
        });
        </script>
    <script src="../js/vendor.min.js"></script>
    <script src="../js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="../customizer/customizer.min.js"></script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.0/template-1/shop-list-ns.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jun 2019 09:16:51 GMT -->
</html>