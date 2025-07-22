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

// Only proceed if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit("Invalid access");
}

// Create database connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate input
$name = trim($_POST['name'] ?? '');
$message = trim($_POST['message'] ?? '');

// Generate initials from name
$initials = '';
if (!empty($name)) {
    $parts = explode(' ', $name);
    foreach ($parts as $part) {
        if (!empty($part)) {
            $initials .= strtoupper($part[0]);
        }
    }
}

// Insert into database only if both fields are not empty
if (!empty($name) && !empty($message)) {
    $stmt = $conn->prepare("INSERT INTO testimonies (name, initials, message) VALUES (?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sss", $name, $initials, $message);

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $stmt->close();

    // Redirect after successful insertion
    header("Location: index.php?success=1");
    exit;
} else {
    // Redirect or handle error if inputs are missing
    header("Location: index.php?error=1");
    exit;
}

// Close connection
$conn->close();
