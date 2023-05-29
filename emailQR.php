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
$subject = "Ticket";
$message = "Greetings! Here's your generated QR code with the details of your booked ticket. If you change your mind and want to cancel your request, please email us at expressrailwayss@gmail.com to refund your payment. have a great day!";


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
$mail->AddAttachment("QR/$payment.pdf"); 
$mail->send();
}
?>