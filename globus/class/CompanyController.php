<?php
//start session
session_start();

//load and initialize database class
require_once '../core/db.php';
$db = new DB();
//load and initialize Extra class
require_once '../core/extra.php';
$extra = new Extra();

//set default redirect url
$redirectURL = '../../'.$db->url;
//get the date
 $gett=getdate(); $annee=$gett['year']; $mois=$gett['mon']; $jour=$gett['mday']; 
                   $heure=$gett['hours']; $minutes=$gett['minutes']; $second=$gett['seconds'];
  $currentDate=$annee.'-'.$mois.'-'.$jour.' '.$heure.':'.$minutes.':'.$second;

if(isset($_POST['addCompany']))
{
    if(!empty($_POST['Name']) && !empty($_POST['Location']) )
    {
          $product_picture=$extra->uploadPicture('../img/company/',$_FILES['company_picture']);
          $tblName = 'company';
          $code=$_SESSION['type'];
            //insert data
          if($product_picture)
          {
            
            $userData = array
            (
                'company_name' => $_POST['Name'],
                'company_location' => $_POST['Location'],
                'company_country' => $_POST['Country'],
                'company_status' => $_POST['Status'],
                'categoryID' => $_POST['category'],
                'company_picture'=> $product_picture,
                'c_date' => $currentDate,
                'addedby'=>$_SESSION['ID'],
                'type'=>$_SESSION['type']            
               )
            ;
            $Insert = $db->insert($tblName, $userData);
            if($Insert):
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/addCompany.php'; 
                elseif($code==2): $redirectURL .= 'ambassador/addCompany.php';
                elseif($code==3): $redirectURL .= 'agent/addCompany.php';
                elseif($code==4): $redirectURL .= 'it/addCompany.php';
                elseif($code==5): $redirectURL .= 'supplier/addCompany.php';
                elseif($code==6): $redirectURL .= 'seller/addCompany.php';
                endif;
             else:
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
            //set redirect url
                if($code==1): $redirectURL .= 'admin/addCompany.php'; 
                elseif($code==2):$redirectURL .= 'ambassador/addCompany.php';
                elseif($code==3):$redirectURL .= 'agent/addCompany.php';
                elseif($code==4): $redirectURL .= 'it/addCompany.php';
                elseif($code==5): $redirectURL .= 'supplier/addCompany.php';
                elseif($code==6): $redirectURL .= 'seller/addCompany.php';
                endif;
             endif;
         }
         else{
                $sessData['status']['type']='error';
                $sessData['status']['msg']='Some Errors occured with the Company\'s Logo!';
                //set redirect url
                if($code==1): $redirectURL .= 'admin/addCompany.php'; 
                elseif($code==2):$redirectURL .= 'ambassador/addCompany.php';
                elseif($code==3):$redirectURL .= 'agent/addCompany.php';
                elseif($code==4): $redirectURL .= 'it/addCompany.php';
                elseif($code==5): $redirectURL .= 'supplier/addCompany.php';
                elseif($code==6): $redirectURL .= 'seller/addCompany.php';
                endif;
            }
        
    }
    else
    {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'fill all required fields';
        //set redirect url
        if($code==1): $redirectURL .= 'admin/addCompany.php'; 
        elseif($code==2):$redirectURL .= 'ambassador/addCompany.php';
        elseif($code==3):$redirectURL .= 'agent/addCompany.php';
        elseif($code==4): $redirectURL .= 'it/addCompany.php';
        elseif($code==5): $redirectURL .= 'supplier/addCompany.php';
        elseif($code==6): $redirectURL .= 'seller/addCompany.php';
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
     $tblName = 'company';
      $code=$_SESSION['type'];
            //insert data
            $userData = array
            (
                'company_name' => $_POST['name'],
                'company_location' => $_POST['location'],
                'company_country' => $_POST['country'],
                'company_status' => $_POST['status']
            );

            $condition=array('companyID' => $_POST['companyID'], );
            ;
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             //set redirect url
            if($code==1): $redirectURL .= 'admin/allCompany.php'; 
            elseif($code==2):$redirectURL .= 'ambassador/allCompany.php';
            elseif($code==3):$redirectURL .= 'agent/allCompany.php';
            elseif($code==4): $redirectURL .= 'it/allCompany.php';
            elseif($code==5): $redirectURL .= 'supplier/allCompany.php';
            elseif($code==6): $redirectURL .= 'seller/allCompany.php';
            endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
            if($code==1): $redirectURL .= 'admin/allCompany.php'; 
            elseif($code==2):$redirectURL .= 'ambassador/allCompany.php';
            elseif($code==3):$redirectURL .= 'agent/allCompany.php';
            elseif($code==4): $redirectURL .= 'it/allCompany.php';
            elseif($code==5): $redirectURL .= 'supplier/allCompany.php';
            elseif($code==6): $redirectURL .= 'seller/allCompany.php';
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
           $tblName='company';
            $code=$_SESSION['type'];
// the update condintion, means where to apply the update in a table 

             $Condition = array
            (
                
                
                'companyID'=> $_POST['companyID']
            );

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             //set redirect url
            if($code==1): $redirectURL .= 'admin/allCompany.php'; 
            elseif($code==2):$redirectURL .= 'ambassador/allCompany.php';
            elseif($code==3):$redirectURL .= 'agent/allCompany.php';
            endif;

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
            if($code==1): $redirectURL .= 'admin/allCompany.php'; 
            elseif($code==2):$redirectURL .= 'ambassador/allCompany.php';
            elseif($code==3):$redirectURL .= 'agent/allCompany.php';
            endif;
            }
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}