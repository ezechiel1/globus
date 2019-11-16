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


