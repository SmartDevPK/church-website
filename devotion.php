<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

// DB connection parameters
$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

// Connect to DB
$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch devotions ordered by date descending
$sql = "SELECT * FROM devotion ORDER BY date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Daily Devotions</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9f9f9;
            padding: 40px;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .devotion-card {
            background: #fff;
            border-radius: 8px;
            margin-bottom: 25px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease;
        }

        .devotion-card:hover {
            transform: scale(1.01);
        }

        .devotion-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 15px;
            display: block;
        }

        .devotion-card h3 {
            color: #007BFF;
            margin-bottom: 10px;
        }

        .devotion-date {
            font-size: 14px;
            color: #888;
            margin-bottom: 15px;
        }

        .pdf-link {
            display: inline-block;
            margin-top: 10px;
            color: #28a745;
            text-decoration: none;
            font-weight: bold;
        }

        .pdf-link:hover {
            text-decoration: underline;
        }

        .no-data {
            text-align: center;
            color: #888;
            font-size: 18px;
        }

        .delete-button {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 15px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #c82333;
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
        }

        li a:hover,
        li a:focus {
            background-color: #0056b3;
            outline: none;
        }

        .footer-link {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Daily Devotions</h1>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="devotion-card">
                    <?php if (!empty($row['image_path'])): ?>
                        <img class="devotion-image" src="<?= htmlspecialchars($row['image_path']) ?>" alt="Devotion Image" />
                    <?php endif; ?>

                    <h3><?= htmlspecialchars($row['topic']) ?></h3>

                    <?php if (!empty($row['date'])): ?>
                        <div class="devotion-date"><?= htmlspecialchars(date("F j, Y", strtotime($row['date']))) ?></div>
                    <?php endif; ?>

                    <?php if (!empty($row['pdf_path'])): ?>
                        <a class="pdf-link" href="<?= htmlspecialchars($row['pdf_path']) ?>" target="_blank">
                            Download PDF &raquo;
                        </a>
                    <?php endif; ?>

                    <!-- Delete Form -->
                    <form method="POST" action="delete_devotion.php"
                        onsubmit="return confirm('Are you sure you want to delete this devotion?');">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>" />
                        <button type="submit" class="delete-button">Delete</button>
                        <a href="update_devotion.php?id=<?= urlencode($row['id']) ?>"
                            style="display: inline-block; padding: 8px 15px; background: #007BFF; color: #fff; border-radius: 4px; text-decoration: none; font-weight: bold;">
                            Update
                        </a>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-data">No devotions found.</p>
        <?php endif; ?>

        <?php $conn->close(); ?>

        <div class="footer-link">
            <li><a href="dashboardForm.php">Return to Dashboard</a></li>
        </div>
    </div>
</body>

</html>