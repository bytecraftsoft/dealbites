<?php
include('../config/config.php');

$sql = "SELECT name FROM deal_categories ORDER BY RAND() LIMIT 6";
$result = $conn->query($sql);

$cats = [];

while($row = $result->fetch_assoc()) {
    $cats[] = $row['name'];
}

echo json_encode($cats);
?>
