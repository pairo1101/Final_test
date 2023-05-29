<?php 
include "db_connect.php";
if(isset($_POST["approve"])){
    $status = "APPROVED";
    $bookSQL = "INSERT INTO history (booking_id,email, departure, destination, time, date,payment,status) VALUES(?,?,?,?,?,?,?,?)";

    $stmt = $mysqli->stmt_init();

    $stmt->prepare($bookSQL);




    $stmt->bind_param("isssssss",
                        $_POST["booking_id"],
                        $_POST["email"],
                        $_POST["departure"],
                        $_POST["destination"],
                        $_POST["time"],
                        $_POST["date"],
                        $_POST["payment"],
                        $status);
    if($stmt->execute()){
        include "qrGenerator.php";
        include "emailQR.php";
        $sql=sprintf("DELETE FROM bookings WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"]));
        $mysqli->query($sql);
 
        header("location: adminControl.php");
    }else{
        die($mysqli->error);
    }
}

if(isset($_POST["deny"])){
    $status = "DENIED";
    $bookSQL = "INSERT INTO history (booking_id,email, departure, destination, time, date,payment,`status`) VALUES(?,?,?,?,?,?,?,?)";

    $stmt = $mysqli->stmt_init();

    $stmt->prepare($bookSQL);




    $stmt->bind_param("isssssss",
                        $_POST["booking_id"],
                        $_POST["email"],
                        $_POST["departure"],
                        $_POST["destination"],
                        $_POST["time"],
                        $_POST["date"],
                        $_POST["payment"],
                        $status);
    if($stmt->execute()){
        $sql=sprintf("DELETE FROM bookings WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"]));
        $mysqli->query($sql);
        include "emailDeny.php";
 
        header("location: adminControl.php");
    }else{
        die($mysqli->error);
    }
}






?>