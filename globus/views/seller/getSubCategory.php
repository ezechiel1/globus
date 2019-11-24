<?php
//load and initialize database class
require_once '../../core/db.php';
$db = new DB();
$categoryID=$_POST['data'];
?>
 <select name="product_sub_category"  required="" class="form-control pro-edt-select form-control-primary" style="margin-top: 15px !important;">
                                                        <option value="" hidden="">Product-Sub-Category</option>
                                                    <?php
$tblNamec='subcategory';
$conditionc=array( 'Order by' => 'subCategoryID asc',
				'where'=>array('categoryID'=>$categoryID)
 );
$allCategoryc=$db->getRows($tblNamec,$conditionc);
if(!empty($allCategoryc)):
    foreach($allCategoryc as $showCc): 
?>
                                                           <option value="<?php echo $showCc['subCategoryID'];?>"><?php echo $showCc['subCategory_name'];?></option>
<?php
    endforeach;
endif;
?>

                                                    </select>