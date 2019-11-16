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
                                    <h1>All <span class="table-project-n">Companies</span><small><strong  class="pull-right text-success">
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
                                                <th data-field="name" data-editable="true">Name</th>
                                                <th data-field="price-slider" data-editable="true">Price</th>
                                                <th data-field="quantity" data-editable="true">Quantity</th>
                                                <th data-field="Status" data-editable="true">Status</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
//Code to select data form the table database
$tblName='fourniture_product';
$condition=array(
                    'Order by' => 'companyID DESC'
                );
$allFournitures=$db->getRows($tblName,$condition);
//check if there are available data
if(!empty($allFournitures)):
    $count = 0; 
    foreach($allFournitures as $show): 
        $count++; 


?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo '#'.$count;?></td>
                                                <td><?php echo $show['product_name'];?></td>
                                                <td><?php echo $show['product_price'];?></td>
                                                <td><?php echo $show['product_quantity'];?></td>
                                                <td><?php if($show['product_status']==0) echo 'Desactivated'; else echo 'Activated';?></td>
                                                <td>
                            <a href="" class="glyphicon glyphicon-pencil text-primary" data-toggle="modal" <?php  echo 'data-target="#edit'.$show['productID'].'ers"'; ?>></a>  
                             <a href="" class="glyphicon glyphicon-remove text-danger" data-toggle="modal" <?php  echo 'data-target="#remove'.$show['productID'].'ers"'; ?>></a>
                          </td>
                                            </tr>

<!--Code fofr the Modals-->
<div class="modal fade"  <?php  echo 'id="remove'.$show['productID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Deletion of Company Account</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="POST" action="../../class/artController.php" class="form-group" style="shape-margin: 20px;">
                <center><label>Do you want to delete this Company: <?php echo $show['product_name'];?>?</label><br>
                <input type="text" hidden="" value="<?php echo $show['productID'];?>" name="deleteform">
                <button class="btn btn-secondary btn-default" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"></center>
            </form>
           </div>
          </div>
        </div>
      </div>
    </div>
    <!--edit the selected field-->

     <div class="modal fade"  <?php  echo 'id="edit'.$show['productID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Updating the Company Account</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="POST" action="../../class/fournitureController.php" class="form-group" style="shape-margin: 20px;">
                    <input type="text" hidden="" value="<?php echo $show['productID'];?>" name="updateform">
                    <div class="form-group">
                      <input type="text" name="Name" value="<?php echo $show['product_name'];?>" class="form-control col-xs-6">
                    </div><br><br><br>
                    <div class="form-group">
                      <input type="text" name="Price" value="<?php echo $show['product_price'];?>" class="form-control col-xs-6">
                    </div><br><br>
                    <div class="form-group">
                      <input type="text" name="Quantity" value="<?php echo $show['product_quantity'];?>" class="form-control col-xs-6">
                    </div><br><br>
                  <div class="form-group">
                      <select  name="Status"  class="form-control col-xs-6">
                        <option hidden="" value="<?php echo $show['product_status'];?>"><?php if($show['product_status']==0) echo 'Desactivated'; else if($show['product_status']==1) echo 'Activated';?></option>
                        <option value="1">Activate</option>
                        <option value="0">Desactivate</option>
                      </select>
                  </div><br><br>
                    <button class="btn btn-secondary btn-default" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-sm btn-danger" name="update" value="Update"></center>
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