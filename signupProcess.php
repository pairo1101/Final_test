<?php
$mismatch = FALSE;
$notpass = FALSE;
$notmail = FALSE;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $defaultProfile = "default.jpg";
        
    



    $passwords = password_hash($_POST["passwords"], PASSWORD_DEFAULT);

    $dbconn = require __DIR__ . "/db.php";

    $sql = "INSERT INTO account_tb (name,username, email_address, password,profile_picture_name)
            VALUES (?, ?, ?,?,?)";
            
    $stmt = $dbconn->stmt_init();

    if ( ! $stmt->prepare($sql)) {
        die("SQL error: " . $dbconn->error);
    }

    $stmt->bind_param("sssss",
                    $_POST["name"],
                    $_POST["username"],
                    $_POST["email"],
                    $passwords,
                    $defaultProfile);
                    

        if ($stmt->execute()) {
            header("location: login.php");
            $notmail = true;

    

                       }
}
                    

?>

