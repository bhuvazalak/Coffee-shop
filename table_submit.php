<?php
// Step 1: Connect to MySQL
$conn = new mysqli("localhost", "root", "", "hotbeans");

// Step 2: Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Step 3: Get form data
$name = $_POST['name'];
$table_no = $_POST['table_no'];
$time = $_POST['time'];
$people = $_POST['people'];
$product_name = $_POST['product_name'];

// Step 4: Insert into table_booking
$sql = "INSERT INTO table_booking (name, table_no, time, people, product_name)
        VALUES ('$name', '$table_no', '$time', '$people', '$product_name')";

// Step 5: Execute and give feedback
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Table booked successfully!'); window.location.href='table.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Step 6: Close connection
$conn->close();
?>
