<?php
require_once 'config.php';
require_once 'functions.php';

// Get the deal ID from the URL
$dealId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the deal details
$deal = getDealDetails($dealId);

// If no deal found, redirect to the homepage
if (!$deal) {
    header("Location: index.php");
    exit();
}

// Start the HTML output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($deal['title']); ?> - DealBites</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6586533842821998"
     crossorigin="anonymous"></script>
    <style>
        .deal-details {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .deal-image {
            width: 100%;
            height: 300px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .deal-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .deal-restaurant {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
        }
        .deal-price {
            font-size: 22px;
            font-weight: bold;
            color: #df7777;
            margin-bottom: 10px;
        }
        .deal-original-price {
            text-decoration: line-through;
            color: #999;
            margin-left: 10px;
        }
        .deal-description {
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .deal-dates {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
        .deal-rating {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .deal-rating .fas {
            color: #ffc107;
        }
        .buy-button {
            display: inline-block;
            background-color: #df7777;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .buy-button:hover {
            background-color: #c76666;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>

        <div class="deal-details">
            <div class="deal-image" style="background-image: url('<?php echo htmlspecialchars($deal['image']); ?>');"></div>
            <h1 class="deal-title"><?php echo htmlspecialchars($deal['title']); ?></h1>
            <p class="deal-restaurant"><?php echo htmlspecialchars($deal['restaurant']); ?></p>
            <p class="deal-price">
                Rs <?php echo number_format($deal['price'], 2); ?>
                <!--<span class="deal-original-price">$<?php echo number_format($deal['original_price'], 2); ?></span>-->
            </p>
            
            <p class="deal-description"><?php echo nl2br(htmlspecialchars($deal['description'])); ?></p>
            
        </div>

        <?php include 'footer.php'; ?>
    </div>

    <script src="script.js"></script>
</body>
</html>

