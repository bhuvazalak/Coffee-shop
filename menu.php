<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Our Menu - HotBeans</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fff8f0;
    }
    /* Navbar Styling */
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
    .menu-title {
      text-align: center;
      font-family: 'Pacifico', cursive;
      font-size: 3rem;
      margin-top: 40px;
      color: #5d4037;
    }
    .coffee-section-title {
      font-size: 1.5rem;
      color: #4e342e;
      font-weight: bold;
      margin: 40px 0 20px;
    }
    .coffee-card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: 0.3s;
    }
    .coffee-card:hover {
      transform: scale(1.03);
    }
    .coffee-img {
      height: 200px;
      object-fit: cover;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      width: 100%;
    }
    .coffee-body {
      padding: 20px;
    }
    .coffee-body h5 {
      font-weight: 600;
      color: #3e2723;
    }
    .coffee-body p {
      color: #6d4c41;
    }
    .coffee-price {
      font-weight: bold;
      color: #4e342e;
      margin-top: 10px;
    }
    .order-btn {
      margin-top: 15px;
      background-color: transparent;
      color: #5d4037;
      border: 1px solid #5d4037;
      border-radius: 5px;
      padding: 8px 20px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
      display: inline-block;
    }
    .order-btn:hover {
      background-color: #5d4037;
      color: white;
    }
    footer {
      background-color: #3e2723;
      color: #fff3e0;
      text-align: center;
      padding: 20px;
      margin-top: 50px;
    }
  </style>
</head>
<body>

<!-- Navigation Bar -->
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
        <li class="nav-item"><a class="nav-link active" href="menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
        <li class="nav-item"><a class="nav-link" href="table.php">Table</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<!-- Menu Content -->
<h2 class="menu-title">OUR MENU</h2>

<div class="container">
  <div class="coffee-section-title">Coffee Type: Hot & Cold</div>
  <div class="row g-4">
    <!-- <?php
    $products = [
      ["name" => "Black Coffee", "price" => "₹120", "image" => "blackcoffee.jpg", "desc" => "Straightforward and pure coffee without milk or sugar."],
      ["name" => "Espresso", "price" => "₹120", "image" => "espresso.jpg", "desc" => "Highly concentrated coffee — rich and strong."],
      ["name" => "Latte", "price" => "₹150", "image" => "latte.jpg", "desc" => "Espresso with steamed milk and creamy foam."],
      ["name" => "Mocha", "price" => "₹160", "image" => "mocha.jpg", "desc" => "Chocolate + coffee — a sweet and bold combo."],
      ["name" => "Flat White", "price" => "₹140", "image" => "flatwhite.jpg", "desc" => "Smooth espresso with microfoam milk."],
      ["name" => "Nitro", "price" => "₹180", "image" => "nitro.jpg", "desc" => "Cold brew infused with nitrogen — creamy & cold."],
      ["name" => "Iced Dalgona", "price" => "₹170", "image" => "dalgona.jpg", "desc" => "Whipped coffee with chilled milk."],
      ["name" => "Eiskaffe", "price" => "₹160", "image" => "eiskaffe.jpg", "desc" => "German-style iced coffee with ice cream."],
      ["name" => "Iced Espresso", "price" => "₹150", "image" => "icedespresso.jpg", "desc" => "Refreshing espresso served over ice."],
      ["name" => "Frappe", "price" => "₹140", "image" => "frappe.jpg", "desc" => "Blended iced coffee topped with foam."]
    ];

    foreach ($products as $product):
    ?>
    <div class="col-md-6 col-lg-4">
      <div class="card coffee-card">
        <img src="images/<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="card-img-top coffee-img" />
        <div class="coffee-body">
          <h5><?php echo htmlspecialchars($product['name']); ?></h5>
          <p><?php echo htmlspecialchars($product['desc']); ?></p>
          <div class="coffee-price"><?php echo htmlspecialchars($product['price']); ?></div>
          <a href="order.php" class="order-btn">ORDER NOW</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?> -->
    <?php
    include("./admin/config/dbcon.php");
    $query = "SELECT * FROM products WHERE status = 1"; // Only show active products
    $product_run = mysqli_query($con, $query);

    if (mysqli_num_rows($product_run) > 0) {
        foreach ($product_run as $product) {
    ?>
    <div class="col-md-6 col-lg-4">
      <div class="card coffee-card">
         <img src="./uploads/<?= $product['image']; ?>" class="card-img-top coffee-img" alt="">
        <!-- <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" class="card-img-top coffee-img" /> -->
        <div class="coffee-body">
          <h5><?php echo htmlspecialchars($product['product_name']); ?></h5>
          <p><?php echo htmlspecialchars($product['description']); ?></p>
          <div class="coffee-price"><?php echo htmlspecialchars($product['price']); ?></div>
          <a href="order.php?id=<?php echo urlencode($product['id']); ?>"  class="order-btn">ORDER NOW</a>
        </div>
      </div>
    </div>
    <?php
        }
    } else {
        echo "<p class='text-center'>No products available.</p>";
    }
    ?>
  </div>
</div>

<!-- Footer -->
<footer>
  &copy; 2025 HotBeans. Crafted with ☕ and ❤️
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
