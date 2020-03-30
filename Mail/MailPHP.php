<?php


$email = $_GET['mail'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'projetweb932@gmail.com';
    $mail->Password   = 'projetweb932';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('projetweb932@gmail.com', 'Mailer');
    $mail->addAddress($email, 'user');

    $mail->isHTML(true);
    $mail->Subject = 'test';
<<<<<<< HEAD
    $mail->Body    = 'ce mail a été envoyer grace a un programme';
    $mail->AltBody = 'ce mail a été envoyer grace a un programme';
=======
    $mail->Body    = 'regarder ça marche!';
    $mail->AltBody = 'regarder ça marche!';
>>>>>>> 2bfaf6a6a08de2a9d68dae9ebb822aa9d0a82580

    $mail->send();
    echo 'Message has been sent';
      } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

 ?>
