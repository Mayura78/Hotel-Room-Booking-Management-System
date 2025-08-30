<?php
session_start();

// Check admin login
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// DB connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "hotelbookingmanagement";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM bookings WHERE id=$id");
    header("Location: view_booking.php");
    exit();
}

// Handle Archive (move to archive table)
if (isset($_GET['archive'])) {
    $id = intval($_GET['archive']);
    // Move booking to archive table
    $conn->query("INSERT INTO archived_bookings SELECT * FROM bookings WHERE id=$id");
    // Delete from main bookings
    $conn->query("DELETE FROM bookings WHERE id=$id");
    header("Location: view_booking.php");
    exit();
}

// Fetch bookings
$result = $conn->query("SELECT * FROM bookings ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Bookings</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f4f6f9; font-family: Arial, sans-serif; }
    .container { margin-top: 30px; }
    table { background: white; border-radius: 10px; overflow: hidden; }
    th { background: #0d6efd; color: white; text-align: center; }
    td { vertical-align: middle; }
    .btn-sm { margin: 2px; }
  </style>
</head>
<body>

<div class="container">
  <h2 class="mb-4 text-center">📋 All Bookings</h2>

  <table class="table table-bordered table-hover shadow">
    <thead>
      <tr>
        <th>ID</th>
        <th>Room</th>
        <th>Guest Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Guests</th>
        <th>Payment</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['room_name']) ?></td>
        <td><?= htmlspecialchars($row['guest_name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['phone']) ?></td>
        <td><?= $row['checkin_date'] ?></td>
        <td><?= $row['checkout_date'] ?></td>
        <td><?= $row['guests'] ?></td>
        <td><?= $row['payment_method'] ?></td>
        <td class="text-center">
          <a href="?archive=<?= $row['id'] ?>" class="btn btn-warning btn-sm" onclick="return confirm('Archive this booking?')">Archive</a>
          <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this booking?')">Delete</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
