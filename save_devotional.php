<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection settings
    $host = "localhost";
    $port = 3307;
    $username = "root";
    $password = "";
    $database = "prayer_db";

    // Connect to MySQL
    $conn = new mysqli($host, $username, $password, $database, $port);
    if ($conn->connect_error) {
        die("Connection failed: {$conn->connect_error}");
    }

    // Escape user inputs
    $title = $conn->real_escape_string($_POST["title"]);
    $excerpt = $conn->real_escape_string($_POST["excerpt"]);
    $devotional_date = $conn->real_escape_string($_POST["devotional_date"]);

    // Handle image upload
    $image_path = "";
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $image_name = basename($_FILES["image"]["name"]);
        $new_image_name = time() . "_" . $image_name;
        $target_file = "{$target_dir}{$new_image_name}";

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $conn->real_escape_string($target_file);
        } else {
            echo "<div style='color: red;'>Image upload failed.</div>";
            exit;
        }
    }

    // Insert into database
    $sql = "INSERT INTO devotions (title, excerpt, devotion_date, image) 
            VALUES ('$title', '$excerpt', '$devotional_date', '$image_path')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php?message=updated");
        exit;
    } else {
        echo "<div style='color: red;'>Error: {$conn->error}</div>";
    }

    $conn->close();
}
?>