<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blog - HotBeans</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>

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

    .blog-title {
      text-align: center;
      margin: 40px 0 20px;
      font-size: 3rem;
      font-family: 'Pacifico', cursive;
      color: #5d4037;
    }

    .blog-card {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: 0.3s;
    }

    .blog-card:hover {
      transform: scale(1.02);
      box-shadow: 0 6px 20px rgba(0,0,0,0.2);
    }

    .blog-card img {
      width: 100%;
      height: 240px;
      object-fit: cover;
    }

    .blog-card-body {
      padding: 20px;
    }

    .blog-card-body h5 {
      color: #4e342e;
      font-weight: bold;
    }

    .blog-card-body p {
      color: #5d4037;
    }

    .read-more {
      display: inline-block;
      margin-top: 10px;
      color: #3e2723;
      font-weight: bold;
      text-decoration: none;
    }

    .read-more:hover {
      color: #ff6f00;
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


<!-- Navbar (Same as Gallery Page) -->
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
        <li class="nav-item"><a class="nav-link active" href="blog.php">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
        <li class="nav-item"><a class="nav-link" href="table.php">Table</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<!-- Blog Section -->
<div class="container my-5">
  <h2 class="blog-title">Coffee Blogs</h2>
  <div class="row g-4">
    <!-- Coffee Crafter -->
    <div class="col-md-6">
      <div class="blog-card">
       <img src="images/coffee1.jpg" alt="Coffee Crafter">
        <div class="blog-card-body">
          <h5>Coffee Crafter</h5>
          <p>Discover the secrets behind a perfectly crafted coffee. Learn brewing techniques, bean selection, and more.Coffee is a beverage prepared from roasted coffee beans, the seeds of Coffea species. The primary psychoactive compound in coffee is caffeine, a stimulant known for its eugeroic, ergogenic, or nootropic properties.Coffee is not just a drink — it’s an art. From selecting the right beans to mastering the perfect grind, the Coffee Crafter knows it all. Learn how brewing time, water temperature, and grind size can affect flavor. Whether you’re using a French press, espresso machine, or pour-over, crafting the perfect cup takes love, patience, and precision. </p>
          
        </div>
      </div>
    </div>
    <!-- Coffee Buzz -->
    <div class="col-md-6">
      <div class="blog-card">
       
    <img src="images/coffee2.jpg" alt="Coffee Buzz">

        <div class="blog-card-body">
          <h5>Coffee Buzz</h5>
          <p>Stay updated with the latest trends, coffee recipes, and what's brewing in the café world.Coffee is brewed from roasted coffee beans, and various methods exist, such as drip, French press, espresso, and more. Instant coffee is also a popular form, made by drying brewed coffee. Serving can include additions like milk, sugar, or flavorings.The world of coffee is always brewing with excitement. From seasonal flavors like Pumpkin Spice to trending techniques like Cold Brew and Dalgona — there’s always something new to try. Explore café trends, latte art styles, and global coffee recipes that bring the buzz to every sip. </p>
          
        </div>
      </div>
    </div>
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
