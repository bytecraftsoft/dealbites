<?php
include '../config/config.php';

if (isset($_POST['add_category'])) {
    $name = trim($_POST['category_name']);
    $description = trim($_POST['description']);
    $slug = trim($_POST['slug']);

if (!empty($name) && !empty($description) && !empty($slug)) {
            $query = "INSERT INTO deal_categories (name, description, slug, created_at) 
                  VALUES ('$name', '$description', '$slug', NOW())";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Category added successfully!'); window.location.href='deals.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
    echo "<script>alert('All fields are required.');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d0d0d;
            color: #e0e0e0;
            font-family: 'Roboto', sans-serif;
        }

        .form-control {
            background-color: #1a1a1a;
            color: #fff;
            border: 1px solid #444;
        }

        .form-control:focus {
            background-color: #252525;
            border-color: #666;
            color: #fff;
        }

        .btn-primary {
            background-color: #444;
            border: none;
        }

        .btn-primary:hover {
            background-color: #666;
        }

        .container {
            background-color: #1a1a1a;
            padding: 2rem;
            border-radius: 10px;
            margin-top: 2rem;
            max-width: 600px;
        }

        h3 {
            color: #fff;
            margin-bottom: 1.5rem;
        }

        label {
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>➕ Add New Category</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Category Name *</label>
            <input type="text" name="category_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>Slug (optional)</label>
            <input type="text" name="slug" class="form-control" placeholder="example: fast-food">
        </div>

        <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
        <a href="deals.php" class="btn btn-secondary">Back</a>
    </form>
</div>
<script>
    function validateForm() {
        const name = document.forms[0]["category_name"].value.trim();
        const description = document.forms[0]["description"].value.trim();
        const slug = document.forms[0]["slug"].value.trim();

        if (name === "" || description === "" || slug === "") {
            alert("Please fill in all fields — none can be empty.");
            return false;
        }

        // Optionally: check for slug format (alphanumeric + dash)
        const slugRegex = /^[a-z0-9-]+$/i;
        if (!slugRegex.test(slug)) {
            alert("Slug must contain only letters, numbers, or hyphens (no spaces).");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
