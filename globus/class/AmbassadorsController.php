<?php
//start session
session_start();

//load and initialize database class
require_once '../core/db.php';
$db = new DB();
//set default redirect url
$redirectURL = '../../'.$db->url;

if(isset($_POST['addAmbassadors']))
{
    if(!empty($_POST['Fname']) && !empty($_POST['Lname']))
    {
  $password='globus';
  $tblName = 'ambassador';
  $code=$_SESSION['type'];
            //insert data
            $userData = array
            (
                'ambassador_fname' => $_POST['Fname'],
                'ambassador_lname' => $_POST['Lname'],
                'ambassador_country' => $_POST['Country'],
                'ambassador_location' => $_POST['City'],
                'ambassador_email' => $_POST['Email'],
                'ambassador_password' => $password,
                'ambassador_phone' => $_POST['Telephone'],
                'ambassador_status' => $_POST['Status'],
                'addedby'=>$_SESSION['ID'],
                'type'=>$_SESSION['type']
               )
            ;
            $Insert = $db->insert($tblName, $userData);
            if($Insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/addAmbassador.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addAmbassador.php';
                elseif($code==3): $redirectURL .= 'agent/addAmbassador.php';
                elseif($code==4): $redirectURL .= 'it/addAmbassador.php';
                endif;
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
            //set redirect url
               if($code==1): $redirectURL .= 'admin/addAmbassador.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addAmbassador.php';
                elseif($code==3): $redirectURL .= 'agent/addAmbassador.php';
                elseif($code==4): $redirectURL .= 'it/addAmbassador.php';
                endif;
            }
            
    }
    else
            {
            $getMessage['status']['type']='error';
            $getMessage['status']['type']='Operation failed, Please Try again.';
            //set redirect url
            if($code==1): $redirectURL .= 'admin/addAmbassador.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addAmbassador.php';
                elseif($code==3): $redirectURL .= 'agent/addAmbassador.php';
                elseif($code==4): $redirectURL .= 'it/addAmbassador.php';
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
  
  $tblName = 'ambassador';
  $code=$_SESSION['type'];
            //insert data
            $userData = array
            (
                'ambassador_fname' => $_POST['Fname'],
                'ambassador_lname' => $_POST['Lname'],
                'ambassador_email' => $_POST['Email'],
                'ambassador_phone' => $_POST['Telephone'],
                'ambassador_location' => $_POST['Location'],
                'ambassador_country' => $_POST['Country'],
                'ambassador_status' => $_POST['Status']

            );

            $condition=array('ambassadorID' => $_POST['updateform'],);
            ;
            $update = $db->update($tblName, $userData, $condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/allAmbassadors.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAmbassadors.php';
                elseif($code==3): $redirectURL .= 'agent/allAmbassadors.php';
                elseif($code==4): $redirectURL .= 'it/allAmbassadors.php';
                endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                //set redirect url
               if($code==1): $redirectURL .= 'admin/allAmbassadors.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAmbassadors.php';
                elseif($code==3): $redirectURL .= 'agent/allAmbassadors.php';
                elseif($code==4): $redirectURL .= 'it/allAmbassadors.php';
                endif;
            }
    }

    else 
    {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'fill all required fields';
        
        //set redirect url
       if($code==1): $redirectURL .= 'admin/allAmbassadors.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAmbassadors.php';
                elseif($code==3): $redirectURL .= 'agent/allAmbassadors.php';
                elseif($code==4): $redirectURL .= 'it/allAmbassadors.php';
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
     
           $tblName='ambassador';
           $code=$_SESSION['type'];
// the update condition, means where to apply the update in a table 

             $Condition = array
            (
                    
              'ambassadorID'=> $_POST['deleteform']
            )
            ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully.';
            //set redirect url
                 if($code==1): $redirectURL .= 'admin/allAmbassadors.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAmbassadors.php';
                elseif($code==3): $redirectURL .= 'agent/allAmbassadors.php';
                elseif($code==4): $redirectURL .= 'it/allAmbassadors.php';
                endif;
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later.';
                
                //set redirect url
               if($code==1): $redirectURL .= 'admin/allAmbassadors.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAmbassadors.php';
                elseif($code==3): $redirectURL .= 'agent/allAmbassadors.php';
                elseif($code==4): $redirectURL .= 'it/allAmbassadors.php';
                endif;
            }

            //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
    }
// Code to reset the password
    if(isset($_POST['reset']))
    {

          $tblName = 'ambassador';
          $code=$_SESSION['type'];
          $password='123456';
            //insert data
            $userData = array
            (
                'ambassador_pin' => 0,
                'ambassador_password' => $password

            );

            $condition=array('ambassadorID' => $_POST['deleteform'],);
            $update = $db->update($tblName, $userData, $condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/allAmbassadors.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAmbassadors.php';
                elseif($code==3): $redirectURL .= 'agent/allAmbassadors.php';
                elseif($code==4): $redirectURL .= 'it/allAmbassadors.php';
                endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                //set redirect url
               if($code==1): $redirectURL .= 'admin/allAmbassadors.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAmbassadors.php';
                elseif($code==3): $redirectURL .= 'agent/allAmbassadors.php';
                elseif($code==4): $redirectURL .= 'it/allAmbassadors.php';
                endif;
            }
   

       //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
   
    }
?>