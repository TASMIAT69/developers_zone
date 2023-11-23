<?php
$conn = mysqli_connect("localhost", "root", "", "developers_zone");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute a query to delete all chat messages
$sql = "DELETE FROM chat_messages";

if (mysqli_query($conn, $sql)) {
    echo "Chat cleared successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
