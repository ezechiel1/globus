<?php include('header.php');
      include('ajax.php');
?>

 <div class="blog-area mg-tb-15" style="padding-top: 30px !important;padding-bottom:  30px !important;">
            <div class="container-fluid">
                <div class="row">
<?php
//Code to select data form the table database
$all=$db->iCategory();
        //check if there are available data
        if(!empty($all)):
            $count = 0; 
            foreach($all as $show): 
                $totSub=$db->getTotalSubCategory($show['categoryID']);
                $count++; 
?>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="hpanel blog-box mg-t-30">
                            <div class="panel-heading custom-blog-hd">
                                <div class="media clearfix">
                                    <a class="pull-left" href="a.php">
											<img class="img-circle" src="../../img/contact/1.jpg" alt="profile-picture">
										</a>
                                    <div class="media-body blog-std"><a href="a.php" class="">
                                        <strong><span class=""><B style="color: black;"><?php echo $show['category_name'];?></B></span></strong>
                                        <p class="text-muted">SubCategory: <span class="font-bold text-primary"><B><?php echo $totSub; ?></B></span> </p>
                                        <p class="text-muted">Date : <span class="font-bold text-primary"><B><?php echo $show['cdate'];?></B></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                             <span class="pull-right">
                            <?php if($show['status']==1){?>
                                 <a href="" class="text-primary" data-toggle="modal" <?php  echo 'data-target="#desactivate'.$show['categoryID'].'ers"'; ?> > Activated
                                 </a> 
                            <?php } else if($show['status']==0){?>
                                 <a href="" class="text-primary" data-toggle="modal" <?php  echo 'data-target="#activate'.$show['categoryID'].'ers"'; ?> > Desactivated
                                 </a> 
                            <?php } 
                                if($show['post']==1) { ?>
                                 <a href="" class="text-danger" data-toggle="modal" <?php  echo 'data-target="#postoff'.$show['categoryID'].'ers"'; ?>>Post <small class="text-primary"> (Online)</small>
                                 </a>
                                <?php } else if($show['post']==0){ ?>
                                    <a href="" class="text-danger" data-toggle="modal" <?php  echo 'data-target="#poston'.$show['categoryID'].'ers"'; ?>>Post <small class="text-muted"> (Offline) </small>
                                 </a>
                                <?php } ?>
                             </span>
                                 
                             <a href="" class="glyphicon glyphicon-edit text-primary" data-toggle="modal" <?php  echo 'data-target="#edit'.$show['categoryID'].'ers"'; ?> >
                             </a> 

                             <a href="" class="glyphicon glyphicon-trash text-danger" data-toggle="modal" <?php  echo 'data-target="#remove'.$show['categoryID'].'ers"'; ?>>
                             </a>
                            </div>
                        </div>
                    </div>


<!--Code  the Modals-->
<div class="modal fade"  <?php  echo 'id="remove'.$show['categoryID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Deletion of the Product Category</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="post" action="../../class/CategoryController.php" class="form-group" style="shape-margin: 20px;">
                <center><label>Do you want to delete this Category: <?php echo $show['category_name'];?>?</label><br>
                <input type="text" hidden="" value="<?php echo $show['categoryID'];?>" name="categoryID">
                <input type="text" hidden="" value="<?php echo $show['category_name'];?>" name="category_name">
                <button class="btn btn-secondary btn-sm btn-default" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"></center>
            </form>
           </div>
          </div>
        </div>
      </div>
    </div>
 <!-- Activate the category -->
 <div class="modal fade"  <?php  echo 'id="activate'.$show['categoryID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Activate the Category</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="post" action="../../class/CategoryController.php" class="form-group" style="shape-margin: 20px;">
                <center><label>Do you want to Activate this Category: <?php echo $show['category_name'];?>?</label><br>
                <input type="text" hidden="" value="<?php echo $show['categoryID'];?>" name="categoryID">
                <input type="text" hidden="" value="<?php echo $show['category_name'];?>" name="category_name">
                <button class="btn btn-secondary btn-sm btn-default" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-sm btn-danger" name="activate" value="Activate"></center>
            </form>
           </div>
          </div>
        </div>
      </div>
    </div>

 <div class="modal fade"  <?php  echo 'id="desactivate'.$show['categoryID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Desactivate the Category</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="post" action="../../class/CategoryController.php" class="form-group" style="shape-margin: 20px;">
                <center><label>Do you want to Desactivate this Category: <?php echo $show['category_name'];?>?</label><br>
                <input type="text" hidden="" value="<?php echo $show['categoryID'];?>" name="categoryID">
                <input type="text" hidden="" value="<?php echo $show['category_name'];?>" name="category_name">
                <button class="btn btn-secondary btn-sm btn-default" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-sm btn-danger" name="desactivate" value="Desactivate"></center>
            </form>
           </div>
          </div>
        </div>
      </div>
    </div>
 <!-- Post the Category -->
 <div class="modal fade"  <?php  echo 'id="poston'.$show['categoryID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Post the Category</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="post" action="../../class/CategoryController.php" class="form-group" style="shape-margin: 20px;">
                <center><label>Do you want to Post this Category: <?php echo $show['category_name'];?>?</label><br>
                <input type="text" hidden="" value="<?php echo $show['categoryID'];?>" name="categoryID">
                <input type="text" hidden="" value="<?php echo $show['category_name'];?>" name="category_name">
                <button class="btn btn-secondary btn-sm btn-default" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-sm btn-danger" name="post_online" value="Post On Website"></center>
            </form>
           </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade"  <?php  echo 'id="postoff'.$show['categoryID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Post the Category</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="post" action="../../class/CategoryController.php" class="form-group" style="shape-margin: 20px;">
                <center><label>Do you want to Remove this Category from the Website : <?php echo $show['category_name'];?>?</label><br>
                <input type="text" hidden="" value="<?php echo $show['categoryID'];?>" name="categoryID">
                <input type="text" hidden="" value="<?php echo $show['category_name'];?>" name="category_name">
                <button class="btn btn-secondary btn-sm btn-default" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-sm btn-danger" name="post_offline" value="Remove From Website"></center>
            </form>
           </div>
          </div>
        </div>
      </div>
    </div>
    <!--edit the selected field-->

     <div class="modal fade"  <?php  echo 'id="edit'.$show['categoryID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Updating the Product Category</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="post" action="../../class/CategoryController.php" class="form-group" style="shape-margin: 20px;">
                    <input type="text" hidden="" value="<?php echo $show['categoryID'];?>" name="categoryID">
                    <div class="form-group">
                     <input type="text" name="category_name" value="<?php echo $show['category_name'];?>" class="form-control col-xs-6">
    <input type="hidden"  name="old_category_name" value="<?php echo $show['category_name'];?>" class="form-control col-xs-6">
                    </div><br><br><br>
                    <button class="btn btn-secondary btn-default" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-sm btn-danger" name="updateCategory" value="Update"></center>
            </form>
           </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade"  <?php  echo 'id="newSubCat'.$show['categoryID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Register New Product Sub Category</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="post" action="../../class/subCategoryController.php" class="form-group" style="shape-margin: 20px;">
                    <input type="text" hidden="" value="<?php echo $show['categoryID'];?>" name="categoryID">
                    <input type="text" hidden="" value="<?php echo $show['category_name'];?>" name="category_name">
                    <div class="form-group">
                        <label>Sub Category Name</label>
                      <input type="text" name="SubCatname" class="form-control col-xs-6">
                    </div><br><br><br>
                    <button class="btn btn-secondary btn-default" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-sm btn-danger" name="addSubCategory" value="Register"></center>
            </form>
           </div>
          </div>
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