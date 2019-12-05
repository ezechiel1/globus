<?php include('header.php');
?>
        <!-- Multi Upload Start-->
        
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="dropzone-pro">
                            <div id="dropzone">
                                <form action="/upload" class="dropzone dropzone-custom needsclick" id="demo-upload">
                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">First Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="firstname" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Last Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="lastname" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
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
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">City</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="city" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Email</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="email" class="form-control" name="email" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Telephone</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" data-mask="999-999-999-999" class="form-control" placeholder=""  name="phone" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                   <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Stutus</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <select name="status" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter the mobile number">
                                                                    <option value="1">Activer</option>
                                                                    <option value="0">Desactiver</option>
                                                                </select>
                                                            </div>
                                                      </div>
                                                  </div>
                                    <div class="dz-message needsclick download-custom">
                                        <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                        <h2>Drop files here or click to upload.</h2>
                                        <p><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                        </p>
                                    </div>
                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        <button class="btn btn-white" type="submit">Cancel</button>
                                                                        <input class="btn btn-sm btn-primary login-submit-cs" type="submit" name="addAdminS" value="Add Admin">
                                                                </div>
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
    <script src="../../js/dropzone/dropzone.js"></script>
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

</html>