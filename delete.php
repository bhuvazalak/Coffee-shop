<?php
include 'config.php';

$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM users WHERE id=$id");

if ($delete) {
    header("Location: dashboard.php");
} else {
    echo "Delete failed!";
}
?>
