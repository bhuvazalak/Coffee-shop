<?php
include("./config/dbcon.php");

if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM products WHERE id = '$product_id'";
    $result = mysqli_query($con, $query);
    $product = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product - Coffee Shop</title>
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
                            <h4>Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_POST['update_product'])) {
                                $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
                                $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
                                $description = mysqli_real_escape_string($con, $_POST['description']);
                                $price = mysqli_real_escape_string($con, $_POST['price']);
                                $status = isset($_POST['status']) ? 1 : 0;

                                // Handle image update (optional)
                                $image = $product['image']; // Keep existing image if no new upload
                                if (!empty($_FILES['image']['name'])) {
                                    $image_tmp = $_FILES['image']['tmp_name'];
                                    $image_path = "../uploads/" . basename($_FILES['image']['name']);
                                    if (move_uploaded_file($image_tmp, $image_path)) {
                                        $image = basename($_FILES['image']['name']);
                                    } else {
                                        echo "<p class='text-danger'>Failed to upload new image!</p>";
                                    }
                                }

                                $query = "UPDATE products SET category_name = '$category_name', product_name = '$product_name', description = '$description', price = '$price', image = '$image', status = '$status' WHERE id = '$product_id'";
                                if (mysqli_query($con, $query)) {
                                    echo "<p class='text-success'>Product updated successfully!</p>";
                                    // Refresh the product data
                                    $result = mysqli_query($con, "SELECT * FROM products WHERE id = '$product_id'");
                                    $product = mysqli_fetch_assoc($result);
                                    header("Location: manage_product.php");
                                } else {
                                    echo "<p class='text-danger'>Error updating product: " . mysqli_error($con) . "</p>";
                                }
                            }
                            ?>
                            <?php if (isset($product)) { ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <input type="text" name="category_name" class="form-control" value="<?= htmlspecialchars($product['category_name']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" value="<?= htmlspecialchars($product['product_name']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control" required><?= htmlspecialchars($product['description']) ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($product['price']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Current Image</label>
                                        <img src="../uploads/<?= htmlspecialchars($product['image']) ?>" width="50px" height="50px" alt="" class="mb-2 d-block">
                                        <input type="file" name="image" class="form-control">
                                        <small class="text-muted">Leave blank to keep current image.</small>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="status" class="form-check-input" value="1" <?= $product['status'] ? 'checked' : '' ?>>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                    <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
                                </form>
                            <?php } else { ?>
                                <p class="text-danger">Product not found!</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>