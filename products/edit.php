<?php require ('../layouts/header.php'); ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php require ('../layouts/sidebar.php'); ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php require ('../layouts/navbar.php'); ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span> Edit Product
                        </h4>

                        <?php
                        // Check if ID is set in URL
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = "SELECT * FROM products WHERE id=$id";
                            $result = mysqli_query($conn, $query);

                            // Check if product exists
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $title = $row['title'];
                                $description = $row['description'];
                                $image = $row['image'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $discount = $row['discount'];
                                $status = $row['status'];
                            } else {
                                echo "<div class='alert alert-danger'>Product not found.</div>";
                                exit;
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Product ID not provided.</div>";
                            exit;
                        }

                        // Process form submission
                        if (isset($_POST['save'])) {
                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $image = $_POST['image'];
                            $price = $_POST['price'];
                            $qty = $_POST['qty'];
                            $discount = $_POST['discount'];
                            $status = $_POST['status'];

                            // Update product data in the database
                            $update = "UPDATE products SET title='$title', description='$description', image='$image', price='$price', qty='$qty', discount='$discount', status='$status' WHERE id=$id";
                            $result = mysqli_query($conn, $update);

                            // Check if update was successful
                            if ($result) {
                                echo "<div class='alert alert-success'>Product updated successfully.</div>";
                                echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                            } else {
                                echo "<div class='alert alert-danger'>Failed to update product.</div>";
                                echo "<meta http-equiv=\"refresh\" content=\"2;URL=edit.php?id=$id\">";
                            }
                        }
                        ?>

                        <!-- Basic Bootstrap Form -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><a class="btn btn-primary btn-sm" href="index.php" role="button">Manage
                                        Products</a></h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="POST" action="">
                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter title" value="<?php echo htmlspecialchars
                                            ($title); ?>" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description"
                                            placeholder="Enter description" rows="4" required><?php echo htmlspecialchars
                                            ($description); ?></textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="image">Image URL</label>
                                        <input type="text" name="image" class="form-control" id="image"
                                            placeholder="Enter image URL" value="<?php echo htmlspecialchars
                                            ($image); ?>" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="price">Price</label>
                                        <input type="text" name="price" class="form-control" id="price"
                                            placeholder="Enter price" value="<?php echo $price; ?>" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="qty">Quantity</label>
                                        <input type="text" name="qty" class="form-control" id="qty"
                                            placeholder="Enter quantity" value="<?php echo $qty; ?>" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="discount">Discount</label>
                                        <input type="text" name="discount" class="form-control" id="discount"
                                            placeholder="Enter discount" value="<?php echo $discount; ?>" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="status">Status</label>
                                        <select name="status" class="form-control" id="status" required>
                                            <option value="1" <?php echo ($status == 1) ? 'selected' : ''; ?>>Active
                                            </option>
                                            <option value="0" <?php echo ($status == 0) ? 'selected' : ''; ?>>Inactive
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-sm-10">
                                        <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- / Basic Bootstrap Form -->
                    </div>
                    <!-- / Content -->
                </div>
                <!-- / Content wrapper -->

                <?php require ('../layouts/footer.php'); ?>
            </div>
            <!-- / Layout container -->
        </div>
    </div>
</body>