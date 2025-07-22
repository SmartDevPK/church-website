<?php
// Enable error reporting (for development)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// --- Database Configuration ---
$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

try {
    // Create PDO connection
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // --- Fetch comments ---
    $stmt = $pdo->query("SELECT name, comment, created_at FROM comments ORDER BY created_at DESC");
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // --- Return comments as JSON ---
    header('Content-Type: application/json');
    echo json_encode($comments);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch comments: ' . $e->getMessage()]);
}
?>