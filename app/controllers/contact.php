<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './mail.php';

if (empty($_POST["name"]) || empty($_POST["phone"]) || empty($_POST["email"]) || empty($_POST["message"] )) {
    echo "Please enter your information";
} else {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    $recipient = 'zaiidmoumnii@gmail.com';

    // Assuming $mail is your PHPMailer instance
    $mail->setFrom("$email", "$name");
    $mail->addAddress($recipient); // Add a recipient
    $mail->Subject = 'Contact Support';
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
}
