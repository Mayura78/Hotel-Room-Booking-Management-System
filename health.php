<?php
// Example: array of rooms, in real case fetch from database
$rooms = [
    ['name' => 'Pool', 'image' => 'image/Pool1.png'],
    ['name' => 'Pool', 'image' => 'image/Pool2.png'],
    ['name' => 'Gym', 'image' => 'image/Gym1.png'],
    ['name' => 'Gym', 'image' => 'image/Gym1.png'],
    ['name' => 'Adventure Zone', 'image' => 'image/Adventure Zone1.png'],
    ['name' => 'Adventure Zone', 'image' => 'image/Adventure Zone2.png'],

];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Rooms & Suites Gallery</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
  .gallery-card {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s;
}
  .gallery-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}
  .gallery-card:hover {
    transform: translateY(-5px);
}
  .room-name { 
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%; 
    background: rgba(0,0,0,0.6);
    color: #fff; 
    text-align: center;
    padding: 8px 0;
    font-weight: 500;
    font-size: 1rem;
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
        </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Gallery Section -->
<section class="container py-5">
  <h2 class="text-center mb-5">Rooms & Suites Gallery</h2>
  <div class="row g-4">
    <?php foreach($rooms as $room): ?>
      <div class="col-md-4">
        <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#roomModal" onclick="openModal('<?= $room['name'] ?>', '<?= $room['image'] ?>')">
          <img src="<?= $room['image'] ?>" alt="<?= $room['name'] ?>">
          <div class="room-name"><?= $room['name'] ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Room Modal -->
<div class="modal fade" id="roomModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRoomName"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalRoomImage" src="" alt="" class="img-fluid rounded">
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function openModal(name, image) {
    document.getElementById('modalRoomName').innerText = name;
    document.getElementById('modalRoomImage').src = image;
  }
</script>

</body>
</html>
