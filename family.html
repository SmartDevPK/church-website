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
            border-bottom: 1px solid rgba(0,0,0,0.1);
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

        /* File Upload Preview */
        .file-preview {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .file-preview i {
            font-size: 2rem;
            color: var(--secondary);
        }

        .file-info {
            flex-grow: 1;
        }

        .file-name {
            font-weight: 500;
            margin-bottom: 5px;
        }

        .file-size {
            font-size: 0.8rem;
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

        /* Testimony/Prayer Request View Modal */
        .testimony-content, .prayer-content {
            white-space: pre-line;
            line-height: 1.6;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
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
                    <i class="fas fa-book-open"></i> Devotionals
                    <span class="badge bg-primary">12</span>
                </a>
            </li>
            <li>
                <a href="#" data-page="past-devotionals">
                    <i class="fas fa-calendar-alt"></i> Past Devotionals
                </a>
            </li>
            <li>
                <a href="#" data-page="family-resources">
                    <i class="fas fa-file-pdf"></i> Family Resources
                </a>
            </li>
            <li>
                <a href="#" data-page="prayer-requests">
                    <i class="fas fa-pray"></i> Prayer Requests
                    <span class="badge bg-danger">5</span>
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
                <a href="#" data-page="settings">
                    <i class="fas fa-cog"></i> Settings
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
                                <i class="fas fa-file-pdf text-warning"></i>
                                <h2>24</h2>
                                <p>Family Resources</p>
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
                                                    <button class="btn btn-sm btn-outline-primary edit-devotional" data-id="1"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger delete-devotional" data-id="1"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Peace in the Storm</td>
                                                <td>June 4, 2023</td>
                                                <td><span class="badge bg-success">Published</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary edit-devotional" data-id="2"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger delete-devotional" data-id="2"><i class="fas fa-trash"></i></button>
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
                                                <i class="fas fa-book-open bg-primary text-white p-2 rounded-circle"></i>
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
                                                <i class="fas fa-file-pdf bg-warning text-white p-2 rounded-circle"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <strong>New Family Resource</strong>
                                                <p class="mb-0">"Parenting Guide" was uploaded</p>
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
                    <h4>Devotionals</h4>
                    <button class="btn btn-primary" id="new-devotional-btn">
                        <i class="fas fa-plus"></i> New Devotional
                    </button>
                </div>

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
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="devotional-status-filter">Status</label>
                                    <select id="devotional-status-filter" class="form-control">
                                        <option value="">All Statuses</option>
                                        <option>Draft</option>
                                        <option>Published</option>
                                        <option>Archived</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="devotional-date-filter">Date Range</label>
                                    <select id="devotional-date-filter" class="form-control">
                                        <option value="">All Time</option>
                                        <option>Last 7 Days</option>
                                        <option>Last 30 Days</option>
                                        <option>Last 90 Days</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="devotional-author-filter">Author</label>
                                    <select id="devotional-author-filter" class="form-control">
                                        <option value="">All Authors</option>
                                        <option>Maj Gen (Dr) Ezra Jahadi Jakko (Rtd)</option>
                                        <option>Pastor John Smith</option>
                                        <option>Rev. Sarah Johnson</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Topic</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Surviving the HEAT</td>
                                        <td>Faith in Trials</td>
                                        <td>Maj Gen (Dr) Ezra Jahadi Jakko (Rtd)</td>
                                        <td>June 5, 2023</td>
                                        <td><span class="badge bg-success">Published</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary edit-devotional" data-id="1"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-outline-danger delete-devotional" data-id="1"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Peace in the Storm</td>
                                        <td>Peace</td>
                                        <td>Maj Gen (Dr) Ezra Jahadi Jakko (Rtd)</td>
                                        <td>June 4, 2023</td>
                                        <td><span class="badge bg-success">Published</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary edit-devotional" data-id="2"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-outline-danger delete-devotional" data-id="2"><i class="fas fa-trash"></i></button>
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

        <!-- Edit Devotional Page -->
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
                        <input type="hidden" id="devotional-id" value="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="devotional-title">Title</label>
                                    <input type="text" class="form-control" id="devotional-title" placeholder="Enter devotional title">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="devotional-date">Date</label>
                                    <input type="date" class="form-control" id="devotional-date">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="devotional-topic">Topic</label>
                                    <input type="text" class="form-control" id="devotional-topic" placeholder="Enter topic">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="devotional-verse">Bible Verse</label>
                                    <input type="text" class="form-control" id="devotional-verse" placeholder="Enter Bible verse reference">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="devotional-author">Author</label>
                            <select class="form-select" id="devotional-author">
                                <option>Maj Gen (Dr) Ezra Jahadi Jakko (Rtd)</option>
                                <option>Pastor John Smith</option>
                                <option>Rev. Sarah Johnson</option>
                                <option>Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="devotional-content">Content</label>
                            <textarea class="form-control" id="devotional-content" rows="10" placeholder="Enter devotional content"></textarea>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Cover Image</label>
                            <div class="cover-preview" id="cover-image-preview-container">
                                <img id="cover-image-preview" src="" alt="Cover Preview">
                                <div class="placeholder" id="cover-placeholder">
                                    <i class="fas fa-image fa-3x mb-2"></i>
                                    <p>No cover image selected</p>
                                </div>
                            </div>
                            <input type="file" class="form-control" id="cover-image-upload" accept="image/*">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="devotional-status">Status</label>
                            <select class="form-select" id="devotional-status">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Devotional</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Past Devotionals Page -->
        <div class="page-content" id="past-devotionals-page">
            <div class="container-fluid mt-4">
                <h4 class="mb-4">Past Devotionals</h4>
                
                <div class="dashboard-card">
                    <div class="card-header">
                        <span>Archived Devotionals</span>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search devotionals...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="past-year-filter">Year</label>
                                    <select id="past-year-filter" class="form-control">
                                        <option value="">All Years</option>
                                        <option>2023</option>
                                        <option>2022</option>
                                        <option>2021</option>
                                        <option>2020</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="past-month-filter">Month</label>
                                    <select id="past-month-filter" class="form-control">
                                        <option value="">All Months</option>
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="past-author-filter">Author</label>
                                    <select id="past-author-filter" class="form-control">
                                        <option value="">All Authors</option>
                                        <option>Maj Gen (Dr) Ezra Jahadi Jakko (Rtd)</option>
                                        <option>Pastor John Smith</option>
                                        <option>Rev. Sarah Johnson</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Topic</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Walking in Faith</td>
                                        <td>Faith</td>
                                        <td>Pastor John Smith</td>
                                        <td>June 3, 2023</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> View</button>
                                            <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-redo"></i> Restore</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>The Power of Prayer</td>
                                        <td>Prayer</td>
                                        <td>Rev. Sarah Johnson</td>
                                        <td>May 28, 2023</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> View</button>
                                            <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-redo"></i> Restore</button>
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

        <!-- Family Resources Page -->
        <div class="page-content" id="family-resources-page">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Family Resources</h4>
                    <button class="btn btn-primary" id="add-resource-btn">
                        <i class="fas fa-plus"></i> Add Resource
                    </button>
                </div>

                <div class="dashboard-card">
                    <div class="card-header">
                        <span>All Resources</span>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search resources...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="resource-category-filter">Category</label>
                                    <select id="resource-category-filter" class="form-control">
                                        <option value="">All Categories</option>
                                        <option>Parenting</option>
                                        <option>Marriage</option>
                                        <option>Devotional</option>
                                        <option>Study Guide</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="resource-type-filter">Type</label>
                                    <select id="resource-type-filter" class="form-control">
                                        <option value="">All Types</option>
                                        <option>PDF</option>
                                        <option>Video</option>
                                        <option>Audio</option>
                                        <option>Link</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="resource-date-filter">Date Added</label>
                                    <select id="resource-date-filter" class="form-control">
                                        <option value="">All Time</option>
                                        <option>Last 7 Days</option>
                                        <option>Last 30 Days</option>
                                        <option>Last 90 Days</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Date Added</th>
                                        <th>Downloads</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Parenting Guide</td>
                                        <td>Parenting</td>
                                        <td>PDF</td>
                                        <td>June 10, 2023</td>
                                        <td>124</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Marriage Workshop</td>
                                        <td>Marriage</td>
                                        <td>Video</td>
                                        <td>June 5, 2023</td>
                                        <td>87</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
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

        <!-- Prayer Requests Page -->
        <div class="page-content" id="prayer-requests-page">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Prayer Requests</h4>
                    <button class="btn btn-primary" id="add-prayer-request-btn">
                        <i class="fas fa-plus"></i> Add New Request
                    </button>
                </div>

                <div class="dashboard-card">
                    <div class="card-header">
                        <span>All Prayer Requests</span>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search prayer requests...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prayer-status-filter">Status</label>
                                    <select id="prayer-status-filter" class="form-control">
                                        <option value="">All Statuses</option>
                                        <option>Pending</option>
                                        <option>In Progress</option>
                                        <option>Answered</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prayer-date-filter">Date Range</label>
                                    <select id="prayer-date-filter" class="form-control">
                                        <option value="">All Time</option>
                                        <option>Last 7 Days</option>
                                        <option>Last 30 Days</option>
                                        <option>Last 90 Days</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prayer-category-filter">Category</label>
                                    <select id="prayer-category-filter" class="form-control">
                                        <option value="">All Categories</option>
                                        <option>Healing</option>
                                        <option>Family</option>
                                        <option>Financial</option>
                                        <option>Spiritual</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Request</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>June 10, 2023</td>
                                        <td>John Doe</td>
                                        <td>Pray for healing from illness</td>
                                        <td>Healing</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary view-prayer" data-id="1"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-success update-prayer-status" data-id="1"><i class="fas fa-check"></i></button>
                                            <button class="btn btn-sm btn-outline-danger delete-prayer" data-id="1"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>June 8, 2023</td>
                                        <td>Jane Smith</td>
                                        <td>Pray for family reconciliation</td>
                                        <td>Family</td>
                                        <td><span class="badge bg-success">Answered</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary view-prayer" data-id="2"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-success update-prayer-status" data-id="2"><i class="fas fa-check"></i></button>
                                            <button class="btn btn-sm btn-outline-danger delete-prayer" data-id="2"><i class="fas fa-trash"></i></button>
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

        <!-- Add/Edit Prayer Request Form -->
        <div class="page-content" id="edit-prayer-page">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 id="prayer-form-title">Add New Prayer Request</h4>
                    <button class="btn btn-outline-secondary" id="back-to-prayers">
                        <i class="fas fa-arrow-left"></i> Back to Requests
                    </button>
                </div>

                <div class="form-container">
                    <form id="prayer-form">
                        <input type="hidden" id="prayer-id" value="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="prayer-name">Name</label>
                                    <input type="text" class="form-control" id="prayer-name" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="prayer-email">Email</label>
                                    <input type="email" class="form-control" id="prayer-email" placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="prayer-phone">Phone</label>
                                    <input type="tel" class="form-control" id="prayer-phone" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="prayer-category">Category</label>
                                    <select class="form-select" id="prayer-category">
                                        <option>Healing</option>
                                        <option>Family</option>
                                        <option>Financial</option>
                                        <option>Spiritual</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="prayer-request">Prayer Request</label>
                            <textarea class="form-control" id="prayer-request" rows="6" placeholder="Enter the prayer request details"></textarea>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="prayer-status">Status</label>
                            <select class="form-select" id="prayer-status">
                                <option value="pending">Pending</option>
                                <option value="in-progress">In Progress</option>
                                <option value="answered">Answered</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="prayer-notes">Admin Notes</label>
                            <textarea class="form-control" id="prayer-notes" rows="3" placeholder="Enter any admin notes"></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Testimonies Page -->
        <div class="page-content" id="testimonies-page">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Testimonies</h4>
                    <div class="btn-group">
                        <button class="btn btn-primary" id="add-testimony-btn">
                            <i class="fas fa-plus"></i> Add Testimony
                        </button>
                        <button class="btn btn-outline-secondary" id="export-testimonies-btn">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
                </div>

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
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="testimony-status-filter">Status</label>
                                    <select id="testimony-status-filter" class="form-control">
                                        <option value="">All Statuses</option>
                                        <option>Pending</option>
                                        <option>Approved</option>
                                        <option>Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="testimony-date-filter">Date Range</label>
                                    <select id="testimony-date-filter" class="form-control">
                                        <option value="">All Time</option>
                                        <option>Last 7 Days</option>
                                        <option>Last 30 Days</option>
                                        <option>Last 90 Days</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="testimony-category-filter">Category</label>
                                    <select id="testimony-category-filter" class="form-control">
                                        <option value="">All Categories</option>
                                        <option>Healing</option>
                                        <option>Provision</option>
                                        <option>Deliverance</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Testimony</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>June 12, 2023</td>
                                        <td>Michael Brown</td>
                                        <td>God healed me from a chronic condition...</td>
                                        <td>Healing</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary view-testimony" data-id="1"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-warning edit-testimony" data-id="1"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-outline-danger delete-testimony" data-id="1"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>June 9, 2023</td>
                                        <td>Sarah Johnson</td>
                                        <td>God provided miraculously during financial crisis...</td>
                                        <td>Provision</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary view-testimony" data-id="2"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-warning edit-testimony" data-id="2"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-outline-danger delete-testimony" data-id="2"><i class="fas fa-trash"></i></button>
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

        <!-- Add/Edit Testimony Form -->
        <div class="page-content" id="edit-testimony-page">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 id="testimony-form-title">Add New Testimony</h4>
                    <button class="btn btn-outline-secondary" id="back-to-testimonies">
                        <i class="fas fa-arrow-left"></i> Back to Testimonies
                    </button>
                </div>

                <div class="form-container">
                    <form id="testimony-form">
                        <input type="hidden" id="testimony-id" value="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="testimony-name">Name</label>
                                    <input type="text" class="form-control" id="testimony-name" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="testimony-email">Email</label>
                                    <input type="email" class="form-control" id="testimony-email" placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="testimony-location">Location</label>
                                    <input type="text" class="form-control" id="testimony-location" placeholder="Enter location (optional)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="testimony-category">Category</label>
                                    <select class="form-select" id="testimony-category">
                                        <option>Healing</option>
                                        <option>Provision</option>
                                        <option>Deliverance</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="testimony-title">Title</label>
                            <input type="text" class="form-control" id="testimony-title" placeholder="Enter testimony title">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="testimony-content">Testimony Content</label>
                            <textarea class="form-control" id="testimony-content" rows="8" placeholder="Share your testimony..."></textarea>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="testimony-status">Status</label>
                            <select class="form-select" id="testimony-status">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="testimony-notes">Admin Notes</label>
                            <textarea class="form-control" id="testimony-notes" rows="3" placeholder="Enter any admin notes"></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Testimony</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Subscribers Page -->
        <div class="page-content" id="subscribers-page">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Subscribers</h4>
                    <div class="btn-group">
                        <button class="btn btn-primary" id="add-subscriber-btn">
                            <i class="fas fa-plus"></i> Add Subscriber
                        </button>
                        <button class="btn btn-outline-secondary" id="export-subscribers-btn">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
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
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="subscriber-status-filter">Status</label>
                                    <select id="subscriber-status-filter" class="form-control">
                                        <option value="">All Statuses</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                        <option>Unsubscribed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="subscriber-type-filter">Type</label>
                                    <select id="subscriber-type-filter" class="form-control">
                                        <option value="">All Types</option>
                                        <option>Email</option>
                                        <option>SMS</option>
                                        <option>Both</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="subscriber-date-filter">Date Joined</label>
                                    <select id="subscriber-date-filter" class="form-control">
                                        <option value="">All Time</option>
                                        <option>Last 7 Days</option>
                                        <option>Last 30 Days</option>
                                        <option>Last 90 Days</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Type</th>
                                        <th>Date Joined</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>David Wilson</td>
                                        <td>david@example.com</td>
                                        <td>+1234567890</td>
                                        <td>Email</td>
                                        <td>June 10, 2023</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary view-subscriber" data-id="1"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-warning edit-subscriber" data-id="1"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-outline-danger delete-subscriber" data-id="1"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Emily Davis</td>
                                        <td>emily@example.com</td>
                                        <td>+1987654321</td>
                                        <td>Both</td>
                                        <td>June 5, 2023</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary view-subscriber" data-id="2"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-warning edit-subscriber" data-id="2"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-outline-danger delete-subscriber" data-id="2"><i class="fas fa-trash"></i></button>
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

        <!-- Add/Edit Subscriber Form -->
        <div class="page-content" id="edit-subscriber-page">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 id="subscriber-form-title">Add New Subscriber</h4>
                    <button class="btn btn-outline-secondary" id="back-to-subscribers">
                        <i class="fas fa-arrow-left"></i> Back to Subscribers
                    </button>
                </div>

                <div class="form-container">
                    <form id="subscriber-form">
                        <input type="hidden" id="subscriber-id" value="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subscriber-name">Name</label>
                                    <input type="text" class="form-control" id="subscriber-name" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subscriber-email">Email</label>
                                    <input type="email" class="form-control" id="subscriber-email" placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subscriber-phone">Phone</label>
                                    <input type="tel" class="form-control" id="subscriber-phone" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subscriber-type">Subscription Type</label>
                                    <select class="form-select" id="subscriber-type">
                                        <option>Email</option>
                                        <option>SMS</option>
                                        <option>Both</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subscriber-join-date">Join Date</label>
                                    <input type="date" class="form-control" id="subscriber-join-date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subscriber-status">Status</label>
                                    <select class="form-select" id="subscriber-status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="unsubscribed">Unsubscribed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="subscriber-notes">Notes</label>
                            <textarea class="form-control" id="subscriber-notes" rows="3" placeholder="Enter any notes about this subscriber"></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Subscriber</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Settings Page -->
        <div class="page-content" id="settings-page">
            <div class="container-fluid mt-4">
                <h4 class="mb-4">Settings</h4>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <span>General Settings</span>
                            </div>
                            <div class="card-body">
                                <form id="general-settings-form">
                                    <div class="form-group mb-3">
                                        <label for="site-name">Site Name</label>
                                        <input type="text" class="form-control" id="site-name" value="The Anchor Devotional">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="site-description">Site Description</label>
                                        <textarea class="form-control" id="site-description" rows="3">Daily devotionals for spiritual growth</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="timezone">Timezone</label>
                                        <select class="form-select" id="timezone">
                                            <option>UTC</option>
                                            <option selected>Africa/Lagos</option>
                                            <option>America/New_York</option>
                                            <option>Europe/London</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Settings</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <span>Email Settings</span>
                            </div>
                            <div class="card-body">
                                <form id="email-settings-form">
                                    <div class="form-group mb-3">
                                        <label for="smtp-host">SMTP Host</label>
                                        <input type="text" class="form-control" id="smtp-host" value="smtp.example.com">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="smtp-port">SMTP Port</label>
                                        <input type="number" class="form-control" id="smtp-port" value="587">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="smtp-username">SMTP Username</label>
                                        <input type="text" class="form-control" id="smtp-username" value="admin@example.com">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="smtp-password">SMTP Password</label>
                                        <input type="password" class="form-control" id="smtp-password" placeholder="Enter password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Settings</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <span>System Information</span>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <strong>Version:</strong> 1.0.0
                                </div>
                                <div class="mb-3">
                                    <strong>Last Updated:</strong> June 15, 2023
                                </div>
                                <div class="mb-3">
                                    <strong>Server:</strong> Apache/2.4.41
                                </div>
                                <div class="mb-3">
                                    <strong>PHP Version:</strong> 8.1.2
                                </div>
                                <div class="mb-3">
                                    <strong>Database:</strong> MySQL 8.0
                                </div>
                                <button class="btn btn-outline-secondary mt-2">Check for Updates</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Testimony Modal -->
        <div class="modal fade" id="viewTestimonyModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="testimonyModalTitle">Testimony Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> <span id="testimony-view-name"></span></p>
                                <p><strong>Email:</strong> <span id="testimony-view-email"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date:</strong> <span id="testimony-view-date"></span></p>
                                <p><strong>Category:</strong> <span id="testimony-view-category"></span></p>
                            </div>
                        </div>
                        <h5 class="mb-2" id="testimony-view-title"></h5>
                        <div class="testimony-content mb-3" id="testimony-view-content"></div>
                        <div class="card">
                            <div class="card-header bg-light">
                                <strong>Admin Notes</strong>
                            </div>
                            <div class="card-body">
                                <p id="testimony-view-notes">No notes available.</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Prayer Request Modal -->
        <div class="modal fade" id="viewPrayerModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="prayerModalTitle">Prayer Request Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> <span id="prayer-view-name"></span></p>
                                <p><strong>Email:</strong> <span id="prayer-view-email"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date:</strong> <span id="prayer-view-date"></span></p>
                                <p><strong>Category:</strong> <span id="prayer-view-category"></span></p>
                            </div>
                        </div>
                        <h5 class="mb-2">Prayer Request</h5>
                        <div class="prayer-content mb-3" id="prayer-view-content"></div>
                        <div class="card">
                            <div class="card-header bg-light">
                                <strong>Admin Notes</strong>
                            </div>
                            <div class="card-body">
                                <p id="prayer-view-notes">No notes available.</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update-prayer-status-btn">Update Status</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Subscriber Modal -->
        <div class="modal fade" id="viewSubscriberModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="subscriberModalTitle">Subscriber Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> <span id="subscriber-view-name"></span></p>
                                <p><strong>Email:</strong> <span id="subscriber-view-email"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Phone:</strong> <span id="subscriber-view-phone"></span></p>
                                <p><strong>Join Date:</strong> <span id="subscriber-view-join-date"></span></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Subscription Type:</strong> <span id="subscriber-view-type"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Status:</strong> <span id="subscriber-view-status" class="badge"></span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-light">
                                <strong>Notes</strong>
                            </div>
                            <div class="card-body">
                                <p id="subscriber-view-notes">No notes available.</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this item? This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirm-delete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Data storage (in a real app, this would be API calls to a backend)
        const prayerRequests = [
            {
                id: 1,
                name: "John Doe",
                email: "john@example.com",
                phone: "+1234567890",
                category: "Healing",
                request: "Pray for healing from illness. I've been struggling with a chronic condition for several months and believe God can heal me.",
                status: "pending",
                date: "2023-06-10",
                notes: "Follow up in 2 weeks"
            },
            {
                id: 2,
                name: "Jane Smith",
                email: "jane@example.com",
                phone: "+1987654321",
                category: "Family",
                request: "Pray for family reconciliation. There's been a rift between me and my siblings that needs healing.",
                status: "answered",
                date: "2023-06-08",
                notes: "Reported reconciliation last week"
            }
        ];

        const testimonies = [
            {
                id: 1,
                name: "Michael Brown",
                email: "michael@example.com",
                location: "New York",
                category: "Healing",
                title: "God healed me from a chronic condition",
                content: "For years I suffered from a chronic condition that doctors said was incurable. After months of prayer and faith, God completely healed me during a worship service. The doctors confirmed there's no trace of the condition anymore!",
                status: "approved",
                date: "2023-06-12",
                notes: "Powerful testimony of healing"
            },
            {
                id: 2,
                name: "Sarah Johnson",
                email: "sarah@example.com",
                location: "Chicago",
                category: "Provision",
                title: "God provided miraculously during financial crisis",
                content: "When I lost my job unexpectedly, I didn't know how I would pay my bills. I committed to trusting God and within a week, I received three job offers and an unexpected financial gift that covered all my needs.",
                status: "pending",
                date: "2023-06-09",
                notes: "Needs review before publishing"
            }
        ];

        const subscribers = [
            {
                id: 1,
                name: "David Wilson",
                email: "david@example.com",
                phone: "+1234567890",
                type: "Email",
                joinDate: "2023-06-10",
                status: "active",
                notes: "Interested in daily devotionals"
            },
            {
                id: 2,
                name: "Emily Davis",
                email: "emily@example.com",
                phone: "+1987654321",
                type: "Both",
                joinDate: "2023-06-05",
                status: "active",
                notes: "Prefers morning notifications"
            }
        ];

        // Global variables
        let currentItemId = null;
        let currentItemType = null;
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        const viewTestimonyModal = new bootstrap.Modal(document.getElementById('viewTestimonyModal'));
        const viewPrayerModal = new bootstrap.Modal(document.getElementById('viewPrayerModal'));
        const viewSubscriberModal = new bootstrap.Modal(document.getElementById('viewSubscriberModal'));

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar on mobile
            document.getElementById('sidebarToggle').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('active');
                document.getElementById('main-content').classList.toggle('active');
            });

            // Initialize page navigation
            setupPageNavigation();
            
            // Initialize devotional functionality
            setupDevotionalFunctionality();
            
            // Initialize prayer request functionality
            setupPrayerRequestFunctionality();
            
            // Initialize testimony functionality
            setupTestimonyFunctionality();
            
            // Initialize subscriber functionality
            setupSubscriberFunctionality();
            
            // Initialize delete confirmation
            setupDeleteConfirmation();
        });

        // Page navigation setup
        function setupPageNavigation() {
            document.querySelectorAll('.sidebar-menu a').forEach(link => {
                link.addEventListener('click', function(e) {
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
        }

        // Devotional functionality
        function setupDevotionalFunctionality() {
            // Add devotional button
            document.getElementById('add-devotional-btn').addEventListener('click', function(e) {
                e.preventDefault();
                showDevotionalForm();
            });

            // New devotional button
            document.getElementById('new-devotional-btn').addEventListener('click', function(e) {
                e.preventDefault();
                showDevotionalForm();
            });

            // Back to devotionals
            document.getElementById('back-to-devotionals').addEventListener('click', function(e) {
                e.preventDefault();
                hideDevotionalForm();
            });

            // Cover image preview
            document.getElementById('cover-image-upload').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const preview = document.getElementById('cover-image-preview');
                        const placeholder = document.getElementById('cover-placeholder');
                        
                        preview.src = event.target.result;
                        preview.style.display = 'block';
                        placeholder.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Edit devotional buttons
            document.querySelectorAll('.edit-devotional').forEach(btn => {
                btn.addEventListener('click', function() {
                    const devotionalId = this.getAttribute('data-id');
                    const devotionalData = getDevotionalById(devotionalId);
                    
                    if (devotionalData) {
                        document.getElementById('devotional-id').value = devotionalId;
                        document.getElementById('devotional-title').value = devotionalData.title;
                        document.getElementById('devotional-topic').value = devotionalData.topic;
                        document.getElementById('devotional-verse').value = devotionalData.verse;
                        document.getElementById('devotional-date').value = devotionalData.date;
                        document.getElementById('devotional-content').value = devotionalData.content;
                        document.getElementById('devotional-status').value = devotionalData.status;
                        
                        // Set author
                        const authorSelect = document.getElementById('devotional-author');
                        for (let i = 0; i < authorSelect.options.length; i++) {
                            if (authorSelect.options[i].text === devotionalData.author) {
                                authorSelect.selectedIndex = i;
                                break;
                            }
                        }
                        
                        // Set cover image preview
                        const preview = document.getElementById('cover-image-preview');
                        const placeholder = document.getElementById('cover-placeholder');
                        if (devotionalData.coverImage) {
                            preview.src = devotionalData.coverImage;
                            preview.style.display = 'block';
                            placeholder.style.display = 'none';
                        } else {
                            preview.style.display = 'none';
                            placeholder.style.display = 'block';
                        }
                        
                        document.getElementById('devotional-form-title').textContent = 'Edit Devotional';
                        showDevotionalForm();
                    }
                });
            });

            // Form submission
            document.getElementById('devotional-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const isNew = document.getElementById('devotional-id').value === '';
                const action = isNew ? 'added' : 'updated';
                
                alert(`Devotional ${action} successfully!`);
                hideDevotionalForm();
            });
        }

        function showDevotionalForm() {
            document.getElementById('devotionals-page').classList.remove('active');
            document.getElementById('edit-devotional-page').classList.add('active');
            document.getElementById('devotional-form-title').textContent = 
                document.getElementById('devotional-id').value ? 'Edit Devotional' : 'Add New Devotional';
        }

        function hideDevotionalForm() {
            document.getElementById('edit-devotional-page').classList.remove('active');
            document.getElementById('devotionals-page').classList.add('active');
        }

        // Prayer request functionality
        function setupPrayerRequestFunctionality() {
            // Add prayer request button
            document.getElementById('add-prayer-request-btn').addEventListener('click', function(e) {
                e.preventDefault();
                showPrayerForm();
            });

            // Back to prayer requests
            document.getElementById('back-to-prayers').addEventListener('click', function(e) {
                e.preventDefault();
                hidePrayerForm();
            });

            // View prayer request buttons
            document.querySelectorAll('.view-prayer').forEach(btn => {
                btn.addEventListener('click', function() {
                    const prayerId = this.getAttribute('data-id');
                    viewPrayerRequest(prayerId);
                });
            });

            // Update prayer status buttons
            document.querySelectorAll('.update-prayer-status').forEach(btn => {
                btn.addEventListener('click', function() {
                    const prayerId = this.getAttribute('data-id');
                    editPrayerRequest(prayerId);
                });
            });

            // Edit prayer request buttons
            document.querySelectorAll('.edit-prayer').forEach(btn => {
                btn.addEventListener('click', function() {
                    const prayerId = this.getAttribute('data-id');
                    editPrayerRequest(prayerId);
                });
            });

            // Form submission
            document.getElementById('prayer-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const isNew = document.getElementById('prayer-id').value === '';
                const action = isNew ? 'added' : 'updated';
                
                alert(`Prayer request ${action} successfully!`);
                hidePrayerForm();
            });

            // Update prayer status button in modal
            document.getElementById('update-prayer-status-btn').addEventListener('click', function() {
                viewPrayerModal.hide();
                editPrayerRequest(currentItemId);
            });
        }

        function showPrayerForm() {
            resetPrayerForm();
            document.getElementById('prayer-requests-page').classList.remove('active');
            document.getElementById('edit-prayer-page').classList.add('active');
            document.getElementById('prayer-form-title').textContent = 'Add New Prayer Request';
        }

        function hidePrayerForm() {
            document.getElementById('edit-prayer-page').classList.remove('active');
            document.getElementById('prayer-requests-page').classList.add('active');
        }

        function resetPrayerForm() {
            document.getElementById('prayer-form').reset();
            document.getElementById('prayer-id').value = '';
        }

        function viewPrayerRequest(id) {
            const prayer = prayerRequests.find(p => p.id == id);
            if (prayer) {
                document.getElementById('prayerModalTitle').textContent = `Prayer Request from ${prayer.name}`;
                document.getElementById('prayer-view-name').textContent = prayer.name;
                document.getElementById('prayer-view-email').textContent = prayer.email;
                document.getElementById('prayer-view-date').textContent = new Date(prayer.date).toLocaleDateString();
                document.getElementById('prayer-view-category').textContent = prayer.category;
                document.getElementById('prayer-view-content').textContent = prayer.request;
                document.getElementById('prayer-view-notes').textContent = prayer.notes || 'No notes available.';
                
                currentItemId = id;
                currentItemType = 'prayer';
                viewPrayerModal.show();
            }
        }

        function editPrayerRequest(id) {
            const prayer = prayerRequests.find(p => p.id == id);
            if (prayer) {
                document.getElementById('prayer-id').value = prayer.id;
                document.getElementById('prayer-name').value = prayer.name;
                document.getElementById('prayer-email').value = prayer.email;
                document.getElementById('prayer-phone').value = prayer.phone;
                document.getElementById('prayer-category').value = prayer.category.toLowerCase().replace(' ', '-');
                document.getElementById('prayer-request').value = prayer.request;
                document.getElementById('prayer-status').value = prayer.status;
                document.getElementById('prayer-notes').value = prayer.notes;
                
                document.getElementById('prayer-form-title').textContent = 'Edit Prayer Request';
                document.getElementById('prayer-requests-page').classList.remove('active');
                document.getElementById('edit-prayer-page').classList.add('active');
            }
        }

        // Testimony functionality
        function setupTestimonyFunctionality() {
            // Add testimony button
            document.getElementById('add-testimony-btn').addEventListener('click', function(e) {
                e.preventDefault();
                showTestimonyForm();
            });

            // Back to testimonies
            document.getElementById('back-to-testimonies').addEventListener('click', function(e) {
                e.preventDefault();
                hideTestimonyForm();
            });

            // View testimony buttons
            document.querySelectorAll('.view-testimony').forEach(btn => {
                btn.addEventListener('click', function() {
                    const testimonyId = this.getAttribute('data-id');
                    viewTestimony(testimonyId);
                });
            });

            // Edit testimony buttons
            document.querySelectorAll('.edit-testimony').forEach(btn => {
                btn.addEventListener('click', function() {
                    const testimonyId = this.getAttribute('data-id');
                    editTestimony(testimonyId);
                });
            });

            // Form submission
            document.getElementById('testimony-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const isNew = document.getElementById('testimony-id').value === '';
                const action = isNew ? 'added' : 'updated';
                
                alert(`Testimony ${action} successfully!`);
                hideTestimonyForm();
            });
        }

        function showTestimonyForm() {
            resetTestimonyForm();
            document.getElementById('testimonies-page').classList.remove('active');
            document.getElementById('edit-testimony-page').classList.add('active');
            document.getElementById('testimony-form-title').textContent = 'Add New Testimony';
        }

        function hideTestimonyForm() {
            document.getElementById('edit-testimony-page').classList.remove('active');
            document.getElementById('testimonies-page').classList.add('active');
        }

        function resetTestimonyForm() {
            document.getElementById('testimony-form').reset();
            document.getElementById('testimony-id').value = '';
        }

        function viewTestimony(id) {
            const testimony = testimonies.find(t => t.id == id);
            if (testimony) {
                document.getElementById('testimonyModalTitle').textContent = testimony.title;
                document.getElementById('testimony-view-name').textContent = testimony.name;
                document.getElementById('testimony-view-email').textContent = testimony.email;
                document.getElementById('testimony-view-date').textContent = new Date(testimony.date).toLocaleDateString();
                document.getElementById('testimony-view-category').textContent = testimony.category;
                document.getElementById('testimony-view-title').textContent = testimony.title;
                document.getElementById('testimony-view-content').textContent = testimony.content;
                document.getElementById('testimony-view-notes').textContent = testimony.notes || 'No notes available.';
                
                currentItemId = id;
                currentItemType = 'testimony';
                viewTestimonyModal.show();
            }
        }

        function editTestimony(id) {
            const testimony = testimonies.find(t => t.id == id);
            if (testimony) {
                document.getElementById('testimony-id').value = testimony.id;
                document.getElementById('testimony-name').value = testimony.name;
                document.getElementById('testimony-email').value = testimony.email;
                document.getElementById('testimony-location').value = testimony.location || '';
                document.getElementById('testimony-category').value = testimony.category.toLowerCase();
                document.getElementById('testimony-title').value = testimony.title;
                document.getElementById('testimony-content').value = testimony.content;
                document.getElementById('testimony-status').value = testimony.status;
                document.getElementById('testimony-notes').value = testimony.notes || '';
                
                document.getElementById('testimony-form-title').textContent = 'Edit Testimony';
                document.getElementById('testimonies-page').classList.remove('active');
                document.getElementById('edit-testimony-page').classList.add('active');
            }
        }

        // Subscriber functionality
        function setupSubscriberFunctionality() {
            // Add subscriber button
            document.getElementById('add-subscriber-btn').addEventListener('click', function(e) {
                e.preventDefault();
                showSubscriberForm();
            });

            // Back to subscribers
            document.getElementById('back-to-subscribers').addEventListener('click', function(e) {
                e.preventDefault();
                hideSubscriberForm();
            });

            // View subscriber buttons
            document.querySelectorAll('.view-subscriber').forEach(btn => {
                btn.addEventListener('click', function() {
                    const subscriberId = this.getAttribute('data-id');
                    viewSubscriber(subscriberId);
                });
            });

            // Edit subscriber buttons
            document.querySelectorAll('.edit-subscriber').forEach(btn => {
                btn.addEventListener('click', function() {
                    const subscriberId = this.getAttribute('data-id');
                    editSubscriber(subscriberId);
                });
            });

            // Form submission
            document.getElementById('subscriber-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const isNew = document.getElementById('subscriber-id').value === '';
                const action = isNew ? 'added' : 'updated';
                
                alert(`Subscriber ${action} successfully!`);
                hideSubscriberForm();
            });
        }

        function showSubscriberForm() {
            resetSubscriberForm();
            document.getElementById('subscribers-page').classList.remove('active');
            document.getElementById('edit-subscriber-page').classList.add('active');
            document.getElementById('subscriber-form-title').textContent = 'Add New Subscriber';
        }

        function hideSubscriberForm() {
            document.getElementById('edit-subscriber-page').classList.remove('active');
            document.getElementById('subscribers-page').classList.add('active');
        }

        function resetSubscriberForm() {
            document.getElementById('subscriber-form').reset();
            document.getElementById('subscriber-id').value = '';
            document.getElementById('subscriber-join-date').value = new Date().toISOString().split('T')[0];
        }

        function viewSubscriber(id) {
            const subscriber = subscribers.find(s => s.id == id);
            if (subscriber) {
                document.getElementById('subscriberModalTitle').textContent = `Subscriber: ${subscriber.name}`;
                document.getElementById('subscriber-view-name').textContent = subscriber.name;
                document.getElementById('subscriber-view-email').textContent = subscriber.email;
                document.getElementById('subscriber-view-phone').textContent = subscriber.phone;
                document.getElementById('subscriber-view-join-date').textContent = new Date(subscriber.joinDate).toLocaleDateString();
                document.getElementById('subscriber-view-type').textContent = subscriber.type;
                
                const statusBadge = document.getElementById('subscriber-view-status');
                statusBadge.textContent = subscriber.status.charAt(0).toUpperCase() + subscriber.status.slice(1);
                statusBadge.className = 'badge ' + 
                    (subscriber.status === 'active' ? 'bg-success' : 
                     subscriber.status === 'inactive' ? 'bg-warning' : 'bg-secondary');
                
                document.getElementById('subscriber-view-notes').textContent = subscriber.notes || 'No notes available.';
                
                currentItemId = id;
                currentItemType = 'subscriber';
                viewSubscriberModal.show();
            }
        }

        function editSubscriber(id) {
            const subscriber = subscribers.find(s => s.id == id);
            if (subscriber) {
                document.getElementById('subscriber-id').value = subscriber.id;
                document.getElementById('subscriber-name').value = subscriber.name;
                document.getElementById('subscriber-email').value = subscriber.email;
                document.getElementById('subscriber-phone').value = subscriber.phone;
                document.getElementById('subscriber-type').value = subscriber.type;
                document.getElementById('subscriber-join-date').value = subscriber.joinDate;
                document.getElementById('subscriber-status').value = subscriber.status;
                document.getElementById('subscriber-notes').value = subscriber.notes || '';
                
                document.getElementById('subscriber-form-title').textContent = 'Edit Subscriber';
                document.getElementById('subscribers-page').classList.remove('active');
                document.getElementById('edit-subscriber-page').classList.add('active');
            }
        }

        // Delete confirmation functionality
        function setupDeleteConfirmation() {
            // Delete devotional buttons
            document.querySelectorAll('.delete-devotional').forEach(btn => {
                btn.addEventListener('click', function() {
                    currentItemId = this.getAttribute('data-id');
                    currentItemType = 'devotional';
                    deleteModal.show();
                });
            });

            // Delete prayer request buttons
            document.querySelectorAll('.delete-prayer').forEach(btn => {
                btn.addEventListener('click', function() {
                    currentItemId = this.getAttribute('data-id');
                    currentItemType = 'prayer';
                    deleteModal.show();
                });
            });

            // Delete testimony buttons
            document.querySelectorAll('.delete-testimony').forEach(btn => {
                btn.addEventListener('click', function() {
                    currentItemId = this.getAttribute('data-id');
                    currentItemType = 'testimony';
                    deleteModal.show();
                });
            });

            // Delete subscriber buttons
            document.querySelectorAll('.delete-subscriber').forEach(btn => {
                btn.addEventListener('click', function() {
                    currentItemId = this.getAttribute('data-id');
                    currentItemType = 'subscriber';
                    deleteModal.show();
                });
            });

            // Confirm delete button
            document.getElementById('confirm-delete').addEventListener('click', function() {
                if (currentItemId && currentItemType) {
                    // In a real app, you would send a request to your backend to delete the item
                    alert(`Deleting ${currentItemType} with ID: ${currentItemId}`);
                    deleteModal.hide();
                    
                    // Reload the data or remove the item from the UI
                    setTimeout(() => {
                        alert(`${currentItemType} deleted successfully`);
                    }, 500);
                }
            });
        }

        // Helper functions
        function getDevotionalById(id) {
            const devotionals = {
                '1': {
                    title: 'Surviving the HEAT',
                    topic: 'Faith in Trials',
                    verse: 'Jeremiah 17:7-8',
                    date: '2023-06-05',
                    content: 'Blessed is the man that trusteth in the Lord, and whose hope the Lord is. For he shall be as a tree planted by the waters, and that spreadeth out her roots by the river, and shall not see (FEAR) when heat cometh, but her leaf shall be green; and shall not be careful (WORRIED) in the year of drought, neither shall cease from yielding fruit. - Jeremiah 17:7-8\n\nHeat in the Bible and in life generally signifies trouble, hardship, suffering, adversity, and trails.\n\nIn life, we all encounter different levels, dissensions and intensity of heat. However, we should be encouraged that God has also made a way of escape for those who trust and hope in him.',
                    author: 'Maj Gen (Dr) Ezra Jahadi Jakko (Rtd)',
                    status: 'published',
                    coverImage: 'https://via.placeholder.com/800x400'
                },
                '2': {
                    title: 'Peace in the Storm',
                    topic: 'Peace',
                    verse: 'Philippians 4:6-7',
                    date: '2023-06-04',
                    content: 'Do not be anxious about anything, but in every situation, by prayer and petition, with thanksgiving, present your requests to God. And the peace of God, which transcends all understanding, will guard your hearts and your minds in Christ Jesus.\n\nIn a world filled with anxiety and uncertainty, God offers us a peace that surpasses all understanding. This peace comes not from positive thinking or denial of reality, but from a deep trust in God\'s character and promises.',
                    author: 'Maj Gen (Dr) Ezra Jahadi Jakko (Rtd)',
                    status: 'published',
                    coverImage: 'https://via.placeholder.com/800x400'
                },
                '3': {
                    title: 'Walking in Faith',
                    topic: 'Faith',
                    verse: 'Hebrews 11:1',
                    date: '2023-06-03',
                    content: 'Now faith is confidence in what we hope for and assurance about what we do not see.\n\nFaith is not the absence of doubt, but the decision to trust God even when circumstances seem impossible. Like Abraham, we are called to walk by faith, not by sight, believing that God who promised is faithful.',
                    author: 'Pastor John Smith',
                    status: 'published',
                    coverImage: 'https://via.placeholder.com/800x400'
                }
            };
            
            return devotionals[id] || null;
        }
    </script>
</body>
</html>