<?php
include "db.php"; // DB connection

// Delete room
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM rooms WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: list_room.php");
}

// Fetch rooms
$sql = "SELECT * FROM rooms";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>List Rooms</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { font-family: Arial, sans-serif; background: #f8f9fa; }
    .card {
      border-radius: 15px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
    }
    .card img {
      border-radius: 15px 15px 0 0;
      height: 200px;
      object-fit: cover;
    }
    .btn {
      border-radius: 8px;
    }
  </style>
</head>
<body>

<div class="container mt-4">
  <h2 class="text-center mb-4">🏨 List of Rooms</h2>
  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <div class="card">
          <?php
            $img_path = "uploads/" . $row['photo'];
            if (!empty($row['photo']) && file_exists($img_path)) {
              $display_img = $img_path;
            } else {
              $display_img = "https://via.placeholder.com/400x200?text=No+Image";
            }
          ?>
          <img src="<?php echo $display_img; ?>" class="card-img-top" alt="Room Image">
          <div class="card-body">
            <h5 class="card-title">💰 <?php echo $row['price']; ?> LKR</h5>
            <p><strong>Details:</strong> <?php echo $row['details']; ?></p>
            <p><strong>Amenities:</strong> <?php echo $row['amenities']; ?></p>
            <div class="d-flex justify-content-between">
              <a href="update_room.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">✏ Update</a>
              <a href="list_room.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this room?');">🗑 Delete</a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

</body>
</html>
