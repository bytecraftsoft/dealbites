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


    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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
        <!-- <div style="text-align: center; margin-bottom: 3rem;">
            <h2 style="color: #f8f9f6; font-size: 2.7rem; font-weight: 600; letter-spacing: 1px;">Browse Deals
            </h2>
            <p style="color: #ccc; font-size: 1.1rem;">Quickly explore our best dining deals</p>
        </div> -->

        <section class="trending-section">
            <h2>Trending Deals</h2>

            <div class="swiper deals-swiper">
                <div class="swiper-wrapper">
                    <?php
                    include 'config/config.php';

                    $sql = "SELECT * FROM deals WHERE is_popular = 1 ORDER BY created_at DESC";
                    $result = $conn->query($sql);

                    $chunkSize = 12;
                    $cards = [];

                    while ($row = $result->fetch_assoc()) {
                        $cards[] = $row;
                    }

                    $chunks = array_chunk($cards, $chunkSize);

                    foreach ($chunks as $slide): ?>
                        <div class="swiper-slide">
                            <div class="deals-grid">
                                <?php foreach ($slide as $row): ?>
                                    <a href="deal-details.php?id=<?= $row['id']; ?>" class="deal-card-link">
                                        <?php
                                        $imagePath = !empty($row['image']) ? 'assets/images/' . $row['image'] : 'assets/images/default.jpg';
                                        ?>
                                        <div class="deal-image" style="background-image: url('<?= $imagePath ?>');"></div>


                                        <div class="deal-content">
                                            <div class="deal-title"><?= $row['title'] ?: 'Untitled Deal'; ?></div>
                                            <div class="deal-meta">
                                                <?= ($row['price'] > 0) ? "Rs. " . number_format($row['price']) : "Price N/A"; ?>
                                                <?= $row['city'] ? " | " . $row['city'] : ""; ?>
                                            </div>
                                            <?php if (!empty($row['tag'])): ?>
                                                <div class="deal-tag"><?= $row['tag']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Navigation + Pagination -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>


        <!-- FILTER SECTION -->

        <section class="filter-modern-section">
            <h2 class="section-heading" style="text-align: center;">Explore by Category</h2>

            <div class="filter-box">

                <!-- Category Dropdown -->
                <div class="custom-dropdown" data-label="Category">
                    <div class="selected"> Select Category</div>
                    <div class="options">
                        <div class="option">All</div>

                      <?php
include 'config/config.php'; // Make sure correct path
$catQuery = mysqli_query($conn, "SELECT name FROM deal_categories ORDER BY name ASC");
while ($cat = mysqli_fetch_assoc($catQuery)) {
    echo "<div class='option'>{$cat['name']}</div>";
}
?>

                    </div>
                </div>

                <!-- City Dropdown -->
                <div class="custom-dropdown" data-label="City">
                    <div class="selected"> Select City</div>
                    <div class="options">
                        <div class="option">All</div>

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
                        <div class="option">All</div>

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
                        <div class="option">All</div>

                        <div class="option">Latest</div>
                        <div class="option">Popular</div>
                        <div class="option">Low to High</div>
                        <div class="option">High to Low</div>
                    </div>
                </div>

            </div>
        </section>

        <!-- EXPLORE BY CATEGORY SECTION -->
        <section class="category-card-section">
            <div class="category-card-grid">
                <!-- AJAX loaded cards go here -->
            </div>
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
    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>




</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.deals-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.deals-swiper .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.deals-swiper .swiper-button-next',
                prevEl: '.deals-swiper .swiper-button-prev',
            },
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function fetchDeals(page = 1) {
        const category = $('.custom-dropdown[data-label="Category"] .selected').text().trim();
        const city = $('.custom-dropdown[data-label="City"] .selected').text().trim();
        const price = $('.custom-dropdown[data-label="Price"] .selected').text().trim();
        const sort = $('.custom-dropdown[data-label="Sort"] .selected').text().trim();

        $.ajax({
            url: 'fetch_deals.php',
            method: 'GET',
            data: {
                category: (category !== 'Select Category' && category !== 'All') ? category : '',
                city: (city !== 'Select City' && city !== 'All') ? city : '',
                price: (price !== 'Select Price' && price !== 'All') ? price : '',
                sort: (sort !== 'Sort by' && sort !== 'All') ? sort : '',
                page: page
            },

            beforeSend: function () {
                $('.category-card-grid').html('<div style="color: white; text-align:center; padding: 2rem;">Loading...</div>');
            },
            success: function (response) {
                $('.category-card-grid').html(response);
            }
        });
    }

    // Trigger fetch on dropdown option click
    $('.custom-dropdown .option').on('click', function () {
        $(this).closest('.custom-dropdown').find('.selected').text($(this).text());
        fetchDeals();
    });

    // Trigger fetch on pagination link click
    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        const page = $(this).data('page');
        fetchDeals(page);
    });

    // Initial Load
    $(document).ready(function () {
        fetchDeals();
    });
</script>