<?php
include '../config/config.php';

if (isset($_GET['id'])) {
    $deal_id = intval($_GET['id']);

    $query = "UPDATE deals SET is_popular = 0 WHERE id = $deal_id";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php?removed=1');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    header('Location: index.php');
    exit;
}
