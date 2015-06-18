<?php
session_start();
require('PHPMailerAutoload.php');
require "db_connect.php";

// table name
$tbl_name="temp_members_db";

// Random confirmation code
$confirm_code=md5(uniqid(rand()));

// values sent from form
$name=$_POST['username'];
$email=$_POST['emailInput'];
$password=$_POST['passwordInput'];

// Insert data into database
$sql="INSERT INTO $tbl_name(confirm_code, name, email, password)VALUES('$confirm_code', '$name', '$email', '$password')";
$result=mysql_query($sql);

// if suceesfully inserted data into database, send confirmation link to email
if($result){

// ---------------- SEND MAIL FORM ----------------

//TO DEFINE DEPENDING ON USER
    $to = $email;
    $activation_link = "http://www.thearchway.org/confirmation.php?passkey=$confirm_code";

    //PREDEFINED FOR ACCOUNT VALIDATION
    $subject  =   "Activating your Archway account!";
    $message  =   file_get_contents('mailtemplates/activation_template2.txt');
    $message  =   str_replace('LE MESSIEUR', $name, $message);
    $message  =   str_replace('LE LINK', $activation_link, $message);
    $mailsend =   sendmail($to,$subject,$message,$name);
      if($mailsend==1){
        echo '<h2>email sent.</h2>';
      }
      else{
        echo '<h2>There are some issue.</h2>';
      }

}


// if not found
else {
echo "Not found your email in our database";
}


// if your email succesfully sent
if($sentmail){
echo "Your Confirmation link Has Been Sent To Your Email Address.";
}
else {
echo "Cannot send Confirmation link to your e-mail address";
}



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
                  $mail->AddAddress($address, $name);
                  if(!$mail->Send()) {
                      return 0;
                  } else {
                        return 1;
                 }
    }

?>