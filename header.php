<header>
    <div class="header-content">
        <div class="logo"><a style= "text-decoration: none; color: var(--primary-color--);" href="index.php"  ><?php echo SITE_NAME; ?></a></div>
        <form action="search.php" method="GET" class="search-container">
            <input type="text" name="keyword" placeholder="Search for restaurants or deals..." class="search-bar">
            <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
        </form>
        <div class="nav-icons">
            <button class="icon-button"><i class="fas fa-bell"></i></button>
            <button class="icon-button"><i class="fas fa-user"></i></button>
        </div>
        <button class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>

<!-- Mobile Menu (Hidden by default) -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <div class="logo"><?php echo SITE_NAME; ?></div>
        <button class="close-menu" id="closeMenu">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="mobile-menu-items">
        <a href="<?php echo SITE_URL; ?>" class="mobile-menu-item">Home</a>
        <a href="<?php echo SITE_URL; ?>/deals.php" class="mobile-menu-item">Deals</a>
        <a href="<?php echo SITE_URL; ?>/categories.php" class="mobile-menu-item">Categories</a>
        <a href="<?php echo SITE_URL; ?>/popular.php" class="mobile-menu-item">Popular</a>
        <a href="<?php echo SITE_URL; ?>/account.php" class="mobile-menu-item">My Account</a>
    </div>
</div>

