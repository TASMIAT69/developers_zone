<?php
session_start();
include_once "db_connect.php"; // Include your database connection script

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // You may want to add validation and error handling here

    // Insert data into your database
    $insertQuery = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if (mysqli_query($conn, $insertQuery)) {
        // Data inserted successfully
        $_SESSION['success_message'] = "Your message has been sent successfully!";
    } else {
        // Error occurred while inserting data
        $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
    }

    header("Location: index.php"); // Redirect back to the index page
    exit();
}
