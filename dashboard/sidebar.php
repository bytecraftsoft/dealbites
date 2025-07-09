<!-- Sidebar Start -->
 <style>
    :root {
        --primary: #ffffff;
        --secondary: #1f1f1f;
        --light: #aaaaaa;
        --dark: #0d0d0d;
        --gray-medium: #2a2a2a;
        --gray-light: #3a3a3a;
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }

    .sidebar {
        background-color: var(--secondary) !important;
        box-shadow: var(--shadow);
    }

    .sidebar .navbar {
        background-color: var(--secondary) !important;
    }

    .sidebar .navbar .navbar-brand {
        color: var(--primary);
    }

    .sidebar .navbar .navbar-brand h3 {
        color: var(--primary) !important;
    }

    .sidebar .navbar-nav .nav-link {
        padding: 7px 20px;
        color: var(--light);
        font-weight: 500;
        border-left: 3px solid transparent;
        border-radius: 0 30px 30px 0;
    }

    .sidebar .navbar-nav .nav-link:hover,
    .sidebar .navbar-nav .nav-link.active {
        color: var(--primary);
        background-color: var(--gray-medium);
        border-color: var(--primary);
    }

    .sidebar .navbar-nav .nav-link i {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: var(--gray-light);
        border-radius: 40px;
        color: var(--primary);
    }

    .sidebar .navbar .dropdown-menu {
        background-color: var(--secondary);
    }

    .sidebar .navbar .dropdown-item {
        color: var(--light);
        padding-left: 25px;
        border-radius: 0 30px 30px 0;
    }

    .sidebar .navbar .dropdown-item:hover,
    .sidebar .navbar .dropdown-item.active {
        background-color: var(--gray-medium);
        color: var(--primary);
    }
</style>

<div class="sidebar pe-4 pb-3">
    <nav class="navbar" style="background-color: var(--secondary);">
        <a href="index.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-white"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3 text-white">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu border-0" style="background-color: var(--gray-medium);">
                    <a href="button.php" class="dropdown-item text-white">Buttons</a>
                    <a href="typography.php" class="dropdown-item text-white">Typography</a>
                    <a href="element.php" class="dropdown-item text-white">Other Elements</a>
                </div>
            </div>

            <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
            <a href="form.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
            <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
            <a href="deals.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Deals</a>
            <a href="deal_categories.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Deal Categories</a>
            <a href="chart.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu border-0" style="background-color: var(--gray-medium);">
                    <a href="signin.php" class="dropdown-item text-white">Sign In</a>
                    <a href="signup.php" class="dropdown-item text-white">Sign Up</a>
                    <a href="404.php" class="dropdown-item text-white">404 Error</a>
                    <a href="blank.php" class="dropdown-item text-white">Blank Page</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
