<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gallery - HotBeans</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Lightbox CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
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
    .gallery-title {
      text-align: center;
      margin: 40px 0 20px;
      font-size: 3rem;
      font-family: 'Pacifico', cursive;
      color: #5d4037;
    }
    .gallery-container {
      padding: 30px;
    }
    .gallery-img {
      border-radius: 12px;
      transition: 0.4s ease;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    .gallery-img:hover {
  transform: scale(1.2); /* 120% size */
  box-shadow: 0 6px 15px rgba(0,0,0,0.3);
  transition: transform 0.3s ease, box-shadow 0.3s ease; /* smooth transition */
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
        <li class="nav-item"><a class="nav-link active" href="blog.php">Blog</a></li>
        <li class="nav-item"><a class="nav-link active" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
        <li class="nav-item"><a class="nav-link" href="table.php">Table</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<!-- Gallery Section -->
<div class="container gallery-container">
  <h2 class="gallery-title">Our Coffee </h2>
  <div class="row g-4">
    <!-- Gallery Images with Lightbox -->
    <div class="col-md-4">
      <a href="images/gallery1.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery1.jpg" class="img-fluid gallery-img" alt="Coffee 1">
      </a>
    </div>
    <div class="col-md-4">
      <a href="images/gallery2.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery2.jpg" class="img-fluid gallery-img" alt="Coffee 2">
      </a>
    </div>
    <div class="col-md-4">
      <a href="images/gallery3.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery3.jpg" class="img-fluid gallery-img" alt="Coffee 3">
      </a>
    </div>
    <div class="col-md-4">
      <a href="images/gallery4.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery4.jpg" class="img-fluid gallery-img" alt="Coffee 4">
      </a>
    </div>
    <div class="col-md-4">
      <a href="images/gallery5.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery5.jpg" class="img-fluid gallery-img" alt="Coffee 5">
      </a>
    </div>
    <div class="col-md-4">
      <a href="images/gallery6.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery6.jpg" class="img-fluid gallery-img" alt="Coffee 6">
      </a>
    </div> <div class="col-md-4">
      <a href="images/gallery5.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery7.jpg" class="img-fluid gallery-img" alt="Coffee 5">
      </a>
    </div>
     <div class="col-md-4">
      <a href="images/gallery5.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery8.jpg" class="img-fluid gallery-img" alt="Coffee 5">
      </a>
    </div>
     <div class="col-md-4">
      <a href="images/gallery5.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery9.jpg" class="img-fluid gallery-img" alt="Coffee 5">
      </a>
    </div>
     <div class="col-md-4">
      <a href="images/gallery5.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery10.jpg" class="img-fluid gallery-img" alt="Coffee 5">
      </a>
    </div>
     <div class="col-md-4">
      <a href="images/gallery5.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery11.jpg" class="img-fluid gallery-img" alt="Coffee 5">
      </a>
    </div>
     <div class="col-md-4">
      <a href="images/gallery5.jpg" data-lightbox="coffee-gallery">
        <img src="images/gallery12.jpg" class="img-fluid gallery-img" alt="Coffee 5">
      </a>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  &copy; 2025 HotBeans. Crafted with ☕ and ❤️
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox-plus-jquery.min.js"></script>

</body>
</html>
