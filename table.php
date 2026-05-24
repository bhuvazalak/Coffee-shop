<?php
include("./admin/config/dbcon.php");

$selected_product = '';
if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT product_name FROM products WHERE id = '$product_id' AND status = 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        $selected_product = $product['product_name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book a Table - HotBeans</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fff8f0;
    }

    .navbar {
      background-color: #3e2723;
    }

    .navbar-brand, .nav-link {
      color: #fff3e0 !important;
      font-weight: 500;
    }

    .nav-link:hover {
      color: #ffd180 !important;
    }

    .form-section {
      padding: 50px 0;
    }

    .form-title {
      text-align: center;
      margin-bottom: 40px;
      font-size: 3rem;
      font-family: 'Pacifico', cursive;
      color: #5d4037;
    }

    .btn-book {
      background-color: #3e2723;
      color: #fff3e0;
      font-weight: bold;
    }

    .btn-book:hover {
      background-color: #5d4037;
      color: #ffd180;
    }

    footer {
      margin-top: 50px;
      background-color: #3e2723;
      color: #fff3e0;
      text-align: center;
      padding: 15px;
      font-size: 14px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
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
        <li class="nav-item"><a class="nav-link active" href="table.php">Table</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<!-- Booking Form -->
<div class="container form-section">
  <h2 class="form-title">Book a Table</h2>
  <form action="table_submit.php" method="POST" class="row g-4 justify-content-center">
    <div class="col-md-6">
      <label for="name" class="form-label">Your Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="col-md-6">
      <label for="table_no" class="form-label">Table Number</label>
      <input type="number" class="form-control" id="table_no" name="table_no" required>
    </div>
    <div class="col-md-6">
      <label for="time" class="form-label">Time</label>
      <input type="time" class="form-control" id="time" name="time" required>
    </div>
    <div class="col-md-6">
      <label for="people" class="form-label">Number of People</label>
      <input type="number" class="form-control" id="people" name="people" required>
    </div>
    <div class="col-md-6">
      <label for="product_name" class="form-label">Product Name</label>
      <select class="form-control" id="product_name" name="product_name" required>
        <option value="">-- Select Product --</option>
        <!-- <option value="Black Coffee">Black Coffee</option>
        <option value="Espresso">Espresso</option>
        <option value="Latte">Latte</option>
        <option value="Mocha">Mocha</option>
        <option value="Flat White">Flat White</option>
        <option value="Nitro">Nitro</option>
        <option value="Iced Dalgona">Iced Dalgona</option>
        <option value="Eiskaffee">Eiskaffee</option>
        <option value="Iced Espresso">Iced Espresso</option>
        <option value="Frappe">Frappe</option> -->
        <?php
        $products_query = "SELECT product_name FROM products WHERE status = 1 ORDER BY product_name ASC";
        $products_result = mysqli_query($con, $products_query);
        if ($products_result && mysqli_num_rows($products_result) > 0) {
            while ($product = mysqli_fetch_assoc($products_result)) {
                $product_name = htmlspecialchars($product['product_name']);
                $selected = ($selected_product === $product_name) ? 'selected' : '';
                echo "<option value=\"$product_name\" $selected>$product_name</option>";
            }
        }
        ?>
      </select>
    </div>
    <div class="col-12 text-center">
      <button type="submit" class="btn btn-book px-5">Book Table</button>
    </div>
  </form>
</div>

<!-- Footer -->
<footer>
  &copy; 2025 HotBeans. Crafted with ☕ and ❤️
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
