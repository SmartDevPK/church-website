<?php
// submit_comment.php

header('Content-Type: application/json');

// Database config
$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

// Create DB connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["message" => "Database connection failed"]);
    exit;
}

// Get POST data
$name = $_POST['name'] ?? '';
$comment = $_POST['comment'] ?? '';

if (empty($name) || empty($comment)) {
    http_response_code(400);
    echo json_encode(["message" => "Name and comment are required"]);
    exit;
}

// Sanitize
$name = htmlspecialchars($name, ENT_QUOTES);
$comment = htmlspecialchars($comment, ENT_QUOTES);

// Insert into database
$stmt = $conn->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $comment);

if ($stmt->execute()) {
    echo json_encode(["message" => "Comment submitted successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Failed to submit comment"]);
}

$stmt->close();
$conn->close();
