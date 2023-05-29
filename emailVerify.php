<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if(isset($_POST)){
include "db_connect.php";
require "vendor/autoload.php";
//variables
$email = $_POST["email"];
$smtp_user = "expressrailwayss@gmail.com";
$smtp_password = 'laicsfbxrdqfjgqj';
$port = 465;
$subject = "Ticket Deny";
$message = "Greetings! To verify your email please click on this link localhost/Final_test/verify.php";


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