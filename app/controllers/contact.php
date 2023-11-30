<?php

require './mail.php';
if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["subject"]) || empty($_POST["message"]))
{
    echo "please enter ur information";
} else {
   $name = $_POST["name"];
   $email = $_POST["email"];
   $subject = $_POST["subject"];
   $message = $_POST["message"];

    $mail->setFrom('$email' . '$name');
    $mail->addAddress('zaiidmoumnii@gmail.com');     //Add a recipient
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail ->send();
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';}
}