<?php 
session_start();
$ID = $_SESSION["user_id"];

if (isset($_SESSION["user_id"])) {

    
    
    include "db_connect.php";


    
    $sql = "SELECT * FROM account
            WHERE user_id = $ID";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    $email = $user["email"];

}





if (! isset($_SESSION["user_id"])){

  header("location: userLogin.php");
  
}



?>

<!DOCTYPE html>
<html>
<head>
  <title>Booking Page</title>
  <link rel="stylesheet" type="text/css" href="booking.css">
</head>
<body>
  <style>
.logp{
        color: #ea0808;
        margin-top: 15px;
        text-align: center;
    }
    </style>
  <div class="container">
    <h1>Booking Page</h1>
    <form action="bookProcess.php" method="post" enctype="multipart/form-data">
      <label for="departure">Departure:</label>
      <select id="departure" name="departure" required>
        <option value="" disabled selected>Select Departure</option>
        <option value="Tutuban">Tutuban</option>
        <option value="Blumentritt">Blumentritt</option>
        <option value="Laong Laan">Laong Laan</option>
        <option value="Espana">Espana</option>
        <option value="Santa Mesa">Santa Mesa</option>
        <option value="Pandacan">Pandacan</option>
        <option value="Paco">Paco</option>
        <option value="San Andres">San Andres</option>
        <option value="Vito Cruz">Vito Cruz</option>
        <option value="Buendia">Buendia</option>
        <option value="Pasay Road">Pasay Road</option>
        <option value="EDSA">EDSA</option>
        <option value="Nichols">Nichols</option>
        <option value="FTI">FTI</option>
        <option value="Bicutan">Bicutan</option>
        <option value="Sucat">Sucat</option>
        <option value="Alabang">Alabang</option>


        <!-- Add more options as needed -->
      </select>
      <label for="destination">Destination:</label>
      <select id="destination" name="destination" required>
        <option value="" disabled selected>Select Destination</option>
        <option value="Tutuban">Tutuban</option>
        <option value="Blumentritt">Blumentritt</option>
        <option value="Laong Laan">Laong Laan</option>
        <option value="Espana">Espana</option>
        <option value="Santa Mesa">Santa Mesa</option>
        <option value="Pandacan">Pandacan</option>
        <option value="Paco">Paco</option>
        <option value="San Andres">San Andres</option>
        <option value="Vito Cruz">Vito Cruz</option>
        <option value="Buendia">Buendia</option>
        <option value="Pasay Road">Pasay Road</option>
        <option value="EDSA">EDSA</option>
        <option value="FTI">FTI</option>
        <option value="Bicutan">Bicutan</option>
        <option value="Sucat">Sucat</option>
        <option value="Alabang">Alabang</option>

        <!-- Add more options as needed -->
      </select>
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required>
      <label for="time">Time:</label>
      <input type="time" id="time" name="time" required>
      <label for="Email">Email:</label>
      <input type="email" id="email" name="email" value="<?=$email?>">


      <input type="submit" id="submit" name="submit" value="Book Now">

      <div class="logp">
                <a href="homepage.php">Go to Homepage</a>
      </div>
    </form>
  </div>
</body>
</html>
