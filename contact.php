<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - HotBeans</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fefae0;
    }

    /* Navbar Styling */
    .navbar {
      background-color: #461608ff;
    }

    .navbar-brand, .nav-link {
      color: #fcead7 !important;
      font-weight: 500;
    }

    .nav-link:hover {
      color: #ffddaa !important;
    }

    .contact-title {
      text-align: center;
      margin: 50px 0 30px;
      font-size: 2.8rem;
      font-family: 'Pacifico', cursive;
      color: #441d11ff;
    }

    .contact-form {
      max-width: 650px;
      margin: 0 auto 60px;
      background: #fffaf3;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .form-control {
      margin-bottom: 20px;
      padding: 12px;
      border-radius: 10px;
      border: 1px solid #ccc;
      background-color: #fffaf0;
    }

    .form-control:focus {
      border-color: #c97b63;
      box-shadow: 0 0 0 0.2rem rgba(201, 123, 99, 0.25);
    }

    .btn-submit {
      background-color: #8d6e63;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 16px;
      border-radius: 8px;
      transition: background-color 0.3s;
    }

    .btn-submit:hover {
      background-color: #481f11ff;
    }

    .message, .error {
      font-weight: bold;
      text-align: center;
      margin-bottom: 15px;
      padding: 10px;
      border-radius: 5px;
    }

    .message {
      background-color: #d4edda;
      color: #155724;
    }

    .error {
      background-color: #f8d7da;
      color: #43080eff;
    }

    footer {
      background-color: #4e342e;
      color: #fcead7;
      text-align: center;
      padding: 20px;
      font-size: 14px;
      margin-top: 50px;
    }
  </style>
</head>
<body>

<!-- ✅ Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Coffee Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
        <li class="nav-item"><a class="nav-link" href="table.php">Table</a></li>
        <li class="nav-item"><a class="nav-link active" href="contact.php">Contact Us</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<!-- ✅ Contact Form Section -->
<div class="container">
  <h2 class="contact-title">Contact Us</h2>

  <?php
  $name = $email = $phone = $message = "";
  $success_msg = $error_msg = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $conn = new mysqli("localhost", "root", "", "hotbeans");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO contact (name, email, phone, message)
            VALUES ('$name', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
      $success_msg = "Your message has been sent successfully!";
      $name = $email = $phone = $message = "";
    } else {
      $error_msg = "Error: " . $conn->error;
    }

    $conn->close();
  }
  ?>

  <?php if ($success_msg): ?>
    <div class="message"><?php echo $success_msg; ?></div>
  <?php endif; ?>
  <?php if ($error_msg): ?>
    <div class="error"><?php echo $error_msg; ?></div>
  <?php endif; ?>

  <form method="POST" class="contact-form">
    <input type="text" name="name" class="form-control" placeholder="Your Name" required value="<?php echo $name; ?>">
    <input type="email" name="email" class="form-control" placeholder="Your Email" required value="<?php echo $email; ?>">
    <input type="text" name="phone" class="form-control" placeholder="Your Phone Number" required value="<?php echo $phone; ?>">
    <textarea name="message" class="form-control" placeholder="Your Message" rows="5" required><?php echo $message; ?></textarea>
    <div class="text-center">
      <button type="submit" class="btn btn-submit">Submit</button>
    </div>
  </form>
</div>

<!-- ✅ Footer -->
<footer>
  &copy; 2025 HotBeans. Crafted with ☕ and ❤️
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
