<!-- This PHP file is called by reset-password.php and sends an e-mail to a user who
lost is password -->
<?php

//VARIABLES

$tbl_name="Reset";
//Import the necessary information to connect to the DB and use
//the mail functions of php
session_start();
require 'PHPMailerAutoload.php';
require "db_connect.php"; 

//confirmation code generated for confirmation e-mail
$confirm_code=md5(uniqid(rand()));

//Received Variables from reset-password.php
$email=$_POST['emailInput'];

//Since the coloum registered needs to be set to 'f' for logins to be accepted, there won't be any login possible by setting it to 't'
//This will be changed once the confirmation email is activated

$sql="UPDATE Users SET registered='t' WHERE email='$email'";

$result=mysql_query($sql);

//Condition only met if user already exists
if($result){
	//This creates an instance in the Reset Database that contains the activation code of the user for resetting his password
	$sql="INSERT INTO $tbl_name(confirmation, email)VALUES('$confirm_code', '$email')";
	$result=mysql_query($sql);

	//Condition should be met based on previous
	if($sql){

		// ---------------- SEND MAIL FORM ----------------

		//TO DEFINE DEPENDING ON USER
    	$to = $email;
    	$activation_link = "http://www.thearchway.org/confirmation.php?passkey=$confirm_code";

    	//PREDEFINED FOR ACCOUNT VALIDATION
    	$subject  =   "Resetting your password!";
   	 	$message  =   file_get_contents('mailtemplates/activation_template2.txt');
    	$message  =   str_replace('LE MESSIEUR', 'User', $message);
    	$message  =   str_replace('LE LINK', $activation_link, $message);
    	$mailsend =   sendmail($to,$subject,$message,'User');
      if($mailsend==1){
        	header('Location:/confirmation_sent.php');
      }
      else{
        	header('Location:/mailserver_unavailable.php');
      }

	}

	else {
		echo "There is a problem with your demand, please try again later and if non-successful, contact us!"
	}

	}

else {

	echo "Your email was not found in our database";

	}

//This is a default send mail function
function sendmail($to,$subject,$message,$name)
    {
                  $mail             = new PHPMailer();
                  $body             = $message;
                  $mail->IsSMTP();
                  $mail->SMTPAuth   = true;
                  $mail->Host       = "thearchwayorg.domain.com";
                  $mail->Port       = 587;
                  $mail->Username   = "noreply@thearchway.org";
                  $mail->Password   = "Get!No58?reply";
                  $mail->SMTPSecure = 'tls';
                  $mail->SetFrom('noreply@thearchway.org', 'The Archway');
                  $mail->AddReplyTo("noreply@thearchway.org","The Archway");
                  $mail->Subject    = $subject;
                  $mail->AltBody    = $message;
                  $mail->MsgHTML($body);
                  $mail->isHTML(true);
                  $address = $to;
                  //$mail->AddAddress($address, $name);
                  if(!$mail->Send()) {
                      return 0;
                  } else {
                        return 1;
                 }
    }

?>