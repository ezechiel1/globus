<?php include('header.php');
?>
<script type="text/javascript">
    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById("input_Imagees");
            output.src =reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd"></br></br>
                                    <h1 style="margin-top: 10px;">New Agent <small><strong class="pull-right text-success">
                                        <?php
                                        $datasess=array();
                                        $datasess=$_SESSION['sessData'];
                                        if($datasess!='') 
                                            echo $datasess['status']['msg'];
                                        ?>
                                    </strong></small></h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="../../class/addAgent_Controller.php" method="POST">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Product Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="Fname" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Product Location</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="Lname" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Product Price</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <select name="status" required="required"  class="form-control col-lg-9 col-md-7 col-xs-12">
                                                                <option value="1" name="Country"></option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">City</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="City" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Category</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <select name="category" required="required"  class="form-control col-lg-9 col-md-7 col-xs-12">
                                                                <option value="1" name="Status">Technology</option>
                                                                <option value="2" name="Status">Life and Beauty</option>
                                                                <option value="3" name="Status">Arts and Fourniture</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                               <label class="btn btn-succcess btn-upload col-lg-9 col-md-9 col-sm-9 col-xs-12 btn-sm" for="inputImage" title="Upload image file">
                                
                                                                  <input type="file" class="sr-only" id="inputImage" name="photoprofile" onchange="preview_image(event)" accept="images/*" title="<?php $photo;?>">
                                                                  <span class="docs-tooltip" data-toggle="tooltip" data-target="#remove" title="Import image with Blob URLs">
                                                                    <i class="fa fa-edit m-right-xs"></i> Upload Product Picture here
                                                                  </span>
                                                            </label>

                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div id="image_crop">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="crop-avatar">
                                                        <img src="image_responsive avatar-view"  id="input_Imagees" style="width: 200px; height: 150px; margin-top:10px;">
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                   <div class="form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                          
                                                                          <input type="submit" class="btn btn-success col-md-6 col-xs-12 col-md-push-12" name="submit_photo" value="Enregistrer">
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
    <!-- Cropper -->
    <script src="../../cropper/dist/cropper.min.js"></script>
    <!--==========================================================================
        ==========================
        modal panel=============================
    -->
<div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title" id="exampleModalLabel">Globus~System <span class="text-muted"> | Deletion of Admin Account</span></p></div>
          <div class="modal-body">
           <div class="" style="padding-right: 10px;padding-left: 10px;">
              <form method="post" action="../../class/adminControl.php" class="form-group" style="shape-margin: 20px;">
                <center><label>Do you want to Delete this Admin: <?php echo $show['admin_fname'].' '.$show['admin_lname'];?>?</label><br>
                <input type="text" hidden="" value="<?php echo $show['adminID'];?>" name="adminID">
                <button class="btn btn-secondary btn-default" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"></center>
            </form>
           </div>
          </div>
        </div>
      </div>
    </div>

</body>


</html>
<script type="text/javascript">
    $(document).ready(function){
        $input_Imagees=$('#input_Imagees').cropper({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'square'
            },
            boundry:{
                width:300,
                height:300

            }
        });
        $('#inputImage'). on('change' function(){
            var reader= new FileReader();
            reader.onload=function(event){
                $image_crop.croppie('bind',{
                    url: event.target.result
                }).then(function(){
                    console.log('jquery blind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#insertImageModal').modal('show');
        });
        $('.crop_image').click(function(event){
            $image_crop.croppie('result'{
                type:'canvas',
                size:'viewport'
            }).then(fuction(response){
                $.ajax({
                    url:'../../productController.php',
                    type:'POST',
                    data:{"image":response},
                    success: function(data){
                        $('#insertImageModal').modal('hide');
                        alert(data);
                    }
                })
            });
        });
    }

</script>