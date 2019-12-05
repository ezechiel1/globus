<?php
//start session
session_start();
//load and initialize database class
require_once '../core/db.php';
$db = new DB();
//set default redirect url
$redirectURL = '../../'.$db->url;

if(isset($_POST['login'])){
  if(!empty($_POST['email']) && !empty($_POST['password']))
    {
                $condition1 =array 
                (
                  'admin_email'=>htmlspecialchars($_POST['email']),
                  'admin_password'=>sha1($_POST['password'])
                );
                $condition2 =array 
                (
                  'supplier_email'=>htmlspecialchars($_POST['email']),
                  'supplier_password'=>sha1($_POST['password'])
                );
                $condition3 =array 
                (
                  'seller_email'=>htmlspecialchars($_POST['email']),
                  'seller_password'=>sha1($_POST['password'])
                );
                $condition4 =array 
                (
                  'agent_email'=>htmlspecialchars($_POST['email']),
                  'agent_password'=>sha1($_POST['password'])
                );
                $condition5 =array 
                (
                  'ambassador_email'=>htmlspecialchars($_POST['email']),
                  'ambassador_password'=>sha1($_POST['password'])
                );
                $condition6 =array 
                (
                  'it_email'=>htmlspecialchars($_POST['email']),
                  'it_password'=>sha1($_POST['password'])
                );

          $admin = $db->login('admin',$condition1);
          $it = $db->login('it',$condition6);
          $seller = $db->login('seller',$condition3);
          $supplier = $db->login('supplier',$condition2);
          $agent = $db->login('agent',$condition4);
          $ambassador = $db->login('ambassador',$condition5);

          if(!empty($admin)): //Admin
            $count = 0; 
            foreach($admin as $user): $count++;
                if($user['admin_status']==0)://if Desactivated
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Your Account is Desactivated! Please Contact the Admin. ';
                    //set redirect url
                    $redirectURL = '../index.php';
                else:
                    $_SESSION['ID']=$_SESSION['adminID'] = $user['adminID'];
                    if($user['admin_pin']==0): //when pin is 0
                        //set redirect url
                        $_SESSION['category'] = "admin";
                        $redirectURL .= '../change.php';
                    else:
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg']  = 'Welcome';
                        $_SESSION['name'] = $user['admin_fname']."  ".$user['admin_lname'];
                        $_SESSION['type'] = 1;
                        $log=$db->registerLogIn($_SESSION['ID'], $_SESSION['type']);
                        //set redirect url
                        $redirectURL .= 'admin/dashboard.php';
                    endif;
                endif;
            endforeach;
            elseif(!empty($ambassador)): //Ambassadors
            $count = 0; 
            foreach($ambassador as $user): $count++;
                if($user['ambassador_status']==0)://if Desactivated
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Your Account is Desactivated! Please Contact the Admin. ';
                    //set redirect url
                    $redirectURL = '../index.php';
                else:
                    $_SESSION['ID']=$_SESSION['ambassadorID'] = $user['ambassadorID'];
                    if($user['ambassador_pin']==0): //when pin is 0
                        //set redirect url
                        $_SESSION['category'] = "ambassador";
                        $redirectURL .= '../change.php';
                    else:
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg']  = 'Welcome';
                        $_SESSION['name'] = $user['ambassador_fname']."  ".$user['ambassador_lname'];
                        $_SESSION['type'] = 2;
                        $log=$db->registerLogIn($_SESSION['ID'], $_SESSION['type']);
                        //set redirect url
                        $redirectURL .= 'ambassador/dashboard.php';
                    endif;
                endif;
            endforeach;
            elseif(!empty($agent)): //Agent
            $count = 0; 
            foreach($agent as $user): $count++;
                if($user['agent_status']==0)://if Desactivated
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Your Account is Desactivated! Please Contact the Admin. ';
                    //set redirect url
                    $redirectURL = '../index.php';
                else:
                    $_SESSION['ID']=$_SESSION['agentID'] = $user['agentID'];
                    if($user['agent_pin']==0): //when pin is 0
                        //set redirect url
                        $_SESSION['category'] = "agent";
                        $redirectURL .= '../change.php';
                    else:
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg']  = 'Welcome';
                        $_SESSION['name'] = $user['agent_fname']."  ".$user['agent_lname'];
                        $_SESSION['type'] = 3;
                        $log=$db->registerLogIn($_SESSION['ID'], $_SESSION['type']);
                        //set redirect url
                        $redirectURL .= 'agent/dashboard.php';
                    endif;
                endif;
            endforeach;
            elseif(!empty($seller)): //Seller
            $count = 0; 
            foreach($seller as $user): $count++;
                if($user['seller_status']==0)://if Desactivated
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Your Account is Desactivated! Please Contact the Admin. ';
                    //set redirect url
                    $redirectURL = '../index.php';
                else:
                    $_SESSION['ID']=$_SESSION['sellerID'] = $user['sellerID'];
                    if($user['seller_pin']==0): //when pin is 0
                        //set redirect url
                        $_SESSION['category'] = "seller";
                        $redirectURL .= '../change.php';
                    else:
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg']  = 'Welcome';
                        $_SESSION['name'] = $user['seller_fname']."  ".$user['seller_lname'];
                        $_SESSION['type'] = 6;
                        $log=$db->registerLogIn($_SESSION['ID'], $_SESSION['type']);
                        //set redirect url
                        $redirectURL .= 'seller/dashboard.php';
                    endif;
                endif;
            endforeach;
            elseif(!empty($supplier)): //Supplier
            $count = 0; 
            foreach($supplier as $user): $count++;
                if($user['supplier_status']==0)://if Desactivated
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Your Account is Desactivated! Please Contact the Admin. ';
                    //set redirect url
                    $redirectURL = '../index.php';
                else:
                    $_SESSION['ID']=$_SESSION['supplierID'] = $user['supplierID'];
                    if($user['supplier_pin']==0): //when pin is 0
                        //set redirect url
                        $_SESSION['category'] = "supplier";
                        $redirectURL .= '../change.php';
                    else:
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg']  = 'Welcome';
                        $_SESSION['name'] = $user['supplier_fname']."  ".$user['supplier_lname'];
                        $_SESSION['type'] = 5;
                        $log=$db->registerLogIn($_SESSION['ID'], $_SESSION['type']);
                        //set redirect url
                        $redirectURL .= 'supplier/dashboard.php';
                    endif;
                endif;
            endforeach;
            elseif(!empty($it)): //it
            $count = 0; 
            foreach($it as $user): $count++;
                if($user['it_status']==0)://if Desactivated
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Your Account is Desactivated! Please Contact the Admin. ';
                    //set redirect url
                    $redirectURL = '../index.php';
                else:
                    $_SESSION['ID']=$_SESSION['itID'] = $user['itID'];
                    if($user['it_pin']==0): //when pin is 0
                        //set redirect url
                        $_SESSION['category'] = "it";
                        $redirectURL .= '../change.php';
                    else:
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg']  = 'Welcome';
                        $_SESSION['name'] = $user['it_fname']."  ".$user['it_lname'];
                        $_SESSION['type'] = 4;
                        $log=$db->registerLogIn($_SESSION['ID'], $_SESSION['type']);
                        //set redirect url
                        $redirectURL .= 'it/dashboardIt.php';
                    endif;
                endif;
            endforeach;
            else: 
               $sessData['status']['type'] = 'error';
               $sessData['status']['msg'] = 'login failed, try again later  ';
               //set redirect url
               $redirectURL = '../index.php';    
            endif;   
    }
    //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}
exit();
?>