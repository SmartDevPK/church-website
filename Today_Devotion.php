<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Database connection
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title'] ?? '');
    $verse = $conn->real_escape_string($_POST['verse'] ?? '');
    $content = $conn->real_escape_string($_POST['content'] ?? '');

    $sql = "INSERT INTO today_Devotion (title, verse, content) VALUES ('$title', '$verse', '$content')";
    if ($conn->query($sql)) {
        $success = "Devotional added successfully!";
        // Refresh to show the new devotional
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $error = "Error: " . $conn->error;
    }
}

// Get the latest devotion
$sql = "SELECT * FROM today_Devotion ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $devotion = $result->fetch_assoc();
} else {
    $devotion = [
        'title' => 'No Devotional Found',
        'verse' => '',
        'content' => 'Please add today\'s devotional.'
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Devotional</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #4a6fa5;
            --secondary: #166088;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #28a745;
            --danger: #dc3545;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        h1,
        h2,
        h3 {
            font-family: 'Merriweather', serif;
            color: var(--secondary);
        }

        h2 {
            margin-bottom: 30px;
            text-align: center;
            font-size: 2rem;
        }

        .alert {
            padding: 15px;
            margin-bottom: 25px;
            border-radius: var(--border-radius);
            font-size: 16px;
            text-align: center;
        }

        .alert-success {
            background-color: #e6f7ee;
            color: var(--success);
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #fce8e8;
            color: var(--danger);
            border: 1px solid #f5c6cb;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--secondary);
            font-size: 1.1rem;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            transition: var(--transition);
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.2);
        }

        textarea {
            min-height: 150px;
            resize: vertical;
            line-height: 1.8;
        }

        button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            display: block;
            width: 100%;
            font-weight: 600;
            margin-top: 20px;
        }

        button:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
        }

        .preview-section {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid #eee;
        }

        .preview-title {
            color: var(--secondary);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .preview-verse {
            font-style: italic;
            color: #555;
            margin-bottom: 20px;
            font-size: 1.1rem;
            padding-left: 15px;
            border-left: 3px solid var(--primary);
        }

        .preview-content {
            line-height: 1.8;
            font-size: 1.05rem;
            white-space: pre-line;
        }

        @media (max-width: 768px) {
            .container {
                padding: 25px;
                margin: 20px auto;
            }

            h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add Today's Devotional</h2>

        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="verse">Bible Verse</label>
                <textarea id="verse" name="verse" required></textarea>
            </div>

            <div class="form-group">
                <label for="content">Devotional Content</label>
                <textarea id="content" name="content" required></textarea>
            </div>

            <button type="submit">Save Devotional</button>
        </form>

        <div class="preview-section">
            <h3 class="preview-title">Latest Devotional</h3>
            <h4><?= htmlspecialchars($devotion['title']) ?></h4>
            <p class="preview-verse"><?= htmlspecialchars($devotion['verse']) ?></p>
            <div class="preview-content"><?= nl2br(htmlspecialchars($devotion['content'])) ?></div>
        </div>
    </div>
</body>

</html>

<?php
$conn->close();
?>