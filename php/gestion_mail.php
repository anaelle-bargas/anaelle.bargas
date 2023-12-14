<?php
include_once './../html/ex1/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
 
if(!empty($_POST)) {
 
    $mail = new PHPMailer(true);
 
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'anaelle.bargas@sts-sio-caen.info';             //SMTP username
        $mail->Password = 'Mail*2022';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
        //Recipients
        $mail->setFrom('anaelle.bargas@sts-sio-caen.info', '<span class="search_hit">Mailer</span>');
        $mail->addAddress($_POST['to']??'anaelle.bargas@sts-sio-caen.info');     //Add a recipient
 
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $_POST['subject']??'Subject';
        $mail->Body = $_POST['body']??'This is the HTML message body <b>in bold!</b>';
 
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. <span class="search_hit">Mailer</span> Error: {$mail->ErrorInfo}";
    }
}