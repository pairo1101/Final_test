<?php 
    session_start();
    if(isset($_POST["submit"])){
    include "db_connect.php";
    $ID = $_SESSION["user_id"];
    $emailsql = "SELECT * FROM account
WHERE user_id = $ID";

$result = $mysqli->query($emailsql);

$user = $result->fetch_assoc();
$email = $user["email"];

    $image_file = $_FILES['payment'];
    $image_name = $image_file['name'];
    $image_data = ($image_file['tmp_name']);
    $extension = explode('.',$image_name);
    $fileActualExt = strtolower(end($extension));
    $receipt = uniqid('', true).".".$fileActualExt;
    $folder='payments/';

    $sql = "UPDATE bookings set payment='" . $receipt. "' WHERE email='" . $email . "'";

    if(mysqli_query($mysqli,$sql)){
        move_uploaded_file($image_data,$folder.$receipt);
        $sql = "SELECT * FROM bookings WHERE email = '$email'";
        $sqlQuery = $mysqli->query($sql);
        $sqlResult = $sqlQuery->fetch_assoc();
        $email=$sqlResult["email"];
        $departure = $sqlResult["departure"];
        $destination = $sqlResult["destination"];
        $time = $sqlResult["time"];
        $date = $sqlResult["date"];
        $payment = $sqlResult["payment"];
        include "emailNotif.php";
        header("location: paymentReceived.php");
        exit;


    }


    }





?>