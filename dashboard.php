<?php
include 'db.php';

$errorMessage = '';
$successMessage = '';
// Create separate queries for each table
$counts = [];

$tables = ['devotion', 'devotions', 'prayer_requests', 'testimonies', 'subscribers', 'comments'];

foreach ($tables as $table) {
    $query = "SELECT COUNT(*) AS total FROM $table";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $counts[$table] = $row['total'];
}

// Fetch recent devotionals (example: from 'devotion' table, limit 5)
$devotion = [];
$devotionQuery = "SELECT * FROM devotion ORDER BY date DESC LIMIT 5";
$devotionResult = $mysqli->query($devotionQuery);
if ($devotionResult && $devotionResult->num_rows > 0) {
    while ($row = $devotionResult->fetch_assoc()) {
        $devotion[] = $row;
    }
}

$sql = "SELECT id, title,  devotion_date, image, excerpt FROM devotions ORDER BY devotion_date DESC LIMIT 5";
$result = $mysqli->query($sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Anchor Devotional - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>The Anchor</h3>
            <small>Admin Dashboard</small>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="#" class="active" data-page="dashboard">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#" data-page="devotionals">
                    <i class="fas fa-book-open"></i> Devotionals
                    <span class="badge bg-primary">
                        <?php echo isset($counts['devotions']) ? $counts['devotions'] : 0; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="#" data-page="prayer-requests">
                    <i class="fas fa-pray"></i> Prayer Requests
                    <span class="badge bg-danger">
                        <?php echo isset($counts['prayer_requests']) ? $counts['prayer_requests'] : 0; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="#" data-page="testimonies">
                    <i class="fas fa-comment-alt"></i> Testimonies
                    <span class="badge bg-success">
                        <?php echo isset($counts['testimonies']) ? $counts['testimonies'] : 0; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="#" data-page="subscribers">
                    <i class="fas fa-users"></i> Subscribers
                    <span class="badge bg-success">
                        <?php echo isset($counts['subscribers']) ? $counts['subscribers'] : 0; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <!-- Top Navigation -->
        <div class="top-nav">
            <button class="btn btn-outline-secondary d-md-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Dashboard Page -->
        <div class="page-content active" id="dashboard-page">
            <div class="container-fluid mt-4">
                <h4 class="mb-4">Dashboard Overview</h4>

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-book-open text-primary"></i>
                                <h2><?php echo isset($counts['devotions']) ? $counts['devotions'] : 0; ?></h2>
                                <p>Devotionals</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-pray text-danger"></i>
                                <h2><?php echo isset($counts['prayer_requests']) ? $counts['prayer_requests'] : 0; ?>
                                </h2>
                                <p>Prayer Requests</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-comment-alt text-warning"></i>
                                <h2><?php echo isset($counts['comments']) ? $counts['comments'] : 0; ?></h2>
                                <p>Testimonies</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-users text-success"></i>
                                <h2><?php echo isset($counts['subscribers']) ? $counts['subscribers'] : 0; ?></h2>
                                <p>Subscribers</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Devotionals -->
                <?php if (isset($errorMessage)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
                <?php endif; ?>

                <?php if (isset($successMessage)): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
                <?php endif; ?>

                <!-- Recent devotionals table -->
                <div class="dashboard-card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Recent Devotionals</span>
                        <a href="AddDevotion.php" class="btn btn-sm btn-primary">Add New Devotional</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Cover</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($devotion) && count($devotion) > 0): ?>
                                        <?php foreach ($devotion as $dev): ?>
                                            <tr>
                                                <td><img src="<?= htmlspecialchars($dev['image_path'] ?? '') ?>"
                                                        style="width:50px; height:50px;" /></td>
                                                <td><?= htmlspecialchars($dev['topic'] ?? '') ?></td>
                                                <td><?= isset($dev['date']) ? date("F j, Y", strtotime($dev['date'])) : '' ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <a href="edit_devotional.php?id=<?php echo $dev['id'] ?? ''; ?>"
                                                            style="text-decoration:none; color:inherit;">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </button>
                                                    <form method="POST" action="delete_devotional.php"
                                                        style="display:inline-block;">
                                                        <input type="hidden" name="id" value="<?php echo $dev['id'] ?? ''; ?>">
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to delete this devotional?');">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">No devotionals found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Devotionals Page -->
        <div class="page-content" id="devotionals-page">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Manage Devotionals</h4>
                    <button class="btn btn-primary" id="new-devotional-btn">
                        <i class="fas fa-plus"></i> Add New Devo
                    </button>
                </div>

                <!-- Devotionals Table -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <span>All Devotionals</span>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search devotionals...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Cover</th>
                                        <th>Topic</th>
                                        <th>Date</th>
                                        <th>Excerpt</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($result) && $result->num_rows > 0): ?>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                            <tr>
                                                <td>
                                                    <?php $imagePath = !empty($row['image']) ? $row['image'] : 'default-image.jpg'; ?>
                                                    <img src="<?= htmlspecialchars($imagePath) ?>" alt="Cover Image"
                                                        style="width:50px; height:50px;" />
                                                </td>
                                                <td><?= htmlspecialchars($row['title'] ?? '') ?></td>
                                                <td><?= isset($row['devotion_date']) ? date("F j, Y", strtotime($row['devotion_date'])) : '' ?>
                                                </td>
                                                <td><?= htmlspecialchars($row['excerpt'] ?? '') ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <a href="edit_devotions.php?id=<?= $row['id'] ?? '' ?>"
                                                            style="text-decoration:none; color:inherit;">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </button>
                                                    <form method="POST" action="delete_devotions.php"
                                                        style="display:inline-block;">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?? '' ?>">
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to delete this devotional?');">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">No devotionals found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation" class="mt-3">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add/Edit Devotional Form -->
        <div class="page-content" id="edit-devotional-page">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 id="devotional-form-title">Add New Devotional</h4>
                    <button class="btn btn-outline-secondary" id="back-to-devotionals">
                        <i class="fas fa-arrow-left"></i> Back to Devotionals
                    </button>
                </div>

                <h2 class="mb-4">Add New Devotional</h2>

                <!-- Display error/success messages -->
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
                <?php endif; ?>
                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success">Devotional added successfully!</div>
                <?php endif; ?>

                <form action="save_devotional.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" </div>
                            <div class="col-md-6 mb-3">
                                <label for="excerpt">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="devotional_date">Date</label>
                            <input type="date" name="devotional_date" id="devotional_date" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="image">Cover Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                            <small class="text-muted">Only JPG, PNG, GIF allowed (Max 2MB)</small>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>

    </div>
    </div>


    <!-- Prayer Requests Page -->
    <div class="page-content" id="prayer-requests-page">
        <div class="container-fluid mt-4">
            <h4 class="mb-4">Prayer Requests</h4>

            <div class="dashboard-card">
                <div class="card-header">
                    <span>All Prayer Requests</span>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Search requests...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Request</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>john@example.com</td>
                                    <td class="text-truncate" style="max-width: 200px;">Pray for healing from
                                        chronic illness...</td>
                                    <td>June 5, 2023</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i
                                                class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-success"><i
                                                class="fas fa-check"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sarah Smith</td>
                                    <td>sarah@example.com</td>
                                    <td class="text-truncate" style="max-width: 200px;">Pray for my family's
                                        financial situation...</td>
                                    <td>June 4, 2023</td>
                                    <td><span class="badge bg-success">Prayed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i
                                                class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-success"><i
                                                class="fas fa-check"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonies Page -->
    <div class="page-content" id="testimonies-page">
        <div class="container-fluid mt-4">
            <h4 class="mb-4">Testimonies</h4>

            <div class="dashboard-card">
                <div class="card-header">
                    <span>All Testimonies</span>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Search testimonies...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Testimony</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John D.</td>
                                    <td class="text-truncate" style="max-width: 300px;">After praying with the
                                        devotional community, my mother's health improved miraculously...</td>
                                    <td>June 8, 2023</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i
                                                class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-danger"><i
                                                class="fas fa-ban"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sarah M.</td>
                                    <td class="text-truncate" style="max-width: 300px;">The devotional on
                                        Philippians 4:6-7 came exactly when I needed it...</td>
                                    <td>June 5, 2023</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i
                                                class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-success"><i
                                                class="fas fa-check"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscribers Page -->
    <div class="page-content" id="subscribers-page">
        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Subscribers</h4>
                <button class="btn btn-primary">
                    <i class="fas fa-download"></i> Export List
                </button>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <span>All Subscribers</span>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Search subscribers...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Join Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>user1@example.com</td>
                                    <td>John Doe</td>
                                    <td>May 15, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i
                                                class="fas fa-envelope"></i></button>
                                        <button class="btn btn-sm btn-outline-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>user2@example.com</td>
                                    <td>Sarah Smith</td>
                                    <td>April 28, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i
                                                class="fas fa-envelope"></i></button>
                                        <button class="btn btn-sm btn-outline-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation" class="mt-3">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- JavaScript Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Wait for DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Sidebar toggle functionality
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');

            if (sidebarToggle && sidebar && mainContent) {
                sidebarToggle.addEventListener('click', function () {
                    sidebar.classList.toggle('active');
                    mainContent.classList.toggle('active');
                });
            }

            // Page navigation
            const menuLinks = document.querySelectorAll('.sidebar-menu a[data-page]');
            menuLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    // Remove active class from all links
                    menuLinks.forEach(item => {
                        item.classList.remove('active');
                    });

                    // Add active class to clicked link
                    this.classList.add('active');

                    // Hide all pages
                    document.querySelectorAll('.page-content').forEach(page => {
                        page.classList.remove('active');
                    });

                    // Show selected page
                    const pageId = this.getAttribute('data-page') + '-page';
                    const targetPage = document.getElementById(pageId);
                    if (targetPage) {
                        targetPage.classList.add('active');
                    }
                });
            });

            // Devotional form navigation
            const newDevotionalBtn = document.getElementById('new-devotional-btn');
            const backToDevotionals = document.getElementById('back-to-devotionals');

            if (newDevotionalBtn) {
                newDevotionalBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.getElementById('devotionals-page').classList.remove('active');
                    document.getElementById('edit-devotional-page').classList.add('active');
                    document.getElementById('devotional-form-title').textContent = 'Add New Devotional';
                });
            }

            if (backToDevotionals) {
                backToDevotionals.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.getElementById('edit-devotional-page').classList.remove('active');
                    document.getElementById('devotionals-page').classList.add('active');
                });
            }

            // Form submission
            const devotionalForm = document.getElementById('devotional-form');
            if (devotionalForm) {
                devotionalForm.addEventListener('submit', function (e) {
                    e.preventDefault();
                    alert('Devotional saved successfully!');
                    document.getElementById('edit-devotional-page').classList.remove('active');
                    document.getElementById('devotionals-page').classList.add('active');
                    // In a real application, you would submit the form data to the server here
                });
            }
        });
    </script>
</body>

</html>