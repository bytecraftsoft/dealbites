# 🍽️ DealBites - Pakistan's Premier Dining Deals Platform

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)
[![AdSense](https://img.shields.io/badge/Google-AdSense%20Ready-red)](https://adsense.google.com)

> **DealBites** connects food lovers with the best restaurant deals, buffet offers, and dining experiences across Pakistan's major cities.

## 🌟 Features

### 🎯 Core Features
- **Restaurant Deal Aggregation** - Curated offers from top-rated restaurants
- **Smart Filtering System** - Filter by category, city, price range, and popularity
- **Real-time Deal Updates** - Current and verified promotional offers
- **City-wide Coverage** - Karachi, Lahore, Islamabad, Faisalabad, Peshawar
- **Mobile Responsive Design** - Optimized for all devices
- **SEO Optimized** - Enhanced search engine visibility

### 📱 User Experience
- **Interactive Deal Cards** - Visual deal presentation with images and details
- **Advanced Search** - Find deals by location, cuisine, and budget
- **Trending Deals Section** - Popular and featured offers
- **Newsletter Subscription** - Stay updated with latest deals
- **Contact System** - Easy communication with support team

### 🛡️ Legal & Compliance
- **Google AdSense Ready** - Full compliance with advertising policies
- **Privacy Policy** - GDPR compliant data protection
- **Terms of Service** - Comprehensive legal framework
- **Contact Information** - Transparent business details

## 🚀 Quick Start

### Prerequisites
- **Web Server** (Apache/Nginx)
- **PHP 7.4+** with extensions:
  - `mysqli`
  - `json`
  - `session`
  - `curl`
- **MySQL 5.7+** or **MariaDB 10.2+**
- **Composer** (optional, for future dependencies)

### Installation

1. **Clone or Download the Repository**
   ```bash
   git clone https://github.com/bytecraftsoft/dealbites.git
   cd dealbites
   ```

2. **Set Up Web Server**
   - For **XAMPP**: Place in `htdocs/dealbites/`
   - For **WAMP**: Place in `www/dealbites/`
   - For **Live Server**: Upload to public_html or web root

3. **Database Setup**
   ```sql
   # Create database
   CREATE DATABASE dealbites;
   
   # Import the provided SQL file
   mysql -u username -p dealbites < dealbite_main.sql
   ```

4. **Configure Database Connection**
   ```php
   # Edit config/config.php
   <?php
   define('DB_HOST', 'localhost');
   define('DB_USERNAME', 'your_username');
   define('DB_PASSWORD', 'your_password');
   define('DB_NAME', 'dealbites');
   define('SITE_URL', 'http://localhost/dealbites');
   define('SITE_NAME', 'DealBites');
   ?>
   ```

5. **Set Up Google AdSense (Optional)**
   - Update your AdSense Publisher ID in `ads.txt`
   - Modify the AdSense script in relevant PHP files

6. **Launch the Application**
   - Visit: `http://localhost/dealbites/`
   - Admin Panel: `http://localhost/dealbites/dashboard/`

## 📁 Project Structure

```
dealbites/
├── 📁 assets/                  # Static assets
│   ├── 📁 css/                # Stylesheets
│   ├── 📁 js/                 # JavaScript files
│   └── 📁 images/             # Image assets
├── 📁 config/                 # Configuration files
│   └── config.php             # Database configuration
├── 📁 dashboard/              # Admin panel
│   ├── index.php              # Admin dashboard
│   ├── login.php              # Admin login
│   └── ...                    # Admin functionality
├── 📁 fetch/                  # AJAX endpoints
│   └── fetch_deals.php        # Deal fetching logic
├── 📁 includes/               # Reusable components
│   ├── header.php             # Site header
│   └── footer.php             # Site footer
├── 📄 index.php               # Homepage
├── 📄 about-us.php            # About page
├── 📄 contact.php             # Contact page
├── 📄 privacy-policy.php      # Privacy policy
├── 📄 terms-of-service.php    # Terms of service
├── 📄 deal-details.php        # Individual deal page
├── 📄 search.php              # Search functionality
├── 📄 ads.txt                 # AdSense verification
├── 📄 dealbite_main.sql       # Database schema
└── 📄 README.md               # Project documentation
```

## 🗄️ Database Schema

### Core Tables
- **`deals`** - Restaurant deals and offers
- **`deal_categories`** - Deal categorization
- **`restaurants`** - Restaurant information
- **`admin_users`** - Administrative users

### Key Fields
```sql
# deals table structure
- id (Primary Key)
- title (Deal title)
- description (Deal description)
- price (Deal price)
- city (Restaurant city)
- category (Deal category)
- image (Deal image path)
- is_popular (Featured flag)
- created_at (Timestamp)
```

## ⚙️ Configuration

### Environment Setup
```php
# config/config.php - Database Configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dealbites');

# Site Configuration
define('SITE_URL', 'https://yourdomain.com');
define('SITE_NAME', 'DealBites');
```

### Google AdSense Setup
1. **Update Publisher ID** in `ads.txt`:
   ```
   google.com, pub-YOUR-PUBLISHER-ID, DIRECT, f08c47fec0942fa0
   ```

2. **Configure Ad Units** in PHP files:
   ```html
   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-YOUR-PUBLISHER-ID"></script>
   ```

## 🔧 Usage

### Adding New Deals
1. Access admin panel: `/dashboard/`
2. Login with admin credentials
3. Navigate to "Add Deal" section
4. Fill in deal information and submit

### Managing Categories
1. Database access required
2. Insert into `deal_categories` table:
   ```sql
   INSERT INTO deal_categories (name, description) VALUES ('Italian', 'Italian cuisine deals');
   ```

### Customizing Design
- **CSS**: Edit `assets/css/style.css`
- **JavaScript**: Edit `assets/js/script.js`
- **Layout**: Modify `includes/header.php` and `includes/footer.php`

## 🌐 API Endpoints

### AJAX Endpoints
- **`fetch_deals.php`** - GET deals with filtering
  ```javascript
  // Example usage
  $.ajax({
      url: 'fetch_deals.php',
      method: 'GET',
      data: {
          category: 'Italian',
          city: 'Karachi',
          price: 'Under Rs. 1000',
          sort: 'Latest'
      }
  });
  ```

## 🚀 Deployment

### Production Checklist
- [ ] Update database credentials in `config/config.php`
- [ ] Set correct `SITE_URL` in configuration
- [ ] Upload all files to web server
- [ ] Import database using provided SQL file
- [ ] Configure Google AdSense with your publisher ID
- [ ] Set up SSL certificate (recommended)
- [ ] Test all functionality thoroughly

### Performance Optimization
- **Enable caching** in your web server
- **Optimize images** in `assets/images/`
- **Minify CSS/JS** files for production
- **Set up CDN** for static assets (optional)

## 🔐 Security

### Implemented Security Measures
- **SQL Injection Protection** - Prepared statements
- **XSS Prevention** - Input sanitization
- **Admin Authentication** - Secure admin panel access
- **HTTPS Ready** - SSL/TLS support

### Security Best Practices
- Change default admin credentials
- Regular database backups
- Keep PHP and MySQL updated
- Monitor admin panel access logs

## 🤝 Contributing

We welcome contributions! Here's how you can help:

### Development Setup
1. Fork the repository
2. Create a feature branch: `git checkout -b feature-name`
3. Make your changes
4. Test thoroughly
5. Submit a pull request

### Coding Standards
- **PHP**: Follow PSR-12 coding standards
- **JavaScript**: Use ES6+ features where possible
- **CSS**: Maintain existing naming conventions
- **Database**: Use meaningful table and column names

### Issue Reporting
Please use GitHub Issues for:
- Bug reports
- Feature requests
- Security vulnerabilities
- Documentation improvements

## 📈 Future Roadmap

### Short Term (1-3 months)
- [ ] User registration and login system
- [ ] Deal bookmarking functionality
- [ ] Email newsletter system
- [ ] Advanced search filters
- [ ] Mobile app landing page

### Medium Term (3-6 months)
- [ ] Restaurant partner dashboard
- [ ] Review and rating system
- [ ] Payment integration
- [ ] Multi-language support
- [ ] API development

### Long Term (6+ months)
- [ ] Native mobile applications
- [ ] Machine learning deal recommendations
- [ ] Integration with food delivery services
- [ ] Franchise expansion system

## 📊 Analytics & Monitoring

### Google Analytics Setup
```html
<!-- Add to head section of all pages -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

### Performance Monitoring
- Monitor page load times
- Track user engagement metrics
- Monitor AdSense revenue
- Database query optimization

## 🆘 Troubleshooting

### Common Issues

**Database Connection Error**
```php
// Check config/config.php settings
// Verify MySQL service is running
// Confirm database exists and user has permissions
```

**Deals Not Loading**
```php
// Check if database has sample data
// Verify fetch_deals.php is accessible
// Check browser console for JavaScript errors
```

**Images Not Displaying**
```php
// Ensure assets/images/ directory exists
// Check file permissions (755 for directories, 644 for files)
// Verify image paths in database
```

**AdSense Not Showing**
```php
// Confirm ads.txt file is accessible
// Check AdSense approval status
// Verify correct publisher ID in code
```

## 📞 Support & Contact

### Technical Support
- **Email**: info@dealbites.pk
- **Phone**: +92 370 500 6085
- **GitHub Issues**: [Project Issues](https://github.com/bytecraftsoft/dealbites/issues)

### Business Inquiries
- **Partnerships**: partnerships@dealbites.pk
- **Advertising**: ads@dealbites.pk
- **General**: info@dealbites.pk

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

### Third-Party Licenses
- **Bootstrap**: MIT License
- **Font Awesome**: Font Awesome Free License
- **jQuery**: MIT License
- **Swiper**: MIT License

## 🏆 Credits

### Development Team
- **ByteCraftSoft** - Lead Development
- **DealBites Team** - Product Management & Design

### Special Thanks
- Restaurant partners for deal data
- Beta testers for feedback
- Open source community for tools and libraries

---

<div align="center">

**Made with ❤️ in Pakistan**

[🌐 Website](https://dealbites.pk) • [📧 Contact](mailto:info@dealbites.pk) • [🐦 Twitter](https://twitter.com/dealbites) • [📘 Facebook](https://facebook.com/dealbites)

⭐ **Star this repository if you found it helpful!**

</div>

## 📝 Changelog

### Version 1.0.0 (Current)
- ✅ Initial release
- ✅ Core deal management system
- ✅ Google AdSense integration
- ✅ Legal pages (Privacy Policy, Terms of Service)
- ✅ Responsive design
- ✅ Admin dashboard
- ✅ Contact system

### Upcoming (Version 1.1.0)
- 🔄 User authentication system
- 🔄 Enhanced search functionality
- 🔄 Blog/Articles section
- 🔄 Newsletter system
- 🔄 Performance optimizations

---

*Last updated: January 2025*