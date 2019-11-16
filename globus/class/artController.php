<?php
//start session
session_start();

//load and initialize database class
require_once '../core/db.php';
$db = new DB();
//set default redirect url
$redirectURL = '../../'.$db->url;
//get the date
 $gett=getdate(); $annee=$gett['year']; $mois=$gett['mon']; $jour=$gett['mday']; 
                   $heure=$gett['hours']; $minutes=$gett['minutes']; $second=$gett['seconds'];
  $currentDate=$annee.'-'.$mois.'-'.$jour.' '.$heure.':'.$minutes.':'.$second;

if(isset($_POST['addProduct']))
{
    if(!empty($_POST['Name']))
    {
  
  $tblName = 'art_product';
  $code=$_SESSION['type'];
            //insert data
            $userData = array
            (
                'product_name' => $_POST['Name'],
                'product_quantity' => $_POST['Quantity'],
                 'product_price' => $_POST['Price'],
                'product_status' => $_POST['Status'],
				'c_date' => $currentDate            
               )
            ;
            $Insert = $db->insert($tblName, $userData);
            if($Insert):
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/addArt.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addArt.php';
                elseif($code==3): $redirectURL .= 'agent/addArt.php';
                endif;
                else:
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/addArt.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addArt.php';
                elseif($code==3): $redirectURL .= 'agent/addArt.php';
                endif;
                endif;
        
    }
    else
    {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'fill all required fields';
        //set redirect url
       			 if($code==1): $redirectURL .= 'admin/addArt.php'; 
                 elseif($code==2): $redirectURL .= 'ambassador/addArt.php';
                elseif($code==3): $redirectURL .= 'agent/addArt.php';
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
     $tblName = 'art_product';
      $code=$_SESSION['type'];
            //insert data
            $userData = array
            (
                'product_name' => $_POST['Name'],
                  'product_quantity' => $_POST['Quantity'],
                'product_price' => $_POST['Price'],
                'product_status' => $_POST['Status'],
				'c_date' => $currentDate
            );

            $condition=array('productID' => $_POST['updateform'], );
            ;
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             //set redirect url
            if($code==1): $redirectURL .= 'admin/allArt.php'; 
            elseif($code==2):$redirectURL .= 'ambassador/allArt.php';
            elseif($code==3):$redirectURL .= 'agent/allArt.php';
            endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
            if($code==1): $redirectURL .= 'admin/allArt.php'; 
            elseif($code==2):$redirectURL .= 'ambassador/allArt.php';
            elseif($code==3):$redirectURL .= 'agent/allArt.php';
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
           $tblName='art_product';
            $code=$_SESSION['type'];
// the update condintion, means where to apply the update in a table 

             $Condition = array
            (              
                
                'productID'=> $_POST['deleteform']
            );

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             //set redirect url
            if($code==1): $redirectURL .= 'admin/allArt.php'; 
            elseif($code==2):$redirectURL .= 'ambassador/allArt.php';
            elseif($code==3):$redirectURL .= 'agent/allArt.php';
            endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
            if($code==1): $redirectURL .= 'admin/allArt.php'; 
            elseif($code==2):$redirectURL .= 'ambassador/allArt.php';
            elseif($code==3):$redirectURL .= 'agent/allArt.php';
            endif;
            }
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}

?>