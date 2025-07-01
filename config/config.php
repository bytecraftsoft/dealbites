<?php
// Database configuration
$host = "localhost";        
$dbname = "dealbite_main";  
$username = "root";         
$password = "";             

// Creating connection
$conn = new mysqli($host, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
