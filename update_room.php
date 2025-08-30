<?php
include "db.php";

// Get room details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM rooms WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $room = mysqli_fetch_assoc($result);
}

// Update room
if (isset($_POST['update'])) {
    $price = $_POST['room_price'];
    $details = $_POST['details'];
    $amenities = $_POST['amenities'];

    if (!empty($_FILES['room_photo']['name'])) {
        $photo = $_FILES['room_photo']['name'];
        $upload_dir = "uploads";
        $target = $upload_dir . "/" . basename($photo);

        // Ensure uploads directory exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        move_uploaded_file($_FILES['room_photo']['tmp_name'], $target);

        $sql = "UPDATE rooms SET price='$price', details='$details', amenities='$amenities', photo='$photo' WHERE id='$id'";
    } else {
        $sql = "UPDATE rooms SET price='$price', details='$details', amenities='$amenities' WHERE id='$id'";
    }

    mysqli_query($conn, $sql);
    header("Location: list_room.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Room</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">✏ Update Room</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Room Price</label>
      <input type="number" step="0.01" name="room_price" class="form-control" value="<?php echo $room['price']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Details</label>
      <textarea name="details" class="form-control" required><?php echo $room['details']; ?></textarea>
    </div>
    <div class="mb-3">
      <label>Amenities</label>
      <textarea name="amenities" class="form-control" required><?php echo $room['amenities']; ?></textarea>
    </div>
    <div class="mb-3">
      <label>Change Room Photo</label>
      <input type="file" name="room_photo" class="form-control">
      <?php
        $img_path = "uploads/" . $room['photo'];
        if (!empty($room['photo']) && file_exists($img_path)) {
          $display_img = $img_path;
        } else {
          $display_img = "https://via.placeholder.com/100x100?text=No+Image";
        }
      ?>
      <p>Current Photo: <img src="<?php echo $display_img; ?>" width="100"></p>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="list_room.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
