<?php
require_once 'config.php';
require_once 'functions.php';

// Get the current page number from the URL parameter
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 12; // Number of deals per page

// Get the selected category from the URL parameter
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';

// Fetch deals based on the selected category and pagination
$deals = getDeals($selectedCategory, $page, $perPage);
$totalDeals = getTotalDeals($selectedCategory);
$totalPages = ceil($totalDeals / $perPage);

// Fetch all categories for the filter
$allCategories = getAllCategories();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Deals - DealBites</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6586533842821998"
     crossorigin="anonymous"></script>
    
    <style>
        .explore-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .category-filter {
            width: 20%;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
        }
        .deals-grid {
            width: 75%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #df7777;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .pagination a.active {
            background-color: #b8a0a0;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>

        <h1>Explore Deals</h1>

        <div class="explore-container">
            <div class="category-filter">
                <h2>Categories</h2>
                <ul>
                    <li><a href="?category=all" <?php echo $selectedCategory === 'all' ? 'class="active"' : ''; ?>>All Deals</a></li>
                    <?php foreach ($allCategories as $category): ?>
                        <li>
                            <a href="?category=<?php echo $category['id']; ?>" <?php echo $selectedCategory == $category['id'] ? 'class="active"' : ''; ?>>
                                <?php echo htmlspecialchars($category['name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="deals-grid">
                <?php if (empty($deals)): ?>
                    <p>No deals found for this category.</p>
                <?php else: ?>
                    <?php foreach ($deals as $deal): ?>
                    <a href="deal_details.php?id=<?php echo $deal['id']; ?>" class="deal-card">
                        <div class="deal-image" style="background-image: url('<?php echo htmlspecialchars($deal['image']); ?>');"></div>
                        <div class="deal-info">
                            <h3><?php echo htmlspecialchars($deal['title']); ?></h3>
                            <p class="price">$<?php echo number_format($deal['price'], 2); ?></p>
                            <p class="restaurant"><?php echo htmlspecialchars($deal['restaurant']); ?></p>
                        </div>
                    </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>&category=<?php echo $selectedCategory; ?>" <?php echo $page === $i ? 'class="active"' : ''; ?>><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>

        <?php include 'footer.php'; ?>
    </div>

    <script src="script.js"></script>
</body>
</html>

