<?php
session_start();
if (!isset($_SESSION['username'])) { header('Location: login.php'); exit(); }
require_once __DIR__ . '/config/dbcon.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = $_POST['password'] ?? '';
    if ($name === '' || $email === '' || $pass === '') {
        $error = 'All fields are required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email';
    } else {
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = mysqli_prepare($con, "INSERT INTO users_auth (name,email,password_hash) VALUES (?,?,?)");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hash);
            if (mysqli_stmt_execute($stmt)) {
                header('Location: manage_users.php');
                exit();
            } else {
                $error = mysqli_errno($con) == 1062 ? 'Email already exists' : 'Could not create user';
            }
            mysqli_stmt_close($stmt);
        } else {
            $error = 'Something went wrong';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="content" style="margin-left:260px; padding:20px;">
  <div class="card" style="max-width:600px;">
    <div class="card-body">
      <h4 class="mb-3">Add User</h4>
      <?php if ($error): ?><div class="alert alert-danger py-2"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
      <form method="post">
        <div class="mb-3">
          <label class="form-label">Full name</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="manage_users.php" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>








