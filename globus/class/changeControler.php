<?php
//start session
session_start();
//load and initialize database class
require_once '../core/db.php';
$db = new DB();
//set default redirect url
$redirectURL = '../../'.$db->url;

if(isset($_POST['change'])){
  if(!empty($_POST['npassword']) && !empty($_POST['cpassword']))
    {
            //Get tHE session
            if($_SESSION['category']==''):$redirectURL .= '../change.php';
            elseif($_POST['npassword']!=$_POST['cpassword']):
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Password do not match! ';
                //set redirect url
                $redirectURL = '../change.php';  
            else:
                $category=$_SESSION['category'];
                if($category=='admin')://Admin
                    $tblName = 'admin';
                    $userData = array
                    (
                        'admin_password' => $_POST['npassword'],
                        'admin_pin' => 1
                    );
                    $condition=array('adminID' => $_SESSION['adminID'], );
                elseif($category=="seller")://Seller
                    $tblName = 'seller';
                    $userData = array
                    (
                        'seller_password' => $_POST['npassword'],
                        'seller_pin' => 1
                    );
                    $condition=array('sellerID' => $_SESSION['sellerID'] );
                elseif($category=="supplier")://Supplier
                    $tblName = 'supplier';
                    $userData = array
                    (
                        'supplier_password' => $_POST['npassword'],
                        'supplier_pin' => 1
                    );
                    $condition=array('supplierID' => $_SESSION['supplierID']);
                elseif($category=="agent")://Agent
                    $tblName = 'agent';
                    $userData = array
                    (
                        'agent_password' => $_POST['npassword'],
                        'agent_pin' => 1
                    );
                    $condition=array('agentID' => $_SESSION['agentID'] );
                elseif($category=="ambassador")://Ambassador
                    $tblName = 'ambassador';
                    $userData = array
                    (
                        'ambassador_password' => $_POST['npassword'],
                        'ambassador_pin' => 1
                    );
                    $condition=array('ambassadorID' => $_SESSION['ambassadorID'] );
                elseif($category=="it")://It
                    $tblName = 'it';
                    $userData = array
                    (
                        'it_password' => $_POST['npassword'],
                        'it_pin' => 1
                    );
                    $condition=array('itID' => $_SESSION['itID'] );
                endif;
                //Update the table new password 
                $update = $db->update($tblName, $userData, $condition);
                if($update){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Operation done successfully ';
                //set redirect url
                    $redirectURL .= '../index.php';

                }
                else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Operation failed, try again later ';
                    
                    //set redirect url
                    $redirectURL .= '../change.php';
                }
                
            endif;
    }
    //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}
exit();
?>