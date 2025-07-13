<?php
include 'config/config.php';

// Get filters
$category = $_GET['category'] ?? '';
$city = $_GET['city'] ?? '';
$price = $_GET['price'] ?? '';
$sort = $_GET['sort'] ?? '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 12;
$offset = ($page - 1) * $limit;

// Build WHERE clause
$where = "1=1";

// Filter by category name (resolve to category_id)
if (!empty($category)) {
    $category = mysqli_real_escape_string($conn, $category);
    $catRes = mysqli_query($conn, "SELECT id FROM deal_categories WHERE name = '$category' LIMIT 1");
    if ($catRow = mysqli_fetch_assoc($catRes)) {
        $catId = $catRow['id'];
        $where .= " AND category_id = '$catId'";
    } else {
        $where .= " AND 0"; // No match found, return empty result
    }
}

// Filter by city
if (!empty($city)) {
    $city = mysqli_real_escape_string($conn, $city);
    $where .= " AND city = '$city'";
}

// Filter by price
if (!empty($price)) {
    if ($price == "Under Rs. 1000") {
        $where .= " AND price < 1000";
    } elseif ($price == "Rs. 1000 – 2000") {
        $where .= " AND price BETWEEN 1000 AND 2000";
    } elseif ($price == "Above Rs. 2000") {
        $where .= " AND price > 2000";
    } elseif ($price == "Premium") {
        $where .= " AND is_premium = 1";
    }
}

// Sorting
$order = "ORDER BY RAND()";
if ($sort == "Latest") {
    $order = "ORDER BY created_at DESC";
} elseif ($sort == "Popular") {
    $order = "ORDER BY views DESC";
} elseif ($sort == "Low to High") {
    $order = "ORDER BY price ASC";
} elseif ($sort == "High to Low") {
    $order = "ORDER BY price DESC";
}

// Total count for pagination
$totalSql = "SELECT COUNT(*) AS total FROM deals WHERE $where";
$totalResult = mysqli_query($conn, $totalSql);
$totalRow = mysqli_fetch_assoc($totalResult);
$total = $totalRow['total'];
$totalPages = ceil($total / $limit);

// Final query
$sql = "SELECT * FROM deals WHERE $where $order LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);

// Generate HTML
$html = '<style>
.category-card {
    background-color: #1e1e1e;
    border-radius: 12px;
    overflow: hidden;
    margin: 1rem;
    width: 100%;
    max-width: 300px;
    display: inline-block;
    vertical-align: top;
    box-shadow: 0 4px 10px rgba(0,0,0,0.4);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.category-card:hover {
    transform: scale(1.04);
    box-shadow: 0 6px 12px rgba(0,0,0,0.5);
}
.category-card-link {
    color: inherit;
    text-decoration: none;
    display: block;
}
.category-card-img {
    width: 100%;
    height: 190px;
    background-size: cover;
    background-position: center;
    background-color: #333;
}
.category-card-content {
    padding: 1rem;
}
.category-card-title {
    font-size: 1.15rem;
    font-weight: 600;
    color: #f8f9f6;
    margin-bottom: 0.4rem;
}
.category-card-meta {
    font-size: 0.9rem;
    color: #bbb;
    margin-bottom: 0.4rem;
}
.category-card-tag {
    display: inline-block;
    background: #7b5222;
    color: #fff;
    font-size: 0.75rem;
    padding: 0.3rem 0.6rem;
    border-radius: 4px;
    margin-top: 0.5rem;
}
.pagination {
    margin-top: 2rem;
    text-align: center;
}
.pagination .page-link {
    display: inline-block;
    margin: 0 5px;
    padding: 0.45rem 0.9rem;
    background-color: #2a2a2a;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s ease;
}
.pagination .page-link.active,
.pagination .page-link:hover {
    background-color: #7b5222;
}
</style>';

while ($row = mysqli_fetch_assoc($result)) {
    $imagePath = !empty($row['image']) && file_exists("assets/images/{$row['image']}")
        ? "assets/images/{$row['image']}"
        : "assets/images/default.jpg";

    $tag = !empty($row['tag']) ? "<div class='category-card-tag'>{$row['tag']}</div>" : '';

    $html .= "
    <div class='category-card'>
        <a href='deal-details.php?id={$row['id']}' class='category-card-link'>
            <div class='category-card-img' style='background-image: url({$imagePath});'></div>
            <div class='category-card-content'>
                <div class='category-card-title'>{$row['title']}</div>
                <div class='category-card-meta'>Rs. {$row['price']} | {$row['city']}</div>
                {$tag}
            </div>
        </a>
    </div>";
}

// Pagination links
if ($totalPages > 1) {
    $html .= "<div class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        $active = ($i == $page) ? 'active' : '';
        $html .= "<a href='#' class='page-link {$active}' data-page='{$i}'>{$i}</a>";
    }
    $html .= "</div>";
}

echo $html;
?>
