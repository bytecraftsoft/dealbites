<?php
require_once 'config.php';
require_once 'functions.php';

// Get search parameters
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$category = isset($_GET['category']) ? intval($_GET['category']) : 0;
$minPrice = isset($_GET['min_price']) ? floatval($_GET['min_price']) : 0;
$maxPrice = isset($_GET['max_price']) ? floatval($_GET['max_price']) : PHP_FLOAT_MAX;

// Fetch search results
$searchResults = searchDeals($keyword, $category, $minPrice, $maxPrice);

// Fetch all categories for the filter
$allCategories = getAllCategories();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Deals - DealBites</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6586533842821998"
     crossorigin="anonymous"></script>
    <style>
        .search-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .search-filters {
            width: 40%;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
            margin: inherit; 
        }
        .search-results {
            width: 70%;
        }
        .filter-section {
            margin-bottom: 20px;
        }
        .filter-section h3 {
            margin-bottom: 10px;
        }
        .price-inputs {
            display: flex;
            justify-content: space-between;
        }
        .price-inputs input {
            width: 45%;
        }
        .search-result-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
        }
        .search-result-image {
            width: 150px;
            height: 150px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            margin-right: 15px;
        }
        .search-result-info {
            flex: 1;
        }
        .search-result-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .search-result-restaurant {
            color: #666;
            margin-bottom: 5px;
        }
        .search-result-price {
            font-weight: bold;
            color: #df7777;
            margin-bottom: 5px;
        }
        .search-result-description {
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>

        <h1>Search Results</h1>

        <div class="search-container">
            <div class="search-filters">
                <form action="search.php" method="GET">
                    <div class="filter-section">
                        <h3>Keyword</h3>
                        <input type="text" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Search deals...">
                    </div>

                    <div class="filter-section">
                        <h3>Category</h3>
                        <select name="category">
                            <option value="0">All Categories</option>
                            <?php foreach ($allCategories as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>" <?php echo $category == $cat['id'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($cat['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-section">
                        <h3>Price Range</h3>
                        <div class="price-inputs">
                            <input type="number" name="min_price" value="<?php echo $minPrice; ?>" placeholder="Min Price">
                            <input type="number" name="max_price" value="<?php echo $maxPrice < PHP_FLOAT_MAX ? $maxPrice : ''; ?>" placeholder="Max Price">
                        </div>
                    </div>

                    <button type="submit" class="search-button">Apply Filters</button>
                </form>
            </div>

            <div class="search-results">
                <?php if (empty($searchResults)): ?>
                    <p>No results found. Try adjusting your search criteria.</p>
                <?php else: ?>
                    <?php foreach ($searchResults as $deal): ?>
                        <div class="search-result-card">
                            <div class="search-result-image" style="background-image: url('<?php echo htmlspecialchars($deal['image']); ?>');"></div>
                            <div class="search-result-info">
                                <h2 class="search-result-title"><?php echo htmlspecialchars($deal['title']); ?></h2>
                                <p class="search-result-restaurant"><?php echo htmlspecialchars($deal['restaurant']); ?></p>
                                <p class="search-result-price">$<?php echo number_format($deal['price'], 2); ?></p>
                                <p class="search-result-description"><?php echo htmlspecialchars(substr($deal['description'], 0, 100)) . '...'; ?></p>
                                <a href="deal_details.php?id=<?php echo $deal['id']; ?>" class="btn">View Deal</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>

    <script src="script.js"></script>
</body>
</html>

