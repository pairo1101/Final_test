<?php 
session_start();
$ID = $_SESSION["admin_id"];

if (isset($_SESSION["admin_id"])) {
    
    
    include "db_connect.php";


    
    $sql = "SELECT * FROM admincredentials
            WHERE admin_id = $ID";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

}





if (! isset($_SESSION["admin_id"])){

  header("location: adminLogin.php");
  exit;
}

include "db_connect.php";
$sql = "SELECT * FROM bookings ORDER BY booking_id DESC";
$sqlQuery = $mysqli->query($sql);




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
  background-image: url(Train_under.png);
  background-repeat: no-repeat;
  background-size: cover;
}
table {
  font-family: arial, sans-serif;
  width: 100%;
}

td, th {
  border: 3px solid #FFFF00;
  background-color: #dddddd;
  text-align: center;
  padding: 8px;
  height: 50px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.button {
  background-color: #4CAF50; /* Green */
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

.button1 {width: 250px;}
.button2 {width: 50%;}
.button3 {width: 100%;}
</style>
</head>
<body style="background-color:#0000A0;">


            
         
<div>
    <th><a href="adminHistory.php"><button class="button button1">History</th></button></a></th>
    <th><a href="logoutAdmin.php"><button class="button button1">Logout</th></button></a></th>
  <table>
  <tr>
    <th>Email</th>
    <th>Departure</th>
    <th>Destination</th>
    <th>Date</th>
    <th>Time</th>
    <th>To Pay</th>
    <th>Payment Proof</th>

            </tr>
  <tr>
  <?php while($admin = $sqlQuery->fetch_assoc()):
        $email = $admin["email"];
        $departure = $admin["departure"];
        $destination = $admin["destination"];
        $date = $admin["date"];
        $time = $admin["time"];
        $payment = $admin["payment"];
        $booking_id = $admin["booking_id"];
        $toPay = $admin["topay"];
            ?>
    <td><?=$email?></td>
    <td><?=$departure?></td>
    <td><?=$destination?></td>
    <td><?=$date?></td>
    <td><?=$time?></td>
    <td> P <?=$toPay?></td>
    <form action="approvalProcess.php" method="post">  
    <td><img src="payments/<?=$payment?>" width="400" height="500"></td>
    <input type="hidden" id="booking_id" name="booking_id" value="<?=$booking_id?>">
    <input type="hidden" id="email" name="email" value="<?=$email?>">
    <input type="hidden" id="departure" name="departure" value="<?=$departure?>">
    <input type="hidden" id="destination" name="destination" value="<?=$destination?>">
    <input type="hidden" id="date" name="date" value="<?=$date?>">
    <input type="hidden" id="time" name="time" value="<?=$time?>">
    <input type="hidden" id="payment" name="payment" value="<?=$payment?>">
    <td><button type="submit" id="approve" name="approve">Approve</button></td>
    <td><button type="submit" id="deny" name="deny">Deny</button></td>
    </form>
  </tr>
  <?php endwhile;?>
</table>


        


</div>


</body>
</html>