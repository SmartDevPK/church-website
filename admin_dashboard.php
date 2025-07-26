<?php
include 'db.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);// Assuming db.php contains the database connection code

$conn = new mysqli("localhost", "root", "", "prayer_db", 3307);
$result = $conn->query("SELECT * FROM testimonies_pending WHERE status = 'pending' ORDER BY date DESC");
?>

<h2>Pending Testimonies</h2>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Initials</th>
        <th>Message</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['initials'] ?></td>
            <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
            <td>
                <a href="approve_testimony.php?admin_approve=1&token=<?= $row['approval_token'] ?>">Approve</a> |
                <a href="reject_testimony.php?token=<?= $row['approval_token'] ?>">Reject</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>