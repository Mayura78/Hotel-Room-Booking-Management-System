<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Wedding Planning - HotelBooking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
        font-family: Arial, sans-serif;
        background: #f8f9fa;
    }
    .navbar {
        background-color: #f88d00ff;
    }
    .navbar .nav-link, .navbar-brand {
        color: #fff !important;
        font-weight: 500;
    }
    .hero-section {
      background: url('image/home2.png') center/cover no-repeat;
      height: 50vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      text-align: center;
      position: relative;
    }
    .hero-section::after {
      content: "";
      position: absolute;
      top:0; left:0;
      width:100%;
      height:100%;
      background: rgba(0,0,0,0.5);
    }
    .hero-content {
        position: relative;
        z-index: 2;
    }
    .section-title {
        margin-bottom: 30px;
        font-weight: 600;
    }
    .content-section {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }
    .content-section img {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .cta-btn {
        background-color: #ff0000ff;
        color: #fff;
        font-weight: 500;
    }
    footer {
        background: #f88d00ff;
        color: #fff;
        padding: 20px 0;
        text-align: center;
        margin-top: 50px;
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
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-content">
    <h1 class="display-4 fw-bold">Wedding By Wediya Nilla</h1>
    <p class="lead">Memorable moments that will last a lifetime</p>
  </div>
</section>

<!-- Wedding Details Section -->
<section class="container py-5" id="wedding-details">
  <div class="content-section">
    <img src="image/home1.png" alt="Wedding Planning">
    <h2 class="section-title">Weddings By Wediya Nilla</h2>
    <p>Begin your Wediya Nilla wedding journey here. Check out our well-curated collection of venues,
        bespoke wedding offers, and tasteful inspirations made especially to help you turn your wedding vision into a beautiful reality.</p>
    
    <h4>Find Your Wedding Destination</h4>
    <p>rowse through a curation of Shangri-La Hotels and Resorts’ dynamic wedding destinations and venues. Discover amenities, services, venue capacities, and even floor plans, all in one place.</p>
    
    <h5>Celebrations Made with Meaning</h5>
    <p>Whether it's a grandiose affair or an intimate celebration, simplify your planning with professionally arranged offers made for you by our event specialists.</p>

    <h6>My Wediya Nilla Wedding</h6>
    <p>Love is in the details—the little quirks, the candid moments, the captured bliss spent with people you love. Take inspiration from our gallery of real weddings to visualize your big day.</p>
    
    <div class="text-center mt-4">
      <a href="contact.php" class="btn cta-btn btn-lg">Contact Our Team</a>
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
