<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './../mail/Exception.php';
require './../mail/PHPMailer.php';
require './../mail/SMTP.php';

if(isset($_POST)) {
    $mail = new PHPMailer(true);
    if(empty($_POST["name"])){
        echo !empty($_POST["name"]);
        echo "Veuillez indiquer votre Nom et Prenom";
    }
    else if(empty($_POST["email"])){
        echo "Veuillez indiquer votre email";
    }
    else if(empty($_POST["message"])){
        echo "Veuillez indiquer votre message";
    }
    else if(empty($_POST["objet"])){
        echo "Veuillez indiquer un objet au message";
    }
    else{
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
            $mail->Subject = $_POST['objet'];
            $mail->Body = "Message de : ".$_POST['name']."<br><br>".$_POST['message'];
            
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent.";
            // <span class='search_hit'>Mailer</span> Error: {$mail->ErrorInfo}
        }
    }
    
}

exit;