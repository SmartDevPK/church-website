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
                        <?php echo $counts['devotion']; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="#" data-page="devotionals">
                    <i class="fas fa-book-open"></i> Devotionals
                    <span class="badge bg-primary">
                        <?php echo $counts['devotions']; ?>
                    </span>
                </a>
            </li>

            <li>
                <a href="#" data-page="prayer-requests">
                    <i class="fas fa-pray"></i> Prayer Requests
                    <span class="badge bg-danger">
                        <?php echo $counts['prayer_requests']; ?>

                    </span>
                </a>
            </li>
            <li>
                <a href="#" data-page="testimonies">
                    <i class="fas fa-comment-alt"></i> Testimonies
                    <span class="badge bg-success">
                        <?php echo $counts['testimonies']; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="#" data-page="subscribers">
                    <i class="fas fa-users"></i> Subscribers
                    <span class="badge bg-success">
                        <?php echo $counts['subscribers']; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="#" data-page="comments">
                    <i class="fas fa-comments"></i> Comments
                    <span class="badge bg-success">
                        <?php echo $counts['comments']; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
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
        <div class="page-content active " id="dashboard-page">
            <div class="container-fluid mt-4">
                <h4 class="mb-4">Dashboard Overview</h4>


                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-book-open text-primary"></i>
                                <h2><?php echo $counts['devotion']; ?></h2>
                                <p>Devotionals</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-book-open text-primary"></i>
                                <h2><?php echo $counts['devotions']; ?></h2>
                                <p>Devotionals</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-pray text-danger"></i>
                                <h2><?php echo $counts['prayer_requests']; ?></h2>
                                <p>Prayer Requests</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-comment-alt text-warning"></i>
                                <h2><?php echo $counts['comments']; ?></h2>
                                <p>Testimonies</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-users text-success"></i>
                                <h2><?php echo $counts['subscribers']; ?></h2>
                                <p>Subscribers</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Devotionals -->
                <h1>FRONT PAGE </h1>

                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
                <?php endif; ?>

                <?php if ($successMessage): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
                <?php endif; ?>

                <!-- Recent devotionals table -->
                <div class="dashboard-card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Recent FRONT PAGE</span>
                        <button class="btn btn-sm btn-primary" id="add-devotional-btn">Add New</button>
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
                                    <?php if (count($devotion) > 0): ?>
                                        <?php foreach ($devotion as $dev): ?>
                                            <tr>
                                                <td><img src="<?= htmlspecialchars($dev['image_path']) ?>"
                                                        style="width:50px; height:50px;" /></td>
                                                <td><?= htmlspecialchars($dev['topic']) ?></td>
                                                <td><?= date("F j, Y", strtotime($dev['date'])) ?></td>
                                                <td>
                                                    <!-- Actions: edit and delete buttons (not implemented yet) -->
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <a href="edit_devotional.php?id=<?php echo $dev['id']; ?>"
                                                            style="text-decoration:none; color:inherit;">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </button>
                                                    <form method="POST" action="delete_devotional.php"
                                                        style="display:inline-block;">
                                                        <input type="hidden" name="id" value="<?php echo $dev['id']; ?>">
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

                <!-- Add devotional form - hidden by default -->
                <div id="add-devotional-form" style="display:none;">
                    <h2>Add New Devotional</h2>
                    <form action="add_devotional.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="topic" class="form-label">Title / Topic</label>
                            <input type="text" class="form-control" name="topic" id="topic" required />
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="date" required />
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Cover Image</label>
                            <input type="file" class="form-control" name="image" id="image" accept="image/*" required />
                        </div>
                        <button type="submit" class="btn btn-success">Save Devotional</button>
                        <button type="button" class="btn btn-secondary" id="cancel-add">Cancel</button>
                    </form>
                </div>

            </div>

            <!-- Recent Activity -->
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div class="card-header">

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
                    <i class="fas fa-plus"></i> Add New Devotional
                </button>
            </div>

            <!-- Devotionals Table -->
            <div class="dashboard-card">
                <div class="card-header">
                    <span>All Devotionals</span>
                    <div class="input-group" style="width: 300px;">

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
                                <?php if ($result && $result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td>
                                                <?php
                                                $imagePath = !empty($row['image']) ? $row['image'] : 'default-image.jpg';
                                                ?>
                                                <img src="<?= htmlspecialchars($imagePath) ?>" alt="Cover Image"
                                                    style="width:50px; height:50px;" />
                                            </td>
                                            <td><?= htmlspecialchars($row['title'] ?? '') ?></td>
                                            <td><?= isset($row['devotion_date']) ? date("F j, Y", strtotime($row['devotion_date'])) : '' ?>
                                            </td>
                                            <td><?= htmlspecialchars($row['excerpt'] ?? '') ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <a href="edit_devotional.php?id=<?= $row['id'] ?? '' ?>"
                                                        style="text-decoration:none; color:inherit;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </button>
                                                <form method="POST" action="delete_devotional.php"
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

            <div class="form-container">
                <form id="devotional-form" action="save_devotional.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" required </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea name="excerpt" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="devotional_date">Date</label>
                            <input type="date" name="devotional_date" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Cover Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" name="submit" class="btn btn-primary">Publish Devotional</button>

                </form>
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

    <!-- Other pages would follow the same pattern -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('main-content').classList.toggle('active');
        });

        // Page navigation
        document.querySelectorAll('.sidebar-menu a').forEach(link => {
            link.addEventListener('click', function (e) {

                // Remove active class from all links
                document.querySelectorAll('.sidebar-menu a').forEach(item => {
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
                document.getElementById(pageId).classList.add('active');
            });
        });

        // Devotional form navigation
        document.getElementById('add-devotional-btn').addEventListener('click', function (e) {
            document.getElementById('devotionals-page').classList.remove('active');
            document.getElementById('edit-devotional-page').classList.add('active');
            document.getElementById('devotional-form-title').textContent = 'Add New Devotional';
        });

        document.getElementById('new-devotional-btn').addEventListener('click', function (e) {
            document.getElementById('devotionals-page').classList.remove('active');
            document.getElementById('edit-devotional-page').classList.add('active');
            document.getElementById('devotional-form-title').textContent = 'Add New Devotional';
        });

        document.getElementById('back-to-devotionals').addEventListener('click', function (e) {
            document.getElementById('edit-devotional-page').classList.remove('active');
            document.getElementById('devotionals-page').classList.add('active');
        });

        // Cover image preview
        document.getElementById('cover-image-upload').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const preview = document.getElementById('cover-image-preview');
                    const placeholder = document.getElementById('cover-placeholder');

                    preview.src = event.target.result;
                    preview.style.display = 'block';
                    placeholder.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });

        // Form submission (would be connected to backend in production)
        document.getElementById('devotional-form').addEventListener('submit', function (e) {
            alert('Devotional saved successfully!');
            document.getElementById('edit-devotional-page').classList.remove('active');
            document.getElementById('devotionals-page').classList.add('active');
        });
        // Show the add devotional form on button click
        document.getElementById('add-devotional-btn').addEventListener('click', function () {
            document.querySelector('.dashboard-card').style.display = 'none'; // hide table
            document.getElementById('add-devotional-form').style.display = 'block'; // show form
        });

        // Cancel add devotional, show the table again
        document.getElementById('cancel-add').addEventListener('click', function () {
            document.getElementById('add-devotional-form').style.display = 'none';
            document.querySelector('.dashboard-card').style.display = 'block';
        });
    </script>
</body>

</html>