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

$name = trim($_POST['name'] ?? '');
$message = trim($_POST['message'] ?? '');
$initials = strtoupper(substr($name, 0, 1)) . strtoupper(substr(strrchr($name, " "), 1));

if (!empty($name) && !empty($message)) {
    $stmt = $conn->prepare("INSERT INTO testimonies (name, initials, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $initials, $message);


    if ($stmt->execute()) {
        echo "Thank you for your testimony!";
    } else {
        echo "Something went wrong. Try again.";
    }

    $stmt->close();
} else {
    echo "All fields are required.";
}

$conn->close();
?>