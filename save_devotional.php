<?php
// Enable full error reporting for debugging
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Database connection parameters
$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

// Connect to the database
$mysqli = new mysqli($host, $username, $password, $database, $port);

// Check database connection
if ($mysqli->connect_errno) {
    die("Connection failed: {$mysqli->connect_error}");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Sanitize and validate input
    $title = trim($_POST['title'] ?? '');
    $excerpt = trim($_POST['excerpt'] ?? '');
    $devotional_date = trim($_POST['devotional_date'] ?? '');

    if (empty($title) || empty($excerpt) || empty($devotional_date)) {
        echo "All fields (title, excerpt, date) are required.";
        exit;
    }

    // Validate and handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = basename($_FILES['image']['name']);
        $imageTmp = $_FILES['image']['tmp_name'];
        $imagePath = "uploads/" . time() . "_" . $imageName;

        // Move the uploaded file to the server
        if (move_uploaded_file($imageTmp, $imagePath)) {
            // Prepare SQL insert statement
            $stmt = $mysqli->prepare(
                "INSERT INTO devotions (title, excerpt, devotion_date, image) VALUES (?, ?, ?, ?)"
            );

            if ($stmt) {
                $stmt->bind_param("ssss", $title, $excerpt, $devotional_date, $imagePath);

                if ($stmt->execute()) {
                    // Redirect on success
                    header("Location: dashboard.php?message=updated");
                    exit;
                } else {
                    echo "Database error: {$stmt->error}";
                }

                $stmt->close();
            } else {
                echo "Failed to prepare statement: {$mysqli->error}";
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "No image selected or file upload error.";
    }
}
?>