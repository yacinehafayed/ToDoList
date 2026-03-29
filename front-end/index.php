<?php
session_start();
require_once '../first-backeend/db.php';
require_once '../first-backeend/auth_check.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT COUNT(*) as total FROM tasks WHERE UserId=? AND status='finished'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$finished = $result->fetch_assoc()['total'];

$sql = "SELECT COUNT(*) AS total1 FROM tasks WHERE UserId=? AND status='pending'";
$stmt =$conn->prepare($sql);
$stmt->bind_param("i",$user_id);
$stmt->execute();
$result = $stmt->get_result();
$pending = $result->fetch_assoc()['total1'];

$total = $finished + $pending;
$progress = ($total > 0) ? round(($finished / $total) * 100) : 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <title>To Do List</title>
</head>
<body>
  <!-- Navbar -->
<?php include 'navbar.php'; ?>
  <!-- Sidebar -->
<?php include 'sidebar.php'; ?>
  <!-- Main content -->
  <main class="content">
    <div class="title">
      <h2>Welcome , <?=htmlspecialchars($_SESSION['user_name'])?></h2>     
      <p>Here's an overview of your tasks</p>
    </div>

    <div class="dashboard">
      <div class="progress-fill" style="width: <?= $progress ?>%;">
            <?= $progress ?>%
      </div>
      </div>
<br>
      <div class="dash-cards">
        <div class="card">
          <div class="icon"><i class="fa fa-check" aria-hidden="true"></i></div>
          <h4>Tasks Finished  </h4>
          <p><?= $finished ?></p>
        </div>
        <div class="card">
          <div class="icon"><i class="fa-solid fa-clock"></i></div>
          <p><?= $pending?></p>
        </div>
      </div>
    </div>
  </main>

  <script src="script.js"></script>
</body>
</html>
