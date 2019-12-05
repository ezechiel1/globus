<?php
	//admin control code
	//start session
	session_start();

	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = '../../'.$db->url;
	//KEEP the actuel date and time

 $gett=getdate(); $annee=$gett['year']; $mois=$gett['mon']; $jour=$gett['mday']; 
                   $heure=$gett['hours']; $minutes=$gett['minutes']; $second=$gett['seconds'];
  $currentDate=$annee.'-'.$mois.'-'.$jour.' '.$heure.':'.$minutes.':'.$second;

	//get data from the admin form
	if(isset($_POST['addAdminS']))
	{
		if(!empty($_POST['firstname']) and !empty($_POST['lastname']) and !empty($_POST['email'])  )
		{
			$tblName='admin';
			$password='globus';
			//insert data
				$adminData = array
				(	'admin_fname' => htmlspecialchars($_POST['firstname']),
					'admin_lname' => htmlspecialchars($_POST['lastname']),
					'admin_email' => htmlspecialchars($_POST['email']),
					'admin_phone' => htmlspecialchars($_POST['phone']),
					'admin_status' => htmlspecialchars($_POST['status']),
					'admin_pin' => 0,
					'admin_password' => sha1('globus'),
					'admin_city' => htmlspecialchars($_POST['city']),
					'admin_country' => htmlspecialchars($_POST['Country']),
					'c_date' => $currentDate
				 )
				;
				$insert = $db ->insert($tblName, $adminData);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
                	$sessData['status']['msg'] = 'Operation done successfully.';
					//set redirect url
                	$redirectURL .= 'admin/addAdmin.php';
				}
				else{
					$getMessage['status']['type']='error';
					$getMessage['status']['type']='Operation failed, Please Try again.';
					//set redirect url
                	$redirectURL .= 'admin/addAdmin.php';
				}
		}
		else
		{
			$getMessage['status']['type']='error';
			$getMessage['status']['type']='Operation failed, Please Try again.';
			//set redirect url
                	$redirectURL .= 'admin/addAdmin.php';
		}

	//store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);

}
// update 
if(isset($_POST['update']))
{
    //check if the form is not empty
     $tblName = 'admin';
            //insert data
            $userData = array
            (
                'admin_fname' => htmlspecialchars($_POST['fname']),
        				'admin_lname' => htmlspecialchars($_POST['lname']),
        				'admin_email' => htmlspecialchars($_POST['email']),
        				'admin_phone' => htmlspecialchars($_POST['phone']),
        				'admin_city' => htmlspecialchars($_POST['address']),
        				'admin_status' => htmlspecialchars($_POST['status'])
            );

            $condition=array('adminID' => $_POST['adminID'], );
            ;
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             //set redirect url
            $redirectURL .= 'admin/allAdmin.php';

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
                 $redirectURL .= 'admin/allAdmin.php';
            }
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}
// delete
if(isset($_POST["delete"]) )

{  
           $tblName='admin';
// the update condintion, means where to apply the update in a table 

             $Condition = array
            (    
                'adminID'=> htmlspecialchars($_POST['adminID'])
            )
            ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             //set redirect url
            $redirectURL .= 'admin/allAdmin.php';

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
                 $redirectURL .= 'admin/allAdmin.php';
            }
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}
?>
