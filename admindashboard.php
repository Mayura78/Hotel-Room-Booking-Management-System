<?php
session_start();
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
if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

// Fetch monthly bookings
$monthlyBookings = [];
$query = "SELECT MONTH(checkin_date) as month, COUNT(*) as total 
          FROM bookings 
          WHERE YEAR(checkin_date) = YEAR(CURDATE())
          GROUP BY MONTH(checkin_date)";
$result = $conn->query($query);
while($row = $result->fetch_assoc()){
    $monthlyBookings[$row['month']] = (int)$row['total'];
}
// Ensure all months exist
for($m=1; $m<=12; $m++){
    if(!isset($monthlyBookings[$m])) $monthlyBookings[$m] = 0;
}
ksort($monthlyBookings);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: Arial, sans-serif; background:#f4f6f9; }
    .sidebar {
      height: 100vh; 
      background: #16532fea; 
      color: white; 
      position: fixed; 
      width: 250px;
      padding-top: 20px;
    }
    .sidebar a {
      color: white; 
      text-decoration: none; 
      display: block; 
      padding: 10px 20px; 
      transition: background 0.3s;
    }
    .sidebar a:hover {
      background: rgba(255,255,255,0.2);
    }
    .dropdown-menu a {
      color: #000 !important;
    }
    .content {
      margin-left: 260px; 
      padding: 20px;
    }
    .navbar {
      background: #f8f9fa;
    }
    footer {
      text-align:center;
      padding:15px 0;
      background:#16532fea;
      color:white;
      position:fixed;
      bottom:0;
      width:100%;
      margin-left:260px;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <h4 class="text-center mb-4">Admin Panel</h4>
  
  <a class="dropdown-toggle" data-bs-toggle="collapse" href="#manageRooms" role="button">Manage Rooms</a>
  <div class="collapse ps-3" id="manageRooms">
    <a href="add_room.php">➕ Add Room</a>
    <a href="list_room.php">📋 List Rooms</a>
  </div>

  <a class="dropdown-toggle" data-bs-toggle="collapse" href="#manageStaff" role="button">Manage Staff</a>
  <div class="collapse ps-3" id="manageStaff">
    <a href="add_staff.php">➕ Add Staff</a>
    <a href="list_staff.php">📋 List Staff</a>
  </div>

  <a class="dropdown-toggle" data-bs-toggle="collapse" href="#manageBookings" role="button">Manage Bookings</a>
  <div class="collapse ps-3" id="manageBookings">
    <a href="view_booking.php">👁 View Booking Room</a>
    <a href="archived_bookings.php">📋 Archived Bookings</a>
  </div>

  <a href="view_contact_messages.php">📩 User Contacts</a>
</div>

<!-- Content -->
<div class="content">
  <nav class="navbar navbar-expand-lg mb-4">
    <div class="container-fluid">
      <span class="navbar-brand">Welcome, <?php echo $_SESSION['admin']; ?> 👋</span>
      <span class="ms-auto me-3" id="datetime"></span>
      <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
  </nav>
  
  <h2>Dashboard Overview</h2>
  <p>Use the sidebar to manage rooms, staff, bookings, and user contacts.</p>

  <h2 class="mt-4">Monthly Bookings Overview</h2>
  <div id="booking_chart" style="width: 100%; height: 400px;"></div>
</div>

<!-- Footer -->
<footer>
  &copy; <?= date("Y") ?> HotelBooking. All Rights Reserved.
</footer>

<!-- Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Month', 'Bookings'],
    <?php
    foreach($monthlyBookings as $month => $count){
        $monthName = date("F", mktime(0,0,0,$month,10));
        echo "['".$monthName."', ".$count."],";
    }
    ?>
  ]);

  var options = {
    title: 'Bookings per Month (<?= date("Y") ?>)',
    legend: { position: 'none' },
    hAxis: { title: 'Month' },
    vAxis: { title: 'Bookings' },
    colors: ['#0d6efd']
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('booking_chart'));
  chart.draw(data, options);
}


// Auto Date & Time
function updateDateTime(){
    const now = new Date();
    const datetime = now.toLocaleString('en-GB', {hour12:true});
    document.getElementById('datetime').innerText = datetime;
}
setInterval(updateDateTime, 1000);
updateDateTime();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
