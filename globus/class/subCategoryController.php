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

if(isset($_POST['addSubCategory']))
{
    if(!empty($_POST['SubCatname']) )
    {
  $path='../../img/product/'.$extra->ezpk($_POST['category_name']).'/'.$extra->ezpk($_POST['SubCatname']).'/';
  $tblName = 'subcategory';
  $ctg=$extra->ezpk($_POST['SubCatname']).'_product';
  $ctgP=$extra->ezpk($_POST['SubCatname']).'_picture';
            //insert data
            $userData = array(
                'subCategory_name' => trim($_POST['SubCatname']),
                'subCategory_path' => $path,
                'subCategory_picture' => '../../img/product/lg.jpg',
                'table_product'=> $ctg,
                'table_picture' => $ctgP,
                'categoryID' => $_POST['categoryID'],
                'adminID' => $adminID,
                'c_date' => $db->showDate()       
               )
            ;
            $Insert = $db->insert($tblName, $userData);
            if($Insert){
                $subCategoryID=$db->getLastID($tblName,'subCategoryID');
                //create the Directory
                $ctrFolder=$extra->createFolder($_POST['category_name'],$_POST['SubCatname']);
                //create automatic table subCATEGORY
                $crt=$db->createSubCatTable($ctg);
                $crtP=$db->createSubCatTablePicture($ctgP);
                //Update the Logo of Category
                            $sPath='../img/product/'.$extra->ezpk($_POST['category_name']).'/'.$extra->ezpk($_POST['SubCatname']).'/';
                            
                            $category_logo=$extra->uploadPicture($sPath,$_FILES['product_picture']);
                            if($category_logo)
                            {
                                $pic='../../img/product/'.$extra->ezpk($_POST['category_name']).'/'.$extra->ezpk($_POST['SubCatname']).'/'.$_FILES['product_picture']['name'];
                                $userData = array
                                (
                                    'subCategory_picture' => $pic
                                );
                                $condition=array('subCategoryID'=>$subCategoryID);
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
                                $redirectURL .= 'admin/subcategory.php?Category='.$_POST['category_name'].'&ct='.$_POST['categoryID'];
                            elseif($type==4):
                                $redirectURL .= 'it/subcategory.php?Category='.$_POST['category_name'].'&ct='.$_POST['categoryID'];
                            endif;
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
            $redirectURL .= 'admin/allCompany.php';

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
                 $redirectURL .= 'admin/allCompany.php';
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

  

// the update condintion, means where to apply the update in a table 

             $Condition = array
            (
                
                
                'companyID'=> $_POST['companyID']
            )
            ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
             //set redirect url
            $redirectURL .= 'admin/allCompany.php';

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed, try again later ';
                
                 //set redirect url
                 $redirectURL .= 'admin/allCompany.php';
            }
  //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}