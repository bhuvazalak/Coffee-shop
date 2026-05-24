<?php
include("./config/dbcon.php");
if (isset($_POST['product_delete'])) {
    $product_id = mysqli_real_escape_string($con, $_POST['product_delete']);
    $delete_query = "DELETE FROM products WHERE id = '$product_id'";
    if (mysqli_query($con, $delete_query)) {
        $message = "Product deleted successfully!";
    } else {
        $message = "Error deleting product: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Product - Coffee Shop</title>
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
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <div class="container-fluid px-4">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>View Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered border-stripe">
                                    <thead>
                                        <tr>
                                            
                                            <th>Category Name</th>
                                            <th>Coffee Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $product = "SELECT * FROM products";
                                        $product_run = mysqli_query($con, $product);

                                        if (mysqli_num_rows($product_run) > 0) {
                                            foreach ($product_run as $item) {
                                                ?>
                                                <tr>
                                                    
                                                    <td><?= $item['category_name']; ?></td>
                                                    <td><?= $item['product_name']; ?></td>
                                                    <td><?= $item['description']; ?></td>
                                                    <td><?= $item['price']; ?></td>
                                                    <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt=""></td>
                                                    <td>
                                                        <a href="product-edit.php?id=<?= $item['id']; ?>" class="btn btn-info">Edit</a>
                                                    </td>
                                                    <!-- <td>
                                                        <form action="code.php" method="POST">
                                                            <button type="submit" name="product_delete" value="<?= $item['id']; ?>" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td> -->
                                                    <td>
                                                        <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                            <button type="submit" name="product_delete" value="<?= $item['id']; ?>" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="8">No Record Found</td>
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