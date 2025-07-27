<?php
// Database connection and data fetching at the top
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Database configuration
$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch devotion data
$devotion_id = $_GET['id'] ?? null;

if ($devotion_id) {
    $stmt = $conn->prepare("SELECT * FROM todayDevotions WHERE id = ?");
    $stmt->bind_param("i", $devotion_id);
} else {
    $stmt = $conn->prepare("SELECT * FROM todayDevotions ORDER BY created_at DESC LIMIT 1");
}

$stmt->execute();
$result = $stmt->get_result();
$devotion = $result->fetch_assoc();
$stmt->close();

if (!$devotion) {
    die("Devotional not found");
}

// Decode sections
$sections = json_decode($devotion['sections'], true) ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Devotion - The Anchor Devotional</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* CSS styles remain unchanged */
        :root {
            --primary: #ad3128;
            --secondary: #2c3e50;
            --accent: #2c3e50;
            --light: #f8f9fa;
            --dark: #212529;
            --text: #333;
            --text-light: #6c757d;
            --success: #28a745;
            --warning: #ffc107;
            --font-main: 'Segoe UI', system-ui, -apple-system, sans-serif;
            --font-heading: 'Georgia', serif;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 20px rgba(0, 0, 0, 0.15);
            --transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* Rest of your CSS styles... */
    </style>
</head>

<body>
    <!-- Header Section -->
    <header id="header">
        <div class="container">
            <nav>
                <a href="index.php" class="logo">The <span>Anchor Devotional</span></a>
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="nav-links" id="navLinks">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="devotions.php">Devotions</a></li>
                    <li><a href="prayer.php">Prayer</a></li>
                    <li><a href="testimonies.php">Testimonies</a></li>
                    <li><a href="comments.php">Comments</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="#subscribe">Subscribe</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Devotion Header with Image -->
    <div class="devotion-header" data-aos="fade-in">
        <img src="<?= htmlspecialchars($devotion['image_path'] ?? 'default-image.jpg') ?>" alt="Today's Devotion"
            class="devotion-header-image">
        <div class="devotion-header-content">
            <h1 class="devotion-header-title">
                <?= htmlspecialchars($devotion['topic'] ?? 'Daily Devotion') ?>
            </h1>
            <div class="devotion-header-date">
                <i class="fas fa-calendar-alt"></i>
                <span>
                    The Anchor - <?= date("F j, Y", strtotime($devotion['date'] ?? 'now')) ?>
                </span>
            </div>
            <a href="download/devotionals.pdf" class="download-btn" download>
                <i class="fas fa-download"></i> Download PDF
            </a>
        </div>
    </div>

    <!-- Main Devotion Content -->
    <div class="devotion-content-container">
        <div class="container">
            <div class="devotion-content" data-aos="fade-up">
                <p class="devotion-verse">
                    <?= nl2br(htmlspecialchars($devotion['verse_text'] ?? '')) ?>
                    <br><br>
                    <?= htmlspecialchars($devotion['verse_reference'] ?? '') ?>
                </p>

                <div class="devotion-text">
                    <p><?= nl2br(htmlspecialchars($devotion['introduction_text'] ?? '')) ?></p>

                    <!-- Dynamic Sections -->
                    <?php foreach ($sections as $section): ?>
                        <?php if (!empty($section['heading']) && !empty($section['content'])): ?>
                            <h3><?= htmlspecialchars($section['heading']) ?></h3>
                            <p><?= nl2br(htmlspecialchars($section['content'])) ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <!-- Devotion Actions -->
                <div class="devotion-actions">
                    <a href="download/devotionals.pdf" class="download-btn">
                        <i class="fas fa-download"></i> Download Full Devotional
                    </a>
                    <div class="social-share">
                        <span>Share this devotion:</span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- More Devotions Section -->
    <div class="more-devotions">
        <div class="container">
            <h2 data-aos="fade-up">Explore More Devotions</h2>
            <a href="past-devotions.php" class="btn btn-primary" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-book-open"></i> View Past Devotions
            </a>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column" data-aos="fade-up">
                    <h3>The Anchor</h3>
                    <p>A daily devotional ministry committed to helping believers grow in their relationship with God
                        through Scripture meditation and prayer.</p>
                    <div class="social-links">
                        <a href="https://www.facebook.com/share/16qPpevT47/?mibextid=wwXIfr"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/@gospelbelieversmissiongbm856?si=1daf735fcUE6uiao"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-column" data-aos="fade-up" data-aos-delay="100">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="devotions.php">Devotions</a></li>
                        <li><a href="prayer.php">Prayer</a></li>
                        <li><a href="testimonies.php">Testimonies</a></li>
                        <li><a href="comments.php">Comments</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>
                </div>

                <div class="footer-column" data-aos="fade-up" data-aos-delay="200">
                    <h3>Resources</h3>
                    <ul class="footer-links">
                        <li><a href="#">Bible Reading Plans</a></li>
                        <li><a href="#">Downloadable Devotionals</a></li>
                        <li><a href="#">Prayer Guides</a></li>
                        <li><a href="#">Bible Study Tools</a></li>
                    </ul>
                </div>

                <div class="footer-column" data-aos="fade-up" data-aos-delay="300">
                    <h3>Contact Us</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> Abuja, Nigeria</li>
                        <li><i class="fas fa-phone"></i> +234 812 345 6789</li>
                        <li><i class="fas fa-envelope"></i> info@theanchordevotional.com</li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                &copy; 2025 The Anchor Devotional. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- JavaScript Libraries and Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS animation library
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navLinks = document.getElementById('navLinks');

        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            mobileMenuBtn.innerHTML = navLinks.classList.contains('active') ?
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });

        // Close mobile menu when clicking a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
            });
        });

        // Header scroll effect
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        });

        // Initialize with header scrolled if page is not at top
        if (window.scrollY > 100) {
            header.classList.add('header-scrolled');
        }
    </script>
</body>

</html>
<?php
// Close database connection
$conn->close();
?>