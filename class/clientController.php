<?php
	//admin control code
	//start session
	session_start();

	//load and initialize database class
	require_once '../core/db.php';
    require_once '../core/extra.php';
	$db = new DB();
    $extra = new Extra();

    //profile image 
    
    

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
                	'client_fname' =>$_POST['fname'],
					'client_lname' =>$_POST['lname'],
                    'client_profil' =>$product_picture,
					'client_email' =>$_POST['email'],
					'client_phone' =>$_POST['phone'],
                    'client_gender' =>$_POST['sex'],
                    'client_location' =>'',
                    'client_pin' => 1,
					'client_password' =>sha1($_POST['password']),
                    'c_date' => $db->showDate('datetime')
				 ); 
        if ($_POST['password']!=$_POST['confirm']) {
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg'] = '<span style="color:red;">Operation failed, Please Try again,Password mismatch.</span>';
                        //set redirect url
                        $redirectURL = '../views/account-login.php';
        }else{
            $getClient='client';
            $condition=array('where'=>array('client_email'=>$_POST['email']));
            $get=$db->getRows($getClient,$condition);
            if(!empty($get)) {
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = '<span style="color:red;">Operation failed, Please Try again,The email already exist.</span>';
                //set redirect url
                $redirectURL = '../views/account-login.php';
            }else{
                $insert = $db ->insert($tblName, $clientData);
                        if($insert)
                        {
                            $sessData['status']['type'] = 'success';
                            $sessData['status']['msg'] = 'Operation done successfully.';
                            //set redirect url
                            $redirectURL = '../views/account-login.php';
                        }
                        else{
                            $sessData['status']['type']='error';
                            $sessData['status']['type']='<span style="color:red;">Operation failed, Please Try again.</span>';
                            //set redirect url
                            $redirectURL = '../views/account-login.php';
                        }
                }

    
            }
        				
        }

//store status into the session
    $_SESSION['sessDataClient'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
   if (isset($_POST['UpdateClient'])) {
      $tblName='client';
      $table=array
      (
        'client_fname' =>$_POST['fname'],
        'client_lname' =>$_POST['lname'],
        'client_email' =>$_POST['email'],
        'client_phone' =>$_POST['phone'],
        'client_gender' =>$_POST['sex'],
        'c_date' => $db->showDate('datetime')
      );
      $condition= array('clientID'=>$_POST['id']);
      $update=$db->update($tblName, $table,$condition);

            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             //set redirect url
            $redirectURL = '../views/account-profile.php?r=success';

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
                 $redirectURL = '../views/account-profile.php?r=fail';
            }
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);

   }
?>