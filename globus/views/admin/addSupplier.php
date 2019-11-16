<?php include('header.php');
include('ajax.php');
?>             <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd"></br></br>     
                                    <h1>New Supplier <small><strong class="pull-right text-success">
                                    <?php
                                    $sessData=array();
                                    if($_SESSION['sessData']!='')
                                    {
                                    $sessData=$_SESSION['sessData'];
                                    if($sessData) echo $sessData['status']['msg'];
                                    }
                                    ?>
                                    </strong></small></h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">

                                                <form action="../../class/supplierController.php" method="post">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">First Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="Fname" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Last Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="Lname" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Company</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <select required="" name="Company" id="categoryID" onchange="getSubCategory();" required="" class="form-control pro-edt-select form-control-primary" style="margin-top: 0px !important;">
                                                                <option value="" hidden="" >Select The Company</option>
        
<?php
$tblName='company';
$condition=array( 'Order by' => 'companyID asc' );
$allcompany=$db->getRows($tblName,$condition);
if(!empty($allcompany)):
    foreach($allcompany as $showC): 
?>
                                                        <option value="<?php echo $showC['companyID'];?>"><?php echo $showC['company_name'];?></option>
<?php
    endforeach;
endif;
?>

                                                    </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Subcategory</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                   <span id="getSubCat">
                                                    <select required="" name="Subcategory" required="" class="form-control pro-edt-select form-control-primary" style="margin-top: 0px !important;">

                                                            <option value="" hidden="">Select The SubCategory</option>
                                                            
                                                    </select>
                                                    </span>
                                                        </div>
                                                        </div>
                                                    </div>
                                        
                                                
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Country</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <select name="Country" required="required"  class="form-control col-lg-9 col-md-7 col-xs-12">
                                                                     <option value="" hidden="">Select The Country</option>
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
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Location</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="City" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Email</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="email" class="form-control" name="Email" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Telephone</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" data-mask="999-999-999-999" class="form-control" placeholder=""  name="Telephone" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                   <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Status</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <select name="Status" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter the mobile number">
                                                                    <option value="1">Activer</option>
                                                                    <option value="0">Desactiver</option>
                                                                </select>
                                                            </div>
                                                      </div>
                                                  </div>
                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        <button class="btn btn-white" type="submit">Cancel</button>
                                                                        <input class="btn btn-sm btn-primary login-submit-cs" type="submit" name="AddSupplier" value="Register">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
        <!-- Basic Form End-->
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
    <!-- touchspin JS
        ============================================ -->
    <script src="../../js/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="../../js/touchspin/touchspin-active.js"></script>
    <!-- colorpicker JS
        ============================================ -->
    <script src="../../js/colorpicker/jquery.spectrum.min.js"></script>
    <script src="../../js/colorpicker/color-picker-active.js"></script>
    <!-- datapicker JS
        ============================================ -->
    <script src="../../js/datapicker/bootstrap-datepicker.js"></script>
    <script src="../../js/datapicker/datepicker-active.js"></script>
    <!-- input-mask JS
        ============================================ -->
    <script src="../../js/input-mask/jasny-bootstrap.min.js"></script>
    <!-- chosen JS
        ============================================ -->
    <script src="../../js/chosen/chosen.jquery.js"></script>
    <script src="../../js/chosen/chosen-active.js"></script>
    <!-- select2 JS
        ============================================ -->
    <script src="../../js/select2/select2.full.min.js"></script>
    <script src="../../js/select2/select2-active.js"></script>
    <!-- ionRangeSlider JS
        ============================================ -->
    <script src="../../js/ionRangeSlider/ion.rangeSlider.min.js"></script>
    <script src="../../js/ionRangeSlider/ion.rangeSlider.active.js"></script>
    <!-- rangle-slider JS
        ============================================ -->
    <script src="../../js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="../../js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
    <script src="../../js/rangle-slider/rangle-active.js"></script>
    <!-- knob JS
        ============================================ -->
    <script src="../../js/knob/jquery.knob.js"></script>
    <script src="../../js/knob/knob-active.js"></script>
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

<?php 
$_SESSION['sessData']='';
?>
</html>   