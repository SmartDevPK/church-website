<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Database connection
$host = "localhost";
$port = 3307;
$user = "root";
$pass = "";
$db = "prayer_db";

// Connect to database
$conn = new mysqli($host, $user, $pass, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get ID from URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input

    // Fetch devotion by ID
    $stmt = $conn->prepare("SELECT * FROM devotions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $devotion = $result->fetch_assoc();
    } else {
        echo "<h2>Devotional not found.</h2>";
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<h2>No devotional ID provided.</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title><?= htmlspecialchars($devotion['title']) ?> - Devotion</title>
    <link rel="stylesheet" href="styles.css"> <!-- Your CSS file -->
</head>

<body>
    <div class="container">
        <h1><?= htmlspecialchars($devotion['title']) ?></h1>
        <p><strong>Date:</strong> <?= date('F j, Y', strtotime($devotion['devotion_date'])) ?></p>
        <?php if (!empty($devotion['image'])): ?>
            <img src="<?= htmlspecialchars($devotion['image']) ?>" alt="Devotion Image"
                style="max-width: 100%; height: auto;">
        <?php endif; ?>
        <div>
            <p><?= nl2br(htmlspecialchars($devotion['excerpt'])) ?></p>
        </div>
        <a href="index.php" class="btn btn-primary">← Back to Devotions</a>
    </div>
</body>

</html>