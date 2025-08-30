<?php
include "db.php";

// Delete staff
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM staff WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: list_staff.php");
}

// Fetch staff
$sql = "SELECT * FROM staff";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Staff Management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .staff-card img {
      height: 150px;
      width: 150px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 10px;
    }
  </style>
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="text-center mb-4">👥 Staff Members</h2>
  <a href="add_staff.php" class="btn btn-success mb-3">➕ Add Staff</a>
  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <div class="card staff-card text-center p-3 shadow">
          <img src="uploads/<?php echo $row['photo']; ?>" alt="Staff Photo">
          <h5><?php echo $row['name']; ?></h5>
          <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
          <p><strong>Age:</strong> <?php echo $row['age']; ?></p>
          <p><strong>Position:</strong> <?php echo $row['position']; ?></p>
          <p><strong>Joining Date:</strong> <?php echo $row['joining_date']; ?></p>
          <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
          <div class="d-flex justify-content-around">
            <a href="update_staff.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">✏ Update</a>
            <a href="list_staff.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-sm">🗑 Delete</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</body>
</html>
