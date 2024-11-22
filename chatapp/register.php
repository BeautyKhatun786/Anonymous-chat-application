<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "Registration successful!";
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register page</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="wrapper">
       
        <form method="POST" action="">
            <img id="i1" src="register.png" alt="">
            <div class="box">
                <input style="color: black;" type="text" name="username" placeholder="Username" required><br>
            </div>
            <div class="box">
                <input style="color: black;" type="password" name="password" placeholder="Password" required><br>
            </div>
            <button style="padding-top: 5px;" type="submit" class="btn">Register</button>
            <br>
            <div>
                <a href="login.php"><button id="login">Login</button></a>
                <a href="index.php"><button id="back">Go Back</button></a> 
            </div>
        </form>
        <br>
        
        
    </div>
    
</body>
</html>