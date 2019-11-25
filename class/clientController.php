<?php
	//admin control code
	//start session
	session_start();

	//load and initialize database class
	require_once '../core/db.php';
    require_once '../core/extra.php';
	$db = new DB();
    $extra = new Extra();

	//set default redirect url
	$redirectURL = '../../'.$db->url;
	//get data from the admin form
	if(isset($_POST['AddClient']))
	{
        $sPath='../img/client/';
        $product_picture=$extra->uploadPicture($sPath,$_FILES['profile']);

			$tblName='client';
			//insert data
				$clientData = array
				(
                    'client_profile' =>$product_picture,
                	'client_fname' =>$_POST['lname'],
					'client_lname' =>$_POST['lname'],
					'client_email' =>$_POST['email'],
					'client_phone' =>$_POST['phone'],
                    'client_gender' =>$_POST['sex'],
                    'client_pin' => 1,
					'client_password' =>$_POST['password'],
                    'date' => $db->showDate('datetime')
				 ); 
        if ($_POST['password']!=$_POST['confirm']) {
                            $sessData['status']['type'] = 'error';
                            $sessData['status']['msg'] = 'Operation failed, Please Try again.';
                            //set redirect url
                            $redirectURL .= '../views/account-login.php?r=fail';
        }else{
            $insert = $db ->insert($tblName, $clientData);
                        if($insert)
                        {
                            $sessData['status']['type'] = 'success';
                            $sessData['status']['msg'] = 'Operation done successfully.';
                            //set redirect url
                            $redirectURL .= '../views/account-login.php?r=success';
                        }
                        else{
                            $getMessage['status']['type']='error';
                            $getMessage['status']['type']='Operation failed, Please Try again.';
                            //set redirect url
                            $redirectURL .= '../views/account-login.php?r=fail';
                        }
                }


        				
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