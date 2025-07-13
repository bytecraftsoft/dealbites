<?php
session_start();
include 'config/config.php'; // your DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['username']; // username or email
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE (username = ? OR email = ?) AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $login, $login, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) === 1) {
        $admin = mysqli_fetch_assoc($result);
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin['username'];
        header("Location: dashboard/index.php");
        exit;
    } else {
        echo "<script>alert('❌ Invalid login');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Deal Bites</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #7b5222;
      --secondary-color: #5a3c17;
      --text-color: #f8f9f6;
      --background-color: #1a1a1a;
      --card-bg: #2a2a2a;
      --light-bg: #f8f9f6;
      --shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
      --border-radius: 12px;
      --border-radius-lg: 20px;
    }

    body {
      background: linear-gradient(135deg, #1a1a1a, #2c2c2c);
      color: var(--text-color);
      font-family: 'Roboto', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background-color: var(--card-bg);
      padding: 2.5rem;
      border-radius: var(--border-radius-lg);
      box-shadow: var(--shadow);
      width: 100%;
      max-width: 420px;
    }

    h2 {
      text-align: center;
      margin-bottom: 2rem;
      color: var(--primary-color);
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    label {
      display: inline-block;
      margin-bottom: 0.4rem;
      font-weight: 500;
      font-size: 0.95rem;
      color: var(--text-color);
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.75rem;
      border: none;
      border-radius: var(--border-radius);
      background-color: #333;
      color: var(--text-color);
      font-size: 1rem;
    }

    input::placeholder {
      color: #aaa;
    }

    .btn {
      background-color: var(--primary-color);
      color: #fff;
      font-weight: bold;
      border: none;
      padding: 0.75rem 1.2rem;
      width: 100%;
      border-radius: var(--border-radius);
      cursor: pointer;
      transition: background-color 0.3s ease;
      font-size: 1rem;
    }

    .btn:hover {
      background-color: var(--secondary-color);
    }

    .back-link {
      text-align: center;
      margin-top: 1.5rem;
    }

    .back-link a {
      color: var(--text-color);
      text-decoration: none;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Admin Login</h2>
    <form method="POST">
      <div class="form-group">
        <label for="username">Username or Email</label>
        <input type="text" name="username" id="username" placeholder="Enter username or email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter password" required>
      </div>
      <button type="submit" class="btn">Login</button>
    </form>
    <div class="back-link">
      <a href="index.php">&larr; Back to Home</a>
    </div>
  </div>
</body>
</html>
