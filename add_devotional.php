<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

$errorMessage = '';
$successMessage = '';

// Database connection parameters
$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form only when it's submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs safely
    $topic = $_POST['topic'] ?? '';
    $date = $_POST['date'] ?? '';

    // File upload directory
    $uploadDir = "uploads";

    // Create uploads directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        if (!mkdir($uploadDir, 0755, true)) {
            $errorMessage = "Failed to create upload directory.";
        }
    }

    if (!$errorMessage) {
        // Handle file uploads
        $timestamp = time();
        $imagePath = "$uploadDir/devotion_cover_" . $timestamp . ".jpg";

        if (isset($_FILES['image']) && move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            $pdfPath = null;

            $stmt = $conn->prepare("INSERT INTO devotion (image_path, topic, date, pdf_path) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $imagePath, $topic, $date, $pdfPath);

            if ($stmt->execute()) {
                $successMessage = "Devotion uploaded successfully!";
            } else {
                $errorMessage = "Database error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $errorMessage = "Image upload failed.";
        }
    }
}

// Fetch recent devotionals from DB for the table display
$devotion = [];
$result = $conn->query("SELECT id, topic, date, image_path FROM devotion ORDER BY date DESC LIMIT 10");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $devotion[] = $row;
    }
} else {
    $errorMessage = "Failed to fetch devotionals: " . $conn->error;
}

$conn->close();
?>