<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Database configuration
$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

// Create MySQLi connection
$mysqli = new mysqli($host, $username, $password, $database, $port);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Handle form submission for approval or rejection
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['testimony_id'], $_POST['action'])) {
    $testimony_id = (int) $_POST['testimony_id'];
    $action = $_POST['action'] === 'approve' ? 'approved' : 'rejected';

    $stmt = $mysqli->prepare("UPDATE testimonies SET status = ? WHERE id = ?");
    $stmt->bind_param('si', $action, $testimony_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to avoid form resubmission on refresh
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch all pending testimonies
$testimonies = [];
$sql = "SELECT id, name, initials, message, created_at, status FROM testimonies WHERE status = 'pending' ORDER BY created_at DESC";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $testimonies[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Approve Testimonies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <h2>Pending Testimonies</h2>
        <?php if (!empty($testimonies)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Initials</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($testimonies as $testimony): ?>
                        <tr>
                            <td><?= htmlspecialchars($testimony['name']) ?></td>
                            <td><?= htmlspecialchars($testimony['initials']) ?></td>
                            <td style="max-width: 400px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <?= htmlspecialchars($testimony['message']) ?>
                            </td>
                            <td><?= date('F j, Y', strtotime($testimony['created_at'])) ?></td>
                            <td>
                                <form method="POST" style="display:inline-block;">
                                    <input type="hidden" name="testimony_id" value="<?= $testimony['id'] ?>">
                                    <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">
                                        Approve
                                    </button>
                                </form>
                                <form method="POST" style="display:inline-block;">
                                    <input type="hidden" name="testimony_id" value="<?= $testimony['id'] ?>">
                                    <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">
                                        Reject
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No pending testimonies to review.</p>
        <?php endif; ?>
    </div>
</body>

</html>