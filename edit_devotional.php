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

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: {$conn->connect_error}");
}

// Check if ID is provided
if (!isset($_GET['id'])) {
    die("No devotional ID provided.");
}

$id = intval($_GET['id']);

// Fetch the devotional to edit
$stmt = $conn->prepare("SELECT id, topic, date, image_path, pdf_path FROM devotion WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$devotional = $result->fetch_assoc();
$stmt->close();

if (!$devotional) {
    die("Devotional not found.");
}

$error = '';

// Process update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $topic = trim($_POST['topic'] ?? '');
    $date = trim($_POST['date'] ?? '');

    // Simple validation
    if (empty($topic) || empty($date)) {
        $error = "Topic and Date are required.";
    } else {
        $stmt_update = $conn->prepare("UPDATE devotion SET topic = ?, date = ? WHERE id = ?");
        $stmt_update->bind_param("ssi", $topic, $date, $id);

        if ($stmt_update->execute()) {
            $stmt_update->close();
            $conn->close();
            // Redirect after successful update
            header("Location: dashboard.php?message=updated");
            exit();
        } else {
            $error = "Error updating devotional: {$stmt_update->error}";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Devotional</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }

        form {
            max-width: 500px;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 1rem;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            box-sizing: border-box;
        }

        .error {
            color: red;
            margin-top: 1rem;
        }

        .current-files {
            margin-top: 1rem;
            font-style: italic;
            color: #555;
        }

        button {
            margin-top: 1.5rem;
            padding: 10px 20px;
            background-color: #007BFF;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3;
        }

        a.back-link {
            display: inline-block;
            margin-top: 1rem;
            color: #007BFF;
            text-decoration: none;
        }

        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <h1>Edit Devotional</h1>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="topic">Topic:</label>
        <input type="text" id="topic" name="topic" value="<?= htmlspecialchars($devotional['topic']) ?>" required />

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?= htmlspecialchars($devotional['date']) ?>" required />

        <div class="current-files">
            <?php if (!empty($devotional['image_path'])): ?>
                <div>Current Image: <a href="<?= htmlspecialchars($devotional['image_path']) ?>" target="_blank">View
                        Image</a></div>
            <?php else: ?>
                <div>No image uploaded.</div>
            <?php endif; ?>

            <?php if (!empty($devotional['pdf_path'])): ?>
                <div>Current PDF: <a href="<?= htmlspecialchars($devotional['pdf_path']) ?>" target="_blank">View PDF</a>
                </div>
            <?php else: ?>
                <div>No PDF uploaded.</div>
            <?php endif; ?>
        </div>

        <button type="submit">Update Devotional</button>
    </form>

    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>

</body>

</html>