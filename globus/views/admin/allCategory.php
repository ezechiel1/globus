<?php include('header.php');
?>
        <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table Start -->
        <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
                                <div class="main-sparkline13-hd">
                                    <h1>All <span class="table-project-n">Categories</span><small><strong  class="pull-right text-success">
                                        <?php
                                            $sessData=array();
                                            if($_SESSION['sessData']!='')
                                        {
                                            $sessData=$_SESSION['sessData'];
                                            if($sessData!='') echo $sessData['status']['msg'];
                                        }
                                        ?>

                                    </strong></small></h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                    </div>
                                    <table class="table table-striped table-bordered" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">#No</th>
                                                <th data-field="name" data-editable="true">Category Name</th>
                                                <th data-field="date" data-editable="true">Total Sub-Category</th>
                                                <th data-field="task" data-editable="true">Registered By</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
//Code to select data form the table database
$tblName='category';
$condition=array(
                    'Order by' => 'categoryID DESC'
                );
$allCategory=$db->getRows($tblName,$condition);
//check if there are available data
if(!empty($allCategory)):
    $count = 0; 
    foreach($allCategory as $show): 
        $count++; 
        $nbSub=0;
        $tblName='subcategory';
        $condition=array(
            'where' => array(
                'categoryID'=>$show['categoryID']
            )
        );
        $totalSubCat=$db->getRows($tblName,$condition);
        if(!empty($totalSubCat)):
            foreach($totalSubCat as $getTot): $nbSub++;
            endforeach;
        endif;
        //get the Admin Name
        $tblName='admin';
        $condition=array('where' => array('adminID' => $show['adminID']));
        $adminNames=$db->getRows($tblName,$condition);
        if(!empty($adminNames)):
            foreach($adminNames as $getAdmin):
            endforeach;
        endif;

?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo '#'.$count;?></td>
                                                <td><?php echo $show['category_name'];?></td>
                                                <td><?php echo $nbSub;?></td>
                                                <td><?php echo $getAdmin['admin_fname'].' '.$getAdmin['admin_lname'];?></td>
                                                <td>
                            <a href="" class="glyphicon glyphicon-pencil text-primary" data-toggle="modal" <?php  echo 'data-target="#edit'.$show['categoryID'].'ers"'; ?>></a>
                             <a href="" class="glyphicon glyphicon-remove text-danger" data-toggle="modal" <?php  echo 'data-target="#remove'.$show['categoryID'].'ers"'; ?>></a> |
                             <a href="" class=" btn btn-xs btn-default text-primary" data-toggle="modal" <?php  echo 'data-target="#newSubCat'.$show['categoryID'].'ers"'; ?>><small class="glyphicon glyphicon-plus"> SubCategory</small></a> 
                          </td>
                                            </tr>

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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
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
    <!-- data table JS
        ============================================ -->
    <script src="../../js/data-table/bootstrap-table.js"></script>
    <script src="../../js/data-table/tableExport.js"></script>
    <script src="../../js/data-table/data-table-active.js"></script>
    <script src="../../js/data-table/bootstrap-table-editable.js"></script>
    <script src="../../js/data-table/bootstrap-editable.js"></script>
    <script src="../../js/data-table/bootstrap-table-resizable.js"></script>
    <script src="../../js/data-table/colResizable-1.5.source.js"></script>
    <script src="../../js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
        ============================================ -->
    <script src="../../js/editable/jquery.mockjax.js"></script>
    <script src="../../js/editable/mock-active.js"></script>
    <script src="../../js/editable/select2.js"></script>
    <script src="../../js/editable/moment.min.js"></script>
    <script src="../../js/editable/bootstrap-datetimepicker.js"></script>
    <script src="../../js/editable/bootstrap-editable.js"></script>
    <script src="../../js/editable/xediable-active.js"></script>
    <!-- Chart JS
        ============================================ -->
    <script src="../../js/chart/jquery.peity.min.js"></script>
    <script src="../../js/peity/peity-active.js"></script>
    <!-- tab JS
        ============================================ -->
    <script src="../../js/tab.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="../../js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="../../js/main.js"></script>
</body>
<?php $_SESSION['sessData']='';?>
</html>