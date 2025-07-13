<?php
include '../config/config.php';

$id = $_GET['id'];
$query = "SELECT * FROM deal_categories WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $slug = $_POST['slug'];

    $update = "UPDATE deal_categories SET name='$name', description='$description', slug='$slug' WHERE id=$id";
    if (mysqli_query($conn, $update)) {
        header("Location: deal_categories.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Deal Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d0d0d;
            color: #e0e0e0;
            font-family: 'Roboto', sans-serif;
        }

        .edit-form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #1a1a1a;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
        }

        .edit-form-container h3 {
            color: #fff;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .form-label {
            color: #ccc;
            font-weight: 500;
        }

        .form-control {
            background-color: #2a2a2a;
            color: #e0e0e0;
            border: 1px solid #444;
        }

        .form-control:focus {
            background-color: #2a2a2a;
            color: #fff;
            border-color: #ffd700;
            box-shadow: none;
        }

        .btn-custom {
            background-color: #ffd700;
            color: #000;
            font-weight: 600;
            border: none;
            padding: 0.6rem 1.5rem;
        }

        .btn-custom:hover {
            background-color: #e6c200;
        }
    </style>
</head>
<body>

<div class="edit-form-container">
    <h3>Edit Deal Category</h3>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($row['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" value="<?= htmlspecialchars($row['slug']) ?>" required>
        </div>

        <button type="submit" name="submit" class="btn btn-custom">Update</button>
    </form>
</div>

</body>
</html>
