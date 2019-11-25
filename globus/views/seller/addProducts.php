<?php include('header.php');
      include('ajax.php');
?>
            <!-- Mobile Menu end -->
         
        <!-- Multi Upload Start-->
      <form method="post" enctype="multipart/form-data" action="../../class/productControler.php">   
             <div class="single-product-tab-area mg-tb-15">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i>  Product Edit</a></li>
                                    
                                    <small><strong class="pull-right text-success"><?php
                                    $sssData=array();
                                    $sssData=$_SESSION['sessData'];
                                    if($sssData!='') echo $sssData['status']['msg'];?>
                                    </strong></small>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                 <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                        <input type="text" required="" class="form-control" placeholder="Product Name" name="product_name">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                        <input type="text" required="" class="form-control" placeholder="Product Price" name="product_price">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span>
                                                        <input type="text" required="" class="form-control" placeholder="Product Quantity" name="product_quantity">
                                                    </div>
                                                    <select required="" name="product_category" id="categoryID" onchange="getSubCategory();" required="" class="form-control pro-edt-select form-control-primary" style="margin-top: 15px !important;">
                                                        <!-- <option value="" hidden="">Product-Category</option> -->
                                                    <?php
$getCt=$db->getRows('category', array('where'=>array('categoryID'=>$categoryID)));
if(!empty($getCt)): foreach($getCt as $getCat):
?>          
                                            <option value="<?=$getCat['categoryID']?>"><?=$getCat['category_name']?></option>
<?php endforeach; endif;?>
                                                    </select>
                                                    <span id="getSubCat">
                                                    <select required="" name="product_sub_category" required="" class="form-control pro-edt-select form-control-primary" style="margin-top: 15px !important;">
                                                            <!-- <option value="" hidden="">Product-Sub-Category</option> -->
                                                             <?php
$tblName='subcategory';
$condition=array( 'Order by' => 'subCategoryID asc', 'where' => array('subCategoryID' => $subCategoryID) );
$allCategory=$db->getRows($tblName,$condition);
if(!empty($allCategory)):
    foreach($allCategory as $showC): 
?>
                                                            <option value="<?php echo $showC['subCategoryID'];?>"><?php echo $showC['subCategory_name'];?></option>
<?php
    endforeach;
endif;
?>
                                                            
                                                    </select>
                                                    </span>
                                                    <select required="" name="product_color" class="form-control pro-edt-select form-control-primary" style="margin-top: 15px !important;">
                                                        <option value="opt1">Product-color</option>
                                                            <option value="Blue">Blue</option>
                                                            <option value="Red">Red</option>
                                                            <option value="Yellow">Yellow</option>
                                                            <option value="Black">Black</option>
                                                            <option value="Green">Green</option>
                                                    </select>
                                                    <div class="input-group mg-b-pro-edt" style="margin-top: 15px !important;  ">
                                                        <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
                                                        <input type="file" required="" class="form-control" placeholder="" name="product_picture">
                                                    </div>

                                                    <textarea name="product_description" placeholder="Product Description" style="margin-top: 20px !important;" class="form-control"></textarea>


                                                     <input type="submit" style="margin-top: 15px !important;"  name="RegisterProduct1" class="btn btn-primary pull-right waves-effect waves-light" value="Save Product" >
                                                </div>
                                            </div>
                                        </div>
                            </div>

                                   <!-- <div class="product-tab-list tab-pane fade" id="reviews">
                                       <div class="multi-uploaded-area mg-tb-15">
                                        <div class="container-fluid">
                                            
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="dropzone-pro mg-tb-30">
                                                        <div id="dropzone1">
                                                            <form action="" class="dropzone dropzone-custom needsclick" id="demo1-upload">
                                                                <div class="dz-message needsclick download-custom">
                                                                    <center>
                                                                          <h2>About image</h2>
                                                                    <p><span class="note needsclick">Colour photograph. Taken within the last five years. Neutral background. Maximum size: 250 Kb. No hats, sunglasses, dark glasses, headphones, wireless hands-free devices or similar items, jewellery or garments of any sort that obstruct the view of the face</span>

                                                                    </p>
                                                                    </center>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="dropzone-pro">
                                                        <div id="dropzone">
                                                            <form action="../../class/productControler.php" class="dropzone " id="demo-upload">
                                                                <div class="dz-message needsclick download-custom">
                                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                                                    <h2>Drop files here or click to upload.</h2>
                                                                    <p><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                                                    </p>
                                                                </div>
                                                            </form>
                                                            <input type="button" name="RegisterProduct2" value="Register The Product">
                                                        </div>
                                                    </div>
                                                </div>
                                                <center>
                                                <div class="form-group review-pro-edt" id="sub">
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" >Submit
                                                    </button>
                                                </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         </form>
        <!-- Multi Upload End-->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
        ============================================ -->
    <script src="../../js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="../../js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="../../js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="../../js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="../../js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="../../js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="../../js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="../../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="../../js/metisMenu/metisMenu.min.js"></script>
    <script src="../../js/metisMenu/metisMenu-active.js"></script>
    <!-- dropzone JS
        ============================================ -->
    <script src="../../js/dropzone/dist/min/dropzone.min.js"></script>
    <!-- tab JS
        ============================================ -->
    <script src="../../js/tab.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="../../js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="../../js/main.js"></script>
    <!-- Cropper -->
    <script src="../../cropper/dist/cropper.min.js"></script>

    <script type="text/javascript">
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(".dropzone",{
            autoProcessQueue: false,
            parallelUploads:10
        })
    </script>
</body>
<?php
$_SESSION['sessData']=''; 
?>
</html>