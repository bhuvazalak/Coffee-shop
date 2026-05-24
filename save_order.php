<?php
// Step 1: Connect to MySQL
$conn = new mysqli("localhost", "root", "", "HotBeans");

// Step 2: Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Step 3: Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$payment_mode = $_POST['payment_mode'];

// Step 4: Insert into orders table
$sql = "INSERT INTO orders (name, email, phone, product, quantity, payment_mode) 
        VALUES ('$name', '$email', '$phone', '$product', '$quantity', '$payment_mode')";

// Step 5: Check and display result
if ($conn->query($sql) === TRUE) {
  echo "<h2 style='text-align:center; margin-top:50px; color:green;'>✅ Thank you! Your coffee order has been placed successfully.</h2>";
  echo "<div style='text-align:center; margin-top:20px;'><a href='order.php'>Place another order</a></div>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Step 6: Close connection
$conn->close();
?>
