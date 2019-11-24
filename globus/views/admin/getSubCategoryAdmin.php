<?php
//load and initialize database class
require_once '../../core/db.php';
$db = new DB();
$companyID=$_POST['data'];
?>

 <?php
$tblNamec='company';
$conditionc=array( 'order_by' => 'companyID asc',
				'where'=>array('companyID'=>$companyID)
 );
$allCategoryc=$db->getRows($tblNamec,$conditionc);
if(!empty($allCategoryc)):
    foreach($allCategoryc as $showCc): $cid=$showCc['categoryID']; 
  ?>
   <input type="hidden"  name="categoryID" value="<?php echo $showCc['categoryID'];?>">
   <select name="Subcategory"  required="" class="form-control pro-edt-select form-control-primary" >
                                          <option value="" hidden="">Select The SubCategory</option>
<?php
$queryS=$db->getRows('subcategory', array('where'=>array('categoryID'=>$cid)));
if(!empty($queryS)): foreach($queryS as $showsub):
?>
                                             <option value="<?php echo $showsub['subCategoryID'];?>"><?php echo $showsub['subCategory_name'];?></option>
<?php
		endforeach; endif;
    endforeach;
endif;
?>
 </select>
