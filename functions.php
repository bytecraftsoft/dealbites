<?php
// Include the configuration file
require_once 'config.php';

/**
 * Fetch deal categories with their deals
 */
function getDealCategories() {
    global $pdo;
    
    try {
        // Fetch categories
        $stmt = $pdo->query("SELECT * FROM deal_categories");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Fetch deals for each category
        foreach ($categories as &$category) {
            $stmt = $pdo->prepare("SELECT * FROM deals WHERE category_id = ?");
            $stmt->execute([$category['id']]);
            $category['deals'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $categories;
    } catch(PDOException $e) {
        // Log error and return empty array
        error_log("Database Error: " . $e->getMessage());
        return [];
    }
}

/**
 * Fetch popular deals
 */
function getPopularDeals() {
    global $pdo;
    
    try {
        $stmt = $pdo->query("SELECT * FROM deals WHERE is_popular = 1 ORDER BY rating DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Log error and return empty array
        error_log("Database Error: " . $e->getMessage());
        return [];
    }
}

/**
 * Sanitize output to prevent XSS
 */
function sanitizeOutput($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Fetch details for a specific deal
 */
function getDealDetails($dealId) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM deals WHERE id = ?");
        $stmt->execute([$dealId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Log error and return false
        error_log("Database Error: " . $e->getMessage());
        return false;
    }
}

/**
 * Search for deals based on criteria
 */
function searchDeals($keyword, $category, $minPrice, $maxPrice) {
    global $pdo;
    
    try {
        $sql = "SELECT * FROM deals WHERE 1=1";
        $params = [];

        if (!empty($keyword)) {
            $sql .= " AND (title LIKE ? OR description LIKE ? OR restaurant LIKE ?)";
            $keywordParam = "%$keyword%";
            $params = array_merge($params, [$keywordParam, $keywordParam, $keywordParam]);
        }

        if ($category > 0) {
            $sql .= " AND category_id = ?";
            $params[] = $category;
        }

        $sql .= " AND price >= ? AND price <= ?";
        $params[] = $minPrice;
        $params[] = $maxPrice;

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        return [];
    }
}

/**
 * Get all categories
 */
function getAllCategories() {
    global $pdo;
    
    try {
        $stmt = $pdo->query("SELECT * FROM deal_categories ORDER BY name");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        return [];
    }
}

/**
 * Get deals based on category and pagination
 */
function getDeals($category, $page, $perPage) {
    global $pdo;
    
    try {
        $offset = ($page - 1) * $perPage;
        
        if ($category === 'all') {
            $sql = "SELECT * FROM deals ORDER BY id DESC LIMIT :limit OFFSET :offset";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        } else {
            $sql = "SELECT * FROM deals WHERE category_id = :category ORDER BY id DESC LIMIT :limit OFFSET :offset";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':category', $category, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        return [];
    }
}

/**
 * Get total number of deals for pagination
 */
function getTotalDeals($category) {
    global $pdo;
    
    try {
        if ($category === 'all') {
            $sql = "SELECT COUNT(*) FROM deals";
            $stmt = $pdo->query($sql);
        } else {
            $sql = "SELECT COUNT(*) FROM deals WHERE category_id = :category";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':category', $category, PDO::PARAM_INT);
            $stmt->execute();
        }
        
        return $stmt->fetchColumn();
    } catch(PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        return 0;
    }
}

