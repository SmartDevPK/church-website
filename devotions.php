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

            <div class="devotions-grid">
                <!-- Devotion Card 1 -->
                <div class="devotion-card">
                    <img src="Untitled design.png" alt="Devotion Cover" class="devotion-image">
                    <div class="devotion-content">
                        <div class="devotion-date">June 5, 2025</div>
                        <h3 class="devotion-title">Surviving the HEAT</h3>
                        <p class="devotion-excerpt">Heat in the Bible and in life generally signifies trouble, hardship,
                            suffering, adversity, and trails...</p>
                        <a href="todays-devotion.php" class="read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Devotion Card 2 -->
                <div class="devotion-card">
                    <img src="Untitled design.png" alt="Devotion Cover" class="devotion-image">
                    <div class="devotion-content">
                        <div class="devotion-date">June 4, 2025</div>
                        <h3 class="devotion-title">The Peace of God</h3>
                        <p class="devotion-excerpt">In a world filled with anxiety and uncertainty, God offers us a
                            peace that surpasses all understanding...</p>
                        <a href="#" class="read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Devotion Card 3 -->
                <div class="devotion-card">
                    <img src="Untitled design.png" alt="Devotion Cover" class="devotion-image">
                    <div class="devotion-content">
                        <div class="devotion-date">June 3, 2025</div>
                        <h3 class="devotion-title">Walking in Faith</h3>
                        <p class="devotion-excerpt">Faith is not the absence of doubt, but the decision to trust God
                            even when circumstances seem impossible...</p>
                        <a href="#" class="read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Devotion Card 4 -->
                <div class="devotion-card">
                    <img src="Untitled design.png" alt="Devotion Cover" class="devotion-image">
                    <div class="devotion-content">
                        <div class="devotion-date">June 2, 2025</div>
                        <h3 class="devotion-title">The Power of Prayer</h3>
                        <p class="devotion-excerpt">Prayer is not just asking God for things, but aligning our hearts
                            with His will and purposes...</p>
                        <a href="#" class="read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Devotion Card 5 -->
                <div class="devotion-card">
                    <img src="devotion-5.jpg" alt="Devotion Cover" class="devotion-image">
                    <div class="devotion-content">
                        <div class="devotion-date">June 1, 2025</div>
                        <h3 class="devotion-title">God's Unfailing Love</h3>
                        <p class="devotion-excerpt">No matter what we've done or where we've been, God's love remains
                            constant and unchanging...</p>
                        <a href="#" class="read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Devotion Card 6 -->
                <div class="devotion-card">
                    <img src="devotion-6.jpg" alt="Devotion Cover" class="devotion-image">
                    <div class="devotion-content">
                        <div class="devotion-date">May 31, 2025</div>
                        <h3 class="devotion-title">Finding Strength in Weakness</h3>
                        <p class="devotion-excerpt">When we are weak, then we are strong, because God's power is made
                            perfect in our weakness...</p>
                        <a href="#" class="read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

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