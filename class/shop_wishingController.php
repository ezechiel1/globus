<?php
//start session
session_start();
include('../views/ajax.php');
//load and initialize database class
require_once '../globus/core/db.php';
$db = new DB();
$gett=getdate(); $annee=$gett['year']; $mois=$gett['mon']; $jour=$gett['mday']; 
                   $heure=$gett['hours']; $minutes=$gett['minutes']; $second=$gett['seconds'];
  $currentDate=$annee.'-'.$mois.'-'.$jour.' '.$heure.':'.$minutes.':'.$second;

if (isset($_POST['addLike'])) {
	$table="shop_wishing";
	list($clientID,$productID,$product_table,$subCategoryID,$categoryID,$quantity,$price)=explode('|', $_POST['addLike']);
	$data=array(
		'clientID'=>$clientID,
		'productID'=>$productID,
		'product_table'=>$product_table,
		'subCategoryID'=>$subCategoryID,
		'categoryID'=>$categoryID,
		'quantity'=>$quantity,
		'price'=>$price,
		'c_date'=>$currentDate
	);
	$insert = $db->insert($table, $data);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
                	$sessData['status']['msg'] = 'Operation done successfully.';
					//set redirect url
                	$redirectURL = '../index.php';
				}
				else{
					$sessData['status']['type']='error';
					$sessData['status']['type']='Operation failed, Please Try again.';
					//set redirect url
                	$redirectURL = '../index.php';
				}
		
	$delWish='delLike'.$productID.'()';
	//store status into the session
    $_SESSION['sessData'] = $sessData;
   echo '<button role="button" onclick="'.$delWish.';" class="btn btn-outline-danger btn-sm btn-wishlist" data-toggle="tooltip"><i class="icon-heart "></i></button>';
}

if (isset($_POST['delLike'])) {
	$table="shop_wishing";
	list($clientID,$productID,$product_table,$subCategoryID,$categoryID,$quantity,$price)=explode('|', $_POST['delLike']);
	$condition=array(
		'clientID'=>$clientID,
		'productID'=>$productID,
		'subCategoryID'=>$subCategoryID,
		'categoryID'=>$categoryID	
	);
	$delete = $db->delete($table, $condition);
				if($delete)
				{
					$sessData['status']['type'] = 'success';
                	$sessData['status']['msg'] = 'Operation done successfully.';
					//set redirect url
                	$redirectURL = '../index.php';
				}
				else{
					$sessData['status']['type']='error';
					$sessData['status']['type']='Operation failed, Please Try again.';
					//set redirect url
                	$redirectURL = '../index.php';
				}
		
     $addWish='addLike'.$productID.'()';
	//store status into the session
    $_SESSION['sessData'] = $sessData;
   echo '<button role="button" onclick="'.$addWish.';" class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip"><i class="icon-heart "></i></button>';
}

?>
