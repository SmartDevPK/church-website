<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Devotions - The Anchor Devotional</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reuse the same CSS variables from main file */
        :root {
            --primary: #2c3e50;
            --secondary: #ad3128;
            --accent: #2c3e50;
            --light: #f8f9fa;
            --dark: #343a40;
            --success: #28a745;
            --warning: #ffc107;
            --font-main: 'Segoe UI', system-ui, -apple-system, sans-serif;
            --font-heading: 'Georgia', serif;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        /* Basic styles for the past devotions page */
        body {
            font-family: var(--font-main);
            line-height: 1.6;
            color: var(--dark);
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background-color: var(--primary);
            color: white;
            padding: 20px 0;
            box-shadow: var(--shadow);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .logo span {
            color: var(--secondary);
        }

        .back-btn {
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .back-btn:hover {
            color: var(--secondary);
        }

        main {
            padding: 60px 0;
        }

        .page-title {
            text-align: center;
            margin-bottom: 40px;
            color: var(--primary);
            font-family: var(--font-heading);
            position: relative;
        }

        .page-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--secondary);
            margin: 15px auto;
            border-radius: 2px;
        }

        .filter-section {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
        }

        .filter-title {
            margin-bottom: 20px;
            color: var(--primary);
        }

        .filter-form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--primary);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: var(--font-main);
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(173, 49, 40, 0.2);
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            text-align: center;
            cursor: pointer;
            border: none;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: var(--secondary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #8c2720;
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .devotions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .devotion-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .devotion-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .devotion-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .devotion-content {
            padding: 20px;
        }

        .devotion-date {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .devotion-title {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: var(--primary);
            font-family: var(--font-heading);
        }

        .devotion-excerpt {
            color: #495057;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .read-more {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .read-more:hover {
            text-decoration: underline;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 50px;
            gap: 10px;
        }

        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 5px;
            background-color: white;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .page-link:hover,
        .page-link.active {
            background-color: var(--secondary);
            color: white;
        }

        footer {
            background-color: var(--primary);
            color: white;
            padding: 30px 0;
            text-align: center;
        }

        @media (max-width: 768px) {
            .filter-form {
                flex-direction: column;
            }

            .devotions-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="index.php" class="logo">The <span>Anchor Devotional</span></a>
                <a href="index.php" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Back to Home
                </a>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <h1 class="page-title">Past Devotions</h1>

            <div class="filter-section">
                <h2 class="filter-title">Filter Devotions</h2>
                <form class="filter-form">
                    <div class="form-group">
                        <label for="month">Month</label>
                        <select id="month" class="form-control">
                            <option value="">All Months</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="year">Year</label>
                        <select id="year" class="form-control">
                            <option value="">All Years</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>


                    <div class="form-group" style="align-self: flex-end;">
                        <button type="submit" class="btn btn-primary">Filter Devotions</button>
                    </div>
                </form>
            </div>

            <?php
            // Enable error reporting
            error_reporting(E_ALL);
            ini_set("display_errors", 1);

            // Database connection settings
            $host = "localhost";
            $port = 3307;
            $username = "root";
            $password = "";
            $database = "prayer_db";

            try {
                // Connect to MySQL
                $conn = new mysqli($host, $username, $password, $database, $port);
                if ($conn->connect_error) {
                    throw new Exception("Connection failed: {$conn->connect_error}");
                }

                // Fetch devotions from database, ordered by date (newest first)
                $sql = "SELECT id, title, excerpt, devotion_date, image FROM devotions ORDER BY devotion_date DESC";
                $result = $conn->query($sql);

                $devotions = [];
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $devotions[] = $row;
                    }
                }

            } catch (Exception $e) {
                error_log("Database error: " . $e->getMessage());
                // You might want to show a user-friendly message
            } finally {
                if (isset($conn))
                    $conn->close();
            }
            ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Devotions</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
                <style>
                    .devotions-grid {
                        display: grid;
                        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                        gap: 20px;
                        padding: 20px;
                    }

                    .devotion-card {
                        border: 1px solid #e0e0e0;
                        border-radius: 8px;
                        overflow: hidden;
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                    }

                    .devotion-card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                    }

                    .devotion-image {
                        width: 100%;
                        height: 200px;
                        object-fit: cover;
                    }

                    .devotion-content {
                        padding: 15px;
                    }

                    .devotion-date {
                        color: #666;
                        font-size: 0.9rem;
                        margin-bottom: 8px;
                    }

                    .devotion-title {
                        margin: 0 0 10px 0;
                        color: #333;
                        font-size: 1.2rem;
                    }

                    .devotion-excerpt {
                        color: #555;
                        margin-bottom: 15px;
                        line-height: 1.5;
                    }

                    .read-more {
                        display: inline-flex;
                        align-items: center;
                        color: #0066cc;
                        text-decoration: none;
                        font-weight: 500;
                    }

                    .read-more i {
                        margin-left: 5px;
                        transition: transform 0.3s ease;
                    }

                    .read-more:hover i {
                        transform: translateX(3px);
                    }
                </style>
            </head>

            <body>
                <div class="devotions-grid">
                    <?php if (!empty($devotions)): ?>
                        <?php foreach ($devotions as $devotion): ?>
                            <div class="devotion-card">
                                <img src="<?= htmlspecialchars($devotion['image'] ?? 'default-devotion.jpg') ?>"
                                    alt="<?= htmlspecialchars($devotion['title']) ?>" class="devotion-image">
                                <div class="devotion-content">
                                    <div class="devotion-date">
                                        <?= date('F j, Y', strtotime($devotion['devotion_date'])) ?>
                                    </div>
                                    <h3 class="devotion-title"><?= htmlspecialchars($devotion['title']) ?></h3>
                                    <p class="devotion-excerpt"><?= htmlspecialchars($devotion['excerpt']) ?></p>
                                    <a href="todays-devotion.php?id=<?= $devotion['id'] ?>" class="read-more">
                                        Read More <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No devotions found. Please check back later.</p>
                    <?php endif; ?>
                </div>
            </body>

            </html>

            <div class="pagination">
                <a href="#" class="page-link"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <a href="#" class="page-link">4</a>
                <a href="#" class="page-link"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 The Anchor Devotional. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Filter functionality would go here
        document.querySelector('.filter-form').addEventListener('submit', function (e) {
            e.preventDefault();
            // In a real implementation, this would filter the devotions
            // based on the selected month, year, and topic
            alert('Filtering devotions... (This would be connected to a backend in a real implementation)');
        });
    </script>
</body>

</html>