<?php 
require "vendor/autoload.php";
require('vendor/fpdf/fpdf.php');

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PdfWriter;
$email = $_POST["email"];
$payment = $_POST["payment"];
$booking = strval($_POST["booking_id"]);
$departure = $_POST["departure"];
$destination = $_POST["destination"];
$date = $_POST["date"];
$time = $_POST["time"];
$status ="APPROVE";
$concatenate = "Email: $email \n Booking ID: $booking \n  Departure: $departure  \n  Destination: $destination \n  Date: $date  \n  Time: $time \n Status: $status";

$qrMessage = QrCode::create($concatenate);
$writer = new PdfWriter;

$result = $writer->write($qrMessage);
$output = $result->saveToFile("QR/$payment.pdf");

?>