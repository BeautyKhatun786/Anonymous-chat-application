<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        header("Location: messages.php");
        exit;
    } else {
        echo "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="wrapper">
        
         <form method="POST" action="">
       
            <img id="i1" src="login.png" alt="">
        <div class="box">
            <input class="box" style="color: black;" type="text" name="username" placeholder="Username" required><br> 
        </div>
        <div class="box">
            <input class="box" style="color: black;" type="password" name="password" placeholder="Password" required><br>
        </div>
        
        <button style="margin-top: 15px;" type="submit" class="btn">Login</button>
    
    <br>
    <div id="m1">
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
    <div >
        <a href="index.php"><button id="back">Go Back</button></a>
    </div>
    
   
        </form>
    </div>
</body>
</html>