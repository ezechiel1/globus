<?php
	//admin control code
	//start session
	session_start();

	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();
	//load and initialize Extra class
	require_once '../core/extra.php';
	$extra = new Extra();

	//set default redirect url
	$redirectURL = '../../'.$db->url;
	//type
	$type=$_SESSION['type'];
	$subcategory=$_GET['subcategory'];
	$Category=$_GET['ct'];
	$pID=$_GET['pID'];

	//get data from the admin form
	if(isset($_POST['RegisterProduct1']))
	{
		$tblNameProduct=$db->getTableProduct($_POST['product_category'],$_POST['product_sub_category']);
		$tblNamePicture=$db->getTablePicture($_POST['product_category'],$_POST['product_sub_category']);
		$sPath=substr($db->getSubCatPath($_POST['product_category'],$_POST['product_sub_category']),3);
		$product_picture=$extra->uploadPicture($sPath,$_FILES['product_picture']);
		if($product_picture)
		{
			//insert data
				$adminData = array
				(	
					'product_name' => $_POST['product_name'],
					'product_description' => $_POST['product_description'],
					'product_quantity' => $_POST['product_quantity'],
					'product_price' => $_POST['product_price'],
					'product_color' => $_POST['product_color'],
					'product_status' => 0,
					'product_picture' => $product_picture,
					'post_status' => 0,
					'categoryID' => $_POST['product_category'],
					'subCategoryID' => $_POST['product_sub_category'],
					'ownerID' => $_SESSION['ID'],
					'owner_type' => $_SESSION['type'],
					'c_date' => $db->showDate()
				 );

				$insert = $db->insert($tblNameProduct, $adminData);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
                	$sessData['status']['msg'] = 'Operation done successfully.';
					//set redirect url
					if($type==5):
                		$redirectURL .= 'supplier/addProducts.php?product='.$_SESSION['subCatName'].'&pID='.$_SESSION['subCatID'];
                	elseif($type==6):
                		$redirectURL .= 'seller/addProducts.php?product='.$_SESSION['subCatName'].'&pID='.$_SESSION['subCatID'];
                	endif;
				}
				else{
					$sessData['status']['type']='error';
					$sessData['status']['msg']='Operation failed, Please Try again.';
					//set redirect url
					if($type==5):
                		$redirectURL .= 'supplier/addProducts.php?product='.$_SESSION['subCatName'].'&pID='.$_SESSION['subCatID'];
                	elseif($type==6):
                		$redirectURL .= 'seller/addProducts.php?product='.$_SESSION['subCatName'].'&pID='.$_SESSION['subCatID'];
                	endif;
				}
			}
			else{
				$sessData['status']['type']='error';
				$sessData['status']['msg']='Some Errors occured with the Picture!';
				//set redirect url
					if($type==5):
                		$redirectURL .= 'supplier/addProducts.php?product='.$_SESSION['subCatName'].'&pID='.$_SESSION['subCatID'];
                	elseif($type==6):
                		$redirectURL .= 'seller/addProducts.php?product='.$_SESSION['subCatName'].'&pID='.$_SESSION['subCatID'];
                	endif;
			}
		

	  //store status into the session
	    $_SESSION['sessData'] = $sessData;
	    
	    //redirect to the list page
	    header("Location:".$redirectURL);
	}

	// update 
if(isset($_POST['updateCategory']))
{
    //check if the form is not empty
     $tblName=$db->getTableProduct($_POST['$categoryID'],$_POST['subCategoryID']);
            //insert data
            $userData = array
            (
                'product_name' => $_POST['product_name']
            );

            $condition=array(
            	'productID' => $_POST['productID'] 
            );
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
                //code to Rename the Directory
                $renameFolder=$extra->renameParentFolder($_POST['old_product_name'],$_POST['product_name']);
                $renameTable=$db->renameTable($_POST['old_product_name'],$_POST['product_name']);
                 

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 
            }
    //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    elseif($type==4):
                        $redirectURL .= 'it/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}

// delete
if(isset($_POST["delete"]) )

{
    $tblName=$db->getTableProduct($_POST['$categoryID'],$_POST['subCategoryID']);
    // the update condintion, means where to apply the update in a table 
    $Condition = array
            (
                'productID'=> $_POST['productID']
            )
            ;
            $delete = $db->delete($tblName,$Condition);
            if($delete){
                //code to Delete the Directory
                $deleteFolder=$extra->deleteParentFolder($_POST['product_name']);
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
           
            }
  //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    elseif($type==4):
                        $redirectURL .= 'it/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
    
}

// Activate the Category
if(isset($_POST['activate']))
{
    //check if the form is not empty
      $tblName=$db->getTableProduct($_POST['$categoryID'],$_POST['subCategoryID']);
            //insert data
            $userData = array
            (
                'product_status' => 1
            );

            $condition=array(
            	'productID'=>$_POST['productID']
             );
            $update = $db->update($tblName,$userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
               
            }

    //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    elseif($type==4):
                        $redirectURL .= 'it/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}

// Activate the Category
if(isset($_POST['desactivate']))
{
    //check if the form is not empty
     $tblName=$db->getTableProduct($_POST['$categoryID'],$_POST['subCategoryID']);
            //insert data
            $userData = array
            (
                'product_status' => 0
            );

            $condition=array(
            	'productID'=>$_POST['productID']
            );
            $update = $db->update($tblName,$userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
               
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
              
            }
    //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    elseif($type==4):
                        $redirectURL .= 'it/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}

// Post the Category
if(isset($_POST['post_online']))
{
    //check if the form is not empty
     $tblName=$db->getTableProduct($_POST['$categoryID'],$_POST['subCategoryID']);
            //insert data
            $userData = array
            (
                'post_status' => 1
            );

            $condition=array(
            	'productID' =>$_POST['productID']
            );
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
               
            }
            else{
                $sessData['status']['type'] = 'error';
               $sessData['status']['msg'] = 'Operation failed, try again later ';          
            }
                    if($type==1):
                        $redirectURL .= 'admin/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    elseif($type==4):
                        $redirectURL .= 'it/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}

// Post the Category
if(isset($_POST['post_offline']))
{
    //check if the form is not empty
    $tblName=$db->getTableProduct($_POST['categoryID'],$_POST['subCategoryID']);
            //insert data
            $userData = array
            (
                'post_status' => 0
            );

            $condition=array(
            	'productID' =>$_POST['productID']
            );
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
          
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
              
            }
    //set redirect url
                     if($type==1):
                        $redirectURL .= 'admin/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    elseif($type==4):
                        $redirectURL .= 'it/products.php?subCategory='.$_POST['subCategory_name'].'&ct='. $Category.'&pID='.$pID;
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}