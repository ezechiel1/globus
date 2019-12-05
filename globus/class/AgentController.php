<?php
//start session
session_start();

//load and initialize database class
require_once '../core/db.php';
$db = new DB();
//set default redirect url
$redirectURL = '../../'.$db->url;

if(isset($_POST['addAgent']))
{
    if(!empty($_POST['Fname']) && !empty($_POST['Lname']))
    {
  $password='globus';
  $tblName = 'agent';
  $code=$_SESSION['type'];
            //insert data
            $userData = array
            (
                'agent_fname' => htmlspecialchars($_POST['Fname']),
                'agent_lname' => htmlspecialchars($_POST['Lname']),
                'agent_country' => htmlspecialchars($_POST['Country']),
                'agent_city' => htmlspecialchars($_POST['City']),
                'agent_email' => htmlspecialchars($_POST['Email']),
                'agent_password' => sha1($password),
                'agent_phone' => htmlspecialchars($_POST['Telephone']),
                'agent_status' => htmlspecialchars($_POST['Status']),
                'addedby'=>$_SESSION['ID'],
                'type'=>$_SESSION['type']
               )
            ;
            $Insert = $db->insert($tblName, $userData);
            if($Insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/addAgent.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addAgent.php';
                elseif($code==3): $redirectURL .= 'agent/addAgent.php';
                elseif($code==4): $redirectURL .= 'it/addAgent.php';
                elseif($code==5): $redirectURL .= 'supplier/addAgents.php';
                elseif($code==6): $redirectURL .= 'seller/addAgents.php';
                endif;
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/addAgent.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addAgent.php';
                elseif($code==3): $redirectURL .= 'agent/addAgent.php';
                elseif($code==4): $redirectURL .= 'it/addAgent.php';
                elseif($code==5): $redirectURL .= 'supplier/addAgents.php';
                elseif($code==6): $redirectURL .= 'seller/addAgents.php';
                endif;
            }
        
    }
    else
    {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'fill all required fields';

        if($code==1): $redirectURL .= 'admin/addAgent.php'; 
        elseif($code==2): $redirectURL .= 'ambassador/addAgent.php';
        elseif($code==3): $redirectURL .= 'agent/addAgent.php';
        elseif($code==4): $redirectURL .= 'it/addAgent.php';
        elseif($code==5): $redirectURL .= 'supplier/addAgents.php';
        elseif($code==6): $redirectURL .= 'seller/addAgents.php';
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
  
  $tblName = 'agent';
  $code=$_SESSION['type'];
            //insert data
            $userData = array
            (
                'agent_fname' => htmlspecialchars($_POST['Fname']),
                'agent_lname' => htmlspecialchars($_POST['Lname']),
                'agent_email' => htmlspecialchars($_POST['Email']),
                'agent_phone' => htmlspecialchars($_POST['Telephone']),
                'agent_city' => htmlspecialchars($_POST['Location']),
                'agent_country' => htmlspecialchars($_POST['Country']),
                'agent_status' => htmlspecialchars($_POST['Status'])

            );

            $condition=array('agentID' => $_POST['updateform'],);
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
                elseif($code==5): $redirectURL .= 'supplier/allAgents.php';
                elseif($code==6): $redirectURL .= 'seller/allAgents.php';
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
                elseif($code==5): $redirectURL .= 'supplier/allAgents.php';
                elseif($code==6): $redirectURL .= 'seller/allAgents.php';
                endif;
            }
    }

    else 
    {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'fill all required fields';
        
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
//function to delete

if(isset($_POST['delete']))
     {
     
           $tblName='agent';
           $code=$_SESSION['type'];
// the update condition, means where to apply the update in a table 

             $Condition = array
            (
                    
              'agentID'=> htmlspecialchars($_POST['deleteform'])
            )
            ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully.';
            //set redirect url
                 if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allAgents.php';
                elseif($code==5): $redirectURL .= 'supplier/allAgents.php';
                elseif($code==6): $redirectURL .= 'seller/allAgents.php';
                endif;
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later.';
                
                //set redirect url
               if($code==1): $redirectURL .= 'admin/allAgents.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/allAgents.php';
                elseif($code==3): $redirectURL .= 'agent/allAgents.php';
                elseif($code==4): $redirectURL .= 'it/allAgents.php';
                elseif($code==5): $redirectURL .= 'supplier/allAgents.php';
                elseif($code==6): $redirectURL .= 'seller/allAgents.php';
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
  $tblName = 'agent';
  $code=$_SESSION['type'];
  $password='globus';
            //insert data
            $userData = array
            (
                'agent_pin' => 0,
                'agent_password' => sha1($password)
            );

            $condition=array('agentID' => $_POST['deleteform'],);
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
                elseif($code==4): $redirectURL .= 'it/allAgents.php';
                elseif($code==5): $redirectURL .= 'supplier/allSellers.php';
                elseif($code==6): $redirectURL .= 'seller/allSellers.php';
                endif;
            }
   
       //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
   

}
?>