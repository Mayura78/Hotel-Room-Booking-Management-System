<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Event Overview - HotelBooking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
        margin-bottom: 40px;
        font-weight: 600;
    }
    .event-card img {
        border-radius: 10px;
        height: 220px;
        object-fit: cover;
    }
    .event-card {
        transition: transform 0.3s ease;
    }
    .event-card:hover {
        transform: translateY(-5px);
    }
    footer {
        background: #f88d00ff;
        color: #fff; padding: 20px 0;
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
        <li class="nav-item"><a class="nav-link active" href="overview.php">Overview</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-content">
    <h1 class="display-4 fw-bold">Event Overview</h1>
    <p class="lead">Discover our elegant event spaces and wedding planning services</p>
  </div>
</section>

<!-- Event Overview Section -->
<section class="container py-5">
  <h2 class="text-center section-title">Wedding Planning</h2>
  <div class="row g-4 mb-5">
    <div class="col-md-6">
      <img src="image/event1.png" class="img-fluid rounded shadow" alt="Wedding Planning">
    </div>
    <div class="col-md-6 d-flex align-items-center">
      <p>The tearful smiles of the walk down the aisle. The first kiss as a couple. The celebrations that follow. Your wedding is a chance to craft moments that will last you a lifetime. 
        At Wediya Nilla, we want those moments to be truly memorable. Please contact our dedicated team wediyanilla.events@shangri-la.com to make your dream come true..</p>
    </div>
  </div>

  <h2 class="text-center section-title">Weddings By Wediya Nilla</h2>
  <div class="row g-4 mb-5">
    <div class="col-md-6 order-md-2">
      <img src="image/event2.png" class="img-fluid rounded shadow" alt="Weddings By Wediya Nilla">
    </div>
    <div class="col-md-6 d-flex align-items-center order-md-1">
      <p>Begin your Wediya Nilla wedding journey here. Check out our well-curated collection of venues, bespoke wedding offers, and tasteful inspirations made especially to help you turn your wedding vision into a beautiful reality.
</p>
    </div>
  </div>

  <h2 class="text-center section-title">Event Spaces</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card event-card shadow-sm">
        <img src="image/event3.png" class="card-img-top" alt="Event Space 1">
        <div class="card-body text-center">
          <h5 class="card-title">Grand Ballroom</h5>
          <p class="text-muted">Spacious and elegant space perfect for large weddings and events.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card event-card shadow-sm">
        <img src="image/event4.png" class="card-img-top" alt="Event Space 2">
        <div class="card-body text-center">
          <h5 class="card-title">Garden Venue</h5>
          <p class="text-muted">Beautiful outdoor gardens ideal for ceremonies and receptions.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card event-card shadow-sm">
        <img src="image/event5.png" class="card-img-top" alt="Event Space 3">
        <div class="card-body text-center">
          <h5 class="card-title">Private Lounge</h5>
          <p class="text-muted">Cozy and stylish indoor lounge for intimate gatherings and meetings.</p>
        </div>
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
