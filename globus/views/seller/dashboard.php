<?php include('header.php');
?>
          
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                                <h4 class="text-left text-uppercase"><b>Suppliers</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="col-xs-3 mar-bot-15 text-left">
                                        <label class="label bg-green">-- <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                    </div>
<?php
//Code to select data form the table database

$allAdmin=$db->getSupplierID();
//check if there are available data
if(!empty($allAdmin)):
    foreach($allAdmin as $show):
?>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?=$show['supplierID']?></h2>
                                    </div>
<?php endforeach;endif;?>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 78%;" class="progress-bar bg-green"></div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Sellers</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <label class="label bg-red">-- <i class="fa fa-level-down" aria-hidden="true"></i></label>
                                    </div>
<?php
//Code to select data form the table database

$allAdmin=$db->getSellerID();
//check if there are available data
if(!empty($allAdmin)):
    foreach($allAdmin as $show):
?>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?=$show['sellerID']?></h2>
                                    </div>
<?php endforeach;endif;?>                                   
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 38%;" class="progress-bar progress-bar-danger bg-red"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Ambassaders</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <label class="label bg-blue">-- <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                    </div>
<?php
//Code to select data form the table database

$allAdmin=$db->getAmbassadorID();
//check if there are available data
if(!empty($allAdmin)):
    foreach($allAdmin as $show):
?>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?=$show['ambassadorID']?></h2>
                                    </div>
<?php endforeach;endif;?>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar bg-blue"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Agents</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <label class="label bg-purple">-- <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                    </div>
<?php
//Code to select data form the table database

$allAdmin=$db->getAgentID();
//check if there are available data
if(!empty($allAdmin)):
    foreach($allAdmin as $show):
?>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?=$show['agentID']?></h2>
                                    </div>
<?php endforeach;endif;?>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar bg-purple"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject text-uppercase"><b>Product Sales</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-grey active">
                                                    <input type="radio" name="options" class="toggle" id="option1" checked="">Today</label>
                                                <label class="btn btn-grey">
                                                    <input type="radio" name="options" class="toggle" id="option2">Week</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #24caa1;"></i>Bags</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #00b5c2;"></i>Shoes</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #ff7f5a;"></i>Jewelery</h5>
                                </li>
                            </ul>
                            <div id="morris-area-chart" style="height: 356px;"></div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-t-30">
                            <h3 class="box-title">Categories</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
<?php                                
$allAdmin=$db->getCategoryID();
//check if there are available data
if(!empty($allAdmin)):
    foreach($allAdmin as $show):
?>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span style="font-size: 25px;" class="counter text-success"><?=$show['categoryID']?></span></li>
<?php endforeach;endif;?>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs mg-b-10">
                            <h3 class="box-title">SubCategories</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
<?php                                
$allAdmin=$db->getSubCategoryID();
//check if there are available data
if(!empty($allAdmin)):
    foreach($allAdmin as $show):
?>                               
                                <li class="text-right"><i class="fa fa-level-up" aria-hidden="true"></i> <span style="font-size: 25px;" class="counter text-purple"><?=$show['subCategoryID']?></span></li>
<?php endforeach;endif;?>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs mg-b-10">
                            <h3 class="box-title">Client</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
<?php                                
$allAdmin=$db->getClientID();
//check if there are available data
if(!empty($allAdmin)):
    foreach($allAdmin as $show):
?>
                                <li class="text-right"><i class="fa fa-level-up" aria-hidden="true"></i> <span style="font-size: 25px;" class="counter text-info"><?=$show['clientID']?></span></li>
<?php endforeach;endif;?>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs">
                            <h3 class="box-title">Companies</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
<?php                                
$allAdmin=$db->getCompanyID();
//check if there are available data
if(!empty($allAdmin)):
    foreach($allAdmin as $show):
?>
                                <li class="text-right"><i class="fa fa-level-down" aria-hidden="true"></i> <span style="font-size: 25px;" class="text-danger"><?=$show['companyID']?></span></li>
<?php endforeach;endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
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
    <!-- morrisjs JS
		============================================ -->
    <script src="../../js/morrisjs/raphael-min.js"></script>
    <script src="../../js/morrisjs/morris.js"></script>
    <script src="../../js/morrisjs/morris-active.js"></script>
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

</html>