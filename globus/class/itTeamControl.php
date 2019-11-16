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
			$tblName='it';
			$password='123456';
      $code=$_SESSION['type'];
			//insert data
				$adminData = array
				(	'it_fname' => $_POST['firstname'],
					'it_lname' => $_POST['lastname'],
					'it_email' => $_POST['email'],
					'it_phone' => $_POST['phone'],
					'it_pin' => 0,
					'it_password' => $password,
					'it_city' => $_POST['city'],
					'it_country' => $_POST['Country'],
					'it_status' => $_POST['status'],
					'c_date' => $currentDate,
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
                  if($code==1): $redirectURL .= 'admin/addAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addAgents.php';
                elseif($code==3): $redirectURL .= 'agent/addAgents.php';
                elseif($code==4): $redirectURL .= 'it/addIT.php';
                endif;
				}
				else{
					$getMessage['status']['type']='error';
					$getMessage['status']['type']='Operation failed, Please Try again.';
					//set redirect url
                	 if($code==1): $redirectURL .= 'admin/addAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addAgents.php';
                elseif($code==3): $redirectURL .= 'agent/addAgents.php';
                elseif($code==4): $redirectURL .= 'it/addIT.php';
                endif;
				}
		}
		else
		{
			$getMessage['status']['type']='error';
			$getMessage['status']['type']='Operation failed, Please Try again.';
			//set redirect url
                	 if($code==1): $redirectURL .= 'admin/addAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addAgents.php';
                elseif($code==3): $redirectURL .= 'agent/addAgents.php';
                elseif($code==4): $redirectURL .= 'it/addIT.php';
                endif;
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
     $tblName = 'it';
     $code=$_SESSION['type'];
            //insert data
            $userData = array
            (
                
					'it_fname' => $_POST['fname'],
					'it_lname' => $_POST['lname'],
					'it_email' => $_POST['email'],
					'it_phone' => $_POST['phone'],
					'it_city' => $_POST['address'],
					'it_status' => $_POST['status']
            )
			;

            $condition=array('itID' => $_POST['itID'], );
            ;
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             //set redirect url
            if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allIT.php';
                endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
                if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allIT.php';
                endif;
            }
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}
// delete
if(isset($_POST["delete"]) )

{
    
  
           $tblName='it';
           $code=$_SESSION['type'];

  

// the update condintion, means where to apply the update in a table 

             $Condition = array
            (
                
                
                'itID'=> $_POST['itID']
            )
            ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             //set redirect url
            if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allIT.php';
                endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
                 if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allIT.php';
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
  $tblName = 'it';
  $code=$_SESSION['type'];
  $password='123456';
            //insert data
            $userData = array
            (
                'it_pin' => 0,
                'it_password' => $password
            );

            $condition=array('itID' => $_POST['deleteform'],);
            ;
            $update = $db->update($tblName, $userData, $condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allIT.php';
                endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                //set redirect url
                if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allIT.php';
                endif;
            }
   
       //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
   

}
?>
