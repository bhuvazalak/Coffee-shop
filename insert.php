<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  mysqli_query($conn, "INSERT INTO users (fname, lname, email, gender) VALUES ('$fname','$lname','$email','$gender')");
  header("Location: dashboard.php");
}
?>

<form method="post">
  <h2>Insert New User</h2>
  <input type="text" name="fname" placeholder="First Name" required><br>
  <input type="text" name="lname" placeholder="Last Name" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <select name="gender" required>
    <option value="">Select Gender</option>
    <option>Male</option>
    <option>Female</option>
  </select><br><br>
  <input type="submit" value="Insert">
</form>
