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

if (isset($_POST['addtocart'])) {
	$table="shop_cart";
	list($clientID,$productID,$product_table,$subCategoryID,$categoryID,$quantity,$price)=explode('|', $_POST['addtocart']);
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
		
	$delTitle='deltocart'.$productID.'()';
	//store status into the session
    $_SESSION['sessData'] = $sessData;
   echo '<button role="button" onclick="'.$delTitle.';" class="btn btn-outline-danger btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="This product have been deleted from your cart" title="Delete for your cart">Delete to Cart</button>';
}


if (isset($_POST['deltocart'])) {
	$table="shop_cart";
	list($clientID,$productID,$product_table,$subCategoryID,$categoryID,$quantity,$price)=explode('|', $_POST['deltocart']);
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
		
	$addTitle='addtocart'.$productID.'()';
	//store status into the session
    $_SESSION['sessData'] = $sessData;
   echo '<button role="button" onclick="'.$addTitle.';" class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="The product have been added to the cart" title="Add to your Cart">Add to Cart</button>';
}

?>
