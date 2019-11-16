<?php include('header.php');
      include('ajax.php');
      if(!isset($_GET['pID']) and $_GET['pID']=='') header("location: dashboard.php");
      $subCategoryID=$_GET['pID'];
      $ownerID=$_SESSION['ID'];
      $owner_type=$_SESSION['type'];
?>
 <div class="blog-area mg-tb-15" style="padding-top: 30px !important;padding-bottom:  30px !important;">
            <div class="container-fluid">
                <div class="row">
<?php
//Code to select data form the table database
$all=$db->sProduct($subCategoryID,$ownerID,$owner_type);
        //check if there are available data
        if(!empty($all)):
            $count = 0; 
            foreach($all as $show): 
                $count++; 
?>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="hpanel blog-box mg-t-30">
                            
                            <div class="panel-body blog-pra">
                                <div class="blog-img">
                                    <img src="<?php echo $showSub['subCategory_path'].$show['product_picture'];?>" style="width: 370px;height: 150px;" alt="" />
                                    <a href="productDetail.php?Product=<?php echo urlencode($show['product_name']);?>&pID=<?php echo $showSub['subCategoryID'];?>&prID=<?php echo $show['productID'];?>">
                                        <h4><?php echo $show['product_name'];?></h4>
                                    </a>
                                </div>
                                <p style="height: 60px; word-wrap: break-word; overflow: auto; text-align: justify;">
                                   <?php echo $show['product_description'];?>
                                </p>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-right"><i class="fa fa-comments-o"> </i> 22 comments</span>
                                <i class="fa fa-eye"> </i> 142 views
                            </div>
                        </div>
                    </div>
<?php
  endforeach;
endif;
?>
                    

                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
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