<?php
include("./config/dbcon.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product - Coffee Shop</title>
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
                            <h4>Add Product</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_POST['save_product'])) {
                                $category_name = isset($_POST['category_name']) ? mysqli_real_escape_string($con, trim($_POST['category_name'])) : '';
                                $product_name = isset($_POST['product_name']) ? mysqli_real_escape_string($con, trim($_POST['product_name'])) : '';
                                $description = isset($_POST['description']) ? mysqli_real_escape_string($con, trim($_POST['description'])) : '';
                                $price = isset($_POST['price']) ? mysqli_real_escape_string($con, trim($_POST['price'])) : '0.00';
                                $image = $_FILES['image']['name'];
                                $status = isset($_POST['status']) ? 1 : 0; // Default to 0 if unchecked, table has default 1

                                if (!empty($category_name) && !empty($product_name) && !empty($description) && !empty($price) && !empty($image)) {
                                    $image_tmp = $_FILES['image']['tmp_name'];
                                    $image_path = "../uploads/" . basename($image);

                                    if (!is_dir('../uploads')) {
                                        mkdir('../uploads', 0777, true);
                                    }

                                    if (move_uploaded_file($image_tmp, $image_path)) {
                                        $query = "INSERT INTO products (category_name, product_name, description, price, image, status, created_at) VALUES ('$category_name', '$product_name', '$description', '$price', '$image', '$status', NOW())";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            echo "<p class='text-success'>Product added successfully! Check your database.</p>";
                                        } else {
                                            echo "<p class='text-danger'>Error adding product: " . mysqli_error($con) . "</p>";
                                        }
                                    } else {
                                        echo "<p class='text-danger'>Failed to upload image! Check directory permissions or path.</p>";
                                    }
                                } else {
                                    echo "<p class='text-danger'>All fields are required!</p>";
                                }
                            }
                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" value="Coffee" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" step="0.01" name="price" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="status" class="form-check-input" value="1" checked>
                                    <label class="form-check-label">Active</label>
                                </div>
                                <button type="submit" name="save_product" class="btn btn-primary">Save Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>