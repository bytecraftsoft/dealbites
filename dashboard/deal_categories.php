<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DarkPan - Deal Categories</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            background-color: #0d0d0d !important;
            color: #e0e0e0 !important;
            font-family: 'Open Sans', 'Roboto', sans-serif;
            font-size: 15px;
            margin: 0;
            padding: 0;
        }

        h6 {
            color: #ffffff;
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 1.2rem;
            font-family: 'Roboto', sans-serif;
        }

        .custom-table {
            background-color: #1a1a1a !important;
            color: #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            border-collapse: separate;
            border-spacing: 0;
        }

        .custom-table thead {
            background-color: #2a2a2a !important;
            color: #cccccc;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .custom-table th,
        .custom-table td {
            padding: 0.8rem 1rem;
            border: 1px solid #333;
            text-align: center;
            vertical-align: middle;
        }

        .custom-table tbody tr:hover {
            background-color: #252525;
            transition: background-color 0.2s ease-in-out;
        }

        .table-responsive {
            margin-top: 1rem;
            border-radius: 10px;
            overflow-x: auto;
        }

        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #444;
            border-radius: 3px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #1a1a1a !important;
        }

        .content-section {
            background-color: #1a1a1a !important;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }
        .pagination .page-link {
    background-color: #1a1a1a;
    color: #e0e0e0;
    border: 1px solid #444;
    margin: 0 3px;
    transition: 0.2s;
}

.pagination .page-link:hover {
    background-color: #333;
    color: #ffffff;
}

.pagination .page-item.active .page-link {
    background-color: #333 !important;
    color: #ffffff !important;
    border: 1px solid #555 !important;
}

    </style>
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Main Content -->
        <div class="content">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="content-section">
                            <h6 class="mb-4">Deal Categories (Database View)</h6>
                            <div class="table-responsive">
                                <table class="table custom-table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Slug</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                  <?php
include '../config/config.php';

$limit = 15; // Records per page

// Current page number from URL (default = 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page <= 0) $page = 1;

// Calculate offset
$offset = ($page - 1) * $limit;

// Fetch limited records
$query = "SELECT * FROM deal_categories LIMIT $offset, $limit";
$result = mysqli_query($conn, $query);

// Fetch total records for pagination count
$countQuery = "SELECT COUNT(*) AS total FROM deal_categories";
$countResult = mysqli_query($conn, $countQuery);
$totalRows = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($totalRows / $limit);

// Display table rows
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['description']}</td>";
    echo "<td>{$row['slug']}</td>";
    echo "<td>{$row['created_at']}</td>";
    echo "</tr>";
}
?>

                                </table>
                                <?php if ($totalPages > 1): ?>
<nav aria-label="Page navigation" class="mt-4">
    <ul class="pagination justify-content-center">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link bg-dark text-light border-secondary" href="?page=<?php echo $page - 1; ?>">« Prev</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                <a class="page-link bg-dark text-light border-secondary <?php if ($page == $i) echo 'fw-bold'; ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <li class="page-item">
                <a class="page-link bg-dark text-light border-secondary" href="?page=<?php echo $page + 1; ?>">Next »</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template JS -->
    <script src="js/main.js"></script>
</body>
</html>
