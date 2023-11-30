<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'mailer/autoload.php';

$mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'zaiidmoumnii@gmail.com';
    $mail->Password   = 'euoh dsau jysj cqwg ';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;     
    
    $mail->isHTML(true);


