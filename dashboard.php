<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Anchor Devotional - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #ad3128;
            --secondary: #2c3e50;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --sidebar-width: 250px;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f5f7fa;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background-color: var(--secondary);
            color: white;
            transition: all 0.3s;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .sidebar-header h3 {
            margin-bottom: 0;
            font-weight: 600;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu li {
            position: relative;
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            color: white;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .sidebar-menu a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar-menu .badge {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s;
        }

        /* Page Content */
        .page-content {
            display: none;
        }

        .page-content.active {
            display: block;
        }

        /* Top Navigation */
        .top-nav {
            background-color: white;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-box {
            position: relative;
            width: 300px;
        }

        .search-box input {
            padding-left: 40px;
            border-radius: 50px;
            border: 1px solid #ddd;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 10px;
            color: #6c757d;
        }

        .user-menu {
            display: flex;
            align-items: center;
        }

        .user-menu img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Dashboard Cards */
        .dashboard-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: all 0.3s;
            background-color: white;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            padding: 15px 20px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--light);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .stat-card {
            text-align: center;
            padding: 20px;
        }

        .stat-card i {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .stat-card h2 {
            font-size: 2.5rem;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #6c757d;
            margin-bottom: 0;
        }

        /* Tables */
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: var(--light);
            border-top: none;
        }

        .badge {
            padding: 6px 10px;
            font-weight: 500;
        }

        /* Forms */
        .form-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: 500;
            margin-bottom: 8px;
        }

        /* Cover Image Preview */
        .cover-preview {
            width: 100%;
            height: 200px;
            background-color: #f5f5f5;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 15px;
            position: relative;
            border: 2px dashed #ddd;
        }

        .cover-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .cover-preview .placeholder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #6c757d;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                left: -var(--sidebar-width);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content.active {
                margin-left: var(--sidebar-width);
            }
        }
    </style>
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
                    <i class="fas fa-book-open"></i> Devotionals 1
                    <span class="badge bg-primary">12</span>
                </a>
            </li>
            </li>
            <li>
                <a href="#" data-page="devotionals">
                    <i class="fas fa-book-open"></i> Devotionals 2
                    <span class="badge bg-primary">12</span>
                </a>
            </li>
            <li>
                <a href="#" data-page="prayer-requests">
                    <i class="fas fa-pray"></i> Prayer Requests
                    <span class="badge bg-danger">5</span>
                </a>
            </li>
            </li>
            <li>
                <a href="#" data-page="devotionals">
                    <i class="fas fa-book-open"></i> Front Page
                    <span class="badge bg-primary">12</span>
                </a>
            </li>
            </li>
            <li>
                <a href="#" data-page="devotionals">
                    <i class="fas fa-book-open"></i> Past Devotionals
                    <span class="badge bg-primary">12</span>
                </a>
            </li>
            <li>
                <a href="#" data-page="testimonies">
                    <i class="fas fa-comment-alt"></i> Testimonies
                </a>
            </li>
            <li>
                <a href="#" data-page="subscribers">
                    <i class="fas fa-users"></i> Subscribers
                    <span class="badge bg-success">1,234</span>
                </a>
            </li>
            <li>
                <a href="#" data-page="comments">
                    <i class="fas fa-comments"></i> Comments
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
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" class="form-control" placeholder="Search...">
            </div>
            <div class="user-menu">
                <img src="https://via.placeholder.com/40" alt="Admin">
                <div>
                    <div class="fw-bold">Admin User</div>
                    <small class="text-muted">Super Admin</small>
                </div>
            </div>
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
                                <h2>48</h2>
                                <p>Devotionals</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-pray text-danger"></i>
                                <h2>24</h2>
                                <p>Prayer Requests</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-comment-alt text-warning"></i>
                                <h2>156</h2>
                                <p>Testimonies</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="stat-card">
                                <i class="fas fa-users text-success"></i>
                                <h2>1,234</h2>
                                <p>Subscribers</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Devotionals -->
                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <span>Recent Devotionals</span>
                                <a href="#" class="btn btn-sm btn-primary" id="add-devotional-btn">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Surviving the HEAT</td>
                                                <td>June 5, 2023</td>
                                                <td><span class="badge bg-success">Published</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i
                                                            class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Peace in the Storm</td>
                                                <td>June 4, 2023</td>
                                                <td><span class="badge bg-success">Published</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary"><i
                                                            class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <span>Recent Activity</span>
                            </div>
                            <div class="card-body">
                                <div class="activity-list">
                                    <div class="activity-item mb-3">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i
                                                    class="fas fa-book-open bg-primary text-white p-2 rounded-circle"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <strong>New Devotional Added</strong>
                                                <p class="mb-0">"Surviving the HEAT" was published</p>
                                                <small class="text-muted">2 hours ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activity-item mb-3">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-pray bg-danger text-white p-2 rounded-circle"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <strong>New Prayer Request</strong>
                                                <p class="mb-0">From John Doe</p>
                                                <small class="text-muted">5 hours ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <th>Title</th>
                                        <th>Topic</th>
                                        <th>Verse</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="https://via.placeholder.com/50" alt="Cover"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                        </td>
                                        <td>Surviving the HEAT</td>
                                        <td>Faith in Trials</td>
                                        <td>Jeremiah 17:7-8</td>
                                        <td>June 5, 2023</td>
                                        <td><span class="badge bg-success">Published</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-outline-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://via.placeholder.com/50" alt="Cover"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                        </td>
                                        <td>Peace in the Storm</td>
                                        <td>Peace</td>
                                        <td>Philippians 4:6-7</td>
                                        <td>June 4, 2023</td>
                                        <td><span class="badge bg-success">Published</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary"><i
                                                    class="fas fa-edit"></i></button>
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
                    <form id="devotional-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="devotional-title">Title</label>
                                    <input type="text" class="form-control" id="devotional-title"
                                        placeholder="Enter title" value="Surviving the HEAT">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="devotional-topic">Topic</label>
                                    <input type="text" class="form-control" id="devotional-topic"
                                        placeholder="Enter topic" value="Faith in Trials">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="devotional-verse">Bible Verse</label>
                            <input type="text" class="form-control" id="devotional-verse"
                                placeholder="e.g. Jeremiah 17:7-8" value="Jeremiah 17:7-8">
                        </div>

                        <div class="form-group mb-3">
                            <label for="devotional-date">Date</label>
                            <input type="date" class="form-control" id="devotional-date" value="2023-06-05">
                        </div>

                        <div class="form-group mb-3">
                            <label for="devotional-author">Author</label>
                            <select class="form-select" id="devotional-author">
                                <option>Maj Gen (Dr) Ezra Jahadi Jakko (Rtd)</option>
                                <option>Pastor John Smith</option>
                                <option>Rev. Mary Johnson</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Cover Image</label>
                            <div class="cover-preview" id="cover-preview">
                                <img src="https://via.placeholder.com/800x400" alt="Cover Preview"
                                    id="cover-image-preview">
                                <div class="placeholder" id="cover-placeholder">
                                    <i class="fas fa-image fa-3x mb-2"></i>
                                    <p>No cover image selected</p>
                                </div>
                            </div>
                            <input type="file" class="form-control" id="cover-image-upload" accept="image/*">
                        </div>

                        <div class="form-group mb-3">
                            <label for="devotional-content">Devotional Content</label>
                            <textarea class="form-control" id="devotional-content" rows="12"
                                placeholder="Write your devotional content here...">Blessed is the man that trusteth in the Lord, and whose hope the Lord is. For he shall be as a tree planted by the waters, and that spreadeth out her roots by the river, and shall not see (FEAR) when heat cometh, but her leaf shall be green; and shall not be careful (WORRIED) in the year of drought, neither shall cease from yielding fruit. - Jeremiah 17:7-8

Heat in the Bible and in life generally signifies trouble, hardship, suffering, adversity, and trails.

In life, we all encounter different levels, dissensions and intensity of heat. However, we should be encouraged that God has also made a way of escape for those who trust and hope in him.</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="devotional-status">Status</label>
                            <select class="form-select" id="devotional-status">
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary">Save Draft</button>
                            <button type="submit" class="btn btn-primary">Publish Devotional</button>
                        </div>
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
                e.preventDefault();

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
            e.preventDefault();
            document.getElementById('devotionals-page').classList.remove('active');
            document.getElementById('edit-devotional-page').classList.add('active');
            document.getElementById('devotional-form-title').textContent = 'Add New Devotional';
        });

        document.getElementById('new-devotional-btn').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('devotionals-page').classList.remove('active');
            document.getElementById('edit-devotional-page').classList.add('active');
            document.getElementById('devotional-form-title').textContent = 'Add New Devotional';
        });

        document.getElementById('back-to-devotionals').addEventListener('click', function (e) {
            e.preventDefault();
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
            e.preventDefault();
            alert('Devotional saved successfully!');
            document.getElementById('edit-devotional-page').classList.remove('active');
            document.getElementById('devotionals-page').classList.add('active');
        });
    </script>
</body>

</html>