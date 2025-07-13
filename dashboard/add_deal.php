

<?php
include '../config/config.php';

if (isset($_POST['add'])) {
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
    $is_popular = isset($_POST['is_popular']) ? 1 : 0;

    $image = "";
    if (!empty($_FILES['image']['name'])) {
        $imgName = basename($_FILES['image']['name']);
        $target = "../assets/images/" . $imgName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $image = $imgName;
        }
    }

    $query = "INSERT INTO deals (category_id, title, description, price, original_price, restaurant, rating, views, tag, city, is_popular, image, start_date, end_date, created_at)
              VALUES ('$category_id', '$title', '$description', '$price', '$original_price', '$restaurant', '$rating', '$views', '$tag', '$city', '$is_popular', '$image', '$start_date', '$end_date', NOW())";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Deal added successfully!'); window.location.href='deals.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Deal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0d0d0d; color: #e0e0e0; font-family: 'Roboto', sans-serif; }
        .form-control, .form-select { background-color: #1a1a1a; color: #fff; border: 1px solid #444; }
        .form-control:focus, .form-select:focus { border-color: #666; background-color: #252525; color: #fff; }
        label { font-weight: 500; }
        .btn-primary { background-color: #444; border: none; }
        .btn-primary:hover { background-color: #666; }
        .container { background-color: #1a1a1a; padding: 2rem; border-radius: 10px; margin-top: 2rem; }
        h3 { color: #fff; margin-bottom: 1.5rem; }
    </style>
</head>
<body>
<div class="container">
    <h3>➕ Add New Deal</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                <?php
                $categories = mysqli_query($conn, "SELECT id, name FROM deal_categories ORDER BY name");
                while ($cat = mysqli_fetch_assoc($categories)) {
                    echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3"><label>Title</label><input type="text" name="title" class="form-control" required></div>
        <div class="mb-3"><label>Description</label><textarea name="description" class="form-control" required></textarea></div>
        <div class="mb-3"><label>Price</label><input type="number" name="price" step="0.01" class="form-control" required></div>
        <div class="mb-3"><label>Original Price</label><input type="number" name="original_price" step="0.01" class="form-control"></div>
        <div class="mb-3"><label>Restaurant</label><input type="text" name="restaurant" class="form-control"></div>
        <div class="mb-3"><label>Rating</label><input type="text" name="rating" class="form-control"></div>
        <div class="mb-3"><label>Views</label><input type="number" name="views" class="form-control"></div>
        <div class="mb-3"><label>Tag</label><input type="text" name="tag" class="form-control"></div>
        <div class="mb-3"><label>City</label><input type="text" name="city" class="form-control"></div>
        <div class="mb-3"><label>Start Date</label><input type="date" name="start_date" class="form-control" required></div>
        <div class="mb-3"><label>End Date</label><input type="date" name="end_date" class="form-control" required></div>
        <div class="mb-3"><label>Popular</label><select name="is_popular" class="form-select">
            <option value="1">Yes</option>
            <option value="0" selected>No</option>
        </select></div>
        <div class="mb-3"><label>Upload Image</label><input type="file" name="image" class="form-control"></div>
        <button type="submit" name="add" class="btn btn-primary">Add Deal</button>
        <a href="deals_table.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
