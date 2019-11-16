<?php
	//admin control code
	//start session
	session_start();

	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = '../../'.$db->url;
	//get data from the admin form
	if(isset($_POST['AddSellers']))
	{
		if(!empty($_POST['Fname']) && !empty($_POST['Lname']))
		{
			$tblName='seller';
            $code=$_SESSION['type'];
			//insert data
				$adminData = array
				(	'seller_fname' =>$_POST['Fname'],
					'seller_lname' =>$_POST['Lname'],
					'seller_email' =>$_POST['Email'],
					'seller_phone' =>$_POST['Telephone'],
                    'companyID' =>$_POST['Company'] ,
                    'categoryID' =>$_POST['categoryID'],
                    'subCategoryID' =>$_POST['Subcategory'],
					'seller_status' =>$_POST['Status'] ,
					'seller_country' =>$_POST['Country'],
					'seller_location' =>$_POST['City'],
                    'seller_pin' => 0,
					'seller_password' =>'123456',
                    'addedby'=> $_SESSION['ID'],
                    'type'=>$_SESSION['type']
				 )
				;
				$insert = $db ->insert($tblName, $adminData);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
                	$sessData['status']['msg'] = 'Operation done successfully.';
					//set redirect url
                if($code==1): $redirectURL .= 'admin/addSellers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addSellers.php';
                elseif($code==3): $redirectURL .= 'agent/addSellers.php';
                elseif($code==4): $redirectURL .= 'it/addSellers.php';
                endif;
				}
				else{
					$getMessage['status']['type']='error';
					$getMessage['status']['type']='Operation failed, Please Try again.';
					//set redirect url
                if($code==1): $redirectURL .= 'admin/addSellers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addSellers.php';
                elseif($code==3): $redirectURL .= 'agent/addSellers.php';
                elseif($code==4): $redirectURL .= 'it/addSellers.php';
                endif;
				}
		}
		else
		{
			$getMessage['status']['type']='error';
			$getMessage['status']['type']='Operation failed, Please Try again.';
			//set redirect url
                if($code==1): $redirectURL .= 'admin/addSellers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addSellers.php';
                elseif($code==3): $redirectURL .= 'agent/addSellers.php';
                    elseif($code==4): $redirectURL .= 'it/addSellers.php';
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
  
  $tblName = 'seller';
   $code=$_SESSION['type'];
            //insert data
            $userData = array
            (
                'seller_fname' => $_POST['Fname'],
                'seller_lname' => $_POST['Lname'],
                'seller_email' => $_POST['Email'],
                'seller_phone' => $_POST['Telephone'],
                'seller_location' => $_POST['Location'],
                'seller_status' => $_POST['Status']

            );

            $condition=array('sellerID' => $_POST['updateform'] );
            ;
            $update = $db->update($tblName, $userData, $condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/allSellers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allSellers.php';
                elseif($code==3): $redirectURL .= 'agent/allSellers.php';
                elseif($code==4): $redirectURL .= 'it/allSellers.php';
                endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                //set redirect url
                if($code==1): $redirectURL .= 'admin/allSellers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allSellers.php';
                elseif($code==3): $redirectURL .= 'agent/allSellers.php';
                    elseif($code==4): $redirectURL .= 'it/allSellers.php';
                endif;
            }
    }

    else 
    {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'fill all required fields';
        
        //set redirect url
           if($code==1): $redirectURL .= 'admin/allSellers.php'; 
            elseif($code==2): $redirectURL .= 'ambassador/allSellers.php';
            elseif($code==3): $redirectURL .= 'agent/allSellers.php';
                elseif($code==4): $redirectURL .= 'it/allSellers.php';
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
     
           $tblName='seller';
           $code=$_SESSION['type'];
// the update condition, means where to apply the update in a table 

             $Condition = array
            (
                    
              'sellerID'=> $_POST['deleteform']
            )
            ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully.';
            //set redirect url
                  if($code==1): $redirectURL .= 'admin/allSellers.php'; 
                  elseif($code==2): $redirectURL .= 'ambassador/allSellers.php';
                  elseif($code==3): $redirectURL .= 'agent/allSellers.php';
                    elseif($code==4): $redirectURL .= 'it/allSellers.php';
                  endif;
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later.';
                
                //set redirect url
                if($code==1): $redirectURL .= 'admin/allSellers.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allSellers.php';
                elseif($code==3): $redirectURL .= 'agent/allSellers.php';
                    elseif($code==4): $redirectURL .= 'it/allSellers.php';
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
  $tblName = 'seller';
  $code=$_SESSION['type'];
  $password='123456';
            //insert data
            $userData = array
            (
                'seller_fname' => 0,
                'seller_password' => $password
            );

            $condition=array('sellerID' => $_POST['deleteform'],);
            ;
            $update = $db->update($tblName, $userData, $condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allAgents.php';
                endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                //set redirect url
                if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allAgents.php';
                endif;
            }
   
       //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
   

}

?>