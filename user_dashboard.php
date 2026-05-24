<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: user_login_form.html");
    exit();
}
?>
<h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
<p>This is your user dashboard.</p>
<a href="logout.php">Logout</a>
