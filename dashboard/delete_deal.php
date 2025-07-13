<?php
include '../config/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid or missing ID.");
}

$id = (int)$_GET['id'];

// Check if record exists
$checkQuery = mysqli_query($conn, "SELECT * FROM deals WHERE id = $id");
if (mysqli_num_rows($checkQuery) == 0) {
    die("Record does not exist.");
}

// Delete image if exists
$row = mysqli_fetch_assoc($checkQuery);
$image = $row['image'];
$imagePath = "../assets/images/" . $image;
if (file_exists($imagePath)) {
    unlink($imagePath); // delete image file
}

// Delete deal
$deleteQuery = "DELETE FROM deals WHERE id = $id";
if (mysqli_query($conn, $deleteQuery)) {
    echo "<script>alert('Deal deleted successfully.'); window.location.href='deals.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
