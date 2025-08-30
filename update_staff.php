<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM staff WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $staff = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $position = $_POST['position'];
    $joining_date = $_POST['joining_date'];
    $address = $_POST['address'];

    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $target = "uploads/" . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        $sql = "UPDATE staff SET photo='$photo', name='$name', email='$email', age='$age', position='$position', joining_date='$joining_date', address='$address' WHERE id='$id'";
    } else {
        $sql = "UPDATE staff SET name='$name', email='$email', age='$age', position='$position', joining_date='$joining_date', address='$address' WHERE id='$id'";
    }

    mysqli_query($conn, $sql);
    header("Location: list_staff.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Staff</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">✏ Update Staff</h2>
  <form method="POST" enctype="multipart/form-data" class="p-4 shadow rounded bg-white">
    <div class="mb-3">
      <label>Photo</label>
      <input type="file" name="photo" class="form-control">
      <p>Current: <img src="uploads/<?php echo $staff['photo']; ?>" width="100"></p>
    </div>
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $staff['name']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $staff['email']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Age</label>
      <input type="number" name="age" class="form-control" value="<?php echo $staff['age']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Position</label>
      <input type="text" name="position" class="form-control" value="<?php echo $staff['position']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Joining Date</label>
      <input type="date" name="joining_date" class="form-control" value="<?php echo $staff['joining_date']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Address</label>
      <textarea name="address" class="form-control" required><?php echo $staff['address']; ?></textarea>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="list_staff.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
