<?php
include 'config.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $update = mysqli_query($conn, "UPDATE users SET fname='$fname', lname='$lname', email='$email', gender='$gender' WHERE id=$id");

    if ($update) {
        header("Location: dashboard.php");
    } else {
        echo "Update failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form method="post">
        <input type="text" name="fname" value="<?= $row['fname'] ?>" required><br>
        <input type="text" name="lname" value="<?= $row['lname'] ?>" required><br>
        <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
        <select name="gender" required>
            <option value="Male" <?= $row['gender'] == "Male" ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= $row['gender'] == "Female" ? 'selected' : '' ?>>Female</option>
            <option value="Other" <?= $row['gender'] == "Other" ? 'selected' : '' ?>>Other</option>
        </select><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
