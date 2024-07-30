<?php require('../layouts/header.php'); ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php require('../layouts/sidebar.php'); ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php require('../layouts/navbar.php'); ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Add Product</h4>

                        <!-- Basic Bootstrap Form -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><a class="btn btn-primary btn-sm" href="index.php" role="button">Manage Products</a></h5>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_POST['save'])) {
                                    $title = $_POST['title'];
                                    $description = $_POST['description'];
                                    $image = $_POST['image'];
                                    $price = $_POST['price'];
                                    $qty = $_POST['qty'];
                                    $discount = $_POST['discount'];
                                    $status = $_POST['status'];

                                    if ($title != "" && $description != "" && $image != "" && $price != "" && $qty != "" && $discount != "" && $status != "") {
                                        $insert = "INSERT INTO products (title, description, image, price, qty, discount, status) 
                                        VALUES ('$title', '$description', '$image', '$price', '$qty', '$discount', '$status')";
                                        $result = mysqli_query($conn, $insert);

                                        if ($result) {
                                            echo "<div class='alert alert-success'>Product added successfully.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                        } else {
                                            echo "<div class='alert alert-danger'>Failed to add product.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>All fields are required.</div>";
                                    }
                                }
                                ?>

                                <form class="row" method="POST" action="" enctype="multipart/form-data">
                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" placeholder="Enter description" rows="4" required></textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="image">Image URL</label>
                                        <input type="text" name="image" class="form-control" id="image" placeholder="Enter image URL" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="price">Price</label>
                                        <input type="number" name="price" class="form-control" id="price" placeholder="Enter price" step="0.01" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="qty">Quantity</label>
                                        <input type="number" name="qty" class="form-control" id="qty" placeholder="Enter quantity" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="discount">Discount (%)</label>
                                        <input type="number" name="discount" class="form-control" id="discount" placeholder="Enter discount percentage" step="0.01" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="form-label" for="status">Status</label>
                                        <select name="status" class="form-control" id="status" required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" name="save" class="btn btn-primary">Add Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--/ Basic Bootstrap Form -->
                    </div>
                    <!-- / Content -->
                </div>
                <!-- / Content wrapper -->

                <?php require('../layouts/footer.php'); ?>
            </div>
            <!-- / Layout container -->
        </div>
    </div>
</body>
