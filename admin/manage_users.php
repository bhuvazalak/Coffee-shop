<?php
session_start();
if (!isset($_SESSION['username'])) { header('Location: login.php'); exit(); }
require_once __DIR__ . '/config/dbcon.php';

// Delete user
if (isset($_GET['delete'])) {
    $uid = intval($_GET['delete']);
    mysqli_query($con, "DELETE FROM users_auth WHERE id = $uid");
    header('Location: manage_users.php');
    exit();
}

$users = mysqli_query($con, "SELECT id, name, email, created_at FROM users_auth ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f7f7f7; margin: 0; }
    .sidebar { width: 250px; height: 100vh; background-color: #333; color: #fff; position: fixed; padding-top: 20px; }
    .sidebar a { padding: 15px 20px; text-decoration: none; color: #fff; display: block; }
    .sidebar a:hover { background-color: #555; }
  </style>
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="content" style="margin-left:260px; padding:20px;">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Registered Users</h4>
        <a href="register_user.php" class="btn btn-sm btn-primary">Add User</a>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Created</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php while($u = mysqli_fetch_assoc($users)) { ?>
            <tr>
              <td><?php echo $u['id']; ?></td>
              <td><?php echo htmlspecialchars($u['name']); ?></td>
              <td><?php echo htmlspecialchars($u['email']); ?></td>
              <td><?php echo htmlspecialchars($u['created_at']); ?></td>
              <td>
                <a class="btn btn-sm btn-info" href="view_user.php?id=<?php echo $u['id']; ?>">View</a>
                <a class="btn btn-sm btn-warning" href="edit_user.php?id=<?php echo $u['id']; ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="manage_users.php?delete=<?php echo $u['id']; ?>" onclick="return confirm('Delete this user?')">Delete</a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


