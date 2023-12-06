<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './mailer/autoload.php';
require './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
try {
$mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['MAIL'];
    $mail->Password   = $_ENV['MAILER_PASSWORD'];
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;     
    
    $mail->isHTML(true);
} catch (Exception $e){
    echo "Mailer Error: " . $mail->ErrorInfo;
}

