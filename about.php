<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About - HotBeans</title>
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

    .about-title {
      text-align: center;
      font-size: 4.5re;
      font-weight: bold;
      color: #333;
      margin-top: 40px;
    }

    .dots {
      text-align: center;
      margin-top: 10px;
      margin-bottom: 30px;
    }

    .dot {
      height: 15px;
      width: 15px;
      margin: 0 5px;
      background-color: #6b332dff;
      border-radius: 50%;
      display: inline-block;
    }

    .about-img {
      display: block;
      max-width: 90%;
      height: auto;
      margin: 0 auto 60px auto;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    footer {
      background-color: #3e2723;
      color: #fff3e0;
      text-align: center;
      padding: 15px;
      font-size: 14px;
    }
  </style>
</head>
<body>

<!-- Navbar (Same as other pages) -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Coffee Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
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

<!-- About Section -->
<h2 class="about-title">ABOUT OUR SHOP</h2>
<div class="dots">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>

<!-- Shop Image -->
<img src="images/about-shop.jpg" alt="Our Coffee Shop" class="about-img">
<!-- Shop Description -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <p class="about-description">
        <strong>coffee shop</strong>
        Good morning, coffee lovers! Today's special is a coffee paired with a freshly baked croissant. Come in and enjoy!Coffee is a beverage brewed from roasted coffee beans. Darkly colored, bitter, and slightly acidic, coffee has a stimulating effect on humans, primarily due to its caffeine content. It has the highest sales in the world market for hot drinks. It is usually served hot, although chilled or iced coffee is common.<br><br> We prepare coffee and present it in a variety of ways — such as espresso, latte, or already-brewed canned coffee. Sugar, sugar substitutes, milk, and cream are often added to mask the bitter taste or enhance the flavor.<br><br> We serve our delicious coffee at festivals, concerts, and transportation hubs for weary workers on their lunch breaks.
      </p>
    </div>
  </div>
</div>
<!-- <style> -->

<!-- Footer -->
<footer>
  &copy; 2025 HotBeans. Crafted with ☕ and ❤️
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
