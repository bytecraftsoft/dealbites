<?php
include '../config/config.php';

if (!isset($_GET['id'])) die('ID is required');
$id = $_GET['id'];

$query = "SELECT * FROM deals WHERE id = $id";
$result = mysqli_query($conn, $query);
if (!$result || mysqli_num_rows($result) == 0) die('Deal not found.');

$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $original_price = $_POST['original_price'];
    $restaurant = $_POST['restaurant'];
    $rating = $_POST['rating'];
    $views = $_POST['views'];
    $tag = $_POST['tag'];
    $city = $_POST['city'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $is_popular = $_POST['is_popular'];

    $image = $row['image'];
    if (!empty($_FILES['image']['name'])) {
        $imgName = basename($_FILES['image']['name']);
        $target = "../assets/images/" . $imgName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $image = $imgName;
        }
    }

    $updateQuery = "UPDATE deals SET 
        category_id = '$category_id',
        title = '$title',
        description = '$description',
        price = '$price',
        original_price = '$original_price',
        restaurant = '$restaurant',
        rating = '$rating',
        views = '$views',
        tag = '$tag',
        city = '$city',
        start_date = '$start_date',
        end_date = '$end_date',
        is_popular = '$is_popular',
        image = '$image'
        WHERE id = $id";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Deal updated successfully!'); window.location.href='deals.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Deal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0d0d0d; color: #e0e0e0; font-family: 'Roboto', sans-serif; }
        .form-control, .form-select { background-color: #1a1a1a; color: #fff; border: 1px solid #444; }
        .form-control:focus, .form-select:focus { border-color: #666; background-color: #252525; color: #fff; }
        label { font-weight: 500; }
        .btn-warning { background-color: #ffc107; border: none; }
        .btn-warning:hover { background-color: #e0a800; }
        .btn-secondary { background-color: #444; border: none; }
        .btn-secondary:hover { background-color: #666; }
        .container { background-color: #1a1a1a; padding: 2rem; border-radius: 10px; margin-top: 2rem; }
        h3 { color: #fff; margin-bottom: 1.5rem; }
    </style>
</head>
<body>
<div class="container">
    <h3>✏️ Edit Deal #<?= $row['id'] ?></h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3"><label>Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                <?php
                $categories = mysqli_query($conn, "SELECT id, name FROM deal_categories ORDER BY name");
                while ($cat = mysqli_fetch_assoc($categories)) {
                    $selected = $cat['id'] == $row['category_id'] ? "selected" : "";
                    echo "<option value='{$cat['id']}' $selected>{$cat['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3"><label>Title</label><input type="text" name="title" class="form-control" value="<?= $row['title'] ?>" required></div>
        <div class="mb-3"><label>Description</label><textarea name="description" class="form-control" required><?= $row['description'] ?></textarea></div>
        <div class="mb-3"><label>Price</label><input type="number" name="price" step="0.01" class="form-control" value="<?= $row['price'] ?>" required></div>
        <div class="mb-3"><label>Original Price</label><input type="number" name="original_price" step="0.01" class="form-control" value="<?= $row['original_price'] ?>"></div>
        <div class="mb-3"><label>Restaurant</label><input type="text" name="restaurant" class="form-control" value="<?= $row['restaurant'] ?>"></div>
        <div class="mb-3"><label>Rating</label><input type="text" name="rating" class="form-control" value="<?= $row['rating'] ?>"></div>
        <div class="mb-3"><label>Views</label><input type="number" name="views" class="form-control" value="<?= $row['views'] ?>"></div>
        <div class="mb-3"><label>Tag</label><input type="text" name="tag" class="form-control" value="<?= $row['tag'] ?>"></div>
        <div class="mb-3"><label>City</label><input type="text" name="city" class="form-control" value="<?= $row['city'] ?>"></div>
        <div class="mb-3"><label>Start Date</label><input type="date" name="start_date" class="form-control" value="<?= $row['start_date'] ?>"></div>
        <div class="mb-3"><label>End Date</label><input type="date" name="end_date" class="form-control" value="<?= $row['end_date'] ?>"></div>
        <div class="mb-3"><label>Popular</label>
            <select name="is_popular" class="form-select">
                <option value="1" <?= $row['is_popular'] == 1 ? 'selected' : '' ?>>Yes</option>
                <option value="0" <?= $row['is_popular'] == 0 ? 'selected' : '' ?>>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Current Image</label><br>
            <img src="../assets/images/<?= $row['image'] ?>" width="100" class="mb-2 rounded border">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" name="update" class="btn btn-warning">💾 Save Changes</button>
            <a href="deals_table.php" class="btn btn-secondary">← Back to Table</a>
        </div>
    </form>
</div>
</body>
</html>
