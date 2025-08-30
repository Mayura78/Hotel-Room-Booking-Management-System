<?php
include "db.php";

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $position = $_POST['position'];
    $joining_date = $_POST['joining_date'];
    $address = $_POST['address'];

    // Upload photo
    $photo = $_FILES['photo']['name'];
    $target = "uploads/" . basename($photo);
    move_uploaded_file($_FILES['photo']['tmp_name'], $target);

    $sql = "INSERT INTO staff (photo, name, email, age, position, joining_date, address) 
            VALUES ('$photo', '$name', '$email', '$age', '$position', '$joining_date', '$address')";
    mysqli_query($conn, $sql);

    header("Location: list_staff.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Staff</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4 text-center">👨‍💼 Add Staff Member</h2>
  <form method="POST" enctype="multipart/form-data" class="p-4 shadow rounded bg-white">
    <div class="mb-3">
      <label>Photo</label>
      <input type="file" name="photo" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Age</label>
      <input type="number" name="age" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Position</label>
      <input type="text" name="position" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Joining Date</label>
      <input type="date" name="joining_date" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Address</label>
      <textarea name="address" class="form-control" required></textarea>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Add Staff</button>
    <a href="list_staff.php" class="btn btn-secondary">View Staff</a>
  </form>
</div>
</body>
</html>
