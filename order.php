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
  <title>Order - HotBeans</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #ffffff;
      margin: 0;
      padding: 0;
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

    .order-title {
      text-align: center;
      font-size: 4rem;
      font-weight: bold;
      color: #3e2723;
      margin-top: 40px;
    }

    .form-container {
      max-width: 700px;
      margin: 40px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    label {
      font-weight: 500;
      margin-bottom: 6px;
    }

    input, select {
      margin-bottom: 20px;
    }

    button {
      background-color: #3e2723;
      color: white;
      font-size: 18px;
      font-weight: bold;
      padding: 12px;
      border: none;
      border-radius: 6px;
      width: 100%;
    }

    button:hover {
      background-color: #5d4037;
    }

    footer {
      background-color: #3e2723;
      color: #fff3e0;
      text-align: center;
      padding: 15px;
      font-size: 14px;
      margin-top: 60px;
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
        <li class="nav-item"><a class="nav-link active" href="order.php">Order</a></li>
        <li class="nav-item"><a class="nav-link" href="table.php">Table</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<!-- Order Title -->
<h2 class="order-title">COFFEE ORDER</h2>

<!-- Order Form -->
<div class="container form-container">
  <form action="save_order.php" method="POST">
    <div class="mb-3">
      <label for="name">Full Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
    </div>

    <div class="mb-3">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
    </div>

    <div class="mb-3">
      <label for="phone">Phone Number</label>
      <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" required>
    </div>

    <div class="mb-3">
      <label for="product">Select Coffee</label>
      <select class="form-select" name="product" id="product" required>
       <?php if ($selected_product) { ?>
          <option value="<?php echo htmlspecialchars($selected_product); ?>"><?php echo htmlspecialchars($selected_product); ?></option>
        <?php } else { ?>
          <option value="">-- Select Coffee Product --</option>
          <!-- <option value="Black Coffee">Black Coffee</option>
          <option value="Espresso">Espresso</option>
          <option value="Latte">Latte</option>
          <option value="Mocha">Mocha</option>
          <option value="Flat White">Flat White</option>
          <option value="Nitro">Nitro</option>
          <option value="Iced Dalgona">Iced Dalgona</option>
          <option value="Eiskcaffe">Eiskcaffe</option>
          <option value="Iced Espresso">Iced Espresso</option>
          <option value="Frapped">Frapped</option> -->
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
        <?php } ?>
      </select>
    </div>
    

    <div class="mb-3">
      <label for="quantity">Quantity</label>
      <input type="number" class="form-control" name="quantity" id="quantity" min="1" required>
    </div>

    <div class="mb-3">
      <label for="payment_mode">Payment Mode</label>
      <select class="form-select" name="payment_mode" id="payment_mode" required>
        <option value="">-- Select Payment Mode --</option>
        <option value="Cash">Cash</option>
        <option value="UPI">UPI</option>
      </select>
    </div>
    

    <button type="submit">Submit Order</button>
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
