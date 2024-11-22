<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM messages ORDER BY posted_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posting Messages</title>
    <link rel="stylesheet" href="messages.css">
</head>
<body>
    <h1>Posting Messages</h1>
    <table>
        <thead>
            <tr>
                <th>Message</th>
                <th>Posted Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["message"]); ?></td>
                    <td><?php echo $row["posted_at"]; ?></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="2">No messages found!</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>
