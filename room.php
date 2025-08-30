<?php
session_start();
include "db.php"; // Database connection

// Fetch rooms from DB
$sql = "SELECT * FROM rooms ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hotel Rooms - HotelBooking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
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
    .room-card img {
        height: 220px;
        object-fit: cover;
        border-radius: 10px;
    }
    .room-card {
        transition: transform 0.3s ease;
    }
    .room-card:hover {
        transform: translateY(-5px);
    }
    footer {
        background: #f8f9fa;
        padding: 20px 0; margin-top: 50px;
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
        <li class="nav-item"><a class="nav-link active" href="room.php">Rooms</a></li>
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

<!-- Rooms Section -->
<section class="container py-5">
  <h2 class="text-center mb-5">Our Rooms</h2>
  <div class="row g-4">

    <?php 
    $modalCount = 0;
    while ($row = mysqli_fetch_assoc($result)) { 
      $modalCount++;
    ?>
    <!-- Room Card -->
    <div class="col-md-4">
      <div class="card room-card shadow-sm p-2">
        <img src="uploads/<?= htmlspecialchars($row['photo']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['room_name']) ?>">
        <div class="card-body text-center">
          <h5 class="card-title"><?= htmlspecialchars($row['room_name']) ?></h5>
          <p class="text-muted">$<?= number_format($row['price'],2) ?> / Night</p>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#roomModal<?= $modalCount ?>">Read More</button>
        </div>
      </div>
    </div>

    <!-- Room Modal -->
    <div class="modal fade" id="roomModal<?= $modalCount ?>" tabindex="-1">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><?= htmlspecialchars($row['room_name']) ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body row">
            <div class="col-md-6">
              <img src="uploads/<?= htmlspecialchars($row['photo']) ?>" class="img-fluid rounded mb-3" alt="<?= htmlspecialchars($row['room_name']) ?>">
              <p><strong>Price:</strong> $<?= number_format($row['price'],2) ?> / Night</p>
              <p><strong>Amenities:</strong></p>
              <ul>
                <?php 
                  $amenities = explode(",", $row['amenities']);
                  foreach($amenities as $am){ echo "<li>".htmlspecialchars(trim($am))."</li>"; }
                ?>
              </ul>
              <a href="booking.php?room_id=<?= $row['id'] ?>" class="btn btn-success w-100">Book Now</a>
            </div>
            <div class="col-md-6">
              <p><?= nl2br(htmlspecialchars($row['details'])) ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

  </div>
</section>

<!-- Footer -->
<footer>
  <p>&copy; <?php echo date("Y"); ?> HotelBooking. All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
