<?php
include '../config/config.php';



// Total Deals
$deals_query = mysqli_query($conn, "SELECT COUNT(*) AS total_deals FROM deals");
$deals_count = mysqli_fetch_assoc($deals_query)['total_deals'];

// Deal Categories
$category_query = mysqli_query($conn, "SELECT COUNT(*) AS total_categories FROM deal_categories");
$deal_categories = mysqli_fetch_assoc($category_query)['total_categories'];

// Total Cities (unique city names)
$city_query = mysqli_query($conn, "SELECT COUNT(DISTINCT city) AS total_cities FROM deals WHERE city IS NOT NULL AND city != ''");
$total_cities = mysqli_fetch_assoc($city_query)['total_cities'];

// Total Restaurants (unique restaurant names)
$restaurant_query = mysqli_query($conn, "SELECT COUNT(DISTINCT restaurant) AS total_restaurants FROM deals WHERE restaurant IS NOT NULL AND restaurant != ''");
$total_restaurants = mysqli_fetch_assoc($restaurant_query)['total_restaurants'];
?>
<?php if (isset($_GET['removed'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Popular deal removed successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<?php
$limit = 5;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// Total count
$total_res = mysqli_query($conn, "SELECT COUNT(*) AS total FROM deals WHERE is_popular = 1");
$total_rows = mysqli_fetch_assoc($total_res)['total'];
$total_pages = ceil($total_rows / $limit);

// Main query with pagination
$popular_deals_query = "SELECT d.*, c.name AS category_name 
                        FROM deals d 
                        LEFT JOIN deal_categories c ON d.category_id = c.id 
                        WHERE d.is_popular = 1 
                        ORDER BY d.created_at DESC 
                        LIMIT 5";

$popular_deals_result = mysqli_query($conn, $popular_deals_query);

?>

<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit;
}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .text-gold {
            color: #a2a2a2;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <?php include 'sidebar.php'; ?>




        <!-- Content Start -->
        <div class="content">

            <?php include 'navbar.php'; ?>


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- Total Deals -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark text-white rounded p-4 shadow border border-secondary">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-2 text-muted text-uppercase">Total Deals</p>
                                    <h3 class="mb-0 text-white"><?= $deals_count; ?></h3>
                                </div>
                                <i class="fa fa-tags fa-2x text-gold"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Deal Categories -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark text-white rounded p-4 shadow border border-secondary">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-2 text-muted text-uppercase">Deal Categories</p>
                                    <h3 class="mb-0 text-white"><?= $deal_categories; ?></h3>
                                </div>
                                <i class="fa fa-list fa-2x text-gold"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Total Cities -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark text-white rounded p-4 shadow border border-secondary">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-2 text-muted text-uppercase">Total Cities</p>
                                    <h3 class="mb-0 text-white"><?= $total_cities; ?></h3>
                                </div>
                                <i class="fa fa-city fa-2x text-gold"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Total Restaurants -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark text-white rounded p-4 shadow border border-secondary">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-2 text-muted text-uppercase">Restaurants</p>
                                    <h3 class="mb-0 text-white"><?= $total_restaurants; ?></h3>
                                </div>
                                <i class="fa fa-utensils fa-2x text-gold"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Sale & Revenue End -->

            <!-- Popular Deals Section -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-dark text-white rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="mb-0 text-gold">🔥 Popular Deals</h5>
                        <a href="deals.php" class="btn btn-sm btn-outline-light">Manage Deals</a>
                    </div>
                    <div class="table-responsive">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" id="searchInput"
                                    class="form-control bg-dark text-white border-secondary"
                                    placeholder="Search by City or Category">
                            </div>
                        </div>

                        <table id="popularDealsTable"
                            class="table table-dark table-bordered text-white text-center align-middle mb-0">
                            <thead class="bg-secondary text-gold">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Rating</th>
                                    <th>City</th>
                                    <th>Restaurant</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($popular_deals_result) > 0):
                                    $i = 1;
                                    while ($deal = mysqli_fetch_assoc($popular_deals_result)): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $deal['title']; ?></td>
                                            <td><?= $deal['category_name'] ?? 'N/A'; ?></td>
                                            <td>$<?= number_format($deal['price'], 2); ?></td>
                                            <td><?= $deal['rating'] ?? 'N/A'; ?> ★</td>
                                            <td><?= $deal['city'] ?? '—'; ?></td>
                                            <td><?= $deal['restaurant']; ?></td>
                                            <td>
                                              <?php 
$imagePath = "../assets/images/" . $deal['image'];
if (!empty($deal['image']) && file_exists($imagePath)): ?>
    <img src="<?= $imagePath ?>" alt="Deal" style="width: 60px; height: 40px; object-fit: cover;">
<?php else: ?>
    <span class="text-muted">No Image</span>
<?php endif; ?>

                                            </td>
                                            <td>
                                                <a href="remove_popular.php?id=<?= $deal['id']; ?>"
                                                    class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to remove this deal from Popular?')">
                                                    Remove
                                                </a>
                                            </td>

                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-muted">No popular deals available.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            <nav>
                                <ul class="pagination pagination-sm">
                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                                            <a class="page-link bg-dark text-white border-secondary"
                                                href="?page=<?= $i; ?>">
                                                <?= $i; ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>





            <?php include 'footer.php'; ?>

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            var filter = this.value.toLowerCase();
            var rows = document.querySelectorAll("#popularDealsTable tbody tr");

            rows.forEach(function (row) {
                var city = row.querySelector("td:nth-child(6)").innerText.toLowerCase();
                var category = row.querySelector("td:nth-child(3)").innerText.toLowerCase();
                row.style.display = (city.includes(filter) || category.includes(filter)) ? "" : "none";
            });
        });
    </script>

</body>

</html>