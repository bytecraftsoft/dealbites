<?php
include 'config/config.php';

$username = 'admin';
$password_plain = 'adminlogin';

$hashedPassword = password_hash($password_plain, PASSWORD_DEFAULT);

$query = "INSERT INTO admin (username, password) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);

if (mysqli_stmt_execute($stmt)) {
    echo "✅ Admin created!";
} else {
    echo "❌ Error: " . mysqli_error($conn);
}
?>
