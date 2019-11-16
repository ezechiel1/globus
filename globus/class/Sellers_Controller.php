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
			//insert data
				$adminData = array
				(	'seller_fname' =>$_POST['Fname'],
					'seller_lname' =>$_POST['Lname'],
					'seller_email' =>$_POST['Email'],
					'seller_phone' =>$_POST['Telephone'],
					'seller_status' =>$_POST['Status'] ,
					'seller_country' =>$_POST['Country'],
					'seller_location' =>$_POST['City'],
					'seller_password' =>$_POST[$password='globus']
				 )
				;
				$insert = $db ->insert($tblName, $adminData);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
                	$sessData['status']['msg'] = 'Operation done successfully.';
					//set redirect url
                	$redirectURL .= 'admin/addSellers.php';
				}
				else{
					$getMessage['status']['type']='error';
					$getMessage['status']['type']='Operation failed, Please Try again.';
					//set redirect url
                	$redirectURL .= 'admin/addSellers.php';
				}
		}
		else
		{
			$getMessage['status']['type']='error';
			$getMessage['status']['type']='Operation failed, Please Try again.';
			//set redirect url
                	$redirectURL .= 'admin/addSellers.php';
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
                $redirectURL .= 'admin/allSellers.php';

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                //set redirect url
                $redirectURL .= 'admin/allSellers.php';
            }
    }

    else 
    {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'fill all required fields';
        
        //set redirect url
        $redirectURL .= 'admin/allSellers.php';
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
// the update condition, means where to apply the update in a table 

             $Condition = array
            (
                    
              'sellerID'=> $_POST['deletefrom']
            )
            ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully.';
            //set redirect url
                  $redirectURL .= 'admin/allSellers.php';
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later.';
                
                //set redirect url
               $redirectURL .= 'admin/allSellers.php';
            }

            //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
    }
?>