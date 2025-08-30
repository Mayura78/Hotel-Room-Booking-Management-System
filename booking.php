<?php
session_start();

// Database connection
$host = "localhost";
$user = "root";
$pass = ""; // your DB password
$dbname = "hotelbookingmanagement";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$room_name = isset($_GET['room']) ? $_GET['room'] : "";

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_name = $_POST['room_name'];
    $guest_name = $_POST['guest_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $guests = $_POST['guests'];
    $payment_method = $_POST['payment_method'];
    $card_number = $card_expiry = $card_cvv = null;

    if($payment_method == "Card") {
        $card_number = $_POST['card_number'];
        $card_expiry = $_POST['card_expiry'];
        $card_cvv = $_POST['card_cvv'];
    }

    $stmt = $conn->prepare("INSERT INTO bookings (room_name, guest_name, email, phone, checkin_date, checkout_date, guests, payment_method, card_number, card_expiry, card_cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssissss", $room_name, $guest_name, $email, $phone, $checkin_date, $checkout_date, $guests, $payment_method, $card_number, $card_expiry, $card_cvv);

    if ($stmt->execute()) {
        $message = "Booking successful! Payment: $payment_method.";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Book Room - HotelBooking</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
footer {
    background: #f88d00ff;
    color: #fff;
    padding: 20px 0;
    margin-top: 50px;
    text-align: center;
    }
</style>
<script>
function toggleCardFields() {
    var method = document.querySelector('input[name="payment_method"]:checked').value;
    var cardFields = document.getElementById('card-fields');
    cardFields.style.display = (method === 'Card') ? 'block' : 'none';
}
</script>
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
      </ul>
    </div>
  </div>
</nav>

<section class="container py-5">
  <h2 class="text-center mb-4">Book Your Room</h2>

  <?php if ($message): ?>
    <div class="alert alert-info text-center"><?= $message ?></div>
  <?php endif; ?>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <form method="post">
        <input type="hidden" name="room_name" value="<?= htmlspecialchars($room_name) ?>">

        <div class="mb-3">
          <label class="form-label">Room</label>
          <input type="text" class="form-control" value="<?= htmlspecialchars($room_name) ?>" readonly>
        </div>

        <div class="mb-3">
          <label class="form-label">Your Name</label>
          <input type="text" class="form-control" name="guest_name" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input type="text" class="form-control" name="phone" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Check-in Date</label>
          <input type="date" class="form-control" name="checkin_date" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Check-out Date</label>
          <input type="date" class="form-control" name="checkout_date" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Number of Guests</label>
          <input type="number" class="form-control" name="guests" min="1" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Payment Method</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="payment_method" value="Cash" onclick="toggleCardFields()" checked>
            <label class="form-check-label">Cash</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="payment_method" value="Card" onclick="toggleCardFields()">
            <label class="form-check-label">Card</label>
          </div>
        </div>

        <div id="card-fields" style="display:none;">
          <div class="mb-3">
            <label class="form-label">Card Number</label>
            <input type="text" class="form-control" name="card_number">
          </div>
          <div class="mb-3">
            <label class="form-label">Expiry Date (MM/YY)</label>
            <input type="text" class="form-control" name="card_expiry">
          </div>
          <div class="mb-3">
            <label class="form-label">CVV</label>
            <input type="text" class="form-control" name="card_cvv">
          </div>
        </div>

        <button type="submit" class="btn btn-success w-100">Confirm Booking</button>
      </form>
    </div>
  </div>
</section>

<footer>
  <p>&copy; <?= date("Y") ?> HotelBooking. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
