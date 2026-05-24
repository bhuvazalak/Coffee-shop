<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HotBeans - Premium Coffee</title>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: url('images/bg-coffee.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      position: relative;
    }

    header {
      background: rgba(0, 0, 0, 0.85);
      padding: 15px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .logo {
      font-family: 'Pacifico', cursive;
      font-size: 32px;
      color: #ffd9a0;
    }

    nav {
      display: flex;
      gap: 18px;
      flex-wrap: wrap;
    }

    nav a {
      color: #fff8e1;
      text-decoration: none;
      font-weight: 500;
      padding-bottom: 3px;
      position: relative;
    }

    nav a::after {
      content: "";
      position: absolute;
      width: 0%;
      height: 2px;
      left: 0;
      bottom: 0;
      background-color: #ffd9a0;
      transition: width 0.3s ease-in-out;
    }

    nav a:hover::after {
      width: 100%;
    }

    .hero {
      text-align: center;
      padding: 100px 20px 60px;
      background: rgba(0,0,0,0.6);
      backdrop-filter: blur(4px);
      animation: fadeIn 1.5s ease;
    }

    .hero h1 {
      font-size: 3.2rem;
      color: #ffd9a0;
      margin-bottom: 10px;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 20px;
      color: #ffebcd;
    }

    .hero button {
      padding: 12px 30px;
      font-size: 16px;
      border: none;
      border-radius: 25px;
      background: linear-gradient(45deg, #ffb347, #ffcc33);
      color: #333;
      font-weight: bold;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .hero button:hover {
      transform: scale(1.05);
    }

    .container {
      display: flex;
      min-height: 100vh;
      background-color: rgba(0, 0, 0, 0.5);
    }

   


    .main-content {
      flex: 1;
      padding: 50px 40px;
    }

    .main-content h2 {
      font-size: 30px;
      margin-bottom: 30px;
      color: #fff4e1;
      text-align: center;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 30px;
    }

    .card {
      background-color: rgba(255, 255, 255, 0.92);
      color: #333;
      border-radius: 15px;
      text-align: center;
      padding: 20px;
      transition: transform 0.4s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.25);
    }

    .card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
    }

    .card h4 {
      font-size: 20px;
      color: #8b4513;
    }

    .card p {
      font-size: 14px;
      color: #444;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.8);
      color: #fff;
    }

    #scrollTopBtn {
      position: fixed;
      bottom: 25px;
      right: 25px;
      background-color: #ffcc33;
      color: #000;
      border: none;
      border-radius: 50%;
      padding: 14px;
      font-size: 18px;
      display: none;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
    }

    #scrollTopBtn:hover {
      background-color: #ffd700;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        border-right: none;
        border-bottom: 1px solid #444;
        text-align: center;
      }

      nav {
        justify-content: center;
        flex-wrap: wrap;
      }

      nav a {
        margin-bottom: 8px;
      }
    }
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
  <section class="hero" id="about">
    <h1>Welcome to Coffee Shop</h1>
    <p>Your cozy destination for handcrafted coffee & smiles.</p>
    <button onclick="document.getElementById('menu').scrollIntoView({ behavior: 'smooth' })"> <!-- <a  href="menu.php"> -->
Explore Menu</a></button>
  </section>

 

    <main class="main-content" id="menu">
      <h2>Our Signature Beverages</h2>
      
        </div><div class="cards">
        <div class="cards">
  <div class="card" id="black">
    <img src="images/black-coffee.jpg" alt="Black Coffee">
    <h4>Black Coffee</h4>
    <p>Pure coffee brewed to bold perfection.</p>
  </div>
  <div class="card" id="espresso">
    <img src="images/espresso.jpg" alt="Espresso">
    <h4>Espresso</h4>
    <p>Rich, concentrated shot of pure coffee energy.</p>
  </div>
  <div class="card" id="latte">
    <img src="images/latte.jpg" alt="Latte">
    <h4>Latte</h4>
    <p>Espresso mixed with silky steamed milk.</p>
  </div>
  <div class="card" id="mocha">
    <img src="images/mocha.jpg" alt="Mocha">
    <h4>Mocha</h4>
    <p>Chocolatey espresso magic in every sip.</p>
  </div>
  <div class="card" id="flatwhite">
    <img src="images/flat-white.jpg" alt="Flat White">
    <h4>Flat White</h4>
    <p>Velvety milk with strong espresso blend.</p>
  </div>
  <div class="card" id="nitro">
    <img src="images/nitro.jpg" alt="Nitro Cold Brew">
    <h4>Nitro Cold Brew</h4>
    <p>Infused with nitrogen for a creamy chill.</p>
  </div>
  <div class="card" id="dalgona">
    <img src="images/iced-dalgona.jpg" alt="Iced Dalgona">
    <h4>Iced Dalgona</h4>
    <p>Whipped coffee served cold and smooth.</p>
  </div>
  <div class="card" id="eiskaffee">
    <img src="images/eiskaffee.jpg" alt="Eiskaffee">
    <h4>Eiskaffee</h4>
    <p>Chilled coffee with ice cream indulgence.</p>
  </div>
  <div class="card" id="icedespresso">
    <img src="images/iced-espresso.jpg" alt="Iced Espresso">
    <h4>Iced Espresso</h4>
    <p>Bold espresso shots over refreshing ice.</p>
  </div>
  <div class="card" id="frappe">
    <img src="images/frappe.jpg" alt="Frappe">
    <h4>Frappe</h4>
    <p>Blended iced coffee with creamy delight.</p>
  </div>
 <div class="card" id="cappuccino">
    <img src="images/cappuccino.jpg" alt="Iced Espresso">
    <h4>cappuccino</h4>
    <p>Cappuccino is a classic Italian coffee drink made with equal parts espresso</p>
  </div>
<div class="card" id="americano">
    <img src="images/americano.jpg" alt="Iced Espresso">
    <h4>americano</h4>
    <p>Cappuccino is a classic Italian coffee drink made with equal parts espresso</p>
  </div>
<div class="card" id="cortado">
    <img src="images/cortado.jpg" alt="Iced Espresso">
    <h4>cortado</h4>
    <p>Cortado is a balanced coffee drink made with equal parts espresso and steamed milk.</p>
  </div>
<div class="card" id="Affogato">
    <img src="images/affogato.jpg" alt="Iced Espresso">
    <h4>affogato</h4>
    <p>Affogato is a delightful Italian coffee dessert that beautifully blends hot espresso with cold vanilla ice cream.</p>
  </div>





</div>

      </div>
    </main>
  </div>

  <footer id="contact">
    <p>&copy; 2025 HotBeans Coffee Shop. All rights reserved. ☕</p>
  </footer>

  <button onclick="scrollToTop()" id="scrollTopBtn" title="Back to top"><i class="fas fa-arrow-up"></i></button>

  <script>
    const scrollBtn = document.getElementById("scrollTopBtn");

    window.onscroll = () => {
      scrollBtn.style.display = (window.scrollY > 300) ? "block" : "none";
    };

   
    
  </script>
</body>
</html>
