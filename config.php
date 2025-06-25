<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'dealbite_main');
define('DB_PASS', 'LN0#*itG!l-P');
define('DB_NAME', 'dealbite_main');

// Establish database connection
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Other configuration settings
define('SITE_URL', 'http://localhost/deals'); // Update this with your actual site URL
define('SITE_NAME', 'DealBites');

