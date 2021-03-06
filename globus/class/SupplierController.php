`<?php
	//admin control code
	//start session
	session_start();

	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = '../../'.$db->url;
	//get data from the admin form
	if(isset($_POST['AddSupplier']))
	{
		if(!empty($_POST['Fname']) && !empty($_POST['Lname']))
		{
            $password='globus';
			$tblName='supplier';
            $code=$_SESSION['type'];
			//insert data
				$adminData = array
				(	'supplier_fname' =>htmlspecialchars($_POST['Fname']),
					'supplier_lname' =>htmlspecialchars($_POST['Lname']),
					'supplier_email' =>htmlspecialchars($_POST['Email']),
					'supplier_phone' =>htmlspecialchars($_POST['Telephone']),
                    'companyID' =>htmlspecialchars($_POST['Company']),
                    'categoryID' =>htmlspecialchars($_POST['categoryID']),
                    'subCategoryID' =>htmlspecialchars($_POST['Subcategory']),
					'supplier_status' =>htmlspecialchars($_POST['Status']),
					'supplier_country' =>htmlspecialchars($_POST['Country']),
					'supplier_location' =>htmlspecialchars($_POST['City']),
                    'supplier_pin' => 0,
					'supplier_password' =>sha1($password),
                    'c_date' => $db->showDate(),
                     'addedby'=>$_SESSION['ID'],
                     'type'=>$_SESSION['type']
				 )
				;
				$insert = $db ->insert($tblName, $adminData);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
                	$sessData['status']['msg'] = 'Operation done successfully.';
					//set redirect url
                if($code==1): $redirectURL .= 'admin/addSupplier.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addSupplier.php';
                elseif($code==3): $redirectURL .= 'agent/addSupplier.php';
                elseif($code==4): $redirectURL .= 'it/addSupplier.php';
                elseif($code==5): $redirectURL .= 'supplier/addSupplier.php';
                elseif($code==6): $redirectURL .= 'seller/addSupplier.php';
                endif;
				}
				else{
					$getMessage['status']['type']='error';
					$getMessage['status']['type']='Operation failed, Please Try again.';
					//set redirect url
                if($code==1): $redirectURL .= 'admin/addSupplier.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addSupplier.php';
                elseif($code==3): $redirectURL .= 'agent/addSupplier.php';
                elseif($code==4): $redirectURL .= 'it/addSupplier.php';
                elseif($code==5): $redirectURL .= 'supplier/addSupplier.php';
                elseif($code==6): $redirectURL .= 'seller/addSupplier.php';
                endif;
;
				}
		}
		else
		{
			$getMessage['status']['type']='error';
			$getMessage['status']['type']='Operation failed, Please Try again.';
			//set redirect url
                if($code==1): $redirectURL .= 'admin/addSupplier.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addSupplier.php';
                elseif($code==3): $redirectURL .= 'agent/addSupplier.php';
                elseif($code==4): $redirectURL .= 'it/addSupplier.php';
                elseif($code==5): $redirectURL .= 'supplier/addSupplier.php';
                elseif($code==6): $redirectURL .= 'seller/addSupplier.php';
                endif;

		}

	//store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);

}

//function to update

if(isset($_POST['update']))
{
    if(!empty($_POST['Fname']) && !empty($_POST['Lname']))
    {
  
  $tblName = 'supplier';
  $code=$_SESSION['type'];
            //insert data
            $userData = array
            (
                'supplier_fname' => htmlspecialchars($_POST['Fname']),
                'supplier_lname' => htmlspecialchars($_POST['Lname']),
                'supplier_email' => htmlspecialchars($_POST['Email']),
                'supplier_phone' => htmlspecialchars($_POST['Telephone']),
                'supplier_country' => htmlspecialchars($_POST['Country']),
                'supplier_location' => htmlspecialchars($_POST['Location']),
                'supplier_status' => htmlspecialchars($_POST['Status'])

            );

            $condition=array('supplierID' => $_POST['updateform'] );
            ;
            $update = $db->update($tblName, $userData, $condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/allSuppliers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allSuppliers.php';
                elseif($code==3): $redirectURL .= 'agent/allSuppliers.php';
                elseif($code==4): $redirectURL .= 'it/allSuppliers.php';
                elseif($code==5): $redirectURL .= 'supplier/allSuppliers.php';
                elseif($code==6): $redirectURL .= 'seller/allSuppliers.php';
                endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                //set redirect url
                if($code==1): $redirectURL .= 'admin/allSuppliers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allSuppliers.php';
                elseif($code==3): $redirectURL .= 'agent/allSuppliers.php';
                 elseif($code==4): $redirectURL .= 'it/allSuppliers.php';
                elseif($code==5): $redirectURL .= 'supplier/allSuppliers.php';
                elseif($code==6): $redirectURL .= 'seller/allSuppliers.php';
                endif;
            }
    }

    else 
    {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'fill all required fields';
        
        //set redirect url
                if($code==1): $redirectURL .= 'admin/allSuppliers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allSuppliers.php';
                elseif($code==3): $redirectURL .= 'agent/allSuppliers.php';
                elseif($code==4): $redirectURL .= 'it/allSuppliers.php';
                elseif($code==5): $redirectURL .= 'supplier/allSuppliers.php';
                elseif($code==6): $redirectURL .= 'seller/allSuppliers.php';
                endif;
       }

       //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
   

}

//function to delete

if(isset($_POST['delete']))
     {
     
           $tblName='supplier';
           $code=$_SESSION['type'];
// the update condition, means where to apply the update in a table 

             $Condition = array
            (
                    
              'supplierID'=> $_POST['deletefrom']
            );
            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully.';
            //set redirect url
                 if($_SESSION['type']==1): $redirectURL .= 'admin/allSuppliers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allSuppliers.php';
                elseif($code==3): $redirectURL .= 'agent/allSuppliers.php';
                elseif($code==4): $redirectURL .= 'it/allSuppliers.php';
                elseif($code==5): $redirectURL .= 'supplier/allSellers.php';
                elseif($code==6): $redirectURL .= 'seller/allSellers.php';
                else: $redirectURL .= 'it/allSuppliers.php';
                endif;
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later.';
                
                //set redirect url
               if($code==1): $redirectURL .= 'admin/allSuppliers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allSuppliers.php';
                elseif($code==3): $redirectURL .= 'agent/allSuppliers.php';
                elseif($code==4): $redirectURL .= 'it/allSuppliers.php';
                 elseif($code==5): $redirectURL .= 'supplier/allSellers.php';
                elseif($code==6): $redirectURL .= 'seller/allSellers.php';
                endif;
            }

            //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
    }

    //code to reset the password
if(isset($_POST['reset']))
{
  $tblName = 'supplier';
  $code=$_SESSION['type'];
  $password='globus';
            //insert data
            $userData = array
            (
                'supplier_pin' => 0,
                'supplier_password' => sha1($password)
            );

            $condition=array('supplierID' => $_POST['deleteform'],);
            ;
            $update = $db->update($tblName, $userData, $condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allSuppliers.php';
                 elseif($code==5): $redirectURL .= 'supplier/allSellers.php';
                elseif($code==6): $redirectURL .= 'seller/allSellers.php';
                endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                //set redirect url
                if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allSuppliers.php';
                 elseif($code==5): $redirectURL .= 'supplier/allSuppliers.php';
                elseif($code==6): $redirectURL .= 'seller/allSellers.php';
                endif;
            }
   
       //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
   

}

?>