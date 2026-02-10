<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Learner</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #5fcf80;
            --primary-dark: #4ab56e;
            --sidebar-bg: #1a1d29;
            --sidebar-hover: #2a2d3a;
            --topbar-bg: #ffffff;
            --content-bg: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--content-bg);
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--sidebar-bg);
            color: white;
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 20px;
            background: rgba(95, 207, 128, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .sidebar-menu a i {
            margin-right: 12px;
            font-size: 18px;
            width: 20px;
        }

        .sidebar-menu a:hover {
            background: var(--sidebar-hover);
            color: white;
            padding-left: 25px;
        }

        .sidebar-menu a.active {
            background: var(--primary-color);
            color: white;
            border-left: 4px solid white;
        }

        /* Main Content Area */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Topbar Styles */
        .topbar {
            background: var(--topbar-bg);
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .topbar h5 {
            margin: 0;
            color: #1a1d29;
            font-weight: 600;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .btn-view-site {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-view-site:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        /* Content Area */
        .content {
            padding: 30px;
        }

        /* Dashboard Cards */
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .stats-card.card-courses {
            border-left-color: #5fcf80;
        }

        .stats-card.card-students {
            border-left-color: #47b2e4;
        }

        .stats-card.card-instructors {
            border-left-color: #ffc107;
        }

        .stats-card.card-blogs {
            border-left-color: #e74c3c;
        }

        .stats-card .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .card-courses .icon-box {
            background: rgba(95, 207, 128, 0.1);
            color: #5fcf80;
        }

        .card-students .icon-box {
            background: rgba(71, 178, 228, 0.1);
            color: #47b2e4;
        }

        .card-instructors .icon-box {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .card-blogs .icon-box {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }

        .stats-card h5 {
            color: #6c757d;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .stats-card h2 {
            color: #1a1d29;
            font-size: 32px;
            font-weight: 700;
            margin: 0;
        }

        .stats-card .change {
            font-size: 13px;
            margin-top: 10px;
        }

        .change.positive {
            color: #5fcf80;
        }

        .change.negative {
            color: #e74c3c;
        }

        /* Page Header */
        .page-header {
            margin-bottom: 30px;
        }

        .page-header h3 {
            color: #1a1d29;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .page-header p {
            color: #6c757d;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -260px;
            }

            .main-content {
                margin-left: 0;
            }

            .topbar {
                padding: 15px;
            }

            .content {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h1><i class="bi bi-book"></i> Learner</h1>
        </div>
        <div class="sidebar-menu">
            <a href="/admin/dashboard" class="active">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a href="/admin/courses">
                <i class="bi bi-journal-bookmark"></i>
                <span>Courses</span>
            </a>
            <a href="/admin/students">
                <i class="bi bi-people"></i>
                <span>Students</span>
            </a>
            <a href="/admin/instructors">
                <i class="bi bi-person-badge"></i>
                <span>Instructors</span>
            </a>
            <a href="/admin/blogs">
                <i class="bi bi-newspaper"></i>
                <span>Blogs</span>
            </a>
            <a href="/admin/events">
                <i class="bi bi-calendar-event"></i>
                <span>Events</span>
            </a>
            <a href="/admin/pricing">
                <i class="bi bi-tag"></i>
                <span>Pricing</span>
            </a>
            <a href="/admin/settings">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <h5>Dashboard Overview</h5>
            <div class="topbar-right">
                <div class="user-info">
                    <span>Welcome, <strong>Admin</strong></span>
                    <div class="user-avatar">A</div>
                </div>
                <a href="/" class="btn-view-site">
                    <i class="bi bi-eye"></i> View Site
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>