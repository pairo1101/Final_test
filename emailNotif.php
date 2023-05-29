<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if(isset($_POST)){
include "db_connect.php";
require "vendor/autoload.php";
//variables
$smtp_user = "expressrailwayss@gmail.com";
$smtp_password = 'laicsfbxrdqfjgqj';
$port = 465;
$subject = "Validation";
$message = "Greetings! Please wait while we validate your payment. We will get back to you as soon as we confirmed your receipt";


//mailing process
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $smtp_user;
$mail->Password = $smtp_password;
$mail->Port = $port;
$mail->SMTPSecure = 'ssl';
$mail->isHTML(true);
$mail->setFrom($smtp_user);
$mail->addAddress($email);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->send();
}
?>