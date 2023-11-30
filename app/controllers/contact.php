<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './mail.php';

if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["subject"]) || empty($_POST["message"])) {
    echo "Please enter your information";
} else {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Assuming $mail is your PHPMailer instance
    $mail->setFrom("$email", "$name");
    $mail->addAddress('zaiidmoumnii@gmail.com'); // Add a recipient
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
}
