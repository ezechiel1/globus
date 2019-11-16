<?php
//load and initialize database class
require_once '../../core/db.php';
$db = new DB();
$companyID=$_POST['data'];
?>

 <?php
$tblNamec='company';
$conditionc=array( 'Order by' => 'companyID asc',
				'where'=>array('companyID'=>$companyID)
 );
$allCategoryc=$db->getRows($tblNamec,$conditionc);
if(!empty($allCategoryc)):
    foreach($allCategoryc as $showCc): 
  ?>
   <input type="hidden"  name="categoryID" value="<?php echo $showCc['categoryID'];?>">
   <select name="Subcategory"  required="" class="form-control pro-edt-select form-control-primary" >
                                          <option value="" hidden="">Select The SubCategory</option>
     <?php
    	$tblNameSub='subcategory';
		$conditionsub=array( 'Order by' => 'subCategoryID asc',
						'where'=>array('categoryID'=>$showCc['categoryID'])
		 );
		$allCategorysub=$db->getRows($tblNameSub,$conditionsub);
		if(!empty($allCategorysub)):
		    foreach($allCategorysub as $showsub): 
?>
                                          <option value="<?php echo $showsub['subCategoryID'];?>"><?php echo $showsub['subCategory_name'];?></option>
<?php
		endforeach;
	  endif;
    endforeach;
endif;
?>
 </select>
