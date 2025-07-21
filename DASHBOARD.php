<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

$message = "";

// Create database connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = basename($_FILES['image']['name']);
        $tmpName = $_FILES['image']['tmp_name'];
        $uploadDir = "uploads/";
        $folder = $uploadDir . $imageName;

        if (!move_uploaded_file($tmpName, $folder)) {
            die("Failed to upload image.");
        }

        $title = $_POST['title'] ?? '';
        $devotion_date = $_POST['devotion_date'] ?? '';
        $excerpt = $_POST['excerpt'] ?? '';
        $read_more_link = $_POST['read_more_link'] ?? '';

        $stmt = $conn->prepare("INSERT INTO devotions (image, title, devotion_date, excerpt, read_more_link) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sssss", $imageName, $title, $devotion_date, $excerpt, $read_more_link);

        if ($stmt->execute()) {
            $message = "Devotion added successfully.";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "Image upload error.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Devotion</title>
    <style>
        /* Basic Reset */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f7f9fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 40px;
            color: #333;
        }

        .container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
            color: #555;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="file"],
        form textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1.5px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        form input[type="text"]:focus,
        form input[type="date"]:focus,
        form input[type="file"]:focus,
        form textarea:focus {
            border-color: #2980b9;
            outline: none;
        }

        form textarea {
            resize: vertical;
            min-height: 80px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2980b9;
            color: white;
            font-size: 16px;
            font-weight: 700;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #1c5980;
        }

        .message {
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: 600;
            text-align: center;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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

        /* Remove default list styling and spacing for the single link */
        ul {
            list-style: none;
            padding: 0;
            margin: 20px 0 0 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add Devotion</h1>

        <?php if (!empty($message)): ?>
            <p class="message <?= strpos($message, 'Error') === false ? 'success' : 'error' ?>">
                <?= htmlspecialchars($message) ?>
            </p>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" required />

            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Devotion Title" required />

            <label for="devotion_date">Date</label>
            <input type="date" id="devotion_date" name="devotion_date" required />

            <label for="excerpt">Excerpt</label>
            <textarea id="excerpt" name="excerpt" placeholder="Excerpt..." required></textarea>

            <label for="read_more_link">Read More Link</label>
            <input type="text" id="read_more_link" name="read_more_link" placeholder="Read More Link" />

            <button type="submit">Add Devotion</button>
        </form>

        <ul>
            <li><a href="dashboardForm.php">Return to Dashboard</a></li>
        </ul>
    </div>
</body>

</html>