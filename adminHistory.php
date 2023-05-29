<?php 
session_start();
$ID = $_SESSION["admin_id"];
include "db_connect.php";
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



$sql = "SELECT * FROM history ORDER BY booking_id DESC";
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
  background-image: url(Train_track.png);
  background-repeat: no-repeat;
  background-size: cover;
}
table {
  font-family: arial, sans-serif;
  width: 100%;
}

td, th {
  border: 3px solid #000000;
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
<body>


            
         
                <div>
                <th><a href="adminControl.php"><button class="button button1">Pending Tickets</th></button></a></th>
                <th><a href="adminReport.php"><button class="button button1">Print Report</th></button></a></th>
                <table>

  <tr>

    <th>Email</th>
    <th>Departure</th>
    <th>Destination</th>
    <th>Date</th>
    <th>Time</th>
    <th>Booking ID</th>
    <th>Payment Status</th>


            </tr>
  <tr>
  <?php while($admin = $sqlQuery->fetch_assoc()):
        $email = $admin["email"];
        $departure = $admin["departure"];
        $destination = $admin["destination"];
        $date = $admin["date"];
        $time = $admin["time"];
        $booking_id = $admin["booking_id"];
        $status= $admin["status"];
            ?>
     
    <td><?=$email?></td>
    <td><?=$departure?></td>
    <td><?=$destination?></td>
    <td><?=$date?></td>
    <td><?=$time?></td>
    <td><?=$booking_id?></td>
    <td><?=$status?></td>


  </tr>
  <?php endwhile;?>
</table>


        


</div>


</body>
</html>