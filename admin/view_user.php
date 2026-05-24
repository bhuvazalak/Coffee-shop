<?php
session_start();
if (!isset($_SESSION['username'])) { header('Location: login.php'); exit(); }
require_once __DIR__ . '/config/dbcon.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = mysqli_prepare($con, "SELECT id, name, email, created_at FROM users_auth WHERE id = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $uid, $name, $email, $created);
$found = mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html>
<head>
  <title>View User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { margin: 0; }
    .sidebar { width: 250px; height: 100vh; background-color: #333; color: #fff; position: fixed; padding-top: 20px; }
    .sidebar a { padding: 15px 20px; text-decoration: none; color: #fff; display: block; }
    .sidebar a:hover { background-color: #555; }
  </style>
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="content" style="margin-left:260px; padding:20px;">
  <div class="card" style="max-width:600px;">
    <div class="card-body">
      <h4 class="mb-3">User Details</h4>
      <?php if (!$found) { ?>
        <div class="alert alert-warning">User not found.</div>
      <?php } else { ?>
        <dl class="row">
          <dt class="col-sm-3">ID</dt><dd class="col-sm-9"><?php echo $uid; ?></dd>
          <dt class="col-sm-3">Name</dt><dd class="col-sm-9"><?php echo htmlspecialchars($name); ?></dd>
          <dt class="col-sm-3">Email</dt><dd class="col-sm-9"><?php echo htmlspecialchars($email); ?></dd>
          <dt class="col-sm-3">Created</dt><dd class="col-sm-9"><?php echo htmlspecialchars($created); ?></dd>
        </dl>
        <a href="manage_users.php" class="btn btn-secondary">Back</a>
      <?php } ?>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>






