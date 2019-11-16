<?php
//start session
session_start();
$adminID= $_SESSION['adminID'];
//load and initialize database class
require_once '../core/db.php';
$db = new DB();
//load and initialize Extra class
require_once '../core/extra.php';
$extra = new Extra();
//set default redirect url
$redirectURL = '../../'.$db->url;
//type
    $type=$_SESSION['type'];

if(isset($_POST['addCategory']))
{
            if(!empty($_POST['categoryName']) )
                {
              
              $tblName = 'category';
                        //insert data
                        $userData = array
                        (
                            'category_name' => trim($_POST['categoryName']),
                            'category_picture1' => '../img/product/'.$extra->ezpk($_POST['categoryName']).'/lg.jpg',
                            'category_picture2' => '../img/product/'.$extra->ezpk($_POST['categoryName']).'/lg.jpg',
                            'category_picture3' => '../img/product/'.$extra->ezpk($_POST['categoryName']).'/lg.jpg',
                            'adminID' => $adminID,
                            'c_date' => $db->showDate()            
                        )
                        ;
                        $Insert = $db->insert($tblName, $userData);
                        if($Insert){
                            $categoryID=$db->getLastID($tblName,'categoryID');
                            //create the Directory
                            $ctrFolder=$extra->createParentFolder($_POST['categoryName']);
                            //Update the Logo of Category
                            $sPath=$ctrFolder.'/';
                            
                            $category_logo1=$extra->uploadPicture($sPath,$_FILES['product_picture1']);
                            $category_logo2=$extra->uploadPicture($sPath,$_FILES['product_picture2']);
                            $category_logo3=$extra->uploadPicture($sPath,$_FILES['product_picture3']);
                            if($category_logo1)
                            {
                                $pic1='../'.$ctrFolder.'/'.$_FILES['product_picture1']['name'];
                                $pic2='../'.$ctrFolder.'/'.$_FILES['product_picture2']['name'];
                                $pic3='../'.$ctrFolder.'/'.$_FILES['product_picture3']['name'];
                                $userData = array
                                (
                                    'category_picture1' => $pic1,
                                    'category_picture2' => $pic2,
                                    'category_picture3' => $pic3
                                );
                                $condition=array('categoryID'=>$categoryID);
                                $upt=$db->update($tblName, $userData,$condition);
                                if($upt){
                                    $sessData['status']['type'] = 'success';
                                    $sessData['status']['msg'] = 'Operation done successfully ';
                             
                                }
                            }
                            else{
                                $sessData['status']['type']='error';
                                $sessData['status']['msg']='Some Errors occured with the Picture!';
                          
                            }
                        }else{
                            $sessData['status']['type'] = 'error';
                            $sessData['status']['msg'] = 'Operation failed, try again later ';
                        }
                    
                }
                else
                {
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'fill all required fields';
                }
        
  //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/category.php';
                    elseif($type==4):
                        $redirectURL .= 'it/category.php';
                    endif;
    //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}
// update 
if(isset($_POST['updateCategory']))
{
    //check if the form is not empty
     $tblName = 'category';
            //insert data
            $userData = array
            (
                'category_name' => $_POST['category_name']
            );

            $condition=array('categoryID' => $_POST['categoryID'] );
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
                //code to Rename the Directory
                $renameFolder=$extra->renameParentFolder($_POST['old_category_name'],$_POST['category_name']);
                $renameTable=$db->renameTable($_POST['old_category_name'],$_POST['category_name']);
                 

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 
            }
    //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/category.php';
                    elseif($type==4):
                        $redirectURL .= 'it/category.php';
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}

// delete
if(isset($_POST["delete"]) )

{
    $tblName='category'; 
    // the update condintion, means where to apply the update in a table 
    $Condition = array
            (
                'categoryID'=> $_POST['categoryID']
            )
            ;
            $delete = $db->delete($tblName,$Condition);
            if($delete){
                //code to Delete the Directory
                $deleteFolder=$extra->deleteParentFolder($_POST['category_name']);
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
           
            }
  //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/category.php';
                    elseif($type==4):
                        $redirectURL .= 'it/category.php';
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
    
}

// Activate the Category
if(isset($_POST['activate']))
{
    //check if the form is not empty
     $tblName = 'category';
            //insert data
            $userData = array
            (
                'status' => 1
            );

            $condition=array('categoryID' => $_POST['categoryID'] );
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
               
            }

    //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/category.php';
                    elseif($type==4):
                        $redirectURL .= 'it/category.php';
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}

// Activate the Category
if(isset($_POST['desactivate']))
{
    //check if the form is not empty
     $tblName = 'category';
            //insert data
            $userData = array
            (
                'status' => 0
            );

            $condition=array('categoryID' => $_POST['categoryID'] );
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
               
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
              
            }
    //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/category.php';
                    elseif($type==4):
                        $redirectURL .= 'it/category.php';
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}

// Post the Category
if(isset($_POST['post_online']))
{
    //check if the form is not empty
     $tblName = 'category';
            //insert data
            $userData = array
            (
                'post' => 1
            );

            $condition=array('categoryID' => $_POST['categoryID'] );
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
               
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
               
            }
 //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/category.php';
                    elseif($type==4):
                        $redirectURL .= 'it/category.php';
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}

// Post the Category
if(isset($_POST['post_offline']))
{
    //check if the form is not empty
     $tblName = 'category';
            //insert data
            $userData = array
            (
                'post' => 0
            );

            $condition=array('categoryID' => $_POST['categoryID'] );
            $update = $db->update($tblName, $userData,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
          
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
              
            }
    //set redirect url
                    if($type==1):
                        $redirectURL .= 'admin/category.php';
                    elseif($type==4):
                        $redirectURL .= 'it/category.php';
                    endif;
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}