<?php
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    include "db_connect.php";
    
    $sql = sprintf("SELECT * FROM account
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password"])) {
            
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["user_id"];
            header("Location: homepage.php");
            exit;

            


        
        }
        
        
    
    } 


}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <form method="post">
            <h1>Login</h1>
            <?php if ($errorMessage !== '') { ?>
                <p class="errorMessage"><?php echo $errorMessage; ?></p>
            <?php } ?>
            <div class="textBoxdiv">
                <input type="email" placeholder="Email" name="email" id="email" required>
            </div>
            <div class="textBoxdiv">
                <input type="password" placeholder="Password" name="password" id="password" required>
            </div>
            <input type="submit" value="Login" class="loginBtn">
            <div>

            </div>
            <div>
              <p>Don't Have an Account?</p>  
            </div>
            <div class="logp">
                <a href="signup.php">Signup</a>
            </div>
            <div class="logp">
                <a href="home.html">Go to Homepage</a>
            </div>
        </form>
    </body>
</html>
