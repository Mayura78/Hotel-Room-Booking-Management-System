<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Booking System</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    /* Hero Section */
    .hero {
      background: url('images/home3.png') no-repeat center center/cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      text-align: center;
      position: relative;
    }
    .hero::after {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.5);
    }
    .hero-content {
      position: relative;
      z-index: 2;
    }
    /* Section Padding */
    section {
      padding: 60px 0;
    }
    footer {
      background: #f88d00ff;
      color: #fff;
      padding: 20px 0;
    }

    /* Services Section */
    .service-card {
    background: #ff8a05cb;
    transition: all 0.3s ease;
    border: 1px solid #ffffffff;
    }
    .service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .service-icon i {
    font-size: 2.5rem;
    color: #0d6efd;
    }
    .service-card h5 {
    font-weight: 600;
    margin-bottom: 10px;
    }
    .service-card p {
    font-size: 0.95rem;
    line-height: 1.6;
    }

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Hotel Wediya Nilla</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
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
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero" style="background: url('image/home3.png') center/cover no-repeat; height: 90vh; position: relative; display: flex; align-items: center; justify-content: center; text-align: center;">
  <!-- Dark overlay -->
  <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(41, 42, 46, 0.5);"></div>
  <div class="hero-content" style="position: relative; z-index: 2; color: #fff;">
    <h1 class="display-4 fw-bold">Welcome to Our Hotel</h1>
    <p class="lead">Book your perfect stay with ease and comfort</p>
  </div>
</section>

<!-- About Section -->
<section id="about" class="container">
  <div class="row align-items-center">
    <div class="col-lg-6 mb-4">
      <img src="image/home2.png" class="img-fluid rounded shadow" alt="About Hotel">
    </div>
    <div class="col-lg-6">
      <h2>About Us</h2>
      <p>Welcome to our hotel! We provide luxurious rooms, world-class services, and a memorable stay experience. Our goal is to make your vacation or business trip relaxing and enjoyable.</p>
    </div>
  </div>
</section>

<!-- Rooms Section -->
<section id="rooms" class="container">
  <h2 class="text-center mb-5">Our Rooms</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card shadow">
        <img src="image/room1.png" class="card-img-top" alt="Room 1">
        <div class="card-body">
          <h5 class="card-title">Deluxe Room</h5>
          <p class="card-text">Spacious and luxurious with modern amenities.</p>
          <a href="#" class="btn btn-primary">View</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow">
        <img src="image/room2.png" class="card-img-top" alt="Room 2">
        <div class="card-body">
          <h5 class="card-title">Suite</h5>
          <p class="card-text">A perfect blend of elegance and comfort.</p>
          <a href="#" class="btn btn-primary">View</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow">
        <img src="image/room3.png" class="card-img-top" alt="Room 3">
        <div class="card-body">
          <h5 class="card-title">Standard Room</h5>
          <p class="card-text">Affordable and cozy stay option.</p>
          <a href="#" class="btn btn-primary">View</a>
        </div>
      </div>
    </div>
  </div>

  <!-- View All Rooms Button -->
  <div class="text-center mt-5">
    <a href="room.php" class="btn btn-outline-primary btn-lg">View All Rooms</a>
  </div>
</section>

<!-- Suite Spots Section -->
<section class="container" id="suites">
  <div class="row">
    <div class="col-lg-4 mb-4">
      <h2>Our Suite Spots</h2>
      <p class="text-muted">There are so many reasons why our guests love our hotels and suites</p>
    </div>
    <div class="col-lg-8">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col d-flex align-items-center"><i class="bi bi-wifi fs-3 me-2 text-primary"></i><span>Fibred Up</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-hdd-network fs-3 me-2 text-primary"></i><span>Fully Generated</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-tv fs-3 me-2 text-primary"></i><span>Smart TV & Streaming</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-bed fs-3 me-2 text-primary"></i><span>Hypnos Mattress</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-stars fs-3 me-2 text-primary"></i><span>Personalised Extras</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-geo fs-3 me-2 text-primary"></i><span>Local Hotspots</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-shield-lock fs-3 me-2 text-primary"></i><span>24 Hr Security</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-phone fs-3 me-2 text-primary"></i><span>Contactless Check-In</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-p-circle fs-3 me-2 text-primary"></i><span>Free Parking</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-cup-straw fs-3 me-2 text-primary"></i><span>Cafe</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-paw fs-3 me-2 text-primary"></i><span>Pooch Friendly</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-geo-alt fs-3 me-2 text-primary"></i><span>Perfectly Located</span></div>
        <div class="col d-flex align-items-center"><i class="bi bi-people fs-3 me-2 text-primary"></i><span>Meeting Rooms</span></div>
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="container py-5">
  <h2 class="text-center mb-5">Our Services</h2>
  <div class="row g-4">

    <!-- Service Card 1 -->
    <div class="col-md-4">
      <div class="service-card text-center p-4 shadow-sm rounded">
        <div class="service-icon mb-3">
          <i class="bi bi-heart-fill"></i>
        </div>
        <h5>Service</h5>
        <p class="text-muted">
          Get that hearty, homey feeling with dedicated customer care throughout your booking process and stay.
        </p>
      </div>
    </div>

    <!-- Service Card 2 -->
    <div class="col-md-4">
      <div class="service-card text-center p-4 shadow-sm rounded">
        <div class="service-icon mb-3">
          <i class="bi bi-stars"></i>
        </div>
        <h5>Personalisation</h5>
        <p class="text-muted">
          Customise your hotel experience with our add-ons like furbaby extras, sleep menu & kiddies cots.
        </p>
      </div>
    </div>

    <!-- Service Card 3 -->
    <div class="col-md-4">
      <div class="service-card text-center p-4 shadow-sm rounded">
        <div class="service-icon mb-3">
          <i class="bi bi-house-door-fill"></i>
        </div>
        <h5>Convenience</h5>
        <p class="text-muted">
          Our locations, amenities and customer service ensures total convenience and comfort.
        </p>
      </div>
    </div>

  </div>
</section>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

      <!-- Contact Section -->
<section id="contact" class="py-5" style="background-color: #159258e0;">
  <div class="container">
    <h2 class="text-center mb-5">Contact Us</h2>
    <div class="row g-4 align-items-start">

      <!-- Contact Form -->
      <div class="col-md-6">
        <div class="p-4 shadow rounded" style="background-color: #adaeafbe;">
          <h5 class="mb-4">Send us a message</h5>
          <form>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" placeholder="Your Email" required>
            </div>
            <div class="mb-3">
              <textarea class="form-control" rows="5" placeholder="Your Message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Send Message</button>
          </form>
        </div>
      </div>

      <!-- Map & Contact Info -->
      <div class="col-md-6">
        <div class="shadow rounded overflow-hidden mb-4" style="height: 300px;">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.27123456789!2d79.8612!3d6.9271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259e44aa35b9f%3A0x123456789abcdef!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2sus!4v1693387200000!5m2!1sen!2sus" 
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>

        <!-- Contact Details -->
        <div class="p-3 shadow rounded" style="background-color: #adaeafbe;">
          <h5 class="mb-3">Get in Touch</h5>
          <p><i class="bi bi-envelope-fill me-2 text-primary"></i>info@hotel.com</p>
          <p><i class="bi bi-telephone-fill me-2 text-primary"></i>+94 77 123 4567</p>
          <p><i class="bi bi-geo-alt-fill me-2 text-primary"></i>Colombo, Sri Lanka</p>
        </div>
      </div>

    </div>
  </div>
</section>




<!-- Footer -->
<footer class="text-center">
  <p>&copy; 2025 Hotel Booking System. All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
