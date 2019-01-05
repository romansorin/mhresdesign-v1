<?php
define('SMTP_USER', 'mentorwebteam@gmail.com');
define('SMTP_PASS', 'hpwpwszvcvozzawk');

function mailConfig() {
// Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = SMTP_USER; // SMTP username
    $mail->Password   = SMTP_PASS; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587; // TCP port to connect to

// Recipients
    $mail->setFrom('mentorwebteam@gmail.com', 'MHS Mail Client');
    $mail->addAddress('mentorwebteam@gmail.com'); // Add a recipient

}