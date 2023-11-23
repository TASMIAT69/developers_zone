<?php
$user_id = $_GET['user_id'];
$developer_id = $_GET['developer_id'];

// Connect to your database (Replace with your database connection code)
$conn = mysqli_connect("localhost", "root", "", "developers_zone");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch chat messages from the database and format them as HTML
$sql = "SELECT * FROM chat_messages WHERE (user_id = '$user_id' AND developer_id = '$developer_id') OR (user_id = '$developer_id' AND developer_id = '$user_id') ORDER BY timestamp";
$result = mysqli_query($conn, $sql);

$messages = "";
while ($row = mysqli_fetch_assoc($result)) {
    $messageClass = ($row['user_id'] === $user_id) ? 'user-message' : 'developer-message';
    $messages .= "<div class='$messageClass'><strong>" . $row['user_id'] . ":</strong> " . $row['message'] . "</div>";
}

echo $messages;

// Close the database connection
mysqli_close($conn);
?>
