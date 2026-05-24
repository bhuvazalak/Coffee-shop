<?php
include("./config/dbcon.php");

if (isset($_POST['product_delete'])) {
    $contact_id = mysqli_real_escape_string($con, $_POST['product_delete']);
    $delete_query = "DELETE FROM contact WHERE id = '$contact_id'";
    if (mysqli_query($con, $delete_query)) {
        $message = "Product deleted successfully!";
    } else {
        $message = "Error deleting product: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Contact Us - HotBeans Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            color: white;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            color: #fff;
            display: block;
        }
        .sidebar a:hover {
            background-color: #555;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <div class="container-fluid px-4">
            <?php
            if (isset($_GET['message']) && $_GET['message'] === 'success') {
                echo '<div class="alert alert-success" role="alert">Contact entry processed successfully!</div>';
            }
            ?>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Manage Contact Us</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contact_query = "SELECT * FROM contact"; // Replace 'contact_us' with your actual table name
                                        $contact_run = mysqli_query($con, $contact_query);

                                        if ($contact_run === false) {
                                            echo "<tr><td colspan='6' class='text-danger'>Error: " . mysqli_error($con) . "</td></tr>";
                                        } elseif (mysqli_num_rows($contact_run) > 0) {
                                            foreach ($contact_run as $contact) {
                                                ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($contact['name']) ?></td>
                                                    <td><?= htmlspecialchars($contact['email']) ?></td>
                                                    <td><?= htmlspecialchars($contact['phone']) ?></td>
                                                    <td><?= htmlspecialchars(substr($contact['message'], 0, 50)) . (strlen($contact['message']) > 50 ? '...' : '') ?></td>
                                                    <td>
                                                        <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                                            <button type="submit" name="product_delete" value="<?= $contact['id']; ?>" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="6">No Contact Us submissions found.</td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
