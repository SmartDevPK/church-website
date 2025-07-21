<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Devotion - The Anchor Devotional</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Global Variables and Reset */
        :root {
            --primary: #ad3128;
            /* Maroon as primary */
            --secondary: #2c3e50;
            /* Blue for buttons */
            --accent: #2c3e50;
            /* Blue as accent */
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-main);
            line-height: 1.6;
            color: var(--text);
            background-color: #fff;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* Header & Navigation */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: var(--shadow);
            z-index: 1000;
            transition: var(--transition);
        }

        .header-scrolled {
            background-color: rgba(255, 255, 255, 0.98);
            padding: 10px 0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo span {
            color: var(--secondary);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary);
            bottom: -5px;
            left: 0;
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
        }

        /* Utility Classes */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 14px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            text-align: center;
            cursor: pointer;
            border: none;
            font-size: 1rem;
            box-shadow: var(--shadow);
        }

        .btn-primary {
            background-color: var(--secondary);
            color: white;
            border: 2px solid var(--secondary);
        }

        .btn-primary:hover {
            background-color: transparent;
            color: var(--secondary);
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        /* Devotion Header */
        .devotion-header {
            position: relative;
            height: 70vh;
            min-height: 500px;
            margin-top: 80px;
            overflow: hidden;
            border-radius: 0 0 20px 20px;
            box-shadow: var(--shadow-lg);
        }

        .devotion-header-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .devotion-header:hover .devotion-header-image {
            transform: scale(1.03);
        }

        .devotion-header-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 40px;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
        }

        .devotion-header-title {
            font-size: 3rem;
            margin-bottom: 15px;
            font-family: var(--font-heading);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .devotion-header-date {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .devotion-header-date i {
            color: var(--primary);
        }

        /* Devotion Content */
        .devotion-content-container {
            padding: 80px 0;
        }

        .devotion-content {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            position: relative;
            top: -50px;
            margin-bottom: -50px;
        }

        .devotion-verse {
            font-style: italic;
            margin-bottom: 40px;
            color: var(--primary);
            font-weight: 500;
            font-size: 1.4rem;
            border-left: 5px solid var(--primary);
            padding-left: 30px;
            line-height: 1.8;
        }

        .devotion-text {
            margin-bottom: 40px;
            line-height: 1.8;
            font-size: 1.1rem;
            color: var(--text);
        }

        .devotion-text p {
            margin-bottom: 25px;
        }

        .devotion-text h3 {
            font-family: var(--font-heading);
            color: var(--primary);
            margin: 40px 0 20px;
            font-size: 1.6rem;
        }

        .devotion-text blockquote {
            border-left: 4px solid var(--secondary);
            padding-left: 20px;
            margin: 30px 0;
            font-style: italic;
            color: var(--text-light);
        }

        /* Devotion Actions */
        .devotion-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid #eee;
            flex-wrap: wrap;
            gap: 20px;
        }

        .download-btn {
            background-color: var(--success);
            color: white;
            padding: 14px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--shadow);
        }

        .download-btn:hover {
            background-color: #219653;
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .social-share {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .social-share span {
            font-weight: 500;
        }

        .social-share a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background-color: #f5f5f5;
            border-radius: 50%;
            color: var(--dark);
            transition: var(--transition);
        }

        .social-share a:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        /* More Devotions */
        .more-devotions {
            text-align: center;
            padding: 60px 0;
        }

        .more-devotions h2 {
            font-family: var(--font-heading);
            color: var(--primary);
            margin-bottom: 30px;
            font-size: 2rem;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 60px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background-color: var(--primary);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #bbb;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            transition: var(--transition);
        }

        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #bbb;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .devotion-header {
                height: 60vh;
            }

            .devotion-header-title {
                font-size: 2.5rem;
            }

            .devotion-content {
                padding: 40px;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background-color: white;
                flex-direction: column;
                align-items: center;
                padding: 40px 0;
                transition: var(--transition);
                box-shadow: var(--shadow);
            }

            .nav-links.active {
                left: 0;
            }

            .nav-links li {
                margin: 15px 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .devotion-header {
                height: 50vh;
                min-height: 400px;
            }

            .devotion-header-title {
                font-size: 2rem;
            }

            .devotion-header-content {
                padding: 30px;
            }

            .devotion-content {
                padding: 30px 20px;
                top: -30px;
                margin-bottom: -30px;
            }

            .devotion-verse {
                font-size: 1.2rem;
                padding-left: 20px;
            }

            .devotion-actions {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 576px) {
            .devotion-header {
                height: 40vh;
                min-height: 300px;
            }

            .devotion-header-title {
                font-size: 1.8rem;
            }

            .devotion-header-date {
                font-size: 1rem;
            }

            .devotion-content {
                padding: 25px 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
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
                    <li><a href="about.php">About</a></li>
                    <li><a href="#subscribe">Subscribe</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <?php
    $host = "localhost";
    $port = 3307;
    $username = "root";
    $password = "";
    $database = "prayer_db";

    $conn = new mysqli($host, $username, $password, $database, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the latest devotion
    $result = $conn->query("SELECT * FROM devotion ORDER BY id DESC LIMIT 1");
    $devotion = $result->fetch_assoc();
    $conn->close();
    ?>


    <div class="devotion-header" data-aos="fade-in">
        <img src="<?= htmlspecialchars($devotion['image_path']) ?>" alt="Today's Devotion"
            class="devotion-header-image">
        <div class="devotion-header-content">
            <h1 class="devotion-header-title">
                <?= htmlspecialchars($devotion['topic']) ?>
            </h1>
            <div class="devotion-header-date">
                <i class="fas fa-calendar-alt"></i>
                <span>
                    The Anchor - <?= date("F j, Y", strtotime($devotion['date'])) ?>
                </span>
            </div>
            <a href="download/devotionals.pdf" class="download-btn" download>
                <i class="fas fa-download"></i> Download PDF
            </a>
        </div>
    </div>

    <!-- Devotion Content -->
    <div class="devotion-content-container">
        <div class="container">
            <div class="devotion-content" data-aos="fade-up">
                <p class="devotion-verse">
                    "Blessed is the man that trusteth in the Lord, and whose hope the Lord is. For he shall be as a tree
                    planted by the waters, and that spreadeth out her roots by the river, and shall not see (FEAR) when
                    heat cometh, but her leaf shall be green; and shall not be careful (WORRIED) in the year of drought,
                    neither shall cease from yielding fruit."
                    <br><br>
                    - Jeremiah 17:7-8
                </p>

                <div class="devotion-text">
                    <p>Heat in the Bible and in life generally signifies trouble, hardship, suffering, adversity, and
                        trials. Just as physical heat can be uncomfortable and even dangerous, the "heat" of life's
                        challenges can test our faith, patience, and endurance. But God's Word provides us with powerful
                        truths to not only survive but thrive during these seasons of intensity.</p>

                    <h3>Understanding the Nature of Heat</h3>

                    <p>In our opening passage, Jeremiah paints a vivid picture of contrasting responses to heat. The
                        person who trusts in the Lord is compared to a tree planted by water - stable, nourished, and
                        fruitful even in drought. In contrast, those who trust in human strength are like shrubs in the
                        desert, struggling to survive when heat comes.</p>

                    <blockquote>
                        "Thou shalt be hid from the scourge of the tongue: neither shalt thou be afraid of destruction
                        when it cometh." (Job 5:21)
                    </blockquote>

                    <p>This promise reminds us that God's protection extends even to the verbal attacks and criticisms
                        we might face (the "scourge of the tongue"). The heat of slander, gossip, or false accusation
                        can be just as painful as physical hardship, but God promises to hide us from its full effect.
                    </p>

                    <h3>The Purpose of Heat in Our Lives</h3>

                    <p>While heat is uncomfortable, it serves important purposes both in nature and in our spiritual
                        lives:</p>

                    <p><strong>1. Refining:</strong> Just as fire purifies gold, heat in our lives can refine our
                        character. Peter writes, "That the trial of your faith, being much more precious than of gold
                        that perisheth, though it be tried with fire, might be found unto praise and honour and glory at
                        the appearing of Jesus Christ" (1 Peter 1:7).</p>

                    <p><strong>2. Strengthening:</strong> Difficulties develop spiritual muscles we never knew we had.
                        Paul testified, "When I am weak, then am I strong" (2 Corinthians 12:10), because God's power is
                        perfected in our weakness.</p>

                    <p><strong>3. Revealing:</strong> Heat reveals what's really in our hearts. When the pressure is on,
                        our true spiritual condition becomes apparent. This allows us to address areas that need growth.
                    </p>

                    <h3>Biblical Examples of Surviving Heat</h3>

                    <p>The Bible is full of examples of godly people who endured intense heat:</p>

                    <p><strong>Joseph:</strong> Betrayed by his brothers, falsely accused, and forgotten in prison,
                        Joseph endured years of heat before God elevated him to save his family and Egypt (Genesis
                        37-50).</p>

                    <p><strong>David:</strong> Anointed as king but then hunted by Saul for years, David learned to
                        trust God in caves and wilderness places (1 Samuel 18-31).</p>

                    <p><strong>Daniel:</strong> Facing the literal heat of a fiery furnace, Daniel's friends emerged
                        without even the smell of smoke (Daniel 3).</p>

                    <p>Each of these examples shows us that heat doesn't have to destroy us - it can prepare us for
                        greater things if we respond with faith.</p>

                    <h3>Practical Steps for Surviving Heat</h3>

                    <p>When you find yourself in a season of heat, consider these biblical strategies:</p>

                    <p><strong>1. Stay Rooted in God's Word:</strong> Regular scripture reading anchors your soul in
                        truth when emotions are turbulent. "Thy word is a lamp unto my feet, and a light unto my path"
                        (Psalm 119:105).</p>

                    <p><strong>2. Maintain Consistent Prayer:</strong> Prayer is our lifeline to God's power and peace.
                        "Be careful for nothing; but in every thing by prayer and supplication with thanksgiving let
                        your requests be made known unto God" (Philippians 4:6).</p>

                    <p><strong>3. Fellowship with Believers:</strong> Isolation makes heat more intense. "Not forsaking
                        the assembling of ourselves together... but exhorting one another" (Hebrews 10:25).</p>

                    <p><strong>4. Look for Growth Opportunities:</strong> Ask, "What is God teaching me through this?"
                        rather than just "When will this end?"</p>

                    <p><strong>5. Remember God's Faithfulness:</strong> Recalling past deliverances builds faith for
                        current challenges. "This I recall to my mind, therefore have I hope" (Lamentations 3:21).</p>

                    <h3>The Promise of Fruitfulness</h3>

                    <p>Notice that Jeremiah's promise isn't just survival - it's fruitfulness. The tree by the water
                        "shall not cease from yielding fruit." God's purpose in allowing heat is never destruction but
                        productivity. As we abide in Christ (John 15:5), even difficult seasons can produce spiritual
                        fruit that blesses others and glorifies God.</p>

                    <p>Today, if you're feeling the heat, remember that your roots can go deeper into God's love and
                        faithfulness. The same power that brought Jesus through the ultimate "heat" of the cross is
                        available to sustain you. Your current trial is preparing you for greater usefulness in God's
                        kingdom.</p>

                    <p>As the old hymn says: "When through fiery trials thy pathway shall lie, my grace, all sufficient,
                        shall be thy supply; the flame shall not hurt thee; I only design thy dross to consume and thy
                        gold to refine."</p>
                </div>

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

    <!-- More Devotions -->
    <div class="more-devotions">
        <div class="container">
            <h2 data-aos="fade-up">Explore More Devotions</h2>
            <a href="past-devotions.php" class="btn btn-primary" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-book-open"></i> View Past Devotions
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column" data-aos="fade-up">
                    <h3>The Anchor</h3>
                    <p>A daily devotional ministry committed to helping believers grow in their relationship with God
                        through Scripture meditation and prayer.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column" data-aos="fade-up" data-aos-delay="100">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="devotions.php">Devotions</a></li>
                        <li><a href="prayer.php">Prayer</a></li>
                        <li><a href="testimonies.php">Testimonies</a></li>
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