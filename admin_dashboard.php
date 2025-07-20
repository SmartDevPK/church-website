<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

$errorMessage = '';
$successMessage = '';

// Process form only when it's submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $host = "localhost";
    $port = 3307;
    $username = "root";
    $password = "";
    $database = "prayer_db";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database, $port);

    // Check connection
    if ($conn->connect_error) {
        $errorMessage = "Connection failed: " . $conn->connect_error;
    } else {
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

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - Upload Devotion</title>
    <style>
        /* Reset some default styling */
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 480px;
        }

        h2 {
            margin-bottom: 25px;
            font-weight: 700;
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        input[type="file"],
        button,
        textarea {
            width: 100%;
            padding: 10px 14px;
            margin-bottom: 20px;
            border: 1.5px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="file"]:focus,
        textarea:focus {
            outline: none;
            border-color: #007BFF;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        button {
            background-color: #007BFF;
            color: white;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 6px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            padding: 12px 16px;
            margin-bottom: 25px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            text-align: center;
        }

        .error {
            background-color: #fdd;
            border: 1px solid #f99;
            color: #900;
        }

        .success {
            background-color: #dfd;
            border: 1px solid #9c9;
            color: #060;
        }

        li a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        li a:hover,
        li a:focus {
            background-color: #0056b3;
            outline: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Upload Devotion</h2>

        <?php if ($errorMessage): ?>
            <div class="message error"><?php echo htmlspecialchars($errorMessage); ?></div>
        <?php elseif ($successMessage): ?>
            <div class="message success"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php endif; ?>

        <form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
            <label for="topic">Devotion Topic:</label>
            <input type="text" name="topic" id="topic" required />

            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required />

            <label for="image">Devotion Cover Image:</label>
            <input type="file" name="image" id="image" accept="image/*" required />

            <button type="submit">Upload Devotion</button>
        </form>
        <li><a href="dashboardForm.php">Return to Dashboard</a></li>
    </div>
</body>

</html>