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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category/</span> Add Category
                        </h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0"><a class="btn btn-primary btn-sm " href="index.php" role="button">Manage Categories </a></h5>
                                        <small class="text-muted float-end">Merged input group</small>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                        if (isset($_POST['save'])) {

                                            $title = $_POST['title'];
                                            $description = $_POST['description'];
                                            $image = $_POST['image'];
                                            $status = $_POST['status'];

                                            if ($title != "" && $description != "" && $image != "" && $status != "") {
                                                $insert = "INSERT INTO categories (title, description, image, status) VALUES ('$title', '$description', '$image', '$status')";
                                                $result = mysqli_query($conn, $insert);

                                                if ($result) {
                                                    echo "<div class='alert alert-success'>Data is submitted</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Data is not submitted</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>All fields are required</div>";
                                            }

                                            // Redirect after 0 seconds
                                            echo "<meta http-equiv=\"refresh\" content=\"4;URL=create.php\">";
                                        }
                                        ?>

                                        <form class="row" method="POST" enctype="multipart/form-data" action="">
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-title">Title</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-title2" class="input-group-text"><i class="bx bx-title"></i></span>
                                                        <input type="text" name="title" class="form-control" id="basic-icon-default-title" placeholder="Enter title" aria-label="Enter title" aria-describedby="basic-icon-default-title2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-description">Description</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-description2" class="input-group-text"><i class="bx bx-message-square-dots"></i></span>
                                                        <textarea name="description" class="form-control" id="basic-icon-default-description" placeholder="Enter description" aria-label="Enter description" aria-describedby="basic-icon-default-description2"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-image">Image</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-image2" class="input-group-text"><i class="bx bx-image"></i></span>
                                                        <input type="text" name="image" class="form-control" id="basic-icon-default-image" placeholder="Enter image URL" aria-label="Enter image URL" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="price">Price</label>
                                        <input type="number" name="price" class="form-control" id="price" placeholder="Enter price" step="0.01" required>
                                    </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control" id="status" required>
                                                        <option value="0">Pending</option>
                                                        <option value="1">In Progress</option>
                                                        <option value="2">Completed</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->

                    <!-- <?php require('../layouts/footer.php'); ?> -->
                </div>
                <!-- / Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- / Layout container -->
    </div>
    <!-- / Layout wrapper -->
</body>
<?php require('../layouts/footer.php'); ?>
