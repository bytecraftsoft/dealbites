<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DealBites - Discover the Best Dining Deals</title>
    <meta name="description" content="Get overall deals in one place" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Marcellus&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" />

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- Google Ads Script -->
 <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6586533842821998"
    crossorigin="anonymous"></script> -->

    <!-- Custom Script -->
    <script src="assets/js/script.js"></script>

</head>

<body>
    <?php include 'includes/header.php'; ?>
    <!-- HERO SECTION -->
    <section class="hero">
        <div class="overlay">
            <div class="hero-content">
                <h2>Find Nearest Dine-ins & Best Restaurant Deals</h2>
                <p>Deal Bites helps you discover top buffet offers, discounts, and nearby dining experiences.</p>
            </div>
        </div>
    </section>
    <!-- CATEGORY SECTION -->
    <section id="categories" style="background-color: #1a1a1a; padding: 5rem 1rem;">
        <div style="text-align: center; margin-bottom: 3rem;">
            <h2 style="color: #f8f9f6; font-size: 2.7rem; font-weight: 600; letter-spacing: 1px;">Browse by Category
            </h2>
            <p style="color: #ccc; font-size: 1.1rem;">Quickly explore our best dining deals</p>
        </div>

        <div class="category-bar">
            <div class="cat-item">Buffet Deals</div>
            <div class="cat-item">Iftar Offers</div>
            <div class="cat-item">Discounted</div>
            <div class="cat-item">Hot Picks</div>
            <div class="cat-item">New Arrivals</div>
            <div class="cat-item">Nearby</div>
        </div>
        <!-- FILTER SECTION -->
        <section class="filter-modern-section">
            <div class="filter-box">

                <!-- Category Dropdown -->
                <div class="custom-dropdown" data-label="Category">
                    <div class="selected"> Select Category</div>
                    <div class="options">
                        <div class="option">Buffet</div>
                        <div class="option">Ramzan</div>
                        <div class="option">Fast Food</div>
                        <div class="option">Desi</div>
                        <div class="option">Chinese</div>
                    </div>
                </div>

                <!-- City Dropdown -->
                <div class="custom-dropdown" data-label="City">
                    <div class="selected"> Select City</div>
                    <div class="options">
                        <div class="option">Karachi</div>
                        <div class="option">Lahore</div>
                        <div class="option">Islamabad</div>
                        <div class="option">Faisalabad</div>
                        <div class="option">Peshawar</div>
                    </div>
                </div>

                <!-- Price Dropdown -->
                <div class="custom-dropdown" data-label="Price">
                    <div class="selected"> Select Price</div>
                    <div class="options">
                        <div class="option">Under Rs. 1000</div>
                        <div class="option">Rs. 1000 – 2000</div>
                        <div class="option">Above Rs. 2000</div>
                        <div class="option">Premium</div>
                    </div>
                </div>

                <!-- Sort Dropdown -->
                <div class="custom-dropdown" data-label="Sort">
                    <div class="selected">Sort by</div>
                    <div class="options">
                        <div class="option">Latest</div>
                        <div class="option">Popular</div>
                        <div class="option">Low to High</div>
                        <div class="option">High to Low</div>
                    </div>
                </div>

            </div>
        </section>

        <!-- TRENDING DEALS SECTION -->
        <section class="trending-section">
            <h2>Trending Deals</h2>

            <div class="deals-grid">
                <div class="deal-card">
<div class="deal-image" style="background-image: url('https://picsum.photos/300/180');"></div>
                    <div class="deal-content">
                        <div class="deal-title">Sakura Buffet</div>
                        <div class="deal-meta">Rs. 899 | Karachi</div>
                        <div class="deal-tag">50% OFF</div>
                    </div>
                </div>

                <div class="deal-card">
<div class="deal-image" style="background-image: url('https://picsum.photos/300/180');"></div>
                    <div class="deal-content">
                        <div class="deal-title">BBQ Tonight</div>
                        <div class="deal-meta">Rs. 1200 | Lahore</div>
                        <div class="deal-tag">Special Deal</div>
                    </div>
                </div>

                <div class="deal-card">
<div class="deal-image" style="background-image: url('https://picsum.photos/300/180');"></div>
                    <div class="deal-content">
                        <div class="deal-title">Chop Chop Wok</div>
                        <div class="deal-meta">Rs. 750 | Islamabad</div>
                        <div class="deal-tag">New</div>
                    </div>
                </div>

                <div class="deal-card">
<div class="deal-image" style="background-image: url('https://picsum.photos/300/180');"></div>
                    <div class="deal-content">
                        <div class="deal-title">Salt’n Pepper</div>
                        <div class="deal-meta">Rs. 1100 | Multan</div>
                        <div class="deal-tag">Flat Deal</div>
                    </div>
                </div>

                <div class="deal-card">
<div class="deal-image" style="background-image: url('https://picsum.photos/300/180');"></div>
                    <div class="deal-content">
                        <div class="deal-title">Kolachi</div>
                        <div class="deal-meta">Rs. 1400 | Karachi</div>
                        <div class="deal-tag">30% OFF</div>
                    </div>
                </div>

                <div class="deal-card">
<div class="deal-image" style="background-image: url('https://picsum.photos/300/180');"></div>
                    <div class="deal-content">
                        <div class="deal-title">La Chine</div>
                        <div class="deal-meta">Rs. 950 | Faisalabad</div>
                        <div class="deal-tag">Buffet</div>
                    </div>
                </div>
            </div>

            <button class="view-all-btn">View All Deals</button>
        </section>
    </section>

    <!-- ABOUT SECTION -->
    <section class="about-parallax" id="about">
        <div class="about-content">
            <h2>About Deal Bites</h2>
            <p>
                At <strong>Deal Bites</strong>, we believe dining out should be delicious, delightful, and affordable.
                Our mission is to bring food lovers closer to the best restaurant deals and buffet offers across your
                city — all in one place.
            </p>
            <p>
                From exclusive <strong>Ramzan Iftar buffets</strong> to <strong>50% off dine-in deals</strong>, we
                curate timely and trusted offers from top-rated restaurants. Whether you're planning a family dinner, a
                weekend hangout, or a last-minute iftar outing, Deal Bites helps you save time and money while
                discovering new places to eat.
            </p>
            <p>
                Our platform is regularly updated with real-time promotions, special discounts, and local favorites. You
                can filter deals by category, location, or budget, ensuring you always find something that fits your
                taste.
            </p>
            <p>
                Built for foodies, by foodies — Deal Bites makes dining experiences more affordable, festive, and fun.
            </p>
        </div>
    </section>

<!-- NEWSLETTER SECITON -->
    <section class="newsletter">
        <div class="newsletter-content">
            <h2>Stay Updated with the Latest Ramzan Deals </h2>
            <p>Subscribe to get buffet and dining offers straight to your inbox.</p>
            <form action="#" method="post">
                <input type="email" placeholder="Enter your email" required />
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

</body>

</html>