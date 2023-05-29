<?php
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    include "db_connect.php";
    
    $sql = sprintf("SELECT * FROM admincredentials
                    WHERE username = '%s'",
                   $mysqli->real_escape_string($_POST["username"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if ($_POST["password"]== $user["password"]) {
            
            session_start();

            session_regenerate_id();

            $_SESSION["admin_id"] = $user["admin_id"];
            header("Location: adminControl.php");
            exit;

            


        
        }
        
        
    
    } $no_credential = TRUE;


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
                <input type="text" placeholder="Username" name="username" id="username" required>
            </div>
            <div class="textBoxdiv">
                <input type="password" placeholder="Password" name="password" id="password" required>
            </div>
            <input type="submit" value="Login" class="loginBtn">
            <div>

            </div>
            <div class="signup">
            </div>
            <div class="logp">
                <a href="home.html">Go to Homepage</a>
            </div>
        </form>
    </body>
</html>
