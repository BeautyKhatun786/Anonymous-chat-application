<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $message = mysqli_real_escape_string($conn, $_POST["message"]);
    $ip = $_SERVER["REMOTE_ADDR"];
    $mac = exec("getmac");

    $query = "INSERT INTO messages (message, ip_address, mac_address) VALUES ('$message', '$ip', '$mac')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Message posted successfully!')</script>";
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
    <title>index page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <div class="form-container">
       <img id="i1" src="index.png" alt="">
    <form method="POST" action="">
        <textarea name="message" rows="4" cols="50" placeholder="Write your message here..." required></textarea><br>
        <button type="submit">Post</button>
    </form>
    <br>
    <div id="m1">
        <p>Do you want to see message! <a href="login.php">Login</a></p>
    </div>
    </div>
    
</body>
</html>




