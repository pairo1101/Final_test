<?php
session_start();
$dbconn = require __DIR__ . "/db_connect.php";
$UID = $_SESSION["user_id"];
$sql = "SELECT * FROM account
WHERE user_id = $UID";
$result = $dbconn->query($sql);
$output = $result->fetch_assoc();
$verification = $output["verified"];
$email = $output["email"];

if($verification == 'verified'){
    header("location: login.php");
}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
include "db_connect.php";
require "vendor/autoload.php";
//variables
$smtp_user = "expressrailwayss@gmail.com";
$smtp_password = 'laicsfbxrdqfjgqj';
$port = 465;
$subject = "Email Verification";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://classless.de/classless.css">
    <style>





.button {
  background-color: blue;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {width: 200px;}
</style>
    

</head>
<body>
<form method ="post">
    <h1>Please check your email for the verification process<br></h1>
<button class="button button1">Resend Email</button>
    

</body>
</html>