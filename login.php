<?php
session_start();
include "db.php"; // include DB connection

$error = "";

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepared statement for security
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=? LIMIT 1");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['admin'] = $username;
        header("Location: admindashboard.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #0d6efd, #6c63ff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }
    .login-card {
      width: 100%;
      max-width: 400px;
      padding: 30px;
      border-radius: 15px;
      background: white;
      box-shadow: 0px 4px 20px rgba(0,0,0,0.2);
      text-align: center;
    }
    .login-card img {
      width: 80px;
      margin-bottom: 20px;
    }
    .form-control {
      border-radius: 10px;
    }
    .btn-primary {
      border-radius: 10px;
      padding: 10px;
      font-weight: bold;
      width: 100%;
    }
  </style>
</head>
<body>

<div class="login-card">
  <img src="https://cdn-icons-png.flaticon.com/512/5087/5087579.png" alt="Admin Icon">
  <h3 class="mb-3">Admin Login</h3>

  <?php if (!empty($error)) { ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
  <?php } ?>

  <form method="POST">
    <div class="mb-3">
      <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
    </div>
    <div class="mb-3">
      <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
    </div>
    <button type="submit" name="login" class="btn btn-primary">Login</button>
  </form>
</div>

</body>
</html>

<?php
echo "<h1>Login Page Placeholder</h1>";
?>
