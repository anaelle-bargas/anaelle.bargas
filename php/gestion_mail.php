<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './../mail/Exception.php';
require './../mail/PHPMailer.php';
require './../mail/SMTP.php';

if(!empty($_POST)) {
    echo $_POST['name'];
    $mail = new PHPMailer(true);
 
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'anaelle.bargas@sts-sio-caen.info';             //SMTP username
        $mail->Password = 'Mail*2022';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
        //Recipients
        $mail->setFrom($_POST['email'], $_POST['email']);
        $mail->addAddress('anaelle.bargas@sts-sio-caen.info');     //Add a recipient
 
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $_POST['objet']??'Subject';
        $mail->Body = $_POST['message']??'This is the HTML message body <b>in bold!</b>';
 
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. <span class='search_hit'>Mailer</span> Error: {$mail->ErrorInfo}";
    }
}

// header("Location: ./../index.php");
exit;