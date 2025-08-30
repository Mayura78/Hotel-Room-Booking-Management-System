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

// Handle Restore (move back to active bookings)
if (isset($_GET['restore'])) {
    $id = intval($_GET['restore']);
    $conn->query("INSERT INTO bookings SELECT * FROM archived_bookings WHERE id=$id");
    $conn->query("DELETE FROM archived_bookings WHERE id=$id");
    header("Location: archived_bookings.php");
    exit();
}

// Handle Delete permanently
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM archived_bookings WHERE id=$id");
    header("Location: archived_bookings.php");
    exit();
}

// Fetch archived bookings
$result = $conn->query("SELECT * FROM archived_bookings ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Archived Bookings</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background: #f4f6f9; font-family: Arial, sans-serif; }
.container { margin-top: 30px; }
table { background: white; border-radius: 10px; overflow: hidden; }
th { background: #6c757d; color: white; text-align: center; }
td { vertical-align: middle; }
.btn-sm { margin: 2px; }
</style>
</head>
<body>

<div class="container">
  <h2 class="mb-4 text-center">🗂 Archived Bookings</h2>
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
          <a href="?restore=<?= $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Restore this booking to active list?')">Restore</a>
          <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete permanently?')">Delete</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
