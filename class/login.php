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
	if (isset($_POST['Userlogin'])) {
		$tbName='client';
		$table= array
		(
			'client_email' => $_POST['email'] ,
			'client_password' => sha1($_POST['password'])
		);

		$select=$db->getRows($tbName,$table);
        if(!empty($select)){
	            foreach($select as $value){
	            		$_SESSION['ClientID']=$value['clientID'];
	            		$_SESSION['ClientFname']=$value['client_fname'];
	            		$_SESSION['ClientLname']=$value['client_lname'];
	            		$_SESSION['ClientEmail']=$value['client_email'];
	            	
	                $sessData['status']['type'] = 'success';
	                $sessData['status']['msg'] = 'Operation done successfully ';
	            //store status into the session
   					 $_SESSION['sessData'] = $sessData;
	            //set redirect url
	                $redirectURL = '../index.php';
	            //redirect to the list page
    				header("Location:".$redirectURL);
	            
            }
           }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                //set redirect url
                $redirectURL = '../views/account-login.php?st=error';
                 //redirect to the list page
    			header("Location:".$redirectURL);
            }

	}

	if (!empty($_REQUEST['request']) && $_REQUEST['request']='logout') {
		
		session_unset();
		session_destroy();
	            //set redirect url
	    $redirectURL = '../views/account-login.php';
	            //redirect to the list page
    	header("Location:".$redirectURL);
	}