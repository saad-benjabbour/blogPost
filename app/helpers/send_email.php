<?php

// this will send a verification email to the user
function send_email($receiver_email, $subject, $body)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Port = '587';
    $mail->SMTPAuth = true;
    $mail->Username = 'benjabbours6@gmail.com';
    $mail->Password = 'secret';
    $mail->SMTPSecure = 'ssl';
    $mail->From = 'benjabbours6@gmail.com';
    $mail->FromName = 'admin';
    $mail->AddAddress($receiver_email, '');
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->Send();

    echo 'email sent';
}
