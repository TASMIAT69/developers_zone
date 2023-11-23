<?php
$conn = mysqli_connect("localhost", "root", "", "developers_zone");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_POST['user_id'];
$developer_id = $_POST['developer_id'];
$message = $_POST['message'];


$sql = "INSERT INTO chat_messages (user_id, developer_id, message, timestamp) VALUES ('$user_id', '$developer_id', '$message', NOW())";

if (mysqli_query($conn, $sql)) {
    // Success
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
