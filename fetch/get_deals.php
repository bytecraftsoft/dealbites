<?php
include('../config/config.php');

$where = "1";  // default (no filter)
$params = [];

if (!empty($_GET['category'])) {
    $where .= " AND c.name = ?";
    $params[] = $_GET['category'];
}
if (!empty($_GET['city'])) {
    $where .= " AND d.city = ?";
    $params[] = $_GET['city'];
}
if (!empty($_GET['price'])) {
    if ($_GET['price'] === 'Under Rs. 1000') $where .= " AND d.price < 1000";
    elseif ($_GET['price'] === 'Rs. 1000 – 2000') $where .= " AND d.price BETWEEN 1000 AND 2000";
    elseif ($_GET['price'] === 'Above Rs. 2000') $where .= " AND d.price > 2000";
    elseif ($_GET['price'] === 'Premium') $where .= " AND d.is_premium = 1";
}

$orderBy = "d.id DESC";
if (!empty($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'Popular': $orderBy = "d.views DESC"; break;
        case 'Low to High': $orderBy = "d.price ASC"; break;
        case 'High to Low': $orderBy = "d.price DESC"; break;
    }
}

$sql = "SELECT d.*, c.name AS category_name 
        FROM deals d 
        JOIN deal_categories c ON d.category_id = c.id
        WHERE $where ORDER BY $orderBy";

$stmt = $conn->prepare($sql);

if ($params) {
    $types = str_repeat("s", count($params));
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

$deals = [];

while($row = $result->fetch_assoc()) {
    $deals[] = $row;
}

echo json_encode($deals);
?>
