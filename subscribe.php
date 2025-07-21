<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Database configuration
$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Get the submitted email
$email = $_POST['email'] ?? '';

// Validate email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Prepare and execute insert statement
    $stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "Thank you for subscribing to The Anchor Devotional! You will receive your first devotional tomorrow morning";
    } else {
        echo "Email already subscribed or an error occurred!";
    }

    $stmt->close();
} else {
    echo "Invalid email address!";
}

// Close connection
$conn->close();
?>