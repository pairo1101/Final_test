<?php
include "db_connect.php";
if ($_SERVER["REQUEST_METHOD"] === "POST"){






    $sql = "INSERT INTO account (name, email, password)
            VALUES (?, ?, ?)";
    $passwords = password_hash($_POST["password"], PASSWORD_DEFAULT);
            
    $stmt = $mysqli->stmt_init();

    if ( ! $stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    if($_POST["password"]!==$_POST["confirm_password"]){
        header("location: signup.php");
    }


    $stmt->bind_param("sss",
                    $_POST["name"],
                    $_POST["email"],
                    $passwords);
                    

        if ($stmt->execute()) {
            header("location: userLogin.php");


    

                       }else{
                        die($mysqli->error);
                       }
                    
}
                    

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="signup.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
    </head>
    <body>
        <form method="post">
            <h1>Sign Up</h1>
            <div class="textBoxdiv">
                <input type="text" placeholder="Name" id="name" name="name" required>
            </div>
            
            <div class="textBoxdiv">
                <input type="email" placeholder="Email*" name="email" id="email" required>
            </div>
            <div class="textBoxdiv">
                <input type="password" placeholder="Password*" name="password" id="password" required>
            </div>
            <div class="textBoxdiv">
                <input type="password" placeholder="Confirm Password*" name="confirm_password" id="confirm_password" required>
            </div>
            <input type="submit" value="Sign up" class="signBtn">
            <div>
              <p>Already a member?</p>  
            </div>
            <div class="logp">
                <a href="userLogin.php">Log In</a>
            </div>
        
        </form>
    </body>
</html>