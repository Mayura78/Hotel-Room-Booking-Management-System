<?php
// Start session
session_start();

// Database connection
$host = "localhost";
$user = "root"; // replace with your DB user
$pass = "";     // replace with your DB password
$dbname = "hotelbookingmanagement"; // replace with your DB name

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        $msg = "Thank you! Your message has been sent.";
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - HotelBooking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
        font-family: Arial, sans-serif;
        background: #b1b1b177;
    }
    .navbar {
        background-color: #f88d00ff;
    }
    .navbar .nav-link, .navbar-brand {
        color: #fff !important;
        font-weight: 500;
    }
    .contact-section {
        padding: 60px 0;
    }
    .contact-info {
        background: #ffffffff;
        color: #000000ff;
        padding: 30px;
        border-radius: 15px;
    }
    .contact-info h5 {
        margin-top: 15px;
    }
    .contact-info p {
        margin-bottom: 10px;
    }
    .map-container {
        height: 300px;
        border-radius: 15px;
        overflow: hidden;
    }
    footer {
        background: #f88d00ff;
        color: #fff;
        padding: 20px 0;
        margin-top: 50px;
        text-align: center;
    }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">Hotel Wediya Nilla</a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="room.php">Rooms</a></li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Event</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="overview.php">Overview</a></li>
            <li><a class="dropdown-item" href="weddingplanning.php">Wedding Planning</a></li>
            <li><a class="dropdown-item" href="weddingbywediya.php">Wedding by Wediyanilla</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Gallery</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="roomsuites.php">Room & Suites</a></li>
            <li><a class="dropdown-item" href="hotel.php">Hotel</a></li>
            <li><a class="dropdown-item" href="dining.php">Dining</a></li>
            <li><a class="dropdown-item" href="health.php">Health & Leisure</a></li>
            <li><a class="dropdown-item" href="apartments.php">Apartments & Residences</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link active" href="contact.php">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Contact Section -->
<section class="contact-section container">
  <h2 class="text-center mb-5">Contact Us</h2>
  <?php if($msg != "") { echo '<div class="alert alert-success text-center">'.$msg.'</div>'; } ?>
  <div class="row g-4">
    <!-- Contact Form -->
    <div class="col-md-6">
      <form method="POST" action="">
        <div class="mb-3"><input type="text" name="name" class="form-control" placeholder="Your Name" required></div>
        <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Your Email" required></div>
        <div class="mb-3"><textarea name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea></div>
        <button type="submit" class="btn btn-primary w-100">Send Message</button>
      </form>
    </div>

    <!-- Contact Info & Map -->
    <div class="col-md-6">
      <div class="contact-info mb-4">
        <h5>Get in Touch</h5>
        <p><i class="bi bi-envelope-fill me-2"></i>info@hotel.com</p>
        <p><i class="bi bi-telephone-fill me-2"></i>+94 77 123 4567</p>
        <p><i class="bi bi-geo-alt-fill me-2"></i>Colombo, Sri Lanka</p>
      </div>
      <div class="map-container mb-3">
        <iframe 
          src="https://www.google.com/maps?q=Colombo,Sri+Lanka&output=embed" 
          width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <p>&copy; <?= date("Y") ?> HotelBooking. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
