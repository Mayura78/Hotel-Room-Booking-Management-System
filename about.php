<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - HotelBooking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CSS -->
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
        font-weight: 500; }
    .about-img {
        border-radius: 15px; max-width: 100%;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .feature-card {
        background: #ffffffb4;
        border-radius: 10px; padding: 20px;
        text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }
    .feature-card:hover {
        transform: translateY(-5px);
    }
    .feature-icon {
        font-size: 2.5rem; color: #0d6efd;
        margin-bottom: 15px;
    }
    footer {
        background: #f88d00ff;
        color: #fff; padding: 20px 0;
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
        <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
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
        </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- About Section -->
<section class="container py-5">
  <div class="row align-items-center">
    <div class="col-lg-6 mb-4">
      <img src="image/home2.png" class="about-img" alt="Hotel About Image">
    </div>
    <div class="col-lg-6">
      <h2>About Our Hotel</h2>
      <p>Welcome to HotelBooking! We provide luxurious rooms, world-class services, and a memorable stay experience. Our goal is to make your vacation or business trip relaxing and enjoyable. Our hotel is perfectly located in <strong>Colombo</strong>, offering easy access to city hotspots.</p>
    </div>
  </div>
</section>

<!-- Our Services Section -->
<section class="container py-5">
  <h2 class="text-center mb-5">Our Services</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="feature-card">
        <div class="feature-icon"><i class="bi bi-stars"></i></div>
        <h5>Luxury Rooms</h5>
        <p>Experience comfort and elegance in our well-designed rooms equipped with modern amenities.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="feature-card">
        <div class="feature-icon"><i class="bi bi-geo-alt"></i></div>
        <h5>Prime Location</h5>
        <p>Our hotel is located in Colombo, giving you easy access to nearby attractions and local hotspots.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="feature-card">
        <div class="feature-icon"><i class="bi bi-people-fill"></i></div>
        <h5>Friendly Team</h5>
        <p>Our dedicated team ensures a warm, welcoming environment and excellent customer service during your stay.</p>
      </div>
    </div>
  </div>
</section>

<!-- Meet Our Team Section -->
<section class="container py-5">
  <h2 class="text-center mb-5">Meet Our Team</h2>
  <div class="row g-4 justify-content-center">

    <!-- Team Member 1 -->
    <div class="col-md-3 text-center">
      <div class="feature-card">
        <img src="image/team1.png" class="rounded-circle mb-3" width="150" height="150" alt="Team Member 1">
        <h5>John Doe</h5>
        <p class="text-muted">General Manager</p>
        <div>
          <a href="#" class="text-primary me-2"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-info me-2"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-danger"><i class="bi bi-instagram"></i></a>
        </div>
      </div>
    </div>

    <!-- Team Member 2 -->
    <div class="col-md-3 text-center">
      <div class="feature-card">
        <img src="image/team2.png" class="rounded-circle mb-3" width="150" height="150" alt="Team Member 2">
        <h5>Jane Fernando</h5>
        <p class="text-muted">Front Desk Manager</p>
        <div>
          <a href="#" class="text-primary me-2"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-info me-2"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-danger"><i class="bi bi-instagram"></i></a>
        </div>
      </div>
    </div>

    <!-- Team Member 3 -->
    <div class="col-md-3 text-center">
      <div class="feature-card">
        <img src="image/team3.png" class="rounded-circle mb-3" width="150" height="150" alt="Team Member 3">
        <h5>Michael Lee</h5>
        <p class="text-muted">Head Chef</p>
        <div>
          <a href="#" class="text-primary me-2"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-info me-2"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-danger"><i class="bi bi-instagram"></i></a>
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
