<?php
use PHPMailer\PHPMailer\PHPMailer;

$status= "success";
			$response = "Email sent succesfully";

if(isset($_POST['name']))
{

	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$body=$_POST['body'];
//Import the PHPMailer class into the global namespace

require 'vendor/autoload.php';
//SMTP Settings
	 $mail->isSMTP();
 $mail->Host = "smtp.gmail.com";
 $mail->SMTPAuth = true;
 $mail->Username = "ezechielkalengya@gmail.com";
 $mail->Password = "0973583598";
 $mail->Port = 465; //587
	$mail->SMTPSecure = "ssl"; //tls

/**
 * This example shows sending a message using PHP's mail() function.
 */

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom($email, $name);
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('ezechielkalengya@gmail.com', 'EZPK');
//Set the subject line
$mail->Subject = 'PHPMailer mail() test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    $status= "success";
	$response = "Email sent succesfully";
} else {
    $status= "error";
	$response = "Something is wrong<br><br>". $mail->ErrorInfo;
}

	// require_once "PHPMailer/PHPMailer.php";
	// require_once "PHPMailer/SMTP.php";
	// require_once "PHPMailer/Exception.php";

	// $mail = new PHPMailer();

	// //SMTP Settings
	// $mail->isSMTP();
	// $mail->Host = "smtp.gmail.com";
	// $mail->SMTPAuth = true;
	// $mail->Username = "ezechielkalengya@gmail.com";
	// $mail->Password = "0973583598";
	// $mail->Port = 465; //587
	// $mail->SMTPSecure = "ssl"; //tls

	// //Email Settings
	// $mail->isHTML();
	// $mail->setFrom($email,$name);
	// $mail->addAddress("ezechielkalengya@gmail.com","Ezechiel");
	// $mail->Subject = $subject;
	// $mail->Body = $body;

	// if($mail->send()){
	// 	 	$status= "success";
	// 		$response = "Email sent succesfully";
	// 	}
	// else{
	// 		$status= "error";
	// 		$response = "Something is wrong<br><br>". $mail->ErrorInfo;
	// 	}
	exit(json_encode(array("status" => $status,"response" => $response)));
}
?>