<?php
include "db.php"; // DB connection

if (isset($_POST['add_room'])) {
    $room_name = $_POST['room_name'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $amenities = $_POST['amenities'];

    // File Upload
    $photo = $_FILES['photo']['name'];
    $upload_dir = "uploads";
    $target = $upload_dir . "/" . basename($photo);

    // Ensure uploads directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $sql = "INSERT INTO rooms (room_name, price, details, amenities, photo) 
            VALUES ('$room_name','$price','$details','$amenities','$photo')";
    if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $success = "Room added successfully!";
        } else {
            $error = "Room added, but failed to upload photo.";
        }
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Room</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f4f6f9; }
    .container { max-width: 700px; margin-top: 50px; }
    .card { border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
  </style>
</head>
<body>

<div class="container">
  <div class="card p-4">
    <h3 class="mb-3 text-center">➕ Add New Room</h3>

    <?php if (!empty($success)) { ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php } elseif (!empty($error)) { ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Room Name</label>
        <input type="text" name="room_name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Price (USD)</label>
        <input type="number" name="price" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Details</label>
        <textarea name="details" class="form-control" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Amenities</label>
        <textarea name="amenities" class="form-control" rows="2" placeholder="Free WiFi, Pool, AC" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Upload Photo</label>
        <input type="file" name="photo" class="form-control" accept="image/*" required>
      </div>
      <button type="submit" name="add_room" class="btn btn-success w-100">Add Room</button>
    </form>
  </div>
</div>

</body>
</html>
