<?php
include '../config/config.php';

// Validate & sanitize ID
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    echo "<script>alert('Invalid Category ID'); window.location.href='deal_categories.php';</script>";
    exit();
}

// Step 1: Delete related deals
mysqli_query($conn, "DELETE FROM deals WHERE category_id = $id");

// Step 2: Delete the category
$delete = "DELETE FROM deal_categories WHERE id = $id";
if (mysqli_query($conn, $delete)) {
    echo "<script>alert('Category and related deals deleted successfully!'); window.location.href='deal_categories.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
