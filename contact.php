<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Deal Bites</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  
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
  <style>
    :root {
      --primary-color: #7b5222;
      --secondary-color: #5a3c17;
      --text-color: #f8f9f6;
      --background-color: #1a1a1a;
      --card-bg: #2a2a2a;
      --shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
      --border-radius: 12px;
    }

    body {
      margin: 0;
      font-family: 'Roboto', sans-serif;
      background-color: var(--background-color);
      color: var(--text-color);
    }

    .hero-img {
      width: 100%;
      height: 300px;
      background: url('assets/images/crouselbg1.jpg') center/cover no-repeat;
      box-shadow: var(--shadow);
      position: relative;
    }

    .hero-img h1 {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 3rem;
      text-shadow: 0 2px 10px rgba(0,0,0,0.7);
      margin: 0;
    }

    .contact-section {
      padding: 3rem 1rem;
      max-width: 1000px;
      margin: auto;
    }

    .contact-heading {
      text-align: center;
      font-size: 2.2rem;
      color: var(--primary-color);
      margin-bottom: 2rem;
    }

    .contact-form-wrapper {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
    }

    .contact-form, .contact-info {
      flex: 1;
      background-color: var(--card-bg);
      padding: 2rem;
      border-radius: var(--border-radius);
      box-shadow: var(--shadow);
    }

    .form-group {
      margin-bottom: 1.2rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-size: 0.95rem;
      color: var(--text-color);
    }

    input, textarea {
      width: 100%;
      padding: 0.8rem;
      border: none;
      border-radius: var(--border-radius);
      background-color: #333;
      color: var(--text-color);
      font-size: 1rem;
    }

    textarea {
      resize: vertical;
      min-height: 120px;
    }

    .submit-btn {
      background-color: var(--primary-color);
      color: #fff;
      padding: 0.8rem 1.5rem;
      border: none;
      border-radius: var(--border-radius);
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: var(--secondary-color);
    }

    .map {
      margin-top: 3rem;
      border-radius: var(--border-radius);
      overflow: hidden;
      box-shadow: var(--shadow);
    }
  </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="hero-img">
  <h1>Contact</h1>
</div>

<section class="contact-section">
  <h2 class="contact-heading">Contact Us Here!</h2>

  <div class="contact-form-wrapper">
    <form class="contact-form">
      <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="form-group">
        <label for="email">Your Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Write your message..." required></textarea>
      </div>
      <button type="submit" class="submit-btn">Send Message</button>
    </form>

    <div class="contact-info">
      <h3>Get in Touch</h3>
      <p><strong>Address:</strong> XYZ Road, Karachi, Pakistan</p>
      <p><strong>Email:</strong> support@dealbites.com</p>
      <p><strong>Phone:</strong> +92 300 1234567</p>
    </div>
  </div>

  <div class="map">
    <iframe src="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>
