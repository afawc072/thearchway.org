<?php
    require('PHPMailerAutoload.php');

    $to       =   "pierluc.boudreau@gmail.com";
    $subject  =   "Archway test email";
    $message  =   file_get_contents('mailtemplates/activation_template2.txt');
    $name     =   "THE GUY";
    $mailsend =   sendmail($to,$subject,$message,$name);
      if($mailsend==1){
        echo '<h2>email sent.</h2>';
      }
      else{
        echo '<h2>There are some issue.</h2>';
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

