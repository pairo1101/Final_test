<?php
session_start();
include "db_connect.php";
$UID = $_SESSION["user_id"];
$emailsql = "SELECT * FROM account
WHERE user_id = $UID";

$result = $mysqli->query($emailsql);

$user = $result->fetch_assoc();
$email = $user["email"];

$toPay="";
$sql = "SELECT email,departure,destination,date,time,topay FROM bookings WHERE email = '$email'";
$sqlQuery = $mysqli->query($sql);
$sqlResult = $sqlQuery->fetch_assoc();
$email = $sqlResult["email"];
$departure = $sqlResult["departure"];
$destination = $sqlResult["destination"];
$date = $sqlResult["date"];
$time = $sqlResult["time"];
$toPay = $sqlResult["topay"];



?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
  <style>
    body {
      background-image: url('Train_Rail.png');
      background-repeat: no-repeat;
      background-size: cover;
      color: white;
    }
    h1, h3 {
      color: white;
    }
    
  </style>
</head>
<body>
  <h1>Payment </h1>
  <h3>Send Payment To: 0969-2255-577 Jobert Soriano</h3>
  <form action="paymentProcess.php" method="POST" enctype="multipart/form-data">
    <label for="name">Email:</label>
    <input type="text" id="email" name="email" value="<?=$email?>" required readonly><br>

<label for="departure">Departure:</label>
<input type="text" id="departure" name="departure" value="<?=$departure?>" required><br>

<label for="destination">Destination:</label>
<input type="text" id="destination" name="destination" placeholder="MM/YY" value="<?=$destination?>" required><br>

<label for="date">Date:</label>
<input type="text" id="date" name="date"  value="<?=$date?>" required><br>

<label for="time">Time:</label>
<input type="text" id="time" name="time"  value="<?=$time?>" required readonly><br>

<label for="Payment">Upload proof of Payment</label>
<input type="file" id="payment" name="payment" accept="image/jpg, image/jpeg, image/png" required><br>
<h3>To Pay: P<?=$toPay?></h3>
<button type="submit" id="submit" name="submit">Submit Payment</button>
  </form>
  <div class="logp">
                <a href="homepage.php">Go to Homepage</a>
</body>
</html> 