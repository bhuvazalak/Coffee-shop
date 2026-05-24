<?php
session_start();

// If already logged in, go home
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// DB connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "hotbeans";
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = trim($_POST['identifier'] ?? ''); // email or name
    $pass = $_POST['password'] ?? '';

    if ($identifier === '' || $pass === '') {
        $error = 'Please enter email/name and password';
    } else {
        // Try to find by email or name
        $stmt = mysqli_prepare($conn, "SELECT id, name, email, password_hash FROM users_auth WHERE email = ? OR name = ? LIMIT 1");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ss', $identifier, $identifier);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $user_id, $name, $emailDb, $password_hash);
            if (mysqli_stmt_fetch($stmt)) {
                // Existing user: verify password
                if (password_verify($pass, $password_hash)) {
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $name;
                    header('Location: index.php');
                    exit();
                } else {
                    $error = 'Invalid credentials';
                }
            } else {
                // Not found -> auto-register this identifier and login
                mysqli_stmt_close($stmt);
                $newName = $identifier;
                $newEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? $identifier : '';
                if ($newEmail !== '') {
                    $parts = explode('@', $newEmail);
                    if ($parts[0] !== '') { $newName = $parts[0]; }
                }
                $hash = password_hash($pass, PASSWORD_BCRYPT);
                $ins = mysqli_prepare($conn, "INSERT INTO users_auth (name, email, password_hash) VALUES (?,?,?)");
                if ($ins) {
                    mysqli_stmt_bind_param($ins, 'sss', $newName, $newEmail, $hash);
                    if (mysqli_stmt_execute($ins)) {
                        $_SESSION['user_id'] = mysqli_insert_id($conn);
                        $_SESSION['user_name'] = $newName;
                        header('Location: index.php');
                        exit();
                    } else {
                        $error = 'Could not create user';
                    }
                    mysqli_stmt_close($ins);
                } else {
                    $error = 'Something went wrong';
                }
                return;
            }
            mysqli_stmt_close($stmt);
        } else {
            $error = 'Something went wrong';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - HotBeans</title>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Poppins', sans-serif;
      background: url('images/bg-coffee.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
    }
    header { background: rgba(0, 0, 0, 0.85); padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 1000; }
    .logo { font-family: 'Pacifico', cursive; font-size: 32px; color: #ffd9a0; }
    nav { display: flex; gap: 18px; flex-wrap: wrap; }
    nav a { color: #fff8e1; text-decoration: none; font-weight: 500; padding-bottom: 3px; position: relative; }
    nav a::after { content: ""; position: absolute; width: 0%; height: 2px; left: 0; bottom: 0; background-color: #ffd9a0; transition: width 0.3s ease-in-out; }
    nav a:hover::after { width: 100%; }
    footer { text-align: center; padding: 20px; background-color: rgba(0, 0, 0, 0.8); color: #fff; }
  </style>
  </head>
<body>

<header>
  <div class="logo">☕ coffee shop</div>
  <nav style="display: flex; gap: 15px;">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="menu.php">Menu</a>
    <a href="blog.php">Blog</a>
    <a href="gallery.php">Gallery</a>
    <a href="order.php">Order</a>
    <a href="table.php">Table</a>
    <a href="contact.php">Contact Us</a>
  </nav>
  </header>

<!-- Login Card -->
<div class="container py-5" style="min-height: calc(100vh - 140px);">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h3 class="mb-3 text-center">Login</h3>
          <?php if ($error): ?>
            <div class="alert alert-danger py-2"><?php echo htmlspecialchars($error); ?></div>
          <?php endif; ?>
          <form method="post">
            <div class="mb-3">
              <label class="form-label">Email or Name</label>
              <input type="text" name="identifier" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-dark w-100" type="submit">Login</button>
          </form>
          <div class="text-center mt-3">
            <a href="register.php">Create an account</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer (same as site) -->
<footer>
  &copy; 2025 HotBeans. Crafted with ☕ and ❤️
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


