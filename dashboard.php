<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
}
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<h2>Welcome, Admin</h2>
<a href="insert.php">Insert New User</a> | <a href="logout.php">Logout</a>

<table border="1">
  <tr>
    <th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th><th>Action</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['fname']; ?></td>
    <td><?= $row['lname']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['gender']; ?></td>
    <td>
      <a href="update.php?id=<?= $row['id']; ?>">Edit</a> |
      <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this user?')">Delete</a>
    </td>
  </tr>
  <?php } ?>
</table>
