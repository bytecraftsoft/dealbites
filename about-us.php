<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - DealBites</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .about-us {
            background: #121212;
            color: #f8f9f6;
            padding: 6rem 2rem 4rem;
            min-height: 100vh;
        }
        .about-content {
            max-width: 1000px;
            margin: 0 auto;
            background: #1a1a1a;
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.5);
        }
        .about-content h1 {
            color: #fff;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        .about-content h2 {
            color: #fff;
            font-size: 1.8rem;
            margin-top: 2rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid #333;
            padding-bottom: 0.5rem;
        }
        .about-content h3 {
            color: #ddd;
            font-size: 1.3rem;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .about-content p, .about-content li {
            line-height: 1.6;
            margin-bottom: 1rem;
            color: #ccc;
        }
        .about-content ul {
            margin-left: 2rem;
        }
        .highlight-box {
            background: #2a2a2a;
            border-left: 4px solid #4a9eff;
            padding: 1.5rem;
            margin: 2rem 0;
            border-radius: 8px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }
        .stat-card {
            background: #2a2a2a;
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
            border: 1px solid #333;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #4a9eff;
            display: block;
            margin-bottom: 0.5rem;
        }
        .contact-info {
            background: #2a2a2a;
            padding: 2rem;
            border-radius: 8px;
            margin: 2rem 0;
        }
        .contact-info h3 {
            color: #4a9eff;
            margin-bottom: 1rem;
        }
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: #ddd;
        }
        .contact-item i {
            color: #4a9eff;
            width: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <section class="about-us">
        <div class="about-content">
            <h1>About DealBites</h1>
            
            <div class="highlight-box">
                <p style="font-size: 1.2rem; color: #fff; margin-bottom: 0;"><strong>Your Gateway to Pakistan's Best Dining Deals</strong></p>
                <p style="margin-bottom: 0;">Connecting food lovers with incredible restaurant offers, buffet deals, and dining experiences across Pakistan.</p>
            </div>
            
            <h2>Our Story</h2>
            <p>DealBites was born from a simple idea: dining out should be delicious, delightful, and affordable for everyone. Founded in 2024, we recognized that food lovers across Pakistan were missing out on amazing deals simply because they didn't know where to find them.</p>
            
            <p>What started as a passion project to help friends and family discover great restaurant deals has grown into Pakistan's premier platform for dining offers. We've partnered with hundreds of restaurants across major cities to bring you the most comprehensive collection of dining deals in the country.</p>
            
            <h2>Our Mission</h2>
            <div class="highlight-box">
                <p><strong>To make exceptional dining experiences accessible to everyone</strong> by connecting food enthusiasts with the best restaurant deals, buffet offers, and culinary adventures across Pakistan.</p>
            </div>
            
            <h2>Our Vision</h2>
            <p>We envision a Pakistan where every meal out is an opportunity to explore, save, and enjoy. Our goal is to become the go-to platform that transforms how people discover and experience dining, making every restaurant visit more affordable and enjoyable.</p>
            
            <h2>What We Do</h2>
            <p>DealBites is your comprehensive platform for restaurant deals and dining offers. We specialize in:</p>
            <ul>
                <li><strong>Restaurant Deal Aggregation:</strong> Curating the best offers from top-rated restaurants</li>
                <li><strong>Buffet Promotions:</strong> Featuring exclusive buffet deals, especially during special occasions like Ramzan</li>
                <li><strong>City-Wide Coverage:</strong> Covering major cities including Karachi, Lahore, Islamabad, Faisalabad, and Peshawar</li>
                <li><strong>Real-Time Updates:</strong> Providing up-to-date information on current promotions and limited-time offers</li>
                <li><strong>Smart Filtering:</strong> Helping you find deals by category, location, price range, and preferences</li>
                <li><strong>Quality Assurance:</strong> Partnering only with verified, reputable restaurants</li>
            </ul>
            
            <h2>Our Impact</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-number">500+</span>
                    <p>Partner Restaurants</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">50,000+</span>
                    <p>Happy Customers</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">5</span>
                    <p>Major Cities</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">1000+</span>
                    <p>Active Deals</p>
                </div>
            </div>
            
            <h2>Why Choose DealBites?</h2>
            <h3>🍽️ Comprehensive Coverage</h3>
            <p>From budget-friendly options to premium dining experiences, we cover every type of restaurant and cuisine across Pakistan's major cities.</p>
            
            <h3>💰 Guaranteed Savings</h3>
            <p>Every deal on our platform is verified and current. We work directly with restaurants to ensure you get the best possible offers.</p>
            
            <h3>🕒 Real-Time Updates</h3>
            <p>Our team continuously updates deals and removes expired offers, so you always see current, available promotions.</p>
            
            <h3>📱 User-Friendly Experience</h3>
            <p>Our platform is designed with you in mind - easy filtering, clear information, and seamless browsing on any device.</p>
            
            <h3>🤝 Trusted Partnerships</h3>
            <p>We maintain strong relationships with restaurant partners to bring you exclusive deals you won't find anywhere else.</p>
            
            <h2>Our Commitment</h2>
            <p>At DealBites, we're committed to:</p>
            <ul>
                <li><strong>Quality:</strong> Every restaurant and deal meets our quality standards</li>
                <li><strong>Transparency:</strong> Clear, honest information about all offers and terms</li>
                <li><strong>Customer Service:</strong> Responsive support to help with any questions or concerns</li>
                <li><strong>Innovation:</strong> Continuously improving our platform based on user feedback</li>
                <li><strong>Community:</strong> Supporting local restaurants and food culture in Pakistan</li>
            </ul>
            
            <h2>Our Team</h2>
            <p>DealBites is powered by a passionate team of food enthusiasts, technology experts, and customer service professionals. We're united by our love for great food and our commitment to helping others discover amazing dining experiences.</p>
            
            <p>Our team includes:</p>
            <ul>
                <li><strong>Content Curators:</strong> Food experts who scout and verify the best deals</li>
                <li><strong>Technology Team:</strong> Developers ensuring our platform runs smoothly</li>
                <li><strong>Partnership Managers:</strong> Building relationships with restaurants across Pakistan</li>
                <li><strong>Customer Support:</strong> Dedicated professionals ready to assist you</li>
            </ul>
            
            <h2>Looking Forward</h2>
            <p>As we continue to grow, we're excited to expand our coverage to more cities, add new features, and bring even more value to our users. We're working on exciting developments including:</p>
            <ul>
                <li>Mobile app for iOS and Android</li>
                <li>Personalized deal recommendations</li>
                <li>Loyalty program for frequent users</li>
                <li>Integration with food delivery services</li>
                <li>Advanced filtering and search capabilities</li>
            </ul>
            
            <h2>Contact Information</h2>
            <div class="contact-info">
                <h3>Get in Touch</h3>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>Email: info@dealbites.pk</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>Phone: +92 370 500 6085</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Serving: Karachi, Lahore, Islamabad, Faisalabad, Peshawar</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <span>Support Hours: 9:00 AM - 6:00 PM (Monday to Friday)</span>
                </div>
            </div>
            
            <h2>Join Our Community</h2>
            <p>Follow us on social media to stay updated with the latest deals, restaurant features, and food trends:</p>
            <ul>
                <li>Facebook: Get daily deal updates and community discussions</li>
                <li>Instagram: Visual showcases of featured restaurants and deals</li>
                <li>Twitter: Quick updates and customer support</li>
            </ul>
            
            <div class="highlight-box">
                <p style="text-align: center; margin-bottom: 0;"><strong>Ready to start saving on your next dining experience?</strong></p>
                <p style="text-align: center; margin-bottom: 0;"><a href="index.php" style="color: #4a9eff;">Explore Deals Now</a> | <a href="contact.php" style="color: #4a9eff;">Contact Us</a></p>
            </div>
        </div>
    </section>
    
    <?php include 'includes/footer.php'; ?>
</body>
</html> 