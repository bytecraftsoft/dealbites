<?php
// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Get the selected category from the URL parameter
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';

// Fetch deals from the database
$dealCategories = getDealCategories();
$popularDeals = getPopularDeals();

// Start the HTML output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DealBites - Discover the Best Dining Deals</title>
    <meta name="description" content="Get overall deals in one place">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6586533842821998"
     crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>

        <!-- Welcome Section -->
        <section class="welcome-section">
            <h1>Welcome to DealBites</h1>
            <p class="subtitle">Discover the Best Dining Deals Near You.</p>
            <p class="description">
                Discover the best discounts on restaurants nearby. Ramadan specials, happy hours, and exclusive meal deals—all in one place!
            </p>
            <a href="explore_deals.php" class="explore-button">Explore Deals</a>
        </section>

        <!-- Category Tabs -->
        <div class="category-tabs">
            <?php
            $categories = ['All', 'Nearby', 'Popular', 'New'];
            foreach ($categories as $category) {
                $lowercaseCategory = strtolower($category);
                $activeClass = ($selectedCategory === $lowercaseCategory) ? 'active' : '';
                echo "<a href='index.php?category={$lowercaseCategory}' class='tab-button {$activeClass}'>{$category}</a>";
            }
            ?>
        </div>

        <!-- Deal Categories -->
        <?php foreach ($dealCategories as $index => $category): ?>
        <section class="deal-category">
            <h2><?php echo htmlspecialchars($category['name']); ?>:</h2>
            <div class="deal-grid">
                <?php foreach ($category['deals'] as $deal): ?>
                <a href="deal_details.php?id=<?php echo $deal['id']; ?>" class="deal-card category-<?php echo $index + 1; ?>">
                    <div class="deal-image" style="background-image: url('<?php echo htmlspecialchars($deal['image']); ?>');background-size: cover;"></div>
                    <div class="deal-info">
                        <h3><?php echo htmlspecialchars($deal['title']); ?></h3>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endforeach; ?>

        <!-- Popular Deals -->
        <section class="popular-deals">
            <h2>Popular Deals:</h2>
            <div class="popular-grid">
                <?php foreach ($popularDeals as $deal): ?>
                <a href="deal_details.php?id=<?php echo $deal['id']; ?>" class="popular-card">
                    <div class="popular-image" style="background-image: url('<?php echo htmlspecialchars($deal['image']); ?>');"></div>
                    <div class="popular-info">
                        <h3><?php echo htmlspecialchars($deal['title']); ?></h3>
                        <p class="price"><?php echo htmlspecialchars($deal['price']); ?></p>
                        <p class="restaurant"><?php echo htmlspecialchars($deal['restaurant']); ?></p>
                        <div class="rating">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $deal['rating']) {
                                    echo '<i class="fas fa-star"></i>';
                                } elseif ($i - 0.5 <= $deal['rating']) {
                                    echo '<i class="fas fa-star-half-alt"></i>';
                                } else {
                                    echo '<i class="far fa-star"></i>';
                                }
                            }
                            ?>
                            <span>(<?php echo $deal['reviews']; ?>)</span>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </section>

        <?php include 'footer.php'; ?>
    </div>

    <script src="script.js"></script>
</body>
</html>

