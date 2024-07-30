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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories/</span> Edit Category
                        </h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Edit Category</h5>
                                        <small class="text-muted float-end">Modify category details</small>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                        // Initialize variables
                                        $title = $description = $status = "";
                                        $image = "";

                                        // Check if 'id' parameter is set in the URL
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];

                                            // Retrieve category details from the database
                                            $sql = "SELECT * FROM categories WHERE id=$id";
                                            $result = mysqli_query($conn, $sql);

                                            // Check if category exists
                                            if ($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $description = $row['description'];
                                                $image = $row['image'];
                                                $status = $row['status'];

                                                // Process form submission
                                                if (isset($_POST['save'])) {
                                                    $title = $_POST['title'];
                                                    $description = $_POST['description'];
                                                    $status = $_POST['status'];

                                                    // Handle image upload if a new image is selected
                                                    if (!empty($_FILES["image"]["name"])) {
                                                        $target_dir = "../uploads/";
                                                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                                                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                                        $uploadOk = 1;

                                                        // Check if the file is an actual image or fake image
                                                        $check = getimagesize($_FILES["image"]["tmp_name"]);
                                                        if ($check !== false) {
                                                            // Attempt to move the uploaded file to the specified directory
                                                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                                                $image = $target_file;
                                                            } else {
                                                                echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
                                                                $uploadOk = 0;
                                                            }
                                                        } else {
                                                            echo "<div class='alert alert-danger'>File is not an image.</div>";
                                                            $uploadOk = 0;
                                                        }
                                                    }

                                                    // Update the category in the database
                                                    $update = "UPDATE categories SET title='$title', description='$description', image='$image', status='$status' WHERE id=$id";
                                                    $result_update = mysqli_query($conn, $update);

                                                    // Check if update was successful
                                                    if ($result_update) {
                                                        echo "<div class='alert alert-success'>Category is Updated</div>";
                                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                    } else {
                                                        echo "<div class='alert alert-danger'>Category is not Updated</div>";
                                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=edit.php?id=$id\">";
                                                    }
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>Category not found.</div>";
                                                echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                            }
                                        } else {
                                            echo "<div class='alert alert-danger'>Missing category ID parameter.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                        }
                                        ?>

                                        <!-- Category edit form -->
                                        <form class="row" method="POST" enctype="multipart/form-data" action="">
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="title">Title</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" name="title" class="form-control" id="title"
                                                            placeholder="Enter title" value="<?php echo $title; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="description">Description</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <textarea name="description" class="form-control"
                                                            id="description"
                                                            placeholder="Enter description"><?php echo $description; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="image">Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image" class="form-control" id="image" />
                                                    <?php if (!empty($image)) { ?>
                                                        <img src="<?php echo '../uploads/'. $image; ?>" alt="Current Image" style="width: 100px; height: auto; margin-top: 10px;">
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control" id="status" required>
                                                        <option value="0" <?php if ($status == 0)
                                                            echo "selected"; ?>>
                                                            Inactive</option>
                                                        <option value="1" <?php if ($status == 1)
                                                            echo "selected"; ?>>
                                                            Active</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <button type="submit" name="save"
                                                    class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        <!-- / Category edit form -->

                                        <?php require ('../layouts/footer.php'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- / Layout container -->
        </div>
        <!-- / Layout wrapper -->
</body>

</html>