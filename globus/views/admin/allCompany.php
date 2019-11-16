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
                        <div class="product-status-wrap">
                            
                            <div class="add-product">
                            </div>
  
                            <table>
                                <tr>
                                    <th>N0#</th>
                                    <th>Image</th>
                                    <th>Company Name</th>
                                    <th>Company Country</th>
                                    <th>Company Location</th>
                                    <th>Company Category</th>
                                    <th>Company Status</th>
                                    <th>Actions</th>
                                </tr>
                                                          <?php
 
    $getComp=$db->getCompany();
    if(!empty($getComp)):
        $count=0;
        foreach($getComp as $show):
            $count++;
            ?>

                                <tr>
                                    <td><?php echo '#'.$count;?></td>
                                    <td> <img src="<?php echo '../../img/company/'.$show['company_picture'];?>" class="col-md-12" /></td>
                                    <td><?php echo $show['company_name'];?></td>
                                    <td><?php echo $show['country_name'];?></td>
                                    <td><?php echo $show['company_location'];?></td>
                                    <td><?php echo $show['category_name'];?></td>
                                    <td><?php if($show['company_status']=0) echo 'Desactivated'; else echo 'Activated';?></td>
                         <td>
                            <a href="" class="glyphicon glyphicon-pencil text-primary" data-toggle="modal" <?php  echo 'data-target="#edit'.$show['companyID'].'ers"'; ?>></a>  
                             <a href="" class="glyphicon glyphicon-remove text-danger" data-toggle="modal" <?php  echo 'data-target="#remove'.$show['companyID'].'ers"'; ?>></a>
                          </td>

      <div class="modal fade"  <?php  echo 'id="remove'.$show['companyID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Deletion of Company Account</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="post" action="../../class/CompanyController.php" class="form-group" style="shape-margin: 20px;">
                <center><label>Do you want to Delete this Company: <?php echo $show['company_name'];?>?</label><br>
                <input type="text" hidden="" value="<?php echo $show['companyID'];?>" name="companyID">
                <button class="btn btn-secondary btn-default" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"></center>
            </form>
           </div>
          </div>
        </div>
      </div>
    </div>
    <!--edit the selected field-->

     <div class="modal fade"  <?php  echo 'id="edit'.$show['companyID'].'ers"';?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Updating the Admin Account</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="post" action="../../class/CompanyController.php" class="form-group" style="shape-margin: 20px;">
                <input type="text" hidden="" value="<?php echo $show['companyID'];?>" name="companyID">
                <div class="form-group">
                  <input type="text" name="name" value="<?php echo $show['company_name'];?>" class="form-control col-xs-6">
                </div><br><br><br>
                <div class="form-group">
                  <input type="text" name="location" value="<?php echo $show['company_location'];?>" class="form-control col-xs-6">
                </div><br><br>
                <div class="form-group">
                            <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <select name="country" required="required"  class="form-control col-lg-12 col-md-12 col-xs-12">
                                                                     <option value="<?php echo $show['countryID'];?>" hidden=""><?php echo $show['country_name'];?></option>
<?php
$tblName='country';
$condition=array( 'Order by' => 'countryID asc' );
$allcountry=$db->getRows($tblName,$condition);
if(!empty($allcountry)):
    foreach($allcountry as $showC): 
?>
                                                                <option value="<?php echo $showC['countryID'];?>"><?php echo $showC['country_name'];?></option>
<?php
    endforeach;
endif;
?>
                                                            </select>
                                                        </div>
                            </div>
                </div>
               <div class="form-group">
                  <input type="text" name="category" value="<?php echo $show['categoryID'];?>" class="form-control col-xs-6">
              </div><br><br>
              <div class="form-group">
                  <select  name="status"  class="form-control col-xs-6">
                    <option hidden="" value="<?php echo $show['company_status'];?>"><?php if($show['company_status']==0) echo 'Desactivated'; else if($show['company_status']==1) echo 'Activated';?></option>
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


                                    </td>
                                </tr>
                                <?php
                                endforeach;
                            endif;
                            ?>
                            </table>
                            
                            <div class="custom-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- morrisjs JS
        ============================================ -->
    <script src="../../js/sparkline/jquery.sparkline.min.js"></script>
    <script src="../../js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="../../js/calendar/moment.min.js"></script>
    <script src="../../js/calendar/fullcalendar.min.js"></script>
    <script src="../../js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="../../js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="../../js/main.js"></script>
</body>
<?php $_SESSION['sessData']='';?>
</html>