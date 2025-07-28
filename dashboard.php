<?php
// MUST BE AT THE VERY TOP - NO WHITESPACE BEFORE THIS
session_start();

// 1. Check if user is logged in - SIMPLE BUT EFFECTIVE CHECK
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Clear any existing session data
    session_unset();
    session_destroy();

    // Redirect to login page
    header("Location: login.php");
    exit();
}

// 2. Verify IP address (optional but recommended)
if ($_SESSION['user_ip'] !== $_SERVER['REMOTE_ADDR']) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// 3. Check session timeout (10 minutes)
if (time() - $_SESSION['last_activity'] > 600) {
    session_unset();
    session_destroy();
    header("Location: login.php?timeout=1");
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();


// Only now include database connection after all security checks
include 'db.php';

// Initialize messages
$errorMessage = '';
$successMessage = '';

// Fetch all dashboard data in a secure way
try {
    // 1. Get counts for all tables
    $counts = [];
    $tables = ['devotion', 'devotions', 'prayer_requests', 'testimonies', 'subscribers', 'comments'];

    foreach ($tables as $table) {
        $query = $mysqli->prepare("SELECT COUNT(*) AS total FROM $table");
        $query->execute();
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        $counts[$table] = $row['total'] ?? 0;
        $query->close();
    }

    // 2. Fetch devotion data
    $devotion = [];
    $devotionQuery = $mysqli->prepare("SELECT * FROM devotion ORDER BY date");
    $devotionQuery->execute();
    $devotionResult = $devotionQuery->get_result();
    while ($row = $devotionResult->fetch_assoc()) {
        $devotion[] = $row;
    }
    $devotionQuery->close();

    // 3. Fetch devotions
    $limit = 10; // Number of items per page
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Get total number of devotionals for pagination
    $count_sql = $mysqli->prepare("SELECT COUNT(*) as total FROM devotions");
    $count_sql->execute();
    $count_result = $count_sql->get_result();
    $total_rows = $count_result->fetch_assoc()['total'];
    $total_pages = ceil($total_rows / $limit);
    $count_sql->close();

    // Fetch devotionals with pagination
    $devotions = [];
    $sql = $mysqli->prepare("SELECT id, title, devotion_date, image, excerpt FROM devotions ORDER BY devotion_date DESC LIMIT ? OFFSET ?");
    $sql->bind_param("ii", $limit, $offset);
    $sql->execute();
    $result = $sql->get_result();

    while ($row = $result->fetch_assoc()) {
        $devotions[] = $row;
    }
    $sql->close();

    // 4. Fetch prayer requests
    $prayerRequests = [];
    $prayerQuery = $mysqli->prepare("SELECT name, email, prayer AS title, request_date AS created_at 
                                    FROM prayer_requests 
                                    ORDER BY created_at DESC 
                                    LIMIT 20");
    $prayerQuery->execute();
    $prayerResult = $prayerQuery->get_result();
    while ($row = $prayerResult->fetch_assoc()) {
        $prayerRequests[] = $row;
    }
    $prayerQuery->close();

    // 5. Fetch testimonies
    $testimonies = [];
    $testimonyQuery = $mysqli->prepare("SELECT * FROM testimonies ORDER BY date DESC");
    $testimonyQuery->execute();
    $testimonyResult = $testimonyQuery->get_result();
    while ($row = $testimonyResult->fetch_assoc()) {
        $testimonies[] = $row;
    }
    $testimonyQuery->close();

    // 6. Fetch subscribers
    $subscribers = [];
    $subscriberQuery = $mysqli->prepare("SELECT * FROM subscribers ORDER BY subscribed_at DESC");
    $subscriberQuery->execute();
    $subscriberResult = $subscriberQuery->get_result();
    while ($row = $subscriberResult->fetch_assoc()) {
        $subscribers[] = $row;
    }
    $subscriberQuery->close();

} catch (Exception $e) {
    $errorMessage = "Database error: " . htmlspecialchars($e->getMessage());
}

// HTML output starts here
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
                <a href="admin_dashboard.php">
                    <i class="fas fa-comment-alt"></i> Approve Testimonies
                </a>
            </li>
            <li>
                <a href="family_dasborad.php">
                    <i class="fas fa-comment-alt"></i> Family
                </a>
            </li>
            <li>
                <a href="today_dasborad.php">
                    <i class="fas fa-comment-alt"></i> Past Devotionals
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
                        <i class="fas fa-plus"></i> Add New Devotional
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
                                    <?php if (!empty($devotions)): ?>
                                        <?php foreach ($devotions as $row): ?>
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
                                                    <a href="Edevotional.php?id=<?= $row['id'] ?>"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
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
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">No devotionals found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation" class="mt-3">
                            <ul class="pagination justify-content-center">
                                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1">Previous</a>
                                </li>

                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
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
                                        <textarea name="excerpt" id="excerpt" class="form-control" rows="3"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="devotional_date">Date</label>
                                    <input type="date" name="devotional_date" id="devotional_date" class="form-control"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Cover Image</label>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*"
                                        required>
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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>All Prayer Requests</span>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search requests..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button" onclick="searchRequests()">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="prayerRequestsTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Prayer Request</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($prayerRequests)): ?>
                                        <?php foreach ($prayerRequests as $request): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($request['name']); ?></td>
                                                <td><?php echo htmlspecialchars($request['email']); ?></td>
                                                <td class="text-truncate" style="max-width: 200px;"
                                                    title="<?php echo htmlspecialchars($request['title']); ?>">
                                                    <?php echo htmlspecialchars($request['title']); ?>
                                                </td>
                                                <td><?php echo date('F j, Y, g:i a', strtotime($request['created_at'])); ?></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No prayer requests found within the last 24
                                                hours.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonies Page -->
        <div class="page-content" id="testimonies-page">
            <button>Approve </button>
            <div class="container-fluid mt-4">
                <h4 class="mb-4">Testimonies</h4>

                <div class="dashboard-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>All Recent Testimonies (Last 24 Hours)</span>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search testimonies..."
                                id="testimonySearch">
                            <button class="btn btn-outline-secondary" type="button" onclick="searchTestimonies()">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php if (isset($_GET['delete'])): ?>
                            <div class="alert alert-<?= $_GET['delete'] === 'success' ? 'success' : 'danger' ?> mb-4">
                                <?= $_GET['delete'] === 'success' ?
                                    'Testimony deleted successfully.' :
                                    ($_GET['delete'] === 'error' ?
                                        'Failed to delete testimony.' :
                                        'Invalid delete request.') ?>
                            </div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table table-hover" id="testimoniesTable">
                                <thead>
                                    <tr>


                                        <th>Name</th>
                                        <th>Initials</th>
                                        <th>Testimony</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($testimonies)): ?>
                                        <?php foreach ($testimonies as $testimony): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($testimony['name']); ?></td>
                                                <td><?= htmlspecialchars($testimony['initials']); ?></td>
                                                <td class="text-truncate" style="max-width: 300px;"
                                                    title="<?= htmlspecialchars($testimony['message'] ?? ''); ?>">
                                                    <?= htmlspecialchars($testimony['message'] ?? ''); ?>
                                                </td>
                                                <td><?= date('F j, Y, g:i A', strtotime($testimony['date'])); ?></td>
                                                <td>
                                                    <?php $statusClass = [
                                                        'pending' => 'bg-warning text-dark',
                                                        'approved' => 'bg-success',
                                                        'rejected' => 'bg-danger'
                                                    ][$testimony['status']] ?? 'bg-info text-dark'; ?>

                                                    <span class="badge <?= $statusClass ?>">
                                                        <?= htmlspecialchars($testimony['status']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <form action="delete_user.php" method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this testimony?');">
                                                            <input type="hidden" name="id" value="<?= $testimony['id'] ?>">
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>

                                                        <?php if ($testimony['status'] === 'pending'): ?>
                                                            <form action="approve_testimony.php" method="POST">
                                                                <input type="hidden" name="id" value="<?= $testimony['id'] ?>">
                                                                <button type="submit" class="btn btn-sm btn-outline-success"
                                                                    title="Approve">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            </form>

                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No testimonies found in the last 24 hours.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function searchTestimonies() {
                const input = document.getElementById('testimonySearch');
                const filter = input.value.toUpperCase();
                const table = document.getElementById('testimoniesTable');
                const tr = table.getElementsByTagName('tr');

                for (let i = 1; i < tr.length; i++) {
                    let found = false;
                    const td = tr[i].getElementsByTagName('td');

                    for (let j = 0; j < td.length - 1; j++) {
                        if (td[j]) {
                            const txtValue = td[j].textContent || td[j].innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                found = true;
                                break;
                            }
                        }
                    }

                    tr[i].style.display = found ? '' : 'none';
                }
            }
        </script>



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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>All Subscribers</span>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search subscribers..."
                                id="subscriber-search">
                            <button class="btn btn-outline-secondary" type="button" id="search-button">
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
                                        <th>Join Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($subscribers)): ?>
                                        <?php foreach ($subscribers as $subscriber): ?>
                                            <tr data-subscriber-id="<?= htmlspecialchars($subscriber['id'] ?? '') ?>">
                                                <td><?= htmlspecialchars($subscriber['email']) ?></td>
                                                <td><?= date("F j, Y", strtotime($subscriber['subscribed_at'])) ?></td>
                                                <td>
                                                    <?php
                                                    $status = $subscriber['status'] ?? 'Active';
                                                    $badgeClass = $status === 'Active' ? 'bg-success' : 'bg-secondary';
                                                    ?>
                                                    <span class="badge <?= $badgeClass ?>">
                                                        <?= htmlspecialchars($status) ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <form action="send-email.php" method="POST" style="display:inline;">
                                                        <input type="hidden" name="email"
                                                            value="<?= htmlspecialchars($subscriber['email']) ?>">
                                                        <button type="submit" class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-envelope"></i>
                                                        </button>
                                                    </form>
                                                    <form action="delete_subscriber.php" method="POST" style="display: inline;">
                                                        <input type="hidden" name="id"
                                                            value="<?= htmlspecialchars($subscriber['id'] ?? '') ?>">
                                                        <input type="hidden" name="csrf_token"
                                                            value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            title="Delete Subscriber">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>


                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-4">No subscribers found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <?php if (!empty($subscribers) && isset($totalPages) && $totalPages > 1): ?>
                            <nav aria-label="Page navigation" class="mt-3">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page=<?= $currentPage - 1 ?>" tabindex="-1">Previous</a>
                                    </li>

                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        <?php endif; ?>
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

            // Optional: Simple client-side search function
            function searchRequests() {
                const input = document.getElementById('searchInput').value.toLowerCase();
                const rows = document.querySelectorAll('#prayerRequestsTable tbody tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(input) ? '' : 'none';
                });
            }
            document.addEventListener('DOMContentLoaded', function () {
                // Search functionality
                document.getElementById('search-button').addEventListener('click', function () {
                    const searchTerm = document.getElementById('subscriber-search').value;
                    // Implement search functionality (AJAX call or form submission)
                    console.log('Searching for:', searchTerm);
                });

                // Delete button functionality
                document.querySelectorAll('.delete-btn').forEach(button => {
                    button.addEventListener('click', function () {
                        const subscriberId = this.getAttribute('data-id');
                        if (confirm('Are you sure you want to delete this subscriber?')) {
                            // Implement delete functionality (AJAX call or form submission)
                            console.log('Deleting subscriber ID:', subscriberId);
                        }
                    });
                });

                // Send email button functionality
                document.querySelectorAll('.send-email-btn').forEach(button => {
                    button.addEventListener('click', function () {
                        const email = this.getAttribute('data-email');
                        // Implement email functionality
                        console.log('Sending email to:', email);
                    });
                });
            });

            $(document).ready(function () {
                let deleteId = null;

                // Handle delete button click
                $('.delete-btn').click(function () {
                    deleteId = $(this).data('id');
                    const email = $(this).data('email');
                    $('#deleteEmail').text(email);
                    $('#deleteModal').modal('show');
                });

                // Handle confirm delete
                $('#confirmDelete').click(function () {
                    if (!deleteId) return;

                    $.ajax({
                        url: 'delete_subscriber.php',
                        method: 'POST',
                        data: { id: deleteId },
                        dataType: 'json'
                    })
                        .done(function (response) {
                            if (response.success) {
                                // Remove row from table or refresh page
                                location.reload();
                            } else {
                                alert('Error: ' + response.message);
                            }
                        })
                        .fail(function () {
                            alert('Server error occurred');
                        })
                        .always(function () {
                            $('#deleteModal').modal('hide');
                        });
                });
            });

            $(document).ready(function () {
                // Delete button click handler
                $(document).on('click', '.delete-btn', function () {
                    const button = $(this);
                    const id = button.data('id');
                    const email = button.data('email');
                    const url = button.data('url');
                    const csrfToken = button.data('csrf');

                    // Show confirmation dialog
                    if (!confirm(`Are you sure you want to delete ${email}?`)) {
                        return false;
                    }

                    // Add loading state
                    button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');

                    // AJAX request
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: {
                            id: id,
                            csrf_token: csrfToken
                        },
                        dataType: 'json'
                    })
                        .done(function (response) {
                            if (response.success) {
                                // Remove the row from table
                                button.closest('tr').fadeOut(300, function () {
                                    $(this).remove();
                                });

                                // Show success message
                                showAlert('success', response.message);
                            } else {
                                showAlert('danger', response.message);
                                button.prop('disabled', false).html('<i class="fas fa-trash"></i>');
                            }
                        })
                        .fail(function (xhr) {
                            showAlert('danger', 'Server error: ' + xhr.statusText);
                            button.prop('disabled', false).html('<i class="fas fa-trash"></i>');
                        });
                });

                // Helper function to show alerts
                function showAlert(type, message) {
                    const alert = $(`<div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>`);

                    $('#alerts-container').append(alert);
                    setTimeout(() => alert.alert('close'), 5000);
                }
            });
        </script>
</body>

</html>