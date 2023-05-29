<?php 
session_start();
require __DIR__ . "/db_connect.php";

$UID = $_SESSION["user_id"];

$verify = "verified";

$authSQL = "SELECT * FROM account WHERE user_id = $UID";
$authQuery = $mysqli -> query($authSQL);
$VerifySQL = "UPDATE account set  verified='" . $verify .  "' WHERE user_id='" . $UID. "'";

if(mysqli_query($mysqli, $VerifySQL)){
    header("Location: userLogin.php");
}else($mysqli->error)


?>