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



if(isset($_POST["submit"])){
    include "db_connect.php";
    $sql = sprintf("SELECT * FROM bookings
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    $sqlQuery = $mysqli->query($sql);
    $sqlResult = $sqlQuery->fetch_assoc();
    $verify = $sqlResult["email"];
    if($_POST["email"]==$verify){
        $sql=sprintf("DELETE FROM bookings WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"]));
        $mysqli->query($sql);
    }
    $departure = $sqlResult["departure"];
    $destination = $sqlResult["destination"];
        




$email = $_POST["email"];
    include "journey.php";


    $bookSQL = "INSERT INTO bookings (email, departure, destination, time, date,topay) VALUES(?,?,?,?,?,?)";

    $stmt = $mysqli->stmt_init();

    $stmt->prepare($bookSQL);




    $stmt->bind_param("ssssss",
                        $email,
                        $_POST["departure"],
                        $_POST["destination"],
                        $_POST["time"],
                        $_POST["date"],
                        $toPay);
    if($stmt->execute()){
        $sql = sprintf("SELECT * FROM bookings WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"]));
        $sqlQuery = $mysqli->query($sql);
        $user = $sqlQuery->fetch_assoc();
        
        session_start();
        session_regenerate_id();
        header("location: payment.php");
    }









}




?>