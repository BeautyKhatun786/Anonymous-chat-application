<?php
$conn = mysqli_connect("localhost", "root", "", "chat-app");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
