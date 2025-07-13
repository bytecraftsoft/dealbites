<?php
include 'config/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid deal ID.");
}

$deal_id = (int) $_GET['id'];

$query = "SELECT * FROM deals WHERE id = $deal_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 0) {
    die("Deal not found.");
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($row['title']); ?> | Deal Details</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background: #121212;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .deal-details-section {
            padding: 6rem 2rem 4rem;
            background: #1a1a1a;
            color: #f8f9f6;
            min-height: 100vh;
        }

        .deal-details-card {
            background-color: #222;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.5);
            padding: 2rem;
            display: flex;
            flex-wrap: wrap;
            max-width: 1100px;
            margin: 0 auto;
            gap: 2rem;
            align-items: flex-start;
        }

        .deal-image-large {
            flex: 0 0 460px;
        }

        .deal-image-large img {
            width: 100%;
            border-radius: 10px;
            object-fit: cover;
            display: block;
        }

        .deal-details-content {
            flex: 1;
            font-size: 1.05rem;
            line-height: 1.6;
        }

        .deal-details-content h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #fff;
        }

        .deal-details-content p {
            margin-bottom: 0.7rem;
            color: #ddd;
        }

        .deal-details-content strong {
            color: #ffcc66;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="deal-details-section">
        <div class="deal-details-card">
            <div class="deal-image-large">
<?php
$imageFile = 'assets/images/' . $row['image'];
$imagePath = (!empty($row['image']) && file_exists($imageFile)) ? $imageFile : 'assets/images/default.jpg';
?>
<img src="<?php echo $imagePath; ?>" alt="Deal Image">
            </div>
            <div class="deal-details-content">
                <h2><?php echo $row['title']; ?></h2>
                <p><strong>Description:</strong> <?php echo $row['description'] ?: 'No description available.'; ?></p>
                <p><strong>Price:</strong> Rs. <?php echo $row['price']; ?></p>
                <p><strong>Original Price:</strong> Rs. <?php echo $row['original_price']; ?></p>
                <p><strong>City:</strong> <?php echo $row['city']; ?></p>
                <p><strong>Restaurant:</strong> <?php echo $row['restaurant']; ?></p>
                <p><strong>Tag:</strong> <?php echo $row['tag']; ?></p>
                <p><strong>Rating:</strong> <?php echo $row['rating']; ?> ⭐</p>
                <p><strong>Reviews:</strong> <?php echo $row['reviews']; ?></p>
                <p><strong>Start:</strong> <?php echo $row['start_date']; ?> | 
                   <strong>End:</strong> <?php echo $row['end_date']; ?></p>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
