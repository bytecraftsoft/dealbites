<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

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
        /* -------- Premium Dark Table (Greyscale & Elegant) -------- */
        body {
            background-color: #0d0d0d !important;
            color: #e0e0e0 !important;
            font-family: 'Open Sans', 'Roboto', sans-serif;
            font-size: 15px;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        h6 {
            color: #ffffff !important;
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 1.2rem;
            font-family: 'Roboto', sans-serif;
        }

        /* Table Wrapper */
        .table-wrapper {
            background-color: #1a1a1a !important;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4) !important;
        }

        /* Deals Table */
        .custom-table {
            background-color: #1a1a1a !important;
            color: #e0e0e0 !important;
            border-radius: 8px;
            font-size: 0.95rem;
            overflow: hidden;
            border-collapse: separate;
            border-spacing: 0;
        }

        /* Header */
        .custom-table thead {
            background-color: #2a2a2a !important;
            color: #cccccc !important;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        /* Cells */
        .custom-table th,
        .custom-table td {
            padding: 0.8rem 1rem;
            border: 1px solid #333;
            text-align: center;
            vertical-align: middle;
        }

        /* Hover */
        .custom-table tbody tr:hover {
            background-color: #252525 !important;
            transition: background-color 0.2s ease-in-out;
        }

        /* Images */
        .custom-table td img {
            border-radius: 4px;
            height: 48px;
            width: auto;
            object-fit: cover;
            border: 1px solid #444;
        }

        /* Boolean indicators */
        .custom-table td[data-yesno="yes"] {
            color: #cccccc !important;
            font-weight: 500;
        }

        .custom-table td[data-yesno="no"] {
            color: #777777 !important;
            font-weight: 400;
        }

        /* Highlighted Text */
        .custom-table td:nth-child(4) {
            /* Title */
            font-weight: 600;
            color: #ffffff !important;
        }

        .custom-table td:nth-child(6),
        .custom-table td:nth-child(7) {
            /* Price, Original Price */
            font-weight: 600;
            color: #dddddd !important;
        }

        /* Muted */
        .custom-table td:nth-child(16),
        .custom-table td:nth-child(17) {
            font-style: italic;
            color: #999999 !important;
        }

        /* Table Container */
        .table-responsive {
            margin-top: 1rem;
            border-radius: 10px;
            overflow-x: auto;
        }

        /* Scrollbar */
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

        .background-color-black {
            background-color: #1a1a1a !important;

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
                        <?php include 'navbar.php'; ?>

            <!-- Table Content -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 background-color-black ">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4  background-color-black">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-hover text-light align-middle bg-dark custom-table">
                                    <thead>
                                        <tr>
                                            <th>Actions</th>

                                            <th>ID</th>
                                            <th>Promoted</th>
                                            <th>Category ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Original Price</th>
                                            <th>Restaurant</th>
                                            <th>Image</th>
                                            <th>Popular</th>
                                            <th>Rating</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Created At</th>
                                            <th>City</th>
                                            <th>Tag</th>
                                            <th>Views</th>
                                            <th>Premium</th>
                                        </tr>
                                    </thead>

                                  <tbody>
    <?php
    include '../config/config.php';

    // Pagination Setup
    $limit = 15;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Total Records
    $totalQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM deals");
    $totalData = mysqli_fetch_assoc($totalQuery);
    $totalRecords = $totalData['total'];
    $totalPages = ceil($totalRecords / $limit);

    // Fetch Paginated Deals
    $query = "SELECT * FROM deals ORDER BY id DESC LIMIT $offset, $limit";
    $result = mysqli_query($conn, $query);

    // Show Records
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";

        // 1️⃣ Action buttons column
       echo "<td>
    <div class='d-flex justify-content-center gap-2'>
        <a href='edit_deal.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
        <a href='delete_deal.php?id={$row['id']}' onclick='return confirm(\"Delete this deal?\")' class='btn btn-sm btn-danger'>Delete</a>
    </div>
</td>";


        // 2️⃣ ID column
        echo "<td>{$row['id']}</td>";

        // 3️⃣ The rest of your columns
        echo "<td data-yesno='" . ($row['is_Promoted'] ? 'yes' : 'no') . "'>" . ($row['is_Promoted'] ? 'Yes' : 'No') . "</td>";
        echo "<td>{$row['category_id']}</td>";
        echo "<td>{$row['title']}</td>";
        echo "<td>{$row['description']}</td>";
        echo "<td>{$row['price']}</td>";
        echo "<td>{$row['original_price']}</td>";
        echo "<td>{$row['restaurant']}</td>";
        echo "<td><img src='../assets/images/{$row['image']}' width='60' height='60'></td>";
        echo "<td data-yesno='" . ($row['is_popular'] ? 'yes' : 'no') . "'>" . ($row['is_popular'] ? 'Yes' : 'No') . "</td>";
        echo "<td>{$row['rating']}</td>";
        echo "<td>{$row['start_date']}</td>";
        echo "<td>{$row['end_date']}</td>";
        echo "<td>{$row['created_at']}</td>";
        echo "<td>{$row['city']}</td>";
        echo "<td>{$row['tag']}</td>";
        echo "<td>{$row['views']}</td>";
        echo "<td data-yesno='" . ($row['is_premium'] ? 'yes' : 'no') . "'>" . ($row['is_premium'] ? 'Yes' : 'No') . "</td>";

        echo "</tr>";
    }
    ?>
</tbody>


                                </table>
                                <?php if ($totalPages > 1): ?>
                                    <nav aria-label="Deals Table Pagination" class="mt-4">
                                        <ul class="pagination justify-content-center">
                                            <?php if ($page > 1): ?>
                                                <li class="page-item">
                                                    <a class="page-link bg-dark text-light border-secondary"
                                                        href="?page=<?php echo $page - 1; ?>">« Prev</a>
                                                </li>
                                            <?php endif; ?>

                                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                                    <a class="page-link bg-dark text-light border-secondary"
                                                        href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                                </li>
                                            <?php endfor; ?>

                                            <?php if ($page < $totalPages): ?>
                                                <li class="page-item">
                                                    <a class="page-link bg-dark text-light border-secondary"
                                                        href="?page=<?php echo $page + 1; ?>">Next »</a>
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
            <!-- End Table -->
                               <?php include 'footer.php'; ?>

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