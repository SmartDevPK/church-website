<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Select Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            text-align: center;
            padding-top: 80px;
        }

        h1 {
            color: #333;
        }

        .dashboard-options {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .dashboard-btn {
            padding: 15px 30px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .dashboard-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_email']); ?>!</h1>
    <p>Select the dashboard you want to access:</p>

    <div class="dashboard-options">
        <a href="admin_dashboard.php" class="dashboard-btn">Dashboard 1</a>
        <a href="DASHBOARD.php" class="dashboard-btn">Dashboard 2</a>
        <a href="prayer_requests.php" class="dashboard-btn">Prayer Request</a>
        <a href="devotion.php" class="dashboard-btn">Front Page </a>
        <a href="Devotions.php" class="dashboard-btn">Past Devotions</a>
        <a href="logout.php" class="dashboard-btn">Logout</a>



    </div>

</body>

</html>