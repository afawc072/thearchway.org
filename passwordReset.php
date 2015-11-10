<!-- This PHP file is called by reset-password.php and sends an e-mail to a user who
  lost is password -->
  <?php
  session_start();
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

  $tbl_name_users="Users";

// Retrieve data from table where row that match this email
  $sql1="SELECT * FROM $tbl_name_users WHERE email ='$email'";
  $result1=mysql_query($sql1);

// If successfully queried
  if($result1){

// Count how many row has this passkey
    $count=mysql_num_rows($result1);

//This email is not linked to any account
    if($count!=1){
      header('Location:/no_email.php');
    }
    else{

      $rows=mysql_fetch_array($result1);
      $name=$rows['name'];

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
         $activation_link = "http://www.thearchway.org/confirmation_password.php?passkey=$confirm_code";

    	//PREDEFINED FOR ACCOUNT VALIDATION
         $subject  =   "Resetting your password!";
         $message  =   file_get_contents('mailtemplates/password_reset.txt');
         $message  =   str_replace('LE MESSIEUR', $name, $message);
         $message  =   str_replace('LE LINK', $activation_link, $message);
         $mailsend =   sendmail($to,$subject,$message, $name);
         if($mailsend==1){
           header('Location:/confirmation_sent_password.php');
         }
         else{
           header('Location:/mailserver_unavailable.php');
         }

       }

       else {
        echo "There is a problem with your demand, please try again later and if non-successful, contact us!";
      }

    }
  }
}

else {

	header('Location:/no_email.php');

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
  $mail->AddAddress($address, $name);
  if(!$mail->Send()) {
    return 0;
  } else {
    return 1;
  }
}

?>