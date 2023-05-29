<?php 
session_start();
include "db_connect.php";
if(isset($_POST["cancel"])){
$sql=sprintf("DELETE FROM bookings WHERE email = '%s'",
$mysqli->real_escape_string($_POST["email"]));
$mysqli->query($sql);


header("location: homepage.php");
}


?>